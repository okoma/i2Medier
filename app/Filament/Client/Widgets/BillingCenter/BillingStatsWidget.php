<?php

namespace App\Filament\Client\Widgets\BillingCenter;

use App\Models\Invoice;
use App\Models\InvoicePayment;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BillingStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $clientId = auth()->user()?->client_id;
        $currency = Invoice::where('client_id', $clientId)->latest()->value('currency') ?? 'NGN';

        $sym = match (strtoupper($currency)) {
            'NGN' => '₦', 'USD' => '$', 'EUR' => '€', 'GBP' => '£', default => $currency,
        };
        $fmt = fn (float $n): string => $sym . number_format($n, 0);

        $outstandingBalance = (float) Invoice::where('client_id', $clientId)
            ->whereNotIn('status', ['paid', 'cancelled', 'refunded'])
            ->sum('total');

        $pendingCount = Invoice::where('client_id', $clientId)
            ->whereNotIn('status', ['paid', 'cancelled', 'refunded'])
            ->count();

        $paidThisMonth = (float) InvoicePayment::whereHas('invoice', fn ($q) => $q->where('client_id', $clientId))
            ->where('status', 'paid')
            ->whereBetween('paid_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->sum('amount');

        $totalPaid = (float) InvoicePayment::whereHas('invoice', fn ($q) => $q->where('client_id', $clientId))
            ->where('status', 'paid')
            ->sum('amount');

        return [
            Stat::make('Total Due', $fmt($outstandingBalance))
                ->description($pendingCount . ' ' . str('invoice')->plural($pendingCount) . ' outstanding')
                ->icon('heroicon-o-credit-card')
                ->color($outstandingBalance > 0 ? 'danger' : 'success'),
            Stat::make('Paid This Month', $fmt($paidThisMonth))
                ->description('Payments received')
                ->icon('heroicon-o-check-circle')
                ->color('success'),
            Stat::make('Total Paid', $fmt($totalPaid))
                ->description('All time')
                ->icon('heroicon-o-banknotes')
                ->color('info'),
            Stat::make('Outstanding Balance', $fmt($outstandingBalance))
                ->description('Amount due')
                ->icon('heroicon-o-exclamation-circle')
                ->color($outstandingBalance > 0 ? 'warning' : 'success'),
            Stat::make('Pending Invoices', (string) $pendingCount)
                ->description('Awaiting payment')
                ->icon('heroicon-o-document-text')
                ->color($pendingCount > 0 ? 'warning' : 'success'),
        ];
    }
}
