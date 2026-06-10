<?php

namespace App\Filament\Client\Widgets\SupportTickets;

use App\Models\SupportTicket;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TicketsStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $user     = auth()->user();
        $clientId = $user?->client_id;

        $query = SupportTicket::query()->where('client_id', $clientId);

        if ($user?->isClientMember()) {
            $query->where('submitted_by', $user->id);
        }

        $all           = (clone $query);
        $totalCount    = (clone $all)->count();
        $openCount     = (clone $all)->where('status', 'open')->count();
        $inProgress    = (clone $all)->where('status', 'in_progress')->count();
        $waitingCount  = (clone $all)->where('status', 'waiting_reply')->count();
        $closedCount   = (clone $all)->whereIn('status', ['closed', 'resolved'])->count();

        return [
            Stat::make('Total Tickets', (string) $totalCount)
                ->description('All time')
                ->icon('heroicon-o-ticket')
                ->color('warning'),
            Stat::make('Open', (string) $openCount)
                ->description('Awaiting response')
                ->icon('heroicon-o-envelope-open')
                ->color($openCount > 0 ? 'danger' : 'success'),
            Stat::make('In Progress', (string) $inProgress)
                ->description('Being worked on')
                ->icon('heroicon-o-arrow-path')
                ->color($inProgress > 0 ? 'info' : 'success'),
            Stat::make('Waiting Reply', (string) $waitingCount)
                ->description('Awaiting your response')
                ->icon('heroicon-o-clock')
                ->color($waitingCount > 0 ? 'warning' : 'success'),
            Stat::make('Resolved', (string) $closedCount)
                ->description('Closed or resolved')
                ->icon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
}
