<?php

namespace App\Filament\Client\Resources\Documents\Pages;

use App\Filament\Client\Resources\Documents\DocumentResource;
use Filament\Resources\Pages\ListRecords;

class ListDocuments extends ListRecords
{
    protected static string $resource = DocumentResource::class;

    protected string $view = 'filament.client.resources.documents.pages.list-documents';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
