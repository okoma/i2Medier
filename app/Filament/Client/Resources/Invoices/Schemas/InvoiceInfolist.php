<?php

namespace App\Filament\Client\Resources\Invoices\Schemas;

use App\Support\PaymentSettings;
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
                                TextEntry::make('status')
                                    ->badge(),
                                TextEntry::make('website.name')
                                    ->label('Website'),
                                TextEntry::make('issued_at')
                                    ->date(),
                                TextEntry::make('due_at')
                                    ->date(),
                            ]),
                        Section::make('Amounts')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('subtotal')
                                    ->money(fn ($record) => $record->currency ?? 'NGN'),
                                TextEntry::make('tax_amount')
                                    ->money(fn ($record) => $record->currency ?? 'NGN'),
                                TextEntry::make('discount_amount')
                                    ->money(fn ($record) => $record->currency ?? 'NGN'),
                                TextEntry::make('total')
                                    ->money(fn ($record) => $record->currency ?? 'NGN'),
                                TextEntry::make('payment_method')
                                    ->label('Payment option')
                                    ->state(fn ($record) => $record->getPaymentMethodLabel() ?? 'Not set'),
                                TextEntry::make('payment_reference')
                                    ->placeholder('Pending payment'),
                                TextEntry::make('notes')
                                    ->columnSpanFull()
                                    ->placeholder('No invoice notes added yet.'),
                                TextEntry::make('bank_transfer_details')
                                    ->label('Bank transfer details')
                                    ->visible(fn ($record): bool => $record->canBePaidByBankTransfer() && app(PaymentSettings::class)->bankTransferEnabled())
                                    ->state(function ($record): string {
                                        $details = app(PaymentSettings::class)->bankTransferDetails();

                                        return trim(implode(PHP_EOL, array_filter([
                                            'Bank: ' . ($details['bank_name'] ?? ''),
                                            'Account name: ' . ($details['account_name'] ?? ''),
                                            'Account number: ' . ($details['account_number'] ?? ''),
                                            filled($details['sort_code'] ?? null) ? 'Sort code: ' . $details['sort_code'] : null,
                                            'Reference: ' . $record->invoice_number,
                                            $details['instructions'] ?? null,
                                        ])));
                                    }),
                            ]),
                    ]),
            ]);
    }
}
