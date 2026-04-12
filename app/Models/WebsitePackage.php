<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebsitePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'currency',
        'is_active',
        'is_featured',
        'sort_order',
        'features',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'features' => 'array',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(WebsitePackageItem::class);
    }

    public function websites(): HasMany
    {
        return $this->hasMany(Website::class, 'package_id');
    }
}
