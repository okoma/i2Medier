<?php

namespace App\Filament\Admin\Resources\OnboardingServices\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OnboardingServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Service Details')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    TextInput::make('key')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('icon')
                        ->required()
                        ->maxLength(50)
                        ->helperText('Use the existing onboarding icon key, e.g. globe, wordpress, cart, cloud.'),
                    TextInput::make('price_label')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('description')
                        ->rows(4)
                        ->columnSpanFull()
                        ->required(),
                ]),
            Section::make('Billing & Visibility')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    Select::make('billing_type')
                        ->options([
                            'one_time' => 'One-time',
                            'recurring' => 'Recurring',
                        ])
                        ->required(),
                    Select::make('billing_cycle')
                        ->options([
                            'monthly' => 'Monthly',
                            'quarterly' => 'Quarterly',
                            'biannual' => 'Biannual',
                            'yearly' => 'Yearly',
                        ]),
                    TextInput::make('base_price')
                        ->numeric()
                        ->required(),
                    Select::make('currency')
                        ->options([
                            'NGN' => 'NGN',
                            'USD' => 'USD',
                            'GBP' => 'GBP',
                        ])
                        ->default('NGN')
                        ->required(),
                    TextInput::make('sort_order')
                        ->numeric()
                        ->default(1)
                        ->required(),
                    Toggle::make('is_active')
                        ->default(true),
                    Toggle::make('show_on_public_onboarding')
                        ->label('Show on public /start')
                        ->helperText('Disable this for internal-only services like hosting or operational items.')
                        ->default(true),
                ]),
            Section::make('Advanced Settings')
                ->columnSpanFull()
                ->schema([
                    KeyValue::make('settings')
                        ->keyLabel('Setting')
                        ->valueLabel('Value')
                        ->reorderable(),
                ]),
        ]);
    }
}
