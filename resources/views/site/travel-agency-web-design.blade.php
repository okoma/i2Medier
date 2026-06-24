@extends('public.layouts.app')

@section('title', 'Travel Agency Website Design Company in Nigeria | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Design', 'item' => route('site.services.web-design')],
        ['@type' => 'ListItem', 'position' => 4, 'name' => 'Travel Agency Web Design', 'item' => route('site.services.web-design.industry', ['industry' => 'travel-agency-website-design'])],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'Can I manage and add tour packages myself after the website launches?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — this is a core principle of every site we build. We use ACF Pro to create an intuitive package management system in WordPress admin. You can add new destinations, edit existing package details, update prices, change itineraries, and publish seasonal promotions without touching a line of code. Every handover includes a CMS training session and a written admin guide specifically covering travel package management workflows.']],
        ['@type' => 'Question', 'name' => 'Can clients pay deposits or make bookings online through the website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We can integrate Paystack or Flutterwave for online deposit collection — enabling clients to secure their booking immediately with a partial payment while your team finalises the full package details. For agencies that prefer an enquiry-first model, we build structured booking enquiry forms that capture all the necessary trip details and send them directly to your email, WhatsApp, and CRM. Online payment integration is available on the Growth and Enterprise packages.']],
        ['@type' => 'Question', 'name' => 'Can you display IATA membership and other travel industry credentials on the website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Absolutely — and we consider this a priority, not an afterthought. Your IATA accreditation, NANTA membership, years of operation, airline partnerships, and any travel insurance affiliations are designed into the website as prominent trust anchors. They appear on your homepage, in your site header or footer, and on individual package pages — because first-time clients booking international travel need to see these credentials immediately to feel confident proceeding.']],
        ['@type' => 'Question', 'name' => 'How do you keep visa service pages up to date as requirements change?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Each visa service page is built in WordPress with a simple editing interface — your team can update visa requirements, processing times, fee information, and documentation checklists immediately when they change, without needing to contact us. For agencies on a monthly retainer, we monitor and update visa pages as part of the ongoing service. We also include a content review reminder in your admin guide, recommending a monthly check of each active visa page against the relevant embassy guidelines.']],
        ['@type' => 'Question', 'name' => 'Do you write destination blog content for travel agencies?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. On our monthly retainer packages, we include destination blog articles written for Nigerian travellers — covering topics like "best time to visit Dubai from Nigeria", "UK visa requirements for Nigerian passport holders 2026", "Istanbul travel guide from Lagos", and similar high-search-volume content that attracts serious travellers to your website through organic Google search. These articles build topical authority over time and create additional entry points for prospective clients to discover your agency.']],
        ['@type' => 'Question', 'name' => 'How long does it take to build a travel agency website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A standard travel agency website with destination pages, visa services, and a booking enquiry system typically takes 3–5 weeks from design approval to launch. Larger projects with booking engines, Paystack payment integration, and extensive destination libraries may take 6–8 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when. We have never missed a launch date on a project where the client delivered content on schedule.']],
        ['@type' => 'Question', 'name' => 'Can the website show prices in multiple currencies — naira and pounds?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — multi-currency pricing display is available on our Enterprise packages. This is particularly valuable for agencies serving both the Nigerian domestic market and the Nigerian diaspora in the UK, US, or Canada, where clients may wish to compare prices in their local currency. The currency display can be set automatically by visitor location or offered as a manual toggle, depending on your preference. For the Essential and Growth packages, we display prices in naira as standard, with the option to add a currency note for overseas visitors.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/travel-agency-web-design.css')
@endpush

