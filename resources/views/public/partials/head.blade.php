<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $title }}</title>
@isset($seo)
<meta name="description" content="{{ $seo['description'] }}">
@if(filled($seo['keywords']))
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
] + (($seo['schema_type'] === 'Service' && filled($seo['service_type'])) ? [
    'serviceType' => $seo['service_type'],
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
