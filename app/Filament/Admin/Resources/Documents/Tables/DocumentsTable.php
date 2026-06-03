<?php

namespace App\Filament\Admin\Resources\Documents\Tables;

use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DocumentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client.company_name')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('category')
                    ->badge(),
                TextColumn::make('folder')
                    ->placeholder('No folder'),
                TextColumn::make('original_name')
                    ->label('File'),
                TextColumn::make('size')
                    ->formatStateUsing(fn ($state, $record): string => $record->formattedSize()),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'general' => 'General',
                        'invoice' => 'Invoice',
                        'contract' => 'Contract',
                        'report' => 'Report',
                        'asset' => 'Asset',
                        'brief' => 'Brief',
                    ]),
                SelectFilter::make('visibility')
                    ->options([
                        'client' => 'Client visible',
                        'internal' => 'Internal only',
                    ]),
            ])
            ->recordActions([
                Action::make('open')
                    ->label('Open')
                    ->url(fn ($record): ?string => $record->downloadUrl(), shouldOpenInNewTab: true)
                    ->visible(fn ($record): bool => filled($record->downloadUrl())),
                ViewAction::make(),
                EditAction::make(),
            ]);
    }
}
