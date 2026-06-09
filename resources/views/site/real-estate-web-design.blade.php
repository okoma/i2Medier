@extends('public.layouts.app')

@section('title', 'Web Design for Real Estate Agencies | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Design', 'item' => route('site.services.web-design')],
        ['@type' => 'ListItem', 'position' => 4, 'name' => 'Real Estate Web Design', 'item' => route('site.services.web-design.industry', ['industry' => 'real-estate-website-design'])],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'How much does a real estate website cost in Nigeria?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Real estate websites start from ₦450,000 for a professional agency site with up to 25 listings, search filters, and lead capture. Growth portals with unlimited listings, map search, virtual tours, and property alert email systems start from ₦900,000. Enterprise platforms for large developers and multi-office firms are quoted individually. We provide a detailed, itemised quote after a free 30-minute consultation — no hidden charges.']],
        ['@type' => 'Question', 'name' => 'Can visitors search and filter properties on my website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — dynamic property search is core to every real estate website we build. Visitors can filter by property type, location, price range, number of bedrooms and bathrooms, and status (for sale, to let, sold, let agreed). Results update in real time without page reloads. We also build map-based search using Google Maps, allowing buyers to browse properties geographically by dropping a pin or drawing a search area.']],
        ['@type' => 'Question', 'name' => 'Will my real estate website rank on Google?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Every property website we build includes a complete SEO foundation — RealEstateListing and LocalBusiness schema markup, individual optimised pages for each listing, location-specific category pages targeting "properties for sale [area]" and "houses to let [city]" keywords, and Google Search Console setup. For competitive markets like Lagos and Abuja, we also offer monthly SEO retainers covering ongoing content creation and link building to achieve and maintain page-one rankings.']],
        ['@type' => 'Question', 'name' => 'Can I manage my own listings after launch?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. Every real estate website we build gives your team complete control over listings from a simple WordPress admin panel. Adding a new property takes under 5 minutes — upload photos, enter the details, set the price and status. No developer access required at any point. We also support bulk CSV import for agencies migrating large listing catalogues from another system. A CMS training session and written admin guide are included on every project.']],
        ['@type' => 'Question', 'name' => 'Do you integrate virtual tours and video walkthroughs?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We integrate Matterport 3D virtual tours, YouTube and Vimeo video walkthroughs, and 360° image galleries directly into individual property listing pages. Virtual tours are particularly valuable for diaspora buyers viewing properties remotely and for off-plan developments where the physical property is not yet built. Properties with virtual tours consistently generate significantly higher enquiry rates than photo-only listings.']],
        ['@type' => 'Question', 'name' => 'Can the website send automatic alerts to buyers and tenants?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. Our property alert system allows visitors to register their search criteria — property type, location, price range, number of bedrooms — and receive automatic email notifications when matching new listings are added. When you publish a new listing that matches a registered buyer\'s criteria, the email goes out automatically within minutes. This builds a warm, permission-based buyer database that grows over time and reduces time-to-enquiry on new listings.']],
        ['@type' => 'Question', 'name' => 'How long does it take to build a real estate website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A standard real estate website with listings, search, lead capture, and agent profiles typically takes 4–6 weeks from design approval to launch. Larger platforms with buyer portals, developer showcases, and CRM integrations range from 8–12 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know where things stand and when to expect each deliverable.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/real-estate-web-design.css')
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
      <span aria-current="page">Web Design for Real Estate</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Real Estate Web Design</span>
    <h1>Property websites that<br>list, rank, and<br><em>generate leads</em></h1>
    <p class="hero-sub">We build high-performance property websites for real estate agencies, estate agents, property developers, and letting firms — with searchable listings, lead capture, virtual tours, and SEO that puts your properties in front of buyers and tenants actively searching on Google.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Property Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="m3 11 9-8 9 8"/><path d="M5 10v10h14V10"/><path d="M9 20v-6h6v6"/></svg></span> Built for property — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranked on Google from day one</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 4–6 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria & UK specialists</span>
    </div>
  </div>

  <!-- Property website mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="m3 11 9-8 9 8"/><path d="M5 10v10h14V10"/><path d="M9 20v-6h6v6"/></svg></div>
        <div>
          <div class="float-notif-text">New buyer enquiry</div>
          <div class="float-notif-sub">3-bed duplex · Lekki Phase 1 · 1 min ago</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">abiproperties.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <div class="mock-site-nav">
            <div class="msn-logo">Abi <span>Properties</span></div>
            <div class="msn-links">
              <span class="msn-link">Buy</span>
              <span class="msn-link">Rent</span>
              <span class="msn-link">Sell</span>
              <span class="msn-link">New Dev</span>
              <span class="msn-cta">List Property</span>
            </div>
          </div>
          <div class="mock-site-hero">
            <div class="msh-tag">Lagos · Abuja · Port Harcourt</div>
            <div class="msh-title">Find your perfect<br>home in Nigeria</div>
            <div class="msh-search">
              <span class="msh-search-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
              <span class="msh-search-text">Search by location, property type...</span>
            <span class="msh-search-btn">Search</span>
            </div>
            <div class="msh-filters">
              <span class="msh-filter active">For Sale</span>
              <span class="msh-filter">To Let</span>
              <span class="msh-filter active">Lagos</span>
              <span class="msh-filter">Abuja</span>
              <span class="msh-filter">3+ Beds</span>
            </div>
          </div>
          <div class="mock-site-listings">
            <div class="msl-head">
              <div class="msl-title">Featured Listings</div>
              <div class="msl-count">248 properties available</div>
            </div>
            <div class="msl-grid">
              <div class="msl-card">
                <div class="msl-img" style="background:linear-gradient(135deg,#1a3a18,#0e2010)"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="m3 11 9-8 9 8"/><path d="M5 10v10h14V10"/><path d="M9 20v-6h6v6"/></svg></span></div>
                <div class="msl-body">
                  <div class="msl-price">₦85M</div>
                  <div class="msl-name">4-Bed Duplex, Lekki</div>
                  <div class="msl-loc"><span class="msh-search-ico"><svg viewBox="0 0 24 24"><path d="M12 21s-6-5.3-6-11a6 6 0 1 1 12 0c0 5.7-6 11-6 11Z"/><circle cx="12" cy="10" r="2.5"/></svg></span> Lekki Phase 1</div>
                  <div class="msl-meta">
                    <span class="msl-met"><span class="msh-search-ico"><svg viewBox="0 0 24 24"><path d="M3 7h18v10H3z"/><path d="M7 7v10"/><path d="M17 7v10"/></svg></span> 4</span>
                    <span class="msl-met"><span class="msh-search-ico"><svg viewBox="0 0 24 24"><path d="M7 21v-7a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v7"/><path d="M7 7V5a5 5 0 0 1 10 0v2"/><path d="M5 7h14"/></svg></span> 3</span>
                    <span class="msl-met"><span class="msh-search-ico"><svg viewBox="0 0 24 24"><path d="M5 16h14"/><path d="M7 16V9h10v7"/><circle cx="8.5" cy="17.5" r="1.5"/><circle cx="15.5" cy="17.5" r="1.5"/></svg></span> 2</span>
                  </div>
                </div>
              </div>
              <div class="msl-card">
                <div class="msl-img" style="background:linear-gradient(135deg,#1a2a3a,#0e1a28)"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 21h18"/><path d="M6 21V7l6-3 6 3v14"/><path d="M9 10h1"/><path d="M14 10h1"/><path d="M9 14h1"/><path d="M14 14h1"/></svg></span></div>
                <div class="msl-body">
                  <div class="msl-price">₦2.8M<span style="font-size:.45rem;color:var(--g400)">/yr</span></div>
                  <div class="msl-name">3-Bed Flat, VI</div>
                  <div class="msl-loc"><span class="msh-search-ico"><svg viewBox="0 0 24 24"><path d="M12 21s-6-5.3-6-11a6 6 0 1 1 12 0c0 5.7-6 11-6 11Z"/><circle cx="12" cy="10" r="2.5"/></svg></span> Victoria Island</div>
                  <div class="msl-meta">
                    <span class="msl-met"><span class="msh-search-ico"><svg viewBox="0 0 24 24"><path d="M3 7h18v10H3z"/><path d="M7 7v10"/><path d="M17 7v10"/></svg></span> 3</span>
                    <span class="msl-met"><span class="msh-search-ico"><svg viewBox="0 0 24 24"><path d="M7 21v-7a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v7"/><path d="M7 7V5a5 5 0 0 1 10 0v2"/><path d="M5 7h14"/></svg></span> 2</span>
                    <span class="msl-met"><span class="msh-search-ico"><svg viewBox="0 0 24 24"><path d="M5 16h14"/><path d="M7 16V9h10v7"/><circle cx="8.5" cy="17.5" r="1.5"/><circle cx="15.5" cy="17.5" r="1.5"/></svg></span> 1</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mock-site-stats">
            <div class="mst-item"><div class="mst-num">248</div><div class="mst-lbl">Listings</div></div>
            <div class="mst-item"><div class="mst-num">12K+</div><div class="mst-lbl">Buyers</div></div>
            <div class="mst-item"><div class="mst-num">REAN</div><div class="mst-lbl">Certified</div></div>
            <div class="mst-item"><div class="mst-num">4.9<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rating</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M4 19h16"/><path d="m6 15 4-4 3 3 5-6"/></svg></span> #1 · "estate agent Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Real Estate Agencies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Property Developers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Estate Agents & Letting Agents</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Property Management Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Land & Plots Vendors</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Short-let Platforms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Commercial Property Brokers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Off-Plan Developers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Diaspora Investment Portals</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Valuation & Survey Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Real Estate Agencies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Property Developers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Estate Agents & Letting Agents</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Property Management Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Land & Plots Vendors</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Short-let Platforms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Commercial Property Brokers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Off-Plan Developers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Diaspora Investment Portals</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Valuation & Survey Firms</span>
  </div>
