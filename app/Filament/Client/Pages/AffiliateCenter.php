<?php

namespace App\Filament\Client\Pages;

use App\Filament\Client\Widgets\AffiliateCenter\AffiliateLinkWidget;
use App\Filament\Client\Widgets\AffiliateCenter\AffiliateStatsWidget;
use App\Filament\Client\Widgets\AffiliateCenter\ReferralsTableWidget;
use App\Models\AffiliateProfile;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class AffiliateCenter extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?int $navigationSort = 10;

    protected static ?string $title = 'Affiliates';

    public ?array $data = [];

    public ?AffiliateProfile $profile = null;

    public function mount(): void
    {
        $this->profile = $this->resolveProfile();

        $this->form->fill([
            'payout_email'          => $this->profile->payout_email,
            'payout_bank_name'      => $this->profile->payout_bank_name,
            'payout_account_name'   => $this->profile->payout_account_name,
            'payout_account_number' => $this->profile->payout_account_number,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Section::make('Payout Settings')
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('payout_email')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('payout_bank_name')
                            ->maxLength(255),
                        TextInput::make('payout_account_name')
                            ->maxLength(255),
                        TextInput::make('payout_account_number')
                            ->maxLength(255),
                    ]),
            ]);
    }

    public function save(): void
    {
        $this->profile->update($this->form->getState());

        Notification::make()
            ->title('Affiliate settings saved')
            ->success()
            ->send();
    }

    public function resolveProfile(): AffiliateProfile
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        return AffiliateProfile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'client_id'       => $user->client_id,
                'referral_code'   => Str::upper(Str::random(8)),
                'status'          => 'active',
                'commission_rate' => 20,
                'payout_email'    => $user->email,
            ],
        );
    }

    public function getHeaderWidgets(): array
    {
        return [AffiliateStatsWidget::class];
    }

    public function getFooterWidgets(): array
    {
        return [
            AffiliateLinkWidget::class,
            ReferralsTableWidget::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->isClientOwner() ?? false;
    }
}
