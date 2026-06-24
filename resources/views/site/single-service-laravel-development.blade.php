@extends('public.layouts.app')

@section('title', 'Laravel Development Company in Nigeria | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Laravel Development', 'item' => route('site.services.laravel-development')],
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
            'name' => 'When should I use Laravel instead of WordPress?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Use Laravel when your project requires custom business logic, complex user roles, real-time features, multi-tenant architecture, or any functionality that a CMS cannot handle out of the box. WordPress is ideal for content-driven sites. Laravel is the right choice when you are building a web application — something with state, workflows, transactions, and rules specific to your business. If you\'re unsure, book a free consultation and we\'ll give you our honest recommendation.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'How long does a Laravel application take to build?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Simple applications with standard CRUD functionality typically take 6–8 weeks from design sign-off to production deployment. Mid-complexity platforms — multi-role portals, SaaS with subscription billing, marketplace apps — range from 8–14 weeks. Enterprise systems with complex business logic, multiple integrations, and large data models can take 16+ weeks. We provide a detailed, milestone-by-milestone timeline during the discovery phase.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Do you use Laravel Livewire and Filament?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes, on virtually every project. Livewire 3 is our default for reactive, real-time UI within Laravel — it gives a smooth, SPA-like experience without the complexity and maintenance overhead of Vue.js or React. Filament 3 is our admin panel framework of choice — it produces a powerful, customisable dashboard with resources, widgets, and actions in a fraction of the time of building a custom admin from scratch. Both integrate seamlessly with the rest of the Laravel ecosystem.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Can you integrate payment gateways into a Laravel app?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Absolutely — and it is one of our most requested features. We have integrated Paystack, Stripe, Flutterwave, and PayPal into multiple production Laravel applications. Our implementations handle webhook listeners with signature verification, idempotent payment processing, subscription billing with renewal logic, invoice generation, multi-currency support, and full payment audit trails. We test against sandbox environments before any live processing occurs.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Will you build a REST API for my application?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — every application we build includes a REST API as standard. We use Laravel Sanctum for token-based API authentication and structure all endpoints with versioning, consistent JSON responses, appropriate HTTP status codes, and rate limiting. We also write Postman collection documentation delivered on handover. If you need OAuth2 for third-party integrations, we implement Laravel Passport instead of Sanctum.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'How much does a Laravel application cost?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Laravel projects are priced based on scope, complexity, and timeline. Simple applications start from ₦800,000. Mid-complexity platforms — multi-role portals with payment integration and Livewire interfaces — typically range from ₦1.5M to ₦4M. Enterprise and SaaS applications are quoted individually. We provide a written, itemised proposal after a free discovery session — you know exactly what you are paying for before any commitment is made.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Do you write tests for Laravel applications?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — automated testing is a standard deliverable, not an optional add-on. We write test suites using Pest (our preference) or PHPUnit, targeting a minimum of 80% coverage on all business-critical modules — authentication flows, payment processing, role-based access, API responses, and form validation. Tests are committed to the same repository as the application code and run on every push via GitHub Actions before any production deployment.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Can my team maintain the application after handover?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We write code to be readable and maintainable by any competent PHP developer, not just by us. On handover you receive the full source code on a private GitHub repository, a technical documentation pack covering architecture decisions, environment setup, and deployment procedures, and a developer handover session if required. The codebase follows Laravel conventions strictly — any Laravel developer can pick it up and continue working on it without a steep learning curve.'],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('page_css')
    @vite('resources/css/public/pages/laravel-development.css')
@endpush

@push('scripts')
    @vite('resources/js/public/pages/service-laravel-development.js')
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
      <span aria-current="page">Laravel Development</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Laravel Development</span>
    <h1>Custom web applications<br>engineered to <em>scale</em><br>without limits</h1>
    <p class="hero-sub">When your idea needs more than a CMS, whether that means custom business logic, multi-role systems, real-time features, marketplace flows, or a full SaaS product, Laravel is our framework of choice. We build it cleanly, we build it properly, and we build it to last.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-white">Discuss Your Application →</a>
      <a href="{{ route('portfolio.index') }}" class="btn-ghost">See Laravel Projects</a>
    </div>
    <div class="hero-pills">
      <span class="hero-pill"><span class="hero-pill-dot"></span> Laravel 13</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Livewire 4</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Filament 5</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> REST APIs</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Paystack & Stripe</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Multi-tenant Architecture</span>
    </div>
  </div>

  <!-- Terminal mock -->
  <div class="hero-right">
    <div class="terminal-wrap">
      <div class="float-badge">Laravel 13 · PHP 8.4</div>
      <div class="terminal">
        <div class="terminal-bar">
          <div class="t-dot" style="background:#ff5f57"></div>
          <div class="t-dot" style="background:#febc2e"></div>
          <div class="t-dot" style="background:#28c840"></div>
          <span class="t-title">artisan · i2medier-app</span>
        </div>
        <div class="terminal-body">
          <div><span class="t-prompt">$ </span><span class="t-cmd">php artisan</span> <span class="t-arg">make:model</span> <span class="t-str">Subscription</span> <span class="t-arg">-mcr</span></div>
          <div style="color:#4ade80">  INFO  Model, migration, controller created.</div>
          <div style="margin-top:.4rem"><span class="t-prompt">$ </span><span class="t-cmd">php artisan</span> <span class="t-arg">make:livewire</span> <span class="t-str">CheckoutFlow</span></div>
          <div style="color:#4ade80">  INFO  Livewire component created.</div>
          <div style="margin-top:.4rem"><span class="t-prompt">$ </span><span class="t-cmd">php artisan</span> <span class="t-arg">queue:work</span> <span class="t-key">--queue</span>=<span class="t-val">payments,mail</span></div>
          <div style="color:#fb923c">  Processing jobs on [payments, mail]...</div>
          <div style="color:#4ade80">  ✓ App\Jobs\ProcessPayment  <span style="color:rgba(255,255,255,.3)">12ms</span></div>
          <div style="color:#4ade80">  ✓ App\Mail\WelcomeEmail    <span style="color:rgba(255,255,255,.3)">8ms</span></div>
          <div style="margin-top:.4rem"><span class="t-prompt">$ </span><span class="t-cmd">php artisan</span> <span class="t-arg">test</span> <span class="t-key">--parallel</span></div>
          <div><span style="color:rgba(255,255,255,.3)">  Tests:  </span><span style="color:#4ade80">148 passed</span> <span style="color:rgba(255,255,255,.2)">(0 failed)</span></div>
          <div><span style="color:rgba(255,255,255,.3)">  Duration: 4.3s</span></div>
          <div style="margin-top:.3rem"><span class="t-prompt">$ </span><span class="t-cursor"></span></div>
        </div>
      </div>
      <div class="float-badge2">148 tests passing · CI green</div>
    </div>
  </div>
</header>

<!-- STATS BAND -->
<div class="stats-band">
  <div class="stats-grid">
    <div class="stat-item reveal"><div class="stat-num"><span class="counter" data-target="25">0</span><span>+</span></div><div class="stat-lbl">Laravel Apps Delivered</div></div>
    <div class="stat-item reveal"><div class="stat-num">6–<span>12</span></div><div class="stat-lbl">Week Typical Timeline</div></div>
    <div class="stat-item reveal"><div class="stat-num">from <span>₦800k</span></div><div class="stat-lbl">Starting Price</div></div>
    <div class="stat-item reveal"><div class="stat-num" style="font-size:1.6rem">REST<span> API</span></div><div class="stat-lbl">Every App Gets an API</div></div>
  </div>
</div>

