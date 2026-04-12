<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'type',
        'billing_type',
        'billing_cycle',
        'price',
        'currency',
        'is_active',
        'is_core',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'is_core' => 'boolean',
    ];

    public function addons(): HasMany
    {
        return $this->hasMany(Addon::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(ServiceSubscription::class);
    }

    public function packageItems(): HasMany
    {
        return $this->hasMany(WebsitePackageItem::class, 'itemable_id')
            ->where('itemable_type', self::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeRecurring($query)
    {
        return $query->where('billing_type', 'recurring');
    }
}
