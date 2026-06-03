<?php

namespace App\Filament\Admin\Resources\ServiceSubscriptions\Pages;

use App\Filament\Admin\Resources\ServiceSubscriptions\ServiceSubscriptionResource;
use App\Models\OnboardingService;
use App\Models\OnboardingServiceVariant;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceSubscription extends CreateRecord
{
    protected static string $resource = ServiceSubscriptionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $service = OnboardingService::find($data['onboarding_service_id'] ?? null);
        $variant = OnboardingServiceVariant::find($data['onboarding_service_variant_id'] ?? null);

        $billingSource = $variant ?? $service;

        if ($billingSource) {
            $data['billing_type'] ??= $billingSource->billing_type;
            $data['billing_cycle'] ??= $billingSource->billing_cycle;
            $data['price'] ??= $billingSource->base_price;
            $data['currency'] ??= $billingSource->currency;
        }

        $data['created_by'] = auth()->id();

        return $data;
    }
}
