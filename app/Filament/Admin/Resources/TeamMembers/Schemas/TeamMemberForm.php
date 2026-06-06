<?php

namespace App\Filament\Admin\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class TeamMemberForm
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
                                Section::make('Profile')
                                    ->icon(Heroicon::OutlinedUserCircle)
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('name')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('role')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('initials')
                                            ->required()
                                            ->maxLength(8)
                                            ->helperText('Used in the circular avatar when no photo is uploaded. Example: CE'),
                                        TextInput::make('theme')
                                            ->required()
                                            ->datalist(['gold', 'purple', 'blue', 'green', 'rose', 'teal'])
                                            ->maxLength(32)
                                            ->helperText('Controls the banner and avatar accent colours on the about page.'),
                                        Textarea::make('bio')
                                            ->required()
                                            ->rows(6)
                                            ->columnSpanFull(),
                                    ]),
                                Section::make('Social Links')
                                    ->icon(Heroicon::OutlinedLink)
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('linkedin_url')
                                            ->label('LinkedIn URL')
                                            ->url()
                                            ->maxLength(255),
                                        TextInput::make('twitter_url')
                                            ->label('X / Twitter URL')
                                            ->url()
                                            ->maxLength(255),
                                        TextInput::make('github_url')
                                            ->label('GitHub URL')
                                            ->url()
                                            ->maxLength(255),
                                        TextInput::make('dribbble_url')
                                            ->label('Dribbble URL')
                                            ->url()
                                            ->maxLength(255),
                                    ]),
                            ]),
                        Grid::make(1)
                            ->columnSpan(['default' => 12, 'xl' => 4])
                            ->schema([
                                Section::make('Display')
                                    ->icon(Heroicon::OutlinedEye)
                                    ->schema([
                                        Toggle::make('is_active')
                                            ->label('Show on about page')
                                            ->default(true)
                                            ->inline(false),
                                        TextInput::make('sort_order')
                                            ->numeric()
                                            ->default(0)
                                            ->required()
                                            ->helperText('Lower numbers appear first.'),
                                    ]),
                                Section::make('Photo')
                                    ->icon(Heroicon::OutlinedPhoto)
                                    ->schema([
                                        FileUpload::make('photo')
                                            ->image()
                                            ->disk('public')
                                            ->directory('team')
                                            ->visibility('public')
                                            ->maxSize(2048)
                                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'])
                                            ->imagePreviewHeight('120')
                                            ->helperText('Optional. If empty, the page uses the initials avatar design.'),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
