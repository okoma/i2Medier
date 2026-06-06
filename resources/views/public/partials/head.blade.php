<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@php(
    $decodeSeoValue = static fn ($value) => is_string($value)
        ? html_entity_decode($value, ENT_QUOTES | ENT_HTML5, 'UTF-8')
        : $value
)
<title>{{ $decodeSeoValue($title ?? 'i2Medier') }}</title>
@php($siteSettings = app(\App\Support\SiteSettings::class))
@if ($siteSettings->favicon())
<link rel="icon" href="{{ $siteSettings->favicon() }}">
<link rel="shortcut icon" href="{{ $siteSettings->favicon() }}">
@endif
@if ($siteSettings->appleTouchIcon())
<link rel="apple-touch-icon" href="{{ $siteSettings->appleTouchIcon() }}">
@endif
@isset($seo)
<meta name="description" content="{{ $decodeSeoValue($seo['description'] ?? '') }}">
@if(filled($seo['keywords'] ?? null))
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
] + ((($seo['schema_type'] ?? null) === 'Service' && filled($seo['service_type'] ?? null)) ? [
    'serviceType' => $decodeSeoValue($seo['service_type']),
    'provider' => [
        '@type' => 'Organization',
        'name' => 'i2Medier',
        'url' => url('/'),
    ],
] : []), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endisset
<script type="application/ld+json">{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'i2Medier',
    'url' => url('/'),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@stack('meta')
@vite('resources/css/public.css')
@stack('page_css')
