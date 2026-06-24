<?php

namespace App\Filament\Client\Resources\ServiceSubscriptions\Pages;

use App\Filament\Client\Pages\ServicesHub;
use App\Filament\Client\Pages\StartProject;
use App\Filament\Client\Resources\ServiceSubscriptions\ServiceSubscriptionResource;
use App\Models\ServiceSubscription;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewServiceSubscription extends ViewRecord
{
    protected static string $resource = ServiceSubscriptionResource::class;

    protected string $view = 'filament.client.resources.service-subscriptions.pages.view-service-subscription';

    protected function getHeaderActions(): array
    {
        /** @var ServiceSubscription $record */
        $record = $this->getRecord();

        return [
            Action::make('backToServices')
                ->label('Back to Services')
                ->icon('heroicon-o-arrow-left')
                ->url(ServicesHub::getUrl(panel: 'client'))
                ->color('gray'),
            Action::make('orderSimilar')
                ->label('Order Similar Service')
                ->icon('heroicon-o-plus')
                ->url(StartProject::getUrl(parameters: array_filter([
                    'services' => $record->onboardingService?->key,
                    'platform' => $record->onboardingVariant?->key,
                    'source_page' => 'portal-services',
                    'source_label' => 'Client Portal Services',
                ], fn ($value) => filled($value)), panel: 'client'))
                ->color('primary'),
        ];
    }

    public function getStatusMeta(): array
    {
        /** @var ServiceSubscription $record */
        $record = $this->getRecord();

        $state = ($record->status === 'active'
            && $record->expires_at
            && $record->expires_at->isBetween(now(), now()->addDays(30)))
            ? 'expiring_soon'
            : $record->status;

        return match ($state) {
            'active' => ['label' => 'Active', 'color' => 'emerald'],
            'expiring_soon' => ['label' => 'Expiring Soon', 'color' => 'amber'],
            'suspended' => ['label' => 'Suspended', 'color' => 'sky'],
            'expired' => ['label' => 'Expired', 'color' => 'slate'],
            'cancelled' => ['label' => 'Cancelled', 'color' => 'slate'],
            default => ['label' => ucwords(str_replace('_', ' ', (string) $state)), 'color' => 'slate'],
        };
    }

    public function getRenewalNote(): string
    {
        /** @var ServiceSubscription $record */
        $record = $this->getRecord();

        if (! $record->expires_at) {
            return 'No renewal date set';
        }

        $days = now()->diffInDays($record->expires_at, false);

        if ($days > 30) {
            return 'Renewal is not due soon';
        }

        if ($days >= 0) {
            return 'Due in ' . $days . ' day' . ($days === 1 ? '' : 's');
        }

        $overdue = abs($days);

        return 'Overdue by ' . $overdue . ' day' . ($overdue === 1 ? '' : 's');
    }
}
