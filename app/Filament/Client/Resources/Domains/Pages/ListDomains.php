<?php

namespace App\Filament\Client\Resources\Domains\Pages;

use App\Filament\Client\Resources\Domains\DomainResource;
use Filament\Resources\Pages\ListRecords;

class ListDomains extends ListRecords
{
    protected static string $resource = DomainResource::class;

    protected string $view = 'filament.client.resources.domains.pages.list-domains';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
