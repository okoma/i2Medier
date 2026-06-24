<?php

namespace App\Filament\Client\Pages;

use App\Models\OnboardingAddon;
use App\Models\OnboardingService;
use Filament\Actions\Action;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Http\Request;

class StartProject extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedPlusCircle;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Start New Project';

    protected string $view = 'filament.client.pages.start-project';

    public array $onboardingCatalog = [];

    public array $onboardingPreset = [];

    public function mount(): void
    {
        $this->onboardingCatalog = $this->buildOnboardingCatalog();
        $this->onboardingPreset = $this->buildOnboardingPreset(request(), $this->onboardingCatalog);
    }

    public function getHeaderActions(): array
    {
        return [
            Action::make('backToServices')
                ->label('Back to Services')
                ->icon('heroicon-o-arrow-left')
                ->url(ServicesHub::getUrl(panel: 'client'))
                ->color('gray'),
        ];
    }

    private function buildOnboardingPreset(Request $request, array $catalog): array
    {
        $services = collect(explode(',', (string) $request->query('services', '')))
            ->map(fn (string $value): string => trim($value))
            ->filter()
            ->values();

        $serviceMap = collect($catalog)->keyBy('id');
        $validServices = $services->filter(fn (string $serviceId): bool => $serviceMap->has($serviceId))->values();

        $platform = trim((string) $request->query('platform', ''));
        $addons = collect(explode(',', (string) $request->query('addons', '')))
            ->map(fn (string $value): string => trim($value))
            ->filter()
            ->values();

        $validPlatform = '';
        if ($platform !== '' && $validServices->count() === 1) {
            $service = $serviceMap->get($validServices->first());
            $platforms = collect($service['platforms'] ?? [])->pluck('id');
            if ($platforms->contains($platform)) {
                $validPlatform = $platform;
            }
        }

        $validAddons = $addons->filter(function (string $addonId) use ($validServices, $serviceMap, $validPlatform): bool {
            foreach ($validServices as $serviceId) {
                $service = $serviceMap->get($serviceId);

                if (collect($service['addons'] ?? [])->pluck('id')->contains($addonId)) {
                    return true;
                }

                foreach ($service['platforms'] ?? [] as $platform) {
                    if ($validPlatform !== '' && $platform['id'] !== $validPlatform) {
                        continue;
                    }

                    if (collect($platform['addons'] ?? [])->pluck('id')->contains($addonId)) {
                        return true;
                    }
                }
            }

            return false;
        })->values();

        $user = $request->user();
        $client = $user?->client;

        return [
            'services' => $validServices->all(),
            'platform' => $validPlatform,
            'addons' => $validAddons->all(),
            'contact' => [
                'name' => trim((string) ($user?->name ?? '')),
                'business' => trim((string) ($client?->company_name ?? '')),
                'email' => trim((string) ($user?->email ?? $client?->email ?? '')),
                'phone' => trim((string) ($user?->phone ?? $user?->whatsapp_number ?? $client?->phone ?? '')),
                'country' => trim((string) ($client?->country ?? '')),
            ],
            'source_page' => trim((string) $request->query('source_page', 'portal-services')),
            'source_label' => trim((string) $request->query('source_label', 'Client Portal Services')),
            'locked' => $request->boolean('locked') && $validServices->count() > 0,
        ];
    }

    private function buildOnboardingCatalog(): array
    {
        return OnboardingService::query()
            ->where('is_active', true)
            ->with([
                'addons' => fn ($query) => $query->where('is_active', true)->orderBy('sort_order'),
                'variants' => fn ($query) => $query->where('is_active', true)->orderBy('sort_order')->with([
                    'addons' => fn ($addonQuery) => $addonQuery->where('is_active', true)->orderBy('sort_order'),
                ]),
            ])
            ->orderBy('sort_order')
            ->get()
            ->map(function (OnboardingService $service): array {
                return [
                    'id' => $service->key,
                    'name' => $service->name,
                    'desc' => $service->description,
                    'icon' => $service->icon,
                    'price' => (float) $service->base_price,
                    'priceLabel' => $service->price_label,
                    'type' => $service->billing_type === 'recurring' ? 'monthly' : 'one-time',
                    'showOnPublicOnboarding' => (bool) $service->show_on_public_onboarding,
                    'addons' => $service->addons->map(fn ($addon): array => $this->mapAddon($addon))->values()->all(),
                    'platforms' => $service->variants->map(function ($variant): array {
                        return [
                            'id' => $variant->key,
                            'name' => $variant->name,
                            'desc' => $variant->description,
                            'price' => (float) $variant->base_price,
                            'priceLabel' => $variant->price_label,
                            'addons' => $variant->addons->map(fn ($addon): array => $this->mapAddon($addon))->values()->all(),
                        ];
                    })->values()->all(),
                ];
            })
            ->values()
            ->all();
    }

    private function mapAddon(OnboardingAddon $addon): array
    {
        return [
            'id' => $addon->key,
            'name' => $addon->name,
            'price' => (float) $addon->price,
            'desc' => $addon->description,
            'monthly' => $addon->billing_type === 'recurring' || $addon->billing_cycle === 'monthly',
            'quantity' => (bool) $addon->is_quantity_based,
            'quantityLabel' => $addon->quantity_label,
        ];
    }
}
