<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AffiliateProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'user_id',
        'referral_code',
        'status',
        'commission_rate',
        'payout_email',
        'payout_bank_name',
        'payout_account_name',
        'payout_account_number',
        'notes',
    ];

    protected $casts = [
        'commission_rate' => 'decimal:2',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(AffiliateReferral::class);
    }
}
