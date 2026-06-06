@extends('public.layouts.app')

@section('title', 'Web Design for Photographers | Photography Portfolio Website Nigeria | i2Medier')

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/photography-web-design.css')
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
      <span aria-current="page">Web Design for Photographers</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Photography Website Design</span>
    <h1>Portfolio websites that let your photography <em>do the selling</em></h1>
    <p class="hero-sub">We build portfolio-first photography websites that showcase your work in the most compelling way possible — winning you more bookings through a beautiful, fast-loading portfolio, and ranking on Google when clients in Lagos, Abuja, and across Nigeria search for a photographer in your specialism.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Photography Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Image-optimised fast loading</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></span> Booking &amp; enquiry integration</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria &amp; UK specialists</span>
    </div>
  </div>

  <!-- Photography website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg></div>
        <div>
          <div class="float-notif-text">New booking request · Wedding Photography</div>
          <div class="float-notif-sub">April 2027 · just now</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">emekaobi.photography</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Emeka Obi <span>Photography</span></div>
            <div class="msn-links">
              <span class="msn-link">Portfolio</span>
              <span class="msn-link">Services</span>
              <span class="msn-link">About</span>
              <span class="msn-link">Pricing</span>
              <span class="msn-link">Contact</span>
              <span class="msn-cta">Book Now</span>
            </div>
          </div>
          <!-- Full-bleed hero image -->
          <div class="mock-site-hero">
            <div class="msh-hero-img">
              <div class="msh-hero-overlay">
                <div class="msh-label">Lagos Portrait &amp; Wedding Photographer</div>
                <div class="msh-h1">Moments captured<br><span>with intention</span></div>
                <div class="msh-btns">
                  <span class="msh-btn-p">View Portfolio</span>
                  <span class="msh-btn-s">Book a Session →</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Category tabs -->
          <div class="mock-site-services">
            <div class="mss-label">Browse by Category</div>
            <div class="mss-tabs">
              <span class="mss-tab active">Weddings</span>
              <span class="mss-tab">Portraits</span>
              <span class="mss-tab">Commercial</span>
              <span class="mss-tab">Events</span>
            </div>
            <div class="mss-grid photo-grid">
              <div class="mss-card photo-thumb" style="background:linear-gradient(135deg,#292524 0%,#44403c 100%)"><div class="photo-thumb-label">Wedding · VI</div></div>
              <div class="mss-card photo-thumb" style="background:linear-gradient(135deg,#1c1917 0%,#292524 100%)"><div class="photo-thumb-label">Bride · Lekki</div></div>
              <div class="mss-card photo-thumb" style="background:linear-gradient(135deg,#44403c 0%,#57534e 100%)"><div class="photo-thumb-label">Reception</div></div>
              <div class="mss-card photo-thumb" style="background:linear-gradient(135deg,#292524 0%,#3c3836 100%)"><div class="photo-thumb-label">First Dance</div></div>
            </div>
          </div>
          <!-- Package teaser -->
          <div class="mock-site-pkgs">
            <div class="mpkg-item"><div class="mpkg-name">Basic Session</div><div class="mpkg-price">from ₦45,000</div></div>
            <div class="mpkg-item"><div class="mpkg-name">Full Day</div><div class="mpkg-price">from ₦150,000</div></div>
          </div>
          <!-- Trust bar -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">500<span>+</span></div><div class="mst-lbl">Sessions</div></div>
            <div class="mst-item"><div class="mst-num" style="font-size:.55rem;letter-spacing:-.01em">CNN<span> Africa</span></div><div class="mst-lbl">Published</div></div>
            <div class="mst-item"><div class="mst-num">5<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rated</div></div>
            <div class="mst-item"><div class="mst-num">6<span>yrs</span></div><div class="mst-lbl">Experience</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "wedding photographer Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Wedding Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Portrait Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Commercial &amp; Product Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Event Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Fashion Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Real Estate Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Corporate Headshot Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Lifestyle Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Documentary &amp; Editorial Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Videographers &amp; Filmmakers</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Wedding Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Portrait Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Commercial &amp; Product Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Event Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Fashion Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Real Estate Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Corporate Headshot Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Lifestyle Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Documentary &amp; Editorial Photographers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Videographers &amp; Filmmakers</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most photography websites<br><em>lose bookings</em></h2>
    </div>
    <p>A potential client searches for a wedding photographer in Lagos or a portrait studio in Abuja. They open three websites. Within eight seconds, they have decided which one feels right — and they close the other two without reading a word. Here is what goes wrong on most photography websites — and exactly what we do about it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg></span>
      <h3 class="prob-title">Work that belongs in galleries is buried on Instagram with no permanent SEO value</h3>
      <p class="prob-desc">Instagram is a discovery tool, not a portfolio. When a bride searches "wedding photographer Victoria Island" or a brand searches "commercial photographer Lagos", Instagram profiles rarely appear in Google results. Your best work deserves a permanent, indexed home that works for SEO and converts visitors into paying clients.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A professionally built portfolio website with every image indexed by Google, fully optimised alt text and structured data, and a permanent search presence that grows over time — not an algorithm-dependent feed.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg></span>
      <h3 class="prob-title">No filterable portfolio — clients can't find the specific type of photography they need</h3>
      <p class="prob-desc">A bride planning her wedding wants to see only wedding photography. A brand manager wants commercial and product work. If your portfolio mixes every category into one undifferentiated grid, potential clients cannot quickly find the specialism they need and leave without enquiring — even if your work is exactly what they wanted.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A filterable portfolio with category tabs — Weddings, Portraits, Commercial, Events, Fashion, Real Estate — so every visitor finds their specific need instantly and is immediately impressed by your relevant work.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Missing on Google when clients search for photographers in their city and specialism</h3>
      <p class="prob-desc">When a Lagos business owner types "corporate headshot photographer Lekki" or a couple searches "wedding photographer Abuja 2026", your photography business does not appear. Photographers without a properly SEO-optimised website with specialism and location pages are invisible to the exact clients who are ready to book.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Individual service pages for every photography specialism you offer, location pages for Lagos, Abuja, Victoria Island, Lekki, and beyond — each targeting the exact search terms your clients use when they are ready to hire.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M8.5 9.5c0-1.1 1.1-2 2.5-2h2c1.4 0 2.5.9 2.5 2s-1.1 2-2.5 2h-2c-1.4 0-2.5.9-2.5 2s1.1 2 2.5 2h2c1.4 0 2.5-.9 2.5-2"/><path d="M12 6v12"/></svg></span>
      <h3 class="prob-title">No package or pricing page — clients leave without enquiring because they fear sticker shock</h3>
      <p class="prob-desc">Prospective clients who cannot find any indication of your pricing will often not enquire at all. The fear of wasting time on a photographer who turns out to be out of their budget is a real barrier to contact. A transparent pricing page — even showing ranges — dramatically increases enquiry rates and filters for clients who are a genuine fit.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Clear pricing and package pages for every specialism — Basic Session, Half Day, Full Day, Wedding Coverage — presented professionally to reduce friction to enquiry and pre-qualify leads before they contact you.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <h3 class="prob-title">Slow image loading — photography websites that take 8 seconds to load lose 70% of visitors</h3>
      <p class="prob-desc">Photography websites are notoriously slow because they contain hundreds of high-resolution images. Most photographers upload full-size files and watch their site grind to a halt. Google penalises slow websites with lower rankings, and visitors on mobile data in Lagos or Abuja abandon pages that take more than three seconds to load — before seeing a single photograph.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every image is automatically converted to WebP, lazy-loaded, and served through a CDN. Our photography websites consistently achieve 95+ PageSpeed scores while still delivering full-bleed, gallery-quality visual impact on every device.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></span>
      <h3 class="prob-title">No booking system — enquiries come in inconsistently and aren't followed up efficiently</h3>
      <p class="prob-desc">Relying on WhatsApp DMs and Instagram comments for booking enquiries means leads fall through the gaps, follow-up is inconsistent, and there is no record of who enquired, for what session, and when. Busy photographers lose bookings they never even knew they had because there was no system to capture and track them.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A structured booking and enquiry system built into your website — with session type, date, location, and budget captured up front — so every enquiry is logged, prioritised, and followed up systematically.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your photography<br>website <em>needs</em></h2>
      <p>A high-performing photography website is not just a homepage and a gallery. It is a structured set of pages — each designed for a specific type of visitor at a specific stage of their decision, and each optimised to rank for the search terms your clients use when they are looking for a photographer.</p>
      <p>We map your specialisms, style, locations, and packages to a complete page architecture that works for both Google and the clients you most want to attract.</p>
      <ul class="bullets">
        <li>Homepage with hero image &amp; featured work curated to make an immediate impression</li>
        <li>Portfolio (filterable by category: weddings, portraits, commercial, events, fashion)</li>
        <li>Individual portfolio galleries per project — telling the story of each shoot</li>
        <li>Services &amp; specialism pages — one per photography type with SEO keyword targeting</li>
        <li>Pricing &amp; package pages — transparent and pre-qualifying</li>
        <li>About &amp; philosophy page — building personal connection and brand trust</li>
        <li>Client testimonials &amp; published credits — social proof at every decision point</li>
        <li>Booking &amp; enquiry system — capturing leads with full session details</li>
        <li>Blog — photography tips, behind the scenes, location guides for organic SEO</li>
        <li>Contact page — clear, fast, with WhatsApp integration for Nigerian clients</li>
      </ul>
      <a href="#contact" class="build-cta">Plan My Photography Website →</a>
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
        <div class="page-card-head"><span class="pch-name">Wedding Photography</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Portfolio Gallery</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Pricing &amp; Packages</span><span class="pch-badge std">Conversion Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">About &amp; Philosophy</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Photography Blog</span><span class="pch-badge key">SEO Engine</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>photographers</em></h2>
    </div>
    <p>Every photography website we build is designed around the specific needs of visual creatives — image performance, portfolio architecture, specialism SEO, and booking conversion. These are not generic business website features. They are photography-specific elements that have a direct impact on the bookings you win and the clients you attract.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg></div>
      <h3 class="svc-title">Portfolio Showcase</h3>
      <p class="svc-desc">A filterable, fast-loading, full-screen image gallery system designed specifically for photographers. Category tabs for weddings, portraits, commercial, events, and more. Individual project galleries that tell the story of each shoot. Lightbox viewing for full-resolution exploration. Every image WebP-compressed and lazy-loaded for speed without sacrificing visual quality.</p>
      <div class="svc-tags"><span class="svc-tag">Filterable Gallery</span><span class="svc-tag">Lightbox</span><span class="svc-tag">WebP Images</span><span class="svc-tag">Full-Screen</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg></div>
      <h3 class="svc-title">Specialism Service Pages</h3>
      <p class="svc-desc">Individual service pages for every type of photography you offer — wedding, portrait, commercial, events, fashion, real estate, corporate headshots, and more. Each page is SEO-optimised for the exact search terms your clients use ("wedding photographer Lagos", "corporate headshot photographer Abuja") and includes your best images from that category, pricing guidance, and a clear booking CTA.</p>
      <div class="svc-tags"><span class="svc-tag">Wedding Page</span><span class="svc-tag">Portrait Page</span><span class="svc-tag">Commercial Page</span><span class="svc-tag">Location SEO</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M8.5 9.5c0-1.1 1.1-2 2.5-2h2c1.4 0 2.5.9 2.5 2s-1.1 2-2.5 2h-2c-1.4 0-2.5.9-2.5 2s1.1 2 2.5 2h2c1.4 0 2.5-.9 2.5-2"/><path d="M12 6v12"/></svg></div>
      <h3 class="svc-title">Pricing &amp; Package Pages</h3>
      <p class="svc-desc">Clear, professionally presented pricing pages for every session type — reducing the "how much?" barrier that stops potential clients from enquiring. Package tiers with what is included, session duration, number of edited images, turnaround time, and add-on options. Transparent pricing builds trust and pre-qualifies enquiries so you spend time only on the right clients.</p>
      <div class="svc-tags"><span class="svc-tag">Package Tiers</span><span class="svc-tag">What's Included</span><span class="svc-tag">Add-ons</span><span class="svc-tag">Pre-qualifying</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></div>
      <h3 class="svc-title">Booking &amp; Enquiry System</h3>
      <p class="svc-desc">A structured booking form that captures session type, preferred date, location, expected guest count (for weddings), budget range, and how they found you — before the first conversation. Every submission delivers to your email instantly. Optional Calendly integration for direct availability booking. WhatsApp button integration for Nigerian clients who prefer direct messaging.</p>
      <div class="svc-tags"><span class="svc-tag">Session Details</span><span class="svc-tag">Date Capture</span><span class="svc-tag">Calendly</span><span class="svc-tag">WhatsApp CTA</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">Image SEO</h3>
      <p class="svc-desc">Photography websites live and die by image SEO. Every image receives a descriptive, keyword-rich alt text, an SEO-optimised file name, and Photograph schema markup — telling Google exactly what is in each image, where it was taken, and who took it. This creates a secondary traffic channel from Google Image Search that most photographers completely overlook and allows your portfolio to appear in image-driven search results.</p>
      <div class="svc-tags"><span class="svc-tag">Alt Text</span><span class="svc-tag">File Naming</span><span class="svc-tag">Photograph Schema</span><span class="svc-tag">Google Images</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20"/><path d="M5 2h13a2 2 0 0 1 2 2v18"/><path d="M8 7h8"/><path d="M8 11h8"/><path d="M8 15h5"/></svg></div>
      <h3 class="svc-title">Photography Blog &amp; Local SEO</h3>
      <p class="svc-desc">A fully managed blog section for publishing real wedding features, behind-the-scenes content, location guides ("Best outdoor portrait locations in Lagos"), and photography tips. Each article targets a specific long-tail keyword combination — "wedding photographer Lekki Peninsula", "corporate headshot session Lagos Island" — building topical authority and compound organic traffic over 12–18 months.</p>
      <div class="svc-tags"><span class="svc-tag">Wedding Features</span><span class="svc-tag">Location Guides</span><span class="svc-tag">Long-tail SEO</span><span class="svc-tag">City + Specialism</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Photographers</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when clients are<br>searching for <em>your specialism</em></h2>
      <p>The most important moment in a photographer's client acquisition journey is when someone opens Google and types "wedding photographer Lagos" or "portrait photographer near me". If you are not on page one — and ideally in the top three results — you do not exist for that client. Every photography website we build is engineered to rank for the exact search terms your clients use.</p>
      <p>We build search visibility alongside visual beauty. Your homepage, each specialism page, your location pages, and your blog articles are all individually optimised for specific keyword targets. We implement Photograph, LocalBusiness, and Person schema markup so Google understands exactly who you are, what you photograph, and where you are based in Nigeria and the UK.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised service pages for each photography specialism you offer</li>
        <li>Location pages targeting Lagos, Abuja, Victoria Island, Lekki, Port Harcourt, and UK</li>
        <li>Photograph + LocalBusiness JSON-LD schema markup on every relevant page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Image SEO — every portfolio image optimised for Google Image Search visibility</li>
        <li>Long-tail keyword blog content targeting specialism + location combinations</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Photography — Keyword Rankings (before &amp; after)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">wedding photographer lagos</span>
            <span class="kw-vol">5,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">photographer abuja</span>
            <span class="kw-vol">3,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">portrait photographer lagos</span>
            <span class="kw-vol">2,600/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">commercial photographer nigeria</span>
            <span class="kw-vol">1,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">photography studio lagos</span>
            <span class="kw-vol">2,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">event photographer nigeria</span>
            <span class="kw-vol">1,600/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">fashion photographer lagos</span>
            <span class="kw-vol">1,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">product photographer nigeria</span>
            <span class="kw-vol">1,100/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active photography SEO campaign</div>
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
    <p>We have built photography websites for visual creatives across Nigeria and the UK. These are the outcomes our photography clients consistently see within the first 6 months of launch.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="340">0</span><span>%</span></div>
      <div class="trust-label">Average increase in booking enquiries reported by photography clients within 6 months of launching a new portfolio website</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="97">0</span></div>
      <div class="trust-label">Average Google PageSpeed score achieved on our photography websites — full-bleed galleries with sub-2-second load times on mobile</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4 19h16"/><path d="m6 15 4-4 3 3 5-6"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="5">0</span><span>×</span></div>
      <div class="trust-label">Increase in portfolio session views — more pages visited, longer time on site, and higher enquiry conversion rates than Instagram alone</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully launched photography website with gallery, booking system, and SEO foundation in place</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Professional websites delivered across Nigeria, the UK, the US, and Canada — built on custom code, never generic templates or page builders</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
      <div class="trust-num">100<span>%</span></div>
      <div class="trust-label">Client code ownership on delivery — every file, every image library, every credential transferred to you unconditionally at handover</div>
    </div>
  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section class="process-section" aria-labelledby="process-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Process</span>
      <h2 class="s-head" id="process-heading">From brief to live portfolio<br>in <em>six structured steps</em></h2>
    </div>
    <p>We have delivered photography websites for solo photographers, boutique studios, and multi-photographer agencies. This process has been refined to deliver beautiful, fast, and bookable results without surprises, delays, or scope disagreements.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Portfolio Audit &amp; Discovery</div>
      <p class="proc-desc">A structured discovery session covering your photography specialisms, target clients, locations served, current booking volume, and business goals. We audit your existing portfolio — identifying your strongest work by category — and map a complete site architecture: every page, every gallery, every SEO keyword target, agreed in writing before any design work begins.</p>
      <div class="proc-tags"><span class="proc-tag">Portfolio Audit</span><span class="proc-tag">Keyword Map</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Signed Brief</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Visual Design (Image-First, Elegant Presentation)</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for all key pages. Photography websites demand an image-first design philosophy: full-bleed hero images, generous white space, minimal UI that puts your photographs centre-stage. We design every gallery layout, category page, and specialism page to make your work look its absolute best on every screen size. Two revision rounds included.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">Image-First</span><span class="proc-tag">2 Revision Rounds</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build (Fast-Loading Gallery + Booking System)</div>
      <p class="proc-desc">Your website is built on a custom WordPress theme — no Elementor, no page builders. The gallery system uses lazy loading, WebP conversion, and CDN delivery to achieve sub-2-second load times even with hundreds of high-resolution images. The booking and enquiry system is integrated with your preferred notification channel. A staging environment is accessible throughout so you can review progress at every milestone.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">Lazy Load Gallery</span><span class="proc-tag">WebP CDN</span><span class="proc-tag">Booking System</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO &amp; Image Optimisation</div>
      <p class="proc-desc">Every page receives a full SEO treatment — title tags, meta descriptions, heading hierarchy, canonical URLs, XML sitemap, and Google Search Console submission. Every image in your portfolio receives descriptive alt text, an SEO-optimised file name, and Photograph schema markup. LocalBusiness and Person schema are implemented on your homepage and about page. Google Analytics 4 is installed and all tracking verified before launch.</p>
      <div class="proc-tags"><span class="proc-tag">Image Alt Text</span><span class="proc-tag">Photograph Schema</span><span class="proc-tag">LocalBusiness</span><span class="proc-tag">GA4 Setup</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA &amp; Launch</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 95+), gallery testing across screen sizes, booking form testing, link verification, and a final review call before launch day. Your domain is transferred to the new site, SSL is verified, and Cloudflare is configured for CDN delivery. You receive a 45-minute CMS training session, a written admin guide, and a 30-day post-launch support window.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">PageSpeed 95+</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly SEO Retainer</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your site ranking and growing — publishing real wedding features and photography blog articles, building local SEO citations, monitoring Core Web Vitals and image performance, updating WordPress, running daily backups, and delivering monthly keyword ranking reports. Most photography clients see their strongest SEO returns in months 6–18 as content compounds.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Blog Content</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Photography websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the photographer's style, specialisms, and target clientele.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--photo) 0%,#3c3836 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Emeka Obi Photography</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Wedding &amp; Portrait · Lagos</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Weddings</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Portraits</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Events</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Wedding &amp; Portrait</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Photography Studio · Lagos, Nigeria</div>
        <div class="port-title">Emeka Obi Photography</div>
        <p class="port-desc">Full portfolio website with filterable gallery across 4 categories, individual project pages, pricing tiers, booking system, and SEO campaign reaching page one for "wedding photographer Lagos" within 90 days of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--photo-dk) 0%,#292524 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Studio Clarity</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Commercial &amp; Product · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Commercial</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Product</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Brand</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Commercial &amp; Product</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Commercial Photography Studio · Abuja, Nigeria</div>
        <div class="port-title">Studio Clarity</div>
        <p class="port-desc">Commercial and product photography studio website targeting brand photography, e-commerce product shots, and corporate photography in Abuja — with client enquiry portal and specialism pages per industry served.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1c1917 0%,#44403c 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Nwosu Lens</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Fashion &amp; Editorial · London + Lagos</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Fashion</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Editorial</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Lookbooks</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Fashion &amp; Editorial · UK</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Fashion &amp; Editorial Photographer · London &amp; Lagos</div>
        <div class="port-title">Nwosu Lens</div>
        <p class="port-desc">Fashion and editorial portfolio website for a dual-market photographer operating across London and Lagos — with a dual-audience content strategy targeting both UK fashion brands and Nigerian fashion industry clients from a single, beautifully designed portfolio platform.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
