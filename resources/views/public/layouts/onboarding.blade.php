<!DOCTYPE html>
<html lang="en" class="onboarding-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php(
        $decodeSeoValue = static fn ($value) => is_string($value)
            ? html_entity_decode($value, ENT_QUOTES | ENT_HTML5, 'UTF-8')
            : $value
    )
    <title>{{ $decodeSeoValue(trim($__env->yieldContent('title')) ?: 'i2Medier') }}</title>
    @isset($seo)
        <meta name="description" content="{{ $decodeSeoValue($seo['description'] ?? '') }}">
        @if (filled($seo['keywords'] ?? null))
            <meta name="keywords" content="{{ $decodeSeoValue($seo['keywords']) }}">
        @endif
        <meta name="robots" content="{{ $decodeSeoValue($seo['robots'] ?? '') }}">
        <meta name="author" content="{{ $decodeSeoValue($seo['author'] ?? '') }}">
        <link rel="canonical" href="{{ $seo['url'] ?? url()->current() }}">
        <meta property="og:type" content="{{ $decodeSeoValue($seo['og_type'] ?? 'website') }}">
        <meta property="og:url" content="{{ $seo['url'] ?? url()->current() }}">
        <meta property="og:title" content="{{ $decodeSeoValue($seo['title'] ?? '') }}">
        <meta property="og:description" content="{{ $decodeSeoValue($seo['description'] ?? '') }}">
        <meta property="og:site_name" content="i2Medier">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $decodeSeoValue($seo['title'] ?? '') }}">
        <meta name="twitter:description" content="{{ $decodeSeoValue($seo['description'] ?? '') }}">
        <script type="application/ld+json">{!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => $seo['schema_type'] ?? 'WebPage',
            'name' => $decodeSeoValue($seo['title'] ?? ''),
            'description' => $decodeSeoValue($seo['description'] ?? ''),
            'url' => $seo['url'] ?? url()->current(),
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'i2Medier',
                'url' => url('/'),
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    @endisset
    <script type="application/ld+json">{!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'i2Medier',
        'url' => url('/'),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    @stack('meta')
    @vite('resources/css/public/fonts.css')
    @vite('resources/js/public/pages/onboarding.js')
    @stack('page_css')
</head>
<body
    class="onboarding-body"
    data-onboarding-fallback-url="{{ route('site.home') }}"
    data-onboarding-submit-url="{{ route('site.start.store') }}"
    data-onboarding-catalog='@json($onboardingCatalog ?? [])'
    data-onboarding-preset='@json($onboardingPreset ?? [])'
>
    @yield('content')

    @stack('scripts')
</body>
</html>
