<?php

namespace App\Filament\Client\Resources\ServiceSubscriptions\Pages;

use App\Filament\Client\Resources\ServiceSubscriptions\ServiceSubscriptionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServiceSubscriptions extends ListRecords
{
    protected static string $resource = ServiceSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
