<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OnboardingService extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
        'icon',
        'description',
        'billing_type',
        'billing_cycle',
        'base_price',
        'price_label',
        'currency',
        'is_active',
        'show_on_public_onboarding',
        'sort_order',
        'settings',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'is_active' => 'boolean',
        'show_on_public_onboarding' => 'boolean',
        'settings' => 'array',
    ];

    public function variants(): HasMany
    {
        return $this->hasMany(OnboardingServiceVariant::class)->orderBy('sort_order');
    }

    public function addons(): HasMany
    {
        return $this->hasMany(OnboardingAddon::class)
            ->whereNull('onboarding_service_variant_id')
            ->orderBy('sort_order');
    }
}
