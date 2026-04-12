<?php

namespace App\Filament\Admin\Resources\BlogPosts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class BlogPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make('Post Content')
                            ->columnSpan(2)
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
                                Textarea::make('excerpt')
                                    ->rows(4)
                                    ->maxLength(500)
                                    ->columnSpanFull(),
                                RichEditor::make('body')
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                        Section::make('Publishing')
                            ->schema([
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload(),
                                Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'published' => 'Published',
                                        'scheduled' => 'Scheduled',
                                        'archived' => 'Archived',
                                    ])
                                    ->default('draft')
                                    ->required(),
                                DateTimePicker::make('published_at'),
                                Toggle::make('is_featured')
                                    ->inline(false),
                                TextInput::make('featured_image')
                                    ->url()
                                    ->maxLength(255),
                                TextInput::make('read_time')
                                    ->numeric()
                                    ->minValue(1)
                                    ->default(5),
                                TextInput::make('view_count')
                                    ->numeric()
                                    ->default(0),
                            ]),
                        Section::make('SEO')
                            ->columnSpanFull()
                            ->schema([
                                TextInput::make('seo_title')
                                    ->maxLength(255),
                                Textarea::make('seo_description')
                                    ->rows(3)
                                    ->maxLength(500),
                                TagsInput::make('seo_keywords'),
                            ]),
                    ]),
            ]);
    }
}
