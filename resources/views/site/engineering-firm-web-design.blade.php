@extends('public.layouts.app')

@section('title', 'Web Design for Engineering Firms | Engineer Website Design Nigeria | i2Medier')

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/engineering-firm-web-design.css')
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
      <span aria-current="page">Web Design for Engineering Firms</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Engineering Firm Web Design</span>
    <h1>Websites that showcase your<br>engineering firm's<br><em>technical authority</em></h1>
    <p class="hero-sub">We build professional, fast, and Google-ranked websites for civil, mechanical, structural, and electrical engineering firms in Nigeria, the UK, and worldwide. Win more project enquiries and position your firm as the technical leader in your discipline.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Engineering Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Built for engineers — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranked on Google from launch</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></span> COREN & NSE credentialing</span>
    </div>
  </div>

  <!-- Engineering website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
        <div>
          <div class="float-notif-text">New project brief received</div>
          <div class="float-notif-sub">Structural Engineering · Lagos · 3 min ago</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">nexusengineering.com.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Nexus <span>Engineering</span></div>
            <div class="msn-links">
              <span class="msn-link">Projects</span>
              <span class="msn-link">Disciplines</span>
              <span class="msn-link">About</span>
              <span class="msn-link">Careers</span>
              <span class="msn-cta">Contact</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">COREN Certified · Lagos, Nigeria</div>
            <div class="msh-h1">Precision Engineering for<br>Nigeria's <span>Infrastructure Future</span></div>
            <div class="msh-sub">Civil, structural, mechanical, and electrical engineering for public and private sector projects across Nigeria.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Submit a Brief</span>
              <span class="msh-btn-s">Our Projects →</span>
            </div>
          </div>
          <!-- Disciplines -->
          <div class="mock-site-services">
            <div class="mss-label">Our Engineering Disciplines</div>
            <div class="mss-grid">
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M3 21h18"/><path d="M5 21V7l7-4 7 4v14"/><path d="M9 9h6"/><path d="M9 13h6"/></svg></div><div class="mss-name">Civil & Structural</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 1v4"/><path d="M12 19v4"/><path d="M4.22 4.22l2.83 2.83"/><path d="M16.95 16.95l2.83 2.83"/><path d="M1 12h4"/><path d="M19 12h4"/><path d="M4.22 19.78l2.83-2.83"/><path d="M16.95 7.05l2.83-2.83"/></svg></div><div class="mss-name">Mechanical & HVAC</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></div><div class="mss-name">Electrical</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M12 22a8 8 0 0 1-8-8c0-3.8 2.7-7 6.4-8.2"/><path d="M12 22a8 8 0 0 0 8-8c0-3.8-2.7-7-6.4-8.2"/><circle cx="12" cy="7" r="2"/></svg></div><div class="mss-name">Environmental</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg></div><div class="mss-name">Geotechnical</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M2 20h20"/><path d="M6 20V10l6-6 6 6v10"/><path d="M10 20v-5h4v5"/></svg></div><div class="mss-name">Project Mgmt</div></div>
            </div>
          </div>
          <!-- Featured project -->
          <div class="mock-project-card">
            <div class="mpc-label">Featured Project</div>
            <div class="mpc-title">Third Mainland Bridge Expansion Study</div>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">35<span>+</span></div><div class="mst-lbl">Projects</div></div>
            <div class="mst-item"><div class="mst-num">COREN</div><div class="mst-lbl">Certified</div></div>
            <div class="mst-item"><div class="mst-num">18<span>yrs</span></div><div class="mst-lbl">Experience</div></div>
            <div class="mst-item"><div class="mst-num">4.9<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rating</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #2 · "civil engineering firm Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Civil Engineering Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Structural Engineering Consultancies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Mechanical Engineering Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Electrical Engineering Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Environmental Engineering Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Geotechnical Engineering</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Project Management Engineers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> HVAC Engineering Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Process Engineering Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Oil & Gas Engineering Consultancies</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Civil Engineering Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Structural Engineering Consultancies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Mechanical Engineering Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Electrical Engineering Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Environmental Engineering Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Geotechnical Engineering</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Project Management Engineers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> HVAC Engineering Companies</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Process Engineering Firms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Oil & Gas Engineering Consultancies</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most engineering firm<br>websites <em>lose projects</em></h2>
    </div>
    <p>A project owner, procurement officer, or institutional client will research your firm online before shortlisting you for any significant contract. Within the first ten seconds of landing on your website, they have formed a judgement about your firm's technical credibility, project experience, and professional standing. If your website does not pass that test, your firm does not make the shortlist — regardless of your real engineering capability.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <h3 class="prob-title">Technical expertise hidden behind a generic, unimpressive website</h3>
      <p class="prob-desc">Your firm may have delivered complex bridge works, high-rise structural designs, or large-scale HVAC installations — but your website looks like a generic business brochure from 2012. Institutional clients applying procurement due diligence see a website and conclude your firm is not operating at the level they need.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Custom-built websites that visually and editorially communicate the technical depth and project scale of your engineering practice — designed to impress procurement teams and project owners on first contact.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Invisible on Google when project owners search for engineers</h3>
      <p class="prob-desc">When a developer in Lagos searches "structural engineering firm Lagos" or a government agency in Abuja looks for "COREN certified civil engineers Nigeria", your firm does not appear. That search goes to a competitor who invested in their digital presence. Your real-world reputation is not searchable if it has no digital expression.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Full SEO foundation on every build — discipline-specific keyword targeting, EngineeringService schema markup, local SEO for Lagos, Abuja, and Port Harcourt, and Google Search Console setup from day one.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M4 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1z"/><path d="M4 13a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1z"/><path d="M16 13h6"/><path d="M16 17h6"/><path d="M16 21h6"/></svg></span>
      <h3 class="prob-title">No discipline-specific service pages explaining your specialisms</h3>
      <p class="prob-desc">A single "Services" page with a bullet list of disciplines is not enough. A client commissioning civil works needs to understand your civil engineering capability in depth — not see it listed alongside twelve other services. Undifferentiated service presentation costs you relevance with every specialist client who visits.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Individual, detailed pages for each engineering discipline you practise — Civil, Structural, Mechanical, Electrical, Environmental, Geotechnical — each keyword-optimised and designed to speak directly to clients procuring that specific service.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></span>
      <h3 class="prob-title">Missing COREN and NSE credentials — a major trust gap for institutional clients</h3>
      <p class="prob-desc">Government agencies, international development finance institutions, and large private sector clients require proof of professional registration before awarding contracts. If your COREN registration number, NSE membership, and FIDIC credentials are not prominently displayed on your website, you are creating unnecessary doubt at the most critical moment of the procurement process.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Dedicated credentials sections featuring your COREN registration, NSE fellowship, FIDIC membership, and any ISO or professional accreditations — displayed as primary trust elements, not buried in small print.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M2 20h20"/><path d="M4 20V10l8-7 8 7v10"/><path d="M10 20v-5h4v5"/></svg></span>
      <h3 class="prob-title">No project portfolio — your biggest proof point is not online</h3>
      <p class="prob-desc">Engineering firms win work based on demonstrated capability. Your project track record — the infrastructure you have delivered, the technical challenges you have solved, the scale of work you have handled — is your most powerful business development tool. Yet most engineering firms have no project portfolio online whatsoever.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Professionally designed project case study pages with technical detail, project specifications, scope descriptions, imagery, and client context — turning your completed works into an always-on business development asset.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
      <h3 class="prob-title">Poor mobile experience when directors review firms on tablets and phones</h3>
      <p class="prob-desc">Procurement directors and project owners frequently review shortlisted firms on mobile devices during meetings, site visits, and while travelling. A website that does not display correctly on a phone or tablet — with text too small to read, images that break the layout, or forms that do not work — communicates carelessness that no engineering firm can afford to signal.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every design is built mobile-first — fully responsive at all screen sizes, touch-optimised, and tested across real Android and iOS devices before launch.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your engineering<br>firm's website <em>needs</em></h2>
      <p>A high-performing engineering firm website is not a homepage and a contact form. It is a strategically structured set of pages — each one designed to serve a specific audience at a specific point in the procurement process, and each one optimised to rank for the exact search terms your prospective clients use when they are looking for engineering expertise.</p>
      <p>We map your disciplines, project experience, team credentials, and target client types to a comprehensive page architecture that works simultaneously for Google and for every procurement officer, developer, or project owner who visits your site.</p>
      <ul class="bullets">
        <li>Homepage — technical credibility, discipline overview, and a clear path to enquiry</li>
        <li>Individual Discipline pages — Civil, Structural, Mechanical, Electrical, Environmental, and more</li>
        <li>Project Case Studies — detailed technical portfolio of completed works</li>
        <li>Team & Principal Engineer profiles — with credentials, specialisms, and registration numbers</li>
        <li>COREN & NSE Credentials page — professional registration and accreditation display</li>
        <li>Tender & Pre-qualification pages — capability statements and RFQ submission forms</li>
        <li>Technical Blog / Engineering Insights — thought leadership and SEO traffic engine</li>
        <li>Careers — attract graduate engineers and experienced technical staff</li>
        <li>Contact & Office locations — Lagos, Abuja, Port Harcourt, and international offices</li>
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
        <div class="page-card-head"><span class="pch-name">Civil Engineering</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Project Portfolio</span><span class="pch-badge key">SEO Priority</span></div>
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
        <div class="page-card-head"><span class="pch-name">COREN & NSE Credentials</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Technical Insights</span><span class="pch-badge key">SEO Engine</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>engineering firms</em></h2>
    </div>
    <p>Every engineering firm website we build is designed around the specific trust signals, technical credibility requirements, and procurement-stage behaviour of engineering sector clients. These are not generic business website features — they are engineering-firm-specific elements that directly influence whether a project owner sends you a brief or moves on to the next firm on their list.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></div>
      <h3 class="svc-title">Technical Credentials Display (COREN, NSE, FIDIC)</h3>
      <p class="svc-desc">Your COREN registration number, NSE fellowship, FIDIC membership, and any ISO or international accreditations are displayed prominently as primary trust anchors — not hidden in your About page footer. We design credential sections that meet the due diligence requirements of government agencies, DFIs, and major private sector clients who check before shortlisting.</p>
      <div class="svc-tags"><span class="svc-tag">COREN Registration</span><span class="svc-tag">NSE Membership</span><span class="svc-tag">FIDIC</span><span class="svc-tag">ISO Display</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M2 20h20"/><path d="M4 20V10l8-7 8 7v10"/><path d="M10 20v-5h4v5"/></svg></div>
      <h3 class="svc-title">Project Case Study Pages (with technical detail and imagery)</h3>
      <p class="svc-desc">Dedicated case study pages for each significant project — covering project scope, technical methodology, engineering challenges solved, client brief, and outcome. Complete with high-quality photography or rendered visuals. These are your most powerful business development pages, converting from "we have done this before" to "we are exactly who you need for this project".</p>
      <div class="svc-tags"><span class="svc-tag">Project Detail</span><span class="svc-tag">Technical Specs</span><span class="svc-tag">Methodology</span><span class="svc-tag">Photography</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1z"/><path d="M4 13a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1z"/><path d="M16 13h6"/><path d="M16 17h6"/><path d="M16 21h6"/></svg></div>
      <h3 class="svc-title">Discipline-Specific Service Pages</h3>
      <p class="svc-desc">Individual, content-rich pages for each engineering discipline — Civil & Structural, Mechanical & HVAC, Electrical, Environmental, Geotechnical, Process Engineering, and Project Management. Each page speaks directly to the client commissioning that specific type of engineering work, describes your methodology, and is fully optimised for discipline-specific Google searches.</p>
      <div class="svc-tags"><span class="svc-tag">Civil Engineering</span><span class="svc-tag">Structural</span><span class="svc-tag">Mechanical</span><span class="svc-tag">Electrical</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/><circle cx="9.5" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.1a4 4 0 0 1 0 7.8"/></svg></div>
      <h3 class="svc-title">Principal Engineer & Team Profiles</h3>
      <p class="svc-desc">Professional bio pages for your principal engineers, associate directors, and technical specialists — each featuring their academic qualifications, COREN/NSE registration, years of experience, discipline specialisms, and notable project contributions. In engineering, clients engage firms based on the people who will lead their project. Your team profiles are a critical conversion element.</p>
      <div class="svc-tags"><span class="svc-tag">Engineer Profiles</span><span class="svc-tag">Credentials</span><span class="svc-tag">Person Schema</span><span class="svc-tag">Photos</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20"/><path d="M5 2h13a2 2 0 0 1 2 2v18"/><path d="M8 7h8"/><path d="M8 11h8"/><path d="M8 15h5"/></svg></div>
      <h3 class="svc-title">Technical Blog / Engineering Insights</h3>
      <p class="svc-desc">A fully managed insights section for publishing technical commentary, project methodology articles, engineering regulation updates, and industry analysis. Each article targets long-tail engineering search queries — "COREN requirements for structural engineers Nigeria", "geotechnical survey requirements Lagos", "concrete specification Nigeria building code" — building topical authority with Google over time.</p>
      <div class="svc-tags"><span class="svc-tag">WordPress CMS</span><span class="svc-tag">Technical Content</span><span class="svc-tag">Long-tail SEO</span><span class="svc-tag">Authority Building</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
      <h3 class="svc-title">Tender Pre-qualification & RFQ Forms</h3>
      <p class="svc-desc">Structured pre-qualification pages and request-for-proposal forms that collect the right project information upfront — project type, location, scale, timeline, and budget range. Capability statement download sections for clients conducting formal procurement exercises. Every submission is routed to your business development team immediately, with optional CRM integration.</p>
      <div class="svc-tags"><span class="svc-tag">RFQ Forms</span><span class="svc-tag">Capability Downloads</span><span class="svc-tag">CRM Integration</span><span class="svc-tag">Lead Routing</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Engineering Firms</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when project owners<br>search for <em>your discipline</em></h2>
      <p>The procurement journey for engineering services increasingly starts with a Google search. A director in Lagos searches "structural engineering consultancy Lagos" and reviews the top three results. A government agency in Abuja searches "COREN certified civil engineers Nigeria" and builds a shortlist from what appears on page one. If your firm is not on page one, you are not on the shortlist.</p>
      <p>Every engineering firm website we build is engineered for search visibility. Your homepage, each discipline page, every project case study, and every technical insights article are individually optimised for specific keyword targets relevant to your engineering practice. We implement EngineeringService, ProfessionalService, and LocalBusiness schema markup so Google understands precisely what your firm does and which geographic markets you serve.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each engineering discipline you practise</li>
        <li>Location pages targeting Lagos, Abuja, Port Harcourt, Enugu, and other markets</li>
        <li>EngineeringService + LocalBusiness JSON-LD schema on every relevant page</li>
        <li>COREN registration and NSE schema markup for credential-based searches</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Technical blog content strategy targeting discipline-specific long-tail searches</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Engineering Firm — Keyword Rankings (campaign results)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">civil engineering firm Lagos</span>
            <span class="kw-vol">2,400/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">structural engineering nigeria</span>
            <span class="kw-vol">1,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">mechanical engineering company abuja</span>
            <span class="kw-vol">1,100/mo</span>
            <span class="kw-pos top3">▲ #3</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">engineering consultancy nigeria</span>
            <span class="kw-vol">900/mo</span>
            <span class="kw-pos top10">▲ #4</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">COREN engineer website</span>
            <span class="kw-vol">720/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">geotechnical engineering firm nigeria</span>
            <span class="kw-vol">580/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">hvac engineering nigeria</span>
            <span class="kw-vol">460/mo</span>
            <span class="kw-pos top10">▲ #5</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">process engineering company lagos</span>
            <span class="kw-vol">340/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active engineering firm SEO campaign</div>
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
    <p>We have built websites for professional and technical services firms across Nigeria and the UK. These are the outcomes our clients consistently see after launching with us.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="290">0</span><span>%</span></div>
      <div class="trust-label">Average increase in organic Google search visibility within the first 90 days of an engineering firm website launch</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="95">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) achieved on our custom-built engineering firm websites — no page builder bloat</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="5">0</span><span>×</span></div>
      <div class="trust-label">Increase in monthly project enquiries reported by engineering firm clients within 6 months of launch, compared to their previous website</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched engineering firm website — with a guaranteed, milestone-based delivery timeline</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Professional and technical services websites delivered across Nigeria, the UK, the US, and Canada — all custom code, never templates</div>
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
    <p>We have delivered websites for technical and professional services firms across Nigeria and the UK. This process eliminates the surprises, delays, and scope disagreements that make most agency relationships frustrating — and ensures your site launches correctly, on time, and with everything set up to rank.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery & Site Architecture</div>
      <p class="proc-desc">A structured discovery session covering your firm's engineering disciplines, project track record, target clients (government, private sector, international DFIs), geographic markets, COREN and NSE credentials, and competitive landscape. We map your complete site architecture — every discipline page, every project case study, every keyword target — and agree on it in writing before any design work begins.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Discipline Mapping</span><span class="proc-tag">Keyword Map</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Design — Technical Authority, Not Generic</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for all key pages including homepage, discipline pages, project portfolio, and team profiles. We design your brand colours, technical project imagery placement, COREN credentials display, and case study layouts to work as a coherent professional system. Two revision rounds are included. You approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">WordPress Build — Custom Theme</div>
      <p class="proc-desc">Your website is built on a custom PHP WordPress theme — no Elementor, no page builders. ACF Pro powers your discipline pages, project case studies, team profiles, credentials sections, and technical insights — all fully editable from WordPress admin without touching code. A staging environment is accessible throughout the build so you can review progress at any point.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">ACF Pro</span><span class="proc-tag">Staging Access</span><span class="proc-tag">RFQ Integration</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO Setup & Content Entry</div>
      <p class="proc-desc">Your content is entered across all pages, formatted correctly, and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, EngineeringService and LocalBusiness schema markup, COREN credential schema, canonical URLs, XML sitemap, and Google Search Console submission. Google Analytics 4 is installed, goals configured, and all tracking verified before launch day.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA, Launch & Training</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 90+), form testing, link verification, and a final review call before launch day. Your domain transfers to the new site, SSL is verified, and Cloudflare is configured. You receive a 45-minute CMS training session, a written admin guide, and a 30-day post-launch support window covering any issues that arise after go-live.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">30-Day Support</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly SEO & Maintenance Retainer</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your site ranking and running — publishing technical insights articles targeting engineering search queries, building local SEO citations across Nigerian engineering directories, monitoring Core Web Vitals, updating WordPress, running daily backups, and delivering monthly keyword ranking reports. Engineering firms typically see strongest SEO returns in months 4–12.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Technical Content</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Engineering websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the firm's engineering disciplines, project track record, and target client base.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--engineering-dk) 0%,#1e3a8a 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Nexus Engineering Ltd</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Structural Engineering</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Civil</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Structural</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">COREN</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Structural Engineering</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Structural Engineering · Lagos, Nigeria</div>
        <div class="port-title">Nexus Engineering Ltd</div>
        <p class="port-desc">Full website with discipline pages for civil and structural engineering, 15 project case studies, COREN credentials display, and an SEO campaign that reached page one for "structural engineering firm Lagos" within 90 days.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a2218 0%,#0e3828 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Pinnacle Mechanical</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Mechanical & HVAC · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">HVAC</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Process</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">NSE</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Mechanical & HVAC</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Mechanical & HVAC Engineering · Abuja, Nigeria</div>
        <div class="port-title">Pinnacle Mechanical</div>
        <p class="port-desc">Specialist mechanical and HVAC engineering website with NSE credentials page, project portfolio for commercial and industrial installations, technical insights blog, and RFQ submission form for project briefs.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#2d1b69 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Delta Engineering</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Civil & Environmental · UK+Nigeria</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Civil</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Environmental</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">ICE</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Civil & Environmental · UK+Nigeria</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Civil & Environmental Engineering · UK + Nigeria</div>
        <div class="port-title">Delta Engineering Consultants</div>
        <p class="port-desc">Dual-market engineering consultancy website serving the UK and Nigeria — ICE and COREN credentials displayed for each market, with discipline pages, project portfolio, and a careers section for graduate recruitment.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