</div>

<!-- ═══ PROBLEMS ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most property websites<br><em>fail their agencies</em></h2>
    </div>
    <p>A buyer searching for property in Lagos opens five real estate websites in different tabs. Within seconds, they close three of them — too slow, too cluttered, or impossible to search on a phone. The two they stay on are the ones that get the enquiry. Here is exactly what is costing Nigerian property businesses leads every single day.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">No searchable listings — buyers cannot find what they need</h3>
      <p class="prob-desc">A static list of properties in a PDF or a gallery without filters is not a property portal — it is a brochure. Buyers want to search by location, price, bedrooms, and type. Every second they cannot do this, they leave and go to a competitor who lets them.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Dynamic property search with real-time filtering by location, price range, property type, bedrooms, bathrooms, and status — with results that update instantly.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
      <h3 class="prob-title">Desktop-only design in a mobile-first market</h3>
      <p class="prob-desc">Property buyers in Nigeria predominantly browse on Android phones. If your property website is not perfectly usable on a small screen — photos that load fast, search that works by touch, enquiry forms that are easy to fill — you are invisible to the majority of your audience.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Mobile-first design and development, tested on real Android and iOS devices, with swipeable photo galleries, tap-friendly filters, and one-tap contact buttons.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="8.5" cy="10.5" r="1.5"/><path d="m21 15-4.5-4.5L8 19"/></svg></span>
      <h3 class="prob-title">Poor property photography presentation</h3>
      <p class="prob-desc">Dark, small, slow-loading photos kill property listings. Buyers make emotional decisions based on visual quality. If your listing photos do not load fast, do not fill the screen, and cannot be swiped through intuitively — the buyer's interest evaporates before you get a chance to pitch.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Full-screen swipeable photo galleries, WebP image optimisation, lazy loading, and optional virtual tour and video walkthrough integration on every listing page.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Not appearing on Google when buyers search</h3>
      <p class="prob-desc">"2 bedroom flat for sale Lekki", "houses for sale Abuja under 50 million", "property for rent Victoria Island" — these are searches your potential clients are making right now. If your site does not rank for them, you are spending money on listings that Google cannot see.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every listing page is SEO-optimised with structured data, location-specific content, and keyword-targeted descriptions that help Google understand and surface your properties.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <h3 class="prob-title">No lead capture — visitors leave and never return</h3>
      <p class="prob-desc">A buyer visits your website, looks at three listings, and leaves without enquiring. No email capture, no property alert signup, no "book a viewing" button — just a phone number buried in the footer. That warm prospect is gone, and you never know they were there.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Property alert signups, viewing request forms on every listing, instant WhatsApp integration, and a saved search system that brings buyers back automatically when new matching properties are added.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 0 1 0 2.8l-.1.1a2 2 0 0 1-2.8 0l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 0 1-2 2h-.2a2 2 0 0 1-2-2v-.2a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 0 1-2.8 0l-.1-.1a2 2 0 0 1 0-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H3a2 2 0 0 1-2-2v-.2a2 2 0 0 1 2-2h.2a1.7 1.7 0 0 0 1.5-1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 0 1 0-2.8l.1-.1a2 2 0 0 1 2.8 0l.1.1a1.7 1.7 0 0 0 1.8.3H9a1.7 1.7 0 0 0 1-1.5V3a2 2 0 0 1 2-2h.2a2 2 0 0 1 2 2v.2a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 0 1 2.8 0l.1.1a2 2 0 0 1 0 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8V9c0 .7.4 1.3 1 1.5h.2a1.7 1.7 0 0 0 1.5 1H21a2 2 0 0 1 2 2v.2a2 2 0 0 1-2 2h-.2a1.7 1.7 0 0 0-1.4 1Z"/></svg></span>
      <h3 class="prob-title">Impossible to manage — adding a listing takes an hour</h3>
      <p class="prob-desc">Some estate agencies are still updating their website by calling a developer every time a new property is listed or sold. In a market where listings move fast, a CMS that requires technical help to update is a competitive liability — listings are stale before the ink is dry.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A custom WordPress CMS that lets your team add a full property listing in under 5 minutes — photos, details, price, status, location, features — with no technical knowledge required.</div>
    </div>

  </div>
