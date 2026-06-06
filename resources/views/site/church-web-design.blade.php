@extends('public.layouts.app')

@section('title', 'Web Design for Churches | Ministry Website Design Nigeria | i2Medier')

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/church-web-design.css')
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
      <span aria-current="page">Web Design for Churches &amp; Ministries</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Church &amp; Ministry Website Design</span>
    <h1>Websites that grow your<br>congregation and<br><em>deepen community</em></h1>
    <p class="hero-sub">We build warm, professional websites for churches, ministries, mosques, and faith communities across Nigeria and the UK. Connect your congregation, stream services online, collect giving digitally, and reach new members who are searching for a spiritual home.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Church Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Built for faith communities — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranked on Google from launch</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span> Online giving &amp; streaming ready</span>
    </div>
  </div>

  <!-- Church website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
        <div>
          <div class="float-notif-text">New first-time visitor enquiry</div>
          <div class="float-notif-sub">Sunday Service · Lagos · 12 min ago</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">gracecovenantchurch.org</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Grace Covenant <span>Church</span></div>
            <div class="msn-links">
              <span class="msn-link">About</span>
              <span class="msn-link">Sermons</span>
              <span class="msn-link">Events</span>
              <span class="msn-link">Give</span>
              <span class="msn-cta">Join Us</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">A Place of Faith · Lagos, Nigeria</div>
            <div class="msh-h1">A Place to Belong,<br>A Community to <span>Grow</span></div>
            <div class="msh-sub">Join us every Sunday at 8 AM &amp; 10:30 AM. Services also streamed live online.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Watch Live →</span>
              <span class="msh-btn-s">Plan a Visit</span>
            </div>
          </div>
          <!-- Service/event cards -->
          <div class="mock-site-services">
            <div class="mss-label">Upcoming Events</div>
            <div class="mss-grid">
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></div><div class="mss-name">Sunday Service</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20"/><path d="M5 2h13a2 2 0 0 1 2 2v18"/></svg></div><div class="mss-name">Bible Study</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.9"/></svg></div><div class="mss-name">Youth Night</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg></div><div class="mss-name">Women's Fellowship</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div><div class="mss-name">Give Online</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg></div><div class="mss-name">Latest Sermon</div></div>
            </div>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">2,400<span>+</span></div><div class="mst-lbl">Members</div></div>
            <div class="mst-item"><div class="mst-num">12<span>yrs</span></div><div class="mst-lbl">Established</div></div>
            <div class="mst-item"><div class="mst-num">Live</div><div class="mst-lbl">Streaming</div></div>
            <div class="mst-item"><div class="mst-num">4.9<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rating</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "church Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Pentecostal Churches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Baptist Churches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Catholic Parishes</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Anglican Churches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Mosques</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Synagogues</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Ministries &amp; Evangelism Orgs</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Youth &amp; Campus Ministries</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Interdenominational Churches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Faith-Based NGOs</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Pentecostal Churches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Baptist Churches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Catholic Parishes</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Anglican Churches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Mosques</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Synagogues</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Ministries &amp; Evangelism Orgs</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Youth &amp; Campus Ministries</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Interdenominational Churches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Faith-Based NGOs</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most church websites<br><em>fail their congregation</em></h2>
    </div>
    <p>A new visitor searches for a church in their area before they ever walk through your doors. If your website cannot answer their basic questions — when do you meet, where are you, who is the pastor, what do you believe — they will find another fellowship that can. Here is what is going wrong on most church websites, and exactly what we do to fix it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">New visitors can't find the church online when searching for a spiritual home</h3>
      <p class="prob-desc">When someone new to Lagos or Abuja searches "church near me" or "Pentecostal church Lagos", most churches simply do not appear. That visitor — someone actively looking for a faith community — ends up at a church that invested in digital visibility. You never get the chance to welcome them.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every church website we build includes a complete local SEO setup — Google Business Profile optimisation, location-specific keyword targeting, and Place schema markup so your church appears in local map results and search listings.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></span>
      <h3 class="prob-title">Service times, location, and pastor information are impossible to find</h3>
      <p class="prob-desc">A first-time visitor spends three minutes trying to find out when Sunday service starts, what the address is, or who the senior pastor is — and gives up. The most basic information a visitor needs is buried in PDFs, buried in footers, or simply not there at all. First impressions are formed before anyone enters the building.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A dedicated service times block visible on the homepage, a clear location section with Google Maps integration, and a welcoming leadership profiles page — so visitors find everything they need in seconds.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg></span>
      <h3 class="prob-title">No sermon archive — members miss messages and can't share with others</h3>
      <p class="prob-desc">Your pastor preaches a powerful message on a Sunday morning. By Monday it has disappeared — there is nowhere for members to revisit it, share it with a friend, or let a visitor encounter it for the first time. A church without a sermon archive is a church without a digital memory, losing weeks of ministry impact every single month.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A fully searchable sermon archive with audio, video, and PDF note downloads — filterable by series, speaker, topic, and scripture reference. Members engage and share; visitors discover your church through sermon content.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span>
      <h3 class="prob-title">Online giving isn't set up — congregation gives less than they could</h3>
      <p class="prob-desc">Members who travel, work on weekends, or live in the diaspora have no reliable way to give. Cash-only collections miss those who prefer digital payments — and in Nigeria's increasingly cashless economy, this gap is growing. A church without online giving is leaving significant tithes and offerings uncollected every month.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A secure online giving and tithe portal integrated directly into your website using Paystack — supporting card payments, bank transfers, and recurring monthly giving. Members can give from Lagos, London, or anywhere in the world.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/></svg></span>
      <h3 class="prob-title">Events aren't promoted online — attendance suffers from poor communication</h3>
      <p class="prob-desc">The church calendar lives in a WhatsApp group. Special programmes, conferences, youth nights, and women's fellowship meetings are announced verbally on Sunday — meaning anyone who missed that Sunday missed the announcement. Event attendance drops, and ministry departments struggle to plan effectively without knowing how many people are coming.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A full events calendar with individual event pages, registration forms, and automatic reminders — so every programme is visible online, shareable on social media, and registrations are captured digitally before the day.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg></span>
      <h3 class="prob-title">Website looks dated — undermines the church's credibility and modernity</h3>
      <p class="prob-desc">Your church has excellent leadership, strong doctrine, and a vibrant community. But a visitor who lands on a website that looks like it was built in 2009 draws an unconscious conclusion: this church is not serious about communication, growth, or the digital world. A dated website signals a dated institution — even when the opposite is true.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A beautifully designed, modern church website with warm, welcoming aesthetics that reflect your community's character — photographed, branded, and designed to make an excellent first impression on every device, every time.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your church<br>website <em>needs</em></h2>
      <p>A high-performing church website is more than a homepage with service times. It is a comprehensive digital home for your entire congregation and ministry — a place where first-time visitors are welcomed, long-term members stay connected, and people in Lagos, Abuja, Port Harcourt, Ibadan, or Enugu can find you when they need a spiritual community.</p>
      <p>We map your ministry departments, service schedule, leadership structure, and content needs to a complete page architecture designed for both search engines and the people your church is called to serve.</p>
      <ul class="bullets">
        <li>Homepage — service times, welcome video, and a clear invitation to visit</li>
        <li>About / Vision, Mission &amp; Beliefs — who you are and what you stand for</li>
        <li>Pastor &amp; Leadership team profiles — faces, titles, and bios that build trust</li>
        <li>Sermon archive — audio, video, and PDF notes by series, topic, and speaker</li>
        <li>Events calendar — with registration and reminders for all programmes</li>
        <li>Online giving &amp; tithe portal — Paystack-powered with recurring giving support</li>
        <li>Ministries &amp; departments pages — children, youth, women, men, cell groups</li>
        <li>Small groups / cell groups — locations, leaders, and sign-up forms</li>
        <li>Gallery — services, events, and community moments</li>
        <li>Contact &amp; location map — with service times, directions, and enquiry form</li>
      </ul>
      <a href="#contact" class="build-cta">Plan My Church Website →</a>
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
        <div class="page-card-head"><span class="pch-name">Sermon Archive</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Online Giving</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Leadership Team</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Events Calendar</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Ministries</span><span class="pch-badge key">SEO Engine</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>churches &amp; ministries</em></h2>
    </div>
    <p>Every church and ministry website we build is designed around the specific communication needs, trust signals, and conversion patterns of faith communities. These are not generic business website features — they are faith-community-specific elements that have a direct impact on whether a visiting newcomer walks through your doors, gives generously, and becomes part of your congregation.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></div>
      <h3 class="svc-title">Service Times &amp; Location Pages</h3>
      <p class="svc-desc">Dedicated service times sections on the homepage and a standalone location page with Google Maps integration, driving directions, parking information, and what to expect on your first visit. These pages are optimised for "church near me" and "[denomination] church [city]" search queries — the most valuable searches for new congregation growth. Google My Business integration ensures your map listing is fully connected to your website.</p>
      <div class="svc-tags"><span class="svc-tag">Service Schedule</span><span class="svc-tag">Google Maps</span><span class="svc-tag">Place Schema</span><span class="svc-tag">First-Visit Guide</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg></div>
      <h3 class="svc-title">Sermon Archive</h3>
      <p class="svc-desc">A fully searchable sermon library with audio player, video embed, PDF notes download, and scripture references — filterable by series, topic, speaker, and date. Members can catch up on missed messages. Visitors discover your ministry through sermon content shared on social media. Each sermon becomes an SEO landing page indexed by Google — driving long-term organic traffic for years after the service date. Pastors and admin staff can upload new sermons without touching code.</p>
      <div class="svc-tags"><span class="svc-tag">Audio Player</span><span class="svc-tag">Video Embed</span><span class="svc-tag">PDF Notes</span><span class="svc-tag">Search &amp; Filter</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
      <h3 class="svc-title">Online Giving &amp; Tithe Portal</h3>
      <p class="svc-desc">A dedicated online giving page powered by Paystack — Nigeria's leading payment processor — supporting card payments, bank transfers, and USSD giving. Members can set up recurring monthly tithes, one-time offerings, and project-specific donations. Giving categories can be configured (Tithes, Offerings, Building Fund, Missions, etc.). For diaspora members in the UK or US, alternative payment rails can be integrated. Every transaction is recorded and downloadable by the church treasurer.</p>
      <div class="svc-tags"><span class="svc-tag">Paystack</span><span class="svc-tag">Recurring Giving</span><span class="svc-tag">Giving Categories</span><span class="svc-tag">Treasurer Reports</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/></svg></div>
      <h3 class="svc-title">Events Calendar &amp; Registration</h3>
      <p class="svc-desc">A comprehensive events calendar showing all church programmes — weekly services, special programmes, conferences, retreats, outreach events, and department meetings — with individual event pages, location details, and online registration forms. Registrant data is captured and exportable for planning. Events can be featured on the homepage, shared on social media with a single link, and listed in Google's event rich results through EventSchema markup.</p>
      <div class="svc-tags"><span class="svc-tag">Events Calendar</span><span class="svc-tag">Registration Forms</span><span class="svc-tag">Event Schema</span><span class="svc-tag">Google Events</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
      <h3 class="svc-title">Ministries &amp; Departments Pages</h3>
      <p class="svc-desc">Individual pages for each ministry department — Children's Church, Youth &amp; Teenagers, Women's Fellowship, Men's Fellowship, Choir &amp; Music Ministry, Ushering, Prayer, Evangelism, and Cell/Home Groups. Each page features the department's vision, meeting times, leadership contacts, upcoming events, and a sign-up or contact form. This content architecture gives each department a digital home and creates additional SEO landing pages for your church.</p>
      <div class="svc-tags"><span class="svc-tag">Department Pages</span><span class="svc-tag">Cell Groups</span><span class="svc-tag">Ministry Sign-up</span><span class="svc-tag">Leadership Profiles</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">SEO for Church Keywords</h3>
      <p class="svc-desc">Title tags, meta descriptions, and content optimised for high-intent church search terms — "church Lagos", "Pentecostal church Abuja", "church near me Nigeria", "Baptist church Port Harcourt", and denomination-specific searches. PlaceOfWorship and LocalBusiness JSON-LD schema markup ensures Google understands your church's physical location, denomination, service times, and contact details. Google Search Console and Analytics 4 are configured on launch day.</p>
      <div class="svc-tags"><span class="svc-tag">Church Keywords</span><span class="svc-tag">Local SEO</span><span class="svc-tag">PlaceOfWorship Schema</span><span class="svc-tag">GSC Setup</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Churches</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when people are<br>searching for a <em>church home</em></h2>
      <p>The most significant moment in your congregation's growth strategy is when someone in your city opens Google and types "church near me" or "Pentecostal church Lagos". If your church does not appear on the first page of results, they will attend a church that does. Every website we build for churches and ministries is engineered from the ground up to rank for the exact searches your potential congregation members are already making.</p>
      <p>We do not just build websites — we build search visibility for your community. Your homepage, each ministry page, your sermon archive entries, your events, and your giving page are all individually optimised for specific keyword targets. We implement PlaceOfWorship, LocalBusiness, and Event schema markup so Google understands precisely what your church offers, where you are located, and when you meet.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each ministry department and service type</li>
        <li>Location pages targeting Lagos, Abuja, Port Harcourt, Enugu, Ibadan, and any other city you serve</li>
        <li>PlaceOfWorship + LocalBusiness JSON-LD schema markup on every relevant page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Sermon pages indexed as individual SEO-rich content entries</li>
        <li>Event rich results markup for church programmes in Google search</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Church — Keyword Rankings (client results)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">church lagos</span>
            <span class="kw-vol">8,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">pentecostal church abuja</span>
            <span class="kw-vol">3,400/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">church near me nigeria</span>
            <span class="kw-vol">5,100/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">baptist church lagos</span>
            <span class="kw-vol">2,100/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">ministry website nigeria</span>
            <span class="kw-vol">1,400/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">church online giving nigeria</span>
            <span class="kw-vol">980/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">sunday service lagos</span>
            <span class="kw-vol">1,800/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">mosque website design nigeria</span>
            <span class="kw-vol">720/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from active church and ministry SEO campaigns</div>
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
    <p>We have built websites for faith communities, ministries, and religious organisations across Nigeria and the UK. These are the outcomes our church clients consistently see.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="280">0</span><span>%</span></div>
      <div class="trust-label">Average increase in new visitors discovering the church via Google search within the first 90 days of a new website launch</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="94">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) achieved on our custom-built church websites — no bloated page builders</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></span>
      <div class="trust-num">3<span>×</span></div>
      <div class="trust-label">Increase in online giving reported by churches within 6 months of launching a dedicated Paystack giving portal on their website</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched church website — with a guaranteed, milestone-based delivery timeline</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Professional websites delivered across Nigeria and the UK — all built on custom code, never templates, with full client ownership</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
      <div class="trust-num">100<span>%</span></div>
      <div class="trust-label">Client code ownership on delivery — every file, every database, every credential transferred to the church unconditionally at handover</div>
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
    <p>We have delivered websites for churches and ministry organisations across Lagos, Abuja, Port Harcourt, and the UK. This process has been refined across every one of those projects to eliminate surprises, delays, and scope disagreements that make most web projects frustrating for busy church leadership teams.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery &amp; Ministry Audit</div>
      <p class="proc-desc">A structured discovery session with your leadership team covering your church's denomination, doctrine, target congregation, ministry departments, content requirements, current digital presence, and growth goals. We audit your existing website (if any), review competitor churches in your city, and map out the complete site architecture — every page, every content type, every keyword target — agreed in writing before any design work begins.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Ministry Sitemap</span><span class="proc-tag">Keyword Map</span><span class="proc-tag">Signed Brief</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Design — Warm &amp; Welcoming Aesthetics</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for all key pages, including homepage with service times block, sermon archive, giving portal, events calendar, and ministry pages. The design reflects your church's brand identity, colour palette, and worship aesthetic — warm, welcoming, and distinctly yours. Two revision rounds are included, and you approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build — Sermon System, Giving Portal &amp; Events</div>
      <p class="proc-desc">Your website is built on a custom WordPress theme — no Elementor, no page builders. ACF Pro powers your sermon archive, events calendar, leadership profiles, ministry pages, and gallery — all fully editable by your church admin team without touching code. The Paystack giving portal is configured and tested. A staging environment is accessible throughout the build so leadership can review progress at any point.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">Sermon Archive</span><span class="proc-tag">Paystack Giving</span><span class="proc-tag">Events Calendar</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO &amp; Content Setup</div>
      <p class="proc-desc">All content is entered across every page, formatted correctly for both readability and SEO performance. We implement PlaceOfWorship and LocalBusiness schema markup, optimise title tags and meta descriptions for church-specific keyword targets, set up the XML sitemap, configure canonical URLs, and submit to Google Search Console. Google Analytics 4 is installed, goals configured, and all tracking verified before launch. Your Google Business Profile is claimed and optimised.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">Google Business Profile</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA &amp; Launch</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 90+), form testing, giving portal transaction testing, link verification, and a final review call before launch day. Your domain is transferred to the new site, SSL is verified, and Cloudflare is configured for CDN and security. Your admin team receives a hands-on CMS training session covering sermon uploads, event creation, content updates, and giving report access — plus a written admin guide.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">Admin Guide</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly Retainer &amp; Growth Support</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your site growing and running perfectly — publishing SEO-optimised sermon summary content, uploading new sermons and events, monitoring Core Web Vitals, updating WordPress, running daily backups, managing security, and delivering monthly keyword ranking reports. Churches on monthly retainers see the strongest congregation growth from digital sources in months 4–12 post-launch.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Sermon Uploads</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Church websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the church's denomination, congregation size, ministry departments, and digital goals.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--church-dk) 0%,var(--church) 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Grace Covenant Church</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Pentecostal Church · Lagos</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Sermon Archive</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Online Giving</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Events</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Pentecostal Church</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Pentecostal Church · Lagos, Nigeria</div>
        <div class="port-title">Grace Covenant Church</div>
        <p class="port-desc">Full church website with sermon archive, online giving via Paystack, events calendar, youth and women's ministry pages, and an SEO campaign that reached page one for "Pentecostal church Lagos" within 90 days of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a2218 0%,#0e3828 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Harvest Cathedral</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Evangelical Ministry · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Live Streaming</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Multi-Campus</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Giving Portal</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Evangelical Ministry</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Evangelical Ministry · Abuja, Nigeria</div>
        <div class="port-title">Harvest Cathedral</div>
        <p class="port-desc">Large multi-campus ministry website with live streaming integration, advanced Paystack giving with donor categories, a comprehensive sermon library, campus-specific event calendars, and ministry department pages for over twelve departments.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#2d1b69 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">New Life Fellowship</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Interdenominational · UK &amp; Nigeria</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Diaspora Giving</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Dual Market SEO</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Streaming</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Interdenominational · UK + Nigeria</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Interdenominational Church · UK &amp; Nigeria</div>
        <div class="port-title">New Life Fellowship</div>
        <p class="port-desc">Diaspora church website serving Nigerian communities in the UK and homeland. Features dual-currency giving (Paystack for Nigeria, Stripe for UK), live streaming integration, a bilingual sermon archive, and a dual-market SEO strategy targeting both Nigerian and UK search audiences.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
