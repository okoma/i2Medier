<x-filament-panels::page>
    <div class="space-y-6">
        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            @foreach ($this->stats as $stat)
                <x-filament::section compact>
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-500 dark:text-gray-400">{{ $stat['label'] }}</p>
                            <p class="mt-3 text-3xl font-semibold text-gray-950 dark:text-white">{{ $stat['value'] }}</p>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{ $stat['description'] }}</p>
                        </div>
                        <div @class([
                            'rounded-xl p-3',
                            'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $stat['color'] === 'slate',
                            'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $stat['color'] === 'amber',
                            'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $stat['color'] === 'sky',
                            'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $stat['color'] === 'emerald',
                        ])>
                            @svg($stat['icon'], 'h-6 w-6')
                        </div>
                    </div>
                </x-filament::section>
            @endforeach
        </div>

        <x-filament::section
            heading="All Services"
            description="Manage active subscriptions, keep an eye on renewals, and revisit similar service requests when needed."
        >
            <x-slot name="afterHeader">
                <a
                    wire:navigate
                    href="{{ \App\Filament\Client\Pages\StartProject::getUrl(panel: 'client') }}"
                    class="inline-flex items-center gap-2 rounded-xl border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-white/10 dark:text-gray-200 dark:hover:bg-white/5"
                >
                    @svg('heroicon-o-plus-circle', 'h-5 w-5')
                    <span>Need Another Service?</span>
                </a>
            </x-slot>

            @if (count($this->services) === 0)
                <div class="py-14 text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-white/10 dark:text-gray-300">
                        @svg('heroicon-o-wrench-screwdriver', 'h-7 w-7')
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-gray-950 dark:text-white">No active services yet</h3>
                    <p class="mx-auto mt-2 max-w-xl text-sm text-gray-600 dark:text-gray-300">
                        Once an approved project becomes an active service or subscription, it will appear here with its status, billing cycle, and renewal details.
                    </p>
                    <div class="mt-6">
                        <a
                            wire:navigate
                            href="{{ \App\Filament\Client\Pages\StartProject::getUrl(panel: 'client') }}"
                            class="inline-flex items-center gap-2 rounded-xl bg-primary-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-primary-500"
                        >
                            @svg('heroicon-o-plus-circle', 'h-5 w-5')
                            <span>Start New Project</span>
                        </a>
                    </div>
                </div>
            @else
                <div class="divide-y divide-gray-200 dark:divide-white/10">
                    @foreach ($this->services as $service)
                        <article class="py-5">
                            <div class="flex flex-col gap-5 xl:flex-row xl:items-start xl:justify-between">
                                <div class="min-w-0 flex-1">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <h3 class="text-base font-semibold text-gray-950 dark:text-white">{{ $service['name'] }}</h3>
                                        <span @class([
                                            'inline-flex items-center rounded-full px-3 py-1 text-xs font-medium',
                                            'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $service['status_color'] === 'amber',
                                            'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $service['status_color'] === 'sky',
                                            'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $service['status_color'] === 'emerald',
                                            'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $service['status_color'] === 'slate',
                                        ])>
                                            {{ $service['status'] }}
                                        </span>
                                    </div>

                                    <div class="mt-3 flex flex-wrap gap-2">
                                        @if ($service['plan'])
                                            <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                                                Plan: {{ $service['plan'] }}
                                            </span>
                                        @endif
                                        @if ($service['direction'])
                                            <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                                                Direction: {{ $service['direction'] }}
                                            </span>
                                        @endif
                                        <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                                            Billing: {{ $service['billing_cycle'] }}
                                        </span>
                                    </div>
                                </div>

                                <div class="grid gap-3 sm:grid-cols-2 xl:min-w-[24rem] xl:max-w-md">
                                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Renewal</p>
                                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $service['expires_at'] ?? 'No date set' }}</p>
                                        <p class="mt-1 text-xs leading-5 text-gray-600 dark:text-gray-300">{{ $service['renewal_note'] }}</p>
                                    </div>
                                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Billing</p>
                                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $service['currency'] }} {{ $service['price'] }}</p>
                                        <p class="mt-1 text-xs leading-5 text-gray-600 dark:text-gray-300">
                                            @if ($service['last_renewed_at'])
                                                Last renewed {{ $service['last_renewed_at'] }}
                                            @else
                                                Renewal history not available yet
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 flex flex-wrap gap-3">
                                <a
                                    wire:navigate
                                    href="{{ $service['manage_url'] }}"
                                    class="inline-flex items-center gap-2 rounded-xl bg-primary-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-primary-500"
                                >
                                    @svg('heroicon-o-eye', 'h-4 w-4')
                                    <span>Manage Service</span>
                                </a>
                                <a
                                    wire:navigate
                                    href="{{ $service['reorder_url'] }}"
                                    class="inline-flex items-center gap-2 rounded-xl border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-white/10 dark:text-gray-200 dark:hover:bg-white/5"
                                >
                                    @svg('heroicon-o-plus', 'h-4 w-4')
                                    <span>Order Similar Service</span>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </x-filament::section>
    </div>
</x-filament-panels::page>