@section('content')
<!-- ═══ HERO ═══ -->
<header class="hero">
  <div class="hero-glow" aria-hidden="true"></div>
  <div class="hero-grid" aria-hidden="true"></div>
  <div class="hero-left">
    <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
      <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
      <a href="{{ route('site.services') }}">Services</a><span class="breadcrumb-sep">›</span>
      <a href="{{ route('site.services.web-design') }}">Web Design</a><span class="breadcrumb-sep">›</span>
      <span aria-current="page">Web Design for Travel Agencies</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Travel Agency Website Design</span>
    <h1>Travel websites that turn<br>inspiration into<br><em>booked holidays</em></h1>
    <p class="hero-sub">We build beautiful, destination-led websites specifically for travel agencies, tour operators, and holiday planners in Nigeria and the UK — designed to convert curious browsers into paying clients through stunning package pages, seamless enquiry flows, and Google rankings that bring travellers directly to you.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Travel Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Built for travel & tourism — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span> Online booking & enquiry systems</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria & UK specialists</span>
    </div>
  </div>

  <!-- Travel website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M17.8 19.2 16 11l3.5-3.5C21 6 21 4 21 4s-2 0-3.5 1.5L14 9 5.8 7.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 3.3c.3.4.8.5 1.3.3l.5-.3c.4-.3.6-.7.5-1.1z"/></svg></div>
        <div>
          <div class="float-notif-text">New booking enquiry · Dubai Package · 2 adults</div>
          <div class="float-notif-sub">just now</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">horizontravel.com.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Horizon <span>Travel</span></div>
            <div class="msn-links">
              <span class="msn-link">Destinations</span>
              <span class="msn-link">Packages</span>
              <span class="msn-link">Visa</span>
              <span class="msn-link">About</span>
              <span class="msn-link">Blog</span>
              <span class="msn-cta">Book Now</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Lagos · Abuja · London</div>
            <div class="msh-h1">Your Journey to<br>the World <span>Starts Here</span></div>
            <div class="msh-sub">Curated holiday packages, visa services, and tailor-made travel experiences for Nigerians exploring the world.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Browse Packages</span>
              <span class="msh-btn-s">Get a Quote →</span>
            </div>
          </div>
          <!-- Package cards -->
          <div class="mock-site-packages">
            <div class="msp-label">Featured Packages</div>
            <div class="msp-grid">
              <div class="msp-card">
                <div class="msp-dest">Dubai</div>
                <div class="msp-days">5 Days</div>
                <div class="msp-price">from ₦850k</div>
              </div>
              <div class="msp-card">
                <div class="msp-dest">London</div>
                <div class="msp-days">7 Days</div>
                <div class="msp-price">from ₦1.2M</div>
              </div>
              <div class="msp-card">
                <div class="msp-dest">Istanbul</div>
                <div class="msp-days">6 Days</div>
                <div class="msp-price">from ₦950k</div>
              </div>
              <div class="msp-card">
                <div class="msp-dest">Zanzibar</div>
                <div class="msp-days">5 Days</div>
                <div class="msp-price">from ₦780k</div>
              </div>
            </div>
            <div class="msp-avail"><span class="msp-avail-dot"></span> Live availability — updated daily</div>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">500<span>+</span></div><div class="mst-lbl">Trips Booked</div></div>
            <div class="mst-item"><div class="mst-num">IATA</div><div class="mst-lbl">Member</div></div>
            <div class="mst-item"><div class="mst-num">4.9<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rating</div></div>
            <div class="mst-item"><div class="mst-num">10<span>yrs</span></div><div class="mst-lbl">Experience</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "travel agency Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Leisure Travel Agencies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Corporate Travel Management</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Tour Operators</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Honeymoon & Romance Travel</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Pilgrimage & Religious Travel (Hajj/Umrah)</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Student & Educational Tours</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Adventure Travel Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Cruise Specialists</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Visa & Immigration Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Destination Wedding Planners</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Leisure Travel Agencies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Corporate Travel Management</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Tour Operators</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Honeymoon & Romance Travel</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Pilgrimage & Religious Travel (Hajj/Umrah)</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Student & Educational Tours</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Adventure Travel Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Cruise Specialists</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Visa & Immigration Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Destination Wedding Planners</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most travel agency<br>websites <em>lose bookings</em></h2>
    </div>
    <p>Nigerian travellers are researching their next holiday online before they ever pick up a phone. They compare packages, read reviews, check visa requirements, and decide — all without speaking to anyone. If your website does not make that journey easy, beautiful, and trustworthy, they book with a competitor whose website does. Here is what goes wrong on most travel agency websites — and exactly what we do about it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg></span>
      <h3 class="prob-title">Clients browse Instagram but book with competitors who have a professional website</h3>
      <p class="prob-desc">Your Instagram posts inspire thousands but when interested followers click through to your website, they find an outdated page that fails to convert that inspiration into an enquiry. Beautiful destination photography deserves a website that matches it.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Aspirational, destination-led website design that channels the inspiration from social media into a seamless journey to enquiry — with package pages that sell the experience, not just the itinerary.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">No searchable tour packages — clients can't browse without calling first</h3>
      <p class="prob-desc">If your packages only exist in a PDF or a WhatsApp catalogue, you are creating friction at the most critical stage of the decision process. Travellers want to browse, compare, and visualise their holiday before they commit to an enquiry call.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Fully searchable and filterable tour package pages — each destination and package with its own dedicated page, itinerary, inclusions list, pricing tiers, and enquiry button that captures serious leads.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <h3 class="prob-title">Missing on Google when Nigerians search for travel deals and destinations</h3>
      <p class="prob-desc">When a Lagos professional searches "Dubai holiday package Nigeria" or "travel agency Lagos cheap flights", your agency does not appear. That search — worth thousands of naira in potential bookings — goes to a competitor who invested in SEO.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every website we build includes destination-specific SEO — individual pages targeting the exact keyword combinations your potential clients type when they are ready to book. TravelAgency schema markup for rich search results.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></span>
      <h3 class="prob-title">No visa services page — a major revenue stream buried or missing entirely</h3>
      <p class="prob-desc">Visa assistance is one of the highest-intent services Nigerians search for online. Thousands of people search for UK visa agents, US visa help, Schengen visa Nigeria every month. If you do not have a dedicated visa services page optimised for these terms, you are leaving that revenue on the table.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A dedicated visa services section with individual country pages — UK, US, Schengen, UAE, Canada — each targeting specific high-intent keyword searches and structured to capture enquiries from people who are ready to proceed immediately.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M8.5 9.5c0-1.1 1.1-2 2.5-2h2c1.4 0 2.5.9 2.5 2s-1.1 2-2.5 2h-2c-1.4 0-2.5.9-2.5 2s1.1 2 2.5 2h2c1.4 0 2.5-.9 2.5-2"/><path d="M12 6v12"/></svg></span>
      <h3 class="prob-title">Package prices aren't clear — visitors leave without enquiring because they fear hidden costs</h3>
      <p class="prob-desc">Ambiguous pricing is one of the single biggest conversion killers in travel. When a prospective client cannot find clear pricing or at least a transparent "from" price with inclusions, they assume the worst and exit. Price transparency builds trust, not fear.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Clear package pricing with inclusions, exclusions, and payment structure displayed honestly on every package page. "Starting from" pricing with a clear breakdown eliminates the fear of hidden costs and dramatically increases enquiry rates.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></span>
      <h3 class="prob-title">No testimonials or trip reviews — trust gap prevents first-time bookings</h3>
      <p class="prob-desc">Travel is a high-value, high-trust purchase. Before a Nigerian family commits ₦1M+ to a holiday, they want to see evidence that others have traveled safely and happily with you. Without visible reviews and trip stories, first-time clients will choose an agency with social proof over yours every time.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A dedicated testimonials and trip reviews section with client photos, trip ratings, and authentic stories from past travellers — built to address the specific trust barriers that stop first-time clients from booking.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your travel<br>agency's website <em>needs</em></h2>
      <p>A high-performing travel agency website is not a homepage with a contact number. It is a comprehensive, strategically structured platform — each page designed to serve a traveller at a specific stage of their decision journey, and each optimised to rank for the search terms your clients use when planning their next holiday.</p>
      <p>We map your destinations, package types, visa services, and specialist offerings to a complete page architecture that works for both Google and the travelling public.</p>
      <ul class="bullets">
        <li>Homepage with featured packages & enquiry CTA</li>
        <li>Individual destination pages (Dubai, UK, US, Turkey, Ghana, and more)</li>
        <li>Tour package pages — with full itinerary, inclusions, exclusions, and pricing</li>
        <li>Visa services page with per-country breakdown (UK, US, Schengen, UAE, Canada)</li>
        <li>Group travel & corporate packages section</li>
        <li>Honeymoon & special occasion packages</li>
        <li>Blog — travel guides, visa tips, destination features, travel news</li>
        <li>About & team credentials — IATA membership, years of experience, team profiles</li>
        <li>Testimonials & trip reviews from verified past travellers</li>
        <li>Contact & booking enquiry form with trip details capture</li>
      </ul>
      <a href="#contact" class="build-cta">Plan My Website Architecture →</a>
    </div>

    <!-- Pages wireframe visual -->
    <div class="pages-visual reveal" aria-hidden="true">
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Homepage</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Dubai Package</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Visa Services</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Trip Reviews</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Honeymoon Packages</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Travel Blog</span><span class="pch-badge key">SEO Engine</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SERVICES WE INCLUDE ═══ -->
<section class="services-section" aria-labelledby="svc-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">What's Included</span>
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>travel agencies</em></h2>
    </div>
    <p>Every travel agency website we build is designed around the specific trust signals, booking patterns, and conversion architecture of the travel industry. These are not generic business website features — they are travel-specific elements that directly impact whether a browsing prospect makes an enquiry or books a package.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></div>
      <h3 class="svc-title">Tour Package Pages (per destination)</h3>
      <p class="svc-desc">Individual pages for every tour package and destination you offer — Dubai, UK, Istanbul, Zanzibar, Maldives, and beyond. Each page includes the full itinerary, day-by-day breakdown, inclusions, exclusions, pricing tiers, and a prominent booking enquiry form. These pages are optimised for destination-specific search terms that attract travellers who are actively planning.</p>
      <div class="svc-tags"><span class="svc-tag">Itinerary Builder</span><span class="svc-tag">Inclusions List</span><span class="svc-tag">Photo Gallery</span><span class="svc-tag">Pricing Display</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg></div>
      <h3 class="svc-title">Visa Services Pages (per country)</h3>
      <p class="svc-desc">Dedicated pages for every visa service you offer — UK Tourist Visa, US B1/B2 Visa, Schengen Visa, UAE Visit Visa, and more. Each page is keyword-optimised to rank when Nigerians search for visa assistance, capturing high-intent prospects at the exact moment they need your services. A goldmine of organic traffic hiding in plain sight.</p>
      <div class="svc-tags"><span class="svc-tag">Country-Specific Pages</span><span class="svc-tag">Keyword Targeting</span><span class="svc-tag">Process Explainer</span><span class="svc-tag">Requirements List</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
      <h3 class="svc-title">Online Booking & Enquiry System</h3>
      <p class="svc-desc">A structured booking enquiry system that captures the right information — destination, travel dates, number of passengers, special requirements — so your team can respond with a tailored quote immediately. Integration with WhatsApp, email, and CRM tools. For agencies ready to take deposits online, Paystack payment integration is available.</p>
      <div class="svc-tags"><span class="svc-tag">Enquiry Forms</span><span class="svc-tag">WhatsApp Integration</span><span class="svc-tag">Paystack Deposits</span><span class="svc-tag">CRM Integration</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4.19.5A2.5 2.5 0 0 0 6.5 22H20"/><path d="M5 2h13a2 2 0 0 1 2 2v18"/><path d="M8 7h8"/><path d="M8 11h8"/><path d="M8 15h5"/></svg></div>
      <h3 class="svc-title">Destination Blog & SEO Content</h3>
      <p class="svc-desc">A fully managed blog section for publishing travel guides, visa tips, destination features, packing lists, and travel news from Nigeria's perspective. Each article is an additional SEO landing page — building topical authority and attracting organic traffic from Nigerians planning their next holiday. "Best time to visit Dubai from Nigeria" brings you travellers before they even know they need an agent.</p>
      <div class="svc-tags"><span class="svc-tag">Travel Guides</span><span class="svc-tag">Visa Tips</span><span class="svc-tag">Destination Features</span><span class="svc-tag">SEO Articles</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></div>
      <h3 class="svc-title">IATA & Industry Credentials Display</h3>
      <p class="svc-desc">Your IATA membership, IATAN accreditation, NANTA membership, years in operation, insurance partnerships, and airline relationships are displayed prominently as trust anchors — not hidden in a footer. First-time clients booking international travel need to see these credentials immediately to feel safe handing over their money and passports.</p>
      <div class="svc-tags"><span class="svc-tag">IATA Badge</span><span class="svc-tag">NANTA Membership</span><span class="svc-tag">Insurance Display</span><span class="svc-tag">Years in Business</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">SEO for Travel Keywords</h3>
      <p class="svc-desc">Title tags, meta descriptions, and content optimised for high-intent travel search terms — "travel agency Lagos", "Dubai holiday package Nigeria", "Hajj packages Nigeria". TravelAgency, TouristAttraction, and LocalBusiness schema markup for rich search results. Google Business Profile optimisation for local map pack rankings in Lagos, Abuja, and Port Harcourt.</p>
      <div class="svc-tags"><span class="svc-tag">Travel Keywords</span><span class="svc-tag">TravelAgency Schema</span><span class="svc-tag">Local SEO</span><span class="svc-tag">Map Pack Rankings</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Travel Agencies</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when travellers are<br>searching for <em>their next holiday</em></h2>
      <p>The moment a Nigerian traveller types "travel agency Lagos" or "Dubai holiday package Nigeria" into Google, they are ready to spend money. If your agency does not appear on page one, that booking goes to a competitor. Every website we build for travel agencies is engineered to rank for the exact search terms your ideal clients use when they are planning a trip.</p>
      <p>We build destination-specific SEO into the architecture of your entire website — homepage, package pages, visa service pages, and blog articles are all individually optimised for specific keyword targets. We implement TravelAgency and LocalBusiness schema markup so Google understands precisely what you offer and who you serve across Lagos, Abuja, and beyond.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for every destination and package you offer</li>
        <li>Country-specific visa pages targeting high-intent visa assistance searches</li>
        <li>TravelAgency + LocalBusiness JSON-LD schema markup on every relevant page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Destination blog articles targeting long-tail travel planning searches</li>
        <li>Citation building across Nigerian travel and business directories</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Travel Agency — Keyword Rankings (before & after)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">travel agency lagos</span>
            <span class="kw-vol">8,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">tour operator nigeria</span>
            <span class="kw-vol">4,600/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">dubai holiday package nigeria</span>
            <span class="kw-vol">3,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">uk visa agent nigeria</span>
            <span class="kw-vol">5,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">honeymoon packages nigeria</span>
            <span class="kw-vol">2,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">hajj umrah travel nigeria</span>
            <span class="kw-vol">3,100/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">travel agency abuja</span>
            <span class="kw-vol">3,600/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">cheap flights nigeria</span>
            <span class="kw-vol">6,800/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active travel agency SEO campaign</div>
    </div>
  </div>
