<?php

namespace App\Filament\Admin\Resources\WebsitePackages\Pages;

use App\Filament\Admin\Resources\WebsitePackages\WebsitePackageResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditWebsitePackage extends EditRecord
{
    protected static string $resource = WebsitePackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
