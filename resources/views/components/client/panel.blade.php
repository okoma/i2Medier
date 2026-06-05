@props([
    'padding' => 'md',
])

@php
    $paddingClasses = match ($padding) {
        'none' => '',
        'sm' => 'px-[16px] py-[12px]',
        'lg' => 'px-[18px] py-[14px]',
        default => 'px-[18px] py-[14px]',
    };
@endphp

<section {{ $attributes->class([
    'overflow-hidden rounded-[22px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26]',
    $paddingClasses,
]) }}>
    {{ $slot }}
</section>
