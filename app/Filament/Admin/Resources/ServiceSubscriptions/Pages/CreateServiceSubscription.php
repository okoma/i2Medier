<?php

namespace App\Filament\Admin\Resources\ServiceSubscriptions\Pages;

use App\Filament\Admin\Resources\ServiceSubscriptions\ServiceSubscriptionResource;
use App\Models\Service;
use Filament\Resources\Pages\CreateRecord;

class CreateServiceSubscription extends CreateRecord
{
    protected static string $resource = ServiceSubscriptionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $service = Service::find($data['service_id'] ?? null);

        if ($service) {
            $data['billing_type'] ??= $service->billing_type;
            $data['billing_cycle'] ??= $service->billing_cycle;
            $data['price'] ??= $service->price;
            $data['currency'] ??= $service->currency;
        }

        $data['created_by'] = auth()->id();

        return $data;
    }
}
