<!DOCTYPE html>
<html lang="en" class="onboarding-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ trim($__env->yieldContent('title')) ?: 'i2Medier' }}</title>
    @isset($seo)
        <meta name="description" content="{{ $seo['description'] }}">
        @if (filled($seo['keywords']))
            <meta name="keywords" content="{{ $seo['keywords'] }}">
        @endif
        <meta name="robots" content="{{ $seo['robots'] }}">
        <meta name="author" content="{{ $seo['author'] }}">
        <link rel="canonical" href="{{ $seo['url'] }}">
        <meta property="og:type" content="{{ $seo['og_type'] }}">
        <meta property="og:url" content="{{ $seo['url'] }}">
        <meta property="og:title" content="{{ $seo['title'] }}">
        <meta property="og:description" content="{{ $seo['description'] }}">
        <meta property="og:site_name" content="i2Medier">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seo['title'] }}">
        <meta name="twitter:description" content="{{ $seo['description'] }}">
        <script type="application/ld+json">{!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => $seo['schema_type'],
            'name' => $seo['title'],
            'description' => $seo['description'],
            'url' => $seo['url'],
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
<body class="onboarding-body" data-onboarding-fallback-url="{{ route('site.home') }}">
    @yield('content')

    @stack('scripts')
</body>
</html>
