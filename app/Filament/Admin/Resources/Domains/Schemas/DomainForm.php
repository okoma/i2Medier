<?php

namespace App\Filament\Admin\Resources\Domains\Schemas;

use App\Enums\DomainStatus;
use App\Models\Client;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DomainForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Domain')
                    ->columns(2)
                    ->schema([
                        Select::make('client_id')
                            ->label('Client')
                            ->relationship('client', 'company_name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),
                        \Filament\Forms\Components\TextInput::make('domain_name')
                            ->label('Domain Name')
                            ->placeholder('example.com')
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('registrar')
                            ->label('Registrar')
                            ->placeholder('Namecheap, GoDaddy…')
                            ->maxLength(255),
                        Select::make('status')
                            ->options(DomainStatus::class)
                            ->default(DomainStatus::Active->value)
                            ->required(),
                        DatePicker::make('registered_at')
                            ->label('Registration Date'),
                        DatePicker::make('expires_at')
                            ->label('Expiry Date'),
                        Toggle::make('auto_renew')
                            ->label('Auto-Renew')
                            ->default(false),
                        Toggle::make('privacy_protected')
                            ->label('Privacy Protection')
                            ->default(false),
                        TagsInput::make('nameservers')
                            ->label('Nameservers')
                            ->placeholder('ns1.example.com')
                            ->columnSpanFull(),
                        Textarea::make('notes')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