<!-- ═══ WHAT WE BUILD ═══ -->
<section class="build-section" aria-labelledby="build-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="build-heading">Laravel applications for<br>every <em>business model</em></h2>
    </div>
    <p>Laravel is a full-stack PHP framework with the architectural foundations to handle virtually any web application, from a small internal tool to a multi-tenant SaaS platform serving thousands of concurrent users. Here is what we build with it most often.</p>
  </div>
  <div class="build-grid">

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19c2-3 5-5 8-6l-2-2c1-4 4-7 8-8-1 4-4 7-8 8l2 2c-1 3-3 6-6 8l-2-2-2 2v-4Z"></path><path d="M14 10l4-4"></path></svg></div>
      <h3 class="build-title">SaaS Platforms</h3>
      <p class="build-desc">Full multi-tenant SaaS applications with subscription billing, user workspaces, feature gating, and role-based access control. Whether you are building a B2B tool, a productivity app, or a vertical SaaS platform, we architect it to scale from day one.</p>
      <div class="build-tags"><span class="build-tag">Multi-tenancy</span><span class="build-tag">Stripe Billing</span><span class="build-tag">Feature Flags</span><span class="build-tag">Livewire</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 21h18"></path><path d="M5 21V7l7-4 7 4v14"></path><path d="M9 21v-6h6v6"></path><path d="M9 10h.01M15 10h.01"></path></svg></div>
      <h3 class="build-title">Business Portals & Dashboards</h3>
      <p class="build-desc">Internal and external portals for managing operations, clients, staff, inventory, or workflows. Custom Filament admin panels with role-based views, export tools, analytics widgets, and full audit trails baked in from the start.</p>
      <div class="build-tags"><span class="build-tag">Filament 3</span><span class="build-tag">Role-based Auth</span><span class="build-tag">Audit Logs</span><span class="build-tag">Exports</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="20" r="1"></circle><circle cx="18" cy="20" r="1"></circle><path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6H18a2 2 0 0 0 2-1.6L21 8H7"></path></svg></div>
      <h3 class="build-title">Marketplace Applications</h3>
      <p class="build-desc">Two-sided marketplaces connecting buyers and sellers, services and clients, or landlords and tenants. We handle listing management, escrow flows, commission models, dispute resolution, and real-time messaging inside one coherent Laravel codebase.</p>
      <div class="build-tags"><span class="build-tag">Escrow</span><span class="build-tag">Commissions</span><span class="build-tag">Messaging</span><span class="build-tag">Reviews</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 13a5 5 0 0 0 7.07 0l2.83-2.83a5 5 0 0 0-7.07-7.07L10 6"></path><path d="M14 11a5 5 0 0 0-7.07 0L4.1 13.83a5 5 0 1 0 7.07 7.07L14 18"></path></svg></div>
      <h3 class="build-title">REST API Backends</h3>
      <p class="build-desc">Production-grade REST APIs powering mobile apps, third-party integrations, and headless frontends. Built with Laravel Sanctum or Passport for authentication, full JSON:API compliance, versioning strategy, rate limiting, and Postman documentation on delivery.</p>
      <div class="build-tags"><span class="build-tag">Sanctum / Passport</span><span class="build-tag">Rate Limiting</span><span class="build-tag">Versioning</span><span class="build-tag">Postman Docs</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-6-4.35-6-10a6 6 0 1 1 12 0c0 5.65-6 10-6 10Z"></path><circle cx="12" cy="11" r="2.5"></circle></svg></div>
      <h3 class="build-title">Directory & Listing Platforms</h3>
      <p class="build-desc">Local business directories, job boards, property listings, and classified platforms with advanced search and filtering, user-submitted listings, verification workflows, premium placements, and geolocation-based discovery. YBLocal is our own in-house example.</p>
      <div class="build-tags"><span class="build-tag">Full-text Search</span><span class="build-tag">Geolocation</span><span class="build-tag">Verification</span><span class="build-tag">Premium Listings</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18"></path><path d="M7 15h4"></path></svg></div>
      <h3 class="build-title">Fintech & Payment Platforms</h3>
      <p class="build-desc">Custom financial applications handling payments, wallets, subscriptions, invoicing, and transaction records at scale. We integrate Paystack, Stripe, and Flutterwave with idempotent processing, webhook listeners, and full reconciliation audit trails.</p>
      <div class="build-tags"><span class="build-tag">Paystack</span><span class="build-tag">Stripe</span><span class="build-tag">Wallets</span><span class="build-tag">Reconciliation</span></div>
    </div>

  </div>
</section>

<!-- ═══ WORDPRESS vs LARAVEL ═══ -->
<section aria-labelledby="vs-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Choosing the Right Tool</span>
      <h2 class="s-head" id="vs-heading">WordPress or Laravel —<br><em>which do you need?</em></h2>
    </div>
    <p>This is one of the most common questions we hear — and it matters enormously. Picking the wrong platform creates either a bloated CMS trying to do things it was never designed for, or an over-engineered application for a problem a simple website could solve. Here is our honest framework for making the right call.</p>
  </div>
  <div class="vs-layout reveal">
    <div class="vs-card">
      <div class="vs-head wp">
        <div class="vs-head-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M7.5 8.5l2.5 7 2-5 2 5 2.5-7"></path></svg></div>
        <div><div class="vs-head-title">Choose WordPress when…</div><div class="vs-head-sub">Content-driven sites, blogs, portfolios, brochure sites</div></div>
      </div>
      <div class="vs-body">
        <ul class="vs-list">
          <li class="vs-item"><span class="vs-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg></span><div>Your primary need is <strong>publishing and managing content</strong> — pages, blog posts, news, events</div></li>
          <li class="vs-item"><span class="vs-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg></span><div>You want <strong>non-technical staff</strong> to manage the site independently after handover</div></li>
          <li class="vs-item"><span class="vs-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg></span><div>Your project is a <strong>corporate site, portfolio, nonprofit, or service brochure</strong></div></li>
          <li class="vs-item"><span class="vs-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg></span><div>You need a <strong>WooCommerce store</strong> with standard product management</div></li>
          <li class="vs-item"><span class="vs-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg></span><div>Your budget and timeline favour a <strong>3–5 week delivery</strong></div></li>
          <li class="vs-item"><span class="vs-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg></span><div>SEO and content authority are <strong>core growth drivers</strong> for your business</div></li>
        </ul>
      </div>
    </div>
    <div class="vs-card">
      <div class="vs-head laravel">
        <div class="vs-head-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.2a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.2a1.7 1.7 0 0 0 1.5-1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.8.3h.1a1.7 1.7 0 0 0 1-1.5V3a2 2 0 1 1 4 0v.2a1.7 1.7 0 0 0 1 1.5h.1a1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8v.1a1.7 1.7 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.2a1.7 1.7 0 0 0-1.5 1Z"></path></svg></div>
        <div><div class="vs-head-title">Choose Laravel when…</div><div class="vs-head-sub">Applications, platforms, SaaS, APIs, complex logic</div></div>
      </div>
      <div class="vs-body">
        <ul class="vs-list">
          <li class="vs-item"><span class="vs-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"></path></svg></span><div>You need <strong>custom business logic</strong> — rules, workflows, calculations, state machines</div></li>
          <li class="vs-item"><span class="vs-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"></path></svg></span><div>Your application has <strong>multiple user types</strong> with different roles, dashboards, and permissions</div></li>
          <li class="vs-item"><span class="vs-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"></path></svg></span><div>You are building a <strong>marketplace, SaaS, or platform</strong> with transactions between parties</div></li>
          <li class="vs-item"><span class="vs-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"></path></svg></span><div>You need a <strong>REST API</strong> to power a mobile app or third-party integration</div></li>
          <li class="vs-item"><span class="vs-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"></path></svg></span><div>The system requires <strong>background jobs, queues, or real-time events</strong></div></li>
          <li class="vs-item"><span class="vs-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"></path></svg></span><div>You are building something that WordPress <strong>would require 10 plugins</strong> to approximate</div></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ═══ APPLICATION ARCHITECTURE ═══ -->
