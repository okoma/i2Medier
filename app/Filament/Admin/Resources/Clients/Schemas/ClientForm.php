<?php

namespace App\Filament\Admin\Resources\Clients\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Company Details')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('company_name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('contact_name')
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                        TextInput::make('whatsapp_number')
                            ->tel()
                            ->maxLength(255),
                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'suspended' => 'Suspended',
                                'archived' => 'Archived',
                            ])
                            ->default('active')
                            ->required(),
                    ]),
                Section::make('Location & Notes')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('country')
                            ->maxLength(255),
                        TextInput::make('state')
                            ->maxLength(255),
                        TextInput::make('city')
                            ->maxLength(255),
                        TextInput::make('logo')
                            ->url()
                            ->maxLength(255),
                        Textarea::make('address')
                            ->rows(3),
                        Textarea::make('notes')
                            ->rows(5),
                    ]),
            ]);
    }
}
