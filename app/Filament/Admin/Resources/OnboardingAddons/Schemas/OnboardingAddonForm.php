<?php

namespace App\Filament\Admin\Resources\OnboardingAddons\Schemas;

use App\Models\OnboardingService;
use App\Models\OnboardingServiceVariant;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OnboardingAddonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Add-on Details')
                ->columnSpanFull()
                ->columns(2)
                ->schema([
                    Select::make('onboarding_service_id')
                        ->label('Service')
                        ->options(OnboardingService::query()->orderBy('sort_order')->pluck('name', 'id')->all())
                        ->searchable()
                        ->required(),
                    Select::make('onboarding_service_variant_id')
                        ->label('Variant')
                        ->options(OnboardingServiceVariant::query()->with('service')->get()->mapWithKeys(fn (OnboardingServiceVariant $variant) => [
                            $variant->id => $variant->service->name . ' - ' . $variant->name,
                        ])->all())
                        ->searchable()
                        ->helperText('Optional. Use this when the add-on belongs to a specific platform or service variant.'),
                    TextInput::make('key')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('price_label')
                        ->maxLength(255),
                    Textarea::make('description')
                        ->rows(4)
                        ->columnSpanFull()
                        ->required(),
                ]),
            Section::make('Billing & Quantity')
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
                    TextInput::make('price')
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
                    Toggle::make('is_quantity_based')
                        ->live()
                        ->default(false),
                    TextInput::make('quantity_label')
                        ->maxLength(50)
                        ->visible(fn ($get) => (bool) $get('is_quantity_based')),
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
