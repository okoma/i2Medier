<?php

namespace App\Filament\Client\Resources\SupportTickets\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class SupportTicketInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Ticket')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('ticket_number'),
                                TextEntry::make('subject'),
                                TextEntry::make('description')
                                    ->columnSpanFull(),
                            ]),
                        Section::make('Status')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('status')
                                    ->badge(),
                                TextEntry::make('priority')
                                    ->badge(),
                                TextEntry::make('category')
                                    ->badge(),
                                TextEntry::make('created_at')
                                    ->dateTime(),
                                TextEntry::make('resolved_at')
                                    ->dateTime(),
                            ]),
                    ]),
            ]);
    }
}
