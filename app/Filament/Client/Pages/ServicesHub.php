<?php

namespace App\Filament\Client\Pages;

use App\Models\ServiceSubscription;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Collection;

class ServicesHub extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedWrenchScrewdriver;

    protected static ?string $slug = 'services';

    protected static ?int $navigationSort = 3;

    protected static ?string $title = 'Services';

    protected string $view = 'filament.client.pages.services-hub';

    public array $stats = [];

    public array $services = [];

    public function mount(): void
    {
        $services = ServiceSubscription::query()
            ->with(['onboardingService', 'onboardingVariant'])
            ->where('client_id', auth()->user()?->client_id)
            ->orderByRaw("case when status = 'active' then 0 when status = 'suspended' then 1 when status = 'expired' then 2 else 3 end")
            ->orderBy('expires_at')
            ->get();

        $this->stats = $this->buildStats($services);
        $this->services = $services->map(fn (ServiceSubscription $service): array => $this->mapService($service))->all();
    }

    private function buildStats(Collection $services): array
    {
        $total = $services->count();
        $active = $services->where('status', 'active')->count();
        $expiringSoon = $services->filter(fn (ServiceSubscription $service) =>
            $service->status === 'active'
            && $service->expires_at
            && $service->expires_at->isBetween(now(), now()->addDays(30))
        )->count();
        $suspended = $services->where('status', 'suspended')->count();

        return [
            [
                'label' => 'Total Services',
                'value' => (string) $total,
                'description' => 'All subscription records',
                'icon' => 'heroicon-o-circle-stack',
                'color' => 'slate',
            ],
            [
                'label' => 'Active',
                'value' => (string) $active,
                'description' => 'Currently running services',
                'icon' => 'heroicon-o-check-circle',
                'color' => 'emerald',
            ],
            [
                'label' => 'Expiring Soon',
                'value' => (string) $expiringSoon,
                'description' => 'Renewal due within 30 days',
                'icon' => 'heroicon-o-clock',
                'color' => 'amber',
            ],
            [
                'label' => 'Suspended',
                'value' => (string) $suspended,
                'description' => 'Temporarily paused services',
                'icon' => 'heroicon-o-pause-circle',
                'color' => 'sky',
            ],
        ];
    }

    private function mapService(ServiceSubscription $service): array
    {
        $status = $this->serviceStatusState($service);

        return [
            'id' => $service->id,
            'name' => $service->catalog_name ?? 'Service',
            'plan' => $service->onboardingService?->name,
            'direction' => $service->onboardingVariant?->name,
            'status' => $status['label'],
            'status_color' => $status['color'],
            'price' => number_format((float) $service->price, 2),
            'currency' => $service->currency ?? 'NGN',
            'billing_cycle' => $service->billing_cycle ? ucwords(str_replace('_', ' ', $service->billing_cycle)) : '—',
            'expires_at' => $service->expires_at?->format('M d, Y'),
            'expires_in' => $service->expires_at ? now()->diffInDays($service->expires_at, false) : null,
            'last_renewed_at' => $service->last_renewed_at?->format('M d, Y'),
            'manage_url' => filament()->getUrl() . '/service-subscriptions/' . $service->id,
            'reorder_url' => StartProject::getUrl(parameters: array_filter([
                'services' => $service->onboardingService?->key,
                'platform' => $service->onboardingVariant?->key,
                'source_page' => 'portal-services',
                'source_label' => 'Client Portal Services',
            ], fn ($value) => filled($value)), panel: 'client'),
            'renewal_note' => $this->renewalNote($service),
        ];
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
