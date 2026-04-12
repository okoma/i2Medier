<?php

namespace App\Filament\Client\Resources\SupportTickets\Schemas;

use App\Models\User;
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
