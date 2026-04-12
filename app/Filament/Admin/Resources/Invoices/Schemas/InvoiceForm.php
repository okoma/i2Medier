<?php

namespace App\Filament\Admin\Resources\Invoices\Schemas;

use App\Models\Invoice;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class InvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Invoice')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('client_id')
                            ->relationship('client', 'company_name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('website_id')
                            ->relationship('website', 'name')
                            ->searchable()
                            ->preload(),
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'sent' => 'Sent',
                                'paid' => 'Paid',
                                'overdue' => 'Overdue',
                                'cancelled' => 'Cancelled',
                                'refunded' => 'Refunded',
                            ])
                            ->default('draft')
                            ->required(),
                        DatePicker::make('issued_at'),
                        DatePicker::make('due_at'),
                        DatePicker::make('paid_at'),
                    ]),
                Section::make('Amounts')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('subtotal')->numeric()->default(0),
                        TextInput::make('tax_rate')->numeric()->default(0),
                        TextInput::make('tax_amount')->numeric()->default(0),
                        TextInput::make('discount_amount')->numeric()->default(0),
                        TextInput::make('total')->numeric()->default(0),
                        Select::make('currency')
                            ->options([
                                'NGN' => 'NGN',
                                'USD' => 'USD',
                            ])
                            ->default('NGN'),
                        Select::make('payment_method')
                            ->options(Invoice::paymentMethodOptions())
                            ->searchable()
                            ->native(false),
                        TextInput::make('payment_reference')->maxLength(255),
                    ]),
                Section::make('Notes')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Textarea::make('notes')
                            ->rows(3),
                        Textarea::make('internal_notes')
                            ->rows(4),
                    ]),
            ]);
    }
}
