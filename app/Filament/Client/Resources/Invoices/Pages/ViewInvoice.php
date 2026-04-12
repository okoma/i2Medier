<?php

namespace App\Filament\Client\Resources\Invoices\Pages;

use App\Filament\Client\Resources\Invoices\InvoiceResource;
use App\Support\PaymentSettings;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewInvoice extends ViewRecord
{
    protected static string $resource = InvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('payWithPaystack')
                ->label('Pay with Paystack')
                ->icon('heroicon-o-credit-card')
                ->color('success')
                ->visible(fn (): bool => $this->record->canBePaidOnline() && app(PaymentSettings::class)->paystackEnabled())
                ->url(fn (): string => route('billing.paystack.redirect', ['invoice' => $this->record])),
            Action::make('bankTransfer')
                ->label('Bank Transfer')
                ->icon('heroicon-o-building-library')
                ->color('gray')
                ->visible(fn (): bool => $this->record->canBePaidByBankTransfer() && app(PaymentSettings::class)->bankTransferEnabled())
                ->modalHeading('Bank transfer details')
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Close')
                ->modalContent(fn () => view('filament.client.invoices.bank-transfer-details', [
                    'invoice' => $this->record,
                    'bankTransfer' => app(PaymentSettings::class)->bankTransferDetails(),
                ])),
        ];
    }
}
