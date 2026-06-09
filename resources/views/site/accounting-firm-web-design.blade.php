@extends('public.layouts.app')

@section('title', 'Web Design for Accounting Firms | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Design', 'item' => route('site.services.web-design')],
        ['@type' => 'ListItem', 'position' => 4, 'name' => 'Accounting Firm Web Design', 'item' => route('site.services.web-design.industry', ['industry' => 'accounting-firm-website-design'])],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'How much does a website for an accounting firm cost?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Accounting firm websites start from ₦350,000 for a professional 5–6 page site with contact forms and basic SEO. Full-featured growth websites with individual service pages, team profiles, blog, and advanced SEO start from ₦750,000. Enterprise platforms with client portals and custom integrations are quoted individually. We provide a detailed, itemised quote after a free consultation — no hidden fees.']],
        ['@type' => 'Question', 'name' => 'What pages should an accounting firm website have?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A high-performing accounting firm website should include: Home, About the Firm, Services (with individual pages for each accounting discipline — audit, tax, advisory, bookkeeping, payroll, etc.), Industries Served, Team and Partners, Blog/Insights, Contact, and optionally a Client Portal login page. Individual service pages are particularly important for SEO — they allow you to rank for specific searches like "tax advisory Lagos" or "audit services for NGOs Nigeria".']],
        ['@type' => 'Question', 'name' => 'How long does it take to build an accounting firm website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A standard accounting firm website typically takes 3–5 weeks from design approval to launch. Larger sites with many service pages, a blog section, and client portal integration may take 5–7 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when.']],
        ['@type' => 'Question', 'name' => 'Will my website rank on Google?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Every website we build includes a complete SEO foundation — semantic HTML structure, optimised title tags and meta descriptions, AccountingService and LocalBusiness schema markup, XML sitemap, canonical URLs, and Google Search Console setup. This gives your site the technical foundation to rank. For ongoing SEO campaigns targeting competitive accounting keywords in your city, we offer monthly retainer packages covering content creation, link building, and reporting.']],
        ['@type' => 'Question', 'name' => 'Do you build websites for sole accountants as well as large firms?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We work with sole practitioners, two-partner practices, mid-size CPA firms, and large multi-partner accounting groups. The scope and budget are calibrated to match the size of the practice and the range of services you offer. A sole practitioner\'s website has different requirements from a 20-partner firm\'s platform, and we design each accordingly.']],
        ['@type' => 'Question', 'name' => 'Can clients book appointments or upload documents through the website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We can integrate appointment scheduling (Calendly or custom booking forms), document upload portals for client onboarding, and secure enquiry forms. For firms that need a full client portal with document management, engagement letter delivery, and client communication logging, we build custom Laravel-based portal systems. These range from ₦800,000 upwards depending on functionality required.']],
        ['@type' => 'Question', 'name' => 'Will I be able to update the website myself after launch?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — this is a core principle of every site we build. We use ACF Pro to create intuitive editing interfaces for your service descriptions, team profiles, testimonials, blog posts, and all other content. You can update any content without touching code. Every handover includes a CMS training session and a written admin guide covering every content management workflow your team will need.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/accounting-firm-web-design.css')
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
      <span aria-current="page">Web Design for Accounting Firms</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Accounting Firm Web Design</span>
    <h1>Websites that win<br>clients for your<br><em>accounting firm</em></h1>
    <p class="hero-sub">We build professional, fast, and Google-ranked websites specifically for accounting firms, CPA practices, tax consultants, and chartered accountants — in Nigeria, the UK, and worldwide. Stop losing clients to competitors with better websites.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Accounting Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Built for accountants — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranked on Google from launch day</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria & UK specialists</span>
    </div>
  </div>

  <!-- Accounting website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
        <div>
          <div class="float-notif-text">New enquiry received</div>
          <div class="float-notif-sub">Tax advisory — Lagos · 2 min ago</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">adeyemicpa.com.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Adeyemi <span>& Co.</span></div>
            <div class="msn-links">
              <span class="msn-link">Services</span>
              <span class="msn-link">About</span>
              <span class="msn-link">Contact</span>
              <span class="msn-cta">Free Consult</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Chartered Accountants · Lagos</div>
            <div class="msh-h1">Trusted financial expertise<br>for <span>growing businesses</span></div>
            <div class="msh-sub">Audit, tax advisory, corporate finance, and bookkeeping for SMEs, startups, and corporates across Nigeria.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Book Free Consultation</span>
              <span class="msh-btn-s">Our Services →</span>
            </div>
          </div>
          <!-- Services -->
          <div class="mock-site-services">
            <div class="mss-label">Our Core Services</div>
            <div class="mss-grid">
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M4 20V10"/><path d="M10 20V4"/><path d="M16 20v-7"/><path d="M22 20v-4"/></svg></div><div class="mss-name">Audit & Assurance</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M8.5 9.5c0-1.1 1.1-2 2.5-2h2c1.4 0 2.5.9 2.5 2s-1.1 2-2.5 2h-2c-1.4 0-2.5.9-2.5 2s1.1 2 2.5 2h2c1.4 0 2.5-.9 2.5-2"/><path d="M12 6v12"/></svg></div><div class="mss-name">Tax Advisory</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M4 19h16"/><path d="m6 15 4-4 3 3 5-6"/></svg></div><div class="mss-name">Corporate Finance</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M5 4h10a3 3 0 0 1 3 3v13H8a3 3 0 0 0-3 3z"/><path d="M19 20H8a3 3 0 0 0-3 3V7a3 3 0 0 1 3-3"/></svg></div><div class="mss-name">Bookkeeping</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M3 21h18"/><path d="M5 21V7l7-4 7 4v14"/><path d="M9 9h6"/><path d="M9 13h6"/></svg></div><div class="mss-name">Company Secretarial</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/></svg></div><div class="mss-name">International Tax</div></div>
            </div>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">200<span>+</span></div><div class="mst-lbl">Clients</div></div>
            <div class="mst-item"><div class="mst-num">15<span>yrs</span></div><div class="mst-lbl">Experience</div></div>
            <div class="mst-item"><div class="mst-num">ICAN</div><div class="mst-lbl">Certified</div></div>
            <div class="mst-item"><div class="mst-num">4.9<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rating</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #2 · "accountant Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Audit & Assurance Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Tax Advisory Practices</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Chartered Accountants (ICAN / ACCA)</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Bookkeeping & Payroll Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Corporate Finance Advisors</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> CPA Practices</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Management Consultants</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Forensic Accountants</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Financial Advisors</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Insolvency Practitioners</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Audit & Assurance Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Tax Advisory Practices</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Chartered Accountants (ICAN / ACCA)</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Bookkeeping & Payroll Services</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Corporate Finance Advisors</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> CPA Practices</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Management Consultants</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Forensic Accountants</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Financial Advisors</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Insolvency Practitioners</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most accounting firm<br>websites <em>lose clients</em></h2>
    </div>
    <p>A prospective client visits your website before they ever call your office. Within seven seconds they have made a judgement about your firm's credibility, competence, and relevance to their needs. If your website does not pass that test, they click back and hire your competitor. Here is what is going wrong on most accounting firm websites — and what we do about it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M8 10h8"/><path d="M7 14h10"/><path d="M6 12a6 6 0 1 1 12 0v3a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2z"/><path d="M4 13h2"/><path d="M18 13h2"/></svg></span>
      <h3 class="prob-title">Slow, outdated websites that signal the wrong things</h3>
      <p class="prob-desc">A slow website does not just frustrate visitors — it signals that your firm is not current. Business owners applying the same logic they use for supplier evaluation conclude: if their website is like this, how are they with my accounts?</p>
      <div class="prob-solution"><strong>Our Fix</strong> Custom-built WordPress or Laravel sites that load in under 2 seconds — tested, optimised, and scoring 90+ on Google PageSpeed.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Invisible on Google when clients are actively searching</h3>
      <p class="prob-desc">When a Lagos SME owner searches "chartered accountant Lagos" or "tax advisor Nigeria", your firm does not appear. That search goes to a competitor who understood that a website without SEO is a brochure no one ever reads.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every site includes a full SEO foundation — structured data, keyword-optimised service pages, local SEO, and Google Search Console setup from day one.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
      <h3 class="prob-title">Looks broken on mobile — where 74% of visits happen</h3>
      <p class="prob-desc">Over 74% of Nigerian web traffic arrives on a mobile device. If your website does not look and work perfectly on a phone, you are turning away the majority of your potential clients before they read a word of your content.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every design begins on mobile — responsive at all breakpoints, touch-optimised, and tested on real devices across Android and iOS.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <h3 class="prob-title">Generic copy that fails to communicate your firm's value</h3>
      <p class="prob-desc">"We provide excellent accounting services with integrity and professionalism." Every accounting firm says this. None of it is differentiated. Visitors cannot understand what you specialise in, who you serve, or why they should choose you over any other firm on the list.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Clear service pages for each discipline you offer, industry-specific content, and positioning copy that communicates your firm's distinct expertise.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.3 19.3 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 3a2 2 0 0 1-.6 1.8L7.2 10.3a16 16 0 0 0 6.5 6.5l1.8-1.8a2 2 0 0 1 1.8-.6l3 .5a2 2 0 0 1 1.7 2Z"/></svg></span>
      <h3 class="prob-title">No clear path from visitor to enquiry</h3>
      <p class="prob-desc">Interested visitors cannot figure out how to contact you, what the next step is, or why they should act now. The website gets traffic but generates zero leads because there is no conversion architecture guiding visitors to make contact.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Conversion-optimised page layouts with clear CTAs, appointment booking, consultation request forms, and a lead generation flow on every key page.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></span>
      <h3 class="prob-title">No credentials, awards, or social proof on display</h3>
      <p class="prob-desc">ICAN membership, ACCA fellowship, Big Four training, industry awards, years in practice — these are powerful trust signals that your website hides in a paragraph or a footer footnote instead of leading with them prominently.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Professional credentials, accreditation badges, testimonials, case studies, and team profiles designed as primary trust elements — not afterthoughts.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your accounting<br>firm's website <em>needs</em></h2>
      <p>A high-performing accounting firm website is not a homepage and a contact form. It is a structured, strategic set of pages — each designed to serve a specific audience at a specific stage of their decision process, and each optimised to rank for the search terms your clients use when they need help.</p>
      <p>We map your services, specialisms, industries, and team to a comprehensive page architecture that works for both Google and your prospective clients.</p>
      <ul class="bullets">
        <li>Homepage — credibility, differentiation, and a clear path to enquiry</li>
        <li>Individual service pages — one per discipline (Audit, Tax, Advisory, Payroll, etc.)</li>
        <li>Industry pages — SMEs, Startups, NGOs, Real Estate, Healthcare, and others</li>
        <li>Team & Partners — professional bios with credentials prominently displayed</li>
        <li>About the Firm — history, culture, values, regulatory memberships</li>
        <li>Blog / Insights — thought leadership that drives organic search traffic</li>
        <li>Contact page — with direct lines, office address, Google Maps, and enquiry form</li>
        <li>Client Portal login — connecting to your practice management software</li>
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
        <div class="page-card-head"><span class="pch-name">Tax Advisory</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Audit & Assurance</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Our Team</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Industries Served</span><span class="pch-badge key">SEO Priority</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>accounting firms</em></h2>
    </div>
    <p>Every accounting firm website we build is designed around the specific trust signals, compliance requirements, and conversion patterns of professional services firms. These are not generic business website features — they are accounting-firm-specific elements that have a direct impact on whether a visiting prospect makes contact.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></div>
      <h3 class="svc-title">Professional Credentials Display</h3>
      <p class="svc-desc">ICAN, ACCA, ICAEW, CIMA, CPA — your regulatory memberships and certifications are displayed prominently as trust anchors. Accreditation badges, fellowship designations, and practice licence numbers are integrated into the design, not buried in the footer.</p>
      <div class="svc-tags"><span class="svc-tag">ICAN Badge</span><span class="svc-tag">ACCA</span><span class="svc-tag">License Display</span><span class="svc-tag">Awards</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
      <h3 class="svc-title">Consultation Booking & Lead Capture</h3>
      <p class="svc-desc">Multi-step enquiry forms that capture the right information — service needed, business size, urgency — so you can pre-qualify prospects before the first call. Calendly integration for direct appointment booking. Every submission goes to your email and CRM immediately.</p>
      <div class="svc-tags"><span class="svc-tag">Booking Forms</span><span class="svc-tag">Calendly</span><span class="svc-tag">CRM Integration</span><span class="svc-tag">Lead Capture</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">SEO for Accounting Keywords</h3>
      <p class="svc-desc">Title tags, meta descriptions, and content optimised for high-intent accounting search terms — "tax advisor [city]", "chartered accountant for SMEs", "bookkeeping services Nigeria". AccountingService, LocalBusiness, and Person schema markup for rich search results.</p>
      <div class="svc-tags"><span class="svc-tag">Accounting Keywords</span><span class="svc-tag">Schema Markup</span><span class="svc-tag">Local SEO</span><span class="svc-tag">GSC Setup</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/><circle cx="9.5" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.1a4 4 0 0 1 0 7.8"/></svg></div>
      <h3 class="svc-title">Team & Partner Profiles</h3>
      <p class="svc-desc">Professional bio pages for every partner and key staff member — with credentials, specialisms, photo, and contact details. Human faces build trust in professional services. Individual partner pages also create additional SEO opportunities for name-search rankings.</p>
      <div class="svc-tags"><span class="svc-tag">Partner Profiles</span><span class="svc-tag">Person Schema</span><span class="svc-tag">Credentials</span><span class="svc-tag">Photos</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20"/><path d="M5 2h13a2 2 0 0 1 2 2v18"/><path d="M8 7h8"/><path d="M8 11h8"/><path d="M8 15h5"/></svg></div>
      <h3 class="svc-title">Tax & Finance Blog / Insights</h3>
      <p class="svc-desc">A fully managed WordPress blog section for publishing tax updates, budget analysis, financial planning guides, and industry commentary. Each article is an additional SEO landing page — building topical authority and bringing in organic traffic from long-tail searches over time.</p>
      <div class="svc-tags"><span class="svc-tag">WordPress CMS</span><span class="svc-tag">SEO Articles</span><span class="svc-tag">Newsletter Signup</span><span class="svc-tag">Taxonomies</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></div>
      <h3 class="svc-title">Client Portal & Secure Document Upload</h3>
      <p class="svc-desc">A secure client portal for document upload, tax return access, and client communications — integrated with your practice management software or built custom. Every portal is HTTPS, access-controlled, and meets the data security expectations of professional firm clients.</p>
      <div class="svc-tags"><span class="svc-tag">Document Upload</span><span class="svc-tag">Client Login</span><span class="svc-tag">SSL Encrypted</span><span class="svc-tag">Xero / Sage API</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Accountants</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when clients are<br>searching for <em>your services</em></h2>
      <p>The most important moment in your client acquisition journey is when a business owner opens Google and types "accountant near me" or "tax advisory firm Lagos". If you are not on page one, you do not exist. Every website we build for accounting firms is engineered to rank for the exact search terms your clients use.</p>
      <p>We do not just build websites — we build search visibility. Your home page, each service page, your local office pages, and your blog articles are all individually optimised for specific keyword targets. We implement AccountingService and LocalBusiness schema markup so Google understands exactly what you do and who you serve.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each accounting service you offer</li>
        <li>Location pages targeting every city or region where you have clients</li>
        <li>AccountingService + LocalBusiness JSON-LD schema markup on every relevant page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Citation building across Nigerian and international business directories</li>
        <li>Long-tail keyword content strategy targeting low-competition, high-intent searches</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Accounting Firm — Keyword Rankings (before & after)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">chartered accountant lagos</span>
            <span class="kw-vol">2,900/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">tax advisory nigeria</span>
            <span class="kw-vol">1,600/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">audit firm nigeria</span>
            <span class="kw-vol">1,200/mo</span>
            <span class="kw-pos top10">▲ #6</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">bookkeeping services lagos</span>
            <span class="kw-vol">880/mo</span>
            <span class="kw-pos top3">▲ #3</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">ican accountant abuja</span>
            <span class="kw-vol">720/mo</span>
            <span class="kw-pos top10">▲ #4</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">corporate tax consultant nigeria</span>
            <span class="kw-vol">590/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">payroll services sme nigeria</span>
            <span class="kw-vol">480/mo</span>
            <span class="kw-pos top10">▲ #5</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">cpa firm port harcourt</span>
            <span class="kw-vol">360/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active accounting firm SEO campaign</div>
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
    <p>We have built websites for professional services firms across Nigeria and the UK. These are the outcomes our clients consistently see.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="340">0</span><span>%</span></div>
      <div class="trust-label">Average increase in organic Google search visibility within the first 90 days of a new accounting firm website launch</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="96">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) achieved on our custom-built accounting firm websites — no page builder bloat</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="6">0</span><span>×</span></div>
      <div class="trust-label">Increase in monthly website enquiries reported by accounting clients within 6 months of launch, compared to their previous website</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched accounting firm website — with a guaranteed, milestone-based delivery timeline</div>
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
      <h2 class="s-head" id="process-heading">From brief to live site<br>in <em>five structured steps</em></h2>
    </div>
    <p>We have delivered over 120 professional service websites. This process works — it has been refined across every one of them to eliminate the surprises, delays, and scope disagreements that make most agency relationships frustrating.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery & Site Architecture</div>
      <p class="proc-desc">A structured discovery session covering your firm's services, specialist areas, target clients, competitive landscape, and goals. We map your complete site architecture — every page, every content type, every keyword target — and agree on it in writing before any design work begins. This document governs the entire project and prevents scope drift.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Keyword Map</span><span class="proc-tag">Signed Brief</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Design — Professional, Not Generic</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for all key pages. We design your brand colours, professional photography placement, credentials display, and conversion elements to work as a coherent system. Two revision rounds are included. You approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">WordPress Build — Custom Theme</div>
      <p class="proc-desc">Your website is built on a custom PHP WordPress theme — no Elementor, no page builders. ACF Pro powers your service pages, team profiles, testimonials, and insights — all fully editable from WordPress admin without touching code. A staging environment is accessible throughout the build so you can review progress at any point.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">ACF Pro</span><span class="proc-tag">Staging Access</span><span class="proc-tag">Booking Integration</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO Setup & Content Entry</div>
      <p class="proc-desc">Your content is entered across all pages, formatted correctly, and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, schema markup (AccountingService, LocalBusiness, Person), canonical URLs, XML sitemap, and Google Search Console submission. Google Analytics 4 is installed, goals configured, and all tracking verified before launch.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA, Launch & Training</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 90+), form testing, link verification, and a final review call before launch day. Your domain is transferred to the new site, SSL is verified, and Cloudflare is configured. You receive a 45-minute CMS training session, a written admin guide, and a 30-day post-launch support window.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">30-Day Support</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly SEO & Maintenance Retainer</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your site ranking and running perfectly — publishing tax and finance insights articles, building local SEO citations, monitoring Core Web Vitals, updating WordPress, running daily backups, and delivering monthly keyword ranking reports. Most accounting firm clients see their strongest ROI in months 4–12.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Content Creation</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Accounting websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the firm's services, specialisms, and target client base.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--navy) 0%,#1a3060 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Adeyemi & Co.</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Chartered Accountants</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Tax</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Audit</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Advisory</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Chartered Accountants</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Accounting Firm · Lagos, Nigeria</div>
        <div class="port-title">Adeyemi & Co. Chartered Accountants</div>
        <p class="port-desc">Full website with 12 service pages, team profiles, client portal login, and an SEO campaign that reached page one for "chartered accountant Lagos" within 90 days.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a2218 0%,#0e3828 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Okwu Tax Partners</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Tax Advisory · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">FIRS</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Transfer Pricing</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">International</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Tax Advisory</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Tax Advisory Firm · Abuja, Nigeria</div>
        <div class="port-title">Okwu Tax Partners</div>
        <p class="port-desc">Specialist tax advisory firm website with service pages targeting FIRS compliance, transfer pricing, and international tax — with appointment booking and insights blog.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#2d1b69 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Pinnacle Finance Advisory</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Financial Advisors · UK</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">ACCA</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">SME Advisory</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Payroll</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Financial Advisors · UK</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Financial Advisory Firm · United Kingdom</div>
        <div class="port-title">Pinnacle Finance Advisory</div>
        <p class="port-desc">ACCA-accredited firm website for a UK-based practice serving Nigerian diaspora and SME clients — with dual market content strategy targeting both UK and Nigerian search intent.</p>
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
    <p>Not all web development options are equal — especially for professional services firms where credibility is your product.</p>
  </div>
  <div class="compare-wrap"><table class="compare-table reveal" role="table" aria-label="Web design comparison for accounting firms">
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
        <td class="feature">Built specifically for accounting firms</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Accounting-specific design</span></td>
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
        <td class="feature">AccountingService schema markup</td>
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
  </table></div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What accounting firms say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Our old website was embarrassing honestly. Within three months of launching the new one, we were getting five to seven new client enquiries a week — all from Google. The team understood what chartered accountants need to communicate online without us having to explain it."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Akin Adeyemi ACA</div><div class="test-role">Managing Partner · Adeyemi & Co., Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"I was skeptical that a website could make a difference for a tax practice where clients come by referral. I was wrong. We now rank number one for three of our target search terms in Abuja and the enquiries that come in are already qualified — they have read about our services before calling."</p>
      <div class="test-author">
        <div class="test-avatar">C</div>
        <div><div class="test-name">Chidi Okwu FCCA</div><div class="test-role">Founding Partner · Okwu Tax Partners, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"The client portal they built alongside our main website has genuinely changed how we operate. Clients upload documents securely, we send engagement letters through it, and everything is tracked. It has saved our team hours every week. And the website itself is the best in our space."</p>
      <div class="test-author">
        <div class="test-avatar">F</div>
        <div><div class="test-name">Funke Adeola ACCA</div><div class="test-role">Director · Pinnacle Finance Advisory, UK</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free 30-minute website<br>review for your firm</h2>
    <p>We will audit your current site, identify your biggest ranking and conversion gaps, and show you exactly what a new website would fix. No commitment required.</p>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>accounting firm web design</em></h2>
    </div>
    <p>A comprehensive guide to building an accounting firm website that attracts clients, builds credibility, and ranks on Google — written for Nigerian and UK practices.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for accounting firms">

      <h2>Why every accounting firm needs a professional website in 2025</h2>
      <p>The accounting profession has changed significantly in the past decade. What was once a business built entirely on referrals and personal relationships now operates in a marketplace where your digital presence is often the first point of contact between your firm and a prospective client. This is especially true in Nigeria, where smartphone adoption is accelerating and business owners increasingly use Google as their first port of call when seeking professional services.</p>
      <p>Consider the client journey of a Lagos SME owner whose accountant has just retired. They ask one or two trusted contacts for recommendations and get three names. Before calling any of them, they do what almost everyone does: they Google each firm. The firm with the most professional, credible, and informative website wins that first-impression battle — before a single word has been spoken.</p>
      <p>A professional accounting firm website is no longer a luxury or a vanity project. It is the digital equivalent of your office reception, your partner directory, and your firm brochure — working simultaneously, 24 hours a day, seven days a week, for every prospective client in your target geography.</p>

      <h2>What makes a great accounting firm website?</h2>
      <p>The best accounting firm websites share a set of characteristics that distinguish them from generic business websites. Understanding these helps clarify what you should be asking for when commissioning a new site.</p>

      <h3>Immediate professional credibility</h3>
      <p>Within three seconds of landing on your homepage, a visitor should have formed a clear, positive impression of your firm's calibre. This comes from visual design quality, the prominence of your regulatory credentials (ICAN, ACCA, ICAEW), the professional quality of partner photography, and the clarity of the headline message. <strong>Credibility is communicated visually before a word is read.</strong></p>

      <h3>Clear, differentiated service descriptions</h3>
      <p>Every accounting service page should describe not just what the service is, but who it is for, what problems it solves, and what the process of working with you looks like. Generic descriptions like "we provide tax services" are invisible to both prospective clients and Google. Specific descriptions — "FIRS compliance and transfer pricing documentation for multinational subsidiaries operating in Nigeria" — attract the right clients and rank for the right search terms.</p>

      <h3>Multiple, low-friction routes to enquiry</h3>
      <p>Some prospective clients want to fill in a form. Others want to call directly. Others want to book a consultation online. A high-performing accounting firm website offers all three — prominently, on every key page — and makes each pathway as frictionless as possible. A multi-step consultation request form that asks for the service type and business size up front also helps your team respond with relevant information immediately.</p>

      <h3>Technical SEO foundations</h3>
      <p>Without technical SEO, a beautifully designed website remains invisible to the clients you are trying to reach. AccountingService schema markup tells Google precisely what your firm does. LocalBusiness schema with GeoCoordinates helps you appear in local search results. Individual service pages targeting specific keyword combinations — "corporate tax advisory Lagos", "audit services for NGOs Nigeria" — capture clients who know what they need and are ready to engage.</p>

      <h2>SEO keywords for accounting firms in Nigeria and the UK</h2>
      <p>Keyword research for accounting firms reveals a rich long-tail landscape — prospective clients search with high specificity, which means ranking for detailed keyword combinations is often more achievable (and more valuable) than competing for broad terms.</p>
      <p>High-priority keyword categories for Nigerian accounting firms include:</p>
      <ul>
        <li><strong>Service + location combinations:</strong> "chartered accountant Lagos", "tax advisor Abuja", "audit firm Port Harcourt"</li>
        <li><strong>Service + industry combinations:</strong> "accountant for startups Nigeria", "NGO audit services", "SME bookkeeping Lagos"</li>
        <li><strong>Credential-based searches:</strong> "ICAN certified accountant", "ACCA qualified accountant Nigeria"</li>
        <li><strong>Problem-based searches:</strong> "FIRS tax compliance help", "how to file company tax Nigeria", "transfer pricing Nigeria"</li>
        <li><strong>Comparison searches:</strong> "best accounting firm in Lagos", "top CPA firms Nigeria"</li>
      </ul>
      <p>For UK-based Nigerian diaspora accounting practices, the keyword opportunity expands to include UK-specific regulatory terms alongside Nigerian-market content — creating a dual-audience strategy that serves both markets from a single website.</p>

      <h2>How much should an accounting firm website cost?</h2>
      <p>The honest answer is: it depends on what the website needs to do. A sole practitioner who wants a clean, professional online presence to validate referrals and capture direct enquiries has very different requirements from a 15-partner firm with six service lines, a client portal, and an active content marketing strategy.</p>
      <p>As a general guide for the Nigerian market:</p>
      <ul>
        <li><strong>Essential brochure site</strong> (5–6 pages, contact form, basic SEO): ₦350,000–₦500,000</li>
        <li><strong>Growth website</strong> (10–15 pages, service pages, team profiles, blog, advanced SEO): ₦750,000–₦1.2M</li>
        <li><strong>Enterprise platform</strong> (20+ pages, client portal, multi-office, custom integrations): ₦1.5M+</li>
      </ul>
      <p>The single most important factor affecting ROI is not the upfront cost — it is the quality of the build and the SEO foundation. A ₦200,000 website that ranks nowhere and generates no enquiries has a negative return. A ₦750,000 website that brings in two new fee-paying clients per month pays for itself inside 90 days.</p>

      <h2>Building a website that grows with your practice</h2>
      <p>The best accounting firm websites are not finished products — they are living platforms that grow as the practice grows. Starting with a strong content management system (WordPress with ACF Pro is our recommendation) means you can add service pages, publish insights articles, create industry-specific landing pages, and expand into new geographic markets without rebuilding from scratch.</p>
      <p>Your website should be thought of as an asset that compounds over time. Every insights article you publish is an additional search entry point. Every service page you optimise is another route for a prospective client to find you. Every Google Business Profile review you earn strengthens your local search rankings. The firms that build this compound growth into their digital strategy from the outset are the ones that dominate search results in their markets within 12–18 months.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website review and proposal for your accounting firm.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Review →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why most firm websites lose clients</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for accountants</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about accounting<br>firm <em>web design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every accounting firm has different needs. Email us and we'll give you a direct, honest answer specific to your firm — no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">How much does a website for an accounting firm cost?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Accounting firm websites start from ₦350,000 for a professional 5–6 page site with contact forms and basic SEO. Full-featured growth websites with individual service pages, team profiles, blog, and advanced SEO start from ₦750,000. Enterprise platforms with client portals and custom integrations are quoted individually. We provide a detailed, itemised quote after a free consultation — no hidden fees.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">What pages should an accounting firm website have?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">A high-performing accounting firm website should include: Home, About the Firm, Services (with individual pages for each accounting discipline — audit, tax, advisory, bookkeeping, payroll, etc.), Industries Served, Team and Partners, Blog/Insights, Contact, and optionally a Client Portal login page. Individual service pages are particularly important for SEO — they allow you to rank for specific searches like "tax advisory Lagos" or "audit services for NGOs Nigeria".</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">How long does it take to build an accounting firm website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">A standard accounting firm website typically takes 3–5 weeks from design approval to launch. Larger sites with many service pages, a blog section, and client portal integration may take 5–7 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Will my website rank on Google?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Every website we build includes a complete SEO foundation — semantic HTML structure, optimised title tags and meta descriptions, AccountingService and LocalBusiness schema markup, XML sitemap, canonical URLs, and Google Search Console setup. This gives your site the technical foundation to rank. For ongoing SEO campaigns targeting competitive accounting keywords in your city, we offer monthly retainer packages covering content creation, link building, and reporting.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Do you build websites for sole accountants as well as large firms?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes. We work with sole practitioners, two-partner practices, mid-size CPA firms, and large multi-partner accounting groups. The scope and budget are calibrated to match the size of the practice and the range of services you offer. A sole practitioner's website has different requirements from a 20-partner firm's platform, and we design each accordingly.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Can clients book appointments or upload documents through the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">Yes. We can integrate appointment scheduling (Calendly or custom booking forms), document upload portals for client onboarding, and secure enquiry forms. For firms that need a full client portal with document management, engagement letter delivery, and client communication logging, we build custom Laravel-based portal systems. These range from ₦800,000 upwards depending on functionality required.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Will I be able to update the website myself after launch?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Yes — this is a core principle of every site we build. We use ACF Pro to create intuitive editing interfaces for your service descriptions, team profiles, testimonials, blog posts, and all other content. You can update any content without touching code. Every handover includes a CMS training session and a written admin guide covering every content management workflow your team will need.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build an accounting firm<br>website that wins clients?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We'll review your current site, map your keyword opportunities, and show you exactly what we'd build — and why.</p>
  <a href="{{ $startUrl }}" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
