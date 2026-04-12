<?php

namespace App\Filament\Admin\Resources\ServiceSubscriptions\Pages;

use App\Filament\Admin\Resources\ServiceSubscriptions\ServiceSubscriptionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceSubscription extends EditRecord
{
    protected static string $resource = ServiceSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
