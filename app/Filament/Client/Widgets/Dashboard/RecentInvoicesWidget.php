<?php

namespace App\Filament\Client\Widgets\Dashboard;

use App\Models\Invoice;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentInvoicesWidget extends TableWidget
{
    protected static ?string $heading = 'Recent Invoices';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('invoice_number')
                    ->label('Invoice')
                    ->fontFamily('mono'),
                TextColumn::make('notes')
                    ->label('Description')
                    ->limit(40)
                    ->placeholder('Invoice'),
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
                TextColumn::make('due_at')
                    ->label('Due')
                    ->date()
                    ->placeholder('—'),
            ])
            ->recordUrl(fn (Invoice $record): string =>
                filament()->getUrl() . '/invoices/' . $record->id
            )
            ->paginated(false);
    }

    protected function getTableQuery(): Builder
    {
        return Invoice::query()
            ->where('client_id', auth()->user()?->client_id)
            ->latest()
            ->limit(5);
    }
}
