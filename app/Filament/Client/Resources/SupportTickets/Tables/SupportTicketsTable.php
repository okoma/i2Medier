<?php

namespace App\Filament\Client\Resources\SupportTickets\Tables;

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
                    ->label('Ticket #')
                    ->fontFamily('mono')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('subject')
                    ->searchable()
                    ->wrap()
                    ->limit(60),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'open'           => 'danger',
                        'in_progress'    => 'info',
                        'waiting_reply'  => 'warning',
                        'resolved'       => 'success',
                        'closed'         => 'gray',
                        default          => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucwords(str_replace('_', ' ', $state))),
                TextColumn::make('priority')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'urgent'   => 'danger',
                        'high'     => 'warning',
                        'medium'   => 'info',
                        'low'      => 'gray',
                        default    => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                TextColumn::make('updated_at')
                    ->label('Last Update')
                    ->since()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Opened')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'open'          => 'Open',
                        'in_progress'   => 'In Progress',
                        'waiting_reply' => 'Waiting Reply',
                        'resolved'      => 'Resolved',
                        'closed'        => 'Closed',
                    ]),
                SelectFilter::make('priority')
                    ->options([
                        'urgent' => 'Urgent',
                        'high'   => 'High',
                        'medium' => 'Medium',
                        'low'    => 'Low',
                    ]),
            ])
            ->defaultSort('updated_at', 'desc')
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
