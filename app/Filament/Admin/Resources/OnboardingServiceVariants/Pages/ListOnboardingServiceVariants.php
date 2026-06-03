<?php

namespace App\Filament\Admin\Resources\OnboardingServiceVariants\Pages;

use App\Filament\Admin\Resources\OnboardingServiceVariants\OnboardingServiceVariantResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOnboardingServiceVariants extends ListRecords
{
    protected static string $resource = OnboardingServiceVariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
