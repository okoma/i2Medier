<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
@php
    $decodeSeoValue = static function ($value) {
        if (! is_string($value)) {
            return $value;
        }

        $value = html_entity_decode($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $value = preg_replace('/\s*&\s*/', ' and ', $value) ?? $value;

        return preg_replace('/\s+/', ' ', trim($value)) ?? trim($value);
    };
    $siteSettings = app(\App\Support\SiteSettings::class);
@endphp
<title>{{ $decodeSeoValue(trim($__env->yieldContent('title')) ?: 'i2Medier') }}</title>
@if ($siteSettings->favicon())
<link rel="icon" href="{{ $siteSettings->favicon() }}">
<link rel="shortcut icon" href="{{ $siteSettings->favicon() }}">
@else
<link rel="icon" href="/favicon.ico">
<link rel="shortcut icon" href="/favicon.ico">
@endif
@if ($siteSettings->appleTouchIcon())
<link rel="apple-touch-icon" href="{{ $siteSettings->appleTouchIcon() }}">
@endif
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
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
@endisset
<script type="application/ld+json">{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'i2Medier',
    'url' => url('/'),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
@stack('meta')
@vite('resources/css/public/fonts.css')
@vite('resources/js/public/pages/onboarding.js')
@stack('page_css')
@vite('resources/css/public.css')
