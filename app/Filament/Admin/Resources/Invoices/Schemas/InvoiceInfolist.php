<?php

namespace App\Filament\Admin\Resources\Invoices\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class InvoiceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Invoice')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('invoice_number'),
                                TextEntry::make('client.company_name')->label('Client'),
                                TextEntry::make('website.name')->label('Website'),
                                TextEntry::make('status')->badge(),
                                TextEntry::make('issued_at')->date(),
                                TextEntry::make('due_at')->date(),
                            ]),
                        Section::make('Amounts')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('subtotal')->money(fn ($record) => $record->currency ?? 'NGN'),
                                TextEntry::make('tax_rate'),
                                TextEntry::make('tax_amount')->money(fn ($record) => $record->currency ?? 'NGN'),
                                TextEntry::make('discount_amount')->money(fn ($record) => $record->currency ?? 'NGN'),
                                TextEntry::make('total')->money(fn ($record) => $record->currency ?? 'NGN'),
                                TextEntry::make('payment_method')
                                    ->state(fn ($record) => $record->getPaymentMethodLabel() ?? 'Not set'),
                                TextEntry::make('payment_reference')
                                    ->placeholder('Not paid yet'),
                            ]),
                    ]),
            ]);
    }
}
