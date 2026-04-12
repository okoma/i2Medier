<?php

namespace App\Filament\Client\Resources\Websites\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class WebsitesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('primary_domain')
                    ->label('Domain')
                    ->searchable(),
                TextColumn::make('health_state')
                    ->badge()
                    ->sortable(),
                TextColumn::make('domain_status')
                    ->badge(),
                TextColumn::make('ssl_status')
                    ->badge(),
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
