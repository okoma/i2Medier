<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_id',
        'service_id',
        'client_id',
        'status',
        'billing_type',
        'billing_cycle',
        'price',
        'currency',
        'starts_at',
        'expires_at',
        'suspended_at',
        'archived_at',
        'cancelled_at',
        'last_renewed_at',
        'auto_renew',
        'notes',
        'created_by',
    ];

    protected $casts = [
        'starts_at' => 'date',
        'expires_at' => 'date',
        'suspended_at' => 'datetime',
        'archived_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'last_renewed_at' => 'datetime',
        'auto_renew' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function addonSubscriptions(): HasMany
    {
        return $this->hasMany(AddonSubscription::class);
    }

    public function invoiceItems(): HasMany
    {
        return $this->hasMany(InvoiceItem::class, 'subscriptionable_id')
            ->where('subscriptionable_type', self::class);
    }

    public function isExpired(): bool
    {
        return $this->expires_at?->isPast() && $this->status === 'expired';
    }

    public function daysOverdue(): int
    {
        if (! $this->expires_at?->isPast()) {
            return 0;
        }

        return now()->diffInDays($this->expires_at);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeExpiringSoon($query, int $days = 30)
    {
        return $query->where('status', 'active')
            ->whereBetween('expires_at', [now(), now()->addDays($days)]);
    }
}
