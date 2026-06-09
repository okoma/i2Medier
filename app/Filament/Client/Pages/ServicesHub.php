<?php

namespace App\Filament\Client\Pages;

use App\Models\OnboardingAddon;
use App\Models\OnboardingService;
use App\Models\ServiceSubscription;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Collection;

class ServicesHub extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedWrenchScrewdriver;

    protected static ?int $navigationSort = 3;

    protected static ?string $title = 'Services';

    protected string $view = 'filament.client.pages.services-hub';

    public Collection $subscriptions;

    public Collection $catalogServices;

    public Collection $addons;

    public int $activeSubscriptions = 0;

    public int $expiringSoon = 0;

    public function mount(): void
    {
        /** @var \App\Models\User|null $user */
        $user = auth()->user();

        $this->subscriptions = ServiceSubscription::query()
            ->with(['onboardingService', 'onboardingVariant', 'website'])
            ->where('client_id', $user?->client_id)
            ->latest()
            ->get();

        $this->catalogServices = OnboardingService::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $this->addons = OnboardingAddon::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->limit(6)
            ->get();

        $this->activeSubscriptions = $this->subscriptions->where('status', 'active')->count();
        $this->expiringSoon = $this->subscriptions
            ->filter(fn (ServiceSubscription $subscription): bool => $subscription->expires_at !== null && $subscription->expires_at->isBetween(now(), now()->addDays(30)))
            ->count();
    }

}
