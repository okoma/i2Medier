<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class WebsitePackageItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_package_id',
        'itemable_type',
        'itemable_id',
        'quantity',
        'is_optional',
    ];

    protected $casts = [
        'is_optional' => 'boolean',
    ];

    public function itemable(): MorphTo
    {
        return $this->morphTo();
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(WebsitePackage::class, 'website_package_id');
    }
}
