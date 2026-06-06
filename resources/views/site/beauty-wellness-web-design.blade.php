@extends('public.layouts.app')

@section('title', 'Web Design for Beauty Salons & Wellness Brands | Salon Website Design Nigeria | i2Medier')

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/beauty-wellness-web-design.css')
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
      <span aria-current="page">Beauty & Wellness Web Design</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Beauty & Wellness Website Design</span>
    <h1>Websites that attract premium clients to your<br><em>beauty brand</em></h1>
    <p class="hero-sub">We build premium, brand-led websites for beauty salons, spas, wellness centres, lash studios, skincare brands, and MedSpas across Nigeria and the UK — with online booking, stunning service menus, and the visual positioning that draws in high-value clients.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Beauty Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Premium brand aesthetics — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></span> Online booking integration</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria & UK specialists</span>
    </div>
  </div>

  <!-- Beauty website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></div>
        <div>
          <div class="float-notif-text">New booking · Lash Extension · Saturday 2pm</div>
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
            <span class="mock-url-text">lumierebeautystudio.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Lumière <span>Beauty Studio</span></div>
            <div class="msn-links">
              <span class="msn-link">Services</span>
              <span class="msn-link">Book</span>
              <span class="msn-link">Gallery</span>
              <span class="msn-link">About</span>
              <span class="msn-link">Shop</span>
              <span class="msn-link">Contact</span>
              <span class="msn-cta">Book Now</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Lash · Skincare · Hair · Nails · Body</div>
            <div class="msh-h1">Beauty That <span>Speaks for Itself</span></div>
            <div class="msh-sub">Premium beauty services in Lagos Island. Book your appointment online in seconds.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Book Your Appointment</span>
              <span class="msh-btn-s">View Services →</span>
            </div>
          </div>
          <!-- Services -->
          <div class="mock-site-services">
            <div class="mss-label">Our Services</div>
            <div class="mss-grid">
              <div class="mss-card">
                <div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg></div>
                <div class="mss-name">Lash Extensions</div>
                <div class="mss-price">₦18,000</div>
              </div>
              <div class="mss-card">
                <div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M12 22C6.5 22 2 17.5 2 12S6.5 2 12 2s10 4.5 10 10-4.5 10-10 10z"/><path d="M12 8v8"/><path d="M8 12h8"/></svg></div>
                <div class="mss-name">Skincare Facial</div>
                <div class="mss-price">₦22,000</div>
              </div>
              <div class="mss-card">
                <div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div>
                <div class="mss-name">Hair Styling</div>
                <div class="mss-price">₦15,000</div>
              </div>
              <div class="mss-card">
                <div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" y1="1" x2="6" y2="4"/><line x1="10" y1="1" x2="10" y2="4"/><line x1="14" y1="1" x2="14" y2="4"/></svg></div>
                <div class="mss-name">Nail Art</div>
                <div class="mss-price">₦8,500</div>
              </div>
              <div class="mss-card">
                <div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
                <div class="mss-name">Body Treatment</div>
                <div class="mss-price">₦25,000</div>
              </div>
              <div class="mss-card">
                <div class="mss-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg></div>
                <div class="mss-name">Book Online</div>
                <div class="mss-price" style="color:#c8a96e">24/7 Open</div>
              </div>
            </div>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">5<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">5-Star Rated</div></div>
            <div class="mst-item"><div class="mst-num">2k<span>+</span></div><div class="mst-lbl">Clients</div></div>
            <div class="mst-item"><div class="mst-num" style="font-size:.55rem;letter-spacing:-.01em">Premium</div><div class="mst-lbl">Products</div></div>
            <div class="mst-item"><div class="mst-num" style="font-size:.55rem;letter-spacing:-.01em">Book</div><div class="mst-lbl">Online</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "lash studio Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Beauty Salons</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Hair Salons & Barbers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Spa & Wellness Centres</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Skincare & Aesthetics Clinics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Nail Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Lash & Brow Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> MedSpa Clinics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Massage Therapy</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Wellness Retreats</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Beauty Product Brands</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Beauty Salons</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Hair Salons & Barbers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Spa & Wellness Centres</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Skincare & Aesthetics Clinics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Nail Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Lash & Brow Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> MedSpa Clinics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Massage Therapy</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Wellness Retreats</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Beauty Product Brands</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most beauty businesses<br>are <em>losing clients online</em></h2>
    </div>
    <p>Your work is exceptional — your Instagram shows it. But a potential client who has never heard of you will find your website before they find your Instagram. Within seconds they judge your brand, your pricing tier, and whether you are the kind of studio that can deliver what they want. Here is what is going wrong, and what we do to fix it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
      <h3 class="prob-title">Losing clients to competitors with more polished digital presence</h3>
      <p class="prob-desc">A client searching for a lash studio in Lagos opens three tabs. They book the one that looks the most professional online — regardless of who actually does the best work. Brand perception is decided by your website before a single treatment takes place.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Premium brand-led design that immediately communicates luxury, quality, and expertise — positioning you as the obvious choice for high-value clients in your area.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></span>
      <h3 class="prob-title">No online booking — clients have to DM or call to schedule</h3>
      <p class="prob-desc">Every client who has to send a DM or make a phone call to book is a client you risk losing. Forty percent of beauty bookings happen outside business hours. If you cannot capture them at that moment, they book somewhere else.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Fully integrated online booking with real-time availability, deposit collection, automated reminders, and cancellation management — working for you around the clock.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg></span>
      <h3 class="prob-title">Service menu only on Instagram Stories — gone in 24 hours</h3>
      <p class="prob-desc">Pricing and service information buried in Instagram Stories or scattered across captions is impossible for clients to find when they actually want to book. It also signals a business that has not invested in its own professional infrastructure.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A permanent, beautifully structured service menu with individual treatment pages, full pricing, durations, descriptions, and direct booking CTAs on every service.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M12 22C6.5 22 2 17.5 2 12S6.5 2 12 2s10 4.5 10 10-4.5 10-10 10z"/><path d="M12 8v4"/><path d="M12 16h.01"/></svg></span>
      <h3 class="prob-title">Poor brand presentation vs the quality of your actual work</h3>
      <p class="prob-desc">Your skills are world-class but your website looks like it was built in an afternoon. The disconnect between your quality of work and your digital presence actively costs you premium clients who judge expertise by presentation.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A custom-designed website that matches the luxury level of your services — elegant typography, curated colour palette, and a visual experience that reflects your actual brand positioning.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Not appearing on Google when clients search locally</h3>
      <p class="prob-desc">When someone searches "lash studio Victoria Island" or "spa near me Lagos", your business does not appear. Every day you are invisible on Google is another day those high-intent, ready-to-book clients go straight to a competitor.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Full local SEO foundation — Google Business Profile optimisation, BeautySalon schema markup, location-specific service pages, and citation building targeting your exact geography and treatments.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span>
      <h3 class="prob-title">No client testimonials or before-and-after showcase</h3>
      <p class="prob-desc">Social proof is the single most powerful conversion tool for beauty businesses. If your website has no testimonials, no reviews, and no before-and-after gallery, prospective clients have no evidence to trust that you will deliver the results they want.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Dedicated before-and-after gallery with consent-managed photo uploads, integrated Google review display, and testimonial sections on every key service page.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your beauty<br>business website <em>needs</em></h2>
      <p>A high-converting beauty website is not a homepage with a contact form. It is a structured, strategic digital platform — each page designed to serve a different type of client at a different point in their decision journey, and each optimised to rank for the search terms your future clients use when they are ready to book.</p>
      <p>We map your treatments, service categories, brand story, team, and geographic location to a comprehensive page architecture that works for both Google and the clients you want to attract.</p>
      <ul class="bullets">
        <li>Homepage with booking CTA — your brand story and clearest path to appointment</li>
        <li>Service menu pages per treatment category (Lash, Hair, Nails, Skincare, Body, etc.)</li>
        <li>Individual treatment pages with prices, duration, process, and direct booking</li>
        <li>Online booking system — real-time availability, deposits, and automated reminders</li>
        <li>Gallery — before-and-after showcase with consent-managed photo management</li>
        <li>About & team profiles — your story, credentials, and the faces behind your brand</li>
        <li>Products & retail — if you sell skincare or beauty products direct</li>
        <li>Gift vouchers — sell experiences as gifts, directly from your website</li>
        <li>Beauty blog — SEO content for long-term organic growth</li>
        <li>Contact & location — with Google Maps, parking information, and direct booking</li>
      </ul>
      <a href="#contact" class="build-cta">Plan My Website Architecture →</a>
    </div>

    <!-- Pages wireframe visual -->
    <div class="pages-visual reveal" aria-hidden="true">
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Homepage</span><span class="pch-badge key">Booking CTA</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Service Menu</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Lash Extensions</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Gallery</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Gift Vouchers</span><span class="pch-badge key">Revenue</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Beauty Blog</span><span class="pch-badge key">SEO Engine</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>beauty businesses</em></h2>
    </div>
    <p>Every beauty and wellness website we build is designed around the specific trust signals, booking conversion patterns, and visual standards of the beauty industry. These are not generic business website features — they are beauty-specific elements with a direct impact on whether a browsing client books an appointment or clicks away.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg></div>
      <h3 class="svc-title">Online Booking System</h3>
      <p class="svc-desc">Real-time appointment scheduling integrated directly into your website — with service selection, staff selection, deposit payment, automated confirmation emails, and SMS reminders. Clients can book at 2am on a Sunday and your calendar is updated instantly. Reduces no-shows by up to 70% with automated reminders.</p>
      <div class="svc-tags"><span class="svc-tag">Real-Time Availability</span><span class="svc-tag">Deposits</span><span class="svc-tag">SMS Reminders</span><span class="svc-tag">Cancellation Policy</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
      <h3 class="svc-title">Service Menu & Treatment Pages</h3>
      <p class="svc-desc">Individual pages for every treatment you offer — with pricing, session duration, preparation advice, contraindications, and a direct booking button. Structured to rank for treatment-specific searches ("lash lift Lagos", "HydraFacial Abuja") and convert interested browsers into confirmed bookings.</p>
      <div class="svc-tags"><span class="svc-tag">Treatment Pages</span><span class="svc-tag">Pricing Display</span><span class="svc-tag">Duration & FAQs</span><span class="svc-tag">Book Now CTA</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg></div>
      <h3 class="svc-title">Before & After Gallery Showcase</h3>
      <p class="svc-desc">A curated before-and-after gallery that showcases your best work — filterable by treatment type so clients can find results relevant to exactly what they want. Consent-managed photo upload workflow so your team can add new work from the phone. This is your most powerful conversion tool and it deserves to be beautiful.</p>
      <div class="svc-tags"><span class="svc-tag">Before & After</span><span class="svc-tag">Filter by Treatment</span><span class="svc-tag">Consent Managed</span><span class="svc-tag">Instagram Link</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
      <h3 class="svc-title">Brand-Led Visual Design</h3>
      <p class="svc-desc">Your website is designed around your brand identity — not a generic template. We work with your existing brand colours, typography, and tone of voice, or develop a full brand identity alongside your website. The result is a digital experience that feels unmistakably yours and positions you precisely in the luxury, accessible-luxury, or mass-market tier you target.</p>
      <div class="svc-tags"><span class="svc-tag">Custom Brand Design</span><span class="svc-tag">Luxury Aesthetics</span><span class="svc-tag">Font & Colour System</span><span class="svc-tag">Mobile-First</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">Google Business Profile & Local SEO</h3>
      <p class="svc-desc">BeautySalon, NailSalon, HairSalon, and HealthAndBeautyBusiness schema markup so Google understands exactly what you offer. Google Business Profile fully optimised with photos, services, opening hours, and review solicitation strategy. Location-specific pages targeting your city, district, and neighbourhood for map pack rankings.</p>
      <div class="svc-tags"><span class="svc-tag">Beauty Schema</span><span class="svc-tag">Map Pack Rankings</span><span class="svc-tag">GBP Optimisation</span><span class="svc-tag">Local Citations</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></div>
      <h3 class="svc-title">Beauty Blog & SEO Content Strategy</h3>
      <p class="svc-desc">A fully managed beauty blog covering skincare guides, treatment FAQs, aftercare advice, trend content, and local lifestyle features — each article an additional SEO landing page building topical authority in the beauty space. Long-term organic traffic that compounds over time and brings in clients who are already educated and ready to book.</p>
      <div class="svc-tags"><span class="svc-tag">WordPress CMS</span><span class="svc-tag">SEO Articles</span><span class="svc-tag">Aftercare Guides</span><span class="svc-tag">Newsletter Signup</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Beauty Businesses</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when clients are<br>searching for <em>your treatments</em></h2>
      <p>The most important moment in a beauty client's journey is when they open Google and search "lash studio Lagos" or "spa near me Abuja." If you are not on the first page, you do not exist. Every website we build for beauty and wellness businesses is engineered to rank for the exact treatments your ideal clients search for — and in the exact locations where you operate.</p>
      <p>We build search visibility into the architecture of your site from day one. Your homepage, each treatment category page, individual service pages, your location pages, and your blog articles are all individually optimised for specific keyword targets. We implement BeautySalon, NailSalon, HairSalon, and LocalBusiness schema markup so Google understands precisely what you offer and who you serve.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for every treatment and treatment category</li>
        <li>Location pages targeting every city, district, and neighbourhood where you have clients</li>
        <li>BeautySalon, NailSalon, HairSalon JSON-LD schema markup across all relevant pages</li>
        <li>Google Business Profile optimisation for local map pack visibility</li>
        <li>Review generation strategy to build Google rating and ranking signals</li>
        <li>Long-tail keyword content strategy targeting low-competition, high-intent beauty searches</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get a Beauty SEO Strategy →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Beauty & Wellness — Keyword Rankings (sample campaign)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">lash studio lagos</span>
            <span class="kw-vol">4,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">beauty salon lagos</span>
            <span class="kw-vol">9,200/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">spa lagos</span>
            <span class="kw-vol">6,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">skincare clinic abuja</span>
            <span class="kw-vol">2,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">nail salon lagos</span>
            <span class="kw-vol">5,100/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">hair salon victoria island</span>
            <span class="kw-vol">3,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">medspa nigeria</span>
            <span class="kw-vol">1,900/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">wellness centre lagos</span>
            <span class="kw-vol">2,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active beauty business SEO campaign</div>
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
    <p>We have built websites for beauty businesses across Nigeria and the UK. These are the outcomes our clients consistently see after launch.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="360">0</span><span>%</span></div>
      <div class="trust-label">Average increase in online bookings within the first 90 days of a new beauty website launch with integrated booking system</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="96">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) achieved on our custom-built beauty websites — no page builder bloat, no slow themes</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="5">0</span><span>×</span></div>
      <div class="trust-label">Increase in client enquiries reported by beauty business clients within 6 months of launching their new website and SEO campaign</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched beauty website — with a guaranteed, milestone-based delivery timeline</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Industry-specific websites delivered across Nigeria, the UK, the US, and Canada — all built on custom code, never templates</div>
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
    <p>We have delivered websites for beauty businesses ranging from solo lash technicians to multi-location MedSpa groups. This process eliminates the delays, misaligned expectations, and half-finished builds that make most web design projects painful.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery & Brand Audit</div>
      <p class="proc-desc">A structured discovery session covering your services, target clients, brand positioning, geographic market, and business goals. We audit your existing brand assets, social presence, and competitor landscape. We map your complete site architecture — every page, every keyword target, every booking flow — and agree on it in writing before any design work begins.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Brand Audit</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Keyword Map</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Visual Design (Premium Beauty Aesthetics)</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for all key pages. We design your brand palette, typography system, service card layouts, gallery treatment, and booking flow as a coherent visual experience. Two revision rounds included. You approve every screen before development begins — nothing is built until you are fully satisfied with the look.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Brand Identity</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build (Booking System + Service Pages)</div>
      <p class="proc-desc">Your website is built on a custom WordPress theme — no page builders, no generic themes. The booking system is integrated and configured with your services, staff, availability rules, deposit amounts, and cancellation policy. All service pages, gallery functionality, gift voucher system, and CMS editing interfaces are built and connected. A staging environment is live throughout so you can review at any point.</p>
      <div class="proc-tags"><span class="proc-tag">Custom WordPress</span><span class="proc-tag">Booking System</span><span class="proc-tag">Gallery Build</span><span class="proc-tag">Gift Vouchers</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO & Content</div>
      <p class="proc-desc">Your content is entered across all pages, correctly formatted, and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, BeautySalon schema markup, canonical URLs, XML sitemap, and Google Search Console submission. Your Google Business Profile is fully optimised. Analytics 4 is installed, booking conversion goals are configured, and all tracking is verified before launch.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Beauty Schema</span><span class="proc-tag">GA4 Goals</span><span class="proc-tag">GBP Setup</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA & Launch</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 90+), booking flow testing end-to-end, payment processing verification, form testing, link verification, and a final review call before launch day. Your domain is transferred to the new site, SSL is verified, and Cloudflare CDN is configured. You receive a 45-minute CMS training session, a written admin guide, and a 30-day post-launch support window.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Booking Test</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly Retainer</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your site ranking and your bookings growing — publishing beauty blog content, building local SEO citations, monitoring Core Web Vitals, running daily backups, updating plugins, and delivering monthly keyword ranking and booking conversion reports. Beauty businesses typically see their strongest ROI growth in months 4–12 as SEO compounds.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Beauty Content</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Beauty websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — built specifically around the business's brand, services, target clients, and geographic market.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#4a0828 0%,#831843 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Lumière Beauty Studio</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Lash · Brow · Skincare</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Online Booking</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Before/After Gallery</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Gift Vouchers</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Lash, Brow & Skincare</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Beauty Studio · Lagos Island, Nigeria</div>
        <div class="port-title">Lumière Beauty Studio</div>
        <p class="port-desc">Full website with integrated online booking, before-and-after gallery, treatment pages for 12 services, gift vouchers, and an SEO campaign that achieved page one for "lash studio Lagos" within 8 weeks of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a2218 0%,#0e3828 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">The Glow Spa</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Wellness & Body · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Spa Packages</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Memberships</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Booking System</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Wellness & Body Treatments</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Spa & Wellness Centre · Abuja, Nigeria</div>
        <div class="port-title">The Glow Spa</div>
        <p class="port-desc">Premium wellness spa website with full booking system, spa package pages, membership programme, gift vouchers, and a body treatment gallery that drives consistent bookings from Abuja clients searching online.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#2d1b69 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Noir Beauty Collective</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Hair & Aesthetics · London & Lagos</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Dual Market</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">E-Commerce</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Online Booking</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Hair & Aesthetics · UK & Nigeria</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Hair & Aesthetics Studio · London & Lagos</div>
        <div class="port-title">Noir Beauty Collective</div>
        <p class="port-desc">Dual-market beauty studio website serving both London and Lagos clients — with separate location booking systems, e-commerce for haircare products, and a content strategy targeting both UK and Nigerian search audiences.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
