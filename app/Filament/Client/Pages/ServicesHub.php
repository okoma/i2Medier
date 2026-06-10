<?php

namespace App\Filament\Client\Pages;

use App\Filament\Client\Widgets\ServicesHub\ServicesStatsWidget;
use App\Filament\Client\Widgets\ServicesHub\ServicesTableWidget;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class ServicesHub extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedWrenchScrewdriver;

    protected static ?int $navigationSort = 3;

    protected static ?string $title = 'Services';

    public function getHeaderWidgets(): array
    {
        return [ServicesStatsWidget::class];
    }

    public function getFooterWidgets(): array
    {
        return [ServicesTableWidget::class];
    }
}
