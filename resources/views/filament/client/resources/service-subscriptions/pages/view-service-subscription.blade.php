<x-filament-panels::page>
    @php($record = $this->getRecord())
    @php($status = $this->getStatusMeta())

    <div class="space-y-6">
        <section class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-gray-900">
            <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                <div class="min-w-0 flex-1">
                    <div class="flex flex-wrap items-center gap-3">
                        <h1 class="text-xl font-semibold text-gray-950 dark:text-white">{{ $record->catalog_name ?? 'Service' }}</h1>
                        <span @class([
                            'inline-flex items-center rounded-full px-3 py-1 text-xs font-medium',
                            'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $status['color'] === 'amber',
                            'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $status['color'] === 'sky',
                            'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $status['color'] === 'emerald',
                            'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $status['color'] === 'slate',
                        ])>
                            {{ $status['label'] }}
                        </span>
                    </div>

                    <div class="mt-3 flex flex-wrap gap-2">
                        @if ($record->onboardingService?->name)
                            <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                                Plan: {{ $record->onboardingService->name }}
                            </span>
                        @endif
                        @if ($record->onboardingVariant?->name)
                            <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                                Direction: {{ $record->onboardingVariant->name }}
                            </span>
                        @endif
                        <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                            Billing: {{ $record->billing_cycle ? ucwords(str_replace('_', ' ', $record->billing_cycle)) : '—' }}
                        </span>
                    </div>
                </div>

                <div class="grid gap-3 sm:grid-cols-2 lg:min-w-[24rem]">
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Renewal</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $record->expires_at?->format('M d, Y') ?? 'No date set' }}</p>
                        <p class="mt-1 text-xs leading-5 text-gray-600 dark:text-gray-300">{{ $this->getRenewalNote() }}</p>
                    </div>
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Billing</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $record->currency ?? 'NGN' }} {{ number_format((float) $record->price, 2) }}</p>
                        <p class="mt-1 text-xs leading-5 text-gray-600 dark:text-gray-300">
                            @if ($record->last_renewed_at)
                                Last renewed {{ $record->last_renewed_at->format('M d, Y') }}
                            @else
                                Renewal history not available yet
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <div class="grid gap-6 xl:grid-cols-[1.2fr_.8fr]">
            <section class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-gray-900">
                <h2 class="text-lg font-semibold text-gray-950 dark:text-white">Subscription Details</h2>
                <div class="mt-5 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Service</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $record->catalog_name ?? '—' }}</p>
                    </div>
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Billing Type</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $record->billing_type ? ucwords(str_replace('_', ' ', $record->billing_type)) : '—' }}</p>
                    </div>
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Started</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $record->starts_at?->format('M d, Y') ?? '—' }}</p>
                    </div>
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Auto Renew</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $record->auto_renew ? 'Enabled' : 'Disabled' }}</p>
                    </div>
                </div>

                @if (filled($record->notes))
                    <div class="mt-5 rounded-xl bg-gray-50 px-4 py-4 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Notes</p>
                        <p class="mt-2 whitespace-pre-wrap text-sm leading-6 text-gray-700 dark:text-gray-300">{{ $record->notes }}</p>
                    </div>
                @endif
            </section>

            <section class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm dark:border-white/10 dark:bg-gray-900">
                <h2 class="text-lg font-semibold text-gray-950 dark:text-white">Add-ons</h2>

                @if ($record->addonSubscriptions->isEmpty())
                    <div class="mt-5 rounded-xl border border-dashed border-gray-200 px-4 py-8 text-center text-sm text-gray-600 dark:border-white/10 dark:text-gray-300">
                        No add-ons are attached to this service yet.
                    </div>
                @else
                    <div class="mt-5 space-y-3">
                        @foreach ($record->addonSubscriptions as $addon)
                            <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $addon->catalog_name ?? 'Add-on' }}</p>
                                        <p class="mt-1 text-xs text-gray-600 dark:text-gray-300">
                                            {{ $addon->billing_cycle ? ucwords(str_replace('_', ' ', $addon->billing_cycle)) : '—' }}
                                            @if ($addon->quantity > 1)
                                                • Qty {{ $addon->quantity }}
                                            @endif
                                        </p>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ $addon->currency ?? 'NGN' }} {{ number_format((float) $addon->price, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        </div>
    </div>
</x-filament-panels::page>
