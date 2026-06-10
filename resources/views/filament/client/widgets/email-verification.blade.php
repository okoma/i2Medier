<x-filament-widgets::widget>
    <x-filament::section heading="Email Verification">
        <div class="flex flex-col gap-4">
            <div class="flex items-center justify-between gap-3">
                <div>
                    <p class="text-sm font-medium text-gray-800 dark:text-gray-200">{{ $email }}</p>
                    @if ($isVerified)
                        <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">Verified {{ $verifiedAt }}</p>
                    @else
                        <p class="mt-0.5 text-xs text-warning-600 dark:text-warning-400">Not verified</p>
                    @endif
                </div>
                @if ($isVerified)
                    <x-filament::badge color="success">Verified</x-filament::badge>
                @else
                    <x-filament::badge color="warning">Unverified</x-filament::badge>
                @endif
            </div>

            @unless ($isVerified)
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Please verify your email address to unlock all features.
                </p>
                <x-filament::button wire:click="resend" color="warning" size="sm">
                    Resend Verification Email
                </x-filament::button>
            @endunless
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
