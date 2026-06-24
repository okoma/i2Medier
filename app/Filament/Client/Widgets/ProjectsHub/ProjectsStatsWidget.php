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

        $all = Project::where('client_id', $clientId)->get();

        $total = $all->count();
        $openRequests = $all->filter(fn ($project) => $project->status?->value === 'enquiry')->count();
        $inReview = $all->filter(fn ($project) => in_array($project->status?->value, ['proposal_sent', 'negotiating']))->count();
        $activeProjects = $all->filter(fn ($project) => $project->status?->value === 'converted')->count();

        $pct = fn (int $count): string => $total > 0 ? round(($count / $total) * 100, 1) . '% of total' : '0% of total';

        return [
            Stat::make('Total Projects', (string) $total)
                ->description('All time')
                ->icon('heroicon-o-briefcase')
                ->color('gray'),
            Stat::make('Open Requests', (string) $openRequests)
                ->description($pct($openRequests))
                ->icon('heroicon-o-inbox-stack')
                ->color('warning'),
            Stat::make('In Review', (string) $inReview)
                ->description($pct($inReview))
                ->icon('heroicon-o-clock')
                ->color('info'),
            Stat::make('Active Projects', (string) $activeProjects)
                ->description($pct($activeProjects))
                ->icon('heroicon-o-check-circle')
                ->color('success'),
        ];
    }
}