<section class="arch-section" aria-labelledby="arch-heading">
  <div class="arch-header reveal">
    <div>
      <span class="s-label" style="color:var(--gold)">How We Architect It</span>
      <h2 class="s-head" style="color:var(--white)" id="arch-heading">A Laravel application<br>built on <em>solid foundations</em></h2>
    </div>
    <p>Every Laravel application we deliver is structured around a layered architecture that separates concerns cleanly, makes testing straightforward, and allows the codebase to grow without becoming a maintenance nightmare. Here is the stack from browser to database.</p>
  </div>

  <div class="arch-diagram reveal">
    <div class="arch-layer">
      <div class="arch-layer-head">
        <span class="arch-layer-badge frontend">Frontend Layer</span>
        <div class="arch-layer-title">Livewire Components + Blade Templates</div>
      </div>
      <p class="arch-layer-desc">Reactive UI built with Laravel Livewire 3 — real-time data binding, form validation, and dynamic interfaces without writing a single line of custom JavaScript. Blade templates handle all server-rendered HTML with a clean component system.</p>
      <div class="arch-layer-items"><span class="arch-chip">Livewire 3</span><span class="arch-chip">Blade Components</span><span class="arch-chip">Alpine.js (where needed)</span><span class="arch-chip">TailwindCSS</span><span class="arch-chip">Vite Asset Pipeline</span></div>
    </div>
    <div class="arch-arrow">↓</div>
    <div class="arch-layer">
      <div class="arch-layer-head">
        <span class="arch-layer-badge routing">Routing & Middleware Layer</span>
        <div class="arch-layer-title">Laravel Router + Sanctum/Passport Auth</div>
      </div>
      <p class="arch-layer-desc">Typed route definitions with middleware stacks handling authentication, authorisation, rate limiting, and CORS. API routes are versioned from day one and protected with Sanctum tokens or Passport OAuth. Every request is validated before reaching a controller.</p>
      <div class="arch-layer-items"><span class="arch-chip">Route Groups</span><span class="arch-chip">Sanctum / Passport</span><span class="arch-chip">Form Requests</span><span class="arch-chip">Rate Limiting</span><span class="arch-chip">Spatie Permissions</span></div>
    </div>
    <div class="arch-arrow">↓</div>
    <div class="arch-layer">
      <div class="arch-layer-head">
        <span class="arch-layer-badge business">Business Logic Layer</span>
        <div class="arch-layer-title">Services · Actions · Jobs · Events</div>
      </div>
      <p class="arch-layer-desc">Controllers stay thin. All business logic lives in dedicated Service classes, single-responsibility Action classes, and queued Jobs for background processing. Events and Listeners decouple side effects — an OrderPlaced event triggers mail, notifications, and inventory updates independently.</p>
      <div class="arch-layer-items"><span class="arch-chip">Service Classes</span><span class="arch-chip">Action Pattern</span><span class="arch-chip">Queued Jobs</span><span class="arch-chip">Events & Listeners</span><span class="arch-chip">Notifications</span><span class="arch-chip">Laravel Horizon</span></div>
    </div>
    <div class="arch-arrow">↓</div>
    <div class="arch-layer">
      <div class="arch-layer-head">
        <span class="arch-layer-badge data">Data Layer</span>
        <div class="arch-layer-title">Eloquent ORM + MySQL / PostgreSQL</div>
      </div>
      <p class="arch-layer-desc">Models with typed relationships, custom scopes, and attribute casting. Every database change is managed through version-controlled migrations. Complex queries use Eloquent's query builder with eager loading to prevent N+1 problems. Database transactions wrap multi-step operations.</p>
      <div class="arch-layer-items"><span class="arch-chip">Eloquent ORM</span><span class="arch-chip">Migrations</span><span class="arch-chip">Query Builder</span><span class="arch-chip">MySQL / PostgreSQL</span><span class="arch-chip">Redis Cache</span><span class="arch-chip">Full-text Search</span></div>
    </div>
    <div class="arch-arrow">↓</div>
    <div class="arch-layer">
      <div class="arch-layer-head">
        <span class="arch-layer-badge infra">Infrastructure Layer</span>
        <div class="arch-layer-title">Cloudflare · DigitalOcean / AWS · CI/CD</div>
      </div>
      <p class="arch-layer-desc">Applications are deployed to managed servers on DigitalOcean or AWS, behind Cloudflare for DDoS protection and CDN delivery. Zero-downtime deployments via GitHub Actions or Forge. Laravel Telescope for local debugging and Sentry for production error monitoring.</p>
      <div class="arch-layer-items"><span class="arch-chip">DigitalOcean / AWS</span><span class="arch-chip">Cloudflare</span><span class="arch-chip">Laravel Forge</span><span class="arch-chip">GitHub Actions</span><span class="arch-chip">Sentry</span><span class="arch-chip">Laravel Telescope</span></div>
    </div>
  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section aria-labelledby="process-heading">
  <div class="two-col-intro" style="margin-bottom:3rem">
    <div>
      <span class="s-label">How We Work</span>
      <h2 class="s-head" id="process-heading">Our Laravel <em>delivery process</em></h2>
    </div>
    <p>Building a web application is a different undertaking from building a website. The stakes are higher — both technically and commercially. Our process is designed to surface the hard questions early, de-risk the build phase, and give you a codebase that is a genuine asset rather than a liability.</p>
  </div>
  <div class="process-layout">
    <div class="process-nav reveal">
      <h3>Six phases.<br>Zero guesswork.</h3>
      <p>Every milestone is agreed in writing before we begin. You always know what is being built, what it will cost, and when it will be ready.</p>
      <ul class="process-nav-list">
        <li><a href="#ps1" class="pnav-item active"><span class="pnav-dot"></span>Discovery & Scoping</a></li>
        <li><a href="#ps2" class="pnav-item"><span class="pnav-dot"></span>Architecture Design</a></li>
        <li><a href="#ps3" class="pnav-item"><span class="pnav-dot"></span>UI/UX Design</a></li>
        <li><a href="#ps4" class="pnav-item"><span class="pnav-dot"></span>Application Development</a></li>
        <li><a href="#ps5" class="pnav-item"><span class="pnav-dot"></span>Testing & QA</a></li>
        <li><a href="#ps6" class="pnav-item"><span class="pnav-dot"></span>Deployment & Handover</a></li>
      </ul>
    </div>
    <div class="process-steps">

      <div class="ps-card reveal" id="ps1">
        <div class="ps-card-head">
          <div class="ps-card-num gold">01</div>
          <div class="ps-card-title">Discovery & Scoping</div>
          <span class="ps-card-duration">Week 1</span>
        </div>
        <div class="ps-card-body">
          <p>Application projects begin with a structured discovery engagement — typically 2–3 sessions covering business objectives, user types, feature requirements, integration dependencies, and technical constraints. We map every feature to a user story and every user story to a priority tier (Must Have / Should Have / Could Have).</p>
          <p>By the end of discovery, you have a written Technical Specification document covering the full feature list, data model outline, third-party integrations, user roles, and acceptance criteria. This document is the single source of truth that governs the entire build. Scope changes after sign-off are documented and priced transparently.</p>
          <div class="ps-deliverables"><span class="ps-del">Discovery Sessions</span><span class="ps-del">User Story Map</span><span class="ps-del">Technical Spec</span><span class="ps-del">Feature Priority Matrix</span><span class="ps-del">Signed Scope</span></div>
        </div>
      </div>

      <div class="ps-card reveal" id="ps2">
        <div class="ps-card-head">
          <div class="ps-card-num">02</div>
          <div class="ps-card-title">Architecture & Data Modelling</div>
          <span class="ps-card-duration">Week 1–2</span>
        </div>
        <div class="ps-card-body">
          <p>Before writing a single line of application code, we design the system architecture. This includes the database schema (entity-relationship diagram), API endpoint structure, authentication model, role and permission matrix, queue topology, and integration architecture for all third-party services.</p>
          <p>Getting the data model right at this stage is the single most important quality investment in the project. A poor schema is almost impossible to fix once the application is live. We review this with you in a dedicated architecture session and iterate until it is correct.</p>
          <div class="ps-deliverables"><span class="ps-del">ER Diagram</span><span class="ps-del">API Spec</span><span class="ps-del">Auth Model</span><span class="ps-del">Role Matrix</span><span class="ps-del">Integration Map</span></div>
        </div>
      </div>

      <div class="ps-card reveal" id="ps3">
        <div class="ps-card-head">
          <div class="ps-card-num">03</div>
          <div class="ps-card-title">UI/UX Design in Figma</div>
          <span class="ps-card-duration">Week 2–3</span>
        </div>
        <div class="ps-card-body">
          <p>High-fidelity designs are produced for every key screen — onboarding flows, dashboards, data tables, modals, form interactions, and empty states. For data-heavy admin interfaces, we design information hierarchy with the same rigour we apply to marketing pages.</p>
          <p>Interactive prototypes are built in Figma so you can click through the application flows before a single component is coded. Two revision rounds are included. Design sign-off gates the development phase — we do not build what has not been approved.</p>
          <div class="ps-deliverables"><span class="ps-del">All Screen Designs</span><span class="ps-del">Interactive Prototype</span><span class="ps-del">Component Library</span><span class="ps-del">Mobile Layouts</span><span class="ps-del">Design Sign-Off</span></div>
        </div>
      </div>

      <div class="ps-card reveal" id="ps4">
        <div class="ps-card-head">
          <div class="ps-card-num">04</div>
          <div class="ps-card-title">Application Development</div>
          <span class="ps-card-duration">Week 3–10 (scope-dependent)</span>
        </div>
        <div class="ps-card-body">
          <p>Development is executed in two-week sprints on a private staging environment, with a demo at the end of every sprint. You have continuous access to the staging application and can leave feedback directly in a shared Notion board or via Slack.</p>
          <p>We build backend first — models, migrations, service classes, and APIs — then layer in the Livewire frontend and Filament admin panel. All payment integrations, third-party API connections, queue workers, and scheduled tasks are built and tested in staging before any production deployment is considered.</p>
          <div class="ps-deliverables"><span class="ps-del">2-Week Sprints</span><span class="ps-del">Staging Environment</span><span class="ps-del">Sprint Demos</span><span class="ps-del">Payment Integration</span><span class="ps-del">API Development</span></div>
        </div>
      </div>

      <div class="ps-card reveal" id="ps5">
        <div class="ps-card-head">
          <div class="ps-card-num">05</div>
          <div class="ps-card-title">Testing & Quality Assurance</div>
          <span class="ps-card-duration">Week 10–11</span>
        </div>
        <div class="ps-card-body">
          <p>Every Laravel application we deliver includes a test suite written with Pest or PHPUnit covering all critical paths — authentication flows, payment processing, role-based access, form validation, and API endpoint responses. We target a minimum of 80% code coverage on business-critical modules.</p>
          <p>Beyond automated testing, we run structured manual QA sessions covering all user journeys across device types and browsers, including edge cases, error states, and boundary conditions. Any issue found in QA is fixed and re-tested before a production deployment date is agreed.</p>
          <div class="ps-deliverables"><span class="ps-del">Pest / PHPUnit Tests</span><span class="ps-del">80%+ Coverage</span><span class="ps-del">Manual QA</span><span class="ps-del">Security Review</span><span class="ps-del">Load Testing</span></div>
        </div>
      </div>

      <div class="ps-card reveal" id="ps6">
        <div class="ps-card-head">
          <div class="ps-card-num">06</div>
          <div class="ps-card-title">Deployment, Handover & Support</div>
          <span class="ps-card-duration">Week 11–12</span>
        </div>
        <div class="ps-card-body">
          <p>Production deployment is executed via an automated CI/CD pipeline with zero-downtime release strategy. We configure the production server environment, SSL, environment variables, queue workers, cron jobs, and monitoring before any traffic is directed to the new application.</p>
          <p>On handover you receive: full source code on a private GitHub repository, a technical documentation pack covering architecture decisions and deployment procedures, admin credentials, and a 90-day post-launch support window. We also run a developer handover session if your internal team will maintain the codebase going forward.</p>
          <div class="ps-deliverables"><span class="ps-del">Zero-Downtime Deploy</span><span class="ps-del">GitHub Repo</span><span class="ps-del">Tech Documentation</span><span class="ps-del">CI/CD Pipeline</span><span class="ps-del">90-Day Support</span></div>
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
      <h2 class="s-head" id="tech-heading">The tools that power<br>our <em>Laravel builds</em></h2>
    </div>
    <p>Every technology in our Laravel stack has been selected for performance, long-term maintainability, and community longevity. No experimental packages, no abandoned dependencies — every tool has a track record in production at scale.</p>
  </div>
  <div class="tech-grid-outer reveal">

    <div class="tech-group">
      <div class="tech-group-head">
        <div class="tech-group-head-title">Core Framework</div>
        <div class="tech-group-head-sub">The foundation everything is built on</div>
      </div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2 4 6v6c0 5 3.4 9.4 8 10 4.6-.6 8-5 8-10V6l-8-4Z"></path><path d="M9.5 11.5 11 13l3.5-3.5"></path></svg></div><div class="tech-info"><div class="tech-name">Laravel 13</div><div class="tech-sub">Application framework</div></div><span class="tech-badge tb-core">Core</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"></path><path d="M14 2v6h6"></path><path d="M9 13h6M9 17h4"></path></svg></div><div class="tech-info"><div class="tech-name">PHP 8.4</div><div class="tech-sub">Server language</div></div><span class="tech-badge tb-core">Core</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><ellipse cx="12" cy="5" rx="7" ry="3"></ellipse><path d="M5 5v7c0 1.7 3.1 3 7 3s7-1.3 7-3V5"></path><path d="M5 12v7c0 1.7 3.1 3 7 3s7-1.3 7-3v-7"></path></svg></div><div class="tech-info"><div class="tech-name">MySQL / PostgreSQL</div><div class="tech-sub">Relational database</div></div><span class="tech-badge tb-core">Core</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 8l7-4 7 4-7 4-7-4Z"></path><path d="M5 16l7 4 7-4"></path><path d="M5 12l7 4 7-4"></path></svg></div><div class="tech-info"><div class="tech-name">Redis</div><div class="tech-sub">Cache, sessions & queues</div></div><span class="tech-badge tb-core">Core</span></div>
    </div>

    <div class="tech-group">
      <div class="tech-group-head">
        <div class="tech-group-head-title">Frontend & Admin</div>
        <div class="tech-group-head-sub">What your users and your team interact with</div>
      </div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"></path></svg></div><div class="tech-info"><div class="tech-name">Livewire 4</div><div class="tech-sub">Reactive UI without JS overhead</div></div><span class="tech-badge tb-reactive">Reactive</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="14" rx="2"></rect><path d="M8 20h8"></path><path d="M12 18v2"></path></svg></div><div class="tech-info"><div class="tech-name">Filament 5</div><div class="tech-sub">Admin panel framework</div></div><span class="tech-badge tb-admin">Admin</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 12c2-2 4-2 6 0s4 2 6 0 4-2 6 0"></path><path d="M3 17c2-2 4-2 6 0s4 2 6 0 4-2 6 0"></path><path d="M3 7c2-2 4-2 6 0s4 2 6 0 4-2 6 0"></path></svg></div><div class="tech-info"><div class="tech-name">TailwindCSS</div><div class="tech-sub">Utility-first styling</div></div><span class="tech-badge tb-reactive">Frontend</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 19 6-14 6 14"></path><path d="M8.5 13h7"></path></svg></div><div class="tech-info"><div class="tech-name">Alpine.js</div><div class="tech-sub">Lightweight JS interactions</div></div><span class="tech-badge tb-reactive">Frontend</span></div>
    </div>

    <div class="tech-group">
      <div class="tech-group-head">
        <div class="tech-group-head-title">Auth & Permissions</div>
        <div class="tech-group-head-sub">Security and access control</div>
      </div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="11" width="14" height="10" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg></div><div class="tech-info"><div class="tech-name">Laravel Sanctum</div><div class="tech-sub">API token authentication</div></div><span class="tech-badge tb-core">Auth</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12h16"></path><path d="M12 4v16"></path><circle cx="12" cy="12" r="9"></circle></svg></div><div class="tech-info"><div class="tech-name">Spatie Permissions</div><div class="tech-sub">Roles & permission management</div></div><span class="tech-badge tb-tool">Package</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 14a5 5 0 1 1 0-7l1-1 2 2-1 1"></path><path d="M17 10a5 5 0 1 1 0 7l-1 1-2-2 1-1"></path></svg></div><div class="tech-info"><div class="tech-name">Laravel Passport</div><div class="tech-sub">Full OAuth2 server</div></div><span class="tech-badge tb-core">Auth</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-7-4.5-7-11a4 4 0 0 1 7-2.6A4 4 0 0 1 19 10c0 6.5-7 11-7 11Z"></path><path d="M12 8v5"></path><path d="M10 11h4"></path></svg></div><div class="tech-info"><div class="tech-name">Laravel Fortify</div><div class="tech-sub">2FA, email verification</div></div><span class="tech-badge tb-tool">Package</span></div>
    </div>

    <div class="tech-group">
      <div class="tech-group-head">
        <div class="tech-group-head-title">Payments & Infrastructure</div>
        <div class="tech-group-head-sub">Money, scale, and reliability</div>
      </div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18"></path><path d="M7 15h4"></path></svg></div><div class="tech-info"><div class="tech-name">Paystack</div><div class="tech-sub">Nigerian naira payments</div></div><span class="tech-badge tb-payment">Payment</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18"></path><path d="M7 15h4"></path></svg></div><div class="tech-info"><div class="tech-name">Stripe</div><div class="tech-sub">International payments & subscriptions</div></div><span class="tech-badge tb-payment">Payment</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 17.5a4.5 4.5 0 0 0-1-8.9A6 6 0 0 0 7.2 7.5 4 4 0 0 0 7 15.5h13z"></path></svg></div><div class="tech-info"><div class="tech-name">DigitalOcean / AWS</div><div class="tech-sub">Managed server hosting</div></div><span class="tech-badge tb-perf">Infra</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19c2-3 5-5 8-6l-2-2c1-4 4-7 8-8-1 4-4 7-8 8l2 2c-1 3-3 6-6 8l-2-2-2 2v-4Z"></path><path d="M14 10l4-4"></path></svg></div><div class="tech-info"><div class="tech-name">Laravel Forge + Horizon</div><div class="tech-sub">Deployment & queue management</div></div><span class="tech-badge tb-perf">DevOps</span></div>
    </div>

  </div>
