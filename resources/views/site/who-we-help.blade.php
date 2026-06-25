@extends('public.layouts.app')

@section('title', 'Industry Website Design Services | i2Medier')
@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Who We Help', 'item' => route('site.who-we-help')],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Industry Website Design Services — i2Medier',
    'url' => route('site.who-we-help'),
    'description' => 'i2Medier builds dedicated websites for over 20 industries including law firms, clinics, hotels, restaurants, schools, real estate agencies, and more across Nigeria and worldwide.',
    'provider' => ['@type' => 'Organization', 'name' => 'i2Medier', 'url' => url('/')],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush


@push('page_css')
    @vite('resources/css/public/pages/who-we-help.css')
@endpush

@section('content')
<div class="who-help-page">
  <section class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-inner">
      <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
        <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
        <span aria-current="page">Who We Help</span>
      </div>
      <span class="hero-tag">Industry-Specific Digital Work</span>
      <h1>Websites built around<br>how your <em>industry buys</em></h1>
      <p>Generic agencies build for everyone. We design and build websites shaped around how your specific market evaluates providers, builds trust, and decides to enquire — so every page works harder for the clients you actually want.</p>
      <div class="hero-btns">
        <a href="{{ route('site.start') }}" class="btn-primary">Start Your Project →</a>
        <a href="#industries" class="btn-outline">Browse Industries</a>
      </div>
      <div class="hero-pills">
        <span class="hero-pill">22 Industries</span>
        <span class="hero-pill">Web Design</span>
        <span class="hero-pill">Conversion-Focused</span>
        <span class="hero-pill">Nigeria &amp; Worldwide</span>
      </div>
    </div>
  </section>

  <section id="industries" aria-labelledby="industry-list">
    <div class="section-head">
      <h2 id="industry-list">Industries we <em>build for</em></h2>
      <p>Every page below is built around the specific trust signals, objections, and conversion patterns that matter in that market — not a generic template with a new logo dropped in.</p>
    </div>
    <div class="industry-grid">
      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 8h16"></path><path d="M6 8V6h12v2"></path><path d="M8 8v10"></path><path d="M16 8v10"></path><path d="M5 18h14"></path><path d="M10 12h4"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Law Firms</h3>
        <p>Trust-first website design and conversion-focused positioning for legal practices that need authority, clarity, and enquiry generation.</p>
        <a href="{{ route('site.lawyer') }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v13"></path><path d="M9 20v-4h6v4"></path><path d="M8 9h.01M12 9h.01M16 9h.01"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Accounting Firms</h3>
        <p>Trust-first website design for accounting, tax, and advisory firms that need professionalism, clarity, and higher-value enquiries.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'accounting-firm-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 20V7a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13"></path><path d="M9 9h6"></path><path d="M9 13h6"></path><path d="M10 20v-3h4v3"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Clinics</h3>
        <p>Professional, trust-sensitive websites for clinics and healthcare providers that need stronger patient confidence and easier booking flows.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'clinic-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 20h18"></path><path d="M6 20V8l6-4 6 4v12"></path><path d="M9 12h.01M15 12h.01M12 16h.01"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Real Estate</h3>
        <p>Lead-focused property websites and investor-facing pages designed for stronger trust, better listings presentation, and serious enquiries.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'real-estate-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V5"></path><path d="M20 19V9"></path><path d="M4 19h16"></path><path d="M8 19V11"></path><path d="M12 19V7"></path><path d="M16 19v-5"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Consulting Firms</h3>
        <p>Premium positioning and service clarity for advisory and consulting teams that need their website to support business development.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'consulting-firm-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19h14"></path><path d="M7 19V9l5-4 5 4v10"></path><path d="M10 13h4"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Construction Companies</h3>
        <p>Capability-led websites for builders and contractors that need more proof, stronger credibility, and better project enquiries.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'construction-company-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v18"></path><path d="M7 8h7a3 3 0 1 1 0 6H9a3 3 0 1 0 0 6h8"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Engineering Firms</h3>
        <p>Websites for engineering firms that need stronger authority, clearer technical presentation, and higher-quality project leads.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'engineering-firm-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 8l8-4 8 4-8 4-8-4Z"></path><path d="M6 10v4c0 1.8 2.7 3.5 6 3.5s6-1.7 6-3.5v-4"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Architecture Firms</h3>
        <p>Portfolio-first websites for architecture studios that need elegance, clarity, and more premium enquiry flow.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'architecture-firm-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 8l8-4 8 4-8 4-8-4Z"></path><path d="M6 10v4c0 1.8 2.7 3.5 6 3.5s6-1.7 6-3.5v-4"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Schools</h3>
        <p>Enrollment-focused school websites that help parents understand your values, your offer, and the next step quickly.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'school-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l8 4v5c0 5-3.4 7.9-8 9-4.6-1.1-8-4-8-9V7l8-4Z"></path><path d="M9 12h6"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Churches</h3>
        <p>Warm, structured church websites built for ministries, giving, events, and stronger community connection.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'church-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 15h14"></path><path d="M7 15l1-4h8l1 4"></path><path d="M8 11V9a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><circle cx="8" cy="16.5" r="1.5"></circle><circle cx="16" cy="16.5" r="1.5"></circle></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Hotels</h3>
        <p>Booking-ready hospitality websites that present rooms, amenities, and guest trust more clearly.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'hotel-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 4h10"></path><path d="M6 8h12"></path><path d="M8 12h8"></path><path d="M10 16h4"></path><path d="M9 20h6"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Restaurants</h3>
        <p>Restaurant websites that make menus, reservations, and brand atmosphere easier to experience and act on.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'restaurant-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 4c2.8 0 5 2.2 5 5 0 4-5 9-5 9s-5-5-5-9c0-2.8 2.2-5 5-5Z"></path><circle cx="12" cy="9" r="1.8"></circle></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Beauty &amp; Wellness</h3>
        <p>Polished websites for beauty and wellness brands that need premium presentation, trust, and easier appointment flow.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'beauty-wellness-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 20v-6"></path><path d="M16 20v-6"></path><path d="M7 8h10"></path><path d="M6 8a6 6 0 0 1 12 0"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Fitness</h3>
        <p>Conversion-led websites for gyms, trainers, and studios that need clearer offers and more sign-ups.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'fitness-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 16h12"></path><path d="M8 12h8"></path><path d="M10 8h4"></path><path d="M5 20h14"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Cleaning Companies</h3>
        <p>Service-focused websites for cleaning businesses that need quote requests, local trust, and clear offer pages.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'cleaning-company-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 8v4l3 2"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Logistics Companies</h3>
        <p>Operationally clear websites for logistics and transport brands that need stronger trust and better lead generation.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'logistics-company-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s6-4.4 6-10a6 6 0 1 0-12 0c0 5.6 6 10 6 10Z"></path><circle cx="12" cy="11" r="2"></circle></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Travel Agencies</h3>
        <p>Destination-led travel websites that balance inspiration, trust, and enquiry-ready booking journeys.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'travel-agency-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 18h12"></path><path d="M8 18 7 9l5-3 5 3-1 9"></path><path d="M10 12h4"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Ecommerce Brands</h3>
        <p>Conversion-led ecommerce websites that improve product clarity, trust signals, and the journey from landing to checkout.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'ecommerce-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 7h8"></path><path d="M9 7V5h6v2"></path><path d="M7 10h10l-1 9H8l-1-9Z"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Fashion Brands</h3>
        <p>Brand-led websites for fashion labels that need stronger product storytelling, presentation, and conversion.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'fashion-brand-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 4v16"></path><path d="M6 10h12"></path><path d="M8 20h8"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Event Planners</h3>
        <p>Websites for event brands that need elegant presentation, service clarity, and stronger enquiry flow.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'event-planner-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="7" width="16" height="12" rx="2"></rect><circle cx="12" cy="13" r="3"></circle><path d="M8 7V5"></path><path d="M16 7V5"></path></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Photography</h3>
        <p>Portfolio-first websites for photographers that need visual impact, trust, and cleaner booking enquiries.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'photography-website-design']) }}" class="industry-link">Open page →</a>
      </article>

      <article class="industry-card live">
        <div class="industry-top">
          <div class="industry-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 0-4h-1a2 2 0 0 1 0-4h4a4 4 0 0 0 0-8Z"></path><circle cx="7.5" cy="10.5" r="1"></circle></svg>
          </div>
          <span class="industry-status live">Live</span>
        </div>
        <h3>Personal Brands</h3>
        <p>Positioning-driven websites for experts, founders, coaches, and creators who need stronger authority online.</p>
        <a href="{{ route('site.services.web-design.industry', ['industry' => 'personal-brand-website-design']) }}" class="industry-link">Open page →</a>
      </article>
    </div>
  </section>

  <section class="cta-band" aria-labelledby="cta-h">
    <h2 id="cta-h">Don't see your industry?</h2>
    <p>We work with businesses outside this list too. If your market is not here, tell us what you do — we will apply the same industry-specific thinking to your project.</p>
    <a href="{{ route('site.start') }}" class="btn-dark">Start Your Project →</a>
  </section>
</div>
@endsection
