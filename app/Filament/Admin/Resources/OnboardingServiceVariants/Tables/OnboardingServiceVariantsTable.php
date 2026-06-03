<?php

namespace App\Filament\Admin\Resources\OnboardingServiceVariants\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OnboardingServiceVariantsTable
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
                TextColumn::make('base_price')
                    ->money(fn ($record) => $record->currency ?? 'NGN')
                    ->sortable(),
                TextColumn::make('addons_count')
                    ->counts('addons')
                    ->label('Add-ons'),
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
