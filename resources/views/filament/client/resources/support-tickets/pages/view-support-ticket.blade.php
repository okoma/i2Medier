<x-filament-panels::page>
    @php($record = $this->getRecord())
    @php($status = $this->getStatusMeta())
    @php($priority = $this->getPriorityMeta())

    <div class="space-y-6">
        <x-filament::section>
            <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                <div class="min-w-0 flex-1">
                    <div class="flex flex-wrap items-center gap-3">
                        <h1 class="font-mono text-xl font-semibold text-gray-950 dark:text-white">{{ $record->ticket_number }}</h1>
                        <span @class([
                            'inline-flex items-center rounded-full px-3 py-1 text-xs font-medium',
                            'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $status['color'] === 'amber',
                            'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $status['color'] === 'sky',
                            'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $status['color'] === 'emerald',
                            'bg-rose-100 text-rose-700 dark:bg-rose-500/15 dark:text-rose-300' => $status['color'] === 'rose',
                            'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $status['color'] === 'slate',
                        ])>
                            {{ $status['label'] }}
                        </span>
                        <span @class([
                            'inline-flex items-center rounded-full px-3 py-1 text-xs font-medium',
                            'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $priority['color'] === 'amber',
                            'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $priority['color'] === 'sky',
                            'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $priority['color'] === 'emerald',
                            'bg-rose-100 text-rose-700 dark:bg-rose-500/15 dark:text-rose-300' => $priority['color'] === 'rose',
                            'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $priority['color'] === 'slate',
                        ])>
                            {{ $priority['label'] }}
                        </span>
                    </div>

                    <h2 class="mt-3 text-lg font-semibold text-gray-950 dark:text-white">{{ $record->subject }}</h2>

                    <div class="mt-3 flex flex-wrap gap-2">
                        @if ($record->category)
                            <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                                Category: {{ ucfirst($record->category) }}
                            </span>
                        @endif
                        <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                            Opened {{ $record->created_at?->format('M d, Y') }}
                        </span>
                    </div>
                </div>

                <div class="grid gap-3 sm:grid-cols-2 lg:min-w-[24rem]">
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Requester</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $record->submitter?->name ?? $record->requester_name ?? 'Client team member' }}</p>
                        <p class="mt-1 text-xs leading-5 text-gray-600 dark:text-gray-300">{{ $record->submitter?->email ?? $record->requester_email ?? 'No email available' }}</p>
                    </div>
                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Last Update</p>
                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $record->updated_at?->diffForHumans() }}</p>
                        <p class="mt-1 text-xs leading-5 text-gray-600 dark:text-gray-300">
                            @if ($record->resolved_at)
                                Resolved {{ $record->resolved_at->format('M d, Y') }}
                            @else
                                Still active
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </x-filament::section>

        <div class="grid gap-6 xl:grid-cols-[1.2fr_.8fr]">
            <x-filament::section
                heading="Conversation"
                description="The original request and all client-visible replies on this ticket."
            >
                <div class="space-y-4">
                    <article class="rounded-xl bg-gray-50 px-4 py-4 dark:bg-white/5">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $record->submitter?->name ?? 'You' }}</p>
                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Original request</p>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $record->created_at?->format('M d, Y g:i A') }}</p>
                        </div>
                        <p class="mt-4 whitespace-pre-wrap text-sm leading-6 text-gray-700 dark:text-gray-300">{{ $record->description }}</p>
                    </article>

                    @forelse ($record->replies as $reply)
                        <article class="rounded-xl bg-gray-50 px-4 py-4 dark:bg-white/5">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $reply->author?->name ?? 'Support team' }}</p>
                                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        @if ($reply->author?->id === auth()->id())
                                            Your reply
                                        @else
                                            Team reply
                                        @endif
                                    </p>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $reply->created_at?->format('M d, Y g:i A') }}</p>
                            </div>
                            <p class="mt-4 whitespace-pre-wrap text-sm leading-6 text-gray-700 dark:text-gray-300">{{ $reply->body }}</p>
                        </article>
                    @empty
                        <div class="rounded-xl border border-dashed border-gray-200 px-4 py-8 text-center text-sm text-gray-600 dark:border-white/10 dark:text-gray-300">
                            No replies have been added yet. The support team will respond here as the ticket progresses.
                        </div>
                    @endforelse
                </div>
            </x-filament::section>

            <div class="space-y-6">
                <x-filament::section
                    heading="Ticket Details"
                    description="Key support information for this request."
                >
                    <div class="space-y-4">
                        <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Category</p>
                            <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ ucfirst((string) $record->category) }}</p>
                        </div>
                        <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Priority</p>
                            <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $priority['label'] }}</p>
                        </div>
                        <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Assigned To</p>
                            <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $record->assignee?->name ?? 'Not assigned yet' }}</p>
                        </div>
                    </div>
                </x-filament::section>

                <x-filament::section
                    heading="Next Step"
                    description="What this ticket status currently means."
                >
                    <div class="rounded-xl bg-gray-50 px-4 py-4 dark:bg-white/5">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                            @if ($record->status === 'waiting_reply')
                                The support team is waiting for a response from your side.
                            @elseif ($record->status === 'in_progress')
                                The support team is actively working on this request.
                            @elseif (in_array($record->status, ['resolved', 'closed']))
                                This ticket has been completed.
                            @else
                                Your request has been received and is awaiting the next update.
                            @endif
                        </p>
                        <p class="mt-2 text-xs leading-5 text-gray-600 dark:text-gray-300">
                            Use the `Add Reply` action above any time you need to share more detail with the team.
                        </p>
                    </div>
                </x-filament::section>
            </div>
        </div>
    </div>
</x-filament-panels::page>
