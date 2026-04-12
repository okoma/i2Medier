<?php

namespace App\Filament\Client\Resources\SupportTickets\Pages;

use App\Filament\Client\Resources\SupportTickets\SupportTicketResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSupportTicket extends ViewRecord
{
    protected static string $resource = SupportTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
