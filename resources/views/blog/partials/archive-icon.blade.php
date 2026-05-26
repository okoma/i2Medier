@switch($name)
    @case('search')
        <svg viewBox="0 0 24 24" aria-hidden="true" class="{{ $class ?? '' }}">
            <circle cx="11" cy="11" r="7"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        @break

    @case('design')
        <svg viewBox="0 0 24 24" aria-hidden="true" class="{{ $class ?? '' }}">
            <path d="M12 3l7 4v10l-7 4-7-4V7l7-4z"></path>
            <path d="M8.5 10.5h7"></path>
            <path d="M8.5 13.5h4"></path>
        </svg>
        @break

    @case('chart')
        <svg viewBox="0 0 24 24" aria-hidden="true" class="{{ $class ?? '' }}">
            <path d="M4 19h16"></path>
            <path d="M7 15l3-3 3 2 4-5"></path>
            <path d="M17 9h2v2"></path>
        </svg>
        @break

    @case('wordpress')
        <svg viewBox="0 0 24 24" aria-hidden="true" class="{{ $class ?? '' }}">
            <circle cx="12" cy="12" r="9"></circle>
            <path d="M7.5 8.5l2.5 7 2-5 2 5 2.5-7"></path>
        </svg>
        @break

    @case('code')
        <svg viewBox="0 0 24 24" aria-hidden="true" class="{{ $class ?? '' }}">
            <polyline points="8 6 2 12 8 18"></polyline>
            <polyline points="16 6 22 12 16 18"></polyline>
            <line x1="13" y1="4" x2="11" y2="20"></line>
        </svg>
        @break

    @case('growth')
        <svg viewBox="0 0 24 24" aria-hidden="true" class="{{ $class ?? '' }}">
            <path d="M12 3l1.8 5.5H19l-4.4 3.2L16.4 17 12 13.8 7.6 17l1.8-5.3L5 8.5h5.2L12 3z"></path>
        </svg>
        @break

    @case('industry')
        <svg viewBox="0 0 24 24" aria-hidden="true" class="{{ $class ?? '' }}">
            <path d="M4 20V7l5-3 5 3v13"></path>
            <path d="M14 20V11l6-3v12"></path>
            <path d="M2 20h20"></path>
        </svg>
        @break

    @case('mobile')
        <svg viewBox="0 0 24 24" aria-hidden="true" class="{{ $class ?? '' }}">
            <rect x="7" y="2" width="10" height="20" rx="2"></rect>
            <line x1="11" y1="18" x2="13" y2="18"></line>
        </svg>
        @break

    @case('cloud')
        <svg viewBox="0 0 24 24" aria-hidden="true" class="{{ $class ?? '' }}">
            <path d="M20 17.5a4.5 4.5 0 0 0-1-8.9A6 6 0 0 0 7.2 7.5 4 4 0 0 0 7 15.5h13z"></path>
        </svg>
        @break

    @case('spark')
        <svg viewBox="0 0 24 24" aria-hidden="true" class="{{ $class ?? '' }}">
            <path d="M12 3l1.3 4.2L17.5 8.5l-4.2 1.3L12 14l-1.3-4.2L6.5 8.5l4.2-1.3L12 3z"></path>
            <path d="M18.5 14.5l.8 2.2 2.2.8-2.2.8-.8 2.2-.8-2.2-2.2-.8 2.2-.8.8-2.2z"></path>
        </svg>
        @break

    @case('arrow-right')
        <svg viewBox="0 0 24 24" aria-hidden="true" class="{{ $class ?? '' }}">
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
        </svg>
        @break

    @case('arrow-down')
        <svg viewBox="0 0 24 24" aria-hidden="true" class="{{ $class ?? '' }}">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <polyline points="5 12 12 19 19 12"></polyline>
        </svg>
        @break

    @case('clock')
        <svg viewBox="0 0 24 24" aria-hidden="true" class="{{ $class ?? '' }}">
            <circle cx="12" cy="12" r="9"></circle>
            <polyline points="12 7 12 12 15 14"></polyline>
        </svg>
        @break
@endswitch
