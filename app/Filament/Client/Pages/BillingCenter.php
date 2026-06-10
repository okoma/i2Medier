<?php

namespace App\Filament\Client\Pages;

use App\Filament\Client\Widgets\BillingCenter\BillingInvoicesWidget;
use App\Filament\Client\Widgets\BillingCenter\BillingPaymentsWidget;
use App\Filament\Client\Widgets\BillingCenter\BillingStatsWidget;
use App\Filament\Client\Widgets\BillingCenter\PaymentOptionsWidget;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class BillingCenter extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static ?int $navigationSort = 8;

    protected static ?string $title = 'Billing';

    public function getHeaderWidgets(): array
    {
        return [BillingStatsWidget::class];
    }

    public function getFooterWidgets(): array
    {
        return [];
    }

    public function getWidgets(): array
    {
        return [
            BillingStatsWidget::class,
            BillingInvoicesWidget::class,
            BillingPaymentsWidget::class,
            PaymentOptionsWidget::class,
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->isClientOwner() ?? false;
    }
}
