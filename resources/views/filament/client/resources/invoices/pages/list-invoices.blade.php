<x-filament-panels::page>
    @php
        $stats = [
            ['label' => 'Total Invoices', 'value' => '16', 'note' => 'All invoices', 'iconClass' => 'bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]', 'icon' => 'document'],
            ['label' => 'Paid', 'value' => '11', 'note' => '68.75% of total', 'iconClass' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]', 'icon' => 'paid'],
            ['label' => 'Pending', 'value' => '3', 'note' => '18.75% of total', 'iconClass' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]', 'icon' => 'pending'],
            ['label' => 'Overdue', 'value' => '1', 'note' => '6.25% of total', 'iconClass' => 'bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)]', 'icon' => 'overdue'],
            ['label' => 'Total Outstanding', 'value' => '₦210,000', 'note' => 'Amount due', 'iconClass' => 'bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)]', 'icon' => 'card'],
        ];

        $invoices = [
            ['number' => 'INV-2024-0016', 'description' => 'Website Redesign Project', 'issue' => 'May 5, 2024', 'due' => 'May 20, 2024', 'amount' => '₦150,000', 'status' => ['label' => 'Paid', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]']],
            ['number' => 'INV-2024-0015', 'description' => 'Premium Hosting (May 2024)', 'issue' => 'May 1, 2024', 'due' => 'May 15, 2024', 'amount' => '₦90,000', 'status' => ['label' => 'Paid', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]']],
            ['number' => 'INV-2024-0014', 'description' => 'SSL Certificate (acme.com)', 'issue' => 'Apr 28, 2024', 'due' => 'May 12, 2024', 'amount' => '₦15,000', 'status' => ['label' => 'Paid', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]']],
            ['number' => 'INV-2024-0013', 'description' => 'E-commerce Development', 'issue' => 'Apr 20, 2024', 'due' => 'May 20, 2024', 'amount' => '₦300,000', 'status' => ['label' => 'Pending', 'class' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]']],
            ['number' => 'INV-2024-0012', 'description' => 'Domain Registration (acme.net)', 'issue' => 'Apr 18, 2024', 'due' => 'May 3, 2024', 'amount' => '₦8,000', 'status' => ['label' => 'Paid', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]']],
            ['number' => 'INV-2024-0011', 'description' => 'Website Maintenance (Apr 2024)', 'issue' => 'Apr 15, 2024', 'due' => 'Apr 30, 2024', 'amount' => '₦30,000', 'status' => ['label' => 'Overdue', 'class' => 'bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)]']],
            ['number' => 'INV-2024-0010', 'description' => 'SEO Optimization', 'issue' => 'Apr 10, 2024', 'due' => 'Apr 25, 2024', 'amount' => '₦80,000', 'status' => ['label' => 'Paid', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]']],
            ['number' => 'INV-2024-0009', 'description' => 'Business Email (5 Mailboxes)', 'issue' => 'Apr 5, 2024', 'due' => 'Apr 20, 2024', 'amount' => '₦24,000', 'status' => ['label' => 'Pending', 'class' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]']],
        ];
    @endphp

    <div class="font-[var(--i2-font-sans)] text-[var(--i2-color-text)]">
        <section aria-label="Invoice summary" class="mb-4 grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-5">
            @foreach ($stats as $stat)
                <x-client.stat-card :label="$stat['label']" :value="$stat['value']" :note="$stat['note']" :icon-class="$stat['iconClass']">
                    <x-slot:icon>
                        @if ($stat['icon'] === 'document')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="4.5" y="5.5" width="15" height="13" rx="2"></rect><path d="M8 9h8"></path><path d="M8 13h6"></path></svg>
                        @elseif ($stat['icon'] === 'paid')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="m8.5 12 2.2 2.2 4.8-5"></path></svg>
                        @elseif ($stat['icon'] === 'pending')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="M12 7.5V12h3.5"></path></svg>
                        @elseif ($stat['icon'] === 'overdue')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="m9 9 6 6"></path><path d="m15 9-6 6"></path></svg>
                        @else
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="4.5" y="6" width="15" height="12" rx="2"></rect><path d="M4.5 10h15"></path><path d="M8 14h3"></path></svg>
                        @endif
                    </x-slot:icon>
                </x-client.stat-card>
            @endforeach
        </section>

        <x-client.panel padding="none">
            <div class="flex flex-col items-start justify-between gap-4 px-[22px] pb-0 pt-[18px] xl:flex-row xl:items-center">
                <div class="flex w-full items-center gap-7 overflow-x-auto pb-1" aria-label="Invoice filters">
                    <button type="button" class="relative whitespace-nowrap pb-[18px] pt-2 text-[var(--i2-color-accent)] after:absolute after:bottom-0 after:left-[-6px] after:right-[-6px] after:h-[3px] after:rounded-full after:bg-[var(--i2-color-accent)] after:content-['']">All Invoices</button>
                    <button type="button" class="whitespace-nowrap pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Paid</button>
                    <button type="button" class="whitespace-nowrap pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Pending</button>
                    <button type="button" class="whitespace-nowrap pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Overdue</button>
                    <button type="button" class="whitespace-nowrap pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Cancelled</button>
                </div>

                <div class="flex w-full flex-col gap-3 xl:w-auto xl:flex-row xl:items-center">
                    <x-client.button class="px-[18px] text-[var(--i2-color-text-soft)]" size="lg">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4 6h16"></path><path d="M7 12h10"></path><path d="M10 18h4"></path></svg>
                        <span>Filter</span>
                    </x-client.button>
                    <x-client.button variant="primary" class="px-[18px]" size="lg">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg>
                        <span>New Invoice</span>
                    </x-client.button>
                </div>
            </div>

            <div class="px-[22px] pb-0 pt-2">
                <div class="hidden items-center gap-[18px] border-t border-[var(--i2-color-border-soft)] px-2 py-4 text-[.94rem] text-[var(--i2-color-text-soft)] xl:grid xl:grid-cols-[140px_minmax(230px,1.7fr)_140px_140px_120px_110px_160px]">
                    <span>Invoice #</span>
                    <span>Description</span>
                    <span>Issue Date</span>
                    <span>Due Date</span>
                    <span>Amount</span>
                    <span>Status</span>
                    <span>Actions</span>
                </div>

                @foreach ($invoices as $invoice)
                    <article class="grid gap-3 border-t border-[var(--i2-color-border-soft)] px-2 py-4 text-[var(--i2-color-text-soft)] xl:grid-cols-[140px_minmax(230px,1.7fr)_140px_140px_120px_110px_160px] xl:items-center xl:gap-[18px]">
                        <div class="font-medium text-[var(--i2-color-info)]">{{ $invoice['number'] }}</div>
                        <div class="text-[var(--i2-color-brand-ink)]">{{ $invoice['description'] }}</div>
                        <div>{{ $invoice['issue'] }}</div>
                        <div>{{ $invoice['due'] }}</div>
                        <div class="font-medium text-[var(--i2-color-brand-ink)]">{{ $invoice['amount'] }}</div>
                        <div>
                            <span class="{{ $invoice['status']['class'] }} inline-flex min-h-7 items-center justify-center rounded-[8px] px-[10px] text-[.82rem] font-semibold">{{ $invoice['status']['label'] }}</span>
                        </div>
                        <div class="flex items-center gap-[10px]">
                            <x-client.button class="min-w-[60px] px-4" size="lg">View</x-client.button>
                            <x-client.icon-button size="md" aria-label="Download invoice">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 4v10"></path><path d="m8 11 4 4 4-4"></path><path d="M5 19h14"></path></svg>
                            </x-client.icon-button>
                            <x-client.icon-button size="md" aria-label="More invoice actions">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 6h.01"></path><path d="M12 12h.01"></path><path d="M12 18h.01"></path></svg>
                            </x-client.icon-button>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="flex flex-col items-start justify-between gap-4 px-[22px] pb-4 pt-[18px] xl:flex-row xl:items-center">
                <p class="text-[var(--i2-color-text-faint)]">Showing 1 to 8 of 16 invoices</p>
                <div class="flex items-center gap-[10px]">
                    <x-client.icon-button class="size-[34px]" aria-label="Previous page">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m14 7-5 5 5 5"></path></svg>
                    </x-client.icon-button>
                    <x-client.button variant="primary" class="min-w-[34px] px-3 py-2" size="xs">1</x-client.button>
                    <x-client.button class="min-w-[34px] px-3 py-2 text-[var(--i2-color-text-soft)]" size="xs">2</x-client.button>
                    <x-client.icon-button class="size-[34px]" aria-label="Next page">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m10 7 5 5-5 5"></path></svg>
                    </x-client.icon-button>
                </div>
            </div>
        </x-client.panel>

        <section class="mt-4 grid grid-cols-1 gap-4 2xl:grid-cols-[.86fr_1.55fr_1.15fr]">
            <article class="overflow-hidden rounded-[22px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[18px] pb-4 pt-[18px]">
                <h2 class="text-base">Outstanding Balance</h2>
                <span class="mt-[10px] block text-[var(--i2-color-text-faint)]">Total Due</span>
                <div class="my-[10px] flex items-center justify-between gap-4">
                    <strong class="text-[1.8rem] tracking-[-0.05em] text-[var(--i2-color-danger)]">₦210,000</strong>
                    <div class="grid size-[54px] place-items-center rounded-[12px] bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)]">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="4.5" y="6" width="15" height="12" rx="2"></rect><path d="M4.5 10h15"></path><path d="M8 14h3"></path></svg>
                    </div>
                </div>
                <x-client.button variant="primary" class="px-[18px] font-semibold" size="md">Make a Payment</x-client.button>
            </article>

            <article class="overflow-hidden rounded-[22px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[18px] pb-4 pt-[18px]">
                <h2 class="text-base">Recent Payment</h2>
                <div class="my-4 grid gap-3 md:grid-cols-[22px_minmax(0,1fr)_auto] md:items-center md:gap-[14px]">
                    <span class="text-[var(--i2-color-success)]">
                        <svg viewBox="0 0 24 24" class="size-[22px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="m8.5 12 2.2 2.2 4.8-5"></path></svg>
                    </span>
                    <div>
                        <a href="#" class="mb-2 inline-block font-medium text-[var(--i2-color-info)]">INV-2024-0015</a>
                        <p class="text-[var(--i2-color-text-faint)]">Premium Hosting (May 2024)</p>
                    </div>
                    <div class="text-left md:text-right">
                        <strong class="mb-2 block text-[1.5rem] tracking-[-0.04em] text-[var(--i2-color-success)]">₦90,000</strong>
                        <span class="text-[var(--i2-color-text-faint)]">Paid on May 2, 2024</span>
                    </div>
                </div>
                <x-client.button class="px-4" size="md">View Payment History</x-client.button>
            </article>

            <article class="overflow-hidden rounded-[22px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[18px] pb-4 pt-[18px]">
                <div class="grid items-center gap-3 md:grid-cols-[1fr_96px]">
                    <div>
                        <h2 class="text-base">Need an Invoice for Something?</h2>
                        <p class="my-3 leading-[1.55] text-[var(--i2-color-text-faint)]">If you need an invoice for a new service or custom amount, you can request one.</p>
                        <button type="button" class="inline-flex min-h-[38px] items-center justify-center rounded-[10px] border border-[var(--i2-color-info-soft)] bg-[var(--i2-color-info-soft)] px-4 font-semibold text-[var(--i2-color-info)]">Request Invoice</button>
                    </div>
                    <div class="h-[116px] w-24 justify-self-start text-[var(--i2-color-violet)] md:justify-self-end" aria-hidden="true">
                        <svg viewBox="0 0 96 116" class="h-full w-full fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><rect x="20" y="8" width="56" height="88" rx="8"></rect><circle cx="60" cy="34" r="11"></circle><path d="M60 29v10"></path><path d="M55 34h10"></path><path d="M30 56h36"></path><path d="M30 69h36"></path><path d="M30 82h20"></path></svg>
                    </div>
                </div>
            </article>
        </section>
    </div>
</x-filament-panels::page>
