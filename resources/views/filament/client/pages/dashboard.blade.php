<x-filament-panels::page>
    <div class="font-[var(--i2-font-sans)] text-[var(--i2-color-text)]">
        <section aria-label="Dashboard summary" class="mb-[18px] grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-5">
            <x-client.stat-card label="Active Projects" value="3" icon-class="bg-[var(--i2-color-accent-soft)] text-[var(--i2-color-accent)]" layout="linked">
                <x-slot:icon>
                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M3.5 7.5A2.5 2.5 0 0 1 6 5h4l2 2h6a2.5 2.5 0 0 1 2.5 2.5v7A2.5 2.5 0 0 1 18 19H6a2.5 2.5 0 0 1-2.5-2.5Z"/></svg>
                </x-slot:icon>
                <x-slot:footer>
                    <a href="#" class="inline-flex items-center gap-1.5 text-[var(--i2-text-sm)] font-medium text-[var(--i2-color-brand-ink)]">View projects <span aria-hidden="true">→</span></a>
                </x-slot:footer>
            </x-client.stat-card>

            <x-client.stat-card label="Pending Invoices" value="2" icon-class="bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]" layout="linked">
                <x-slot:icon>
                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"/><path d="M14 3.5V8h4"/><path d="M8 12h6"/><path d="M8 16h8"/></svg>
                </x-slot:icon>
                <x-slot:footer>
                    <a href="#" class="inline-flex items-center gap-1.5 text-[var(--i2-text-sm)] font-medium text-[var(--i2-color-brand-ink)]">View invoices <span aria-hidden="true">→</span></a>
                </x-slot:footer>
            </x-client.stat-card>

            <x-client.stat-card label="Domains" value="5" icon-class="bg-[var(--i2-color-accent-soft)] text-[var(--i2-color-accent)]" layout="linked">
                <x-slot:icon>
                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><circle cx="12" cy="12" r="8.5"/><path d="M3.5 12h17"/><path d="M12 3.5a13.3 13.3 0 0 1 3.5 8.5A13.3 13.3 0 0 1 12 20.5 13.3 13.3 0 0 1 8.5 12 13.3 13.3 0 0 1 12 3.5Z"/></svg>
                </x-slot:icon>
                <x-slot:footer>
                    <a href="#" class="inline-flex items-center gap-1.5 text-[var(--i2-text-sm)] font-medium text-[var(--i2-color-brand-ink)]">Manage domains <span aria-hidden="true">→</span></a>
                </x-slot:footer>
            </x-client.stat-card>

            <x-client.stat-card label="Hosting Services" value="2" icon-class="bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)]" layout="linked">
                <x-slot:icon>
                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><rect x="4" y="5" width="16" height="5" rx="2"/><rect x="4" y="14" width="16" height="5" rx="2"/><path d="M8 7.5h.01"/><path d="M8 16.5h.01"/></svg>
                </x-slot:icon>
                <x-slot:footer>
                    <a href="#" class="inline-flex items-center gap-1.5 text-[var(--i2-text-sm)] font-medium text-[var(--i2-color-brand-ink)]">Manage hosting <span aria-hidden="true">→</span></a>
                </x-slot:footer>
            </x-client.stat-card>

            <x-client.stat-card label="Open Tickets" value="1" icon-class="bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]" layout="linked">
                <x-slot:icon>
                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M7 8.5h10a3.5 3.5 0 1 1 0 7H9l-4 3v-3a3.5 3.5 0 0 1 2-7Z"/><path d="M10 12h4"/></svg>
                </x-slot:icon>
                <x-slot:footer>
                    <a href="#" class="inline-flex items-center gap-1.5 text-[var(--i2-text-sm)] font-medium text-[var(--i2-color-brand-ink)]">View tickets <span aria-hidden="true">→</span></a>
                </x-slot:footer>
            </x-client.stat-card>
        </section>

        <section class="mb-4 grid gap-4">
            <x-client.panel padding="lg">
                <div class="mb-[18px] flex flex-col items-start justify-between gap-4 md:flex-row md:items-center">
                    <h2 class="m-0 text-[var(--i2-text-base)] tracking-[-0.03em]">Recent Projects</h2>
                    <button type="button" class="inline-flex min-h-[38px] items-center justify-center whitespace-nowrap rounded-xl border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[14px] text-[var(--i2-text-sm)] text-[var(--i2-color-brand-ink)] shadow-none">View all projects</button>
                </div>

                <div class="grid gap-[14px]">
                    <article class="grid gap-[14px] border-t-0 py-0 xl:grid-cols-[minmax(0,1.5fr)_minmax(150px,.7fr)_minmax(140px,.55fr)] xl:items-center">
                        <div class="flex min-w-0 items-center gap-[14px]">
                            <div class="grid size-[50px] place-items-center rounded-[14px] bg-[var(--i2-color-brand-ink)] text-white shadow-[inset_0_0_0_1px_var(--i2-color-border-brand)]">
                                <svg viewBox="0 0 24 24" class="size-[22px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M3.5 7.5A2.5 2.5 0 0 1 6 5h4l2 2h6a2.5 2.5 0 0 1 2.5 2.5v7A2.5 2.5 0 0 1 18 19H6a2.5 2.5 0 0 1-2.5-2.5Z"/></svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-2.5">
                                    <h3 class="m-0 text-base tracking-[-0.03em]">Acme Website Redesign</h3>
                                    <span class="inline-flex min-h-7 items-center justify-center rounded-full bg-[var(--i2-color-info-soft)] px-[10px] text-[0.76rem] font-bold text-[var(--i2-color-info)]">In Progress</span>
                                </div>
                                <p class="mt-1.5 text-[var(--i2-color-text-faint)]">Last updated: May 5, 2024</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="relative h-2 flex-1 overflow-hidden rounded-full bg-[var(--i2-color-neutral-100)]">
                                <span class="i2-progress-bar absolute inset-y-0 left-0 w-[60%] rounded-full bg-[var(--i2-color-accent)] text-[var(--i2-color-accent)]"></span>
                            </div>
                            <strong class="text-[.94rem]">60%</strong>
                        </div>
                        <div class="flex items-center justify-between gap-2.5 text-[var(--i2-color-text-faint)] xl:justify-between">
                            <span>Due: May 20, 2024</span>
                            <button type="button" aria-label="Open project" class="inline-flex size-[34px] items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] text-[var(--i2-color-text-soft)]">
                                <svg viewBox="0 0 24 24" class="size-[22px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="m10 7 5 5-5 5"/></svg>
                            </button>
                        </div>
                    </article>

                    <article class="grid gap-[14px] border-t border-[rgba(233,227,220,.9)] py-[14px] xl:grid-cols-[minmax(0,1.5fr)_minmax(150px,.7fr)_minmax(140px,.55fr)] xl:items-center">
                        <div class="flex min-w-0 items-center gap-[14px]">
                            <div class="grid size-[50px] place-items-center rounded-[14px] bg-[var(--i2-color-brand-ink)] text-white shadow-[inset_0_0_0_1px_var(--i2-color-border-brand)]">
                                <svg viewBox="0 0 24 24" class="size-[22px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M6 7h12l-1.2 6H8Z"/><path d="M9 18.5a1 1 0 1 0 0 .01"/><path d="M16 18.5a1 1 0 1 0 0 .01"/><path d="M7 7 6 4H4"/></svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-2.5">
                                    <h3 class="m-0 text-base tracking-[-0.03em]">Acme E-commerce Store</h3>
                                    <span class="inline-flex min-h-7 items-center justify-center rounded-full bg-[var(--i2-color-success-soft)] px-[10px] text-[0.76rem] font-bold text-[var(--i2-color-success)]">In Progress</span>
                                </div>
                                <p class="mt-1.5 text-[var(--i2-color-text-faint)]">Last updated: May 2, 2024</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="relative h-2 flex-1 overflow-hidden rounded-full bg-[var(--i2-color-neutral-100)]">
                                <span class="i2-progress-bar absolute inset-y-0 left-0 w-[35%] rounded-full bg-[var(--i2-color-accent)] text-[var(--i2-color-accent)]"></span>
                            </div>
                            <strong class="text-[.94rem]">35%</strong>
                        </div>
                        <div class="flex items-center justify-between gap-2.5 text-[var(--i2-color-text-faint)] xl:justify-between">
                            <span>Due: Jun 10, 2024</span>
                            <button type="button" aria-label="Open project" class="inline-flex size-[34px] items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] text-[var(--i2-color-text-soft)]">
                                <svg viewBox="0 0 24 24" class="size-[22px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="m10 7 5 5-5 5"/></svg>
                            </button>
                        </div>
                    </article>

                    <article class="grid gap-[14px] border-t border-[rgba(233,227,220,.9)] pb-0 pt-[14px] xl:grid-cols-[minmax(0,1.5fr)_minmax(150px,.7fr)_minmax(140px,.55fr)] xl:items-center">
                        <div class="flex min-w-0 items-center gap-[14px]">
                            <div class="grid size-[50px] place-items-center rounded-[14px] bg-[var(--i2-color-brand-ink)] text-white shadow-[inset_0_0_0_1px_var(--i2-color-border-brand)]">
                                <svg viewBox="0 0 24 24" class="size-[22px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><rect x="8" y="3.5" width="8" height="17" rx="2"/><path d="M10.5 6.5h3"/><path d="M11.5 17.5h1"/></svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex flex-wrap items-center gap-2.5">
                                    <h3 class="m-0 text-base tracking-[-0.03em]">Acme Mobile App</h3>
                                    <span class="inline-flex min-h-7 items-center justify-center rounded-full bg-[var(--i2-color-neutral-100)] px-[10px] text-[0.76rem] font-bold text-[var(--i2-color-text-soft)]">Planning</span>
                                </div>
                                <p class="mt-1.5 text-[var(--i2-color-text-faint)]">Last updated: Apr 28, 2024</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="relative h-2 flex-1 overflow-hidden rounded-full bg-[var(--i2-color-neutral-100)]">
                                <span class="i2-progress-bar absolute inset-y-0 left-0 w-[10%] rounded-full bg-[var(--i2-color-accent)] text-[var(--i2-color-accent)]"></span>
                            </div>
                            <strong class="text-[.94rem]">10%</strong>
                        </div>
                        <div class="flex items-center justify-between gap-2.5 text-[var(--i2-color-text-faint)] xl:justify-between">
                            <span>Due: Jun 30, 2024</span>
                            <button type="button" aria-label="Open project" class="inline-flex size-[34px] items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] text-[var(--i2-color-text-soft)]">
                                <svg viewBox="0 0 24 24" class="size-[22px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="m10 7 5 5-5 5"/></svg>
                            </button>
                        </div>
                    </article>
                </div>
            </x-client.panel>

            <x-client.panel padding="lg">
                <div class="mb-[18px] flex flex-col items-start justify-between gap-4 md:flex-row md:items-center">
                    <h2 class="m-0 text-[var(--i2-text-base)] tracking-[-0.03em]">Upcoming Renewals</h2>
                    <button type="button" class="inline-flex min-h-[38px] items-center justify-center whitespace-nowrap rounded-xl border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[14px] text-[var(--i2-text-sm)] text-[var(--i2-color-brand-ink)] shadow-none">View all</button>
                </div>

                <div class="grid gap-[14px]">
                    <article class="grid gap-[14px] border-t-0 py-0 md:grid-cols-[minmax(0,1fr)_auto] md:items-center">
                        <div class="flex min-w-0 items-center gap-[14px]">
                            <div class="grid size-[50px] place-items-center rounded-[14px] bg-[var(--i2-color-neutral-100)] text-[var(--i2-color-text-soft)]">
                                <svg viewBox="0 0 24 24" class="size-[22px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><circle cx="12" cy="12" r="8.5"/><path d="M3.5 12h17"/><path d="M12 3.5a13.3 13.3 0 0 1 3.5 8.5A13.3 13.3 0 0 1 12 20.5 13.3 13.3 0 0 1 8.5 12 13.3 13.3 0 0 1 12 3.5Z"/></svg>
                            </div>
                            <div>
                                <h3 class="m-0 text-base tracking-[-0.03em]">acme.com</h3>
                                <p class="mt-1.5 text-[var(--i2-color-text-faint)]">Domain</p>
                            </div>
                        </div>
                        <div class="text-left md:text-right">
                            <strong class="text-[.94rem]">May 15, 2024</strong>
                            <span class="mt-1.5 block text-[var(--i2-color-text-faint)]">7 days left</span>
                        </div>
                    </article>

                    <article class="grid gap-[14px] border-t border-[rgba(233,227,220,.9)] py-[14px] md:grid-cols-[minmax(0,1fr)_auto] md:items-center">
                        <div class="flex min-w-0 items-center gap-[14px]">
                            <div class="grid size-[50px] place-items-center rounded-[14px] bg-[var(--i2-color-neutral-100)] text-[var(--i2-color-text-soft)]">
                                <svg viewBox="0 0 24 24" class="size-[22px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><rect x="4" y="5" width="16" height="5" rx="2"/><rect x="4" y="14" width="16" height="5" rx="2"/><path d="M8 7.5h.01"/><path d="M8 16.5h.01"/></svg>
                            </div>
                            <div>
                                <h3 class="m-0 text-base tracking-[-0.03em]">Acme Hosting Plan</h3>
                                <p class="mt-1.5 text-[var(--i2-color-text-faint)]">Hosting</p>
                            </div>
                        </div>
                        <div class="text-left md:text-right">
                            <strong class="text-[.94rem]">May 20, 2024</strong>
                            <span class="mt-1.5 block text-[var(--i2-color-text-faint)]">12 days left</span>
                        </div>
                    </article>

                    <article class="grid gap-[14px] border-t border-[rgba(233,227,220,.9)] pb-0 pt-[14px] md:grid-cols-[minmax(0,1fr)_auto] md:items-center">
                        <div class="flex min-w-0 items-center gap-[14px]">
                            <div class="grid size-[50px] place-items-center rounded-[14px] bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]">
                                <svg viewBox="0 0 24 24" class="size-[22px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M12 3.5 5 6.5V12c0 4.2 2.7 7.8 7 8.8 4.3-1 7-4.6 7-8.8V6.5Z"/><path d="m9.5 12 1.8 1.8 3.7-4"/></svg>
                            </div>
                            <div>
                                <h3 class="m-0 text-base tracking-[-0.03em]">SSL Certificate</h3>
                                <p class="mt-1.5 text-[var(--i2-color-text-faint)]">SSL</p>
                            </div>
                        </div>
                        <div class="text-left md:text-right">
                            <strong class="text-[.94rem]">Jun 10, 2024</strong>
                            <span class="mt-1.5 block text-[var(--i2-color-text-faint)]">33 days left</span>
                        </div>
                    </article>
                </div>
            </x-client.panel>
        </section>

        <section class="grid gap-4">
            <x-client.panel padding="lg">
                <div class="mb-[18px] flex flex-col items-start justify-between gap-4 md:flex-row md:items-center">
                    <h2 class="m-0 text-[var(--i2-text-base)] tracking-[-0.03em]">Recent Invoices</h2>
                    <button type="button" class="inline-flex min-h-[38px] items-center justify-center whitespace-nowrap rounded-xl border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[14px] text-[var(--i2-text-sm)] text-[var(--i2-color-brand-ink)] shadow-none">View all invoices</button>
                </div>

                <div class="grid gap-0">
                    <div class="hidden gap-3 pb-[14px] text-[.92rem] text-[var(--i2-color-text-faint)] lg:grid lg:grid-cols-[120px_minmax(0,1fr)_100px_110px_110px_42px]">
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
                        <div class="grid gap-3 border-t border-[var(--i2-color-border-soft)] py-[14px] first:border-t-0 first:pt-0 lg:grid-cols-[120px_minmax(0,1fr)_100px_110px_110px_42px] lg:items-center">
                            <span>{{ $invoice }}</span>
                            <span>{{ $description }}</span>
                            <span>{{ $amount }}</span>
                            <span>
                                <b class="{{ $tone === 'green' ? 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]' : 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]' }} inline-flex min-h-7 items-center justify-center rounded-full px-[10px] text-[0.76rem] font-bold not-italic">
                                    {{ $status }}
                                </b>
                            </span>
                            <span>{{ $dueDate }}</span>
                            <button type="button" aria-label="Download invoice" class="inline-flex size-[34px] items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] text-[var(--i2-color-text-soft)]">
                                <svg viewBox="0 0 24 24" class="size-[22px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            </x-client.panel>

            <div class="grid gap-4">
                <x-client.panel padding="lg">
                    <div class="mb-[18px] flex flex-col items-start justify-between gap-4 md:flex-row md:items-center">
                        <h2 class="m-0 text-[var(--i2-text-base)] tracking-[-0.03em]">Recent Support Tickets</h2>
                        <button type="button" class="inline-flex min-h-[38px] items-center justify-center whitespace-nowrap rounded-xl border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[14px] text-[var(--i2-text-sm)] text-[var(--i2-color-brand-ink)] shadow-none">View all</button>
                    </div>

                    <div class="grid gap-[14px]">
                        <article class="grid gap-[14px] border-t border-[var(--i2-color-border-soft)] py-[14px] first:border-t-0 first:pt-0 lg:grid-cols-[minmax(0,1fr)_auto_auto] lg:items-center">
                            <div class="border-l-4 border-[var(--i2-color-warning)] pl-[14px]">
                                <h3 class="m-0 text-base tracking-[-0.03em]">Website not loading on mobile</h3>
                                <p class="mt-1.5 text-[var(--i2-color-text-faint)]">#TKT-2024-015</p>
                            </div>
                            <span class="inline-flex min-h-7 items-center justify-center rounded-full bg-[var(--i2-color-warning-soft)] px-[10px] text-[0.76rem] font-bold text-[var(--i2-color-warning)]">Open</span>
                            <strong class="text-[.94rem]">May 6, 2024</strong>
                        </article>

                        <article class="grid gap-[14px] border-t border-[var(--i2-color-border-soft)] py-[14px] lg:grid-cols-[minmax(0,1fr)_auto_auto] lg:items-center">
                            <div class="border-l-4 border-[var(--i2-color-info)] pl-[14px]">
                                <h3 class="m-0 text-base tracking-[-0.03em]">Email configuration issue</h3>
                                <p class="mt-1.5 text-[var(--i2-color-text-faint)]">#TKT-2024-014</p>
                            </div>
                            <span class="inline-flex min-h-7 items-center justify-center rounded-full bg-[var(--i2-color-info-soft)] px-[10px] text-[0.76rem] font-bold text-[var(--i2-color-info)]">In Progress</span>
                            <strong class="text-[.94rem]">May 4, 2024</strong>
                        </article>

                        <article class="grid gap-[14px] border-t border-[var(--i2-color-border-soft)] pb-0 pt-[14px] lg:grid-cols-[minmax(0,1fr)_auto_auto] lg:items-center">
                            <div class="border-l-4 border-[var(--i2-color-success)] pl-[14px]">
                                <h3 class="m-0 text-base tracking-[-0.03em]">SSL certificate installation</h3>
                                <p class="mt-1.5 text-[var(--i2-color-text-faint)]">#TKT-2024-013</p>
                            </div>
                            <span class="inline-flex min-h-7 items-center justify-center rounded-full bg-[var(--i2-color-success-soft)] px-[10px] text-[0.76rem] font-bold text-[var(--i2-color-success)]">Resolved</span>
                            <strong class="text-[.94rem]">May 1, 2024</strong>
                        </article>
                    </div>
                </x-client.panel>

                <x-client.panel padding="lg" class="grid gap-[18px]">
                    <div aria-hidden="true" class="relative h-[148px] overflow-hidden rounded-[18px] bg-[var(--i2-color-surface-alt)]">
                        <div class="absolute inset-x-[36px] inset-y-[18px] rounded-full border border-dashed border-[var(--i2-color-border-brand)]"></div>
                        <div class="absolute inset-x-16 inset-y-[34px] rounded-full border border-dashed border-[rgba(60,124,255,.18)]"></div>
                        <div class="absolute left-[42px] top-[34px] grid grid-cols-3 items-center gap-1 rounded-[18px] bg-[var(--i2-color-brand-ink)] px-4 py-[14px] text-white">
                            <span class="size-1.5 rounded-full bg-current"></span><span class="size-1.5 rounded-full bg-current"></span><span class="size-1.5 rounded-full bg-current"></span>
                        </div>
                        <div class="absolute bottom-7 right-10 grid grid-cols-3 items-center gap-1 rounded-[18px] bg-[var(--i2-color-accent)] px-4 py-[14px] text-[var(--i2-color-brand-ink)]">
                            <span class="size-1.5 rounded-full bg-current"></span><span class="size-1.5 rounded-full bg-current"></span><span class="size-1.5 rounded-full bg-current"></span>
                        </div>
                    </div>

                    <div>
                        <h2 class="m-0 text-[var(--i2-text-base)] tracking-[-0.03em]">Need help with something?</h2>
                        <p class="mt-1.5 leading-[1.6] text-[var(--i2-color-text-faint)]">Our support team is available 24/7 to assist you with any questions.</p>
                    </div>

                    <button type="button" class="inline-flex min-h-[38px] items-center justify-center gap-2.5 rounded-xl border border-transparent bg-[var(--i2-color-accent)] px-[14px] text-[var(--i2-color-brand-ink)] shadow-none md:w-full">
                        <span>Create New Ticket</span>
                        <svg viewBox="0 0 24 24" class="size-[22px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M5 12h14"/><path d="m13 7 5 5-5 5"/></svg>
                    </button>
                </x-client.panel>
            </div>
        </section>
    </div>
</x-filament-panels::page>
