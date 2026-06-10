<?php

namespace App\Filament\Client\Widgets\BillingCenter;

use App\Support\PaymentSettings;
use Filament\Widgets\Widget;

class PaymentOptionsWidget extends Widget
{
    protected int|string|array $columnSpan = 1;

    protected string $view = 'filament.client.widgets.payment-options';

    public array $paymentOptions = [];

    public function mount(): void
    {
        $settings = app(PaymentSettings::class);
        $bank     = $settings->bankTransferDetails();

        $this->paymentOptions = [
            [
                'name'        => 'Paystack',
                'enabled'     => $settings->paystackEnabled(),
                'description' => 'Pay online securely for invoices that support Paystack.',
                'detail'      => $settings->paystackEnabled() ? 'Online card and transfer checkout' : 'Not currently enabled',
            ],
            [
                'name'        => 'Bank Transfer',
                'enabled'     => $settings->bankTransferEnabled(),
                'description' => 'Manual transfer using your invoice number as reference.',
                'detail'      => $settings->bankTransferEnabled()
                    ? trim(implode(' · ', array_filter([$bank['bank_name'] ?? null, $bank['account_number'] ?? null])))
                    : 'Not currently enabled',
            ],
        ];
    }
}
