<?php

namespace App\Filament\Client\Resources\Invoices\Pages;

use App\Filament\Client\Resources\Invoices\InvoiceResource;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;

    protected string $view = 'filament.client.resources.invoices.pages.list-invoices';

    public array $stats = [];

    public array $invoices = [];

    public function mount(): void
    {
        parent::mount();

        $clientId = auth()->user()?->client_id;
        $invoices = Invoice::query()
            ->with(['project', 'payments'])
            ->where('client_id', $clientId)
            ->orderByRaw("case when status = 'paid' then 2 when due_at < current_date then 0 else 1 end")
            ->orderBy('due_at')
            ->latest('issued_at')
            ->get();

        $this->stats = $this->buildStats($invoices, $clientId);
        $this->invoices = $invoices->map(fn (Invoice $invoice): array => $this->mapInvoice($invoice))->all();
    }

    public function getHeaderWidgets(): array
    {
        return [];
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    private function buildStats(Collection $invoices, ?int $clientId): array
    {
        $currency = $invoices->first()?->currency ?? 'NGN';
        $totalCount = $invoices->count();
        $paidCount = $invoices->where('status', 'paid')->count();
        $overdueCount = $invoices->filter(fn (Invoice $invoice) => $invoice->isOverdue())->count();
        $pendingCount = $invoices->filter(fn (Invoice $invoice) => ! in_array($invoice->status, ['paid', 'cancelled', 'refunded']) && ! $invoice->isOverdue())->count();
        $outstandingBalance = (float) $invoices
            ->filter(fn (Invoice $invoice) => ! in_array($invoice->status, ['paid', 'cancelled', 'refunded']))
            ->sum('total');

        $latestPayment = InvoicePayment::query()
            ->whereHas('invoice', fn ($query) => $query->where('client_id', $clientId))
            ->where('status', 'paid')
            ->latest('paid_at')
            ->first();

        return [
            [
                'label' => 'All Invoices',
                'value' => (string) $totalCount,
                'description' => $paidCount . ' already paid',
                'icon' => 'heroicon-o-document-text',
                'color' => 'slate',
            ],
            [
                'label' => 'Awaiting Payment',
                'value' => (string) $pendingCount,
                'description' => 'Invoices still open',
                'icon' => 'heroicon-o-clock',
                'color' => 'amber',
            ],
            [
                'label' => 'Overdue',
                'value' => (string) $overdueCount,
                'description' => $overdueCount > 0 ? 'Needs attention soon' : 'Nothing overdue',
                'icon' => 'heroicon-o-exclamation-circle',
                'color' => $overdueCount > 0 ? 'rose' : 'emerald',
            ],
            [
                'label' => 'Outstanding',
                'value' => $this->moneyLabel($outstandingBalance, $currency),
                'description' => $latestPayment?->paid_at
                    ? 'Last payment ' . $latestPayment->paid_at->diffForHumans()
                    : 'No payment history yet',
                'icon' => 'heroicon-o-banknotes',
                'color' => $outstandingBalance > 0 ? 'sky' : 'emerald',
            ],
        ];
    }

    private function mapInvoice(Invoice $invoice): array
    {
        $status = $invoice->isOverdue() ? 'overdue' : $invoice->status;

        return [
            'id' => $invoice->id,
            'number' => $invoice->invoice_number,
            'project' => $invoice->project?->reference,
            'issued_at' => $invoice->issued_at?->format('M d, Y') ?? 'Not issued yet',
            'due_at' => $invoice->due_at?->format('M d, Y') ?? 'No due date',
            'due_note' => $this->dueNote($invoice),
            'total' => $this->moneyLabel((float) $invoice->total, $invoice->currency ?? 'NGN'),
            'status' => ucfirst(str_replace('_', ' ', $status)),
            'status_color' => match ($status) {
                'paid' => 'emerald',
                'overdue' => 'rose',
                'cancelled', 'refunded' => 'slate',
                default => 'amber',
            },
            'payment_method' => $invoice->getPaymentMethodLabel() ?? 'Payment method not set',
            'notes' => filled($invoice->notes) ? $invoice->notes : 'No invoice note added yet.',
            'payments_count' => $invoice->payments->count(),
            'url' => InvoiceResource::getUrl('view', ['record' => $invoice], panel: 'client'),
        ];
    }

    private function dueNote(Invoice $invoice): string
    {
        if ($invoice->status === 'paid' && $invoice->paid_at) {
            return 'Paid ' . $invoice->paid_at->diffForHumans();
        }

        if (! $invoice->due_at) {
            return 'No due date set';
        }

        if ($invoice->isOverdue()) {
            return 'Overdue by ' . $invoice->due_at->diffForHumans(null, true);
        }

        return 'Due ' . $invoice->due_at->diffForHumans();
    }

    private function moneyLabel(float $amount, string $currency): string
    {
        return strtoupper($currency) . ' ' . number_format($amount, 2);
    }
}
