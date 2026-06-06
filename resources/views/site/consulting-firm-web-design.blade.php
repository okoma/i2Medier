@extends('public.layouts.app')

@section('title', 'Web Design for Consulting Firms | Management Consultant Websites | i2Medier')

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/consulting-firm-web-design.css')
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
      <span aria-current="page">Web Design for Consulting Firms</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Consulting Firm Web Design</span>
    <h1>Websites that position your<br>consulting firm as the<br><em>obvious choice</em></h1>
    <p class="hero-sub">We build professional, fast, and Google-ranked websites specifically for consulting firms, strategy advisors, management consultants, and business advisory practices — in Nigeria, the UK, and worldwide. Stop losing mandates to competitors with better digital presence.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Consulting Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Built for consultants — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranked on Google from launch day</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria & UK specialists</span>
    </div>
  </div>

  <!-- Consulting website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
        <div>
          <div class="float-notif-text">New project enquiry received</div>
          <div class="float-notif-sub">Strategy Advisory · Lagos · 2 min ago</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">meridianadvisory.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Meridian <span>Advisory</span></div>
            <div class="msn-links">
              <span class="msn-link">Services</span>
              <span class="msn-link">Insights</span>
              <span class="msn-link">Case Studies</span>
              <span class="msn-link">Contact</span>
              <span class="msn-cta">Free Consult</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Management Consultants · Nigeria</div>
            <div class="msh-h1">Strategy. Execution.<br><span>Results.</span></div>
            <div class="msh-sub">Trusted management consulting for growth-stage businesses, corporates, and public institutions across Nigeria and West Africa.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Book a Consultation</span>
              <span class="msh-btn-s">Our Services →</span>
            </div>
          </div>
          <!-- Services -->
          <div class="mock-site-services">
            <div class="mss-label">Our Practice Areas</div>
            <div class="mss-grid">
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M4 19h16"/><path d="m6 15 4-4 3 3 5-6"/></svg></div><div class="mss-name">Strategy</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M12 2v4"/><path d="M12 18v4"/><path d="m4.93 4.93 2.83 2.83"/><path d="m16.24 16.24 2.83 2.83"/><path d="M2 12h4"/><path d="M18 12h4"/><path d="m4.93 19.07 2.83-2.83"/><path d="m16.24 7.76 2.83-2.83"/></svg></div><div class="mss-name">Operations</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M8.5 9.5c0-1.1 1.1-2 2.5-2h2c1.4 0 2.5.9 2.5 2s-1.1 2-2.5 2h-2c-1.4 0-2.5.9-2.5 2s1.1 2 2.5 2h2c1.4 0 2.5-.9 2.5-2"/><path d="M12 6v12"/></svg></div><div class="mss-name">Finance</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/><circle cx="9.5" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.1a4 4 0 0 1 0 7.8"/></svg></div><div class="mss-name">HR</div></div>
            </div>
          </div>
          <!-- Featured insight -->
          <div class="mock-site-insight">
            <div class="msi-label">Featured Insight</div>
            <div class="msi-card">
              <div class="msi-tag">Strategy</div>
              <div class="msi-title">Why Nigerian mid-market firms stall at the growth ceiling — and how to break through</div>
              <div class="msi-meta">8 min read · Published June 2025</div>
            </div>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">150<span>+</span></div><div class="mst-lbl">Clients</div></div>
            <div class="mst-item"><div class="mst-num">12<span>yrs</span></div><div class="mst-lbl">Experience</div></div>
            <div class="mst-item"><div class="mst-num">NGO<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Certified</div></div>
            <div class="mst-item"><div class="mst-num">4.9<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rating</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #2 · "management consultant lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Management Consulting</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Strategy Advisory</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Business Advisory</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> HR Consulting</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> IT Consulting</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Change Management</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Process Improvement</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Financial Advisory</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Operations Consulting</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Risk Management</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Management Consulting</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Strategy Advisory</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Business Advisory</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> HR Consulting</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> IT Consulting</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Change Management</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Process Improvement</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Financial Advisory</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Operations Consulting</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Risk Management</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most consulting firm<br>websites <em>lose mandates</em></h2>
    </div>
    <p>A prospective client Googles your firm before they ever pick up the phone. Within seven seconds they have formed a judgement about your firm's credibility, depth of expertise, and relevance to their business challenge. If your website does not pass that test, they move on to the next name on the shortlist. Here is what is going wrong on most consulting firm websites — and what we do about it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Invisible on Google when clients are actively searching for help</h3>
      <p class="prob-desc">When a Lagos CEO searches "management consultant Nigeria" or "strategy advisory firm Abuja", your firm does not appear. That search goes to a competitor who invested in SEO. A consulting website without search visibility is a digital brochure no one ever finds — and in a market where Google is the first port of call, invisibility is indistinguishable from not existing.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every site is built with a complete SEO foundation — keyword-optimised service pages, local SEO, structured data, and Google Search Console setup from day one, so you rank for the searches your clients actually make.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <h3 class="prob-title">Generic positioning that fails to communicate your firm's distinct expertise</h3>
      <p class="prob-desc">"We are a leading management consulting firm committed to delivering value." Every consultant says this. None of it is differentiated. When your website cannot explain what you specialise in, which industries you serve, what size of client you work with, or what your approach actually looks like, prospects cannot self-select. The result is tyre-kicker enquiries and missed mandates from ideal clients who assumed you were not the right fit.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Purpose-written service pages for each of your practice areas, clear positioning copy that articulates your methodology and client fit, and content that helps the right clients quickly recognise themselves in your work.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <h3 class="prob-title">No thought leadership content — so there is no proof of expertise online</h3>
      <p class="prob-desc">Consulting is a credence good: clients cannot evaluate your work until after they have hired you. The bridge between uncertainty and engagement is demonstrated expertise — white papers, insights articles, case study narratives, speaking engagements. When your website has no thought leadership content, you have no way to prove your firm's intellectual depth before the first conversation begins, and serious clients move on to the firm whose blog they have been reading for months.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A fully managed insights blog, case study pages, and a content architecture designed to showcase your firm's thinking — turning your website into an ongoing authority-building platform, not a static digital brochure.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.3 19.3 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 3a2 2 0 0 1-.6 1.8L7.2 10.3a16 16 0 0 0 6.5 6.5l1.8-1.8a2 2 0 0 1 1.8-.6l3 .5a2 2 0 0 1 1.7 2Z"/></svg></span>
      <h3 class="prob-title">No clear path from visitor to enquiry — leads slip through the cracks</h3>
      <p class="prob-desc">Interested prospects visit your website, read a page or two, and then leave without making contact — because there is no obvious, frictionless next step. No consultation request form, no calendar booking, no qualifying questions that help them understand what working with your firm looks like. Traffic arrives, interest forms, and then dissipates without converting into a conversation.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Conversion-optimised page layouts with prominent consultation CTAs, multi-step enquiry forms that qualify the prospect before you speak, and appointment scheduling on every key service page — so interested visitors have a clear path to engagement.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></span>
      <h3 class="prob-title">No case studies or client results — the most powerful proof asset is missing</h3>
      <p class="prob-desc">Case studies are the single most persuasive content type for consulting firms. They show rather than tell — demonstrating your methodology in action, the scale of challenges you have tackled, and the measurable outcomes you delivered. When your website has no case studies, or has placeholder descriptions that give no meaningful information, you are asking prospects to hire you on faith alone. That is a significant barrier to premium-fee engagements.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Dedicated case study pages with structured narrative templates — challenge, approach, outcome — that present your results compellingly while respecting client confidentiality where required. We help you structure your engagements as stories that sell.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
      <h3 class="prob-title">Broken or poor experience on mobile — where 74% of research happens</h3>
      <p class="prob-desc">Over 74% of Nigerian web traffic arrives on a mobile device. Senior decision-makers researching advisory firms do so on their phones, often in the few minutes between meetings. If your website does not look impeccably professional on a phone — if text is tiny, layout breaks, or forms are impossible to complete — you are failing at the exact moment a serious prospect is evaluating you.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every design begins on mobile — responsive at every breakpoint, touch-optimised, and tested across real devices on both Android and iOS. Your firm will look as commanding on a smartphone screen as it does on a desktop.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your consulting<br>firm's website <em>needs</em></h2>
      <p>A high-performing consulting firm website is not a homepage and a contact form. It is a structured, strategic set of pages — each designed to serve a specific audience at a specific stage of their decision process, and each optimised to rank for the search terms your prospective clients use when they are looking for help with a business challenge.</p>
      <p>We map your practice areas, methodologies, industries, team credentials, and case studies to a comprehensive page architecture that works for both Google and the senior decision-makers evaluating your firm.</p>
      <ul class="bullets">
        <li>Homepage — authority positioning, differentiation, and a clear path to consultation</li>
        <li>Individual service pages — one per practice area (Strategy, Operations, HR, Finance, IT, Change Management, etc.)</li>
        <li>Industry pages — targeting specific sectors you serve (Banking, FMCG, Manufacturing, Government, Healthcare, etc.)</li>
        <li>Case Studies — structured engagement narratives showing your methodology and results</li>
        <li>Insights blog — thought leadership articles that build authority and drive organic traffic</li>
        <li>Team & Partners — professional profiles with credentials, specialisms, and background</li>
        <li>About the Firm — history, values, methodology, and firm culture</li>
        <li>Speaking & Events — conference appearances, keynotes, and workshop facilitation</li>
        <li>Contact page — consultation booking, direct contact, office details, and enquiry form</li>
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
        <div class="page-card-head"><span class="pch-name">Strategy Advisory</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Case Studies</span><span class="pch-badge key">SEO Priority</span></div>
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
        <div class="page-card-head"><span class="pch-name">Insights / Blog</span><span class="pch-badge key">SEO Engine</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Industries Served</span><span class="pch-badge key">SEO Priority</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>consulting firms</em></h2>
    </div>
    <p>Every consulting firm website we build is designed around the specific trust signals, authority-building content, and conversion patterns of professional advisory firms. These are not generic business website features — they are consulting-specific elements that have a direct impact on whether a visiting prospect makes contact or moves on to a competitor whose website communicates expertise more compellingly.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></div>
      <h3 class="svc-title">Expertise & Credentials Display</h3>
      <p class="svc-desc">Your academic credentials, professional certifications, industry memberships, and notable employer backgrounds are displayed prominently as trust anchors — not buried in a bio paragraph. Harvard MBA, McKinsey alumni, Deloitte background, ISO certification, NIM fellowship — these signals matter enormously to senior clients evaluating consulting firms, and they should lead, not follow.</p>
      <div class="svc-tags"><span class="svc-tag">Credentials Display</span><span class="svc-tag">Certifications</span><span class="svc-tag">Memberships</span><span class="svc-tag">Awards</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></div>
      <h3 class="svc-title">Thought Leadership Blog & Insights</h3>
      <p class="svc-desc">A fully managed WordPress insights section for publishing strategy articles, market analysis, operational guides, industry commentary, and white papers. Each piece is an additional SEO landing page — building topical authority and bringing in organic traffic from prospects searching for answers to the exact problems your firm solves. Thought leadership content is the most powerful business development tool a consulting firm has.</p>
      <div class="svc-tags"><span class="svc-tag">WordPress CMS</span><span class="svc-tag">SEO Articles</span><span class="svc-tag">White Papers</span><span class="svc-tag">Newsletter Signup</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
      <h3 class="svc-title">Case Study Pages</h3>
      <p class="svc-desc">Structured case study pages built around the challenge-approach-outcome narrative framework — the format that converts sceptical prospects into confident buyers. Each case study page is independently SEO-optimised for industry and engagement-type keywords, and designed to be sharable as a business development asset in proposal processes and client conversations.</p>
      <div class="svc-tags"><span class="svc-tag">Case Study Templates</span><span class="svc-tag">Outcome Metrics</span><span class="svc-tag">Client Logos</span><span class="svc-tag">SEO Optimised</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/><circle cx="9.5" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.1a4 4 0 0 1 0 7.8"/></svg></div>
      <h3 class="svc-title">Partner & Team Profiles</h3>
      <p class="svc-desc">Professional profile pages for every principal, partner, and senior consultant — with high-quality photography, academic background, career history, specialisms, published articles, and speaking engagements. Human credibility is the core product of a consulting firm. Investing in compelling team pages pays back directly in the quality and confidence of inbound enquiries.</p>
      <div class="svc-tags"><span class="svc-tag">Partner Profiles</span><span class="svc-tag">Person Schema</span><span class="svc-tag">Credentials</span><span class="svc-tag">Published Works</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/><path d="M10 16h4"/><path d="M12 14v4"/></svg></div>
      <h3 class="svc-title">Speaking & Events Pages</h3>
      <p class="svc-desc">Dedicated pages for your firm's speaking engagements, conference appearances, workshop facilitation, and training programmes — with past event listings, keynote topics, and a booking enquiry form. Speaking visibility establishes credibility with audiences who have not yet worked with you, and a well-structured speaking page converts visibility into consulting mandates.</p>
      <div class="svc-tags"><span class="svc-tag">Event Listings</span><span class="svc-tag">Keynote Topics</span><span class="svc-tag">Speaker Bio</span><span class="svc-tag">Booking Form</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">Multi-Step Consultation Enquiry Forms</h3>
      <p class="svc-desc">Intelligent, multi-step enquiry forms that pre-qualify prospects before the first call — capturing business context, challenge type, timeline, and scale so your team can respond with relevant information from the outset. Forms are integrated with your email and CRM, include confirmation emails, and are designed to reduce the friction that causes interested prospects to abandon before submitting.</p>
      <div class="svc-tags"><span class="svc-tag">Multi-Step Forms</span><span class="svc-tag">CRM Integration</span><span class="svc-tag">Lead Qualification</span><span class="svc-tag">Calendly</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Consultants</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when clients are<br>searching for <em>your expertise</em></h2>
      <p>The most valuable moment in a consulting business development cycle is when a CEO or CFO searches Google for help with the exact challenge your firm specialises in. If you are not on page one, that mandate goes to a competitor who understood search. Every website we build for consulting firms is engineered to rank for the specific search terms your prospective clients use.</p>
      <p>We do not just build websites — we build search visibility. Your homepage, each practice area page, your industry sector pages, your case studies, and your insights articles are all individually optimised for specific keyword targets. We implement ProfessionalService and LocalBusiness schema markup so Google understands precisely what your firm does, who you serve, and where you operate.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each consulting practice area you offer</li>
        <li>Location pages targeting every city or region where you work with clients</li>
        <li>ProfessionalService + LocalBusiness JSON-LD schema markup on every relevant page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Thought leadership articles targeting long-tail consulting keyword searches</li>
        <li>Citation building across Nigerian and international professional directories</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Consulting Firm — Keyword Rankings (before & after)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">management consultant lagos</span>
            <span class="kw-vol">2,400/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">strategy advisory nigeria</span>
            <span class="kw-vol">1,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">business consultant abuja</span>
            <span class="kw-vol">1,300/mo</span>
            <span class="kw-pos top10">▲ #5</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">hr consulting firm nigeria</span>
            <span class="kw-vol">960/mo</span>
            <span class="kw-pos top3">▲ #3</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">management consulting firm nigeria</span>
            <span class="kw-vol">820/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">it consulting services lagos</span>
            <span class="kw-vol">640/mo</span>
            <span class="kw-pos top10">▲ #4</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">change management consultant nigeria</span>
            <span class="kw-vol">510/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">operations consulting port harcourt</span>
            <span class="kw-vol">380/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active consulting firm SEO campaign</div>
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
    <p>We have built websites for professional services firms across Nigeria and the UK. These are the outcomes our clients consistently see after launching a purpose-built i2Medier website.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="310">0</span><span>%</span></div>
      <div class="trust-label">Average increase in organic Google search visibility within the first 90 days of a new consulting firm website launch</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="96">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) achieved on our custom-built consulting firm websites — no page builder bloat</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="5">0</span><span>×</span></div>
      <div class="trust-label">Increase in monthly qualified enquiries reported by consulting clients within 6 months of launch, compared to their previous website</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched consulting firm website — with a guaranteed, milestone-based delivery timeline</div>
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
    <p>We have delivered over 120 professional service websites. This process works — it has been refined across every one of them to eliminate the surprises, delays, and scope disagreements that make most agency relationships frustrating for busy principals.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery & Site Architecture</div>
      <p class="proc-desc">A structured discovery session covering your firm's practice areas, specialisms, target clients, competitive landscape, and business development goals. We map your complete site architecture — every page, every content type, every keyword target — and agree on it in writing before any design work begins. This document governs the entire project and prevents scope drift. We also conduct keyword research to identify the specific search terms your prospective clients use when looking for the kind of help you provide.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Keyword Map</span><span class="proc-tag">Signed Brief</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Design — Premium, Not Generic</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for all key pages. We design your brand colours, professional photography placement, credentials display, thought leadership layout, and conversion elements to work as a coherent, premium system. A consulting firm's website must communicate authority at a glance — the design is engineered to do exactly that. Two revision rounds are included, and you approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">WordPress Build — Custom Theme</div>
      <p class="proc-desc">Your website is built on a custom PHP WordPress theme — no Elementor, no page builders. ACF Pro powers your practice area pages, case studies, team profiles, insights articles, and speaking engagements — all fully editable from WordPress admin without touching code. A staging environment is accessible throughout the build so you can review progress at any point and approve content before we go live.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">ACF Pro</span><span class="proc-tag">Staging Access</span><span class="proc-tag">Enquiry Forms</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO Setup & Content Entry</div>
      <p class="proc-desc">Your content is entered across all pages, formatted correctly, and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, schema markup (ProfessionalService, LocalBusiness, Person), canonical URLs, XML sitemap, and Google Search Console submission. Google Analytics 4 is installed, goals configured, and all conversion tracking verified before launch. We also set up your initial Google Business Profile if one does not already exist.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA, Launch & Training</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 90+), form testing, link verification, and a final review call before launch day. Your domain is transferred to the new site, SSL is verified, and Cloudflare is configured for performance and security. You receive a 45-minute CMS training session covering all content workflows, a written admin guide, and a 30-day post-launch support window for any adjustments or issues that arise after launch.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">30-Day Support</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly SEO & Content Retainer</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your site ranking and your thought leadership pipeline active — publishing strategy and advisory insights articles, building citations in professional directories, monitoring Core Web Vitals, maintaining WordPress security, running daily backups, and delivering monthly keyword ranking reports. Most consulting firm clients see their strongest ROI in months 4–12, as the content compound effect builds search authority over time.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Content Creation</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Consulting websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the firm's practice areas, positioning, and target client profile.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--consulting-dk) 0%,#1a5c34 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Meridian Advisory</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Management Consultants</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Strategy</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Operations</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Finance</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Management Consulting</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Management Consulting · Lagos, Nigeria</div>
        <div class="port-title">Meridian Advisory</div>
        <p class="port-desc">Full website with 10 practice area pages, case studies, insights blog, and a multi-step enquiry form — reaching page one for "management consultant Lagos" within 90 days of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#243060 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Afrique Strategy Partners</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Strategy Advisory · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Public Sector</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Policy</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Growth</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Strategy Advisory</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Strategy Advisory Firm · Abuja, Nigeria</div>
        <div class="port-title">Afrique Strategy Partners</div>
        <p class="port-desc">Specialist strategy advisory firm website targeting public sector and corporate clients — with detailed service pages, partner profiles, speaking events section, and thought leadership content.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a1a0a 0%,#1a3a2a 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Continuum Consulting</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Business Advisors · UK & Nigeria</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">HR</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Change Mgmt</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">OD</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Business Advisors · UK & NG</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Business Advisory · United Kingdom & Nigeria</div>
        <div class="port-title">Continuum Consulting</div>
        <p class="port-desc">HR and organisational development consultancy serving clients across the UK and Nigeria — with dual-market content strategy, case studies, team profiles, and a workshop booking system.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
