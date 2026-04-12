<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Website extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'name',
        'primary_domain',
        'staging_url',
        'niche',
        'cms',
        'health_state',
        'health_state_changed_at',
        'hosting_type',
        'hosting_provider',
        'hosting_server',
        'hosting_username',
        'hosting_password',
        'hosting_expiry_date',
        'hosting_status',
        'domain_type',
        'domain_registrar',
        'domain_expiry_date',
        'domain_status',
        'ssl_provider',
        'ssl_expiry_date',
        'ssl_status',
        'cms_admin_url',
        'cms_admin_user',
        'cms_admin_password',
        'notes',
        'is_active',
        'created_by',
        'package_id',
    ];

    protected $casts = [
        'hosting_expiry_date' => 'date',
        'domain_expiry_date' => 'date',
        'ssl_expiry_date' => 'date',
        'health_state_changed_at' => 'datetime',
        'is_active' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(WebsitePackage::class, 'package_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function serviceSubscriptions(): HasMany
    {
        return $this->hasMany(ServiceSubscription::class);
    }

    public function maintenanceSubscription(): HasOne
    {
        return $this->hasOne(ServiceSubscription::class)
            ->whereHas('service', fn ($query) => $query->where('type', 'maintenance'));
    }

    public function onboardingTasks(): HasMany
    {
        return $this->hasMany(OnboardingTask::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(SupportTicket::class);
    }

    public function assignedMembers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'client_member_websites');
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function transitionTo(string $state): void
    {
        $this->update([
            'health_state' => $state,
            'health_state_changed_at' => now(),
        ]);
    }

    public function isHealthy(): bool
    {
        return $this->health_state === 'active';
    }

    public function isSuspended(): bool
    {
        return $this->health_state === 'suspended';
    }

    public function scopeActive($query)
    {
        return $query->where('health_state', 'active');
    }

    public function scopeAtRisk($query)
    {
        return $query->where('health_state', 'at_risk');
    }

    public function scopeDomainExpiringSoon($query, int $days = 30)
    {
        return $query->whereBetween('domain_expiry_date', [now(), now()->addDays($days)]);
    }

    public function scopeSslExpiringSoon($query, int $days = 30)
    {
        return $query->whereBetween('ssl_expiry_date', [now(), now()->addDays($days)]);
    }
}
