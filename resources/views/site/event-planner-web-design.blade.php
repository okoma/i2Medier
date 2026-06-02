@extends('public.layouts.app')

@section('title', 'Web Design for Event Planners | Event Planning Website Design Nigeria | i2Medier')

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/event-planner-web-design.css')
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
      <span aria-current="page">Web Design for Event Planners</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Event Planner Website Design</span>
    <h1>Websites that fill your<br>event calendar with<br><em>premium bookings</em></h1>
    <p class="hero-sub">We build portfolio-led, elegantly designed websites for event planners, wedding coordinators, and corporate event companies in Nigeria and the UK — so your work speaks before you ever pick up the phone, and high-value clients choose you with confidence.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Event Planning Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Portfolio-first design — showcase every event</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span> Enquiry & booking flows that convert</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria & UK specialists</span>
    </div>
  </div>

  <!-- Event Planner website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M8 2v4"/><path d="M16 2v4"/><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M3 10h18"/><path d="M9 16h6"/></svg></div>
        <div>
          <div class="float-notif-text">New wedding enquiry · 250 guests</div>
          <div class="float-notif-sub">December 2026 · Lagos Island · just now</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">luminaryevents.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Luminary <span>Events</span></div>
            <div class="msn-links">
              <span class="msn-link">Portfolio</span>
              <span class="msn-link">Services</span>
              <span class="msn-link">Packages</span>
              <span class="msn-link">Gallery</span>
              <span class="msn-cta">Enquire</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Luxury Event Planners · Lagos</div>
            <div class="msh-h1">Creating Moments That<br><span>Last Forever</span></div>
            <div class="msh-sub">Bespoke wedding and corporate event design for discerning clients who expect nothing less than extraordinary.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Plan My Event</span>
              <span class="msh-btn-s">View Gallery →</span>
            </div>
          </div>
          <!-- Event type grid -->
          <div class="mock-site-services">
            <div class="mss-label">Events We Create</div>
            <div class="mss-grid">
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M12 2a5 5 0 0 1 5 5c0 2.8-2.2 5-5 5S7 9.8 7 7a5 5 0 0 1 5-5Z"/><path d="M2 22c0-4.4 4.5-8 10-8s10 3.6 10 8"/></svg></div><div class="mss-name">Weddings</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/><path d="M12 12v4"/><path d="M10 14h4"/></svg></div><div class="mss-name">Corporate Events</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="m12 2 3.1 6.3 7 1-5.1 4.9 1.2 6.8L12 17.8l-6.2 3.2 1.2-6.8L2 9.3l7-.9z"/></svg></div><div class="mss-name">Social Parties</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M12 22c5.5 0 10-4.5 10-10S17.5 2 12 2 2 6.5 2 12s4.5 10 10 10z"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg></div><div class="mss-name">Bridal Showers</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M3 9h18"/><path d="M3 15h18"/><path d="M9 3v18"/><path d="M15 3v18"/></svg></div><div class="mss-name">Conferences</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M12 2v8l4 2"/><circle cx="12" cy="14" r="8"/></svg></div><div class="mss-name">Product Launches</div></div>
            </div>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">200<span>+</span></div><div class="mst-lbl">Events</div></div>
            <div class="mst-item"><div class="mst-num" style="font-size:.55rem">Featured</div><div class="mst-lbl">Style Mag</div></div>
            <div class="mst-item"><div class="mst-num">5<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rated</div></div>
            <div class="mst-item"><div class="mst-num">8<span>yrs</span></div><div class="mst-lbl">Experience</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "wedding planner Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Wedding Planners</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Corporate Event Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Social Event Planners</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Birthday Party Specialists</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Bridal Shower Coordinators</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Conference & Summit Organisers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Product Launch Event Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Venue Stylists & Decorators</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Entertainment & Live Event Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Charity Gala Organisers</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Wedding Planners</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Corporate Event Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Social Event Planners</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Birthday Party Specialists</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Bridal Shower Coordinators</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Conference & Summit Organisers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Product Launch Event Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Venue Stylists & Decorators</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Entertainment & Live Event Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Charity Gala Organisers</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most event planner<br>websites <em>lose bookings</em></h2>
    </div>
    <p>Before a couple chooses their wedding planner or a company selects their event partner, they visit websites — often several of them. Within seconds they judge elegance, portfolio quality, and professionalism. If your website does not communicate all three immediately, the enquiry goes to a competitor who spent more time on their digital presence than their social media. Here is what is going wrong on most event planner websites — and precisely what we do about it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></span>
      <h3 class="prob-title">Potential clients can't see the quality of your work without a portfolio website</h3>
      <p class="prob-desc">Your Instagram shows recent events, but Instagram is not searchable by Google, it has no permanent pages, and a scrolling feed does not communicate the full scope of a luxury event the way a curated portfolio website does. Clients choosing a high-budget planner want to see beautifully presented event photography, context, and detail — in a setting that feels as premium as your service.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A filterable portfolio gallery organised by event type — weddings, corporate events, social parties — with full-page event showcases, detailed captions, and high-resolution imagery that tells the complete story of each event you have created.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg></span>
      <h3 class="prob-title">No dedicated wedding or corporate event pages — enquiries are too general</h3>
      <p class="prob-desc">When a wedding couple and a corporate HR manager both land on the same generic "events" page, neither feels like you truly understand their specific needs. Weddings require emotional resonance, timelines, and vendor networks. Corporate events require logistics credibility, capacity, and past client names. Without dedicated pages for each, enquiries come in underqualified and your team spends hours filtering.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Individual service pages for every event type — weddings, corporate events, social parties, bridal showers, conferences — each with targeted copy, specific portfolio examples, relevant testimonials, and a tailored enquiry form.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Missing on Google when couples and companies search for event planners</h3>
      <p class="prob-desc">When a Lagos bride searches "wedding planner Lagos" or a company HR manager searches "corporate event planner Abuja", your business does not appear. These are high-intent searches from people who are actively ready to book — and they are going to competitors who have invested in SEO. Every day you are absent from these search results is revenue you are not winning.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Full technical SEO from day one — individual service pages optimised for specific event keywords, EventPlanner schema markup, local SEO for Lagos and Abuja, Google Business Profile optimisation, and Google Search Console setup so you rank when clients are searching.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg></span>
      <h3 class="prob-title">No package pricing page — clients don't know where to start</h3>
      <p class="prob-desc">The number one question every event planner receives is "how much does it cost?" When your website has no pricing information at all, two things happen: clients who cannot afford you waste both your time and theirs with an enquiry, and clients who can afford you assume you are out of their budget and click elsewhere. A well-structured packages page pre-qualifies every enquiry.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Package and pricing pages that clearly present your tiers, inclusions, what each package covers, and a starting-from price — giving clients a confident foundation for enquiring and significantly reducing back-and-forth before the first consultation.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M8 12h8"/><path d="M12 8v8"/></svg></span>
      <h3 class="prob-title">Gallery only on Instagram — no permanent, searchable portfolio online</h3>
      <p class="prob-desc">Instagram is a discovery platform, not a portfolio platform. It cannot be searched by Google, it does not preserve the context and captions of each event, and it disappears into a feed the moment a client closes the app. A website gallery is permanent, searchable, shareable, and gives each event the dedicated page it deserves — with vendor credits, client testimonials, and event details that Instagram simply cannot replicate.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A fully searchable, filterable gallery system on your website — organised by event type, venue, season, and guest count — with individual event showcase pages that rank on Google and can be shared directly with prospective clients as part of your discovery process.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
      <h3 class="prob-title">No vendor/supplier credibility section — clients want to know your network</h3>
      <p class="prob-desc">High-budget clients — especially wedding couples — select event planners partly based on who they know. Your relationships with florists, caterers, photographers, venues, and AV suppliers are a core part of your value proposition. If your website does not present your vendor network and preferred supplier relationships, you are leaving one of your strongest differentiators invisible.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A dedicated supplier and vendor network page that presents your trusted partners with their specialisms — signalling to clients that you have a trusted, curated ecosystem that makes their event seamless and stress-free from start to finish.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your event planning<br>website <em>needs</em></h2>
      <p>A high-performing event planner website is not a homepage and a contact form. It is a strategic, beautifully presented set of pages — each designed to serve a specific client at a specific stage of their event planning journey, and each engineered to rank for the search terms your future clients use when they need exactly what you offer.</p>
      <p>We map your event types, services, packages, portfolio, and team credentials to a complete page architecture that works for Google, for couples, and for corporate event buyers — simultaneously.</p>
      <ul class="bullets">
        <li>Homepage with portfolio hero and emotional brand positioning</li>
        <li>Individual service pages — Weddings, Corporate Events, Social Parties, Bridal Showers</li>
        <li>Photo and video gallery per event type with filterable search</li>
        <li>Package and pricing pages with detailed inclusions</li>
        <li>About and team credentials page</li>
        <li>Client testimonials and verified reviews section</li>
        <li>Supplier and vendor network showcase page</li>
        <li>Blog — wedding trends, planning guides, corporate event tips</li>
        <li>Enquiry and consultation booking form with pre-qualification</li>
        <li>FAQ page — covering budget, timeline, and process questions</li>
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
        <div class="page-card-head"><span class="pch-name">Wedding Planning</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Event Portfolio</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Packages & Pricing</span><span class="pch-badge std">Conversion Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Corporate Events</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Blog / Guides</span><span class="pch-badge key">SEO Engine</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>event planners</em></h2>
    </div>
    <p>Every event planner website we build is designed around the specific trust signals, visual storytelling requirements, and conversion patterns that make brides, grooms, and corporate clients choose one planner over another. These are not generic business website features — they are event-industry-specific elements that directly impact whether a visiting prospect submits an enquiry or books a consultation.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></div>
      <h3 class="svc-title">Event Portfolio Gallery</h3>
      <p class="svc-desc">A filterable, high-resolution gallery system organised by event type — weddings, corporate, social, bridal showers — with individual event showcase pages for each. Each event page includes a full photo story, vendor credits, event details, and a client testimonial. Every page is individually indexed by Google, creating dozens of additional ranking opportunities.</p>
      <div class="svc-tags"><span class="svc-tag">Filterable Gallery</span><span class="svc-tag">Event Showcase Pages</span><span class="svc-tag">Video Embed</span><span class="svc-tag">SEO-Indexed</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M12 2a5 5 0 0 1 5 5c0 2.8-2.2 5-5 5S7 9.8 7 7a5 5 0 0 1 5-5Z"/><path d="M2 22c0-4.4 4.5-8 10-8s10 3.6 10 8"/></svg></div>
      <h3 class="svc-title">Wedding & Corporate Service Pages</h3>
      <p class="svc-desc">Dedicated, deeply written service pages for each event category you offer. Wedding pages speak to couples emotionally — describing the planning journey, the day-of experience, and the vendor relationships that make the day perfect. Corporate event pages speak to decision-makers — covering capacity, past clients, logistics capability, and measurable outcomes.</p>
      <div class="svc-tags"><span class="svc-tag">Wedding Pages</span><span class="svc-tag">Corporate Events</span><span class="svc-tag">Social Parties</span><span class="svc-tag">Bridal Showers</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg></div>
      <h3 class="svc-title">Package & Pricing Pages</h3>
      <p class="svc-desc">Clear, elegantly designed pricing pages that present each package tier with a full inclusions list — so clients immediately understand what they are getting at each level. Starting-from prices dramatically reduce the "how much does it cost?" enquiries while pre-qualifying every serious lead before they contact you. Packages are fully editable from your CMS.</p>
      <div class="svc-tags"><span class="svc-tag">Package Tiers</span><span class="svc-tag">Inclusions Lists</span><span class="svc-tag">CMS-Editable</span><span class="svc-tag">Lead Qualification</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M8 2v4"/><path d="M16 2v4"/><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M3 10h18"/></svg></div>
      <h3 class="svc-title">Enquiry & Consultation Booking Forms</h3>
      <p class="svc-desc">Multi-step enquiry forms designed to collect the right information upfront — event type, date, guest count, venue preference, and budget range — so every enquiry that lands in your inbox is pre-qualified and actionable. Optional Calendly integration for direct consultation booking. All submissions go immediately to your email and are logged to your CRM.</p>
      <div class="svc-tags"><span class="svc-tag">Multi-Step Forms</span><span class="svc-tag">Calendly Integration</span><span class="svc-tag">CRM Connect</span><span class="svc-tag">Email Notifications</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">SEO for Event Planning Keywords</h3>
      <p class="svc-desc">Full technical and on-page SEO foundation — service pages optimised for "wedding planner Lagos", "corporate event planner Abuja", "event decorator Nigeria" and hundreds of related long-tail terms. EventPlanner and LocalBusiness schema markup for rich search results. Google Business Profile optimisation. Citation building across Nigerian and international event directories.</p>
      <div class="svc-tags"><span class="svc-tag">Event Keywords</span><span class="svc-tag">EventPlanner Schema</span><span class="svc-tag">Local SEO</span><span class="svc-tag">GSC Setup</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20"/><path d="M5 2h13a2 2 0 0 1 2 2v18"/><path d="M8 7h8"/><path d="M8 11h8"/><path d="M8 15h5"/></svg></div>
      <h3 class="svc-title">Blog & Content Strategy</h3>
      <p class="svc-desc">A fully managed blog section for publishing wedding trend articles, corporate event planning guides, venue spotlights, and seasonal content. Each article is an additional SEO landing page — building topical authority around your key event categories and bringing in organic search traffic from couples and companies actively researching their next event. Every post is shareable and linkable.</p>
      <div class="svc-tags"><span class="svc-tag">WordPress CMS</span><span class="svc-tag">Wedding Trends</span><span class="svc-tag">Planning Guides</span><span class="svc-tag">Newsletter Signup</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Event Planners</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when couples and<br>companies are searching for<br><em>your services</em></h2>
      <p>The moment a Lagos couple starts planning their wedding, they open Google. The moment a corporate team starts planning their annual conference, they open Google. If your event planning business does not appear on page one of those searches, you do not exist for those clients — and they book someone else. Every website we build is engineered to rank for the exact search terms your ideal clients use.</p>
      <p>We do not just build websites — we build search visibility. Your homepage, each service page, individual event portfolio pages, and blog articles are all individually optimised for specific keyword targets. EventPlanner and LocalBusiness schema markup ensures Google understands precisely what you do, where you operate, and who your ideal clients are.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each event type you offer</li>
        <li>Location pages targeting Lagos, Abuja, and every city where you operate</li>
        <li>EventPlanner + LocalBusiness JSON-LD schema on every relevant page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Citation building across Nigerian event and wedding directories</li>
        <li>Long-tail keyword content strategy targeting couples in the planning phase</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Event Planner — Keyword Rankings (before & after)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">wedding planner lagos</span>
            <span class="kw-vol">6,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">event planner nigeria</span>
            <span class="kw-vol">4,200/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">wedding planner abuja</span>
            <span class="kw-vol">3,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">corporate event planner nigeria</span>
            <span class="kw-vol">2,100/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">birthday party planner lagos</span>
            <span class="kw-vol">2,800/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">event decorator lagos</span>
            <span class="kw-vol">3,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">wedding coordinator nigeria</span>
            <span class="kw-vol">2,400/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">event management company lagos</span>
            <span class="kw-vol">1,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active event planning SEO campaign</div>
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
    <p>We have built websites for event planners, wedding coordinators, and corporate event companies across Nigeria and the UK. These are the outcomes our clients consistently see.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="350">0</span><span>%</span></div>
      <div class="trust-label">Average increase in qualified event enquiries within the first 90 days of a new event planner website launch</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="96">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) on our custom-built event planner websites — fast, elegant, no bloat</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></span>
      <div class="trust-num">5<span>×</span></div>
      <div class="trust-label">Higher engagement on portfolio pages compared to standard service pages — clients spend time on event galleries before enquiring</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully launched event planner website — with a milestone-based delivery guarantee</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Professional websites delivered across Nigeria, the UK, and beyond — all built on custom code, never templates or page builders</div>
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
    <p>We have delivered websites for event planners ranging from intimate boutique studios to multi-planner agencies handling hundreds of events annually. This process has been refined across every project to remove surprises, protect your timeline, and deliver a website that immediately starts generating enquiries.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery & Portfolio Audit</div>
      <p class="proc-desc">A structured discovery session covering your event types, target clients, portfolio inventory, competitive landscape, SEO goals, and brand positioning. We audit your existing photography and content to map exactly what the website needs. We produce a complete sitemap — every page, every keyword target, every portfolio category — and agree on it in writing before any design work begins.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Portfolio Review</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Keyword Map</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Visual Design — Elegant, Brand-Led Event Aesthetics</div>
      <p class="proc-desc">High-fidelity Figma designs for all key pages — desktop and mobile — built around your brand palette, photography style, and the visual sophistication your target clients expect. Gallery layouts, service pages, and enquiry flows are all designed as a coherent visual system. Two revision rounds are included. You approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build — Portfolio Gallery & Enquiry System</div>
      <p class="proc-desc">Custom WordPress theme — no Elementor, no page builders. ACF Pro powers your event portfolio gallery, service pages, package tiers, testimonials, team profiles, and vendor network — all fully editable from the CMS without touching code. The filterable gallery system is built to handle hundreds of events as your portfolio grows. Staging environment is accessible throughout the build.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">ACF Pro Gallery</span><span class="proc-tag">Filterable Events</span><span class="proc-tag">Enquiry System</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO & Content</div>
      <p class="proc-desc">All content is entered, formatted, and fully SEO-optimised across every page — title tags, meta descriptions, heading hierarchy, EventPlanner and LocalBusiness schema markup, canonical URLs, XML sitemap, and Google Search Console submission. Event portfolio pages are individually optimised for specific keyword combinations. Google Analytics 4 is installed, goals configured, and all tracking verified before launch.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">EventPlanner Schema</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA & Launch</div>
      <p class="proc-desc">Cross-browser and cross-device quality assurance, PageSpeed audit (target 90+), form testing, gallery functionality verification, link testing, and a final review call before launch day. Domain is transferred to the new site, SSL is verified, and Cloudflare is configured for performance and security. You receive a CMS training session, a written admin guide, and a 30-day post-launch support window.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">30-Day Support</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly Retainer — SEO, Content & Maintenance</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your website ranking and performing perfectly — publishing wedding trend articles and event planning guides, adding new portfolio events to the gallery, building local SEO citations, monitoring Core Web Vitals, running daily backups, and delivering monthly keyword ranking reports. Most event planner clients see their strongest ROI in months 4–12 as organic search compounds.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Gallery Updates</span><span class="proc-tag">Blog Content</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Event planner websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed and built from scratch — no templates, no page builders — specifically for the planner's event types, brand aesthetic, and target client base.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#2e1065 0%,#4c1d95 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Luminary Events</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Wedding & Luxury Events</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Weddings</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Luxury</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Portfolio</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Wedding & Luxury Events</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Wedding & Luxury Event Planner · Lagos Island</div>
        <div class="port-title">Luminary Events</div>
        <p class="port-desc">Full portfolio website with 60-event gallery, wedding and corporate service pages, filterable gallery system, package pages, and vendor network showcase — ranking #1 for "wedding planner Lagos" within 90 days of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0c0a1e 0%,#1e1b4b 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Prestige Corporate Events</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">B2B Events & Conferences · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Conferences</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Summits</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Corporate</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Corporate Event Planner</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">B2B Events & Conference Planner · Abuja, Nigeria</div>
        <div class="port-title">Prestige Corporate Events</div>
        <p class="port-desc">Corporate-focused event company website with case study portfolio, conference and summit service pages, client logos section, capacity and logistics credibility page, and an RFP enquiry form targeting B2B event buyers.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a0533 0%,#3b0764 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Golden Touch Events</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Weddings & Social Events · London + Lagos</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Weddings</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Social</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Dual Market</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Weddings & Social Events · UK</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Weddings & Social Events · London + Lagos</div>
        <div class="port-title">Golden Touch Events</div>
        <p class="port-desc">Dual-market event planner website targeting Nigerian diaspora weddings in the UK and Nigerian-based social events — with separate market content, UK and Lagos service pages, and a dual-audience SEO strategy.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
