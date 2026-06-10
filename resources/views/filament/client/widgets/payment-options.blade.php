<x-filament-widgets::widget>
    <x-filament::section heading="Payment Options">
        <div class="flex flex-col gap-3">
            @foreach ($paymentOptions as $option)
                <div class="rounded-xl border border-[var(--i2-color-border-soft)] dark:border-white/8 px-4 py-3">
                    <div class="flex items-center justify-between gap-3">
                        <h3 class="text-[0.88rem] font-semibold tracking-[-0.02em]">{{ $option['name'] }}</h3>
                        @if ($option['enabled'])
                            <x-filament::badge color="success">Available</x-filament::badge>
                        @else
                            <x-filament::badge color="gray">Unavailable</x-filament::badge>
                        @endif
                    </div>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">{{ $option['description'] }}</p>
                    @if ($option['detail'])
                        <p class="mt-1 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $option['detail'] }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