</section>

<!-- ═══ FEATURES ═══ -->
<section aria-labelledby="features-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">What You Get</span>
      <h2 class="s-head" id="features-heading">Everything included<br>in every <em>Laravel application</em></h2>
    </div>
    <p>These are not optional add-ons. They are standard deliverables on every Laravel project we take on. We believe the foundation should always be complete, regardless of budget.</p>
  </div>
  <div class="features-grid reveal">
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><ellipse cx="12" cy="6" rx="7" ry="3"></ellipse><path d="M5 6v12c0 1.7 3.1 3 7 3s7-1.3 7-3V6"></path><path d="M5 12c0 1.7 3.1 3 7 3s7-1.3 7-3"></path></svg></div><div class="feat-body"><h4>Eloquent Data Models</h4><p>Well-structured Eloquent models with typed relationships, custom scopes, attribute casting, and version-controlled migrations. Every change to the database schema is reproducible and reversible.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="11" width="14" height="10" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg></div><div class="feat-body"><h4>Role-Based Access Control</h4><p>Granular permission systems using Spatie Laravel Permissions — defining what each user type can see, create, edit, and delete. Policies govern model-level access and are unit-tested.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 8h16"></path><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m7 13 3 3 7-7"></path></svg></div><div class="feat-body"><h4>Queue-Driven Background Jobs</h4><p>Long-running tasks — emails, payment processing, file generation, third-party API calls — run in background queues via Redis and Laravel Horizon, keeping your application fast and responsive at all times.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 14 21 3"></path><path d="M21 3h-6"></path><path d="M21 3v6"></path><path d="M14 10 3 21"></path><path d="M9 3H5a2 2 0 0 0-2 2v4"></path><path d="M15 21h4a2 2 0 0 0 2-2v-4"></path></svg></div><div class="feat-body"><h4>REST API with Full Documentation</h4><p>Every application includes a versioned REST API with consistent JSON responses, proper HTTP status codes, rate limiting, and Postman collection delivered on handover. Your API is ready for mobile and third-party consumers from day one.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></div><div class="feat-body"><h4>Automated Test Suite</h4><p>Pest or PHPUnit test suites covering all critical paths — authentication, payments, role-based routing, form validation, and API responses. Minimum 80% coverage on business-critical modules.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 6h13"></path><path d="M8 12h13"></path><path d="M8 18h13"></path><path d="M3 6h.01"></path><path d="M3 12h.01"></path><path d="M3 18h.01"></path></svg></div><div class="feat-body"><h4>Audit Trail & Activity Logs</h4><p>Spatie Activity Log records who did what and when across all sensitive models. Audit tables are immutable and exportable — essential for financial applications, compliance requirements, and dispute resolution.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="12" rx="2"></rect><path d="M8 20h8"></path><path d="M12 16v4"></path></svg></div><div class="feat-body"><h4>Filament Admin Dashboard</h4><p>A full-featured Filament 3 admin panel with custom resource tables, form builders, dashboard widgets, bulk actions, and export tools. Your team gets a powerful management interface without building one from scratch.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"></path></svg></div><div class="feat-body"><h4>Livewire Reactive Interface</h4><p>Real-time, reactive UI components built with Livewire 3 — live search, instant form feedback, dynamic data tables, and paginated lists that update without full page reloads and without a separate JavaScript framework.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m5 7 7 6 7-6"></path></svg></div><div class="feat-body"><h4>Transactional Email System</h4><p>Mailable classes for every transactional event — welcome emails, password resets, payment confirmations, invoice delivery, and notification digests — sent via SendGrid or Mailgun with queue-backed delivery and retry logic.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19c2-3 5-5 8-6l-2-2c1-4 4-7 8-8-1 4-4 7-8 8l2 2c-1 3-3 6-6 8l-2-2-2 2v-4Z"></path><path d="M14 10l4-4"></path></svg></div><div class="feat-body"><h4>CI/CD Pipeline & Zero-Downtime Deployment</h4><p>GitHub Actions workflow for automated testing on every push and zero-downtime deployment to production via Laravel Forge. Deployments are gated behind a full test run — broken code never reaches your users.</p></div></div>
  </div>