</section>

<!-- ═══ TRUST SIGNALS ═══ -->
<section class="trust-section" aria-labelledby="trust-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why i2Medier</span>
      <h2 class="s-head" id="trust-heading">Numbers that make<br>the <em>case for us</em></h2>
    </div>
    <p>We have built websites for travel agencies, tour operators, and hospitality businesses across Nigeria and the UK. These are the outcomes our clients consistently see.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="380">0</span><span>%</span></div>
      <div class="trust-label">Average increase in booking enquiries within the first 90 days of a new travel agency website launch with full SEO</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="96">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) achieved on our custom-built travel agency websites — fast-loading pages keep travellers engaged</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="5">0</span><span>×</span></div>
      <div class="trust-label">Increase in package page conversions when destination pages include full itinerary, gallery, pricing, and an optimised enquiry form</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched travel agency website — with a milestone-based delivery timeline guaranteed in writing</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Professional websites delivered across Nigeria, the UK, the US, and Canada — all built on custom code, never templates</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
      <div class="trust-num">100<span>%</span></div>
      <div class="trust-label">Client code ownership on delivery — every file, every database, every credential transferred to you unconditionally at handover</div>
    </div>
  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section class="process-section" aria-labelledby="process-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Process</span>
      <h2 class="s-head" id="process-heading">From brief to live site<br>in <em>five structured steps</em></h2>
    </div>
    <p>We have delivered over 120 professional websites across industries. This process works — refined to eliminate the surprises, delays, and scope disagreements that make most agency relationships frustrating. Travel agency projects have an additional layer of destination and package content planning built into every stage.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery & Destination Audit</div>
      <p class="proc-desc">A structured discovery session covering your agency's services, destination portfolio, target travellers, competitive landscape, and growth goals. We audit every destination and package you currently offer, map your complete site architecture — every destination page, package page, visa page, and blog topic — and agree on it in writing before any design work begins.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Package Inventory</span><span class="proc-tag">Keyword Map</span><span class="proc-tag">Signed Brief</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Visual Design — Aspirational, Destination-Led</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for all key pages. We design around aspirational destination imagery, your brand colours, and a conversion architecture that turns inspiration into enquiry. Package cards, destination hero images, trust badges, and enquiry forms are designed to work as a coherent visual system. Two revision rounds included.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build — Package Pages & Booking System</div>
      <p class="proc-desc">Your website is built on a custom PHP WordPress theme — no Elementor, no page builders. ACF Pro powers your destination pages, package listings, visa service entries, testimonials, and blog — all fully editable from WordPress admin without touching code. The booking enquiry system is built and tested. A staging environment is accessible throughout so you can review progress.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">ACF Pro</span><span class="proc-tag">Booking System</span><span class="proc-tag">Staging Access</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO & Content</div>
      <p class="proc-desc">Your content is entered across all pages, formatted correctly, and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, schema markup (TravelAgency, LocalBusiness, TouristAttraction), canonical URLs, XML sitemap, and Google Search Console submission. All destination pages, package pages, and visa pages are individually keyword-targeted. GA4 installed and tracking verified.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Travel Schema</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA & Launch</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 90+), form testing, booking enquiry flow verification, link check, and a final review call before launch day. Your domain is transferred, SSL is verified, and Cloudflare is configured. You receive a 45-minute CMS training session covering how to add destinations, edit packages, and publish blog articles — plus a written admin guide.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">30-Day Support</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly Retainer — SEO & Content</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your site ranking and growing — publishing destination blog articles, building local SEO citations, creating new package pages for seasonal promotions, monitoring Core Web Vitals, running daily backups, and delivering monthly keyword ranking reports. Travel agencies on retainer consistently see their strongest ROI in months 4–12.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Package Updates</span><span class="proc-tag">Blog Content</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Travel websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the agency's destinations, specialisms, and target traveller profile.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--travel-dk) 0%,#0d9488 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Horizon Travel</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Leisure & Package Holidays</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Dubai</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">UK</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Turkey</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Leisure & Package Holidays</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Travel Agency · Lagos, Nigeria</div>
        <div class="port-title">Horizon Travel</div>
        <p class="port-desc">Full website with 20+ destination and package pages, visa services section, trip reviews, enquiry system, and an SEO campaign that reached page one for "travel agency Lagos" within 90 days.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a2218 0%,#0e3828 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Global Wings Travel</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Corporate & Group Travel</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Corporate</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">MICE</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Group</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Corporate Travel</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Travel Management Company · Abuja, Nigeria</div>
        <div class="port-title">Global Wings Travel</div>
        <p class="port-desc">Corporate and group travel management platform with dedicated MICE pages, corporate travel policy content, group booking enquiry system, and portal for repeat corporate clients.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#2d1b69 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Adeola Travels</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Diaspora & UK Market</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Diaspora</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Home Trips</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Visa</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Diaspora & UK Market</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Travel Agency · London + Lagos</div>
        <div class="port-title">Adeola Travels</div>
        <p class="port-desc">Dual-market travel website targeting Nigerian diaspora in the UK — with UK-specific visa content, Nigeria home trip packages, and a content strategy bridging both markets from a single website.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
