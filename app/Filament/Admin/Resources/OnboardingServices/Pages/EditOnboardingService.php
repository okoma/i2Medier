<?php

namespace App\Filament\Admin\Resources\OnboardingServices\Pages;

use App\Filament\Admin\Resources\OnboardingServices\OnboardingServiceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOnboardingService extends EditRecord
{
    protected static string $resource = OnboardingServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
