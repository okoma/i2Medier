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
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class PaymentSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCreditCard;

    protected static string|\UnitEnum|null $navigationGroup = 'Finance';

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
                Section::make('Paystack')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Toggle::make('paystack_enabled')
                            ->label('Enable Paystack'),
                        TextInput::make('paystack_public_key')
                            ->label('Public key')
                            ->maxLength(255),
                        TextInput::make('paystack_secret_key')
                            ->label('Secret key')
                            ->password()
                            ->revealable()
                            ->maxLength(255),
                    ]),
                Section::make('Bank Transfer')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Toggle::make('bank_transfer_enabled')
                            ->label('Enable bank transfer'),
                        TextInput::make('bank_account_name')
                            ->label('Account name')
                            ->maxLength(255),
                        TextInput::make('bank_name')
                            ->label('Bank name')
                            ->maxLength(255),
                        TextInput::make('bank_account_number')
                            ->label('Account number')
                            ->maxLength(255),
                        TextInput::make('bank_sort_code')
                            ->label('Sort code')
                            ->maxLength(255),
                        Textarea::make('bank_instructions')
                            ->label('Transfer instructions')
                            ->rows(4),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Settings')
                ->submit('save'),
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
