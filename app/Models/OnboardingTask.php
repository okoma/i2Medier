<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OnboardingTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_id',
        'title',
        'description',
        'type',
        'status',
        'assigned_to',
        'due_at',
        'completed_at',
        'notes',
        'sort_order',
    ];

    protected $casts = [
        'due_at' => 'date',
        'completed_at' => 'datetime',
    ];

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function isComplete(): bool
    {
        return $this->status === 'completed';
    }
}
