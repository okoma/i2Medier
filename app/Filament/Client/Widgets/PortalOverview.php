<?php

namespace App\Filament\Client\Widgets;

use App\Models\Invoice;
use App\Models\Project;
use App\Models\ServiceSubscription;
use App\Models\SupportTicket;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PortalOverview extends StatsOverviewWidget
{
    protected ?string $heading = 'Portal Overview';

    protected function getStats(): array
    {
        /** @var \App\Models\User|null $user */
        $user = auth()->user();

        if (! $user?->client_id) {
            return [];
        }

        $projectCount = Project::query()->where('client_id', $user->client_id)->count();

        $activeSubscriptions = ServiceSubscription::query()
            ->where('client_id', $user->client_id)
            ->where('status', 'active')
            ->count();

        $pendingInvoices = Invoice::query()
            ->where('client_id', $user->client_id)
            ->whereNotIn('status', ['paid', 'cancelled', 'refunded'])
            ->count();

        $openTickets = SupportTicket::query()
            ->where('client_id', $user->client_id)
            ->whereNotIn('status', ['resolved', 'closed'])
            ->count();

        return [
            Stat::make('Projects', (string) $projectCount)
                ->description('Projects in your portal')
                ->color('primary'),
            Stat::make('Active Subscriptions', (string) $activeSubscriptions)
                ->description('Recurring services currently running')
                ->color('success'),
            Stat::make('Pending Invoices', (string) $pendingInvoices)
                ->description('Invoices still awaiting payment')
                ->color($pendingInvoices > 0 ? 'warning' : 'success'),
            Stat::make('Open Tickets', (string) $openTickets)
                ->description('Support conversations needing attention')
                ->color($openTickets > 0 ? 'info' : 'gray'),
        ];
    }
}