<section class="pricing-section" id="pricing" aria-labelledby="pricing-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pricing-heading">Transparent pricing for<br>every beauty <em>business</em></h2>
    </div>
    <p>Every project is quoted individually after a free 30-minute consultation. These ranges are based on typical project scope — your exact quote will be detailed and itemised before any commitment is required.</p>
  </div>
  <div class="pricing-grid">

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Solo & Small Studios</div>
        <div class="price-name">Essential</div>
        <p class="price-tagline">A polished, professional beauty website for a solo technician or small studio needing a strong digital presence fast.</p>
        <div class="price-amount">₦400k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Homepage with booking CTA</div>
        <div class="price-feat">Service menu page</div>
        <div class="price-feat">Booking enquiry form</div>
        <div class="price-feat">Gallery (up to 30 images)</div>
        <div class="price-feat">Full SEO foundation</div>
        <div class="price-feat">Google Analytics 4</div>
        <div class="price-feat">Mobile-responsive design</div>
        <div class="price-feat">30-day post-launch support</div>
        <div class="price-feat no">Online booking system</div>
        <div class="price-feat no">Individual treatment pages</div>
        <div class="price-feat no">Gift vouchers</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn outline">Get a Quote →</a></div>
    </div>

    <div class="price-card featured reveal">
      <div class="price-head">
        <div class="price-badge">Most Popular</div>
        <div class="price-name">Growth</div>
        <p class="price-tagline">A full-featured beauty website built to rank, convert, and fill your appointment book.</p>
        <div class="price-amount">₦800k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full treatment pages per service</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Integrated online booking system</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Before & after gallery</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Gift voucher system</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Beauty blog with CMS</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Team profiles</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full SEO + beauty schema</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">CMS training session</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">60-day post-launch support</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn gold">Start This Project →</a></div>
    </div>

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Multi-Location & MedSpas</div>
        <div class="price-name">Enterprise</div>
        <p class="price-tagline">A comprehensive digital platform for MedSpas, multi-location groups, and beauty brands selling products direct.</p>
        <div class="price-amount">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">E-commerce for beauty products</div>
        <div class="price-feat">Loyalty programme integration</div>
        <div class="price-feat">Multi-location booking system</div>
        <div class="price-feat">Membership & subscription plans</div>
        <div class="price-feat">Medical-grade treatment pages</div>
        <div class="price-feat">Staff & practitioner profiles</div>
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
    <p>Not all web development options are equal — especially for beauty businesses where brand perception is your primary conversion tool.</p>
  </div>
  <table class="compare-table reveal" role="table" aria-label="Web design comparison for beauty businesses">
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
        <td class="feature">Built specifically for beauty businesses</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Beauty-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Online booking system integration</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Plugin only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full custom integration</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely configured well</span></td>
      </tr>
      <tr>
        <td class="feature">Before & after gallery with consent</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically built</span></td>
      </tr>
      <tr>
        <td class="feature">Gift voucher system</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Growth plan & above</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely included</span></td>
      </tr>
      <tr>
        <td class="feature">BeautySalon & local SEO schema</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">Instagram-linked gallery import</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic widget only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full feed integration</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely done well</span></td>
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
  <h2 class="s-head" id="test-heading">What beauty businesses say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Before i2Medier built our website, every booking came through Instagram DMs. We had no way to take deposits, people ghosted all the time, and our brand looked nothing like the quality of work we actually do. Three months after launching, we are fully booked three weeks in advance and our no-show rate dropped to almost zero. The booking system alone was worth every naira."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Adaeze Nwofor</div><div class="test-role">Founder · Lumière Beauty Studio, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"The Glow Spa website looks exactly like the experience we offer inside — premium, calm, intentional. My clients in Abuja tell me the website made them choose us over competitors they had been going to for years. We also rank on Google now for spa treatments in Abuja and it brings in new clients every single week without us doing anything extra."</p>
      <div class="test-author">
        <div class="test-avatar">T</div>
        <div><div class="test-name">Temi Adeyinka</div><div class="test-role">Owner · The Glow Spa, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Running a MedSpa means clients need to trust you medically before they book. Our website now has full treatment pages for every procedure with clinical detail, practitioner credentials, aftercare information, and before-and-after results. New clients arrive already informed and confident. Our conversion rate from enquiry to booked consultation has more than doubled since launch."</p>
      <div class="test-author">
        <div class="test-avatar">N</div>
        <div><div class="test-name">Dr. Ngozi Eze</div><div class="test-role">MedSpa Director · Lagos</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free beauty website audit —<br>see what's costing you bookings</h2>
    <p>We will review your current website and online presence, identify exactly what is losing you bookings, and show you what a professional beauty website would change. No cost, no commitment required.</p>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>beauty & wellness website design</em></h2>
    </div>
    <p>A comprehensive guide to building a beauty or wellness website that fills your appointment book, builds your brand, and ranks on Google — written for Nigerian and UK beauty business owners.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for beauty and wellness businesses">

      <h2>Why Nigerian beauty businesses need professional websites in 2025</h2>
      <p>The Nigerian beauty industry is one of the fastest growing consumer sectors in Africa. Lagos alone has more than 40,000 registered beauty businesses — and that number does not account for the significant informal sector. In this environment, the businesses that grow are not necessarily the ones doing the best work. They are the ones making it easiest for clients to find them, trust them, and book them. In 2025, that starts with your website.</p>
      <p>Consider the journey of a client looking for a new lash studio in Lagos. She asks a friend for a recommendation, receives two or three names, and opens all of them on her phone. Within ten seconds she has formed a strong impression of each. The one with a clean, luxurious website that shows clear pricing, real before-and-after results, and a working booking system gets her appointment. The others do not — regardless of the actual quality of their work.</p>
      <p>This is the core problem that a professional beauty website solves. It takes the excellent work you are already doing and makes it visible, credible, and bookable — to clients who have never heard of you, at any time of day or night, without you having to answer a single DM.</p>

      <h2>The Instagram problem: why DMs are not enough</h2>
      <p>Instagram is an exceptional marketing channel for beauty businesses. It is where you build an audience, showcase your work, and build aspiration around your brand. But it is a deeply inefficient booking system — and using it as your primary client acquisition tool has real costs that most beauty business owners underestimate.</p>
      <p>When a potential client finds you on Instagram and has to DM to enquire about booking, you lose her at every friction point. She messages you and waits for a reply. If she does not hear back within an hour she sends another DM to a competitor. Even when she does reach you, the conversation about availability, pricing, and deposit takes multiple exchanges over hours or days. The client who was ready to book right now has moved on.</p>
      <p>Instagram Stories pricing posts disappear in 24 hours. Pinned posts get buried. Your DMs fill with enquiries you cannot respond to fast enough. None of this information is findable on Google — so you are entirely invisible to the significant portion of your target market who are not yet following you and are actively searching for exactly the service you offer.</p>
      <p>A professional website solves all of this simultaneously. It is permanently available. All pricing and treatment information is a Google search away. A booking system captures appointments — with deposits — at 2am on a Sunday without you having to do anything. <strong>Instagram should drive traffic to your website. It should not be your website.</strong></p>

      <h2>Online booking and appointment management</h2>
      <p>The single highest-ROI feature we build into beauty websites is a properly integrated online booking system. The impact on bookings is typically immediate and dramatic — our beauty clients consistently report a 200–400% increase in online bookings within the first 90 days of launch.</p>
      <p>A well-configured beauty booking system does more than let clients pick a time slot. It presents each service with its full description, duration, and price. It shows real-time availability for each staff member. It collects a deposit at the point of booking, eliminating the ghost-appointment problem that costs beauty businesses thousands of naira per month in lost revenue. It sends automated confirmation emails and SMS reminders at configurable intervals before the appointment. And it manages cancellations and rescheduling according to your policy, without requiring your intervention.</p>
      <p>The result is a business that is bookable around the clock, has dramatically fewer no-shows, and requires significantly less time and attention to manage its appointment calendar. For beauty business owners who are often working alone or with a very small team, this operational efficiency is as valuable as the additional bookings it generates.</p>

      <h2>Brand positioning through design</h2>
      <p>Beauty is one of the few industries where the visual quality of your marketing materials is a direct proxy for the quality of your service in the client's mind. Clients hiring a lash technician or booking a facial are investing in how they look and feel. They make a subconscious judgment: if this business cares this much about how their website looks, they probably care this much about the quality of their work too.</p>
      <p>The inverse is also true. A beauty business with a poorly designed website — generic font choices, cluttered layout, low-quality image handling, no clear pricing — signals to potential clients that the business operates at a lower level than it actually does. This directly affects the type of clients you attract and the prices you can command.</p>
      <p>Premium brand positioning through website design is about several deliberate choices working together. Typography that is elegant and on-brand. A colour palette that is consistent with your physical environment. Photography that is high-quality and appropriately lit. White space used generously so the site breathes and feels luxurious rather than busy. Service descriptions that communicate sophistication without being pretentious. Each of these choices is a signal to the right kind of client that you are operating at their level.</p>

      <h2>SEO for beauty businesses in Nigeria</h2>
      <p>Search engine optimisation for beauty businesses in Nigeria is a significant and largely underdeveloped opportunity. The volume of searches for beauty treatments is substantial — tens of thousands per month in Lagos alone — and many of the businesses that would be a perfect fit for those clients are not visible on Google because they have no proper website or no SEO strategy.</p>
      <p>The keyword landscape for Nigerian beauty businesses is rich and highly local. Clients search with high specificity: not just "lash studio" but "lash studio Victoria Island" or "lash extensions Lagos Island price." These specific searches come from clients who know what they want, know roughly where they want it, and are ready to book. Ranking for these searches with a well-structured website and Google Business Profile is one of the most efficient client acquisition strategies available to beauty business owners in Nigeria today.</p>
      <p>Key SEO elements we build into every beauty website include: treatment-specific page titles and meta descriptions targeting high-intent keywords; BeautySalon, NailSalon, and HairSalon JSON-LD schema markup that helps Google categorise your business correctly; location-specific pages for each area or district you serve; a fully optimised Google Business Profile with regular photo updates and a review solicitation strategy; and a beauty blog that builds topical authority over time.</p>

      <h2>Pricing guide for beauty website design in Nigeria</h2>
      <p>The cost of a beauty or wellness website in Nigeria depends on the complexity of your services, the functionality required, and the depth of the SEO and content work needed. As a general guide for the Nigerian market in 2025:</p>
      <ul>
        <li><strong>Essential presence site</strong> (homepage, service menu, gallery, contact, basic SEO): ₦400,000–₦600,000</li>
        <li><strong>Growth website</strong> (full treatment pages, integrated booking system, before-and-after gallery, gift vouchers, blog, advanced SEO): ₦800,000–₦1.4M</li>
        <li><strong>Enterprise platform</strong> (multi-location booking, e-commerce for products, membership programme, custom integrations): ₦1.5M+</li>
      </ul>
      <p>The most important consideration is not the upfront cost but the return. A ₦400,000 website that generates three additional bookings per week at an average of ₦15,000 per appointment pays for itself in three months. A ₦800,000 website with a full booking system and SEO campaign that generates consistent organic traffic pays for itself in six weeks and then contributes to revenue indefinitely. The frame to apply is not "how much does this cost" but "what is this worth over the next two years."</p>
      <p>We provide fully itemised quotes after a free consultation — so you know exactly what you are getting and exactly what it costs before any commitment is required.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website audit and proposal for your beauty business.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Audit →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why beauty websites lose bookings</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for beauty businesses</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about beauty<br>& wellness <em>web design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every beauty business has different needs. Email us and we will give you a direct, honest answer specific to your studio — no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">Which booking system do you integrate — Fresha, Booksy, or custom?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">We work with several options depending on your needs and budget. For Nigerian beauty businesses we most commonly integrate Fresha (free and widely used), Booksy, Calendly (for simpler booking flows), or build a custom lightweight booking system directly into your WordPress site using ACF Pro and a payment gateway. Each has different strengths — we will recommend the right option for your specific service menu, team size, and operational requirements during the consultation.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can my website pull images directly from my Instagram?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Yes. We can integrate a live Instagram feed into your website gallery or homepage — displaying your most recent posts automatically without any manual work from your team. We typically implement this using the Instagram Graph API so the feed updates in real time and always shows your freshest work. This works particularly well for before-and-after sections that you update regularly on Instagram.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">How do you handle client consent for before-and-after photos?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">We build consent management into the photo upload workflow itself. Your team can upload photos from the admin dashboard and tag each image with the client's consent status, service type, and date — so you always know which images are cleared for public use. We can also generate a simple digital consent form for clients to sign that links to specific photos in your database. This protects you legally and makes gallery management straightforward for your team.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Can we sell skincare products and retail items through the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Yes. E-commerce for beauty products is included in our Enterprise plan and available as an add-on for Growth websites. We build WooCommerce stores with product pages for each item, integrated stock management, Paystack or Flutterwave payment processing for Nigerian clients, and shipping/delivery zone configuration. This is particularly valuable for beauty businesses that stock professional skincare lines, haircare products, or branded merchandise.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Do you set up Google My Business for beauty salons?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes — Google Business Profile (formerly Google My Business) setup and optimisation is included in every website project. This covers verifying your listing, adding all services with descriptions and prices, uploading high-quality photos, setting correct opening hours and location, and configuring the booking link to point to your website booking system. A fully optimised GBP listing significantly improves your chances of appearing in the local map pack when clients search for beauty services near them.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">How long does it take to build a beauty salon website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">A standard beauty website — homepage, service pages, gallery, booking integration, and SEO setup — takes 3 to 5 weeks from design approval to launch. Larger projects with e-commerce, multiple locations, or a custom booking system may take 5 to 7 weeks. We provide a detailed, milestone-based project timeline at the start of every engagement so you always know what is being built and when you can expect to see it.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Can my beauty staff update the website without technical knowledge?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Absolutely — this is fundamental to how we build every site. We use ACF Pro to create intuitive content management interfaces that look nothing like a code editor. Your team can add new services with pricing, upload before-and-after photos, publish blog posts, update opening hours, and manage gift voucher inventory all from a simple admin interface on their phone or laptop. Every handover includes a CMS training session and a written guide covering every workflow your team will need to manage the site day-to-day.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a beauty website<br>that fills your appointment book?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We will audit your current digital presence, map your keyword opportunities, and show you exactly what we would build — and why.</p>
  <a href="{{ route('site.start', ['services' => 'webdesign', 'source_page' => 'industry-beauty-wellness-website-design', 'source_label' => 'Beauty Wellness Industry Page']) }}" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
