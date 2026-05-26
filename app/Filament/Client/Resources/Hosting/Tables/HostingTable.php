<?php

namespace App\Filament\Client\Resources\Hosting\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HostingTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Website')
                    ->searchable(),
                TextColumn::make('primary_domain')
                    ->label('Domain')
                    ->searchable()
                    ->placeholder('Not connected'),
                TextColumn::make('hosting_provider')
                    ->label('Provider')
                    ->placeholder('Not set'),
                TextColumn::make('hosting_status')
                    ->badge(),
                TextColumn::make('hosting_expiry_date')
                    ->date()
                    ->sortable()
                    ->placeholder('Not set'),
                TextColumn::make('ssl_status')
                    ->label('SSL')
                    ->badge()
                    ->placeholder('Unknown'),
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
