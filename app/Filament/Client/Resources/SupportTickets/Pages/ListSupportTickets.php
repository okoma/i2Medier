<?php

namespace App\Filament\Client\Resources\SupportTickets\Pages;

use App\Filament\Client\Resources\SupportTickets\SupportTicketResource;
use App\Filament\Client\Widgets\SupportTickets\TicketsStatsWidget;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSupportTickets extends ListRecords
{
    protected static string $resource = SupportTicketResource::class;

    public function getHeaderWidgets(): array
    {
        return [TicketsStatsWidget::class];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('New Ticket'),
        ];
    }
}
