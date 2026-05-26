<?php

namespace App\Filament\Admin\Resources\OnboardingTasks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OnboardingTaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Task')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('website_id')
                            ->relationship('website', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('assigned_to')
                            ->relationship('assignee', 'name')
                            ->searchable()
                            ->preload(),
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->rows(5)
                            ->columnSpanFull(),
                        Select::make('type')
                            ->options([
                                'cms_install' => 'CMS Install',
                                'content_upload' => 'Content Upload',
                                'qa' => 'QA',
                                'launch' => 'Launch',
                                'other' => 'Other',
                            ])
                            ->default('other')
                            ->required(),
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'in_progress' => 'In Progress',
                                'blocked' => 'Blocked',
                                'completed' => 'Completed',
                            ])
                            ->default('pending')
                            ->required(),
                        DatePicker::make('due_at'),
                        DatePicker::make('completed_at'),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        Textarea::make('notes')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
