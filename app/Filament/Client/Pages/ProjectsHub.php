<?php

namespace App\Filament\Client\Pages;

use App\Models\Project;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Collection;

class ProjectsHub extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static ?string $slug = 'projects';

    protected static ?int $navigationSort = 2;

    protected static ?string $title = 'Projects';

    protected string $view = 'filament.client.pages.projects-hub';

    public array $stats = [];

    public array $projects = [];

    public function mount(): void
    {
        $projects = Project::query()
            ->with(['serviceSubscriptions.onboardingService', 'serviceSubscriptions.onboardingVariant', 'onboardingTasks'])
            ->where('client_id', auth()->user()?->client_id)
            ->latest('created_at')
            ->get();

        $this->stats = $this->buildStats($projects);
        $this->projects = $projects->map(fn (Project $project): array => $this->mapProject($project))->all();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('startProject')
                ->label('Start New Project')
                ->icon('heroicon-o-plus-circle')
                ->url(StartProject::getUrl(panel: 'client'))
                ->color('primary'),
        ];
    }

    private function buildStats(Collection $projects): array
    {
        $total = $projects->count();
        $openRequests = $projects->filter(fn (Project $project) => $project->status?->value === 'enquiry')->count();
        $inReview = $projects->filter(fn (Project $project) => in_array($project->status?->value, ['proposal_sent', 'negotiating']))->count();
        $activeProjects = $projects->filter(fn (Project $project) => $project->status?->value === 'converted')->count();

        return [
            [
                'label' => 'Total Projects',
                'value' => (string) $total,
                'description' => 'All requests and active work',
                'icon' => 'heroicon-o-briefcase',
                'color' => 'slate',
            ],
            [
                'label' => 'Open Requests',
                'value' => (string) $openRequests,
                'description' => 'Recently submitted enquiries',
                'icon' => 'heroicon-o-inbox-stack',
                'color' => 'amber',
            ],
            [
                'label' => 'In Review',
                'value' => (string) $inReview,
                'description' => 'Proposal or alignment stage',
                'icon' => 'heroicon-o-clock',
                'color' => 'sky',
            ],
            [
                'label' => 'Active Projects',
                'value' => (string) $activeProjects,
                'description' => 'Approved or live work',
                'icon' => 'heroicon-o-check-badge',
                'color' => 'emerald',
            ],
        ];
    }

    private function mapProject(Project $project): array
    {
        $serviceNames = collect($project->services ?? [])
            ->pluck('variant_name')
            ->filter()
            ->values();

        if ($serviceNames->isEmpty()) {
            $serviceNames = collect($project->services ?? [])
                ->pluck('service_name')
                ->filter()
                ->values();
        }

        $pendingTask = $project->onboardingTasks
            ->first(fn ($task) => $task->status === 'pending');

        return [
            'reference' => $project->reference,
            'stage' => $this->clientStageLabel($project),
            'stage_color' => $this->clientStageColor($project),
            'services' => $serviceNames->all(),
            'services_summary' => $serviceNames->isNotEmpty()
                ? $serviceNames->take(3)->join(', ')
                : 'Custom project request',
            'next_step' => $pendingTask?->title ?? $this->defaultNextStep($project),
            'next_step_description' => $pendingTask?->description,
            'created_at' => $project->created_at?->format('M d, Y'),
            'updated_since' => $project->updated_at?->diffForHumans(),
            'status_value' => $project->status?->value,
        ];
    }

    private function clientStageLabel(Project $project): string
    {
        return match ($project->status?->value) {
            'enquiry' => 'Request Received',
            'proposal_sent' => 'Proposal Shared',
            'negotiating' => 'In Review',
            'converted' => 'Active',
            'declined' => 'Closed',
            default => $project->status?->getLabel() ?? 'Project',
        };
    }

    private function clientStageColor(Project $project): string
    {
        return match ($project->status?->value) {
            'enquiry' => 'amber',
            'proposal_sent' => 'sky',
            'negotiating' => 'indigo',
            'converted' => 'emerald',
            'declined' => 'slate',
            default => 'slate',
        };
    }

    private function defaultNextStep(Project $project): string
    {
        return match ($project->status?->value) {
            'enquiry' => 'We are reviewing your request',
            'proposal_sent' => 'Review the proposal we shared',
            'negotiating' => 'Awaiting alignment on scope',
            'converted' => 'Project is active',
            'declined' => 'No further action',
            default => 'No next step available',
        };
    }
}
