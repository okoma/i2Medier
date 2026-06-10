<?php

namespace App\Filament\Client\Widgets\ProjectsHub;

use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProjectsStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $clientId = auth()->user()?->client_id;

        $all       = Project::where('client_id', $clientId)->get();
        $total     = $all->count();
        $converted = $all->filter(fn ($p) => $p->status?->value === 'converted')->count();
        $active    = $all->filter(fn ($p) => in_array($p->status?->value, ['enquiry', 'proposal_sent', 'negotiating']))->count();
        $declined  = $all->filter(fn ($p) => $p->status?->value === 'declined')->count();

        $pct = fn (int $n): string => $total > 0 ? round(($n / $total) * 100, 1) . '% of total' : '0% of total';

        return [
            Stat::make('Total Projects', (string) $total)
                ->description('All time')
                ->icon('heroicon-o-briefcase')
                ->color('warning'),
            Stat::make('Converted', (string) $converted)
                ->description($pct($converted))
                ->icon('heroicon-o-check-circle')
                ->color('success'),
            Stat::make('In Progress', (string) $active)
                ->description($pct($active))
                ->icon('heroicon-o-clock')
                ->color('info'),
            Stat::make('Declined', (string) $declined)
                ->description($pct($declined))
                ->icon('heroicon-o-x-circle')
                ->color('danger'),
        ];
    }
}
