@extends('public.layouts.app')

@section('title', 'Web Design for Hotels | Hotel Booking Website Design Nigeria | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Design', 'item' => route('site.services.web-design')],
        ['@type' => 'ListItem', 'position' => 4, 'name' => 'Hotel Web Design', 'item' => route('site.services.web-design.industry', ['industry' => 'hotel-website-design'])],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'How much does a hotel website cost in Nigeria?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Hotel websites start from ₦500,000 for a professional 8-page site with gallery, enquiry form, and basic SEO. Full-featured growth websites with individual room pages, direct booking engine integration, offers section, dining, and advanced SEO start from ₦1,000,000. Enterprise platforms with full booking management and loyalty integration are quoted individually. We provide a detailed, itemised quote after a free consultation — no hidden fees and no surprises.']],
        ['@type' => 'Question', 'name' => 'Can you integrate a direct booking engine into my hotel website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We integrate with leading hotel booking engines including Cloudbeds, Little Hotelier, Beds24, and SiteMinder, embedding the booking widget directly into your website so the guest experience is seamless. For smaller properties without a property management system, we can build a custom booking enquiry and reservation system with availability calendar, room selection, and email confirmation. The booking flow is styled to match your website\'s design throughout.']],
        ['@type' => 'Question', 'name' => 'How long does it take to build a hotel website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A standard hotel website with room pages, gallery, booking integration, and core content takes 3–5 weeks from design approval to launch. Larger hotel platforms with conferencing sections, loyalty programmes, and extensive content may take 5–8 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when — with no unexpected delays.']],
        ['@type' => 'Question', 'name' => 'Will my hotel website rank on Google above OTA listings?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Ranking above OTA platforms for generic terms like "hotels Lagos" is challenging because OTAs invest heavily in SEO and paid search. However, ranking above OTAs for specific, intent-rich searches — "boutique hotel Lagos Island", "hotel with pool Abuja", "corporate hotel near airport Lagos" — is very achievable with the right technical foundation and content strategy. Every website we build includes complete hotel SEO: LodgingBusiness schema, room page optimisation, local SEO, and Google Search Console setup from launch day.']],
        ['@type' => 'Question', 'name' => 'Do you build websites for boutique hotels and B&Bs as well as large hotels?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We work with properties of all sizes — from 8-room guest houses and boutique B&Bs to 200-room business hotels and resort complexes. The scope and budget are calibrated to the property\'s size, room inventory, and revenue goals. A boutique hotel has very different website requirements from a large conference hotel, and we design each accordingly — no one-size-fits-all approach.']],
        ['@type' => 'Question', 'name' => 'Can you integrate TripAdvisor and Google Reviews on the website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We integrate your TripAdvisor rating, certificate of excellence, and review count directly into the website — typically in the hero section, on room pages, and in the booking flow. Google Review scores are also displayed where relevant. These trust signals significantly improve direct booking conversion by giving undecided guests the social proof they need to book without seeking validation on an OTA platform first.']],
        ['@type' => 'Question', 'name' => 'Will I be able to update room rates, add special offers, and manage content myself?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — and this is essential for a hotel operator. We use Advanced Custom Fields Pro to create intuitive editing interfaces for your room descriptions, rates, gallery images, special offers, and event listings — all manageable from WordPress admin without touching any code. You can publish a new seasonal offer, update room pricing display, or add a new package within minutes. Every handover includes a CMS training session and a written admin guide covering every content workflow your reservations and marketing team will need.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/hotel-web-design.css')
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
      <span aria-current="page">Web Design for Hotels</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Hotel &amp; Hospitality Website Design</span>
    <h1>Hotel websites that drive<br><em>direct bookings</em><br>and cut OTA fees</h1>
    <p class="hero-sub">Every night you fill through Booking.com or Expedia, you hand 15–25% of your revenue to an intermediary. We build hotel websites that win direct bookings, own the guest relationship, and put that commission back where it belongs — in your pocket.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Hotel Audit →</a>
      <a href="#portfolio" class="btn-ghost">See Hotel Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Built for hospitality — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/></svg></span> Direct booking engine integration</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria &amp; UK specialists</span>
    </div>
  </div>

  <!-- Hotel website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/></svg></div>
        <div>
          <div class="float-notif-text">New booking enquiry · Deluxe Room · 3 nights</div>
          <div class="float-notif-sub">Lagos · just now</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">thelagosgrand.com.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">The Lagos <span>Grand</span></div>
            <div class="msn-links">
              <span class="msn-link">Rooms</span>
              <span class="msn-link">Dining</span>
              <span class="msn-link">Amenities</span>
              <span class="msn-link">Offers</span>
              <span class="msn-cta">Book Now</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Luxury Hotel · Lagos Island</div>
            <div class="msh-h1">Experience <span>Lagos</span><br>at its finest</div>
            <div class="msh-sub">Award-winning luxury in the heart of Lagos Island. Book direct for the best rate — guaranteed.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Book Direct &amp; Save</span>
              <span class="msh-btn-s">View Rooms →</span>
            </div>
          </div>
          <!-- Room cards -->
          <div class="mock-site-rooms">
            <div class="mss-label">Our Rooms &amp; Suites</div>
            <div class="mss-grid">
              <div class="mss-card">
                <div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M3 7v11"/><path d="M21 7v11"/><path d="M3 11h18"/><path d="M7 7V3"/><path d="M17 7V3"/><path d="M7 3h10"/></svg></div>
                <div class="mss-name">Deluxe Room</div>
                <div class="mss-price">₦45k/night</div>
              </div>
              <div class="mss-card">
                <div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M2 9V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v3"/><path d="M2 11v9"/><path d="M22 11v9"/><path d="M2 15h20"/><path d="M9 15v5"/><path d="M15 15v5"/></svg></div>
                <div class="mss-name">Executive Suite</div>
                <div class="mss-price">₦85k/night</div>
              </div>
              <div class="mss-card">
                <div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
                <div class="mss-name">Presidential</div>
                <div class="mss-price">₦150k/night</div>
              </div>
            </div>
          </div>
          <!-- Amenities strip -->
          <div class="mock-amenities">
            <div class="mock-amen-item">
              <span class="mock-amen-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 8v4l3 3"/></svg></span>
              <span>Pool</span>
            </div>
            <div class="mock-amen-item">
              <span class="mock-amen-ico"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><path d="M6 1v3"/><path d="M10 1v3"/><path d="M14 1v3"/></svg></span>
              <span>Restaurant</span>
            </div>
            <div class="mock-amen-item">
              <span class="mock-amen-ico"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg></span>
              <span>Conference</span>
            </div>
            <div class="mock-amen-item">
              <span class="mock-amen-ico"><svg viewBox="0 0 24 24"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1"/></svg></span>
              <span>Free WiFi</span>
            </div>
            <div class="mock-amen-item">
              <span class="mock-amen-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><path d="M9 9h.01"/><path d="M15 9h.01"/></svg></span>
              <span>Spa</span>
            </div>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">4<span>-Star</span></div><div class="mst-lbl">Rated</div></div>
            <div class="mst-item"><div class="mst-num">200<span>+</span></div><div class="mst-lbl">Rooms</div></div>
            <div class="mst-item"><div class="mst-num">Trip<span>Advisor</span></div><div class="mst-lbl">#2 Lagos</div></div>
            <div class="mst-item"><div class="mst-num">Est.<span>2008</span></div><div class="mst-lbl">Since</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "hotels Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Luxury Hotels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Boutique Hotels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Business Hotels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Resorts &amp; Spa</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Serviced Apartments</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Bed &amp; Breakfast</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Guest Houses</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Event Venues</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Airport Hotels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Extended Stay</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Luxury Hotels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Boutique Hotels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Business Hotels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Resorts &amp; Spa</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Serviced Apartments</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Bed &amp; Breakfast</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Guest Houses</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Event Venues</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Airport Hotels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Extended Stay</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most hotel websites<br><em>lose bookings</em> every night</h2>
    </div>
    <p>A prospective guest compares three hotels before making a booking decision. Within seconds they form an impression of your property's quality, value, and trustworthiness. If your website does not win that moment, the booking goes to Booking.com — along with up to 25% of the revenue. Here is what is going wrong on most Nigerian hotel websites, and what we do about it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 8v4l3 3"/></svg></span>
      <h3 class="prob-title">15–25% of revenue lost to OTA commissions every night</h3>
      <p class="prob-desc">Booking.com, Expedia, and Jumia Travel take up to 25% commission on every booking they generate. For a hotel doing ₦5M in revenue per month, that is ₦1.25M handed to intermediaries who own the guest relationship — not you. A great website breaks this dependency.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A direct booking engine integrated into your website with a best-rate guarantee — guests book directly, you keep 100% of the revenue, and you own the relationship for repeat stays.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Not found on Google when travellers search for hotels</h3>
      <p class="prob-desc">When someone searches "hotels Lagos Island" or "boutique hotel Abuja" your property does not appear. Instead, OTA listing pages dominate the results — and if a guest books through them, you pay the commission. Ranking your own website breaks this cycle permanently.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every hotel website we build is engineered to rank for hotel-specific search terms — location keywords, room types, and amenity combinations that target guests actively looking to book in your city.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></span>
      <h3 class="prob-title">Poor room photo presentation kills booking confidence</h3>
      <p class="prob-desc">Your rooms may be beautiful, but if your website displays small, pixelated images in a poorly designed gallery, guests cannot see the quality you offer. Booking decisions in hospitality are almost entirely visual — photography presentation is the conversion moment.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Full-bleed room galleries with lazy-loaded high-resolution images, virtual tour integration, and room showcase pages that match the visual standard guests expect from a premium hotel website.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/></svg></span>
      <h3 class="prob-title">No online booking engine — forcing guests back to OTAs</h3>
      <p class="prob-desc">If a guest finds your website through Google and wants to book, but there is no booking engine, they leave and book through Booking.com. You paid for the SEO or the ad that brought them to your site, then handed the booking — and the commission — to an intermediary.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A seamless direct booking integration — whether that is a third-party booking engine (Cloudbeds, Little Hotelier, Beds24) or a custom enquiry and reservation system — so guests can book the moment they are ready.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
      <h3 class="prob-title">Poor mobile experience loses the majority of travellers</h3>
      <p class="prob-desc">Over 70% of hotel searches in Nigeria happen on a mobile device — often while a traveller is already planning or in transit. If your website does not load quickly and work perfectly on a phone, you are losing the majority of your direct booking opportunity before the page even renders.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Mobile-first hotel website design with sub-2-second load times, touch-optimised galleries, and a booking flow designed for thumbs — not mouse clicks. Tested on real Android and iOS devices across network conditions.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span>
      <h3 class="prob-title">No TripAdvisor or guest reviews displayed on the website</h3>
      <p class="prob-desc">Travellers trust peer reviews more than any marketing copy. If your TripAdvisor rating, Google Reviews, and guest testimonials are not prominently displayed on your website, you are missing one of the most powerful conversion signals available to hospitality brands.</p>
      <div class="prob-solution"><strong>Our Fix</strong> TripAdvisor widget integration, Google Reviews display, and a dedicated guest testimonials section — with star ratings prominent on every key page to give hesitant guests the confidence to book direct.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your hotel<br>website <em>needs</em></h2>
      <p>A high-performing hotel website is not just a homepage and a contact number. It is a structured set of pages — each designed to serve a guest at a specific point in their decision journey, rank for hotel search terms in your location, and guide visitors seamlessly toward a direct booking.</p>
      <p>We map your rooms, amenities, dining, events, and local area to a comprehensive page architecture that works for Google, for international travellers, and for local corporate clients booking accommodation in your city.</p>
      <ul class="bullets">
        <li>Homepage — brand atmosphere, trust signals, and direct booking entry point</li>
        <li>Room &amp; Suite pages — individual pages per room category with full gallery and pricing</li>
        <li>Dining &amp; Restaurant — menu, ambience, and reservation information</li>
        <li>Amenities — pool, spa, gym, conference centre, airport transfer</li>
        <li>Events &amp; Conferencing — corporate packages and event hire</li>
        <li>Gallery — full-bleed photography showcasing the property</li>
        <li>Offers &amp; Packages — seasonal promotions, honeymoon packages, corporate rates</li>
        <li>Loyalty Programme — rewards for repeat direct guests</li>
        <li>About the Hotel — history, awards, accolades, location advantages</li>
        <li>Contact &amp; Directions — maps, airport distance, parking information</li>
      </ul>
      <a href="#contact" class="build-cta">Plan My Hotel Website →</a>
    </div>

    <!-- Pages wireframe visual -->
    <div class="pages-visual reveal" aria-hidden="true">
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Homepage</span><span class="pch-badge key">Booking Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Rooms &amp; Suites</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Dining</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Gallery</span><span class="pch-badge std">Visual Trust</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Offers &amp; Packages</span><span class="pch-badge key">Conversion</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Events &amp; Conferencing</span><span class="pch-badge key">Revenue</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>hotels &amp; hospitality</em></h2>
    </div>
    <p>Every hotel website we build is designed around the specific conversion patterns, visual requirements, and SEO landscape of the hospitality industry. These are not generic business website features — they are hotel-specific elements that directly determine whether a visiting guest makes a direct booking or clicks away to an OTA.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/></svg></div>
      <h3 class="svc-title">Direct Booking Engine Integration</h3>
      <p class="svc-desc">Seamless integration with leading hotel booking engines — Cloudbeds, Little Hotelier, Beds24, or SiteMinder — directly into your website. Guests check availability and book without leaving your site. A best-rate guarantee badge reinforces that direct is always the best deal, cutting OTA dependency from day one.</p>
      <div class="svc-tags"><span class="svc-tag">Cloudbeds</span><span class="svc-tag">Little Hotelier</span><span class="svc-tag">Beds24</span><span class="svc-tag">Custom Enquiry</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M3 7v11"/><path d="M21 7v11"/><path d="M3 11h18"/><path d="M7 7V3"/><path d="M17 7V3"/><path d="M7 3h10"/></svg></div>
      <h3 class="svc-title">Room &amp; Suite Showcase Pages</h3>
      <p class="svc-desc">Individual, SEO-optimised pages for every room category — Deluxe, Superior, Suite, Presidential, and more. Each page includes a full-bleed photo gallery, room dimensions, occupancy details, amenity list, pricing, and a direct booking button. These pages rank for specific searches like "suites Lagos Island" and "presidential suite Abuja hotel".</p>
      <div class="svc-tags"><span class="svc-tag">Full Gallery</span><span class="svc-tag">Amenity Lists</span><span class="svc-tag">Pricing Display</span><span class="svc-tag">Book Direct CTA</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></div>
      <h3 class="svc-title">Gallery &amp; Virtual Tour</h3>
      <p class="svc-desc">A professionally architected photo gallery with lazy-loading for fast performance, categorised by area — Rooms, Lobby, Pool, Dining, Events. Where available, 360-degree virtual tour integration lets guests explore the property before they arrive. Visual confidence is the single biggest driver of direct booking conversion in hospitality.</p>
      <div class="svc-tags"><span class="svc-tag">Lazy-Load Gallery</span><span class="svc-tag">360° Tour</span><span class="svc-tag">Category Filters</span><span class="svc-tag">WebP Images</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <h3 class="svc-title">TripAdvisor &amp; Review Integration</h3>
      <p class="svc-desc">Your TripAdvisor ranking, certificate of excellence, and Google Review score are displayed prominently across the website — on the homepage, on room pages, and in the booking flow. Travellers who see peer review signals displayed with confidence are significantly more likely to complete a direct booking rather than seeking validation on an OTA platform.</p>
      <div class="svc-tags"><span class="svc-tag">TripAdvisor Widget</span><span class="svc-tag">Google Reviews</span><span class="svc-tag">Star Ratings</span><span class="svc-tag">Guest Testimonials</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M20 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></div>
      <h3 class="svc-title">Offers &amp; Seasonal Promotions</h3>
      <p class="svc-desc">A dedicated offers and packages section — editable from the CMS without developer support — where you can publish seasonal rates, honeymoon packages, long-stay discounts, and corporate rate cards. Urgency mechanics (limited availability, expiry dates) and exclusive direct booking rates incentivise guests to book direct rather than through an OTA.</p>
      <div class="svc-tags"><span class="svc-tag">Seasonal Rates</span><span class="svc-tag">Corporate Packages</span><span class="svc-tag">Best Rate Guarantee</span><span class="svc-tag">CMS Managed</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">SEO for Hotel Keywords</h3>
      <p class="svc-desc">Title tags, meta descriptions, and content optimised for high-intent hotel search terms — "hotel Lagos", "luxury hotel Abuja", "hotel near airport Nigeria". LodgingBusiness and LocalBusiness schema markup for rich search results. Google Business Profile optimisation for map pack visibility. OTA sites rank because they invest in SEO — your hotel website needs to do the same.</p>
      <div class="svc-tags"><span class="svc-tag">Hotel Keywords</span><span class="svc-tag">LodgingBusiness Schema</span><span class="svc-tag">Local SEO</span><span class="svc-tag">Map Pack</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Hotels</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when travellers are<br>searching for <em>your hotel</em></h2>
      <p>The most important moment in hotel marketing is when a traveller opens Google and types "hotel Lagos Island" or "boutique hotel Abuja". OTA platforms invest millions in dominating these search results — then charge you commission for every booking they generate. Ranking your own website changes this economics permanently.</p>
      <p>We engineer hotel websites to compete with OTA listings in organic search. Your homepage, each room category page, your dining page, and your location content are all individually optimised for hotel-specific keyword combinations. We implement LodgingBusiness, Hotel, and LocalBusiness schema so Google understands your property, your star rating, your amenities, and your location context.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each room type and amenity category</li>
        <li>Location pages targeting every city, neighbourhood, and airport your guests search from</li>
        <li>LodgingBusiness + Hotel + LocalBusiness JSON-LD schema on every relevant page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Structured data for star ratings, check-in/check-out, amenities, and price range</li>
        <li>Long-tail keyword content targeting specific searches ("pet-friendly hotel Lagos", "hotel with pool Abuja")</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get a Hotel SEO Strategy →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Hotel — Keyword Rankings (before &amp; after)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">hotels lagos</span>
            <span class="kw-vol">12,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">luxury hotel abuja</span>
            <span class="kw-vol">4,200/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">hotel near me nigeria</span>
            <span class="kw-vol">8,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">boutique hotel lagos</span>
            <span class="kw-vol">2,600/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">hotel booking nigeria</span>
            <span class="kw-vol">5,400/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">serviced apartment lagos</span>
            <span class="kw-vol">3,100/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">hotel victoria island</span>
            <span class="kw-vol">2,400/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">resort abuja</span>
            <span class="kw-vol">1,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active hotel SEO campaign</div>
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
    <p>We have built websites for hotels and hospitality brands across Nigeria and the UK. These are the outcomes our clients consistently see after launching a properly built, SEO-optimised hotel website.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="420">0</span><span>%</span></div>
      <div class="trust-label">Average increase in direct bookings within 90 days of launching a properly optimised hotel website with booking engine integration</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="96">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) on our custom-built hotel websites — fast loading is essential for mobile travellers searching in the moment</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="5">0</span><span>×</span></div>
      <div class="trust-label">Increase in direct booking revenue reported by hotel clients within 6 months, compared to their OTA-dependent revenue split before the new website</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a fully launched hotel website — with milestone-based delivery and a guaranteed timeline agreed in writing</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Professional hospitality and service brand websites delivered across Nigeria, the UK, the US, and Canada — all custom code, no templates</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
      <div class="trust-num">100<span>%</span></div>
      <div class="trust-label">Client code ownership on delivery — every file, every database, every credential transferred to you unconditionally at project handover</div>
    </div>
  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section class="process-section" aria-labelledby="process-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Process</span>
      <h2 class="s-head" id="process-heading">From brief to live hotel<br>website in <em>six structured steps</em></h2>
    </div>
    <p>We have delivered websites for hotels, serviced apartments, and hospitality brands across Nigeria and the UK. This process eliminates the delays, missed briefs, and launch-day surprises that make most web projects frustrating for busy hotel operators.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery &amp; Property Audit</div>
      <p class="proc-desc">A structured discovery session covering your property's room inventory, target guest profile, competitive set, OTA arrangements, and direct booking goals. We audit your current website, your Google presence, your TripAdvisor standing, and your current booking sources. We map your complete site architecture — every page, every room category, every keyword target — before any design work begins.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Property Audit</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Keyword Map</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Visual Design — Luxury Full-Bleed Photography Layouts</div>
      <p class="proc-desc">High-fidelity page designs in Figma built around your property photography — desktop and mobile — for all key pages. Hotel web design is visual first: your hero images, room galleries, and dining photography are laid out to maximise the emotional impact that drives booking confidence. Two revision rounds are included. You approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">Photo Integration</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build — Booking Engine Integration &amp; Fast Image Delivery</div>
      <p class="proc-desc">Your website is built on a custom WordPress theme — no page builders — with your booking engine integrated directly into the reservation flow. Room imagery is served as WebP at optimised sizes across breakpoints, ensuring sub-2-second load times even on high-resolution photography. A staging environment is accessible throughout so you can review progress.</p>
      <div class="proc-tags"><span class="proc-tag">Custom WordPress</span><span class="proc-tag">Booking Engine API</span><span class="proc-tag">WebP Images</span><span class="proc-tag">Staging Access</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO &amp; Content</div>
      <p class="proc-desc">All content is entered and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, LodgingBusiness and LocalBusiness schema markup, canonical URLs, XML sitemap, and Google Search Console submission. Each room page, amenity page, and location page is individually optimised for the specific keyword combinations your target guests use when searching. Google Analytics 4 is installed with booking goal tracking configured.</p>
      <div class="proc-tags"><span class="proc-tag">Schema Markup</span><span class="proc-tag">Room Page SEO</span><span class="proc-tag">GA4 Booking Goals</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA &amp; Launch</div>
      <p class="proc-desc">Cross-browser and cross-device quality assurance, PageSpeed audit targeting 90+ on mobile, booking engine test reservations, gallery performance testing, form submission verification, and a final review call before launch day. SSL is verified, Cloudflare is configured for CDN delivery of images, and your domain is live. You receive a CMS training session and a 30-day post-launch support window.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA</span><span class="proc-tag">Booking Test</span><span class="proc-tag">CDN Setup</span><span class="proc-tag">Go-Live</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly SEO Retainer &amp; Maintenance</div>
      <p class="proc-desc">After launch, a monthly retainer drives ongoing rankings and keeps your site performing — publishing local area content and travel guides that capture planning-phase searches, building citations on travel and tourism directories, monitoring Core Web Vitals, running daily backups, publishing seasonal offers, and delivering monthly keyword ranking and direct booking analytics reports.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Content Publishing</span><span class="proc-tag">Offers Updates</span><span class="proc-tag">Booking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Hotel websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the property's room inventory, guest profile, and direct booking objectives.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--hotel-dk) 0%,var(--hotel) 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">The Lagos Grand</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">4-Star Business Hotel</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">200 Rooms</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Restaurant</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Conference</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">4-Star Business Hotel</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Business Hotel · Lagos Island, Nigeria</div>
        <div class="port-title">The Lagos Grand</div>
        <p class="port-desc">Full hotel website with room showcase pages for 4 room categories, dining and conferencing sections, direct booking engine integration, and an SEO campaign that reached page one for "business hotel Lagos Island" within 60 days — reducing OTA dependency by 38%.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a0e05 0%,#3d2010 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Kano Suites</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Boutique Hotel · Kano</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">32 Rooms</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Pool</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Spa</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Boutique Hotel</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Boutique Hotel · Kano, Nigeria</div>
        <div class="port-title">Kano Suites</div>
        <p class="port-desc">Boutique hotel website with immersive full-bleed photography, a curated gallery section, TripAdvisor integration, direct booking enquiry form, and a seasonal offers module — ranking for "boutique hotel Kano" and "hotel with pool Kano" within 90 days of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a1628 0%,#1a3050 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Heritage House Hotel</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Boutique Hotel · London + Lagos</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">40 Rooms</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Bar</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Events</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">London + Lagos</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Independent Hotel · London, United Kingdom</div>
        <div class="port-title">Heritage House Hotel</div>
        <p class="port-desc">Independent boutique hotel website serving both UK and Nigerian diaspora audiences — with dual-market content strategy, Little Hotelier booking engine integration, events and private dining sections, and local SEO targeting central London neighbourhood searches.</p>
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
    <p>Not all hotel website options are equal — especially when direct bookings and OTA commission savings are the measure of success.</p>
  </div>
  <div class="compare-wrap"><table class="compare-table reveal" role="table" aria-label="Web design comparison for hotels">
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
        <td class="feature">Built specifically for hotel direct bookings</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Hospitality-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Booking engine API integration</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Limited / generic</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full API integration</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely done correctly</span></td>
      </tr>
      <tr>
        <td class="feature">Mobile PageSpeed score 90+</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Typically 40–65</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Guaranteed target</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely achieved</span></td>
      </tr>
      <tr>
        <td class="feature">LodgingBusiness schema &amp; hotel SEO</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">TripAdvisor &amp; review integration</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Plugin only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Custom integrated</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Hit or miss</span></td>
      </tr>
      <tr>
        <td class="feature">High-res gallery with WebP + CDN delivery</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Compressed, slow</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Always included</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely optimised</span></td>
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
  <h2 class="s-head" id="test-heading">What hotel owners say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"We were giving Booking.com nearly 22% on every reservation they sent us. After launching the new website with the direct booking engine, our direct share went from 12% to over 40% in four months. The commission savings alone paid for the website many times over."</p>
      <div class="test-author">
        <div class="test-avatar">S</div>
        <div><div class="test-name">Seun Adeyemi</div><div class="test-role">General Manager · The Lagos Grand, Lagos Island</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"My boutique hotel's old website was a template from 2019. The photography looked terrible, there was no way to book online, and we ranked on page four for any search term. The new website looks beautiful, loads instantly, and within three months we were appearing on page one for boutique hotel searches in our city."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Amaka Obi</div><div class="test-role">Proprietor · Kano Suites, Kano</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"We operate across two markets — London guests and Nigerian diaspora visitors — and the team understood both audiences without us having to explain it. The Little Hotelier integration works flawlessly, our events section generates real corporate enquiries, and we finally rank on Google without paying Expedia to be found."</p>
      <div class="test-author">
        <div class="test-avatar">B</div>
        <div><div class="test-name">Bashir Musa</div><div class="test-role">Director · Heritage House Hotel, London</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free hotel website audit — see<br>how much OTA commission you could save</h2>
    <p>We will review your current site, calculate your estimated annual OTA commission spend, identify your ranking gaps, and show you exactly what a new website would fix. No commitment required.</p>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>hotel website design in Nigeria</em></h2>
    </div>
    <p>A comprehensive guide to building a hotel website that wins direct bookings, reduces OTA commission dependency, and ranks on Google — written for Nigerian and UK hospitality operators.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for hotels Nigeria">

      <h2>Why Nigerian hotels need direct booking websites in 2025</h2>
      <p>The Nigerian hotel industry is caught in a commission trap. Booking.com, Expedia, Hotels.ng, and Jumia Travel generate a significant share of room nights for Nigerian hotels — but at a cost that few operators fully appreciate until they do the arithmetic. At 15–25% commission per booking, a hotel generating ₦10 million in monthly revenue through OTA channels is paying up to ₦2.5 million per month to intermediaries who own the guest data, control the guest relationship, and set the pricing rules.</p>
      <p>A professionally designed hotel website with a direct booking engine is the most effective tool for breaking this dependency. When a guest books directly through your website, you receive 100% of the room revenue, you own the guest's contact information for future marketing, you control the pre-arrival communication, and you build the relationship that drives repeat stays without further commission costs.</p>
      <p>The investment in a great hotel website typically pays for itself within the first two to three months of launch through commission savings alone — before accounting for the value of owning the guest database and the organic search traffic that continues to compound month after month.</p>

      <h2>The real cost of OTA commission dependency</h2>
      <p>Most hotel operators know they pay commissions to OTA platforms, but few have calculated the full annual cost. Consider a medium-sized hotel with 60 rooms in Lagos, running at 65% average occupancy with an average daily rate of ₦35,000. Monthly revenue is approximately ₦40 million. If 50% of bookings come through OTA channels at an average 20% commission, that is ₦4 million per month — or ₦48 million per year — paid to Booking.com, Expedia, and similar platforms.</p>
      <p>A well-built hotel website with direct booking capability, a best-rate guarantee, and an effective SEO strategy can shift that booking mix significantly. Hotels that invest properly in their direct channel typically see OTA bookings drop to 30–40% of total volume within 12 months, while direct bookings and corporate channel bookings grow to fill the gap — with no commission cost attached.</p>
      <p><strong>The question is not whether you can afford a professional hotel website. It is whether you can afford to continue without one.</strong></p>

      <h2>What makes a great hotel website?</h2>
      <p>The best hotel websites share a set of characteristics that distinguish them from generic business websites. Understanding these helps clarify what you should be asking for when commissioning a new site — and why a generic web agency without hospitality experience often produces results that look professional but fail to convert.</p>

      <h3>Immersive, high-quality photography at full resolution</h3>
      <p>Hotel booking decisions are driven more by visuals than by any other factor. A guest compares three hotels online and makes an emotional decision within seconds based on the atmosphere, quality, and appeal of the photography. If your images are small, compressed, poorly lit, or presented in a cluttered layout, the emotional signal they send is negative — regardless of how good your property actually is.</p>
      <p>Every hotel website we build is designed around full-bleed, high-resolution photography served via WebP compression and CDN delivery for fast loading. Room gallery pages allow guests to see every angle of every room category before they commit. This visual confidence is the single largest driver of direct booking conversion.</p>

      <h3>Seamless direct booking integration</h3>
      <p>A guest who finds your website through Google and wants to book should be able to check availability, select dates, and confirm their reservation without leaving your website. If the booking process redirects them to an OTA interface or a third-party page that looks and feels different from your website, you lose trust — and often the booking itself.</p>
      <p>We integrate with leading hotel booking engines — Cloudbeds, Little Hotelier, Beds24, SiteMinder — or build custom enquiry and reservation systems for smaller properties. The booking flow is styled to match your website's brand identity, the best-rate guarantee is prominent throughout, and the checkout is optimised for mobile completion.</p>

      <h3>Individual room category pages optimised for SEO</h3>
      <p>Most hotel websites have a single "Rooms" page that lists all room types in a brief summary. This is a significant missed SEO opportunity. Travellers search specifically — "executive suite Lagos hotel", "room with pool view Abuja", "king room hotel Victoria Island" — and these searches deserve individual landing pages that rank for the exact terms your prospective guests use.</p>
      <p>We build individual pages for every room category with full gallery, amenity list, occupancy details, pricing guidance, and a direct booking button. Each page is separately optimised for its specific keyword cluster, creating multiple entry points from Google into your booking flow.</p>

      <h2>SEO for hotels in Nigeria — ranking above the OTAs</h2>
      <p>OTA platforms — Booking.com, Expedia, Hotels.ng — invest millions in SEO and paid search to dominate hotel search results. Competing with them directly for broad terms like "hotels in Lagos" is difficult. But ranking above them for specific, intent-rich searches is achievable with the right technical foundation and content strategy.</p>
      <p>High-priority keyword categories for Nigerian hotel websites include:</p>
      <ul>
        <li><strong>Location + hotel type:</strong> "boutique hotel Lagos Island", "business hotel Abuja", "luxury hotel Victoria Island"</li>
        <li><strong>Neighbourhood searches:</strong> "hotel Lekki Phase 1", "hotel Maitama Abuja", "hotel GRA Port Harcourt"</li>
        <li><strong>Amenity searches:</strong> "hotel with pool Lagos", "hotel with gym Abuja", "hotel with conference room Nigeria"</li>
        <li><strong>Room type searches:</strong> "presidential suite Lagos", "suite with jacuzzi Nigeria", "family room hotel Abuja"</li>
        <li><strong>Event searches:</strong> "wedding venue hotel Lagos", "conference hotel Abuja", "meeting room hotel Nigeria"</li>
      </ul>
      <p>We implement LodgingBusiness, Hotel, and LocalBusiness schema markup so Google understands your property's star rating, check-in and check-out times, amenities, price range, and exact location. This structured data helps your website appear in hotel-specific rich results and Google's hotel search features.</p>

      <h2>Photography and the hotel booking decision</h2>
      <p>Research consistently shows that travellers view an average of six to eight photographs of a hotel before making a booking decision. The quality, presentation, and comprehensiveness of your photography directly determines whether that decision goes in your favour. Poor photography is the single most common reason high-quality Nigerian hotels fail to win direct bookings online — the property is excellent, but the digital presentation does not communicate it.</p>
      <p>If your photography is outdated or limited, we can recommend professional hospitality photographers who work in Lagos, Abuja, and Port Harcourt. Investing in a professional photography session is one of the highest-return activities available to any hotel seeking to improve direct booking conversion — and the images can be used across your website, Google Business Profile, OTA listings, and social media simultaneously.</p>

      <h2>How much does a hotel website cost in Nigeria?</h2>
      <p>Hotel website pricing depends on the scope of the project — the number of room categories, the complexity of the booking integration, the volume of content pages, and the level of SEO work required. As a general guide for the Nigerian market:</p>
      <ul>
        <li><strong>Essential site</strong> (8 pages, enquiry form, gallery, basic SEO): ₦500,000–₦750,000</li>
        <li><strong>Growth website</strong> (full room pages, booking engine, offers, dining, events, TripAdvisor integration, advanced SEO): ₦1,000,000–₦1,800,000</li>
        <li><strong>Enterprise platform</strong> (full booking management, loyalty system, multi-property, custom integrations): ₦2,500,000+</li>
      </ul>
      <p>The return on investment for a properly built hotel website is typically measured in months, not years. A hotel that reduces its OTA commission share from 50% to 30% of total bookings, on a monthly revenue base of ₦20 million, saves ₦800,000 per month in commission fees alone — meaning the website pays for itself within the first one to two months of operation. The SEO traffic then continues to compound, and the savings accumulate indefinitely.</p>

      <h2>Why choose i2Medier for your hotel website?</h2>
      <p>We understand hospitality. We know that your peak season, your occupancy targets, and your revenue per available room matter more than how a website looks in a portfolio screenshot. Every hotel website we build is judged against one primary metric: does it drive more direct bookings at lower cost than your current approach?</p>
      <p>We are Nigeria and UK specialists — we understand the Nigerian hospitality market, the OTA landscape in West Africa, the mobile behaviour of Nigerian travellers, and the technical requirements of Google's Nigerian search index. We also serve UK-based hospitality clients, which means we can build dual-market websites for properties serving both international and diaspora audiences from a single, well-structured platform.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to cut OTA costs?</h4>
        <p>Get a free hotel website audit and commission savings estimate — no commitment required.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Audit →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why hotels lose direct bookings</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for hotels Nigeria</a></li>
          <li><a href="#process-heading" class="toc-link">Our process (6 steps)</a></li>
          <li><a href="#pricing" class="toc-link">Pricing</a></li>
          <li><a href="#faq-heading" class="toc-link">FAQ</a></li>
          <li><a href="#contact" class="toc-link">Get a free audit</a></li>
        </ul>
      </nav>
    </aside>

  </div>
