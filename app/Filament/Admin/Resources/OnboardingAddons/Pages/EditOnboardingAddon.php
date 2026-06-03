<?php

namespace App\Filament\Admin\Resources\OnboardingAddons\Pages;

use App\Filament\Admin\Resources\OnboardingAddons\OnboardingAddonResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOnboardingAddon extends EditRecord
{
    protected static string $resource = OnboardingAddonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
