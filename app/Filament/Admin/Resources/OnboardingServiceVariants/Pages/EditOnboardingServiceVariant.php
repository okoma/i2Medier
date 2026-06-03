<?php

namespace App\Filament\Admin\Resources\OnboardingServiceVariants\Pages;

use App\Filament\Admin\Resources\OnboardingServiceVariants\OnboardingServiceVariantResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOnboardingServiceVariant extends EditRecord
{
    protected static string $resource = OnboardingServiceVariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
