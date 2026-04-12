<?php

namespace App\Filament\Client\Resources\ServiceSubscriptions\Pages;

use App\Filament\Client\Resources\ServiceSubscriptions\ServiceSubscriptionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewServiceSubscription extends ViewRecord
{
    protected static string $resource = ServiceSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
