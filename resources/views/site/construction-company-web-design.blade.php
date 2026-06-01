@extends('public.layouts.app')

@section('title', 'Web Design for Construction Companies | Contractor Websites Nigeria | i2Medier')

@push('meta')
<meta name="description" content="Professional web design for construction companies, general contractors, and civil engineering firms. i2Medier builds fast, SEO-optimised contractor websites that win tenders, showcase projects, and generate enquiries 24/7. Nigeria & UK specialists."/>
<meta name="keywords" content="web design for construction companies, contractor website design Nigeria, building company website, civil engineering website design, construction firm website Nigeria, construction company website Lagos, builder website design, construction website development Nigeria, general contractor website, project management firm website"/>
<meta name="robots" content="index, follow"/>
<meta name="author" content="i2Medier Konceptz"/>
<link rel="canonical" href="{{ url('/services/web-design/construction-company-website-design') }}"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="{{ url('/services/web-design/construction-company-website-design') }}"/>
<meta property="og:title" content="Web Design for Construction Companies | i2Medier"/>
<meta property="og:description" content="We build professional websites for construction companies that win tenders, showcase projects, and generate high-value enquiries. Fast, credible, and optimised for Google from day one."/>
<meta property="og:image" content="{{ url('/og-construction-web-design.jpg') }}"/>
<meta property="og:site_name" content="i2Medier"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="Web Design for Construction Companies | i2Medier"/>
<meta name="twitter:description" content="Professional contractor websites that win projects and rank on Google. Nigeria & UK specialists."/>
<script type="application/ld+json">{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'Service',
  'name' => 'Web Design for Construction Companies',
  'serviceType' => 'Construction Company Website Design',
  'description' => 'Professional web design and development services for construction companies, general contractors, civil engineering firms, project management practices, building contractors, and property developers. We build fast, SEO-optimised websites that showcase project portfolios, win tenders, and generate high-value construction enquiries.',
  'provider' => [
    '@type' => 'Organization',
    'name' => 'i2Medier',
    'url' => url('/'),
    'email' => 'hello@i2medier.com',
  ],
  'areaServed' => ['Nigeria', 'United Kingdom', 'United States', 'Canada'],
  'audience' => [
    '@type' => 'Audience',
    'audienceType' => 'Construction companies, General contractors, Civil engineering firms, Building contractors, Project management firms, Property developers, Road construction companies',
  ],
  'offers' => [
    '@type' => 'Offer',
    'priceCurrency' => 'NGN',
    'price' => '350000',
    'description' => 'Construction company website starting from ₦350,000',
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'BreadcrumbList',
  'itemListElement' => [
    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
    ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Design', 'item' => route('site.services.web-design')],
    ['@type' => 'ListItem', 'position' => 4, 'name' => 'Web Design for Construction Companies', 'item' => url('/services/web-design/construction-company-website-design')],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@push('page_css')
    @vite('resources/css/public/pages/construction-company-web-design.css')
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
      <span aria-current="page">Web Design for Construction Companies</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Construction Company Web Design</span>
    <h1>Websites that win contracts<br>for your<br><em>construction firm</em></h1>
    <p class="hero-sub">We build professional, fast, and Google-ranked websites specifically for construction companies, general contractors, civil engineering firms, and project management practices — in Nigeria, the UK, and worldwide. Stop losing tenders to competitors with more credible online presence.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Construction Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Built for contractors — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> SEO from launch day</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria & UK specialists</span>
    </div>
  </div>

  <!-- Construction website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
        <div>
          <div class="float-notif-text">New tender enquiry · Civil Construction</div>
          <div class="float-notif-sub">Abuja · 5 min ago</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">apexstructures.com.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Apex <span>Structures Ltd</span></div>
            <div class="msn-links">
              <span class="msn-link">Projects</span>
              <span class="msn-link">Services</span>
              <span class="msn-link">About</span>
              <span class="msn-link">Contact</span>
              <span class="msn-cta">Get a Quote</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">General Contractors · Lagos & Abuja</div>
            <div class="msh-h1">Building Nigeria's Infrastructure,<br><span>One Project at a Time</span></div>
            <div class="msh-sub">Civil works, building construction, project management, and interior fit-out across Lagos, Abuja, and Port Harcourt.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">View Our Projects</span>
              <span class="msh-btn-s">Request a Quote →</span>
            </div>
          </div>
          <!-- Services -->
          <div class="mock-site-services">
            <div class="mss-label">Our Capabilities</div>
            <div class="mss-grid">
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M3 21h18"/><path d="M5 21V7l7-4 7 4v14"/><path d="M9 21v-4h6v4"/></svg></div><div class="mss-name">Civil Works</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></div><div class="mss-name">Building Construction</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M9 11H1l8-8z"/><path d="M15 13h8l-8 8z"/><path d="M8 7h8v10H8z"/></svg></div><div class="mss-name">Project Management</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z"/><path d="m3 9 2.45-4.9A2 2 0 0 1 7.24 3h9.52a2 2 0 0 1 1.8 1.1L21 9"/></svg></div><div class="mss-name">Interior Fit-Out</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M2 20h20"/><path d="M4 20V8l8-6 8 6v12"/></svg></div><div class="mss-name">Featured Project</div></div>
              <div class="mss-card" style="background:rgba(180,83,9,.08);border-color:rgba(180,83,9,.2)"><div class="mss-ico" style="color:#b45309"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div><div class="mss-name" style="color:#b45309">ISO Certified</div></div>
            </div>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">50<span>+</span></div><div class="mst-lbl">Projects</div></div>
            <div class="mst-item"><div class="mst-num">12<span>yrs</span></div><div class="mst-lbl">Experience</div></div>
            <div class="mst-item"><div class="mst-num">ISO</div><div class="mst-lbl">Certified</div></div>
            <div class="mst-item"><div class="mst-num">4.8<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rating</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "construction company Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Civil Engineering Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> General Contractors</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Building Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Project Management Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Interior Fit-Out Contractors</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Road Construction Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Real Estate Developers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Renovation & Refurbishment Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Structural Engineering Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Property Developers</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Civil Engineering Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> General Contractors</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Building Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Project Management Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Interior Fit-Out Contractors</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Road Construction Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Real Estate Developers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Renovation & Refurbishment Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Structural Engineering Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Property Developers</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most construction company<br>websites <em>lose contracts</em></h2>
    </div>
    <p>A property developer or project client searches for a contractor before they make a single call. Within seconds they have assessed whether your firm looks capable, credible, and large enough to handle their project. If your website does not communicate capability fast, they move on to a competitor who looks the part. Here is what is failing on most construction company websites — and what we do about it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" y1="22" x2="4" y2="15"/></svg></span>
      <h3 class="prob-title">No project portfolio online — just words, no proof</h3>
      <p class="prob-desc">Construction is a proof-based industry. Developers and clients want to see what you have built before they trust you with their project. A website with no photos, no project specifications, and no completion records does not inspire the confidence required to win a tender or mandate. If your work is not on the website, it does not exist to the client evaluating you remotely.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A fully structured project portfolio with high-quality imagery, project type, location, scope, and value for every completed project — categorised so clients can filter by what they need to see.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Invisible when developers search Google for contractors</h3>
      <p class="prob-desc">When a real estate developer in Lagos types "general contractor Lagos" or a government agency searches "civil engineering firm Abuja", your company does not appear. Every search that goes to a competitor is a project you will never be invited to quote on. Most construction firms in Nigeria have no SEO whatsoever — which means the opportunity for those that do is enormous.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every site includes a full SEO foundation — service-specific pages, location pages for Lagos, Abuja, and Port Harcourt, schema markup, and Google Search Console setup from day one.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
      <h3 class="prob-title">Website looks unprofessional compared to competitors</h3>
      <p class="prob-desc">A developer comparing three contractors will visit all three websites. A clean, professional, and modern website signals financial stability, operational maturity, and organisational competence — all of which translate directly to project confidence. An outdated, poorly designed site signals the opposite — and in a competitive tender environment, that perception costs you contracts.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Custom-built WordPress sites that load in under 2 seconds, score 90+ on Google PageSpeed, and look every bit as professional as your best-completed project.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <h3 class="prob-title">No tender or bid information page for procurement teams</h3>
      <p class="prob-desc">Government agencies, real estate developers, and corporate procurement teams look specifically for prequalification information when evaluating contractors. Company registration, CAC documents, COREN certification, safety records, ISO status, and past client references — these need to be accessible on your website, not buried in a PDF you email on request.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A dedicated contractor credentials and prequalification section — with CAC, COREN, NIA, ISO, and past project references clearly laid out so procurement teams can qualify your firm without a phone call.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.3 19.3 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 3a2 2 0 0 1-.6 1.8L7.2 10.3a16 16 0 0 0 6.5 6.5l1.8-1.8a2 2 0 0 1 1.8-.6l3 .5a2 2 0 0 1 1.7 2Z"/></svg></span>
      <h3 class="prob-title">Poor mobile experience on site — clients are on their phones</h3>
      <p class="prob-desc">Over 78% of Nigerian web traffic arrives on a mobile device. Project managers, developers, and procurement officers browsing your portfolio during site visits or on their commute are doing so on a phone. If your website is not perfectly responsive on mobile, you are making your own projects look unprofessional to the very people you want to impress.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every design begins mobile-first — fully responsive at every breakpoint, with touch-optimised navigation and project galleries that look excellent on any screen size.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></span>
      <h3 class="prob-title">No client testimonials or project case studies</h3>
      <p class="prob-desc">In the construction industry, social proof from past clients is one of the most powerful trust mechanisms available. A letter of recommendation from a Lagos real estate developer or an Abuja government agency can unlock doors a company brochure never could. Yet most construction websites have no testimonials, no case studies, and no evidence of client satisfaction — leaving prospective clients to wonder who has actually trusted you with their money.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A dedicated testimonials and case study section with client quotes, project outcomes, and key metrics from completed work — turning your track record into a visible competitive advantage.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your construction<br>company's website <em>needs</em></h2>
      <p>A high-performing construction company website is not a homepage and a contact form. It is a structured, strategic set of pages — each designed to serve a specific audience, whether that is a property developer evaluating your portfolio, a procurement officer assessing your credentials, or a project manager comparing your service capabilities against a competitor.</p>
      <p>We map your services, project types, certifications, and locations to a comprehensive page architecture that works for both Google and the clients who need to trust you with significant capital.</p>
      <ul class="bullets">
        <li>Homepage — capability, portfolio highlights, and a clear path to enquiry</li>
        <li>Project Portfolio pages — filterable by project type, location, and sector</li>
        <li>Individual Service pages — one per discipline (Civil Works, Building Construction, Roads, Fit-Out, etc.)</li>
        <li>About & Leadership — company history, leadership team, and key milestones</li>
        <li>Tender & Bid Information — prequalification documents, certifications, and past clients</li>
        <li>Client Testimonials — quotes and case studies from past project owners</li>
        <li>Blog / Insights — construction industry thought leadership that drives organic traffic</li>
        <li>Contact & Locations — office addresses, Google Maps, and project enquiry forms</li>
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
        <div class="page-card-head"><span class="pch-name">Project Portfolio</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Civil Works</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Tender & Credentials</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Building Construction</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Blog / Insights</span><span class="pch-badge key">SEO Engine</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>construction companies</em></h2>
    </div>
    <p>Every construction company website we build is designed around the specific trust signals, credentialling requirements, and conversion patterns of the contracting sector. These are not generic business website features — they are construction-firm-specific elements that directly influence whether a visiting developer or procurement officer picks up the phone to call you.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" y1="22" x2="4" y2="15"/></svg></div>
      <h3 class="svc-title">Project Portfolio Showcase</h3>
      <p class="svc-desc">A filterable, visually rich project gallery where every completed job is documented with professional photography, project type, location, client name (where permitted), scope, and timeline. Categorised by sector — residential, commercial, civil infrastructure, roads — so developers can immediately see the work most relevant to their own project.</p>
      <div class="svc-tags"><span class="svc-tag">Project Gallery</span><span class="svc-tag">Filter by Type</span><span class="svc-tag">Before & After</span><span class="svc-tag">Case Studies</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
      <h3 class="svc-title">Tender & Bid Information Pages</h3>
      <p class="svc-desc">A dedicated prequalification section containing your company profile, CAC registration, COREN certification, ISO status, Health & Safety policy, insurance certificates, past project references, and key financial indicators. Structured so government agencies and corporate procurement teams can assess and shortlist your firm without a back-and-forth email chain.</p>
      <div class="svc-tags"><span class="svc-tag">Prequalification Docs</span><span class="svc-tag">Download Pack</span><span class="svc-tag">Project References</span><span class="svc-tag">Financial Info</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></div>
      <h3 class="svc-title">Contractor Credentials Display (CAC, COREN, NIA)</h3>
      <p class="svc-desc">Your regulatory memberships and professional certifications — CAC registration, COREN fellowship, NIA membership, SON certification, ISO 9001, ISO 45001, and trade body accreditations — are displayed prominently as trust anchors throughout the site, not relegated to a footnote. Accreditation badges are integrated into the design to build immediate credibility.</p>
      <div class="svc-tags"><span class="svc-tag">CAC Badge</span><span class="svc-tag">COREN</span><span class="svc-tag">ISO Certified</span><span class="svc-tag">NIA Member</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/><circle cx="9.5" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.1a4 4 0 0 1 0 7.8"/></svg></div>
      <h3 class="svc-title">Client & Developer Testimonials</h3>
      <p class="svc-desc">Structured testimonials from past project owners, developers, and corporate clients — with name, company, project type, and a specific outcome statement. Case study deep-dives for landmark projects covering the brief, challenges, solutions, and measurable results. Every testimonial and case study is an additional SEO asset and a trust-building tool for prospective clients in the evaluation stage.</p>
      <div class="svc-tags"><span class="svc-tag">Client Quotes</span><span class="svc-tag">Case Studies</span><span class="svc-tag">Project Outcomes</span><span class="svc-tag">Video Testimonials</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M3 21h18"/><path d="M5 21V7l7-4 7 4v14"/><path d="M9 9h6"/><path d="M9 13h6"/></svg></div>
      <h3 class="svc-title">Project-type Service Pages</h3>
      <p class="svc-desc">Individual, SEO-optimised service pages for every construction discipline you offer — Civil Works, Building Construction, Road & Infrastructure, Project Management, Interior Fit-Out, Renovation & Refurbishment. Each page is keyword-targeted, includes scope descriptions, typical project specifications, and links to relevant portfolio examples from that service category.</p>
      <div class="svc-tags"><span class="svc-tag">Civil Works Page</span><span class="svc-tag">Roads & Infra</span><span class="svc-tag">Building Works</span><span class="svc-tag">Fit-Out</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.3 19.3 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 3a2 2 0 0 1-.6 1.8L7.2 10.3a16 16 0 0 0 6.5 6.5l1.8-1.8a2 2 0 0 1 1.8-.6l3 .5a2 2 0 0 1 1.7 2Z"/></svg></div>
      <h3 class="svc-title">Lead Generation & RFQ Forms</h3>
      <p class="svc-desc">Multi-step Request for Quote forms that capture project type, location, estimated budget, timeline, and contact details — so your team receives structured, pre-qualified leads instead of vague messages. Enquiry forms on every key page with direct-to-email delivery and CRM integration. Every RFQ submission includes an automatic acknowledgement to the prospect, building professionalism from the first interaction.</p>
      <div class="svc-tags"><span class="svc-tag">RFQ Forms</span><span class="svc-tag">Project Enquiry</span><span class="svc-tag">CRM Integration</span><span class="svc-tag">Auto-reply</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Contractors</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when developers are<br>searching for <em>your services</em></h2>
      <p>The most important moment in your business development process is when a property developer, government procurement officer, or facilities manager opens Google and types "general contractor Lagos" or "civil engineering firm Abuja". If your company is not on page one, you are not in contention. Every website we build for construction companies is engineered to rank for the exact search terms your clients use when they have a project to award.</p>
      <p>We do not just build websites — we build search visibility. Your home page, each service page, your project location pages, and your insights articles are all individually optimised for specific keyword targets. We implement ConstructionService and LocalBusiness schema markup so Google understands exactly what you build, where you operate, and who you serve.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each construction service you offer</li>
        <li>Location pages targeting every city where you take on projects — Lagos, Abuja, Port Harcourt, and beyond</li>
        <li>ConstructionService + LocalBusiness JSON-LD schema markup on every relevant page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Citation building across Nigerian and international business and construction directories</li>
        <li>Long-tail keyword content targeting searches like "building contractor Lekki" and "renovation company Victoria Island"</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Construction Company — Keyword Rankings (before & after)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">construction company lagos</span>
            <span class="kw-vol">3,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">general contractor nigeria</span>
            <span class="kw-vol">1,900/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">civil engineering firm abuja</span>
            <span class="kw-vol">1,400/mo</span>
            <span class="kw-pos top10">▲ #4</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">building contractor nigeria</span>
            <span class="kw-vol">1,100/mo</span>
            <span class="kw-pos top3">▲ #3</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">project management firm lagos</span>
            <span class="kw-vol">820/mo</span>
            <span class="kw-pos top10">▲ #5</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">renovation contractor nigeria</span>
            <span class="kw-vol">680/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">property developer website</span>
            <span class="kw-vol">540/mo</span>
            <span class="kw-pos top10">▲ #6</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">road construction nigeria</span>
            <span class="kw-vol">420/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active construction company SEO campaign</div>
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
    <p>We have built websites for professional services firms and contractors across Nigeria and the UK. These are the outcomes our clients consistently see when they invest in a properly built, fully optimised website.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="280">0</span><span>%</span></div>
      <div class="trust-label">Average increase in organic Google search visibility within the first 90 days of a new construction company website launch</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="94">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) achieved on our custom-built construction company websites — no page builder bloat</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="4">0</span><span>×</span></div>
      <div class="trust-label">Increase in monthly project enquiries reported by construction clients within 6 months of launch, compared to their previous website</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched construction company website — with a guaranteed, milestone-based delivery timeline</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Professional and trade sector websites delivered across Nigeria, the UK, the US, and Canada — all built on custom code, never templates</div>
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
    <p>We have delivered over 120 websites for professional services firms and trade businesses. This process works — it has been refined to eliminate the delays, scope disagreements, and communication failures that make most web development projects frustrating and expensive.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery & Site Architecture</div>
      <p class="proc-desc">A structured discovery session covering your company's services, project types, target clients (government, private developer, corporate), geographic coverage, certifications, and business goals. We map your complete site architecture — every page, every content type, every keyword target — and agree on it in writing before any design work begins. This document prevents scope drift and ensures every decision is intentional.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Keyword Map</span><span class="proc-tag">Signed Brief</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Design — Professional, Not Generic</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for all key pages. We design your brand colours, project photography layouts, credentials display, and conversion elements to work as a coherent system. The visual language reflects capability, reliability, and scale — not a generic template. Two revision rounds are included. You approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">WordPress Build — Custom Theme</div>
      <p class="proc-desc">Your website is built on a custom PHP WordPress theme — no Elementor, no page builders. ACF Pro powers your project portfolio, service pages, team profiles, testimonials, and credentials — all fully editable from WordPress admin without touching code. A staging environment is accessible throughout the build so you can review progress at any point and provide feedback in real time.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">ACF Pro</span><span class="proc-tag">Staging Access</span><span class="proc-tag">RFQ Integration</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO & Content</div>
      <p class="proc-desc">Your content is entered across all pages, formatted correctly, and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, schema markup (ConstructionService, LocalBusiness, Organization), canonical URLs, XML sitemap, and Google Search Console submission. Google Analytics 4 is installed, goals configured, and all tracking verified before launch. Project portfolio pages are individually optimised for image SEO.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA & Launch</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 90+), RFQ form testing, link verification, image compression review, and a final review call before launch day. Your domain is pointed to the new site, SSL is verified, and Cloudflare is configured for optimal speed across Nigeria and internationally. You receive a 45-minute CMS training session and a written admin guide.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">30-Day Support</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly SEO & Maintenance Retainer</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your site ranking and running at peak performance — publishing construction industry insights articles, building local SEO citations, monitoring Core Web Vitals, updating WordPress and plugins, running daily backups, and delivering monthly keyword ranking reports. Most construction firm clients see their strongest ROI in months 4–12 as content and links compound.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Content Creation</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Construction websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the firm's services, project types, geographic coverage, and target clients.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--construction-dk) 0%,#78350f 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Apex Structures Ltd</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">General Contractors · Lagos</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Civil Works</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Building</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Fit-Out</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">General Contractors</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Construction Company · Lagos, Nigeria</div>
        <div class="port-title">Apex Structures Ltd</div>
        <p class="port-desc">Full website with project portfolio, 8 service pages, credentials section, and RFQ form. Reached page one for "general contractor Lagos" within 90 days of launch, generating consistent project enquiries.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a2818 0%,#2d4a1e 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Cornerstone Civil Engineering</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Civil Engineers · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">COREN</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Roads</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Infrastructure</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Civil Engineering</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Civil Engineering Firm · Abuja, Nigeria</div>
        <div class="port-title">Cornerstone Civil Engineering</div>
        <p class="port-desc">COREN-accredited civil engineering firm website with tender information pages, project case studies targeting government infrastructure clients, and ranking pages for Abuja civil works searches.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#2d2060 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">BuildRight Contractors</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Building Contractors · UK & Nigeria</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">ISO 9001</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Renovation</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Residential</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Building Contractors · UK + Nigeria</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Building Contractors · United Kingdom & Nigeria</div>
        <div class="port-title">BuildRight Contractors</div>
        <p class="port-desc">Dual-market website for a UK-based contractor serving Nigerian diaspora residential projects — with separate content strategies targeting UK renovation searches and Lagos building construction keywords.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
<section class="pricing-section" id="pricing" aria-labelledby="pricing-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pricing-heading">Transparent pricing for<br>every size of <em>construction firm</em></h2>
    </div>
    <p>Every project is quoted individually after a free 30-minute consultation. These ranges are based on typical project scope — your exact quote will be detailed and itemised before any commitment is required.</p>
  </div>
  <div class="pricing-grid">

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Small Contractors & Sole Traders</div>
        <div class="price-name">Essential Site</div>
        <p class="price-tagline">A clean, credible website for a growing contractor needing a professional online presence to support tenders and referrals.</p>
        <div class="price-amount">₦350k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Up to 6 pages</div>
        <div class="price-feat">Custom WordPress theme</div>
        <div class="price-feat">Project photo gallery (up to 10 projects)</div>
        <div class="price-feat">Credentials display (CAC, certifications)</div>
        <div class="price-feat">RFQ / project enquiry form</div>
        <div class="price-feat">Full SEO foundation</div>
        <div class="price-feat">Google Analytics 4</div>
        <div class="price-feat">Mobile-responsive design</div>
        <div class="price-feat no">Individual service pages</div>
        <div class="price-feat no">Tender information section</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn outline">Get a Quote →</a></div>
    </div>

    <div class="price-card featured reveal">
      <div class="price-head">
        <div class="price-badge">Most Popular</div>
        <div class="price-name">Growth Website</div>
        <p class="price-tagline">A full-service construction company website built to rank for contractor searches, showcase projects, and win high-value tenders.</p>
        <div class="price-amount">₦750k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Up to 15 pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Custom theme + ACF Pro</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full project portfolio (unlimited)</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Individual service pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Tender & credentials section</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Client testimonials & case studies</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full SEO + schema markup</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">CMS training session</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">60-day post-launch support</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn gold">Start This Project →</a></div>
    </div>

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Large Firms & Multi-Location</div>
        <div class="price-name">Enterprise Build</div>
        <p class="price-tagline">A comprehensive digital platform for large construction groups, multi-location firms, and property developers with complex content needs.</p>
        <div class="price-amount">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Unlimited pages & service areas</div>
        <div class="price-feat">Advanced project portfolio (filterable)</div>
        <div class="price-feat">Prequalification document portal</div>
        <div class="price-feat">Multi-office location pages</div>
        <div class="price-feat">Sub-brand or division microsites</div>
        <div class="price-feat">Newsletter & media relations</div>
        <div class="price-feat">Full analytics dashboard</div>
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
    <p>Not all web development options are equal — especially for construction companies where your website is often the first credibility filter in a competitive tender process.</p>
  </div>
  <table class="compare-table reveal" role="table" aria-label="Web design comparison for construction companies">
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
        <td class="feature">Built specifically for construction firms</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Construction-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">No page builder / full custom code</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Platform-locked</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Pure custom PHP</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often Elementor</span></td>
      </tr>
      <tr>
        <td class="feature">Mobile PageSpeed score 90+</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Typically 40–65</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Guaranteed target</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely achieved</span></td>
      </tr>
      <tr>
        <td class="feature">Full SEO (schema, sitemap, GA4)</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Complete foundation</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely complete</span></td>
      </tr>
      <tr>
        <td class="feature">ConstructionService schema markup</td>
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
      <tr>
        <td class="feature">Post-launch support window</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> No</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> 30–90 days standard</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Usually paid extra</span></td>
      </tr>
    </tbody>
  </table>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What construction firms say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Before the new website, we were entirely dependent on referrals and relationships to win work. Within four months of launching, we were receiving three to five serious project enquiries every week directly from Google. We ranked number one for 'general contractor Lagos' and the quality of leads is extraordinary — developers who have already seen our portfolio and want to discuss a specific project."</p>
      <div class="test-author">
        <div class="test-avatar">E</div>
        <div><div class="test-name">Emeka Okafor</div><div class="test-role">Managing Director · Apex Structures Ltd, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"As a civil engineering firm targeting government contracts, our prequalification and credentials page has been a game changer. Procurement officers can now verify our COREN registration, ISO certifications, and project references without a phone call. Two government agencies have told us directly that our website was a factor in shortlisting us. That is a return we never expected from a website."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Amina Bello FNSE</div><div class="test-role">CEO · Cornerstone Civil Engineering, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"We operate between the UK and Nigeria and needed a website that served both markets properly. i2Medier understood exactly what that meant — separate content for UK renovation searches and Nigerian building construction keywords, all on one cohesive site. The dual-market approach has opened enquiries from Nigerian diaspora homeowners in the UK who want their Lagos properties renovated. We would never have accessed that audience without the right website."</p>
      <div class="test-author">
        <div class="test-avatar">T</div>
        <div><div class="test-name">Tunde Adewale</div><div class="test-role">Director · BuildRight Contractors, UK & Nigeria</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free 30-minute website<br>review for your firm</h2>
    <p>We will audit your current site, identify your biggest ranking and conversion gaps, and show you exactly what a new website would fix — and what projects it would win you. No commitment required.</p>
  </div>
  <div class="cta2-right">
    <a href="#contact" class="btn-white-solid">Book a Free Review →</a>
  </div>
</div>

<!-- ═══ LONG-FORM SEO CONTENT ═══ -->
<section class="content-section" aria-labelledby="content-heading">
  <div class="two-col-intro" style="margin-bottom:2rem">
    <div>
      <span class="s-label">The Full Picture</span>
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>construction company web design</em></h2>
    </div>
    <p>A comprehensive guide to building a construction company website that wins tenders, ranks on Google, and showcases your firm's capability — written specifically for Nigerian and UK contractors.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for construction companies">

      <h2>Why construction companies need a professional website in 2025</h2>
      <p>The Nigerian construction sector has changed profoundly over the last decade. What was once a business won entirely through personal relationships, government contacts, and word-of-mouth referrals now operates in a digital landscape where your online presence is evaluated before any conversation begins. Property developers in Lagos and Abuja, corporate facilities managers, government procurement teams, and private homeowners all research contractors online before they ever pick up a phone.</p>
      <p>Consider how a Lagos real estate developer evaluates potential contractors for a new residential scheme. They receive recommendations from colleagues, then spend an evening researching every name on the list. The contractors with professional, detailed, and mobile-optimised websites — with visible project portfolios, clear credentials, and specific capability statements — get shortlisted. The contractors with outdated, poorly designed, or non-existent websites do not make the cut, regardless of how many projects they have successfully completed.</p>
      <p>A professional construction company website is no longer optional. It is the digital equivalent of your site hoarding, your company profile document, and your award submissions — working simultaneously, 24 hours a day, reaching every client who has a project to award and has opened a browser to find someone to trust with it. Construction firms in Nigeria that invest in a quality website in 2025 are positioning themselves to capture a pipeline of enquiries that their competitors are simply leaving on the table.</p>

      <h2>What makes a great construction company website?</h2>
      <p>The best construction company websites share a set of defining characteristics that go well beyond good graphic design. Understanding these helps you commission a site that will actually work for your business rather than simply look impressive on launch day.</p>

      <h3>A project portfolio that functions as proof of capability</h3>
      <p>The portfolio is the single most important section of any construction company website. Prospective clients are not evaluating your company in the abstract — they are asking a very specific question: can this contractor build something similar to what I need? Your portfolio must answer that question quickly and convincingly. This means high-quality photography of completed projects, structured project information (type, scope, location, timeline, value), and filtering that allows a developer looking for commercial construction experience to immediately find the most relevant examples of your work.</p>
      <p>Each portfolio entry should function as a standalone SEO asset — individually optimised for search terms like "commercial building Lagos completed projects" or "road construction Abuja portfolio". This means your portfolio is not just a trust-building tool; it is an active source of organic search traffic from clients who are looking for exactly what you have built.</p>

      <h3>Credentials and prequalification information accessible online</h3>
      <p>Government procurement officers and corporate facilities teams follow a structured prequalification process before inviting contractors to tender. Historically, this information was requested via email and delivered as a PDF company profile. The construction firms that are winning in 2025 have this information permanently accessible on their website — CAC registration details, COREN fellowship status, ISO 9001 and ISO 45001 certifications, Health & Safety policy documentation, past project client references, and financial statements where appropriate.</p>
      <p>Making prequalification information immediately accessible serves two purposes: it removes friction from the procurement team's evaluation process, and it demonstrates the kind of organisational transparency and professionalism that signals your firm is ready for serious work. <strong>Construction companies whose prequalification information is online get shortlisted faster than those who require a back-and-forth email exchange to collect the same information.</strong></p>

      <h3>Service-specific pages for every discipline you offer</h3>
      <p>A construction company that does civil works, building construction, project management, roads and infrastructure, and interior fit-out should not compress all of that capability into a single services page. Each discipline deserves its own page — with a specific description of what you do, the scale of work you undertake, your methodology, the sectors you typically serve, and links to relevant portfolio examples. Individual service pages allow you to rank for specific searches ("civil engineering contractor Abuja", "interior fit-out contractor Lagos"), and they allow prospective clients with a specific need to find the most relevant information immediately.</p>

      <h2>SEO for construction companies in Nigeria</h2>
      <p>Construction is one of the most searched service categories in Nigeria, and the competitive landscape for SEO is relatively less developed than other professional services sectors. This means the opportunity for construction companies that invest in SEO is significant — and the barrier to reaching page one for competitive keywords is lower than it will be in three to five years.</p>
      <p>The keyword landscape for Nigerian construction firms includes several distinct categories:</p>
      <ul>
        <li><strong>Service + location combinations:</strong> "construction company Lagos", "general contractor Abuja", "civil engineering firm Port Harcourt", "building contractor Lekki"</li>
        <li><strong>Service type searches:</strong> "road construction company Nigeria", "project management firm Lagos", "renovation contractor Abuja", "interior fit-out contractor Nigeria"</li>
        <li><strong>Credential-based searches:</strong> "COREN registered contractor Nigeria", "ISO certified building company Nigeria"</li>
        <li><strong>Project type searches:</strong> "commercial building contractor Lagos", "residential estate developer Nigeria", "industrial construction company Nigeria"</li>
        <li><strong>Comparison searches:</strong> "best construction companies in Nigeria", "top building contractors Lagos 2025"</li>
      </ul>
      <p>Local SEO is particularly valuable for construction firms because construction is inherently location-specific. A developer in Abuja searching for a contractor wants someone who works in Abuja, understands the local regulatory environment, has relationships with local suppliers, and can physically manage projects on the ground. Location-specific pages — "Construction Company Abuja", "General Contractor Port Harcourt" — serve both the prospective client and the Google algorithm by making geographic relevance explicit.</p>

      <h2>Using your project portfolio as an SEO tool</h2>
      <p>Construction firms sit on an under-utilised SEO goldmine: their completed projects. Every finished project is an opportunity to create an indexed page — a case study or portfolio entry — that ranks for specific, location-anchored search terms. A completed commercial complex in Victoria Island, Lagos becomes a page that ranks for "commercial construction Victoria Island Lagos". A completed government administrative building in Abuja becomes a page that attracts searches for "government building contractor Abuja".</p>
      <p>Each project page should include the project name, client (where permitted), location, construction type, scope description, timeline, challenges encountered and resolved, and high-quality before, during, and after photography. Optimised image alt text, structured data markup, and location-specific keyword targeting turn your portfolio from a static gallery into a dynamic SEO engine that compounds in value as your completed project list grows.</p>
      <p>This approach is especially powerful for construction firms targeting government or corporate clients, where a track record of similar projects is the primary evaluation criterion. A procurement officer who searches for "hospital construction Abuja" and finds your detailed case study of a similar completed project is already half-convinced before they read a word of your company profile.</p>

      <h2>How much does a construction company website cost in Nigeria?</h2>
      <p>The cost of a construction company website depends primarily on the scale of your portfolio, the number of services you offer, and the level of functionality required. The Nigerian market has a broad range of price points, but it is important to understand what different budgets deliver in practice.</p>
      <p>As a general guide for 2025:</p>
      <ul>
        <li><strong>Essential brochure site</strong> (5–6 pages, photo gallery, contact form, basic SEO): ₦350,000–₦500,000</li>
        <li><strong>Growth website</strong> (10–15 pages, full portfolio, individual service pages, tender section, advanced SEO): ₦750,000–₦1.2M</li>
        <li><strong>Enterprise platform</strong> (20+ pages, prequalification portal, multi-location, custom integrations, full SEO retainer): ₦1.5M+</li>
      </ul>
      <p>The most important factor in evaluating a web design proposal for your construction firm is not the headline price — it is the quality of the technical build, the depth of the SEO implementation, and the agency's understanding of the construction sector. A ₦200,000 website built on a generic template that scores 45 on Google PageSpeed and has no local SEO will generate no enquiries and deliver no return. A ₦750,000 custom-built, fully optimised construction website that generates five serious project enquiries per month pays for itself within weeks of launch — and continues to compound in value for years.</p>

      <h2>Building a digital presence that grows with your firm</h2>
      <p>The best construction company websites are platforms, not finished products. Built on a robust content management system — WordPress with ACF Pro, in our case — they can grow as your firm grows: new completed projects added to the portfolio, new service disciplines added as you expand your capabilities, new location pages created as you enter new markets in Kano, Port Harcourt, or internationally.</p>
      <p>Construction firms that treat their website as an ongoing investment — publishing project case studies as they complete, adding client testimonials as they come in, publishing insights articles about construction trends and regulation changes in Nigeria — build a compounding digital presence that becomes progressively harder for competitors to displace. The firms that achieve this are the ones that dominate construction search results in their target markets by month 12 to 18, and maintain that dominance because their content library is too deep and too authoritative for a new entrant to replicate quickly.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website review and proposal for your construction firm.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Review →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why most firm websites lose contracts</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for contractors</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about construction<br>company <em>web design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every construction firm has different needs. Email us and we'll give you a direct, honest answer specific to your firm — no sales pressure.</p>
      <a href="mailto:hello@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">How much does a website for a construction company cost?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Construction company websites start from ₦350,000 for a professional 5–6 page site with a photo gallery, project credentials, and basic SEO. Full-featured growth websites with individual service pages, a complete project portfolio, tender information section, and advanced SEO start from ₦750,000. Enterprise platforms with prequalification portals and multi-location pages are quoted individually. We provide a detailed, itemised quote after a free consultation — no hidden fees.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">What pages should a construction company website have?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">A high-performing construction company website should include: Home, About the Firm, Project Portfolio (filterable by type and location), individual Service pages (Civil Works, Building Construction, Roads, Project Management, Fit-Out, etc.), Tender & Credentials (prequalification information), Client Testimonials & Case Studies, Blog/Insights, and Contact with a Request for Quote form. Individual project pages are particularly important for SEO — they allow you to rank for specific searches like "commercial building contractor Lagos" or "road construction Abuja".</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">How long does it take to build a construction company website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">A standard construction company website typically takes 3–5 weeks from design approval to launch. Larger sites with extensive project portfolios, many service pages, and a prequalification portal may take 5–7 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when — and we never miss a deadline without prior communication.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Will my construction company website rank on Google?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Every website we build includes a complete SEO foundation — semantic HTML structure, optimised title tags and meta descriptions, ConstructionService and LocalBusiness schema markup, XML sitemap, canonical URLs, and Google Search Console setup. Project pages, service pages, and location pages are individually keyword-optimised. For ongoing SEO campaigns targeting competitive construction keywords in your city — "general contractor Lagos", "civil engineering Abuja" — we offer monthly retainer packages covering content creation, link building, and reporting.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Can I add new projects to the portfolio myself after launch?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes — this is a core principle of every site we build. We use ACF Pro to create intuitive portfolio management interfaces so you can add completed projects, upload photos, set project details, and categorise by type without touching any code. Your team can add a new project in under five minutes. Every handover includes a CMS training session and a written admin guide covering every content management workflow your team will need.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">How do you handle project photography if we don't have professional photos?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">We can work with existing photography, however good or basic — we optimise, resize, compress, and caption everything for both web performance and SEO. For firms with no photography at all, we can advise on a cost-effective photography approach, recommend standards for on-site photography using a modern smartphone, or we can work with architectural renders and site drawings for projects currently under construction. The portfolio does not need professional photography to be effective — but it does need real images of real work, not stock photos.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Do you build websites for construction companies targeting government contracts?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Yes, and we understand the specific requirements of government-facing construction websites. We build dedicated prequalification sections containing CAC registration details, COREN and NIA certifications, ISO status, Health & Safety documentation, past government project references, and key personnel profiles — all structured to meet the information expectations of government procurement teams. We also advise on Google Business Profile optimisation and directory listings that improve your visibility in government procurement searches.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a construction company<br>website that wins contracts?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We'll review your current site, map your keyword opportunities, and show you exactly what we'd build — and what projects it would win you.</p>
  <a href="mailto:hello@i2medier.com" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
<script>
// Scroll reveal
const obs = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      const siblings = [...e.target.parentElement.children].filter(c => c.classList.contains('reveal'));
      const idx = siblings.indexOf(e.target);
      e.target.style.transitionDelay = (idx * 0.08) + 's';
      e.target.classList.add('visible');
      obs.unobserve(e.target);
    }
  });
}, { threshold: 0.08 });
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

// Counters
function animateCounter(el) {
  const target = parseInt(el.dataset.target);
  const step = target / (1800 / 16);
  let cur = 0;
  const t = setInterval(() => {
    cur += step;
    if (cur >= target) { cur = target; clearInterval(t); }
    el.textContent = Math.floor(cur);
  }, 16);
}
const cObs = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { animateCounter(e.target); cObs.unobserve(e.target); } });
}, { threshold: 0.5 });
document.querySelectorAll('.counter').forEach(el => cObs.observe(el));

// FAQ
document.querySelectorAll('.faq-q').forEach(btn => {
  btn.addEventListener('click', () => {
    const id = btn.getAttribute('aria-controls');
    const answer = document.getElementById(id);
    const isOpen = btn.getAttribute('aria-expanded') === 'true';
    document.querySelectorAll('.faq-q').forEach(b => {
      b.setAttribute('aria-expanded', 'false');
      const a = document.getElementById(b.getAttribute('aria-controls'));
      if (a) a.classList.remove('open');
    });
    if (!isOpen) {
      btn.setAttribute('aria-expanded', 'true');
      answer.classList.add('open');
    }
  });
});
</script>
@endpush