</section>

<!-- ═══ CODE EXAMPLES ═══ -->
<section class="code-section" aria-labelledby="code-heading">
  <div class="code-header reveal">
    <div>
      <span class="s-label" style="color:var(--gold)">Code Quality</span>
      <h2 class="s-head" style="color:var(--white)" id="code-heading">Clean, readable code<br>you'll be <em>proud to own</em></h2>
    </div>
    <p>We write code as if the next developer who reads it is a senior engineer who will judge every decision harshly. Comments explain intent, not mechanics. Classes have one reason to exist. Tests document expected behaviour. Here are examples of how we structure real application code.</p>
  </div>

  <div class="code-tabs" role="tablist">
    <button class="code-tab active" role="tab" data-panel="p1">Service Class</button>
    <button class="code-tab" role="tab" data-panel="p2">Livewire Component</button>
    <button class="code-tab" role="tab" data-panel="p3">API Resource</button>
    <button class="code-tab" role="tab" data-panel="p4">Pest Test</button>
  </div>

  <div class="code-panels">
    <div class="code-panel active" id="p1">
      <div class="code-block">
        <div class="code-block-bar"><span>app/Services/PaymentService.php</span><span class="lang">PHP</span></div>
<pre><span class="c-comment">// Business logic lives in a dedicated Service — never in a Controller</span>
<span class="c-keyword">class</span> <span class="c-class">PaymentService</span>
{
    <span class="c-keyword">public function</span> <span class="c-method">initiateSubscription</span>(
        <span class="c-class">User</span> <span class="c-var">$user</span>,
        <span class="c-class">Plan</span> <span class="c-var">$plan</span>,
        <span class="c-class">PaymentMethod</span> <span class="c-var">$method</span>
    ): <span class="c-class">Subscription</span> {
        <span class="c-keyword">return</span> <span class="c-class">DB</span>::<span class="c-method">transaction</span>(<span class="c-keyword">function</span> () <span class="c-keyword">use</span> (<span class="c-var">$user</span>, <span class="c-var">$plan</span>, <span class="c-var">$method</span>) {

            <span class="c-var">$charge</span> = <span class="c-var">$this</span>-><span class="c-method">gateway</span>-><span class="c-method">charge</span>([
                <span class="c-string">'amount'</span>    => <span class="c-var">$plan</span>->price_kobo,
                <span class="c-string">'currency'</span>  => <span class="c-var">$plan</span>->currency,
                <span class="c-string">'reference'</span> => <span class="c-class">Str</span>::<span class="c-method">orderedUuid</span>(),
            ]);

            <span class="c-var">$subscription</span> = <span class="c-var">$user</span>->subscriptions()-><span class="c-method">create</span>([
                <span class="c-string">'plan_id'</span>     => <span class="c-var">$plan</span>->id,
                <span class="c-string">'reference'</span>   => <span class="c-var">$charge</span>->reference,
                <span class="c-string">'renews_at'</span>   => <span class="c-method">now</span>()-><span class="c-method">addDays</span>(<span class="c-var">$plan</span>->duration_days),
                <span class="c-string">'status'</span>      => <span class="c-class">SubscriptionStatus</span>::Active,
            ]);

            <span class="c-class">SubscriptionCreated</span>::<span class="c-method">dispatch</span>(<span class="c-var">$subscription</span>);

            <span class="c-keyword">return</span> <span class="c-var">$subscription</span>;
        });
    }
}</pre>
      </div>
    </div>

    <div class="code-panel" id="p2">
      <div class="code-block">
        <div class="code-block-bar"><span>app/Livewire/CheckoutFlow.php</span><span class="lang">Livewire</span></div>
