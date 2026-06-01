<x-filament-panels::page>
    @php
        $stats = [
            ['label' => 'Total Subscriptions', 'value' => '7', 'note' => 'All subscriptions', 'iconClass' => 'bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)]', 'icon' => 'stack'],
            ['label' => 'Active', 'value' => '5', 'note' => '71.4% of total', 'iconClass' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]', 'icon' => 'active'],
            ['label' => 'Expiring Soon', 'value' => '1', 'note' => '14.3% of total', 'iconClass' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]', 'icon' => 'expiring'],
            ['label' => 'Cancelled', 'value' => '1', 'note' => '14.3% of total', 'iconClass' => 'bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)]', 'icon' => 'cancelled'],
        ];

        $subscriptions = [
            ['iconClass' => 'bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)]', 'icon' => 'domain', 'title' => 'Domain Subscription', 'subId' => '#SUB-0001', 'service' => 'acme.com', 'serviceType' => 'Domain', 'plan' => 'Domain Registration', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'billingDate' => 'May 15, 2025', 'billingNote' => '23 days left', 'amount' => '₦8,000', 'cycle' => '1 Year'],
            ['iconClass' => 'bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]', 'icon' => 'hosting', 'title' => 'Premium Hosting', 'subId' => '#SUB-0002', 'service' => 'acme.net', 'serviceType' => 'Hosting', 'plan' => 'Premium Hosting', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'billingDate' => 'May 20, 2025', 'billingNote' => '28 days left', 'amount' => '₦90,000', 'cycle' => '1 Year'],
            ['iconClass' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]', 'icon' => 'ssl', 'title' => 'SSL Certificate', 'subId' => '#SUB-0003', 'service' => 'acme.com', 'serviceType' => 'SSL', 'plan' => 'RapidSSL', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'billingDate' => 'Jun 10, 2025', 'billingNote' => '49 days left', 'amount' => '₦15,000', 'cycle' => '1 Year'],
            ['iconClass' => 'bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)]', 'icon' => 'email', 'title' => 'Business Email', 'subId' => '#SUB-0004', 'service' => '5 Mailboxes', 'serviceType' => 'Email', 'plan' => 'Business Email', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'billingDate' => 'May 25, 2025', 'billingNote' => '33 days left', 'amount' => '₦24,000', 'cycle' => '1 Year'],
            ['iconClass' => 'bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)]', 'icon' => 'backup', 'title' => 'Daily Backup', 'subId' => '#SUB-0005', 'service' => 'acme.net', 'serviceType' => 'Backup', 'plan' => 'Daily Backup', 'status' => ['label' => 'Active', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'billingDate' => 'May 20, 2025', 'billingNote' => '28 days left', 'amount' => '₦10,000', 'cycle' => '1 Year'],
            ['iconClass' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]', 'icon' => 'maintenance', 'title' => 'Website Maintenance', 'subId' => '#SUB-0006', 'service' => 'acme.com', 'serviceType' => 'Maintenance', 'plan' => 'Standard Maintenance', 'status' => ['label' => 'Expiring Soon', 'class' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]'], 'billingDate' => 'Jun 12, 2025', 'billingNote' => '51 days left', 'amount' => '₦30,000', 'cycle' => '1 Year'],
            ['iconClass' => 'bg-[var(--i2-color-surface-alt)] text-[var(--i2-color-text-soft)]', 'icon' => 'hosting', 'title' => 'Old Hosting Plan', 'subId' => '#SUB-0007', 'service' => 'acme.org', 'serviceType' => 'Hosting', 'plan' => 'Basic Hosting', 'status' => ['label' => 'Cancelled', 'class' => 'bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)]'], 'billingDate' => 'Apr 10, 2025', 'billingNote' => '-', 'amount' => '₦50,000', 'cycle' => '1 Year'],
        ];

        $infoCards = [
            ['iconClass' => 'bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]', 'icon' => 'renewal', 'title' => 'Auto Renewal', 'body' => 'All active subscriptions are set to auto renew. You will be notified before renewal.', 'button' => 'Manage Settings'],
            ['iconClass' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]', 'icon' => 'payment', 'title' => 'Payment Method', 'body' => "Visa ending in 4242\nExpires 04/27", 'button' => 'Update Payment Method'],
            ['iconClass' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]', 'icon' => 'support', 'title' => 'Need Help?', 'body' => 'If you have any questions about your subscriptions, our support team is here to help.', 'button' => 'Contact Support'],
        ];
    @endphp

    <div class="font-[var(--i2-font-sans)] text-[var(--i2-color-text)]">
        <section aria-label="Subscription summary" class="mb-[18px] grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-4">
            @foreach ($stats as $stat)
                <x-client.stat-card
                    :label="$stat['label']"
                    :value="$stat['value']"
                    :note="$stat['note']"
                    :icon-class="$stat['iconClass']"
                >
                    <x-slot:icon>
                        @if ($stat['icon'] === 'stack')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 4 4.5 8 12 12 19.5 8 12 4Z"></path><path d="M4.5 12 12 16l7.5-4"></path><path d="M4.5 16 12 20l7.5-4"></path></svg>
                        @elseif ($stat['icon'] === 'active')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="m8.5 12 2.2 2.2 4.8-5"></path></svg>
                        @elseif ($stat['icon'] === 'expiring')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 8v4.5l2.5 1.5"></path></svg>
                        @else
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="m9 9 6 6"></path><path d="m15 9-6 6"></path></svg>
                        @endif
                    </x-slot:icon>
                </x-client.stat-card>
            @endforeach
        </section>

        <x-client.panel padding="none" class="pb-[14px]">
            <div class="flex flex-col items-start justify-between gap-[18px] px-[22px] pb-0 pt-[18px] xl:flex-row xl:items-center">
                <div class="flex w-full items-center gap-[34px] overflow-x-auto">
                    <button type="button" class="relative whitespace-nowrap px-[2px] pb-[18px] pt-2 text-[var(--i2-color-accent)] after:absolute after:bottom-0 after:left-0 after:right-0 after:h-[3px] after:rounded-full after:bg-[var(--i2-color-accent)] after:content-['']">All Subscriptions</button>
                    <button type="button" class="whitespace-nowrap px-[2px] pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Active</button>
                    <button type="button" class="whitespace-nowrap px-[2px] pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Expiring Soon</button>
                    <button type="button" class="whitespace-nowrap px-[2px] pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Cancelled</button>
                </div>
                <div class="flex w-full flex-col gap-3 xl:w-auto xl:flex-row xl:items-center">
                    <x-client.button>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4 6h16"></path><path d="M7 12h10"></path><path d="M10 18h4"></path></svg>
                        <span>Filter</span>
                    </x-client.button>
                    <x-client.button variant="primary">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg>
                        <span>New Subscription</span>
                    </x-client.button>
                </div>
            </div>

            <div class="px-[22px]">
                <div class="hidden items-center gap-3 border-t border-[var(--i2-color-border-soft)] py-[18px] text-[.92rem] text-[var(--i2-color-text-faint)] xl:grid xl:grid-cols-[250px_140px_168px_110px_150px_130px_118px]">
                    <span>Subscription</span>
                    <span>Service</span>
                    <span>Plan</span>
                    <span>Status</span>
                    <span>Next Billing Date</span>
                    <span>Amount / Cycle</span>
                    <span>Actions</span>
                </div>

                @foreach ($subscriptions as $subscription)
                    <div class="grid gap-3 border-t border-[var(--i2-color-border-soft)] py-[14px] xl:grid-cols-[250px_140px_168px_110px_150px_130px_118px] xl:items-center xl:gap-3">
                        <div class="flex items-center gap-[14px]">
                            <span class="{{ $subscription['iconClass'] }} grid size-11 shrink-0 place-items-center rounded-[14px]">
                                @if ($subscription['icon'] === 'domain')
                                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M3.5 12h17"></path><path d="M12 4a12 12 0 0 1 3 8 12 12 0 0 1-3 8 12 12 0 0 1-3-8 12 12 0 0 1 3-8Z"></path></svg>
                                @elseif ($subscription['icon'] === 'hosting')
                                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="4.5" y="6" width="15" height="5" rx="1.5"></rect><rect x="4.5" y="13" width="15" height="5" rx="1.5"></rect><path d="M8 8.5h.01"></path><path d="M8 15.5h.01"></path></svg>
                                @elseif ($subscription['icon'] === 'ssl')
                                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 3.5 6 6v5c0 4.2 2.5 7 6 9.5 3.5-2.5 6-5.3 6-9.5V6l-6-2.5Z"></path><path d="m9.2 11.7 1.9 1.9 3.7-4"></path></svg>
                                @elseif ($subscription['icon'] === 'email')
                                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4.5 7.5h15v9h-15Z"></path><path d="m5.5 8.5 6.5 5 6.5-5"></path></svg>
                                @elseif ($subscription['icon'] === 'backup')
                                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M7 14.5A5 5 0 0 1 8.5 5 4.5 4.5 0 0 1 17 6.8 4 4 0 0 1 16.5 14.5H7Z"></path><path d="M12 10v8"></path><path d="m9.5 15 2.5 3 2.5-3"></path></svg>
                                @else
                                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M3.5 12h6l2 2h9"></path><path d="M7 14.5V17"></path><path d="M7 7v2.5"></path><path d="M12 9 20.5 5v10L12 11"></path></svg>
                                @endif
                            </span>
                            <div class="text-[var(--i2-color-text-soft)]">
                                <strong class="block font-medium text-[var(--i2-color-brand-ink)]">{{ $subscription['title'] }}</strong>
                                <small class="mt-1.5 block text-[var(--i2-color-text-faint)]">{{ $subscription['subId'] }}</small>
                            </div>
                        </div>
                        <div class="text-[var(--i2-color-text-soft)]">
                            <strong class="block font-medium text-[var(--i2-color-brand-ink)]">{{ $subscription['service'] }}</strong>
                            <small class="mt-1.5 block text-[var(--i2-color-text-faint)]">{{ $subscription['serviceType'] }}</small>
                        </div>
                        <div class="text-[var(--i2-color-text-soft)]"><strong class="block font-medium text-[var(--i2-color-brand-ink)]">{{ $subscription['plan'] }}</strong></div>
                        <div><b class="{{ $subscription['status']['class'] }} inline-flex min-h-[26px] items-center justify-center rounded-[8px] px-[10px] text-[.75rem] font-semibold not-italic whitespace-nowrap">{{ $subscription['status']['label'] }}</b></div>
                        <div class="text-[var(--i2-color-text-soft)]">
                            <strong class="block font-medium text-[var(--i2-color-brand-ink)]">{{ $subscription['billingDate'] }}</strong>
                            <small class="mt-1.5 block {{ $subscription['billingNote'] !== '-' ? 'text-[var(--i2-color-warning)] font-medium' : 'text-[var(--i2-color-text-faint)]' }}">{{ $subscription['billingNote'] }}</small>
                        </div>
                        <div class="text-[var(--i2-color-text-soft)]">
                            <strong class="block font-medium text-[var(--i2-color-brand-ink)]">{{ $subscription['amount'] }}</strong>
                            <small class="mt-1.5 block text-[var(--i2-color-text-faint)]">{{ $subscription['cycle'] }}</small>
                        </div>
                        <div class="flex items-center gap-3">
                            <x-client.button>Manage</x-client.button>
                            <x-client.icon-button aria-label="More actions">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 6h.01"></path><path d="M12 12h.01"></path><path d="M12 18h.01"></path></svg>
                            </x-client.icon-button>
                        </div>
                    </div>
                @endforeach
            </div>

            <p class="mx-[22px] mt-3 text-[.93rem] text-[var(--i2-color-text-faint)]">Showing 1 to 7 of 7 subscriptions</p>
        </x-client.panel>

        <section class="mt-[14px] grid grid-cols-1 gap-[14px] 2xl:grid-cols-3">
            @foreach ($infoCards as $card)
                <x-client.panel class="flex min-h-[134px] items-start gap-[18px] px-5 py-[18px]">
                    <div class="{{ $card['iconClass'] }} grid size-11 shrink-0 place-items-center rounded-[14px]">
                        @if ($card['icon'] === 'renewal')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 4.5a7.5 7.5 0 1 0 7.5 7.5"></path><path d="M12 1.5v4"></path><path d="m20 4-2.5 2.5"></path><path d="M12 19.5v3"></path><path d="M4 20l2.5-2.5"></path></svg>
                        @elseif ($card['icon'] === 'payment')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="5" y="6.5" width="14" height="12" rx="2"></rect><path d="M8 4.5v4"></path><path d="M16 4.5v4"></path><path d="M5 10h14"></path></svg>
                        @else
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M7 10.5a5 5 0 0 1 10 0v1.5a2 2 0 0 1-2 2h-1l-2.2 2.2a1 1 0 0 1-1.7-.7V14H9a2 2 0 0 1-2-2Z"></path><path d="M9.5 9.5h.01"></path><path d="M14.5 9.5h.01"></path></svg>
                        @endif
                    </div>
                    <div>
                        <h2 class="text-base">{{ $card['title'] }}</h2>
                        <p class="my-3 whitespace-pre-line leading-[1.55] text-[var(--i2-color-text-faint)]">{{ $card['body'] }}</p>
                        <x-client.button>{{ $card['button'] }}</x-client.button>
                    </div>
                </x-client.panel>
            @endforeach
        </section>
    </div>
</x-filament-panels::page>
