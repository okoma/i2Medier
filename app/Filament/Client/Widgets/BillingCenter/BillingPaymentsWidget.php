<?php

namespace App\Filament\Client\Widgets\BillingCenter;

use App\Models\InvoicePayment;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class BillingPaymentsWidget extends TableWidget
{
    protected static ?string $heading = 'Recent Payments';

    protected int|string|array $columnSpan = 1;

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('paid_at')
                    ->label('Date')
                    ->date()
                    ->placeholder('—'),
                TextColumn::make('invoice.invoice_number')
                    ->label('Invoice')
                    ->fontFamily('mono')
                    ->url(fn (InvoicePayment $record): string =>
                        filament()->getUrl() . '/invoices/' . $record->invoice_id
                    ),
                TextColumn::make('amount')
                    ->money(fn (InvoicePayment $record): string => $record->currency ?? 'NGN'),
                TextColumn::make('status')
                    ->badge()
                    ->color('success')
                    ->formatStateUsing(fn (): string => 'Paid'),
            ])
            ->paginated(false);
    }

    protected function getTableQuery(): Builder
    {
        return InvoicePayment::query()
            ->with('invoice')
            ->whereHas('invoice', fn ($q) => $q->where('client_id', auth()->user()?->client_id))
            ->where('status', 'paid')
            ->latest('paid_at')
            ->limit(5);
    }
}
