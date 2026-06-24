@extends('public.layouts.app')

@section('title', 'Cleaning Website Design Company in Nigeria | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Design', 'item' => route('site.services.web-design')],
        ['@type' => 'ListItem', 'position' => 4, 'name' => 'Cleaning Company Web Design', 'item' => route('site.services.web-design.industry', ['industry' => 'cleaning-company-website-design'])],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'How do I capture leads from my cleaning website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'The most effective lead capture mechanism for cleaning companies is a multi-step quote form — not a simple contact form. By breaking the enquiry into sequential steps (service type → property size → location → preferred date → contact details), you reduce friction for the visitor while capturing all the information you need to respond with a specific, relevant quote. We place this form prominently on the homepage and every service page, with email notifications sending you a complete lead record immediately. We can also integrate with CRM systems like HubSpot or your preferred lead management tool.']],
        ['@type' => 'Question', 'name' => 'Can clients book directly online?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — depending on your package. The Essential and Growth websites use a quote-request-then-confirm model: the client submits their details, you review and confirm with a specific price, and then they book. This is appropriate for most cleaning businesses where pricing varies by property size and job type. The Enterprise package includes a full online booking system where clients can select a service, choose a date from your real-time availability calendar, pay a deposit via Paystack, and receive an automatic confirmation — without you needing to manually process the booking.']],
        ['@type' => 'Question', 'name' => 'How do you set up Google map pack rankings?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Map pack rankings (the three businesses that appear in local Google search results with a map) depend on three main factors: the completeness and accuracy of your Google Business Profile, the relevance and authority of your website, and your review count and rating. We optimise all three — setting up or completing your GBP with the correct categories, service areas, photos, and Q&A; implementing LocalBusiness and CleaningService schema markup on your website; and providing you with a review request strategy to consistently build your Google review count.']],
        ['@type' => 'Question', 'name' => 'Do I need separate pages for each service?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — and this is one of the highest-impact decisions you can make for your cleaning website\'s SEO performance. A single "Services" page listing residential cleaning, office cleaning, deep cleaning, and post-construction cleaning cannot rank effectively for all of those terms. A dedicated "Office Cleaning Lagos" page, optimised specifically for commercial cleaning keywords, can rank for "office cleaning Lagos", "commercial cleaning service Lagos", "contract office cleaning Abuja", and dozens of long-tail variations. Each service page you add is an additional, independent ranking opportunity.']],
        ['@type' => 'Question', 'name' => 'Can you integrate Paystack for deposit payments?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. Paystack integration for deposit collection is available on the Growth and Enterprise packages. Clients can pay a booking deposit online — typically 20–30% of the quoted job value — which confirms their appointment and reduces no-shows significantly. The deposit amount can be fixed (e.g. ₦5,000 per booking) or calculated as a percentage of the quote value. Payment confirmations trigger automatic email receipts to both you and the client, and all payments are logged in your WordPress admin alongside the booking details.']],
        ['@type' => 'Question', 'name' => 'How long does it take to build a cleaning company website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A standard cleaning company website takes 3–5 weeks from design approval to launch. Sites with a large number of service area pages, a full blog section, and Paystack integration may take 5–7 weeks. We provide a detailed, milestone-based timeline at the start of every project — week one is discovery and design, weeks two to four are build, week four is SEO and content, week five is QA and launch. You always know exactly where your project is and what is happening next.']],
        ['@type' => 'Question', 'name' => 'How do I update content myself after launch?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Every cleaning company website we build uses WordPress with ACF Pro to create intuitive editing interfaces for your service pages, gallery, testimonials, pricing, team information, and blog. You can update prices, add before/after photos, publish new blog posts, and edit any content on the site without touching code or contacting us. Every handover includes a 45-minute CMS training session and a written admin guide covering every content management workflow your team will need — so you are genuinely independent after launch.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/cleaning-company-web-design.css')
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
      <span aria-current="page">Web Design for Cleaning Companies</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Cleaning Company Website Design</span>
    <h1>Websites that generate steady<br>contracts for your<br><em>cleaning business</em></h1>
    <p class="hero-sub">Win more residential and commercial cleaning contracts through a professional online presence, local SEO that puts you on the Google map pack, and instant quote forms that turn visitors into booked jobs — built specifically for cleaning companies across Nigeria and the UK.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Cleaning Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Built for cleaning businesses — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span> Instant quote forms that pre-qualify leads</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria & UK specialists</span>
    </div>
  </div>

  <!-- Cleaning website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
        <div>
          <div class="float-notif-text">New quote request · Office Cleaning</div>
          <div class="float-notif-sub">Victoria Island · just now</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">sparklecleanpro.com.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">SparkleClean <span>Pro</span></div>
            <div class="msn-links">
              <span class="msn-link">Services</span>
              <span class="msn-link">About</span>
              <span class="msn-link">Pricing</span>
              <span class="msn-link">Gallery</span>
              <span class="msn-link">Contact</span>
              <span class="msn-cta">Get a Quote</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Professional Cleaning · Lagos & Abuja</div>
            <div class="msh-h1">Professional Cleaning<br>You Can <span>Trust</span></div>
            <div class="msh-sub">Residential, commercial, and deep cleaning services. Vetted staff. Insured. Satisfaction guaranteed.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Get an Instant Quote</span>
              <span class="msh-btn-s">Our Services →</span>
            </div>
          </div>
          <!-- Services -->
          <div class="mock-site-services">
            <div class="mss-label">Our Cleaning Services</div>
            <div class="mss-grid">
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><div class="mss-name">Home Cleaning<br><span style="color:var(--cleaning);font-size:.42rem">₦15,000</span></div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M3 21h18"/><path d="M5 21V7l7-4 7 4v14"/><path d="M9 9h6"/><path d="M9 13h6"/></svg></div><div class="mss-name">Office Cleaning<br><span style="color:var(--cleaning);font-size:.42rem">₦25,000</span></div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="m9 11-6 6v3h9l3-3"/><path d="m22 12-4.6 4.6a2 2 0 0 1-2.8 0l-5.2-5.2a2 2 0 0 1 0-2.8L14 4"/></svg></div><div class="mss-name">Deep Cleaning<br><span style="color:var(--cleaning);font-size:.42rem">₦35,000</span></div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div><div class="mss-name">Post-Construction<br><span style="color:var(--cleaning);font-size:.42rem">₦50,000</span></div></div>
            </div>
            <!-- Instant quote form snippet -->
            <div style="background:var(--cleaning-lt);border-radius:4px;padding:.55rem .6rem;margin-top:.5rem">
              <div style="font-size:.42rem;font-weight:700;color:var(--cleaning-dk);margin-bottom:.3rem;text-transform:uppercase;letter-spacing:.08em">Get an Instant Quote</div>
              <div style="display:flex;gap:.3rem;flex-wrap:wrap">
                <span style="background:var(--white);border:1px solid var(--cleaning);border-radius:2px;font-size:.4rem;color:var(--g400);padding:.18rem .4rem;flex:1">Service type...</span>
                <span style="background:var(--white);border:1px solid var(--g200);border-radius:2px;font-size:.4rem;color:var(--g400);padding:.18rem .4rem;flex:1">Property size...</span>
                <span style="background:var(--white);border:1px solid var(--g200);border-radius:2px;font-size:.4rem;color:var(--g400);padding:.18rem .4rem;flex:1">Preferred date...</span>
                <span style="background:var(--cleaning);color:var(--white);border-radius:2px;font-size:.4rem;font-weight:700;padding:.18rem .55rem">Quote →</span>
              </div>
            </div>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">500<span>+</span></div><div class="mst-lbl">Clients</div></div>
            <div class="mst-item"><div class="mst-num">5<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rated</div></div>
            <div class="mst-item"><div class="mst-num" style="font-size:.6rem;letter-spacing:-.02em">Insured<span style="color:var(--cleaning)">✓</span></div><div class="mst-lbl">Vetted</div></div>
            <div class="mst-item"><div class="mst-num" style="font-size:.58rem">Same-Day</div><div class="mst-lbl">Booking</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "cleaning company Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Domestic Cleaning Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Commercial Cleaning Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Office Cleaning Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Deep Cleaning Specialists</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Post-Construction Cleaning</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Carpet & Upholstery Cleaning</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Facility Management Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Industrial Cleaning Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Airbnb Cleaning Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Window Cleaning Companies</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Domestic Cleaning Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Commercial Cleaning Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Office Cleaning Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Deep Cleaning Specialists</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Post-Construction Cleaning</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Carpet & Upholstery Cleaning</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Facility Management Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Industrial Cleaning Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Airbnb Cleaning Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Window Cleaning Companies</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most cleaning company<br>websites <em>lose contracts</em></h2>
    </div>
    <p>A potential client searches for a cleaning company in Lagos or Abuja. Within seconds they have visited three websites and already decided which one to call first. If yours is not in the search results — or does not inspire trust when they land — that contract goes to a competitor. Here is exactly what is going wrong on most cleaning company websites, and what we do to fix it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span>
      <h3 class="prob-title">Competing on price alone because there is no website to justify premium rates</h3>
      <p class="prob-desc">Without a professional website, every conversation starts with "how much do you charge?" because there is nothing else to evaluate. You end up racing to the bottom against less qualified competitors who happen to be easier to find online.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A professional website signals legitimacy, insurance, vetted staff, and quality that justifies charging more than the market average — before a single phone call is made.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <h3 class="prob-title">Losing leads to competitors who have a "Get a Quote" form online</h3>
      <p class="prob-desc">Prospective clients search, find a competitor's website, fill in a quote form, and book — all while you are waiting for them to call a number they found on a flyer. The client who was ready to hire you has already moved on.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Multi-step quote forms that capture name, property type, size, location, and preferred date — so you receive qualified leads ready to book, 24 hours a day, seven days a week.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">No local Google presence — competitors appear in the map pack, you don't</h3>
      <p class="prob-desc">When someone in Lekki or Maitama searches "cleaning company near me", three businesses appear in the Google map pack with photos, reviews, and a click-to-call button. Your business is invisible, even if you operate in that area every day.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Full local SEO setup including Google Business Profile optimisation, service area pages, and LocalBusiness schema markup — so you appear where clients are actively searching.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20"/><path d="M5 2h13a2 2 0 0 1 2 2v18"/><path d="M8 7h8"/><path d="M8 11h8"/><path d="M8 15h5"/></svg></span>
      <h3 class="prob-title">No service pages explaining what's included in each cleaning type</h3>
      <p class="prob-desc">Your homepage says "we offer cleaning services" but gives no detail. A commercial property manager who needs weekly office cleaning cannot tell if you do that. A landlord who needs post-tenancy cleaning does not know if that is something you handle.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Individual pages for residential cleaning, commercial cleaning, deep cleaning, and post-construction — each targeting its own keywords and explaining exactly what is included in each service.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span>
      <h3 class="prob-title">No testimonials or before/after photos to build trust with first-time clients</h3>
      <p class="prob-desc">Inviting a cleaning company into your home or office requires trust. A first-time client who cannot find any evidence that your service is good — no reviews, no photos, no proof — will choose the competitor whose website makes them feel confident.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Testimonials with photos, star ratings, before/after gallery, and verified review badge integration — so every visitor can see real evidence of your quality before picking up the phone.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
      <h3 class="prob-title">Poor mobile experience — most clients search and book from their phones</h3>
      <p class="prob-desc">More than 74% of Nigerian web traffic arrives on a mobile device. A cleaning company website that does not work perfectly on a phone — small text, broken forms, no click-to-call button — turns away the majority of potential clients before they can even make contact.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Mobile-first design with one-tap calling, fast-loading pages, and a booking form that works perfectly on any screen — from a ₦50,000 Android to the latest iPhone.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your cleaning<br>company's website <em>needs</em></h2>
      <p>A high-performing cleaning company website is not a homepage and a phone number. It is a structured set of pages — each designed to serve a specific type of client at a specific stage of their decision, and each optimised to rank for the search terms clients use when they need cleaning help.</p>
      <p>We map your services, coverage areas, and cleaning specialisms to a comprehensive page architecture that works for both Google and your prospective clients — whether they are homeowners, property managers, facility managers, or construction project coordinators.</p>
      <ul class="bullets">
        <li>Homepage with instant quote CTA and trust signals above the fold</li>
        <li>Individual service pages — residential cleaning, commercial cleaning, deep clean, post-construction, carpet cleaning</li>
        <li>Service area / coverage pages — per city or neighbourhood (Lagos, Abuja, Victoria Island, Lekki, Maitama, Port Harcourt)</li>
        <li>Pricing & packages page — transparent pricing builds confidence and pre-qualifies enquiries</li>
        <li>Before & after gallery — visual proof that your cleaning makes a measurable difference</li>
        <li>About us & team — vetted, insured, trained staff presented with photos and credentials</li>
        <li>Client testimonials & reviews — Google review integration and written testimonials from real clients</li>
        <li>Blog — cleaning tips, guides, and local content that drives organic search traffic</li>
        <li>Contact & instant booking form — multiple contact pathways with low friction</li>
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
        <div class="page-card-head"><span class="pch-name">Office Cleaning</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Deep Cleaning</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Service Areas</span><span class="pch-badge key">Local SEO</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Before & After Gallery</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Get a Quote</span><span class="pch-badge key">Lead Capture</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>cleaning companies</em></h2>
    </div>
    <p>Every cleaning company website we build is designed around the specific trust signals, conversion patterns, and local SEO requirements of the cleaning industry. These are not generic business website features — they are cleaning-specific elements that have a direct impact on whether a visiting prospect submits a quote request or picks up the phone.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
      <h3 class="svc-title">Instant Quote & Lead Capture Forms</h3>
      <p class="svc-desc">Multi-step quote forms that capture service type, property size, location, preferred date, and contact details — pre-qualifying every lead before you respond. Available on every page, not just the contact page. Integrated with email notifications so you can respond within minutes and win the booking before competitors even see the enquiry.</p>
      <div class="svc-tags"><span class="svc-tag">Multi-Step Form</span><span class="svc-tag">Pre-Qualifying</span><span class="svc-tag">Email Alerts</span><span class="svc-tag">CRM Integration</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20"/><path d="M5 2h13a2 2 0 0 1 2 2v18"/><path d="M8 7h8"/><path d="M8 11h8"/><path d="M8 15h5"/></svg></div>
      <h3 class="svc-title">Individual Service Pages</h3>
      <p class="svc-desc">One page per cleaning type — residential cleaning, commercial cleaning, deep cleaning, post-construction cleaning, carpet and upholstery cleaning, Airbnb cleaning. Each page targets its own keyword set, explains exactly what is included, answers common questions, and has its own quote CTA to convert intent into action.</p>
      <div class="svc-tags"><span class="svc-tag">Residential</span><span class="svc-tag">Commercial</span><span class="svc-tag">Deep Clean</span><span class="svc-tag">Post-Construction</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">Service Area & Coverage Pages</h3>
      <p class="svc-desc">Dedicated pages for every city, zone, or neighbourhood you serve — Lagos Island, Victoria Island, Lekki, Ajah, Ikoyi, Abuja, Maitama, Wuse, Garki, Port Harcourt. Each page targets local search terms like "cleaning company Victoria Island" and "domestic cleaning Lekki" — capturing clients searching in your exact area.</p>
      <div class="svc-tags"><span class="svc-tag">Local SEO</span><span class="svc-tag">Area Pages</span><span class="svc-tag">Neighbourhood Targeting</span><span class="svc-tag">Map Integration</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></div>
      <h3 class="svc-title">Google Business Profile & Map Pack Optimisation</h3>
      <p class="svc-desc">Full Google Business Profile setup and optimisation — complete profile, category configuration, service area mapping, photo uploads, and Q&A seeding. LocalBusiness and CleaningService schema markup on your website so Google understands your business clearly. Structured to target the three-pack map results where most cleaning bookings originate.</p>
      <div class="svc-tags"><span class="svc-tag">GBP Optimisation</span><span class="svc-tag">Map Pack</span><span class="svc-tag">LocalBusiness Schema</span><span class="svc-tag">Citation Building</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></div>
      <h3 class="svc-title">Before & After Gallery</h3>
      <p class="svc-desc">A structured gallery of before and after cleaning photos — the single most powerful trust signal in the cleaning industry. Visitors who can see the quality of your work before calling are significantly more likely to book, and more likely to accept your pricing without negotiation. We build and optimise the gallery for both visual impact and Google Image search.</p>
      <div class="svc-tags"><span class="svc-tag">Before/After</span><span class="svc-tag">Photo Gallery</span><span class="svc-tag">Trust Building</span><span class="svc-tag">Image SEO</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <h3 class="svc-title">Review Integration</h3>
      <p class="svc-desc">Google Reviews displayed dynamically on your website with star ratings, reviewer names, and dates — showing prospective clients what existing customers say about your service in real time. Review request automation helps you consistently build your review count. Star rating schema markup displays your rating directly in Google search results as rich snippets.</p>
      <div class="svc-tags"><span class="svc-tag">Google Reviews</span><span class="svc-tag">Star Ratings</span><span class="svc-tag">Rich Snippets</span><span class="svc-tag">Review Automation</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Cleaning Companies</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when clients are<br>searching for <em>your services</em></h2>
      <p>The most valuable moment in your business development is when a Lagos homeowner or Abuja facility manager opens Google and types "cleaning company near me". If you are not on page one — ideally in the map pack — that booking goes to a competitor. Every website we build is engineered to rank for the exact search terms your clients use.</p>
      <p>We do not just build websites — we build search visibility. Your homepage, each service page, your local area pages, and your blog articles are all individually optimised for specific keyword targets. We implement CleaningService and LocalBusiness schema markup so Google understands exactly what you do and which areas you serve.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each cleaning service you offer</li>
        <li>Location pages targeting every city or neighbourhood in your coverage area</li>
        <li>CleaningService + LocalBusiness JSON-LD schema markup on every relevant page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Citation building across Nigerian and international business directories</li>
        <li>Long-tail keyword content strategy targeting low-competition, high-intent cleaning searches</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Cleaning Company — Keyword Rankings (before & after)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">cleaning company lagos</span>
            <span class="kw-vol">6,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">domestic cleaning service abuja</span>
            <span class="kw-vol">2,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">office cleaning lagos</span>
            <span class="kw-vol">3,200/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">deep cleaning service nigeria</span>
            <span class="kw-vol">1,900/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">post construction cleaning lagos</span>
            <span class="kw-vol">1,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">cleaning company victoria island</span>
            <span class="kw-vol">980/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">commercial cleaning abuja</span>
            <span class="kw-vol">1,600/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">facility management nigeria</span>
            <span class="kw-vol">2,100/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active cleaning company SEO campaign</div>
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
    <p>We have built websites for cleaning companies and service businesses across Nigeria and the UK. These are the outcomes our cleaning clients consistently see within the first six months of launching their new website.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="320">0</span><span>%</span></div>
      <div class="trust-label">Average increase in quote requests within the first 90 days of a new cleaning company website launch</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="95">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) achieved on our custom-built cleaning company websites — no page builder bloat</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="4">0</span><span>×</span></div>
      <div class="trust-label">Increase in monthly contract enquiries reported by cleaning clients within 6 months of launch, compared to their previous website</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched cleaning company website — with a guaranteed, milestone-based delivery timeline</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Service business websites delivered across Nigeria, the UK, the US, and Canada — all built on custom code, never templates</div>
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
      <h2 class="s-head" id="process-heading">From brief to live site<br>in <em>six structured steps</em></h2>
    </div>
    <p>We have delivered websites for service businesses across Nigeria and the UK. This process eliminates the surprises, delays, and scope disagreements that make most agency relationships frustrating — and delivers a cleaning company website that genuinely performs.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery & Market Audit</div>
      <p class="proc-desc">A structured discovery session covering your services, coverage areas, target clients (residential, commercial, or both), competitors, and growth goals. We audit your local search landscape — identifying the keyword gaps and map pack opportunities your website needs to target. We map your complete site architecture, agree it in writing, and use it to govern the entire project.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Competitor Audit</span><span class="proc-tag">Keyword Map</span><span class="proc-tag">Sitemap</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Visual Design (clean, trustworthy, professional aesthetics)</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for all key pages. Cleaning companies need to communicate cleanliness, professionalism, and trustworthiness visually — we design your colour palette, imagery placement, before/after gallery layout, and quote form to work as a coherent, trust-building system. Two revision rounds included. You approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build (quote system + service + area pages)</div>
      <p class="proc-desc">Your website is built on a custom WordPress theme — no page builders, no bloat. The multi-step quote system, individual service pages, and local area pages are all built and integrated. ACF Pro powers your service descriptions, gallery, testimonials, and pricing — fully editable from WordPress admin without touching code. A staging environment is accessible throughout so you can review progress at any point.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">Quote System</span><span class="proc-tag">Service Pages</span><span class="proc-tag">Area Pages</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO & Local Setup</div>
      <p class="proc-desc">Every page is content-entered, formatted, and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, CleaningService and LocalBusiness schema markup, canonical URLs, XML sitemap, and Google Search Console submission. Google Business Profile is set up and optimised. Google Analytics 4 is installed, goals configured, and all conversion tracking verified before launch.</p>
      <div class="proc-tags"><span class="proc-tag">On-Page SEO</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">GBP Setup</span><span class="proc-tag">GA4 + GSC</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA & Launch</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 90+), quote form testing, link verification, and a final review call before launch day. Your domain is transferred to the new site, SSL is verified, and Cloudflare is configured for speed and security. You receive a 45-minute CMS training session, a written admin guide, and a support window covering any post-launch issues.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">SSL + Cloudflare</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly Retainer</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your site ranking and running perfectly — publishing cleaning tips and local content articles, building local SEO citations, monitoring Core Web Vitals, updating WordPress, running daily backups, and delivering monthly keyword ranking reports. Cleaning company clients typically see their strongest ROI in months 4–12 as the SEO compounds.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Content Creation</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Cleaning company websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the cleaning company's services, coverage areas, and target client base.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--cleaning-dk) 0%,#0284c7 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">SparkleClean Pro</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Residential & Commercial Cleaning</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Domestic</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Commercial</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Deep Clean</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Residential & Commercial</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Cleaning Company · Lagos, Nigeria</div>
        <div class="port-title">SparkleClean Pro</div>
        <p class="port-desc">Full website with 8 service pages, 12 area pages covering Lagos Island, Lekki, Ikoyi, and Victoria Island — plus a multi-step quote form and before/after gallery. Reached page one for "cleaning company Lagos" within 60 days.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a3060 0%,#0369a1 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Crystal Facility Services</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Office Cleaning & FM · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Office</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Facility Mgmt</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Industrial</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Office Cleaning & FM</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Facility Management · Abuja, Nigeria</div>
        <div class="port-title">Crystal Facility Services</div>
        <p class="port-desc">B2B-focused cleaning and facility management website targeting government offices, corporate clients, and estates in Maitama, Wuse, and Garki — with a contract enquiry form and case studies section.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#083a52 0%,#0c5a7a 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">ProShine Cleaning</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Domestic & Deep Clean · London + Lagos</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Domestic</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Airbnb</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">End-of-Tenancy</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Domestic & Deep Clean</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Domestic Cleaning · London & Lagos</div>
        <div class="port-title">ProShine Cleaning</div>
        <p class="port-desc">Dual-market cleaning website serving both London and Lagos, with separate service area pages and market-specific content — Airbnb turnaround cleaning, end-of-tenancy, and domestic deep clean targeting both UK and Nigerian search intent.</p>
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
    <p>Not all web development options are equal — especially for cleaning companies where your website needs to generate bookings, not just look professional.</p>
  </div>
  <div class="compare-wrap"><table class="compare-table reveal" role="table" aria-label="Web design comparison for cleaning companies">
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
        <td class="feature">Built specifically for cleaning companies</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Cleaning-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Instant quote form (multi-step)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Basic contact forms only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Pre-qualifying quote system</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely built properly</span></td>
      </tr>
      <tr>
        <td class="feature">Service area pages for local SEO</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not supported</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Per neighbourhood/city</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely done</span></td>
      </tr>
      <tr>
        <td class="feature">Google Business Profile & map pack setup</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not included</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full optimisation included</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely offered</span></td>
      </tr>
      <tr>
        <td class="feature">Before & after gallery</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic image grid</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Optimised gallery + Image SEO</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic at best</span></td>
      </tr>
      <tr>
        <td class="feature">Google review integration</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Live reviews on site</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">LocalBusiness + CleaningService schema</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
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
  <h2 class="s-head" id="test-heading">What cleaning companies say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Before the website, we were getting all our jobs through referrals and WhatsApp. Now we receive eight to twelve online quote requests every week — most from people we would never have reached otherwise. The quote form is brilliant because clients already tell us what they need, so we close them faster."</p>
      <div class="test-author">
        <div class="test-avatar">C</div>
        <div><div class="test-name">Mrs. Chioma Eze</div><div class="test-role">CEO · SparkleClean Pro, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"We specifically needed to win more B2B contracts — office cleaning for companies in Abuja. i2Medier built us a website that speaks directly to facility managers and procurement teams. Within four months we had signed three new corporate contracts that came directly from people who found us on Google."</p>
      <div class="test-author">
        <div class="test-avatar">B</div>
        <div><div class="test-name">Mr. Biodun Adeyemi</div><div class="test-role">MD · Crystal Facility Services, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"The before and after gallery they designed has genuinely changed how clients respond to our pricing. People see the quality of our work before they even call, so they are not shopping around on price. Our average job value has increased significantly because clients come in already trusting us."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Mrs. Amaka Obi</div><div class="test-role">Operations Director · ProShine Cleaning, Lagos & London</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free cleaning website audit — see why<br>competitors are winning your contracts online</h2>
    <p>We will audit your current site, identify your biggest ranking and conversion gaps, and show you exactly what a new website would fix. No commitment required.</p>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>cleaning company web design</em></h2>
    </div>
    <p>A comprehensive guide to building a cleaning company website that generates quote requests, ranks on Google, and wins more contracts — written specifically for cleaning businesses in Nigeria and the UK.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for cleaning companies">

      <h2>Why cleaning companies in Nigeria need professional websites in 2026</h2>
      <p>The cleaning industry in Nigeria has changed dramatically over the past five years. Lagos, Abuja, Port Harcourt, and other major cities have seen significant growth in both residential and commercial cleaning demand — driven by rising middle-class households, an expanding corporate sector, and an increasing number of property developments that require professional cleaning before occupation. The businesses winning the majority of this work are not necessarily the best cleaners. They are the ones that are easiest to find, easiest to trust, and easiest to book online.</p>
      <p>In 2026, when a homeowner in Lekki or a facilities manager in Maitama needs a cleaning company, their first action is almost always to open Google. They search "cleaning company Lagos", "domestic cleaning service Abuja", or "office cleaning near me". The results they see in the first few positions — especially the Google Business Profile map pack — determine which cleaning companies get contacted. Companies without a professional website simply do not appear in these results. Even if you have a WhatsApp Business account and a strong referral network, you are invisible to the significant proportion of your potential market that searches online first.</p>
      <p>A professional cleaning company website is not a vanity project — it is the digital front door to your business, working 24 hours a day, seven days a week, presenting your services, building trust, and capturing leads even while your team is on the job.</p>

      <h2>The trust problem: how your website signals professionalism before anyone calls</h2>
      <p>Inviting a cleaning company into your home or office requires a meaningful level of trust. You are allowing strangers access to your private space, your belongings, and in commercial settings, potentially sensitive business environments. This trust gap is the single biggest barrier between a prospective cleaning client and a booked job — and your website is the most powerful tool you have for closing it before anyone picks up the phone.</p>

      <h3>What professional cleaning websites communicate</h3>
      <p>A well-built cleaning company website communicates several critical trust signals simultaneously. <strong>Insurance and staff vetting</strong> — if your website prominently states that your team is fully insured, background-checked, and professionally trained, a prospective client's anxiety about strangers in their home drops significantly. <strong>Professional photography</strong> — high-quality images of uniformed staff, clean equipment, and immaculate results communicate care and professionalism better than any written description. <strong>Real reviews</strong> — Google reviews displayed dynamically on your website, with specific details about the quality of the clean and the reliability of your team, provide third-party validation that your own marketing cannot replicate.</p>
      <p>The before and after gallery deserves particular emphasis. No other piece of content on a cleaning company website does as much work as genuine before and after photographs. A prospective client who can see with their own eyes the transformation your team delivers — a grimy post-construction space turned spotless, a neglected office carpet restored — is significantly more likely to book and significantly less likely to negotiate on price. We design this gallery to be a central, prominent feature of your website, not an afterthought buried in a media page.</p>

      <h2>Local SEO for cleaning companies: dominating the Google map pack</h2>
      <p>For cleaning companies, local SEO is the highest-priority digital marketing activity because the vast majority of your clients are looking for a service provider in their immediate area. "Cleaning company Lagos", "domestic cleaning Victoria Island", "office cleaning Abuja" — these are searches by people with immediate, specific, commercial intent. Ranking for them puts you directly in front of clients who are ready to book.</p>
      <p>The Google Business Profile (formerly Google My Business) map pack — the three-business listing that appears at the top of local search results with a map, star ratings, and a click-to-call button — is the single most valuable position in local search. To reach and maintain a position in this pack, your website and your Google Business Profile must both be comprehensively optimised. This means complete and accurate business information, consistent NAP (name, address, phone) citations across business directories, genuine review accumulation strategy, category-specific schema markup on your website, and regular content updates that demonstrate active business operation.</p>
      <p>Beyond the map pack, individual service area pages on your website allow you to target searches for specific Lagos neighbourhoods — Ikeja, Surulere, Yaba, Maryland, Gbagada, Ojodu Berger — as well as city-level searches for Abuja, Port Harcourt, Enugu, and beyond. Each area page ranks independently, creating multiple entry points into your website from searchers in different parts of your coverage zone.</p>

      <h2>Quote forms and lead generation: turning traffic into booked jobs</h2>
      <p>A cleaning company website that attracts visitors but does not convert them into quote requests is a sunk cost. The conversion architecture — how you guide a visitor from arrival to contact — is as important as the SEO that brings them there. Most cleaning company websites fail at this stage: they have a single "Contact Us" page with a name, email, and message field, and wait for the visitor to do all the work.</p>
      <p>A properly designed multi-step quote form changes this dynamic entirely. By breaking the quote request into a logical sequence — service type, property size, location, preferred date, contact details — you achieve two things simultaneously. First, you reduce the perceived effort for the visitor: answering one question at a time feels less demanding than filling in a long form. Second, you capture the exact information your team needs to provide an accurate, relevant response, eliminating the back-and-forth that often causes leads to go cold. A client who submits a complete, detailed quote request at 10pm receives a personalised, specific response the next morning — and books.</p>

      <h2>Service area pages: ranking in every neighbourhood you cover</h2>
      <p>One of the most consistently underused SEO opportunities for cleaning companies is dedicated service area pages. If you operate across Lagos — covering Victoria Island, Ikoyi, Lekki, Ajah, Lagos Island, and Surulere — a single homepage targeting "cleaning company Lagos" misses all the neighbourhood-specific searches that make up the majority of actual search volume.</p>
      <p>A dedicated "Cleaning Company Victoria Island" page can rank for "cleaning company Victoria Island", "domestic cleaning VI", "office cleaning Victoria Island Lagos", and dozens of related long-tail variations. Multiply this by every area you cover and you have a comprehensive local search presence that is very difficult for competitors without a similarly structured website to displace.</p>
      <p>Each area page is written to serve both the search engine and the human reader — explaining your coverage of that area, the types of cleaning you offer there, any specific considerations (estate rules, building types common to the area), and a clear quote request CTA tailored to that location.</p>

      <h2>Pricing guide for cleaning company websites in Nigeria</h2>
      <p>Understanding what a professional cleaning company website should cost helps you make a well-informed investment decision. The right budget depends on the scope of your service offering, the number of areas you cover, and the competitive intensity of your local market.</p>
      <ul>
        <li><strong>Essential website</strong> (homepage, 5 service pages, quote form, gallery, SEO foundation): ₦350,000–₦500,000 — appropriate for a small team operating in one or two areas, needing a credible online presence.</li>
        <li><strong>Growth website</strong> (full service pages, service area pages, Google Business Profile optimisation, gallery, review integration, blog): ₦700,000–₦1,000,000 — the right choice for a growing cleaning company competing for commercial contracts in multiple locations.</li>
        <li><strong>Enterprise platform</strong> (online booking system, staff scheduling, client portal, multi-city franchise pages, Paystack integration): ₦1.5M+ — for established cleaning businesses managing multiple teams and requiring operational software alongside the marketing website.</li>
      </ul>
      <p>The most important factor is not the upfront cost but the quality of execution and the strength of the SEO foundation. A ₦150,000 template website that ranks nowhere generates no return. A ₦700,000 custom-built website that generates ten qualified quote requests per week and closes four contracts per month pays for itself inside thirty days.</p>

      <h3>Commercial cleaning vs. residential cleaning: different websites or one?</h3>
      <p>Cleaning companies that serve both residential (domestic) and commercial clients often ask whether they need separate websites for each market. The answer for most businesses is: one website with clearly separated sections and individual service pages targeting each audience. Residential clients search "domestic cleaning Lagos" or "home cleaning service Lekki". Commercial clients — facilities managers, property managers, construction companies — search "commercial cleaning contract Lagos" or "office cleaning services Abuja". With properly structured service pages and targeted content on a single domain, you can rank for both audiences without the cost and complexity of maintaining two separate websites.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website audit and proposal for your cleaning company.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Audit →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why cleaning websites lose contracts</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for cleaning companies</a></li>
          <li><a href="#process-heading" class="toc-link">Our process (6 steps)</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about cleaning<br>company <em>web design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every cleaning company has different needs and markets. Email us and we'll give you a direct, honest answer specific to your business — no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">How do I capture leads from my cleaning website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">The most effective lead capture mechanism for cleaning companies is a multi-step quote form — not a simple contact form. By breaking the enquiry into sequential steps (service type → property size → location → preferred date → contact details), you reduce friction for the visitor while capturing all the information you need to respond with a specific, relevant quote. We place this form prominently on the homepage and every service page, with email notifications sending you a complete lead record immediately. We can also integrate with CRM systems like HubSpot or your preferred lead management tool.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can clients book directly online?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Yes — depending on your package. The Essential and Growth websites use a quote-request-then-confirm model: the client submits their details, you review and confirm with a specific price, and then they book. This is appropriate for most cleaning businesses where pricing varies by property size and job type. The Enterprise package includes a full online booking system where clients can select a service, choose a date from your real-time availability calendar, pay a deposit via Paystack, and receive an automatic confirmation — without you needing to manually process the booking.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">How do you set up Google map pack rankings?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">Map pack rankings (the three businesses that appear in local Google search results with a map) depend on three main factors: the completeness and accuracy of your Google Business Profile, the relevance and authority of your website, and your review count and rating. We optimise all three — setting up or completing your GBP with the correct categories, service areas, photos, and Q&A; implementing LocalBusiness and CleaningService schema markup on your website; and providing you with a review request strategy to consistently build your Google review count. Results typically begin showing within 4–8 weeks for less competitive areas and 8–16 weeks for Lagos and Abuja central.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Do I need separate pages for each service?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Yes — and this is one of the highest-impact decisions you can make for your cleaning website's SEO performance. A single "Services" page listing residential cleaning, office cleaning, deep cleaning, and post-construction cleaning cannot rank effectively for all of those terms. A dedicated "Office Cleaning Lagos" page, optimised specifically for commercial cleaning keywords, can rank for "office cleaning Lagos", "commercial cleaning service Lagos", "contract office cleaning Abuja", and dozens of long-tail variations. Each service page you add is an additional, independent ranking opportunity. We recommend at minimum: home cleaning, office cleaning, deep cleaning, post-construction cleaning, and carpet cleaning as separate pages.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Can you integrate Paystack for deposit payments?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes. Paystack integration for deposit collection is available on the Growth and Enterprise packages. Clients can pay a booking deposit online — typically 20–30% of the quoted job value — which confirms their appointment and reduces no-shows significantly. The deposit amount can be fixed (e.g. ₦5,000 per booking) or calculated as a percentage of the quote value. Payment confirmations trigger automatic email receipts to both you and the client, and all payments are logged in your WordPress admin alongside the booking details.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">How long does it take to build a cleaning company website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">A standard cleaning company website takes 3–5 weeks from design approval to launch. Sites with a large number of service area pages, a full blog section, and Paystack integration may take 5–7 weeks. We provide a detailed, milestone-based timeline at the start of every project — week one is discovery and design, weeks two to four are build, week four is SEO and content, week five is QA and launch. You always know exactly where your project is and what is happening next.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">How do I update content myself after launch?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Every cleaning company website we build uses WordPress with ACF Pro to create intuitive editing interfaces for your service pages, gallery, testimonials, pricing, team information, and blog. You can update prices, add before/after photos, publish new blog posts, and edit any content on the site without touching code or contacting us. Every handover includes a 45-minute CMS training session and a written admin guide covering every content management workflow your team will need — so you are genuinely independent after launch.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a cleaning company<br>website that wins more contracts?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We'll audit your current online presence, map your local keyword opportunities, and show you exactly what we'd build — and why.</p>
  <a href="{{ $startUrl }}" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
