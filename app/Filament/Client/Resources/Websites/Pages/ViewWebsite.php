<?php

namespace App\Filament\Client\Resources\Websites\Pages;

use App\Filament\Client\Resources\Websites\WebsiteResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewWebsite extends ViewRecord
{
    protected static string $resource = WebsiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
