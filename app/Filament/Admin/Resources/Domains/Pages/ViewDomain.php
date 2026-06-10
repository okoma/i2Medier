<?php

namespace App\Filament\Admin\Resources\Domains\Pages;

use App\Filament\Admin\Resources\Domains\DomainResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDomain extends ViewRecord
{
    protected static string $resource = DomainResource::class;

    protected function getHeaderActions(): array
    {
        return [EditAction::make()];
    }
}
