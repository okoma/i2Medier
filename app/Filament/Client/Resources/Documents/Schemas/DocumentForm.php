<?php

namespace App\Filament\Client\Resources\Documents\Schemas;

use App\Models\User;
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
                Section::make('Upload Document')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('website_id')
                            ->options(function (): array {
                                /** @var User|null $user */
                                $user = auth()->user();

                                if (! $user) {
                                    return [];
                                }

                                $query = $user->isClientOwner()
                                    ? $user->client?->websites()
                                    : $user->assignedWebsites();

                                return $query?->pluck('name', 'websites.id')->all() ?? [];
                            })
                            ->searchable()
                            ->preload(),
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('folder')
                            ->placeholder('Reports, Assets, Contracts')
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
