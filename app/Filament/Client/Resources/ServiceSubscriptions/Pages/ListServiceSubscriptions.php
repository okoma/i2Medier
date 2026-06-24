<?php

namespace App\Filament\Client\Resources\ServiceSubscriptions\Pages;

use App\Filament\Client\Pages\ServicesHub;
use App\Filament\Client\Resources\ServiceSubscriptions\ServiceSubscriptionResource;
use App\Filament\Client\Widgets\ServiceSubscriptions\ServiceSubscriptionsStatsWidget;
use Filament\Resources\Pages\ListRecords;

class ListServiceSubscriptions extends ListRecords
{
    protected static string $resource = ServiceSubscriptionResource::class;

    public function mount(): void
    {
        $this->redirect(ServicesHub::getUrl(panel: 'client'), navigate: true);
    }

    public function getHeaderWidgets(): array
    {
        return [ServiceSubscriptionsStatsWidget::class];
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
