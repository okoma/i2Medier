<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AffiliateReferral extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliate_profile_id',
        'referral_id',
        'referred_domain',
        'product_name',
        'order_amount',
        'commission_amount',
        'status',
        'referred_at',
        'paid_at',
        'notes',
    ];

    protected $casts = [
        'order_amount' => 'decimal:2',
        'commission_amount' => 'decimal:2',
        'referred_at' => 'date',
        'paid_at' => 'datetime',
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(AffiliateProfile::class, 'affiliate_profile_id');
    }
}
