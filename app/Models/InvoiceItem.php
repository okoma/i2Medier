<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'subscriptionable_type',
        'subscriptionable_id',
        'description',
        'quantity',
        'unit_price',
        'line_total',
        'billing_period_start',
        'billing_period_end',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'unit_price' => 'decimal:2',
        'line_total' => 'decimal:2',
        'billing_period_start' => 'date',
        'billing_period_end' => 'date',
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function subscriptionable(): MorphTo
    {
        return $this->morphTo();
    }
}
