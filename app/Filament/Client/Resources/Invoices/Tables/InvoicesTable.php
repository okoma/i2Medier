<?php

namespace App\Filament\Client\Resources\Invoices\Tables;

use App\Models\Invoice;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class InvoicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('invoice_number')
                    ->label('Invoice #')
                    ->fontFamily('mono')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('issued_at')
                    ->label('Issued')
                    ->date()
                    ->sortable()
                    ->placeholder('—'),
                TextColumn::make('due_at')
                    ->label('Due')
                    ->date()
                    ->sortable()
                    ->placeholder('—')
                    ->description(fn (Invoice $record): ?string =>
                        ($record->status !== 'paid' && $record->due_at?->isPast())
                            ? 'Overdue by ' . $record->due_at->diffForHumans(absolute: true)
                            : null
                    ),
                TextColumn::make('total')
                    ->money(fn (Invoice $record): string => $record->currency ?? 'NGN')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->getStateUsing(fn (Invoice $record): string =>
                        ($record->status !== 'paid' && $record->due_at?->isPast()) ? 'overdue' : $record->status
                    )
                    ->color(fn (string $state): string => match ($state) {
                        'paid'                  => 'success',
                        'overdue'               => 'danger',
                        'cancelled', 'refunded' => 'gray',
                        default                 => 'warning',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'paid'      => 'Paid',
                        'unpaid'    => 'Unpaid',
                        'cancelled' => 'Cancelled',
                        'refunded'  => 'Refunded',
                    ]),
            ])
            ->defaultSort('due_at', 'desc')
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
