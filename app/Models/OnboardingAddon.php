<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OnboardingAddon extends Model
{
    use HasFactory;

    protected $fillable = [
        'onboarding_service_id',
        'onboarding_service_variant_id',
        'key',
        'name',
        'description',
        'billing_type',
        'billing_cycle',
        'price',
        'price_label',
        'currency',
        'is_quantity_based',
        'quantity_label',
        'is_active',
        'sort_order',
        'settings',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_quantity_based' => 'boolean',
        'is_active' => 'boolean',
        'settings' => 'array',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(OnboardingService::class, 'onboarding_service_id');
    }

    public function variant(): BelongsTo
    {
        return $this->belongsTo(OnboardingServiceVariant::class, 'onboarding_service_variant_id');
    }
}
