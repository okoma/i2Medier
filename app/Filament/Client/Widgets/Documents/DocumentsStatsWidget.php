<?php

namespace App\Filament\Client\Widgets\Documents;

use App\Models\Document;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DocumentsStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $clientId = auth()->user()?->client_id;

        $totalCount    = Document::where('client_id', $clientId)->count();
        $thisMonthCount = Document::where('client_id', $clientId)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        $categoryCount = Document::where('client_id', $clientId)
            ->whereNotNull('category')
            ->distinct('category')
            ->count('category');
        $totalSizeBytes = (int) Document::where('client_id', $clientId)->sum('size');

        $fmt = fn (int $bytes): string => match (true) {
            $bytes >= 1_073_741_824 => round($bytes / 1_073_741_824, 1) . ' GB',
            $bytes >= 1_048_576     => round($bytes / 1_048_576, 1) . ' MB',
            $bytes >= 1_024         => round($bytes / 1_024, 1) . ' KB',
            default                 => $bytes . ' B',
        };

        return [
            Stat::make('Total Documents', (string) $totalCount)
                ->description('All documents')
                ->icon('heroicon-o-document')
                ->color('warning'),
            Stat::make('This Month', (string) $thisMonthCount)
                ->description('Added ' . now()->format('F Y'))
                ->icon('heroicon-o-calendar')
                ->color('info'),
            Stat::make('Categories', (string) $categoryCount)
                ->description('Distinct types')
                ->icon('heroicon-o-tag')
                ->color('success'),
            Stat::make('Total Size', $fmt($totalSizeBytes))
                ->description('Storage used')
                ->icon('heroicon-o-server')
                ->color('gray'),
        ];
    }
}
