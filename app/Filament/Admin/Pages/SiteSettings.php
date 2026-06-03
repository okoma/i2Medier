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
                                            ->description('Configure multiple AI providers for the business name generator. The tool will try your preferred provider first, then automatically switch to any other configured provider if needed.')
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
                                            ]),
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
