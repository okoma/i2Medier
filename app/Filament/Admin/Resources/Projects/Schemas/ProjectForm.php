<?php

namespace App\Filament\Admin\Resources\Projects\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Brief')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('timeline')
                            ->maxLength(255),
                        TextInput::make('budget')
                            ->maxLength(255),
                        TextInput::make('source')
                            ->label('Discovery source')
                            ->maxLength(255),
                        TextInput::make('domain_preference')
                            ->maxLength(255),
                        TextInput::make('hosting_preference')
                            ->maxLength(255),
                        Textarea::make('message')
                            ->label('Project notes')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
