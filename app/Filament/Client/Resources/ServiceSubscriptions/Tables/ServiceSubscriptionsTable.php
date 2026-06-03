<?php

namespace App\Filament\Client\Resources\ServiceSubscriptions\Tables;

use Filament\Tables\Table;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;

class ServiceSubscriptionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('catalog_name')
                    ->label('Service'),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('billing_cycle')
                    ->badge(),
                TextColumn::make('expires_at')
                    ->date()
                    ->sortable(),
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
