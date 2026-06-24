@extends('public.layouts.app')

@section('title', 'SaaS Application Development Company in Nigeria | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'SaaS Application Development', 'item' => route('site.services.saas-application')],
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
            'name' => 'What makes SaaS development different from a standard web application?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A SaaS product has recurring business complexity that a standard application does not: subscription billing with trials and renewals, multi-tenant account isolation, feature gating per plan, onboarding flows designed for activation, and the admin tools your team needs to support customers at scale. These are not add-ons — they are core to the product. Building them properly from the start is what separates a product that scales from one that needs a full rewrite at 500 customers.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Do I need multi-tenancy for my SaaS?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'It depends on your product model. If your customers are organisations with multiple users sharing data within a workspace — yes, you need multi-tenancy. If your product is individual-user focused with no team collaboration, a simpler account model may be sufficient. We diagnose this during discovery and recommend the right architecture for your specific product, rather than applying a default multi-tenant template to everything.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Which payment gateways do you integrate?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We integrate Paystack for Nigerian naira subscriptions and Stripe for international billing. Both are implemented with full subscription support — recurring charges, plan upgrades, downgrades, trial periods, failed payment recovery (dunning), and invoice generation. We also integrate Flutterwave when the payment mix requires it. All integrations are tested thoroughly in sandbox before any production billing is enabled.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'How long does it take to build a SaaS product?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'MVP SaaS products with core billing and onboarding typically take 8–10 weeks from design sign-off. Full-featured platforms with multi-tenancy, team accounts, feature gating, and a complete admin panel range from 12–16 weeks. Enterprise-grade SaaS with complex integrations and high-traffic requirements can take 20+ weeks. We provide a detailed, milestone-by-milestone timeline during discovery — you know exactly what is happening and when before any commitment is made.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Can you build on top of an existing codebase?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — but we will first conduct a codebase audit to understand the current quality, architecture decisions, and technical debt. For some projects, building on the existing code is the right call. For others, the debt is significant enough that starting fresh is faster and cheaper in the medium term. We will give you an honest assessment with a clear recommendation and cost comparison before any work begins.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'How much does SaaS development cost?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'SaaS MVP products start from ₦1.2 million. Full-featured platforms with multi-tenancy, subscription billing, and a complete admin panel typically range from ₦2M to ₦5M. Enterprise SaaS is quoted based on scope. All projects receive a written, itemised proposal after a free discovery session — you know exactly what you are paying for before any commitment is made. There are no hidden costs and no scope changes that are not agreed in writing first.'],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('page_css')
    @vite('resources/css/public/pages/saas-application.css')
@endpush

@push('scripts')
    @vite('resources/js/public/pages/service-saas-application.js')
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
      <span aria-current="page">SaaS Application</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> SaaS Application Development</span>
    <h1>Software products built<br>for <em>recurring growth</em><br>from day one</h1>
    <p class="hero-sub">SaaS needs more than a codebase. It needs a strong product foundation — accounts, onboarding, subscription billing, and the internal workflows that keep the platform usable as your customer base scales from ten to ten thousand.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-white">Discuss Your SaaS Idea →</a>
      <a href="{{ route('portfolio.index') }}" class="btn-ghost">See Our Platforms</a>
    </div>
    <div class="hero-pills">
      <span class="hero-pill"><span class="hero-pill-dot"></span> Laravel 13</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Multi-tenancy</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Subscription Billing</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Livewire 4</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Filament 5</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> REST APIs</span>
    </div>
  </div>

  <!-- Dashboard mock -->
  <div class="hero-right">
    <div class="dashboard-wrap">
      <div class="float-badge">SaaS Platform · Live</div>
      <div class="dashboard">
        <div class="dashboard-bar">
          <div class="d-dot" style="background:#ff5f57"></div>
          <div class="d-dot" style="background:#febc2e"></div>
          <div class="d-dot" style="background:#28c840"></div>
          <span class="d-title">i2medier-saas · Admin Dashboard</span>
        </div>
        <div class="dashboard-body">
          <div class="d-row">
            <div class="d-metric">
              <div class="d-metric-label">MRR</div>
              <div class="d-metric-val" style="color:#818cf8">₦4.2M</div>
              <div class="d-metric-sub">↑ 18% this month</div>
            </div>
            <div class="d-metric">
              <div class="d-metric-label">Active Users</div>
              <div class="d-metric-val">3,841</div>
              <div class="d-metric-sub">↑ 124 new this week</div>
            </div>
            <div class="d-metric">
              <div class="d-metric-label">Churn</div>
              <div class="d-metric-val" style="color:#4ade80">1.4%</div>
              <div class="d-metric-sub">↓ 0.3% improvement</div>
            </div>
          </div>
          <div class="d-chart">
            <div class="d-chart-label">New Subscriptions — Last 7 Days</div>
            <div class="d-bars">
              <div class="d-bar" style="height:40%;background:rgba(129,140,248,.35)"></div>
              <div class="d-bar" style="height:55%;background:rgba(129,140,248,.45)"></div>
              <div class="d-bar" style="height:45%;background:rgba(129,140,248,.35)"></div>
              <div class="d-bar" style="height:70%;background:rgba(129,140,248,.55)"></div>
              <div class="d-bar" style="height:60%;background:rgba(129,140,248,.45)"></div>
              <div class="d-bar" style="height:85%;background:rgba(129,140,248,.65)"></div>
              <div class="d-bar" style="height:100%;background:#818cf8"></div>
            </div>
          </div>
          <div class="d-users">
            <div class="d-users-label">Recent Signups</div>
            <div class="d-user-row">
              <div class="d-avatar" style="background:#6366f1">AC</div>
              <div class="d-user-info">
                <div class="d-user-name">Acme Corp</div>
                <div class="d-user-plan">Pro Plan · 12 seats</div>
              </div>
              <span class="d-user-status d-status-active">Active</span>
            </div>
            <div class="d-user-row">
              <div class="d-avatar" style="background:#8b5cf6">TF</div>
              <div class="d-user-info">
                <div class="d-user-name">TechFlow Ltd</div>
                <div class="d-user-plan">Starter Plan · 3 seats</div>
              </div>
              <span class="d-user-status d-status-trial">Trial</span>
            </div>
            <div class="d-user-row">
              <div class="d-avatar" style="background:#4f46e5">NB</div>
              <div class="d-user-info">
                <div class="d-user-name">Nova Brands</div>
                <div class="d-user-plan">Enterprise · 50 seats</div>
              </div>
              <span class="d-user-status d-status-active">Active</span>
            </div>
          </div>
        </div>
      </div>
      <div class="float-badge2">3,841 active subscribers · 99.9% uptime</div>
    </div>
  </div>
</header>

<!-- STATS BAND -->
<div class="stats-band">
  <div class="stats-grid">
    <div class="stat-item reveal"><div class="stat-num"><span class="counter" data-target="15">0</span><span>+</span></div><div class="stat-lbl">SaaS Platforms Delivered</div></div>
    <div class="stat-item reveal"><div class="stat-num">8–<span>16</span></div><div class="stat-lbl">Week Typical Timeline</div></div>
    <div class="stat-item reveal"><div class="stat-num">from <span>₦1.2M</span></div><div class="stat-lbl">Starting Price</div></div>
    <div class="stat-item reveal"><div class="stat-num" style="font-size:1.6rem">Multi<span>-tenant</span></div><div class="stat-lbl">Architecture Standard</div></div>
  </div>
</div>

<!-- ═══ WHAT WE BUILD ═══ -->
<section class="build-section" aria-labelledby="build-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="build-heading">SaaS products across<br>every <em>vertical</em></h2>
    </div>
    <p>A SaaS product is more than a web application with a subscription attached. It requires careful product thinking around user accounts, onboarding flows, recurring billing, workspace management, and the operational systems that keep the business running as it scales. Here is what we build most often.</p>
  </div>
  <div class="build-grid">

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div>
      <h3 class="build-title">B2B SaaS Platforms</h3>
      <p class="build-desc">Business-to-business tools that teams subscribe to monthly. We build with workspace isolation, team management, role-based access, and billing logic designed for organisational accounts from the start.</p>
      <div class="build-tags"><span class="build-tag">Workspaces</span><span class="build-tag">Team Roles</span><span class="build-tag">Org Billing</span><span class="build-tag">Admin Panel</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"></rect><path d="M8 21h8M12 17v4"></path></svg></div>
      <h3 class="build-title">Vertical SaaS</h3>
      <p class="build-desc">Industry-specific platforms built for a single profession — logistics, healthcare, legal, recruitment, or education. Domain-specific workflows, compliance needs, and reporting requirements are built in from day one.</p>
      <div class="build-tags"><span class="build-tag">Custom Workflows</span><span class="build-tag">Reporting</span><span class="build-tag">Integrations</span><span class="build-tag">Compliance</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l8 4.5v9L12 21l-8-4.5v-9L12 2z"></path><path d="M12 21v-9"></path><path d="M20 6.5l-8 4.5-8-4.5"></path></svg></div>
      <h3 class="build-title">API-First SaaS Products</h3>
      <p class="build-desc">Products where the API is the core deliverable — developer platforms, data services, or integrations. Built with versioning, API key management, usage tracking, rate limiting, and documentation from day one.</p>
      <div class="build-tags"><span class="build-tag">REST API</span><span class="build-tag">API Keys</span><span class="build-tag">Usage Limits</span><span class="build-tag">Postman Docs</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18"></path><path d="M7 15h4"></path></svg></div>
      <h3 class="build-title">Subscription Billing Platforms</h3>
      <p class="build-desc">Products where monetisation is the core architecture. Plan tiers, feature gating, trial periods, upgrade/downgrade flows, invoice generation, and renewal management structured cleanly from the beginning.</p>
      <div class="build-tags"><span class="build-tag">Plan Tiers</span><span class="build-tag">Feature Gates</span><span class="build-tag">Trial Flows</span><span class="build-tag">Paystack / Stripe</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V9"></path><path d="M10 19V5"></path><path d="M16 19v-7"></path><path d="M22 19V3"></path></svg></div>
      <h3 class="build-title">Analytics & Intelligence Platforms</h3>
      <p class="build-desc">Data-driven SaaS tools that ingest, process, and surface insights. We structure the data pipeline, dashboards, export functionality, and scheduled reporting so users can act on what the platform shows them.</p>
      <div class="build-tags"><span class="build-tag">Dashboards</span><span class="build-tag">Data Pipelines</span><span class="build-tag">Exports</span><span class="build-tag">Scheduled Reports</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg></div>
      <h3 class="build-title">MVP to Production SaaS</h3>
      <p class="build-desc">Early-stage products that need to launch quickly without sacrificing the foundations that matter. We help founders move from validated idea to working SaaS in weeks, with the architecture in place to scale when traction arrives.</p>
      <div class="build-tags"><span class="build-tag">MVP Scoping</span><span class="build-tag">Fast Delivery</span><span class="build-tag">Scale-ready</span><span class="build-tag">Founder-led</span></div>
    </div>

  </div>
</section>

<!-- ═══ SAAS PRODUCT FOUNDATIONS ═══ -->
<section class="arch-section" aria-labelledby="arch-heading">
  <div class="arch-header reveal">
    <div>
      <span class="s-label" style="color:var(--gold)">How We Architect It</span>
      <h2 class="s-head" style="color:var(--white)" id="arch-heading">Five layers every<br>SaaS product <em>must get right</em></h2>
    </div>
    <p>Most SaaS products fail not because of the core feature, but because the surrounding foundations — onboarding, billing, permissions, admin visibility — were added as afterthoughts. We design these in from the start, as first-class parts of the product architecture.</p>
  </div>

  <div class="arch-diagram reveal">
    <div class="arch-layer">
      <div class="arch-layer-head">
        <span class="arch-layer-badge onboarding">Onboarding Layer</span>
        <div class="arch-layer-title">Sign-up · First-run flows · Activation triggers</div>
      </div>
      <p class="arch-layer-desc">The first ten minutes of a user's experience determine whether they ever return. We design and build sign-up flows, email verification, guided first-run sequences, and activation checkpoints that move new users from registration to the moment they first experience your product's core value.</p>
      <div class="arch-layer-items"><span class="arch-chip">Email Verification</span><span class="arch-chip">Welcome Sequences</span><span class="arch-chip">Progress Checklists</span><span class="arch-chip">Feature Tours</span><span class="arch-chip">Activation Events</span></div>
    </div>
    <div class="arch-arrow">↓</div>
    <div class="arch-layer">
      <div class="arch-layer-head">
        <span class="arch-layer-badge billing">Billing & Subscription Layer</span>
        <div class="arch-layer-title">Plans · Feature gates · Renewals · Invoices</div>
      </div>
      <p class="arch-layer-desc">Subscription logic is more complex than it appears. We build plan tiers with feature-level access control, trial period management, upgrade and downgrade flows, proration handling, failed payment recovery, invoice generation, and webhook processing — so your billing infrastructure is production-grade from launch.</p>
      <div class="arch-layer-items"><span class="arch-chip">Paystack / Stripe</span><span class="arch-chip">Plan Tiers</span><span class="arch-chip">Feature Gating</span><span class="arch-chip">Trial Management</span><span class="arch-chip">Invoice PDFs</span><span class="arch-chip">Webhooks</span></div>
    </div>
    <div class="arch-arrow">↓</div>
    <div class="arch-layer">
      <div class="arch-layer-head">
        <span class="arch-layer-badge multitenancy">Multi-tenancy & Accounts Layer</span>
        <div class="arch-layer-title">Workspaces · Teams · Roles · Permissions</div>
      </div>
      <p class="arch-layer-desc">For B2B SaaS, the account model — how organisations, teams, and individual users relate to each other — is one of the most important architectural decisions made early. We implement workspace isolation, invitations, team roles, and granular permission policies that scale cleanly as your customer accounts grow in size and complexity.</p>
      <div class="arch-layer-items"><span class="arch-chip">Workspace Isolation</span><span class="arch-chip">Team Invitations</span><span class="arch-chip">RBAC</span><span class="arch-chip">Spatie Permissions</span><span class="arch-chip">SSO-Ready</span></div>
    </div>
    <div class="arch-arrow">↓</div>
    <div class="arch-layer">
      <div class="arch-layer-head">
        <span class="arch-layer-badge admin">Admin & Operations Layer</span>
        <div class="arch-layer-title">Customer management · Visibility · Support tools</div>
      </div>
      <p class="arch-layer-desc">Your team needs to support customers, manage subscriptions, investigate issues, and track product health without needing a developer for every query. We build a Filament admin panel with full customer visibility, subscription overrides, activity logs, and the operational tools your team will actually use every day.</p>
      <div class="arch-layer-items"><span class="arch-chip">Filament 5 Admin</span><span class="arch-chip">Customer Profiles</span><span class="arch-chip">Activity Logs</span><span class="arch-chip">Subscription Overrides</span><span class="arch-chip">Impersonation</span></div>
    </div>
    <div class="arch-arrow">↓</div>
    <div class="arch-layer">
      <div class="arch-layer-head">
        <span class="arch-layer-badge infra">Infrastructure & Reliability Layer</span>
        <div class="arch-layer-title">Queues · Monitoring · CI/CD · Zero-downtime</div>
      </div>
      <p class="arch-layer-desc">A SaaS product is expected to be available every hour of every day. We deploy with zero-downtime release pipelines, configure background queue workers for emails and processing tasks, set up uptime monitoring and error tracking, and establish the infrastructure baseline so your platform behaves reliably as usage grows.</p>
      <div class="arch-layer-items"><span class="arch-chip">Redis Queues</span><span class="arch-chip">Laravel Horizon</span><span class="arch-chip">Sentry</span><span class="arch-chip">DigitalOcean / AWS</span><span class="arch-chip">GitHub Actions CI/CD</span></div>
    </div>
  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section aria-labelledby="process-heading">
  <div class="two-col-intro" style="margin-bottom:3rem">
    <div>
      <span class="s-label">How We Work</span>
      <h2 class="s-head" id="process-heading">Our SaaS <em>delivery process</em></h2>
    </div>
    <p>Building a SaaS product is not the same as building a website or a simple web application. The product decisions made in the first two weeks — account structure, billing model, permission design — will define what is easy or expensive to change for the next several years. Our process is built around making those decisions correctly before writing a line of code.</p>
  </div>
  <div class="process-layout">
    <div class="process-nav reveal">
      <h3>Five phases.<br>Zero guesswork.</h3>
      <p>Every milestone is documented and agreed before we begin. You always know what is being built, what it will cost, and when it will be ready.</p>
      <ul class="process-nav-list">
        <li><a href="#ps1" class="pnav-item active"><span class="pnav-dot"></span>Product Discovery</a></li>
        <li><a href="#ps2" class="pnav-item"><span class="pnav-dot"></span>Architecture Design</a></li>
        <li><a href="#ps3" class="pnav-item"><span class="pnav-dot"></span>UI/UX Design</a></li>
        <li><a href="#ps4" class="pnav-item"><span class="pnav-dot"></span>Development</a></li>
        <li><a href="#ps5" class="pnav-item"><span class="pnav-dot"></span>Launch & Support</a></li>
      </ul>
    </div>
    <div class="process-steps">

      <div class="ps-card reveal" id="ps1">
        <div class="ps-card-head">
          <div class="ps-card-num gold">01</div>
          <div class="ps-card-title">Product Discovery & Scoping</div>
          <span class="ps-card-duration">Week 1–2</span>
        </div>
        <div class="ps-card-body">
          <p>SaaS discovery goes deeper than a standard application brief. We map your target customer, their workflow, and the problem your product solves. From there we define your user types, subscription model, feature set by tier, onboarding sequence, and the admin workflows your team will need to operate the product.</p>
          <p>The output is a Product Specification — a written document covering the account model, billing structure, feature list by plan, user journey maps, and technical constraints. This spec governs the entire build and makes scope changes explicit and transparent.</p>
          <div class="ps-deliverables"><span class="ps-del">Product Spec</span><span class="ps-del">Account Model</span><span class="ps-del">Billing Structure</span><span class="ps-del">User Journey Maps</span><span class="ps-del">Feature Matrix</span></div>
        </div>
      </div>

      <div class="ps-card reveal" id="ps2">
        <div class="ps-card-head">
          <div class="ps-card-num">02</div>
          <div class="ps-card-title">Architecture & Data Modelling</div>
          <span class="ps-card-duration">Week 2–3</span>
        </div>
        <div class="ps-card-body">
          <p>Before any code is written, we design the database schema, API structure, authentication model, permission matrix, subscription logic, and integration architecture. For SaaS products in particular, the data model is the most load-bearing decision in the entire project — a flawed schema creates cascading problems that become exponentially harder to fix after launch.</p>
          <p>We review the architecture with you in a dedicated session and iterate until every relationship, constraint, and business rule is correctly represented. Only then do we begin development.</p>
          <div class="ps-deliverables"><span class="ps-del">ER Diagram</span><span class="ps-del">Permission Matrix</span><span class="ps-del">Billing Model</span><span class="ps-del">API Spec</span><span class="ps-del">Integration Map</span></div>
        </div>
      </div>

      <div class="ps-card reveal" id="ps3">
        <div class="ps-card-head">
          <div class="ps-card-num">03</div>
          <div class="ps-card-title">UI/UX Design in Figma</div>
          <span class="ps-card-duration">Week 3–4</span>
        </div>
        <div class="ps-card-body">
          <p>High-fidelity designs are produced for every key screen — the marketing site, onboarding flow, user dashboard, settings, billing portal, and admin panel. For SaaS products, we pay particular attention to the onboarding experience: the design of those first three screens determines your activation rate more than any other product decision.</p>
          <p>Interactive Figma prototypes let you experience the product flows before a component is built. Design sign-off gates the development phase — we do not build what has not been approved.</p>
          <div class="ps-deliverables"><span class="ps-del">All Screen Designs</span><span class="ps-del">Onboarding Flow</span><span class="ps-del">Interactive Prototype</span><span class="ps-del">Component Library</span><span class="ps-del">Design Sign-Off</span></div>
        </div>
      </div>

      <div class="ps-card reveal" id="ps4">
        <div class="ps-card-head">
          <div class="ps-card-num">04</div>
          <div class="ps-card-title">SaaS Development</div>
          <span class="ps-card-duration">Week 4–14 (scope-dependent)</span>
        </div>
        <div class="ps-card-body">
          <p>We build in two-week sprints on a private staging environment, with a demo at the end of every sprint. Development proceeds in layers: authentication and account model first, then billing infrastructure, then core product features, then admin panel, and finally onboarding and notification systems.</p>
          <p>Payment integrations are built and tested in sandbox before any production billing is enabled. Every sprint is demoed before work on the next begins — you have continuous visibility into what is being built and how it behaves.</p>
          <div class="ps-deliverables"><span class="ps-del">Sprint Demos</span><span class="ps-del">Staging Environment</span><span class="ps-del">Billing Integration</span><span class="ps-del">Admin Panel</span><span class="ps-del">Onboarding Flow</span></div>
        </div>
      </div>

      <div class="ps-card reveal" id="ps5">
        <div class="ps-card-head">
          <div class="ps-card-num">05</div>
          <div class="ps-card-title">Launch, Handover & Post-launch Support</div>
          <span class="ps-card-duration">Week 14–16</span>
        </div>
        <div class="ps-card-body">
          <p>Production deployment is zero-downtime via GitHub Actions CI/CD. We configure the server environment, queue workers, scheduled tasks, monitoring, and alerting before the first user lands. You receive the full source code on GitHub, a technical documentation pack, and a 90-day post-launch support window covering bug fixes, performance monitoring, and minor feature adjustments as you get real users using the product.</p>
          <div class="ps-deliverables"><span class="ps-del">Zero-Downtime Deploy</span><span class="ps-del">GitHub Repo</span><span class="ps-del">Tech Documentation</span><span class="ps-del">Monitoring Setup</span><span class="ps-del">90-Day Support</span></div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ TECH STACK ═══ -->
<section class="tech-section" aria-labelledby="tech-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Technology Stack</span>
      <h2 class="s-head" id="tech-heading">The tools powering<br>our <em>SaaS builds</em></h2>
    </div>
    <p>Every technology in our SaaS stack is chosen for long-term maintainability, developer experience, and proven production performance. No experimental packages, no abandoned libraries — everything in this stack has a strong community and a track record at scale.</p>
  </div>
  <div class="tech-grid-outer reveal">

    <div class="tech-group">
      <div class="tech-group-head">
        <div class="tech-group-head-title">Core Framework</div>
        <div class="tech-group-head-sub">The foundation everything runs on</div>
      </div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2 4 6v6c0 5 3.4 9.4 8 10 4.6-.6 8-5 8-10V6l-8-4Z"></path></svg></div><div class="tech-info"><div class="tech-name">Laravel 13</div><div class="tech-sub">Application framework</div></div><span class="tech-badge tb-core">Core</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><ellipse cx="12" cy="5" rx="7" ry="3"></ellipse><path d="M5 5v7c0 1.7 3.1 3 7 3s7-1.3 7-3V5"></path><path d="M5 12v7c0 1.7 3.1 3 7 3s7-1.3 7-3v-7"></path></svg></div><div class="tech-info"><div class="tech-name">MySQL / PostgreSQL</div><div class="tech-sub">Relational database</div></div><span class="tech-badge tb-core">Core</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 8l7-4 7 4-7 4-7-4Z"></path><path d="M5 16l7 4 7-4"></path><path d="M5 12l7 4 7-4"></path></svg></div><div class="tech-info"><div class="tech-name">Redis</div><div class="tech-sub">Cache, sessions & queues</div></div><span class="tech-badge tb-core">Core</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"></path></svg></div><div class="tech-info"><div class="tech-name">Livewire 4</div><div class="tech-sub">Reactive UI without JS overhead</div></div><span class="tech-badge tb-core">Frontend</span></div>
    </div>

    <div class="tech-group">
      <div class="tech-group-head">
        <div class="tech-group-head-title">Billing & Subscriptions</div>
        <div class="tech-group-head-sub">The revenue engine</div>
      </div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18"></path><path d="M7 15h4"></path></svg></div><div class="tech-info"><div class="tech-name">Paystack</div><div class="tech-sub">Nigerian naira subscriptions & cards</div></div><span class="tech-badge tb-billing">Billing</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18"></path><path d="M7 15h4"></path></svg></div><div class="tech-info"><div class="tech-name">Stripe</div><div class="tech-sub">International subscriptions & invoices</div></div><span class="tech-badge tb-billing">Billing</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"></path><path d="M14 2v6h6"></path><path d="M9 13h6M9 17h4"></path></svg></div><div class="tech-info"><div class="tech-name">Laravel Cashier</div><div class="tech-sub">Subscription billing abstraction</div></div><span class="tech-badge tb-billing">Billing</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 4h10l2 3v11a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V7l2-3z"></path><path d="M9 12h6M9 16h4"></path></svg></div><div class="tech-info"><div class="tech-name">Invoice Generation</div><div class="tech-sub">PDF invoices via Spatie PDF</div></div><span class="tech-badge tb-billing">Billing</span></div>
    </div>

    <div class="tech-group">
      <div class="tech-group-head">
        <div class="tech-group-head-title">Auth, Roles & Admin</div>
        <div class="tech-group-head-sub">Who can do what, and who manages it</div>
      </div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="11" width="14" height="10" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg></div><div class="tech-info"><div class="tech-name">Laravel Sanctum</div><div class="tech-sub">API token & session auth</div></div><span class="tech-badge tb-auth">Auth</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12h16"></path><path d="M12 4v16"></path><circle cx="12" cy="12" r="9"></circle></svg></div><div class="tech-info"><div class="tech-name">Spatie Permissions</div><div class="tech-sub">Roles & granular access control</div></div><span class="tech-badge tb-auth">Roles</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="14" rx="2"></rect><path d="M8 20h8M12 18v2"></path></svg></div><div class="tech-info"><div class="tech-name">Filament 5</div><div class="tech-sub">Admin panel & customer management</div></div><span class="tech-badge tb-admin">Admin</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-7-4.5-7-11a4 4 0 0 1 7-2.6A4 4 0 0 1 19 10c0 6.5-7 11-7 11Z"></path></svg></div><div class="tech-info"><div class="tech-name">Laravel Fortify</div><div class="tech-sub">2FA & email verification</div></div><span class="tech-badge tb-auth">Auth</span></div>
    </div>

    <div class="tech-group">
      <div class="tech-group-head">
        <div class="tech-group-head-title">Infrastructure & Monitoring</div>
        <div class="tech-group-head-sub">Reliability, deployment, observability</div>
      </div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 17.5a4.5 4.5 0 0 0-1-8.9A6 6 0 0 0 7.2 7.5 4 4 0 0 0 7 15.5h13z"></path></svg></div><div class="tech-info"><div class="tech-name">DigitalOcean / AWS</div><div class="tech-sub">Managed server hosting</div></div><span class="tech-badge tb-infra">Infra</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19c2-3 5-5 8-6l-2-2c1-4 4-7 8-8-1 4-4 7-8 8l2 2c-1 3-3 6-6 8l-2-2-2 2v-4Z"></path></svg></div><div class="tech-info"><div class="tech-name">GitHub Actions CI/CD</div><div class="tech-sub">Zero-downtime deployments</div></div><span class="tech-badge tb-infra">DevOps</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20h.01M8 16a6 6 0 0 1 8 0"></path><path d="M2 8a16 16 0 0 1 20 0"></path><path d="M5 12a11 11 0 0 1 14 0"></path></svg></div><div class="tech-info"><div class="tech-name">Sentry + Uptime</div><div class="tech-sub">Error tracking & monitoring</div></div><span class="tech-badge tb-infra">Monitor</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 8h16"></path><rect x="3" y="5" width="18" height="14" rx="2"></rect></svg></div><div class="tech-info"><div class="tech-name">Laravel Horizon</div><div class="tech-sub">Queue worker management</div></div><span class="tech-badge tb-infra">Queues</span></div>
    </div>

  </div>
</section>

<!-- ═══ FEATURES / DELIVERABLES ═══ -->
<section aria-labelledby="features-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">What You Get</span>
      <h2 class="s-head" id="features-heading">Everything included<br>in every <em>SaaS build</em></h2>
    </div>
    <p>These are not optional extras. They are standard deliverables on every SaaS project we take on. We believe the foundations of a serious software product should always be complete — regardless of project budget.</p>
  </div>
  <div class="features-grid reveal">
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div><div class="feat-body"><h4>Multi-tenant Account Architecture</h4><p>Workspaces, team accounts, individual seats, and organisation-level billing are designed as first-class entities — not bolted on after the first paying customer asks for them.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"></path></svg></div><div class="feat-body"><h4>Activation-Focused Onboarding</h4><p>Sign-up, email verification, first-run guidance, and progress checklists designed to move new users from registration to the core value of your product before they lose interest.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18M7 15h4"></path></svg></div><div class="feat-body"><h4>Subscription Billing Engine</h4><p>Plan tiers, feature gates, trial periods, upgrade/downgrade flows, invoice generation, and failed payment recovery — built to handle real subscription behaviour at scale.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12h16"></path><path d="M12 4v16"></path><circle cx="12" cy="12" r="9"></circle></svg></div><div class="feat-body"><h4>Role-Based Access Control</h4><p>Granular permission policies using Spatie Permissions — defining what each user role can see, create, edit, and delete across every part of the application. Unit-tested from day one.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="14" rx="2"></rect><path d="M8 20h8M12 18v2"></path></svg></div><div class="feat-body"><h4>Filament Admin Panel</h4><p>A fully-featured admin interface for your team to manage customers, subscriptions, feature overrides, support queries, and product operations — without needing developer involvement for daily tasks.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 14 21 3M21 3h-6M21 3v6M14 10 3 21M9 3H5a2 2 0 0 0-2 2v4M15 21h4a2 2 0 0 0 2-2v-4"></path></svg></div><div class="feat-body"><h4>REST API with Documentation</h4><p>Every SaaS product includes a versioned REST API with consistent JSON responses, authentication via Laravel Sanctum, rate limiting, and Postman documentation delivered on handover.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 8h16"></path><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m7 13 3 3 7-7"></path></svg></div><div class="feat-body"><h4>Background Jobs & Notification System</h4><p>Queued jobs for emails, renewal processing, report generation, and integrations — plus a full notification system for in-app, email, and push messages tied to product events.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19c2-3 5-5 8-6l-2-2c1-4 4-7 8-8-1 4-4 7-8 8l2 2c-1 3-3 6-6 8l-2-2-2 2v-4Z"></path></svg></div><div class="feat-body"><h4>CI/CD Pipeline & Zero-Downtime Deployment</h4><p>Automated testing and zero-downtime deployment to production via GitHub Actions. Your SaaS platform is never taken offline for a release — updates happen invisibly while users are active.</p></div></div>
  </div>
</section>

<!-- ═══ PACKAGES ═══ -->
<section class="pkg-section" aria-labelledby="pkg-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pkg-heading">SaaS packages by<br><em>product scale</em></h2>
    </div>
    <p>All SaaS projects are scoped and quoted individually after a free discovery session. The ranges below reflect typical pricing across SaaS product types — your exact quote will be itemised and transparent before any work begins.</p>
  </div>
  <div class="pkg-grid">

    <div class="pkg-card reveal">
      <div class="pkg-head">
        <div class="pkg-badge">MVP SaaS</div>
        <div class="pkg-name">Starter</div>
        <p class="pkg-tagline">A focused SaaS MVP with core billing and onboarding — ideal for founders validating a product idea.</p>
        <div class="pkg-price">₦1.2M <sub>starting from</sub></div>
      </div>
      <div class="pkg-body">
        <div class="pkg-feat">1 subscription tier</div>
        <div class="pkg-feat">User accounts & auth</div>
        <div class="pkg-feat">Onboarding flow</div>
        <div class="pkg-feat">Basic admin panel</div>
        <div class="pkg-feat">Single payment gateway</div>
        <div class="pkg-feat">Email notifications</div>
        <div class="pkg-feat">REST API included</div>
        <div class="pkg-feat">30-day post-launch support</div>
        <div class="pkg-feat no">Multi-tenancy / teams</div>
        <div class="pkg-feat no">Feature gating</div>
      </div>
      <div class="pkg-foot"><a href="#contact" class="pkg-btn outline">Get a Quote →</a></div>
    </div>

    <div class="pkg-card featured reveal">
      <div class="pkg-head">
        <div class="pkg-badge">Most Common Scope</div>
        <div class="pkg-name">Platform</div>
        <p class="pkg-tagline">A full-featured SaaS platform — subscription tiers, team accounts, feature gating, and admin panel.</p>
        <div class="pkg-price">₦2M–5M <sub>based on scope</sub></div>
      </div>
      <div class="pkg-body">
        <div class="pkg-feat">Multi-tier subscription plans</div>
        <div class="pkg-feat">Feature gating per plan</div>
        <div class="pkg-feat">Team accounts & workspaces</div>
        <div class="pkg-feat">Role-based access control</div>
        <div class="pkg-feat">Paystack + Stripe integration</div>
        <div class="pkg-feat">Full Filament admin panel</div>
        <div class="pkg-feat">Activation-focused onboarding</div>
        <div class="pkg-feat">Versioned REST API + docs</div>
        <div class="pkg-feat">CI/CD pipeline</div>
        <div class="pkg-feat">60-day post-launch support</div>
      </div>
      <div class="pkg-foot" style="padding-top:.25rem"><a href="#contact" class="pkg-btn gold">Request a Proposal →</a></div>
    </div>

    <div class="pkg-card reveal">
      <div class="pkg-head">
        <div class="pkg-badge">Enterprise SaaS</div>
        <div class="pkg-name">Enterprise</div>
        <p class="pkg-tagline">Complex multi-tenant SaaS, high-traffic platforms, third-party integrations, and custom enterprise requirements.</p>
        <div class="pkg-price">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="pkg-body">
        <div class="pkg-feat">Full multi-tenant architecture</div>
        <div class="pkg-feat">White-labelling support</div>
        <div class="pkg-feat">SSO / OAuth2 integration</div>
        <div class="pkg-feat">Advanced analytics dashboard</div>
        <div class="pkg-feat">ERP / CRM integrations</div>
        <div class="pkg-feat">Load testing & optimisation</div>
        <div class="pkg-feat">Security penetration test</div>
        <div class="pkg-feat">SLA with 4-hour response</div>
        <div class="pkg-feat">90-day support window</div>
        <div class="pkg-feat">Ongoing retainer available</div>
      </div>
      <div class="pkg-foot"><a href="#contact" class="pkg-btn solid">Discuss Requirements →</a></div>
    </div>

  </div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What clients say about<br>our <em>SaaS work</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars">★★★★★</div>
      <p class="test-quote">"The onboarding flow alone was worth the engagement. We saw a 60% increase in activation rate compared to our previous product. i2Medier understood that the first three minutes in a SaaS product are everything — and built accordingly."</p>
      <div class="test-author">
        <div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z"></path><path d="M5 20a7 7 0 0 1 14 0"></path></svg></div>
        <div><div class="test-name">Founder</div><div class="test-role">B2B SaaS Platform</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars">★★★★★</div>
      <p class="test-quote">"We had tried two other agencies before i2Medier. Neither understood that subscription billing is not just Stripe — it is a whole set of business rules around upgrades, dunning, proration, and reporting. They got it right from the start."</p>
      <div class="test-author">
        <div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z"></path><path d="M5 20a7 7 0 0 1 14 0"></path></svg></div>
        <div><div class="test-name">CTO</div><div class="test-role">Vertical SaaS Product</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars">★★★★★</div>
      <p class="test-quote">"The Filament admin panel means our support team can manage customers, override subscriptions, and investigate issues without a developer. That alone has saved us hours every week and made our customer response time far faster."</p>
      <div class="test-author">
        <div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z"></path><path d="M5 20a7 7 0 0 1 14 0"></path></svg></div>
        <div><div class="test-name">Product Manager</div><div class="test-role">Analytics SaaS Platform</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FAQ ═══ -->
<section aria-labelledby="faq-heading">
  <span class="s-label">FAQ</span>
  <h2 class="s-head" id="faq-heading">SaaS questions,<br><em>answered plainly</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Still have questions?</h3>
      <p>If your question is not answered below, email us. We will give you a direct answer — no sales pressure, no NDAs required for a conversation.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">What makes SaaS development different from a standard web application?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f1">A SaaS product has recurring business complexity that a standard application does not: subscription billing with trials and renewals, multi-tenant account isolation, feature gating per plan, onboarding flows designed for activation, and the admin tools your team needs to support customers at scale. These are not add-ons — they are core to the product. Building them properly from the start is what separates a product that scales from one that needs a full rewrite at 500 customers.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Do I need multi-tenancy for my SaaS?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f2">It depends on your product model. If your customers are organisations with multiple users sharing data within a workspace — yes, you need multi-tenancy. If your product is individual-user focused with no team collaboration, a simpler account model may be sufficient. We diagnose this during discovery and recommend the right architecture for your specific product, rather than applying a default multi-tenant template to everything.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">Which payment gateways do you integrate?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f3">We integrate Paystack for Nigerian naira subscriptions and Stripe for international billing. Both are implemented with full subscription support — recurring charges, plan upgrades, downgrades, trial periods, failed payment recovery (dunning), and invoice generation. We also integrate Flutterwave when the payment mix requires it. All integrations are tested thoroughly in sandbox before any production billing is enabled.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">How long does it take to build a SaaS product?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f4">MVP SaaS products with core billing and onboarding typically take 8–10 weeks from design sign-off. Full-featured platforms with multi-tenancy, team accounts, feature gating, and a complete admin panel range from 12–16 weeks. Enterprise-grade SaaS with complex integrations and high-traffic requirements can take 20+ weeks. We provide a detailed, milestone-by-milestone timeline during discovery — you know exactly what is happening and when before any commitment is made.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Can you build on top of an existing codebase?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f5">Yes — but we will first conduct a codebase audit to understand the current quality, architecture decisions, and technical debt. For some projects, building on the existing code is the right call. For others, the debt is significant enough that starting fresh is faster and cheaper in the medium term. We will give you an honest assessment with a clear recommendation and cost comparison before any work begins.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">How much does SaaS development cost?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f6">SaaS MVP products start from ₦1.2 million. Full-featured platforms with multi-tenancy, subscription billing, and a complete admin panel typically range from ₦2M to ₦5M. Enterprise SaaS is quoted based on scope. All projects receive a written, itemised proposal after a free discovery session — you know exactly what you are paying for before any commitment is made. There are no hidden costs and no scope changes that are not agreed in writing first.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ RELATED SERVICES ═══ -->
<section class="related-section" aria-labelledby="related-heading">
  <span class="s-label">Related Services</span>
  <h2 class="s-head" id="related-heading">Often paired <em>with this service</em></h2>
  <div class="related-grid">
    <a href="{{ route('site.services.laravel-development') }}" class="related-item">
      <div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V5M20 19V9M4 19h16M8 19V11M12 19V7M16 19v-5"></path></svg></div>
      <div class="ri-name">Laravel Development</div>
      <p class="ri-desc">The framework powering every SaaS product we build — custom business logic, APIs, and admin panels.</p>
    </a>
    <a href="{{ route('site.services.ui-ux-design') }}" class="related-item">
      <div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 0-4h-1a2 2 0 0 1 0-4h4a4 4 0 0 0 0-8Z"></path><circle cx="7.5" cy="10.5" r="1"></circle><circle cx="9.5" cy="7.5" r="1"></circle><circle cx="13.5" cy="7.5" r="1"></circle></svg></div>
      <div class="ri-name">UI/UX Design</div>
      <p class="ri-desc">Full product design in Figma — onboarding flows, dashboards, and every screen before development starts.</p>
    </a>
    <a href="{{ route('site.services.cloud-architecture') }}" class="related-item">
      <div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 17.5a4.5 4.5 0 0 0-1-8.9A6 6 0 0 0 7.2 7.5 4 4 0 0 0 7 15.5h13z"></path></svg></div>
      <div class="ri-name">Cloud Architecture</div>
      <p class="ri-desc">Production-grade infrastructure on AWS or DigitalOcean — built to keep your SaaS fast and reliable.</p>
    </a>
    <a href="{{ route('site.services.website-maintenance') }}" class="related-item">
      <div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v6c0 5 3.4 7.9 7 9 3.6-1.1 7-4 7-9V6l-7-3Zm0 9.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z"></path></svg></div>
      <div class="ri-name">Maintenance & Support</div>
      <p class="ri-desc">Monthly retainer for updates, security monitoring, and ongoing feature development after launch.</p>
    </a>
  </div>
</section>

<!-- CTA -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build your<br>SaaS product?</h2>
  <p>Tell us what you are building and we will send a detailed, itemised proposal within 24 hours — no commitment required.</p>
  <a href="{{ route('site.start', ['services' => 'saas', 'source_page' => 'service-saas-application', 'source_label' => 'SaaS Application Service Page']) }}" class="btn-dark">Start Your SaaS Project →</a>
</section>

@endsection
