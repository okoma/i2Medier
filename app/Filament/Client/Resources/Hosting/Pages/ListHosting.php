<?php

namespace App\Filament\Client\Resources\Hosting\Pages;

use App\Filament\Client\Resources\Hosting\HostingResource;
use App\Filament\Client\Widgets\Hosting\HostingStatsWidget;
use Filament\Resources\Pages\ListRecords;

class ListHosting extends ListRecords
{
    protected static string $resource = HostingResource::class;

    public function getHeaderWidgets(): array
    {
        return [HostingStatsWidget::class];
    }
}
