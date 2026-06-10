<?php

namespace App\Filament\Admin\Resources\HostingAccounts\Pages;

use App\Filament\Admin\Resources\HostingAccounts\HostingAccountResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHostingAccount extends ViewRecord
{
    protected static string $resource = HostingAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [EditAction::make()];
    }
}
