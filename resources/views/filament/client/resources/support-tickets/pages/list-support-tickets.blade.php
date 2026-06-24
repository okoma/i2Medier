<x-filament-panels::page>
    <div class="space-y-6">
        <x-filament::section compact>
            <div class="max-w-3xl">
                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Support</p>
                <h1 class="mt-2 text-2xl font-semibold tracking-tight text-gray-950 dark:text-white">Track support conversations clearly</h1>
                <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-300">
                    See what is open, what is already in progress, and where your team may need to reply next.
                </p>
            </div>
        </x-filament::section>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5">
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
                            'bg-rose-100 text-rose-700 dark:bg-rose-500/15 dark:text-rose-300' => $stat['color'] === 'rose',
                        ])>
                            @svg($stat['icon'], 'h-6 w-6')
                        </div>
                    </div>
                </x-filament::section>
            @endforeach
        </div>

        <x-filament::section
            heading="All Tickets"
            description="Every client support request, ordered by the most recently active."
        >
            <x-slot name="afterHeader">
                <div class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                    {{ count($this->tickets) }} total
                </div>
            </x-slot>

            @if (count($this->tickets) === 0)
                <div class="py-14 text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-white/10 dark:text-gray-300">
                        @svg('heroicon-o-chat-bubble-left-right', 'h-7 w-7')
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-gray-950 dark:text-white">No tickets yet</h3>
                    <p class="mx-auto mt-2 max-w-xl text-sm text-gray-600 dark:text-gray-300">
                        When your team submits a support request, it will appear here with status updates and the full conversation.
                    </p>
                </div>
            @else
                <div class="divide-y divide-gray-200 dark:divide-white/10">
                    @foreach ($this->tickets as $ticket)
                        <a wire:navigate href="{{ $ticket['url'] }}" class="block py-5 transition hover:bg-gray-50/60 dark:hover:bg-white/5">
                            <div class="flex flex-col gap-5 xl:flex-row xl:items-start xl:justify-between">
                                <div class="min-w-0 flex-1">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <h3 class="font-mono text-base font-semibold text-gray-950 dark:text-white">{{ $ticket['number'] }}</h3>
                                        <span @class([
                                            'inline-flex items-center rounded-full px-3 py-1 text-xs font-medium',
                                            'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $ticket['status_color'] === 'amber',
                                            'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $ticket['status_color'] === 'sky',
                                            'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $ticket['status_color'] === 'emerald',
                                            'bg-rose-100 text-rose-700 dark:bg-rose-500/15 dark:text-rose-300' => $ticket['status_color'] === 'rose',
                                            'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $ticket['status_color'] === 'slate',
                                        ])>
                                            {{ $ticket['status'] }}
                                        </span>
                                        <span @class([
                                            'inline-flex items-center rounded-full px-3 py-1 text-xs font-medium',
                                            'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $ticket['priority_color'] === 'amber',
                                            'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $ticket['priority_color'] === 'sky',
                                            'bg-rose-100 text-rose-700 dark:bg-rose-500/15 dark:text-rose-300' => $ticket['priority_color'] === 'rose',
                                            'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $ticket['priority_color'] === 'slate',
                                        ])>
                                            {{ $ticket['priority'] }}
                                        </span>
                                    </div>

                                    <h4 class="mt-3 text-sm font-medium text-gray-900 dark:text-white">{{ $ticket['subject'] }}</h4>
                                    <p class="mt-2 line-clamp-2 text-sm text-gray-600 dark:text-gray-300">{{ $ticket['description'] }}</p>

                                    <div class="mt-3 flex flex-wrap gap-2">
                                        <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                                            Category: {{ $ticket['category'] }}
                                        </span>
                                    </div>
                                </div>

                                <div class="grid gap-3 sm:grid-cols-2 xl:min-w-[24rem] xl:max-w-md">
                                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Opened</p>
                                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $ticket['opened_at'] }}</p>
                                    </div>
                                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Last Activity</p>
                                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $ticket['updated_at'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </x-filament::section>
    </div>
</x-filament-panels::page>
