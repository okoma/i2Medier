<?php

namespace App\Filament\Client\Pages;

use App\Models\Project;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Collection;

class ProjectsHub extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static string|\UnitEnum|null $navigationGroup = 'Client Portal';

    protected static ?int $navigationSort = 1;

    protected static ?string $title = 'Projects';

    protected string $view = 'filament.client.pages.projects-hub';

    public Collection $projects;

    public int $activeProjects = 0;

    public int $atRiskProjects = 0;

    public int $pendingSetupProjects = 0;

    public function mount(): void
    {
        /** @var \App\Models\User|null $user */
        $user = auth()->user();

        $this->projects = Project::query()
            ->with(['serviceSubscriptions.onboardingService', 'serviceSubscriptions.onboardingVariant', 'onboardingTasks'])
            ->where('client_id', $user?->client_id)
            ->latest()
            ->get();
        $this->activeProjects = $this->projects->where('status', 'converted')->count();
        $this->atRiskProjects = $this->projects->where('status', 'negotiating')->count();
        $this->pendingSetupProjects = $this->projects->where('status', 'enquiry')->count();
    }

}