<section class="pricing-section" id="pricing" aria-labelledby="pricing-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pricing-heading">Transparent pricing for<br>every type of <em>photographer</em></h2>
    </div>
    <p>Every project is quoted individually after a free 30-minute consultation. These ranges are based on typical project scope — your exact quote will be detailed and itemised before any commitment is required.</p>
  </div>
  <div class="pricing-grid">

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Solo Photographers</div>
        <div class="price-name">Essential Portfolio</div>
        <p class="price-tagline">A clean, stunning portfolio for a solo photographer needing a professional online presence to win more bookings.</p>
        <div class="price-amount">₦400k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Homepage with portfolio gallery (up to 5 categories)</div>
        <div class="price-feat">Service &amp; specialism pages</div>
        <div class="price-feat">Enquiry form with session details</div>
        <div class="price-feat">Full SEO foundation</div>
        <div class="price-feat">Image optimisation (WebP, CDN)</div>
        <div class="price-feat">Google Analytics 4</div>
        <div class="price-feat">Mobile-responsive design</div>
        <div class="price-feat">30-day post-launch support</div>
        <div class="price-feat no">Individual project galleries</div>
        <div class="price-feat no">Pricing &amp; package pages</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn outline">Get a Quote →</a></div>
    </div>

    <div class="price-card featured reveal">
      <div class="price-head">
        <div class="price-badge">Most Popular</div>
        <div class="price-name">Growth Portfolio</div>
        <p class="price-tagline">A full-featured photography website built to rank on Google, convert visitors, and grow your booking calendar.</p>
        <div class="price-amount">₦800k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full filterable portfolio (unlimited categories)</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Individual project galleries per shoot</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Pricing &amp; package pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Booking system + Calendly integration</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">About &amp; published credits page</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Photography blog (SEO engine)</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full Image SEO + Photograph schema</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">CMS training session</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">60-day post-launch support</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn gold">Start This Project →</a></div>
    </div>

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Studios &amp; Multi-Photographer Teams</div>
        <div class="price-name">Enterprise Studio</div>
        <p class="price-tagline">A comprehensive digital platform for photography studios with multiple photographers, specialisms, and a full client delivery workflow.</p>
        <div class="price-amount">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Client gallery delivery portal</div>
        <div class="price-feat">Online proofing &amp; image selection</div>
        <div class="price-feat">Print shop integration</div>
        <div class="price-feat">Multi-photographer studio management</div>
        <div class="price-feat">Contract &amp; invoice system</div>
        <div class="price-feat">Watermarking &amp; gallery protection</div>
        <div class="price-feat">Full analytics dashboard</div>
        <div class="price-feat">90-day support &amp; SLA</div>
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
    <p>Not all web development options are equal — especially for photographers where your portfolio presentation is your product.</p>
  </div>
  <table class="compare-table reveal" role="table" aria-label="Web design comparison for photographers">
    <thead>
      <tr>
        <th>Feature</th>
        <th>DIY (Format / Squarespace)</th>
        <th class="hl">i2Medier Custom Build</th>
        <th>Generic Freelancer</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="feature">Built specifically for photographers</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Photography-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Filterable portfolio by category</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full filterable system</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely done well</span></td>
      </tr>
      <tr>
        <td class="feature">Image SEO (Photograph schema, alt text)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Rarely done</span></td>
      </tr>
      <tr>
        <td class="feature">Mobile PageSpeed score 90+</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Typically 40–65</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Guaranteed target</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely achieved</span></td>
      </tr>
      <tr>
        <td class="feature">Booking system integration</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic forms only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full booking system</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on brief</span></td>
      </tr>
      <tr>
        <td class="feature">Pricing &amp; package pages</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not standard</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Always included</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely provided</span></td>
      </tr>
      <tr>
        <td class="feature">Fast image loading (WebP, lazy load)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Slow by default</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Built-in performance</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Rarely optimised</span></td>
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
  <h2 class="s-head" id="test-heading">What photographers say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"I was entirely dependent on Instagram and WhatsApp referrals before this website. Within four months of launching, I was getting three to five wedding enquiries every week directly from Google — brides who found me by searching, read through my website, and were already sold before they even messaged me. It has changed everything about how I run my bookings."</p>
      <div class="test-author">
        <div class="test-avatar">N</div>
        <div><div class="test-name">Mrs. Ngozi Eze</div><div class="test-role">Bride · Featured in Bella Naija Weddings, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"We needed a photographer for our rebrand campaign — executive headshots, product photography, and event coverage. I went on Google, found Studio Clarity's website, and knew within thirty seconds they were exactly who we needed. Their commercial portfolio was right there, organised perfectly by category. The website did all the selling before we even spoke. I was impressed."</p>
      <div class="test-author">
        <div class="test-avatar">T</div>
        <div><div class="test-name">Mr. Tunde Adewale</div><div class="test-role">Brand Manager · FMCG Company, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"The fashion and editorial portfolio they built for me is genuinely one of the most beautiful photography websites I have seen — and I have reviewed hundreds. It loads instantly, the gallery filtering is smooth, and my published credits are displayed properly so brands can see exactly where my work has appeared. I have landed three major Lagos fashion clients directly through it."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Adaeze Obi</div><div class="test-role">Fashion Creative &amp; Photographer · Lagos &amp; London</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free photography website<br>audit — see what your portfolio is missing</h2>
    <p>We will review your current online presence, identify the biggest gaps in your portfolio architecture and SEO, and show you exactly what a new website would do for your bookings. No commitment required.</p>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>photography website design</em></h2>
    </div>
    <p>A comprehensive guide to building a photography website that showcases your work beautifully, attracts the right clients, and ranks on Google — written for Nigerian and UK photographers.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for photographers">

      <h2>Why Nigerian photographers need a professional portfolio website in 2026</h2>
      <p>Nigeria's photography industry has never been more competitive. The rise of smartphone cameras, accessible mirrorless gear, and Instagram have created a generation of visually capable photographers across Lagos, Abuja, Port Harcourt, and every major city. But visual capability alone does not win clients. Discoverability does. And in 2026, discoverability means one thing above all: Google.</p>
      <p>When a Lagos couple starts planning their wedding, one of their very first actions is a Google search: "wedding photographer Lagos", "wedding photographer Victoria Island", "wedding photographer Lekki". When a brand manager needs a commercial photographer for a product campaign, they search "commercial photographer Lagos" or "product photographer Nigeria". When a PR agency needs event coverage, they search "event photographer Abuja".</p>
      <p>If your photography business does not appear in those results — and ideally in the top three — you do not exist for those potential clients. Instagram does not replace this. Social media algorithms are ephemeral and platform-dependent. A professionally built, SEO-optimised photography website creates a permanent, Google-indexed presence for your business that compounds in value over time, bringing in bookings while you are asleep, on a shoot, or in post-processing.</p>
      <p>The photographers who understand this earliest are the ones who dominate their markets within 18–24 months. They are not necessarily the most technically skilled or the most creative — they are the ones who made their work discoverable and their booking process frictionless.</p>

      <h2>Image loading speed: the technical foundation of every photography website</h2>
      <p>The central technical challenge of photography website design is the contradiction between visual quality and load speed. Photography websites need to display high-resolution, large-format images that do full justice to your work. But large image files are slow — and slow websites lose visitors, lose Google rankings, and lose bookings.</p>

      <h3>The performance problem most photographers ignore</h3>
      <p>The average unoptimised photography website loads in 7–12 seconds on a mobile device with standard Nigerian mobile data speeds. Research from Google consistently shows that 53% of mobile visitors abandon a page that takes more than three seconds to load. On a photography website, this means the majority of potential clients never see your work at all — they leave before the first image even appears.</p>
      <p>The solution is not to use smaller images and sacrifice quality. It is to implement a modern image delivery pipeline: <strong>WebP conversion</strong> (the same image file at 40–70% smaller file size), <strong>lazy loading</strong> (images load only as they scroll into view), and <strong>Content Delivery Network (CDN) delivery</strong> (images served from the server closest to the visitor's location). Combined correctly, these techniques allow photography websites to achieve PageSpeed scores above 95 while still delivering full-bleed, gallery-quality visual impact on every device and connection speed.</p>

      <h3>What this means for your Google rankings</h3>
      <p>Google's Core Web Vitals — which directly influence search rankings — include Largest Contentful Paint (LCP), which measures how quickly the main image on a page loads. A photography homepage where the hero image takes 8 seconds to load will score poorly on LCP and rank lower than a competitor whose hero image loads in under 2 seconds. Speed is not just a user experience issue for photographers — it is a competitive ranking factor.</p>

      <h2>Photography SEO: ranking by specialism and location</h2>
      <p>The keyword landscape for photography in Nigeria is rich with opportunity. Most photographers are not competing for the single keyword "photographer Nigeria" — they are competing for specific combinations of specialism, location, occasion, and style that are much more achievable to rank for and, critically, match the exact intent of clients who are ready to book.</p>

      <h3>Specialism + location keyword combinations</h3>
      <p>The highest-value SEO keywords for Nigerian photographers follow a consistent pattern: <strong>[specialism] photographer [location]</strong>. Wedding photographer Lagos (5,800 monthly searches), portrait photographer Abuja (2,600/mo), commercial photographer Nigeria (1,800/mo), event photographer Lagos (1,600/mo). Each of these represents a client who has already made a decision about what they need — they are searching for who to hire.</p>
      <p>A well-structured photography website creates individual pages for each specialism you offer — a dedicated Wedding Photography page, a Portrait Photography page, a Commercial Photography page — each optimised for the specialism-specific keywords and featuring your best work from that category. This multi-page architecture allows a single photography website to rank for dozens of specific keyword combinations simultaneously.</p>

      <h3>Location pages for local SEO dominance</h3>
      <p>Beyond specialism pages, location-specific content creates additional ranking opportunities. A Lagos-based wedding photographer can create separate pages targeting "wedding photographer Victoria Island", "wedding photographer Lekki", "wedding photographer Ikeja", and "wedding photographer Lagos Island" — each targeting a distinct geographic search query with locally relevant content. Abuja-based photographers can target Garki, Wuse, Maitama, and Asokoro. This granular location targeting is particularly effective in Nigerian markets where clients often search by neighbourhood rather than just city.</p>

      <h2>Pricing pages and reducing friction to enquiry</h2>
      <p>One of the most counterintuitive insights in photography website conversion is that transparency about pricing — even at a range level rather than a fixed price — significantly increases enquiry rates. The conventional photographer wisdom is to withhold pricing to "prevent price shopping". The reality is that withheld pricing creates uncertainty that stops potential clients from enquiring at all.</p>
      <p>A prospective client looking for a wedding photographer in Lagos has a budget. If your website gives no indication of your pricing range, they face a choice: spend time enquiring, waiting for a response, and discovering whether you are within budget — or simply move to the next photographer whose website shows them what to expect. Most choose the latter.</p>
      <p>A professional pricing page does not need to show your exact, fixed prices. It can show package tiers, what is included in each, the range of session durations, number of edited images, turnaround times, and add-on options. This structure reduces friction, pre-qualifies enquiries, and builds trust with clients who see that you are transparent about how you work and what you charge.</p>

      <h2>Portfolio architecture: how to structure categories for maximum impact</h2>
      <p>The architecture of your portfolio is a strategic decision, not just an aesthetic one. A poorly structured portfolio that shows all your work in a single undifferentiated grid forces every visitor to scroll through irrelevant images to find the category they need. A well-structured portfolio immediately surfaces the most relevant work for each visitor type.</p>
      <p>The most effective photography portfolio architecture uses clear category tabs or navigation — Weddings, Portraits, Commercial, Events, Fashion, Real Estate — with each category containing only the best 15–25 images from that specialism. Individual project pages for key shoots allow you to tell the story behind the work and create additional SEO opportunities. A curated homepage featuring hero images from multiple categories makes an immediate, broad impression before directing visitors to their specific area of interest.</p>
      <p>The goal is that a wedding couple lands on your website and finds your best wedding work within two clicks. A brand manager lands and finds your best commercial work immediately. The portfolio should feel tailored to every visitor, even though the same content serves all of them — that is the art of great portfolio architecture.</p>

      <h2>Pricing guide for photography website design in Nigeria</h2>
      <p>Photography website costs in Nigeria vary significantly based on the scope of the project, the complexity of the gallery system required, and the extent of the SEO work included. As a general guide for the Nigerian market in 2026:</p>
      <ul>
        <li><strong>Essential portfolio site</strong> (homepage, filterable gallery up to 5 categories, service pages, enquiry form, basic SEO): ₦400,000–₦600,000</li>
        <li><strong>Growth portfolio website</strong> (full filterable portfolio, individual project galleries, pricing pages, booking system, blog, full image SEO with Photograph schema): ₦800,000–₦1.3M</li>
        <li><strong>Enterprise studio platform</strong> (client gallery delivery portal, online proofing, print shop, multi-photographer management, contract system): ₦1.5M+</li>
      </ul>
      <p>The return on a well-built photography website is typically rapid. A Lagos wedding photographer who attracts even one additional booking per month directly from their website at an average package value of ₦200,000 generates ₦2.4M in additional annual revenue — a return of 3–6x the website investment within the first 12 months. The compounding nature of SEO means that return grows year on year as rankings strengthen and domain authority builds.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free photography website audit and proposal from our team.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Audit →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why photography websites lose bookings</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for photographers</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about photography<br>website <em>design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every photographer has different needs. Email us and we will give you a direct, honest answer specific to your work and goals — no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">How do I upload my images to the website after it is built?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">All photography websites we build use WordPress with a custom gallery management system powered by ACF Pro. You upload images directly from your WordPress admin — no coding required. You can add new images to existing gallery categories, create new project galleries, reorder images by drag-and-drop, and add SEO alt text to each image from the same interface. We include a full CMS training session at handover covering every workflow you will need.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can you protect my gallery images from being downloaded or used without permission?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Yes. We implement right-click protection on all gallery images to prevent casual saving. For photographers who require stronger protection, we can implement automatic watermarking on public portfolio images, with clean unwatermarked versions available only through a password-protected client delivery portal. Note that no technical protection is 100% foolproof — anyone with determination can screenshot images — but right-click protection and visible watermarking are effective deterrents for the vast majority of use cases.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">Can you integrate a watermarking system into my photography website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">Yes. We can integrate automatic watermarking that overlays your logo or name on every public portfolio image at a specified opacity and position. This is done server-side so the original clean files are stored safely and can be displayed unwatermarked to clients through a secure delivery portal. The watermark style — position, opacity, text, or logo — is fully configurable and can be updated at any point without re-uploading your images.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Can you build a print shop into my photography website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Yes. A print shop integration is available on our Enterprise Studio tier. We can integrate WooCommerce-powered print ordering — allowing clients to select images from their delivered gallery, choose print sizes and formats, and pay online — with order notifications sent directly to you or your lab. For photographers who use professional print labs in Nigeria or internationally, we can build custom integrations with your preferred fulfilment partner.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Can you build a client gallery delivery portal so I can share images privately with clients?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes. Our Enterprise Studio package includes a custom-built client gallery delivery portal — allowing clients to log in with a unique link or password, view their delivered images in a branded gallery, mark favourites, download approved images, and optionally place print orders. This replaces third-party services like Pixieset or Shootproof with a fully branded experience hosted on your own domain. Client portals are priced separately from the main portfolio website; contact us for a scoped quote.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Will my portfolio images appear in Google Image Search?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">Yes — and this is a significant, underutilised traffic source for photographers. Every image on your website receives an SEO-optimised alt text describing the content and location of the photograph ("wedding reception couple Lagos Island"), an SEO-friendly file name, and Photograph JSON-LD schema markup linking the image to your photographer profile. This signals to Google exactly what each image depicts, enabling your portfolio images to appear in Google Image Search results for relevant queries — driving an additional stream of organic discovery traffic to your website.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">How long does it take to build a photography website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">A standard photography portfolio website takes 3–5 weeks from design approval to launch. The timeline depends on the number of gallery categories, whether individual project pages are included, and the extent of the SEO setup required. Enterprise studio platforms with client delivery portals and print shop integrations typically take 6–10 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when. The most common cause of delay is waiting for client content — specifically, curated images by category.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a photography website<br>that wins more bookings?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We'll review your current portfolio presence, map your keyword opportunities, and show you exactly what we'd build — and why.</p>
  <a href="{{ route('site.start', ['services' => 'webdesign', 'source_page' => 'industry-photography-website-design', 'source_label' => 'Photography Industry Page']) }}" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
