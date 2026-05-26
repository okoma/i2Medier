<?php

namespace App\Filament\Client\Pages;

use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Support\PaymentSettings;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Collection;

class BillingCenter extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static string|\UnitEnum|null $navigationGroup = 'Client Portal';

    protected static ?int $navigationSort = 6;

    protected static ?string $title = 'Billing';

    protected string $view = 'filament.client.pages.billing-center';

    public Collection $outstandingInvoices;

    public Collection $recentPayments;

    public array $paymentOptions = [];

    public float $outstandingBalance = 0.0;

    public float $paidThisMonth = 0.0;

    public int $pendingInvoiceCount = 0;

    public function mount(PaymentSettings $paymentSettings): void
    {
        /** @var \App\Models\User|null $user */
        $user = auth()->user();

        $clientId = $user?->client_id;

        $this->outstandingInvoices = Invoice::query()
            ->with('website')
            ->where('client_id', $clientId)
            ->whereNotIn('status', ['paid', 'cancelled', 'refunded'])
            ->orderBy('due_at')
            ->limit(5)
            ->get();

        $this->recentPayments = InvoicePayment::query()
            ->with('invoice.website')
            ->whereHas('invoice', fn ($query) => $query->where('client_id', $clientId))
            ->latest('paid_at')
            ->latest('created_at')
            ->limit(5)
            ->get();

        $this->outstandingBalance = (float) Invoice::query()
            ->where('client_id', $clientId)
            ->whereNotIn('status', ['paid', 'cancelled', 'refunded'])
            ->sum('total');

        $this->paidThisMonth = (float) InvoicePayment::query()
            ->whereHas('invoice', fn ($query) => $query->where('client_id', $clientId))
            ->where('status', 'paid')
            ->whereBetween('paid_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->sum('amount');

        $this->pendingInvoiceCount = $this->outstandingInvoices->count();

        $bankTransfer = $paymentSettings->bankTransferDetails();

        $this->paymentOptions = [
            [
                'name' => 'Paystack',
                'enabled' => $paymentSettings->paystackEnabled(),
                'description' => 'Pay online securely for invoices that support Paystack.',
                'detail' => $paymentSettings->paystackEnabled() ? 'Online card and transfer checkout' : 'Not currently enabled',
            ],
            [
                'name' => 'Bank Transfer',
                'enabled' => $paymentSettings->bankTransferEnabled(),
                'description' => 'Manual transfer using your invoice number as reference.',
                'detail' => $paymentSettings->bankTransferEnabled()
                    ? trim(implode(' · ', array_filter([
                        $bankTransfer['bank_name'] ?? null,
                        $bankTransfer['account_number'] ?? null,
                    ])))
                    : 'Not currently enabled',
            ],
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->isClientOwner() ?? false;
    }
}