@include('site.partials.industry-package')


<!-- ═══ COMPARISON TABLE ═══ -->
<section class="compare-section" aria-labelledby="compare-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why Choose i2Medier</span>
      <h2 class="s-head" id="compare-heading">How we compare to<br><em>your other options</em></h2>
    </div>
    <p>Not all web development options are equal — especially for travel agencies where beautiful design and searchable package pages are essential to converting visitors into bookings.</p>
  </div>
  <div class="compare-wrap"><table class="compare-table reveal" role="table" aria-label="Web design comparison for travel agencies">
    <thead>
      <tr>
        <th>Feature</th>
        <th>DIY (Wix / Squarespace)</th>
        <th class="hl">i2Medier Custom Build</th>
        <th>Generic Freelancer</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="feature">Built specifically for travel agencies</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Travel-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Individual tour package pages</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Limited</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Unlimited, SEO-optimised</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Usually a list, not pages</span></td>
      </tr>
      <tr>
        <td class="feature">Visa services pages (per country)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included, fully optimised</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely built properly</span></td>
      </tr>
      <tr>
        <td class="feature">Online booking & enquiry integration</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic forms only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full system with CRM</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely complete</span></td>
      </tr>
      <tr>
        <td class="feature">Destination blog & SEO content</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> No SEO strategy</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full travel blog CMS</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on scope</span></td>
      </tr>
      <tr>
        <td class="feature">TravelAgency schema markup</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">IATA & industry credentials display</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> No template for this</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Prominently designed in</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often an afterthought</span></td>
      </tr>
      <tr>
        <td class="feature">Full code ownership on delivery</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Platform-locked forever</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Unconditional ownership</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often withheld</span></td>
      </tr>
    </tbody>
  </table></div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What travel agencies say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Before i2Medier built our website, all our bookings came through WhatsApp referrals. Within four months of launching the new site, we were getting serious enquiries from Google every single day. The package pages they designed are exactly what our clients needed — they can see the itinerary, the price, what's included, and just click to enquire. Our booking rate has gone through the roof."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Mrs. Adaeze Okafor</div><div class="test-role">Founder · Horizon Travel, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"The visa services pages they built for us are generating more enquiries than anything we have ever done. We now rank number one for three of our target visa keywords in Abuja. Companies who previously would never find us online are calling to book group travel and visa processing services. The ROI has been extraordinary compared to any other marketing spend we have made."</p>
      <div class="test-author">
        <div class="test-avatar">E</div>
        <div><div class="test-name">Mr. Emeka Nwosu</div><div class="test-role">Managing Director · Global Wings Travel, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Running a travel agency that serves both the UK Nigerian diaspora and clients back home meant we needed a website that spoke to two very different audiences. i2Medier got that immediately. They built us a dual-market strategy — UK diaspora wanting to bring family home, and Nigerians wanting to travel to the UK. Both sides of the business have grown since we launched."</p>
      <div class="test-author">
        <div class="test-avatar">F</div>
        <div><div class="test-name">Mrs. Fatima Aliyu</div><div class="test-role">Director · Adeola Travels, London & Lagos</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free travel website audit<br>— see what's stopping clients from booking online</h2>
    <p>We will review your current site, identify your biggest ranking and conversion gaps, and show you exactly what a professional travel agency website would fix. No commitment required.</p>
  </div>
  <div class="cta2-right">
    <a href="#contact" class="btn-white-solid">Book a Free Audit →</a>
  </div>
