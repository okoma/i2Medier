<x-filament-panels::page>
    <div class="space-y-6">
        <x-filament::section compact>
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="max-w-3xl">
                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Portal Home</p>
                    <h1 class="mt-2 text-2xl font-semibold tracking-tight text-gray-950 dark:text-white">Everything important in one place</h1>
                    <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-300">
                        Follow project progress, keep services active, and handle the next required step without leaving the client portal.
                    </p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a
                        wire:navigate
                        href="{{ \App\Filament\Client\Pages\ProjectsHub::getUrl(panel: 'client') }}"
                        class="inline-flex items-center gap-2 rounded-xl border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-white/10 dark:text-gray-200 dark:hover:bg-white/5"
                    >
                        @svg('heroicon-o-briefcase', 'h-4 w-4')
                        <span>View Projects</span>
                    </a>
                    <a
                        wire:navigate
                        href="{{ \App\Filament\Client\Pages\ServicesHub::getUrl(panel: 'client') }}"
                        class="inline-flex items-center gap-2 rounded-xl border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-white/10 dark:text-gray-200 dark:hover:bg-white/5"
                    >
                        @svg('heroicon-o-wrench-screwdriver', 'h-4 w-4')
                        <span>View Services</span>
                    </a>
                </div>
            </div>
        </x-filament::section>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-5">
            @foreach ($this->stats as $stat)
                <a wire:navigate href="{{ $stat['url'] }}" class="block">
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
                </a>
            @endforeach
        </div>

        <x-filament::section>
            <x-slot name="heading">
                What Needs Your Attention
            </x-slot>

            <x-slot name="description">
                The most important next step across onboarding, billing, projects, and renewals.
            </x-slot>

            <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-3xl">
                    <p class="mb-2 text-xs font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">
                        {{ $this->nextAction['eyebrow'] }}
                    </p>
                    <h2 class="text-2xl font-semibold tracking-tight text-gray-950 dark:text-white">
                        {{ $this->nextAction['title'] }}
                    </h2>
                    <p class="mt-3 text-sm leading-6 text-gray-600 dark:text-gray-300">
                        {{ $this->nextAction['description'] }}
                    </p>
                    <p class="mt-3 text-xs font-medium text-gray-500 dark:text-gray-400">
                        {{ $this->nextAction['meta'] }}
                    </p>
                </div>

                <div class="flex shrink-0 items-center">
                    <x-filament::button
                        :color="$this->nextAction['tone']"
                        tag="a"
                        :href="$this->nextAction['button_url']"
                        wire:navigate
                        icon="heroicon-o-arrow-up-right"
                    >
                        {{ $this->nextAction['button_label'] }}
                    </x-filament::button>
                </div>
            </div>
        </x-filament::section>

        <div class="grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
            <x-filament::section
                heading="Current Work"
                description="Your latest requests and delivery activity."
            >
                <x-slot name="afterHeader">
                    <a
                        wire:navigate
                        href="{{ \App\Filament\Client\Pages\ProjectsHub::getUrl(panel: 'client') }}"
                        class="inline-flex items-center gap-2 rounded-xl border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-white/10 dark:text-gray-200 dark:hover:bg-white/5"
                    >
                        <span>View All</span>
                        @svg('heroicon-o-arrow-right', 'h-4 w-4')
                    </a>
                </x-slot>

                @if (count($this->projects) === 0)
                    <div class="py-10 text-center">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-white/10 dark:text-gray-300">
                            @svg('heroicon-o-briefcase', 'h-6 w-6')
                        </div>
                        <p class="mt-4 text-sm text-gray-600 dark:text-gray-300">No projects yet. Start a new one from the portal when you are ready.</p>
                    </div>
                @else
                    <div class="divide-y divide-gray-200 dark:divide-white/10">
                        @foreach ($this->projects as $project)
                            <a wire:navigate href="{{ $project['url'] }}" class="block py-4 transition hover:bg-gray-50/60 dark:hover:bg-white/5">
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                                    <div class="min-w-0">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <h3 class="text-sm font-semibold text-gray-950 dark:text-white">{{ $project['reference'] }}</h3>
                                            <span @class([
                                                'inline-flex items-center rounded-full px-3 py-1 text-xs font-medium',
                                                'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $project['stage_color'] === 'amber',
                                                'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $project['stage_color'] === 'sky',
                                                'bg-indigo-100 text-indigo-700 dark:bg-indigo-500/15 dark:text-indigo-300' => $project['stage_color'] === 'indigo',
                                                'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $project['stage_color'] === 'emerald',
                                                'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $project['stage_color'] === 'slate',
                                            ])>
                                                {{ $project['stage'] }}
                                            </span>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{ $project['summary'] }}</p>
                                    </div>

                                    <div class="text-xs font-medium text-gray-500 dark:text-gray-400">
                                        {{ $project['created_at'] }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </x-filament::section>

            <x-filament::section
                heading="Service Attention"
                description="Renewals and live services that may need a quick check."
            >
                <x-slot name="afterHeader">
                    <a
                        wire:navigate
                        href="{{ \App\Filament\Client\Pages\ServicesHub::getUrl(panel: 'client') }}"
                        class="inline-flex items-center gap-2 rounded-xl border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-white/10 dark:text-gray-200 dark:hover:bg-white/5"
                    >
                        <span>View Services</span>
                        @svg('heroicon-o-arrow-right', 'h-4 w-4')
                    </a>
                </x-slot>

                @if (count($this->renewals) === 0)
                    <div class="py-10 text-center text-sm text-gray-600 dark:text-gray-300">
                        No renewal records yet.
                    </div>
                @else
                    <div class="space-y-3">
                        @foreach ($this->renewals as $renewal)
                            <a wire:navigate href="{{ $renewal['url'] }}" class="block rounded-xl bg-gray-50 px-4 py-4 transition hover:bg-gray-100 dark:bg-white/5 dark:hover:bg-white/10">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="min-w-0">
                                        <h3 class="text-sm font-semibold text-gray-950 dark:text-white">{{ $renewal['name'] }}</h3>
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ $renewal['expires_at'] }}</p>
                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ $renewal['renewal_note'] }}</p>
                                    </div>
                                    <span @class([
                                        'inline-flex items-center rounded-full px-3 py-1 text-xs font-medium',
                                        'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $renewal['status_color'] === 'amber',
                                        'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $renewal['status_color'] === 'sky',
                                        'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $renewal['status_color'] === 'emerald',
                                        'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $renewal['status_color'] === 'slate',
                                    ])>
                                        {{ $renewal['status'] }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </x-filament::section>
        </div>

        <div @class([
            'grid gap-6',
            'xl:grid-cols-2' => $this->canViewInvoices,
        ])>
            @if ($this->canViewInvoices)
                <x-filament::section
                    heading="Billing Snapshot"
                    description="Recent invoices and anything still waiting on payment."
                >
                    <x-slot name="afterHeader">
                        <a
                            wire:navigate
                            href="{{ filament()->getUrl() . '/invoices' }}"
                            class="inline-flex items-center gap-2 rounded-xl border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-white/10 dark:text-gray-200 dark:hover:bg-white/5"
                        >
                            <span>All Invoices</span>
                            @svg('heroicon-o-arrow-right', 'h-4 w-4')
                        </a>
                    </x-slot>

                    @if (count($this->invoices) === 0)
                        <div class="py-10 text-center text-sm text-gray-600 dark:text-gray-300">
                            No invoices yet.
                        </div>
                    @else
                        <div class="divide-y divide-gray-200 dark:divide-white/10">
                            @foreach ($this->invoices as $invoice)
                                <a wire:navigate href="{{ $invoice['url'] }}" class="block py-4 transition hover:bg-gray-50/60 dark:hover:bg-white/5">
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="min-w-0">
                                            <div class="flex flex-wrap items-center gap-3">
                                                <h3 class="font-mono text-sm font-semibold text-gray-950 dark:text-white">{{ $invoice['number'] }}</h3>
                                                <span @class([
                                                    'inline-flex items-center rounded-full px-3 py-1 text-xs font-medium',
                                                    'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $invoice['status_color'] === 'amber',
                                                    'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $invoice['status_color'] === 'emerald',
                                                    'bg-rose-100 text-rose-700 dark:bg-rose-500/15 dark:text-rose-300' => $invoice['status_color'] === 'rose',
                                                    'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $invoice['status_color'] === 'slate',
                                                ])>
                                                    {{ $invoice['status'] }}
                                                </span>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{ $invoice['description'] }}</p>
                                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Due {{ $invoice['due_at'] }}</p>
                                        </div>

                                        <div class="shrink-0 text-sm font-semibold text-gray-900 dark:text-white">
                                            {{ $invoice['total'] }}
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </x-filament::section>
            @endif

            <x-filament::section
                heading="Support Activity"
                description="Recent support conversations from your team."
            >
                <x-slot name="afterHeader">
                    <a
                        wire:navigate
                        href="{{ filament()->getUrl() . '/support-tickets' }}"
                        class="inline-flex items-center gap-2 rounded-xl border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 dark:border-white/10 dark:text-gray-200 dark:hover:bg-white/5"
                    >
                        <span>All Tickets</span>
                        @svg('heroicon-o-arrow-right', 'h-4 w-4')
                    </a>
                </x-slot>

                @if (count($this->tickets) === 0)
                    <div class="py-10 text-center text-sm text-gray-600 dark:text-gray-300">
                        No support tickets yet.
                    </div>
                @else
                    <div class="divide-y divide-gray-200 dark:divide-white/10">
                        @foreach ($this->tickets as $ticket)
                            <a wire:navigate href="{{ $ticket['url'] }}" class="block py-4 transition hover:bg-gray-50/60 dark:hover:bg-white/5">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="min-w-0">
                                        <div class="flex flex-wrap items-center gap-3">
                                            <h3 class="font-mono text-sm font-semibold text-gray-950 dark:text-white">{{ $ticket['number'] }}</h3>
                                            <span @class([
                                                'inline-flex items-center rounded-full px-3 py-1 text-xs font-medium',
                                                'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $ticket['status_color'] === 'amber',
                                                'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $ticket['status_color'] === 'sky',
                                                'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $ticket['status_color'] === 'emerald',
                                            ])>
                                                {{ $ticket['status'] }}
                                            </span>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{ $ticket['subject'] }}</p>
                                    </div>

                                    <div class="shrink-0 text-xs font-medium text-gray-500 dark:text-gray-400">
                                        {{ $ticket['updated_at'] }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </x-filament::section>
        </div>
    </div>
</x-filament-panels::page>
