<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'paystack_enabled',
        'paystack_public_key',
        'paystack_secret_key',
        'bank_transfer_enabled',
        'bank_account_name',
        'bank_name',
        'bank_account_number',
        'bank_sort_code',
        'bank_instructions',
    ];

    protected $casts = [
        'paystack_enabled' => 'boolean',
        'bank_transfer_enabled' => 'boolean',
        'paystack_secret_key' => 'encrypted',
    ];
}
