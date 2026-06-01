<x-filament-panels::page>
    @php
        $invoiceRows = [
            ['INV-2024-0016', 'May 5, 2024', 'May 20, 2024', 'Website Redesign Project', '₦150,000', 'Paid', 'green'],
            ['INV-2024-0015', 'May 1, 2024', 'May 15, 2024', 'Premium Hosting (May 2024)', '₦90,000', 'Paid', 'green'],
            ['INV-2024-0014', 'Apr 28, 2024', 'May 12, 2024', 'SSL Certificate (acme.com)', '₦15,000', 'Paid', 'green'],
            ['INV-2024-0013', 'Apr 20, 2024', 'May 20, 2024', 'E-commerce Development', '₦300,000', 'Unpaid', 'amber'],
            ['INV-2024-0012', 'Apr 18, 2024', 'May 3, 2024', 'Domain Registration (acme.net)', '₦8,000', 'Paid', 'green'],
            ['INV-2024-0011', 'Apr 15, 2024', 'Apr 30, 2024', 'Website Maintenance (Apr 2024)', '₦30,000', 'Overdue', 'red'],
            ['INV-2024-0010', 'Apr 10, 2024', 'Apr 25, 2024', 'SEO Optimization', '₦80,000', 'Paid', 'green'],
        ];

        $transactions = [
            ['May 14, 2024', 'INV-2024-0015', 'Payment', '₦90,000', 'Success'],
            ['May 5, 2024', 'INV-2024-0014', 'Payment', '₦15,000', 'Success'],
            ['Apr 30, 2024', 'INV-2024-0012', 'Payment', '₦8,000', 'Success'],
            ['Apr 15, 2024', 'INV-2024-0011', 'Payment', '₦30,000', 'Success'],
            ['Apr 10, 2024', 'INV-2024-0010', 'Payment', '₦80,000', 'Success'],
        ];

        $outstandingRows = [
            ['INV-2024-0013', 'E-commerce Development', 'Due May 20, 2024', '₦300,000', 'Unpaid'],
            ['INV-2024-0016', 'Website Redesign Project', 'Due May 20, 2024', '₦150,000', 'Unpaid'],
        ];

        $paymentCards = [
            ['brand' => 'mastercard', 'title' => '•••• •••• •••• 4242', 'meta' => 'Expires 04/27', 'primary' => true],
            ['brand' => 'visa', 'title' => '•••• •••• •••• 8888', 'meta' => 'Expires 09/28', 'primary' => false],
        ];
    @endphp

    <div class="font-[var(--i2-font-sans)] text-[var(--i2-color-text)]">
        <main>
            <section aria-label="Billing summary" class="mb-4 grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-5">
                <x-client.stat-card label="Total Due" value="₦210,000" note="2 invoices" icon-class="bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)]" card-class="min-w-0">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><rect x="4.5" y="6" width="15" height="12" rx="2"></rect><path d="M4.5 10h15"></path><path d="M8 14h3"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
                <x-client.stat-card label="Paid This Month" value="₦120,000" note="3 invoices" icon-class="bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]" card-class="min-w-0">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><circle cx="12" cy="12" r="8.5"></circle><path d="m8.5 12 2.2 2.2 4.8-5"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
                <x-client.stat-card label="Total Paid" value="₦1,250,000" note="All time" icon-class="bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)]" card-class="min-w-0">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><rect x="4.5" y="6" width="15" height="12" rx="2"></rect><path d="M4.5 10h15"></path><path d="M8 14h3"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
                <x-client.stat-card label="Upcoming Due" value="₦210,000" note="Next 30 days" icon-class="bg-[var(--i2-color-accent-soft)] text-[var(--i2-color-accent)]" card-class="min-w-0">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><rect x="5" y="6.5" width="14" height="12" rx="2"></rect><path d="M8 4.5v4"></path><path d="M16 4.5v4"></path><path d="M5 10h14"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
                <x-client.stat-card label="Total Outstanding" value="₦210,000" note="2 invoices" icon-class="bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]" card-class="min-w-0">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"></path><path d="M14 3.5V8h4"></path><path d="M8 12h8"></path><path d="M8 16h6"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
            </section>

            <section class="grid gap-4 2xl:grid-cols-[minmax(0,1.7fr)_minmax(350px,.78fr)]">
                <div class="grid min-w-0 gap-4">
                    <x-client.panel class="px-[18px] pb-4 pt-[18px]">
                        <div class="mb-3 flex flex-col items-start justify-between gap-3 md:flex-row md:items-center">
                            <h2 class="m-0 text-base">Invoice History</h2>
                            <button type="button" class="min-h-[34px] rounded-[10px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-3.5 text-[var(--i2-color-brand-ink)]">View All Invoices</button>
                        </div>

                        <div class="mb-[14px] flex items-center gap-[30px] overflow-x-auto border-b border-[var(--i2-color-border-soft)]">
                            <button type="button" class="relative whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-accent)] after:absolute after:inset-x-0 after:bottom-[-1px] after:h-[3px] after:rounded-full after:bg-[var(--i2-color-accent)] after:content-['']">All</button>
                            <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)]">Paid</button>
                            <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)]">Unpaid</button>
                            <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)]">Overdue</button>
                            <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)]">Cancelled</button>
                        </div>

                        <div class="hidden items-center gap-4 px-0.5 py-2 text-[.92rem] text-[var(--i2-color-text-faint)] xl:grid xl:grid-cols-[115px_100px_100px_minmax(160px,1fr)_85px_90px_88px]">
                            <span>Invoice #</span>
                            <span>Issue Date</span>
                            <span>Due Date</span>
                            <span>Description</span>
                            <span>Amount</span>
                            <span>Status</span>
                            <span>Actions</span>
                        </div>

                        @foreach ($invoiceRows as [$invoice, $issueDate, $dueDate, $description, $amount, $status, $tone])
                            <div class="grid gap-3 border-t border-[var(--i2-color-border-soft)] px-0.5 py-3 text-[var(--i2-color-text-soft)] first:border-t-0 xl:grid-cols-[115px_100px_100px_minmax(160px,1fr)_85px_90px_88px] xl:items-center xl:gap-4">
                                <a href="#" class="font-medium text-[var(--i2-color-info)]">{{ $invoice }}</a>
                                <span>{{ $issueDate }}</span>
                                <span>{{ $dueDate }}</span>
                                <span>{{ $description }}</span>
                                <span>{{ $amount }}</span>
                                <span>
                                    <b class="@if($tone === 'green') bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)] @elseif($tone === 'amber') bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)] @else bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)] @endif inline-flex min-h-6 items-center justify-center rounded-[7px] px-2 text-[.74rem] font-semibold not-italic whitespace-nowrap">
                                        {{ $status }}
                                    </b>
                                </span>
                                <span class="flex items-center gap-2">
                                    <button type="button" class="min-h-[30px] rounded-[8px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[14px] text-[var(--i2-color-brand-ink)]">View</button>
                                    <button type="button" aria-label="Download invoice {{ $invoice }}" class="inline-flex h-[30px] w-9 items-center justify-center rounded-[8px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] text-[var(--i2-color-text-soft)]">
                                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M12 4v10"></path><path d="m8 11 4 4 4-4"></path><path d="M5 19h14"></path></svg>
                                    </button>
                                </span>
                            </div>
                        @endforeach

                        <p class="mb-0 mt-3 text-[.93rem] text-[var(--i2-color-text-faint)]">Showing 1 to 7 of 16 invoices</p>
                    </x-client.panel>

                    <section class="grid gap-4 xl:grid-cols-[1.15fr_.95fr]">
                        <x-client.panel class="px-[18px] pb-4 pt-[18px]">
                            <h2 class="m-0 text-base">Recent Transactions</h2>
                            <div class="mt-[14px]">
                                <div class="hidden items-center gap-2.5 text-[.92rem] text-[var(--i2-color-text-faint)] xl:grid xl:grid-cols-[78px_minmax(140px,1fr)_58px_70px_64px]">
                                    <span>Date</span>
                                    <span>Description</span>
                                    <span>Type</span>
                                    <span>Amount</span>
                                    <span>Status</span>
                                </div>

                                @foreach ($transactions as [$date, $invoice, $type, $amount, $status])
                                    <div class="grid gap-2.5 border-t border-[var(--i2-color-border-soft)] py-3 text-[.92rem] text-[var(--i2-color-text-soft)] first:border-t-0 xl:grid-cols-[78px_minmax(140px,1fr)_58px_70px_64px] xl:items-center">
                                        <span>{{ $date }}</span>
                                        <span>Payment for <a href="#" class="font-medium text-[var(--i2-color-info)]">{{ $invoice }}</a></span>
                                        <span>{{ $type }}</span>
                                        <span>{{ $amount }}</span>
                                        <span><b class="inline-flex min-h-6 items-center justify-center rounded-[7px] bg-[var(--i2-color-success-soft)] px-2 text-[.74rem] font-semibold not-italic text-[var(--i2-color-success)] whitespace-nowrap">{{ $status }}</b></span>
                                    </div>
                                @endforeach
                            </div>
                            <a href="#" class="mt-3 inline-block text-[var(--i2-color-info)]">View All Transactions</a>
                        </x-client.panel>

                        <x-client.panel class="px-[18px] pb-4 pt-[18px]">
                            <h2 class="m-0 text-base">Outstanding Invoices</h2>
                            <div class="mb-[18px] mt-[18px] flex flex-col gap-[18px]">
                                @foreach ($outstandingRows as [$invoice, $description, $dueDate, $amount, $status])
                                    <div class="flex items-start justify-between gap-4">
                                        <div>
                                            <a href="#" class="font-medium text-[var(--i2-color-info)]">{{ $invoice }}</a>
                                            <p class="mt-2 text-[var(--i2-color-text-faint)]">{{ $description }}</p>
                                            <small class="mt-2 block text-[var(--i2-color-text-faint)]">{{ $dueDate }}</small>
                                        </div>
                                        <div class="text-right">
                                            <strong class="mb-[10px] block text-[1.25rem] text-[var(--i2-color-brand-ink)]">{{ $amount }}</strong>
                                            <b class="inline-flex min-h-6 items-center justify-center rounded-[7px] bg-[var(--i2-color-warning-soft)] px-2 text-[.74rem] font-semibold not-italic text-[var(--i2-color-warning)] whitespace-nowrap">{{ $status }}</b>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="min-h-8 rounded-[10px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[14px] text-[var(--i2-color-brand-ink)]">View All</button>
                        </x-client.panel>
                    </section>
                </div>

                <div class="grid gap-4">
                    <x-client.panel class="px-[18px] pb-4 pt-[18px]">
                        <div class="mb-3 flex items-center justify-between gap-3">
                            <h2 class="m-0 text-base">Billing Overview</h2>
                            <button type="button" class="min-h-8 rounded-[10px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[14px] text-[var(--i2-color-brand-ink)]">This Month <span aria-hidden="true">˅</span></button>
                        </div>
                        <div class="mb-2">
                            <span class="mb-[10px] block text-[var(--i2-color-text-soft)]">Total Billed</span>
                            <strong class="mb-2 block text-[2rem] tracking-[-0.05em]">₦120,000</strong>
                            <div class="flex items-center gap-2.5">
                                <small class="text-[var(--i2-color-text-faint)]">vs last month</small>
                                <b class="inline-flex min-h-6 items-center rounded-full bg-[var(--i2-color-success-soft)] px-2 text-[.78rem] font-semibold not-italic text-[var(--i2-color-success)]">↑ 25%</b>
                            </div>
                        </div>
                        <div class="mt-[18px] grid grid-cols-[auto_1fr] gap-3.5">
                            <div class="flex flex-col justify-between py-2 pb-[22px] text-[.82rem] text-[var(--i2-color-text-faint)]">
                                <span>₦150K</span><span>₦100K</span><span>₦50K</span><span>₦0</span>
                            </div>
                            <div class="relative min-h-[220px]">
                                <div class="absolute inset-x-0 top-[18px] border-t border-dashed border-[rgba(129,143,164,.25)]"></div>
                                <div class="absolute inset-x-0 top-[72px] border-t border-dashed border-[rgba(129,143,164,.25)]"></div>
                                <div class="absolute inset-x-0 top-[126px] border-t border-dashed border-[rgba(129,143,164,.25)]"></div>
                                <div class="absolute inset-x-0 top-[180px] border-t border-dashed border-[rgba(129,143,164,.25)]"></div>
                                <svg viewBox="0 0 320 180" preserveAspectRatio="none" class="absolute inset-x-0 bottom-[18px] top-0 text-[#2e74ff]">
                                    <path d="M12 150 L45 112 L72 115 L95 98 L118 101 L145 92 L174 65 L198 80 L226 76 L255 48 L286 49 L308 30 L308 180 L12 180 Z" class="fill-[rgba(46,116,255,.12)] stroke-none"></path>
                                    <path d="M12 150 L45 112 L72 115 L95 98 L118 101 L145 92 L174 65 L198 80 L226 76 L255 48 L286 49 L308 30" class="fill-none stroke-current [stroke-width:2.5]"></path>
                                    <circle cx="308" cy="30" r="5" class="fill-current stroke-white [stroke-width:3]"></circle>
                                </svg>
                                <div class="absolute inset-x-0 bottom-0 flex justify-between text-[.82rem] text-[var(--i2-color-text-faint)]">
                                    <span>May 1</span><span>May 8</span><span>May 15</span><span>May 22</span><span>May 29</span>
                                </div>
                            </div>
                        </div>
                    </x-client.panel>

                    <div class="grid gap-4 xl:grid-cols-2">
                        <x-client.panel class="px-[18px] pb-4 pt-[18px]">
                            <h2 class="m-0 text-base">Payment Methods</h2>
                            <div class="mb-4 mt-4 flex flex-col gap-[14px]">
                                @foreach ($paymentCards as $card)
                                    <div class="flex items-center justify-between gap-3 rounded-xl border border-[var(--i2-color-border-soft)] px-2 py-2.5">
                                        <div class="flex items-center gap-3">
                                            @if ($card['brand'] === 'mastercard')
                                                <span class="relative inline-flex h-7 w-12 items-center justify-center rounded-[8px] bg-transparent">
                                                    <span class="absolute left-[7px] top-1 size-[18px] rounded-full bg-[#eb001b]"></span>
                                                    <span class="absolute left-[17px] top-1 size-[18px] rounded-full bg-[#f79e1b] opacity-[.88]"></span>
                                                </span>
                                            @else
                                                <span class="inline-flex h-7 w-12 items-center justify-center rounded-[8px] bg-[#f4f7ff] text-[.9rem] font-extrabold text-[#1a3faf]">VISA</span>
                                            @endif
                                            <div>
                                                <strong class="mb-1.5 block text-[#233041]">{{ $card['title'] }}</strong>
                                                <small class="text-[var(--i2-color-text-faint)]">{{ $card['meta'] }}</small>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            @if ($card['primary'])
                                                <b class="inline-flex min-h-6 items-center justify-center rounded-[7px] bg-[var(--i2-color-success-soft)] px-2 text-[.74rem] font-semibold not-italic text-[var(--i2-color-success)] whitespace-nowrap">Primary</b>
                                            @endif
                                            <button type="button" class="inline-flex h-[30px] w-9 items-center justify-center rounded-[8px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] text-[var(--i2-color-text-soft)]" aria-label="More actions for {{ $card['title'] }}">
                                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M12 6h.01"></path><path d="M12 12h.01"></path><path d="M12 18h.01"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="min-h-10 rounded-[10px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[14px] text-[var(--i2-color-info)]"><span aria-hidden="true">＋</span> Add Payment Method</button>
                        </x-client.panel>

                        <x-client.panel class="grid items-end gap-[14px] px-[18px] pb-4 pt-[18px] md:grid-cols-[1fr_130px]">
                            <div>
                                <h2 class="m-0 text-base">Need to make a payment?</h2>
                                <p class="mb-[14px] mt-3 leading-[1.55] text-[var(--i2-color-text-faint)]">You have 2 invoice(s) with total amount due of ₦210,000.</p>
                                <div class="mb-[14px] rounded-xl bg-[var(--i2-color-surface-alt)] px-[14px] py-3">
                                    <span class="mb-[10px] block text-[var(--i2-color-text-soft)]">Total Due</span>
                                    <strong class="block text-[2rem] tracking-[-0.05em]">₦210,000</strong>
                                </div>
                                <button type="button" class="min-h-[42px] rounded-[10px] bg-[var(--i2-color-brand-ink)] px-4 text-white">Make a Payment</button>
                            </div>
                            <div aria-hidden="true" class="relative h-[130px] w-[130px] max-md:justify-self-start">
                                <div class="absolute bottom-[18px] right-[10px] h-[54px] w-[74px] rounded-2xl bg-[#efe6ff]"></div>
                                <div class="absolute bottom-7 right-0 h-[60px] w-[86px] rounded-2xl bg-[linear-gradient(180deg,#9b6cff_0%,#7a49ff_100%)]"></div>
                                <div class="absolute bottom-[42px] right-10 h-[34px] w-14 rotate-[-8deg] rounded-2xl bg-white"></div>
                                <div class="absolute bottom-[54px] right-[22px] h-7 w-[50px] rotate-[10deg] rounded-2xl bg-[#e6daff]"></div>
                            </div>
                        </x-client.panel>
                    </div>
                </div>
            </section>
        </main>
    </div>
</x-filament-panels::page>
