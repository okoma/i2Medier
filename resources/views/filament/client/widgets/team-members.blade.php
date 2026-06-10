<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">Team Members</x-slot>
        <x-slot name="headerEnd">
            <x-filament::button wire:click="$set('showInviteForm', true)" size="sm" icon="heroicon-o-user-plus">
                Add Member
            </x-filament::button>
        </x-slot>

        @if ($showInviteForm)
            <div class="mb-4 rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50 dark:bg-white/5 p-4">
                <h3 class="mb-3 text-sm font-semibold text-gray-700 dark:text-gray-300">Add New Member</h3>
                <div class="grid gap-3 sm:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-xs font-medium text-gray-600 dark:text-gray-400">Name</label>
                        <input
                            wire:model="inviteName"
                            type="text"
                            class="w-full rounded-lg border border-gray-300 dark:border-white/10 bg-white dark:bg-white/5 px-3 py-2 text-sm text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="Full name"
                        />
                        @error('inviteName') <p class="mt-1 text-xs text-danger-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-xs font-medium text-gray-600 dark:text-gray-400">Email</label>
                        <input
                            wire:model="inviteEmail"
                            type="email"
                            class="w-full rounded-lg border border-gray-300 dark:border-white/10 bg-white dark:bg-white/5 px-3 py-2 text-sm text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="email@example.com"
                        />
                        @error('inviteEmail') <p class="mt-1 text-xs text-danger-500">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="mt-3 flex gap-2">
                    <x-filament::button wire:click="invite" size="sm">Add Member</x-filament::button>
                    <x-filament::button wire:click="$set('showInviteForm', false)" size="sm" color="gray" outlined>Cancel</x-filament::button>
                </div>
                <p class="mt-2 text-xs text-gray-400 dark:text-gray-500">A temporary password will be shown after adding. Ask the member to change it on first login.</p>
            </div>
        @endif

        <div class="flex flex-col divide-y divide-gray-100 dark:divide-white/5">
            @forelse ($members as $member)
                <div class="flex items-center justify-between gap-4 py-3 first:pt-0 last:pb-0">
                    <div class="flex items-center gap-3">
                        <div class="grid size-9 shrink-0 place-items-center rounded-full bg-primary-100 dark:bg-primary-900/30 text-sm font-bold text-primary-700 dark:text-primary-400">
                            {{ strtoupper(substr($member['name'], 0, 1)) }}
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-sm font-medium text-gray-800 dark:text-gray-200">{{ $member['name'] }}</span>
                                <x-filament::badge :color="$member['role'] === 'Owner' ? 'warning' : 'info'" size="sm">
                                    {{ $member['role'] }}
                                </x-filament::badge>
                                @unless ($member['is_active'])
                                    <x-filament::badge color="gray" size="sm">Inactive</x-filament::badge>
                                @endunless
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                {{ $member['email'] }} · Last login: {{ $member['last_login'] }}
                            </p>
                        </div>
                    </div>
                    @if ($member['role'] !== 'Owner')
                        <x-filament::button
                            wire:click="remove({{ $member['id'] }})"
                            wire:confirm="Remove {{ $member['name'] }} from your team?"
                            color="danger"
                            size="sm"
                            outlined
                        >
                            Remove
                        </x-filament::button>
                    @endif
                </div>
            @empty
                <p class="py-3 text-sm text-gray-500 dark:text-gray-400">No other team members yet. Add members to give them access to your portal.</p>
            @endforelse
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
