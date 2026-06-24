<?php

namespace App\Models;

use App\Enums\DomainStatus;
use App\Enums\ManagementType;
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
        'management_type',
        'price',
        'currency',
        'billing_cycle',
        'access_registrar_url',
        'access_username',
        'access_password',
        'access_notes',
        'whois_expires_at',
        'whois_registrar',
        'whois_status_raw',
        'whois_last_checked_at',
        'whois_raw',
        'alert_sent_30',
        'alert_sent_14',
        'alert_sent_7',
    ];

    protected $casts = [
        'status'               => DomainStatus::class,
        'management_type'      => ManagementType::class,
        'registered_at'        => 'date',
        'expires_at'           => 'date',
        'whois_expires_at'     => 'date',
        'whois_last_checked_at' => 'datetime',
        'auto_renew'           => 'boolean',
        'privacy_protected'    => 'boolean',
        'nameservers'          => 'array',
        'price'                => 'decimal:2',
        'access_username'      => 'encrypted',
        'access_password'      => 'encrypted',
        'alert_sent_30'        => 'boolean',
        'alert_sent_14'        => 'boolean',
        'alert_sent_7'         => 'boolean',
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

    public function isI2Managed(): bool
    {
        return $this->management_type === ManagementType::I2Managed;
    }

    public function hasCredentials(): bool
    {
        return filled($this->access_username);
    }

    public function shouldSendAlert(int $days): bool
    {
        $remaining = $this->daysUntilExpiry();

        if ($remaining === null || $remaining < 0 || $remaining > $days) {
            return false;
        }

        return match ($days) {
            30 => ! $this->alert_sent_30,
            14 => ! $this->alert_sent_14,
            7  => ! $this->alert_sent_7,
            default => false,
        };
    }

    public function markAlertSent(int $days): void
    {
        match ($days) {
            30 => $this->update(['alert_sent_30' => true]),
            14 => $this->update(['alert_sent_14' => true]),
            7  => $this->update(['alert_sent_7' => true]),
            default => null,
        };
    }

    public function resetAlertFlags(): void
    {
        $this->update([
            'alert_sent_30' => false,
            'alert_sent_14' => false,
            'alert_sent_7'  => false,
        ]);
    }

    public function monthlyEquivalent(): ?float
    {
        if (! $this->price || ! $this->billing_cycle) {
            return null;
        }

        $months = match ($this->billing_cycle) {
            'monthly'   => 1,
            'quarterly' => 3,
            'biannual'  => 6,
            'annual'    => 12,
            'biennial'  => 24,
            default     => null,
        };

        return $months ? (float) $this->price / $months : null;
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

    public function scopeNeedsWhoisCheck($query)
    {
        return $query->whereNotNull('domain_name');
    }
}
