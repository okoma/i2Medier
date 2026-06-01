<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PortfolioCategory extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'color', 'sort_order'];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(PortfolioProject::class, 'portfolio_project_category');
    }
}
