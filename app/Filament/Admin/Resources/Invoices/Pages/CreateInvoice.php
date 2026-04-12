<?php

namespace App\Filament\Admin\Resources\Invoices\Pages;

use App\Filament\Admin\Resources\Invoices\InvoiceResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateInvoice extends CreateRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $year = now()->year;
        $sequence = str_pad((string) (\App\Models\Invoice::whereYear('created_at', $year)->count() + 1), 4, '0', STR_PAD_LEFT);

        $data['invoice_number'] = 'INV-' . $year . '-' . $sequence;
        $data['created_by'] = auth()->id();

        if (($data['status'] ?? null) === 'paid' && blank($data['paid_at'] ?? null)) {
            $data['paid_at'] = now();
        }

        return $data;
    }
}
