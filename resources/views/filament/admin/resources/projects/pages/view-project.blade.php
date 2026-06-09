<x-filament-panels::page>
@php
    $statusColors = [
        'warning' => 'bg-amber-50 text-amber-700 ring-1 ring-inset ring-amber-300 dark:bg-amber-400/10 dark:text-amber-400 dark:ring-amber-400/20',
        'info'    => 'bg-sky-50 text-sky-700 ring-1 ring-inset ring-sky-300 dark:bg-sky-400/10 dark:text-sky-400 dark:ring-sky-400/20',
        'primary' => 'bg-violet-50 text-violet-700 ring-1 ring-inset ring-violet-300 dark:bg-violet-400/10 dark:text-violet-400 dark:ring-violet-400/20',
        'success' => 'bg-emerald-50 text-emerald-700 ring-1 ring-inset ring-emerald-300 dark:bg-emerald-400/10 dark:text-emerald-400 dark:ring-emerald-400/20',
        'danger'  => 'bg-red-50 text-red-700 ring-1 ring-inset ring-red-300 dark:bg-red-400/10 dark:text-red-400 dark:ring-red-400/20',
    ];
    $statusColor = $statusColors[$record->status->getColor()] ?? 'bg-gray-100 text-gray-600';

    $notes    = $record->notes()->with('user')->get();
    $services = $record->services ?? [];

    $grandTotal = collect($services)->sum(function ($svc) {
        return (float) ($svc['price'] ?? 0) + collect($svc['addons'] ?? [])->sum('total_price');
    });
    $currency = collect($services)->first()['currency'] ?? 'NGN';
@endphp

