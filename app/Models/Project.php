<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'reference',
        'client_id',
        'created_by',
        'status',
        'timeline',
        'budget',
        'source',
        'domain_preference',
        'hosting_preference',
        'message',
        'brief_pdf',
        'source_page',
        'source_label',
        'services',
        'terms_accepted_at',
        'converted_at',
    ];

    protected $casts = [
        'status' => ProjectStatus::class,
        'services' => 'array',
        'terms_accepted_at' => 'datetime',
        'converted_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function serviceSubscriptions(): HasMany
    {
        return $this->hasMany(ServiceSubscription::class);
    }

    public function onboardingTasks(): HasMany
    {
        return $this->hasMany(OnboardingTask::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(ProjectNote::class)->latest();
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function isConverted(): bool
    {
        return $this->status === ProjectStatus::Converted;
    }

    public function scopeEnquiries($query)
    {
        return $query->where('status', ProjectStatus::Enquiry);
    }

    public function scopeConverted($query)
    {
        return $query->where('status', ProjectStatus::Converted);
    }
}
