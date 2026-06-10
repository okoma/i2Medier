<x-filament-widgets::widget>
    <x-filament::section heading="Your Affiliate Link">
        <div class="flex flex-col gap-4">
            <div class="flex gap-0">
                <span class="flex min-h-[42px] flex-1 items-center overflow-hidden text-ellipsis whitespace-nowrap rounded-l-xl border border-r-0 border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface-alt,theme(colors.gray.50))] dark:bg-[#141417] px-3 text-sm text-gray-500 dark:text-white/55 font-mono">
                    {{ $affiliateLink }}
                </span>
                <button
                    type="button"
                    x-data="{}"
                    x-on:click="navigator.clipboard.writeText('{{ $affiliateLink }}').then(() => $dispatch('notify', {message: 'Link copied!'}))"
                    class="inline-flex min-h-[42px] w-10 items-center justify-center rounded-r-xl border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-white dark:bg-[#1e1f26] text-gray-500 dark:text-white/55 hover:bg-gray-50 dark:hover:bg-white/5"
                    aria-label="Copy affiliate link"
                >
                    <x-filament::icon icon="heroicon-o-clipboard-document" class="h-4 w-4" />
                </button>
            </div>

            <div class="rounded-xl border border-[var(--i2-color-border-soft)] dark:border-white/8 px-4 py-3">
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Commission Rate</p>
                <p class="mt-1 text-2xl font-bold tracking-tight">{{ $commissionRate }}%</p>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Per successful referral conversion</p>
            </div>

            <div class="rounded-xl border border-[var(--i2-color-border-soft)] dark:border-white/8 px-4 py-3 text-sm text-gray-500 dark:text-gray-400">
                <p class="font-medium text-gray-700 dark:text-gray-300 mb-1">Referral Code</p>
                <code class="font-mono text-base tracking-widest">{{ $referralCode }}</code>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
