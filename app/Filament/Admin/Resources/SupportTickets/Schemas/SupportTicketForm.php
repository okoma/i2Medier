<?php

namespace App\Filament\Admin\Resources\SupportTickets\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SupportTicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Ticket')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('ticket_number')
                            ->maxLength(255)
                            ->placeholder('Generated automatically'),
                        Select::make('client_id')
                            ->relationship('client', 'company_name')
                            ->searchable()
                            ->preload(),
                        Select::make('submitted_by')
                            ->relationship('submitter', 'name')
                            ->searchable()
                            ->preload(),
                        Select::make('assigned_to')
                            ->relationship('assignee', 'name')
                            ->searchable()
                            ->preload(),
                        TextInput::make('subject')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->required()
                            ->rows(8)
                            ->columnSpanFull(),
                        TextInput::make('requester_name')
                            ->maxLength(255),
                        TextInput::make('requester_email')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('requester_phone')
                            ->maxLength(255),
                        TextInput::make('requester_company')
                            ->maxLength(255),
                    ]),
                Section::make('Status & Priority')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('status')
                            ->options([
                                'open' => 'Open',
                                'in_progress' => 'In Progress',
                                'waiting_reply' => 'Waiting Reply',
                                'resolved' => 'Resolved',
                                'closed' => 'Closed',
                            ])
                            ->default('open')
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
                        Select::make('department')
                            ->options([
                                'sales' => 'Sales',
                                'design' => 'Design',
                                'development' => 'Development',
                                'support' => 'Support',
                                'careers' => 'Careers',
                            ]),
                        TextInput::make('department_email')
                            ->email()
                            ->maxLength(255),
                        Select::make('source')
                            ->options([
                                'portal' => 'Portal',
                                'public_contact' => 'Public Contact',
                                'manual' => 'Manual',
                            ])
                            ->default('portal'),
                        TextInput::make('channel')
                            ->maxLength(255),
                        TextInput::make('source_page')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        DateTimePicker::make('first_response_at'),
                        DateTimePicker::make('resolved_at'),
                        DateTimePicker::make('closed_at'),
                    ]),
            ]);
    }
}
