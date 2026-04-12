<?php

namespace App\Support;

use App\Models\PaymentSetting;

class PaymentSettings
{
    public function record(): ?PaymentSetting
    {
        return PaymentSetting::query()->first();
    }

    public function paystackEnabled(): bool
    {
        $record = $this->record();

        if ($record?->paystack_enabled !== null) {
            return (bool) $record->paystack_enabled;
        }

        return filled(config('services.paystack.secret_key'));
    }

    public function paystackPublicKey(): string
    {
        $record = $this->record();

        return (string) ($record?->paystack_public_key ?: config('services.paystack.public_key', ''));
    }

    public function paystackSecretKey(): string
    {
        $record = $this->record();

        return (string) ($record?->paystack_secret_key ?: config('services.paystack.secret_key', ''));
    }

    public function bankTransferEnabled(): bool
    {
        $record = $this->record();

        if ($record?->bank_transfer_enabled !== null) {
            return (bool) $record->bank_transfer_enabled;
        }

        return filled(config('billing.bank_transfer.account_number'));
    }

    public function bankTransferDetails(): array
    {
        $record = $this->record();
        $fallback = config('billing.bank_transfer');

        return [
            'account_name' => (string) ($record?->bank_account_name ?: ($fallback['account_name'] ?? '')),
            'bank_name' => (string) ($record?->bank_name ?: ($fallback['bank_name'] ?? '')),
            'account_number' => (string) ($record?->bank_account_number ?: ($fallback['account_number'] ?? '')),
            'sort_code' => (string) ($record?->bank_sort_code ?: ($fallback['sort_code'] ?? '')),
            'instructions' => (string) ($record?->bank_instructions ?: ($fallback['instructions'] ?? '')),
        ];
    }

    public function formDefaults(): array
    {
        $record = $this->record();
        $bankTransfer = $this->bankTransferDetails();

        return [
            'paystack_enabled' => $record?->paystack_enabled ?? filled($this->paystackSecretKey()),
            'paystack_public_key' => $record?->paystack_public_key ?: $this->paystackPublicKey(),
            'paystack_secret_key' => $record?->paystack_secret_key ?: $this->paystackSecretKey(),
            'bank_transfer_enabled' => $record?->bank_transfer_enabled ?? filled($bankTransfer['account_number']),
            'bank_account_name' => $record?->bank_account_name ?: $bankTransfer['account_name'],
            'bank_name' => $record?->bank_name ?: $bankTransfer['bank_name'],
            'bank_account_number' => $record?->bank_account_number ?: $bankTransfer['account_number'],
            'bank_sort_code' => $record?->bank_sort_code ?: $bankTransfer['sort_code'],
            'bank_instructions' => $record?->bank_instructions ?: $bankTransfer['instructions'],
        ];
    }
}
