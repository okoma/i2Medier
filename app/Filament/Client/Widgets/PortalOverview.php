<?php

namespace App\Filament\Client\Widgets;

use App\Models\Invoice;
use App\Models\ServiceSubscription;
use App\Models\SupportTicket;
use App\Models\Website;
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

        $websitesQuery = Website::query()->where('client_id', $user->client_id);

        if ($user->isClientMember()) {
            $websiteIds = $user->assignedWebsites()->pluck('websites.id');

            $websitesQuery->whereIn('id', $websiteIds);
        }

        $websiteIds = (clone $websitesQuery)->pluck('id');

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
            Stat::make('Managed Websites', (string) $websiteIds->count())
                ->description('Projects currently visible in your portal')
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
