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
            ->columns(1)
            ->components([
                Section::make('New Support Ticket')
                    ->description('Share the issue clearly so our team can route it faster and respond with the right next step.')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('subject')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Example: Website contact form is not sending messages')
                            ->helperText('Keep it short and specific so the issue is easy to spot at a glance.')
                            ->columnSpanFull(),
                        Select::make('category')
                            ->options([
                                'billing' => 'Billing',
                                'technical' => 'Technical',
                                'general' => 'General',
                                'domain' => 'Domain',
                                'hosting' => 'Hosting',
                            ])
                            ->default('general')
                            ->placeholder('Choose a category')
                            ->helperText('Pick the area this request is mainly about.')
                            ->required(),
                        Select::make('priority')
                            ->options([
                                'low' => 'Low',
                                'medium' => 'Medium',
                                'high' => 'High',
                                'urgent' => 'Urgent',
                            ])
                            ->default('medium')
                            ->placeholder('Choose priority')
                            ->helperText('Use urgent only when work is blocked or something critical is down.')
                            ->required(),
                        Textarea::make('description')
                            ->required()
                            ->rows(8)
                            ->placeholder('Describe what is happening, what you expected instead, and any links, screenshots, or steps that can help us reproduce the issue.')
                            ->helperText('The more context you share here, the faster we can investigate and reply.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
