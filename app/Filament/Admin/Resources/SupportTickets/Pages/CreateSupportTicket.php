<?php

namespace App\Filament\Admin\Resources\SupportTickets\Pages;

use App\Filament\Admin\Resources\SupportTickets\SupportTicketResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateSupportTicket extends CreateRecord
{
    protected static string $resource = SupportTicketResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['ticket_number'] ??= 'TKT-' . now()->format('Y') . '-' . Str::upper(Str::random(6));
        $data['submitted_by'] ??= auth()->id();

        return $data;
    }
}
