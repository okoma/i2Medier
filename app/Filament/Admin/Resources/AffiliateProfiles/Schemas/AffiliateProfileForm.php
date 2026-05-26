<?php

namespace App\Filament\Admin\Resources\AffiliateProfiles\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AffiliateProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Affiliate Profile')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('client_id')
                            ->relationship('client', 'company_name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('referral_code')
                            ->required()
                            ->maxLength(255),
                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'paused' => 'Paused',
                                'suspended' => 'Suspended',
                            ])
                            ->default('active')
                            ->required(),
                        TextInput::make('commission_rate')
                            ->numeric()
                            ->default(20)
                            ->required(),
                        TextInput::make('payout_email')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('payout_bank_name')
                            ->maxLength(255),
                        TextInput::make('payout_account_name')
                            ->maxLength(255),
                        TextInput::make('payout_account_number')
                            ->maxLength(255),
                        Textarea::make('notes')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
