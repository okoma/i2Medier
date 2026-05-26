<?php

namespace App\Filament\Admin\Resources\Documents\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Document')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('client_id')
                            ->relationship('client', 'company_name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('website_id')
                            ->relationship('website', 'name')
                            ->searchable()
                            ->preload(),
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('folder')
                            ->placeholder('Contracts, Reports, Assets')
                            ->maxLength(255),
                        Select::make('category')
                            ->options([
                                'general' => 'General',
                                'invoice' => 'Invoice',
                                'contract' => 'Contract',
                                'report' => 'Report',
                                'asset' => 'Asset',
                                'brief' => 'Brief',
                            ])
                            ->default('general')
                            ->required(),
                        Select::make('visibility')
                            ->options([
                                'client' => 'Client visible',
                                'internal' => 'Internal only',
                            ])
                            ->default('client')
                            ->required(),
                        FileUpload::make('path')
                            ->label('File')
                            ->disk('public')
                            ->directory('client-documents')
                            ->visibility('public')
                            ->storeFileNamesIn('original_name')
                            ->required()
                            ->downloadable()
                            ->openable()
                            ->columnSpanFull(),
                        Textarea::make('notes')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
