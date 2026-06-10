<?php

namespace App\Filament\Client\Widgets\AffiliateCenter;

use App\Models\AffiliateProfile;
use Filament\Widgets\Widget;
use Illuminate\Support\Str;

class AffiliateLinkWidget extends Widget
{
    protected int|string|array $columnSpan = 1;

    protected string $view = 'filament.client.widgets.affiliate-link';

    public string $affiliateLink = '';

    public string $referralCode = '';

    public float $commissionRate = 0;

    public function mount(): void
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

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

        $this->referralCode   = $profile->referral_code ?? '';
        $this->commissionRate = (float) $profile->commission_rate;
        $this->affiliateLink  = rtrim(config('app.url'), '/') . '/?ref=' . $this->referralCode;
    }
}
