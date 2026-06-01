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
        'primary' => 'bg-[var(--i2-color-brand-ink)] text-white border border-transparent',
        'secondary' => 'border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] text-[var(--i2-color-brand-ink)]',
        'info' => 'border border-[var(--i2-color-info-soft)] bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]',
        'violet' => 'border border-[var(--i2-color-violet-soft)] bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)]',
        default => 'border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] text-[var(--i2-color-brand-ink)]',
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
