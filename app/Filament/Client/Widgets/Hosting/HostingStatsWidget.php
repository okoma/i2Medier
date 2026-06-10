<?php

namespace App\Filament\Client\Widgets\Hosting;

use App\Enums\HostingStatus;
use App\Models\HostingAccount;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class HostingStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $clientId = Auth::user()?->client_id;

        $total     = HostingAccount::where('client_id', $clientId)->count();
        $active    = HostingAccount::where('client_id', $clientId)->where('status', HostingStatus::Active->value)->count();
        $expiring  = HostingAccount::where('client_id', $clientId)->expiringSoon()->count();
        $suspended = HostingAccount::where('client_id', $clientId)->where('status', HostingStatus::Suspended->value)->count();

        return [
            Stat::make('Total Hosting', (string) $total)
                ->description('All hosting accounts')
                ->icon('heroicon-o-server')
                ->color('info'),
            Stat::make('Active', (string) $active)
                ->description('Currently active')
                ->icon('heroicon-o-check-circle')
                ->color('success'),
            Stat::make('Expiring Soon', (string) $expiring)
                ->description('Within 30 days')
                ->icon('heroicon-o-clock')
                ->color('warning'),
            Stat::make('Suspended', (string) $suspended)
                ->description('Needs attention')
                ->icon('heroicon-o-pause-circle')
                ->color('danger'),
        ];
    }
}
