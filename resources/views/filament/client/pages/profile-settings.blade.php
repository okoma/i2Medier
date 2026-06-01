<x-filament-panels::page>
    <div class="font-[var(--i2-font-sans)] text-[var(--i2-color-text)]">
        <section class="mb-[14px] overflow-hidden rounded-[18px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)]">
            <div class="flex items-center gap-7 overflow-x-auto px-[14px]">
                <button type="button" class="relative whitespace-nowrap px-2 pb-[19px] pt-[18px] text-[var(--i2-color-accent)] after:absolute after:bottom-0 after:left-0 after:right-0 after:h-[3px] after:rounded-full after:bg-[var(--i2-color-accent)] after:content-['']">Profile Settings</button>
                <button type="button" class="whitespace-nowrap px-2 pb-[19px] pt-[18px] text-[var(--i2-color-text-soft)]">Security</button>
                <button type="button" class="whitespace-nowrap px-2 pb-[19px] pt-[18px] text-[var(--i2-color-text-soft)]">Notifications</button>
                <button type="button" class="whitespace-nowrap px-2 pb-[19px] pt-[18px] text-[var(--i2-color-text-soft)]">Connected Accounts</button>
                <button type="button" class="whitespace-nowrap px-2 pb-[19px] pt-[18px] text-[var(--i2-color-text-soft)]">API Access</button>
            </div>
        </section>

        <section class="grid gap-[14px] xl:grid-cols-[238px_minmax(0,1fr)_262px]">
            <aside class="grid content-start gap-[6px] rounded-[18px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] p-3">
                <button type="button" class="flex min-h-11 items-center gap-[14px] rounded-xl bg-[var(--i2-color-surface-alt)] px-[14px] text-left text-[var(--i2-color-brand-ink)] shadow-[inset_3px_0_0_var(--i2-color-accent)]">
                    <span class="text-[var(--i2-color-text-faint)]">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><circle cx="12" cy="8" r="3"></circle><path d="M6.5 19a5.5 5.5 0 0 1 11 0"></path></svg>
                    </span>
                    <span>Profile Information</span>
                </button>
                <button type="button" class="flex min-h-11 items-center gap-[14px] rounded-xl px-[14px] text-left text-[var(--i2-color-text-soft)]">
                    <span class="text-[var(--i2-color-text-faint)]">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M7 20h10"></path><path d="M8 20V6.5A1.5 1.5 0 0 1 9.5 5H13"></path><path d="M13 20V4.5A1.5 1.5 0 0 1 14.5 3H17a1.5 1.5 0 0 1 1.5 1.5V20"></path><path d="M10 9h.01"></path><path d="M10 12h.01"></path><path d="M15 7h.01"></path><path d="M15 10h.01"></path></svg>
                    </span>
                    <span>Company Information</span>
                </button>
                <button type="button" class="flex min-h-11 items-center gap-[14px] rounded-xl px-[14px] text-left text-[var(--i2-color-text-soft)]">
                    <span class="text-[var(--i2-color-text-faint)]">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M12 21s6-5.2 6-10a6 6 0 1 0-12 0c0 4.8 6 10 6 10Z"></path><circle cx="12" cy="11" r="2"></circle></svg>
                    </span>
                    <span>Address</span>
                </button>
                <button type="button" class="flex min-h-11 items-center gap-[14px] rounded-xl px-[14px] text-left text-[var(--i2-color-text-soft)]">
                    <span class="text-[var(--i2-color-text-faint)]">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M7.5 5.5h2L11 9l-2 1.5a14.4 14.4 0 0 0 4.5 4.5L15 13l3.5 1.5v2a1.5 1.5 0 0 1-1.5 1.5A13.5 13.5 0 0 1 5.5 7 1.5 1.5 0 0 1 7 5.5Z"></path></svg>
                    </span>
                    <span>Contact Details</span>
                </button>
                <button type="button" class="flex min-h-11 items-center gap-[14px] rounded-xl px-[14px] text-left text-[var(--i2-color-text-soft)]">
                    <span class="text-[var(--i2-color-text-faint)]">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><circle cx="12" cy="12" r="8.5"></circle><path d="M3.5 12h17"></path><path d="M12 3.5a13.3 13.3 0 0 1 3.5 8.5A13.3 13.3 0 0 1 12 20.5 13.3 13.3 0 0 1 8.5 12 13.3 13.3 0 0 1 12 3.5Z"></path></svg>
                    </span>
                    <span>Preferred Language</span>
                </button>
                <button type="button" class="flex min-h-11 items-center gap-[14px] rounded-xl px-[14px] text-left text-[var(--i2-color-text-soft)]">
                    <span class="text-[var(--i2-color-text-faint)]">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><circle cx="12" cy="12" r="8"></circle><path d="M12 7.5v4.5l3 1.5"></path></svg>
                    </span>
                    <span>Time Zone</span>
                </button>
                <button type="button" class="flex min-h-11 items-center gap-[14px] rounded-xl px-[14px] text-left text-[var(--i2-color-text-soft)]">
                    <span class="text-[var(--i2-color-text-faint)]">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><rect x="6" y="11" width="12" height="8" rx="2"></rect><path d="M9 11V7.5a3 3 0 0 1 6 0V11"></path></svg>
                    </span>
                    <span>Change Password</span>
                </button>
                <button type="button" class="flex min-h-11 items-center gap-[14px] rounded-xl px-[14px] text-left text-[var(--i2-color-text-soft)]">
                    <span class="text-[var(--i2-color-text-faint)]">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M7 7h10"></path><path d="M9 7V5.5h6V7"></path><path d="M9 10v6"></path><path d="M15 10v6"></path><path d="M6 7l1 12a1.5 1.5 0 0 0 1.5 1.4h7A1.5 1.5 0 0 0 17 19L18 7"></path></svg>
                    </span>
                    <span>Delete Account</span>
                </button>
            </aside>

            <div class="grid min-w-0 gap-[14px]">
                <section class="overflow-hidden rounded-[18px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)]">
                    <div class="flex flex-col items-start justify-between gap-[18px] border-b border-[var(--i2-color-border-soft)] px-[22px] py-[18px] md:flex-row md:items-start">
                        <div>
                            <h2 class="m-0 text-base">Profile Information</h2>
                            <p class="mt-[10px] leading-[1.55] text-[var(--i2-color-text-faint)]">Manage your personal information and account details.</p>
                        </div>
                        <button type="button" class="inline-flex min-h-[34px] items-center gap-2.5 rounded-[10px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[14px] text-[var(--i2-color-brand-ink)]">
                            <span>
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="m4 16 9-9 4 4-9 9H4Z"></path><path d="m12 8 4 4"></path><path d="M14 6l2-2 4 4-2 2"></path></svg>
                            </span>
                            <span>Edit Profile</span>
                        </button>
                    </div>

                    <div class="grid gap-[22px] px-[22px] pb-3 pt-[18px] md:flex md:items-center">
                        <div class="relative w-[94px] shrink-0">
                            <div class="grid size-[90px] place-items-center rounded-full bg-[var(--i2-color-accent-soft)] text-[2.3rem] font-bold text-[var(--i2-color-accent)]">JD</div>
                            <button type="button" aria-label="Change profile photo" class="absolute bottom-1 right-[-2px] inline-flex size-7 items-center justify-center rounded-full border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] text-[var(--i2-color-text-soft)]">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M4.5 8.5h3l1.5-2h6l1.5 2h3A1.5 1.5 0 0 1 21 10v8A1.5 1.5 0 0 1 19.5 19h-15A1.5 1.5 0 0 1 3 18v-8a1.5 1.5 0 0 1 1.5-1.5Z"></path><circle cx="12" cy="13" r="3"></circle></svg>
                            </button>
                        </div>
                        <div>
                            <div class="mb-2 flex flex-wrap items-center gap-2.5">
                                <strong class="text-[2rem] tracking-[-0.04em]">John Doe</strong>
                                <b class="inline-flex min-h-6 items-center justify-center rounded-[8px] bg-[var(--i2-color-success-soft)] px-2 text-[.74rem] font-bold not-italic text-[var(--i2-color-success)]">Verified</b>
                            </div>
                            <span class="mb-2 block text-[var(--i2-color-text-soft)]">john@example.com</span>
                            <small class="text-[var(--i2-color-text-faint)]">Customer ID: CUST-85421</small>
                        </div>
                    </div>

                    <div class="px-[22px] pb-[18px] pt-1">
                        @foreach ([
                            ['Full Name', 'John Doe'],
                            ['Email Address', 'john@example.com'],
                            ['Phone Number', '+234 801 234 5678'],
                            ['Alternate Phone', '+234 809 876 5432'],
                            ['Date of Birth', 'March 15, 1990'],
                            ['Gender', 'Male'],
                            ['Preferred Language', 'English'],
                            ['Time Zone', '(GMT+1) West Africa Time'],
                            ['Account Type', 'Business'],
                            ['Member Since', 'January 12, 2023'],
                        ] as [$label, $value])
                            <div class="grid min-h-[42px] gap-[14px] border-t border-[var(--i2-color-border-soft)] py-3 text-[var(--i2-color-text-soft)] md:grid-cols-[160px_minmax(0,1fr)] md:items-center">
                                <span class="text-[var(--i2-color-text-soft)]">{{ $label }}</span>
                                <strong class="text-[.96rem] font-medium text-[var(--i2-color-brand-ink)]">{{ $value }}</strong>
                            </div>
                        @endforeach
                        <div class="grid min-h-[42px] gap-[14px] border-t border-[var(--i2-color-border-soft)] py-3 text-[var(--i2-color-text-soft)] md:grid-cols-[160px_minmax(0,1fr)] md:items-center">
                            <span class="text-[var(--i2-color-text-soft)]">Status</span>
                            <strong class="text-[.96rem] font-medium text-[var(--i2-color-brand-ink)]"><b class="inline-flex min-h-6 items-center justify-center rounded-[7px] bg-[var(--i2-color-success-soft)] px-2 text-[.74rem] font-semibold not-italic text-[var(--i2-color-success)]">Active</b></strong>
                        </div>
                    </div>
                </section>

                <section class="grid gap-[18px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface-alt)] px-[18px] py-4 md:grid-cols-[44px_minmax(0,1fr)_auto] md:items-center">
                    <div class="grid size-11 place-items-center rounded-[14px] bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]">
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><rect x="6" y="10" width="12" height="9" rx="2"></rect><path d="M9 10V7.5a3 3 0 0 1 6 0V10"></path></svg>
                    </div>
                    <div>
                        <h2 class="mb-2 text-base">Keep Your Account Secure</h2>
                        <p class="text-[var(--i2-color-text-faint)]">We recommend keeping your password strong and enabling two-factor authentication for added security.</p>
                    </div>
                    <button type="button" class="inline-flex min-h-10 items-center gap-2.5 rounded-[10px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[14px] text-[var(--i2-color-brand-ink)]">Security Settings <span aria-hidden="true">›</span></button>
                </section>
            </div>

            <aside class="grid gap-[14px] max-xl:grid-cols-1 xl:content-start min-[1381px]:grid-cols-1 max-[1380px]:col-span-full max-[1380px]:grid-cols-3 max-[1180px]:grid-cols-1">
                <section class="border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-5 py-[18px]">
                    <h2 class="text-base">Profile Completion</h2>
                    <p class="mt-[10px] leading-[1.55] text-[var(--i2-color-text-faint)]">Complete your profile to get the most out of your account.</p>
                    <div class="my-4 flex items-center gap-[18px]">
                        <div class="relative size-[74px] rounded-full bg-[conic-gradient(var(--i2-color-success)_0_85%,var(--i2-color-neutral-100)_85%_100%)]">
                            <div class="absolute inset-[6px] rounded-full bg-[var(--i2-color-surface)]"></div>
                            <div class="absolute inset-0 z-[1] grid place-items-center font-bold text-[var(--i2-color-success)]">85%</div>
                        </div>
                        <span class="font-medium text-[var(--i2-color-text-soft)]">Completed</span>
                    </div>
                    <div class="grid gap-2.5">
                        @foreach ([
                            ['Personal Information', true],
                            ['Company Information', true],
                            ['Contact Details', true],
                            ['Email Verification', true],
                            ['Add Profile Photo', false],
                        ] as [$item, $done])
                            <div class="flex items-center gap-2.5 text-[var(--i2-color-text-soft)]">
                                <span class="{{ $done ? 'border-[var(--i2-color-success)] bg-[var(--i2-color-success-soft)] after:absolute after:left-[3px] after:top-px after:h-[7px] after:w-1 after:rotate-[38deg] after:border-b-2 after:border-r-2 after:border-[var(--i2-color-success)] after:content-[\'\']' : 'border-[var(--i2-color-border-soft)]' }} relative size-[14px] rounded-full border-2"></span>
                                <span>{{ $item }}</span>
                            </div>
                        @endforeach
                    </div>
                </section>

                <section class="border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-5 py-[18px]">
                    <h2 class="text-base">Account Information</h2>
                    <div class="mt-[14px] grid gap-3">
                        @foreach ([
                            ['Account ID', 'CUST-85421'],
                            ['User Role', 'Primary Admin'],
                            ['Two Factor Auth', '<b class="inline-flex min-h-6 items-center justify-center rounded-[7px] bg-[var(--i2-color-success-soft)] px-2 text-[.74rem] font-semibold not-italic text-[var(--i2-color-success)]">Enabled</b>'],
                            ['Login Alerts', '<b class="inline-flex min-h-6 items-center justify-center rounded-[7px] bg-[var(--i2-color-success-soft)] px-2 text-[.74rem] font-semibold not-italic text-[var(--i2-color-success)]">Enabled</b>'],
                            ['Last Login', 'May 29, 2025<br>10:30 AM'],
                            ['IP Address', '197.210.45.12'],
                        ] as [$label, $value])
                            <div class="grid gap-3 text-[var(--i2-color-text-soft)] md:grid-cols-[1fr_auto] md:items-start">
                                <span>{{ $label }}</span>
                                <strong class="text-left text-[.94rem] font-medium text-[var(--i2-color-brand-ink)] md:text-right">{!! $value !!}</strong>
                            </div>
                        @endforeach
                    </div>
                </section>

                <section class="border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-5 py-[18px]">
                    <h2 class="text-base">Need Help?</h2>
                    <p class="mt-[10px] leading-[1.55] text-[var(--i2-color-text-faint)]">If you need assistance updating your profile or have any questions.</p>
                    <button type="button" class="mt-4 inline-flex min-h-[38px] items-center gap-2.5 rounded-[10px] border border-[var(--i2-color-border-soft)] bg-[var(--i2-color-surface)] px-[14px] text-[var(--i2-color-brand-ink)]">
                        <span>
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]"><path d="M7 10.5a5 5 0 0 1 10 0v1.5a2 2 0 0 1-2 2h-1l-2.2 2.2a1 1 0 0 1-1.7-.7V14H9a2 2 0 0 1-2-2Z"></path><path d="M9.5 9.5h.01"></path><path d="M14.5 9.5h.01"></path></svg>
                        </span>
                        <span>Contact Support</span>
                    </button>
                </section>
            </aside>
        </section>
    </div>
</x-filament-panels::page>
