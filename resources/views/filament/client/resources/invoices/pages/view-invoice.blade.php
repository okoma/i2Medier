<x-filament-panels::page>
    @php($record = $this->getRecord())
    @php($status = $this->getStatusMeta())

    <div class="space-y-6">
        <x-filament::section>
            <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                <div class="min-w-0 flex-1">
                    <div class="flex flex-wrap items-center gap-3">
                        <h1 class="font-mono text-xl font-semibold text-gray-950 dark:text-white">{{ $record->invoice_number }}</h1>
                        <span @class([
                            'inline-flex items-center rounded-full px-3 py-1 text-xs font-medium',
                            'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $status['color'] === 'amber',
                            'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $status['color'] === 'sky',
                            'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $status['color'] === 'emerald',
                            'bg-rose-100 text-rose-700 dark:bg-rose-500/15 dark:text-rose-300' => $status['color'] === 'rose',
                            'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $status['color'] === 'slate',
                        ])>
                            {{ $status['label'] }}
                        </span>
                    </div>

                    <div class="mt-3 flex flex-wrap gap-2">
                        @if ($record->project?->reference)
                            <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                                Project: {{ $record->project->reference }}
                            </span>
                        @endif
                        <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                            Payment: {{ $record->getPaymentMethodLabel() ?? 'Not set' }}
                        </span>
                    </div>
                </div>

                <div class="grid gap-3 sm:grid-cols-2 lg:min-w-[24rem]">
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Due Status</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $record->due_at?->format('M d, Y') ?? 'No due date' }}</p>
                        <p class="mt-1 text-xs leading-5 text-gray-600 dark:text-gray-300">{{ $this->getDueNote() }}</p>
                    </div>
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Total</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $this->moneyLabel((float) $record->total) }}</p>
                        <p class="mt-1 text-xs leading-5 text-gray-600 dark:text-gray-300">
                            Issued {{ $record->issued_at?->format('M d, Y') ?? 'Not set' }}
                        </p>
                    </div>
                </div>
            </div>
        </x-filament::section>

        <div class="grid gap-6 xl:grid-cols-[1.2fr_.8fr]">
            <x-filament::section
                heading="Invoice Breakdown"
                description="A summary of the billed items and totals for this invoice."
            >
                @if ($record->items->isEmpty())
                    <div class="rounded-xl border border-dashed border-gray-200 px-4 py-10 text-center text-sm text-gray-600 dark:border-white/10 dark:text-gray-300">
                        No invoice items were added to this invoice.
                    </div>
                @else
                    <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-white/10">
                        <div class="hidden grid-cols-[minmax(0,1.7fr)_120px_160px] gap-4 bg-gray-50 px-4 py-3 text-xs font-semibold uppercase tracking-[0.18em] text-gray-500 dark:bg-white/5 dark:text-gray-400 md:grid">
                            <div>Description</div>
                            <div>Quantity</div>
                            <div>Line Total</div>
                        </div>
                        <div class="divide-y divide-gray-200 dark:divide-white/10">
                            @foreach ($record->items as $item)
                                <div class="grid gap-3 px-4 py-4 md:grid-cols-[minmax(0,1.7fr)_120px_160px] md:items-start">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $item->description }}</p>
                                        @if ($item->billing_period_start || $item->billing_period_end)
                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                                {{ $item->billing_period_start?->format('M d, Y') ?? '—' }} to {{ $item->billing_period_end?->format('M d, Y') ?? '—' }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">
                                        <span class="md:hidden text-xs font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Quantity </span>{{ $item->quantity }}
                                    </div>
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                        <span class="md:hidden text-xs font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Line Total </span>{{ $this->moneyLabel((float) $item->line_total) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="mt-5 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Subtotal</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $this->moneyLabel((float) $record->subtotal) }}</p>
                    </div>
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Tax</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $this->moneyLabel((float) $record->tax_amount) }}</p>
                    </div>
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Discount</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $this->moneyLabel((float) $record->discount_amount) }}</p>
                    </div>
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Grand Total</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $this->moneyLabel((float) $record->total) }}</p>
                    </div>
                </div>

                @if (filled($record->notes))
                    <div class="mt-5 rounded-xl bg-gray-50 px-4 py-4 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Notes</p>
                        <p class="mt-2 whitespace-pre-wrap text-sm leading-6 text-gray-700 dark:text-gray-300">{{ $record->notes }}</p>
                    </div>
                @endif
            </x-filament::section>

            <div class="space-y-6">
                <x-filament::section
                    heading="Payment Details"
                    description="How this invoice is expected to be paid."
                >
                    <div class="space-y-4">
                        <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Payment Method</p>
                            <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $record->getPaymentMethodLabel() ?? 'Not set' }}</p>
                        </div>
                        <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Reference</p>
                            <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $record->payment_reference ?: 'Pending payment' }}</p>
                        </div>
                    </div>
                </x-filament::section>

                <x-filament::section
                    heading="Payment History"
                    description="Recorded payments applied to this invoice."
                >
                    @if ($record->payments->isEmpty())
                        <div class="rounded-xl border border-dashed border-gray-200 px-4 py-8 text-center text-sm text-gray-600 dark:border-white/10 dark:text-gray-300">
                            No payments have been recorded for this invoice yet.
                        </div>
                    @else
                        <div class="space-y-3">
                            @foreach ($record->payments as $payment)
                                <div class="rounded-xl bg-gray-50 px-4 py-4 dark:bg-white/5">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ strtoupper($payment->currency ?? $record->currency ?? 'NGN') }} {{ number_format((float) $payment->amount, 2) }}</p>
                                            <p class="mt-1 text-xs text-gray-600 dark:text-gray-300">
                                                {{ ucfirst($payment->method ?? 'Payment') }}
                                                @if ($payment->reference)
                                                    · {{ $payment->reference }}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-emerald-600 dark:text-emerald-400">{{ ucfirst($payment->status) }}</p>
                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ $payment->paid_at?->format('M d, Y') ?? 'Pending date' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </x-filament::section>
            </div>
        </div>
    </div>
</x-filament-panels::page>
