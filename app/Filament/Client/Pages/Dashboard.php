<?php

namespace App\Filament\Client\Pages;

use App\Enums\ProjectStatus;
use App\Models\Invoice;
use App\Models\OnboardingTask;
use App\Models\Project;
use App\Models\ServiceSubscription;
use App\Models\SupportTicket;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Collection;

class Dashboard extends Page
{
    protected static string $routePath = '/';

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    protected static ?int $navigationSort = -2;

    protected static ?string $title = 'Dashboard';

    protected string $view = 'filament.client.pages.dashboard';

    public array $stats = [];

    public array $nextAction = [];

    public array $projects = [];

    public array $renewals = [];

    public array $invoices = [];

    public array $tickets = [];

    public bool $canViewInvoices = false;

    public function mount(): void
    {
        /** @var User|null $user */
        $user = auth()->user();
        $clientId = $user?->client_id;
        $this->canViewInvoices = $user?->isClientOwner() ?? false;

        $projects = Project::query()
            ->with(['serviceSubscriptions.onboardingService', 'serviceSubscriptions.onboardingVariant'])
            ->where('client_id', $clientId)
            ->latest('created_at')
            ->get();

        $services = ServiceSubscription::query()
            ->with(['onboardingService', 'onboardingVariant'])
            ->where('client_id', $clientId)
            ->get();

        $renewals = ServiceSubscription::query()
            ->with(['onboardingService', 'onboardingVariant'])
            ->where('client_id', $clientId)
            ->whereNotNull('expires_at')
            ->orderBy('expires_at')
            ->limit(5)
            ->get();

        $invoices = $this->canViewInvoices
            ? Invoice::query()
                ->where('client_id', $clientId)
                ->latest('created_at')
                ->limit(5)
                ->get()
            : collect();

        $ticketsQuery = SupportTicket::query()
            ->where('client_id', $clientId)
            ->latest('updated_at');

        if ($user?->isClientMember()) {
            $ticketsQuery->where('submitted_by', $user->id);
        }

        $tickets = $ticketsQuery
            ->limit(5)
            ->get();

        $this->stats = $this->buildStats($projects, $services, $invoices, $tickets);
        $this->nextAction = $this->resolveNextAction($user);
        $this->projects = $projects->take(3)->map(fn (Project $project): array => $this->mapProject($project))->all();
        $this->renewals = $renewals->map(fn (ServiceSubscription $service): array => $this->mapRenewal($service))->all();
        $this->invoices = $invoices->map(fn (Invoice $invoice): array => $this->mapInvoice($invoice))->all();
        $this->tickets = $tickets->map(fn (SupportTicket $ticket): array => $this->mapTicket($ticket))->all();
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

    private function buildStats(
        Collection $projects,
        Collection $services,
        Collection $invoices,
        Collection $tickets,
    ): array {
        $activeProjects = $projects
            ->filter(fn (Project $project) => $project->status?->value !== 'declined')
            ->count();

        $pendingInvoices = $invoices
            ->filter(fn (Invoice $invoice) => ! in_array($invoice->status, ['paid', 'cancelled', 'refunded']))
            ->count();

        $activeServices = $services
            ->where('status', 'active')
            ->count();

        $upcomingRenewals = $services
            ->filter(fn (ServiceSubscription $service) => $service->status === 'active' && $service->expires_at?->isFuture())
            ->count();

        $openTickets = $tickets
            ->filter(fn (SupportTicket $ticket) => ! in_array($ticket->status, ['resolved', 'closed']))
            ->count();

        return [
            [
                'label' => 'Work in Progress',
                'value' => (string) $activeProjects,
                'description' => 'Project requests and active delivery',
                'icon' => 'heroicon-o-briefcase',
                'color' => 'amber',
                'url' => ProjectsHub::getUrl(panel: 'client'),
            ],
            [
                'label' => 'Payments Waiting',
                'value' => (string) $pendingInvoices,
                'description' => 'Invoices that still need attention',
                'icon' => 'heroicon-o-document-text',
                'color' => $pendingInvoices > 0 ? 'rose' : 'emerald',
                'url' => filament()->getUrl() . '/invoices',
            ],
            [
                'label' => 'Live Services',
                'value' => (string) $activeServices,
                'description' => 'Services currently running for your team',
                'icon' => 'heroicon-o-wrench-screwdriver',
                'color' => 'emerald',
                'url' => ServicesHub::getUrl(panel: 'client'),
            ],
            [
                'label' => 'Renewals Ahead',
                'value' => (string) $upcomingRenewals,
                'description' => 'Active services with upcoming renewal dates',
                'icon' => 'heroicon-o-calendar',
                'color' => 'sky',
                'url' => ServicesHub::getUrl(panel: 'client'),
            ],
            [
                'label' => 'Open Support',
                'value' => (string) $openTickets,
                'description' => 'Support conversations still in progress',
                'icon' => 'heroicon-o-chat-bubble-left-right',
                'color' => $openTickets > 0 ? 'sky' : 'slate',
                'url' => filament()->getUrl() . '/support-tickets',
            ],
        ];
    }

    private function resolveNextAction(?User $user): array
    {
        $clientId = $user?->client_id;

        if (! $clientId) {
            return $this->emptyAction();
        }

        $task = OnboardingTask::query()
            ->with('project')
            ->whereHas('project', fn ($query) => $query->where('client_id', $clientId))
            ->where('status', '!=', 'completed')
            ->orderByRaw("case when status = 'blocked' then 0 when status = 'pending' then 1 else 2 end")
            ->orderBy('sort_order')
            ->orderBy('due_at')
            ->first();

        if ($task) {
            return [
                'eyebrow' => 'Next action',
                'title' => $task->title,
                'description' => $task->description ?: 'There is an onboarding step waiting for your attention.',
                'meta' => $task->project?->reference
                    ? 'Project ' . $task->project->reference
                    : 'Onboarding task',
                'button_label' => 'Open Task',
                'button_url' => filament()->getUrl() . '/onboarding-tasks/' . $task->id,
                'tone' => $task->status === 'blocked' ? 'warning' : 'primary',
            ];
        }

        if ($user?->isClientOwner()) {
            $invoice = Invoice::query()
                ->where('client_id', $clientId)
                ->whereNotIn('status', ['paid', 'cancelled', 'refunded'])
                ->orderByRaw('case when due_at < ? then 0 else 1 end', [now()->toDateString()])
                ->orderBy('due_at')
                ->first();

            if ($invoice) {
                $dueLabel = $invoice->due_at?->isPast()
                    ? 'Overdue invoice'
                    : ($invoice->due_at?->format('d M Y') ? 'Due ' . $invoice->due_at->format('d M Y') : 'Pending invoice');

                return [
                    'eyebrow' => 'Billing',
                    'title' => 'Review invoice ' . $invoice->invoice_number,
                    'description' => 'A billing item is waiting for payment or confirmation so the related work can keep moving smoothly.',
                    'meta' => $dueLabel,
                    'button_label' => 'View Invoice',
                    'button_url' => filament()->getUrl() . '/invoices/' . $invoice->id,
                    'tone' => $invoice->isOverdue() ? 'danger' : 'warning',
                ];
            }
        }

        $project = Project::query()
            ->where('client_id', $clientId)
            ->whereIn('status', [
                ProjectStatus::Enquiry->value,
                ProjectStatus::ProposalSent->value,
                ProjectStatus::Negotiating->value,
            ])
            ->latest('created_at')
            ->first();

        if ($project) {
            return [
                'eyebrow' => 'Project status',
                'title' => 'We are reviewing your request',
                'description' => 'Your brief has been received. We will update the portal as soon as the next step is ready for you.',
                'meta' => 'Project ' . $project->reference . ' · ' . $this->clientProjectStage($project),
                'button_label' => 'View Projects',
                'button_url' => ProjectsHub::getUrl(panel: 'client'),
                'tone' => 'info',
            ];
        }

        $renewal = ServiceSubscription::query()
            ->where('client_id', $clientId)
            ->where('status', 'active')
            ->whereNotNull('expires_at')
            ->whereBetween('expires_at', [now(), now()->addDays(30)])
            ->orderBy('expires_at')
            ->first();

        if ($renewal) {
            return [
                'eyebrow' => 'Renewal',
                'title' => 'Review upcoming renewal',
                'description' => 'One of your active services is nearing renewal. Check the schedule so everything continues without interruption.',
                'meta' => ($renewal->catalog_name ?? 'Service') . ' · ' . $renewal->expires_at?->format('d M Y'),
                'button_label' => 'View Services',
                'button_url' => ServicesHub::getUrl(panel: 'client'),
                'tone' => 'success',
            ];
        }

        return $this->emptyAction();
    }

    private function emptyAction(): array
    {
        return [
            'eyebrow' => 'All caught up',
            'title' => 'Nothing is waiting on you right now',
            'description' => 'Your onboarding, billing, and service actions are up to date. When something needs your input, it will show up here first.',
            'meta' => 'Your portal home stays updated automatically',
            'button_label' => 'Start New Project',
            'button_url' => StartProject::getUrl(panel: 'client'),
            'tone' => 'success',
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

        return [
            'reference' => $project->reference,
            'stage' => $this->clientProjectStage($project),
            'stage_color' => $this->projectStageColor($project),
            'summary' => $serviceNames->isNotEmpty()
                ? $serviceNames->take(2)->join(', ')
                : 'Custom project request',
            'created_at' => $project->created_at?->format('M d, Y'),
            'url' => ProjectsHub::getUrl(panel: 'client'),
        ];
    }

    private function mapRenewal(ServiceSubscription $service): array
    {
        $status = $this->serviceStatusState($service);

        return [
            'name' => $service->catalog_name ?? 'Service',
            'status' => $status['label'],
            'status_color' => $status['color'],
            'expires_at' => $service->expires_at?->format('M d, Y') ?? 'No date set',
            'renewal_note' => $this->renewalNote($service),
            'url' => filament()->getUrl() . '/service-subscriptions/' . $service->id,
        ];
    }

    private function mapInvoice(Invoice $invoice): array
    {
        $status = ($invoice->status !== 'paid' && $invoice->due_at?->isPast()) ? 'overdue' : $invoice->status;

        return [
            'number' => $invoice->invoice_number,
            'description' => $invoice->notes ?: 'Invoice',
            'total' => ($invoice->currency ?? 'NGN') . ' ' . number_format((float) $invoice->total, 2),
            'status' => ucfirst(str_replace('_', ' ', $status)),
            'status_color' => match ($status) {
                'paid' => 'emerald',
                'overdue' => 'rose',
                'cancelled', 'refunded' => 'slate',
                default => 'amber',
            },
            'due_at' => $invoice->due_at?->format('M d, Y') ?? 'No due date',
            'url' => filament()->getUrl() . '/invoices/' . $invoice->id,
        ];
    }

    private function mapTicket(SupportTicket $ticket): array
    {
        return [
            'number' => $ticket->ticket_number,
            'subject' => $ticket->subject,
            'status' => ucwords(str_replace('_', ' ', (string) $ticket->status)),
            'status_color' => match ($ticket->status) {
                'resolved', 'closed' => 'emerald',
                'in_progress', 'waiting_reply' => 'sky',
                default => 'amber',
            },
            'updated_at' => $ticket->updated_at?->diffForHumans(),
            'url' => filament()->getUrl() . '/support-tickets/' . $ticket->id,
        ];
    }

    private function clientProjectStage(Project $project): string
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

    private function projectStageColor(Project $project): string
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

    private function serviceStatusState(ServiceSubscription $service): array
    {
        $state = ($service->status === 'active'
            && $service->expires_at
            && $service->expires_at->isBetween(now(), now()->addDays(30)))
            ? 'expiring_soon'
            : $service->status;

        return match ($state) {
            'active' => ['label' => 'Active', 'color' => 'emerald'],
            'expiring_soon' => ['label' => 'Expiring Soon', 'color' => 'amber'],
            'suspended' => ['label' => 'Suspended', 'color' => 'sky'],
            'expired' => ['label' => 'Expired', 'color' => 'slate'],
            'cancelled' => ['label' => 'Cancelled', 'color' => 'slate'],
            default => ['label' => ucwords(str_replace('_', ' ', (string) $state)), 'color' => 'slate'],
        };
    }

    private function renewalNote(ServiceSubscription $service): string
    {
        if (! $service->expires_at) {
            return 'No renewal date set';
        }

        $days = now()->diffInDays($service->expires_at, false);

        if ($days > 30) {
            return 'Renewal is not due soon';
        }

        if ($days >= 0) {
            return 'Due in ' . $days . ' day' . ($days === 1 ? '' : 's');
        }

        $overdue = abs($days);

        return 'Overdue by ' . $overdue . ' day' . ($overdue === 1 ? '' : 's');
    }
}