</section>

<!-- ═══ FEATURES ═══ -->
<section aria-labelledby="features-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="features-heading">Every feature your property<br>website <em>must have</em></h2>
    </div>
    <p>Real estate websites have specific functional requirements that generic business websites do not — and shortcuts here cost you clients. Every feature below is built to the standard buyers, sellers, and landlords expect when they visit a professional property agency online.</p>
  </div>
  <div class="features-grid">

    <div class="feat-card reveal">
      <div class="feat-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="feat-title">Advanced Property Search & Filters</h3>
      <p class="feat-desc">Dynamic, real-time property search with filters for type (apartment, duplex, detached, land, commercial), location (state, city, area), price range, bedrooms, bathrooms, parking, and status. Map-based search available for geographic browsing. Results update without page reloads.</p>
      <div class="feat-tags"><span class="feat-tag">Real-time Filtering</span><span class="feat-tag">Map Search</span><span class="feat-tag">Price Range</span><span class="feat-tag">Multi-filter</span></div>
    </div>

    <div class="feat-card reveal">
      <div class="feat-ico"><svg viewBox="0 0 24 24"><path d="m3 11 9-8 9 8"/><path d="M5 10v10h14V10"/><path d="M9 20v-6h6v6"/></svg></div>
      <h3 class="feat-title">Rich Property Listing Pages</h3>
      <p class="feat-desc">Full-screen photo galleries, detailed specification tables, floorplan uploads, neighbourhood information, Google Maps embed, and mortgage/rent calculator. Virtual tour integration for Matterport 3D and YouTube/Vimeo video walkthroughs. Structured data markup for Google property rich results.</p>
      <div class="feat-tags"><span class="feat-tag">Photo Gallery</span><span class="feat-tag">Virtual Tour</span><span class="feat-tag">Floorplans</span><span class="feat-tag">Calculators</span></div>
    </div>

    <div class="feat-card reveal">
      <div class="feat-ico"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg></div>
      <h3 class="feat-title">Lead Capture & Property Alerts</h3>
      <p class="feat-desc">Viewing request forms on every listing, general enquiry capture, WhatsApp chat widget integration, and a property alert system — buyers register their criteria and receive automatic email notifications when matching new listings are added. Build a warm prospect database passively.</p>
      <div class="feat-tags"><span class="feat-tag">Viewing Requests</span><span class="feat-tag">WhatsApp Widget</span><span class="feat-tag">Email Alerts</span><span class="feat-tag">CRM Push</span></div>
    </div>

    <div class="feat-card reveal">
      <div class="feat-ico"><svg viewBox="0 0 24 24"><path d="M4 7h4l2-2h4l2 2h4v12H4z"/><circle cx="12" cy="13" r="4"/></svg></div>
      <h3 class="feat-title">Fast-Loading, Optimised Media</h3>
      <p class="feat-desc">Every property photo is automatically compressed and converted to WebP format on upload, reducing file sizes by 40–70% without visible quality loss. Lazy loading ensures users only download the images they actually view. Fast media loading is a direct ranking factor on Google.</p>
      <div class="feat-tags"><span class="feat-tag">WebP Auto-convert</span><span class="feat-tag">Lazy Loading</span><span class="feat-tag">CDN Delivery</span><span class="feat-tag">Responsive Images</span></div>
    </div>

    <div class="feat-card reveal">
      <div class="feat-ico"><svg viewBox="0 0 24 24"><path d="M20 21a8 8 0 0 0-16 0"/><circle cx="12" cy="7" r="4"/></svg></div>
      <h3 class="feat-title">Agent & Team Profiles</h3>
      <p class="feat-desc">Professional profile pages for every agent — photo, specialisms, areas covered, current listings, testimonials, and direct contact details. Buyers build trust with people, not logos. Individual agent pages also create additional SEO opportunities for name and speciality searches.</p>
      <div class="feat-tags"><span class="feat-tag">Agent Bios</span><span class="feat-tag">Linked Listings</span><span class="feat-tag">Direct Contact</span><span class="feat-tag">Person Schema</span></div>
    </div>

    <div class="feat-card reveal">
      <div class="feat-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M8 20h8"/><path d="M12 16v4"/></svg></div>
      <h3 class="feat-title">Self-Managed Listings CMS</h3>
      <p class="feat-desc">A custom WordPress CMS that lets any member of your team add, update, or archive a listing in under 5 minutes — without developer involvement. Bulk CSV import for large portfolios. Automatic "Sold" and "Let" labels. Status change workflows that update listings and notify registered alert subscribers automatically.</p>
      <div class="feat-tags"><span class="feat-tag">WordPress CMS</span><span class="feat-tag">Bulk Import</span><span class="feat-tag">Auto Status Labels</span><span class="feat-tag">5-Minute Updates</span></div>
    </div>

  </div>
