<?php

namespace App\Filament\Client\Resources\Domains\Pages;

use App\Filament\Client\Resources\Domains\DomainResource;
use App\Filament\Client\Widgets\Domains\DomainStatsWidget;
use Filament\Resources\Pages\ListRecords;

class ListDomains extends ListRecords
{
    protected static string $resource = DomainResource::class;

    public function getHeaderWidgets(): array
    {
        return [DomainStatsWidget::class];
    }
}