<section class="pricing-section" id="pricing" aria-labelledby="pricing-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pricing-heading">Transparent pricing for<br>every size of <em>event planning business</em></h2>
    </div>
    <p>Every project is quoted individually after a free 30-minute consultation. These ranges are based on typical project scope — your exact quote will be detailed and itemised before any commitment is required.</p>
  </div>
  <div class="pricing-grid">

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Solo & Boutique Planners</div>
        <div class="price-name">Essential Site</div>
        <p class="price-tagline">A beautiful, credible website for a solo event planner or small studio needing a professional portfolio presence fast.</p>
        <div class="price-amount">₦450k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Homepage with portfolio hero</div>
        <div class="price-feat">4 service pages</div>
        <div class="price-feat">Gallery (up to 20 events)</div>
        <div class="price-feat">Enquiry & contact forms</div>
        <div class="price-feat">Full SEO foundation</div>
        <div class="price-feat">Google Analytics 4</div>
        <div class="price-feat">Mobile-responsive design</div>
        <div class="price-feat">30-day post-launch support</div>
        <div class="price-feat no">Package & pricing pages</div>
        <div class="price-feat no">Blog / content section</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn outline">Get a Quote →</a></div>
    </div>

    <div class="price-card featured reveal">
      <div class="price-head">
        <div class="price-badge">Most Popular</div>
        <div class="price-name">Growth Website</div>
        <p class="price-tagline">A full-featured event planner website built to rank on Google, showcase your portfolio, and win premium bookings consistently.</p>
        <div class="price-amount">₦900k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full service pages (all event types)</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Filterable gallery system</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Package & pricing pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Blog with planning guides</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Client testimonials section</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Vendor network page</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Newsletter signup</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full SEO + EventPlanner schema</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">60-day post-launch support</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn gold">Start This Project →</a></div>
    </div>

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Agencies & Multi-Planner Teams</div>
        <div class="price-name">Enterprise Platform</div>
        <p class="price-tagline">A comprehensive event management platform for larger agencies with multiple planners, CRM integration, and client portal requirements.</p>
        <div class="price-amount">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Full booking & contract management</div>
        <div class="price-feat">Client portal (event tracking)</div>
        <div class="price-feat">Vendor management system</div>
        <div class="price-feat">Multi-planner team access</div>
        <div class="price-feat">CRM integration</div>
        <div class="price-feat">Analytics dashboard</div>
        <div class="price-feat">Unlimited gallery events</div>
        <div class="price-feat">90-day support & SLA</div>
        <div class="price-feat">Ongoing SEO retainer available</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn solid">Request a Proposal →</a></div>
    </div>

  </div>
