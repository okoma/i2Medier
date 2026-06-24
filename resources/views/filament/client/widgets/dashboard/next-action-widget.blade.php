<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
            <div class="max-w-3xl">
                <p class="mb-2 text-xs font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">
                    {{ $action['eyebrow'] }}
                </p>
                <h2 class="text-2xl font-semibold tracking-tight text-gray-950 dark:text-white">
                    {{ $action['title'] }}
                </h2>
                <p class="mt-3 text-sm leading-6 text-gray-600 dark:text-gray-300">
                    {{ $action['description'] }}
                </p>
                <p class="mt-3 text-xs font-medium text-gray-500 dark:text-gray-400">
                    {{ $action['meta'] }}
                </p>
            </div>

            <div class="flex shrink-0 items-center">
                <x-filament::button
                    :color="$action['tone']"
                    tag="a"
                    :href="$action['button_url']"
                    icon="heroicon-o-arrow-up-right"
                >
                    {{ $action['button_label'] }}
                </x-filament::button>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
