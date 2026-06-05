<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailDeliverabilityTest extends Model
{
    protected $fillable = [
        'public_id',
        'subject_token',
        'source_driver',
        'status',
        'input',
        'normalized_domain',
        'sender_address',
        'sending_domain',
        'check_type',
        'client_target',
        'esp',
        'volume',
        'test_recipient',
        'expected_subject',
        'received_to_address',
        'received_from_address',
        'received_from_name',
        'provider_message_id',
        'source_message_uid',
        'raw_headers',
        'authentication_results',
        'raw_text',
        'raw_html',
        'report',
        'meta',
        'received_at',
        'processed_at',
        'auto_deleted_at',
    ];

    protected $casts = [
        'report' => 'array',
        'meta' => 'array',
        'received_at' => 'datetime',
        'processed_at' => 'datetime',
        'auto_deleted_at' => 'datetime',
    ];
}
