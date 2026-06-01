@switch($name)
    @case('rocket')
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M14.5 4.5c2.6 1 5 3.4 6 6-1.1 4.7-4.8 8.4-9.5 9.5-2.6-1-5-3.4-6-6 1.1-4.7 4.8-8.4 9.5-9.5Z" stroke="currentColor" stroke-width="1.8"/>
            <path d="M9 15 5 19l1.5-4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="14.5" cy="9.5" r="1.6" fill="currentColor"/>
        </svg>
        @break

    @case('calendar-short')
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <rect x="4" y="5" width="16" height="15" rx="3" stroke="currentColor" stroke-width="1.8"/>
            <path d="M8 3.5v4M16 3.5v4M4 9h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M8.5 13h7M8.5 16h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
        </svg>
        @break

    @case('calendar-long')
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <rect x="4" y="5" width="16" height="15" rx="3" stroke="currentColor" stroke-width="1.8"/>
            <path d="M8 3.5v4M16 3.5v4M4 9h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M8.5 13h7M8.5 16h7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
        </svg>
        @break

    @case('wave')
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M3 14c2.5 0 2.5-4 5-4s2.5 4 5 4 2.5-4 5-4 2.5 4 3 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
        </svg>
        @break

    @case('check-circle')
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/>
            <path d="m8.5 12 2.3 2.3 4.7-4.8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        @break

    @case('cart')
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M4 6h2l1.6 8.2a2 2 0 0 0 2 1.6h6.8a2 2 0 0 0 2-1.5L20 9H7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="10" cy="19" r="1.4" fill="currentColor"/>
            <circle cx="17" cy="19" r="1.4" fill="currentColor"/>
        </svg>
        @break

    @case('chat')
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M12 4c4.4 0 8 3 8 6.8 0 3.7-3.6 6.7-8 6.7-.8 0-1.6-.1-2.3-.3L5 19l1.4-3.3C5.5 14.5 4 12.8 4 10.8 4 7 7.6 4 12 4Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
        </svg>
        @break

    @case('lock')
        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <rect x="6" y="10" width="12" height="10" rx="2.5" stroke="currentColor" stroke-width="1.8"/>
            <path d="M9 10V8a3 3 0 1 1 6 0v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
        </svg>
        @break
@endswitch
