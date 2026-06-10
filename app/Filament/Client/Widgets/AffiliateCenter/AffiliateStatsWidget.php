<?php

namespace App\Filament\Client\Widgets\AffiliateCenter;

use App\Models\AffiliateProfile;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Str;

class AffiliateStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
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

        $referrals = $profile->referrals();

        $totalCount    = (clone $referrals)->count();
        $totalEarnings = (float) (clone $referrals)->sum('commission_amount');
        $paid          = (float) (clone $referrals)->where('status', 'paid')->sum('commission_amount');
        $pending       = (float) (clone $referrals)->where('status', 'pending')->sum('commission_amount');
        $rate          = (float) $profile->commission_rate;

        $fmt = fn (float $n): string => '₦' . number_format($n, 0);

        return [
            Stat::make('Total Referrals', (string) $totalCount)
                ->description('All time')
                ->icon('heroicon-o-users')
                ->color('info'),
            Stat::make('Total Earnings', $fmt($totalEarnings))
                ->description('All time commission')
                ->icon('heroicon-o-banknotes')
                ->color('success'),
            Stat::make('Pending Payout', $fmt($pending))
                ->description('Awaiting approval')
                ->icon('heroicon-o-clock')
                ->color($pending > 0 ? 'warning' : 'success'),
            Stat::make('Paid Earnings', $fmt($paid))
                ->description('Confirmed payments')
                ->icon('heroicon-o-check-circle')
                ->color('success'),
            Stat::make('Commission Rate', $rate . '%')
                ->description('Per successful referral')
                ->icon('heroicon-o-arrow-trending-up')
                ->color('info'),
        ];
    }
}
