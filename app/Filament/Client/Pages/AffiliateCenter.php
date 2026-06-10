<?php

namespace App\Filament\Client\Pages;

use App\Filament\Client\Widgets\AffiliateCenter\AffiliateLinkWidget;
use App\Filament\Client\Widgets\AffiliateCenter\AffiliateStatsWidget;
use App\Filament\Client\Widgets\AffiliateCenter\ReferralsTableWidget;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class AffiliateCenter extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?int $navigationSort = 10;

    protected static ?string $title = 'Affiliates';

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

    public static function canAccess(): bool
    {
        return auth()->user()?->isClientOwner() ?? false;
    }
}
