<?php

namespace App\Filament\Admin\Resources\PortfolioProjects\Schemas;

use App\Models\PortfolioCategory;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\View;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class PortfolioProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(12)
                    ->columnSpanFull()
                    ->schema([
                        Grid::make(1)
                            ->columnSpan(['default' => 12, 'xl' => 8])
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->hiddenLabel()
                                    ->placeholder('Project title')
                                    ->extraInputAttributes(['class' => 'i2-wp-title'])
                                    ->extraAttributes(['class' => 'i2-wp-title-wrap'])
                                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state): void {
                                        $currentSlug = trim((string) $get('slug'));
                                        $oldSlug = Str::slug((string) $old);

                                        if (blank($currentSlug) || $currentSlug === $oldSlug) {
                                            $set('slug', Str::slug((string) $state));
                                        }
                                    }),
                                Hidden::make('content')
                                    ->default(['blocks' => []])
                                    ->columnSpanFull(),
                                View::make('filament.admin.resources.portfolio-projects.editorjs-field')
                                    ->viewData([
                                        'statePath' => 'data.content',
                                    ]),
                            ]),
                        Grid::make(1)
                            ->columnSpan(['default' => 12, 'xl' => 4])
                            ->schema([
                                Section::make('Publish')
                                    ->icon(Heroicon::OutlinedRocketLaunch)
                                    ->schema([
                                        TextInput::make('slug')
                                            ->label('Permalink')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->unique(ignoreRecord: true)
                                            ->helperText('Auto-generated from the title.'),
                                        Select::make('status')
                                            ->options([
                                                'draft' => 'Draft',
                                                'published' => 'Published',
                                                'archived' => 'Archived',
                                            ])
                                            ->default('draft')
                                            ->required(),
                                        DateTimePicker::make('published_at')
                                            ->default(now()),
                                        Toggle::make('is_featured')
                                            ->label('Feature this project')
                                            ->inline(false),
                                        TextInput::make('sort_order')
                                            ->numeric()
                                            ->default(0),
                                    ]),
                                Section::make('Project Details')
                                    ->icon(Heroicon::OutlinedBriefcase)
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
                                        TextInput::make('project_url')
                                            ->label('Project URL')
                                            ->url()
                                            ->maxLength(255),
                                    ]),
                                Section::make('Categories')
                                    ->icon(Heroicon::OutlinedTag)
                                    ->schema([
                                        Select::make('categories')
                                            ->relationship('categories', 'name')
                                            ->multiple()
                                            ->preload()
                                            ->searchable()
                                            ->helperText('Drives the filter buttons on the portfolio archive.'),
                                    ]),
                                Section::make('Summary')
                                    ->icon(Heroicon::OutlinedBars3BottomLeft)
                                    ->schema([
                                        Textarea::make('summary')
                                            ->rows(4)
                                            ->required()
                                            ->helperText('Short description shown on the portfolio index and cards.'),
                                    ]),
                                Section::make('Media')
                                    ->icon(Heroicon::OutlinedPhoto)
                                    ->schema([
                                        FileUpload::make('featured_image')
                                            ->label('Featured Image')
                                            ->image()
                                            ->imageEditor()
                                            ->disk('public')
                                            ->directory('portfolio/featured-images')
                                            ->visibility('public')
                                            ->maxSize(4096)
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                                            ->imagePreviewHeight('120')
                                            ->helperText('Main image used for the portfolio card and project hero.'),
                                    ]),
                                Section::make('Metadata')
                                    ->icon(Heroicon::OutlinedTag)
                                    ->schema([
                                        TagsInput::make('tech_stack')
                                            ->label('Tech Stack')
                                            ->helperText('Technologies used in this project.'),
                                        FileUpload::make('gallery')
                                            ->label('Gallery')
                                            ->image()
                                            ->multiple()
                                            ->reorderable()
                                            ->appendFiles()
                                            ->disk('public')
                                            ->directory('portfolio/gallery')
                                            ->visibility('public')
                                            ->maxSize(4096)
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                                            ->imagePreviewHeight('120')
                                            ->helperText('Optional gallery images for this project. You can upload multiple images and drag to reorder them.'),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
