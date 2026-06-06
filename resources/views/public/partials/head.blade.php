<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    $organizationSchemaId = url('/') . '#organization';
@endphp
<title>{{ $decodeSeoValue($title ?? 'i2Medier') }}</title>
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
@php
    $pageSchema = [
        '@context' => 'https://schema.org',
        '@type' => $seo['schema_type'] ?? 'WebPage',
        'name' => $decodeSeoValue($seo['title'] ?? ''),
        'description' => $decodeSeoValue($seo['description'] ?? ''),
        'url' => $seo['url'] ?? url()->current(),
        'publisher' => [
            '@id' => $organizationSchemaId,
        ],
    ];

    if (($seo['schema_type'] ?? null) === 'Service' && filled($seo['service_type'] ?? null)) {
        $serviceName = $decodeSeoValue($seo['service_type']);

        $pageSchema = array_merge($pageSchema, [
            '@id' => ($seo['url'] ?? url()->current()) . '#service',
            'name' => $serviceName,
            'serviceType' => $serviceName,
            'provider' => [
                '@id' => $organizationSchemaId,
            ],
            'brand' => [
                '@type' => 'Brand',
                'name' => 'i2Medier',
            ],
            'areaServed' => [
                ['@type' => 'Country', 'name' => 'Nigeria'],
                ['@type' => 'Country', 'name' => 'United Kingdom'],
                ['@type' => 'Country', 'name' => 'United States'],
                ['@type' => 'Country', 'name' => 'Canada'],
            ],
            'audience' => [
                '@type' => 'BusinessAudience',
                'audienceType' => 'Businesses, startups, agencies, and growing organisations',
            ],
            'availableChannel' => [
                '@type' => 'ServiceChannel',
                'serviceUrl' => $seo['url'] ?? url()->current(),
                'availableLanguage' => ['en'],
            ],
            'offers' => [
                '@type' => 'Offer',
                'url' => $seo['url'] ?? url()->current(),
                'availability' => 'https://schema.org/InStock',
                'priceCurrency' => 'NGN',
                'eligibleRegion' => [
                    'Nigeria',
                    'United Kingdom',
                    'United States',
                    'Canada',
                ],
                'seller' => [
                    '@id' => $organizationSchemaId,
                ],
            ],
            'category' => 'Digital services',
        ]);
    }
@endphp
<script type="application/ld+json">{!! json_encode($pageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endisset
<script type="application/ld+json">{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => ['Organization', 'LocalBusiness'],
    '@id' => $organizationSchemaId,
    'name' => 'i2Medier',
    'url' => url('/'),
    'email' => 'letstalk@i2medier.com',
    'areaServed' => ['Nigeria', 'United Kingdom', 'United States', 'Canada'],
    'sameAs' => [
        'https://www.linkedin.com/company/i2medier',
        'https://www.instagram.com/i2medier',
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@stack('meta')
@vite('resources/css/public.css')
@stack('page_css')
