<div class="col-span-full">
    <x-filament::section>
        <x-slot name="heading">Two-Factor Authentication</x-slot>

        <div class="flex flex-col gap-3">
            <div class="flex items-start gap-3 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-white/5 p-4">
                <x-filament::icon icon="heroicon-o-shield-exclamation" class="mt-0.5 h-5 w-5 shrink-0 text-warning-500" />
                <div>
                    <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Not configured</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Two-factor authentication adds an extra layer of security to your account.
                        When enabled, you will be prompted for a verification code on each login.
                    </p>
                </div>
            </div>
            <p class="text-xs text-gray-400 dark:text-gray-500">
                2FA requires the <code class="font-mono">pragmarx/google2fa-laravel</code> package.
                Contact your administrator to enable this feature.
            </p>
        </div>
    </x-filament::section>
</div>
