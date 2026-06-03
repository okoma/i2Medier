<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OnboardingServiceVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'onboarding_service_id',
        'key',
        'name',
        'description',
        'billing_type',
        'billing_cycle',
        'base_price',
        'price_label',
        'currency',
        'is_active',
        'sort_order',
        'settings',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'is_active' => 'boolean',
        'settings' => 'array',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(OnboardingService::class, 'onboarding_service_id');
    }

    public function addons(): HasMany
    {
        return $this->hasMany(OnboardingAddon::class)->orderBy('sort_order');
    }
}