<pre><span class="c-comment">// Real-time checkout — no JavaScript written, no page reload needed</span>
<span class="c-keyword">class</span> <span class="c-class">CheckoutFlow</span> <span class="c-keyword">extends</span> <span class="c-class">Component</span>
{
    <span class="c-keyword">use</span> <span class="c-class">WithFileUploads</span>;

    <span class="c-attr">#[Validate('required|exists:plans,id')]</span>
    <span class="c-keyword">public</span> <span class="c-class">int</span> <span class="c-var">$planId</span>;

    <span class="c-attr">#[Validate('required|in:paystack,stripe')]</span>
    <span class="c-keyword">public</span> <span class="c-class">string</span> <span class="c-var">$gateway</span> = <span class="c-string">'paystack'</span>;

    <span class="c-keyword">public</span> <span class="c-class">bool</span> <span class="c-var">$processing</span> = <span class="c-keyword">false</span>;

    <span class="c-keyword">public function</span> <span class="c-method">submit</span>(<span class="c-class">PaymentService</span> <span class="c-var">$payments</span>): <span class="c-keyword">void</span>
    {
        <span class="c-var">$this</span>-><span class="c-method">validate</span>();
        <span class="c-var">$this</span>->processing = <span class="c-keyword">true</span>;

        <span class="c-var">$subscription</span> = <span class="c-var">$payments</span>-><span class="c-method">initiateSubscription</span>(
            <span class="c-method">auth</span>()-><span class="c-method">user</span>(),
            <span class="c-class">Plan</span>::<span class="c-method">findOrFail</span>(<span class="c-var">$this</span>->planId),
        );

        <span class="c-var">$this</span>-><span class="c-method">redirectRoute</span>(<span class="c-string">'dashboard'</span>, navigate: <span class="c-keyword">true</span>);
    }
}</pre>
      </div>
    </div>

    <div class="code-panel" id="p3">
      <div class="code-block">
        <div class="code-block-bar"><span>app/Http/Resources/SubscriptionResource.php</span><span class="lang">API</span></div>
<pre><span class="c-comment">// Consistent, typed API responses — every field intentional</span>
<span class="c-keyword">class</span> <span class="c-class">SubscriptionResource</span> <span class="c-keyword">extends</span> <span class="c-class">JsonResource</span>
{
    <span class="c-keyword">public function</span> <span class="c-method">toArray</span>(<span class="c-class">Request</span> <span class="c-var">$request</span>): <span class="c-keyword">array</span>
    {
        <span class="c-keyword">return</span> [
            <span class="c-string">'id'</span>         => <span class="c-var">$this</span>->ulid,
            <span class="c-string">'status'</span>     => <span class="c-var">$this</span>->status->label(),
            <span class="c-string">'plan'</span>       => <span class="c-class">PlanResource</span>::<span class="c-method">make</span>(<span class="c-var">$this</span>->whenLoaded(<span class="c-string">'plan'</span>)),
            <span class="c-string">'amount'</span>     => <span class="c-var">$this</span>->plan->formatted_price,
            <span class="c-string">'currency'</span>   => <span class="c-var">$this</span>->plan->currency,
            <span class="c-string">'renews_at'</span>  => <span class="c-var">$this</span>->renews_at?-><span class="c-method">toIso8601String</span>(),
            <span class="c-string">'created_at'</span> => <span class="c-var">$this</span>->created_at-><span class="c-method">toIso8601String</span>(),
        ];
    }
}

