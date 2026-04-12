<?php

namespace App\Filament\Admin\Resources\Invoices\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaymentsRelationManager extends RelationManager
{
    protected static string $relationship = 'payments';

    protected static ?string $title = 'Payment History';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reference')
                    ->searchable()
                    ->copyable(),
                TextColumn::make('method')
                    ->badge(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('amount')
                    ->money(fn ($record) => $record->currency ?? 'NGN'),
                TextColumn::make('paid_at')
                    ->since()
                    ->placeholder('Pending'),
                TextColumn::make('created_at')
                    ->since(),
            ]);
    }
}
