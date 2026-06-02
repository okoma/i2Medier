@extends('public.layouts.app')

@section('title', 'Web Design for Architecture Firms | Architect Portfolio Websites Nigeria | i2Medier')

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/architecture-firm-web-design.css')
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
      <span aria-current="page">Web Design for Architecture Firms</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Architecture Firm Web Design</span>
    <h1>Portfolio websites that win<br>premium projects for your<br><em>architecture studio</em></h1>
    <p class="hero-sub">We design visually exceptional, fast, and Google-ranked websites for architecture firms, studios, and interior design practices in Nigeria, the UK, and worldwide. Your portfolio deserves a website as impressive as your buildings.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Architecture Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Portfolio-first design</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranked on Google from launch</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></span> NIA &amp; ARCON accredited display</span>
    </div>
  </div>

  <!-- Architecture website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="M9 22V12h6v10"/></svg></div>
        <div>
          <div class="float-notif-text">New project brief received</div>
          <div class="float-notif-sub">Luxury Residential · Lagos · 4 min ago</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">studioforma.com.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Studio <span>Forma</span></div>
            <div class="msn-links">
              <span class="msn-link">Portfolio</span>
              <span class="msn-link">Services</span>
              <span class="msn-link">Studio</span>
              <span class="msn-cta">Contact</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Architecture Studio · Lagos, Nigeria</div>
            <div class="msh-h1">Architecture That<br><span>Transforms Space</span></div>
            <div class="msh-sub">Award-winning residential, commercial, and cultural architecture across Nigeria and West Africa.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">View Portfolio</span>
              <span class="msh-btn-s">Start a Project →</span>
            </div>
          </div>
          <!-- Project grid -->
          <div class="mock-site-projects">
            <div class="msp-label">Selected Projects</div>
            <div class="msp-grid">
              <div class="msp-card"><div class="msp-cat">Residential</div><div class="msp-name">Luxury Villa<br>Lekki Phase II</div></div>
              <div class="msp-card"><div class="msp-cat">Commercial</div><div class="msp-name">Commercial Tower<br>Victoria Island</div></div>
              <div class="msp-card"><div class="msp-cat">Interior</div><div class="msp-name">Corporate Fit-Out<br>Ikoyi, Lagos</div></div>
              <div class="msp-card"><div class="msp-cat">Cultural</div><div class="msp-name">Cultural Centre<br>Abuja FCT</div></div>
            </div>
          </div>
          <!-- Awards -->
          <div class="mock-site-awards">
            <span class="msa-badge">NIA Award 2023</span>
            <span class="msa-badge">NIA Award 2022</span>
            <span class="msa-badge">NIA Award 2021</span>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">45<span>+</span></div><div class="mst-lbl">Projects</div></div>
            <div class="mst-item"><div class="mst-num">12<span>yrs</span></div><div class="mst-lbl">Experience</div></div>
            <div class="mst-item"><div class="mst-num">ARCON</div><div class="mst-lbl">Registered</div></div>
            <div class="mst-item"><div class="mst-num">4.9<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rating</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "architect Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Architecture Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Interior Design Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Urban Planning Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Landscape Architecture</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Residential Architects</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Commercial Architects</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Industrial Design Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Sustainable Architecture Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Heritage Conservation Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Masterplanning Consultancies</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Architecture Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Interior Design Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Urban Planning Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Landscape Architecture</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Residential Architects</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Commercial Architects</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Industrial Design Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Sustainable Architecture Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Heritage Conservation Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Masterplanning Consultancies</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most architecture firm<br>websites <em>lose projects</em></h2>
    </div>
    <p>A prospective developer, private client, or government body visits your website before they ever call your studio. Within seven seconds they have formed a judgement about your design capability, professional standing, and suitability for their brief. If your website fails that test, they move to the next name on their shortlist. Here is exactly what is going wrong on most architecture firm websites — and what we do to fix it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></span>
      <h3 class="prob-title">A portfolio buried in PDF files instead of a stunning online showcase</h3>
      <p class="prob-desc">Emailing PDFs of your projects to prospective clients is not a portfolio strategy — it is a liability. Your best work is trapped in documents that load slowly, look inconsistent across devices, and cannot be found on Google. Projects that took years to deliver deserve a showcase that is equally considered.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A beautifully structured online portfolio with individual project pages, high-resolution images properly optimised for fast web loading, typology filters, and project case studies that tell the full story of your work.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Invisible on Google when developers and private clients search for architects</h3>
      <p class="prob-desc">When a Lagos real estate developer searches "residential architect Lagos" or "architecture firm for commercial project Nigeria", your studio does not appear. That search — worth potentially millions in project fees — goes to a competitor who understood that a beautiful website without SEO is an island with no bridge.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every site we build includes a complete SEO foundation targeting the search terms your ideal clients use. Typology-specific service pages, local SEO for Lagos, Abuja, and Port Harcourt, and structured data that Google reads correctly from day one.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
      <h3 class="prob-title">Generic website that fails to communicate the studio's design philosophy</h3>
      <p class="prob-desc">Architecture is sold on vision and conviction. A generic template website communicates nothing distinctive about how your studio approaches design, what you believe about space, or why a developer should choose you over the next firm on the list. Prospective clients need to feel your philosophy before they call.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Custom-designed website with a dedicated design philosophy page, studio story, principal architect voice, and visual identity that communicates your studio's distinct approach before a word is read.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></span>
      <h3 class="prob-title">No NIA/ARCON credentials displayed — a trust gap for institutional clients</h3>
      <p class="prob-desc">Government agencies, corporate clients, and serious private developers need to know immediately that they are dealing with a registered, professionally accredited architect. If your NIA membership and ARCON registration number are not prominently displayed, you are creating an unnecessary trust gap that costs you institutional briefs.</p>
      <div class="prob-solution"><strong>Our Fix</strong> NIA membership badges, ARCON registration numbers, and professional accreditations displayed prominently as primary trust anchors — not buried in a footer paragraph. We also implement the correct schema markup so Google recognises your professional status.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="m9 9 6 6"/><path d="m15 9-6 6"/></svg></span>
      <h3 class="prob-title">Poor image loading — your best work looks slow and compressed</h3>
      <p class="prob-desc">Architecture is a visual profession. If your project images load slowly, appear compressed, or look pixelated on high-resolution displays, they communicate the opposite of quality. A 7-second image load on a residential villa project sends the wrong message before the client has seen a single elevation drawing.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Professional image optimisation pipeline — WebP conversion, lazy loading, responsive image srcsets, and CDN delivery — so every project image loads fast and looks exceptional on every screen, from mobile to 4K monitor.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M4 19h16"/><path d="m6 15 4-4 3 3 5-6"/></svg></span>
      <h3 class="prob-title">No project case studies explaining your process, not just the outcome</h3>
      <p class="prob-desc">Showing photographs of completed buildings is the minimum. The clients who pay the highest fees want to understand your process — how you approached the brief, what challenges arose, what decisions you made and why, and what the outcome meant for the client. Without case studies, you are selling photographs, not expertise.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Individual project case study pages with structured narrative: the brief, the design challenge, the concept, the process, key decisions, and the outcome. Each page is also an SEO-indexed asset that ranks for project-type and location searches.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your architecture<br>studio's website <em>needs</em></h2>
      <p>A high-performing architecture firm website is not a homepage and a contact form. It is a carefully structured set of pages — each serving a specific type of client at a specific stage of their decision process, and each optimised to rank for the search terms developers, private clients, and institutional bodies use when shortlisting architects.</p>
      <p>We map your project typologies, services, team, credentials, and studio philosophy to a comprehensive page architecture that works for both Google and your prospective clients — whether they are a Lekki private client or a government ministry seeking a masterplanning consultant.</p>
      <ul class="bullets">
        <li>Homepage with featured projects — credibility, philosophy, and a clear path to enquiry</li>
        <li>Full project portfolio with filters (residential, commercial, interior, cultural, masterplanning, etc.)</li>
        <li>Individual project case study pages — brief, concept, process, and outcome</li>
        <li>Studio philosophy &amp; design approach — your vision communicated with conviction</li>
        <li>Team &amp; principal architect profiles — credentials, specialisms, NIA/ARCON registration</li>
        <li>Awards &amp; accreditation page — NIA awards, ARCON credentials, competition wins</li>
        <li>Services breakdown — architecture, interior design, masterplanning, urban design</li>
        <li>Client testimonials from completed project clients</li>
        <li>Contact &amp; studio visit — office address, map, project brief submission form</li>
      </ul>
      <a href="#contact" class="build-cta">Plan My Website Architecture →</a>
    </div>

    <!-- Pages wireframe visual -->
    <div class="pages-visual reveal" aria-hidden="true">
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Project Portfolio</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Project Case Study</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Architecture Services</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Studio &amp; Team</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Awards &amp; Credentials</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Design Philosophy</span><span class="pch-badge key">SEO Engine</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>architecture firms</em></h2>
    </div>
    <p>Every architecture firm website we build is designed around the specific trust signals, portfolio presentation requirements, and conversion patterns of design-led professional firms. These are not generic business website features — they are architecture-specific elements that have a direct impact on whether a prospective client submits a project brief or calls the next studio on their shortlist.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></div>
      <h3 class="svc-title">Portfolio Showcase (Filterable by Typology)</h3>
      <p class="svc-desc">A beautifully designed filterable portfolio gallery — organised by typology (residential, commercial, interior, cultural, masterplanning), scale, and location. Each project is individually accessible, SEO-indexed, and displayed with high-resolution imagery properly optimised for fast loading across all devices. Your work is presented the way it deserves to be seen.</p>
      <div class="svc-tags"><span class="svc-tag">Typology Filters</span><span class="svc-tag">Project Grid</span><span class="svc-tag">Image Optimisation</span><span class="svc-tag">Location Tags</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4 19h16"/><path d="m6 15 4-4 3 3 5-6"/></svg></div>
      <h3 class="svc-title">Project Case Study Pages</h3>
      <p class="svc-desc">Individual case study pages for flagship projects — structured around the brief, design challenge, concept development, process documentation, material selections, and the final outcome. Each page builds SEO authority for project-type and location searches while communicating depth of expertise that photography alone cannot convey to institutional and developer clients.</p>
      <div class="svc-tags"><span class="svc-tag">Project Narrative</span><span class="svc-tag">Process Docs</span><span class="svc-tag">Before &amp; After</span><span class="svc-tag">Schema Markup</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></div>
      <h3 class="svc-title">NIA/ARCON Credentials &amp; Awards Display</h3>
      <p class="svc-desc">Your NIA membership, ARCON registration number, fellowship designations, and competition awards are displayed prominently as primary trust elements — not footnotes. NIA award badges, ARCON licence numbers, and institutional accreditations are integrated into the design system and implemented with the correct structured data so Google recognises your professional standing.</p>
      <div class="svc-tags"><span class="svc-tag">NIA Badge</span><span class="svc-tag">ARCON Registration</span><span class="svc-tag">Awards Wall</span><span class="svc-tag">Schema Markup</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/><circle cx="9.5" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.1a4 4 0 0 1 0 7.8"/></svg></div>
      <h3 class="svc-title">Principal Architect Profiles</h3>
      <p class="svc-desc">Professional bio pages for your principal architects and studio directors — with professional photography placement, academic credentials, NIA/ARCON designations, project credits, and specialisms. Human expertise builds trust in architecture, where clients are commissioning a relationship as much as a service. Individual architect profiles also rank for name searches and credential-based queries.</p>
      <div class="svc-tags"><span class="svc-tag">Principal Profiles</span><span class="svc-tag">Person Schema</span><span class="svc-tag">Credentials</span><span class="svc-tag">Project Credits</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 0 0 1 1h3m10-11l2 2m-2-2v10a1 1 0 0 1-1 1h-3m-6 0a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1m-6 0h6"/></svg></div>
      <h3 class="svc-title">Design Philosophy &amp; Studio Story Pages</h3>
      <p class="svc-desc">A dedicated page communicating your studio's design principles, architectural beliefs, working methodology, and the founding story of the practice. Architecture clients — especially those commissioning landmark or high-value projects — need to understand what you stand for before they shortlist you. Your philosophy page is where conviction converts interest into enquiry.</p>
      <div class="svc-tags"><span class="svc-tag">Studio Philosophy</span><span class="svc-tag">Manifesto Design</span><span class="svc-tag">Founding Story</span><span class="svc-tag">Working Method</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
      <h3 class="svc-title">Project Enquiry &amp; Brief Submission Forms</h3>
      <p class="svc-desc">Multi-step project enquiry forms that capture the right information from the first contact — project type, location, approximate budget range, timeline, and key requirements. So when a prospective client submits a brief, you have the context to respond intelligently and immediately. Enquiries go to your email and optionally to your CRM or project management system.</p>
      <div class="svc-tags"><span class="svc-tag">Brief Submission</span><span class="svc-tag">Multi-step Form</span><span class="svc-tag">Email Delivery</span><span class="svc-tag">CRM Integration</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Architects</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when clients are<br>searching for <em>your studio</em></h2>
      <p>The most important moment in your client acquisition journey is when a Lagos developer opens Google and types "residential architect Lagos" or "architecture firm for commercial project Abuja". If your studio does not appear on page one, that brief goes to a competitor. Every website we build for architecture firms is engineered to rank for the exact search terms your ideal clients use when they are ready to shortlist.</p>
      <p>We do not just build beautiful websites — we build search visibility. Your homepage, each service page, individual project case studies, and location pages are all individually optimised for specific keyword targets. We implement ArchitectureService and LocalBusiness schema markup so Google understands exactly what your studio does, where you practice, and what typologies you specialise in.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each architecture service and typology</li>
        <li>Location pages targeting Lagos, Abuja, Port Harcourt, Lekki, Victoria Island, and other key markets</li>
        <li>ArchitectureService + LocalBusiness JSON-LD schema markup on every relevant page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Image alt-text strategy ensuring your project photography is indexed by Google Images</li>
        <li>Long-tail keyword content targeting low-competition, high-intent searches like "NIA registered architect Lagos"</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Architecture Firm — Keyword Rankings (before &amp; after)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">architect lagos</span>
            <span class="kw-vol">3,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">architecture firm nigeria</span>
            <span class="kw-vol">2,100/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">interior designer lagos</span>
            <span class="kw-vol">1,900/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">residential architect abuja</span>
            <span class="kw-vol">1,200/mo</span>
            <span class="kw-pos top10">▲ #3</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">commercial architect nigeria</span>
            <span class="kw-vol">880/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">architectural firm portfolio website</span>
            <span class="kw-vol">640/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">NIA architect website</span>
            <span class="kw-vol">520/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">masterplan architect nigeria</span>
            <span class="kw-vol">380/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active architecture firm SEO campaign</div>
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
    <p>We have built websites for professional firms across Nigeria and the UK. These are the outcomes our architecture and design-led clients consistently see.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="320">0</span><span>%</span></div>
      <div class="trust-label">Average increase in organic Google search visibility within the first 90 days of a new architecture firm website launch</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="97">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) achieved on our custom-built architecture firm websites — fast images, no builder bloat</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="6">0</span><span>×</span></div>
      <div class="trust-label">Increase in monthly project enquiries reported by architecture studio clients within 6 months of launch, compared to their previous website</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched architecture studio website — with a guaranteed, milestone-based delivery timeline</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Professional service websites delivered across Nigeria, the UK, the US, and Canada — all built on custom code, never templates</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
      <div class="trust-num">100<span>%</span></div>
      <div class="trust-label">Client code ownership on delivery — every file, every image, every database credential transferred to you unconditionally at handover</div>
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
    <p>We have delivered websites for architecture studios and design-led firms across Nigeria and the UK. This process has been refined to eliminate the surprises, delays, and scope disagreements that make most agency relationships frustrating for a studio that values precision and craft.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery &amp; Portfolio Audit</div>
      <p class="proc-desc">A structured discovery session covering your studio's typologies, flagship projects, target client base, competitive landscape, credentials, and growth goals. We audit your existing portfolio materials, photography, and online presence to identify what we have to work with and what needs to be created. We map your complete site architecture — every project page, every service page, every keyword target — and agree on it in writing before design begins.</p>
      <div class="proc-tags"><span class="proc-tag">Portfolio Audit</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Keyword Map</span><span class="proc-tag">Signed Brief</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Visual Design — Studio-Quality Aesthetics</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for your homepage, portfolio grid, project case study template, studio page, services, and contact. For architecture studios, the design standard is as high as the work you produce. We design to match the visual intelligence your studio projects through its buildings. Two revision rounds are included. You approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Custom Build — Fast Image Loading, No Bloat</div>
      <p class="proc-desc">Your website is built on a custom PHP WordPress theme — no Elementor, no page builders, no unnecessary plugins. ACF Pro powers your portfolio, project case studies, team profiles, awards, and testimonials — all fully editable from WordPress admin without touching code. Images are optimised through a professional pipeline: WebP conversion, srcsets, lazy loading, and CDN delivery. A staging environment is accessible throughout the build.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">ACF Pro</span><span class="proc-tag">Image Pipeline</span><span class="proc-tag">CDN Setup</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO &amp; Content Entry</div>
      <p class="proc-desc">Your project content, service descriptions, team bios, and studio copy are entered across all pages, formatted correctly, and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, ArchitectureService and LocalBusiness schema markup, canonical URLs, image alt-text, XML sitemap, and Google Search Console submission. Google Analytics 4 is installed, goals configured, and all tracking verified before launch day.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA &amp; Launch</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 90+), image load testing, form testing, link verification, and a final review call before launch day. Your domain is transferred to the new site, SSL is verified, Cloudflare is configured, and old URL redirects are set up. You receive a 45-minute CMS training session, a written admin guide covering every content management workflow — portfolio updates, new projects, team changes — and a 30-day post-launch support window.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">30-Day Support</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly SEO &amp; Maintenance Retainer</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your site ranking, updated, and performing. We publish project updates and studio news articles, build local SEO citations in Lagos, Abuja, and Port Harcourt, monitor Core Web Vitals, update WordPress and plugins, run daily backups, and deliver monthly keyword ranking reports. Architecture studio clients who invest in ongoing SEO typically see their strongest results in months 6–18 as project case studies accumulate search authority.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Project Updates</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Architecture studio websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the studio's typologies, credentials, and target client base.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1c1917 0%,#2c2421 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Studio Forma</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Architecture Studio · Lagos</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Residential</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Commercial</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Cultural</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Architecture Studio</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Architecture Studio · Lagos, Nigeria</div>
        <div class="port-title">Studio Forma</div>
        <p class="port-desc">Full portfolio website with 28 project case studies, typology filters, NIA awards display, team profiles, and an SEO campaign that reached page one for "architect Lagos" within 90 days of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#111827 0%,#1e2840 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Meridian Architects</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Commercial &amp; Masterplanning · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Commercial</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Masterplanning</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">ARCON Reg.</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Commercial &amp; Masterplanning</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Commercial &amp; Masterplanning Firm · Abuja, Nigeria</div>
        <div class="port-title">Meridian Architects</div>
        <p class="port-desc">Specialist commercial and masterplanning architecture website with project case studies, ARCON credential display, principal profiles, and service pages targeting government and developer clients in the FCT and Northern Nigeria markets.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#2d2840 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Osei &amp; Partners</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Architecture &amp; Interior Design · UK+Nigeria</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Residential</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Interior</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Luxury</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Architecture &amp; Interior Design</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Architecture &amp; Interior Design · UK + Nigeria</div>
        <div class="port-title">Osei &amp; Partners</div>
        <p class="port-desc">Dual-market architecture and interior design website serving luxury residential clients in the UK and Nigeria — with bilingual content strategy, project case studies across both markets, and a brief submission form pre-qualifying clients by budget and typology.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