<section class="pricing-section" id="pricing" aria-labelledby="pricing-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pricing-heading">Transparent pricing for<br>every size of <em>consulting firm</em></h2>
    </div>
    <p>Every project is quoted individually after a free 30-minute consultation. These ranges are based on typical project scope — your exact quote will be detailed and itemised before any commitment is required.</p>
  </div>
  <div class="pricing-grid">

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Independent & Boutique Consultants</div>
        <div class="price-name">Essential Site</div>
        <p class="price-tagline">A clean, authoritative website for an independent consultant or boutique firm needing a strong professional presence fast.</p>
        <div class="price-amount">₦350k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Up to 6 pages</div>
        <div class="price-feat">Custom WordPress theme</div>
        <div class="price-feat">Credentials & expertise display</div>
        <div class="price-feat">Consultation enquiry form</div>
        <div class="price-feat">Full SEO foundation</div>
        <div class="price-feat">Google Analytics 4</div>
        <div class="price-feat">Mobile-responsive design</div>
        <div class="price-feat">30-day post-launch support</div>
        <div class="price-feat no">Case study pages</div>
        <div class="price-feat no">Insights blog section</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn outline">Get a Quote →</a></div>
    </div>

    <div class="price-card featured reveal">
      <div class="price-head">
        <div class="price-badge">Most Popular</div>
        <div class="price-name">Growth Website</div>
        <p class="price-tagline">A full consulting firm website built to rank, generate mandates, and grow with your practice over the long term.</p>
        <div class="price-amount">₦750k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Up to 15 pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Custom theme + ACF Pro</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Practice area service pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Team & partner profiles</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Case study pages (up to 3)</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Insights blog CMS</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full SEO + schema markup</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">CMS training session</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">60-day post-launch support</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn gold">Start This Project →</a></div>
    </div>

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Large & Multi-Practice Firms</div>
        <div class="price-name">Enterprise Firm</div>
        <p class="price-tagline">A comprehensive digital platform for large consulting practices with multiple service lines, offices, and a full content marketing strategy.</p>
        <div class="price-amount">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Unlimited pages & practice areas</div>
        <div class="price-feat">Unlimited case studies</div>
        <div class="price-feat">Multi-office location pages</div>
        <div class="price-feat">Speaking & events management</div>
        <div class="price-feat">Client portal / secure login</div>
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
    <p>Not all web development options are equal — especially for consulting firms where your website is a direct reflection of your professional credibility.</p>
  </div>
  <table class="compare-table reveal" role="table" aria-label="Web design comparison for consulting firms">
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
        <td class="feature">Built specifically for consulting firms</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Consulting-specific design</span></td>
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
        <td class="feature">ProfessionalService schema markup</td>
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
  </table>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What consulting firms say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"We had relied entirely on referrals for eight years and assumed our website did not matter much. Within four months of the new site launching, we were getting four to six unsolicited enquiries a month from companies we had never worked with before — all finding us through Google. The quality of inbound is genuinely different because prospects arrive having already read our thinking."</p>
      <div class="test-author">
        <div class="test-avatar">T</div>
        <div><div class="test-name">Tunde Adebayo</div><div class="test-role">Managing Partner · Meridian Advisory, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"We serve federal agencies and that means credibility scrutiny is intense. Our old website was a liability — it looked like we could not afford a decent web designer, which is not the message a strategy advisory firm wants to send to government procurement committees. The new site changed how we present ourselves completely. We have since won two tenders where we believe the website played a role in the evaluation."</p>
      <div class="test-author">
        <div class="test-avatar">N</div>
        <div><div class="test-name">Ngozi Okafor-Eze</div><div class="test-role">Director · Afrique Strategy Partners, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Operating across both the UK and Nigeria creates a real positioning challenge — you have to speak credibly to two very different audiences. i2Medier understood this immediately and built a content strategy that works for both markets. Our UK enquiries have increased, and Nigerian prospects who find us through Google are already warm by the time they call because they have read our case studies and know what we do."</p>
      <div class="test-author">
        <div class="test-avatar">K</div>
        <div><div class="test-name">Kemi Adeleke-Williams</div><div class="test-role">Principal Consultant · Continuum Consulting, London</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free 30-minute website<br>review for your firm</h2>
    <p>We will audit your current site, identify your biggest ranking and conversion gaps, and show you exactly what a new website would fix — no commitment required.</p>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>consulting firm web design</em></h2>
    </div>
    <p>A comprehensive guide to building a consulting firm website that attracts mandates, builds authority, and ranks on Google — written for Nigerian and UK practices.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for consulting firms">

      <h2>Why every consulting firm needs a professional website in 2025</h2>
      <p>The consulting industry in Nigeria is growing rapidly, driven by increased corporate investment in strategy, operational efficiency, and organisational change. At the same time, the digital landscape has fundamentally changed how senior executives and procurement committees evaluate consulting firms before making contact. What was once a business built entirely on referrals and alumni networks now operates in a market where your digital presence is often the deciding factor between making a shortlist and being passed over.</p>
      <p>Consider the evaluation journey of a CFO at a mid-sized Nigerian conglomerate looking for a strategy advisory firm. She asks two trusted colleagues for recommendations and receives three firm names. Before she contacts any of them, she does what virtually every senior executive now does: she searches each firm on Google. She reads their service descriptions, looks for case studies, browses the team profiles, and checks whether their published thinking — if any — is sophisticated enough to suggest they can handle the complexity of her challenge.</p>
      <p>The firm with the most credible, well-structured, and intellectually rich website wins that evaluation before the first meeting has been scheduled. A consulting firm's website is no longer a nice-to-have — it is a primary business development asset, working around the clock on behalf of your partners to pre-sell every prospective client on your firm's capabilities before the first conversation.</p>
      <p>This is especially true in Nigeria, where smartphone penetration is accelerating and business leaders increasingly conduct research on mobile devices. A consulting firm that does not have a genuinely strong web presence is leaving mandates on the table every single week.</p>

      <h2>What makes an excellent consulting firm website?</h2>
      <p>The best consulting firm websites share a set of characteristics that clearly distinguish them from generic business websites. Understanding these helps clarify what you should be asking for when building or rebuilding your firm's digital presence.</p>

      <h3>Immediate authority positioning</h3>
      <p>Within three seconds of arriving on your homepage, a senior executive should have a clear, positive impression of your firm's calibre. This is achieved through the quality of the visual design, the specificity of the headline messaging, the prominence of credentials and notable client relationships, and the professional presentation of the team. <strong>Authority in consulting is communicated visually before a word is read</strong> — and a poorly designed homepage signals that your firm does not pay close attention to how it presents itself, which is not a reassuring signal for a firm asking to be trusted with important strategic decisions.</p>

      <h3>Clearly articulated positioning and specialisms</h3>
      <p>Generic positioning is the single biggest missed opportunity on most consulting firm websites. "We help organisations achieve their strategic goals" is what every consulting firm says. It communicates nothing specific — not who you serve best, not what problems you are particularly expert at solving, not what your methodology looks like, not what results your clients typically achieve. A high-performing consulting firm website makes these specifics clear and prominent, so the right prospective clients immediately recognise themselves in your positioning.</p>

      <h3>Demonstrated expertise through thought leadership</h3>
      <p>Consulting is what economists call a credence good: clients cannot evaluate the quality of the work until after they have been through the engagement. The primary mechanism for bridging this uncertainty before the first meeting is demonstrated expertise — publishing. When a prospective client has read three of your insights articles and found them genuinely useful, they arrive at the first conversation already believing in your competence. That changes everything about the sales dynamic. Thought leadership content is the most powerful and most underutilised business development tool available to consulting firms.</p>

      <h3>Case studies that prove outcomes, not just process</h3>
      <p>Every consulting firm tells prospective clients that their approach is rigorous, collaborative, and results-focused. The firms that win mandates are the ones that can show, in specific detail, what that approach looked like in practice and what it delivered. Structured case study pages — covering the client context, the challenge, the firm's approach, and the measurable outcomes — provide the proof that generic capability descriptions cannot. They are also independently valuable SEO assets, each ranking for the specific industry and engagement-type combinations your prospective clients search.</p>

      <h3>Frictionless paths to enquiry and qualification</h3>
      <p>A motivated prospective client visiting your website should encounter no friction whatsoever on the path to making contact. That means a consultation booking form that is prominently placed on every service page, a multi-step enquiry form that helps them articulate their challenge and helps you pre-qualify the conversation, and clear direct contact information for executives who prefer to reach out personally. The goal is to make the next step so obvious and so easy that procrastination has no foothold.</p>

      <h2>SEO keywords for consulting firms in Nigeria and the UK</h2>
      <p>Keyword research for consulting firms reveals a consistent pattern: prospective clients search with high specificity around the type of help they need, the geography they need it in, and sometimes the sector or size of organisation they represent. This specificity is actually a competitive opportunity — ranking for detailed, long-tail keyword combinations is often more achievable than competing for broad generic terms, and the leads generated are far more qualified.</p>
      <p>High-priority keyword categories for Nigerian consulting firms include:</p>
      <ul>
        <li><strong>Service + location combinations:</strong> "management consultant Lagos", "strategy advisory firm Abuja", "business consultant Port Harcourt"</li>
        <li><strong>Practice area + country:</strong> "HR consulting firm Nigeria", "change management consultant Nigeria", "operations consulting Nigeria"</li>
        <li><strong>Sector + consulting:</strong> "consulting firm for FMCG Nigeria", "banking strategy consultant", "public sector advisory Nigeria"</li>
        <li><strong>Problem-based searches:</strong> "business restructuring consultant Nigeria", "how to develop a growth strategy Nigeria", "organisational transformation consultant"</li>
        <li><strong>Credential-based searches:</strong> "McKinsey trained consultant Nigeria", "Harvard MBA consultant Lagos", "big four consultant Nigeria"</li>
        <li><strong>Comparison searches:</strong> "best management consulting firm Nigeria", "top strategy consultants Lagos"</li>
      </ul>
      <p>For UK-based Nigerian diaspora consulting practices, the keyword opportunity expands to cover UK regulatory and business environment terms alongside Nigerian market content — allowing a single website to serve both markets with targeted content strategies for each audience.</p>

      <h2>The importance of case studies for consulting firm SEO</h2>
      <p>Beyond their value as conversion assets, case studies are among the most powerful SEO content types for consulting firms. Each case study page, if properly structured and optimised, can rank independently for high-intent search combinations — "retail operations improvement Nigeria", "post-merger integration consulting West Africa", "digital transformation consulting Lagos" — that represent prospective clients at exactly the moment they are looking for help with a specific, defined problem.</p>
      <p>The most effective consulting case study pages are structured around the following framework: the client's industry and scale, the specific challenge they faced, the firm's diagnostic approach, the intervention or engagement design, the implementation, and the measurable outcome. This structure not only satisfies prospective clients evaluating your work — it also creates keyword-rich, topically authoritative content that Google rewards with search visibility.</p>
      <p>Many consulting firms are cautious about publishing case studies due to client confidentiality concerns. These concerns are valid and can be managed through anonymisation, sector-level descriptions, and explicit agreement with clients about how their engagement may be represented publicly. The business development value of published case studies significantly outweighs the friction of managing confidentiality, and most clients, when asked properly, are happy to agree to a suitably framed version of their story.</p>

      <h2>How much should a consulting firm website cost in Nigeria?</h2>
      <p>The honest answer is that it depends on what the website needs to do and how many practice areas, team members, and content types it needs to accommodate. An independent consultant who wants a clean, credible online presence to support referrals and validate inbound interest has very different requirements from a 10-partner firm with six practice areas, multiple industry verticals, an active insights programme, and a speaking portfolio.</p>
      <p>As a general guide for the Nigerian market in 2025:</p>
      <ul>
        <li><strong>Essential brochure site</strong> (5–6 pages, contact form, basic SEO): ₦350,000–₦500,000</li>
        <li><strong>Growth website</strong> (10–15 pages, service pages, team profiles, case studies, insights blog, advanced SEO): ₦750,000–₦1.2M</li>
        <li><strong>Enterprise platform</strong> (20+ pages, multi-partner profiles, case studies library, speaking section, client portal): ₦1.5M+</li>
      </ul>
      <p>The most important variable is not the upfront cost — it is the quality of the build and the strength of the SEO foundation. A ₦150,000 template website that generates no enquiries has an infinite payback period. A ₦750,000 purpose-built website that brings in three new mandate conversations per month pays for itself inside 60 days, for any firm charging professional consulting fees.</p>

      <h2>Building a consulting firm website that compounds over time</h2>
      <p>The best consulting firm websites are not finished products — they are living platforms that compound in value as the firm publishes more thinking, adds more case studies, earns more backlinks, and accumulates more Google authority over time. This compounding effect is the reason firms that invest in content marketing consistently report that their strongest ROI comes in months 12–24 rather than in month one.</p>
      <p>Every insights article you publish is an additional search entry point for prospective clients. Every case study you add is further evidence of your firm's capability and depth. Every speaking engagement you list builds authority in the eyes of both prospective clients and Google's ranking algorithms. The firms that build this compound growth architecture into their digital strategy from the outset — using a content-ready CMS, a structured SEO content calendar, and a commitment to consistent publishing — are the ones that dominate search results in their markets within 12–18 months of launch.</p>
      <p>Starting with a strong technical foundation — custom-built WordPress with ACF Pro, a clean permalink structure, proper schema markup, and Google Search Console setup — means you can keep adding to the platform without ever needing to rebuild from scratch. Your website should be the asset that makes every other business development activity more effective: proposals are better received because the prospect has already read your work, pitches are warmer because the client already knows your team, and referrals convert faster because the person being referred arrives at a website that immediately confirms the referrer's description of your firm.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website review and proposal for your consulting firm.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Review →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why most firm websites lose mandates</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for consultants</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about consulting<br>firm <em>web design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every consulting firm has different needs. Email us and we will give you a direct, honest answer specific to your firm — no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">How much does a website for a consulting firm cost?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Consulting firm websites start from ₦350,000 for a professional 5–6 page site with enquiry forms and basic SEO. Full-featured growth websites with individual practice area pages, team profiles, case study pages, insights blog, and advanced SEO start from ₦750,000. Enterprise platforms for large multi-partner firms are quoted individually after a detailed scoping session. Every quote is detailed and itemised — no hidden fees or scope surprises.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">What pages should a consulting firm website have?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">A high-performing consulting firm website should include: Home, About the Firm, Services (with individual pages for each practice area — Strategy, Operations, HR, Finance, IT, Change Management, etc.), Industries Served, Case Studies (individual pages per engagement story), Team and Partners, Insights Blog, Speaking and Events, and Contact. Individual practice area pages are especially important for SEO — they allow you to rank for specific searches like "strategy advisory Nigeria" or "HR consulting Lagos" and are the most likely pages a prospective client will use to evaluate your firm's depth.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">How long does it take to build a consulting firm website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">A standard consulting firm website typically takes 3–5 weeks from design approval to launch. Larger platforms with many practice area pages, a case study library, a full blog section, and speaking events management may take 5–8 weeks. We provide a detailed, milestone-based timeline at the start of every project — so you always know exactly what is in progress, what has been completed, and when the next stage will be delivered.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Will my consulting firm website rank on Google?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Every website we build includes a complete SEO technical foundation — optimised title tags and meta descriptions, ProfessionalService and LocalBusiness schema markup, XML sitemap, canonical URLs, semantic HTML structure, and Google Search Console submission. This gives your site the technical foundation to rank. For ongoing SEO campaigns targeting competitive consulting keywords — with content creation, link building, and citation building — we offer monthly retainer packages. Most consulting firms see meaningful organic growth in months 3–12.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Do you build websites for independent consultants as well as large firms?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes. We work with independent consultants, two-partner boutique firms, mid-size practice groups, and large multi-partner consulting organisations. The scope, page count, and budget are calibrated to match the size of the practice and the range of services you offer. An independent consultant's website has very different requirements from a 20-partner firm's digital platform, and we design each engagement accordingly — starting with a proper scoping conversation.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Can prospective clients book consultations directly through the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">Yes. We integrate consultation scheduling (Calendly or custom booking forms with availability-based slots), multi-step enquiry forms that pre-qualify the prospect's challenge and context, and direct contact options for executives who prefer to reach out personally. Every form submission is routed to your email and optionally to your CRM, with confirmation messages sent automatically to the prospect. The goal is to make it impossible for a motivated prospect to leave your website without completing a next step.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Will I be able to update the website myself after launch?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Yes — this is a core principle of every site we build. We use ACF Pro to create intuitive, field-based editing interfaces for your service descriptions, case studies, team profiles, insights articles, speaking engagements, and all other content types. You can update every content section from the WordPress admin without touching a line of code. Every handover includes a 45-minute CMS training session, a written admin guide covering every common content management workflow, and a 30-day post-launch support window for questions that arise after you start using the site.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a consulting firm<br>website that wins mandates?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We will review your current site, map your keyword opportunities, and show you exactly what we would build — and why.</p>
  <a href="mailto:letstalk@i2medier.com" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
