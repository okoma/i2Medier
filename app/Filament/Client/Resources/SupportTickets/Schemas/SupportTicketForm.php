<?php

namespace App\Filament\Client\Resources\SupportTickets\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class SupportTicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('New Support Ticket')
                    ->schema([
                        TextInput::make('subject')
                            ->required()
                            ->maxLength(255),
                        Select::make('category')
                            ->options([
                                'billing' => 'Billing',
                                'technical' => 'Technical',
                                'general' => 'General',
                                'domain' => 'Domain',
                                'hosting' => 'Hosting',
                            ])
                            ->default('general')
                            ->required(),
                        Select::make('priority')
                            ->options([
                                'low' => 'Low',
                                'medium' => 'Medium',
                                'high' => 'High',
                                'urgent' => 'Urgent',
                            ])
                            ->default('medium')
                            ->required(),
                        Textarea::make('description')
                            ->required()
                            ->rows(8)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