<span class="c-comment">// Usage in controller — always returns consistent structure</span>
<span class="c-keyword">return</span> <span class="c-class">SubscriptionResource</span>::<span class="c-method">collection</span>(
    <span class="c-method">auth</span>()-><span class="c-method">user</span>()->subscriptions()-><span class="c-method">with</span>(<span class="c-string">'plan'</span>)-><span class="c-method">paginate</span>(<span class="c-num">15</span>)
);</pre>
      </div>
    </div>

    <div class="code-panel" id="p4">
      <div class="code-block">
        <div class="code-block-bar"><span>tests/Feature/SubscriptionTest.php</span><span class="lang">Pest</span></div>
<pre><span class="c-comment">// Every critical path tested — readable, expressive Pest syntax</span>
<span class="c-method">it</span>(<span class="c-string">'creates a subscription when payment succeeds'</span>, <span class="c-keyword">function</span> () {
    <span class="c-var">$user</span> = <span class="c-class">User</span>::<span class="c-method">factory</span>()-><span class="c-method">create</span>();
    <span class="c-var">$plan</span> = <span class="c-class">Plan</span>::<span class="c-method">factory</span>()-><span class="c-method">monthly</span>()-><span class="c-method">create</span>();

    <span class="c-class">PaystackFacade</span>::<span class="c-method">fake</span>([<span class="c-string">'status'</span> => <span class="c-string">'success'</span>]);

    <span class="c-method">actingAs</span>(<span class="c-var">$user</span>)
        -><span class="c-method">postJson</span>(<span class="c-string">'/api/v1/subscriptions'</span>, [
            <span class="c-string">'plan_id'</span> => <span class="c-var">$plan</span>->id,
            <span class="c-string">'gateway'</span> => <span class="c-string">'paystack'</span>,
        ])
        -><span class="c-method">assertCreated</span>()
        -><span class="c-method">assertJsonPath</span>(<span class="c-string">'data.status'</span>, <span class="c-string">'active'</span>);

    <span class="c-method">expect</span>(<span class="c-var">$user</span>->subscriptions)-><span class="c-method">toHaveCount</span>(<span class="c-num">1</span>);
    <span class="c-class">Event</span>::<span class="c-method">assertDispatched</span>(<span class="c-class">SubscriptionCreated</span>::<span class="c-method">class</span>);
});</pre>
      </div>
    </div>
  </div>
</section>

<!-- ═══ PACKAGES ═══ -->
<section class="pkg-section" aria-labelledby="pkg-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pkg-heading">Laravel packages<br>by <em>application scale</em></h2>
    </div>
    <p>All Laravel projects are scoped and quoted individually after a free discovery session. The ranges below reflect typical pricing across project categories — your exact quote will be itemised and transparent before any work begins.</p>
  </div>
  <div class="pkg-grid">

    <div class="pkg-card reveal">
      <div class="pkg-head">
        <div class="pkg-badge">Internal Tools / MVPs</div>
        <div class="pkg-name">Essential</div>
        <p class="pkg-tagline">A focused Laravel application with core functionality — ideal for MVPs, internal tools, and simple portals.</p>
        <div class="pkg-price">₦800k <sub>starting from</sub></div>
      </div>
      <div class="pkg-body">
        <div class="pkg-feat">Up to 10 core features</div>
        <div class="pkg-feat">2 user roles</div>
        <div class="pkg-feat">Filament admin panel</div>
        <div class="pkg-feat">Basic REST API</div>
        <div class="pkg-feat">Email notifications</div>
        <div class="pkg-feat">Single payment gateway</div>
        <div class="pkg-feat">Automated test suite</div>
        <div class="pkg-feat">30-day post-launch support</div>
        <div class="pkg-feat no">Multi-tenancy</div>
        <div class="pkg-feat no">Subscription billing</div>
      </div>
      <div class="pkg-foot"><a href="#contact" class="pkg-btn outline">Get a Quote →</a></div>
    </div>

    <div class="pkg-card featured reveal">
      <div class="pkg-head">
        <div class="pkg-badge">Most Common Scope</div>
        <div class="pkg-name">Platform</div>
        <p class="pkg-tagline">A full-featured business platform — multi-role portal, marketplace, or SaaS with payment integration.</p>
        <div class="pkg-price">₦1.5M–4M <sub>based on scope</sub></div>
      </div>
      <div class="pkg-body">
        <div class="pkg-feat">Unlimited features in scope</div>
        <div class="pkg-feat">Multi-role authentication</div>
        <div class="pkg-feat">Full Filament admin panel</div>
        <div class="pkg-feat">Versioned REST API + docs</div>
        <div class="pkg-feat">Paystack + Stripe integration</div>
        <div class="pkg-feat">Queue workers & job system</div>
        <div class="pkg-feat">Livewire reactive frontend</div>
        <div class="pkg-feat">80%+ test coverage</div>
        <div class="pkg-feat">CI/CD pipeline</div>
        <div class="pkg-feat">60-day post-launch support</div>
      </div>
      <div class="pkg-foot" style="padding-top:.25rem"><a href="#contact" class="pkg-btn gold">Request a Proposal →</a></div>
    </div>

    <div class="pkg-card reveal">
      <div class="pkg-head">
        <div class="pkg-badge">Enterprise & SaaS</div>
        <div class="pkg-name">Enterprise</div>
        <p class="pkg-tagline">Complex SaaS, multi-tenant platforms, high-traffic applications, and enterprise system integrations.</p>
        <div class="pkg-price">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="pkg-body">
        <div class="pkg-feat">Multi-tenant architecture</div>
        <div class="pkg-feat">Subscription billing engine</div>
        <div class="pkg-feat">Advanced analytics dashboard</div>
        <div class="pkg-feat">Third-party ERP/CRM integration</div>
        <div class="pkg-feat">Custom package development</div>
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

<!-- ═══ RESULTS ═══ -->
<section class="results-section" aria-labelledby="results-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Proven Results</span>
      <h2 class="s-head" id="results-heading">What our Laravel<br>applications <em>deliver</em></h2>
    </div>
    <p>Real outcomes from Laravel applications we have built and shipped. These are not projections — they are live results from production systems serving real users.</p>
  </div>
  <div class="results-grid">
    <div class="result-card reveal">
      <div class="result-num"><span class="counter" data-target="71">0</span><span>%</span></div>
      <div class="result-label">of program applications submitted online — up from zero</div>
      <p class="result-project">Nnaedozie Thomas Foundation — scholarship portal and program management system built on custom Laravel backend with Livewire frontend.</p>
      <a href="{{ route('portfolio.show', ['portfolioProject' => 'ntf']) }}" class="result-link">Read Case Study →</a>
    </div>
    <div class="result-card reveal">
      <div class="result-num"><span class="counter" data-target="3400">0</span><span>+</span></div>
      <div class="result-label">active registered users in the first 6 months post-launch</div>
      <p class="result-project">YBLocal — Nigerian local business directory built on Laravel with Filament admin, task layer, escrow, and diaspora agent functionality.</p>
      <a href="{{ route('portfolio.index') }}" class="result-link">View Project →</a>
    </div>
    <div class="result-card reveal">
      <div class="result-num">148<span>/148</span></div>
      <div class="result-label">automated tests passing before every production deployment</div>
      <p class="result-project">Careerclev — salary intelligence platform with BLS OEWS data processing, dynamic occupation pages, and a real-time resume builder backed by a Laravel API.</p>
      <a href="{{ route('portfolio.index') }}" class="result-link">View Project →</a>
    </div>
  </div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What clients say about<br>our <em>Laravel work</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars">★★★★★</div>
      <p class="test-quote">"We had been told by two other developers that what we wanted to build wasn't possible in our budget. i2Medier scoped it clearly, broke it into phases, and delivered a working platform in 10 weeks. The codebase is clean and our internal team can actually read and extend it."</p>
      <div class="test-author">
        <div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z"></path><path d="M5 20a7 7 0 0 1 14 0"></path></svg></div>
        <div><div class="test-name">Co-founder</div><div class="test-role">YBLocal Platform</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars">★★★★★</div>
      <p class="test-quote">"The thing that impressed me most was the test suite. I didn't ask for it — they just built it as standard. When we added new features three months later, we knew immediately if anything broke. That kind of professionalism is rare at this price point."</p>
      <div class="test-author">
        <div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z"></path><path d="M5 20a7 7 0 0 1 14 0"></path></svg></div>
        <div><div class="test-name">Founder</div><div class="test-role">Careerclev Platform</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars">★★★★★</div>
      <p class="test-quote">"The Filament admin panel alone was worth the engagement. Our non-technical programme managers can now manage all scholarship applications, event registrations, and donor records without ever calling a developer. The handover was thorough and the documentation is genuinely useful."</p>
      <div class="test-author">
        <div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z"></path><path d="M5 20a7 7 0 0 1 14 0"></path></svg></div>
        <div><div class="test-name">Executive Director</div><div class="test-role">Nnaedozie Thomas Foundation</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FAQ ═══ -->
