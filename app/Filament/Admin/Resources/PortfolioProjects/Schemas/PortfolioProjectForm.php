<?php

namespace App\Filament\Admin\Resources\PortfolioProjects\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class PortfolioProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Project')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug((string) $state))),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Textarea::make('summary')
                            ->rows(4)
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->rows(10)
                            ->columnSpanFull(),
                    ]),
                Section::make('Publishing')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('type')
                            ->options([
                                'inhouse' => 'Inhouse',
                                'client' => 'Client',
                            ])
                            ->default('client')
                            ->required(),
                        TextInput::make('client_name')
                            ->maxLength(255)
                            ->visible(fn (callable $get) => $get('type') === 'client'),
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                                'archived' => 'Archived',
                            ])
                            ->default('draft')
                            ->required(),
                        DateTimePicker::make('published_at'),
                        Toggle::make('is_featured')
                            ->default(false),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        TextInput::make('featured_image')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('project_url')
                            ->url()
                            ->maxLength(255),
                    ]),
                Section::make('Metadata')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TagsInput::make('tech_stack'),
                        KeyValue::make('gallery')
                            ->keyLabel('Image Label')
                            ->valueLabel('Image URL'),
                    ]),
            ]);
    }
}
