@extends('public.layouts.app')

@section('title', 'Restaurant Website Design Company in Nigeria | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Design', 'item' => route('site.services.web-design')],
        ['@type' => 'ListItem', 'position' => 4, 'name' => 'Restaurant Web Design', 'item' => route('site.services.web-design.industry', ['industry' => 'restaurant-website-design'])],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'How much does a restaurant website cost in Nigeria?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Restaurant websites start from ₦400,000 for a professional site with a digital menu, reservation enquiry form, gallery, and SEO foundation. Full-featured websites with a live reservation widget, Paystack commission-free ordering, private dining pages, and advanced SEO start from ₦850,000. Multi-location restaurant group platforms are quoted individually based on scope. We provide a detailed, itemised quote after a free consultation — no hidden fees.']],
        ['@type' => 'Question', 'name' => 'Can my website take orders without paying commission to Jumia Food or Bolt Food?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — this is one of the most powerful features we build for restaurant clients. Your website can include a full online ordering system powered by Paystack, where customers browse your menu, select items, choose delivery or collection, and pay directly to your bank account. You pay Paystack\'s standard transaction fee (1.5% + ₦100, capped at ₦2,000) — not 25–30% commission. Most restaurants recoup the full website cost from commission savings within 60–90 days.']],
        ['@type' => 'Question', 'name' => 'How long does it take to build a restaurant website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A standard restaurant website with digital menu, reservation system, gallery, and ordering takes 3–5 weeks from design approval to launch. Larger sites for multi-location restaurant groups with custom loyalty programmes or delivery management systems may take 6–8 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when.']],
        ['@type' => 'Question', 'name' => 'Can I update the menu prices and add new dishes myself?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — this is a core principle of every website we build for restaurants. We use a WordPress admin panel with ACF Pro to create intuitive editing interfaces for your menu items, prices, dietary labels, availability, special offers, and opening hours. Your staff can update any content without touching code. Every handover includes a CMS training session and a written admin guide covering every workflow your team needs.']],
        ['@type' => 'Question', 'name' => 'Will my restaurant appear on Google Maps and local search?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Every restaurant website we build includes full Restaurant and LocalBusiness schema markup — telling Google your cuisine type, price range, opening hours, location coordinates, menu URL, and reservation link. We also optimise your Google Business Profile for local map pack rankings (the three restaurants shown above organic search results). For restaurants in competitive locations like Victoria Island or Ikeja GRA, we also offer ongoing local citation building as part of our monthly retainer.']],
        ['@type' => 'Question', 'name' => 'Do you work with cafes, bars, and food trucks — not just restaurants?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We build websites for the full range of food and hospitality businesses — fine dining restaurants, casual dining, fast food outlets, cafes and coffee shops, cocktail bars, suya spots, bakeries and patisseries, cloud kitchens, food trucks, and private dining venues. The scope and budget are calibrated to match the nature and size of your food business. A coffee shop has very different website requirements from a 120-seat fine dining restaurant, and we design each accordingly.']],
        ['@type' => 'Question', 'name' => 'Can you build a website for a restaurant with locations in both Nigeria and the UK?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — this is a speciality of ours. We work with Nigerian-origin restaurants operating in London, Manchester, Birmingham, and other UK cities alongside their Nigerian locations. We build dual-audience content strategies that serve both the Nigerian diaspora in the UK (searching in GBP, with UK-specific dietary expectations) and the Nigerian market at home — with separate location pages, menus, and ordering systems for each market from a single, unified website.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/restaurant-web-design.css')
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
      <span aria-current="page">Web Design for Restaurants</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Restaurant Website Design</span>
    <h1>Restaurant websites that fill tables and <em>drive more orders</em></h1>
    <p class="hero-sub">Your own beautiful restaurant website wins direct reservations and orders — without paying 25–30% commission to Jumia Food or Bolt Food on every single transaction. i2Medier builds appetite-first websites for restaurants, bars, cafes, and food businesses across Nigeria and the UK.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Restaurant Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Built for food & hospitality — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M8 2v4"/><path d="M16 2v4"/><path d="M3 10h18"/></svg></span> Online reservations &amp; commission-free ordering</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria &amp; UK specialists</span>
    </div>
  </div>

  <!-- Restaurant website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M8 2v4"/><path d="M16 2v4"/><path d="M3 10h18"/></svg></div>
        <div>
          <div class="float-notif-text">New reservation · Table for 4 · Saturday 7pm</div>
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
            <span class="mock-url-text">savourrestaurant.com.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Savour <span>Restaurant</span></div>
            <div class="msn-links">
              <span class="msn-link">Menu</span>
              <span class="msn-link">Reservations</span>
              <span class="msn-link">About</span>
              <span class="msn-link">Gallery</span>
              <span class="msn-cta">Order Online</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Fine Nigerian Cuisine · Victoria Island, Lagos</div>
            <div class="msh-h1">Fine Nigerian Cuisine in the<br>Heart of <span>Victoria Island</span></div>
            <div class="msh-sub">Reserve your table or order direct — no commission platforms.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Book a Table →</span>
              <span class="msh-btn-s">View Menu</span>
            </div>
          </div>
          <!-- Dish cards -->
          <div class="mock-site-menu">
            <div class="mss-label">Our Signature Dishes</div>
            <div class="mss-grid">
              <div class="mss-card">
                <div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M2 12h20"/><path d="M12 2a10 10 0 0 1 10 10"/><path d="M12 2a10 10 0 0 0-10 10"/><path d="M12 22v-2"/></svg></div>
                <div class="mss-name">Jollof Rice</div>
                <div class="mss-price">₦4,500</div>
              </div>
              <div class="mss-card">
                <div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg></div>
                <div class="mss-name">Grilled Tilapia</div>
                <div class="mss-price">₦6,800</div>
              </div>
              <div class="mss-card">
                <div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M3 11l19-9-9 19-2-8-8-2z"/></svg></div>
                <div class="mss-name">Suya Platter</div>
                <div class="mss-price">₦5,200</div>
              </div>
              <div class="mss-card">
                <div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M12 2a8 8 0 0 1 8 8c0 6-8 12-8 12S4 16 4 10a8 8 0 0 1 8-8z"/></svg></div>
                <div class="mss-name">Pepper Soup</div>
                <div class="mss-price">₦3,800</div>
              </div>
            </div>
          </div>
          <!-- Reservation widget -->
          <div class="mock-site-reservation">
            <div class="msr-label">Book Your Table</div>
            <div class="msr-fields">
              <div class="msr-field">Date</div>
              <div class="msr-field">Time</div>
              <div class="msr-field">Guests</div>
            </div>
            <span class="msr-btn">Reserve Now →</span>
          </div>
          <!-- Trust bar -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">7<span>days</span></div><div class="mst-lbl">Open</div></div>
            <div class="mst-item"><div class="mst-num">Private</div><div class="mst-lbl">Dining</div></div>
            <div class="mst-item"><div class="mst-num">4.8<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Google</div></div>
            <div class="mst-item"><div class="mst-num">Est.</div><div class="mst-lbl">2015</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "restaurant victoria island"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Fine Dining Restaurants</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Casual Dining</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Fast Food Restaurants</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Cafes &amp; Coffee Shops</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Bars &amp; Cocktail Lounges</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Food Trucks</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Suya Spots &amp; Nigerian Cuisine</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Bakeries &amp; Patisseries</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Cloud Kitchens</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Private Dining Venues</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Fine Dining Restaurants</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Casual Dining</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Fast Food Restaurants</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Cafes &amp; Coffee Shops</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Bars &amp; Cocktail Lounges</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Food Trucks</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Suya Spots &amp; Nigerian Cuisine</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Bakeries &amp; Patisseries</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Cloud Kitchens</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Private Dining Venues</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most Nigerian restaurant<br>websites <em>cost you money</em></h2>
    </div>
    <p>Every order placed through Jumia Food or Bolt Food costs your restaurant 25–30% of the ticket value before you even plate the dish. A weak or nonexistent website is the single biggest reason restaurants stay dependent on third-party platforms. These are the six problems we see most often — and how we fix every single one of them.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span>
      <h3 class="prob-title">Paying 25–30% commission to Jumia Food &amp; Bolt Food on every order</h3>
      <p class="prob-desc">On a ₦5,000 order, you hand ₦1,250–₦1,500 directly to a platform that owns the customer relationship and can de-list you tomorrow. Restaurants with their own websites and ordering systems eliminate this entirely — keeping 100% of every order placed directly.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Paystack-powered direct ordering built into your website. Zero commission per order. Customers pay you, not a platform. The website typically pays for itself within 60–90 days of launch.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Not appearing on Google when locals search for somewhere to eat</h3>
      <p class="prob-desc">When someone types "restaurant victoria island" or "fine dining Lagos" into Google, your competitors appear. You don't. That search intent — a person actively looking for a restaurant — is the most qualified lead imaginable. Without a ranked website, you are invisible at the precise moment people are ready to book.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Full restaurant SEO from day one — Restaurant and LocalBusiness schema markup, Google Business Profile optimisation, location keyword targeting, and individual pages for every cuisine and occasion you serve.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <h3 class="prob-title">No online menu — customers can't browse before they decide to visit</h3>
      <p class="prob-desc">Today's diners research before they commit. They want to see your menu, your prices, your food photography, and your ambience before they leave home. A restaurant without an online menu loses bookings to competitors who make that research easy — often before the potential customer ever picks up a phone.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A full digital menu with mouth-watering food photography, clear pricing, dietary and allergen information, and easy filtering. Fully editable from your admin panel — update dishes and prices yourself in minutes.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M8 2v4"/><path d="M16 2v4"/><path d="M3 10h18"/></svg></span>
      <h3 class="prob-title">No reservation system — tables go unbooked and evenings underperform</h3>
      <p class="prob-desc">Customers who cannot book a table online at 11pm on a Tuesday will simply choose a restaurant that lets them. Phone reservations are lost to voicemail, forgotten, or never made at all. An online booking widget captures reservations 24/7 — while your team sleeps — and fills every available slot.</p>
      <div class="prob-solution"><strong>Our Fix</strong> An integrated table reservation widget — date picker, time selector, party size, special requests — with automatic email confirmations sent to both the guest and your team. Works on mobile, tablet, and desktop.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.1-3.1a2 2 0 0 0-2.8 0L6 21"/></svg></span>
      <h3 class="prob-title">Poor food photography that fails to trigger appetite and bookings</h3>
      <p class="prob-desc">People eat with their eyes first — especially online. Blurry, poorly lit, or absent food photography kills bookings before the menu is read. A restaurant website where the food looks incredible drives orders and reservations. One where the photos look amateur sends visitors straight to a competitor.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Our restaurant websites are designed photography-first — every layout and template is built to showcase stunning food imagery at full impact. We guide you on photography briefs and can connect you with food photographers in Lagos and Abuja.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
      <h3 class="prob-title">No events or private dining page — corporate bookings go elsewhere</h3>
      <p class="prob-desc">Private dining, corporate events, birthday celebrations, and wedding receptions are your highest-value bookings. But if your website has no dedicated events page — no capacity information, no menu packages, no enquiry form — those high-value clients book their events at a restaurant whose website made it easy to say yes.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A dedicated private dining and events page showcasing your venue capacity, occasion packages, bespoke menu options, and a direct event enquiry form. This page alone generates some of our clients' highest-value restaurant bookings.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your restaurant<br>website <em>needs to convert</em></h2>
      <p>A high-performing restaurant website is a revenue system — not just an online menu. Every page serves a specific purpose: attracting new diners, converting browsers into bookers, winning direct orders from delivery platforms, and filling private dining enquiries. We map your cuisine, occasion types, and location into a complete page architecture that works hard for your business every hour of the day.</p>
      <p>We build around your specific restaurant — your dishes, your ambience, your story, your Google map placement, and your target keywords. Nothing is generic.</p>
      <ul class="bullets">
        <li>Homepage — appetite-inspiring hero, signature dishes, instant booking call to action</li>
        <li>Full digital menu — categorised, photographed, priced, with dietary information</li>
        <li>Online reservation system — date, time, party size with instant email confirmation</li>
        <li>Direct food ordering — Paystack-powered, zero commission, full menu integration</li>
        <li>Food photography gallery — atmosphere, dishes, events, and chef spotlight</li>
        <li>Private dining &amp; events — capacity, packages, menus, and event enquiry form</li>
        <li>About &amp; chef story — your origin, your philosophy, your team</li>
        <li>Special offers &amp; seasonal menus — rotating promotions and seasonal campaigns</li>
        <li>Contact page — opening hours, Google Maps embed, directions, social links</li>
        <li>Blog &amp; food stories — SEO content that builds organic search traffic over time</li>
      </ul>
      <a href="#contact" class="build-cta">Plan My Restaurant Website →</a>
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
        <div class="page-card-head"><span class="pch-name">Digital Menu</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Order Online</span><span class="pch-badge key">Revenue</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Reservations</span><span class="pch-badge key">Revenue</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Private Dining</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Gallery &amp; Events</span><span class="pch-badge std">Trust Page</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>restaurants &amp; food businesses</em></h2>
    </div>
    <p>Every restaurant website we build is designed around the specific conversion patterns, appetite triggers, and revenue mechanics of the food and hospitality industry. These are not generic business website features — they are restaurant-specific elements that directly determine whether a hungry visitor books a table, places an order, or clicks away to a competitor.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
      <h3 class="svc-title">Digital Menu System</h3>
      <p class="svc-desc">A full digital menu with stunning food photography, clear pricing, category filtering (starters, mains, desserts, drinks), dietary labels (gluten-free, halal, vegan), and allergen information. Fully editable from your admin panel — add a new dish or update prices without touching code. Optimised for mobile — the way 80% of your customers will view it.</p>
      <div class="svc-tags"><span class="svc-tag">Food Photography</span><span class="svc-tag">Menu Categories</span><span class="svc-tag">Dietary Labels</span><span class="svc-tag">Self-Editable</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M8 2v4"/><path d="M16 2v4"/><path d="M3 10h18"/></svg></div>
      <h3 class="svc-title">Online Reservation &amp; Table Booking</h3>
      <p class="svc-desc">A live table reservation widget that captures bookings around the clock — date picker, time selection, party size, special requests (anniversary, allergy, high chair), and instant email confirmation to both guest and restaurant. Integrated with your existing availability. Stop losing reservations to voicemail and unanswered phones.</p>
      <div class="svc-tags"><span class="svc-tag">Live Calendar</span><span class="svc-tag">Email Confirmation</span><span class="svc-tag">Special Requests</span><span class="svc-tag">24/7 Bookings</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
      <h3 class="svc-title">Direct Food Ordering — No Commission</h3>
      <p class="svc-desc">A full online food ordering system powered by Paystack — customers browse your menu, select items, choose delivery or collection, and pay directly to your account. Zero commission per order. Zero platform dependency. Every naira goes to you. Most restaurants recoup the website cost within 60–90 days from commission savings alone.</p>
      <div class="svc-tags"><span class="svc-tag">Paystack</span><span class="svc-tag">Zero Commission</span><span class="svc-tag">Delivery &amp; Collection</span><span class="svc-tag">Full Menu</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.1-3.1a2 2 0 0 0-2.8 0L6 21"/></svg></div>
      <h3 class="svc-title">Food Photography Showcase Gallery</h3>
      <p class="svc-desc">A full-screen gallery section built to showcase your food photography, restaurant ambience, private dining setup, and events at maximum visual impact. Lightbox zoom, category filtering (dishes, venue, events, chef), lazy-loaded for fast performance. Photography guidance provided — or we connect you with our network of Lagos and Abuja food photographers.</p>
      <div class="svc-tags"><span class="svc-tag">Lightbox Gallery</span><span class="svc-tag">Lazy Load</span><span class="svc-tag">Category Filter</span><span class="svc-tag">Full Screen</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
      <h3 class="svc-title">Private Dining &amp; Events Pages</h3>
      <p class="svc-desc">A dedicated private dining and events section showcasing your venue capacity, floor plans, available packages, bespoke menu options, and pricing guidance. A tailored event enquiry form captures all the details your team needs to respond with a proposal. This single page consistently generates the highest-value bookings for our restaurant clients.</p>
      <div class="svc-tags"><span class="svc-tag">Event Packages</span><span class="svc-tag">Enquiry Form</span><span class="svc-tag">Capacity Info</span><span class="svc-tag">Bespoke Menus</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">SEO for Restaurant Keywords</h3>
      <p class="svc-desc">Title tags, meta descriptions, and content optimised for high-intent restaurant search terms — "restaurant [area] Lagos", "fine dining Abuja", "private dining Victoria Island". Restaurant and LocalBusiness schema markup for rich Google results. Google Business Profile optimisation for local map pack inclusion. Every page is a search entry point.</p>
      <div class="svc-tags"><span class="svc-tag">Restaurant Schema</span><span class="svc-tag">Local SEO</span><span class="svc-tag">Google Business</span><span class="svc-tag">GSC Setup</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Restaurants</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when hungry diners<br>search for <em>a restaurant</em></h2>
      <p>The most powerful marketing moment for any restaurant is when someone opens Google and types "restaurant victoria island" or "fine dining abuja". That person is hungry, ready to book, and actively choosing where to spend money. If you are not on page one, that booking goes to a competitor. Every restaurant website we build is engineered to win those searches.</p>
      <p>We build search visibility into every page — your homepage, cuisine pages, location pages, private dining pages, and blog content are all individually optimised for specific keyword targets. Restaurant schema markup with menu, reservation URL, and cuisine type signals tells Google exactly what you are and who you serve.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each cuisine type and dining occasion</li>
        <li>Location targeting for every area and neighbourhood you serve</li>
        <li>Restaurant + LocalBusiness + FoodEstablishment JSON-LD schema on every page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Citation building across Nairaland, Nigerian business directories, and Google Maps</li>
        <li>Food blog strategy — recipe posts, chef features, and local food culture content</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get a Restaurant SEO Audit →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Restaurant — Keyword Rankings (representative results)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">restaurant lagos</span>
            <span class="kw-vol">18,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">restaurant victoria island</span>
            <span class="kw-vol">6,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">restaurant abuja</span>
            <span class="kw-vol">8,800/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">fine dining lagos</span>
            <span class="kw-vol">3,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">food delivery victoria island</span>
            <span class="kw-vol">4,100/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">cafe lagos</span>
            <span class="kw-vol">5,600/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">private dining lagos</span>
            <span class="kw-vol">2,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">restaurant near me nigeria</span>
            <span class="kw-vol">12,000/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from active restaurant SEO campaigns</div>
    </div>
  </div>
