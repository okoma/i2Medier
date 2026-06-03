<?php

namespace App\Filament\Admin\Resources\OnboardingServices\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OnboardingServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
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
                TextColumn::make('icon')
                    ->badge(),
                TextColumn::make('billing_type')
                    ->badge(),
                TextColumn::make('billing_cycle')
                    ->badge(),
                TextColumn::make('base_price')
                    ->money(fn ($record) => $record->currency ?? 'NGN')
                    ->sortable(),
                TextColumn::make('variants_count')
                    ->counts('variants')
                    ->label('Variants'),
                TextColumn::make('addons_count')
                    ->counts('addons')
                    ->label('Base Add-ons'),
                IconColumn::make('show_on_public_onboarding')
                    ->label('Public')
                    ->boolean(),
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