<section class="pricing-section" id="pricing" aria-labelledby="pricing-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pricing-heading">Transparent pricing for<br>every size of <em>church &amp; ministry</em></h2>
    </div>
    <p>Every project is quoted individually after a free 30-minute consultation. These ranges are based on typical project scope — your exact quote will be detailed and itemised before any commitment is required from your leadership team.</p>
  </div>
  <div class="pricing-grid">

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Small Congregations &amp; New Plants</div>
        <div class="price-name">Essential Site</div>
        <p class="price-tagline">A clean, welcoming website for a growing congregation or newly planted church needing a strong online presence fast.</p>
        <div class="price-amount">₦350k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Homepage with service times</div>
        <div class="price-feat">Up to 8 pages</div>
        <div class="price-feat">Basic sermon page (latest messages)</div>
        <div class="price-feat">Contact &amp; location with map</div>
        <div class="price-feat">Leadership profiles page</div>
        <div class="price-feat">Full SEO foundation</div>
        <div class="price-feat">Google Analytics 4</div>
        <div class="price-feat">30-day post-launch support</div>
        <div class="price-feat no">Full sermon archive with search</div>
        <div class="price-feat no">Online giving portal (Paystack)</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn outline">Get a Quote →</a></div>
    </div>

    <div class="price-card featured reveal">
      <div class="price-head">
        <div class="price-badge">Most Popular</div>
        <div class="price-name">Growth Website</div>
        <p class="price-tagline">A full-featured church website built to reach new members, retain your congregation, and collect giving digitally.</p>
        <div class="price-amount">₦750k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full sermon archive with audio/video</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Online giving portal (Paystack)</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Events calendar with registration</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Ministries &amp; departments pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Media gallery</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Newsletter signup integration</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full SEO + PlaceOfWorship schema</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">CMS training for admin team</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">60-day post-launch support</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn gold">Start This Project →</a></div>
    </div>

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Large Ministries &amp; Multi-Campus</div>
        <div class="price-name">Enterprise Ministry</div>
        <p class="price-tagline">A comprehensive digital platform for large churches, multi-campus ministries, or organisations with complex giving and operations needs.</p>
        <div class="price-amount">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Live streaming integration</div>
        <div class="price-feat">Mobile app connection (React Native)</div>
        <div class="price-feat">Multi-campus management</div>
        <div class="price-feat">Donor management system</div>
        <div class="price-feat">Advanced giving analytics</div>
        <div class="price-feat">Member portal (login &amp; profile)</div>
        <div class="price-feat">Cell/home group management</div>
        <div class="price-feat">90-day post-launch support &amp; SLA</div>
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
    <p>Not all web development options are equal — especially for churches and ministries where the website is often the first point of contact for someone seeking a spiritual home.</p>
  </div>
  <table class="compare-table reveal" role="table" aria-label="Web design comparison for churches and ministries">
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
        <td class="feature">Built specifically for churches &amp; ministries</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Church-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Sermon archive with audio &amp; video</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not built for this</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included — searchable</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely done well</span></td>
      </tr>
      <tr>
        <td class="feature">Online giving portal (Paystack)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not Nigerian-native</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Paystack integrated</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Sometimes available</span></td>
      </tr>
      <tr>
        <td class="feature">Events calendar with registration</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full registration system</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on budget</span></td>
      </tr>
      <tr>
        <td class="feature">PlaceOfWorship &amp; Event schema markup</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">Live streaming integration</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> No</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Available (Enterprise)</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely offered</span></td>
      </tr>
      <tr>
        <td class="feature">CMS training for church admin staff</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Self-serve only</span></td>
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
  <h2 class="s-head" id="test-heading">What church leaders say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Before i2Medier built our new website, we were completely invisible online. People looking for a church in Lagos could not find us at all. Within two months of launching the new site we started welcoming first-time visitors who said they found us on Google. The online giving portal alone has transformed how our congregation gives — even our members living in the UK can now tithe regularly."</p>
      <div class="test-author">
        <div class="test-avatar">E</div>
        <div><div class="test-name">Pastor Emeka Nwosu</div><div class="test-role">Senior Pastor · Grace Covenant Church, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Our cathedral now has a digital presence that genuinely reflects the scale and seriousness of our ministry. The sermon archive has been extraordinary — we upload the Sunday message and members across Nigeria and in the diaspora are accessing it by Monday morning. The events calendar has completely changed our programme planning because we can now see real registration numbers well before event day."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Bishop Adunola Adekunle</div><div class="test-role">General Overseer · Harvest Cathedral, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"As a fellowship that serves both Nigerians in the UK and families back home, we needed a website that could speak to both audiences and handle giving in two currencies. i2Medier built exactly that. The dual-currency giving setup — Paystack for Nigeria and Stripe for the UK — works flawlessly. Our members feel connected across the miles, and new visitors in both countries find us easily on Google."</p>
      <div class="test-author">
        <div class="test-avatar">C</div>
        <div><div class="test-name">Revd. Chioma Obi</div><div class="test-role">Lead Pastor · New Life Fellowship, UK &amp; Nigeria</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free church website audit<br>— grow your congregation online</h2>
    <p>We will review your current church website, identify the key gaps costing you new visitors and online giving, and show you exactly what a professional website would achieve for your ministry. No commitment required.</p>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>church website design in Nigeria</em></h2>
    </div>
    <p>A comprehensive guide to building a church and ministry website that grows your congregation, connects your community, and ranks on Google — written for Nigerian and UK faith organisations.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for churches and ministries in Nigeria">

      <h2>Why Nigerian churches need professional websites in 2025</h2>
      <p>The Nigerian faith landscape is one of the most vibrant and digitally active in the world. With over 200 million people and one of the highest rates of religious participation globally, Nigeria's churches and mosques are at a critical inflection point in their digital journey. The question is no longer whether a church should have a website — it is whether their website is doing any meaningful work for their ministry or whether it is simply a digital afterthought.</p>
      <p>Consider the journey of a young professional who has recently relocated from Port Harcourt to Lagos Island for work. On a Thursday evening, they open Google and type "church near me Lagos" or "Pentecostal church Victoria Island". The churches that appear in the first page of results — particularly those in the Google Maps local pack — will have an immediate opportunity to welcome this person into their congregation. The churches that do not appear may never get that chance, even if they are geographically closer, doctrinally aligned, and operationally excellent.</p>
      <p>A professional church website in 2025 is not a luxury. It is the digital front door of your ministry — welcoming new visitors, connecting your existing congregation, hosting your sermon content, facilitating giving, and communicating your church calendar to everyone who needs it. A church without a professional digital presence is operating with one door closed to the digital generation.</p>

      <h2>Online sermon streaming growth post-COVID</h2>
      <p>The COVID-19 pandemic permanently changed how Nigerian Christians engage with church content. What began as a necessity — streaming services when physical gatherings were prohibited — became a lasting behaviour shift that no church leadership can afford to ignore. Research consistently shows that online sermon consumption has remained significantly elevated even as in-person attendance recovered. Members watch or listen to sermons during their commute, share messages with family members in other cities, and return to specific messages days or weeks after the original service.</p>
      <p>For a church without a robust online sermon presence, every week represents lost ministry impact. A message preached on Sunday morning reaches only those physically present. The same message, hosted on a well-structured sermon archive integrated with your church website, continues working indefinitely — reaching members who could not attend, family members in Enugu, Kano, or Port Harcourt who are connected to your ministry, and complete strangers in Lagos who found your sermon through a Google search.</p>

      <h3>What a good sermon archive includes</h3>
      <p>An effective sermon archive does more than host audio files. It organises content by series, speaker, topic, and scripture reference so visitors can navigate meaningfully. It includes an audio player that works on every mobile device. Where video sermons exist, YouTube embeds or direct video hosting provide a seamless viewing experience. PDF sermon notes give studious members a tangible takeaway. Each sermon entry is an SEO page in its own right — indexable by Google, shareable on WhatsApp, and accessible years after the original service date. <strong>Your sermon archive is your most powerful long-term SEO asset.</strong></p>

      <h2>Online giving and digital tithing in Nigerian churches</h2>
      <p>The shift towards digital payments in Nigeria has accelerated dramatically. NIBSS data consistently shows year-on-year growth in electronic payment volumes, and the Central Bank of Nigeria's cash policy changes have made digital payment infrastructure essential across every sector — including religious organisations. For Nigerian churches, this creates both an opportunity and a responsibility.</p>
      <p>Members who are comfortable giving via card payment, bank transfer, or USSD are giving more frequently and more consistently than those who rely on physical cash. Members living and working abroad — in the UK, the US, Canada, or elsewhere — who wish to continue tithing and supporting their home church financially need a digital mechanism to do so. Without an online giving portal, a significant proportion of potential church income is simply inaccessible.</p>

      <h3>Why Paystack is the right choice for Nigerian church giving</h3>
      <p>Paystack is Nigeria's leading payment infrastructure provider, used by thousands of businesses and organisations across the country. For church giving portals, Paystack offers several specific advantages: it supports card payments, bank transfers, and USSD payments — meaning every Nigerian with a bank account can give. It handles recurring payments, allowing members to set up monthly tithe arrangements that continue automatically. Transaction fees are reasonable and transparent. Paystack's compliance with CBN regulations ensures that your church's financial operations remain above board. We integrate Paystack directly into your church website with dedicated giving pages for different donation types — Tithes, Offerings, Building Fund, Missions, Special Projects — so every giving transaction is categorised and reportable.</p>

      <h2>SEO for churches and ministries in Nigeria</h2>
      <p>Search engine optimisation for faith organisations requires a specific understanding of how potential congregation members search online. Unlike businesses where search intent is purely transactional, church searches often carry significant emotional weight — someone searching for "church Lagos" may be going through a major life transition, relocating to a new city, seeking a spiritual community for the first time, or returning to faith after a period away. Your website's ability to appear in these searches and communicate warmth, welcome, and relevance in the first few seconds is critically important.</p>
      <p>High-priority keyword categories for Nigerian church websites include location-specific searches ("church Lagos", "church Abuja", "church Port Harcourt", "church near me Nigeria"), denomination-specific searches ("Pentecostal church Lagos", "Baptist church Abuja", "Anglican church Ibadan", "Catholic parish Lagos"), programme-specific searches ("Sunday service times Lagos", "church with live streaming Lagos"), and giving-related searches ("church online giving Nigeria", "tithe online Nigeria").</p>
      <p>Google's PlaceOfWorship schema markup is a specific technical SEO element that tells Google your organisation is a place of worship — triggering special display features in local search results including your denomination, service times, address, and contact information. Every church website we build includes this markup as a standard feature, giving your listing a significant advantage in local search results over churches without it.</p>

      <h2>Events and community connection</h2>
      <p>Church community is built through shared experiences — services, conferences, retreats, outreach programmes, departmental meetings, fellowships, and special events. A church website with a comprehensive events calendar does more than list dates. It becomes the central communication hub for your congregation, accessible to every member regardless of whether they were in attendance on the Sunday the event was announced. Event pages with registration forms allow leadership to know attendance numbers in advance, plan catering and seating, and follow up with registered attendees before the event day.</p>
      <p>Google's Event schema markup means your church events can appear directly in Google search results as rich event listings — with date, time, location, and registration link visible before anyone even clicks through to your website. This is a significant advantage for special programmes and conferences that you want to promote beyond your existing congregation.</p>

      <h2>Church website pricing guide for Nigeria in 2025</h2>
      <p>Church and ministry website costs in Nigeria vary significantly depending on the scope of features required, the size of the congregation, and the complexity of the ministry's digital needs. As a general guide for 2025:</p>
      <ul>
        <li><strong>Essential church website</strong> (homepage, service times, basic pages, contact form, SEO): ₦350,000–₦500,000. Suitable for small congregations, newly planted churches, and ministries needing a professional online presence quickly.</li>
        <li><strong>Growth church website</strong> (full sermon archive, online giving, events calendar, ministries pages, gallery, SEO): ₦750,000–₦1.2M. Suitable for growing churches of 200–2,000 members that need comprehensive digital infrastructure.</li>
        <li><strong>Enterprise ministry platform</strong> (live streaming, multi-campus, member portal, mobile app, donor management): ₦1.5M+. Suitable for large ministries, multi-campus churches, and national organisations.</li>
      </ul>
      <p>The most important consideration is not the upfront cost but the long-term impact. A church website that ranks on Google for "church Lagos" and converts visitor interest into first-time visits has an exponential return on investment measured in congregation growth, community impact, and — where online giving is enabled — sustainable ministry income. Churches that treat their website as a ministry investment rather than a line-item expense consistently see the strongest growth outcomes.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website review and proposal for your church or ministry.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Review →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why most church websites fail</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for churches</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about church<br>&amp; ministry <em>website design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every church and ministry has different needs. Email us and we will give you a direct, honest answer specific to your congregation — no sales pressure, no obligation.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">Is online giving through Paystack secure for our congregation?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Yes. Paystack is fully regulated by the Central Bank of Nigeria (CBN) and uses the same bank-level SSL encryption as Nigerian commercial banks. Your congregation's card and banking details are never stored on your church's server — they are processed entirely through Paystack's PCI-DSS-compliant infrastructure. Transactions are protected by Paystack's fraud detection systems. The church receives funds in its verified Paystack account, and all transactions are downloadable as reports for your treasurer. Thousands of Nigerian organisations — including hospitals, universities, and government agencies — process payments through Paystack daily.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">How do we upload new sermons after the website goes live?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Uploading a new sermon is as simple as publishing a blog post. Your church admin team logs into the WordPress dashboard, goes to the Sermons section, clicks "Add New", fills in the sermon title, speaker, date, series, scripture reference, uploads the audio or video file (or pastes a YouTube link), and hits publish. The new sermon immediately appears on your website's sermon archive, searchable and filterable. We build the sermon upload workflow specifically for non-technical church admin staff, and every handover includes a training session covering the exact process for your team.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">Can you integrate live streaming with our website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">Yes. We can embed live stream players directly into your church website — supporting YouTube Live, Facebook Live, and dedicated streaming platforms such as Restream, StreamYard, or BoxCast. A dedicated "Watch Live" page can display your streaming embed automatically during scheduled service times, and show a replay or an upcoming service countdown at all other times. For churches with a professional streaming setup, we can also integrate with streaming APIs to automate content publishing. Live streaming integration is included in our Enterprise Ministry tier and can be added to Growth packages.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">How do we set up Google My Business for our church?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Google Business Profile (formerly Google My Business) is one of the most important digital assets for any church that wants to appear in local search results and on Google Maps. We claim or create your church's Google Business Profile as part of the website launch process, verifying it with Google, populating it with your service times, denomination, description, photos, and website link, and connecting it to your website's PlaceOfWorship schema markup. Once verified, your church can appear in the Google Maps local pack — the cluster of three results that appear prominently when someone searches for a church in your area. We also show your admin team how to respond to reviews and keep the profile updated.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">How long does it take to build a church website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">A standard church website with sermon archive, online giving, and events calendar typically takes 3–5 weeks from design approval to launch. Larger sites for multi-campus ministries, or platforms with live streaming integration and member portals, may take 5–8 weeks. We provide a detailed, milestone-based timeline at the start of every project so your leadership team always knows exactly what is happening and when — with clear approval points at design sign-off and staging review before any content goes live.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Can non-technical church admin staff manage the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">Yes — this is a core requirement we design for in every church website we build. We use ACF Pro (Advanced Custom Fields) to create intuitive, form-based editing interfaces for sermons, events, ministries pages, and all other content types. Your admin team does not need to understand HTML, CSS, or any code. They log in to a simple WordPress dashboard, fill in the relevant fields, and publish. Every handover includes a hands-on CMS training session for up to four staff members, covering every workflow the team will regularly use — plus a written admin guide they can reference anytime.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Can our website serve both English-speaking and Yoruba/Igbo/Hausa-speaking members?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Yes. For churches with significant multilingual congregations, we can build multilingual support into your website — allowing certain pages or sections to be presented in Yoruba, Igbo, Hausa, or other languages alongside English. Full multilingual implementation uses WordPress's WPML or Polylang plugin to create translated versions of key pages. For simpler needs — such as a bilingual service times section or a bilingual first-visit guide — we can handle this within the standard design without a dedicated translation plugin. Language requirements should be discussed during the discovery session so they are scoped and priced correctly from the start.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a church website<br>that grows your congregation?</h2>
  <p>Get a free, no-obligation consultation and website proposal for your church or ministry. We will review your current digital presence, map your keyword opportunities, and show you exactly what we would build — and why.</p>
  <a href="mailto:letstalk@i2medier.com" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
