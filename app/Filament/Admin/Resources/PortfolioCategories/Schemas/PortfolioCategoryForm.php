<?php

namespace App\Filament\Admin\Resources\PortfolioCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PortfolioCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Category Details')
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
                        ->rows(3),
                    TextInput::make('color')
                        ->maxLength(50)
                        ->placeholder('#C8A96E')
                        ->helperText('Hex code or CSS color used for the filter badge.'),
                    TextInput::make('sort_order')
                        ->numeric()
                        ->default(0),
                ]),
        ]);
    }
}
