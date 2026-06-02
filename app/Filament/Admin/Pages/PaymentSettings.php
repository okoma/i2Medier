<?php

namespace App\Filament\Admin\Pages;

use App\Models\PaymentSetting;
use App\Support\PaymentSettings as PaymentSettingsManager;
use Filament\Actions\Action;
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

class PaymentSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCreditCard;

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 2;

    protected static ?string $title = 'Payment Settings';

    protected string $view = 'filament.admin.pages.payment-settings';

    public ?array $data = [];

    public function mount(PaymentSettingsManager $settings): void
    {
        $this->form->fill($settings->formDefaults());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Tabs::make('Payment settings tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Paystack')
                            ->schema([
                                Section::make('Paystack')
                                    ->columns(2)
                                    ->schema([
                                        Toggle::make('paystack_enabled')
                                            ->label('Enable Paystack')
                                            ->helperText('Turn this on to allow clients to pay invoices online with card or supported bank transfer through Paystack.')
                                            ->columnSpan(2),
                                        TextInput::make('paystack_public_key')
                                            ->label('Public key')
                                            ->helperText('Your Paystack public key used by the checkout interface on invoice payment screens.')
                                            ->maxLength(255),
                                        TextInput::make('paystack_secret_key')
                                            ->label('Secret key')
                                            ->helperText('Your Paystack secret key used for secure server-side payment verification. Keep this private.')
                                            ->password()
                                            ->revealable()
                                            ->maxLength(255),
                                    ]),
                            ]),
                        Tab::make('Bank Transfer')
                            ->schema([
                                Section::make('Bank Transfer')
                                    ->columns(2)
                                    ->schema([
                                        Toggle::make('bank_transfer_enabled')
                                            ->label('Enable bank transfer')
                                            ->helperText('Turn this on to show manual bank transfer as a payment option on eligible invoices.')
                                            ->columnSpan(2),
                                        TextInput::make('bank_account_name')
                                            ->label('Account name')
                                            ->helperText('The official account name clients should pay to.')
                                            ->maxLength(255),
                                        TextInput::make('bank_name')
                                            ->label('Bank name')
                                            ->helperText('The bank or financial institution receiving client transfers.')
                                            ->maxLength(255),
                                        TextInput::make('bank_account_number')
                                            ->label('Account number')
                                            ->helperText('The destination account number clients should use when making transfers.')
                                            ->maxLength(255),
                                        TextInput::make('bank_sort_code')
                                            ->label('Sort code')
                                            ->helperText('Optional. Add a sort code or routing reference if your banking setup requires it.')
                                            ->maxLength(255),
                                        Textarea::make('bank_instructions')
                                            ->label('Transfer instructions')
                                            ->helperText('Add any extra instructions clients should follow, such as using the invoice number as payment reference.')
                                            ->rows(4)
                                            ->columnSpan(2),
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
                ->action('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        PaymentSetting::query()->updateOrCreate(
            ['id' => PaymentSetting::query()->value('id') ?? 1],
            $data,
        );

        Notification::make()
            ->title('Payment settings saved')
            ->success()
            ->send();
    }
}
