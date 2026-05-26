<?php

namespace App\Filament\Client\Pages;

use App\Models\Addon;
use App\Models\Service;
use App\Models\ServiceSubscription;
use App\Models\WebsitePackage;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Collection;

class ServicesHub extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedWrenchScrewdriver;

    protected static string|\UnitEnum|null $navigationGroup = 'Client Portal';

    protected static ?int $navigationSort = 2;

    protected static ?string $title = 'Services';

    protected string $view = 'filament.client.pages.services-hub';

    public Collection $subscriptions;

    public Collection $catalogServices;

    public Collection $featuredPackages;

    public Collection $addons;

    public int $activeSubscriptions = 0;

    public int $expiringSoon = 0;

    public function mount(): void
    {
        /** @var \App\Models\User|null $user */
        $user = auth()->user();

        $this->subscriptions = ServiceSubscription::query()
            ->with(['service', 'website'])
            ->where('client_id', $user?->client_id)
            ->latest()
            ->get();

        $this->catalogServices = Service::query()
            ->active()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $this->featuredPackages = WebsitePackage::query()
            ->where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

        $this->addons = Addon::query()
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
