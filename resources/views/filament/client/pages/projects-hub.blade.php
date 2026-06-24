<x-filament-panels::page>
    <div class="space-y-6">
        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            @foreach ($this->stats as $stat)
                <x-filament::section compact>
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-500 dark:text-gray-400">{{ $stat['label'] }}</p>
                            <p class="mt-3 text-3xl font-semibold text-gray-950 dark:text-white">{{ $stat['value'] }}</p>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{ $stat['description'] }}</p>
                        </div>
                        <div @class([
                            'rounded-xl p-3',
                            'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $stat['color'] === 'slate',
                            'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $stat['color'] === 'amber',
                            'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $stat['color'] === 'sky',
                            'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $stat['color'] === 'emerald',
                        ])>
                            @svg($stat['icon'], 'h-6 w-6')
                        </div>
                    </div>
                </x-filament::section>
            @endforeach
        </div>

        <x-filament::section
            heading="All Projects"
            description="Track requests, proposal stages, and active work in one place."
        >
            <x-slot name="afterHeader">
                <div class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                    {{ count($this->projects) }} total
                </div>
            </x-slot>

            @if (count($this->projects) === 0)
                <div class="py-14 text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-xl bg-gray-100 text-gray-500 dark:bg-white/10 dark:text-gray-300">
                        @svg('heroicon-o-briefcase', 'h-7 w-7')
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-gray-950 dark:text-white">No projects yet</h3>
                    <p class="mx-auto mt-2 max-w-xl text-sm text-gray-600 dark:text-gray-300">
                        Start a new project from the portal and it will appear here with its current stage and next steps.
                    </p>
                    <div class="mt-6">
                        <a
                            wire:navigate
                            href="{{ \App\Filament\Client\Pages\StartProject::getUrl(panel: 'client') }}"
                            class="inline-flex items-center gap-2 rounded-full bg-primary-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-primary-500"
                        >
                            @svg('heroicon-o-plus-circle', 'h-5 w-5')
                            <span>Start New Project</span>
                        </a>
                    </div>
                </div>
            @else
                <div class="divide-y divide-gray-200 dark:divide-white/10">
                    @foreach ($this->projects as $project)
                        <article class="py-5">
                            <div class="flex flex-col gap-5 lg:flex-row lg:items-start lg:justify-between">
                                <div class="min-w-0 flex-1">
                                    <div class="flex flex-wrap items-center gap-3">
                                        <h3 class="text-base font-semibold text-gray-950 dark:text-white">{{ $project['reference'] }}</h3>
                                        <span @class([
                                            'inline-flex items-center rounded-full px-3 py-1 text-xs font-medium',
                                            'bg-amber-100 text-amber-700 dark:bg-amber-500/15 dark:text-amber-300' => $project['stage_color'] === 'amber',
                                            'bg-sky-100 text-sky-700 dark:bg-sky-500/15 dark:text-sky-300' => $project['stage_color'] === 'sky',
                                            'bg-indigo-100 text-indigo-700 dark:bg-indigo-500/15 dark:text-indigo-300' => $project['stage_color'] === 'indigo',
                                            'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/15 dark:text-emerald-300' => $project['stage_color'] === 'emerald',
                                            'bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200' => $project['stage_color'] === 'slate',
                                        ])>
                                            {{ $project['stage'] }}
                                        </span>
                                    </div>

                                    <p class="mt-3 text-sm font-medium text-gray-800 dark:text-gray-100">{{ $project['services_summary'] }}</p>

                                    @if (count($project['services']) > 0)
                                        <div class="mt-3 flex flex-wrap gap-2">
                                            @foreach ($project['services'] as $service)
                                                <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600 dark:bg-white/10 dark:text-gray-300">
                                                    {{ $service }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="grid gap-3 sm:grid-cols-2 lg:min-w-[20rem] lg:max-w-sm">
                                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Next Step</p>
                                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $project['next_step'] }}</p>
                                        @if ($project['next_step_description'])
                                            <p class="mt-1 text-xs leading-5 text-gray-600 dark:text-gray-300">{{ $project['next_step_description'] }}</p>
                                        @endif
                                    </div>
                                    <div class="rounded-xl bg-gray-50 px-4 py-3 dark:bg-white/5">
                                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-gray-500 dark:text-gray-400">Activity</p>
                                        <p class="mt-2 text-sm font-medium text-gray-900 dark:text-white">{{ $project['updated_since'] }}</p>
                                        <p class="mt-1 text-xs leading-5 text-gray-600 dark:text-gray-300">Created {{ $project['created_at'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </x-filament::section>
    </div>
</x-filament-panels::page>
