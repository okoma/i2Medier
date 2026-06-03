<?php

namespace App\Filament\Admin\Resources\ServiceSubscriptions\Schemas;

use App\Models\OnboardingServiceVariant;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class ServiceSubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Subscription')
                            ->schema([
                                Select::make('client_id')
                                    ->relationship('client', 'company_name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Select::make('onboarding_service_id')
                                    ->relationship('onboardingService', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->afterStateUpdated(fn ($set) => $set('onboarding_service_variant_id', null))
                                    ->required(),
                                Select::make('onboarding_service_variant_id')
                                    ->label('Direction / Variant')
                                    ->options(fn (Get $get): array => OnboardingServiceVariant::query()
                                        ->where('onboarding_service_id', $get('onboarding_service_id'))
                                        ->where('is_active', true)
                                        ->orderBy('sort_order')
                                        ->pluck('name', 'id')
                                        ->all())
                                    ->searchable()
                                    ->preload()
                                    ->helperText('Leave blank if this subscription is for the base service rather than a specific direction.'),
                                Select::make('status')
                                    ->options([
                                        'pending' => 'Pending',
                                        'active' => 'Active',
                                        'expired' => 'Expired',
                                        'suspended' => 'Suspended',
                                        'archived' => 'Archived',
                                        'cancelled' => 'Cancelled',
                                    ])
                                    ->default('pending')
                                    ->required(),
                                Toggle::make('auto_renew')
                                    ->default(false),
                            ]),
                        Section::make('Billing')
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
                                    ])
                                    ->default('NGN'),
                                DatePicker::make('starts_at'),
                                DatePicker::make('expires_at'),
                                Textarea::make('notes')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }
}
