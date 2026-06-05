<x-filament-panels::page>
    @php
        $stats = [
            ['label' => 'Total Hosting', 'value' => '6', 'note' => 'All hosting services', 'iconClass' => 'bg-[var(--i2-color-violet-soft)] dark:bg-[rgba(124,85,255,.18)] text-[var(--i2-color-violet)]', 'icon' => 'server'],
            ['label' => 'Active', 'value' => '5', 'note' => '83% of total', 'iconClass' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]', 'icon' => 'active'],
            ['label' => 'Expiring Soon', 'value' => '1', 'note' => '17% of total', 'iconClass' => 'bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]', 'icon' => 'expiring'],
            ['label' => 'Suspended', 'value' => '0', 'note' => '0% of total', 'iconClass' => 'bg-[var(--i2-color-danger-soft)] dark:bg-[rgba(255,59,48,.18)] text-[var(--i2-color-danger)]', 'icon' => 'suspended'],
            ['label' => 'Cancelled', 'value' => '0', 'note' => '0% of total', 'iconClass' => 'bg-[var(--i2-color-surface-alt)] dark:bg-[#141417] text-[var(--i2-color-text-soft)] dark:text-white/55', 'icon' => 'cancelled'],
        ];

        $hostingRows = [
            ['iconClass' => 'bg-[var(--i2-color-violet-soft)] dark:bg-[rgba(124,85,255,.18)] text-[var(--i2-color-violet)]', 'title' => 'Business Hosting', 'subtitle' => 'cPanel Hosting', 'domain' => 'acme.com', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'], 'due' => 'May 20, 2025', 'dueNote' => '28 days left', 'price' => '₦70,000 / year', 'location' => 'New York, USA', 'flag' => '🇺🇸'],
            ['iconClass' => 'bg-[var(--i2-color-info-soft)] dark:bg-[rgba(60,124,255,.18)] text-[var(--i2-color-info)]', 'title' => 'Premium Hosting', 'subtitle' => 'cPanel Hosting', 'domain' => 'acme.net', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'], 'due' => 'Jun 10, 2025', 'dueNote' => '49 days left', 'price' => '₦90,000 / year', 'location' => 'London, UK', 'flag' => '🇬🇧'],
            ['iconClass' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]', 'title' => 'Starter Hosting', 'subtitle' => 'cPanel Hosting', 'domain' => 'acme.org', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'], 'due' => 'May 25, 2025', 'dueNote' => '33 days left', 'price' => '₦50,000 / year', 'location' => 'New York, USA', 'flag' => '🇺🇸'],
            ['iconClass' => 'bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]', 'title' => 'Cloud Hosting', 'subtitle' => 'Cloud Hosting', 'domain' => 'acme.io', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'], 'due' => 'May 15, 2025', 'dueNote' => '23 days left', 'price' => '₦120,000 / year', 'location' => 'Singapore', 'flag' => '🇸🇬'],
            ['iconClass' => 'bg-[var(--i2-color-violet-soft)] dark:bg-[rgba(124,85,255,.18)] text-[var(--i2-color-violet)]', 'title' => 'Reseller Hosting', 'subtitle' => 'WHM Reseller', 'domain' => 'acme.dev', 'status' => ['label' => 'Expiring Soon', 'class' => 'bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]'], 'due' => 'May 12, 2025', 'dueNote' => '20 days left', 'price' => '₦150,000 / year', 'location' => 'Amsterdam, NL', 'flag' => '🇳🇱'],
            ['iconClass' => 'bg-[var(--i2-color-surface-alt)] dark:bg-[#141417] text-[var(--i2-color-text-soft)] dark:text-white/55', 'title' => 'WordPress Hosting', 'subtitle' => 'WordPress Optimized', 'domain' => 'acme.co', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'], 'due' => 'Jun 12, 2025', 'dueNote' => '51 days left', 'price' => '₦65,000 / year', 'location' => 'Mumbai, India', 'flag' => '🇮🇳'],
        ];

        $usage = [
            ['label' => 'CPU Usage', 'value' => '28%', 'widthClass' => 'w-[35%]', 'bar' => 'i2-progress-bar bg-[var(--i2-color-violet)] text-[var(--i2-color-violet)]'],
            ['label' => 'RAM Usage', 'value' => '42%', 'widthClass' => 'w-[48%]', 'bar' => 'i2-progress-bar bg-[var(--i2-color-success)] text-[var(--i2-color-success)]'],
            ['label' => 'Disk Usage', 'value' => '35%', 'widthClass' => 'w-[38%]', 'bar' => 'i2-progress-bar bg-[var(--i2-color-info)] text-[var(--i2-color-info)]'],
        ];

        $backups = [
            ['name' => 'acme.com', 'detail' => 'Last backup: May 1, 2025 (Daily)'],
            ['name' => 'acme.net', 'detail' => 'Last backup: May 2, 2025 (Daily)'],
            ['name' => 'acme.org', 'detail' => 'Last backup: May 1, 2025 (Daily)'],
        ];
    @endphp

    <div class="font-[var(--i2-font-sans)] text-[var(--i2-color-text)] dark:text-white/88">
        <section aria-label="Hosting summary" class="mb-[18px] grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-5">
            @foreach ($stats as $stat)
                <x-client.stat-card
                    :label="$stat['label']"
                    :value="$stat['value']"
                    :note="$stat['note']"
                    :icon-class="$stat['iconClass']"
                >
                    <x-slot:icon>
                        @if ($stat['icon'] === 'server')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="4.5" y="5" width="15" height="6" rx="1.5"></rect><rect x="4.5" y="13" width="15" height="6" rx="1.5"></rect><path d="M8 8h.01"></path><path d="M8 16h.01"></path></svg>
                        @elseif ($stat['icon'] === 'active')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="m8.5 12 2.2 2.2 4.8-5"></path></svg>
                        @elseif ($stat['icon'] === 'expiring')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="M12 7.5V12h3.5"></path></svg>
                        @elseif ($stat['icon'] === 'suspended')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="M10 8.5v7"></path><path d="M14 8.5v7"></path></svg>
                        @else
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="m9 9 6 6"></path><path d="m15 9-6 6"></path></svg>
                        @endif
                    </x-slot:icon>
                </x-client.stat-card>
            @endforeach
        </section>

        <x-client.panel padding="none">
            <div class="flex flex-col items-start justify-between gap-3 px-[18px] pb-0 pt-[14px] xl:flex-row xl:items-center">
                <div class="flex w-full items-center gap-7 overflow-x-auto pb-1" aria-label="Hosting filters">
                    <button type="button" class="relative whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-accent)] after:absolute after:bottom-0 after:left-[-6px] after:right-[-6px] after:h-[3px] after:rounded-full after:bg-[var(--i2-color-accent)] after:content-['']">All Hosting</button>
                    <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)]">Active</button>
                    <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)]">Expiring Soon</button>
                    <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)]">Suspended</button>
                    <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)]">Cancelled</button>
                </div>

                <div class="flex w-full flex-col gap-3 xl:w-auto xl:flex-row xl:items-center">
                    <x-client.button class="px-[18px] text-[var(--i2-color-text-soft)]" size="lg">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4 6h16"></path><path d="M7 12h10"></path><path d="M10 18h4"></path></svg>
                        <span>Filter</span>
                    </x-client.button>
                    <x-client.button variant="primary" class="px-[18px]" size="lg">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg>
                        <span>Order New Hosting</span>
                    </x-client.button>
                </div>
            </div>

            <div class="px-[18px] pb-0 pt-2">
                <div class="hidden items-center gap-[18px] border-t border-[var(--i2-color-border-soft)] dark:border-white/8 px-[2px] py-3 text-[.94rem] text-[var(--i2-color-text-soft)] dark:text-white/55 xl:grid xl:grid-cols-[minmax(250px,2fr)_140px_120px_150px_140px_160px_126px]">
                    <span>Hosting Plan</span>
                    <span>Domain</span>
                    <span>Status</span>
                    <span>Next Due Date</span>
                    <span>Renewal Price</span>
                    <span>Server Location</span>
                    <span>Actions</span>
                </div>

                @foreach ($hostingRows as $row)
                    <article class="grid gap-3 border-t border-[var(--i2-color-border-soft)] dark:border-white/8 px-[2px] py-3 xl:grid-cols-[minmax(250px,2fr)_140px_120px_150px_140px_160px_126px] xl:items-center xl:gap-[18px]">
                        <div class="flex min-w-0 items-center gap-4">
                            <div class="{{ $row['iconClass'] }} grid size-8 shrink-0 place-items-center rounded-[10px]">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="4.5" y="5" width="15" height="6" rx="1.5"></rect><rect x="4.5" y="13" width="15" height="6" rx="1.5"></rect><path d="M8 8h.01"></path><path d="M8 16h.01"></path></svg>
                            </div>
                            <div class="min-w-0">
                                <h2 class="mb-1.5 text-[0.88rem] font-semibold tracking-[-0.02em]">{{ $row['title'] }}</h2>
                                <p class="text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">{{ $row['subtitle'] }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 text-[var(--i2-color-text-faint)] dark:text-white/35">
                            <span>{{ $row['domain'] }}</span>
                            <span class="text-[var(--i2-color-text-faint)] dark:text-white/35">
                                <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M14 5h5v5"></path><path d="M10 14 19 5"></path><path d="M19 13v5a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h5"></path></svg>
                            </span>
                        </div>

                        <div>
                            <span class="{{ $row['status']['class'] }} inline-flex min-h-[20px] items-center justify-center rounded-[6px] px-[10px] text-[0.78rem] font-semibold">{{ $row['status']['label'] }}</span>
                        </div>

                        <div>
                            <strong class="block text-[0.82rem] font-medium text-[var(--i2-color-text-soft)] dark:text-white/55">{{ $row['due'] }}</strong>
                            <span class="mt-2 block font-semibold text-[var(--i2-color-warning)]">{{ $row['dueNote'] }}</span>
                        </div>

                        <div class="text-[0.82rem] font-medium text-[var(--i2-color-text-soft)] dark:text-white/55">{{ $row['price'] }}</div>

                        <div class="flex items-center gap-2 text-[var(--i2-color-text-faint)] dark:text-white/35">
                            <span class="text-[1.25rem] leading-none">{{ $row['flag'] }}</span>
                            <span>{{ $row['location'] }}</span>
                        </div>

                        <div class="flex items-center gap-[10px]">
                            <x-client.button class="min-w-[84px]">Manage</x-client.button>
                            <x-client.icon-button aria-label="More actions for {{ $row['title'] }}">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 6h.01"></path><path d="M12 12h.01"></path><path d="M12 18h.01"></path></svg>
                            </x-client.icon-button>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="flex flex-col items-start justify-between gap-3 px-[18px] pb-[12px] pt-[14px] xl:flex-row xl:items-center">
                <p class="text-[var(--i2-color-text-faint)] dark:text-white/35">Showing 1 to 6 of 6 hosting services</p>
                <div class="flex items-center gap-[10px]">
                    <x-client.icon-button class="size-[34px]" aria-label="Previous page">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m14 7-5 5 5 5"></path></svg>
                    </x-client.icon-button>
                    <x-client.button variant="primary" class="min-w-[34px] px-3 py-2" size="xs">1</x-client.button>
                    <x-client.icon-button class="size-[34px]" aria-label="Next page">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m10 7 5 5-5 5"></path></svg>
                    </x-client.icon-button>
                </div>
            </div>
        </x-client.panel>

        <section class="mt-3 grid grid-cols-1 gap-4 2xl:grid-cols-[1fr_1.06fr_1fr]">
            <x-client.panel class="px-5 pb-[18px] pt-[18px]">
                <div class="mb-2 flex items-center justify-between gap-3">
                    <h2 class="text-[0.88rem] font-semibold tracking-[-0.02em]">Resource Usage</h2>
                    <x-client.button size="xs">View All</x-client.button>
                </div>
                <p class="mb-[14px] text-[var(--i2-color-text-faint)] dark:text-white/35">Average Usage</p>
                <div class="flex flex-col gap-[10px]">
                    @foreach ($usage as $item)
                        <div class="grid gap-2 md:grid-cols-[84px_minmax(0,1fr)_auto] md:items-center md:gap-3">
                            <span class="text-[.94rem] text-[var(--i2-color-text-soft)] dark:text-white/55">{{ $item['label'] }}</span>
                            <div class="h-[6px] overflow-hidden rounded-full bg-[var(--i2-color-surface-alt)] dark:bg-[#141417]">
                                <span class="{{ $item['bar'] }} {{ $item['widthClass'] }} block h-full rounded-full"></span>
                            </div>
                            <strong class="text-[.95rem] text-[var(--i2-color-text-soft)] dark:text-white/55">{{ $item['value'] }}</strong>
                        </div>
                    @endforeach
                </div>
            </x-client.panel>

            <x-client.panel class="px-5 pb-[18px] pt-[18px]">
                <div class="mb-2 flex items-center justify-between gap-3">
                    <h2 class="text-[0.88rem] font-semibold tracking-[-0.02em]">Backup Status</h2>
                    <span class="inline-flex min-h-7 items-center rounded-[8px] bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] px-[10px] text-[0.78rem] font-semibold text-[var(--i2-color-success)]">All Backups OK</span>
                </div>
                <div class="mb-4 mt-2 flex flex-col gap-3">
                    @foreach ($backups as $backup)
                        <div class="grid gap-2 md:grid-cols-[20px_100px_minmax(0,1fr)] md:items-center md:gap-[10px]">
                            <span class="text-[var(--i2-color-success)]">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="m8.5 12 2.2 2.2 4.8-5"></path></svg>
                            </span>
                            <strong class="text-[.96rem] text-[var(--i2-color-brand-ink)] dark:text-white/90">{{ $backup['name'] }}</strong>
                            <span class="text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">{{ $backup['detail'] }}</span>
                        </div>
                    @endforeach
                </div>
                <x-client.button size="xs">View All Backups</x-client.button>
            </x-client.panel>

            <x-client.panel class="px-5 pb-[18px] pt-[18px]">
                <div class="grid items-center gap-4 md:grid-cols-[1fr_132px]">
                    <div>
                        <h2 class="text-[0.88rem] font-semibold tracking-[-0.02em]">Need More Power?</h2>
                        <p class="my-2 text-[var(--i2-color-text-faint)] dark:text-white/35">Upgrade your hosting plan for better performance, more storage and advanced features.</p>
                        <button type="button" class="inline-flex min-h-[28px] items-center gap-3 rounded-[10px] border border-[var(--i2-color-violet-soft)] dark:border-[rgba(124,85,255,.18)] bg-[var(--i2-color-violet-soft)] dark:bg-[rgba(124,85,255,.18)] px-[14px] font-semibold text-[var(--i2-color-violet)]">Upgrade Now <span aria-hidden="true">→</span></button>
                    </div>
                    <div aria-hidden="true" class="relative mx-auto h-[120px] w-[132px]">
                        <div class="absolute bottom-0 right-0 h-24 w-[116px] text-[var(--i2-color-violet)]">
                            <svg viewBox="0 0 120 100" class="h-full w-full fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.6]"><path d="M31 73h50a17 17 0 0 0 3-34 25 25 0 0 0-47-5A19 19 0 0 0 31 73Z"></path><rect x="42" y="47" width="28" height="16" rx="4"></rect><path d="M51 55h10"></path><path d="M46 80h34"></path><path d="M54 63v17"></path><path d="M68 63v17"></path><circle cx="60" cy="36" r="4"></circle><path d="M60 40v7"></path></svg>
                        </div>
                        <div class="absolute right-[2px] top-2 size-[46px] rounded-full bg-[radial-gradient(circle_at_35%_35%,var(--i2-color-violet-soft)_0%,rgba(228,216,255,.92)_65%,rgba(228,216,255,.92)_100%)] opacity-90"></div>
                    </div>
                </div>
            </x-client.panel>
        </section>
    </div>
</x-filament-panels::page>
