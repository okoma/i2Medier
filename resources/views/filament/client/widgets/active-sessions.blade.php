<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">Active Sessions</x-slot>
        <x-slot name="headerEnd">
            @if ($sessions->count() > 1)
                <x-filament::button wire:click="revokeAll" color="danger" size="sm" outlined>
                    Revoke All Others
                </x-filament::button>
            @endif
        </x-slot>

        <div class="flex flex-col divide-y divide-gray-100 dark:divide-white/5">
            @forelse ($sessions as $session)
                <div class="flex items-center justify-between gap-4 py-3 first:pt-0 last:pb-0">
                    <div class="flex items-center gap-3">
                        <div class="grid size-9 shrink-0 place-items-center rounded-lg bg-gray-100 dark:bg-white/5 text-gray-500 dark:text-gray-400">
                            @if (in_array($session['browser'], ['Chrome', 'Edge', 'Opera']))
                                <x-filament::icon icon="heroicon-o-globe-alt" class="h-4 w-4" />
                            @elseif ($session['browser'] === 'Firefox')
                                <x-filament::icon icon="heroicon-o-fire" class="h-4 w-4" />
                            @elseif (in_array($session['os'], ['iPhone', 'Android']))
                                <x-filament::icon icon="heroicon-o-device-phone-mobile" class="h-4 w-4" />
                            @else
                                <x-filament::icon icon="heroicon-o-computer-desktop" class="h-4 w-4" />
                            @endif
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-sm font-medium text-gray-800 dark:text-gray-200">
                                    {{ $session['browser'] }} on {{ $session['os'] }}
                                </span>
                                @if ($session['is_current'])
                                    <x-filament::badge color="success" size="sm">Current</x-filament::badge>
                                @endif
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                {{ $session['ip'] }} · {{ $session['last_active'] }}
                            </p>
                        </div>
                    </div>
                    @unless ($session['is_current'])
                        <x-filament::button
                            wire:click="revoke('{{ $session['id'] }}')"
                            wire:confirm="Revoke this session?"
                            color="danger"
                            size="sm"
                            outlined
                        >
                            Revoke
                        </x-filament::button>
                    @endunless
                </div>
            @empty
                <p class="py-3 text-sm text-gray-500 dark:text-gray-400">No active sessions found.</p>
            @endforelse
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
