<?php

namespace App\Filament\Admin\Resources\Addons\Pages;

use App\Filament\Admin\Resources\Addons\AddonResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAddon extends ViewRecord
{
    protected static string $resource = AddonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
