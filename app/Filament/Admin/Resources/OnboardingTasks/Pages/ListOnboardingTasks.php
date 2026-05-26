<?php

namespace App\Filament\Admin\Resources\OnboardingTasks\Pages;

use App\Filament\Admin\Resources\OnboardingTasks\OnboardingTaskResource;
use Filament\Resources\Pages\ListRecords;

class ListOnboardingTasks extends ListRecords
{
    protected static string $resource = OnboardingTaskResource::class;
}