</section>

<!-- ═══ TRUST SIGNALS ═══ -->
<section class="trust-section" aria-labelledby="trust-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why i2Medier</span>
      <h2 class="s-head" id="trust-heading">Numbers that prove<br>the <em>restaurant difference</em></h2>
    </div>
    <p>We have built restaurant and food business websites across Nigeria and the UK. These are the outcomes our hospitality clients see consistently — tracked and verified.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M8 2v4"/><path d="M16 2v4"/><path d="M3 10h18"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="380">0</span><span>%</span></div>
      <div class="trust-label">Average increase in online reservations within the first 90 days of launching a new restaurant website with a booking widget</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="96">0</span></div>
      <div class="trust-label">Average Google PageSpeed score on mobile achieved on our custom-built restaurant websites — fast loading, appetite-inspiring</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="6">0</span><span>×</span></div>
      <div class="trust-label">More direct orders generated through restaurant websites vs equivalent commission-platform spend — keeping 100% of every transaction</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched restaurant website — with a milestone-based delivery timeline agreed upfront</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Websites delivered for hospitality and food businesses across Nigeria and the UK — all built on custom code, never templates</div>
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
      <h2 class="s-head" id="process-heading">From brief to live restaurant site<br>in <em>six structured steps</em></h2>
    </div>
    <p>We have delivered restaurant and hospitality websites across Nigeria and the UK. This process eliminates the delays, misalignments, and scope surprises that make most web projects frustrating — and gets your commission-free ordering system live as quickly as possible.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery &amp; Menu Audit</div>
      <p class="proc-desc">A structured discovery session covering your restaurant's concept, cuisine, target diner profile, location, competitive landscape, and revenue goals. We audit your existing menu, photography assets, and any current online presence. We map your complete site architecture — every page, every content type, every keyword target — and agree on it in writing before design begins. This document governs the entire project.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Menu Audit</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Signed Brief</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Visual Design — Appetite-Inspiring, Photography-First</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — built around your food photography and brand. The design is appetite-first: every layout choice is made to make your food look irresistible and your restaurant feel premium. We design the menu layout, reservation widget, ordering flow, and gallery at this stage. Two revision rounds included. You approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Photography-First</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build — Ordering System &amp; Reservation Integration</div>
      <p class="proc-desc">Your website is built on a custom WordPress theme — no Elementor, no page builders. The digital menu, Paystack ordering system, and reservation widget are built and tested in full on a staging environment you can review throughout. The admin panel is structured so your team can update menu items, prices, specials, and opening hours without touching code. A staging link is shared from day one of build.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">Paystack Integration</span><span class="proc-tag">Reservation Widget</span><span class="proc-tag">Staging Access</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO &amp; Content Entry</div>
      <p class="proc-desc">Your full menu, gallery, and page content are entered and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, Restaurant and LocalBusiness schema markup (with menu URL, reservationUrl, cuisine type, price range, and opening hours), canonical URLs, XML sitemap, and Google Search Console submission. Google Analytics 4 installed, goals configured, and all tracking verified before launch.</p>
      <div class="proc-tags"><span class="proc-tag">Restaurant Schema</span><span class="proc-tag">Content Entry</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA &amp; Launch</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 90+), ordering flow end-to-end testing including Paystack sandbox, reservation form testing, form submission verification, and a final review call before launch day. Your domain is transferred, SSL verified, and Cloudflare configured. You receive a 45-minute CMS training session, a written admin guide, and a 30-day post-launch support window for any issues.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Payment Testing</span><span class="proc-tag">Go-Live</span><span class="proc-tag">30-Day Support</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly SEO &amp; Maintenance Retainer</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your restaurant ranking and generating bookings — publishing food blog articles, building local SEO citations, running seasonal campaign updates (festive menus, Valentine's, Ramadan specials), monitoring Core Web Vitals, updating WordPress plugins, running daily backups, and delivering monthly keyword ranking and booking reports. Most restaurant clients see their strongest ROI in months 3–9.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Seasonal Updates</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Restaurant websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the restaurant's cuisine, concept, location, and target diner. Every one has a live reservation system and direct ordering.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--resto-dk) 0%,#a1380e 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Savour Restaurant</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Fine Nigerian Cuisine</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Digital Menu</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Online Ordering</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Reservations</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Fine Dining · Lagos</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Fine Nigerian Cuisine · Victoria Island, Lagos</div>
        <div class="port-title">Savour Restaurant</div>
        <p class="port-desc">Photography-first fine dining website with a full digital menu, Paystack ordering system, live reservation widget, and private dining events page. Ranking #1 for "restaurant victoria island" within 75 days of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a2a0a 0%,#2a4010 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">The Pepper Pot</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Casual Dining &amp; Bar</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Bar Menu</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Events</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Reservations</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Casual Dining · Abuja</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Casual Dining &amp; Bar · Abuja, Nigeria</div>
        <div class="port-title">The Pepper Pot</div>
        <p class="port-desc">Casual dining and bar website with separate food and cocktail menus, a live events calendar, reservation booking, and a corporate group dining enquiry form. Direct bookings increased 290% within the first three months.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a0a0a 0%,#2d1616 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Mama's Kitchen</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Authentic Nigerian</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">London</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Lagos</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Ordering</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Authentic Nigerian · London + Lagos</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Authentic Nigerian Cuisine · London &amp; Lagos</div>
        <div class="port-title">Mama's Kitchen</div>
        <p class="port-desc">Dual-location authentic Nigerian restaurant serving the London diaspora and Lagos market. Dual-audience content strategy, separate menus for each location, online ordering integrated with both kitchens, and a strong food blog driving organic traffic from Nigerian food searches in the UK.</p>
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
    <p>Not all web development options are equal — especially for restaurants where every missed reservation and every commission-platform order represents real, measurable revenue lost.</p>
  </div>
  <div class="compare-wrap"><table class="compare-table reveal" role="table" aria-label="Web design comparison for restaurants">
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
        <td class="feature">Built specifically for restaurants</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Restaurant-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Full digital menu system</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Limited plugins</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Custom-built, self-editable</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely included</span></td>
      </tr>
      <tr>
        <td class="feature">Online reservation system</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Third-party plugin</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Integrated &amp; custom</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">Commission-free direct ordering</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Paystack — 0% commission</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely built</span></td>
      </tr>
      <tr>
        <td class="feature">Restaurant schema &amp; Google Business</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Rarely configured</span></td>
      </tr>
      <tr>
        <td class="feature">Mobile PageSpeed score 90+</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Typically 40–65</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Guaranteed target</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely achieved</span></td>
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
  </table></div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What restaurant owners say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Before the website, we were giving Jumia Food over ₦180,000 per month in commissions. Within the first two months of launching with i2Medier, we had moved 60% of our delivery orders to the website. The commission savings alone paid for the website in three months. And the food photography showcase they built is stunning — it actually makes people hungry just looking at it."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Chef Adaeze Okoro</div><div class="test-role">Head Chef &amp; Owner · Savour Restaurant, Victoria Island Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"The reservation system has completely changed how we manage our evenings. We used to lose bookings every week to voicemail that never got returned. Now the bookings come in on the website overnight and we see them in the morning — already confirmed with the guest. Friday evenings are now fully booked two weeks in advance. I wish we had done this two years ago."</p>
      <div class="test-author">
        <div class="test-avatar">T</div>
        <div><div class="test-name">Tobi Akinwale</div><div class="test-role">Owner · The Pepper Pot, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Our private dining section was the best investment we made. Before the website, we had almost no corporate events. Six months after launch, private dining accounts for 40% of our weekend revenue — all from the enquiry form on the website. The i2Medier team understood exactly what a restaurant needs from a website, not just what looks nice."</p>
      <div class="test-author">
        <div class="test-avatar">N</div>
        <div><div class="test-name">Ngozi Dike</div><div class="test-role">General Manager · Mama's Kitchen, London &amp; Lagos</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free restaurant website audit —<br>see how much commission you're giving away</h2>
    <p>We will audit your current online presence, calculate how much you are paying in platform commissions monthly, identify your biggest ranking and conversion gaps, and show you exactly what a direct ordering system would recover. No commitment required.</p>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>restaurant website design in Nigeria</em></h2>
    </div>
    <p>A comprehensive guide to building a restaurant website that fills tables, drives direct orders, and ranks on Google — written for Nigerian food businesses in 2025.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for restaurants Nigeria">

      <h2>Why Nigerian restaurants need their own website in 2025</h2>
      <p>The restaurant industry in Nigeria is at an inflection point. Smartphone penetration has accelerated dramatically across Lagos, Abuja, Port Harcourt, and every major Nigerian city. Diners now research restaurants online before they choose where to eat — checking menus, reading reviews, looking at food photography, and often making reservations — all before they leave home. A restaurant without a website is invisible to this behaviour entirely.</p>
      <p>The strongest argument for a restaurant website in 2025 is not just visibility — it is revenue recapture. The commission model charged by Jumia Food, Bolt Food, and other third-party delivery platforms costs Nigerian restaurant owners between 25% and 30% of every order value. On a restaurant turning ₦2 million per month in delivery orders, that is ₦500,000–₦600,000 paid directly to a platform that owns your customer data, can de-list you without notice, and has no loyalty to your brand. A direct-ordering website ends that dependency permanently.</p>
      <p>Beyond commission savings, a well-built restaurant website with online reservations consistently fills more tables — capturing bookings at 2am when no staff are available to answer a phone — and builds the kind of customer relationship that delivery platforms cannot replicate. Your website knows your regular guests, promotes your loyalty programme, and positions your restaurant as the primary and preferred way to order.</p>

      <h2>The real cost of Jumia Food and Bolt Food commissions</h2>
      <p>Many Nigerian restaurant owners accept platform commissions as a fixed cost of doing business — an unavoidable price for reaching delivery customers. The numbers tell a different story. Consider a typical mid-sized restaurant in Victoria Island processing ₦1.5 million per month through Jumia Food at a 28% commission rate. That is ₦420,000 per month — ₦5,040,000 per year — handed to a platform that acquires your customers and charges you to reach them again.</p>
      <p>A restaurant website with a built-in Paystack ordering system eliminates this commission entirely. Every order placed directly through your website processes at Paystack's standard transaction fee (currently 1.5% + ₦100 capped at ₦2,000) — a fraction of the platform commission. The website typically pays for itself within 60–90 days purely from commission savings, before any consideration of new traffic from Google or increased reservation rates.</p>
      <p>The strategic advantage is compounding. As your website grows in Google rankings — served by good SEO and regular content updates — it brings in new customers who have never used a delivery platform, builds a direct email list of loyal guests, and creates a brand presence that is entirely within your control. Platform algorithms can bury your listing; a well-ranked website works for you indefinitely.</p>

      <h2>What makes a great restaurant website in 2025?</h2>
      <p>The best restaurant websites share a set of characteristics that distinguish them from generic business websites. Understanding these helps clarify what your restaurant website should achieve.</p>

      <h3>Appetite-triggering food photography at every touchpoint</h3>
      <p>The single most important element of a restaurant website is food photography. Humans are visually driven creatures — research consistently shows that high-quality, well-lit food photography increases both menu engagement and order conversion rates. A restaurant website where the food looks incredible generates more orders than one with mediocre photography, regardless of the quality of the actual food. Every great restaurant website is designed photography-first — the layouts, the proportions, the hero sections are all built to showcase beautiful food imagery at maximum visual impact. If your photography is not yet at that level, this is the first investment to make.</p>

      <h3>A digital menu that works on mobile</h3>
      <p>Over 80% of restaurant website visitors arrive on a mobile device. Your digital menu must be designed for that experience — fast-loading, clearly formatted, with categories that work as tabs rather than scrolling endlessly. Prices must be clear. Dietary labels (halal, gluten-free, vegan, spicy level) must be visible without hunting for them. Ideally, your menu photography should be integrated at every item — a thumbnail of the dish alongside its description triggers appetite and increases average order value. A menu that is painful to navigate on mobile loses orders in real time.</p>

      <h3>A reservation system that captures bookings 24/7</h3>
      <p>The dinner reservation moment often happens outside restaurant hours. A guest decides they want to celebrate a birthday at your restaurant on a Tuesday evening and goes online at 10:30pm to book. If your website offers a live reservation widget — date picker, time selector, party size, instant email confirmation — they book. If your website says "call us to reserve a table", they close the tab and book elsewhere. The mathematics are simple: a reservation widget captures bookings that would otherwise be lost entirely.</p>

      <h3>Food photography and visual appetite triggers</h3>
      <p>Food photography in Nigeria has matured significantly. Lagos now has a community of skilled food photographers who understand how to shoot dishes for digital — with the lighting, angles, and post-processing that makes food look irresistible online. Investing in a half-day food photography session (typically ₦80,000–₦200,000 in Lagos depending on the photographer) is the highest-ROI marketing investment most restaurants can make, when combined with a website designed to showcase those images at maximum impact.</p>

      <h2>SEO for restaurants in Nigeria</h2>
      <p>Restaurant SEO in Nigeria follows the same principles as all local SEO — but with some important specifics. The highest-value searches are location-specific and intent-driven: "restaurant victoria island", "fine dining abuja", "suya spot lekki", "birthday dinner venue lagos". These searches come from people who are ready to book — the conversion rate from this traffic is exceptionally high compared to most industries.</p>
      <p>The most important technical elements for restaurant SEO are: Restaurant schema markup (which tells Google your cuisine type, price range, opening hours, menu URL, and reservation URL), a fully claimed and optimised Google Business Profile (which drives local map pack rankings — the three results that appear above organic search), and individual pages for each cuisine type and dining occasion you offer. A page optimised for "private dining lagos" will rank for that search independently of your homepage, creating multiple entry points from Google.</p>

      <h2>Restaurant website pricing guide for Nigeria</h2>
      <p>Restaurant website costs in Nigeria vary considerably based on functionality. A minimal presence — homepage, basic menu, contact page — can be built for ₦200,000–₦350,000, but will lack the revenue-generating features that justify the investment. A fully-functional restaurant website with digital menu, online reservation widget, Paystack ordering, gallery, and private dining page — built on custom code with proper SEO — is typically priced from ₦400,000 to ₦850,000 depending on the number of menu items, locations, and complexity of the ordering system. For restaurant groups with multiple locations, loyalty programmes, or delivery management needs, bespoke pricing applies.</p>
      <p>The most useful framing for pricing is not the cost but the payback period. A restaurant spending ₦300,000 per month on delivery platform commissions, which recovers 50% of that spend to direct ordering within 90 days, has effectively paid for a ₦850,000 website in commission savings alone within five months — and every subsequent month of direct orders is pure margin recovery. No other marketing investment in Nigerian restaurants comes close to this return profile when properly executed.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website audit and proposal for your restaurant.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Audit →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why restaurant websites cost you money</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for restaurants</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about restaurant<br><em>website design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every restaurant has different needs. Email us and we will give you a direct, honest answer specific to your food business — no sales pressure, no commitment required.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">How much does a restaurant website cost in Nigeria?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Restaurant websites start from ₦400,000 for a professional site with a digital menu, reservation enquiry form, gallery, and SEO foundation. Full-featured websites with a live reservation widget, Paystack commission-free ordering, private dining pages, and advanced SEO start from ₦850,000. Multi-location restaurant group platforms are quoted individually based on scope. We provide a detailed, itemised quote after a free consultation — no hidden fees.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can my website take orders without paying commission to Jumia Food or Bolt Food?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Yes — this is one of the most powerful features we build for restaurant clients. Your website can include a full online ordering system powered by Paystack, where customers browse your menu, select items, choose delivery or collection, and pay directly to your bank account. You pay Paystack's standard transaction fee (1.5% + ₦100, capped at ₦2,000) — not 25–30% commission. Most restaurants recoup the full website cost from commission savings within 60–90 days.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">How long does it take to build a restaurant website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">A standard restaurant website with digital menu, reservation system, gallery, and ordering takes 3–5 weeks from design approval to launch. Larger sites for multi-location restaurant groups with custom loyalty programmes or delivery management systems may take 6–8 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Can I update the menu prices and add new dishes myself?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Yes — this is a core principle of every website we build for restaurants. We use a WordPress admin panel with ACF Pro to create intuitive editing interfaces for your menu items, prices, dietary labels, availability, special offers, and opening hours. Your staff can update any content without touching code. Every handover includes a CMS training session and a written admin guide covering every workflow your team needs.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Will my restaurant appear on Google Maps and local search?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Every restaurant website we build includes full Restaurant and LocalBusiness schema markup — telling Google your cuisine type, price range, opening hours, location coordinates, menu URL, and reservation link. We also optimise your Google Business Profile for local map pack rankings (the three restaurants shown above organic search results). For restaurants in competitive locations like Victoria Island or Ikeja GRA, we also offer ongoing local citation building as part of our monthly retainer.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Do you work with cafes, bars, and food trucks — not just restaurants?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">Yes. We build websites for the full range of food and hospitality businesses — fine dining restaurants, casual dining, fast food outlets, cafes and coffee shops, cocktail bars, suya spots, bakeries and patisseries, cloud kitchens, food trucks, and private dining venues. The scope and budget are calibrated to match the nature and size of your food business. A coffee shop has very different website requirements from a 120-seat fine dining restaurant, and we design each accordingly.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Can you build a website for a restaurant with locations in both Nigeria and the UK?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Yes — this is a speciality of ours. We work with Nigerian-origin restaurants operating in London, Manchester, Birmingham, and other UK cities alongside their Nigerian locations. We build dual-audience content strategies that serve both the Nigerian diaspora in the UK (searching in GBP, with UK-specific dietary expectations) and the Nigerian market at home — with separate location pages, menus, and ordering systems for each market from a single, unified website.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a restaurant website<br>that fills tables and cuts commissions?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We'll audit your current online presence, calculate your monthly commission exposure, and show you exactly what we'd build — and what it would recover.</p>
  <a href="{{ $startUrl }}" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
