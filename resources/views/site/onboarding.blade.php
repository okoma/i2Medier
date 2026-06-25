@extends('public.layouts.onboarding')

@section('title', 'Start a Project — i2Medier')
@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Start a Project', 'item' => route('site.start')],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush


@push('page_css')
    @vite('resources/css/public/pages/onboarding.css')
@endpush

@section('content')
    @include('site.partials.onboarding-form')
@endsection
