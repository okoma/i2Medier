<?php

namespace App\Filament\Client\Resources\Invoices\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class InvoicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('invoice_number')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('website.name')
                    ->label('Website'),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('total')
                    ->money(fn ($record) => $record->currency ?? 'NGN')
                    ->sortable(),
                TextColumn::make('due_at')
                    ->date()
                    ->sortable(),
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
