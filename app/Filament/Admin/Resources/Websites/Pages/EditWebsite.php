<?php

namespace App\Filament\Admin\Resources\Websites\Pages;

use App\Filament\Admin\Resources\Websites\WebsiteResource;
use App\Support\PackageProvisioner;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditWebsite extends EditRecord
{
    protected static string $resource = WebsiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('provisionPackage')
                ->label('Provision Package')
                ->requiresConfirmation()
                ->visible(fn (): bool => filled($this->record->package_id))
                ->action(fn () => PackageProvisioner::provision($this->record)),
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