<section class="pricing-section" id="pricing" aria-labelledby="pricing-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pricing-heading">Transparent pricing for<br>every size of <em>architecture studio</em></h2>
    </div>
    <p>Every project is quoted individually after a free 30-minute consultation. These ranges are based on typical project scope — your exact quote will be detailed and itemised before any commitment is required. Architecture websites are image-heavy by nature, and our pricing reflects the additional image optimisation work required to achieve exceptional visual quality alongside fast performance.</p>
  </div>
  <div class="pricing-grid">

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Emerging Studios &amp; Solo Architects</div>
        <div class="price-name">Essential Portfolio</div>
        <p class="price-tagline">A clean, visually impressive portfolio website for an emerging studio or sole architect wanting a strong online showcase.</p>
        <div class="price-amount">₦400k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Portfolio up to 12 projects</div>
        <div class="price-feat">Custom WordPress theme</div>
        <div class="price-feat">NIA/ARCON credentials display</div>
        <div class="price-feat">Awards display section</div>
        <div class="price-feat">Project enquiry form</div>
        <div class="price-feat">Full SEO foundation</div>
        <div class="price-feat">Google Analytics 4</div>
        <div class="price-feat">Image optimisation pipeline</div>
        <div class="price-feat">30-day post-launch support</div>
        <div class="price-feat no">Filterable portfolio</div>
        <div class="price-feat no">Project case study pages</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn outline">Get a Quote →</a></div>
    </div>

    <div class="price-card featured reveal">
      <div class="price-head">
        <div class="price-badge">Most Popular</div>
        <div class="price-name">Studio Growth Site</div>
        <p class="price-tagline">A full-featured architecture studio website built to showcase your work, rank on Google, and win premium project briefs.</p>
        <div class="price-amount">₦900k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Unlimited projects</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Filterable portfolio by typology</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Project case study pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Team &amp; principal profiles</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Design philosophy page</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">NIA/ARCON awards system</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Studio blog / news CMS</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full SEO + schema markup</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">CMS training session</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">60-day post-launch support</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn gold">Start This Project →</a></div>
    </div>

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Established &amp; Multi-Principal Studios</div>
        <div class="price-name">Enterprise Studio</div>
        <p class="price-tagline">A comprehensive digital platform for large studios with multiple typologies, international projects, and a press or client portal requirement.</p>
        <div class="price-amount">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Advanced portfolio with animated transitions</div>
        <div class="price-feat">Awards database &amp; filterable archive</div>
        <div class="price-feat">Client project portal (Laravel)</div>
        <div class="price-feat">Press &amp; media room</div>
        <div class="price-feat">Multi-principal team system</div>
        <div class="price-feat">Competition &amp; publication archive</div>
        <div class="price-feat">Newsletter &amp; email marketing</div>
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
    <p>Not all web development options are equal — especially for architecture firms where the quality of your website communicates the quality of your design thinking.</p>
  </div>
  <table class="compare-table reveal" role="table" aria-label="Web design comparison for architecture firms">
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
        <td class="feature">Built specifically for architecture firms</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Architecture-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Image-optimised loading (WebP, CDN, lazy load)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Limited optimisation</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full image pipeline</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely implemented</span></td>
      </tr>
      <tr>
        <td class="feature">Filterable portfolio by typology</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Extra cost</span></td>
      </tr>
      <tr>
        <td class="feature">NIA schema markup &amp; ARCON credentials</td>
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
        <td class="feature">Full SEO (schema, sitemap, GA4)</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Complete foundation</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely complete</span></td>
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
  <h2 class="s-head" id="test-heading">What architecture firms say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Our previous website did not reflect the quality of our buildings at all. i2Medier understood immediately what an architecture studio website needs to communicate — and delivered something we are genuinely proud to share with clients. Within four months we were receiving two to three unsolicited project briefs a month from Google. The NIA awards page alone has opened conversations we would never have had otherwise."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Arc. Adebayo Okonkwo NIA, ARCON</div><div class="test-role">Principal · Studio Forma, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"I was sceptical that a web design agency would understand what an architecture practice actually needs to communicate. But i2Medier came prepared — they asked the right questions about our design philosophy, our ARCON credentials, and how we wanted government clients to perceive us. The result is a website that has already helped us win two major commercial commissions in Abuja that came directly through our Google ranking."</p>
      <div class="test-author">
        <div class="test-avatar">C</div>
        <div><div class="test-name">Arc. Chisom Nwosu FNIA</div><div class="test-role">Managing Partner · Meridian Architects, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Running a dual-market practice between the UK and Nigeria is complex, and our old website reflected that confusion. i2Medier restructured our entire online presence — with proper portfolio filters, separate UK and Nigerian project sections, and a brief submission form that qualifies clients by project type and budget before we speak to them. The quality of enquiries has completely changed. Every project brief that comes in now is already a warm conversation."</p>
      <div class="test-author">
        <div class="test-avatar">F</div>
        <div><div class="test-name">Arc. Fatima Aliyu RIBA, ARCON</div><div class="test-role">Director · Osei &amp; Partners, London + Lagos</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free portfolio website<br>audit for your studio</h2>
    <p>We will review your current site, assess how your portfolio is being presented, identify your biggest Google ranking gaps, and show you exactly what a new website would fix. No commitment required.</p>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>architecture firm web design</em></h2>
    </div>
    <p>A comprehensive guide to building an architecture studio website that showcases your portfolio, attracts premium project clients, and ranks on Google — written specifically for Nigerian and international architecture practices.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for architecture firms">

      <h2>Why architects need a professional portfolio website in 2025 Nigeria</h2>
      <p>The architecture profession in Nigeria has changed dramatically in the past decade. The rapid growth of real estate development in Lagos, Abuja, and Port Harcourt has created a new generation of sophisticated private clients, institutional developers, and government agencies who conduct their own research before shortlisting design firms. This means that your digital presence — specifically, the quality of your architecture firm's portfolio website — is often the deciding factor in whether your studio receives an invitation to tender.</p>
      <p>Consider the client journey of a Lagos real estate developer commissioning a residential estate in Lekki Phase I. They receive referrals from trusted contacts for three architecture firms. Before calling any of them, they spend twenty minutes on each firm's website — assessing the quality of the portfolio, the range of typologies, the calibre of past clients, and the evidence of professional credentials. The firm with the most impressive, comprehensive, and credible website wins the first conversation — before a single drawing has been shown.</p>
      <p>This dynamic is not unique to Lagos. In Abuja, government ministries are increasingly evaluating architecture firms through their digital presence before issuing expressions of interest. In Port Harcourt, oil and gas companies commissioning office and industrial projects are applying the same due diligence to design firm websites that they apply to contractor prequalification. A studio without a professional portfolio website is, by default, not considered.</p>
      <p>A professional architecture firm website is no longer a supplementary marketing tool — it is the primary vehicle through which your studio's design intelligence, professional standing, and project capability are assessed by prospective clients who have not yet met you.</p>

      <h2>What makes a great architecture studio website?</h2>
      <p>The best architecture studio websites share a set of characteristics that distinguish them from both generic business websites and poorly executed portfolio sites. Understanding these helps clarify what to expect — and demand — when commissioning a new website for your practice.</p>

      <h3>Visual excellence that matches the work</h3>
      <p>An architecture studio website must be held to the same visual standard as the architectural work it presents. If your buildings are designed with careful attention to proportion, material, light, and detail, your website must reflect the same design intelligence. <strong>Generic templates and standard website builders communicate the opposite of what architecture firms need to convey.</strong> The typography, whitespace, image presentation, and layout must all signal that this is a design-led practice with exacting standards.</p>

      <h3>A portfolio that tells stories, not just shows photographs</h3>
      <p>Photographs of completed buildings are the minimum expectation. The architecture firms that win the most prestigious commissions have websites that go further — explaining the design brief, the conceptual approach, the technical and budgetary challenges navigated, the material choices made, and the outcome the building delivers for its users. Project case studies that tell the full story of a commission communicate depth of expertise that a gallery of photographs simply cannot convey, particularly to institutional and developer clients who are evaluating design capability and project management skill simultaneously.</p>

      <h3>Clear NIA and ARCON credentials</h3>
      <p>For Nigerian architecture practices, registration with the Architects Registration Council of Nigeria (ARCON) and membership of the Nigerian Institute of Architects (NIA) are not just professional formalities — they are client-facing trust signals that must be prominently displayed. Government clients and regulated development projects legally require ARCON-registered architects. Private developers commissioning significant projects use NIA membership and fellowship status as indicators of professional standing. A website that buries these credentials in a footer paragraph is leaving institutional trust on the table.</p>

      <h3>Image optimisation — speed and quality together</h3>
      <p>Architecture is, by definition, a visual profession. High-resolution photography of built work is essential. But the technical challenge that most architecture websites fail to solve is achieving both visual quality and loading speed simultaneously. Unoptimised high-resolution images on architecture websites routinely produce PageSpeed scores below 50 — meaning beautiful buildings are being presented through a slow, frustrating experience that contradicts the quality they represent. The solution requires a professional image optimisation pipeline: WebP format conversion, responsive srcset attributes, lazy loading below the fold, and CDN delivery from servers close to your users. When done correctly, an architecture portfolio can achieve both stunning visual quality and sub-two-second loading times.</p>

      <h2>SEO keywords for architecture firms in Nigeria</h2>
      <p>Keyword research for architecture firms in Nigeria reveals a rich landscape of search intent — from broad exploratory searches to highly specific brief-ready queries. Understanding this landscape is the foundation of an effective architecture firm SEO strategy.</p>
      <p>High-priority keyword categories for Nigerian architecture practices include:</p>
      <ul>
        <li><strong>Typology + location combinations:</strong> "residential architect Lagos", "commercial architect Abuja", "interior designer Lekki", "masterplan architect Port Harcourt"</li>
        <li><strong>Service + credential combinations:</strong> "NIA registered architect Lagos", "ARCON certified architect Nigeria", "fellowship NIA architect Abuja"</li>
        <li><strong>Project type searches:</strong> "luxury villa architect Nigeria", "office building architect Lagos", "church architect Nigeria", "hospital architect Abuja"</li>
        <li><strong>Client type searches:</strong> "architecture firm for real estate developers Nigeria", "government project architect Nigeria", "NGO architect Nigeria"</li>
        <li><strong>Comparison searches:</strong> "best architecture firm Lagos", "top architecture studios Nigeria", "award winning architect Nigeria"</li>
      </ul>
      <p>The most valuable keywords are often the mid-tail and long-tail combinations — searches that signal a specific, funded brief rather than casual interest. Ranking for "ARCON registered residential architect Lekki" may have lower search volume than "architect Lagos", but the intent of that search is far more specific and the client is far closer to commissioning. Architecture firm SEO strategies that target both broad and specific keyword clusters consistently outperform single-keyword approaches.</p>

      <h2>Project case studies versus photo galleries — why the distinction matters</h2>
      <p>Many architecture firm websites present their work as a photography gallery — a grid of images with project names. This is insufficient for winning high-value commissions from sophisticated clients. The distinction between a photo gallery and a proper project case study page is the difference between showing and telling — between presenting outcomes and demonstrating capability.</p>
      <p>A well-constructed project case study page contains: the original client brief and project objectives, the site context and design constraints, the conceptual approach and its evolution, key technical and regulatory challenges navigated, material and specification decisions with their rationale, construction documentation examples, and the final outcome including client testimonial and project metrics. Each of these elements communicates something different to the prospective client reading it — and collectively they answer the question that every client is asking: "Does this firm have the expertise, the process, and the judgment to deliver my project?"</p>
      <p>From an SEO perspective, project case study pages also significantly outperform gallery pages. Each case study page is indexed by Google individually, can be optimised for specific typology and location searches, and accumulates ranking authority over time as it attracts inbound links and engagement. A portfolio of 30 well-written project case study pages is an SEO asset that compounds in value year over year.</p>

      <h2>Architecture firm website pricing guide for Nigeria</h2>
      <p>The honest answer to "how much does an architecture firm website cost?" is that it depends on what the website needs to do, how many projects need to be showcased, and what level of SEO foundation is required. Visual-heavy portfolio websites for architecture firms typically cost more than standard business websites because of the additional image optimisation work, the custom portfolio system, and the case study page production involved.</p>
      <p>As a general guide for the Nigerian market:</p>
      <ul>
        <li><strong>Essential portfolio site</strong> (up to 12 projects, basic filtering, SEO foundation): ₦400,000–₦600,000</li>
        <li><strong>Studio growth website</strong> (unlimited projects, filterable portfolio, case study pages, team profiles, full SEO): ₦900,000–₦1.5M</li>
        <li><strong>Enterprise studio platform</strong> (animated transitions, awards database, client portal, press room): ₦2M+</li>
      </ul>
      <p>The most important factor affecting return on investment is the SEO foundation. An architecture studio website that ranks on page one for "residential architect Lagos" and similar terms can generate two to three qualified project briefs per month from prospective clients who are actively seeking a design partner. At typical Nigerian architecture fee levels, a single residential commission won through the website more than pays for the entire site investment. A beautiful website that ranks nowhere generates beautiful-looking ROI of zero.</p>

      <h2>Building a website that grows with your studio</h2>
      <p>The best architecture studio websites are living platforms that grow alongside the studio's project portfolio and reputation. Starting with a content management system that allows your studio to add new projects, publish competition results, announce awards, and expand into new typology and location markets without rebuilding from scratch is the single most important strategic decision you can make when commissioning your website.</p>
      <p>Each new project case study published becomes an additional search entry point — ranking for project-specific and location-specific searches. Each NIA award or competition result announced strengthens your credentials page and adds new keyword targets. Each new city you take on work in becomes an opportunity for a location-specific landing page. The architecture studios that build this compound growth into their digital strategy from the outset — and that invest in even modest ongoing SEO efforts — are the ones that dominate search results in their markets within twelve to twenty-four months.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free portfolio audit and website proposal for your architecture studio.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Audit →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why most firm websites lose projects</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for architects</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about architecture<br>firm <em>web design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every architecture studio has different needs — typologies, project scale, target clients, and credential requirements vary widely. Email us and we will give you a direct, specific answer for your practice — no sales pitch.</p>
      <a href="mailto:hello@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">How do you handle portfolio filtering — can clients filter by typology and location?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Yes — filterable portfolio is a standard feature of our architecture firm websites from the Studio Growth tier upwards. Projects can be filtered by typology (residential, commercial, interior, cultural, masterplanning, landscape), scale, and location. Filters are smooth and instantaneous — no page reload required. Each project retains its own individual URL for SEO purposes, so Google can index individual projects even as visitors filter the gallery view.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">How do we upload and manage new project photography ourselves after launch?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">We build your portfolio management system on WordPress with ACF Pro, which creates a completely intuitive editing interface for your studio team. Adding a new project means filling in a form: project name, typology, location, client brief, design narrative, materials, and uploading images. WordPress automatically runs images through our optimisation pipeline — resizing, converting to WebP, and generating responsive srcsets — so your team uploads full-resolution files and the website handles everything else. No technical knowledge is required. Every handover includes a CMS training session and a written admin guide specific to your portfolio system.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">How do you display NIA membership, ARCON registration, and awards on the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">NIA membership, ARCON registration numbers, fellowship designations (NIA, FNIA), and awards are integrated into the design as primary trust elements — not footnotes. On the homepage, your most important credentials appear in the hero section and in the trust signal area. Individual principal architect profiles display specific designations and registration numbers. A dedicated awards and accreditation page displays your full NIA award history, competition wins, and institutional recognitions. We also implement ArchitectureService schema markup so Google reads and understands your credentials and can display them in relevant search results.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">How do project case study pages differ from a regular portfolio gallery?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">A portfolio gallery page shows a project name and photographs. A project case study page tells the full story: the client's brief and project objectives, the site context and design constraints navigated, the conceptual approach and how it evolved, key technical and budgetary decisions with rationale, material specifications, photography throughout the process if available, the completed project with final photography, and ideally a client testimonial. Case study pages are typically 600–1,200 words with 8–20 images. From an SEO perspective, each case study is a fully indexed, individually optimised page that can rank for specific project type and location searches. A studio with 30 well-written case study pages has 30 additional routes through which clients can discover them on Google.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">How do clients brief us through the website — what information does the form capture?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Our multi-step project brief submission forms are designed to capture the right information from the first contact: project type (residential, commercial, interior, masterplanning, etc.), location (city and site details), approximate budget range, desired completion timeline, site area and scale, and a description of the project objectives. The form is structured to be thorough enough to pre-qualify the enquiry while not so long that it deters genuine clients. Every submission is delivered to your studio email immediately and optionally to a CRM or project management system. You can respond to a well-briefed enquiry in minutes rather than spending time gathering basic information in initial calls.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">How long does it take to build an architecture firm website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">A standard architecture studio website — portfolio system, case study pages, team profiles, services, and SEO foundation — typically takes 3–5 weeks from design approval to launch. Larger sites with extensive case study libraries, an awards database, and a client portal may take 6–8 weeks. The most important factor in timeline is the availability of your project content — high-resolution photography, project descriptions, and team information. We provide a detailed, milestone-based project timeline at the start of every engagement so you always know what is happening and when. Portfolio content can be added after launch, so a limited initial portfolio does not need to delay going live.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">How do you ensure the website loads fast with high-resolution architectural photography?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Image performance on architecture websites is one of our specialist areas. We implement a complete image optimisation pipeline: all images are automatically converted to WebP format on upload (typically 60–80% smaller than JPG with equivalent quality), responsive srcsets are generated for every image so the correct size is served to each device, lazy loading ensures only images in the viewport are downloaded on page load, and images are served from a global CDN with servers close to your users in Lagos, Abuja, London, and elsewhere. The result is architecture websites that score 90+ on Google PageSpeed Mobile while displaying full-resolution project photography that looks exceptional on every screen from phone to 4K monitor.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build an architecture studio<br>website that wins premium projects?</h2>
  <p>Get a free, no-obligation consultation and portfolio website proposal. We will review your current site, audit your portfolio presentation, map your keyword opportunities, and show you exactly what we would build — and why.</p>
  <a href="mailto:hello@i2medier.com" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
