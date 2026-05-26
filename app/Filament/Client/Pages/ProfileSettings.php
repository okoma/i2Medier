<?php

namespace App\Filament\Client\Pages;

use App\Models\Client;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ProfileSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    protected static string|\UnitEnum|null $navigationGroup = 'Client Portal';

    protected static ?int $navigationSort = 9;

    protected static ?string $title = 'Profile & Settings';

    protected string $view = 'filament.client.pages.profile-settings';

    public ?array $data = [];

    public function mount(): void
    {
        /** @var User $user */
        $user = auth()->user();
        $client = $user->client;
        $preferences = $user->notification_preferences ?? [];

        $this->form->fill([
            'avatar' => $user->avatar,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'whatsapp_number' => $user->whatsapp_number,
            'company_name' => $client?->company_name,
            'contact_name' => $client?->contact_name,
            'client_email' => $client?->email,
            'client_phone' => $client?->phone,
            'client_whatsapp_number' => $client?->whatsapp_number,
            'address' => $client?->address,
            'country' => $client?->country,
            'state' => $client?->state,
            'city' => $client?->city,
            'logo' => $client?->logo,
            'notify_email' => (bool) ($preferences['email'] ?? true),
            'notify_whatsapp' => (bool) ($preferences['whatsapp'] ?? false),
            'notify_dashboard' => (bool) ($preferences['dashboard'] ?? true),
            'login_alerts' => (bool) ($preferences['login_alerts'] ?? true),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Section::make('Personal Information')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        FileUpload::make('avatar')
                            ->image()
                            ->disk('public')
                            ->directory('avatars'),
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(table: User::class, column: 'email', ignorable: fn (): ?User => auth()->user()),
                        TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                        TextInput::make('whatsapp_number')
                            ->tel()
                            ->maxLength(255),
                    ]),
                Section::make('Company Information')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        FileUpload::make('logo')
                            ->image()
                            ->disk('public')
                            ->directory('client-logos')
                            ->disabled(fn (): bool => ! (auth()->user()?->isClientOwner() ?? false)),
                        TextInput::make('company_name')
                            ->required()
                            ->maxLength(255)
                            ->disabled(fn (): bool => ! (auth()->user()?->isClientOwner() ?? false)),
                        TextInput::make('contact_name')
                            ->maxLength(255)
                            ->disabled(fn (): bool => ! (auth()->user()?->isClientOwner() ?? false)),
                        TextInput::make('client_email')
                            ->label('Company email')
                            ->email()
                            ->required()
                            ->unique(table: Client::class, column: 'email', ignorable: fn (): ?Client => auth()->user()?->client)
                            ->disabled(fn (): bool => ! (auth()->user()?->isClientOwner() ?? false)),
                        TextInput::make('client_phone')
                            ->label('Company phone')
                            ->tel()
                            ->maxLength(255)
                            ->disabled(fn (): bool => ! (auth()->user()?->isClientOwner() ?? false)),
                        TextInput::make('client_whatsapp_number')
                            ->label('Company WhatsApp')
                            ->tel()
                            ->maxLength(255)
                            ->disabled(fn (): bool => ! (auth()->user()?->isClientOwner() ?? false)),
                        TextInput::make('country')
                            ->maxLength(255)
                            ->disabled(fn (): bool => ! (auth()->user()?->isClientOwner() ?? false)),
                        TextInput::make('state')
                            ->maxLength(255)
                            ->disabled(fn (): bool => ! (auth()->user()?->isClientOwner() ?? false)),
                        TextInput::make('city')
                            ->maxLength(255)
                            ->disabled(fn (): bool => ! (auth()->user()?->isClientOwner() ?? false)),
                        TextInput::make('address')
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->disabled(fn (): bool => ! (auth()->user()?->isClientOwner() ?? false)),
                    ]),
                Section::make('Notifications & Security')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Toggle::make('notify_email')
                            ->label('Email notifications'),
                        Toggle::make('notify_whatsapp')
                            ->label('WhatsApp notifications'),
                        Toggle::make('notify_dashboard')
                            ->label('Dashboard alerts'),
                        Toggle::make('login_alerts')
                            ->label('Login alerts'),
                        TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->confirmed()
                            ->minLength(8)
                            ->dehydrated(fn ($state): bool => filled($state)),
                        TextInput::make('password_confirmation')
                            ->password()
                            ->revealable()
                            ->dehydrated(false),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        /** @var User $user */
        $user = auth()->user();

        $userData = [
            'avatar' => $data['avatar'] ?? null,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'whatsapp_number' => $data['whatsapp_number'] ?? null,
            'notification_preferences' => [
                'email' => (bool) ($data['notify_email'] ?? false),
                'whatsapp' => (bool) ($data['notify_whatsapp'] ?? false),
                'dashboard' => (bool) ($data['notify_dashboard'] ?? false),
                'login_alerts' => (bool) ($data['login_alerts'] ?? false),
            ],
        ];

        if (filled($data['password'] ?? null)) {
            $userData['password'] = $data['password'];
        }

        $user->update($userData);

        if ($user->isClientOwner() && $user->client) {
            $user->client->update([
                'logo' => $data['logo'] ?? null,
                'company_name' => $data['company_name'],
                'contact_name' => $data['contact_name'] ?? null,
                'email' => $data['client_email'],
                'phone' => $data['client_phone'] ?? null,
                'whatsapp_number' => $data['client_whatsapp_number'] ?? null,
                'address' => $data['address'] ?? null,
                'country' => $data['country'] ?? null,
                'state' => $data['state'] ?? null,
                'city' => $data['city'] ?? null,
            ]);
        }

        Notification::make()
            ->title('Profile settings saved')
            ->success()
            ->send();
    }

    public function getProfileCompletion(): int
    {
        /** @var User $user */
        $user = auth()->user();

        $fields = [
            $user->name,
            $user->email,
            $user->phone,
            $user->avatar,
            $user->client?->company_name,
            $user->client?->email,
            $user->client?->address,
            $user->client?->country,
        ];

        $completed = collect($fields)->filter(fn ($value): bool => filled($value))->count();

        return (int) round(($completed / count($fields)) * 100);
    }
}
