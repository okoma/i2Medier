<?php

namespace App\Filament\Client\Pages;

use App\Filament\Client\Widgets\ProfileSettings\AccountInfoWidget;
use App\Filament\Client\Widgets\ProfileSettings\ActiveSessionsWidget;
use App\Filament\Client\Widgets\ProfileSettings\TeamMembersWidget;
use App\Models\AffiliateProfile;
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
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\View as ViewComponent;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    protected static ?int $navigationSort = 11;

    protected static ?string $title = 'Profile & Settings';

    protected string $view = 'filament.client.pages.profile-settings';

    public ?array $data = [];

    public int   $completionPercentage = 0;
    public array $completionItems      = [];
    public string $userEmail           = '';
    public bool   $isEmailVerified     = false;
    public string $emailVerifiedAt     = '';

    public function mount(): void
    {
        /** @var User $user */
        $user        = Auth::user();
        $client      = $user->client;
        $preferences = $user->notification_preferences ?? [];

        // Profile completion
        $this->completionItems = [
            ['label' => 'Name',          'done' => filled($user->name)],
            ['label' => 'Email',         'done' => filled($user->email)],
            ['label' => 'Phone',         'done' => filled($user->phone)],
            ['label' => 'Profile Photo', 'done' => filled($user->avatar)],
            ['label' => 'Company Name',  'done' => filled($client?->company_name)],
            ['label' => 'Company Email', 'done' => filled($client?->email)],
            ['label' => 'Address',       'done' => filled($client?->address)],
            ['label' => 'Country',       'done' => filled($client?->country)],
        ];
        $done = collect($this->completionItems)->where('done', true)->count();
        $this->completionPercentage = (int) round(($done / count($this->completionItems)) * 100);

        // Email verification
        $this->userEmail       = $user->email;
        $this->isEmailVerified = $user->hasVerifiedEmail();
        $this->emailVerifiedAt = $user->email_verified_at?->format('M d, Y') ?? '';

        // Payout (owners only)
        $payout = [];
        if ($user->isClientOwner()) {
            $profile = AffiliateProfile::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'client_id'       => $user->client_id,
                    'referral_code'   => Str::upper(Str::random(8)),
                    'status'          => 'active',
                    'commission_rate' => 20,
                    'payout_email'    => $user->email,
                ],
            );

            $payout = [
                'payout_email'          => $profile->payout_email,
                'payout_bank_name'      => $profile->payout_bank_name,
                'payout_account_name'   => $profile->payout_account_name,
                'payout_account_number' => $profile->payout_account_number,
            ];
        }

        $this->form->fill(array_merge([
            'avatar'                 => $user->avatar,
            'name'                   => $user->name,
            'email'                  => $user->email,
            'phone'                  => $user->phone,
            'whatsapp_number'        => $user->whatsapp_number,
            'company_name'           => $client?->company_name,
            'contact_name'           => $client?->contact_name,
            'client_email'           => $client?->email,
            'client_phone'           => $client?->phone,
            'client_whatsapp_number' => $client?->whatsapp_number,
            'address'                => $client?->address,
            'country'                => $client?->country,
            'state'                  => $client?->state,
            'city'                   => $client?->city,
            'logo'                   => $client?->logo,
            'notify_email'           => (bool) ($preferences['email'] ?? true),
            'notify_whatsapp'        => (bool) ($preferences['whatsapp'] ?? false),
            'notify_dashboard'       => (bool) ($preferences['dashboard'] ?? true),
            'login_alerts'           => (bool) ($preferences['login_alerts'] ?? true),
        ], $payout));
    }

    public function resend(): void
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            Notification::make()->title('Email already verified')->info()->send();
            return;
        }

        $user->sendEmailVerificationNotification();

        Notification::make()->title('Verification email sent')->success()->send();
    }

    public function form(Schema $schema): Schema
    {
        /** @var User $user */
        $user    = Auth::user();
        $isOwner = fn (): bool => ! $user->isClientOwner();

        return $schema
            ->statePath('data')
            ->components([
                Tabs::make()
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Personal Information')
                            ->icon('heroicon-o-user')
                            ->schema([
                                Section::make('Profile Details')
                                    ->description('Update your name, contact details, and profile photo.')
                                    ->columns(2)
                                    ->schema([
                                        FileUpload::make('avatar')
                                            ->image()
                                            ->disk('public')
                                            ->directory('avatars')
                                            ->columnSpanFull(),
                                        TextInput::make('name')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('email')
                                            ->email()
                                            ->required()
                                            ->unique(table: User::class, column: 'email', ignorable: fn (): ?User => Auth::user()),
                                        TextInput::make('phone')
                                            ->tel()
                                            ->maxLength(255),
                                        TextInput::make('whatsapp_number')
                                            ->tel()
                                            ->maxLength(255),
                                    ]),
                                ViewComponent::make('filament.client.components.profile-completion-section')
                                    ->columnSpanFull(),
                                ViewComponent::make('filament.client.components.email-verification-section')
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('Company')
                            ->icon('heroicon-o-building-office')
                            ->schema([
                                Section::make('Company Details')
                                    ->description('Manage your company profile and contact information. Only the account owner can update these settings.')
                                    ->columns(2)
                                    ->schema([
                                        FileUpload::make('logo')
                                            ->image()
                                            ->disk('public')
                                            ->directory('client-logos')
                                            ->columnSpanFull()
                                            ->disabled($isOwner),
                                        TextInput::make('company_name')
                                            ->required()
                                            ->maxLength(255)
                                            ->disabled($isOwner),
                                        TextInput::make('contact_name')
                                            ->maxLength(255)
                                            ->disabled($isOwner),
                                        TextInput::make('client_email')
                                            ->label('Company email')
                                            ->email()
                                            ->required()
                                            ->unique(table: Client::class, column: 'email', ignorable: fn (): ?Client => Auth::user()?->client)
                                            ->disabled($isOwner),
                                        TextInput::make('client_phone')
                                            ->label('Company phone')
                                            ->tel()
                                            ->maxLength(255)
                                            ->disabled($isOwner),
                                        TextInput::make('client_whatsapp_number')
                                            ->label('Company WhatsApp')
                                            ->tel()
                                            ->maxLength(255)
                                            ->disabled($isOwner),
                                        TextInput::make('country')
                                            ->maxLength(255)
                                            ->disabled($isOwner),
                                        TextInput::make('state')
                                            ->maxLength(255)
                                            ->disabled($isOwner),
                                        TextInput::make('city')
                                            ->maxLength(255)
                                            ->disabled($isOwner),
                                        TextInput::make('address')
                                            ->maxLength(255)
                                            ->columnSpanFull()
                                            ->disabled($isOwner),
                                    ]),
                            ]),
                        Tab::make('Notifications')
                            ->icon('heroicon-o-bell')
                            ->schema([
                                Section::make('Notification Preferences')
                                    ->description('Choose how and when you want to receive updates and alerts from the portal.')
                                    ->columns(2)
                                    ->schema([
                                        Toggle::make('notify_email')
                                            ->label('Email notifications')
                                            ->helperText('Receive important updates and invoices by email.'),
                                        Toggle::make('notify_whatsapp')
                                            ->label('WhatsApp notifications')
                                            ->helperText('Get instant alerts sent to your WhatsApp number.'),
                                        Toggle::make('notify_dashboard')
                                            ->label('Dashboard alerts')
                                            ->helperText('Show notification banners inside the portal.'),
                                        Toggle::make('login_alerts')
                                            ->label('Login alerts')
                                            ->helperText('Notify you whenever a new login is detected on your account.'),
                                    ]),
                            ]),
                        Tab::make('Security')
                            ->icon('heroicon-o-lock-closed')
                            ->schema([
                                Section::make('Change Password')
                                    ->description('Set a new password for your account. Leave both fields blank to keep your current password.')
                                    ->columns(2)
                                    ->schema([
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
                                ViewComponent::make('filament.client.components.two-factor-section')
                                    ->columnSpanFull(),
                            ]),
                        Tab::make('Payout')
                            ->icon('heroicon-o-banknotes')
                            ->visible(fn (): bool => Auth::user()?->isClientOwner() ?? false)
                            ->schema([
                                Section::make('Payout Information')
                                    ->description('Enter your bank details to receive affiliate commission payouts. All information is kept confidential.')
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('payout_email')
                                            ->label('Payout email')
                                            ->email()
                                            ->maxLength(255)
                                            ->helperText('Payouts and receipts will be sent to this email address.'),
                                        TextInput::make('payout_bank_name')
                                            ->label('Bank name')
                                            ->maxLength(255),
                                        TextInput::make('payout_account_name')
                                            ->label('Account name')
                                            ->maxLength(255),
                                        TextInput::make('payout_account_number')
                                            ->label('Account number')
                                            ->maxLength(255),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        /** @var User $user */
        $user = Auth::user();

        $userData = [
            'avatar'                   => $data['avatar'] ?? null,
            'name'                     => $data['name'],
            'email'                    => $data['email'],
            'phone'                    => $data['phone'] ?? null,
            'whatsapp_number'          => $data['whatsapp_number'] ?? null,
            'notification_preferences' => [
                'email'        => (bool) ($data['notify_email'] ?? false),
                'whatsapp'     => (bool) ($data['notify_whatsapp'] ?? false),
                'dashboard'    => (bool) ($data['notify_dashboard'] ?? false),
                'login_alerts' => (bool) ($data['login_alerts'] ?? false),
            ],
        ];

        if (filled($data['password'] ?? null)) {
            $userData['password'] = $data['password'];
        }

        $user->update($userData);

        if ($user->isClientOwner() && $user->client) {
            $user->client->update([
                'logo'             => $data['logo'] ?? null,
                'company_name'     => $data['company_name'],
                'contact_name'     => $data['contact_name'] ?? null,
                'email'            => $data['client_email'],
                'phone'            => $data['client_phone'] ?? null,
                'whatsapp_number'  => $data['client_whatsapp_number'] ?? null,
                'address'          => $data['address'] ?? null,
                'country'          => $data['country'] ?? null,
                'state'            => $data['state'] ?? null,
                'city'             => $data['city'] ?? null,
            ]);
        }

        if ($user->isClientOwner()) {
            AffiliateProfile::where('user_id', $user->id)->update([
                'payout_email'          => $data['payout_email'] ?? null,
                'payout_bank_name'      => $data['payout_bank_name'] ?? null,
                'payout_account_name'   => $data['payout_account_name'] ?? null,
                'payout_account_number' => $data['payout_account_number'] ?? null,
            ]);
        }

        Notification::make()
            ->title('Profile settings saved')
            ->success()
            ->send();
    }

    public function getHeaderWidgets(): array
    {
        return [];
    }

    public function getFooterWidgets(): array
    {
        return [
            AccountInfoWidget::class,
            ActiveSessionsWidget::class,
            TeamMembersWidget::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Changes')
                ->action('save')
                ->icon('heroicon-o-check'),
        ];
    }
}
