<?php

namespace App\Models;

use App\Enums\DomainStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'created_by',
        'domain_name',
        'registrar',
        'status',
        'registered_at',
        'expires_at',
        'auto_renew',
        'privacy_protected',
        'nameservers',
        'notes',
    ];

    protected $casts = [
        'status'            => DomainStatus::class,
        'registered_at'     => 'date',
        'expires_at'        => 'date',
        'auto_renew'        => 'boolean',
        'privacy_protected' => 'boolean',
        'nameservers'       => 'array',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function daysUntilExpiry(): ?int
    {
        if (! $this->expires_at) {
            return null;
        }

        return (int) now()->diffInDays($this->expires_at, false);
    }

    public function isExpiringSoon(int $days = 30): bool
    {
        $remaining = $this->daysUntilExpiry();

        return $remaining !== null && $remaining >= 0 && $remaining <= $days;
    }

    public function scopeForClient($query, int $clientId)
    {
        return $query->where('client_id', $clientId);
    }

    public function scopeActive($query)
    {
        return $query->where('status', DomainStatus::Active->value);
    }

    public function scopeExpiringSoon($query, int $days = 30)
    {
        return $query->where('status', DomainStatus::Active->value)
            ->whereBetween('expires_at', [now(), now()->addDays($days)]);
    }
}
