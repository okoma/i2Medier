@php
    $siteSettings = app(\App\Support\SiteSettings::class);
    $logoMode = $mode ?? 'auto';
    $darkLogo = $siteSettings->logoDark();
    $lightLogo = $siteSettings->logoLight();
    $logoAlt = $alt ?? 'i2Medier';
    $logoClasses = collect([
        'public-logo',
        $class ?? null,
        'public-logo--' . $logoMode,
        $darkLogo ? 'public-logo--has-dark' : null,
        $lightLogo ? 'public-logo--has-light' : null,
    ])->filter()->implode(' ');
@endphp

<a href="{{ url('/') }}" class="{{ $logoClasses }}">
    @if ($darkLogo || $lightLogo)
        <span class="public-logo-images" aria-label="{{ $logoAlt }}">
            @if ($darkLogo)
                <img
                    src="{{ $darkLogo }}"
                    alt="{{ $logoAlt }}"
                    class="public-logo-image public-logo-image--dark"
                >
            @endif
            @if ($lightLogo)
                <img
                    src="{{ $lightLogo }}"
                    alt="{{ $logoAlt }}"
                    class="public-logo-image public-logo-image--light"
                >
            @endif
        </span>
    @else
        <span class="public-logo-text">i2Medi<span>er</span></span>
    @endif
</a>
