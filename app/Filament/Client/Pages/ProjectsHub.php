<?php

namespace App\Filament\Client\Pages;

use App\Filament\Client\Widgets\ProjectsHub\ProjectsStatsWidget;
use App\Filament\Client\Widgets\ProjectsHub\ProjectsTableWidget;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class ProjectsHub extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static ?int $navigationSort = 2;

    protected static ?string $title = 'Projects';

    public function getHeaderWidgets(): array
    {
        return [ProjectsStatsWidget::class];
    }

    public function getFooterWidgets(): array
    {
        return [ProjectsTableWidget::class];
    }
}
