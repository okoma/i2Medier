<?php

namespace App\Filament\Admin\Resources\ServiceSubscriptions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ServiceSubscriptionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('client.company_name')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('website.name')
                    ->label('Website')
                    ->searchable(),
                TextColumn::make('service.name')
                    ->label('Service')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('expires_at')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'expired' => 'Expired',
                        'suspended' => 'Suspended',
                        'archived' => 'Archived',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
