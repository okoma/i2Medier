<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PortfolioProject extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'type',
        'client_name',
        'summary',
        'description',
        'content',
        'featured_image',
        'gallery',
        'project_url',
        'tech_stack',
        'status',
        'published_at',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'content' => 'array',
        'gallery' => 'array',
        'tech_stack' => 'array',
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('status', 'published')
            ->where(function (Builder $query): void {
                $query->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    public function scopeInhouse(Builder $query): Builder
    {
        return $query->where('type', 'inhouse');
    }

    public function scopeClientWork(Builder $query): Builder
    {
        return $query->where('type', 'client');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(PortfolioCategory::class, 'portfolio_project_category');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
