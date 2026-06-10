<x-filament-widgets::widget>
    <x-filament::section heading="Account Information">
        <div class="flex flex-col gap-3">
            @foreach ([
                ['Account ID',   $accountId,                                       false],
                ['Role',         $role,                                             false],
                ['Login Alerts', $loginAlerts ? 'Enabled' : 'Disabled',            $loginAlerts],
                ['Last Login',   $lastLogin,                                        false],
            ] as [$label, $value, $isSuccess])
                <div class="flex items-start justify-between gap-3 text-sm">
                    <span class="text-gray-500 dark:text-gray-400">{{ $label }}</span>
                    @if ($isSuccess !== false)
                        <x-filament::badge :color="$isSuccess ? 'success' : 'gray'">
                            {{ $value }}
                        </x-filament::badge>
                    @else
                        <span class="font-medium text-gray-800 dark:text-gray-200 text-right">{{ $value }}</span>
                    @endif
                </div>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
