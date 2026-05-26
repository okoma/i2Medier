<?php

namespace App\Filament\Client\Pages;

use App\Models\Website;
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

        $query = Website::query()
            ->with(['package', 'serviceSubscriptions.service', 'onboardingTasks'])
            ->where('client_id', $user?->client_id);

        if ($user?->isClientMember()) {
            $query->whereIn('id', $user->assignedWebsites()->pluck('websites.id'));
        }

        $this->projects = $query->latest()->get();
        $this->activeProjects = $this->projects->where('health_state', 'active')->count();
        $this->atRiskProjects = $this->projects->where('health_state', 'at_risk')->count();
        $this->pendingSetupProjects = $this->projects->where('health_state', 'pending_setup')->count();
    }

}
