<?php

return [
    'bank_transfer' => [
        'account_name' => env('BANK_TRANSFER_ACCOUNT_NAME', 'i2Medier'),
        'bank_name' => env('BANK_TRANSFER_BANK_NAME', 'Your Bank'),
        'account_number' => env('BANK_TRANSFER_ACCOUNT_NUMBER', ''),
        'sort_code' => env('BANK_TRANSFER_SORT_CODE', ''),
        'instructions' => env(
            'BANK_TRANSFER_INSTRUCTIONS',
            'Use the invoice number as your transfer reference and send proof of payment after transfer.',
        ),
    ],
];
