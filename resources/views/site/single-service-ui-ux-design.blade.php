@extends('public.layouts.app')

@section('title', 'UI/UX Design Services | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'UI/UX Design', 'item' => route('site.services.ui-ux-design')],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'What tools do you use for UI/UX design?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We design exclusively in Figma and also use FigJam for workshops plus Maze or Useberry for remote usability testing when required.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'What is the difference between UI design and UX design?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'UX design covers the overall feel and usability of the product. UI design covers the visual layer: typography, colour, spacing, icons, components, and hierarchy. We practise both together.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Do you do UX research as part of the design process?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. Every engagement begins with discovery, including stakeholder interviews, competitor analysis, personas, and user journey mapping. Larger products also include usability testing.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Will the designs be ready for handoff to developers?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Absolutely. Every final Figma file is organised for handoff, with named components, token-based spacing and type, defined states, export-ready assets, annotations, and a walkthrough session if needed.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Can you design both the mobile and desktop versions?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. All design engagements include responsive design across desktop, tablet, and mobile breakpoints as standard.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'How much does UI/UX design cost in Nigeria?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Our UI/UX design engagements start from ₦280,000 for a focused single-product design. Larger systems, SaaS platforms, and mobile apps are quoted based on scope and complexity.'],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('page_css')
    @vite('resources/css/public/pages/ui-ux-design.css')
@endpush

