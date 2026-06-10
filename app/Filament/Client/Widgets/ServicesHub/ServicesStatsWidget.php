<?php

namespace App\Filament\Client\Widgets\ServicesHub;

use App\Models\ServiceSubscription;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ServicesStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $clientId = auth()->user()?->client_id;

        $all       = ServiceSubscription::where('client_id', $clientId)->get();
        $total     = $all->count();
        $active    = $all->where('status', 'active')->count();
        $suspended = $all->where('status', 'suspended')->count();
        $cancelled = $all->where('status', 'cancelled')->count();
        $expiring  = $all->filter(fn ($s) =>
            $s->status === 'active'
            && $s->expires_at
            && $s->expires_at->isBetween(now(), now()->addDays(30))
        )->count();

        $pct = fn (int $n): string => $total > 0 ? round(($n / $total) * 100, 1) . '% of total' : '0% of total';

        return [
            Stat::make('Total Services', (string) $total)
                ->description('All services')
                ->icon('heroicon-o-circle-stack')
                ->color('warning'),
            Stat::make('Active', (string) $active)
                ->description($pct($active))
                ->icon('heroicon-o-check-circle')
                ->color('success'),
            Stat::make('Expiring Soon', (string) $expiring)
                ->description($pct($expiring))
                ->icon('heroicon-o-clock')
                ->color($expiring > 0 ? 'warning' : 'success'),
            Stat::make('Suspended', (string) $suspended)
                ->description('Temporarily paused')
                ->icon('heroicon-o-pause-circle')
                ->color($suspended > 0 ? 'warning' : 'success'),
            Stat::make('Cancelled', (string) $cancelled)
                ->description('Ended services')
                ->icon('heroicon-o-x-circle')
                ->color($cancelled > 0 ? 'danger' : 'success'),
        ];
    }
}
