@props([
    'variant' => 'secondary',
    'size' => 'sm',
    'type' => 'button',
])

@php
    $baseClasses = 'inline-flex items-center justify-center rounded-[10px] transition-colors';

    $sizeClasses = match ($size) {
        'xs' => 'size-8',
        'md' => 'size-[38px]',
        default => 'size-9',
    };

    $variantClasses = match ($variant) {
        'primary' => 'bg-[var(--i2-color-brand-ink)] text-white border border-transparent',
        'secondary' => 'border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] text-[var(--i2-color-text-soft)]',
        default => 'border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] text-[var(--i2-color-text-soft)]',
    };
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->class([
        $baseClasses,
        $sizeClasses,
        $variantClasses,
    ]) }}
>
    {{ $slot }}
</button>