<section aria-labelledby="faq-heading">
  <span class="s-label">FAQ</span>
  <h2 class="s-head" id="faq-heading">Laravel questions,<br><em>answered plainly</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Still have questions?</h3>
      <p>If your question isn't answered below, email us. We'll give you a straight answer — no sales preamble, no pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">When should I use Laravel instead of WordPress?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f1">Use Laravel when your project requires custom business logic, complex user roles, real-time features, multi-tenant architecture, or any functionality that a CMS cannot handle out of the box. WordPress is ideal for content-driven sites. Laravel is the right choice when you are building a web application — something with state, workflows, transactions, and rules specific to your business. If you're unsure, book a free consultation and we'll give you our honest recommendation.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">How long does a Laravel application take to build?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f2">Simple applications with standard CRUD functionality typically take 6–8 weeks from design sign-off to production deployment. Mid-complexity platforms — multi-role portals, SaaS with subscription billing, marketplace apps — range from 8–14 weeks. Enterprise systems with complex business logic, multiple integrations, and large data models can take 16+ weeks. We provide a detailed, milestone-by-milestone timeline during the discovery phase.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">Do you use Laravel Livewire and Filament?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f3">Yes, on virtually every project. Livewire 3 is our default for reactive, real-time UI within Laravel — it gives a smooth, SPA-like experience without the complexity and maintenance overhead of Vue.js or React. Filament 3 is our admin panel framework of choice — it produces a powerful, customisable dashboard with resources, widgets, and actions in a fraction of the time of building a custom admin from scratch. Both integrate seamlessly with the rest of the Laravel ecosystem.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Can you integrate payment gateways into a Laravel app?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f4">Absolutely — and it is one of our most requested features. We have integrated Paystack, Stripe, Flutterwave, and PayPal into multiple production Laravel applications. Our implementations handle webhook listeners with signature verification, idempotent payment processing, subscription billing with renewal logic, invoice generation, multi-currency support, and full payment audit trails. We test against sandbox environments before any live processing occurs.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Will you build a REST API for my application?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f5">Yes — every application we build includes a REST API as standard. We use Laravel Sanctum for token-based API authentication and structure all endpoints with versioning, consistent JSON responses, appropriate HTTP status codes, and rate limiting. We also write Postman collection documentation delivered on handover. If you need OAuth2 for third-party integrations, we implement Laravel Passport instead of Sanctum.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">How much does a Laravel application cost?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f6">Laravel projects are priced based on scope, complexity, and timeline. Simple applications start from ₦800,000. Mid-complexity platforms — multi-role portals with payment integration and Livewire interfaces — typically range from ₦1.5M to ₦4M. Enterprise and SaaS applications are quoted individually. We provide a written, itemised proposal after a free discovery session — you know exactly what you are paying for before any commitment is made.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Do you write tests for Laravel applications?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f7">Yes — automated testing is a standard deliverable, not an optional add-on. We write test suites using Pest (our preference) or PHPUnit, targeting a minimum of 80% coverage on all business-critical modules — authentication flows, payment processing, role-based access, API responses, and form validation. Tests are committed to the same repository as the application code and run on every push via GitHub Actions before any production deployment.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f8">Can my team maintain the application after handover?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f8">Yes. We write code to be readable and maintainable by any competent PHP developer, not just by us. On handover you receive the full source code on a private GitHub repository, a technical documentation pack covering architecture decisions, environment setup, and deployment procedures, and a developer handover session if required. The codebase follows Laravel conventions strictly — any Laravel developer can pick it up and continue working on it without a steep learning curve.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ RELATED SERVICES ═══ -->
<section class="related-section" aria-labelledby="related-heading">
  <span class="s-label">Related Services</span>
  <h2 class="s-head" id="related-heading">Often paired <em>with this service</em></h2>
  <div class="related-grid">
    <a href="{{ route('site.services.wordpress-development') }}" class="related-item">
      <div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 7 7-7 11-7-11 7-7Z"></path></svg></div>
      <div class="ri-name">WordPress Development</div>
      <p class="ri-desc">For content-driven sites, blogs, and marketing platforms where a CMS is the right fit.</p>
    </a>
    <a href="{{ route('site.services.ui-ux-design') }}" class="related-item">
      <div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 0-4h-1a2 2 0 0 1 0-4h4a4 4 0 0 0 0-8Z"></path><circle cx="7.5" cy="10.5" r="1"></circle><circle cx="9.5" cy="7.5" r="1"></circle><circle cx="13.5" cy="7.5" r="1"></circle></svg></div>
      <div class="ri-name">UI/UX Design</div>
      <p class="ri-desc">Full application design in Figma — every screen, state, and user flow before development starts.</p>
    </a>
    <a href="{{ route('site.services.cloud-architecture') }}" class="related-item">
      <div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 14 21 3"></path><path d="M21 3h-6"></path><path d="M21 3v6"></path><path d="M14 10 3 21"></path><path d="M9 3H5a2 2 0 0 0-2 2v4"></path><path d="M15 21h4a2 2 0 0 0 2-2v-4"></path></svg></div>
      <div class="ri-name">API Integration</div>
      <p class="ri-desc">Connect your platform to payment gateways, CRMs, logistics providers, and third-party data sources.</p>
    </a>
    <a href="{{ route('site.services.website-maintenance') }}" class="related-item">
      <div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v6c0 5 3.4 7.9 7 9 3.6-1.1 7-4 7-9V6l-7-3Z"></path><path d="m9.5 12 1.8 1.8 3.7-3.8"></path></svg></div>
      <div class="ri-name">Maintenance & Support</div>
      <p class="ri-desc">Monthly retainer covering updates, monitoring, priority support, and ongoing feature development.</p>
    </a>
  </div>
</section>

<!-- CTA -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build your<br>Laravel application?</h2>
  <p>Tell us what you are building and we will send a detailed, itemised proposal within 24 hours, with no commitment required.</p>
  <a href="{{ route('site.start', ['services' => 'laravel', 'source_page' => 'service-laravel-development', 'source_label' => 'Laravel Development Service Page']) }}" class="btn-dark">Start Your Laravel Project →</a>
</section>


@endsection
