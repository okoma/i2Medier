<?php

namespace App\Filament\Admin\Resources\Domains\Schemas;

use App\Enums\DomainStatus;
use App\Enums\ManagementType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DomainForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Domain')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('client_id')
                            ->label('Client')
                            ->relationship('client', 'company_name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('domain_name')
                            ->label('Domain Name')
                            ->placeholder('example.com')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('registrar')
                            ->label('Registrar')
                            ->placeholder('Namecheap, GoDaddy…')
                            ->maxLength(255),
                        Select::make('status')
                            ->options(DomainStatus::class)
                            ->default(DomainStatus::Active->value)
                            ->required(),
                        DatePicker::make('registered_at')
                            ->label('Registration Date'),
                        DatePicker::make('expires_at')
                            ->label('Expiry Date'),
                        Toggle::make('auto_renew')
                            ->label('Auto-Renew')
                            ->default(false),
                        Toggle::make('privacy_protected')
                            ->label('Privacy Protection')
                            ->default(false),
                        TagsInput::make('nameservers')
                            ->label('Nameservers')
                            ->placeholder('ns1.example.com')
                            ->columnSpanFull(),
                        Textarea::make('notes')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Management & Billing')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('management_type')
                            ->label('Management Type')
                            ->options(ManagementType::class)
                            ->default(ManagementType::I2Managed->value)
                            ->required()
                            ->live(),
                        Select::make('billing_cycle')
                            ->options([
                                'monthly'   => 'Monthly',
                                'quarterly' => 'Quarterly',
                                'biannual'  => 'Bi-annual',
                                'annual'    => 'Annual',
                                'biennial'  => 'Biennial (2 years)',
                            ])
                            ->visible(fn ($get) => $get('management_type') === ManagementType::I2Managed->value),
                        TextInput::make('price')
                            ->numeric()
                            ->prefix('₦')
                            ->visible(fn ($get) => $get('management_type') === ManagementType::I2Managed->value),
                        TextInput::make('currency')
                            ->default('NGN')
                            ->maxLength(10)
                            ->visible(fn ($get) => $get('management_type') === ManagementType::I2Managed->value),
                    ]),

                Section::make('Access Credentials')
                    ->columnSpanFull()
                    ->description('Stored encrypted. Only agency staff can view.')
                    ->collapsed()
                    ->columns(2)
                    ->visible(fn ($get) => $get('management_type') === ManagementType::SelfManaged->value)
                    ->schema([
                        TextInput::make('access_registrar_url')
                            ->label('Registrar Login URL')
                            ->url()
                            ->maxLength(500)
                            ->columnSpanFull(),
                        TextInput::make('access_username')
                            ->label('Username / Email'),
                        TextInput::make('access_password')
                            ->label('Password')
                            ->password()
                            ->revealable(),
                        Textarea::make('access_notes')
                            ->label('Notes')
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