<section class="pricing-section" id="pricing" aria-labelledby="pricing-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pricing-heading">Transparent pricing for<br>every size of <em>engineering firm</em></h2>
    </div>
    <p>Every project is quoted individually after a free 30-minute consultation. These ranges are based on typical engineering firm project scope — your exact quote will be detailed and itemised before any commitment is required.</p>
  </div>
  <div class="pricing-grid">

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Small & Specialist Firms</div>
        <div class="price-name">Essential Site</div>
        <p class="price-tagline">A clean, technically credible website for a specialist engineering practice needing a strong professional presence fast.</p>
        <div class="price-amount">₦350k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Up to 8 pages</div>
        <div class="price-feat">COREN & NSE credentials display</div>
        <div class="price-feat">Project portfolio (3 case studies)</div>
        <div class="price-feat">Enquiry & RFQ forms</div>
        <div class="price-feat">Full SEO foundation</div>
        <div class="price-feat">Google Analytics 4</div>
        <div class="price-feat">Mobile-responsive design</div>
        <div class="price-feat">30-day post-launch support</div>
        <div class="price-feat no">Team / engineer profiles</div>
        <div class="price-feat no">Technical blog section</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn outline">Get a Quote →</a></div>
    </div>

    <div class="price-card featured reveal">
      <div class="price-head">
        <div class="price-badge">Most Popular</div>
        <div class="price-name">Growth Website</div>
        <p class="price-tagline">A full-service engineering firm website built to rank, convert, and grow with your practice.</p>
        <div class="price-amount">₦750k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Unlimited pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">All discipline service pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full project portfolio</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Engineer & team profiles</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Technical blog CMS</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Tenders & pre-qual page</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full SEO + schema markup</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">CMS training session</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">60-day post-launch support</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn gold">Start This Project →</a></div>
    </div>

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Large & Multi-Discipline Firms</div>
        <div class="price-name">Enterprise Firm</div>
        <p class="price-tagline">A comprehensive digital platform for large engineering practices with multiple disciplines, offices, and tender management needs.</p>
        <div class="price-amount">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Multi-office location pages</div>
        <div class="price-feat">Tender management system</div>
        <div class="price-feat">Document download centre</div>
        <div class="price-feat">Advanced project portfolio CMS</div>
        <div class="price-feat">Staff directory (50+ engineers)</div>
        <div class="price-feat">Newsletter & email marketing</div>
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
    <p>Not all web development options are equal — especially for engineering firms where technical credibility and professional standing are your most valuable commercial assets.</p>
  </div>
  <table class="compare-table reveal" role="table" aria-label="Web design comparison for engineering firms">
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
        <td class="feature">Built specifically for engineering firms</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Engineering-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">COREN & NSE schema markup</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">Discipline-specific service pages</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Single generic page</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> One page per discipline</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely architected</span></td>
      </tr>
      <tr>
        <td class="feature">Project portfolio case studies</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Photo gallery only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full technical case studies</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic listing only</span></td>
      </tr>
      <tr>
        <td class="feature">Mobile PageSpeed score 90+</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Typically 40–65</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Guaranteed target</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely achieved</span></td>
      </tr>
      <tr>
        <td class="feature">Technical blog / insights CMS</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full WordPress CMS</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Sometimes included</span></td>
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
  <h2 class="s-head" id="test-heading">What engineering firms say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Before our new website, we were entirely dependent on word of mouth for project leads. Within four months of launching, we were receiving RFQs from clients who found us on Google — including two government agencies who specifically mentioned our COREN credentials page as the reason they shortlisted us. The investment has paid for itself many times over."</p>
      <div class="test-author">
        <div class="test-avatar">B</div>
        <div><div class="test-name">Engr. Babatunde Olatunji FNSE</div><div class="test-role">Managing Director · Nexus Engineering Ltd, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"We are a specialist geotechnical firm. The team at i2Medier understood our discipline immediately and built individual service pages for soil investigation, foundation design, and slope stability that actually explain the technical work — not just generic descriptions. We now rank number one in Nigeria for three of our key search terms, and the enquiries reflect exactly the kind of work we want."</p>
      <div class="test-author">
        <div class="test-avatar">N</div>
        <div><div class="test-name">Engr. Ngozi Eze MNSЕ</div><div class="test-role">Principal Engineer · GeoTech Nigeria, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Our project case study pages have become our best business development tool. When we go into a procurement presentation, the client has already reviewed three or four of our projects in detail on the website. The conversation starts from a position of confidence rather than explanation. i2Medier understood exactly what an engineering firm needs online."</p>
      <div class="test-author">
        <div class="test-avatar">S</div>
        <div><div class="test-name">Engr. Seun Alabi COREN</div><div class="test-role">Director of Engineering · Pinnacle Mechanical, Abuja</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free 30-minute website<br>review for your firm</h2>
    <p>We will audit your current site, identify your biggest ranking and conversion gaps, and show you exactly what a new website would fix for your engineering practice. No commitment required.</p>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>engineering firm web design</em></h2>
    </div>
    <p>A comprehensive guide to building an engineering firm website that wins project enquiries, establishes technical authority, and ranks on Google — written for Nigerian and UK engineering practices.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for engineering firms">

      <h2>Why engineering firms need professional websites in 2025 Nigeria</h2>
      <p>The Nigerian engineering sector is growing at a pace that rewards firms who can be found, evaluated, and trusted quickly. With significant federal and state government infrastructure investment underway — roads, bridges, water infrastructure, energy projects, and the ongoing urbanisation of Lagos, Abuja, Port Harcourt, and Enugu — the competition for engineering project mandates has never been more intense.</p>
      <p>A decade ago, engineering firms in Nigeria won work almost entirely through professional networks, personal relationships, and referrals from existing clients. That model has not disappeared, but it has fundamentally changed. Today, procurement officers at government agencies and private sector clients conduct online research before shortlisting firms. International development finance institutions — the World Bank, AfDB, IFC, and bilateral development partners — use web searches and digital due diligence as part of their vendor assessment process. If your engineering firm does not have a professional digital presence, you are invisible to an increasingly important segment of the project market.</p>
      <p>Beyond procurement, a professional website allows engineering firms in Lagos, Abuja, and Port Harcourt to compete for work from international clients, attract graduate engineers from top universities, and demonstrate the breadth and depth of their project experience to clients who have never encountered them through a referral network. Your website is, in effect, a 24-hour business development resource that works for your firm even when your principals are on-site or in meetings.</p>

      <h2>What makes a great engineering firm website?</h2>
      <p>The best engineering firm websites share a distinctive set of characteristics that set them apart from generic professional services sites. Understanding these characteristics helps engineering firm principals and business development leads ask the right questions when commissioning a new website.</p>

      <h3>Immediate technical credibility</h3>
      <p>Within the first few seconds of landing on your homepage, a visitor — whether a procurement director, a developer, or an institutional client — should have a clear and positive impression of your firm's engineering calibre. This credibility is communicated through visual design quality, the prominence of your professional credentials (COREN registration, NSE fellowship), the clarity of your engineering disciplines, and the quality of your project imagery. <strong>Technical credibility is communicated visually and structurally before a word of content is read.</strong></p>
      <p>COREN — the Council for the Regulation of Engineering in Nigeria — and NSE — the Nigerian Society of Engineers — are the two principal bodies that institutional clients use to verify the professional standing of engineering firms. Your COREN registration number and NSE membership should be displayed prominently on your homepage and throughout your website, not relegated to small print in your footer or About page.</p>

      <h3>Discipline-specific service pages with real technical depth</h3>
      <p>A single "Services" page listing your engineering disciplines as bullet points is not enough for today's procurement environment. Clients commissioning civil engineering works need to read a page that demonstrates genuine civil engineering expertise — describing your approach to foundation design, road pavement specification, drainage infrastructure, or whatever your specific civil sub-specialism involves. Generic descriptions do not pass the technical credibility test, and they do not rank on Google for the specific searches your target clients perform.</p>
      <p>Each engineering discipline your firm practises should have its own dedicated, content-rich page — explaining your methodology, describing the types of projects you undertake, referencing the relevant Nigerian standards and codes you work to (like the Nigeria Industrial Standard or the requirements of COREN's guidelines), and linking to relevant case studies from your portfolio.</p>

      <h3>A project portfolio that tells the technical story</h3>
      <p>Engineering firms win contracts based on demonstrated project experience. Your track record — the infrastructure you have designed and delivered, the technical challenges you have solved, the scale of work you have successfully managed — is your single most powerful business development asset. Yet the majority of engineering firms in Nigeria have no project portfolio online whatsoever, or maintain a gallery of photographs with no context, specification, or technical narrative.</p>
      <p>A high-quality project case study page for a significant engineering project should include: the client and project brief, the scope of engineering services provided, the technical methodology used, the specific engineering challenges encountered and how they were resolved, key technical specifications (where not commercially sensitive), project photography or renderings, and the measurable outcome. These pages are not just marketing material — they are searchable content that ranks for project-type searches and convinces technically literate clients that your firm has the experience to handle their specific requirements.</p>

      <h2>SEO for engineering firms in Nigeria</h2>
      <p>Search engine optimisation for engineering firms in Nigeria operates across several distinct keyword categories, each representing a different stage of the client procurement journey and a different type of search intent.</p>
      <p>The highest-value keyword categories for Nigerian engineering firms include:</p>
      <ul>
        <li><strong>Discipline + location searches:</strong> "civil engineering firm Lagos", "structural engineering consultancy Abuja", "mechanical engineering company Port Harcourt", "electrical engineering firm Nigeria"</li>
        <li><strong>Credential-based searches:</strong> "COREN certified engineer Lagos", "NSE registered engineering firm Nigeria", "COREN engineer website", "FIDIC engineer Nigeria"</li>
        <li><strong>Specialisation searches:</strong> "geotechnical engineering firm Nigeria", "HVAC engineering Lagos", "process engineering oil and gas Nigeria", "environmental impact assessment engineers"</li>
        <li><strong>Project-type searches:</strong> "bridge engineering Nigeria", "road design firm Nigeria", "structural assessment Lagos", "building design structural engineer Nigeria"</li>
        <li><strong>Procurement searches:</strong> "engineering pre-qualification Nigeria", "engineering consultancy tender Nigeria", "engineering capability statement Nigeria"</li>
      </ul>
      <p>Local SEO is particularly important for engineering firms serving the Nigerian market. Google Business Profile optimisation, citation building across Nigerian business directories, and location-specific page content for Lagos, Abuja, Port Harcourt, Enugu, and other major engineering markets all contribute to improved local search visibility. For firms serving multiple cities, individual location pages — each with city-specific content — create additional search entry points for prospective clients in each market.</p>

      <h3>Technical content as a long-term SEO strategy</h3>
      <p>Engineering firms have a significant and underexploited content advantage: technical knowledge. Articles explaining engineering processes, commenting on Nigerian building code updates, discussing geotechnical challenges in specific Lagos geologies, or analysing new materials specifications create genuine long-tail search traffic over time. A technical insights blog section, published consistently over 12 months, can generate significant organic traffic from engineers, project managers, and procurement professionals searching for specialist information — and establish your firm as a thought leader in your discipline.</p>

      <h2>How project case studies win engineering contracts</h2>
      <p>In engineering procurement, a detailed project case study does something that a services description page cannot: it provides verifiable proof of capability. When a procurement committee is evaluating engineering firms for a complex infrastructure project, they are not just asking "can this firm do civil engineering?" — they are asking "has this firm done projects of this type, at this scale, under these regulatory conditions, and delivered the required outcomes?"</p>
      <p>A well-structured project case study answers all of those questions in advance, before a proposal has even been submitted. Procurement officers who have read your case studies arrive at the selection process having already formed a positive view of your firm's relevant experience. This changes the dynamics of competitive tendering in your favour.</p>
      <p>The most effective engineering project case studies for Nigerian firms include: the regulatory context (COREN requirements met, environmental permits obtained, NRC or FAAN approval processes navigated), the technical challenge statement (the engineering problem that made the project non-trivial), the methodology (your approach to solving it), and the quantifiable outcome (project delivered on schedule, structure performing to specification, client brief fully achieved). Each case study should also be internally linked from the relevant discipline page, creating a navigation pathway that takes a prospective client from "we do structural engineering" to "here is specific evidence of our structural engineering at scale".</p>

      <h2>Pricing guide for engineering firm websites in Nigeria</h2>
      <p>Engineering firm website costs in Nigeria vary significantly based on scope, complexity, and the number of disciplines and case studies to be covered. As a general guide for the Nigerian market in 2025:</p>
      <ul>
        <li><strong>Essential professional site</strong> (up to 8 pages, credentials display, 3 case studies, basic SEO): ₦350,000–₦500,000</li>
        <li><strong>Growth website</strong> (unlimited pages, all discipline pages, full portfolio, team profiles, blog, advanced SEO): ₦750,000–₦1.2M</li>
        <li><strong>Enterprise platform</strong> (multi-office, tender management, 50+ engineer directory, advanced portfolio CMS): ₦1.5M+</li>
      </ul>
      <p>The return on investment from a well-built engineering firm website is relatively straightforward to calculate. A single significant engineering contract — worth ₦50M to ₦500M depending on the scope — more than justifies the investment in a ₦750,000 Growth website. The question is not whether a professional website is worth the cost. The question is whether your current website is costing you project opportunities by failing to communicate your firm's real capability and credentials to prospective clients who find you (or fail to find you) on Google.</p>
      <p>For engineering firms operating across Lagos, Abuja, Port Harcourt, and other Nigerian markets, the compounding value of strong search visibility over 12–24 months represents one of the highest-return marketing investments available to the sector. Firms that invest in their digital presence now will build search authority that makes it progressively harder for competitors to catch up.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website review and proposal for your engineering firm.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Review →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why most firm websites lose projects</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for engineering firms</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about engineering<br>firm <em>web design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every engineering firm has different disciplines, project history, and client types. Email us and we'll give you a direct, specific answer — no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">How much does a website for an engineering firm cost?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Engineering firm websites start from ₦350,000 for a professional site with credentials display, three project case studies, enquiry forms, and a full SEO foundation. Full-featured growth websites with discipline pages, complete project portfolios, team profiles, a technical blog, and advanced SEO start from ₦750,000. Enterprise platforms with tender management systems and multi-office content are quoted individually. We provide a detailed, itemised quote after a free consultation — no hidden fees and no commitment required.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can you display our COREN registration and NSE membership on the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Yes — and this is something we consider a non-negotiable part of every engineering firm website we build. Your COREN registration number, NSE membership, FIDIC affiliation, and any ISO certifications are displayed prominently as trust anchors on your homepage, About page, and relevant discipline pages. We also implement professional accreditation schema markup in your site's JSON-LD so Google can understand and display your credentials in search results. Institutional clients and government agencies specifically check for COREN registration as part of their due diligence — it needs to be immediately visible, not buried in fine print.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">Do you build separate pages for each engineering discipline?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">Yes — and this is one of the most important things we do differently from generic web designers. Each engineering discipline your firm practises gets its own dedicated page: Civil Engineering, Structural Engineering, Mechanical & HVAC, Electrical Engineering, Environmental Engineering, Geotechnical, Process Engineering, and so on. Each page is written with technical depth, describes your methodology, references relevant standards, and links to relevant project case studies. Individual discipline pages are also far more effective for SEO — they allow you to rank separately for "civil engineering Lagos" and "structural engineering Nigeria" rather than competing for generic terms from a single services page.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">How do you handle project case studies — especially for confidential projects?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">We work with you to determine the appropriate level of detail for each project. Some projects can be presented with full client name, location, and technical specification. Others can be anonymised — described by project type, location (general), and technical scope without identifying the client. A project case study does not need to name the client to be effective: "a 28-storey high-rise structural design in Victoria Island" communicates scale and experience just as powerfully as naming the development. We have built engineering portfolio sections for firms with government and commercial sensitivity requirements and can design a framework that works within your disclosure constraints.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">How long does it take to build an engineering firm website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">A standard engineering firm website — including discipline pages, a project portfolio, team profiles, COREN credentials display, and full SEO setup — typically takes 3–5 weeks from design approval to launch. Larger sites with a complete portfolio of 10+ case studies, a multi-discipline service architecture, careers section, and technical blog may take 5–7 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know exactly what is happening and when. The timeline assumes timely provision of your project information and content — we guide you through what we need and when.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Will my firm's website rank on Google for engineering searches in Nigeria?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">Every website we build includes a complete SEO foundation — semantic HTML structure, optimised title tags and meta descriptions, EngineeringService and LocalBusiness schema markup, COREN and NSE credential schema, XML sitemap, canonical URLs, and Google Search Console setup from launch day. This foundation gives your site the technical prerequisites to rank. For competitive engineering firm searches in Lagos, Abuja, and Port Harcourt, an ongoing monthly SEO retainer — covering technical content creation, link building, and citation work — will significantly accelerate your rankings over the first 12 months. Most engineering firms we work with see meaningful page-one positions within 90–120 days for discipline-specific local search terms.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Can our engineers update the website themselves after launch?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Yes — complete editorial independence is a core principle of every site we build. We use ACF Pro to create intuitive editing interfaces for your project case studies, discipline pages, team profiles, COREN credentials, and technical insights posts. You can add a new project case study, update a team member's profile, or publish a technical article without touching a line of code. Every handover includes a 45-minute CMS training session and a written admin guide covering every content management workflow your team will need — including how to add new case studies and update credentials as your accreditations evolve.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build an engineering firm<br>website that wins project enquiries?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We'll review your current site, map your keyword opportunities, and show you exactly what we'd build — and why it will work for your engineering practice.</p>
  <a href="mailto:letstalk@i2medier.com" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
