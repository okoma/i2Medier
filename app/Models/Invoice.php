<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Invoice extends Model
{
    use HasFactory;

    public const PAYMENT_METHOD_PAYSTACK = 'paystack';

    public const PAYMENT_METHOD_BANK_TRANSFER = 'bank_transfer';

    protected $fillable = [
        'invoice_number',
        'public_token',
        'client_id',
        'website_id',
        'status',
        'subtotal',
        'tax_rate',
        'tax_amount',
        'discount_amount',
        'total',
        'currency',
        'issued_at',
        'due_at',
        'paid_at',
        'payment_method',
        'payment_reference',
        'notes',
        'internal_notes',
        'created_by',
    ];

    protected $casts = [
        'issued_at' => 'date',
        'due_at' => 'date',
        'paid_at' => 'datetime',
        'subtotal' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public static function paymentMethodOptions(): array
    {
        return [
            self::PAYMENT_METHOD_PAYSTACK => 'Paystack',
            self::PAYMENT_METHOD_BANK_TRANSFER => 'Bank transfer',
        ];
    }

    public function getPaymentMethodLabel(): ?string
    {
        return static::paymentMethodOptions()[$this->payment_method] ?? null;
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(InvoicePayment::class)->latest();
    }

    public function isPaid(): bool
    {
        return $this->status === 'paid';
    }

    public function isOverdue(): bool
    {
        return $this->status !== 'paid' && $this->due_at?->isPast();
    }

    public function canBePaidOnline(): bool
    {
        return ($this->payment_method === static::PAYMENT_METHOD_PAYSTACK) && $this->status !== 'paid';
    }

    public function canBePaidByBankTransfer(): bool
    {
        return ($this->payment_method === static::PAYMENT_METHOD_BANK_TRANSFER) && $this->status !== 'paid';
    }

    public function publicPaymentUrl(): string
    {
        return route('public.invoices.show', ['token' => $this->ensurePublicToken()]);
    }

    public function ensurePublicToken(): string
    {
        if (filled($this->public_token)) {
            return $this->public_token;
        }

        $this->forceFill([
            'public_token' => Str::random(40),
        ])->save();

        return $this->public_token;
    }

    public function recalculate(): void
    {
        $subtotal = (float) $this->items()->sum('line_total');
        $tax = round($subtotal * (((float) $this->tax_rate) / 100), 2);
        $discount = (float) ($this->discount_amount ?? 0);
        $total = $subtotal + $tax - $discount;

        $this->update([
            'subtotal' => $subtotal,
            'tax_amount' => $tax,
            'total' => max(0, $total),
        ]);
    }

    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    public function scopeUnpaid($query)
    {
        return $query->whereNotIn('status', ['paid', 'cancelled', 'refunded']);
    }

    public function scopeOverdue($query)
    {
        return $query->where('due_at', '<', now())
            ->whereNotIn('status', ['paid', 'cancelled', 'refunded']);
    }
}
