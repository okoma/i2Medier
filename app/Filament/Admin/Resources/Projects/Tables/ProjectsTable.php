<?php

namespace App\Filament\Admin\Resources\Projects\Tables;

use App\Enums\ProjectStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reference')
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                TextColumn::make('client.company_name')
                    ->label('Client')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client.contact_name')
                    ->label('Contact')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('services')
                    ->label('Services')
                    ->state(fn ($record): string => collect($record->services)
                        ->map(fn (array $s): string => $s['variant_name'] ?? $s['service_name'])
                        ->implode(', '))
                    ->wrap(),
                TextColumn::make('timeline')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options(ProjectStatus::class),
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
