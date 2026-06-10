<?php

namespace App\Filament\Admin\Resources\HostingAccounts\Pages;

use App\Filament\Admin\Resources\HostingAccounts\HostingAccountResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHostingAccount extends EditRecord
{
    protected static string $resource = HostingAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
