<?php

namespace App\Filament\Client\Resources\SupportTickets\Pages;

use App\Filament\Client\Resources\SupportTickets\SupportTicketResource;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;

class CreateSupportTicket extends CreateRecord
{
    protected static string $resource = SupportTicketResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $data['client_id'] = $user->client_id;
        $data['submitted_by'] = $user->id;
        $data['status'] = 'open';
        $data['ticket_number'] = 'TKT-' . now()->format('Y') . '-' . Str::upper(Str::random(6));

        return $data;
    }
}
