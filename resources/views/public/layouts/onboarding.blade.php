<!DOCTYPE html>
<html lang="en" class="onboarding-html">
<head>
    @include('public.partials.onboard-head')
</head>
<body
    class="onboarding-body"
    data-onboarding-fallback-url="{{ $onboardingFallbackUrl ?? route('site.home') }}"
    data-onboarding-submit-url="{{ route('site.start.store') }}"
    data-onboarding-catalog='@json($onboardingCatalog ?? [])'
    data-onboarding-preset='@json($onboardingPreset ?? [])'
>
    @yield('content')

    @unless($embeddedInPortal ?? false)
        @include('public.partials.footer')
    @endunless

    @stack('scripts')
</body>
</html>
