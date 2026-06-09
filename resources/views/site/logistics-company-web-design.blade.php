@extends('public.layouts.app')

@section('title', 'Web Design for Logistics Companies | Freight & Transport Website Design Nigeria | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Design', 'item' => route('site.services.web-design')],
        ['@type' => 'ListItem', 'position' => 4, 'name' => 'Logistics Company Web Design', 'item' => route('site.services.web-design.industry', ['industry' => 'logistics-company-website-design'])],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'Can you integrate shipment tracking into the website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — shipment tracking integration is one of our specialisms for logistics company websites. We integrate with your existing tracking system via API (if you have one), or we build a lightweight tracking database that your operations team can update directly. Clients enter a consignment number on your website and see live status updates — In Transit, Out for Delivery, Delivered — without calling your office. This typically reduces tracking enquiry calls by 50–80% within the first month.']],
        ['@type' => 'Question', 'name' => 'Can you build a B2B client portal for regular freight clients?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We build secure B2B client portals as part of our Enterprise tier — giving regular shipping clients a login where they can view shipment history, track current consignments, access invoices, and communicate with your operations team. The portal is HTTPS-encrypted, access-controlled per client account, and fully integrated with your main website. This is particularly valuable for corporate clients who ship weekly or monthly and expect account management tools from a professional logistics partner.']],
        ['@type' => 'Question', 'name' => 'Can you show our fleet and vehicle information on the website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Absolutely — and we recommend it strongly. Fleet pages with vehicle specifications, payload capacities, and professional photography are among the highest-converting content elements on logistics company websites. Corporate buyers evaluating freight partners want to know you have the physical capacity to handle their volume before they call. A well-designed fleet page with real photographs removes that doubt and significantly increases shortlisting rates. We build fleet pages as part of every logistics website we deliver.']],
        ['@type' => 'Question', 'name' => 'How do you display ISO certification and other accreditations?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'ISO certifications, NAFDAC compliance, insurance certificates, and other regulatory accreditations are integrated as primary trust anchors — not footnotes. We display certification badges in the hero section, in the navigation bar for cold chain and pharmaceutical logistics pages, and in a dedicated trust bar that appears on all key service pages. Certificate numbers, validity dates, and issuing bodies can also be displayed. For B2B buyers evaluating logistics partners for sensitive cargo, visible certification is a shortlisting requirement.']],
        ['@type' => 'Question', 'name' => 'Can the website cover multiple depots and cities?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — multi-depot and multi-city logistics operations are a core use case we design for. Each depot location gets its own location page with address, operating hours, contact details, and depot-specific services. Coverage maps show your operational geography clearly. Route pages are structured per city pair — Lagos to Abuja, Port Harcourt to Kano, and so on. This architecture is both operationally useful for clients and highly valuable for SEO, as each location page and route page targets city-specific search terms.']],
        ['@type' => 'Question', 'name' => 'How long does it take to build a logistics company website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A standard logistics company website — homepage, 6–10 service pages, online quote form, coverage map, and full SEO — takes 3–5 weeks from design approval to launch. Larger builds with route pages, tracking integration, case studies, and a blog section take 5–7 weeks. Enterprise platforms with client portals and shipment management systems are typically 8–12 weeks depending on integration complexity. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when.']],
        ['@type' => 'Question', 'name' => 'Will our operations team be able to update the website themselves?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — this is a core requirement for every logistics website we build. Your operations team can update service descriptions, coverage areas, fleet information, depot locations, case studies, and blog articles without touching code. We use ACF Pro to create intuitive editing interfaces specifically designed for non-technical users. Every handover includes a full CMS training session and a written admin guide covering every content management workflow your team will need — updating tracking statuses, adding new routes, publishing freight market insights, and managing client case studies.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/logistics-company-web-design.css')
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
      <span aria-current="page">Web Design for Logistics Companies</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Logistics Company Website Design</span>
    <h1>Websites that win freight<br>contracts for your<br><em>logistics business</em></h1>
    <p class="hero-sub">We build operationally clear, fast, and Google-ranked websites specifically for logistics companies, freight forwarders, courier services, and transport firms — in Nigeria, the UK, and worldwide. Win more B2B and B2C shipping contracts with a credible online presence, instant quote tools, and shipment tracking visibility.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Logistics Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Built for logistics &amp; transport — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span> Quote &amp; tracking integration</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria &amp; UK specialists</span>
    </div>
  </div>

  <!-- Logistics website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M5 17H3a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v3"/><rect x="9" y="11" width="14" height="10" rx="2"/><path d="M16 11v-2a2 2 0 0 0-2-2"/></svg></div>
        <div>
          <div class="float-notif-text">New freight quote request</div>
          <div class="float-notif-sub">Abuja → Lagos · 3 tonnes · just now</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">swiftroutelogistics.com.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">SwiftRoute <span>Logistics</span></div>
            <div class="msn-links">
              <span class="msn-link">Services</span>
              <span class="msn-link">Track Shipment</span>
              <span class="msn-link">About</span>
              <span class="msn-link">Clients</span>
              <span class="msn-cta">Get a Quote</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Freight &amp; Logistics · Nigeria</div>
            <div class="msh-h1">Reliable Freight Across<br><span>Nigeria and Beyond</span></div>
            <div class="msh-sub">Road freight, air cargo, last-mile delivery, and warehousing — trusted by leading businesses across six Nigerian cities.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Get Instant Quote</span>
              <span class="msh-btn-s">Track Shipment →</span>
            </div>
          </div>
          <!-- Services -->
          <div class="mock-site-services">
            <div class="mss-label">Our Services</div>
            <div class="mss-grid">
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M5 17H3a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v3"/><rect x="9" y="11" width="14" height="10" rx="2"/></svg></div><div class="mss-name">Road Freight</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z"/></svg></div><div class="mss-name">Air Cargo</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 2v3"/><path d="M12 19v3"/><path d="m4.2 4.2 2.1 2.1"/><path d="m17.7 17.7 2.1 2.1"/><path d="M2 12h3"/><path d="M19 12h3"/><path d="m4.2 19.8 2.1-2.1"/><path d="m17.7 6.3 2.1-2.1"/></svg></div><div class="mss-name">Last-Mile Delivery</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M3 21h18"/><path d="M5 21V7l7-4 7 4v14"/><path d="M9 9h6"/><path d="M9 13h6"/></svg></div><div class="mss-name">Warehousing</div></div>
            </div>
          </div>
          <!-- Shipment Tracker -->
          <div class="mock-site-tracker">
            <div class="mtr-label">Live Shipment Tracker</div>
            <div class="mtr-row">
              <span class="mtr-id">SWR-00421</span>
              <span class="mtr-route">Lagos → Abuja</span>
              <span class="mtr-badge in-transit">In Transit</span>
            </div>
            <div class="mtr-row">
              <span class="mtr-id">SWR-00418</span>
              <span class="mtr-route">PH → Kano</span>
              <span class="mtr-badge out-delivery">Out for Delivery</span>
            </div>
            <div class="mtr-row">
              <span class="mtr-id">SWR-00415</span>
              <span class="mtr-route">Abuja → Lagos</span>
              <span class="mtr-badge delivered">Delivered</span>
            </div>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">50k<span>+</span></div><div class="mst-lbl">Deliveries</div></div>
            <div class="mst-item"><div class="mst-num">15<span>+</span></div><div class="mst-lbl">Trucks</div></div>
            <div class="mst-item"><div class="mst-num">6</div><div class="mst-lbl">Cities</div></div>
            <div class="mst-item"><div class="mst-num">ISO</div><div class="mst-lbl">Certified</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "logistics company Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Road Freight &amp; Haulage</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Courier &amp; Last-Mile Delivery</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Freight Forwarding</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Air Cargo Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Warehousing &amp; Distribution</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Cold Chain Logistics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> E-Commerce Fulfilment</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> International Shipping</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Supply Chain Management</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Fleet Management Companies</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Road Freight &amp; Haulage</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Courier &amp; Last-Mile Delivery</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Freight Forwarding</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Air Cargo Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Warehousing &amp; Distribution</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Cold Chain Logistics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> E-Commerce Fulfilment</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> International Shipping</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Supply Chain Management</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Fleet Management Companies</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most logistics company<br>websites <em>lose contracts</em></h2>
    </div>
    <p>A procurement manager searching for a logistics partner will visit your website before they ever pick up the phone. Within seven seconds they decide whether your company looks credible enough to handle major freight contracts. If your website does not pass that test, the contract goes to a competitor with a better-looking operation. Here is what is going wrong — and what we do about it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M8 10h8"/><path d="M7 14h10"/><path d="M6 12a6 6 0 1 1 12 0v3a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2z"/><path d="M4 13h2"/><path d="M18 13h2"/></svg></span>
      <h3 class="prob-title">No credible website — clients choose better-looking competitors for major freight contracts</h3>
      <p class="prob-desc">Corporate procurement teams and B2B buyers use your website as a proxy for operational competence. A poorly designed or outdated site signals disorganisation. If a competitor's website looks more professional, they win the contract — even if your service is superior.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A professionally designed logistics website that communicates scale, reliability, and operational credibility — matching the expectations of corporate clients and procurement managers from the first click.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Invisible on Google when procurement managers search for logistics providers</h3>
      <p class="prob-desc">When a Lagos manufacturer searches "freight company Lagos" or "haulage company Nigeria", your company does not appear. Procurement managers use Google as their first sourcing tool. Without page-one visibility, you are not even in the conversation for new freight contracts.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every site includes a complete SEO foundation — service pages optimised for freight and logistics keywords, local SEO, route-specific pages, and Google Search Console setup on launch day.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <h3 class="prob-title">No online quote tool — leads call once and never hear back fast enough</h3>
      <p class="prob-desc">B2B buyers expect to submit freight quote requests online and receive a response within hours — not days. Without an online quote form on your website, you lose enquiries to competitors who make it effortless to start a conversation. Speed of response is a competitive advantage.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A custom online freight quote calculator and enquiry form that captures origin, destination, cargo type, weight, and urgency — so your team responds with relevant pricing immediately.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M5 17H3a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v3"/><rect x="9" y="11" width="14" height="10" rx="2"/><path d="M16 11v-2a2 2 0 0 0-2-2"/></svg></span>
      <h3 class="prob-title">No shipment tracking visible on the website — clients call constantly for updates</h3>
      <p class="prob-desc">Clients who have hired you want real-time shipment visibility. Without a tracking widget or portal on your website, they call your office repeatedly for updates — consuming staff time and eroding client confidence. Visible tracking is a retention and referral tool, not just an operational nicety.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Shipment tracking widget or client portal integrated directly into your website — giving clients live visibility on their consignments and reducing inbound support calls significantly.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z"/></svg></span>
      <h3 class="prob-title">No service pages explaining road freight, air cargo, and warehousing separately</h3>
      <p class="prob-desc">Procurement managers searching for specific logistics services — "air cargo Lagos Abuja", "cold chain logistics Nigeria", "last-mile delivery e-commerce" — will not find you if all your services are described in a single paragraph. Individual service pages are both an SEO and a conversion requirement.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Dedicated service pages for each logistics offering — road freight, air cargo, last-mile, warehousing, freight forwarding, cold chain — each optimised for the specific keywords your target clients use.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></span>
      <h3 class="prob-title">No client list or case studies — large corporate clients need proof before they commit</h3>
      <p class="prob-desc">Enterprise procurement teams need social proof before committing major freight budgets to a new logistics partner. Without client logos, case studies, or verifiable volume statistics on your website, you are asking them to take a leap of faith — which they will not do when a competitor provides the evidence they need.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Case study pages, client logo bars, fleet size statistics, volume milestones, and certifications (ISO, NAFDAC, etc.) displayed prominently as primary trust anchors — not buried in the footer.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your logistics<br>company's website <em>needs</em></h2>
      <p>A high-performing logistics company website is not a homepage and a contact form. It is a structured, strategic set of pages — each designed to serve a specific buyer at a specific stage of their vendor evaluation process, and each optimised to rank for the freight and logistics search terms your clients use.</p>
      <p>We map your services, coverage areas, fleet capabilities, and client types to a comprehensive page architecture that works for both Google and the procurement managers, supply chain directors, and e-commerce operators evaluating your company.</p>
      <ul class="bullets">
        <li>Homepage with instant quote CTA and operational credibility signals</li>
        <li>Individual service pages — road freight, air cargo, last-mile delivery, warehousing, cold chain, etc.</li>
        <li>Coverage map &amp; route pages — each city pair and trade lane optimised for local search</li>
        <li>Shipment tracking integration — live consignment visibility for clients</li>
        <li>Client portal / shipment dashboard — B2B login for regular shippers</li>
        <li>About &amp; fleet information — trucks, capacity, certifications, and team</li>
        <li>Case studies &amp; client logos — proof pages for enterprise buyers</li>
        <li>Blog — logistics insights, trade regulations, and freight market updates</li>
        <li>Contact &amp; depot locations — with maps for every operational base</li>
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
        <div class="page-card-head"><span class="pch-name">Road Freight</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Air Cargo</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Track Shipment</span><span class="pch-badge std">Client Tool</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Coverage Areas</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Case Studies</span><span class="pch-badge key">Trust Engine</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>logistics companies</em></h2>
    </div>
    <p>Every logistics company website we build is designed around the specific trust signals, operational proof points, and conversion patterns that win freight contracts. These are not generic business website features — they are logistics-specific elements that have a direct impact on whether a visiting procurement manager or shipper makes contact.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
      <h3 class="svc-title">Online Freight Quote Calculator</h3>
      <p class="svc-desc">A multi-field online quote form that captures origin city, destination city, cargo type, weight, dimensions, and urgency — routing requests directly to your sales team with all the information needed to price and respond within hours. Reduces the back-and-forth that loses warm leads.</p>
      <div class="svc-tags"><span class="svc-tag">Quote Form</span><span class="svc-tag">Lead Capture</span><span class="svc-tag">Email Routing</span><span class="svc-tag">CRM Integration</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M5 17H3a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v3"/><rect x="9" y="11" width="14" height="10" rx="2"/><path d="M16 11v-2a2 2 0 0 0-2-2"/></svg></div>
      <h3 class="svc-title">Individual Service Pages (Road, Air, Sea, Warehousing)</h3>
      <p class="svc-desc">Dedicated pages for each logistics service you offer — road freight, air cargo, last-mile delivery, warehousing, freight forwarding, cold chain logistics, e-commerce fulfilment. Each page targets specific search terms, explains your capability in detail, and converts visitors searching for that specific service.</p>
      <div class="svc-tags"><span class="svc-tag">Road Freight</span><span class="svc-tag">Air Cargo</span><span class="svc-tag">Warehousing</span><span class="svc-tag">Cold Chain</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">Shipment Tracking Integration</h3>
      <p class="svc-desc">A live shipment tracking widget embedded in your website — clients enter a tracking number and see real-time consignment status, without calling your office. Integrates with your existing tracking system or we build a lightweight tracking database as part of the project. Dramatically reduces inbound support calls.</p>
      <div class="svc-tags"><span class="svc-tag">Live Tracking</span><span class="svc-tag">API Integration</span><span class="svc-tag">Client Self-Service</span><span class="svc-tag">Status Badges</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></div>
      <h3 class="svc-title">Coverage Area &amp; Route Pages (SEO per City Pair)</h3>
      <p class="svc-desc">Individual landing pages for each major trade route and coverage city — "freight Lagos to Abuja", "courier service Port Harcourt to Kano", "warehousing Apapa Lagos". Each route page ranks for the specific geography searches your target clients use and funnels them into a relevant quote request.</p>
      <div class="svc-tags"><span class="svc-tag">Lagos Routes</span><span class="svc-tag">Abuja Coverage</span><span class="svc-tag">Route SEO</span><span class="svc-tag">Location Pages</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></div>
      <h3 class="svc-title">Client Portal / B2B Login</h3>
      <p class="svc-desc">A secure B2B client portal for regular shippers — shipment history, live tracking, invoice access, and direct communication with your operations team. Gives corporate clients the self-service visibility they expect from a professional logistics partner and reduces account management overhead on your team.</p>
      <div class="svc-tags"><span class="svc-tag">B2B Dashboard</span><span class="svc-tag">Shipment History</span><span class="svc-tag">Invoice Access</span><span class="svc-tag">SSL Encrypted</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/></svg></div>
      <h3 class="svc-title">SEO for Logistics Keywords (Freight [City], Courier Service [Area])</h3>
      <p class="svc-desc">Title tags, meta descriptions, and content optimised for high-intent logistics search terms — "freight company [city]", "logistics company Nigeria", "haulage company Lagos", "courier service Abuja". LogisticsService, LocalBusiness, and FreightService schema markup for rich search results across all service pages.</p>
      <div class="svc-tags"><span class="svc-tag">Logistics Keywords</span><span class="svc-tag">Schema Markup</span><span class="svc-tag">Local SEO</span><span class="svc-tag">GSC Setup</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Logistics Companies</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when clients are<br>searching for <em>your freight routes</em></h2>
      <p>The most valuable moment in your sales cycle is when a procurement manager opens Google and searches "logistics company Lagos" or "freight forwarder Nigeria". If your company is not on page one, they hire a competitor. Every website we build for logistics companies is engineered to rank for the exact search terms your buyers use to find freight partners.</p>
      <p>We build search visibility into the structure of your website from day one. Your homepage, each service page, your route and coverage pages, and your insights blog are all individually optimised for specific keyword targets. We implement LogisticsService and LocalBusiness schema markup so Google understands exactly what you move, where you operate, and who you serve.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each logistics service you offer</li>
        <li>Route pages targeting every city pair and trade lane you cover</li>
        <li>LogisticsService + LocalBusiness JSON-LD schema markup on every relevant page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Citation building across Nigerian and international business directories</li>
        <li>Long-tail keyword content targeting low-competition, high-intent freight searches</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Logistics Company — Keyword Rankings (before &amp; after)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">logistics company lagos</span>
            <span class="kw-vol">4,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">freight company nigeria</span>
            <span class="kw-vol">3,200/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">courier service abuja</span>
            <span class="kw-vol">2,600/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">haulage company lagos</span>
            <span class="kw-vol">1,900/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">last mile delivery nigeria</span>
            <span class="kw-vol">2,400/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">warehousing lagos</span>
            <span class="kw-vol">1,600/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">freight forwarding nigeria</span>
            <span class="kw-vol">2,100/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">transport company abuja</span>
            <span class="kw-vol">1,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active logistics company SEO campaign</div>
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
    <p>We have built websites for logistics, transport, and supply chain companies across Nigeria and the UK. These are the outcomes our clients consistently see.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="290">0</span><span>%</span></div>
      <div class="trust-label">Average increase in B2B freight enquiries within the first 90 days of a new logistics company website launch</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="96">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) achieved on our custom-built logistics company websites — no page builder bloat</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="5">0</span><span>×</span></div>
      <div class="trust-label">Increase in monthly website quote requests reported by logistics clients within 6 months of launch, compared to their previous website</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched logistics company website — with a guaranteed, milestone-based delivery timeline</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Professional service websites delivered across Nigeria, the UK, the US, and Canada — all built on custom code, never templates</div>
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
    <p>We have delivered websites for logistics and transport companies across Nigeria and the UK. This process eliminates surprises, delays, and the scope disagreements that make most agency relationships frustrating.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery &amp; Operations Audit</div>
      <p class="proc-desc">A structured discovery session covering your logistics services, coverage areas, fleet capacity, target client types (B2B, e-commerce, retail, FMCG), and competitive landscape. We map your complete site architecture — every service page, every route page, every keyword target — and agree on it in writing before any design work begins.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Keyword Map</span><span class="proc-tag">Signed Brief</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Visual Design (Credible, Operationally Clear)</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for all key pages. We design your brand colours, fleet photography placement, operational credibility elements, and conversion flows to work as a coherent system. The aesthetic communicates scale, reliability, and professionalism. Two revision rounds included. You approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build (Quote Tool + Tracking + Service Pages)</div>
      <p class="proc-desc">Your website is built on a custom PHP WordPress theme — no page builders. ACF Pro powers your service pages, route pages, case studies, fleet information, and tracking integration — fully editable from WordPress admin without touching code. The quote calculator and shipment tracking widget are built and integrated during this phase. A staging environment is accessible throughout.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">Quote Calculator</span><span class="proc-tag">Tracking Widget</span><span class="proc-tag">ACF Pro</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO &amp; Content</div>
      <p class="proc-desc">Your content is entered across all pages, formatted correctly, and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, LogisticsService and LocalBusiness schema markup, canonical URLs, XML sitemap, and Google Search Console submission. Route pages and service pages are each given unique keyword targets. Google Analytics 4 is installed and all goals are configured before launch.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA &amp; Launch</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 90+), quote form testing, tracking widget verification, link checks, and a final review call before launch. Your domain is transferred, SSL is verified, and Cloudflare is configured. You receive a 45-minute CMS training session, a written admin guide, and a 30-day post-launch support window for your operations team.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">30-Day Support</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly Retainer (SEO + Maintenance)</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your site ranking and running — publishing logistics insights and trade regulation articles, building local SEO citations, monitoring Core Web Vitals, updating WordPress, running daily backups, and delivering monthly keyword ranking reports. Most logistics clients see their strongest ROI in months 4–12 as route pages accumulate ranking authority.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Content Creation</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Logistics websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the company's services, coverage areas, and target client base.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--logistics) 0%,#162952 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">SwiftRoute Logistics</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Road Freight &amp; Last-Mile</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Road Freight</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Last-Mile</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Lagos</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Road Freight &amp; Last-Mile</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Logistics Company · Lagos, Nigeria</div>
        <div class="port-title">SwiftRoute Logistics</div>
        <p class="port-desc">Full website with 10 service pages, live shipment tracking widget, online quote calculator, coverage map, and an SEO campaign that reached page one for "logistics company Lagos" within 90 days.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a1a2e 0%,#0e2838 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Apex Freight Solutions</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Air Cargo &amp; Forwarding · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Air Cargo</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Forwarding</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Customs</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Air Cargo &amp; Forwarding</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Freight Forwarding Firm · Abuja, Nigeria</div>
        <div class="port-title">Apex Freight Solutions</div>
        <p class="port-desc">Specialist air cargo and freight forwarding website with service pages targeting NAFDAC-regulated shipments, customs clearance, and B2B corporate clients — with B2B quote form and client portal login.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#2d1b69 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Bridge Logistics Ltd</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">International Shipping · UK+Nigeria</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">International</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Sea Freight</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">UK+NG</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">International Shipping · UK+Nigeria</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">International Logistics · United Kingdom &amp; Nigeria</div>
        <div class="port-title">Bridge Logistics Ltd</div>
        <p class="port-desc">International shipping and freight consolidation website for a UK-Nigeria trade lane specialist — with dual-market content strategy targeting UK importers and Nigerian exporters, shipment tracking, and route pages.</p>
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
    <p>Not all web development options are equal — especially for logistics companies where operational credibility and B2B trust are your competitive advantage.</p>
  </div>
  <div class="compare-wrap"><table class="compare-table reveal" role="table" aria-label="Web design comparison for logistics companies">
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
        <td class="feature">Built specifically for logistics companies</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Logistics-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Online freight quote calculator</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely implemented</span></td>
      </tr>
      <tr>
        <td class="feature">Shipment tracking integration</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not possible</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Built and integrated</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Complex, often skipped</span></td>
      </tr>
      <tr>
        <td class="feature">Coverage &amp; route pages (SEO)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Platform-locked</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full route page build</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often not built</span></td>
      </tr>
      <tr>
        <td class="feature">Client portal / B2B login</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Enterprise tier included</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">LogisticsService schema markup</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">Mobile PageSpeed score 90+</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Typically 40–65</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Guaranteed target</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely achieved</span></td>
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
  <h2 class="s-head" id="test-heading">What logistics companies say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Before the new website, we were winning contracts purely through referrals and cold calls. Within four months of launching, we were getting B2B freight enquiries directly from Google every week. The quote form alone has brought in three major corporate accounts that we would never have reached otherwise."</p>
      <div class="test-author">
        <div class="test-avatar">C</div>
        <div><div class="test-name">Mr. Chukwuemeka Obi</div><div class="test-role">CEO · SwiftRoute Logistics, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"The shipment tracking integration has been transformational for our operations. Our client support calls dropped by sixty percent in the first month — clients can now track their consignments themselves on the website. The team understood what a logistics company actually needs, not just what looks nice."</p>
      <div class="test-author">
        <div class="test-avatar">B</div>
        <div><div class="test-name">Mrs. Bola Adeyemi</div><div class="test-role">Operations Director · Apex Freight Solutions, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"We operate on both the UK and Nigeria corridor and needed a website that speaks to importers in the UK and exporters in Nigeria simultaneously. i2Medier understood the dual-market challenge completely. Our route pages now rank on Google in both markets and the B2B enquiries from UK-based importers alone have justified the entire project cost."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Mr. Aliyu Musa</div><div class="test-role">MD · Bridge Logistics Ltd, UK &amp; Nigeria</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free logistics website audit —<br>see why contracts are going to competitors</h2>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>logistics company web design</em></h2>
    </div>
    <p>A comprehensive guide to building a logistics company website that wins freight contracts, generates B2B enquiries, and ranks on Google — written for Nigerian and UK logistics operators.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for logistics companies">

      <h2>Why Nigerian logistics companies need professional websites in 2026</h2>
      <p>The Nigerian logistics sector has undergone a fundamental transformation in how buyers source and evaluate freight partners. What was once a business built entirely on telephone networks, personal relationships, and word-of-mouth referrals now operates in a digital marketplace where your website is evaluated before your phone is ever answered. Procurement managers at manufacturing companies, FMCG distributors, e-commerce platforms, and retail chains increasingly use Google as their first port of call when sourcing new logistics partners or benchmarking existing ones.</p>
      <p>Consider how a procurement manager at a Lagos-based consumer goods company evaluates freight suppliers. They search "logistics company Lagos" or "haulage company Nigeria", visit the top five results, and make an initial shortlist based entirely on what they see online — before a single conversation takes place. The companies on that shortlist share one characteristic: their websites look credible, operational, and professional. Those that do not make the cut may have superior trucks, more experienced drivers, and better service — but they never get the chance to demonstrate it.</p>
      <p>A professional logistics company website in 2026 is not a vanity project. It is the digital equivalent of your depot, your fleet, and your operations manual — working simultaneously, 24 hours a day, seven days a week, for every procurement manager, supply chain director, and e-commerce operator in your target geography. Companies that invest in this digital infrastructure consistently out-earn those that rely purely on traditional sales channels.</p>

      <h2>Winning B2B freight contracts through digital credibility</h2>
      <p>The highest-value freight contracts in Nigeria — the corporate accounts, the FMCG distributor relationships, the manufacturing plant supply chains — are won by logistics companies that project operational credibility at every touchpoint. Your website is the most frequently evaluated touchpoint in the entire buyer journey, and it needs to communicate several things simultaneously.</p>

      <h3>Fleet size and operational capacity</h3>
      <p>Corporate buyers want to know whether you can handle their volume. Fleet statistics — number of trucks, payload capacity, vehicle types, specialised equipment — displayed prominently on your website remove the doubt that prevents procurement teams from shortlisting smaller operators. A well-presented fleet page with professional photography signals operational scale even when the buyer has not yet spoken to your team.</p>

      <h3>Certifications and regulatory compliance</h3>
      <p>ISO certifications, NAFDAC compliance for pharmaceutical logistics, SON accreditation for regulated goods, and insurance certificates are powerful trust signals for corporate buyers. <strong>Companies evaluating logistics partners for sensitive or high-value cargo treat visible certification display as a minimum qualification requirement.</strong> Your website needs to display these prominently — not buried in an about page, but visible in the hero section and reinforced throughout the service pages.</p>

      <h3>Coverage area transparency</h3>
      <p>Buyers sourcing logistics partners for specific trade routes — Lagos to Abuja, Port Harcourt to Kano, cross-border to Ghana or Cameroon — need to quickly confirm that you cover their required lanes. An interactive coverage map, clearly structured route pages, and depot location information give buyers the operational clarity they need to shortlist your company. Without this, they click back to a competitor who makes their coverage instantly visible.</p>

      <h2>Online quote tools and lead generation for logistics firms</h2>
      <p>The single most impactful feature difference between logistics websites that generate enquiries and those that do not is the presence of an online freight quote form. B2B buyers in 2026 expect to initiate freight quote requests digitally — submitting cargo details, route requirements, and timeline preferences online and receiving a commercial response within hours, not days.</p>
      <p>A well-designed freight quote calculator on your website captures: origin and destination city, cargo type and commodity, weight and volume, number of pallets or units, collection date and delivery timeline requirement, and special handling requirements (temperature control, fragile goods, hazardous materials). This information allows your sales team to prepare an accurate, relevant quote immediately — rather than spending the first call asking questions the form has already answered.</p>
      <p>The business case for online quote tools is straightforward. Logistics companies with functional online quote forms consistently report three to five times more monthly enquiries compared to those with only a telephone number on their contact page. The barrier to initial engagement is dramatically lower when a procurement manager can submit a request at 9pm on a Sunday and receive a quote by 9am Monday — without having to speak to anyone until they are ready to commit.</p>

      <h2>Shipment tracking as a website feature and trust signal</h2>
      <p>Live shipment tracking visible on your website serves a dual purpose: it is a practical client service tool that reduces inbound support calls, and it is a powerful trust signal that communicates operational sophistication to prospective clients evaluating your company.</p>
      <p>From an operational perspective, the math is clear. If your company ships 200 consignments per week and each generates an average of 1.5 tracking enquiry calls, that is 300 calls per week consuming your operations team's time. A functional tracking widget on your website that allows clients to self-serve tracking information reduces those calls by 50–80% within the first month of launch — freeing your team to focus on operations rather than answering status enquiries.</p>
      <p>From a sales perspective, a live tracking widget on your website tells every prospective client who visits it that your company operates with systems and infrastructure — not just vehicles and drivers. It signals that if they entrust their supply chain to you, they will have visibility into their consignments. This is an expectation that every serious corporate buyer brings to the evaluation of a logistics partner, and meeting it visibly on your website significantly increases your conversion rate from visitor to enquiry.</p>

      <h2>SEO for logistics companies: ranking for freight routes and service keywords</h2>
      <p>Search engine optimisation for logistics companies requires a specific strategy that most generic web developers are not equipped to execute. The keyword landscape for logistics searches in Nigeria is rich, specific, and relatively underserved — which means the competitive opportunity is significant for companies willing to invest in proper SEO architecture.</p>
      <p>High-priority keyword categories for Nigerian logistics companies include:</p>
      <ul>
        <li><strong>Service + location combinations:</strong> "logistics company Lagos", "freight company Abuja", "courier service Port Harcourt", "haulage company Kano"</li>
        <li><strong>Route-specific searches:</strong> "freight Lagos to Abuja", "courier service Lagos to Port Harcourt", "transport company Abuja to Kano"</li>
        <li><strong>Service type searches:</strong> "air cargo Nigeria", "cold chain logistics Lagos", "last-mile delivery e-commerce Nigeria", "warehousing Apapa"</li>
        <li><strong>B2B-specific searches:</strong> "freight forwarding company Nigeria", "customs clearance agent Lagos", "FMCG distribution logistics Nigeria"</li>
        <li><strong>Industry vertical searches:</strong> "pharmaceutical logistics Nigeria", "FMCG logistics Lagos", "automotive parts freight Nigeria"</li>
      </ul>
      <p>The SEO strategy for logistics companies differs from other industries in one critical respect: route pages and coverage area pages carry outsized ranking weight. A dedicated page for "freight Lagos to Abuja" — with unique content describing your capacity on that lane, transit times, vehicle types available, and a route-specific quote form — will consistently outrank a generic homepage that merely mentions the route in passing. Building 20–30 route pages, each targeting a specific city pair or trade lane, creates a portfolio of highly targeted landing pages that collectively drive substantial organic traffic.</p>

      <h2>Pricing guide for logistics company websites in Nigeria</h2>
      <p>The cost of a logistics company website in Nigeria varies significantly based on the functionality required and the scale of the digital operation being built. As a general guide for the Nigerian market in 2026:</p>
      <ul>
        <li><strong>Essential logistics website</strong> (homepage, 6 service pages, online quote form, coverage map, basic SEO): ₦400,000–₦600,000</li>
        <li><strong>Growth website</strong> (full service pages, route pages, tracking integration, case studies, blog, advanced SEO): ₦800,000–₦1.4M</li>
        <li><strong>Enterprise platform</strong> (full client portal, shipment management system, fleet tracking, multi-depot, API integrations): ₦2M+</li>
      </ul>
      <p>The most important factor affecting ROI is not the upfront cost but the completeness of the SEO architecture and the functionality of the lead generation tools. A ₦300,000 website with no route pages, no online quote form, and no SEO foundation generates no enquiries and delivers no return. A ₦800,000 website with 25 route pages, a functional quote calculator, and a complete SEO setup can generate three to five significant B2B freight enquiries per month — paying for itself within 90 days of launch.</p>
      <p>For logistics companies operating across multiple Nigerian cities — Lagos, Abuja, Port Harcourt, Kano, Ibadan, Enugu — the investment in route pages and location-specific SEO is particularly high-return. Each city-pair route page targets buyers in a specific geography with specific freight requirements, and the cumulative effect of 30 route pages ranking for their respective keyword targets creates a search visibility advantage that compounds over time and is extremely difficult for competitors to replicate quickly.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website review and proposal for your logistics company.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Review →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why most logistics websites lose contracts</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for logistics companies</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about logistics<br>company <em>web design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every logistics company has different operational requirements. Email us and we will give you a direct, honest answer specific to your business — no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">Can you integrate shipment tracking into the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Yes — shipment tracking integration is one of our specialisms for logistics company websites. We integrate with your existing tracking system via API (if you have one), or we build a lightweight tracking database that your operations team can update directly. Clients enter a consignment number on your website and see live status updates — In Transit, Out for Delivery, Delivered — without calling your office. This typically reduces tracking enquiry calls by 50–80% within the first month.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can you build a B2B client portal for regular freight clients?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Yes. We build secure B2B client portals as part of our Enterprise tier — giving regular shipping clients a login where they can view shipment history, track current consignments, access invoices, and communicate with your operations team. The portal is HTTPS-encrypted, access-controlled per client account, and fully integrated with your main website. This is particularly valuable for corporate clients who ship weekly or monthly and expect account management tools from a professional logistics partner.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">Can you show our fleet and vehicle information on the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">Absolutely — and we recommend it strongly. Fleet pages with vehicle specifications, payload capacities, and professional photography are among the highest-converting content elements on logistics company websites. Corporate buyers evaluating freight partners want to know you have the physical capacity to handle their volume before they call. A well-designed fleet page with real photographs removes that doubt and significantly increases shortlisting rates. We build fleet pages as part of every logistics website we deliver.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">How do you display ISO certification and other accreditations?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">ISO certifications, NAFDAC compliance, insurance certificates, and other regulatory accreditations are integrated as primary trust anchors — not footnotes. We display certification badges in the hero section, in the navigation bar for cold chain and pharmaceutical logistics pages, and in a dedicated trust bar that appears on all key service pages. Certificate numbers, validity dates, and issuing bodies can also be displayed. For B2B buyers evaluating logistics partners for sensitive cargo, visible certification is a shortlisting requirement.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Can the website cover multiple depots and cities?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes — multi-depot and multi-city logistics operations are a core use case we design for. Each depot location gets its own location page with address, operating hours, contact details, and depot-specific services. Coverage maps show your operational geography clearly. Route pages are structured per city pair — Lagos to Abuja, Port Harcourt to Kano, and so on. This architecture is both operationally useful for clients and highly valuable for SEO, as each location page and route page targets city-specific search terms.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">How long does it take to build a logistics company website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">A standard logistics company website — homepage, 6–10 service pages, online quote form, coverage map, and full SEO — takes 3–5 weeks from design approval to launch. Larger builds with route pages, tracking integration, case studies, and a blog section take 5–7 weeks. Enterprise platforms with client portals and shipment management systems are typically 8–12 weeks depending on integration complexity. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Will our operations team be able to update the website themselves?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Yes — this is a core requirement for every logistics website we build. Your operations team can update service descriptions, coverage areas, fleet information, depot locations, case studies, and blog articles without touching code. We use ACF Pro to create intuitive editing interfaces specifically designed for non-technical users. Every handover includes a full CMS training session and a written admin guide covering every content management workflow your team will need — updating tracking statuses, adding new routes, publishing freight market insights, and managing client case studies.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a logistics website<br>that wins freight contracts?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We'll review your current site, map your freight keyword opportunities, and show you exactly what we'd build — and why.</p>
  <a href="{{ $startUrl }}" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
