<?php

namespace App\Filament\Admin\Resources\Services\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Service')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug((string) $state))),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Textarea::make('description')
                            ->rows(4),
                        Select::make('type')
                            ->options([
                                'design' => 'Design',
                                'maintenance' => 'Maintenance',
                                'hosting' => 'Hosting',
                                'domain' => 'Domain',
                                'seo' => 'SEO',
                                'ads' => 'Ads',
                                'other' => 'Other',
                            ])
                            ->required(),
                    ]),
                Section::make('Billing')
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
                            ])
                            ->default('NGN')
                            ->required(),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_active')
                            ->default(true),
                        Toggle::make('is_core')
                            ->default(false),
                    ]),
            ]);
    }
}