</section>

<!-- ═══ COMPARISON TABLE ═══ -->
<section class="compare-section" aria-labelledby="compare-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why Choose i2Medier</span>
      <h2 class="s-head" id="compare-heading">How we compare to<br><em>your other options</em></h2>
    </div>
    <p>Not all web development options are equal — especially for event planners where first impressions and visual presentation are your product.</p>
  </div>
  <table class="compare-table reveal" role="table" aria-label="Web design comparison for event planners">
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
        <td class="feature">Portfolio gallery system (filterable by event type)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Custom filterable gallery</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Individual service type pages (wedding, corporate, social)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Single generic page</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Dedicated pages per type</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely done well</span></td>
      </tr>
      <tr>
        <td class="feature">Package & pricing pages with inclusions</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> No structured pricing</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full pricing architecture</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic at best</span></td>
      </tr>
      <tr>
        <td class="feature">Consultation booking & enquiry forms</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Multi-step, pre-qualifying</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely complete</span></td>
      </tr>
      <tr>
        <td class="feature">Google review integration & testimonials</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Fully integrated</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely integrated</span></td>
      </tr>
      <tr>
        <td class="feature">EventPlanner schema markup (rich search results)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">CMS training + documentation</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> You figure it out</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Always included</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely provided</span></td>
      </tr>
      <tr>
        <td class="feature">Full code ownership on delivery</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Platform-locked forever</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Unconditional ownership</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often withheld</span></td>
      </tr>
    </tbody>
  </table>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What event planners and clients<br>say about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"I used to get all my bookings through referrals and Instagram. I honestly did not believe a website could make a real difference — until within six weeks of launch, I was getting enquiries from couples I had never met who found me on Google. The portfolio gallery is exactly what I needed. Three of those enquiries turned into confirmed weddings."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Mrs. Adaeze Okonkwo</div><div class="test-role">Bride · Luminary Events Wedding Client, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Our company was searching for a credible event management firm to handle our annual conference and product launch. We found Prestige Corporate Events through Google, reviewed their website, saw their past corporate events portfolio, and called within 20 minutes. The website gave us all the confidence we needed before we even made contact. Outstanding work."</p>
      <div class="test-author">
        <div class="test-avatar">C</div>
        <div><div class="test-name">Mr. Chidi Eze</div><div class="test-role">Corporate Client · Head of Events, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"My event planning business had been running for five years with zero online presence beyond Instagram. i2Medier built me a website that genuinely looks as good as my events. The pricing page alone has saved me hours every week — clients arrive knowing what they can expect, and the quality of enquiries has completely transformed. I wish I had done this three years ago."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Mrs. Amaka Obi</div><div class="test-role">Founder · Golden Touch Social Events, Lagos</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free event planning<br>website audit</h2>
    <p>We will review your current online presence, identify exactly what is costing you premium bookings, and show you what a professionally built website would fix. No commitment required.</p>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>event planner web design</em></h2>
    </div>
    <p>A comprehensive guide to building an event planner website that wins premium bookings, showcases your portfolio beautifully, and ranks on Google — written for Nigerian and UK event planning businesses.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for event planners">

      <h2>Why Nigerian event planners need professional websites in 2026</h2>
      <p>The event planning industry in Nigeria has grown significantly over the past decade, and with that growth has come intensified competition. Lagos alone has hundreds of event planners competing for the same pool of high-budget clients — weddings, corporate conferences, product launches, and social celebrations. In this environment, your website is your first and most powerful sales tool.</p>
      <p>Consider the client journey of a Lagos couple beginning to plan their wedding. Before they reach out to a single planner, they spend hours researching online — Googling "wedding planner Lagos", scrolling through Instagram, reading blog articles. When they arrive at a planner's website, they are making a judgment about elegance, creativity, organisation, and price range within the first few seconds. If the website communicates all of this clearly and beautifully, the enquiry follows. If it does not, they move to the next result.</p>
      <p>The same is true for corporate event buyers. An HR manager or marketing director searching for a company to handle their annual conference is evaluating professionalism, logistics capability, past client credibility, and capacity. A well-structured corporate event planner website communicates all of these signals before a single meeting is scheduled. Without it, you are competing entirely on word of mouth in a market that has long moved beyond that.</p>
      <p>A professional event planner website in 2026 is not a luxury. It is the digital equivalent of your showroom, your portfolio book, and your sales presentation — running twenty-four hours a day for every prospective client in Nigeria, the UK, and beyond.</p>

      <h2>Portfolio websites vs Instagram: why you need both but one more than the other</h2>
      <p>Instagram is an extraordinary discovery platform, and every event planner should be using it consistently. But Instagram and a professional portfolio website serve fundamentally different purposes — and confusing one for the other costs event planners significant revenue every year.</p>

      <h3>What Instagram does well</h3>
      <p>Instagram surfaces your work to people who do not know you exist. The algorithm introduces your content to potential clients through hashtags, explore pages, and the feeds of accounts that follow you. It is a top-of-funnel discovery tool — excellent at generating awareness but poorly suited to converting that awareness into bookings.</p>

      <h3>What a portfolio website does that Instagram cannot</h3>
      <p>A professional portfolio website captures clients who are actively searching for what you offer. When someone types "wedding planner Lagos" into Google, they are a self-qualified lead — they know they need a wedding planner, they are in Lagos, and they are ready to make contact. A website captures this intent. Instagram does not. Additionally, a website preserves your work permanently, presents it with full context and captions, allows deep filtering by event type and style, and creates dozens of individually Google-indexed pages that compound into organic search visibility over time.</p>
      <p>The practical answer: use Instagram for discovery and community, use your website for conversion and search ranking. Every event planner who invests in a professional portfolio website alongside their social presence consistently reports that website enquiries are higher quality, better pre-qualified, and more likely to convert into bookings than enquiries originating from social media alone.</p>

      <h2>Wedding planner SEO: ranking when couples are planning their big day</h2>
      <p>Search engine optimisation for wedding planners is one of the most high-reward digital investments available in the Nigerian events industry. The search terms couples use when planning their wedding — "wedding planner Lagos", "wedding coordinator Abuja", "luxury wedding planner Nigeria" — carry extremely high purchase intent. A person searching these terms is not browsing for entertainment. They are actively looking for someone to hire.</p>
      <p>Ranking for these terms requires a combination of technical SEO and content strategy. Technical foundations include EventPlanner schema markup (which helps Google understand exactly what your business does), LocalBusiness schema with your service area, fast page load times (Google's Core Web Vitals are a ranking factor), and a well-structured sitemap with clean URL architecture. Content strategy involves individual service pages for each wedding type you offer (traditional, white wedding, destination wedding, intimate ceremony), location pages for each city you serve, and a blog that publishes content around the questions couples ask during the planning process.</p>
      <p>The most valuable keyword categories for Nigerian wedding planners include service and location combinations ("wedding planner Lagos", "wedding coordinator Abuja"), style and type searches ("traditional wedding planner Nigeria", "luxury wedding Lagos"), and problem-based searches ("how to plan a wedding in Lagos", "wedding planner checklist Nigeria"). A comprehensive SEO strategy addresses all three categories simultaneously across the pages of your website.</p>

      <h2>Corporate event planners: winning B2B contracts through a credible online presence</h2>
      <p>Winning corporate event contracts requires a fundamentally different approach to website design and content strategy than winning weddings. Corporate event buyers — HR directors, marketing managers, executive assistants, and procurement teams — evaluate event planners through an entirely different lens than couples planning their wedding day.</p>
      <p>Corporate buyers are looking for evidence of logistics capability, scale, past client credibility, and professional reliability. They want to see that you have managed events of similar size and complexity to theirs. They want to see past corporate client names (even if only sectors, not specific company names). They want to understand your production process, your vendor relationships, and your contingency planning approach. And they want all of this presented in a format that feels professional enough to justify showing to a line manager or submitting as part of a formal tender evaluation.</p>
      <p>A corporate event planner website section should therefore be treated as a completely separate audience experience from the wedding section. Separate service pages, separate portfolio galleries showing only corporate events, separate testimonials from corporate clients, and a separate enquiry form that asks the right pre-qualifying questions for B2B event briefs. This separation signals to corporate buyers that you understand their world — and that signal is itself a powerful differentiator.</p>

      <h2>Package pricing pages and reducing the "how much does it cost?" barrier</h2>
      <p>The most frequently asked question in every event planner's inbox is some variation of "how much do you charge?" For planners without a pricing page, this question triggers a cycle of back-and-forth that wastes time on both sides — and often results in no booking because the prospect did not have enough information to commit to even an exploratory conversation.</p>
      <p>A well-designed package pricing page changes this dynamic entirely. By presenting clear package tiers with starting-from prices and detailed inclusions lists, you accomplish three things simultaneously: you pre-qualify enquiries (clients who cannot afford you self-select out before contacting you), you pre-qualify clients who can afford you (they arrive at the enquiry form with a clear sense of what they want), and you demonstrate the comprehensive value of your services in a format that is easy to evaluate and share with a partner or stakeholder who needs to approve the budget.</p>
      <p>The common objection to publishing pricing — "every event is different, so we can't publish prices" — is valid but not an insurmountable obstacle. Starting-from prices with clear scope parameters ("Full Wedding Management — from ₦900,000, covering up to 300 guests, full vendor coordination, and day-of management") give clients enough information to self-qualify without locking you into a fixed price before you have received a brief. This approach consistently increases the quality of enquiries and reduces the time invested in non-converting consultations.</p>

      <h2>Pricing guide for event planner websites in Nigeria</h2>
      <p>Event planner website costs in Nigeria vary based on the scope of the gallery system, the number of service pages required, whether a blog is included, and the level of SEO work at launch. As a practical guide for the Nigerian market in 2026:</p>
      <ul>
        <li><strong>Essential portfolio site</strong> (homepage, 4 service pages, basic gallery up to 20 events, enquiry form, SEO foundation): ₦450,000–₦600,000</li>
        <li><strong>Growth website</strong> (full service pages, filterable gallery system, package pages, blog, testimonials, vendor network, advanced SEO): ₦900,000–₦1.4M</li>
        <li><strong>Enterprise platform</strong> (booking management, client portal, vendor management, multi-planner access, CRM integration): ₦1.8M+</li>
      </ul>
      <p>The single most important factor affecting return on investment is not the build cost — it is the quality of the portfolio gallery and the SEO foundation. An event planner website that ranks on page one for "wedding planner Lagos" and presents a curated, professional portfolio pays for itself with a single premium booking. The planners who understand this and invest accordingly are the ones dominating their markets within 12–18 months of launch.</p>
      <p>A useful way to evaluate the investment: a single high-value wedding or corporate event booking typically generates between ₦200,000 and ₦2M in revenue for a Nigerian event planner. A website that generates even two additional bookings per year — bookings that would otherwise have gone to a competitor with a better online presence — delivers a return that vastly exceeds the build cost in the first year of operation alone. The compound value of search rankings and a growing portfolio gallery means that return only increases over time.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website review and proposal for your event planning business.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Review →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why event planner websites lose bookings</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for event planners</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about event planner<br><em>web design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every event planning business has different needs, portfolio size, and audience. Email us and we will give you a direct, honest answer specific to your business — no sales pressure.</p>
      <a href="mailto:hello@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">How does the gallery system work — can I add new events myself?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Yes — the gallery system is built on ACF Pro, which gives you a fully managed gallery where you can add new events, upload photos, write captions, assign event types, and publish new event showcase pages entirely from the WordPress admin — no coding required. Adding a new event to your portfolio takes around ten minutes. We provide a full written guide and a training session on handover so you are confident managing it from day one.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can we embed highlight videos and reels from events into the portfolio pages?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Yes. Every event showcase page supports embedded video from YouTube, Vimeo, or direct file upload. If you have highlight reels, teaser videos, or full event films, we build video embedding directly into the event page layout. Video content significantly increases time-on-page and conversion — visitors who watch an event video are substantially more likely to submit an enquiry than those who only view photos.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">How do I update my package prices when they change?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">Package prices and inclusions are fully editable from the WordPress CMS. You can update prices, add or remove inclusions, rename packages, or restructure your pricing tiers entirely without touching any code. This is important for event planners who adjust pricing seasonally or annually — changes are reflected on the website immediately and without any agency involvement or additional cost.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Do you set up Google My Business for event planners?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Yes. Google Business Profile optimisation is included in every project — category selection (Event Planner, Wedding Planner), service descriptions, photo uploads, opening hours, service areas, and initial review request setup. A well-optimised Google Business Profile dramatically improves visibility in local map pack searches — the results that appear with a map when someone searches "wedding planner near me" or "event planner Lagos". We also submit your site to Google Search Console and verify your sitemap on launch day.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Should wedding planner SEO and corporate event SEO be handled separately?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes — and this is one of the most important structural decisions we make in the architecture stage. Wedding clients and corporate event buyers use completely different search terms, have different decision-making processes, and respond to different content. We create separate service pages with separate keyword targets for each event category — so your wedding page targets bridal search terms and your corporate events page targets B2B conference and summit terms. This separation is not just better for SEO — it is better for conversion because each visitor lands on a page that speaks directly to their specific need.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Can the enquiry form automatically send a response to clients who submit?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">Yes. We configure automated email responses for every form submission — a professionally written acknowledgement that tells the client their enquiry has been received, what information you will need from them, and when they can expect to hear from you. You can customise this response message from the CMS. Automating the initial response significantly increases conversion — clients who receive an immediate, professional reply are far more likely to proceed to a consultation than those who wait hours or days for a first contact.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">How long does it take to build an event planner website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">A standard event planner website — homepage, service pages, gallery system with initial events loaded, package pages, blog, and SEO setup — takes 3–5 weeks from design approval to launch. Larger projects with extensive portfolio migration, client portal functionality, or multi-market content architecture may take 6–8 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know exactly what is happening, what is needed from you, and when the site will be live.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build an event planner<br>website that wins premium bookings?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We will review your current online presence, map your SEO keyword opportunities, and show you exactly what we would build — and why it will fill your event calendar.</p>
  <a href="mailto:hello@i2medier.com" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
