<?php

namespace App\Filament\Admin\Resources\OnboardingServices\Pages;

use App\Filament\Admin\Resources\OnboardingServices\OnboardingServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOnboardingServices extends ListRecords
{
    protected static string $resource = OnboardingServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
