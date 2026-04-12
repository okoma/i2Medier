<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'whatsapp_number',
        'avatar',
        'client_id',
        'is_active',
        'last_login_at',
        'notification_preferences',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'is_active' => 'boolean',
        'notification_preferences' => 'array',
        'password' => 'hashed',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function assignedWebsites(): BelongsToMany
    {
        return $this->belongsToMany(Website::class, 'client_member_websites');
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(SupportTicket::class, 'submitted_by');
    }

    public function assignedTickets(): HasMany
    {
        return $this->hasMany(SupportTicket::class, 'assigned_to');
    }

    public function authoredReplies(): HasMany
    {
        return $this->hasMany(TicketReply::class);
    }

    public function isAgencyStaff(): bool
    {
        return $this->client_id === null;
    }

    public function isClientOwner(): bool
    {
        return $this->hasRole('client_owner');
    }

    public function isClientMember(): bool
    {
        return $this->hasRole('client_member');
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if (! $this->is_active) {
            return false;
        }

        return match ($panel->getId()) {
            'admin' => $this->isAgencyStaff() && $this->hasAnyRole(['super_admin', 'staff']),
            'client' => ! $this->isAgencyStaff() && $this->hasAnyRole(['client_owner', 'client_member']),
            default => false,
        };
    }
}
