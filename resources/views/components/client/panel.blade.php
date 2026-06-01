@props([
    'padding' => 'md',
])

@php
    $paddingClasses = match ($padding) {
        'none' => '',
        'sm' => 'px-[18px] pb-4 pt-[18px]',
        'lg' => 'px-[22px] py-5',
        default => 'px-5 pb-[18px] pt-[18px]',
    };
@endphp

<section {{ $attributes->class([
    'overflow-hidden rounded-[22px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)]',
    $paddingClasses,
]) }}>
    {{ $slot }}
</section>
