<?php

namespace App\Filament\Client\Pages;

use App\Filament\Client\Widgets\Dashboard\DashboardStats;
use App\Filament\Client\Widgets\Dashboard\RecentInvoicesWidget;
use App\Filament\Client\Widgets\Dashboard\RecentProjectsWidget;
use App\Filament\Client\Widgets\Dashboard\RecentTicketsWidget;
use App\Filament\Client\Widgets\UpcomingRenewals;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected function getWidgets(): array
    {
        return [
            DashboardStats::class,
            RecentProjectsWidget::class,
            UpcomingRenewals::class,
            RecentInvoicesWidget::class,
            RecentTicketsWidget::class,
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [];
    }

    protected function getFooterWidgets(): array
    {
        return [];
    }
}
