<x-filament-panels::page>
    @php
        $projectRows = [
            [
                'icon' => 'letter',
                'iconClass' => 'bg-[var(--i2-color-brand-ink)] dark:bg-white/10 text-white text-[1.08rem] font-bold',
                'iconText' => 'A',
                'title' => 'Acme Website Redesign',
                'type' => 'Website Development',
                'status' => ['label' => 'In Progress', 'class' => 'bg-[var(--i2-color-info-soft)] dark:bg-[rgba(60,124,255,.18)] text-[var(--i2-color-info)]'],
                'progress' => 60,
                'progressClass' => 'bg-[var(--i2-color-accent)] text-[var(--i2-color-accent)]',
                'progressWidthClass' => 'w-[60%]',
                'due' => 'May 20, 2024',
                'dueNote' => '18 days left',
                'dueNoteClass' => 'text-[var(--i2-color-accent)]',
                'updated' => 'May 2, 2024',
                'updatedBy' => 'by Victor',
            ],
            [
                'icon' => 'cart',
                'iconClass' => 'bg-[var(--i2-color-violet-soft)] dark:bg-[rgba(124,85,255,.18)] text-[var(--i2-color-violet)]',
                'title' => 'Acme E-commerce Store',
                'type' => 'E-commerce Development',
                'status' => ['label' => 'In Progress', 'class' => 'bg-[var(--i2-color-info-soft)] dark:bg-[rgba(60,124,255,.18)] text-[var(--i2-color-info)]'],
                'progress' => 35,
                'progressClass' => 'bg-[var(--i2-color-accent)] text-[var(--i2-color-accent)]',
                'progressWidthClass' => 'w-[35%]',
                'due' => 'Jun 10, 2024',
                'dueNote' => '39 days left',
                'dueNoteClass' => 'text-[var(--i2-color-accent)]',
                'updated' => 'May 5, 2024',
                'updatedBy' => 'by Victor',
            ],
            [
                'icon' => 'phone',
                'iconClass' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]',
                'title' => 'Acme Mobile App',
                'type' => 'Mobile App Development',
                'status' => ['label' => 'Planning', 'class' => 'bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]'],
                'progress' => 10,
                'progressClass' => 'bg-[var(--i2-color-accent)] text-[var(--i2-color-accent)]',
                'progressWidthClass' => 'w-[10%]',
                'due' => 'Jun 30, 2024',
                'dueNote' => '59 days left',
                'dueNoteClass' => 'text-[var(--i2-color-accent)]',
                'updated' => 'Apr 28, 2024',
                'updatedBy' => 'by Victor',
            ],
            [
                'icon' => 'spark',
                'iconClass' => 'bg-[var(--i2-color-info)] text-white',
                'title' => 'Acme Branding Project',
                'type' => 'Branding',
                'status' => ['label' => 'Completed', 'class' => 'bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]'],
                'progress' => 100,
                'progressClass' => 'bg-[var(--i2-color-success)] text-[var(--i2-color-success)]',
                'progressWidthClass' => 'w-full',
                'due' => 'Apr 15, 2024',
                'dueNote' => 'Completed',
                'dueNoteClass' => 'text-[var(--i2-color-success)]',
                'updated' => 'Apr 15, 2024',
                'updatedBy' => 'by Victor',
            ],
            [
                'icon' => 'megaphone',
                'iconClass' => 'bg-[var(--i2-color-accent-soft)] dark:bg-[rgba(200,169,110,.18)] text-[var(--i2-color-accent)]',
                'title' => 'Acme Digital Marketing',
                'type' => 'Digital Marketing',
                'status' => ['label' => 'In Progress', 'class' => 'bg-[var(--i2-color-info-soft)] dark:bg-[rgba(60,124,255,.18)] text-[var(--i2-color-info)]'],
                'progress' => 70,
                'progressClass' => 'bg-[var(--i2-color-accent)] text-[var(--i2-color-accent)]',
                'progressWidthClass' => 'w-[70%]',
                'due' => 'May 25, 2024',
                'dueNote' => '23 days left',
                'dueNoteClass' => 'text-[var(--i2-color-accent)]',
                'updated' => 'May 6, 2024',
                'updatedBy' => 'by Victor',
            ],
            [
                'icon' => 'shield',
                'iconClass' => 'bg-[var(--i2-color-violet-soft)] dark:bg-[rgba(124,85,255,.18)] text-[var(--i2-color-violet)]',
                'title' => 'Acme Security Audit',
                'type' => 'Security',
                'status' => ['label' => 'On Hold', 'class' => 'bg-[var(--i2-color-neutral-100)] dark:bg-white/[0.08] text-[var(--i2-color-text-soft)] dark:text-white/55'],
                'progress' => 0,
                'progressClass' => 'bg-[var(--i2-color-accent)] text-[var(--i2-color-accent)]',
                'progressWidthClass' => 'w-0',
                'due' => 'TBD',
                'dueNote' => '-',
                'dueNoteClass' => 'text-[var(--i2-color-text-faint)]',
                'updated' => 'Apr 20, 2024',
                'updatedBy' => 'by Victor',
            ],
        ];
    @endphp

    <div class="font-[var(--i2-font-sans)] text-[var(--i2-color-text)] dark:text-white/88">
        <main>
            <section aria-label="Project summary" class="mb-3 grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-5">
                <x-client.stat-card label="Total Projects" value="12" note="All time" icon-class="bg-[var(--i2-color-accent-soft)] dark:bg-[rgba(200,169,110,.18)] text-[var(--i2-color-accent)]">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M3.5 7.5A2.5 2.5 0 0 1 6 5h4l2 2h6a2.5 2.5 0 0 1 2.5 2.5v7A2.5 2.5 0 0 1 18 19H6a2.5 2.5 0 0 1-2.5-2.5Z"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
                <x-client.stat-card label="Completed" value="6" note="50% of total" icon-class="bg-[var(--i2-color-success-soft)] dark:bg-[rgba(26,107,58,.28)] text-[var(--i2-color-success)]">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="m8.5 12 2.2 2.2 4.8-5"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
                <x-client.stat-card label="In Progress" value="4" note="33.3% of total" icon-class="bg-[var(--i2-color-info-soft)] dark:bg-[rgba(60,124,255,.18)] text-[var(--i2-color-info)]">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="M12 7.5V12h3.5"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
                <x-client.stat-card label="On Hold" value="1" note="8.3% of total" icon-class="bg-[var(--i2-color-warning-soft)] dark:bg-[rgba(218,132,0,.22)] text-[var(--i2-color-warning)]">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M8 4.5h8"></path><path d="M8 19.5h8"></path><path d="m9 4.5 6 7-6 8"></path><path d="m15 4.5-6 7 6 8"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
                <x-client.stat-card label="Cancelled" value="1" note="8.3% of total" icon-class="bg-[var(--i2-color-danger-soft)] dark:bg-[rgba(255,59,48,.18)] text-[var(--i2-color-danger)]">
                    <x-slot:icon>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="12" cy="12" r="8.5"></circle><path d="m9 9 6 6"></path><path d="m15 9-6 6"></path></svg>
                    </x-slot:icon>
                </x-client.stat-card>
            </section>

            <x-client.panel padding="none">
                <div class="flex flex-col items-start justify-between gap-3 px-[18px] pb-0 pt-[14px] xl:flex-row xl:items-center">
                    <div class="flex w-full items-center gap-7 overflow-x-auto pb-1" aria-label="Project filters">
                        <button type="button" class="relative whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-accent)] after:absolute after:bottom-0 after:left-[-8px] after:right-[-8px] after:h-[3px] after:rounded-full after:bg-[var(--i2-color-accent)] after:content-['']">All Projects</button>
                        <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)] dark:text-white/55">In Progress</button>
                        <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)] dark:text-white/55">On Hold</button>
                        <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)] dark:text-white/55">Completed</button>
                        <button type="button" class="whitespace-nowrap pb-[14px] pt-2 text-[var(--i2-color-text-soft)] dark:text-white/55">Cancelled</button>
                    </div>

                    <div class="flex w-full flex-col gap-3 xl:w-auto xl:flex-row xl:items-center">
                        <button type="button" class="inline-flex min-h-[28px] items-center justify-center gap-2 rounded-[10px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-[18px] text-[var(--i2-color-text-soft)] dark:text-white/55">
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4 6h16"></path><path d="M7 12h10"></path><path d="M10 18h4"></path></svg>
                            <span>Filter</span>
                        </button>
                        <button type="button" class="inline-flex min-h-[28px] items-center justify-center gap-2 rounded-[10px] bg-[var(--i2-color-brand-ink)] dark:bg-white/10 dark:border dark:border-white/15 px-[18px] text-white">
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg>
                            <span>New Project</span>
                        </button>
                    </div>
                </div>

                <div class="px-[18px] pb-0 pt-3">
                    <div class="hidden items-center gap-[18px] border-t border-[var(--i2-color-border-soft)] dark:border-white/8 px-[10px] py-[14px] text-[.94rem] text-[var(--i2-color-text-soft)] dark:text-white/55 xl:grid xl:grid-cols-[minmax(250px,2fr)_130px_220px_140px_140px_150px] 2xl:grid-cols-[minmax(280px,2fr)_140px_220px_140px_140px_170px]">
                        <span>Project</span>
                        <span>Status</span>
                        <span>Progress</span>
                        <span>Due Date</span>
                        <span>Last Updated</span>
                        <span>Action</span>
                    </div>

                    @foreach ($projectRows as $project)
                        <article class="grid gap-3 border-t border-[var(--i2-color-border-soft)] dark:border-white/8 px-[10px] py-[12px] xl:grid-cols-[minmax(250px,2fr)_130px_220px_140px_140px_150px] xl:items-center xl:gap-[18px] 2xl:grid-cols-[minmax(280px,2fr)_140px_220px_140px_140px_170px]">
                            <div class="flex min-w-0 items-center gap-4">
                                <div class="{{ $project['iconClass'] }} grid size-8 shrink-0 place-items-center rounded-[10px]">
                                    @if ($project['icon'] === 'letter')
                                        <span>{{ $project['iconText'] }}</span>
                                    @elseif ($project['icon'] === 'cart')
                                        <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M6 7h12l-1.2 6H8Z"></path><path d="M9 18.5a1 1 0 1 0 0 .01"></path><path d="M16 18.5a1 1 0 1 0 0 .01"></path><path d="M7 7 6 4H4"></path></svg>
                                    @elseif ($project['icon'] === 'phone')
                                        <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><rect x="8" y="3.5" width="8" height="17" rx="2"></rect><path d="M10.5 6.5h3"></path><path d="M11.5 17.5h1"></path></svg>
                                    @elseif ($project['icon'] === 'spark')
                                        <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m5 8 4 3"></path><path d="m9 11 4 3"></path><path d="m13 14 4 3"></path><path d="m9 8 4 3"></path><path d="m13 11 4 3"></path></svg>
                                    @elseif ($project['icon'] === 'megaphone')
                                        <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4 12.5h8"></path><path d="m11 9.5 7-3v12l-7-3Z"></path><path d="M8 12.5v3a2 2 0 0 0 3.4 1.4"></path></svg>
                                    @else
                                        <svg viewBox="0 0 24 24" class="size-4 fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 3.5 5 6.5V12c0 4.2 2.7 7.8 7 8.8 4.3-1 7-4.6 7-8.8V6.5Z"></path><path d="m9.5 12 1.8 1.8 3.7-4"></path></svg>
                                    @endif
                                </div>
                                <div class="min-w-0">
                                    <h2 class="mb-2 text-[0.88rem] font-semibold tracking-[-0.02em]">{{ $project['title'] }}</h2>
                                    <p class="text-[0.78rem] text-[var(--i2-color-text-faint)] dark:text-white/35">{{ $project['type'] }}</p>
                                </div>
                            </div>

                            <div>
                                <span class="{{ $project['status']['class'] }} inline-flex min-h-[20px] items-center justify-center rounded-[6px] px-[10px] text-[0.78rem] font-semibold whitespace-nowrap">
                                    {{ $project['status']['label'] }}
                                </span>
                            </div>

                            <div class="flex items-center gap-[14px]">
                                <div class="h-1.5 w-36 overflow-hidden rounded-full bg-[var(--i2-color-neutral-100)] dark:bg-white/[0.06]">
                                    <span class="i2-progress-bar {{ $project['progressClass'] }} {{ $project['progressWidthClass'] }} block h-full rounded-full"></span>
                                </div>
                                <strong class="text-[0.82rem] font-medium text-[var(--i2-color-text-soft)] dark:text-white/55">{{ $project['progress'] }}%</strong>
                            </div>

                            <div>
                                <strong class="text-[0.82rem] font-medium text-[var(--i2-color-text-soft)] dark:text-white/55">{{ $project['due'] }}</strong>
                                <span class="{{ $project['dueNoteClass'] }} mt-2 block font-semibold">{{ $project['dueNote'] }}</span>
                            </div>

                            <div>
                                <strong class="text-[0.82rem] font-medium text-[var(--i2-color-text-soft)] dark:text-white/55">{{ $project['updated'] }}</strong>
                                <span class="mt-2 block text-[var(--i2-color-text-faint)] dark:text-white/35">{{ $project['updatedBy'] }}</span>
                            </div>

                            <div class="flex items-center gap-2.5">
                                <button type="button" class="inline-flex min-h-[28px] min-w-[84px] items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-[14px] text-[var(--i2-color-brand-ink)] dark:text-white/90">View Details</button>
                                <button type="button" class="inline-flex size-[28px] items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] text-[var(--i2-color-text-soft)] dark:text-white/55" aria-label="More actions for {{ $project['title'] }}">
                                    <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 6h.01"></path><path d="M12 12h.01"></path><path d="M12 18h.01"></path></svg>
                                </button>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="flex flex-col items-start justify-between gap-3 border-t border-[var(--i2-color-border-soft)] dark:border-white/8 px-[18px] py-[12px] xl:flex-row xl:items-center">
                    <p class="m-0 text-[var(--i2-color-text-faint)] dark:text-white/35">Showing 1 to 6 of 12 projects</p>
                    <div class="flex items-center gap-3">
                        <button type="button" class="inline-flex min-w-[28px] items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-3 text-[var(--i2-color-text-soft)] dark:text-white/55" aria-label="Previous page">
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m14 7-5 5 5 5"></path></svg>
                        </button>
                        <button type="button" class="inline-flex min-w-[28px] items-center justify-center rounded-[10px] bg-[var(--i2-color-brand-ink)] dark:bg-white/10 dark:border dark:border-white/15 px-3 text-white">1</button>
                        <button type="button" class="inline-flex min-w-[28px] items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-3 text-[var(--i2-color-text-soft)] dark:text-white/55">2</button>
                        <button type="button" class="inline-flex min-w-[28px] items-center justify-center rounded-[10px] border border-[var(--i2-color-border-soft)] dark:border-white/8 bg-[var(--i2-color-surface)] dark:bg-[#1e1f26] px-3 text-[var(--i2-color-text-soft)] dark:text-white/55" aria-label="Next page">
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m10 7 5 5-5 5"></path></svg>
                        </button>
                    </div>
                </div>
            </x-client.panel>
        </main>
    </div>
</x-filament-panels::page>
