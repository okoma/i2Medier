<?php

namespace App\Filament\Admin\Resources\OnboardingServiceVariants\Schemas;

use App\Models\OnboardingService;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OnboardingServiceVariantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Variant Details')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    Select::make('onboarding_service_id')
                        ->label('Service')
                        ->options(OnboardingService::query()->orderBy('sort_order')->pluck('name', 'id')->all())
                        ->searchable()
                        ->required(),
                    TextInput::make('key')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
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
