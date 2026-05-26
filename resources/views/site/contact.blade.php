@extends('public.layouts.app')

@section('title', 'Contact i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/contact.css')
@endpush

@push('meta')
<script type="application/ld+json">{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => $contact['studio'],
    'url' => url('/'),
    'email' => $contact['email'],
    'telephone' => $contact['phone_display'],
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => $contact['address_title'],
        'addressCountry' => 'NG',
    ],
    'sameAs' => collect($contact['socials'])->pluck('url')->values()->all(),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('content')
<div class="contact-page">
    <section class="hero">
        <div class="hero-glow" aria-hidden="true"></div>
        <div class="hero-grid" aria-hidden="true"></div>
        <div class="hero-copy">
            <span class="hero-tag">Contact i2Medier</span>
            <h1>Let’s talk about your<br><em>next digital project</em></h1>
            <p>Reach out for web design, Laravel development, WordPress builds, SEO, mobile apps, business email setup, and cloud infrastructure work. If your project needs strategy and execution, this is the right place to start.</p>
            <div class="hero-actions">
                <a href="mailto:{{ $contact['email'] }}" class="btn-primary">Email Us</a>
                <a href="{{ $contact['phone_href'] }}" class="btn-secondary">Call Us</a>
            </div>
        </div>
        <div class="hero-card">
            <div class="hero-card-label">Quick Contact</div>
            <div class="hero-contact-list">
                <a href="mailto:{{ $contact['email'] }}" class="hero-contact-item">
                    <span class="hero-ico" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m4 7 8 6 8-6"></path></svg>
                    </span>
                    <span>
                        <strong>Email</strong>
                        <small>{{ $contact['email'] }}</small>
                    </span>
                </a>
                <a href="{{ $contact['phone_href'] }}" class="hero-contact-item">
                    <span class="hero-ico" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.4 19.4 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 3.1a2 2 0 0 1-.6 1.8l-1.3 1.3a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 1.8-.6l3.1.5a2 2 0 0 1 1.7 2Z"></path></svg>
                    </span>
                    <span>
                        <strong>Phone</strong>
                        <small>{{ $contact['phone_display'] }}</small>
                    </span>
                </a>
                <div class="hero-contact-item is-static">
                    <span class="hero-ico" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none"><path d="M12 21s-6-4.35-6-10a6 6 0 1 1 12 0c0 5.65-6 10-6 10Z"></path><circle cx="12" cy="11" r="2.5"></circle></svg>
                    </span>
                    <span>
                        <strong>Address</strong>
                        <small>{{ $contact['address_title'] }}</small>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-grid-section">
        <div class="contact-grid">
            <article class="panel">
                <div class="panel-label">Address</div>
                <h2>Where we work</h2>
                <div class="stack">
                    @foreach ($contact['address_lines'] as $line)
                        <p>{{ $line }}</p>
                    @endforeach
                    <p class="lead">{{ $contact['address_title'] }}</p>
                </div>
            </article>

            <article class="panel">
                <div class="panel-label">Phone</div>
                <h2>Speak with us</h2>
                <a href="{{ $contact['phone_href'] }}" class="detail-link">{{ $contact['phone_display'] }}</a>
                <p>{{ $contact['hours'] }}</p>
            </article>

            <article class="panel">
                <div class="panel-label">Email</div>
                <h2>Send a project brief</h2>
                <a href="mailto:{{ $contact['email'] }}" class="detail-link">{{ $contact['email'] }}</a>
                <p>Share your scope, timeline, and goals, and we’ll point you in the right direction.</p>
            </article>

            <article class="panel">
                <div class="panel-label">YB Local</div>
                <h2>Our profile</h2>
                <a href="{{ $contact['yb_local_url'] }}" target="_blank" rel="noreferrer" class="detail-link">{{ $contact['yb_local_label'] }}</a>
                <p>Use this slot for your live YB Local listing so people can see your business profile, reviews, and public business details.</p>
            </article>
        </div>
    </section>

    <section class="socials-section">
        <div class="section-head">
            <span class="section-tag">Social Links</span>
            <h2>Follow i2Medier across the platforms your audience already uses</h2>
            <p>Keep these links updated in one place as your public profiles go live or change.</p>
        </div>
        <div class="social-grid">
            @foreach ($contact['socials'] as $social)
                <a href="{{ $social['url'] }}" target="_blank" rel="noreferrer" class="social-card">
                    <div class="social-name">{{ $social['label'] }}</div>
                    <div class="social-handle">{{ $social['handle'] }}</div>
                </a>
            @endforeach
        </div>
    </section>

    <section class="map-section">
        <div class="section-head">
            <span class="section-tag">Map</span>
            <h2>Find us on the map</h2>
            <p>Use this embedded map as the visual anchor for your office area or appointment meeting point.</p>
        </div>
        <div class="map-shell">
            <iframe
                src="{{ $contact['map_embed'] }}"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="i2Medier location map"></iframe>
        </div>
    </section>
</div>
@endsection