</section>

<!-- ═══ LISTING DEMO ═══ -->
<section class="listing-section" aria-labelledby="listing-heading">
  <div class="listing-header">
    <div class="listing-copy reveal">
      <span class="s-label" style="color:var(--gold)">Property Listing System</span>
      <h2 class="s-head" style="color:var(--white)" id="listing-heading">A property search experience<br>buyers <em>actually use</em></h2>
      <p>The difference between a property website that generates enquiries and one that does not often comes down to a single question: can a visitor find what they are looking for in under 30 seconds? If the answer is no, they leave. We build search experiences that answer that question with a definitive yes — on every device, at every connection speed.</p>
      <p>Every listing is stored in a structured WordPress custom post type with ACF field groups for every property attribute. Searches are handled by a fast, indexed query layer — not a slow full-table scan — so search results load in under 500ms even with hundreds of active listings.</p>
      <ul class="bullets">
        <li>Property search updates in real time as filters are applied — no page reload</li>
        <li>Map view shows all matching properties as pins on an interactive Google Map</li>
        <li>Saved search lets registered users bookmark their criteria for return visits</li>
        <li>Sort by price (low/high), newest first, featured, or closest to a location</li>
        <li>Similar properties section at the bottom of every listing page reduces bounce rate</li>
        <li>Compare tool lets buyers compare up to 4 properties side by side</li>
        <li>Mortgage and rent affordability calculators embedded on every listing</li>
      </ul>
      <a href="#contact" class="listing-cta">See a Live Demo →</a>
    </div>

    <!-- Property card demos -->
    <div class="reveal">
      <div class="search-demo">
        <div class="sd-title">Property Search</div>
        <div class="sd-row">
          <select class="sd-select"><option>For Sale</option></select>
          <select class="sd-select"><option>Lagos</option></select>
          <select class="sd-select"><option>3+ Beds</option></select>
          <button class="sd-btn"><span class="msh-search-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Search</button>
        </div>
        <div class="sd-filters">
          <span class="sd-chip on">Duplex</span>
          <span class="sd-chip on">Detached</span>
          <span class="sd-chip">Apartment</span>
          <span class="sd-chip">Land</span>
          <span class="sd-chip">Commercial</span>
          <span class="sd-chip on">₦50M–₦150M</span>
        </div>
      </div>
      <div class="prop-demo">
        <div class="prop-card">
          <div class="prop-card-img apt">
            <span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="m3 11 9-8 9 8"/><path d="M5 10v10h14V10"/><path d="M9 20v-6h6v6"/></svg></span>
            <span class="prop-img-badge">For Sale</span>
            <span class="prop-img-count">14 photos</span>
          </div>
          <div class="prop-card-body">
            <div><span class="prop-price">₦85,000,000</span><span class="prop-price-sub"></span></div>
            <div class="prop-title">4-Bedroom Luxury Duplex with BQ</div>
            <div class="prop-loc"><span class="msh-search-ico"><svg viewBox="0 0 24 24"><path d="M12 21s-6-5.3-6-11a6 6 0 1 1 12 0c0 5.7-6 11-6 11Z"/><circle cx="12" cy="10" r="2.5"/></svg></span>Lekki Phase 1, Lagos</div>
            <div class="prop-meta">
              <div class="prop-met"><span class="prop-met-ico"><svg viewBox="0 0 24 24"><path d="M3 7h18v10H3z"/><path d="M7 7v10"/><path d="M17 7v10"/></svg></span>4 Beds</div>
              <div class="prop-met"><span class="prop-met-ico"><svg viewBox="0 0 24 24"><path d="M7 21v-7a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v7"/><path d="M7 7V5a5 5 0 0 1 10 0v2"/><path d="M5 7h14"/></svg></span>3 Baths</div>
              <div class="prop-met"><span class="prop-met-ico"><svg viewBox="0 0 24 24"><path d="M5 16h14"/><path d="M7 16V9h10v7"/><circle cx="8.5" cy="17.5" r="1.5"/><circle cx="15.5" cy="17.5" r="1.5"/></svg></span>2 Parking</div>
              <div class="prop-met"><span class="prop-met-ico"><svg viewBox="0 0 24 24"><path d="M4 8V4h4"/><path d="M20 8V4h-4"/><path d="M4 16v4h4"/><path d="M20 16v4h-4"/></svg></span>320sqm</div>
            </div>
            <div class="prop-actions">
              <button class="prop-btn primary">Book Viewing</button>
              <button class="prop-btn secondary">Save</button>
              <button class="prop-btn secondary">Share</button>
            </div>
          </div>
        </div>
        <div class="prop-card">
          <div class="prop-card-img house">
            <span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 21h18"/><path d="M6 21V7l6-3 6 3v14"/><path d="M9 10h1"/><path d="M14 10h1"/><path d="M9 14h1"/><path d="M14 14h1"/></svg></span>
            <span class="prop-img-badge rent">To Let</span>
            <span class="prop-img-count">8 photos · Tour</span>
          </div>
          <div class="prop-card-body">
            <div><span class="prop-price">₦3,200,000</span><span class="prop-price-sub">/year</span></div>
            <div class="prop-title">3-Bedroom Serviced Apartment</div>
            <div class="prop-loc"><span class="msh-search-ico"><svg viewBox="0 0 24 24"><path d="M12 21s-6-5.3-6-11a6 6 0 1 1 12 0c0 5.7-6 11-6 11Z"/><circle cx="12" cy="10" r="2.5"/></svg></span>Victoria Island, Lagos</div>
            <div class="prop-meta">
              <div class="prop-met"><span class="prop-met-ico"><svg viewBox="0 0 24 24"><path d="M3 7h18v10H3z"/><path d="M7 7v10"/><path d="M17 7v10"/></svg></span>3 Beds</div>
              <div class="prop-met"><span class="prop-met-ico"><svg viewBox="0 0 24 24"><path d="M7 21v-7a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v7"/><path d="M7 7V5a5 5 0 0 1 10 0v2"/><path d="M5 7h14"/></svg></span>2 Baths</div>
              <div class="prop-met"><span class="prop-met-ico"><svg viewBox="0 0 24 24"><path d="M3 14c3-2 5 0 9 0s6-2 9 0"/><path d="M3 18c3-2 5 0 9 0s6-2 9 0"/><path d="M5 10a3 3 0 1 1 6 0"/></svg></span>Pool</div>
              <div class="prop-met"><span class="prop-met-ico"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>24hr Sec</div>
            </div>
            <div class="prop-actions">
              <button class="prop-btn primary">Enquire Now</button>
              <button class="prop-btn secondary">Virtual Tour</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">SEO for Property Websites</span>
      <h2 class="s-head" id="seo-heading">Rank when buyers search<br>for <em>properties in your area</em></h2>
    </div>
    <p>The highest-intent traffic in real estate comes from Google. Someone searching "3 bedroom house for sale Lekki" is not browsing — they are ready to buy. Every real estate website we build is engineered from the ground up to capture this traffic at both the individual listing level and the location + property type category level.</p>
  </div>
  <div class="seo-layout">
    <div class="seo-copy reveal">
      <p>Real estate SEO has layers that other industries do not. Individual listing pages need structured data (RealEstateListing schema) that tells Google the price, bedrooms, location, and availability — enabling rich search results. Location pages need to rank for "property for sale [area]" keyword combinations. The agency's brand and agent profiles need to rank for name and reputation searches.</p>
      <p>We build all of these layers simultaneously, giving your website a compound SEO advantage that grows month after month as your listing catalogue expands and your content authority builds.</p>
      <ul class="bullets" style="color:var(--g700)">
        <li>RealEstateListing JSON-LD schema on every individual property page</li>
        <li>Location-specific landing pages targeting "property for sale [city/area]" keywords</li>
        <li>Property type pages targeting "apartments to let Lagos", "land for sale Abuja" etc.</li>
        <li>Google Business Profile optimisation for local map pack visibility</li>
        <li>Fast page load times — every 1-second improvement improves conversion rate significantly</li>
        <li>Internal linking architecture connecting listings to location and type category pages</li>
        <li>Market insight blog to build topical authority on Nigerian real estate topics</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Real Estate Agency — Keyword Rankings</div>
        <div style="padding:1rem">
          <div class="kw-row">
            <span class="kw-term">estate agent lagos</span>
            <span class="kw-vol">3,600/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">houses for sale lekki</span>
            <span class="kw-vol">2,900/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">property for rent vi lagos</span>
            <span class="kw-vol">1,800/mo</span>
            <span class="kw-pos top3">▲ #3</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">buy land ibeju lekki</span>
            <span class="kw-vol">1,400/mo</span>
            <span class="kw-pos top10">▲ #5</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">apartment for sale abuja</span>
            <span class="kw-vol">1,200/mo</span>
            <span class="kw-pos top10">▲ #4</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">commercial property lagos</span>
            <span class="kw-vol">960/mo</span>
            <span class="kw-pos top10">▲ #6</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">real estate developer nigeria</span>
            <span class="kw-vol">820/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">shortlet apartment lagos</span>
            <span class="kw-vol">680/mo</span>
            <span class="kw-pos top3">▲ #3</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.72rem;color:var(--g400);font-style:italic;text-align:center">Representative keyword rankings — Nigerian real estate agency SEO campaign</div>
    </div>
  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section class="process-section" aria-labelledby="process-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Process</span>
      <h2 class="s-head" id="process-heading">From brief to live property<br>portal in <em>six steps</em></h2>
    </div>
    <p>Real estate websites require more planning than most — the listing system, search architecture, and SEO structure all need to be designed before a pixel is placed. Our process handles all of it, transparently, with milestones you approve at every stage.</p>
  </div>
  <div class="process-steps">
    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery & Listing Architecture</div>
      <p class="proc-desc">We map your full site architecture — pages, property types, location taxonomy, agent structure, and keyword strategy. We agree on your listing data model (all property attributes your team needs to enter per listing), search filter set, and lead capture flows. Every decision documented and approved before design begins.</p>
      <div class="proc-tags"><span class="proc-tag">Site Architecture</span><span class="proc-tag">Property Schema</span><span class="proc-tag">Keyword Map</span><span class="proc-tag">Signed Brief</span></div>
    </div>
    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">UI/UX Design</div>
      <p class="proc-desc">High-fidelity Figma designs for all key pages — Homepage with hero search, listings archive, individual listing page, location category pages, agent profiles, about, and contact. Special attention to the mobile property browsing experience, photo gallery, and enquiry flow. Two revision rounds included.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile-first</span><span class="proc-tag">Gallery Design</span><span class="proc-tag">Design Sign-off</span></div>
    </div>
    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–5</div>
      <div class="proc-title">WordPress Build & Listing System</div>
      <p class="proc-desc">Custom WordPress theme built on PHP with ACF Pro for the property listing system. Custom post types for Properties, Agents, and Developments. Ajax-powered search and filter engine. Photo gallery with WebP compression pipeline. WhatsApp enquiry integration, viewing request forms, and property alert email system all configured and tested.</p>
      <div class="proc-tags"><span class="proc-tag">Custom Theme</span><span class="proc-tag">ACF Listing System</span><span class="proc-tag">Ajax Search</span><span class="proc-tag">Lead Capture</span></div>
    </div>
    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 5</div>
      <div class="proc-title">Listings Migration & SEO Setup</div>
      <p class="proc-desc">Your existing property listings are migrated and entered into the new system — or your team is trained to enter them. Full SEO setup across all pages: RealEstateListing schema on every property, location page optimisation, Google Business Profile update, XML sitemap submission, and Google Analytics 4 and Search Console configuration.</p>
      <div class="proc-tags"><span class="proc-tag">Listings Migration</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">GBP Optimisation</span><span class="proc-tag">GA4 Setup</span></div>
    </div>
    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 6</div>
      <div class="proc-title">QA, Performance & Launch</div>
      <p class="proc-desc">Cross-device QA on iPhone, Samsung, and desktop. PageSpeed audit targeting 90+ on mobile. Form submission testing across all enquiry pathways. Property alert email delivery verification. Launch day: DNS cutover, SSL verification, Cloudflare CDN configuration, and post-launch smoke test before the site goes live to the public.</p>
      <div class="proc-tags"><span class="proc-tag">Device QA</span><span class="proc-tag">PageSpeed 90+</span><span class="proc-tag">Form Testing</span><span class="proc-tag">Launch Day</span></div>
    </div>
    <div class="proc-card reveal">
      <div class="proc-num">Step 06 — Ongoing (Optional)</div>
      <div class="proc-title">CMS Training & SEO Retainer</div>
      <p class="proc-desc">A 60-minute CMS training session for your team covering property listing management, status updates, photo uploads, and agent profile management. Written admin guide provided. Optional monthly SEO retainer for ongoing keyword ranking improvement — market insights blog articles, local citation building, and monthly ranking reports.</p>
      <div class="proc-tags"><span class="proc-tag">CMS Training</span><span class="proc-tag">Admin Guide</span><span class="proc-tag">Monthly SEO</span><span class="proc-tag">30-Day Support</span></div>
    </div>
  </div>
