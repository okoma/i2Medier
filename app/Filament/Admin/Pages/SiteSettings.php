<?php

namespace App\Filament\Admin\Pages;

use App\Models\SiteSetting;
use App\Support\SiteSettings as SiteSettingsManager;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class SiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 1;

    protected static ?string $title = 'Site Settings';

    protected static ?string $navigationLabel = 'Site Settings';

    protected string $view = 'filament.admin.pages.site-settings';

    public ?array $data = [];

    public function mount(SiteSettingsManager $settings): void
    {
        $this->form->fill($settings->formDefaults());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Tabs::make('Site settings tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Branding')
                            ->schema([
                                Section::make('Branding')
                                    ->description('Upload your logo variants used across the site.')
                                    ->columns(2)
                                    ->schema([
                                        FileUpload::make('logo_dark')
                                            ->label('Logo — Dark (for light backgrounds)')
                                            ->helperText('Used on the public site header, email templates, and light-background contexts. SVG or PNG recommended.')
                                            ->image()
                                            ->disk('public')
                                            ->directory('branding')
                                            ->visibility('public')
                                            ->maxSize(2048)
                                            ->acceptedFileTypes(['image/png', 'image/svg+xml', 'image/webp'])
                                            ->imagePreviewHeight('80')
                                            ->columnSpan(1),

                                        FileUpload::make('logo_light')
                                            ->label('Logo — Light / White (for dark backgrounds)')
                                            ->helperText('Used in the site footer, dark hero sections, and dark-background contexts. SVG or PNG recommended.')
                                            ->image()
                                            ->disk('public')
                                            ->directory('branding')
                                            ->visibility('public')
                                            ->maxSize(2048)
                                            ->acceptedFileTypes(['image/png', 'image/svg+xml', 'image/webp'])
                                            ->imagePreviewHeight('80')
                                            ->columnSpan(1),

                                        FileUpload::make('favicon')
                                            ->label('Favicon')
                                            ->helperText('Shown in browser tabs and bookmarks. Square PNG, SVG, or ICO recommended.')
                                            ->disk('public')
                                            ->directory('branding')
                                            ->visibility('public')
                                            ->maxSize(1024)
                                            ->acceptedFileTypes(['image/png', 'image/svg+xml', 'image/x-icon', 'image/vnd.microsoft.icon'])
                                            ->imagePreviewHeight('48')
                                            ->columnSpan(1),

                                        FileUpload::make('apple_touch_icon')
                                            ->label('Apple Touch Icon')
                                            ->helperText('Used when people save your website to an iPhone or iPad home screen. PNG recommended.')
                                            ->image()
                                            ->disk('public')
                                            ->directory('branding')
                                            ->visibility('public')
                                            ->maxSize(1024)
                                            ->acceptedFileTypes(['image/png', 'image/webp'])
                                            ->imagePreviewHeight('48')
                                            ->columnSpan(1),
                                    ]),
                            ]),

                        Tab::make('Analytics')
                            ->schema([
                                Section::make('Analytics & Tracking')
                                    ->description('Configure Google Analytics 4 for the public website.')
                                    ->columns(2)
                                    ->schema([
                                        Toggle::make('analytics_enabled')
                                            ->label('Enable Google Analytics')
                                            ->helperText('When enabled, GA4 will load on the public site after a visitor accepts cookies.')
                                            ->columnSpan(2),

                                        TextInput::make('analytics_measurement_id')
                                            ->label('GA4 Measurement ID')
                                            ->placeholder('G-XXXXXXXXXX')
                                            ->helperText('Found in Google Analytics → Admin → Data Streams → Measurement ID.')
                                            ->maxLength(30)
                                            ->columnSpan(1)
                                            ->rules(['nullable', 'regex:/^G-[A-Z0-9]+$/'])
                                            ->validationMessages([
                                                'regex' => 'The measurement ID must be in the format G-XXXXXXXXXX.',
                                            ]),

                                        Placeholder::make('analytics_help')
                                            ->label('')
                                            ->content('Analytics only fires after a visitor clicks "Accept All" in the cookie consent banner. Rejecting non-essential cookies prevents GA from loading entirely.')
                                            ->columnSpan(1),
                                    ]),
                            ]),

                        Tab::make('Cookies')
                            ->schema([
                                Section::make('Cookie Consent')
                                    ->description('Control the cookie consent banner shown to all website visitors.')
                                    ->columns(2)
                                    ->schema([
                                        Toggle::make('cookie_consent_enabled')
                                            ->label('Show Cookie Consent Banner')
                                            ->helperText('Disabling this hides the banner entirely. Only do this if you have no analytics or non-essential cookies active.')
                                            ->columnSpan(2),

                                        Textarea::make('cookie_banner_message')
                                            ->label('Banner Message')
                                            ->helperText('The message shown in the cookie consent banner. Leave blank to use the default message.')
                                            ->placeholder('We use cookies to understand how visitors use our site and to improve your experience. Analytics cookies are only activated with your consent.')
                                            ->rows(3)
                                            ->columnSpan(2),
                                    ]),
                            ]),

                        Tab::make('API Keys')
                            ->schema([
                                Section::make('SEO Audit Tool')
                                    ->description('API keys used by the free SEO audit tool. Keys are stored encrypted in the database and never exposed to visitors.')
                                    ->columns(1)
                                    ->schema([
                                        TextInput::make('pagespeed_api_key')
                                            ->label('Google PageSpeed Insights API Key')
                                            ->helperText('Get a key at console.cloud.google.com and enable the PageSpeed Insights API. Required for the public SEO audit tool.')
                                            ->password()
                                            ->revealable()
                                            ->maxLength(100)
                                            ->placeholder('AIza…'),

                                        TextInput::make('crux_api_key')
                                            ->label('Chrome UX Report (CrUX) API Key')
                                            ->helperText('Get a Google API key and enable the Chrome UX Report API. Required for real field Core Web Vitals in the public SEO audit tool.')
                                            ->password()
                                            ->revealable()
                                            ->maxLength(100)
                                            ->placeholder('AIza…'),

                                        TextInput::make('anthropic_api_key')
                                            ->label('Anthropic API Key (Claude)')
                                            ->helperText('Get a key at console.anthropic.com. Required to generate SEO audit recommendations with Claude.')
                                            ->password()
                                            ->revealable()
                                            ->maxLength(200)
                                            ->placeholder('sk-ant-…'),

                                        Section::make('Business Name Generator AI Providers')
                                            ->description('Configure shared AI providers for the business name generator and SEO audit recommendations. The app will try your preferred provider first, then automatically switch to any other configured provider if needed.')
                                            ->columns(1)
                                            ->schema([
                                                Select::make('ai_primary_provider')
                                                    ->label('Preferred AI Provider')
                                                    ->options([
                                                        'auto' => 'Auto-select best available',
                                                        'anthropic' => 'Anthropic (Claude)',
                                                        'openai' => 'OpenAI',
                                                        'gemini' => 'Google Gemini',
                                                        'mistral' => 'Mistral',
                                                    ])
                                                    ->default('auto')
                                                    ->native(false)
                                                    ->helperText('If the preferred provider fails, the tool automatically falls through to the next configured provider.'),

                                                TextInput::make('openai_api_key')
                                                    ->label('OpenAI API Key')
                                                    ->helperText('Used for business name generation fallback or as the preferred provider.')
                                                    ->password()
                                                    ->revealable()
                                                    ->maxLength(200)
                                                    ->placeholder('sk-…'),

                                                TextInput::make('gemini_api_key')
                                                    ->label('Google Gemini API Key')
                                                    ->helperText('Used for business name generation fallback or as the preferred provider.')
                                                    ->password()
                                                    ->revealable()
                                                    ->maxLength(200)
                                                    ->placeholder('AIza…'),

                                                TextInput::make('mistral_api_key')
                                                    ->label('Mistral API Key')
                                                    ->helperText('Used for business name generation fallback or as the preferred provider.')
                                                    ->password()
                                                    ->revealable()
                                                    ->maxLength(200)
                                                    ->placeholder('…'),

                                                Select::make('anthropic_model')
                                                    ->label('Anthropic Model')
                                                    ->options([
                                                        'claude-haiku-4-5-20251001' => 'Claude Haiku 4.5',
                                                        'claude-sonnet-4-20250514' => 'Claude Sonnet 4',
                                                    ])
                                                    ->default('claude-haiku-4-5-20251001')
                                                    ->native(false)
                                                    ->searchable()
                                                    ->helperText('Used when Anthropic is selected or reached through fallback.'),

                                                Select::make('openai_model')
                                                    ->label('OpenAI Model')
                                                    ->options([
                                                        'gpt-4o-mini' => 'GPT-4o mini',
                                                        'gpt-4o' => 'GPT-4o',
                                                    ])
                                                    ->default('gpt-4o-mini')
                                                    ->native(false)
                                                    ->searchable()
                                                    ->helperText('Used when OpenAI is selected or reached through fallback.'),

                                                Select::make('gemini_model')
                                                    ->label('Gemini Model')
                                                    ->options([
                                                        'gemini-2.5-flash' => 'Gemini 2.5 Flash',
                                                        'gemini-2.5-pro' => 'Gemini 2.5 Pro',
                                                    ])
                                                    ->default('gemini-2.5-flash')
                                                    ->native(false)
                                                    ->searchable()
                                                    ->helperText('Used when Gemini is selected or reached through fallback.'),

                                                Select::make('mistral_model')
                                                    ->label('Mistral Model')
                                                    ->options([
                                                        'mistral-small-latest' => 'Mistral Small Latest',
                                                        'ministral-3b-2512' => 'Ministral 3 3B',
                                                        'ministral-8b-2512' => 'Ministral 3 8B',
                                                        'ministral-14b-2512' => 'Ministral 3 14B',
                                                        'magistral-small-2509' => 'Magistral Small 2509',
                                                        'magistral-medium-2509' => 'Magistral Medium 2509',
                                                    ])
                                                    ->default('mistral-small-latest')
                                                    ->native(false)
                                                    ->searchable()
                                                    ->helperText('Used when Mistral is selected or reached through fallback.'),
                                            ]),
                                    ]),
                                Section::make('Email Deliverability Live Tester')
                                    ->description('Configure the inbox the live deliverability tool should watch when visitors send a real test message. Results are read either from Postmark inbound webhooks or a cPanel mailbox over IMAP.')
                                    ->columns(2)
                                    ->schema([
                                        Select::make('deliverability_capture_driver')
                                            ->label('Capture Driver')
                                            ->options([
                                                'imap' => 'cPanel / IMAP mailbox',
                                                'postmark' => 'Postmark inbound webhook',
                                            ])
                                            ->default('imap')
                                            ->native(false)
                                            ->required()
                                            ->helperText('Choose how the tool should receive the real test email.'),

                                        Toggle::make('deliverability_auto_delete')
                                            ->label('Auto-delete captured test emails')
                                            ->helperText('Recommended for IMAP mailboxes so the inbox stays clean after a test is processed.'),

                                        TextInput::make('deliverability_test_inbox_address')
                                            ->label('Test Inbox Domain / Catch-all Domain')
                                            ->placeholder('test-inbox.i2medier.com')
                                            ->helperText('The tool generates unique addresses like token@test-inbox.i2medier.com for each live test. Point this domain to your catch-all mailbox or Postmark inbound.')
                                            ->maxLength(255)
                                            ->columnSpan(2),

                                        TextInput::make('deliverability_postmark_webhook_token')
                                            ->label('Postmark Webhook Token')
                                            ->helperText('Used to secure the inbound Postmark webhook endpoint.')
                                            ->password()
                                            ->revealable()
                                            ->maxLength(255)
                                            ->columnSpan(2)
                                            ->visible(fn (callable $get) => $get('deliverability_capture_driver') === 'postmark'),

                                        Placeholder::make('deliverability_postmark_path')
                                            ->label('Postmark Webhook URL')
                                            ->content(function (callable $get): string {
                                                $token = trim((string) $get('deliverability_postmark_webhook_token'));

                                                return $token === ''
                                                    ? 'Save a webhook token first, then use the generated URL in Postmark inbound settings.'
                                                    : route('tools.email-deliverability-checker.postmark', ['token' => $token]);
                                            })
                                            ->columnSpan(2)
                                            ->visible(fn (callable $get) => $get('deliverability_capture_driver') === 'postmark'),

                                        TextInput::make('deliverability_imap_host')
                                            ->label('IMAP Host')
                                            ->placeholder('mail.yourdomain.com')
                                            ->maxLength(255)
                                            ->visible(fn (callable $get) => $get('deliverability_capture_driver') === 'imap'),

                                        TextInput::make('deliverability_imap_port')
                                            ->label('IMAP Port')
                                            ->numeric()
                                            ->default(993)
                                            ->minValue(1)
                                            ->maxValue(65535)
                                            ->visible(fn (callable $get) => $get('deliverability_capture_driver') === 'imap'),

                                        Select::make('deliverability_imap_encryption')
                                            ->label('IMAP Encryption')
                                            ->options([
                                                'ssl' => 'SSL',
                                                'tls' => 'TLS',
                                                'none' => 'None',
                                            ])
                                            ->default('ssl')
                                            ->native(false)
                                            ->visible(fn (callable $get) => $get('deliverability_capture_driver') === 'imap'),

                                        TextInput::make('deliverability_imap_folder')
                                            ->label('Mailbox Folder')
                                            ->default('INBOX')
                                            ->maxLength(255)
                                            ->visible(fn (callable $get) => $get('deliverability_capture_driver') === 'imap'),

                                        TextInput::make('deliverability_imap_username')
                                            ->label('IMAP Username')
                                            ->placeholder('catchall@test-inbox.i2medier.com')
                                            ->maxLength(255)
                                            ->columnSpan(1)
                                            ->visible(fn (callable $get) => $get('deliverability_capture_driver') === 'imap'),

                                        TextInput::make('deliverability_imap_password')
                                            ->label('IMAP Password')
                                            ->password()
                                            ->revealable()
                                            ->maxLength(255)
                                            ->columnSpan(1)
                                            ->visible(fn (callable $get) => $get('deliverability_capture_driver') === 'imap'),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Settings')
                ->icon(Heroicon::OutlinedCheck)
                ->action('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        SiteSetting::query()->updateOrCreate(
            ['id' => SiteSetting::query()->value('id') ?? 1],
            $data,
        );

        Notification::make()
            ->title('Site settings saved')
            ->success()
            ->send();
    }
}
