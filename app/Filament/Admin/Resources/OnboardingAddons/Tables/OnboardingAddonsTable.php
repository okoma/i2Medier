<?php

namespace App\Filament\Admin\Resources\OnboardingAddons\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OnboardingAddonsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('service.name')
                    ->label('Service')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('variant.name')
                    ->label('Variant')
                    ->toggleable(),
                TextColumn::make('sort_order')
                    ->sortable()
                    ->label('#')
                    ->width(60),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('key')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('billing_type')
                    ->badge(),
                TextColumn::make('price')
                    ->money(fn ($record) => $record->currency ?? 'NGN')
                    ->sortable(),
                IconColumn::make('is_quantity_based')
                    ->boolean()
                    ->label('Qty'),
                IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
