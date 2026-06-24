<x-filament-panels::page>
    <div class="space-y-6">
        <x-filament::section compact>
            <div class="max-w-3xl">
                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Billing</p>
                <h1 class="mt-2 text-2xl font-semibold tracking-tight text-gray-950 dark:text-white">Invoices and payment history</h1>
                <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-300">
                    Review what has been billed, what is still outstanding, and which invoices need your attention next.
                </p>
            </div>
        </x-filament::section>

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
                            'bg-rose-100 text-rose-700 dark:bg-rose-500/15 dark:text-rose-300' => $stat['color'] === 'rose',
                        ])>
                            @svg($stat['icon'], 'h-6 w-6')
                        </div>
                    </div>
                </x-filament::section>
            @endforeach
        </div>

        <x-filament::section
            heading="All Invoices"
            description="Every invoice issued to your account, ordered by what likely needs attention first."
        >
            <x-slot name="afterHeader">
                <div class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                    {{ count($this->invoices) }} total
                </div>
            </x-slot>

            @if (count($this->invoices) === 0)
                <div class="py-14 text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-white/10 dark:text-gray-300">
                        @svg('heroicon-o-document-text', 'h-7 w-7')
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-gray-950 dark:text-white">No invoices yet</h3>
                    <p class="mx-auto mt-2 max-w-xl text-sm text-gray-600 dark:text-gray-300">
                        When billing is created for your projects or services, the full invoice history will appear here.
                    </p>
                </div>
            @else
                <div class="divide-y divide-gray-200 dark:divide-white/10">
                    @foreach ($this->invoices as $invoice)
                        <a wire:navigate href="{{ $invoice['url'] }}" class="block py-5 transition hover:bg-gray-50/60 dark:hover:bg-white/5">
                            <div class="flex flex-col gap-5 xl:flex-row xl:items-start xl:justify-between">
                                <div class="min-w-0 flex-1">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <h3 class="font-mono text-base font-semibold text-gray-950 dark:text-white">{{ $invoice['number'] }}</h3>
                                        <span @class([
                                            'inline-flex items-center rounded-full px-3 py-1 text-xs font-medium',
                                            'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $invoice['status_color'] === 'amber',
                                            'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $invoice['status_color'] === 'sky',
                                            'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $invoice['status_color'] === 'emerald',
                                            'bg-rose-100 text-rose-700 dark:bg-rose-500/15 dark:text-rose-300' => $invoice['status_color'] === 'rose',
                                            'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $invoice['status_color'] === 'slate',
                                        ])>
                                            {{ $invoice['status'] }}
                                        </span>
                                    </div>

                                    <div class="mt-3 flex flex-wrap gap-2">
                                        @if ($invoice['project'])
                                            <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                                                Project: {{ $invoice['project'] }}
                                            </span>
                                        @endif
                                        <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                                            {{ $invoice['payment_method'] }}
                                        </span>
                                        <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                                            {{ $invoice['payments_count'] }} {{ \Illuminate\Support\Str::plural('payment', $invoice['payments_count']) }}
                                        </span>
                                    </div>

                                    <p class="mt-3 text-sm text-gray-600 dark:text-gray-300">{{ $invoice['notes'] }}</p>
                                </div>

                                <div class="grid gap-3 sm:grid-cols-2 xl:min-w-[24rem] xl:max-w-md">
                                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Schedule</p>
                                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Issued {{ $invoice['issued_at'] }}</p>
                                        <p class="mt-1 text-xs leading-5 text-gray-600 dark:text-gray-300">{{ $invoice['due_note'] }}</p>
                                    </div>
                                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Amount</p>
                                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $invoice['total'] }}</p>
                                        <p class="mt-1 text-xs leading-5 text-gray-600 dark:text-gray-300">Due date {{ $invoice['due_at'] }}</p>
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