</section>

<!-- ═══ TRUST STATS ═══ -->
<section class="trust-section" aria-labelledby="trust-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why i2Medier</span>
      <h2 class="s-head" id="trust-heading">Numbers that speak<br>for <em>themselves</em></h2>
    </div>
    <p>We have delivered professional service and industry-specific websites for clients across Nigeria and the UK. These are the outcomes real estate clients consistently experience.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4 19h16"/><path d="m6 15 4-4 3 3 5-6"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="5">0</span><span>×</span></div>
      <div class="trust-label">Increase in monthly property enquiries within 6 months of launching a new real estate website with our SEO foundation</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="94">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) achieved on our real estate websites — fast enough to rank and retain every mobile visitor</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4"/><path d="M8 3v4"/><path d="M3 11h18"/></svg></span>
      <div class="trust-num">4–6</div>
      <div class="trust-label">Weeks from design approval to a fully live property portal with listings, search, lead capture, and SEO — milestone-based delivery</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></span>
      <div class="trust-num">#<span class="counter" data-target="1">0</span></div>
      <div class="trust-label">Google ranking achieved for "estate agent [city]" target keywords within 90 days for multiple Nigerian property clients</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Professional websites built and launched across Nigeria, the UK, and internationally — all custom code, zero page builders</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="m12 3 9 4.5-9 4.5-9-4.5z"/><path d="M3 7.5V16l9 5 9-5V7.5"/><path d="M12 12v9"/></svg></span>
      <div class="trust-num">100<span>%</span></div>
      <div class="trust-label">Client ownership of all code, designs, listings data, and credentials on delivery — unconditionally and without ongoing licence fees</div>
    </div>
  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Property websites we've<br><em>built and launched</em></h2>
    </div>
    <p>Each built from scratch — no templates, no page builders — designed specifically for the agency's property types, locations, and target buyers.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0e2a14 0%,#1a4a22 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Abi Properties</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.75rem">Real Estate Agency · Lagos</div>
            <div style="display:flex;gap:.4rem;justify-content:center">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">248 Listings</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">For Sale + Let</span>
            </div>
          </div>
        </div>
        <div class="port-overlay"><span class="port-badge">Real Estate Agency</span></div>
      </div>
      <div class="port-body">
        <div class="port-type">Real Estate Agency · Lagos, Nigeria</div>
        <div class="port-title">Abi Properties — Property Portal</div>
        <p class="port-desc">Full property portal with 248 active listings, Ajax search, map view, property alerts, and an SEO campaign that reached #1 for "estate agent Lagos" within 90 days.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a0a2e 0%,#2d1a52 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Pinnacle Estates</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.75rem">Property Developer · Abuja</div>
            <div style="display:flex;gap:.4rem;justify-content:center">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Off-Plan</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">3D Tours</span>
            </div>
          </div>
        </div>
        <div class="port-overlay"><span class="port-badge">Property Developer</span></div>
      </div>
      <div class="port-body">
        <div class="port-type">Property Developer · Abuja, Nigeria</div>
        <div class="port-title">Pinnacle Estates — Development Showcase</div>
        <p class="port-desc">Property developer website showcasing 4 active developments with Matterport virtual tours, off-plan payment plan calculators, and a diaspora buyer enquiry system for UK and US investors.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a1a2a 0%,#0e2a3a 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">NestUK Lettings</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.75rem">Letting Agency · London</div>
            <div style="display:flex;gap:.4rem;justify-content:center">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Lettings</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Management</span>
            </div>
          </div>
        </div>
        <div class="port-overlay"><span class="port-badge">Letting Agency · UK</span></div>
      </div>
      <div class="port-body">
        <div class="port-type">Letting Agency · London, United Kingdom</div>
        <div class="port-title">NestUK Lettings & Property Management</div>
        <p class="port-desc">UK letting agency website with tenant application portal, landlord onboarding flows, available properties search, and property management service pages — ranking for London borough-specific rental searches.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
