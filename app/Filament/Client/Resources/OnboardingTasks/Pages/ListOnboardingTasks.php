<?php

namespace App\Filament\Client\Resources\OnboardingTasks\Pages;

use App\Filament\Client\Resources\OnboardingTasks\OnboardingTaskResource;
use Filament\Resources\Pages\ListRecords;

class ListOnboardingTasks extends ListRecords
{
    protected static string $resource = OnboardingTaskResource::class;
}
