<?php

namespace App\Filament\Admin\Resources\OnboardingAddons\Pages;

use App\Filament\Admin\Resources\OnboardingAddons\OnboardingAddonResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOnboardingAddons extends ListRecords
{
    protected static string $resource = OnboardingAddonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
