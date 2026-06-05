<x-filament-panels::page>
    <div class="font-[var(--i2-font-sans)] text-[var(--i2-color-text)] dark:text-white/88">
        <section aria-label="Dashboard summary" class="mb-3 grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-5">
            <x-client.stat-card label="Active Projects" value="3" icon-class="bg-[var(--i2-color-accent-soft)] dark:bg-[rgba(200,169,110,.18)] text-[var(--i2-color-accent)]" layout="linked">
                <x-slot:icon>
                    <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M3.5 7.5A2.5 2.5 0 0 1 6 5h4l2 2h6a2.5 2.5 0 0 1 2.5 2.5v7A2.5 2.5 0 0 1 18 19H6a2.5 2.5 0 0 1-2.5-2.5Z"/></svg>
                </x-slot:icon>
                <x-slot:footer>
                    <a href="#" class="inline-flex items-center gap-1 text-[0.78rem] font-medium text-[var(--i2-color-brand-ink)] dark:text-white/90">View projects <span aria-hidden="true">→</span></a>
                </x-slot:footer>
            </x-client.stat-card>

            <x-client.stat-card label="Pending Invoices" value="2" icon-class="bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]" layout="linked">
                <x-slot:icon>
                    <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"/><path d="M14 3.5V8h4"/><path d="M8 12h6"/><path d="M8 16h8"/></svg>
                </x-slot:icon>
                <x-slot:footer>
                    <a href="#" class="inline-flex items-center gap-1 text-[0.78rem] font-medium text-[var(--i2-color-brand-ink)] dark:text-white/90">View invoices <span aria-hidden="true">→</span></a>
                </x-slot:footer>
            </x-client.stat-card>

            <x-client.stat-card label="Domains" value="5" icon-class="bg-[var(--i2-color-accent-soft)] dark:bg-[rgba(200,169,110,.18)] text-[var(--i2-color-accent)]" layout="linked">
                <x-slot:icon>
                    <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><circle cx="12" cy="12" r="8.5"/><path d="M3.5 12h17"/><path d="M12 3.5a13.3 13.3 0 0 1 3.5 8.5A13.3 13.3 0 0 1 12 20.5 13.3 13.3 0 0 1 8.5 12 13.3 13.3 0 0 1 12 3.5Z"/></svg>
                </x-slot:icon>
                <x-slot:footer>
                    <a href="#" class="inline-flex items-center gap-1 text-[0.78rem] font-medium text-[var(--i2-color-brand-ink)] dark:text-white/90">Manage domains <span aria-hidden="true">→</span></a>
                </x-slot:footer>
            </x-client.stat-card>

            <x-client.stat-card label="Hosting Services" value="2" icon-class="bg-[var(--i2-color-violet-soft)] dark:bg-[rgba(124,85,255,.18)] text-[var(--i2-color-violet)]" layout="linked">
                <x-slot:icon>
                    <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><rect x="4" y="5" width="16" height="5" rx="2"/><rect x="4" y="14" width="16" height="5" rx="2"/><path d="M8 7.5h.01"/><path d="M8 16.5h.01"/></svg>
                </x-slot:icon>
                <x-slot:footer>
                    <a href="#" class="inline-flex items-center gap-1 text-[0.78rem] font-medium text-[var(--i2-color-brand-ink)] dark:text-white/90">Manage hosting <span aria-hidden="true">→</span></a>
                </x-slot:footer>
            </x-client.stat-card>

            <x-client.stat-card label="Open Tickets" value="1" icon-class="bg-[var(--i2-color-info-soft)] dark:bg-[rgba(60,124,255,.18)] text-[var(--i2-color-info)]" layout="linked">
                <x-slot:icon>
                    <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M7 8.5h10a3.5 3.5 0 1 1 0 7H9l-4 3v-3a3.5 3.5 0 0 1 2-7Z"/><path d="M10 12h4"/></svg>
                </x-slot:icon>
                <x-slot:footer>
                    <a href="#" class="inline-flex items-center gap-1 text-[0.78rem] font-medium text-[var(--i2-color-brand-ink)] dark:text-white/90">View tickets <span aria-hidden="true">→</span></a>
                </x-slot:footer>
            </x-client.stat-card>
        </section>

        <section class="mb-3 grid gap-3">
            <x-client.panel>
                <div class="mb-3 flex flex-col items-start justify-between gap-3 md:flex-row md:items-center">
                    <h2 class="m-0 text-[0.88rem] font-semibold tracking-[-0.02em]">Recent Projects</h2>
                    <button type="button" class="inline-flex min-h-[28px] items-center justify-center whitespace-nowrap rounded-lg border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-3 text-[0.78rem] text-[var(--i2-color-brand-ink)] dark:text-white/90">View all projects</button>
                </div>

                <div class="grid gap-0">
                    <article class="grid gap-3 border-t-0 py-0 xl:grid-cols-[minmax(0,1.5fr)_minmax(140px,.7fr)_minmax(130px,.55fr)] xl:items-center">
                        <div class="flex min-w-0 items-center gap-3">
                            <div class="grid size-[38px] shrink-0 place-items-center rounded-[10px] bg-[var(--i2-color-brand-ink)] dark:bg-white/10 text-white shadow-[inset_0_0_0_1px_var(--i2-color-border-brand)]">
                                <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M3.5 7.5A2.5 2.5 0 0 1 6 5h4l2 2h6a2.5 2.5 0 0 1 2.5 2.5v7A2.5 2.5 0 0 1 18 19H6a2.5 2.5 0 0 1-2.5-2.5Z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-2">
                                    <h3 class="m-0 text-[0.88rem] font-medium tracking-[-0.02em]">Acme Website Redesign</h3>
                                    <span class="inline-flex min-h-[20px] items-center justify-center rounded-[5px] bg-[var(--i2-color-info-soft)] dark:bg-[rgba(60,124,255,.18)] px-2 text-[0.72rem] font-semibold text-[var(--i2-color-info)]">In Progress</span>
                                </div>
                                <p class="mt-1 text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">Updated May 5, 2024</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <div class="relative h-1.5 flex-1 overflow-hidden rounded-full bg-[var(--i2-color-neutral-100)] dark:bg-white/[0.06]">
                                <span class="i2-progress-bar absolute inset-y-0 left-0 w-[60%] rounded-full bg-[var(--i2-color-accent)] text-[var(--i2-color-accent)]"></span>
                            </div>
                            <strong class="text-[0.8rem] text-[var(--i2-color-text-soft)] dark:text-white/55">60%</strong>
                        </div>
                        <div class="flex items-center justify-between gap-2 text-[0.8rem] text-[var(--i2-color-text-faint)] dark:text-white/35">
                            <span>Due May 20, 2024</span>
                            <button type="button" aria-label="Open project" class="inline-flex size-7 items-center justify-center rounded-[8px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] text-[var(--i2-color-text-soft)] dark:text-white/55">
                                <svg viewBox="0 0 24 24" class="size-[14px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="m10 7 5 5-5 5"/></svg>
                            </button>
                        </div>
                    </article>

                    <article class="grid gap-3 border-t border-[var(--i2-color-border-soft)] dark:border-white/8 py-[10px] xl:grid-cols-[minmax(0,1.5fr)_minmax(140px,.7fr)_minmax(130px,.55fr)] xl:items-center">
                        <div class="flex min-w-0 items-center gap-3">
                            <div class="grid size-[38px] shrink-0 place-items-center rounded-[10px] bg-[var(--i2-color-brand-ink)] dark:bg-white/10 text-white shadow-[inset_0_0_0_1px_var(--i2-color-border-brand)]">
                                <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M6 7h12l-1.2 6H8Z"/><path d="M9 18.5a1 1 0 1 0 0 .01"/><path d="M16 18.5a1 1 0 1 0 0 .01"/><path d="M7 7 6 4H4"/></svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-2">
                                    <h3 class="m-0 text-[0.88rem] font-medium tracking-[-0.02em]">Acme E-commerce Store</h3>
                                    <span class="inline-flex min-h-[20px] items-center justify-center rounded-[5px] bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] px-2 text-[0.72rem] font-semibold text-[var(--i2-color-success)]">In Progress</span>
                                </div>
                                <p class="mt-1 text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">Updated May 2, 2024</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <div class="relative h-1.5 flex-1 overflow-hidden rounded-full bg-[var(--i2-color-neutral-100)] dark:bg-white/[0.06]">
                                <span class="i2-progress-bar absolute inset-y-0 left-0 w-[35%] rounded-full bg-[var(--i2-color-accent)] text-[var(--i2-color-accent)]"></span>
                            </div>
                            <strong class="text-[0.8rem] text-[var(--i2-color-text-soft)] dark:text-white/55">35%</strong>
                        </div>
                        <div class="flex items-center justify-between gap-2 text-[0.8rem] text-[var(--i2-color-text-faint)] dark:text-white/35">
                            <span>Due Jun 10, 2024</span>
                            <button type="button" aria-label="Open project" class="inline-flex size-7 items-center justify-center rounded-[8px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] text-[var(--i2-color-text-soft)] dark:text-white/55">
                                <svg viewBox="0 0 24 24" class="size-[14px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="m10 7 5 5-5 5"/></svg>
                            </button>
                        </div>
                    </article>

                    <article class="grid gap-3 border-t border-[var(--i2-color-border-soft)] dark:border-white/8 pb-0 pt-[10px] xl:grid-cols-[minmax(0,1.5fr)_minmax(140px,.7fr)_minmax(130px,.55fr)] xl:items-center">
                        <div class="flex min-w-0 items-center gap-3">
                            <div class="grid size-[38px] shrink-0 place-items-center rounded-[10px] bg-[var(--i2-color-brand-ink)] dark:bg-white/10 text-white shadow-[inset_0_0_0_1px_var(--i2-color-border-brand)]">
                                <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><rect x="8" y="3.5" width="8" height="17" rx="2"/><path d="M10.5 6.5h3"/><path d="M11.5 17.5h1"/></svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-2">
                                    <h3 class="m-0 text-[0.88rem] font-medium tracking-[-0.02em]">Acme Mobile App</h3>
                                    <span class="inline-flex min-h-[20px] items-center justify-center rounded-[5px] bg-[var(--i2-color-neutral-100)] dark:bg-white/[0.08] px-2 text-[0.72rem] font-semibold text-[var(--i2-color-text-soft)] dark:text-white/55">Planning</span>
                                </div>
                                <p class="mt-1 text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">Updated Apr 28, 2024</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <div class="relative h-1.5 flex-1 overflow-hidden rounded-full bg-[var(--i2-color-neutral-100)] dark:bg-white/[0.06]">
                                <span class="i2-progress-bar absolute inset-y-0 left-0 w-[10%] rounded-full bg-[var(--i2-color-accent)] text-[var(--i2-color-accent)]"></span>
                            </div>
                            <strong class="text-[0.8rem] text-[var(--i2-color-text-soft)] dark:text-white/55">10%</strong>
                        </div>
                        <div class="flex items-center justify-between gap-2 text-[0.8rem] text-[var(--i2-color-text-faint)] dark:text-white/35">
                            <span>Due Jun 30, 2024</span>
                            <button type="button" aria-label="Open project" class="inline-flex size-7 items-center justify-center rounded-[8px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] text-[var(--i2-color-text-soft)] dark:text-white/55">
                                <svg viewBox="0 0 24 24" class="size-[14px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="m10 7 5 5-5 5"/></svg>
                            </button>
                        </div>
                    </article>
                </div>
            </x-client.panel>

            <x-client.panel>
                <div class="mb-3 flex flex-col items-start justify-between gap-3 md:flex-row md:items-center">
                    <h2 class="m-0 text-[0.88rem] font-semibold tracking-[-0.02em]">Upcoming Renewals</h2>
                    <button type="button" class="inline-flex min-h-[28px] items-center justify-center whitespace-nowrap rounded-lg border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-3 text-[0.78rem] text-[var(--i2-color-brand-ink)] dark:text-white/90">View all</button>
                </div>

                <div class="grid gap-0">
                    <article class="grid gap-3 border-t-0 py-0 md:grid-cols-[minmax(0,1fr)_auto] md:items-center">
                        <div class="flex min-w-0 items-center gap-3">
                            <div class="grid size-[38px] shrink-0 place-items-center rounded-[10px] bg-[var(--i2-color-neutral-100)] dark:bg-white/[0.06] text-[var(--i2-color-text-soft)] dark:text-white/55">
                                <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><circle cx="12" cy="12" r="8.5"/><path d="M3.5 12h17"/><path d="M12 3.5a13.3 13.3 0 0 1 3.5 8.5A13.3 13.3 0 0 1 12 20.5 13.3 13.3 0 0 1 8.5 12 13.3 13.3 0 0 1 12 3.5Z"/></svg>
                            </div>
                            <div>
                                <h3 class="m-0 text-[0.88rem] font-medium tracking-[-0.02em]">acme.com</h3>
                                <p class="mt-0.5 text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">Domain</p>
                            </div>
                        </div>
                        <div class="text-left md:text-right">
                            <strong class="text-[0.88rem]">May 15, 2024</strong>
                            <span class="mt-0.5 block text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">7 days left</span>
                        </div>
                    </article>

                    <article class="grid gap-3 border-t border-[var(--i2-color-border-soft)] dark:border-white/8 py-[10px] md:grid-cols-[minmax(0,1fr)_auto] md:items-center">
                        <div class="flex min-w-0 items-center gap-3">
                            <div class="grid size-[38px] shrink-0 place-items-center rounded-[10px] bg-[var(--i2-color-neutral-100)] dark:bg-white/[0.06] text-[var(--i2-color-text-soft)] dark:text-white/55">
                                <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><rect x="4" y="5" width="16" height="5" rx="2"/><rect x="4" y="14" width="16" height="5" rx="2"/><path d="M8 7.5h.01"/><path d="M8 16.5h.01"/></svg>
                            </div>
                            <div>
                                <h3 class="m-0 text-[0.88rem] font-medium tracking-[-0.02em]">Acme Hosting Plan</h3>
                                <p class="mt-0.5 text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">Hosting</p>
                            </div>
                        </div>
                        <div class="text-left md:text-right">
                            <strong class="text-[0.88rem]">May 20, 2024</strong>
                            <span class="mt-0.5 block text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">12 days left</span>
                        </div>
                    </article>

                    <article class="grid gap-3 border-t border-[var(--i2-color-border-soft)] dark:border-white/8 pb-0 pt-[10px] md:grid-cols-[minmax(0,1fr)_auto] md:items-center">
                        <div class="flex min-w-0 items-center gap-3">
                            <div class="grid size-[38px] shrink-0 place-items-center rounded-[10px] bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]">
                                <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M12 3.5 5 6.5V12c0 4.2 2.7 7.8 7 8.8 4.3-1 7-4.6 7-8.8V6.5Z"/><path d="m9.5 12 1.8 1.8 3.7-4"/></svg>
                            </div>
                            <div>
                                <h3 class="m-0 text-[0.88rem] font-medium tracking-[-0.02em]">SSL Certificate</h3>
                                <p class="mt-0.5 text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">SSL</p>
                            </div>
                        </div>
                        <div class="text-left md:text-right">
                            <strong class="text-[0.88rem]">Jun 10, 2024</strong>
                            <span class="mt-0.5 block text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">33 days left</span>
                        </div>
                    </article>
                </div>
            </x-client.panel>
        </section>

        <section class="grid gap-3">
            <x-client.panel>
                <div class="mb-3 flex flex-col items-start justify-between gap-3 md:flex-row md:items-center">
                    <h2 class="m-0 text-[0.88rem] font-semibold tracking-[-0.02em]">Recent Invoices</h2>
                    <button type="button" class="inline-flex min-h-[28px] items-center justify-center whitespace-nowrap rounded-lg border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-3 text-[0.78rem] text-[var(--i2-color-brand-ink)] dark:text-white/90">View all invoices</button>
                </div>

                <div class="grid gap-0">
                    <div class="hidden gap-3 pb-3 text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35 lg:grid lg:grid-cols-[110px_minmax(0,1fr)_90px_100px_100px_32px]">
                        <span>Invoice</span>
                        <span>Description</span>
                        <span>Amount</span>
                        <span>Status</span>
                        <span>Due Date</span>
                        <span class="sr-only">Download</span>
                    </div>

                    @foreach ([
                        ['INV-2024-004', 'Acme Website Redesign', '₦150,000', 'Paid', 'May 20, 2024', 'green'],
                        ['INV-2024-003', 'Acme Hosting Plan', '₦70,000', 'Paid', 'Apr 20, 2024', 'green'],
                        ['INV-2024-002', 'Acme E-commerce Store', '₦300,000', 'Unpaid', 'May 20, 2024', 'amber'],
                        ['INV-2024-001', 'Domain Registration', '₦15,000', 'Paid', 'Apr 10, 2024', 'green'],
                    ] as [$invoice, $description, $amount, $status, $dueDate, $tone])
                        <div class="grid gap-2 border-t border-[var(--i2-color-border-soft)] dark:border-white/8 py-[10px] text-[0.82rem] first:border-t-0 first:pt-0 lg:grid-cols-[110px_minmax(0,1fr)_90px_100px_100px_32px] lg:items-center">
                            <span class="text-[var(--i2-color-text-soft)] dark:text-white/55">{{ $invoice }}</span>
                            <span class="text-[var(--i2-color-text-soft)] dark:text-white/55">{{ $description }}</span>
                            <span class="text-[var(--i2-color-text-soft)] dark:text-white/55">{{ $amount }}</span>
                            <span>
                                <b class="{{ $tone === 'green' ? 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]' : 'bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]' }} inline-flex min-h-[20px] items-center justify-center rounded-[5px] px-2 text-[0.72rem] font-semibold not-italic">
                                    {{ $status }}
                                </b>
                            </span>
                            <span class="text-[var(--i2-color-text-soft)] dark:text-white/55">{{ $dueDate }}</span>
                            <button type="button" aria-label="Download invoice" class="inline-flex size-7 items-center justify-center rounded-[8px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] text-[var(--i2-color-text-soft)] dark:text-white/55">
                                <svg viewBox="0 0 24 24" class="size-[14px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            </x-client.panel>

            <div class="grid gap-3">
                <x-client.panel>
                    <div class="mb-3 flex flex-col items-start justify-between gap-3 md:flex-row md:items-center">
                        <h2 class="m-0 text-[0.88rem] font-semibold tracking-[-0.02em]">Recent Support Tickets</h2>
                        <button type="button" class="inline-flex min-h-[28px] items-center justify-center whitespace-nowrap rounded-lg border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-3 text-[0.78rem] text-[var(--i2-color-brand-ink)] dark:text-white/90">View all</button>
                    </div>

                    <div class="grid gap-0">
                        <article class="grid gap-2 border-t border-[var(--i2-color-border-soft)] dark:border-white/8 py-[10px] first:border-t-0 first:pt-0 lg:grid-cols-[minmax(0,1fr)_auto_auto] lg:items-center">
                            <div class="border-l-[3px] border-[var(--i2-color-warning)] pl-3">
                                <h3 class="m-0 text-[0.88rem] font-medium tracking-[-0.02em]">Website not loading on mobile</h3>
                                <p class="mt-0.5 text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">#TKT-2024-015</p>
                            </div>
                            <span class="inline-flex min-h-[20px] items-center justify-center rounded-[5px] bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] px-2 text-[0.72rem] font-semibold text-[var(--i2-color-warning)]">Open</span>
                            <strong class="text-[0.82rem] text-[var(--i2-color-text-soft)] dark:text-white/55">May 6, 2024</strong>
                        </article>

                        <article class="grid gap-2 border-t border-[var(--i2-color-border-soft)] dark:border-white/8 py-[10px] lg:grid-cols-[minmax(0,1fr)_auto_auto] lg:items-center">
                            <div class="border-l-[3px] border-[var(--i2-color-info)] pl-3">
                                <h3 class="m-0 text-[0.88rem] font-medium tracking-[-0.02em]">Email configuration issue</h3>
                                <p class="mt-0.5 text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">#TKT-2024-014</p>
                            </div>
                            <span class="inline-flex min-h-[20px] items-center justify-center rounded-[5px] bg-[var(--i2-color-info-soft)] dark:bg-[rgba(60,124,255,.18)] px-2 text-[0.72rem] font-semibold text-[var(--i2-color-info)]">In Progress</span>
                            <strong class="text-[0.82rem] text-[var(--i2-color-text-soft)] dark:text-white/55">May 4, 2024</strong>
                        </article>

                        <article class="grid gap-2 border-t border-[var(--i2-color-border-soft)] dark:border-white/8 pb-0 pt-[10px] lg:grid-cols-[minmax(0,1fr)_auto_auto] lg:items-center">
                            <div class="border-l-[3px] border-[var(--i2-color-success)] pl-3">
                                <h3 class="m-0 text-[0.88rem] font-medium tracking-[-0.02em]">SSL certificate installation</h3>
                                <p class="mt-0.5 text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">#TKT-2024-013</p>
                            </div>
                            <span class="inline-flex min-h-[20px] items-center justify-center rounded-[5px] bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] px-2 text-[0.72rem] font-semibold text-[var(--i2-color-success)]">Resolved</span>
                            <strong class="text-[0.82rem] text-[var(--i2-color-text-soft)] dark:text-white/55">May 1, 2024</strong>
                        </article>
                    </div>
                </x-client.panel>

                <x-client.panel class="grid gap-[14px]">
                    <div aria-hidden="true" class="relative h-[120px] overflow-hidden rounded-[14px] bg-[var(--i2-color-surface-alt)] dark:bg-[#141417]">
                        <div class="absolute inset-x-[36px] inset-y-[18px] rounded-full border border-dashed border-[var(--i2-color-border-brand)]"></div>
                        <div class="absolute inset-x-16 inset-y-[34px] rounded-full border border-dashed border-[rgba(60,124,255,.18)]"></div>
                        <div class="absolute left-[42px] top-[28px] grid grid-cols-3 items-center gap-1 rounded-[14px] bg-[var(--i2-color-brand-ink)] dark:bg-white/10 px-3 py-3 text-white">
                            <span class="size-1.5 rounded-full bg-current"></span><span class="size-1.5 rounded-full bg-current"></span><span class="size-1.5 rounded-full bg-current"></span>
                        </div>
                        <div class="absolute bottom-6 right-8 grid grid-cols-3 items-center gap-1 rounded-[14px] bg-[var(--i2-color-accent)] px-3 py-3 text-[var(--i2-color-brand-ink)] dark:text-white/90">
                            <span class="size-1.5 rounded-full bg-current"></span><span class="size-1.5 rounded-full bg-current"></span><span class="size-1.5 rounded-full bg-current"></span>
                        </div>
                    </div>

                    <div>
                        <h2 class="m-0 text-[0.88rem] font-semibold tracking-[-0.02em]">Need help with something?</h2>
                        <p class="mt-1 text-[0.82rem] leading-[1.55] text-[var(--i2-color-text-faint)] dark:text-white/35">Our support team is available 24/7 to assist you.</p>
                    </div>

                    <button type="button" class="inline-flex min-h-[34px] items-center justify-center gap-2 rounded-[10px] border border-transparent bg-[var(--i2-color-accent)] px-3 text-[0.82rem] text-[var(--i2-color-brand-ink)] dark:text-white/90 md:w-full">
                        <span>Create New Ticket</span>
                        <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M5 12h14"/><path d="m13 7 5 5-5 5"/></svg>
                    </button>
                </x-client.panel>
            </div>
        </section>
    </div>
</x-filament-panels::page>
