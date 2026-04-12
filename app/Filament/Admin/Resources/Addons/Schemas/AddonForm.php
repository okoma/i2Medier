<?php

namespace App\Filament\Admin\Resources\Addons\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class AddonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Addon')
                            ->schema([
                                Select::make('service_id')
                                    ->relationship('service', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
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
                                    ->default('NGN')
                                    ->required(),
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),
                                Toggle::make('is_active')
                                    ->default(true),
                            ]),
                    ]),
            ]);
    }
}
