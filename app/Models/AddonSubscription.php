<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AddonSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_subscription_id',
        'onboarding_addon_id',
        'quantity',
        'client_id',
        'status',
        'price',
        'currency',
        'billing_type',
        'billing_cycle',
        'starts_at',
        'expires_at',
        'auto_renew',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'starts_at' => 'date',
        'expires_at' => 'date',
        'auto_renew' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function serviceSubscription(): BelongsTo
    {
        return $this->belongsTo(ServiceSubscription::class);
    }

    public function onboardingAddon(): BelongsTo
    {
        return $this->belongsTo(OnboardingAddon::class, 'onboarding_addon_id');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    protected function catalogName(): Attribute
    {
        return Attribute::make(
            get: fn (): ?string => $this->onboardingAddon?->name ?? null,
        );
    }
}