@section('content')
<div class="uiux-page">
  <header class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-left">
      <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
        <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
        <a href="{{ route('site.services') }}">Services</a><span class="breadcrumb-sep">›</span>
        <span aria-current="page">UI/UX Design</span>
      </div>
      <span class="hero-tag"><span class="hero-dot"></span> UI/UX Design</span>
      <h1>Design that earns<br>trust, drives action,<br><em>& scales with you</em></h1>
      <p class="hero-sub">We design user interfaces people genuinely enjoy using, grounded in research, built in Figma, and delivered as developer-ready files your team can ship with confidence.</p>
      <div class="hero-btns">
        <a href="#contact" class="btn-white">Get a Free Design Consultation →</a>
        <a href="{{ route('portfolio.index') }}" class="btn-ghost">See Design Work</a>
      </div>
      <div class="hero-tags-row">
        <span class="hero-badge"><span class="hero-badge-dot"></span> 100% Figma</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Research-Driven</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Dev-Ready Handoff</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Responsive Across All Screens</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> 2 Rounds of Revisions</span>
      </div>
    </div>
    <div class="hero-right" aria-hidden="true">
      <div class="figma-mock-wrap">
        <div class="floating-badge"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 3h6a3 3 0 1 1 0 6H9a3 3 0 0 1 0-6Z"></path><path d="M9 9h6a3 3 0 1 1 0 6H9a3 3 0 0 1 0-6Z"></path><path d="M9 15a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z"></path><path d="M9 9V3"></path><path d="M9 15V9"></path></svg> Figma Design System</div>
        <div class="figma-mock">
          <div class="figma-titlebar">
            <div class="fm-dot" style="background:#ff5f57"></div>
            <div class="fm-dot" style="background:#febc2e"></div>
            <div class="fm-dot" style="background:#28c840"></div>
            <span class="fm-filename">ClientDashboard_v3.fig — Edited just now</span>
            <div class="fm-actions"><span class="fm-act">Share</span><span class="fm-act" style="background:var(--fig);color:#fff">▶ Present</span></div>
          </div>
          <div class="figma-body">
            <div class="fig-left">
              <div class="fig-tool active"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 5v13l4-4 3 5 2-1-3-5 6-1Z"></path></svg></div><div class="fig-tool"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="6" y="6" width="12" height="12" rx="1.5"></rect></svg></div><div class="fig-tool"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 19 6-14 8 8-14 6Z"></path></svg></div><div class="fig-tool"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 6h8"></path><path d="M12 6v12"></path></svg></div><div class="fig-tool"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="1"></rect><rect x="13" y="4" width="7" height="7" rx="1"></rect><rect x="4" y="13" width="7" height="7" rx="1"></rect><rect x="13" y="13" width="7" height="7" rx="1"></rect></svg></div><div style="flex:1"></div><div class="fig-tool"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m13 3-7 10h5l-1 8 8-12h-5l1-6Z"></path></svg></div><div class="fig-tool"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"></path><circle cx="12" cy="12" r="2.5"></circle></svg></div>
            </div>
            <div class="fig-layers">
              <div class="fig-layers-head">Layers</div>
              <div class="fig-layer">Pages</div><div class="fig-layer indent selected">Dashboard</div><div class="fig-layer indent">Mobile</div><div class="fig-layer indent">Components</div><div class="fig-layer indent">Wireframes</div>
              <div class="fig-layers-head" style="margin-top:.75rem">Frames</div>
              <div class="fig-layer selected">▣ Hero Section</div><div class="fig-layer indent">◻ Nav Bar</div><div class="fig-layer indent">◻ Headline</div><div class="fig-layer indent">◻ CTA Button</div><div class="fig-layer">▣ Stats Bar</div><div class="fig-layer">▣ Card Grid</div>
            </div>
            <div class="fig-canvas">
              <div class="fig-canvas-inner">
                <div>
                  <div class="fig-frame-label">Landing Page — Desktop 1440</div>
                  <div class="fig-frame" style="width:200px">
                    <div class="af-nav"><div class="af-logo-bar"></div><div class="af-nav-links"><div class="af-nl"></div><div class="af-nl"></div><div class="af-nl"></div></div><div class="af-cta-sm"></div></div>
                    <div class="af-hero-block"><div class="af-h1"></div><div class="af-h1b"></div><div class="af-hbtn"></div></div>
                    <div class="af-cards-row"><div class="af-card-sm"></div><div class="af-card-sm"></div><div class="af-card-sm"></div></div>
                    <div class="af-text-block"><div class="af-line med"></div><div class="af-line"></div><div class="af-line short"></div><div class="af-line med"></div><div class="af-line short"></div></div>
                  </div>
                </div>
                <div>
                  <div class="fig-frame-label">App Dashboard — Dark</div>
                  <div class="fig-frame" style="width:180px;background:#1a1a1a">
                    <div class="af2-head"><div class="af2-logo"></div><div class="af2-nav"><div class="af2-n"></div><div class="af2-n"></div><div class="af2-n"></div></div></div>
                    <div class="af2-body"><div class="af2-sidebar"><div class="af2-si active"></div><div class="af2-si"></div><div class="af2-si"></div><div class="af2-si"></div><div class="af2-si"></div></div><div class="af2-content"><div class="af2-stat-row"><div class="af2-stat"></div><div class="af2-stat"></div><div class="af2-stat"></div></div><div class="af2-chart"><div class="af2-bar-group"><div class="af2-bar" style="height:40%"></div><div class="af2-bar" style="height:65%"></div><div class="af2-bar" style="height:55%"></div><div class="af2-bar" style="height:80%"></div><div class="af2-bar" style="height:50%"></div><div class="af2-bar" style="height:90%"></div><div class="af2-bar" style="height:70%"></div></div></div><div class="af2-stat-row"><div class="af2-stat" style="flex:2"></div><div class="af2-stat"></div></div></div></div>
                  </div>
                </div>
              </div>
              <div class="fig-cursor">🖱</div>
            </div>
            <div class="fig-right">
              <div class="fig-props-head">Design</div>
              <div class="fig-prop-row"><div class="fig-prop-label">W × H</div><div class="fig-prop-val">1440 × 900</div></div>
              <div class="fig-prop-row"><div class="fig-prop-label">Fill</div><div class="fig-prop-swatch"><div class="fig-swatch" style="background:#0d0d0d"></div><div class="fig-swatch" style="background:#7c3aed"></div><div class="fig-swatch" style="background:#c8a96e"></div></div></div>
              <div class="fig-prop-row"><div class="fig-prop-label">Font</div><div class="fig-prop-val">DM Sans / 16</div></div>
              <div class="fig-prop-row"><div class="fig-prop-label">Radius</div><div class="fig-prop-val">8px</div></div>
              <div class="fig-prop-row"><div class="fig-prop-label">Auto Layout</div><div class="fig-prop-val">↕ 16px gap</div></div>
              <div class="fig-props-head" style="margin-top:1rem">Prototype</div>
              <div class="fig-prop-row"><div class="fig-prop-label">Interaction</div><div class="fig-prop-val">On click →</div></div>
              <div class="fig-prop-row"><div class="fig-prop-label">Animation</div><div class="fig-prop-val">Smart Animate</div></div>
            </div>
          </div>
        </div>
        <div class="floating-speed"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg> Handoff ready · 247 components</div>
      </div>
    </div>
  </header>

  <div class="intro-band">
    <div class="intro-grid">
      <div class="intro-item reveal"><div class="intro-num"><span class="counter" data-target="85">0</span><span>+</span></div><div class="intro-label">Products Designed</div></div>
      <div class="intro-item reveal"><div class="intro-num"><span class="counter" data-target="247">0</span><span style="color:var(--gold)"> avg</span></div><div class="intro-label">Components per Design System</div></div>
      <div class="intro-item reveal"><div class="intro-num"><span>from </span><span style="color:var(--gold)">₦280k</span></div><div class="intro-label">Starting Price</div></div>
      <div class="intro-item reveal"><div class="intro-num">2–4<span style="font-size:1.2rem;color:var(--gold)">wks</span></div><div class="intro-label">Typical Delivery Time</div></div>
    </div>
  </div>

  <section class="build-section" aria-labelledby="build-heading">
    <div class="build-intro">
      <div><span class="s-label">What We Design</span><h2 class="s-head" id="build-heading">UI/UX solutions for<br>every <em>type of product</em></h2></div>
      <p class="s-sub">Great design is not decoration. It is strategy made visible. Whether you are launching a new product or overhauling a legacy system, we bring rigour and creativity to every screen, flow, and interaction your users will encounter.</p>
    </div>
    <div class="build-grid">
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M8 19v2"></path><path d="M16 19v2"></path></svg></div><h3 class="build-title">Website UI Design</h3><p class="build-desc">Pixel-perfect visual designs for marketing websites, landing pages, and corporate sites. We design with conversion and brand clarity in mind, so every section has a purpose and every CTA earns its place. Delivered in Figma with all responsive breakpoints included.</p><div class="build-tags"><span class="build-tag">Figma</span><span class="build-tag">Responsive</span><span class="build-tag">Landing Pages</span><span class="build-tag">Brand Alignment</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19h16"></path><path d="M7 15V9"></path><path d="M12 15V5"></path><path d="M17 15v-3"></path></svg></div><h3 class="build-title">Web App & Dashboard Design</h3><p class="build-desc">Complex SaaS products, admin dashboards, and data-heavy interfaces designed for clarity and efficiency. We organise information architecture, simplify workflows, and design component libraries that your engineering team can build and extend without us.</p><div class="build-tags"><span class="build-tag">SaaS UI</span><span class="build-tag">Dashboards</span><span class="build-tag">Data Viz</span><span class="build-tag">Component Library</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="2.5" width="10" height="19" rx="2"></rect><path d="M11 18.5h2"></path></svg></div><h3 class="build-title">Mobile App Design (iOS & Android)</h3><p class="build-desc">Native-feel mobile interfaces that follow Apple Human Interface Guidelines and Material Design 3 while maintaining your unique brand identity. We design for thumb zones, platform conventions, and real network conditions, not just pretty screenshots.</p><div class="build-tags"><span class="build-tag">iOS Design</span><span class="build-tag">Android</span><span class="build-tag">HIG Compliant</span><span class="build-tag">Material Design 3</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="1.5"></rect><rect x="13" y="4" width="7" height="7" rx="1.5"></rect><rect x="4" y="13" width="7" height="7" rx="1.5"></rect><rect x="13" y="13" width="7" height="7" rx="1.5"></rect></svg></div><h3 class="build-title">Design Systems & Component Libraries</h3><p class="build-desc">Scalable, token-based design systems built in Figma that give your team a single source of truth. We define typography scales, colour tokens, spacing grids, and interactive component variants so you can build new features fast without visual inconsistency creeping in.</p><div class="build-tags"><span class="build-tag">Design Tokens</span><span class="build-tag">Auto Layout</span><span class="build-tag">Variants</span><span class="build-tag">Documentation</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 12a9 9 0 1 1-2.64-6.36"></path><path d="M21 3v6h-6"></path></svg></div><h3 class="build-title">UX Audits & Redesigns</h3><p class="build-desc">Already have a product but users are struggling? We conduct structured UX audits using heuristic evaluation, session analysis, and user feedback synthesis to identify friction, then redesign problematic flows and screens with evidence-based solutions.</p><div class="build-tags"><span class="build-tag">Heuristic Audit</span><span class="build-tag">User Testing</span><span class="build-tag">Redesign</span><span class="build-tag">Conversion CRO</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="20" r="1.5"></circle><circle cx="17" cy="20" r="1.5"></circle><path d="M5 5h2l2.2 9.5a1 1 0 0 0 1 .8h7.5a1 1 0 0 0 1-.8L20 8H8"></path></svg></div><h3 class="build-title">E-Commerce UX Design</h3><p class="build-desc">Custom product pages, streamlined checkout flows, and trust-building design patterns for online stores. Whether you are on WooCommerce, Shopify, or a custom stack, we design the experience that turns browsers into buyers and buyers into repeat customers.</p><div class="build-tags"><span class="build-tag">Product Pages</span><span class="build-tag">Checkout UX</span><span class="build-tag">Trust Signals</span><span class="build-tag">Cart Flows</span></div></div>
    </div>
  </section>

  <section class="approach-section" aria-labelledby="approach-heading">
    <div class="approach-layout">
      <div class="approach-copy">
        <span class="s-label">Our Design Philosophy</span>
        <h2 class="s-head" id="approach-heading">Design that starts with <em>the user,</em> not the aesthetic</h2>
        <p>Beautiful interfaces that nobody can figure out how to use are not good design. They are expensive mistakes. Every project we take on begins with understanding who the user is, what they are trying to accomplish, and what gets in their way.</p>
        <p>We map user journeys before we open Figma. We sketch wireframes before we pick colours. We test prototypes before we call a design finished. This discipline is what separates a product that looks good in a presentation from one that performs in the real world.</p>
        <div class="highlight-box"><h4>Our design principle: <span class="hb-gold">clarity over cleverness</span></h4><p>A user should never need to think about how to use your interface. If they do, the design has failed. Every creative decision must serve a functional purpose.</p></div>
        <p>We work collaboratively and transparently. You receive Figma view access from day one, weekly progress check-ins, and a structured feedback process that keeps the project moving without constant revision loops.</p>
      </div>
      <div class="ux-compare">
        <div class="ux-block"><div class="ux-block-head ux"><span>UX (User Experience) Design</span><span style="font-size:.65rem;font-weight:400;letter-spacing:.04em;text-transform:none">The Architecture</span></div><div class="ux-block-body"><div class="ux-item">User research & persona development</div><div class="ux-item">User journey & task flow mapping</div><div class="ux-item">Information architecture planning</div><div class="ux-item">Low-fidelity wireframes</div><div class="ux-item">Usability testing & iteration</div><div class="ux-item">Accessibility audit (WCAG 2.2 AA)</div></div></div>
        <div class="ux-block"><div class="ux-block-head ui"><span>UI (User Interface) Design</span><span style="font-size:.65rem;font-weight:400;letter-spacing:.04em;text-transform:none">The Experience</span></div><div class="ux-block-body"><div class="ux-item">Visual design language & brand application</div><div class="ux-item">Typography hierarchy & spacing system</div><div class="ux-item">Colour palette with accessibility ratios</div><div class="ux-item">High-fidelity screen designs</div><div class="ux-item">Component variants & interactive states</div><div class="ux-item">Micro-interactions & motion guidance</div></div></div>
      </div>
    </div>
  </section>

  <section class="process-section" aria-labelledby="process-heading">
    <div class="process-header">
      <div><span class="s-label" style="color:var(--gold)">Our Design Process</span><h2 class="s-head" id="process-heading" style="color:var(--white)">How we go from brief<br>to <em>beautiful, shippable design</em></h2></div>
      <p>No black-box design. Every phase is documented, shared, and signed off before we move to the next. You always know exactly where your project stands and what comes next.</p>
    </div>
    <div class="process-steps">
      <div class="ps-item reveal"><div class="ps-num">01</div><div class="ps-body"><h3 class="ps-title">Discovery & Research</h3><p class="ps-desc">We start every project by asking the right questions. We map your business goals, target users, competitive landscape, and technical constraints, then review any data or feedback that helps us baseline the current experience.</p><div class="ps-deliverables"><span class="ps-del">Project Brief</span><span class="ps-del">User Personas</span><span class="ps-del">Competitor Analysis</span><span class="ps-del">User Journey Map</span><span class="ps-del">Design Brief Sign-Off</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">02</div><div class="ps-body"><h3 class="ps-title">Information Architecture & Wireframing</h3><p class="ps-desc">Before a single colour is chosen, we establish how the product is structured. We map architecture, define hierarchies, and produce low-fidelity wireframes for every key screen so structural issues are solved early.</p><div class="ps-deliverables"><span class="ps-del">Site/App Architecture</span><span class="ps-del">Annotated Wireframes</span><span class="ps-del">Content Hierarchy</span><span class="ps-del">Navigation Flows</span><span class="ps-del">Wireframe Approval</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">03</div><div class="ps-body"><h3 class="ps-title">Visual Design & Design System</h3><p class="ps-desc">Once the structure is approved, we develop the visual language. We create a design system foundation and then apply it to produce full high-fidelity designs for every screen and state.</p><div class="ps-deliverables"><span class="ps-del">Design System Foundation</span><span class="ps-del">High-Fidelity Screens</span><span class="ps-del">Component Library</span><span class="ps-del">Dark/Light Mode</span><span class="ps-del">Responsive Breakpoints</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">04</div><div class="ps-body"><h3 class="ps-title">Interactive Prototyping & Testing</h3><p class="ps-desc">Static screens do not reveal usability problems. We wire up a fully interactive Figma prototype that simulates navigation and key user flows, then test and iterate before final delivery.</p><div class="ps-deliverables"><span class="ps-del">Interactive Prototype</span><span class="ps-del">Usability Test Report</span><span class="ps-del">Iteration Rounds</span><span class="ps-del">Accessibility Check</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">05</div><div class="ps-body"><h3 class="ps-title">Developer Handoff & Support</h3><p class="ps-desc">All Figma files are meticulously organised with named layers, grouped components, and export-ready assets. We provide annotations, a motion guide, and a live walkthrough with your development team.</p><div class="ps-deliverables"><span class="ps-del">Organised Figma File</span><span class="ps-del">Component Annotations</span><span class="ps-del">Motion Guide</span><span class="ps-del">Dev Handoff Session</span><span class="ps-del">Design QA Support</span></div></div></div>
    </div>
  </section>

  <section class="tech-section" aria-labelledby="tech-heading">
    <div class="tech-intro">
      <div><span class="s-label">Tools & Stack</span><h2 class="s-head" id="tech-heading">Every tool chosen for <em>precision & collaboration</em></h2></div>
      <p>Our stack is built around Figma as the single source of design truth, with a carefully chosen set of supporting tools that keep research, testing, and communication aligned across your team and ours.</p>
    </div>
    <div class="tech-table">
      <div class="tech-row reveal"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 3h6a3 3 0 1 1 0 6H9a3 3 0 0 1 0-6Z"></path><path d="M9 9h6a3 3 0 1 1 0 6H9a3 3 0 0 1 0-6Z"></path><path d="M9 15a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z"></path></svg></div><div><div class="tech-name">Figma</div><div class="tech-sub">Design & Prototype</div></div></div><div class="tech-desc">Our primary design environment for wireframes, high-fidelity UI design, interactive prototypes, component libraries, and developer handoff.</div><span class="tech-badge core">Core Tool</span></div>
      <div class="tech-row reveal"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18"></path><path d="M6 6v12"></path><path d="M12 6v12"></path><path d="M18 6v12"></path><path d="M3 12h18"></path><path d="M3 18h18"></path></svg></div><div><div class="tech-name">FigJam</div><div class="tech-sub">Workshops & Mapping</div></div></div><div class="tech-desc">Used for collaborative discovery workshops, user journey mapping, site architecture planning, and remote brainstorming sessions with stakeholders.</div><span class="tech-badge ext">Collaboration</span></div>
      <div class="tech-row reveal"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 3v7.5l-4.5 7.8A1.8 1.8 0 0 0 7 21h10a1.8 1.8 0 0 0 1.5-2.7L14 10.5V3"></path><path d="M9 14h6"></path><path d="M8 17h8"></path></svg></div><div><div class="tech-name">Maze / Useberry</div><div class="tech-sub">Usability Testing</div></div></div><div class="tech-desc">Remote usability testing on Figma prototypes with heatmaps, click maps, and completion-rate reports that feed directly back into design iterations.</div><span class="tech-badge ext">Research</span></div>
      <div class="tech-row reveal"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19h16"></path><path d="M4 15h10"></path><path d="M4 11h16"></path><path d="M4 7h8"></path></svg></div><div><div class="tech-name">Figma Variables & Tokens</div><div class="tech-sub">Design Tokens</div></div></div><div class="tech-desc">Colour, spacing, radius, and typography tokens that map directly to CSS custom properties or design token JSON files.</div><span class="tech-badge perf">Best Practice</span></div>
      <div class="tech-row reveal"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 8v8"></path><path d="M9 11h6"></path></svg></div><div><div class="tech-name">Stark / Contrast</div><div class="tech-sub">Accessibility Checks</div></div></div><div class="tech-desc">Every design is checked against WCAG 2.2 Level AA contrast ratios and accessibility guidelines before handoff.</div><span class="tech-badge perf">Accessibility</span></div>
      <div class="tech-row reveal"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 4h8l4 4v12H7Z"></path><path d="M15 4v4h4"></path><path d="M9 13h6"></path><path d="M9 17h4"></path></svg></div><div><div class="tech-name">Notion / Confluence</div><div class="tech-sub">Documentation</div></div></div><div class="tech-desc">All project documentation — briefs, research findings, component annotations, design decisions, and handoff notes — lives in one linked source of truth.</div><span class="tech-badge tool">Documentation</span></div>
    </div>
  </section>

  <section class="deliv-section" aria-labelledby="deliv-heading">
    <div class="deliv-intro">
      <div><span class="s-label">What You Receive</span><h2 class="s-head" id="deliv-heading">Everything your team needs<br>to <em>build without guessing</em></h2></div>
      <p>We do not deliver a Figma link and disappear. Every engagement ends with a structured handoff package that gives your development team everything they need to build, extend, and maintain the product consistently.</p>
    </div>
    <div class="deliv-grid">
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 3h6a3 3 0 1 1 0 6H9a3 3 0 0 1 0-6Z"></path><path d="M9 9h6a3 3 0 1 1 0 6H9a3 3 0 0 1 0-6Z"></path><path d="M9 15a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z"></path></svg></div><div class="deliv-body"><h4>Organised Figma Source File</h4><p>A fully structured Figma file with named pages, grouped layers, and clearly labelled frames for every screen and state.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="1.5"></rect><rect x="13" y="4" width="7" height="7" rx="1.5"></rect><rect x="4" y="13" width="7" height="7" rx="1.5"></rect><rect x="13" y="13" width="7" height="7" rx="1.5"></rect></svg></div><div class="deliv-body"><h4>Component Library with All States</h4><p>Every UI component built with complete state coverage: default, hover, focus, active, disabled, loading, error, and empty.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19h16"></path><path d="M4 15h10"></path><path d="M4 11h16"></path><path d="M4 7h8"></path></svg></div><div class="deliv-body"><h4>Design Token Export</h4><p>Colour, typography, spacing, radius, and shadow tokens exported as JSON or CSS custom properties for clean developer handoff.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m13 3-7 10h5l-1 8 8-12h-5l1-6Z"></path></svg></div><div class="deliv-body"><h4>Interactive Prototype</h4><p>A shareable Figma prototype link covering all primary user flows with working navigation and interaction guidance.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 4h8l4 4v12H7Z"></path><path d="M15 4v4h4"></path><path d="M9 13h6"></path><path d="M9 17h4"></path></svg></div><div class="deliv-body"><h4>Annotation & Specification Document</h4><p>A written document covering behaviour, spacing rules, responsive logic, interaction patterns, and edge cases.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 4 3 9l9 5 9-5-9-5Z"></path><path d="M7 11.5v4.5c0 .8 2.2 2 5 2s5-1.2 5-2v-4.5"></path></svg></div><div class="deliv-body"><h4>Handoff Session & Design QA</h4><p>A live walkthrough with your engineering team plus up to four weeks of design QA support during the build phase.</p></div></div>
    </div>
  </section>

  <section class="packages-section" aria-labelledby="packages-heading">
    <div class="packages-intro">
      <div><span class="s-label">Design Packages</span><h2 class="s-head" id="packages-heading">Clear, transparent pricing<br>for <em>every scale of project</em></h2></div>
      <p>Every project is scoped individually, but these packages give you a clear starting point. Not sure which fits? Book a free 30-minute discovery call and we will tell you exactly what your project needs.</p>
    </div>
    <div class="pkg-grid">
      <div class="pkg-card reveal"><div class="pkg-head"><span class="pkg-badge">Starter</span><div class="pkg-name">UI Design</div><div class="pkg-tagline">For landing pages, portfolios, and single-feature digital products that need a polished visual design without a full UX research phase.</div><div class="pkg-price">₦280,000 <sub>starting from</sub></div></div><div class="pkg-body"><div class="pkg-feat">Up to 8 designed screens</div><div class="pkg-feat">Desktop + mobile responsive</div><div class="pkg-feat">Brand style guide application</div><div class="pkg-feat">Basic component library</div><div class="pkg-feat">Interactive prototype</div><div class="pkg-feat">2 rounds of revisions</div><div class="pkg-feat">Developer handoff package</div><div class="pkg-feat no">UX research & personas</div><div class="pkg-feat no">Usability testing</div><div class="pkg-feat no">Design token export</div></div><div class="pkg-foot"><a href="#contact" class="pkg-btn outline">Start a Conversation</a></div></div>
      <div class="pkg-card featured reveal"><div class="pkg-head"><span class="pkg-badge">Most Popular</span><div class="pkg-name">UX + UI Design</div><div class="pkg-tagline">The full design process — from research through to pixel-perfect screens — for web apps, mobile apps, and multi-page websites.</div><div class="pkg-price">₦580,000 <sub>starting from</sub></div></div><div class="pkg-body"><div class="pkg-feat">Up to 20 designed screens</div><div class="pkg-feat">UX research & user personas</div><div class="pkg-feat">User journey mapping</div><div class="pkg-feat">Wireframes (all screens)</div><div class="pkg-feat">Full design system + tokens</div><div class="pkg-feat">Interactive prototype</div><div class="pkg-feat">1 round of usability testing</div><div class="pkg-feat">3 rounds of revisions</div><div class="pkg-feat">Full developer handoff</div><div class="pkg-feat">4 weeks design QA support</div></div><div class="pkg-foot"><a href="#contact" class="pkg-btn gold">Get a Quote for This →</a></div></div>
      <div class="pkg-card reveal"><div class="pkg-head"><span class="pkg-badge">Enterprise</span><div class="pkg-name">Design System & Scale</div><div class="pkg-tagline">For established products needing a full design system overhaul, audit-led redesigns, or an ongoing embedded design partnership.</div><div class="pkg-price">Custom <sub>let's talk scope</sub></div></div><div class="pkg-body"><div class="pkg-feat">Unlimited screens in scope</div><div class="pkg-feat">Full UX audit of existing product</div><div class="pkg-feat">Comprehensive design system</div><div class="pkg-feat">Multi-platform (web + mobile)</div><div class="pkg-feat">Multiple rounds of usability testing</div><div class="pkg-feat">Design token pipeline setup</div><div class="pkg-feat">Storybook/Zeroheight integration</div><div class="pkg-feat">Ongoing design retainer option</div><div class="pkg-feat">Priority turnaround</div><div class="pkg-feat">Dedicated Slack channel</div></div><div class="pkg-foot"><a href="#contact" class="pkg-btn solid">Discuss Your Project</a></div></div>
    </div>
  </section>

  <section class="results-section" aria-labelledby="results-heading">
    <div class="results-intro">
      <div><span class="s-label" style="color:var(--gold)">Impact & Results</span><h2 class="s-head" id="results-heading" style="color:var(--white)">Design that moves<br><em>real business metrics</em></h2></div>
      <p>Good design is not just pleasant to use. It generates measurable outcomes. Here are some of the results clients have seen after investing in thoughtful UI/UX design.</p>
    </div>
    <div class="results-grid">
      <div class="result-card reveal"><div class="result-num">+<span>64</span>%</div><div class="result-label">Increase in Sign-Up Conversion</div><p class="result-project">Fintech onboarding flow redesign reduced drop-off from 73% to under 30% by simplifying a five-step registration into a progressive disclosure pattern with inline validation.</p><a href="{{ route('portfolio.index') }}" class="result-link">View Case Study →</a></div>
      <div class="result-card reveal"><div class="result-num">3.<span>2</span>×</div><div class="result-label">Increase in Mobile Task Completion</div><p class="result-project">A mobile app redesign for a logistics platform uncovered 11 critical friction points. Post-redesign usability testing showed a 3.2× improvement in task completion on mobile devices.</p><a href="{{ route('portfolio.index') }}" class="result-link">View Case Study →</a></div>
      <div class="result-card reveal"><div class="result-num">-<span>58</span>%</div><div class="result-label">Reduction in Support Tickets</div><p class="result-project">A SaaS dashboard redesign for an HR platform created clearer information architecture and stronger empty-state guidance, reducing onboarding support tickets by 58% within 90 days of launch.</p><a href="{{ route('portfolio.index') }}" class="result-link">View Case Study →</a></div>
    </div>
  </section>

  <section class="compare-section" aria-labelledby="compare-heading">
    <div class="compare-intro">
      <div><span class="s-label">Why i2Medier</span><h2 class="s-head" id="compare-heading">How we compare to<br><em>other design options</em></h2></div>
      <p>Many teams turn to freelancers for affordability or large agencies for scale and end up frustrated by both. We offer a focused studio model that delivers agency-level rigour at a rational cost.</p>
    </div>
    <div class="compare-wrap"><table class="compare-table" aria-label="Design provider comparison">
      <thead><tr><th>Design Consideration</th><th>Freelancer</th><th class="highlight">i2Medier</th><th>Large Agency</th></tr></thead>
      <tbody>
        <tr><td class="feature">UX Research Included</td><td><span class="partial">Sometimes (extra cost)</span></td><td class="highlight"><span class="yes">✓ Included in every engagement</span></td><td><span class="partial">Usually a separate phase</span></td></tr>
        <tr><td class="feature">Design System Delivered</td><td><span class="no">Rarely</span></td><td class="highlight"><span class="yes">✓ Standard in all packages</span></td><td><span class="partial">Yes, but often locked-in formats</span></td></tr>
        <tr><td class="feature">Accessibility (WCAG 2.2 AA)</td><td><span class="no">Inconsistent</span></td><td class="highlight"><span class="yes">✓ Checked on every screen</span></td><td><span class="partial">Depends on account team</span></td></tr>
        <tr><td class="feature">Dev-Ready Handoff</td><td><span class="partial">Basic Figma file only</span></td><td class="highlight"><span class="yes">✓ Full annotations + session</span></td><td><span class="yes">✓ Yes but expensive</span></td></tr>
        <tr><td class="feature">Responsive Breakpoints</td><td><span class="partial">Desktop only, often</span></td><td class="highlight"><span class="yes">✓ All breakpoints as standard</span></td><td><span class="yes">✓ Yes</span></td></tr>
        <tr><td class="feature">Usability Testing</td><td><span class="no">Rarely offered</span></td><td class="highlight"><span class="yes">✓ On Growth & Enterprise plans</span></td><td><span class="partial">Often an expensive add-on</span></td></tr>
        <tr><td class="feature">Client Figma Access</td><td><span class="partial">Sometimes shared at end</span></td><td class="highlight"><span class="yes">✓ View access from day one</span></td><td><span class="partial">Often proprietary tools</span></td></tr>
        <tr><td class="feature">Design QA During Build</td><td><span class="no">Not included</span></td><td class="highlight"><span class="yes">✓ 4 weeks included</span></td><td><span class="partial">Billed separately</span></td></tr>
      </tbody>
    </table></div>
  </section>

  <section class="test-section" aria-labelledby="test-heading">
    <div class="test-intro"><span class="s-label">Client Testimonials</span><h2 class="s-head" id="test-heading">What our clients say about<br>the <em>design experience</em></h2></div>
    <div class="test-grid">
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"The process was unlike anything I had experienced with a design agency before. They mapped our entire user journey before touching Figma, and the wireframe phase alone saved us from building the wrong thing."</p><div class="test-author"><div class="test-avatar">AO</div><div><div class="test-name">Adaeze Okonkwo</div><div class="test-role">CEO, Paysafe Fintech · Lagos</div></div></div></div>
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"i2Medier designed our entire SaaS dashboard from scratch and the end result was a product our users genuinely enjoy using. The design system they delivered has made our engineering team's life significantly easier."</p><div class="test-author"><div class="test-avatar">TM</div><div><div class="test-name">Tunde Mathias</div><div class="test-role">Product Lead, OperaHR · Abuja</div></div></div></div>
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"They ran usability tests on the prototype and caught three major issues we never would have caught otherwise. The final product launched without a single usability complaint from users."</p><div class="test-author"><div class="test-avatar">CW</div><div><div class="test-name">Claire Whitfield</div><div class="test-role">Head of Product, Trackr Logistics · UK</div></div></div></div>
    </div>
  </section>

  <section class="faq-section" aria-labelledby="faq-heading">
    <span class="s-label">Frequently Asked Questions</span>
    <h2 class="s-head" id="faq-heading">Questions about our<br><em>UI/UX design service</em></h2>
    <div class="faq-layout">
      <div class="faq-sidebar"><h3>Can't find your answer here?</h3><p>We are happy to answer questions about our design process, tools, timelines, or pricing in a free 30-minute discovery call.</p><a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us Directly →</a></div>
      <div class="faq-list">
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq1">What tools do you use for UI/UX design?<span class="faq-icon">+</span></button><div class="faq-a" id="faq1">We design exclusively in Figma and also use FigJam for workshops plus Maze or Useberry for remote usability testing when required.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq2">What is the difference between UI design and UX design?<span class="faq-icon">+</span></button><div class="faq-a" id="faq2">UX design covers the overall feel and usability of the product. UI design covers the visual layer: typography, colour, spacing, icons, components, and hierarchy. We practise both together.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq3">Do you do UX research as part of the design process?<span class="faq-icon">+</span></button><div class="faq-a" id="faq3">Yes. Every engagement begins with discovery, including stakeholder interviews, competitor analysis, personas, and user journey mapping. Larger products also include usability testing.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq4">Will the designs be ready for handoff to developers?<span class="faq-icon">+</span></button><div class="faq-a" id="faq4">Absolutely. Every final Figma file is organised for handoff, with named components, token-based spacing and type, defined states, export-ready assets, annotations, and a walkthrough session if needed.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq5">Can you design both the mobile and desktop versions?<span class="faq-icon">+</span></button><div class="faq-a" id="faq5">Yes. All design engagements include responsive design across desktop, tablet, and mobile breakpoints as standard.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq6">How much does UI/UX design cost in Nigeria?<span class="faq-icon">+</span></button><div class="faq-a" id="faq6">Our UI/UX design engagements start from ₦280,000 for a focused single-product design. Larger systems, SaaS platforms, and mobile apps are quoted based on scope and complexity.</div></div>
      </div>
    </div>
  </section>

  <section class="related-section" aria-labelledby="related-heading">
    <span class="s-label">Related Services</span>
    <h2 class="s-head" id="related-heading">Often paired <em>with this service</em></h2>
    <div class="related-grid">
      <a href="{{ route('site.services.wordpress-development') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 1 0 9 9"></path><path d="M8.5 8.5c1 3 2 6 3.5 9"></path><path d="M15.5 8.5c-1 3-2 6-3.5 9"></path><path d="M6.5 8.5h11"></path></svg></div><div class="ri-name">WordPress Development</div><p class="ri-desc">Custom WordPress builds from scratch — your Figma designs brought to life with clean PHP, ACF, and zero page builders.</p></a>
      <a href="{{ route('site.services.search-optimization') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-4.2-4.2"></path></svg></div><div class="ri-name">SEO Services</div><p class="ri-desc">On-page SEO, schema markup, and keyword strategy built into the structure of every page we design from the ground up.</p></a>
      <a href="{{ route('site.services.cloud-architecture') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m13 3-7 10h5l-1 8 8-12h-5l1-6Z"></path></svg></div><div class="ri-name">Performance Optimisation</div><p class="ri-desc">Core Web Vitals improvement and design-to-performance audits ensuring your beautifully designed site loads at the speed users expect.</p></a>
      <a href="{{ route('site.services.mobile-app-development') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="2.5" width="10" height="19" rx="2"></rect><path d="M11 18.5h2"></path></svg></div><div class="ri-name">Mobile App Development</div><p class="ri-desc">React Native and Flutter app development to bring your mobile UI/UX designs to life on iOS and Android with full feature parity.</p></a>
    </div>
  </section>

  <section class="cta-band" id="contact" aria-labelledby="cta-h">
    <h2 id="cta-h">Ready to design a product<br>your users will love?</h2>
    <p>Tell us about your project and we will send you a free, detailed design proposal within 24 hours.</p>
    <a href="{{ route('site.start', ['services' => 'uiux', 'source_page' => 'service-ui-ux-design', 'source_label' => 'UI UX Design Service Page']) }}" class="btn-dark">Start Your Design Project →</a>
  </section>
</div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/service-ui-ux-design.js')
@endpush
