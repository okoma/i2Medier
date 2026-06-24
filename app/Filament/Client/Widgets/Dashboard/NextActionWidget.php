<?php

namespace App\Filament\Client\Widgets\Dashboard;

use App\Enums\ProjectStatus;
use App\Models\Invoice;
use App\Models\OnboardingTask;
use App\Models\Project;
use App\Models\ServiceSubscription;
use App\Models\User;
use Filament\Widgets\Widget;

class NextActionWidget extends Widget
{
    protected int|string|array $columnSpan = 'full';

    protected string $view = 'filament.client.widgets.dashboard.next-action-widget';

    public array $action = [];

    public function mount(): void
    {
        $this->action = $this->resolveNextAction();
    }

    private function resolveNextAction(): array
    {
        /** @var User|null $user */
        $user = auth()->user();
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
                'button_label' => 'Open task',
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
                    'description' => 'An invoice is waiting for payment or confirmation before we can move the project forward.',
                    'meta' => $dueLabel,
                    'button_label' => 'View invoice',
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
            ->latest()
            ->first();

        if ($project) {
            return [
                'eyebrow' => 'Project status',
                'title' => 'We are reviewing your enquiry',
                'description' => 'Your brief has been received. We are preparing the next delivery step and will update the portal as soon as something needs your input.',
                'meta' => 'Project ' . $project->reference . ' · ' . $project->status->getLabel(),
                'button_label' => 'View projects',
                'button_url' => filament()->getUrl() . '/projects',
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
                'description' => 'One of your active services is nearing renewal. Check the schedule and make sure everything stays uninterrupted.',
                'meta' => $renewal->catalog_name . ' · ' . $renewal->expires_at?->format('d M Y'),
                'button_label' => 'View services',
                'button_url' => filament()->getUrl() . '/services',
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
            'description' => 'Your onboarding, billing, and project actions are currently up to date. We will surface the next important step here as soon as it appears.',
            'meta' => 'We will keep this updated automatically',
            'button_label' => 'Open dashboard',
            'button_url' => filament()->getUrl(),
            'tone' => 'success',
        ];
    }
}
