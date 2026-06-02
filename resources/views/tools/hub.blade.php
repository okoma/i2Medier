@extends('public.layouts.app')

@section('title', 'Free Tools — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section('content')
<div class="tools-page">
    <section class="tools-hero">
        <div class="tools-hero__inner">
            <nav class="tools-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('site.home') }}">Home</a>
                <span>›</span>
                <span aria-current="page">Tools</span>
            </nav>

            <span class="tools-chip">Free Tools</span>
            <h1>Useful tools for Nigerian businesses planning their next digital move.</h1>
            <p>Explore quick, practical tools from i2Medier for SEO checks, cost estimation, naming, project scoping, WhatsApp setup, and simple invoicing.</p>
        </div>
    </section>

    <section class="tools-listing">
        <div class="tools-listing__inner">
            <div class="tools-list">
                @foreach ($tools as $tool)
                    <a href="{{ route($tool['route']) }}" class="tool-row">
                        <span class="tool-row__icon" aria-hidden="true">●</span>
                        <div class="tool-row__body">
                            <span class="tool-row__title">{{ $tool['title'] }}</span>
                            <span class="tool-row__summary">{{ $tool['summary'] }}</span>
                        </div>
                        <span class="tool-row__arrow" aria-hidden="true">→</span>
                    </a>
                @endforeach
            </div>

            <div class="tools-cta-strip">
                <div>
                    <span class="tools-cta-strip__label">Need more than a quick tool?</span>
                    <p>Turn the result into a real project plan with our guided onboarding.</p>
                </div>
                <a href="{{ route('site.start') }}" class="tools-button tools-button--dark">Start Your Project</a>
            </div>
        </div>
    </section>
</div>
@endsection
