@props([
    'label',
    'value',
    'note' => null,
    'iconClass' => '',
    'cardClass' => '',
    'iconWrapperClass' => '',
    'bodyClass' => '',
    'labelClass' => '',
    'valueClass' => '',
    'noteClass' => '',
    'layout' => 'default',
])

@php
    $baseCardClass = match ($layout) {
        'linked' => 'grid gap-x-3 gap-y-2 rounded-[16px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-4 pb-[14px] pt-4 [grid-template-columns:auto_1fr]',
        default => 'flex min-h-[82px] items-center gap-3 rounded-[14px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-4 py-3',
    };

    $baseIconWrapperClass = match ($layout) {
        'linked' => 'grid size-9 place-items-center rounded-[10px]',
        default => 'grid size-9 shrink-0 place-items-center rounded-[10px]',
    };

    $baseBodyClass = match ($layout) {
        'linked' => '',
        default => 'min-w-0',
    };

    $baseLabelClass = match ($layout) {
        'linked' => 'mb-1.5 block text-[var(--i2-text-sm)] text-[var(--i2-color-text-soft)] dark:text-white/55',
        default => 'mb-1 block text-sm text-[var(--i2-color-text-soft)] dark:text-white/55',
    };

    $baseValueClass = match ($layout) {
        'linked' => 'block text-[var(--i2-text-stat)] tracking-[-0.06em]',
        default => 'mb-1 block min-w-0 truncate text-[1.6rem] tracking-[-0.06em]',
    };

    $baseNoteClass = match ($layout) {
        'linked' => 'text-[.88rem] text-[var(--i2-color-text-faint)] dark:text-white/35',
        default => 'text-[.88rem] text-[var(--i2-color-text-faint)] dark:text-white/35',
    };
@endphp

<article {{ $attributes->class([
    $baseCardClass,
    $cardClass,
]) }}>
    <div class="{{ $iconClass }} {{ $baseIconWrapperClass }} {{ $iconWrapperClass }}">
        {{ $icon }}
    </div>
    <div class="{{ $baseBodyClass }} {{ $bodyClass }}">
        <span class="{{ $baseLabelClass }} {{ $labelClass }}">{{ $label }}</span>
        <strong class="{{ $baseValueClass }} {{ $valueClass }}">{{ $value }}</strong>
        @if ($note)
            <small class="{{ $baseNoteClass }} {{ $noteClass }}">{{ $note }}</small>
        @endif
    </div>
    @isset($footer)
        <div class="col-span-full">
            {{ $footer }}
        </div>
    @endisset
</article>
