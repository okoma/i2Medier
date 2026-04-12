<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Addon extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'name',
        'slug',
        'description',
        'billing_type',
        'billing_cycle',
        'price',
        'currency',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(AddonSubscription::class);
    }
}
