@extends('public.layouts.app')

@section('title', $industry['title'] . ' | i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/web-design-industry.css')
@endpush

@section('content')
<div class="industry-web-page">
  <section class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="hero-grid">
      <div class="hero-copy">
        <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
          <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
          <a href="{{ route('site.services') }}">Services</a><span class="breadcrumb-sep">›</span>
          <a href="{{ route('site.services.web-design') }}">Web Design</a><span class="breadcrumb-sep">›</span>
          <span aria-current="page">{{ $industry['title'] }}</span>
        </div>
        <span class="eyebrow">Web Design</span>
        <h1>{{ $industry['heading'] }}</h1>
        <p>{{ $industry['summary'] }}</p>
      </div>
      <div class="hero-note">
        <h3>{{ $industry['title'] }}</h3>
        <p>{{ $industry['audience'] }} {{ $industry['offer'] }}</p>
      </div>
    </div>
  </section>

  <section aria-labelledby="industry-features">
    <div class="section-head">
      <h2 id="industry-features">What this kind of <em>website needs</em></h2>
      <p>These pages are built to be industry-aware, not generic. The structure, messaging, and calls to action are shaped around how this market evaluates providers and decides to enquire.</p>
    </div>
    <div class="feature-grid">
      <article class="feature-card">
        <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16"></path><path d="M7 4h10v16H7z"></path><path d="M9 11h6"></path><path d="M9 15h4"></path></svg></div>
        <div><h3>Clear service structure</h3><p>{{ $industry['features'][0] }}</p></div>
      </article>
      <article class="feature-card">
        <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a4 4 0 0 0-4 4v2H7a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-1V7a4 4 0 0 0-4-4Z"></path><path d="M12 14v2"></path></svg></div>
        <div><h3>Trust-first presentation</h3><p>{{ $industry['features'][1] }}</p></div>
      </article>
      <article class="feature-card">
        <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 8v4l3 2"></path></svg></div>
        <div><h3>Faster decision-making</h3><p>{{ $industry['features'][2] }}</p></div>
      </article>
      <article class="feature-card">
        <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20h16"></path><path d="M7 15l3-3 3 2 4-5"></path><path d="M17 9h2v2"></path></svg></div>
        <div><h3>Better enquiry flow</h3><p>{{ $industry['features'][3] }}</p></div>
      </article>
    </div>
  </section>

  <section class="benefit-band" aria-labelledby="benefits">
    <div class="section-head">
      <h2 id="benefits">Why take an <em>industry-specific</em> approach</h2>
      <p>Generic service pages say you work with everyone. Industry-specific pages show you understand how that market buys, what it worries about, and what makes it trust a provider enough to reach out.</p>
    </div>
    <div class="benefit-grid">
      <article class="benefit-card">
        <h3>Sharper positioning</h3>
        <p>The message becomes clearer when the page speaks directly to one market instead of trying to address every possible audience at once.</p>
      </article>
      <article class="benefit-card">
        <h3>Higher trust</h3>
        <p>Visitors are more likely to convert when they feel the page was built for businesses like theirs, not copied from a broad services template.</p>
      </article>
      <article class="benefit-card">
        <h3>Better expansion later</h3>
        <p>This gives us a scalable structure for future industry pages, case studies, ads, SEO targets, and service positioning under your web design offering.</p>
      </article>
    </div>
  </section>

  <section class="cta-band" id="contact">
    <h2>Ready to build a better {{ strtolower($industry['title']) }} page?</h2>
    <p>We can turn this industry direction into a conversion-focused website or landing page built around trust, clarity, and real enquiry flow.</p>
    <a href="mailto:hello@i2medier.com?subject={{ rawurlencode($industry['title']) }}" class="cta-btn">{{ $industry['cta'] }} →</a>
  </section>
</div>
@endsection