@include('site.partials.industry-package')


<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What real estate clients say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"We launched the new website and within the first month we were getting between eight and twelve new property enquiries per week — people who found us on Google for the first time. We had never ranked on Google before. Now we are top three for almost every area we cover in Lagos."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Abimbola Okafor</div><div class="test-role">MD · Abi Properties, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"The property alert system alone has been worth the investment. We now have over 1,800 registered buyers who get email notifications when we add a new matching listing. Our properties sell faster because the right buyers already know about them before we even market them elsewhere."</p>
      <div class="test-author">
        <div class="test-avatar">T</div>
        <div><div class="test-name">Tunde Bakare</div><div class="test-role">Founder · Pinnacle Estates, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Diaspora clients are our most important segment and they were not finding us online at all. i2Medier built us a website with content specifically targeting UK and US-based Nigerian buyers searching for investment property back home. Those enquiries are now our highest-value deals."</p>
      <div class="test-author">
        <div class="test-avatar">F</div>
        <div><div class="test-name">Folake Adeyemo</div><div class="test-role">Director · NestUK Lettings, London</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ COMPARISON ═══ -->
<section class="compare-section" aria-labelledby="compare-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why Not DIY</span>
      <h2 class="s-head" id="compare-heading">i2Medier vs your<br><em>other options</em></h2>
    </div>
    <p>Real estate websites have specific requirements that generic website builders and non-specialist developers routinely get wrong.</p>
  </div>
  <div class="compare-wrap"><table class="compare-table reveal">
    <thead>
      <tr>
        <th>Feature</th>
        <th>Wix / Squarespace</th>
        <th class="hl">i2Medier Custom Build</th>
        <th>Generic Developer</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="feature">Property listing system built-in</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Plugin workaround only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Custom-built for properties</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Plugin-dependent</span></td>
      </tr>
      <tr>
        <td class="feature">Real-time Ajax property search</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Standard on all builds</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Extra cost / rarely done</span></td>
      </tr>
      <tr>
        <td class="feature">RealEstateListing schema markup</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> On every listing page</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically implemented</span></td>
      </tr>
      <tr>
        <td class="feature">Property alert email system</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included in Growth tier</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Significant extra cost</span></td>
      </tr>
      <tr>
        <td class="feature">Mobile PageSpeed 90+</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Typically 35–55</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Guaranteed target</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely achieved</span></td>
      </tr>
      <tr>
        <td class="feature">Location-specific SEO pages</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Manual and limited</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Built into architecture</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely planned for</span></td>
      </tr>
      <tr>
        <td class="feature">Full code & data ownership</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Platform-locked forever</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Unconditional transfer</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often withheld</span></td>
      </tr>
    </tbody>
  </table></div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free property website review<br>for your agency</h2>
    <p>We'll audit your current website, identify what is costing you leads, and show you exactly what we'd build differently. No obligation required.</p>
  </div>
  <div>
    <a href="#contact" class="btn-white-solid">Book a Free Review →</a>
  </div>
