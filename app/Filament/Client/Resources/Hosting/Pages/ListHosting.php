<?php

namespace App\Filament\Client\Resources\Hosting\Pages;

use App\Filament\Client\Resources\Hosting\HostingResource;
use Filament\Resources\Pages\ListRecords;

class ListHosting extends ListRecords
{
    protected static string $resource = HostingResource::class;

    protected string $view = 'filament.client.resources.hosting.pages.list-hosting';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
