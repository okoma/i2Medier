<?php

namespace App\Filament\Admin\Resources\WebsitePackages\Pages;

use App\Filament\Admin\Resources\WebsitePackages\WebsitePackageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewWebsitePackage extends ViewRecord
{
    protected static string $resource = WebsitePackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
