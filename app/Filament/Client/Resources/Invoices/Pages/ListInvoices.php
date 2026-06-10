<?php

namespace App\Filament\Client\Resources\Invoices\Pages;

use App\Filament\Client\Resources\Invoices\InvoiceResource;
use App\Filament\Client\Widgets\Invoices\InvoicesStatsWidget;
use Filament\Resources\Pages\ListRecords;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;

    protected function getHeaderWidgets(): array
    {
        return [InvoicesStatsWidget::class];
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
