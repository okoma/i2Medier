<?php

namespace App\Filament\Client\Resources\Invoices\Pages;

use App\Filament\Client\Resources\Invoices\InvoiceResource;
use App\Support\PaymentSettings;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewInvoice extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;

    protected string $view = 'filament.client.resources.invoices.pages.view-invoice';

    public function mount(int|string $record): void
    {
        parent::mount($record);

        $this->record->load(['client', 'project', 'items', 'payments']);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('backToInvoices')
                ->label('Back to Invoices')
                ->icon('heroicon-o-arrow-left')
                ->url(InvoiceResource::getUrl('index', panel: 'client'))
                ->color('gray'),
            Action::make('payWithPaystack')
                ->label('Pay with Paystack')
                ->icon('heroicon-o-credit-card')
                ->color('success')
                ->visible(fn (): bool => $this->record->canBePaidOnline() && app(PaymentSettings::class)->paystackEnabled())
                ->url(fn (): string => route('billing.paystack.redirect', ['invoice' => $this->record])),
            Action::make('bankTransfer')
                ->label('Bank Transfer')
                ->icon('heroicon-o-building-library')
                ->color('gray')
                ->visible(fn (): bool => $this->record->canBePaidByBankTransfer() && app(PaymentSettings::class)->bankTransferEnabled())
                ->modalHeading('Bank transfer details')
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Close')
                ->modalContent(fn () => view('filament.client.invoices.bank-transfer-details', [
                    'invoice' => $this->record,
                    'bankTransfer' => app(PaymentSettings::class)->bankTransferDetails(),
                ])),
        ];
    }

    public function getStatusMeta(): array
    {
        $state = $this->record->isOverdue() ? 'overdue' : $this->record->status;

        return match ($state) {
            'paid' => ['label' => 'Paid', 'color' => 'emerald'],
            'overdue' => ['label' => 'Overdue', 'color' => 'rose'],
            'cancelled' => ['label' => 'Cancelled', 'color' => 'slate'],
            'refunded' => ['label' => 'Refunded', 'color' => 'slate'],
            default => ['label' => ucfirst(str_replace('_', ' ', (string) $state)), 'color' => 'amber'],
        };
    }

    public function getDueNote(): string
    {
        if ($this->record->status === 'paid' && $this->record->paid_at) {
            return 'Paid ' . $this->record->paid_at->diffForHumans();
        }

        if (! $this->record->due_at) {
            return 'No due date set';
        }

        if ($this->record->isOverdue()) {
            return 'Overdue by ' . $this->record->due_at->diffForHumans(null, true);
        }

        return 'Due ' . $this->record->due_at->diffForHumans();
    }

    public function moneyLabel(float $amount, ?string $currency = null): string
    {
        return strtoupper($currency ?: ($this->record->currency ?? 'NGN')) . ' ' . number_format($amount, 2);
    }
}
