<?php

namespace App\Filament\Client\Resources\Documents\Pages;

use App\Filament\Client\Resources\Documents\DocumentResource;
use App\Filament\Client\Widgets\Documents\DocumentsStatsWidget;
use Filament\Resources\Pages\ListRecords;

class ListDocuments extends ListRecords
{
    protected static string $resource = DocumentResource::class;

    public function getHeaderWidgets(): array
    {
        return [DocumentsStatsWidget::class];
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
