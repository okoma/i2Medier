<x-filament-panels::page>
    @php
        $stats = [
            ['label' => 'Total Tickets', 'value' => '12', 'note' => 'All time', 'iconClass' => 'bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]', 'icon' => 'ticket'],
            ['label' => 'Open Tickets', 'value' => '5', 'note' => '41.7% of total', 'iconClass' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]', 'icon' => 'open'],
            ['label' => 'In Progress', 'value' => '3', 'note' => '25% of total', 'iconClass' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]', 'icon' => 'progress'],
            ['label' => 'Waiting Reply', 'value' => '2', 'note' => '16.7% of total', 'iconClass' => 'bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)]', 'icon' => 'waiting'],
            ['label' => 'Closed Tickets', 'value' => '2', 'note' => '16.7% of total', 'iconClass' => 'bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)]', 'icon' => 'closed'],
        ];

        $tickets = [
            ['id' => '#TK-2024-0012', 'subject' => 'Website is down', 'department' => 'Technical Support', 'departmentIcon' => 'technical', 'status' => ['label' => 'Open', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'priority' => ['label' => 'High', 'class' => 'bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)]'], 'updated' => 'May 15, 2025', 'time' => '10:30 AM'],
            ['id' => '#TK-2024-0011', 'subject' => 'cPanel login issue', 'department' => 'Technical Support', 'departmentIcon' => 'technical', 'status' => ['label' => 'In Progress', 'class' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]'], 'priority' => ['label' => 'Medium', 'class' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]'], 'updated' => 'May 15, 2025', 'time' => '09:10 AM'],
            ['id' => '#TK-2024-0010', 'subject' => 'Email not working', 'department' => 'Email Support', 'departmentIcon' => 'email', 'status' => ['label' => 'Waiting Reply', 'class' => 'bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)]'], 'priority' => ['label' => 'High', 'class' => 'bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)]'], 'updated' => 'May 14, 2025', 'time' => '11:20 AM'],
            ['id' => '#TK-2024-0009', 'subject' => 'SSL certificate renewal', 'department' => 'Billing Support', 'departmentIcon' => 'billing', 'status' => ['label' => 'Open', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'priority' => ['label' => 'Low', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'updated' => 'May 13, 2025', 'time' => '09:45 AM'],
            ['id' => '#TK-2024-0008', 'subject' => 'Need help with DNS setup', 'department' => 'Technical Support', 'departmentIcon' => 'technical', 'status' => ['label' => 'In Progress', 'class' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]'], 'priority' => ['label' => 'Medium', 'class' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]'], 'updated' => 'May 12, 2025', 'time' => '03:30 PM'],
            ['id' => '#TK-2024-0007', 'subject' => 'Invoice discrepancy', 'department' => 'Billing Support', 'departmentIcon' => 'billing', 'status' => ['label' => 'Waiting Reply', 'class' => 'bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)]'], 'priority' => ['label' => 'Low', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'updated' => 'May 12, 2025', 'time' => '10:10 AM'],
            ['id' => '#TK-2024-0006', 'subject' => 'Request for website backup', 'department' => 'Technical Support', 'departmentIcon' => 'technical', 'status' => ['label' => 'Closed', 'class' => 'bg-[var(--i2-color-surface-alt)] text-[var(--i2-color-text-soft)]'], 'priority' => ['label' => 'Low', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'updated' => 'May 10, 2025', 'time' => '02:40 PM'],
            ['id' => '#TK-2024-0005', 'subject' => 'Hosting upgrade query', 'department' => 'Sales Support', 'departmentIcon' => 'sales', 'status' => ['label' => 'Closed', 'class' => 'bg-[var(--i2-color-surface-alt)] text-[var(--i2-color-text-soft)]'], 'priority' => ['label' => 'Medium', 'class' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]'], 'updated' => 'May 9, 2025', 'time' => '11:05 AM'],
        ];

        $topics = [
            ['title' => 'Website Issues', 'body' => 'Facing issues with your website down or not loading.', 'iconClass' => 'bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]', 'icon' => 'website'],
            ['title' => 'Email Problems', 'body' => 'Having trouble sending or receiving emails.', 'iconClass' => 'bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]', 'icon' => 'email'],
            ['title' => 'Billing & Payments', 'body' => 'Questions about invoices, payments and refunds.', 'iconClass' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]', 'icon' => 'billing'],
            ['title' => 'Domains & DNS', 'body' => 'Need help with domain setup or DNS configuration.', 'iconClass' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]', 'icon' => 'domains'],
        ];
    @endphp

    <div class="font-[var(--i2-font-sans)] text-[var(--i2-color-text)]">
        <section aria-label="Ticket summary" class="mb-4 grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-5">
            @foreach ($stats as $stat)
                <x-client.stat-card
                    :label="$stat['label']"
                    :value="$stat['value']"
                    :note="$stat['note']"
                    :icon-class="$stat['iconClass']"
                >
                    <x-slot:icon>
                        @if ($stat['icon'] === 'ticket')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M8 19.5h8a4.5 4.5 0 1 0 0-9H8a4.5 4.5 0 1 0 0 9Z"></path><path d="M9.5 10.5V9a2.5 2.5 0 0 1 5 0v1.5"></path><path d="M10 14h4"></path></svg>
                        @elseif ($stat['icon'] === 'open')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="m8.5 12 2.2 2.2 4.8-5"></path></svg>
                        @elseif ($stat['icon'] === 'progress')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 8v4.5l2.5 1.5"></path></svg>
                        @elseif ($stat['icon'] === 'waiting')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 3.5 6 6v5c0 4.2 2.5 7 6 9.5 3.5-2.5 6-5.3 6-9.5V6l-6-2.5Z"></path><circle cx="12" cy="11" r="2"></circle></svg>
                        @else
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="m9 9 6 6"></path><path d="m15 9-6 6"></path></svg>
                        @endif
                    </x-slot:icon>
                </x-client.stat-card>
            @endforeach
        </section>

        <section class="grid grid-cols-1 gap-4 xl:grid-cols-[minmax(0,1.7fr)_280px]">
            <div class="grid min-w-0 gap-4">
                <x-client.panel padding="none">
                    <div class="flex flex-col items-start justify-between gap-[18px] px-[22px] pb-0 pt-[18px] xl:flex-row xl:items-center">
                        <div class="flex w-full items-center gap-[34px] overflow-x-auto" aria-label="Ticket filters">
                            <button type="button" class="relative whitespace-nowrap px-[2px] pb-[18px] pt-2 text-[var(--i2-color-accent)] after:absolute after:bottom-0 after:left-0 after:right-0 after:h-[3px] after:rounded-full after:bg-[var(--i2-color-accent)] after:content-['']">All Tickets</button>
                            <button type="button" class="whitespace-nowrap px-[2px] pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Open</button>
                            <button type="button" class="whitespace-nowrap px-[2px] pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">In Progress</button>
                            <button type="button" class="whitespace-nowrap px-[2px] pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Waiting Reply</button>
                            <button type="button" class="whitespace-nowrap px-[2px] pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Closed</button>
                        </div>
                        <div class="flex w-full flex-col gap-3 xl:w-auto xl:flex-row xl:items-center">
                            <x-client.button>
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4 6h16"></path><path d="M7 12h10"></path><path d="M10 18h4"></path></svg>
                                <span>Filter</span>
                            </x-client.button>
                            <x-client.button variant="primary">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg>
                                <span>New Ticket</span>
                            </x-client.button>
                        </div>
                    </div>

                    <div class="px-[22px]">
                        <div class="hidden items-center gap-3 border-t border-[var(--i2-color-border-soft)] py-[18px] text-[.92rem] text-[var(--i2-color-text-faint)] xl:grid xl:grid-cols-[108px_minmax(160px,1fr)_146px_102px_88px_144px_98px]">
                            <span>Ticket ID</span>
                            <span>Subject</span>
                            <span>Department</span>
                            <span>Status</span>
                            <span>Priority</span>
                            <span>Last Updated</span>
                            <span>Actions</span>
                        </div>

                        @foreach ($tickets as $ticket)
                            <div class="grid gap-3 border-t border-[var(--i2-color-border-soft)] py-[14px] text-[var(--i2-color-text-soft)] xl:grid-cols-[108px_minmax(160px,1fr)_146px_102px_88px_144px_98px] xl:items-center xl:gap-3">
                                <a href="#" class="font-medium text-[var(--i2-color-info)]">{{ $ticket['id'] }}</a>
                                <span>{{ $ticket['subject'] }}</span>
                                <span class="inline-flex items-center gap-2 text-[var(--i2-color-text-soft)]">
                                    @if ($ticket['departmentIcon'] === 'technical')
                                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="5" y="6" width="14" height="10" rx="2"></rect><path d="M9 18h6"></path></svg>
                                    @elseif ($ticket['departmentIcon'] === 'email')
                                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4.5 7.5h15v9h-15Z"></path><path d="m5.5 8.5 6.5 5 6.5-5"></path></svg>
                                    @elseif ($ticket['departmentIcon'] === 'billing')
                                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 3.5 6 6v5c0 4.2 2.5 7 6 9.5 3.5-2.5 6-5.3 6-9.5V6l-6-2.5Z"></path><path d="m9.2 11.7 1.9 1.9 3.7-4"></path></svg>
                                    @else
                                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 4 5 8l7 4 7-4-7-4Z"></path><path d="M5 16l7 4 7-4"></path><path d="M5 12l7 4 7-4"></path></svg>
                                    @endif
                                    {{ $ticket['department'] }}
                                </span>
                                <span><b class="{{ $ticket['status']['class'] }} inline-flex min-h-6 items-center justify-center rounded-[7px] px-2 text-[.74rem] font-semibold not-italic">{{ $ticket['status']['label'] }}</b></span>
                                <span><b class="{{ $ticket['priority']['class'] }} inline-flex min-h-6 items-center justify-center rounded-[7px] px-2 text-[.74rem] font-semibold not-italic">{{ $ticket['priority']['label'] }}</b></span>
                                <span>{{ $ticket['updated'] }}<br><small class="text-[var(--i2-color-text-faint)]">{{ $ticket['time'] }}</small></span>
                                <span class="flex items-center gap-3">
                                    <x-client.button>View</x-client.button>
                                    <x-client.icon-button aria-label="More actions">
                                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 6h.01"></path><path d="M12 12h.01"></path><path d="M12 18h.01"></path></svg>
                                    </x-client.icon-button>
                                </span>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex flex-col items-start justify-between gap-4 px-[22px] pb-[18px] pt-[14px] text-[.93rem] text-[var(--i2-color-text-faint)] xl:flex-row xl:items-center">
                        <span>Showing 1 to 8 of 12 tickets</span>
                        <div class="flex items-center gap-3">
                            <x-client.icon-button size="xs" class="rounded-[8px]" aria-label="Previous page">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m14 7-5 5 5 5"></path></svg>
                            </x-client.icon-button>
                            <x-client.button variant="primary" size="xs" class="size-8 px-0 rounded-[8px]">1</x-client.button>
                            <x-client.button size="xs" class="size-8 px-0 rounded-[8px] text-[var(--i2-color-text-soft)]">2</x-client.button>
                            <x-client.icon-button size="xs" class="rounded-[8px]" aria-label="Next page">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m10 7 5 5-5 5"></path></svg>
                            </x-client.icon-button>
                        </div>
                    </div>
                </x-client.panel>

                <x-client.panel class="px-5 pb-[18px] pt-[18px]">
                    <h2 class="text-base">Popular Help Topics</h2>
                    <div class="mt-[18px] grid grid-cols-1 gap-[14px] 2xl:grid-cols-4 md:grid-cols-2">
                        @foreach ($topics as $topic)
                            <article class="flex items-start gap-[14px] rounded-[16px] border border-[var(--i2-color-border-soft)] p-4">
                                <div class="{{ $topic['iconClass'] }} grid size-11 shrink-0 place-items-center rounded-[14px]">
                                    @if ($topic['icon'] === 'website')
                                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 8v5"></path><path d="m10 11 2 2 3-3"></path></svg>
                                    @elseif ($topic['icon'] === 'email')
                                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4.5 7.5h15v9h-15Z"></path><path d="m5.5 8.5 6.5 5 6.5-5"></path></svg>
                                    @elseif ($topic['icon'] === 'billing')
                                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M5 7.5A2.5 2.5 0 0 1 7.5 5h9A2.5 2.5 0 0 1 19 7.5v9a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 5 16.5Z"></path><path d="M8 10h8"></path><path d="M8 14h5"></path></svg>
                                    @else
                                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="M3.5 12h17"></path><path d="M12 3.5a13.3 13.3 0 0 1 3.5 8.5A13.3 13.3 0 0 1 12 20.5 13.3 13.3 0 0 1 8.5 12 13.3 13.3 0 0 1 12 3.5Z"></path></svg>
                                @endif
                            </div>
                            <div>
                                    <strong class="mb-[10px] block text-[var(--i2-color-brand-ink)]">{{ $topic['title'] }}</strong>
                                    <p class="mb-[14px] text-[.92rem] leading-[1.55] text-[var(--i2-color-text-faint)]">{{ $topic['body'] }}</p>
                                    <a href="#" class="font-medium text-[var(--i2-color-info)]">View Articles <span aria-hidden="true">→</span></a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </x-client.panel>
            </div>

            <aside class="grid gap-4">
                <x-client.panel class="px-5 pb-[18px] pt-[18px]">
                    <h2 class="text-base">Ticket Overview</h2>
                    <div class="my-[18px] grid place-items-center">
                        <div class="relative size-32 rounded-full bg-[conic-gradient(var(--i2-color-success)_0_41.7%,var(--i2-color-warning)_41.7%_66.7%,var(--i2-color-violet)_66.7%_83.4%,var(--i2-color-border-strong)_83.4%_100%)]">
                            <div class="absolute inset-[18px] rounded-full bg-[var(--i2-color-surface)]"></div>
                            <div class="absolute inset-0 z-[1] grid place-content-center text-center">
                                <strong class="text-[1.9rem] tracking-[-0.05em]">12</strong>
                                <span class="mt-1 text-[var(--i2-color-text-faint)]">Total</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-[10px]">
                        <div class="grid grid-cols-[10px_minmax(0,1fr)_auto] items-center gap-[10px] text-[var(--i2-color-text-soft)]"><span class="size-[10px] rounded-full bg-[var(--i2-color-success)]"></span><span>Open</span><strong>5 (41.7%)</strong></div>
                        <div class="grid grid-cols-[10px_minmax(0,1fr)_auto] items-center gap-[10px] text-[var(--i2-color-text-soft)]"><span class="size-[10px] rounded-full bg-[var(--i2-color-warning)]"></span><span>In Progress</span><strong>3 (25%)</strong></div>
                        <div class="grid grid-cols-[10px_minmax(0,1fr)_auto] items-center gap-[10px] text-[var(--i2-color-text-soft)]"><span class="size-[10px] rounded-full bg-[var(--i2-color-violet)]"></span><span>Waiting Reply</span><strong>2 (16.7%)</strong></div>
                        <div class="grid grid-cols-[10px_minmax(0,1fr)_auto] items-center gap-[10px] text-[var(--i2-color-text-soft)]"><span class="size-[10px] rounded-full bg-[var(--i2-color-border-strong)]"></span><span>Closed</span><strong>2 (16.7%)</strong></div>
                    </div>
                </x-client.panel>

                <x-client.panel class="px-5 pb-[18px] pt-[18px]">
                    <h2 class="text-base">Need Immediate Help?</h2>
                    <p class="mt-3 text-[var(--i2-color-text-faint)]">If you need urgent assistance, our support team is available 24/7.</p>
                    <x-client.button class="mt-4 text-[var(--i2-color-info)]">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M7 10.5a5 5 0 0 1 10 0v1.5a2 2 0 0 1-2 2h-1l-2.2 2.2a1 1 0 0 1-1.7-.7V14H9a2 2 0 0 1-2-2Z"></path><path d="M9.5 9.5h.01"></path><path d="M14.5 9.5h.01"></path></svg>
                        <span>Live Chat Now</span>
                    </x-client.button>
                </x-client.panel>

                <x-client.panel class="px-5 pb-[18px] pt-[18px]">
                    <h2 class="text-base">Support Hours</h2>
                    <p class="mt-3 text-[var(--i2-color-text-faint)]">Our support team is available round the clock to help you.</p>
                    <div class="mt-4 flex items-center gap-[10px] text-[1.6rem] font-extrabold text-[var(--i2-color-success)]">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 8v4.5l2.5 1.5"></path></svg>
                        <strong>24/7/365</strong>
                    </div>
                </x-client.panel>

                <x-client.panel class="px-5 pb-[18px] pt-[18px]">
                    <h2 class="text-base">Can't find what you need?</h2>
                    <p class="mt-3 text-[var(--i2-color-text-faint)]">Our support team is here to help you with any specific issue.</p>
                    <x-client.button class="mt-4" :full="true">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg>
                        <span>Create New Ticket</span>
                    </x-client.button>
                </x-client.panel>
            </aside>
        </section>
    </div>
</x-filament-panels::page>
