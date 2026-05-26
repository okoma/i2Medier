<?php

namespace App\Filament\Client\Resources\ServiceSubscriptions\Pages;

use App\Filament\Client\Resources\ServiceSubscriptions\ServiceSubscriptionResource;
use Filament\Resources\Pages\ListRecords;

class ListServiceSubscriptions extends ListRecords
{
    protected static string $resource = ServiceSubscriptionResource::class;

    protected string $view = 'filament.client.resources.service-subscriptions.pages.list-service-subscriptions';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
