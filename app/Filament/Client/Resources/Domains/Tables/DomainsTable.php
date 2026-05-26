<?php

namespace App\Filament\Client\Resources\Domains\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DomainsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('primary_domain')
                    ->label('Domain')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Website')
                    ->searchable(),
                TextColumn::make('domain_registrar')
                    ->label('Registrar')
                    ->placeholder('Not set'),
                TextColumn::make('domain_status')
                    ->badge(),
                TextColumn::make('domain_expiry_date')
                    ->date()
                    ->sortable()
                    ->placeholder('Not set'),
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
