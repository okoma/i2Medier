<?php

namespace App\Filament\Admin\Resources\WebsitePackages\Schemas;

use App\Models\Addon;
use App\Models\Service;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class WebsitePackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Package')
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
                        Toggle::make('is_featured')
                            ->default(false),
                        CheckboxList::make('features')
                            ->options([
                                'design' => 'Custom design',
                                'maintenance' => 'Maintenance plan',
                                'hosting' => 'Managed hosting',
                                'ssl' => 'SSL coverage',
                                'seo' => 'SEO setup',
                                'support' => 'Priority support',
                            ])
                            ->columns(2),
                    ]),
                Section::make('Package Items')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Repeater::make('items')
                            ->relationship()
                            ->schema([
                                Select::make('itemable_type')
                                    ->options([
                                        Service::class => 'Service',
                                        Addon::class => 'Addon',
                                    ])
                                    ->live()
                                    ->required()
                                    ->afterStateUpdated(fn (Set $set) => $set('itemable_id', null)),
                                Select::make('itemable_id')
                                    ->label('Item')
                                    ->options(function (Get $get): array {
                                        return match ($get('itemable_type')) {
                                            Service::class => Service::query()->orderBy('name')->pluck('name', 'id')->all(),
                                            Addon::class => Addon::query()->orderBy('name')->pluck('name', 'id')->all(),
                                            default => [],
                                        };
                                    })
                                    ->searchable()
                                    ->required(),
                                TextInput::make('quantity')
                                    ->numeric()
                                    ->default(1)
                                    ->required(),
                                Toggle::make('is_optional')
                                    ->default(false),
                            ])
                            ->defaultItems(1)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
