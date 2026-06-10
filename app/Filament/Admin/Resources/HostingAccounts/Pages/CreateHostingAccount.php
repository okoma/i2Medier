<?php

namespace App\Filament\Admin\Resources\HostingAccounts\Pages;

use App\Filament\Admin\Resources\HostingAccounts\HostingAccountResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateHostingAccount extends CreateRecord
{
    protected static string $resource = HostingAccountResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::id();

        return $data;
    }
}