</section>

<!-- ═══ FAQ ═══ -->
<section aria-labelledby="faq-heading">
  <span class="s-label">FAQ</span>
  <h2 class="s-head" id="faq-heading">Questions about hotel<br><em>website design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every hotel is different. Email us and we'll give you a direct, honest answer specific to your property — no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">How much does a hotel website cost in Nigeria?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Hotel websites start from ₦500,000 for a professional 8-page site with gallery, enquiry form, and basic SEO. Full-featured growth websites with individual room pages, direct booking engine integration, offers section, dining, and advanced SEO start from ₦1,000,000. Enterprise platforms with full booking management and loyalty integration are quoted individually. We provide a detailed, itemised quote after a free consultation — no hidden fees and no surprises.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can you integrate a direct booking engine into my hotel website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Yes. We integrate with leading hotel booking engines including Cloudbeds, Little Hotelier, Beds24, and SiteMinder, embedding the booking widget directly into your website so the guest experience is seamless. For smaller properties without a property management system, we can build a custom booking enquiry and reservation system with availability calendar, room selection, and email confirmation. The booking flow is styled to match your website's design throughout.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">How long does it take to build a hotel website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">A standard hotel website with room pages, gallery, booking integration, and core content takes 3–5 weeks from design approval to launch. Larger hotel platforms with conferencing sections, loyalty programmes, and extensive content may take 5–8 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when — with no unexpected delays.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Will my hotel website rank on Google above OTA listings?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Ranking above OTA platforms for generic terms like "hotels Lagos" is challenging because OTAs invest heavily in SEO and paid search. However, ranking above OTAs for specific, intent-rich searches — "boutique hotel Lagos Island", "hotel with pool Abuja", "corporate hotel near airport Lagos" — is very achievable with the right technical foundation and content strategy. Every website we build includes complete hotel SEO: LodgingBusiness schema, room page optimisation, local SEO, and Google Search Console setup from launch day.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Do you build websites for boutique hotels and B&amp;Bs as well as large hotels?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes. We work with properties of all sizes — from 8-room guest houses and boutique B&amp;Bs to 200-room business hotels and resort complexes. The scope and budget are calibrated to the property's size, room inventory, and revenue goals. A boutique hotel has very different website requirements from a large conference hotel, and we design each accordingly — no one-size-fits-all approach.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Can you integrate TripAdvisor and Google Reviews on the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">Yes. We integrate your TripAdvisor rating, certificate of excellence, and review count directly into the website — typically in the hero section, on room pages, and in the booking flow. Google Review scores are also displayed where relevant. These trust signals significantly improve direct booking conversion by giving undecided guests the social proof they need to book without seeking validation on an OTA platform first.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Will I be able to update room rates, add special offers, and manage content myself?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Yes — and this is essential for a hotel operator. We use Advanced Custom Fields Pro to create intuitive editing interfaces for your room descriptions, rates, gallery images, special offers, and event listings — all manageable from WordPress admin without touching any code. You can publish a new seasonal offer, update room pricing display, or add a new package within minutes. Every handover includes a CMS training session and a written admin guide covering every content workflow your reservations and marketing team will need.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to win direct bookings<br>and cut your OTA commission?</h2>
  <p>Get a free, no-obligation hotel website audit and proposal. We'll review your current site, calculate your OTA commission cost, and show you exactly what a new website would change — and what the financial case looks like.</p>
  <a href="{{ $startUrl }}" class="btn-dark">Get Your Free Hotel Audit →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
