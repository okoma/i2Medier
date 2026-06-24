<?php

namespace App\Filament\Client\Resources\OnboardingTasks\Schemas;

use Filament\Actions\Action as InfolistAction;
use App\Enums\ManagementType;
use App\Models\Domain;
use App\Models\HostingAccount;
use App\Models\OnboardingTask;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Actions as InfolistActions;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class OnboardingTaskInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        Section::make('Task Details')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('project.reference')
                                    ->label('Project')
                                    ->placeholder('—'),
                                TextEntry::make('project.client.company_name')
                                    ->label('Client')
                                    ->placeholder('—'),
                                TextEntry::make('title'),
                                TextEntry::make('description')
                                    ->columnSpanFull()
                                    ->placeholder('No description added yet.'),
                                TextEntry::make('type')
                                    ->badge(),
                                TextEntry::make('status')
                                    ->badge(),
                            ]),

                        Section::make('Timeline')
                            ->columnSpanFull()
                            ->schema([
                                TextEntry::make('assignee.name')
                                    ->label('Assigned to')
                                    ->placeholder('Not assigned'),
                                TextEntry::make('due_at')
                                    ->date()
                                    ->placeholder('No due date'),
                                TextEntry::make('completed_at')
                                    ->dateTime()
                                    ->placeholder('Still in progress'),
                                TextEntry::make('notes')
                                    ->columnSpanFull()
                                    ->placeholder('No notes yet.'),
                            ]),

                        InfolistActions::make([
                            InfolistAction::make('submit_credentials')
                                ->label('Submit Domain & Hosting Access')
                                ->icon('heroicon-o-lock-closed')
                                ->color('primary')
                                ->visible(fn (OnboardingTask $record): bool =>
                                    $record->type === 'domain_hosting_setup' &&
                                    $record->status !== 'completed'
                                )
                                ->form([
                                    Placeholder::make('trust_notice')
                                        ->label('Security Notice')
                                        ->content('Your login credentials are transmitted over an encrypted connection and stored with AES-256 encryption on our secure servers. Only authorised i2 Medier staff can access them, and they are used solely to manage your services on your behalf. We will never share them with third parties.')
                                        ->columnSpanFull(),

                                    Toggle::make('has_domain')
                                        ->label('I have a domain to hand over')
                                        ->default(false)
                                        ->live(),
                                    TextInput::make('domain_name')
                                        ->label('Domain Name')
                                        ->placeholder('example.com')
                                        ->visible(fn ($get) => (bool) $get('has_domain')),
                                    TextInput::make('domain_registrar')
                                        ->label('Domain Registrar')
                                        ->placeholder('Namecheap, GoDaddy…')
                                        ->visible(fn ($get) => (bool) $get('has_domain')),
                                    TextInput::make('domain_registrar_url')
                                        ->label('Registrar Login URL')
                                        ->url()
                                        ->visible(fn ($get) => (bool) $get('has_domain')),
                                    TextInput::make('domain_username')
                                        ->label('Domain Account Username / Email')
                                        ->visible(fn ($get) => (bool) $get('has_domain')),
                                    TextInput::make('domain_password')
                                        ->label('Domain Account Password')
                                        ->password()
                                        ->revealable()
                                        ->visible(fn ($get) => (bool) $get('has_domain')),

                                    Toggle::make('has_hosting')
                                        ->label('I have hosting to hand over')
                                        ->default(false)
                                        ->live(),
                                    TextInput::make('hosting_provider')
                                        ->label('Hosting Provider')
                                        ->placeholder('Bluehost, SiteGround…')
                                        ->visible(fn ($get) => (bool) $get('has_hosting')),
                                    TextInput::make('hosting_panel_url')
                                        ->label('Control Panel Login URL')
                                        ->url()
                                        ->visible(fn ($get) => (bool) $get('has_hosting')),
                                    TextInput::make('hosting_username')
                                        ->label('Hosting Account Username / Email')
                                        ->visible(fn ($get) => (bool) $get('has_hosting')),
                                    TextInput::make('hosting_password')
                                        ->label('Hosting Account Password')
                                        ->password()
                                        ->revealable()
                                        ->visible(fn ($get) => (bool) $get('has_hosting')),
                                ])
                                ->action(function (array $data, OnboardingTask $record): void {
                                    $clientId = Auth::user()?->client_id;

                                    if ($data['has_domain'] ?? false) {
                                        Domain::create([
                                            'client_id'            => $clientId,
                                            'created_by'           => Auth::id(),
                                            'domain_name'          => $data['domain_name'] ?? null,
                                            'registrar'            => $data['domain_registrar'] ?? null,
                                            'management_type'      => ManagementType::SelfManaged,
                                            'status'               => 'active',
                                            'access_registrar_url' => $data['domain_registrar_url'] ?? null,
                                            'access_username'      => $data['domain_username'] ?? null,
                                            'access_password'      => $data['domain_password'] ?? null,
                                        ]);
                                    }

                                    if ($data['has_hosting'] ?? false) {
                                        HostingAccount::create([
                                            'client_id'        => $clientId,
                                            'created_by'       => Auth::id(),
                                            'name'             => ($data['hosting_provider'] ?? 'Hosting') . ' Plan',
                                            'management_type'  => ManagementType::SelfManaged,
                                            'status'           => 'active',
                                            'access_panel_url' => $data['hosting_panel_url'] ?? null,
                                            'access_username'  => $data['hosting_username'] ?? null,
                                            'access_password'  => $data['hosting_password'] ?? null,
                                        ]);
                                    }

                                    $record->update([
                                        'status'       => 'completed',
                                        'completed_at' => now(),
                                    ]);

                                    Notification::make()
                                        ->title('Access submitted successfully')
                                        ->body('Your credentials have been securely saved. Our team has been notified.')
                                        ->success()
                                        ->send();
                                }),
                        ])->columnSpanFull(),
                    ]),
            ]);
    }
}