</div>

<!-- ═══ LONG-FORM CONTENT ═══ -->
<section class="content-section" aria-labelledby="content-heading">
  <div class="two-col-intro" style="margin-bottom:2rem">
    <div>
      <span class="s-label">The Complete Guide</span>
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>real estate web design</em></h2>
    </div>
    <p>A comprehensive guide to building a property website that ranks on Google, converts visitors into buyers, and supports the operational needs of a modern real estate agency — written specifically for Nigerian and UK property businesses.</p>
  </div>
  <div class="content-layout">

    <article class="content-body">

      <h2>Why a professional property website is your most important sales tool</h2>
      <p>In Nigerian real estate, the buying and renting process now begins online in the majority of cases. A prospective buyer searching for a property in Lekki will visit multiple agency websites before making a single phone call. They are not just looking at listings — they are forming a judgement about the agency's credibility, professionalism, and reliability based entirely on the digital experience.</p>
      <p>A slow, cluttered website with difficult-to-search listings and poor mobile experience communicates one thing to that buyer: this agency is not serious. They click back and visit your competitor. A fast, well-designed property portal with clear search functionality, professional photography, and easy enquiry forms communicates the opposite — and wins the enquiry.</p>
      <p>The Nigerian property market is also increasingly attracting diaspora investment from the UK, USA, and Canada. These buyers — often high-net-worth individuals purchasing investment properties remotely — expect a website experience that matches the international standards they are accustomed to. Virtual tours, detailed property information, and a slick mobile experience are not optional for this audience.</p>

      <h2>The technical requirements of a real estate website</h2>
      <p>Real estate websites have technical requirements that most general web developers are not familiar with. Understanding these helps ensure you get what you actually need, not just what looks impressive in a mockup.</p>

      <h3>Dynamic listing management</h3>
      <p>Properties go live and go off the market constantly. Your website needs a CMS that allows your team to add, update, and archive listings quickly — ideally in under 5 minutes per property. This requires a <strong>custom WordPress post type with tailored field groups</strong> (using ACF Pro), not a generic page editor. When a property sells, it should be markable as "Sold" instantly, with the listing archived for historical purposes rather than deleted (it helps SEO to maintain the URL).</p>

      <h3>Fast, indexed property search</h3>
      <p>The search and filtering system on a property website must be built on an indexed, efficient database query layer — not a live WordPress query scanning all posts on every filter change. We build Ajax-powered search that returns results in under 500ms even with hundreds of active listings. This matters for both user experience and Google's Core Web Vitals scoring, which directly affects your search rankings.</p>

      <h3>Image optimisation for property photography</h3>
      <p>Property listings are photo-heavy by nature. Without proper image optimisation — <strong>WebP conversion, responsive srcsets, and lazy loading</strong> — a listing page with 15 photos can take 8–10 seconds to load on a mobile connection. This kills both the user experience and your SEO. Our property listing system automatically compresses and converts every uploaded photo to WebP on upload, reducing typical file sizes by 50–70% with no visible quality loss.</p>

      <h2>SEO for real estate — how to rank for property searches in Nigeria</h2>
      <p>Real estate SEO in Nigeria has distinct characteristics compared to other industries. Search volume is high and intent is very specific — people searching for "3 bedroom house for sale Lekki" are ready buyers, not researchers. Capturing this traffic requires a multi-layered SEO strategy built into the website architecture from day one.</p>
      <p><strong>Individual listing pages</strong> need RealEstateListing schema markup so Google understands the price, location, number of bedrooms, and status of each property. This enables rich search result snippets that dramatically increase click-through rates.</p>
      <p><strong>Location category pages</strong> — "Properties for Sale in Lekki", "Houses to Let in Victoria Island" — need to be treated as primary SEO landing pages, not just filter results. Each should have unique, informative content about the neighbourhood alongside the property listings.</p>
      <p><strong>A market insights blog</strong> publishing regular articles about the Nigerian property market, neighbourhood guides, and investment advice builds topical authority over time — making Google recognise your site as a subject matter expert, which boosts rankings for all pages on the domain.</p>

      <h2>Diaspora real estate — capturing UK and US Nigerian property investors</h2>
      <p>One of the most underserved audiences in Nigerian real estate digital marketing is the diaspora buyer. There are millions of Nigerians living in the UK and USA who want to invest in property back home — and they are actively searching Google for information and agencies they can trust.</p>
      <p>A website optimised for this audience includes: clear information about the purchase process for overseas buyers, virtual tours that allow remote property viewing, payment plan calculators, details of legal processes and title verification, and testimonials from previous diaspora clients. The trust bar for a remote buyer is higher — your website needs to do more work to earn it.</p>
      <p>We build diaspora-specific landing pages targeting searches like "buy property in Nigeria from UK" and "Nigerian real estate investment from abroad" — bringing this high-value audience directly to your agency rather than to generic property portals where you compete with hundreds of other listings.</p>

      <h2>How much does a real estate website cost in Nigeria?</h2>
      <p>The cost of a property website depends primarily on the scale of the listing system, the complexity of the search functionality, and the number of additional features required. As a general guide:</p>
      <ul>
        <li><strong>Starter portal</strong> (up to 25 listings, basic search, lead forms): ₦450,000–₦650,000</li>
        <li><strong>Growth portal</strong> (unlimited listings, advanced search, map view, property alerts): ₦900,000–₦1.5M</li>
        <li><strong>Enterprise platform</strong> (developer showcase, buyer portal, diaspora flows, CRM integration): ₦2M+</li>
      </ul>
      <p>Monthly cloud hosting for a well-architected property website typically costs ₦15,000–₦40,000 depending on traffic volume — significantly less than the advertising budget most agencies spend monthly for far less qualified traffic than organic search provides.</p>

    </article>

    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free property website review and proposal for your agency.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Review →</a>
      </div>
      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why property websites fail</a></li>
          <li><a href="#features-heading" class="toc-link">Features every site needs</a></li>
          <li><a href="#listing-heading" class="toc-link">Listing & search system</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for property</a></li>
          <li><a href="#process-heading" class="toc-link">Our 6-step process</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about property<br><em>website design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every real estate agency has different requirements. Email us and we'll give you a direct, honest answer specific to your business — no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">How much does a real estate website cost in Nigeria?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Real estate websites start from ₦450,000 for a professional agency site with up to 25 listings, search filters, and lead capture. Growth portals with unlimited listings, map search, virtual tours, and property alert email systems start from ₦900,000. Enterprise platforms for large developers and multi-office firms are quoted individually. We provide a detailed, itemised quote after a free 30-minute consultation — no hidden charges.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can visitors search and filter properties on my website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Yes — dynamic property search is core to every real estate website we build. Visitors can filter by property type, location, price range, number of bedrooms and bathrooms, and status (for sale, to let, sold, let agreed). Results update in real time without page reloads. We also build map-based search using Google Maps, allowing buyers to browse properties geographically by dropping a pin or drawing a search area.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">Will my real estate website rank on Google?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">Every property website we build includes a complete SEO foundation — RealEstateListing and LocalBusiness schema markup, individual optimised pages for each listing, location-specific category pages targeting "properties for sale [area]" and "houses to let [city]" keywords, and Google Search Console setup. For competitive markets like Lagos and Abuja, we also offer monthly SEO retainers covering ongoing content creation and link building to achieve and maintain page-one rankings.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Can I manage my own listings after launch?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Yes. Every real estate website we build gives your team complete control over listings from a simple WordPress admin panel. Adding a new property takes under 5 minutes — upload photos, enter the details, set the price and status. No developer access required at any point. We also support bulk CSV import for agencies migrating large listing catalogues from another system. A CMS training session and written admin guide are included on every project.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Do you integrate virtual tours and video walkthroughs?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes. We integrate Matterport 3D virtual tours, YouTube and Vimeo video walkthroughs, and 360° image galleries directly into individual property listing pages. Virtual tours are particularly valuable for diaspora buyers viewing properties remotely and for off-plan developments where the physical property is not yet built. Properties with virtual tours consistently generate significantly higher enquiry rates than photo-only listings.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Can the website send automatic alerts to buyers and tenants?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">Yes. Our property alert system allows visitors to register their search criteria — property type, location, price range, number of bedrooms — and receive automatic email notifications when matching new listings are added. When you publish a new listing that matches a registered buyer's criteria, the email goes out automatically within minutes. This builds a warm, permission-based buyer database that grows over time and reduces time-to-enquiry on new listings.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">How long does it take to build a real estate website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">A standard real estate website with listings, search, lead capture, and agent profiles typically takes 4–6 weeks from design approval to launch. Larger platforms with buyer portals, developer showcases, and CRM integrations range from 8–12 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know where things stand and when to expect each deliverable.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a property website<br>that generates leads?</h2>
  <p>Get a free, no-obligation website review and proposal tailored to your agency's properties, locations, and target buyers.</p>
  <a href="{{ $startUrl }}" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
