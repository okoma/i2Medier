<?php

namespace App\Filament\Client\Widgets\BillingCenter;

use App\Models\Invoice;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class BillingInvoicesWidget extends TableWidget
{
    protected static ?string $heading = 'Invoice History';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('invoice_number')
                    ->label('Invoice #')
                    ->fontFamily('mono')
                    ->url(fn (Invoice $record): string =>
                        filament()->getUrl() . '/invoices/' . $record->id
                    ),
                TextColumn::make('issued_at')
                    ->label('Issued')
                    ->date()
                    ->sortable(),
                TextColumn::make('due_at')
                    ->label('Due')
                    ->date()
                    ->sortable()
                    ->placeholder('—'),
                TextColumn::make('notes')
                    ->label('Notes')
                    ->limit(40)
                    ->placeholder('—'),
                TextColumn::make('total')
                    ->money(fn (Invoice $record): string => $record->currency ?? 'NGN'),
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
            ->defaultSort('due_at', 'desc');
    }

    protected function getTableQuery(): Builder
    {
        return Invoice::query()
            ->where('client_id', auth()->user()?->client_id)
            ->latest()
            ->limit(8);
    }
}
