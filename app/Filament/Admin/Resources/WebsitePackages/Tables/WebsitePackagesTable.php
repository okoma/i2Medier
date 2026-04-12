<?php

namespace App\Filament\Admin\Resources\WebsitePackages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class WebsitePackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->money(fn ($record) => $record->currency ?? 'NGN')
                    ->sortable(),
                TextColumn::make('items_count')
                    ->counts('items')
                    ->label('Items'),
                IconColumn::make('is_featured')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->boolean(),
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
