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
        'linked' => 'grid gap-x-3 gap-y-3 rounded-[20px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[18px] pb-4 pt-[18px] [grid-template-columns:auto_1fr]',
        default => 'flex min-h-[100px] items-center gap-[14px] rounded-[16px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-4 py-4',
    };

    $baseIconWrapperClass = match ($layout) {
        'linked' => 'grid size-11 place-items-center rounded-xl',
        default => 'grid size-11 shrink-0 place-items-center rounded-xl',
    };

    $baseBodyClass = match ($layout) {
        'linked' => '',
        default => 'min-w-0',
    };

    $baseLabelClass = match ($layout) {
        'linked' => 'mb-1.5 block text-[var(--i2-text-sm)] text-[var(--i2-color-text-soft)]',
        default => 'mb-1 block text-sm text-[var(--i2-color-text-soft)]',
    };

    $baseValueClass = match ($layout) {
        'linked' => 'block text-[var(--i2-text-stat)] tracking-[-0.06em]',
        default => 'mb-1 block min-w-0 truncate text-[1.6rem] tracking-[-0.06em]',
    };

    $baseNoteClass = match ($layout) {
        'linked' => 'text-[.88rem] text-[var(--i2-color-text-faint)]',
        default => 'text-[.88rem] text-[var(--i2-color-text-faint)]',
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
