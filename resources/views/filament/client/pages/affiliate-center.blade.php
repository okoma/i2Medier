<x-filament-panels::page>
    @php
        $stats = [
            [
                'label' => 'Total Referrals',
                'value' => '128',
                'note' => 'All time',
                'iconClass' => 'bg-[var(--i2-color-violet-soft)] dark:bg-[rgba(124,85,255,.18)] text-[var(--i2-color-violet)]',
                'icon' => 'users',
            ],
            [
                'label' => 'Total Earnings',
                'value' => '₦250,000',
                'note' => 'All time',
                'iconClass' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]',
                'icon' => 'cart',
            ],
            [
                'label' => 'Pending Payout',
                'value' => '₦45,000',
                'note' => 'Awaiting approval',
                'iconClass' => 'bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]',
                'icon' => 'calendar',
            ],
            [
                'label' => 'Paid Earnings',
                'value' => '₦205,000',
                'note' => 'All time',
                'iconClass' => 'bg-[var(--i2-color-info-soft)] dark:bg-[rgba(60,124,255,.18)] text-[var(--i2-color-info)]',
                'icon' => 'chart',
            ],
            [
                'label' => 'Conversion Rate',
                'value' => '18.75%',
                'note' => 'All time',
                'iconClass' => 'bg-[var(--i2-color-danger-soft)] dark:bg-[rgba(255,59,48,.18)] text-[var(--i2-color-danger)]',
                'icon' => 'close-circle',
            ],
        ];

        $topLinks = [
            ['url' => 'https://i2medier.com/aff.php?ref=JohnDoe', 'clicks' => '104 Clicks'],
            ['url' => 'https://i2medier.com/hosting?ref=JohnDoe', 'clicks' => '68 Clicks'],
            ['url' => 'https://i2medier.com/domains?ref=JohnDoe', 'clicks' => '41 Clicks'],
            ['url' => 'https://i2medier.com/services?ref=JohnDoe', 'clicks' => '32 Clicks'],
        ];

        $referrals = [
            ['id' => '#R128', 'referral' => 'example.com', 'product' => 'Premium Hosting', 'amount' => '₦90,000', 'commission' => '₦18,000', 'status' => ['label' => 'Paid', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'], 'date' => 'May 29, 2025'],
            ['id' => '#R127', 'referral' => 'acmeweb.com', 'product' => '.com Domain', 'amount' => '₦15,000', 'commission' => '₦3,000', 'status' => ['label' => 'Paid', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'], 'date' => 'May 28, 2025'],
            ['id' => '#R126', 'referral' => 'bestsite.ng', 'product' => 'SSL Certificate', 'amount' => '₦10,000', 'commission' => '₦2,000', 'status' => ['label' => 'Pending', 'class' => 'bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]'], 'date' => 'May 28, 2025'],
            ['id' => '#R125', 'referral' => 'mysite.io', 'product' => 'Business Email', 'amount' => '₦20,000', 'commission' => '₦4,000', 'status' => ['label' => 'Pending', 'class' => 'bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]'], 'date' => 'May 27, 2025'],
            ['id' => '#R124', 'referral' => 'webhub.net', 'product' => 'Cloud Hosting', 'amount' => '₦150,000', 'commission' => '₦30,000', 'status' => ['label' => 'Paid', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'], 'date' => 'May 26, 2025'],
        ];

        $infoCards = [
            [
                'title' => 'How It Works',
                'body' => 'Refer customers using your unique link and earn commission on their purchases.',
                'link' => 'Learn More',
                'iconClass' => 'bg-[var(--i2-color-violet-soft)] dark:bg-[rgba(124,85,255,.18)] text-[var(--i2-color-violet)]',
                'icon' => 'check-card',
            ],
            [
                'title' => 'Commission Rate',
                'body' => 'Earn up to 20% commission on hosting, domains, services and other products.',
                'link' => 'View Rates',
                'iconClass' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]',
                'icon' => 'plus-card',
            ],
            [
                'title' => 'Payout Cycle',
                'body' => 'Payouts are processed every Monday for balances above ₦10,000.',
                'link' => 'View Payout Policy',
                'iconClass' => 'bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]',
                'icon' => 'calendar-card',
            ],
            [
                'title' => 'Need Help?',
                'body' => 'Our affiliate team is here to help you succeed.',
                'link' => 'Contact Support',
                'href' => './ticket.html',
                'iconClass' => 'bg-[var(--i2-color-info-soft)] dark:bg-[rgba(60,124,255,.18)] text-[var(--i2-color-info)]',
                'icon' => 'chat-card',
            ],
        ];

        $quickTools = [
            ['title' => 'Banners & Creatives', 'body' => 'Download banners and promotional materials.', 'icon' => 'banner'],
            ['title' => 'Statistics & Reports', 'body' => 'Detailed analytics and reports.', 'icon' => 'report'],
            ['title' => 'Payout Methods', 'body' => 'Manage your payout methods.', 'icon' => 'payout'],
            ['title' => 'Affiliate Settings', 'body' => 'Update your affiliate preferences.', 'icon' => 'settings'],
        ];

        $commissionLegend = [
            ['label' => 'Hosting', 'value' => '₦120,000 (48%)', 'class' => 'bg-[var(--i2-color-info)]'],
            ['label' => 'Domains', 'value' => '₦60,000 (24%)', 'class' => 'bg-[var(--i2-color-success)]'],
            ['label' => 'Services', 'value' => '₦45,000 (18%)', 'class' => 'bg-[var(--i2-color-violet)]'],
            ['label' => 'Others', 'value' => '₦25,000 (10%)', 'class' => 'bg-[var(--i2-color-warning)]'],
        ];
    @endphp

    <div class="font-[var(--i2-font-sans)] text-[var(--i2-color-text)] dark:text-white/88">
        <section aria-label="Affiliate summary" class="mb-4 grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-5">
            @foreach ($stats as $stat)
                <x-client.stat-card
                    :label="$stat['label']"
                    :value="$stat['value']"
                    :note="$stat['note']"
                    :icon-class="$stat['iconClass']"
                    card-class="min-w-0"
                >
                    <x-slot:icon>
                        @if ($stat['icon'] === 'users')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="9" cy="9" r="2.5"></circle><circle cx="16" cy="8" r="2"></circle><path d="M5.5 17a3.5 3.5 0 0 1 7 0"></path><path d="M13.5 16.5a3 3 0 0 1 5 0"></path></svg>
                        @elseif ($stat['icon'] === 'cart')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M5 6.5h2l1.4 7h8.6l2-5.5H9"></path><circle cx="10" cy="18" r="1.5"></circle><circle cx="17" cy="18" r="1.5"></circle></svg>
                        @elseif ($stat['icon'] === 'calendar')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="5" y="6.5" width="14" height="12" rx="2"></rect><path d="M8 4.5v4"></path><path d="M16 4.5v4"></path><path d="M8 12h8"></path></svg>
                        @elseif ($stat['icon'] === 'chart')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M5 18.5h14"></path><path d="M7.5 15.5V9"></path><path d="M12 15.5V6.5"></path><path d="M16.5 15.5v-4"></path><path d="m6 13 3-3 3 2 5-6"></path></svg>
                        @else
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M8.5 12h7"></path><path d="m10 9 4 6"></path><path d="m14 9-4 6"></path></svg>
                        @endif
                    </x-slot:icon>
                </x-client.stat-card>
            @endforeach
        </section>

        <section class="grid grid-cols-1 gap-4 xl:grid-cols-[minmax(0,1.7fr)_310px]">
            <div class="grid min-w-0 gap-4">
                <section class="grid grid-cols-1 gap-4 2xl:grid-cols-[minmax(0,1.55fr)_minmax(280px,.85fr)]">
                    <x-client.panel class="px-[18px] pb-4 pt-[18px]">
                        <div class="mb-3 flex items-center justify-between gap-3">
                            <h2 class="text-[0.88rem] font-semibold tracking-[-0.02em]">Referral Overview</h2>
                            <button type="button" class="inline-flex min-h-8 items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-[14px] text-[.94rem] text-[var(--i2-color-brand-ink)] dark:text-white/90">
                                This Month <span aria-hidden="true" class="ml-1">˅</span>
                            </button>
                        </div>

                        <div class="mb-2 flex flex-wrap items-center gap-5 text-[.88rem] text-[var(--i2-color-text-soft)] dark:text-white/55">
                            <span class="inline-flex items-center gap-2"><i class="inline-block h-1 w-[14px] rounded-full bg-[var(--i2-color-info)]"></i>Clicks</span>
                            <span class="inline-flex items-center gap-2"><i class="inline-block h-1 w-[14px] rounded-full bg-[var(--i2-color-success)]"></i>Signups</span>
                            <span class="inline-flex items-center gap-2"><i class="inline-block h-1 w-[14px] rounded-full bg-[var(--i2-color-violet)]"></i>Conversions</span>
                        </div>

                        <div aria-hidden="true" class="mt-[14px] grid grid-cols-[auto_minmax(0,1fr)] gap-3">
                            <div class="flex flex-col justify-between py-1 pb-[22px] text-[.82rem] text-[var(--i2-color-text-faint)] dark:text-white/35">
                                <span>80</span>
                                <span>60</span>
                                <span>40</span>
                                <span>20</span>
                                <span>0</span>
                            </div>
                            <div class="relative min-h-[160px]">
                                <div class="absolute left-0 right-0 top-[22px] border-t border-[var(--i2-color-border-soft)] dark:border-white/8/60 dark:border-white/8"></div>
                                <div class="absolute left-0 right-0 top-[68px] border-t border-[var(--i2-color-border-soft)] dark:border-white/8/60 dark:border-white/8"></div>
                                <div class="absolute left-0 right-0 top-[114px] border-t border-[var(--i2-color-border-soft)] dark:border-white/8/60 dark:border-white/8"></div>
                                <div class="absolute left-0 right-0 top-[160px] border-t border-[var(--i2-color-border-soft)] dark:border-white/8/60 dark:border-white/8"></div>
                                <div class="absolute left-0 right-0 top-[206px] border-t border-[var(--i2-color-border-soft)] dark:border-white/8/60 dark:border-white/8"></div>
                                <svg viewBox="0 0 520 220" preserveAspectRatio="none" class="absolute inset-x-0 bottom-[18px] top-0 h-[calc(100%-18px)] w-full">
                                    <path d="M16 168 L42 160 L70 120 L96 132 L124 98 L150 78 L178 132 L204 124 L232 98 L258 86 L286 120 L314 136 L342 122 L370 104 L398 116 L426 96 L454 58 L482 68 L504 36" class="fill-none stroke-[var(--i2-color-info)] [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:2.5]"></path>
                                    <path d="M16 192 L42 188 L70 150 L96 160 L124 126 L150 122 L178 160 L204 156 L232 136 L258 148 L286 132 L314 156 L342 148 L370 136 L398 144 L426 132 L454 112 L482 128 L504 114" class="fill-none stroke-[var(--i2-color-success)] [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:2.5]"></path>
                                    <path d="M16 206 L42 204 L70 186 L96 190 L124 174 L150 168 L178 192 L204 188 L232 176 L258 186 L286 172 L314 188 L342 184 L370 176 L398 184 L426 174 L454 162 L482 172 L504 158" class="fill-none stroke-[var(--i2-color-violet)] [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:2.5]"></path>
                                    <circle cx="504" cy="36" r="4" class="fill-[var(--i2-color-info)] stroke-white [stroke-width:3]"></circle>
                                </svg>
                                <div class="absolute bottom-0 left-0 right-0 flex justify-between text-[.82rem] text-[var(--i2-color-text-faint)] dark:text-white/35">
                                    <span class="whitespace-nowrap">May 1</span>
                                    <span class="whitespace-nowrap">May 6</span>
                                    <span class="whitespace-nowrap">May 11</span>
                                    <span class="whitespace-nowrap">May 16</span>
                                    <span class="whitespace-nowrap">May 21</span>
                                    <span class="whitespace-nowrap">May 26</span>
                                    <span class="whitespace-nowrap">May 31</span>
                                </div>
                            </div>
                        </div>
                    </x-client.panel>

                    <x-client.panel class="px-[18px] pb-4 pt-[18px]">
                        <h2 class="text-[0.88rem] font-semibold tracking-[-0.02em]">Top Performing Links</h2>
                        <div class="my-7 flex flex-col gap-6">
                            @foreach ($topLinks as $link)
                                <div class="flex flex-col gap-2 md:flex-row md:items-baseline md:justify-between">
                                    <a href="#" class="break-all text-[var(--i2-color-info)]">{{ $link['url'] }}</a>
                                    <span class="shrink-0 whitespace-nowrap text-[.9rem] text-[var(--i2-color-brand-ink)] dark:text-white/90">{{ $link['clicks'] }}</span>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="inline-flex min-h-8 items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-[14px] text-[.94rem] text-[var(--i2-color-brand-ink)] dark:text-white/90">View All Links</button>
                    </x-client.panel>
                </section>

                <x-client.panel class="px-[18px] pb-4 pt-[18px]">
                    <div class="mb-3 flex items-center justify-between gap-3">
                        <h2 class="text-[0.88rem] font-semibold tracking-[-0.02em]">Recent Referrals</h2>
                    </div>

                    <div class="hidden border-b border-[var(--i2-color-border-soft)] dark:border-white/8 px-0 pb-3 text-[.92rem] text-[var(--i2-color-text-faint)] dark:text-white/35 xl:grid xl:grid-cols-[62px_1.15fr_1.25fr_100px_105px_95px_116px] xl:gap-[14px] xl:items-center">
                        <span>ID</span>
                        <span>Referral</span>
                        <span>Product / Service</span>
                        <span>Amount</span>
                        <span>Commission</span>
                        <span>Status</span>
                        <span>Date</span>
                    </div>

                    @foreach ($referrals as $referral)
                        <article class="grid gap-2 border-t border-[var(--i2-color-border-soft)] dark:border-white/8 px-0 py-[10px] text-[.93rem] text-[var(--i2-color-text-soft)] dark:text-white/55 first:border-t-0 xl:grid-cols-[62px_1.15fr_1.25fr_100px_105px_95px_116px] xl:gap-[14px] xl:items-center">
                            <span><span class="mr-2 text-[var(--i2-color-text-faint)] dark:text-white/35 xl:hidden">ID:</span>{{ $referral['id'] }}</span>
                            <span><span class="mr-2 text-[var(--i2-color-text-faint)] dark:text-white/35 xl:hidden">Referral:</span>{{ $referral['referral'] }}</span>
                            <span><span class="mr-2 text-[var(--i2-color-text-faint)] dark:text-white/35 xl:hidden">Product:</span>{{ $referral['product'] }}</span>
                            <span><span class="mr-2 text-[var(--i2-color-text-faint)] dark:text-white/35 xl:hidden">Amount:</span>{{ $referral['amount'] }}</span>
                            <span><span class="mr-2 text-[var(--i2-color-text-faint)] dark:text-white/35 xl:hidden">Commission:</span>{{ $referral['commission'] }}</span>
                            <span><span class="mr-2 text-[var(--i2-color-text-faint)] dark:text-white/35 xl:hidden">Status:</span><b class="{{ $referral['status']['class'] }} inline-flex min-h-[20px] items-center justify-center rounded-[5px] px-2 text-[0.72rem] font-semibold not-italic">{{ $referral['status']['label'] }}</b></span>
                            <span><span class="mr-2 text-[var(--i2-color-text-faint)] dark:text-white/35 xl:hidden">Date:</span>{{ $referral['date'] }}</span>
                        </article>
                    @endforeach

                    <a href="#" class="mt-2 inline-flex text-[var(--i2-color-info)]">View All Referrals</a>
                </x-client.panel>

                <section class="grid grid-cols-1 gap-4 md:grid-cols-2 2xl:grid-cols-4">
                    @foreach ($infoCards as $card)
                        <x-client.panel class="flex min-h-[150px] gap-[14px] p-3">
                            <div class="{{ $card['iconClass'] }} grid size-[46px] shrink-0 place-items-center rounded-[14px]">
                                @if ($card['icon'] === 'check-card')
                                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="5" y="5.5" width="14" height="13" rx="2"></rect><path d="m8 9 3 3 5-5"></path></svg>
                                @elseif ($card['icon'] === 'plus-card')
                                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="5" y="6" width="14" height="12" rx="3"></rect><path d="M9 12h6"></path><path d="M12 9v6"></path></svg>
                                @elseif ($card['icon'] === 'calendar-card')
                                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="5" y="6.5" width="14" height="12" rx="2"></rect><path d="M8 4.5v4"></path><path d="M16 4.5v4"></path><path d="M8 12h8"></path></svg>
                                @else
                                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M7 10.5a5 5 0 0 1 10 0v1.5a2 2 0 0 1-2 2h-1l-2.2 2.2a1 1 0 0 1-1.7-.7V14H9a2 2 0 0 1-2-2Z"></path><path d="M9.5 9.5h.01"></path><path d="M14.5 9.5h.01"></path></svg>
                                @endif
                            </div>
                            <div>
                                <h2 class="mb-3 text-[0.88rem] font-semibold tracking-[-0.02em]">{{ $card['title'] }}</h2>
                                <p class="mb-4 text-[.92rem] leading-[1.6] text-[var(--i2-color-text-faint)] dark:text-white/35">{{ $card['body'] }}</p>
                                <a href="{{ $card['href'] ?? '#' }}" class="inline-flex items-center gap-2 font-medium text-[var(--i2-color-info)]">{{ $card['link'] }} <span aria-hidden="true">→</span></a>
                            </div>
                        </x-client.panel>
                    @endforeach
                </section>
            </div>

            <div class="grid gap-4">
                <x-client.panel class="px-[18px] pb-4 pt-[18px]">
                    <h2 class="text-[0.88rem] font-semibold tracking-[-0.02em]">Your Affiliate Link</h2>
                    <div class="mt-3 mb-3 grid grid-cols-1 gap-[10px] sm:grid-cols-[minmax(0,1fr)_42px] sm:gap-0">
                        <span class="flex min-h-[42px] items-center overflow-hidden text-ellipsis whitespace-nowrap rounded-[12px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface-alt)] dark:bg-[#141417] px-[14px] text-[var(--i2-color-text-soft)] dark:text-white/55 sm:rounded-r-none sm:border-r-0">https://i2medier.com/aff.php?ref=JohnDoe</span>
                        <button type="button" class="inline-flex min-h-[42px] items-center justify-center rounded-[12px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] text-[var(--i2-color-text-soft)] dark:text-white/55 sm:rounded-l-none" aria-label="Copy affiliate link">
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="9" y="9" width="10" height="10" rx="2"></rect><rect x="5" y="5" width="10" height="10" rx="2"></rect></svg>
                        </button>
                    </div>
                    <div class="mt-[18px] flex flex-wrap items-center gap-[18px] text-[var(--i2-color-text-soft)] dark:text-white/55">
                        <span>Share</span>
                        <div class="flex items-center gap-[10px]">
                            <button type="button" class="inline-flex size-[34px] items-center justify-center rounded-full border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] text-[.92rem] font-bold text-[var(--i2-color-info)]" aria-label="Share on Facebook">f</button>
                            <button type="button" class="inline-flex size-[34px] items-center justify-center rounded-full border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] text-[.92rem] font-bold text-[var(--i2-color-info)]" aria-label="Share on Twitter">t</button>
                            <button type="button" class="inline-flex size-[34px] items-center justify-center rounded-full border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] text-[.92rem] font-bold text-[var(--i2-color-info)]" aria-label="Share on LinkedIn">in</button>
                            <button type="button" class="inline-flex size-[34px] items-center justify-center rounded-full border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] text-[var(--i2-color-info)]" aria-label="Share more">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="6" cy="12" r="1.5"></circle><circle cx="12" cy="7" r="1.5"></circle><circle cx="18" cy="12" r="1.5"></circle><path d="M7.3 11.2 10.7 8.1"></path><path d="m13.3 8.1 3.4 3.1"></path></svg>
                            </button>
                        </div>
                    </div>
                </x-client.panel>

                <x-client.panel class="px-[18px] pb-4 pt-[18px]">
                    <h2 class="text-[0.88rem] font-semibold tracking-[-0.02em]">Quick Tools</h2>
                    <div class="mt-3 grid gap-2.5">
                        @foreach ($quickTools as $tool)
                            <button type="button" class="flex w-full items-center justify-between gap-3 rounded-[14px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] p-3 text-left">
                                <span class="flex items-center gap-3">
                                    <span class="grid size-[46px] shrink-0 place-items-center rounded-[14px] bg-[var(--i2-color-surface-alt)] dark:bg-[#141417] text-[var(--i2-color-text-soft)] dark:text-white/55">
                                        @if ($tool['icon'] === 'banner')
                                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="5" y="5" width="14" height="14" rx="2"></rect><path d="M8 9h8"></path><path d="M8 13h6"></path></svg>
                                        @elseif ($tool['icon'] === 'report')
                                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M5 18.5h14"></path><path d="M7.5 15.5V9"></path><path d="M12 15.5V6.5"></path><path d="M16.5 15.5v-4"></path><path d="m6 13 3-3 3 2 5-6"></path></svg>
                                        @elseif ($tool['icon'] === 'payout')
                                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="5" y="6" width="14" height="12" rx="3"></rect><path d="M8 12h8"></path></svg>
                                        @else
                                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="3"></circle><path d="M12 4.5v2"></path><path d="M12 17.5v2"></path><path d="M4.5 12h2"></path><path d="M17.5 12h2"></path><path d="m6.8 6.8 1.4 1.4"></path><path d="m15.8 15.8 1.4 1.4"></path><path d="m17.2 6.8-1.4 1.4"></path><path d="m8.2 15.8-1.4 1.4"></path></svg>
                                        @endif
                                    </span>
                                    <span>
                                        <strong class="mb-1 block text-[.98rem] text-[var(--i2-color-brand-ink)] dark:text-white/90">{{ $tool['title'] }}</strong>
                                        <small class="text-[var(--i2-color-text-faint)] dark:text-white/35">{{ $tool['body'] }}</small>
                                    </span>
                                </span>
                                <span class="text-[1.25rem] text-[var(--i2-color-text-faint)] dark:text-white/35">›</span>
                            </button>
                        @endforeach
                    </div>
                </x-client.panel>

                <x-client.panel class="px-[18px] pb-4 pt-[18px]">
                    <h2 class="text-[0.88rem] font-semibold tracking-[-0.02em]">Commission Overview</h2>
                    <div class="mt-[14px] grid gap-[18px]">
                        <div class="relative mx-auto size-28 rounded-full bg-[conic-gradient(var(--i2-color-info)_0_48%,var(--i2-color-success)_48%_72%,var(--i2-color-violet)_72%_90%,var(--i2-color-warning)_90%_100%)]">
                            <div class="absolute inset-[16px] rounded-full bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] shadow-[inset_0_0_0_1px_var(--i2-color-border-soft)]"></div>
                            <div class="absolute inset-0 z-[1] grid place-content-center text-center">
                                <strong class="text-[1.7rem] tracking-[-0.05em]">₦250,000</strong>
                                <span class="mt-1.5 text-[.9rem] text-[var(--i2-color-text-faint)] dark:text-white/35">Total Earnings</span>
                            </div>
                        </div>
                        <div class="grid gap-3">
                            @foreach ($commissionLegend as $row)
                                <div class="grid grid-cols-[12px_minmax(0,1fr)_auto] items-center gap-[10px] text-[.93rem] text-[var(--i2-color-text-soft)] dark:text-white/55">
                                    <span class="{{ $row['class'] }} size-[10px] rounded-full"></span>
                                    <span>{{ $row['label'] }}</span>
                                    <strong class="text-[.92rem] text-[var(--i2-color-brand-ink)] dark:text-white/90">{{ $row['value'] }}</strong>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <a href="#" class="mt-4 inline-flex items-center gap-1 text-[var(--i2-color-info)]">View Full Report <span aria-hidden="true">→</span></a>
                </x-client.panel>
            </div>
        </section>
    </div>
</x-filament-panels::page>
