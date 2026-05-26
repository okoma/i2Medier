<?php

namespace App\Filament\Client\Resources\Invoices\Pages;

use App\Filament\Client\Resources\Invoices\InvoiceResource;
use Filament\Resources\Pages\ListRecords;

class ListInvoices extends ListRecords
{
    protected static string $resource = InvoiceResource::class;

    protected string $view = 'filament.client.resources.invoices.pages.list-invoices';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
