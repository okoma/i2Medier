<x-filament-panels::page>
    @php
        $stats = [
            ['label' => 'Total Domains', 'value' => '8', 'note' => 'All domains', 'iconClass' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]', 'icon' => 'globe'],
            ['label' => 'Active', 'value' => '6', 'note' => '75% of total', 'iconClass' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]', 'icon' => 'active'],
            ['label' => 'Expiring Soon', 'value' => '2', 'note' => '25% of total', 'iconClass' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]', 'icon' => 'expiring'],
            ['label' => 'Expired', 'value' => '0', 'note' => '0% of total', 'iconClass' => 'bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)]', 'icon' => 'expired'],
        ];

        $domains = [
            ['name' => 'acme.com', 'registered' => 'Registered on May 15, 2024', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'renewal' => 'May 15, 2025', 'renewalNote' => '23 days left', 'renewalClass' => 'text-[var(--i2-color-warning)]', 'autoRenew' => true, 'protected' => true],
            ['name' => 'acme.net', 'registered' => 'Registered on May 20, 2024', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'renewal' => 'May 20, 2025', 'renewalNote' => '28 days left', 'renewalClass' => 'text-[var(--i2-color-warning)]', 'autoRenew' => true, 'protected' => true],
            ['name' => 'acme.org', 'registered' => 'Registered on Jun 10, 2024', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'renewal' => 'Jun 10, 2025', 'renewalNote' => '49 days left', 'renewalClass' => 'text-[var(--i2-color-warning)]', 'autoRenew' => true, 'protected' => true],
            ['name' => 'acme.io', 'registered' => 'Registered on May 25, 2024', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'renewal' => 'May 25, 2025', 'renewalNote' => '33 days left', 'renewalClass' => 'text-[var(--i2-color-warning)]', 'autoRenew' => false, 'protected' => true],
            ['name' => 'acme.dev', 'registered' => 'Registered on May 20, 2024', 'status' => ['label' => 'Expiring Soon', 'class' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]'], 'renewal' => 'May 20, 2025', 'renewalNote' => '28 days left', 'renewalClass' => 'text-[var(--i2-color-warning)]', 'autoRenew' => true, 'protected' => false],
            ['name' => 'acme.co', 'registered' => 'Registered on Jun 12, 2024', 'status' => ['label' => 'Expiring Soon', 'class' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]'], 'renewal' => 'Jun 12, 2025', 'renewalNote' => '51 days left', 'renewalClass' => 'text-[var(--i2-color-warning)]', 'autoRenew' => false, 'protected' => true],
            ['name' => 'acmeapp.com', 'registered' => 'Registered on Jun 05, 2023', 'status' => ['label' => 'Expired', 'class' => 'bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)]'], 'renewal' => '-', 'renewalNote' => 'Expired on Jun 05, 2024', 'renewalClass' => 'text-[var(--i2-color-danger)]', 'autoRenew' => false, 'protected' => false],
            ['name' => 'oldproject.net', 'registered' => 'Registered on Apr 10, 2023', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'renewal' => 'Apr 10, 2025', 'renewalNote' => '-5 days left', 'renewalClass' => 'text-[var(--i2-color-danger)]', 'autoRenew' => false, 'protected' => false],
        ];
    @endphp

    <div class="font-[var(--i2-font-sans)] text-[var(--i2-color-text)]">
        <section aria-label="Domain summary" class="mb-5 grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-4">
            @foreach ($stats as $stat)
                <x-client.stat-card :label="$stat['label']" :value="$stat['value']" :note="$stat['note']" :icon-class="$stat['iconClass']">
                    <x-slot:icon>
                        @if ($stat['icon'] === 'globe')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="7"></circle><path d="M5 12h14"></path><path d="M12 5a10.7 10.7 0 0 1 3 7 10.7 10.7 0 0 1-3 7 10.7 10.7 0 0 1-3-7 10.7 10.7 0 0 1 3-7Z"></path></svg>
                        @elseif ($stat['icon'] === 'active')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="m8.5 12 2.2 2.2 4.8-5"></path></svg>
                        @elseif ($stat['icon'] === 'expiring')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="M12 7.5V12h3.5"></path></svg>
                        @else
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="m9 9 6 6"></path><path d="m15 9-6 6"></path></svg>
                        @endif
                    </x-slot:icon>
                </x-client.stat-card>
            @endforeach
        </section>

        <x-client.panel padding="none">
            <div class="flex flex-col items-start justify-between gap-4 px-[22px] pb-0 pt-[18px] xl:flex-row xl:items-center">
                <div class="flex w-full items-center gap-7 overflow-x-auto pb-1" aria-label="Domain filters">
                    <button type="button" class="relative whitespace-nowrap pb-[18px] pt-2 text-[var(--i2-color-accent)] after:absolute after:bottom-0 after:left-[-6px] after:right-[-6px] after:h-[3px] after:rounded-full after:bg-[var(--i2-color-accent)] after:content-['']">All Domains</button>
                    <button type="button" class="whitespace-nowrap pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Active</button>
                    <button type="button" class="whitespace-nowrap pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Expiring Soon</button>
                    <button type="button" class="whitespace-nowrap pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Expired</button>
                </div>

                <div class="flex w-full flex-col gap-3 xl:w-auto xl:flex-row xl:items-center">
                    <x-client.button class="px-[18px] text-[var(--i2-color-text-soft)]" size="lg">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4 6h16"></path><path d="M7 12h10"></path><path d="M10 18h4"></path></svg>
                        <span>Filter</span>
                    </x-client.button>
                    <x-client.button variant="primary" class="px-[18px]" size="lg">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg>
                        <span>Register New Domain</span>
                    </x-client.button>
                </div>
            </div>

            <div class="px-[22px] pb-0 pt-[10px]">
                <div class="hidden items-center gap-[18px] border-t border-[var(--i2-color-border-soft)] px-[2px] py-4 text-[.94rem] text-[var(--i2-color-text-soft)] xl:grid xl:grid-cols-[minmax(280px,2.1fr)_150px_180px_130px_180px_128px]">
                    <span>Domain Name</span>
                    <span>Status</span>
                    <span>Next Renewal</span>
                    <span>Auto Renew</span>
                    <span>Privacy Protection</span>
                    <span>Actions</span>
                </div>

                @foreach ($domains as $domain)
                    <article class="grid gap-3 border-t border-[var(--i2-color-border-soft)] px-[2px] py-4 xl:grid-cols-[minmax(280px,2.1fr)_150px_180px_130px_180px_128px] xl:items-center xl:gap-[18px]">
                        <div class="flex min-w-0 items-center gap-4">
                            <div class="grid size-9 shrink-0 place-items-center rounded-[10px] bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-text-soft)]">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="7"></circle><path d="M5 12h14"></path><path d="M12 5a10.7 10.7 0 0 1 3 7 10.7 10.7 0 0 1-3 7 10.7 10.7 0 0 1-3-7 10.7 10.7 0 0 1 3-7Z"></path></svg>
                            </div>
                            <div class="min-w-0">
                                <h2 class="mb-1.5 text-[.98rem] font-semibold tracking-[-0.02em]">{{ $domain['name'] }}</h2>
                                <p class="text-[var(--i2-color-text-faint)]">{{ $domain['registered'] }}</p>
                            </div>
                        </div>

                        <div>
                            <span class="{{ $domain['status']['class'] }} inline-flex min-h-7 items-center justify-center rounded-[8px] px-[10px] text-[.82rem] font-semibold">{{ $domain['status']['label'] }}</span>
                        </div>

                        <div>
                            <strong class="block text-[.95rem] font-medium text-[var(--i2-color-text-soft)]">{{ $domain['renewal'] }}</strong>
                            <span class="{{ $domain['renewalClass'] }} mt-2 block font-semibold">{{ $domain['renewalNote'] }}</span>
                        </div>

                        <div>
                            <span class="{{ $domain['autoRenew'] ? 'bg-[var(--i2-color-accent)]' : 'bg-[var(--i2-color-border-strong)]' }} relative inline-block h-[22px] w-[38px] rounded-full align-middle after:absolute after:top-[2px] after:size-[18px] after:rounded-full after:bg-white after:shadow-[0_2px_8px_rgba(20,23,30,.18)] after:content-[''] {{ $domain['autoRenew'] ? 'after:left-[18px]' : 'after:left-[2px]' }}" aria-hidden="true"></span>
                        </div>

                        <div class="flex items-center gap-2 {{ $domain['protected'] ? 'text-[var(--i2-color-success)]' : 'text-[var(--i2-color-text-faint)]' }}">
                            <span class="inline-flex">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true">
                                    <path d="M12 3.5 5 6.5V12c0 4.2 2.7 7.8 7 8.8 4.3-1 7-4.6 7-8.8V6.5Z"></path>
                                    @if ($domain['protected'])
                                        <path d="m9.5 12 1.8 1.8 3.7-4"></path>
                                    @endif
                                </svg>
                            </span>
                            <span class="{{ $domain['protected'] ? 'text-[var(--i2-color-text-soft)]' : '' }}">{{ $domain['protected'] ? 'Protected' : 'Not Protected' }}</span>
                        </div>

                        <div class="flex items-center gap-[10px]">
                            <x-client.button class="min-w-[84px]">Manage</x-client.button>
                            <x-client.icon-button aria-label="More actions for {{ $domain['name'] }}">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 6h.01"></path><path d="M12 12h.01"></path><path d="M12 18h.01"></path></svg>
                            </x-client.icon-button>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="flex flex-col items-start justify-between gap-4 px-[22px] pb-[14px] pt-[18px] xl:flex-row xl:items-center">
                <p class="text-[var(--i2-color-text-faint)]">Showing 1 to 8 of 8 domains</p>
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
    </div>
</x-filament-panels::page>
