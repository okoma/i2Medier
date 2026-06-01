<x-filament-panels::page>
    @php
        $stats = [
            ['label' => 'Total Documents', 'value' => '68', 'note' => 'All time', 'iconClass' => 'bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]', 'icon' => 'folder'],
            ['label' => 'Uploaded Documents', 'value' => '42', 'note' => 'This year', 'iconClass' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]', 'icon' => 'upload'],
            ['label' => 'Downloaded Documents', 'value' => '26', 'note' => 'This year', 'iconClass' => 'bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)]', 'icon' => 'download'],
            ['label' => 'Storage Used', 'value' => '2.45 GB', 'note' => 'of 10 GB', 'iconClass' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]', 'icon' => 'storage'],
            ['label' => 'Folders', 'value' => '12', 'note' => 'Total folders', 'iconClass' => 'bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)]', 'icon' => 'document'],
        ];

        $documents = [
            ['kind' => 'folder', 'title' => 'Project Proposals', 'subtitle' => '12 documents', 'tag' => ['label' => 'Project', 'class' => 'bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]'], 'by' => 'Acme Ltd', 'date' => 'May 15, 2025', 'time' => '10:30 AM', 'size' => '--', 'favorite' => false],
            ['kind' => 'pdf', 'title' => 'Brand Guidelines.pdf', 'subtitle' => null, 'tag' => ['label' => 'Design', 'class' => 'bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)]'], 'by' => 'Acme Ltd', 'date' => 'May 13, 2025', 'time' => '12:05 PM', 'size' => '3.2 MB', 'favorite' => true],
            ['kind' => 'pdf', 'title' => 'Hosting Setup Guide.pdf', 'subtitle' => null, 'tag' => ['label' => 'Hosting', 'class' => 'bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]'], 'by' => 'i2Medier', 'date' => 'May 11, 2025', 'time' => '04:15 PM', 'size' => '2.1 MB', 'favorite' => false],
            ['kind' => 'xlsx', 'title' => 'Monthly Report - April 2025.xlsx', 'subtitle' => null, 'tag' => ['label' => 'Reports', 'class' => 'bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)]'], 'by' => 'Acme Ltd', 'date' => 'May 8, 2025', 'time' => '01:15 PM', 'size' => '834 KB', 'favorite' => true],
            ['kind' => 'folder', 'title' => 'Logos & Brand Assets', 'subtitle' => '8 documents', 'tag' => ['label' => 'Design', 'class' => 'bg-[var(--i2-color-violet-soft)] text-[var(--i2-color-violet)]'], 'by' => 'Acme Ltd', 'date' => 'May 5, 2025', 'time' => '10:05 AM', 'size' => '--', 'favorite' => false],
            ['kind' => 'ppt', 'title' => 'Project Presentation.pptx', 'subtitle' => null, 'tag' => ['label' => 'Presentation', 'class' => 'bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)]'], 'by' => 'Acme Ltd', 'date' => 'May 3, 2025', 'time' => '05:20 PM', 'size' => '5.4 MB', 'favorite' => false],
            ['kind' => 'pdf', 'title' => 'SSL Certificate (acme.com).pdf', 'subtitle' => null, 'tag' => ['label' => 'Certificates', 'class' => 'bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)]'], 'by' => 'Acme Ltd', 'date' => 'Apr 30, 2025', 'time' => '04:50 PM', 'size' => '380 KB', 'favorite' => false],
        ];

        $fileTypes = [
            ['kind' => 'pdf', 'label' => 'PDF Documents', 'count' => '22'],
            ['kind' => 'docx', 'label' => 'Word Documents', 'count' => '15'],
            ['kind' => 'xlsx', 'label' => 'Excel Sheets', 'count' => '8'],
            ['kind' => 'zip', 'label' => 'Images', 'count' => '12'],
            ['kind' => 'folder', 'label' => 'Other Files', 'count' => '11'],
        ];
    @endphp

    <div class="font-[var(--i2-font-sans)] text-[var(--i2-color-text)]">
        <section aria-label="Document summary" class="mb-4 grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-5">
            @foreach ($stats as $stat)
                <x-client.stat-card
                    :label="$stat['label']"
                    :value="$stat['value']"
                    :note="$stat['note']"
                    :icon-class="$stat['iconClass']"
                >
                    <x-slot:icon>
                        @if ($stat['icon'] === 'folder')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4.5 6.5A1.5 1.5 0 0 1 6 5h4l1.5 2h6.5A1.5 1.5 0 0 1 19.5 8.5v8A1.5 1.5 0 0 1 18 18H6a1.5 1.5 0 0 1-1.5-1.5Z"></path></svg>
                        @elseif ($stat['icon'] === 'upload')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 16V7"></path><path d="m8.5 10.5 3.5-3.5 3.5 3.5"></path><path d="M7 18.5h10a3.5 3.5 0 0 0 .3-7A5.5 5.5 0 0 0 7 11.8 3.3 3.3 0 0 0 7 18.5Z"></path></svg>
                        @elseif ($stat['icon'] === 'download')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 7v9"></path><path d="m8.5 12.5 3.5 3.5 3.5-3.5"></path><path d="M5 19h14"></path></svg>
                        @elseif ($stat['icon'] === 'storage')
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4.5 6.5A1.5 1.5 0 0 1 6 5h4l1.5 2h6.5A1.5 1.5 0 0 1 19.5 8.5v8A1.5 1.5 0 0 1 18 18H6a1.5 1.5 0 0 1-1.5-1.5Z"></path></svg>
                        @else
                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"></path><path d="M14 3.5V8h4"></path><path d="M9 14h6"></path><path d="M9 17h4"></path></svg>
                        @endif
                    </x-slot:icon>
                </x-client.stat-card>
            @endforeach
        </section>

        <section class="grid grid-cols-1 gap-4 xl:grid-cols-[minmax(0,1.7fr)_280px]">
            <div class="min-w-0">
                <x-client.panel padding="none">
                    <div class="flex flex-col items-start justify-between gap-[18px] px-[22px] pb-0 pt-[18px] xl:flex-row xl:items-center">
                        <div class="flex w-full items-center gap-[34px] overflow-x-auto" aria-label="Document filters">
                            <button type="button" class="relative whitespace-nowrap px-[2px] pb-[18px] pt-2 text-[var(--i2-color-accent)] after:absolute after:bottom-0 after:left-0 after:right-0 after:h-[3px] after:rounded-full after:bg-[var(--i2-color-accent)] after:content-['']">All Documents</button>
                            <button type="button" class="whitespace-nowrap px-[2px] pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Recently Uploaded</button>
                            <button type="button" class="whitespace-nowrap px-[2px] pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Shared with Me</button>
                            <button type="button" class="whitespace-nowrap px-[2px] pb-[18px] pt-2 text-[var(--i2-color-text-soft)]">Favorites</button>
                        </div>
                        <div class="flex w-full flex-col gap-3 xl:w-auto xl:flex-row xl:items-center">
                            <x-client.button>
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4 6h16"></path><path d="M7 12h10"></path><path d="M10 18h4"></path></svg>
                                <span>Filter</span>
                            </x-client.button>
                            <x-client.button variant="primary">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg>
                                <span>Upload Document</span>
                            </x-client.button>
                        </div>
                    </div>

                    <div class="px-[22px]">
                        <div class="hidden items-center gap-3 border-t border-[var(--i2-color-border-soft)] py-[18px] text-[.92rem] text-[var(--i2-color-text-faint)] xl:grid xl:grid-cols-[38px_minmax(220px,1fr)_108px_126px_132px_84px_90px]">
                            <span class="inline-flex items-center justify-center"><input type="checkbox" aria-label="Select all documents" class="size-4 accent-[var(--i2-color-accent)]"></span>
                            <span>Document Name</span>
                            <span>Category</span>
                            <span>Uploaded By</span>
                            <span>Uploaded On</span>
                            <span>Size</span>
                            <span>Actions</span>
                        </div>

                        @foreach ($documents as $document)
                            <div class="grid gap-3 border-t border-[var(--i2-color-border-soft)] py-[14px] text-[var(--i2-color-text-soft)] xl:grid-cols-[38px_minmax(220px,1fr)_108px_126px_132px_84px_90px] xl:items-center xl:gap-3">
                                <span class="inline-flex items-center justify-center"><input type="checkbox" aria-label="Select {{ $document['title'] }}" class="size-4 accent-[var(--i2-color-accent)]"></span>
                                <div class="flex min-w-0 items-center gap-[14px]">
                                    <span class="@if($document['kind']==='folder') bg-[var(--i2-color-info-soft)] text-[var(--i2-color-text-soft)] @elseif($document['kind']==='pdf') bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)] @elseif($document['kind']==='xlsx') bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)] @elseif($document['kind']==='ppt') bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)] @else bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)] @endif grid size-11 shrink-0 place-items-center rounded-[14px]">
                                        @if ($document['kind'] === 'folder')
                                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4.5 6.5A1.5 1.5 0 0 1 6 5h4l1.5 2h6.5A1.5 1.5 0 0 1 19.5 8.5v8A1.5 1.5 0 0 1 18 18H6a1.5 1.5 0 0 1-1.5-1.5Z"></path></svg>
                                        @elseif ($document['kind'] === 'pdf')
                                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"></path><path d="M14 3.5V8h4"></path><path d="M8 16h8"></path><path d="M8 12h5"></path></svg>
                                        @elseif ($document['kind'] === 'xlsx')
                                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"></path><path d="M14 3.5V8h4"></path><path d="m8.5 16 4-5"></path><path d="m8.5 11 4 5"></path></svg>
                                        @elseif ($document['kind'] === 'ppt')
                                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"></path><path d="M14 3.5V8h4"></path><path d="M8 12h6"></path><path d="M8 16h4"></path></svg>
                                        @else
                                            <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"></path><path d="M14 3.5V8h4"></path><rect x="8" y="10.5" width="5" height="6" rx="1"></rect></svg>
                                        @endif
                                    </span>
                                    <div class="min-w-0">
                                        <strong class="block font-medium text-[var(--i2-color-brand-ink)]">{{ $document['title'] }}</strong>
                                        @if ($document['subtitle'])
                                            <small class="mt-1.5 block text-[var(--i2-color-text-faint)]">{{ $document['subtitle'] }}</small>
                                        @endif
                                    </div>
                                </div>
                                <span><b class="{{ $document['tag']['class'] }} inline-flex min-h-6 items-center justify-center rounded-[7px] px-2 text-[.74rem] font-semibold not-italic">{{ $document['tag']['label'] }}</b></span>
                                <span>{{ $document['by'] }}</span>
                                <span>{{ $document['date'] }}<br><small class="text-[var(--i2-color-text-faint)]">{{ $document['time'] }}</small></span>
                                <span>{{ $document['size'] }}</span>
                                <span class="flex items-center gap-3">
                                    <button type="button" class="inline-flex size-9 items-center justify-center rounded-[10px] text-[var(--i2-color-text-faint)] {{ $document['favorite'] ? 'text-[var(--i2-color-accent)]' : '' }}" aria-label="Favorite">
                                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m12 4 2.5 5 5.5.8-4 3.9.9 5.5-4.9-2.6-4.9 2.6.9-5.5-4-3.9 5.5-.8Z"></path></svg>
                                    </button>
                                    <x-client.icon-button aria-label="More actions">
                                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 6h.01"></path><path d="M12 12h.01"></path><path d="M12 18h.01"></path></svg>
                                    </x-client.icon-button>
                                </span>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex flex-col items-start justify-between gap-4 px-[22px] pb-[18px] pt-[14px] text-[.93rem] text-[var(--i2-color-text-faint)] xl:flex-row xl:items-center">
                        <span>Showing 1 to 10 of 68 documents</span>
                        <div class="flex items-center gap-3">
                            <x-client.icon-button size="xs" class="min-w-8 px-2 py-1.5 rounded-[8px]" aria-label="Previous page">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m14 7-5 5 5 5"></path></svg>
                            </x-client.icon-button>
                            <x-client.button variant="primary" size="xs" class="min-w-8 px-2 py-1.5 rounded-[8px]">1</x-client.button>
                            <x-client.button size="xs" class="min-w-8 px-2 py-1.5 rounded-[8px] text-[var(--i2-color-text-soft)]">2</x-client.button>
                            <x-client.button size="xs" class="min-w-8 px-2 py-1.5 rounded-[8px] text-[var(--i2-color-text-soft)]">3</x-client.button>
                            <x-client.button size="xs" class="min-w-8 px-2 py-1.5 rounded-[8px] text-[var(--i2-color-text-soft)]">...</x-client.button>
                            <x-client.button size="xs" class="min-w-8 px-2 py-1.5 rounded-[8px] text-[var(--i2-color-text-soft)]">7</x-client.button>
                            <x-client.icon-button size="xs" class="min-w-8 px-2 py-1.5 rounded-[8px]" aria-label="Next page">
                                <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m10 7 5 5-5 5"></path></svg>
                            </x-client.icon-button>
                        </div>
                    </div>
                </x-client.panel>
            </div>

            <aside class="grid gap-4">
                <x-client.panel class="px-5 pb-[18px] pt-[18px]">
                    <h2 class="text-base">Storage Overview</h2>
                    <div class="my-[18px] grid place-items-center">
                        <div class="relative size-[148px] rounded-full bg-[conic-gradient(var(--i2-color-info)_0_24.5%,var(--i2-color-border-strong)_24.5%_100%)]">
                            <div class="absolute inset-[18px] rounded-full bg-[var(--i2-color-surface)]"></div>
                            <div class="absolute inset-0 z-[1] grid place-content-center text-center">
                                <strong class="text-[1.8rem] tracking-[-0.05em]">2.45 GB</strong>
                                <span class="mt-1 text-[var(--i2-color-text-faint)]">Used</span>
                            </div>
                        </div>
                    </div>
                    <div class="grid gap-3">
                        <div class="grid grid-cols-[auto_minmax(0,1fr)_auto] items-center gap-[10px] text-[var(--i2-color-text-soft)]"><span class="size-[10px] rounded-full bg-[var(--i2-color-info)]"></span><span>Documents</span><strong>2.45 GB</strong></div>
                        <div class="grid grid-cols-[auto_minmax(0,1fr)_auto] items-center gap-[10px] text-[var(--i2-color-text-soft)]"><span class="size-[10px] rounded-full bg-[var(--i2-color-border-strong)]"></span><span>Available</span><strong>7.55 GB</strong></div>
                        <div class="grid grid-cols-[minmax(0,1fr)_auto] items-center gap-[10px] text-[var(--i2-color-text-soft)]"><span>Total</span><strong>10 GB</strong></div>
                    </div>
                </x-client.panel>

                <x-client.panel class="px-5 pb-[18px] pt-[18px]">
                    <h2 class="text-base">Quick Actions</h2>
                    <div class="mt-4 grid gap-3">
                        <button type="button" class="flex items-center gap-3 text-left text-[var(--i2-color-brand-ink)]">
                            <span class="text-[var(--i2-color-text-faint)]"><svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 16V7"></path><path d="m8.5 10.5 3.5-3.5 3.5 3.5"></path><path d="M7 18.5h10a3.5 3.5 0 0 0 .3-7A5.5 5.5 0 0 0 7 11.8 3.3 3.3 0 0 0 7 18.5Z"></path></svg></span>
                            <span>Upload Document</span>
                        </button>
                        <button type="button" class="flex items-center gap-3 text-left text-[var(--i2-color-brand-ink)]">
                            <span class="text-[var(--i2-color-text-faint)]"><svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4.5 6.5A1.5 1.5 0 0 1 6 5h4l1.5 2h6.5A1.5 1.5 0 0 1 19.5 8.5v8A1.5 1.5 0 0 1 18 18H6a1.5 1.5 0 0 1-1.5-1.5Z"></path><path d="M12 10v5"></path><path d="M9.5 12.5h5"></path></svg></span>
                            <span>Create New Folder</span>
                        </button>
                        <button type="button" class="flex items-center gap-3 text-left text-[var(--i2-color-brand-ink)]">
                            <span class="text-[var(--i2-color-text-faint)]"><svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><circle cx="18" cy="5" r="2"></circle><circle cx="6" cy="12" r="2"></circle><circle cx="18" cy="19" r="2"></circle><path d="m7.7 11 8.5-4.8"></path><path d="m7.7 13 8.5 4.8"></path></svg></span>
                            <span>Share a Document</span>
                        </button>
                        <button type="button" class="flex items-center gap-3 text-left text-[var(--i2-color-brand-ink)]">
                            <span class="text-[var(--i2-color-text-faint)]"><svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M12 7v9"></path><path d="m8.5 12.5 3.5 3.5 3.5-3.5"></path><path d="M5 19h14"></path></svg></span>
                            <span>Request a Document</span>
                        </button>
                    </div>
                </x-client.panel>

                <x-client.panel class="px-5 pb-[18px] pt-[18px]">
                    <h2 class="text-base">File Types</h2>
                    <div class="mt-4 grid gap-3">
                        @foreach ($fileTypes as $fileType)
                            <div class="grid grid-cols-[minmax(0,1fr)_auto] items-center gap-[10px] text-[var(--i2-color-text-soft)]">
                                <div class="flex items-center gap-[10px]">
                                    <span class="@if($fileType['kind']==='pdf') bg-[var(--i2-color-danger-soft)] text-[var(--i2-color-danger)] @elseif($fileType['kind']==='docx') bg-[var(--i2-color-info-soft)] text-[var(--i2-color-info)] @elseif($fileType['kind']==='xlsx') bg-[var(--i2-color-success-soft)] text-[var(--i2-color-success)] @elseif($fileType['kind']==='zip') bg-[var(--i2-color-warning-soft)] text-[var(--i2-color-warning)] @else bg-[var(--i2-color-info-soft)] text-[var(--i2-color-text-soft)] @endif grid size-[22px] place-items-center rounded-[6px]">
                                        @if ($fileType['kind'] === 'pdf')
                                            <svg viewBox="0 0 24 24" class="size-[14px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"></path><path d="M14 3.5V8h4"></path><path d="M8 16h8"></path><path d="M8 12h5"></path></svg>
                                        @elseif ($fileType['kind'] === 'docx')
                                            <svg viewBox="0 0 24 24" class="size-[14px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"></path><path d="M14 3.5V8h4"></path><rect x="8" y="10.5" width="5" height="6" rx="1"></rect></svg>
                                        @elseif ($fileType['kind'] === 'xlsx')
                                            <svg viewBox="0 0 24 24" class="size-[14px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"></path><path d="M14 3.5V8h4"></path><path d="m8.5 16 4-5"></path><path d="m8.5 11 4 5"></path></svg>
                                        @elseif ($fileType['kind'] === 'zip')
                                            <svg viewBox="0 0 24 24" class="size-[14px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"></path><path d="M14 3.5V8h4"></path><path d="M10 9h2"></path><path d="M10 12h2"></path><path d="M10 15h2"></path></svg>
                                        @else
                                            <svg viewBox="0 0 24 24" class="size-[14px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="M4.5 6.5A1.5 1.5 0 0 1 6 5h4l1.5 2h6.5A1.5 1.5 0 0 1 19.5 8.5v8A1.5 1.5 0 0 1 18 18H6a1.5 1.5 0 0 1-1.5-1.5Z"></path></svg>
                                        @endif
                                    </span>
                                    <span>{{ $fileType['label'] }}</span>
                                </div>
                                <strong>{{ $fileType['count'] }}</strong>
                            </div>
                        @endforeach
                    </div>
                    <x-client.button class="mt-4 justify-between text-[var(--i2-color-info)]" :full="true" size="lg">
                        <span>View all</span>
                        <svg viewBox="0 0 24 24" class="size-[18px] fill-none stroke-current [stroke-linecap:round] [stroke-linejoin:round] [stroke-width:1.8]" aria-hidden="true"><path d="m10 7 5 5-5 5"></path></svg>
                    </x-client.button>
                </x-client.panel>
            </aside>
        </section>
    </div>
</x-filament-panels::page>