</div>

<!-- ═══ LONG-FORM SEO CONTENT ═══ -->
<section class="content-section" aria-labelledby="content-heading">
  <div class="two-col-intro" style="margin-bottom:2rem">
    <div>
      <span class="s-label">The Full Picture</span>
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>travel agency web design</em></h2>
    </div>
    <p>A comprehensive guide to building a travel agency website that attracts serious travellers, converts enquiries into bookings, and ranks on Google — written for Nigerian and UK-based travel businesses.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for travel agencies">

      <h2>Why Nigerian travel agencies need professional websites in 2026</h2>
      <p>The Nigerian travel industry has undergone a profound transformation in the past five years. Where bookings once flowed exclusively through in-person visits, telephone calls, and personal referrals, a significant and growing portion of new clients now begin their journey on Google. The Nigerian middle class is expanding, passport penetration is increasing, and the appetite for international travel — Dubai, Turkey, the UK, the US, and beyond — has never been higher.</p>
      <p>Against this backdrop, the question is no longer whether your travel agency needs a professional website. The question is how much revenue you are losing every month without one. When a Lagos professional planning a honeymoon searches "honeymoon packages Nigeria" and finds three travel agencies with polished, informative, trustworthy websites — and yours is not among them — that booking, worth hundreds of thousands of naira, goes to one of those three agencies. This happens thousands of times a month across Nigerian search engines.</p>
      <p>A professional travel agency website is not a marketing luxury. It is the 24-hour sales channel that represents your agency to every prospective traveller who searches online before picking up a phone. The agencies that have invested in high-quality, SEO-optimised websites are capturing this demand. Those without are invisible to it.</p>

      <h2>Package pages and destination content as SEO assets</h2>
      <p>One of the most significant misconceptions travel agency owners hold about their websites is that a single page listing destinations is sufficient. It is not — not for converting visitors, and certainly not for ranking on Google.</p>
      <p>Each destination and package you offer represents a unique SEO opportunity. A traveller searching "Istanbul 7-day package Nigeria" has highly specific intent — they know where they want to go, roughly how long they want to go for, and they are looking for pricing information. If you have a dedicated Istanbul package page that answers all of those questions — complete itinerary, inclusions, pricing tiers, departure dates, what to pack, visa requirements — you will rank for that search and convert the visitor. If you have a generic destinations list that mentions Istanbul in a paragraph, you will rank for nothing.</p>

      <h3>Destination page structure that converts</h3>
      <p>The most effective destination pages combine aspirational visual content with practical information and a low-friction path to enquiry. They lead with a compelling destination hero image, followed by a clear package headline, an honest price (including "starting from" if the price varies), a structured itinerary, an inclusions and exclusions list, and a prominently placed enquiry form or WhatsApp button. Trust elements — past traveller photos, reviews, IATA credentials — are woven throughout, not relegated to a separate page.</p>

      <h2>Visa services — the high-intent keyword goldmine for travel agencies</h2>
      <p>If your travel agency assists with visa applications — UK, US, Schengen, UAE, Canada, or any other country — and you do not have dedicated, keyword-optimised visa service pages, you are missing one of the most valuable SEO opportunities available to Nigerian travel businesses.</p>
      <p>The search volume for visa-related queries from Nigeria is enormous. "UK visa agent Lagos", "US visa appointment Nigeria", "Schengen visa Nigeria requirements" — these keywords collectively represent tens of thousands of searches per month from people who are ready to pay for professional assistance. They are not casually browsing. They have a visa appointment to secure, a trip to plan, and a deadline to meet.</p>
      <p>A dedicated UK Visa Services page, properly structured and keyword-optimised, can rank on the first page of Google for multiple high-intent visa search terms within 60–90 days of launch. Each of those rankings represents a steady stream of qualified enquiries from people who need exactly what you offer. This is one of the highest-return SEO investments any Nigerian travel agency can make.</p>

      <h2>Online booking and reducing friction to purchase</h2>
      <p>Travel is a high-consideration purchase. The average Nigerian traveller spends several weeks researching before committing to a booking. During that research phase, every point of friction — a website that requires calling before seeing prices, a contact form that asks no specific questions, an enquiry process that disappears into WhatsApp with no follow-up — increases the likelihood that the prospective client abandons their enquiry and books with a competitor who makes the process easier.</p>
      <p>A well-designed booking enquiry system captures the right information upfront: destination, travel dates, number of passengers, budget range, special requirements. This information enables your team to respond with a personalised, detailed quote — rather than a generic reply that requires the client to re-explain everything. The result is a faster, more professional enquiry experience that builds confidence and reduces drop-off.</p>
      <p>For agencies ready to take deposits online, Paystack integration allows clients to commit to a booking immediately — securing the sale before they change their minds or approach another agency. In a competitive market, the ability to take payment online is a significant conversion advantage.</p>

      <h2>Building trust through reviews, credentials, and trip photography</h2>
      <p>Travel is a high-trust category. Clients are handing over significant sums of money — often ₦500k to ₦2M+ — for an experience they cannot return if it goes wrong. Before a first-time client books with you, they need to see evidence that other Nigerians have traveled safely and happily with your agency. This evidence comes from three primary sources: industry credentials, client testimonials, and authentic trip photography.</p>
      <p>IATA membership, NANTA affiliation, and years in operation should appear prominently on your homepage — not buried in an About page. Client testimonials should be structured with the traveller's name, destination visited, photo if possible, and a specific, authentic quote about their experience. Trip photography — real images from past client holidays, not stock photos — builds the kind of visceral social proof that stock photography cannot replicate.</p>

      <h2>Pricing guide for travel agency websites in Nigeria</h2>
      <p>Travel agency website costs vary significantly based on the number of destinations, the complexity of the booking system, and the volume of visa service pages required. As a general guide for the Nigerian market in 2026:</p>
      <ul>
        <li><strong>Essential website</strong> (homepage, 8 package pages, enquiry form, blog, basic SEO): ₦450,000–₦650,000</li>
        <li><strong>Growth website</strong> (full destination and visa pages, online booking system, package CMS, advanced SEO): ₦900,000–₦1.5M</li>
        <li><strong>Enterprise platform</strong> (booking engine with availability, Paystack payments, agent portal, affiliate programme): ₦2M+</li>
      </ul>
      <p>The single most important factor affecting ROI is not the upfront website cost — it is the quality of the package pages and the SEO foundation. A ₦300,000 template website that ranks nowhere and generates no organic enquiries has a poor return. A ₦900,000 custom website that attracts 50 qualified booking enquiries per month — representing millions of naira in potential bookings — pays for itself many times over in the first year alone.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website audit and proposal for your travel agency.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Audit →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why most travel websites lose bookings</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for travel agencies</a></li>
          <li><a href="#process-heading" class="toc-link">Our process (5 steps)</a></li>
          <li><a href="#pricing" class="toc-link">Pricing</a></li>
          <li><a href="#faq-heading" class="toc-link">FAQ</a></li>
          <li><a href="#contact" class="toc-link">Get a free quote</a></li>
        </ul>
      </nav>
    </aside>

  </div>
