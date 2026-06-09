<?php

namespace App\Filament\Client\Pages;

use App\Models\AffiliateProfile;
use App\Models\AffiliateReferral;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class AffiliateCenter extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?int $navigationSort = 10;

    protected static ?string $title = 'Affiliates';

    protected string $view = 'filament.client.pages.affiliate-center';

    public ?array $data = [];

    public Collection $recentReferrals;

    public ?AffiliateProfile $profile = null;

    public function mount(): void
    {
        $this->profile = $this->resolveProfile();
        $this->recentReferrals = $this->profile->referrals()->latest('referred_at')->limit(5)->get();

        $this->form->fill([
            'payout_email' => $this->profile->payout_email,
            'payout_bank_name' => $this->profile->payout_bank_name,
            'payout_account_name' => $this->profile->payout_account_name,
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

    protected function getHeaderActions(): array
    {
        return [];
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

        return AffiliateProfile::query()->firstOrCreate(
            ['user_id' => $user->id],
            [
                'client_id' => $user->client_id,
                'referral_code' => Str::upper(Str::random(8)),
                'status' => 'active',
                'commission_rate' => 20,
                'payout_email' => $user->email,
            ],
        );
    }

    public function totalReferrals(): int
    {
        return $this->profile?->referrals()->count() ?? 0;
    }

    public function totalCommission(): float
    {
        return (float) ($this->profile?->referrals()->sum('commission_amount') ?? 0);
    }

    public function paidCommission(): float
    {
        return (float) ($this->profile?->referrals()->where('status', 'paid')->sum('commission_amount') ?? 0);
    }

    public function pendingCommission(): float
    {
        return (float) ($this->profile?->referrals()->where('status', 'pending')->sum('commission_amount') ?? 0);
    }

    public function affiliateLink(): string
    {
        return rtrim(config('app.url'), '/') . '/?ref=' . $this->profile?->referral_code;
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->isClientOwner() ?? false;
    }
}