<div class="space-y-5">

    {{-- ─── Summary bar ──────────────────────────────────────────────────── --}}
    <div class="flex flex-wrap items-start justify-between gap-4 rounded-xl border border-gray-200 bg-white px-6 py-4 dark:border-white/10 dark:bg-gray-800">
        <div class="flex flex-wrap items-center gap-5">
            <div>
                <p class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Reference</p>
                <p class="mt-0.5 font-mono text-[1.05rem] font-semibold tracking-tight text-gray-900 dark:text-white">
                    {{ $record->reference }}
                </p>
            </div>
            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $statusColor }}">
                {{ $record->status->getLabel() }}
            </span>
            @if ($record->converted_at)
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <span class="font-medium text-emerald-600 dark:text-emerald-400">Converted</span>
                    {{ $record->converted_at->format('d M Y') }}
                </p>
            @endif
        </div>
        <div class="text-right text-sm text-gray-500 dark:text-gray-400">
            <p>Submitted <span class="font-medium text-gray-700 dark:text-gray-200">{{ $record->created_at->format('d M Y') }}</span></p>
            <p class="mt-0.5 text-xs">{{ $record->created_at->format('g:i a') }}</p>
        </div>
    </div>

    {{-- ─── Main layout: 2-col + 1-col sidebar ─────────────────────────── --}}
    <div class="grid grid-cols-1 gap-5 lg:grid-cols-3">

        {{-- ─── Left column ────────────────────────────────────────────── --}}
        <div class="space-y-5 lg:col-span-2">

            {{-- Services ─────────────────────────────────────────────────── --}}
            <section class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-white/10 dark:bg-gray-800">
                <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4 dark:border-white/8">
                    <h2 class="text-sm font-semibold text-gray-900 dark:text-white">Selected Services</h2>
                    @if ($grandTotal > 0)
                        <div class="text-right">
                            <p class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Grand Total</p>
                            <p class="mt-0.5 text-base font-bold text-gray-900 dark:text-white">
                                {{ $currency }} {{ number_format($grandTotal) }}
                            </p>
                        </div>
                    @endif
                </div>

                @if (count($services) > 0)
                    <div class="divide-y divide-gray-100 dark:divide-white/5">
                        @foreach ($services as $service)
                            @php
                                $serviceTotal = (float) ($service['price'] ?? 0)
                                    + collect($service['addons'] ?? [])->sum('total_price');
                                $hasAddons = !empty($service['addons']) && count($service['addons']) > 0;
                                $hasPages  = !empty($service['pages']) && count($service['pages']) > 0;
                            @endphp
                            <div class="px-6 py-5">
                                <div class="flex flex-wrap items-start justify-between gap-3">
                                    <div>
                                        <p class="font-semibold text-gray-900 dark:text-white">
                                            {{ $service['service_name'] }}
                                        </p>
                                        @if (!empty($service['variant_name']))
                                            <p class="mt-0.5 text-sm text-gray-500 dark:text-gray-400">
                                                {{ $service['variant_name'] }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="text-right">
                                        <p class="font-semibold text-gray-900 dark:text-white">
                                            {{ $service['currency'] ?? 'NGN' }}
                                            {{ number_format((float) ($service['price'] ?? 0)) }}
                                        </p>
                                        <p class="mt-0.5 text-xs text-gray-400">
                                            {{ ucfirst($service['billing_type'] ?? '') }}
                                            @if (!empty($service['billing_cycle']))
                                                · {{ $service['billing_cycle'] }}
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                @if ($hasPages)
                                    <div class="mt-3">
                                        <p class="mb-1.5 text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">
                                            Pages
                                        </p>
                                        <div class="flex flex-wrap gap-1.5">
                                            @foreach ($service['pages'] as $page)
                                                <span class="inline-flex items-center rounded-md bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-600 dark:bg-white/8 dark:text-gray-300">
                                                    {{ $page }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if ($hasAddons)
                                    <div class="mt-4">
                                        <p class="mb-2 text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">
                                            Add-ons
                                        </p>
                                        <table class="w-full text-sm">
                                            <tbody class="divide-y divide-gray-50 dark:divide-white/5">
                                                @foreach ($service['addons'] as $addon)
                                                    <tr>
                                                        <td class="py-1.5 pr-4 text-gray-700 dark:text-gray-300">
                                                            {{ $addon['addon_name'] }}
                                                            @if (($addon['quantity'] ?? 1) > 1 && ($addon['addon_key'] ?? '') !== 'wd-extra-pages')
                                                                <span class="ml-1 text-gray-400">× {{ $addon['quantity'] }}</span>
                                                            @endif
                                                        </td>
                                                        <td class="py-1.5 text-right font-medium text-gray-800 dark:text-gray-200">
                                                            {{ $addon['currency'] ?? ($service['currency'] ?? 'NGN') }}
                                                            {{ number_format((float) ($addon['total_price'] ?? 0)) }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @if ($serviceTotal > (float) ($service['price'] ?? 0))
                                            <div class="mt-2 flex items-center justify-between border-t border-gray-100 pt-2 dark:border-white/5">
                                                <span class="text-xs font-medium text-gray-400">Service total</span>
                                                <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                                    {{ $service['currency'] ?? 'NGN' }}
                                                    {{ number_format($serviceTotal) }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="px-6 py-8 text-center text-sm text-gray-400">No services recorded.</div>
                @endif
            </section>

            {{-- Project Brief ────────────────────────────────────────────── --}}
            <section class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-white/10 dark:bg-gray-800">
                <div class="border-b border-gray-100 px-6 py-4 dark:border-white/8">
                    <h2 class="text-sm font-semibold text-gray-900 dark:text-white">Project Brief</h2>
                </div>
                <div class="px-6 py-5">
                    <dl class="grid grid-cols-2 gap-x-6 gap-y-4 sm:grid-cols-3">
                        @if ($record->timeline)
                            <div>
                                <dt class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Timeline</dt>
                                <dd class="mt-1 text-sm font-medium text-gray-800 dark:text-gray-200">{{ $record->timeline }}</dd>
                            </div>
                        @endif
                        @if ($record->budget)
                            <div>
                                <dt class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Budget</dt>
                                <dd class="mt-1 text-sm font-medium text-gray-800 dark:text-gray-200">{{ $record->budget }}</dd>
                            </div>
                        @endif
                        @if ($record->source)
                            <div>
                                <dt class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Discovery</dt>
                                <dd class="mt-1 text-sm font-medium text-gray-800 dark:text-gray-200">{{ $record->source }}</dd>
                            </div>
                        @endif
                        @if ($record->domain_preference)
                            <div>
                                <dt class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Domain</dt>
                                <dd class="mt-1 text-sm font-medium text-gray-800 dark:text-gray-200">{{ $record->domain_preference }}</dd>
                            </div>
                        @endif
                        @if ($record->hosting_preference)
                            <div>
                                <dt class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Hosting</dt>
                                <dd class="mt-1 text-sm font-medium text-gray-800 dark:text-gray-200">{{ $record->hosting_preference }}</dd>
                            </div>
                        @endif
                    </dl>

                    @if ($record->message)
                        <div class="mt-5 border-t border-gray-100 pt-4 dark:border-white/5">
                            <p class="mb-2 text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Message / Notes</p>
                            <div class="rounded-lg bg-gray-50 px-4 py-3 text-sm leading-relaxed text-gray-700 dark:bg-white/5 dark:text-gray-300" style="white-space:pre-wrap">{{ $record->message }}</div>
                        </div>
                    @endif

                    @if ($record->brief_pdf)
                        <div class="mt-4 flex items-center gap-3 rounded-lg border border-dashed border-gray-200 px-4 py-3 dark:border-white/10">
                            <svg viewBox="0 0 24 24" class="size-5 shrink-0 fill-none stroke-red-400 [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.7]" aria-hidden="true">
                                <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="9" y1="15" x2="15" y2="15"/>
                                <line x1="12" y1="12" x2="12" y2="18"/>
                            </svg>
                            <div class="min-w-0 flex-1">
                                <p class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Uploaded Brief</p>
                                <p class="mt-0.5 truncate text-sm font-medium text-gray-800 dark:text-gray-200">
                                    {{ basename($record->brief_pdf) }}
                                </p>
                            </div>
                            <a href="{{ Storage::url($record->brief_pdf) }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="shrink-0 rounded-lg bg-gray-100 px-3 py-1.5 text-xs font-semibold text-gray-700 transition hover:bg-gray-200 dark:bg-white/8 dark:text-gray-200 dark:hover:bg-white/15">
                                Download
                            </a>
                        </div>
                    @endif
                </div>
            </section>

            {{-- Attribution ──────────────────────────────────────────────── --}}
            @if ($record->source_page || $record->source_label || $record->terms_accepted_at)
                <section class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-white/10 dark:bg-gray-800">
                    <div class="border-b border-gray-100 px-6 py-4 dark:border-white/8">
                        <h2 class="text-sm font-semibold text-gray-900 dark:text-white">Attribution</h2>
                    </div>
                    <div class="px-6 py-5">
                        <dl class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-3">
                            @if ($record->source_page)
                                <div>
                                    <dt class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Source Page</dt>
                                    <dd class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $record->source_page }}</dd>
                                </div>
                            @endif
                            @if ($record->source_label)
                                <div>
                                    <dt class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Source Label</dt>
                                    <dd class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $record->source_label }}</dd>
                                </div>
                            @endif
                            @if ($record->terms_accepted_at)
                                <div>
                                    <dt class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Terms Accepted</dt>
                                    <dd class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                        {{ $record->terms_accepted_at->format('d M Y, g:i a') }}
                                    </dd>
                                </div>
                            @endif
                        </dl>
                    </div>
                </section>
            @endif

        </div>{{-- /left --}}

        {{-- ─── Right sidebar ──────────────────────────────────────────── --}}
        <div class="space-y-5">

            {{-- Client ───────────────────────────────────────────────────── --}}
            <section class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-white/10 dark:bg-gray-800">
                <div class="border-b border-gray-100 px-6 py-4 dark:border-white/8">
                    <h2 class="text-sm font-semibold text-gray-900 dark:text-white">Client</h2>
                </div>
                <div class="space-y-3.5 px-6 py-5">
                    @php $client = $record->client; @endphp
                    @if ($client)
                        <div>
                            <p class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Full Name</p>
                            <p class="mt-0.5 text-sm font-semibold text-gray-900 dark:text-white">{{ $client->contact_name }}</p>
                        </div>
                        @if ($client->company_name)
                            <div>
                                <p class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Business / Organisation</p>
                                <p class="mt-0.5 text-sm text-gray-700 dark:text-gray-300">{{ $client->company_name }}</p>
                            </div>
                        @endif
                        <div>
                            <p class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Email</p>
                            <a href="mailto:{{ $client->email }}"
                               class="mt-0.5 block text-sm font-medium text-blue-600 hover:underline dark:text-blue-400">
                                {{ $client->email }}
                            </a>
                        </div>
                        @if ($client->whatsapp_number)
                            <div>
                                <p class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">WhatsApp / Phone</p>
                                <p class="mt-0.5 text-sm text-gray-700 dark:text-gray-300">{{ $client->whatsapp_number }}</p>
                            </div>
                        @endif
                        @if ($client->country)
                            <div>
                                <p class="text-[0.68rem] font-semibold uppercase tracking-widest text-gray-400">Country</p>
                                <p class="mt-0.5 text-sm text-gray-700 dark:text-gray-300">{{ $client->country }}</p>
                            </div>
                        @endif
                    @else
                        <p class="text-sm text-gray-400">No client attached.</p>
                    @endif
                </div>
            </section>

            {{-- Activity Notes ────────────────────────────────────────────── --}}
            <section class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-white/10 dark:bg-gray-800">
                <div class="border-b border-gray-100 px-6 py-4 dark:border-white/8">
                    <h2 class="text-sm font-semibold text-gray-900 dark:text-white">Activity</h2>
                </div>
                <div class="px-6 py-5">
                    @if ($notes->isNotEmpty())
                        <ol class="space-y-4 border-l border-gray-200 pl-4 dark:border-white/10">
                            @foreach ($notes as $note)
                                <li class="relative">
                                    <span class="absolute -left-[1.32rem] top-1.5 size-2.5 rounded-full border-2 border-white bg-gray-300 dark:border-gray-800 dark:bg-gray-500"></span>
                                    <p class="text-sm leading-relaxed text-gray-700 dark:text-gray-300">{{ $note->body }}</p>
                                    <p class="mt-1 text-xs text-gray-400">
                                        @if ($note->user)
                                            {{ $note->user->name }} ·
                                        @endif
                                        {{ $note->created_at->format('d M Y, g:i a') }}
                                    </p>
                                </li>
                            @endforeach
                        </ol>
                    @else
                        <p class="text-sm text-gray-400">No activity logged yet.</p>
                    @endif
                </div>
            </section>

        </div>{{-- /sidebar --}}
    </div>
</div>
</x-filament-panels::page>
