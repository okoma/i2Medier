<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoicePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'method',
        'provider',
        'status',
        'amount',
        'currency',
        'reference',
        'gateway_reference',
        'gateway_payload',
        'initiated_at',
        'paid_at',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'gateway_payload' => 'array',
        'initiated_at' => 'datetime',
        'paid_at' => 'datetime',
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
