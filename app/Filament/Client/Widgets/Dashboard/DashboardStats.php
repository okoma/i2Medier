<?php

namespace App\Filament\Client\Widgets\Dashboard;

use App\Models\Invoice;
use App\Models\Project;
use App\Models\ServiceSubscription;
use App\Models\SupportTicket;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $clientId = auth()->user()?->client_id;

        $projectCount = Project::where('client_id', $clientId)
            ->where('status', '!=', 'declined')
            ->count();

        $pendingInvoices = Invoice::where('client_id', $clientId)
            ->whereNotIn('status', ['paid', 'cancelled', 'refunded'])
            ->count();

        $activeSubscriptions = ServiceSubscription::where('client_id', $clientId)
            ->where('status', 'active')
            ->count();

        $upcomingRenewals = ServiceSubscription::where('client_id', $clientId)
            ->where('status', 'active')
            ->whereNotNull('expires_at')
            ->where('expires_at', '>', now())
            ->count();

        $openTickets = SupportTicket::where('client_id', $clientId)
            ->whereNotIn('status', ['resolved', 'closed'])
            ->count();

        return [
            Stat::make('Active Projects', (string) $projectCount)
                ->description('Your projects')
                ->icon('heroicon-o-briefcase')
                ->color('warning')
                ->url(filament()->getUrl() . '/projects'),
            Stat::make('Pending Invoices', (string) $pendingInvoices)
                ->description('Awaiting payment')
                ->icon('heroicon-o-document-text')
                ->color($pendingInvoices > 0 ? 'danger' : 'success')
                ->url(filament()->getUrl() . '/invoices'),
            Stat::make('Active Subscriptions', (string) $activeSubscriptions)
                ->description('Recurring services')
                ->icon('heroicon-o-circle-stack')
                ->color('success')
                ->url(filament()->getUrl() . '/services'),
            Stat::make('Upcoming Renewals', (string) $upcomingRenewals)
                ->description('Expiring services')
                ->icon('heroicon-o-calendar')
                ->color('info')
                ->url(filament()->getUrl() . '/services'),
            Stat::make('Open Tickets', (string) $openTickets)
                ->description('Support requests')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color($openTickets > 0 ? 'info' : 'success')
                ->url(filament()->getUrl() . '/support-tickets'),
        ];
    }
}
