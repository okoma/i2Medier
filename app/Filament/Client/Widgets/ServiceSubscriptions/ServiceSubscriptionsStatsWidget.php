<?php

namespace App\Filament\Client\Widgets\ServiceSubscriptions;

use App\Models\ServiceSubscription;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ServiceSubscriptionsStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $clientId = auth()->user()?->client_id;

        $totalCount       = ServiceSubscription::where('client_id', $clientId)->count();
        $activeCount      = ServiceSubscription::where('client_id', $clientId)->where('status', 'active')->count();
        $expiringSoon     = ServiceSubscription::where('client_id', $clientId)->expiringSoon(30)->count();
        $suspendedCount   = ServiceSubscription::where('client_id', $clientId)->where('status', 'suspended')->count();
        $cancelledCount   = ServiceSubscription::where('client_id', $clientId)->where('status', 'cancelled')->count();

        return [
            Stat::make('Total Services', (string) $totalCount)
                ->description('All subscriptions')
                ->icon('heroicon-o-server-stack')
                ->color('warning'),
            Stat::make('Active', (string) $activeCount)
                ->description('Running now')
                ->icon('heroicon-o-check-circle')
                ->color($activeCount > 0 ? 'success' : 'gray'),
            Stat::make('Expiring Soon', (string) $expiringSoon)
                ->description('Within 30 days')
                ->icon('heroicon-o-clock')
                ->color($expiringSoon > 0 ? 'warning' : 'success'),
            Stat::make('Suspended', (string) $suspendedCount)
                ->description('Temporarily paused')
                ->icon('heroicon-o-pause-circle')
                ->color($suspendedCount > 0 ? 'warning' : 'success'),
            Stat::make('Cancelled', (string) $cancelledCount)
                ->description('Terminated')
                ->icon('heroicon-o-x-circle')
                ->color($cancelledCount > 0 ? 'danger' : 'success'),
        ];
    }
}
