<?php

namespace Database\Seeders;

use App\Models\OnboardingAddon;
use App\Models\OnboardingService;
use App\Models\OnboardingServiceVariant;
use Illuminate\Database\Seeder;

class OnboardingCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $catalog = require database_path('seeders/data/onboarding_catalog.php');

        foreach ($catalog as $serviceIndex => $serviceData) {
            $service = OnboardingService::query()->updateOrCreate(
                ['key' => $serviceData['key']],
                [
                    'name' => $serviceData['name'],
                    'icon' => $serviceData['icon'],
                    'description' => $serviceData['description'],
                    'billing_type' => $serviceData['billing_type'],
                    'billing_cycle' => $serviceData['billing_cycle'],
                    'base_price' => $serviceData['base_price'],
                    'price_label' => $serviceData['price_label'],
                    'currency' => $serviceData['currency'] ?? 'NGN',
                    'is_active' => $serviceData['is_active'] ?? true,
                    'show_on_public_onboarding' => $serviceData['show_on_public_onboarding'] ?? true,
                    'sort_order' => $serviceIndex + 1,
                    'settings' => $serviceData['settings'] ?? null,
                ],
            );

            $this->seedServiceAddons($service, $serviceData['addons'] ?? []);
            $this->seedVariants($service, $serviceData['variants'] ?? []);
        }
    }

    private function seedVariants(OnboardingService $service, array $variants): void
    {
        foreach ($variants as $variantIndex => $variantData) {
            $variant = OnboardingServiceVariant::query()->updateOrCreate(
                [
                    'onboarding_service_id' => $service->id,
                    'key' => $variantData['key'],
                ],
                [
                    'name' => $variantData['name'],
                    'description' => $variantData['description'],
                    'billing_type' => $variantData['billing_type'] ?? 'one_time',
                    'billing_cycle' => $variantData['billing_cycle'] ?? null,
                    'base_price' => $variantData['base_price'],
                    'price_label' => $variantData['price_label'],
                    'currency' => $variantData['currency'] ?? $service->currency,
                    'is_active' => $variantData['is_active'] ?? true,
                    'sort_order' => $variantIndex + 1,
                    'settings' => $variantData['settings'] ?? null,
                ],
            );

            foreach ($variantData['addons'] ?? [] as $addonIndex => $addonData) {
                $this->upsertAddon($service, $addonData, $addonIndex + 1, $variant);
            }
        }
    }

    private function seedServiceAddons(OnboardingService $service, array $addons): void
    {
        foreach ($addons as $addonIndex => $addonData) {
            $this->upsertAddon($service, $addonData, $addonIndex + 1);
        }
    }

    private function upsertAddon(
        OnboardingService $service,
        array $addonData,
        int $sortOrder,
        ?OnboardingServiceVariant $variant = null,
    ): void {
        OnboardingAddon::query()->updateOrCreate(
            [
                'onboarding_service_id' => $service->id,
                'onboarding_service_variant_id' => $variant?->id,
                'key' => $addonData['key'],
            ],
            [
                'name' => $addonData['name'],
                'description' => $addonData['description'],
                'billing_type' => $addonData['billing_type'] ?? 'one_time',
                'billing_cycle' => $addonData['billing_cycle'] ?? null,
                'price' => $addonData['price'],
                'price_label' => $addonData['price_label'] ?? null,
                'currency' => $addonData['currency'] ?? $service->currency,
                'is_quantity_based' => $addonData['is_quantity_based'] ?? false,
                'quantity_label' => $addonData['quantity_label'] ?? null,
                'is_active' => $addonData['is_active'] ?? true,
                'sort_order' => $sortOrder,
                'settings' => $addonData['settings'] ?? null,
            ],
        );
    }
}
