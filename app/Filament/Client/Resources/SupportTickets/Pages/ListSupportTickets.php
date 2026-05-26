<?php

namespace App\Filament\Client\Resources\SupportTickets\Pages;

use App\Filament\Client\Resources\SupportTickets\SupportTicketResource;
use Filament\Resources\Pages\ListRecords;

class ListSupportTickets extends ListRecords
{
    protected static string $resource = SupportTicketResource::class;

    protected string $view = 'filament.client.resources.support-tickets.pages.list-support-tickets';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
