<?php

namespace App\Filament\Admin\Resources\SupportTickets\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SupportTicketInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Ticket Details')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('ticket_number'),
                                TextEntry::make('client.company_name')
                                    ->label('Client')
                                    ->placeholder('No linked client'),
                                TextEntry::make('requester_name')
                                    ->placeholder('Not provided'),
                                TextEntry::make('requester_email')
                                    ->placeholder('Not provided'),
                                TextEntry::make('requester_phone')
                                    ->placeholder('Not provided'),
                                TextEntry::make('requester_company')
                                    ->placeholder('Not provided'),
                                TextEntry::make('subject'),
                                TextEntry::make('description')
                                    ->columnSpanFull(),
                            ]),
                        Section::make('Workflow')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('status')
                                    ->badge(),
                                TextEntry::make('priority')
                                    ->badge(),
                                TextEntry::make('category')
                                    ->badge(),
                                TextEntry::make('department')
                                    ->badge()
                                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                                        'sales' => 'Sales',
                                        'design' => 'Design',
                                        'development' => 'Development',
                                        'support' => 'Support',
                                        'careers' => 'Careers',
                                        default => $state ? ucfirst(str_replace('_', ' ', $state)) : 'Not set',
                                    })
                                    ->placeholder('Not set'),
                                TextEntry::make('source')
                                    ->badge()
                                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                                        'public_contact' => 'Public Contact',
                                        'portal' => 'Client Portal',
                                        'manual' => 'Manual',
                                        default => $state ? ucfirst(str_replace('_', ' ', $state)) : 'Unknown',
                                    }),
                                TextEntry::make('channel')
                                    ->badge()
                                    ->formatStateUsing(fn (?string $state): string => $state ? ucfirst(str_replace('_', ' ', $state)) : 'Unknown'),
                                TextEntry::make('source_page')
                                    ->placeholder('Not provided'),
                                TextEntry::make('submitter.name')
                                    ->label('Submitted by')
                                    ->placeholder('Unknown'),
                                TextEntry::make('assignee.name')
                                    ->label('Assigned to')
                                    ->placeholder('Unassigned'),
                                TextEntry::make('created_at')
                                    ->dateTime(),
                                TextEntry::make('first_response_at')
                                    ->dateTime()
                                    ->placeholder('Waiting'),
                                TextEntry::make('resolved_at')
                                    ->dateTime()
                                    ->placeholder('Not resolved'),
                                TextEntry::make('closed_at')
                                    ->dateTime()
                                    ->placeholder('Still open'),
                            ]),
                    ]),
            ]);
    }
}
