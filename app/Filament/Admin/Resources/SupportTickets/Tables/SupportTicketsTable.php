<?php

namespace App\Filament\Admin\Resources\SupportTickets\Tables;

use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SupportTicketsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ticket_number')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client.company_name')
                    ->label('Client')
                    ->searchable()
                    ->placeholder('Public'),
                TextColumn::make('requester_name')
                    ->label('Requester')
                    ->searchable()
                    ->placeholder('Unknown'),
                TextColumn::make('department')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'sales' => 'Sales',
                        'design' => 'Design',
                        'development' => 'Development',
                        'support' => 'Support',
                        'careers' => 'Careers',
                        default => $state ? ucfirst(str_replace('_', ' ', $state)) : 'Not set',
                    })
                    ->colors([
                        'info' => ['sales', 'design'],
                        'warning' => ['development'],
                        'success' => ['support'],
                        'gray' => ['careers'],
                    ]),
                TextColumn::make('subject')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('source')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'public_contact' => 'Public Contact',
                        'portal' => 'Client Portal',
                        'manual' => 'Manual',
                        default => $state ? ucfirst(str_replace('_', ' ', $state)) : 'Unknown',
                    })
                    ->colors([
                        'success' => ['public_contact'],
                        'info' => ['portal'],
                        'gray' => ['manual'],
                    ]),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('priority')
                    ->badge(),
                TextColumn::make('assignee.name')
                    ->label('Assigned to')
                    ->placeholder('Unassigned'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'open' => 'Open',
                        'in_progress' => 'In Progress',
                        'waiting_reply' => 'Waiting Reply',
                        'resolved' => 'Resolved',
                        'closed' => 'Closed',
                    ]),
                SelectFilter::make('priority')
                    ->options([
                        'low' => 'Low',
                        'medium' => 'Medium',
                        'high' => 'High',
                        'urgent' => 'Urgent',
                    ]),
                SelectFilter::make('department')
                    ->options([
                        'sales' => 'Sales',
                        'design' => 'Design',
                        'development' => 'Development',
                        'support' => 'Support',
                        'careers' => 'Careers',
                    ]),
                SelectFilter::make('source')
                    ->options([
                        'portal' => 'Portal',
                        'public_contact' => 'Public Contact',
                        'manual' => 'Manual',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ]);
    }
}
