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
        'primary' => 'bg-[var(--i2-color-brand-ink)] text-white border border-transparent dark:bg-white/10 dark:border-white/15 dark:text-white',
        'secondary' => 'border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] text-[var(--i2-color-text-soft)] dark:border-white/8 dark:bg-[#1e1f26] dark:text-white/55',
        default => 'border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] text-[var(--i2-color-text-soft)] dark:border-white/8 dark:bg-[#1e1f26] dark:text-white/55',
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
