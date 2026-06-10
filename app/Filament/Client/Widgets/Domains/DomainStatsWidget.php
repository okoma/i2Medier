<?php

namespace App\Filament\Client\Widgets\Domains;

use App\Enums\DomainStatus;
use App\Models\Domain;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class DomainStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $clientId = Auth::user()?->client_id;

        $total        = Domain::where('client_id', $clientId)->count();
        $active       = Domain::where('client_id', $clientId)->where('status', DomainStatus::Active->value)->count();
        $expiring     = Domain::where('client_id', $clientId)->expiringSoon()->count();
        $expired      = Domain::where('client_id', $clientId)->where('status', DomainStatus::Expired->value)->count();

        return [
            Stat::make('Total Domains', (string) $total)
                ->description('All domains')
                ->icon('heroicon-o-globe-alt')
                ->color('warning'),
            Stat::make('Active', (string) $active)
                ->description('Currently active')
                ->icon('heroicon-o-check-circle')
                ->color('success'),
            Stat::make('Expiring Soon', (string) $expiring)
                ->description('Within 30 days')
                ->icon('heroicon-o-clock')
                ->color('warning'),
            Stat::make('Expired', (string) $expired)
                ->description('Needs renewal')
                ->icon('heroicon-o-x-circle')
                ->color('danger'),
        ];
    }
}
