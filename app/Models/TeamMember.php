<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'role',
        'bio',
        'initials',
        'theme',
        'photo',
        'linkedin_url',
        'twitter_url',
        'github_url',
        'dribbble_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function photoUrl(): ?string
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }

    public function bannerClass(): string
    {
        return match ($this->theme) {
            'blue' => 'banner-blue',
            'purple' => 'banner-purple',
            'green' => 'banner-green',
            'rose' => 'banner-rose',
            'teal' => 'banner-teal',
            default => 'banner-gold',
        };
    }

    public function avatarGradient(): string
    {
        return match ($this->theme) {
            'blue' => 'linear-gradient(135deg,#2563eb,#1d4ed8)',
            'purple' => 'linear-gradient(135deg,#7c3aed,#5b21b6)',
            'green' => 'linear-gradient(135deg,#16a34a,#15803d)',
            'rose' => 'linear-gradient(135deg,#dc2626,#b91c1c)',
            'teal' => 'linear-gradient(135deg,#0891b2,#0e7490)',
            default => 'linear-gradient(135deg,#c8a96e,#a0834a)',
        };
    }

    public function socials(): array
    {
        return array_values(array_filter([
            $this->linkedin_url ? ['platform' => 'linkedin', 'label' => 'LinkedIn', 'url' => $this->linkedin_url] : null,
            $this->twitter_url ? ['platform' => 'x', 'label' => 'Twitter', 'url' => $this->twitter_url] : null,
            $this->github_url ? ['platform' => 'github', 'label' => 'GitHub', 'url' => $this->github_url] : null,
            $this->dribbble_url ? ['platform' => 'dribbble', 'label' => 'Dribbble', 'url' => $this->dribbble_url] : null,
        ]));
    }
}
