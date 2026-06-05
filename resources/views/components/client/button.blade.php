@props([
    'variant' => 'secondary',
    'size' => 'sm',
    'type' => 'button',
    'full' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center rounded-[10px] font-medium transition-colors';

    $sizeClasses = match ($size) {
        'xs' => 'min-h-8 px-3 gap-2 text-[.92rem]',
        'md' => 'min-h-[38px] px-4 gap-[10px]',
        'lg' => 'min-h-10 px-[18px] gap-2.5',
        default => 'min-h-[34px] px-[14px] gap-[10px]',
    };

    $variantClasses = match ($variant) {
        'primary' => 'bg-[var(--i2-color-brand-ink)] text-white border border-transparent dark:bg-white/10 dark:border dark:border-white/15 dark:text-white',
        'secondary' => 'border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] text-[var(--i2-color-brand-ink)] dark:border-white/8 dark:bg-[#1e1f26] dark:text-white/90',
        'info' => 'border border-[var(--i2-color-info-soft)] bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)] dark:bg-[rgba(60,124,255,.18)] dark:border-[rgba(60,124,255,.18)] dark:text-[var(--i2-color-info)]',
        'violet' => 'border border-[var(--i2-color-violet-soft)] bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)] dark:bg-[rgba(124,85,255,.18)] dark:border-[rgba(124,85,255,.18)] dark:text-[var(--i2-color-violet)]',
        default => 'border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] text-[var(--i2-color-brand-ink)] dark:border-white/8 dark:bg-[#1e1f26] dark:text-white/90',
    };
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->class([
        $baseClasses,
        $sizeClasses,
        $variantClasses,
        'w-full' => $full,
    ]) }}
>
    {{ $slot }}
</button>
