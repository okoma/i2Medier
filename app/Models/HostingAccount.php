<?php

namespace App\Models;

use App\Enums\HostingStatus;
use App\Enums\HostingType;
use App\Enums\ManagementType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HostingAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'created_by',
        'name',
        'type',
        'primary_domain',
        'status',
        'price',
        'currency',
        'billing_cycle',
        'starts_at',
        'expires_at',
        'auto_renew',
        'server_location',
        'disk_usage_percent',
        'bandwidth_usage_percent',
        'cpu_usage_percent',
        'ram_usage_percent',
        'control_panel_url',
        'last_backup_at',
        'notes',
        'management_type',
        'access_panel_url',
        'access_username',
        'access_password',
        'access_notes',
        'alert_sent_30',
        'alert_sent_14',
    ];

    protected $casts = [
        'type'                    => HostingType::class,
        'status'                  => HostingStatus::class,
        'management_type'         => ManagementType::class,
        'starts_at'               => 'date',
        'expires_at'              => 'date',
        'auto_renew'              => 'boolean',
        'price'                   => 'decimal:2',
        'last_backup_at'          => 'datetime',
        'disk_usage_percent'      => 'integer',
        'bandwidth_usage_percent' => 'integer',
        'cpu_usage_percent'       => 'integer',
        'ram_usage_percent'       => 'integer',
        'access_username'         => 'encrypted',
        'access_password'         => 'encrypted',
        'alert_sent_30'           => 'boolean',
        'alert_sent_14'           => 'boolean',
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

    public function isI2Managed(): bool
    {
        return $this->management_type === ManagementType::I2Managed;
    }

    public function hasCredentials(): bool
    {
        return filled($this->access_username);
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

    public function formattedMonthlyEquivalent(): string
    {
        $monthly = $this->monthlyEquivalent();

        if ($monthly === null) {
            return '—';
        }

        return number_format($monthly, 2) . ' ' . ($this->currency ?? 'NGN') . '/mo';
    }

    public function formattedPrice(): string
    {
        if (! $this->price) {
            return '—';
        }

        return number_format((float) $this->price, 2) . ' ' . $this->currency
            . ($this->billing_cycle ? ' / ' . $this->billing_cycle : '');
    }

    public function scopeForClient($query, int $clientId)
    {
        return $query->where('client_id', $clientId);
    }

    public function scopeActive($query)
    {
        return $query->where('status', HostingStatus::Active->value);
    }

    public function scopeExpiringSoon($query, int $days = 30)
    {
        return $query->where('status', HostingStatus::Active->value)
            ->whereBetween('expires_at', [now(), now()->addDays($days)]);
    }
}