</section>

<!-- ═══ FAQ ═══ -->
<section aria-labelledby="faq-heading">
  <span class="s-label">FAQ</span>
  <h2 class="s-head" id="faq-heading">Questions about travel agency<br><em>web design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every travel agency has different destinations and services. Email us and we'll give you a direct, honest answer specific to your agency — no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">Can I manage and add tour packages myself after the website launches?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Yes — this is a core principle of every site we build. We use ACF Pro to create an intuitive package management system in WordPress admin. You can add new destinations, edit existing package details, update prices, change itineraries, and publish seasonal promotions without touching a line of code. Every handover includes a CMS training session and a written admin guide specifically covering travel package management workflows.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can clients pay deposits or make bookings online through the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Yes. We can integrate Paystack or Flutterwave for online deposit collection — enabling clients to secure their booking immediately with a partial payment while your team finalises the full package details. For agencies that prefer an enquiry-first model, we build structured booking enquiry forms that capture all the necessary trip details and send them directly to your email, WhatsApp, and CRM. Online payment integration is available on the Growth and Enterprise packages.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">Can you display IATA membership and other travel industry credentials on the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">Absolutely — and we consider this a priority, not an afterthought. Your IATA accreditation, NANTA membership, years of operation, airline partnerships, and any travel insurance affiliations are designed into the website as prominent trust anchors. They appear on your homepage, in your site header or footer, and on individual package pages — because first-time clients booking international travel need to see these credentials immediately to feel confident proceeding.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">How do you keep visa service pages up to date as requirements change?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Each visa service page is built in WordPress with a simple editing interface — your team can update visa requirements, processing times, fee information, and documentation checklists immediately when they change, without needing to contact us. For agencies on a monthly retainer, we monitor and update visa pages as part of the ongoing service. We also include a content review reminder in your admin guide, recommending a monthly check of each active visa page against the relevant embassy guidelines.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Do you write destination blog content for travel agencies?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes. On our monthly retainer packages, we include destination blog articles written for Nigerian travellers — covering topics like "best time to visit Dubai from Nigeria", "UK visa requirements for Nigerian passport holders 2026", "Istanbul travel guide from Lagos", and similar high-search-volume content that attracts serious travellers to your website through organic Google search. These articles build topical authority over time and create additional entry points for prospective clients to discover your agency.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">How long does it take to build a travel agency website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">A standard travel agency website with destination pages, visa services, and a booking enquiry system typically takes 3–5 weeks from design approval to launch. Larger projects with booking engines, Paystack payment integration, and extensive destination libraries may take 6–8 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when. We have never missed a launch date on a project where the client delivered content on schedule.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Can the website show prices in multiple currencies — naira and pounds?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Yes — multi-currency pricing display is available on our Enterprise packages. This is particularly valuable for agencies serving both the Nigerian domestic market and the Nigerian diaspora in the UK, US, or Canada, where clients may wish to compare prices in their local currency. The currency display can be set automatically by visitor location or offered as a manual toggle, depending on your preference. For the Essential and Growth packages, we display prices in naira as standard, with the option to add a currency note for overseas visitors.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a travel agency<br>website that fills your booking calendar?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We'll review your current site, map your keyword opportunities, and show you exactly what we'd build — and why it will bring serious travellers to your agency.</p>
  <a href="{{ $startUrl }}" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
