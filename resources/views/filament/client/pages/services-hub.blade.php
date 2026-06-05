<x-filament-panels::page>
    @php
        $serviceRows = [
            [
                'icon' => 'globe',
                'iconClass' => 'bg-[var(--i2-color-violet-soft)] dark:bg-[rgba(124,85,255,.18)] text-[var(--i2-color-violet)]',
                'title' => 'acme.com',
                'subtitle' => 'Domain Registration',
                'type' => 'Domain',
                'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'],
                'due' => 'May 15, 2025',
                'dueNote' => '23 days left',
                'amount' => '₦8,000',
                'cycle' => '1 Year',
            ],
            [
                'icon' => 'server',
                'iconClass' => 'bg-[var(--i2-color-info-soft)] dark:bg-[rgba(60,124,255,.18)] text-[var(--i2-color-info)]',
                'title' => 'Acme Hosting Plan',
                'subtitle' => 'Shared Hosting',
                'type' => 'Hosting',
                'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'],
                'due' => 'May 20, 2025',
                'dueNote' => '28 days left',
                'amount' => '₦70,000',
                'cycle' => '1 Year',
            ],
            [
                'icon' => 'shield',
                'iconClass' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]',
                'title' => 'SSL Certificate (acme.com)',
                'subtitle' => 'SSL Certificate',
                'type' => 'SSL',
                'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'],
                'due' => 'Jun 10, 2025',
                'dueNote' => '49 days left',
                'amount' => '₦15,000',
                'cycle' => '1 Year',
            ],
            [
                'icon' => 'mail',
                'iconClass' => 'bg-[var(--i2-color-accent-soft)] dark:bg-[rgba(200,169,110,.18)] text-[var(--i2-color-accent)]',
                'title' => 'Business Email',
                'subtitle' => '5 Mailboxes',
                'type' => 'Email',
                'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'],
                'due' => 'May 25, 2025',
                'dueNote' => '33 days left',
                'amount' => '₦24,000',
                'cycle' => '1 Year',
            ],
            [
                'icon' => 'cloud',
                'iconClass' => 'bg-[var(--i2-color-violet-soft)] dark:bg-[rgba(124,85,255,.18)] text-[var(--i2-color-violet)]',
                'title' => 'Daily Backup',
                'subtitle' => 'Website Backup',
                'type' => 'Add-on',
                'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'],
                'due' => 'May 20, 2025',
                'dueNote' => '28 days left',
                'amount' => '₦10,000',
                'cycle' => '1 Year',
            ],
            [
                'icon' => 'share',
                'iconClass' => 'bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]',
                'title' => 'Cloudflare CDN',
                'subtitle' => 'CDN Service',
                'type' => 'Add-on',
                'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'],
                'due' => 'May 20, 2025',
                'dueNote' => '28 days left',
                'amount' => '₦12,000',
                'cycle' => '1 Year',
            ],
            [
                'icon' => 'lock',
                'iconClass' => 'bg-[var(--i2-color-neutral-100)] dark:bg-white/[0.08] text-[var(--i2-color-text-soft)] dark:text-white/55',
                'title' => 'SiteLock Security',
                'subtitle' => 'Website Security',
                'type' => 'Add-on',
                'status' => ['label' => 'Expiring Soon', 'class' => 'bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]'],
                'due' => 'Jun 05, 2025',
                'dueNote' => '44 days left',
                'amount' => '₦18,000',
                'cycle' => '1 Year',
            ],
            [
                'icon' => 'monitor',
                'iconClass' => 'bg-[var(--i2-color-danger-soft)] dark:bg-[rgba(255,59,48,.18)] text-[var(--i2-color-danger)]',
                'title' => 'Website Maintenance',
                'subtitle' => 'Maintenance Service',
                'type' => 'Service',
                'status' => ['label' => 'Expiring Soon', 'class' => 'bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]'],
                'due' => 'Jun 12, 2025',
                'dueNote' => '51 days left',
                'amount' => '₦30,000',
                'cycle' => '1 Year',
            ],
        ];
    @endphp

    <div class="font-[var(--i2-font-sans)] text-[var(--i2-color-text)] dark:text-white/88">
        <main>
            <section aria-label="Service summary" class="mb-3 grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-5">
                <x-client.stat-card label="Total Services" value="8" note="All services" icon-class="bg-[var(--i2-color-accent-soft)] dark:bg-[rgba(200,169,110,.18)] text-[var(--i2-color-accent)]">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><ellipse cx="12" cy="6.5" rx="5.5" ry="2.5"></ellipse><path d="M6.5 6.5v5c0 1.4 2.5 2.5 5.5 2.5s5.5-1.1 5.5-2.5v-5"></path><path d="M6.5 11.5v5c0 1.4 2.5 2.5 5.5 2.5s5.5-1.1 5.5-2.5v-5"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
                <x-client.stat-card label="Active" value="6" note="75% of total" icon-class="bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="m8.5 12 2.2 2.2 4.8-5"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
                <x-client.stat-card label="Expiring Soon" value="2" note="25% of total" icon-class="bg-[var(--i2-color-info-soft)] dark:bg-[rgba(60,124,255,.18)] text-[var(--i2-color-info)]">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="M12 7.5V12h3.5"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
                <x-client.stat-card label="Suspended" value="0" note="0% of total" icon-class="bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="M10 9.5v5"></path><path d="M14 9.5v5"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
                <x-client.stat-card label="Cancelled" value="0" note="0% of total" icon-class="bg-[var(--i2-color-danger-soft)] dark:bg-[rgba(255,59,48,.18)] text-[var(--i2-color-danger)]">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="m9 9 6 6"></path><path d="m15 9-6 6"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
            </section>

            <x-client.panel padding="none">
                <div class="flex flex-col items-start justify-between gap-3 px-[18px] pb-0 pt-[14px] xl:flex-row xl:items-center">
                    <div class="flex w-full items-center gap-7 overflow-x-auto pb-1" aria-label="Service filters">
                        <button type="button" class="relative whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-accent)] after:absolute after:bottom-0 after:left-[-6px] after:right-[-6px] after:h-[3px] after:rounded-full after:bg-[var(--i2-color-accent)] after:content-['']">All Services</button>
                        <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)] dark:text-white/55">Active</button>
                        <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)] dark:text-white/55">Expiring Soon</button>
                        <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)] dark:text-white/55">Suspended</button>
                        <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)] dark:text-white/55">Cancelled</button>
                    </div>

                    <div class="flex w-full flex-col gap-3 xl:w-auto xl:flex-row xl:items-center">
                        <button type="button" class="inline-flex min-h-[28px] items-center justify-center gap-2 rounded-[10px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-[18px] text-[var(--i2-color-text-soft)] dark:text-white/55">
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4 6h16"></path><path d="M7 12h10"></path><path d="M10 18h4"></path></svg>
                            <span>Filter</span>
                        </button>
                        <button type="button" class="inline-flex min-h-[28px] items-center justify-center gap-2 rounded-[10px] bg-[var(--i2-color-brand-ink)] dark:bg-white/10 dark:border dark:border-white/15 px-[18px] text-white">
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg>
                            <span>Add New Service</span>
                        </button>
                    </div>
                </div>

                <div class="px-[18px] pb-0 pt-3">
                    <div class="hidden items-center gap-[18px] border-t border-[var(--i2-color-border-soft)] dark:border-white/8 px-[10px] py-[10px] text-[.94rem] text-[var(--i2-color-text-soft)] dark:text-white/55 xl:grid xl:grid-cols-[minmax(250px,2fr)_120px_120px_150px_100px_110px_132px] 2xl:grid-cols-[minmax(280px,2fr)_130px_120px_160px_110px_120px_142px]">
                        <span>Service</span>
                        <span>Type</span>
                        <span>Status</span>
                        <span>Next Due Date</span>
                        <span>Amount</span>
                        <span>Billing Cycle</span>
                        <span>Action</span>
                    </div>

                    @foreach ($serviceRows as $service)
                        <article class="grid gap-3 border-t border-[var(--i2-color-border-soft)] dark:border-white/8 px-[10px] py-[10px] xl:grid-cols-[minmax(250px,2fr)_120px_120px_150px_100px_110px_132px] xl:items-center xl:gap-[18px] 2xl:grid-cols-[minmax(280px,2fr)_130px_120px_160px_110px_120px_142px]">
                            <div class="flex min-w-0 items-center gap-4">
                                <div class="{{ $service['iconClass'] }} grid size-8 shrink-0 place-items-center rounded-[10px]">
                                    @if ($service['icon'] === 'globe')
                                        <svg viewBox="0 0 24 24" class="size-5 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="7"></circle><path d="M5 12h14"></path><path d="M12 5a10.7 10.7 0 0 1 3 7 10.7 10.7 0 0 1-3 7 10.7 10.7 0 0 1-3-7 10.7 10.7 0 0 1 3-7Z"></path></svg>
                                    @elseif ($service['icon'] === 'server')
                                        <svg viewBox="0 0 24 24" class="size-5 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="4.5" y="5" width="15" height="6" rx="1.5"></rect><rect x="4.5" y="13" width="15" height="6" rx="1.5"></rect><path d="M8 8h.01"></path><path d="M8 16h.01"></path></svg>
                                    @elseif ($service['icon'] === 'shield')
                                        <svg viewBox="0 0 24 24" class="size-5 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 3.5 5 6.5V12c0 4.2 2.7 7.8 7 8.8 4.3-1 7-4.6 7-8.8V6.5Z"></path><path d="m9.5 12 1.8 1.8 3.7-4"></path></svg>
                                    @elseif ($service['icon'] === 'mail')
                                        <svg viewBox="0 0 24 24" class="size-5 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M5 8h14v8H5Z"></path><path d="M5 8 12 13l7-5"></path></svg>
                                    @elseif ($service['icon'] === 'cloud')
                                        <svg viewBox="0 0 24 24" class="size-5 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M7 15a4 4 0 1 1 7.8 1H17a2.5 2.5 0 0 0 .2-5 5 5 0 0 0-9.7 1A3.5 3.5 0 0 0 7 19h8a3 3 0 0 0 0-6"></path><path d="M12 10v7"></path><path d="m9.5 14.5 2.5 2.5 2.5-2.5"></path></svg>
                                    @elseif ($service['icon'] === 'share')
                                        <svg viewBox="0 0 24 24" class="size-5 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="7" cy="12" r="1.5"></circle><circle cx="17" cy="6.5" r="1.5"></circle><circle cx="17" cy="17.5" r="1.5"></circle><path d="m8.4 11 7.2-3"></path><path d="m8.4 13 7.2 3"></path></svg>
                                    @elseif ($service['icon'] === 'lock')
                                        <svg viewBox="0 0 24 24" class="size-5 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="7" y="10" width="10" height="8" rx="1.5"></rect><path d="M9 10V7.5A3 3 0 0 1 12 4.5a3 3 0 0 1 3 3V10"></path></svg>
                                    @else
                                        <svg viewBox="0 0 24 24" class="size-5 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="5" y="6" width="14" height="10" rx="1.5"></rect><path d="M8 19h8"></path><path d="M12 16v3"></path></svg>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <h2 class="mb-1.5 text-[0.88rem] font-semibold tracking-[-0.02em]">{{ $service['title'] }}</h2>
                                    <p class="text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">{{ $service['subtitle'] }}</p>
                                </div>
                            </div>

                            <div class="text-[var(--i2-color-text-faint)] dark:text-white/35">{{ $service['type'] }}</div>

                            <div>
                                <span class="{{ $service['status']['class'] }} inline-flex min-h-[20px] items-center justify-center rounded-[6px] px-[10px] text-[0.78rem] font-semibold whitespace-nowrap">
                                    {{ $service['status']['label'] }}
                                </span>
                            </div>

                            <div>
                                <strong class="text-[0.82rem] font-medium text-[var(--i2-color-text-soft)] dark:text-white/55">{{ $service['due'] }}</strong>
                                <span class="mt-2 block font-semibold text-[var(--i2-color-accent)]">{{ $service['dueNote'] }}</span>
                            </div>

                            <div class="text-[0.82rem] font-medium text-[var(--i2-color-text-soft)] dark:text-white/55">{{ $service['amount'] }}</div>
                            <div class="text-[var(--i2-color-text-faint)] dark:text-white/35">{{ $service['cycle'] }}</div>

                            <div class="flex items-center gap-2.5">
                                <button type="button" class="inline-flex min-h-[28px] min-w-[72px] items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-[14px] text-[var(--i2-color-brand-ink)] dark:text-white/90">Manage</button>
                                <button type="button" class="inline-flex size-[28px] items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] text-[var(--i2-color-text-soft)] dark:text-white/55" aria-label="More actions for {{ $service['title'] }}">
                                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 6h.01"></path><path d="M12 12h.01"></path><path d="M12 18h.01"></path></svg>
                                </button>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="flex flex-col items-start justify-between gap-3 px-[18px] pb-[12px] pt-[14px] xl:flex-row xl:items-center">
                    <p class="m-0 text-[var(--i2-color-text-faint)] dark:text-white/35">Showing 1 to 8 of 8 services</p>
                    <div class="flex items-center gap-2.5">
                        <button type="button" class="inline-flex min-w-[34px] items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-3 text-[var(--i2-color-text-soft)] dark:text-white/55" aria-label="Previous page">
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m14 7-5 5 5 5"></path></svg>
                        </button>
                        <button type="button" class="inline-flex min-w-[34px] items-center justify-center rounded-[10px] bg-[var(--i2-color-brand-ink)] dark:bg-white/10 dark:border dark:border-white/15 px-3 text-white">1</button>
                        <button type="button" class="inline-flex min-w-[34px] items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-3 text-[var(--i2-color-text-soft)] dark:text-white/55" aria-label="Next page">
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m10 7 5 5-5 5"></path></svg>
                        </button>
                    </div>
                </div>
            </x-client.panel>
        </main>
    </div>
</x-filament-panels::page>
