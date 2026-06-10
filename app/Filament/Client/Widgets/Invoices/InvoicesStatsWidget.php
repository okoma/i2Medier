<?php

namespace App\Filament\Client\Widgets\Invoices;

use App\Models\Invoice;
use App\Models\InvoicePayment;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InvoicesStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $clientId = auth()->user()?->client_id;
        $currency = Invoice::where('client_id', $clientId)->latest()->value('currency') ?? 'NGN';

        $sym = match (strtoupper($currency)) {
            'NGN' => '₦', 'USD' => '$', 'EUR' => '€', 'GBP' => '£', default => $currency,
        };
        $fmt = fn (float $n): string => $sym . number_format($n, 0);

        $totalCount = Invoice::where('client_id', $clientId)->count();
        $paidCount = Invoice::where('client_id', $clientId)->where('status', 'paid')->count();
        $overdueCount = Invoice::where('client_id', $clientId)->overdue()->count();
        $pendingCount = Invoice::where('client_id', $clientId)->unpaid()->count() - $overdueCount;

        $outstandingBalance = (float) Invoice::where('client_id', $clientId)->unpaid()->sum('total');

        $latestPayment = InvoicePayment::whereHas('invoice', fn ($q) => $q->where('client_id', $clientId))
            ->where('status', 'paid')
            ->latest('paid_at')
            ->first();

        return [
            Stat::make('Total Invoices', (string) $totalCount)
                ->description($paidCount . ' paid')
                ->icon('heroicon-o-document-text')
                ->color('warning'),
            Stat::make('Paid', (string) $paidCount)
                ->description('of ' . $totalCount . ' total')
                ->icon('heroicon-o-check-circle')
                ->color('success'),
            Stat::make('Overdue', (string) $overdueCount)
                ->description($overdueCount > 0 ? 'Action required' : 'None overdue')
                ->icon('heroicon-o-exclamation-circle')
                ->color($overdueCount > 0 ? 'danger' : 'success'),
            Stat::make('Pending', (string) $pendingCount)
                ->description('Awaiting payment')
                ->icon('heroicon-o-clock')
                ->color($pendingCount > 0 ? 'warning' : 'success'),
            Stat::make('Outstanding', $fmt($outstandingBalance))
                ->description($latestPayment ? 'Last paid ' . $latestPayment->paid_at?->diffForHumans() : 'No payments yet')
                ->icon('heroicon-o-banknotes')
                ->color($outstandingBalance > 0 ? 'danger' : 'success'),
        ];
    }
}
