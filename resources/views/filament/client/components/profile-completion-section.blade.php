<div class="col-span-full">
    <x-filament::section heading="Profile Completion">
        <div class="flex items-center gap-4 mb-4">
            <div class="relative size-[72px] shrink-0 rounded-full"
                 style="background: conic-gradient(var(--color-success-500, #16a34a) 0 {{ $completionPercentage }}%, var(--color-gray-200, #e5e7eb) {{ $completionPercentage }}% 100%)">
                <div class="absolute inset-[6px] rounded-full bg-white dark:bg-gray-900"></div>
                <div class="absolute inset-0 z-10 grid place-items-center text-sm font-bold text-success-600 dark:text-success-400">
                    {{ $completionPercentage }}%
                </div>
            </div>
            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Completed</span>
        </div>
        <div class="flex flex-col gap-2">
            @foreach ($completionItems as $item)
                <div class="flex items-center gap-2.5 text-sm text-gray-600 dark:text-gray-400">
                    @if ($item['done'])
                        <x-filament::icon icon="heroicon-o-check-circle" class="h-4 w-4 text-success-500" />
                    @else
                        <x-filament::icon icon="heroicon-o-x-circle" class="h-4 w-4 text-gray-300 dark:text-gray-600" />
                    @endif
                    <span class="{{ $item['done'] ? '' : 'text-gray-400 dark:text-gray-600' }}">
                        {{ $item['label'] }}
                    </span>
                </div>
            @endforeach
        </div>
    </x-filament::section>
</div>
