@extends('public.layouts.app')

@section('title', 'Web Design Company in Nigeria | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Design & Development', 'item' => route('site.services.web-design')],
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
            'name' => 'How long does it take to build a website with i2Medier?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Project timelines vary by scope. A standard WordPress website typically takes 3–5 weeks. Custom Laravel applications range from 6–12 weeks depending on the complexity of features and integrations required.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Do you work with clients outside Nigeria?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We work with clients across Nigeria, the United Kingdom, the United States, Canada, and beyond. Our remote workflow is fully optimised for international projects.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'What platforms do you build on?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We primarily build on WordPress and Laravel. For simpler landing pages and microsites we also work in plain HTML/CSS/JavaScript, and for larger product companies we can deliver in Next.js or React.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Can you redesign or improve my existing website?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Absolutely. We can migrate your existing content, improve performance, modernise the design, and rebuild on a more scalable platform — all without disrupting your live site.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Do you offer ongoing maintenance after launch?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We offer monthly maintenance plans covering software updates, security monitoring, daily backups, uptime monitoring, and priority technical support.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'How much does a website cost?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Pricing depends on project type, number of pages, custom features, integrations, and timeline. Simple brochure websites start from ₦350,000, while application projects are scoped and quoted individually.'],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('page_css')
    @vite('resources/css/public/pages/web-design.css')
@endpush

@push('scripts')
    @vite('resources/js/public/pages/service-web-design.js')
@endpush

@section('content')
<div class="single-service-page">
  <header class="hero" role="banner">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
      <a href="{{ route('site.home') }}">Home</a>
      <span class="breadcrumb-sep" aria-hidden="true">›</span>
      <a href="{{ route('site.services') }}">Services</a>
      <span class="breadcrumb-sep" aria-hidden="true">›</span>
      <span aria-current="page">Web Development in Nigeria</span>
    </div>
    <span class="hero-tag"><span class="hero-dot" aria-hidden="true"></span> What We Do</span>
    <h1>Web design &amp; development<br>services that <em>drive results</em></h1>
    <p class="hero-sub">From bespoke WordPress websites to complex Laravel applications, we build digital products that look exceptional, perform brilliantly, and deliver measurable business outcomes for clients across Nigeria, the UK, and beyond.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-white">Get a Free Quote →</a>
      <a href="{{ route('portfolio.index') }}" class="btn-ghost">See Our Work</a>
    </div>
  </header>

  <div class="trust-bar" aria-label="Trust signals" role="complementary">
    <div class="trust-track" aria-hidden="true">
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><polygon points="12 2 15.1 8.3 22 9.3 17 14.2 18.2 21 12 17.7 5.8 21 7 14.2 2 9.3 8.9 8.3 12 2"></polygon></svg></span><span class="trust-item-text">120+ Projects Delivered</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><line x1="3" y1="12" x2="21" y2="12"></line><path d="M12 3a15 15 0 0 1 0 18"></path><path d="M12 3a15 15 0 0 0 0 18"></path></svg></span><span class="trust-item-text">Clients in 12+ Countries</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><polygon points="13 2 4 14 11 14 9 22 20 9 13 9 13 2"></polygon></svg></span><span class="trust-item-text">Sub-2s Load Times</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="11" width="16" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg></span><span class="trust-item-text">SSL & Security on Every Build</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-3-5.6 3 1.1-6.2L3 9.6l6.2-.9L12 3z"></path></svg></span><span class="trust-item-text">98% Client Satisfaction</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="2" width="10" height="20" rx="2"></rect><line x1="11" y1="18" x2="13" y2="18"></line></svg></span><span class="trust-item-text">Mobile-First by Default</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span><span class="trust-item-text">SEO-Ready on Every Project</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 12l3 3 5-5"></path><path d="M20 12v5a2 2 0 0 1-2 2h-3"></path><path d="M4 12v5a2 2 0 0 0 2 2h3"></path><path d="M8 7H6a2 2 0 0 0-2 2v3"></path><path d="M16 7h2a2 2 0 0 1 2 2v3"></path></svg></span><span class="trust-item-text">30-Day Post-Launch Support</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><polygon points="12 2 15.1 8.3 22 9.3 17 14.2 18.2 21 12 17.7 5.8 21 7 14.2 2 9.3 8.9 8.3 12 2"></polygon></svg></span><span class="trust-item-text">120+ Projects Delivered</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><line x1="3" y1="12" x2="21" y2="12"></line><path d="M12 3a15 15 0 0 1 0 18"></path><path d="M12 3a15 15 0 0 0 0 18"></path></svg></span><span class="trust-item-text">Clients in 12+ Countries</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><polygon points="13 2 4 14 11 14 9 22 20 9 13 9 13 2"></polygon></svg></span><span class="trust-item-text">Sub-2s Load Times</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="11" width="16" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg></span><span class="trust-item-text">SSL & Security on Every Build</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-3-5.6 3 1.1-6.2L3 9.6l6.2-.9L12 3z"></path></svg></span><span class="trust-item-text">98% Client Satisfaction</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="2" width="10" height="20" rx="2"></rect><line x1="11" y1="18" x2="13" y2="18"></line></svg></span><span class="trust-item-text">Mobile-First by Default</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span><span class="trust-item-text">SEO-Ready on Every Project</span></div>
      <div class="trust-item"><span class="trust-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 12l3 3 5-5"></path><path d="M20 12v5a2 2 0 0 1-2 2h-3"></path><path d="M4 12v5a2 2 0 0 0 2 2h3"></path><path d="M8 7H6a2 2 0 0 0-2 2v3"></path><path d="M16 7h2a2 2 0 0 1 2 2v3"></path></svg></span><span class="trust-item-text">30-Day Post-Launch Support</span></div>
    </div>
  </div>

  <section class="svc-overview" aria-labelledby="services-overview-heading">
    <div class="section-intro">
      <div>
        <span class="s-label">Our Services</span>
        <h2 class="s-head" id="services-overview-heading">Everything your <em>business needs</em><br>to win online</h2>
      </div>
      <div class="section-intro-right">
        <p>We are a full-service digital agency delivering web design, development, SEO, and digital strategy. Whether you are a startup launching your first website or an established brand planning a complete digital overhaul, we have the expertise to deliver it on time, on budget, and to an exceptional standard.</p>
      </div>
    </div>

    <div class="svc-nav-grid" role="list" aria-label="Jump to a service">
      <a href="#wordpress" class="svc-nav-item" role="listitem"><div class="sni-ico-wrap" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><path d="M7.5 8.5l2.5 7 2-5 2 5 2.5-7"></path></svg></div><div class="sni-name">WordPress Development</div><div class="sni-count">01 ——</div></a>
      <a href="#laravel" class="svc-nav-item" role="listitem"><div class="sni-ico-wrap" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 19V5"></path><path d="M20 19V9"></path><path d="M4 19h16"></path><path d="M8 19V11"></path><path d="M12 19V7"></path><path d="M16 19v-5"></path></svg></div><div class="sni-name">Laravel Applications</div><div class="sni-count">02 ——</div></a>
      <a href="#uiux" class="svc-nav-item" role="listitem"><div class="sni-ico-wrap" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 20h9"></path><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path></svg></div><div class="sni-name">UI/UX Design</div><div class="sni-count">03 ——</div></a>
      <a href="#ecommerce" class="svc-nav-item" role="listitem"><div class="sni-ico-wrap" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="9" cy="20" r="1"></circle><circle cx="17" cy="20" r="1"></circle><path d="M3 4h2l2.4 10.5a1 1 0 0 0 1 .8H18a1 1 0 0 0 1-.8L21 8H7"></path></svg></div><div class="sni-name">E-Commerce</div><div class="sni-count">04 ——</div></a>
      <a href="#seo" class="svc-nav-item" role="listitem"><div class="sni-ico-wrap" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div><div class="sni-name">Search Engine Optimisation</div><div class="sni-count">05 ——</div></a>
      <a href="#maintenance" class="svc-nav-item" role="listitem"><div class="sni-ico-wrap" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 2l7 4v6c0 5-3.5 8.5-7 10-3.5-1.5-7-5-7-10V6l7-4z"></path><path d="M9.5 12l2 2 3-4"></path></svg></div><div class="sni-name">Maintenance & Support</div><div class="sni-count">06 ——</div></a>
      <a href="#api" class="svc-nav-item" role="listitem"><div class="sni-ico-wrap" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M10 13a5 5 0 0 0 7.07 0l2.83-2.83a5 5 0 0 0-7.07-7.07L10 6"></path><path d="M14 11a5 5 0 0 0-7.07 0L4.1 13.83a5 5 0 1 0 7.07 7.07L14 18"></path></svg></div><div class="sni-name">API Integration</div><div class="sni-count">07 ——</div></a>
      <a href="#performance" class="svc-nav-item" role="listitem"><div class="sni-ico-wrap" aria-hidden="true"><svg viewBox="0 0 24 24"><polygon points="13 2 4 14 11 14 9 22 20 9 13 9 13 2"></polygon></svg></div><div class="sni-name">Performance Optimisation</div><div class="sni-count">08 ——</div></a>
    </div>
  </section>

  <section class="svc-section" id="wordpress" aria-labelledby="svc-wp-heading">
    <div class="svc-inner reveal">
      <div class="svc-copy">
        <span class="s-label">01 — WordPress Development</span>
        <h2 class="s-head" id="svc-wp-heading">Custom WordPress websites built <em>from scratch</em></h2>
        <p>WordPress powers over 43% of the internet and, when built properly, remains one of the most powerful and flexible content management systems available. At i2Medier, we do not install premium themes and call it a website. Every WordPress project we deliver is built on a custom PHP theme developed specifically for your brand, your content, and your business goals.</p>
        <p>From corporate websites and nonprofit platforms to portfolio sites, membership portals, and news publications, our WordPress builds are fast, secure, SEO-friendly, and fully manageable by your team without touching a line of code.</p>
        <ul class="svc-bullets">
          <li>Custom theme development — no Elementor, no page-builder bloat</li>
          <li>Advanced Custom Fields (ACF) for flexible, scalable content management</li>
          <li>Custom post types and taxonomies for any content model</li>
          <li>WooCommerce integration for e-commerce capability</li>
          <li>Optimised for Core Web Vitals and Google PageSpeed scores of 90+</li>
          <li>Multisite configurations for networks of related websites</li>
          <li>Full content migration from any existing platform</li>
          <li>Comprehensive CMS training and admin documentation on delivery</li>
        </ul>
        <a href="#contact" class="svc-cta-link">Start a WordPress Project →</a>
      </div>
      <div class="svc-visual" aria-hidden="true"><div class="vis-inner"><div style="background:var(--white);border-radius:8px;border:1px solid var(--g200);overflow:hidden;box-shadow:0 8px 30px rgba(0,0,0,.08)"><div style="background:#1d2327;padding:.65rem 1rem;display:flex;align-items:center;gap:.5rem"><div style="width:7px;height:7px;border-radius:50%;background:#ff5f57"></div><div style="width:7px;height:7px;border-radius:50%;background:#febc2e"></div><div style="width:7px;height:7px;border-radius:50%;background:#28c840"></div><div style="flex:1;text-align:center;font-family:var(--mono);font-size:.6rem;color:rgba(255,255,255,.3)">WordPress Dashboard</div></div><div style="display:flex"><div style="width:70px;background:#1d2327;padding:.75rem .5rem;display:flex;flex-direction:column;gap:.5rem;min-height:200px"><div style="height:28px;background:rgba(255,255,255,.06);border-radius:4px"></div><div style="height:22px;background:#2271b1;border-radius:4px"></div><div style="height:22px;background:rgba(255,255,255,.04);border-radius:4px"></div><div style="height:22px;background:rgba(255,255,255,.04);border-radius:4px"></div><div style="height:22px;background:rgba(255,255,255,.04);border-radius:4px"></div></div><div style="flex:1;padding:1rem;background:var(--off)"><div style="font-size:.65rem;font-weight:600;color:var(--black);margin-bottom:.65rem">Pages (12)</div><div style="display:flex;flex-direction:column;gap:.4rem"><div style="background:var(--white);border-radius:3px;padding:.5rem .65rem;border:1px solid var(--g200);display:flex;align-items:center;justify-content:space-between"><span style="font-size:.62rem;color:var(--black);font-weight:500">Home</span><span style="font-size:.55rem;background:#d63638;color:white;padding:.1rem .35rem;border-radius:2px">Published</span></div><div style="background:var(--white);border-radius:3px;padding:.5rem .65rem;border:1px solid var(--g200);display:flex;align-items:center;justify-content:space-between"><span style="font-size:.62rem;color:var(--black);font-weight:500">About Us</span><span style="font-size:.55rem;background:#00a32a;color:white;padding:.1rem .35rem;border-radius:2px">Live</span></div><div style="background:var(--white);border-radius:3px;padding:.5rem .65rem;border:1px solid var(--g200);display:flex;align-items:center;justify-content:space-between"><span style="font-size:.62rem;color:var(--black);font-weight:500">Services</span><span style="font-size:.55rem;background:#00a32a;color:white;padding:.1rem .35rem;border-radius:2px">Live</span></div><div style="background:var(--white);border-radius:3px;padding:.5rem .65rem;border:1px solid var(--g200);display:flex;align-items:center;justify-content:space-between"><span style="font-size:.62rem;color:var(--black);font-weight:500">Contact</span><span style="font-size:.55rem;background:#dba617;color:white;padding:.1rem .35rem;border-radius:2px">Draft</span></div></div></div></div></div><div style="margin-top:1rem;display:flex;gap:.5rem;flex-wrap:wrap"><span style="font-size:.65rem;font-weight:500;color:var(--g700);background:var(--g100);padding:.25rem .6rem;border-radius:3px;border:1px solid var(--g200)">Custom Theme</span><span style="font-size:.65rem;font-weight:500;color:var(--g700);background:var(--g100);padding:.25rem .6rem;border-radius:3px;border:1px solid var(--g200)">ACF Pro</span><span style="font-size:.65rem;font-weight:500;color:var(--g700);background:var(--g100);padding:.25rem .6rem;border-radius:3px;border:1px solid var(--g200)">PHP 8.2</span><span style="font-size:.65rem;font-weight:500;color:var(--g700);background:var(--g100);padding:.25rem .6rem;border-radius:3px;border:1px solid var(--g200)">WooCommerce Ready</span></div></div></div>
    </div>
  </section>

  <section class="svc-section off" id="laravel" aria-labelledby="svc-laravel-heading">
    <div class="svc-inner rev reveal">
      <div class="svc-copy">
        <span class="s-label">02 — Laravel Development</span>
        <h2 class="s-head" id="svc-laravel-heading">Powerful web applications<br>built on <em>Laravel</em></h2>
        <p>When your project needs more than a CMS, whether that means custom business logic, complex user roles, marketplace functionality, or a bespoke SaaS product, Laravel is our framework of choice. It gives us the tools to build virtually any web application with clean, maintainable code.</p>
        <p>We have used Laravel to build everything from salary intelligence platforms and local business directories to event management systems and customer portals. If you can describe it, we can build it.</p>
        <ul class="svc-bullets">
          <li>Full-stack Laravel application development from design to deployment</li>
          <li>Livewire for reactive, real-time UI without the JavaScript overhead</li>
          <li>Filament admin panels for powerful, customisable backend interfaces</li>
          <li>REST API development and third-party API integration</li>
          <li>Role-based authentication and multi-tenant architecture</li>
          <li>Payment gateway integration — Paystack, Stripe, Flutterwave</li>
          <li>Task scheduling, queues, and background job processing</li>
          <li>Comprehensive test suites and CI/CD pipeline setup on request</li>
        </ul>
        <a href="#contact" class="svc-cta-link">Discuss Your Application →</a>
      </div>
      <div class="svc-visual" style="background:var(--black)" aria-hidden="true"><div class="vis-inner"><div style="font-family:var(--mono);font-size:.72rem;color:rgba(255,255,255,.6);line-height:1.9"><div><span style="color:#f38518">Route</span><span style="color:rgba(255,255,255,.3)">::</span><span style="color:#4ec9b0">get</span><span style="color:rgba(255,255,255,.4)">('/dashboard',</span></div><div style="padding-left:1rem"><span style="color:#dcdcaa">DashboardController</span><span style="color:rgba(255,255,255,.3)">::class</span></div><div style="padding-left:1rem"><span style="color:rgba(255,255,255,.3)">)-></span><span style="color:#4ec9b0">middleware</span><span style="color:rgba(255,255,255,.3)">([</span></div><div style="padding-left:2rem"><span style="color:#ce9178">'auth'</span><span style="color:rgba(255,255,255,.3)">,</span> <span style="color:#ce9178">'verified'</span></div><div style="padding-left:1rem"><span style="color:rgba(255,255,255,.3)">])->name(</span><span style="color:#ce9178">'dashboard'</span><span style="color:rgba(255,255,255,.3)">);</span></div></div></div></div>
    </div>
  </section>

  <section class="svc-section" id="uiux" aria-labelledby="svc-uiux-heading">
    <div class="svc-inner reveal">
      <div class="svc-copy">
        <span class="s-label">03 — UI/UX Design</span>
        <h2 class="s-head" id="svc-uiux-heading">Interfaces designed to<br><em>convert, not just impress</em></h2>
        <p>Great design is not decoration. It is strategy. Every visual decision we make, from typography and colour palettes to button placement and scroll flow, is grounded in user psychology and conversion principles.</p>
        <p>Our design process is collaborative, iterative, and always begins with a deep understanding of your users and your business objectives. We deliver complete UI systems — not just static mockups — with defined component libraries, spacing systems, and responsive behaviour fully documented.</p>
        <ul class="svc-bullets">
          <li>User research, persona development, and journey mapping</li>
          <li>Wireframing and interactive prototype delivery in Figma</li>
          <li>Full UI design systems with reusable components and design tokens</li>
          <li>Responsive design for all screen sizes from mobile to 4K</li>
          <li>Accessibility compliance — WCAG 2.1 AA as standard</li>
          <li>Micro-interaction design and motion specifications</li>
          <li>Brand identity integration and design language development</li>
        </ul>
        <a href="#contact" class="svc-cta-link">Request a Design Consultation →</a>
      </div>
      <div class="svc-visual" aria-hidden="true"><div class="vis-inner"><div style="display:flex;flex-direction:column;gap:.75rem"><div style="font-size:.6rem;font-weight:600;color:var(--g400);letter-spacing:.12em;text-transform:uppercase">Design System</div><div style="display:flex;gap:.5rem;align-items:center"><div style="width:32px;height:32px;border-radius:50%;background:var(--black)"></div><div style="width:32px;height:32px;border-radius:50%;background:var(--gold)"></div><div style="width:32px;height:32px;border-radius:50%;background:var(--off);border:1px solid var(--g200)"></div><div style="width:32px;height:32px;border-radius:50%;background:var(--g400)"></div><span style="font-size:.65rem;color:var(--g400);margin-left:.25rem">4 brand tokens</span></div><div style="display:flex;flex-direction:column;gap:.3rem"><div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;letter-spacing:-.03em;color:var(--black)">Heading Serif Bold</div><div style="font-family:var(--sans);font-size:.9rem;font-weight:500;color:var(--g700)">Body Sans Medium — DM Sans 16px / 1.75</div><div style="font-family:var(--mono);font-size:.75rem;color:var(--g400)">MONO Label — JetBrains 12px</div></div></div></div>
    </div>
  </section>

  <section class="svc-section off" id="ecommerce" aria-labelledby="svc-ec-heading">
    <div class="svc-inner rev reveal">
      <div class="svc-copy">
        <span class="s-label">04 — E-Commerce Development</span>
        <h2 class="s-head" id="svc-ec-heading">Online stores that are<br>built to <em>sell</em></h2>
        <p>E-commerce is one of the highest-stakes web investments a business can make. A slow checkout, a confusing product page, or a broken mobile experience does not just frustrate visitors — it costs you sales directly and measurably.</p>
        <p>We work with WooCommerce for WordPress-based stores and can build fully custom storefronts on Laravel for businesses that need unique purchasing flows, subscription models, or B2B catalogue management beyond what off-the-shelf platforms offer.</p>
        <ul class="svc-bullets">
          <li>WooCommerce store setup, customisation, and performance tuning</li>
          <li>Custom product pages, variable products, and bundle configurations</li>
          <li>Checkout optimisation for maximum conversion rate</li>
          <li>Payment gateway integration — Paystack, Stripe, Flutterwave, PayPal</li>
          <li>Inventory management, order tracking, and fulfilment workflows</li>
          <li>Subscription and recurring billing systems</li>
          <li>B2B catalogue and wholesale pricing configurations</li>
          <li>Mobile-first checkout experience with one-step flows</li>
        </ul>
        <a href="#contact" class="svc-cta-link">Build Your Store →</a>
      </div>
      <div class="svc-visual" aria-hidden="true"><div class="vis-inner"><div style="background:var(--white);border-radius:8px;border:1px solid var(--g200);overflow:hidden"><div style="padding:1rem;border-bottom:1px solid var(--g200)"><div style="font-size:.6rem;font-weight:600;text-transform:uppercase;letter-spacing:.12em;color:var(--g400);margin-bottom:.5rem">Cart — 3 items</div><div style="display:flex;flex-direction:column;gap:.4rem"><div style="display:flex;justify-content:space-between;align-items:center;padding:.4rem .5rem;background:var(--off);border-radius:3px"><span style="font-size:.7rem;color:var(--black)">Premium Package</span><span style="font-size:.7rem;font-weight:600;color:var(--black)">₦85,000</span></div><div style="display:flex;justify-content:space-between;align-items:center;padding:.4rem .5rem;background:var(--off);border-radius:3px"><span style="font-size:.7rem;color:var(--black)">Domain (1yr)</span><span style="font-size:.7rem;font-weight:600;color:var(--black)">₦12,500</span></div><div style="display:flex;justify-content:space-between;align-items:center;padding:.4rem .5rem;background:var(--off);border-radius:3px"><span style="font-size:.7rem;color:var(--black)">SSL Certificate</span><span style="font-size:.7rem;font-weight:600;color:var(--gold)">Free</span></div></div></div><div style="padding:1rem"><div style="display:flex;justify-content:space-between;margin-bottom:.75rem"><span style="font-size:.75rem;font-weight:600;color:var(--black)">Total</span><span style="font-family:var(--serif);font-size:1rem;font-weight:700;color:var(--black)">₦97,500</span></div><div style="background:var(--black);color:var(--white);border-radius:4px;padding:.55rem;text-align:center;font-size:.7rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase">Checkout →</div></div></div></div></div>
    </div>
  </section>

  <section class="svc-section" id="seo" aria-labelledby="svc-seo-heading">
    <div class="svc-inner reveal">
      <div class="svc-copy">
        <span class="s-label">05 — Search Engine Optimisation</span>
        <h2 class="s-head" id="svc-seo-heading">Rank higher. Get found.<br><em>Grow organically.</em></h2>
        <p>A beautifully designed website that no one can find is a missed opportunity. SEO is how you ensure that the right people — people actively searching for your services — can find you on Google, Bing, and beyond.</p>
        <p>Beyond the technical foundations, we also offer standalone SEO audits, on-page optimisation, content strategy, and link-building campaigns for businesses that want to improve rankings on their existing websites. Every recommendation we make is backed by data, not guesswork.</p>
        <ul class="svc-bullets">
          <li>Technical SEO audits covering crawlability, indexation, and Core Web Vitals</li>
          <li>On-page optimisation — meta tags, heading hierarchy, schema markup</li>
          <li>Keyword research and content gap analysis</li>
          <li>Local SEO for businesses targeting specific cities or regions</li>
          <li>Structured data (JSON-LD) for rich search result appearances</li>
          <li>XML sitemap generation and Google Search Console setup</li>
          <li>Page speed optimisation for improved search performance</li>
          <li>Monthly SEO reports with actionable insights</li>
        </ul>
        <a href="#contact" class="svc-cta-link">Get an SEO Audit →</a>
      </div>
      <div class="svc-visual" aria-hidden="true"><div class="vis-inner"><div style="display:flex;flex-direction:column;gap:.75rem"><div style="font-size:.6rem;font-weight:600;color:var(--g400);letter-spacing:.12em;text-transform:uppercase;margin-bottom:.25rem">Search Performance</div><div style="display:flex;align-items:flex-end;gap:.4rem;height:80px"><div style="flex:1;background:var(--g100);border-radius:3px 3px 0 0;height:35%"></div><div style="flex:1;background:var(--g100);border-radius:3px 3px 0 0;height:48%"></div><div style="flex:1;background:var(--g100);border-radius:3px 3px 0 0;height:42%"></div><div style="flex:1;background:var(--gold-lt);border-radius:3px 3px 0 0;height:60%"></div><div style="flex:1;background:var(--gold-lt);border-radius:3px 3px 0 0;height:72%"></div><div style="flex:1;background:var(--gold);border-radius:3px 3px 0 0;height:88%"></div><div style="flex:1;background:var(--gold);border-radius:3px 3px 0 0;height:100%"></div></div></div></div></div>
    </div>
  </section>

  <section class="svc-section off" id="maintenance" aria-labelledby="svc-maint-heading">
    <div class="svc-inner rev reveal">
      <div class="svc-copy">
        <span class="s-label">06 — Maintenance & Support</span>
        <h2 class="s-head" id="svc-maint-heading">Keep your site fast,<br>secure, and <em>always live</em></h2>
        <p>Your website is not a one-time project. It is a running business asset. Outdated WordPress plugins introduce security vulnerabilities, server configurations drift, and themes break after PHP updates. Without proactive maintenance, even the best-built website can become a liability within a year.</p>
        <p>Our monthly maintenance plans are designed to give business owners complete peace of mind. We handle all the technical upkeep so you can focus on what you do best, knowing your site is always up to date, backed up, and performing at its best.</p>
        <ul class="svc-bullets">
          <li>Weekly WordPress core, plugin, and theme updates with compatibility testing</li>
          <li>Daily off-site backups with one-click restore capability</li>
          <li>24/7 uptime monitoring with instant alerts on downtime</li>
          <li>Monthly security scans and malware removal if required</li>
          <li>Performance monitoring and monthly PageSpeed reporting</li>
          <li>Priority email and Slack support with 4–8 hour response SLA</li>
          <li>Up to 2 hours per month of minor content updates and edits included</li>
          <li>Annual security audits and hosting environment reviews</li>
        </ul>
        <a href="{{ route('site.services.website-maintenance') }}" class="svc-cta-link">View Maintenance Plans →</a>
      </div>
      <div class="svc-visual" aria-hidden="true"><div class="vis-inner"><div style="display:flex;flex-direction:column;gap:.65rem"><div style="font-size:.6rem;font-weight:600;color:var(--g400);letter-spacing:.12em;text-transform:uppercase">Site Health Dashboard</div><div style="display:grid;grid-template-columns:1fr 1fr;gap:.5rem"><div style="background:var(--white);border-radius:5px;border:1px solid var(--g200);padding:.7rem;text-align:center"><div style="font-family:var(--serif);font-size:1.1rem;font-weight:700;color:#2e7d32">99.9%</div><div style="font-size:.55rem;color:var(--g400);text-transform:uppercase;letter-spacing:.08em">Uptime</div></div><div style="background:var(--white);border-radius:5px;border:1px solid var(--g200);padding:.7rem;text-align:center"><div style="font-family:var(--serif);font-size:1.1rem;font-weight:700;color:var(--black)">1.4s</div><div style="font-size:.55rem;color:var(--g400);text-transform:uppercase;letter-spacing:.08em">Load Time</div></div><div style="background:var(--white);border-radius:5px;border:1px solid var(--g200);padding:.7rem;text-align:center"><div style="font-family:var(--serif);font-size:1.1rem;font-weight:700;color:var(--gold)">14</div><div style="font-size:.55rem;color:var(--g400);text-transform:uppercase;letter-spacing:.08em">Updates Done</div></div><div style="background:var(--white);border-radius:5px;border:1px solid var(--g200);padding:.7rem;text-align:center"><div style="font-family:var(--serif);font-size:1.1rem;font-weight:700;color:#2e7d32">0</div><div style="font-size:.55rem;color:var(--g400);text-transform:uppercase;letter-spacing:.08em">Issues Found</div></div></div></div></div></div>
    </div>
  </section>

  <section class="svc-section" id="api" aria-labelledby="svc-api-heading">
    <div class="svc-inner reveal">
      <div class="svc-copy">
        <span class="s-label">07 — API Integration</span>
        <h2 class="s-head" id="svc-api-heading">Connect your platform<br>to <em>anything</em></h2>
        <p>Modern businesses run on connected software. Your website or application needs to talk to payment processors, CRM systems, shipping providers, email marketing platforms, analytics tools, and more.</p>
        <p>We also build RESTful APIs for your own platforms — giving you the foundation to power mobile apps, third-party integrations, and headless front-ends from a single, well-documented data source.</p>
        <ul class="svc-bullets">
          <li>Payment gateways — Paystack, Stripe, Flutterwave, PayPal</li>
          <li>CRM integrations — HubSpot, Salesforce, Zoho</li>
          <li>Email and marketing platforms — Mailchimp, SendGrid, Klaviyo</li>
          <li>Shipping and logistics APIs — DHL, UPS, custom courier APIs</li>
          <li>SMS and messaging — Twilio, Termii, Africa's Talking</li>
          <li>Custom RESTful API development with full documentation</li>
          <li>Webhook setup and real-time event processing</li>
          <li>OAuth and secure authentication flows</li>
        </ul>
        <a href="#contact" class="svc-cta-link">Discuss an Integration →</a>
      </div>
      <div class="svc-visual" style="background:var(--black)" aria-hidden="true"><div class="vis-inner"><div style="font-family:var(--mono);font-size:.7rem;color:rgba(255,255,255,.55);line-height:1.9"><div><span style="color:#569cd6">POST</span> <span style="color:#ce9178">/v1/payments/initialize</span></div><div style="margin-top:.5rem;color:rgba(255,255,255,.3)">Request:</div><div style="padding-left:.75rem"><span style="color:#9cdcfe">"amount"</span><span style="color:rgba(255,255,255,.3)">: </span><span style="color:#b5cea8">100000</span></div><div style="padding-left:.75rem"><span style="color:#9cdcfe">"currency"</span><span style="color:rgba(255,255,255,.3)">: </span><span style="color:#ce9178">"NGN"</span></div><div style="padding-left:.75rem"><span style="color:#9cdcfe">"email"</span><span style="color:rgba(255,255,255,.3)">: </span><span style="color:#ce9178">"user@example.com"</span></div></div></div></div>
    </div>
  </section>

  <section class="svc-section off" id="performance" aria-labelledby="svc-perf-heading">
    <div class="svc-inner rev reveal">
      <div class="svc-copy">
        <span class="s-label">08 — Performance Optimisation</span>
        <h2 class="s-head" id="svc-perf-heading">Faster sites. Better rankings.<br><em>More conversions.</em></h2>
        <p>Website speed is not just a technical metric. It is a direct revenue lever. Google's own research shows that a one-second delay in mobile page load time can reduce conversions by up to 20%.</p>
        <p>We conduct systematic performance audits of existing websites and implement a structured programme of optimisation work — from server configuration and image compression to code splitting, caching strategy, and database query optimisation.</p>
        <ul class="svc-bullets">
          <li>Core Web Vitals audit and remediation — LCP, CLS, INP</li>
          <li>Image optimisation — compression, WebP conversion, lazy loading</li>
          <li>CSS and JavaScript minification and critical path delivery</li>
          <li>Server-side caching, object caching, and CDN configuration</li>
          <li>Database query optimisation for WordPress and Laravel</li>
          <li>Hosting environment review and upgrade recommendations</li>
          <li>Before/after reporting with PageSpeed Insights and Lighthouse scores</li>
        </ul>
        <a href="#contact" class="svc-cta-link">Get a Performance Audit →</a>
      </div>
      <div class="svc-visual" aria-hidden="true"><div class="vis-inner"><div style="display:flex;flex-direction:column;gap:.9rem"><div style="font-size:.6rem;font-weight:600;color:var(--g400);letter-spacing:.12em;text-transform:uppercase">Core Web Vitals</div><div style="display:flex;flex-direction:column;gap:.6rem"><div><div style="display:flex;justify-content:space-between;margin-bottom:.3rem"><span style="font-size:.72rem;font-weight:500;color:var(--black)">Largest Contentful Paint</span><span style="font-size:.72rem;font-weight:700;color:#2e7d32">1.2s ✓</span></div><div style="height:6px;background:var(--g100);border-radius:3px;overflow:hidden"><div style="width:92%;height:100%;background:#2e7d32;border-radius:3px"></div></div></div><div style="border-top:1px solid var(--g200);padding-top:.6rem;display:flex;align-items:center;justify-content:space-between"><span style="font-size:.7rem;font-weight:600;color:var(--black)">PageSpeed Score (Mobile)</span><span style="font-family:var(--serif);font-size:1.1rem;font-weight:700;color:var(--gold)">96</span></div></div></div></div>
    </div>
  </section>

  <section class="process-section" aria-labelledby="process-heading">
    <div style="max-width:1200px;margin:0 auto">
      <div class="section-intro" style="margin-bottom:0">
        <div><span class="s-label" style="color:var(--gold)">How We Work</span><h2 class="s-head" style="color:var(--white)" id="process-heading">Our <em>process</em> — from brief<br>to launch and beyond</h2></div>
        <div class="section-intro-right"><p style="color:rgba(255,255,255,.45)">We follow a proven delivery framework built across 120+ projects. Every client gets the same structured approach — clear milestones, regular communication, and zero surprises at invoice time.</p></div>
      </div>
      <div class="process-grid">
        <div class="proc-card reveal"><div class="proc-num">01</div><div class="proc-title">Discovery & Brief</div><p class="proc-desc">We start every project with a structured discovery session to understand your business goals, target audience, technical requirements, and competitive landscape.</p><div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Requirements Doc</span><span class="proc-tag">Competitor Review</span></div></div>
        <div class="proc-card reveal"><div class="proc-num">02</div><div class="proc-title">Wireframes & Architecture</div><p class="proc-desc">Before any visual design begins, we map out information architecture, user flows, and page wireframes.</p><div class="proc-tags"><span class="proc-tag">Sitemap</span><span class="proc-tag">User Flows</span><span class="proc-tag">Wireframes</span></div></div>
        <div class="proc-card reveal"><div class="proc-num">03</div><div class="proc-title">Design & Prototyping</div><p class="proc-desc">We develop full high-fidelity designs and interactive prototypes in Figma, covering all key pages across desktop and mobile.</p><div class="proc-tags"><span class="proc-tag">UI Design</span><span class="proc-tag">Figma Prototype</span><span class="proc-tag">Design Review</span></div></div>
        <div class="proc-card reveal"><div class="proc-num">04</div><div class="proc-title">Development & Integration</div><p class="proc-desc">With approved designs in hand, we move into development, using a staged environment for continuous review.</p><div class="proc-tags"><span class="proc-tag">Staging Build</span><span class="proc-tag">API Wiring</span><span class="proc-tag">Weekly Reviews</span></div></div>
        <div class="proc-card reveal"><div class="proc-num">05</div><div class="proc-title">QA & Performance</div><p class="proc-desc">Every project goes through systematic quality assurance across devices and browsers before launch.</p><div class="proc-tags"><span class="proc-tag">Cross-browser QA</span><span class="proc-tag">Lighthouse Audit</span><span class="proc-tag">WCAG Check</span></div></div>
        <div class="proc-card reveal"><div class="proc-num">06</div><div class="proc-title">Launch, Training & Handover</div><p class="proc-desc">We provide full CMS training, a written admin guide, analytics setup, and a 30-day post-launch support window.</p><div class="proc-tags"><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">30-Day Support</span></div></div>
      </div>
    </div>
  </section>

  <section aria-labelledby="whyus-heading">
    <div class="section-intro"><div><span class="s-label">Why i2Medier</span><h2 class="s-head" id="whyus-heading">What makes us <em>different</em></h2></div></div>
    <div class="why-grid">
      <div class="why-card reveal"><div class="why-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="10" width="18" height="10" rx="1"></rect><path d="M7 10V6h10v4"></path><line x1="12" y1="6" x2="12" y2="3"></line></svg></div><h3 class="why-title">We build from scratch</h3><p class="why-desc">No premium theme purchases, no Elementor bloat. Every website we deliver is built on a custom codebase designed specifically for your brand.</p></div>
      <div class="why-card reveal"><div class="why-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div><h3 class="why-title">SEO is built in, not bolted on</h3><p class="why-desc">We structure every project with search in mind from day one — semantic HTML, performance budgets, schema markup, canonical tags, and sitemap submission are standard.</p></div>
      <div class="why-card reveal"><div class="why-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"></rect><line x1="11" y1="18" x2="13" y2="18"></line></svg></div><h3 class="why-title">Mobile-first, always</h3><p class="why-desc">We design and test mobile first, ensuring your site is fast, touch-optimised, and converts on the devices your actual customers use.</p></div>
      <div class="why-card reveal"><div class="why-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><line x1="3" y1="12" x2="21" y2="12"></line><path d="M12 3a15 15 0 0 1 0 18"></path><path d="M12 3a15 15 0 0 0 0 18"></path></svg></div><h3 class="why-title">Local expertise, global reach</h3><p class="why-desc">Based in Nigeria with an active client base in the UK, US, and Canada, we understand both local market context and international standards.</p></div>
      <div class="why-card reveal"><div class="why-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M21 8l-9-5-9 5 9 5 9-5z"></path><path d="M3 8v8l9 5 9-5V8"></path></svg></div><h3 class="why-title">You own everything</h3><p class="why-desc">On delivery, you receive full ownership of all code, design assets, database backups, and accounts.</p></div>
      <div class="why-card reveal"><div class="why-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path><line x1="8" y1="9" x2="16" y2="9"></line><line x1="8" y1="13" x2="14" y2="13"></line></svg></div><h3 class="why-title">Transparent communication</h3><p class="why-desc">Every project has a clear scope document, regular check-in calls, and a shared staging environment so you can see progress clearly.</p></div>
    </div>
  </section>

  <div class="tech-band" role="complementary" aria-label="Technologies we use">
    <div class="tech-band-inner">
      <div><h2>Technologies<br>we master</h2><p style="margin-top:.5rem">We work with the best tools for every job — choosing reliability, performance, and long-term maintainability over trends.</p></div>
      <div class="tech-pills">
        <div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><path d="M7.5 8.5l2.5 7 2-5 2 5 2.5-7"></path></svg></span> WordPress</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><path d="M4 19V5"></path><path d="M20 19V9"></path><path d="M4 19h16"></path><path d="M8 19V11"></path><path d="M12 19V7"></path><path d="M16 19v-5"></path></svg></span> Laravel</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><path d="M7 19V5h7a4 4 0 1 1 0 8H7"></path><path d="M7 13h8a3 3 0 0 1 0 6H7"></path></svg></span> PHP 8.2</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><path d="M4 6c4 0 4 3 8 3s4-3 8-3"></path><path d="M4 12c4 0 4 3 8 3s4-3 8-3"></path><path d="M4 18c4 0 4 3 8 3s4-3 8-3"></path></svg></span> TailwindCSS</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><polygon points="13 2 4 14 11 14 9 22 20 9 13 9 13 2"></polygon></svg></span> Livewire</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><rect x="4" y="3" width="16" height="18" rx="2"></rect><path d="M8 7h8"></path><path d="M8 12h8"></path><path d="M8 17h5"></path></svg></span> Filament</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><path d="M8 8l4 4-4 4"></path><path d="M13 16h3"></path></svg></span> JavaScript</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="2"></circle><path d="M4.9 4.9l3.5 3.5"></path><path d="M19.1 4.9l-3.5 3.5"></path><path d="M4.9 19.1l3.5-3.5"></path><path d="M19.1 19.1l-3.5-3.5"></path></svg></span> Next.js</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="7" ry="3"></ellipse><path d="M5 5v14c0 1.7 3.1 3 7 3s7-1.3 7-3V5"></path><path d="M5 12c0 1.7 3.1 3 7 3s7-1.3 7-3"></path></svg></span> MySQL</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><path d="M20 17.5a4.5 4.5 0 0 0-1-8.9A6 6 0 0 0 7.2 7.5 4 4 0 0 0 7 15.5h13z"></path></svg></span> Cloudflare</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="12" rx="2"></rect><line x1="3" y1="10" x2="21" y2="10"></line></svg></span> Paystack</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="12" rx="2"></rect><line x1="3" y1="10" x2="21" y2="10"></line></svg></span> Stripe</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><path d="M12 20h9"></path><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path></svg></span> Figma</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><line x1="5" y1="20" x2="5" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="19" y1="20" x2="19" y2="13"></line></svg></span> GA4</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span> Yoast SEO</div><div class="tech-pill"><span class="tech-pill-icon"><svg viewBox="0 0 24 24"><circle cx="9" cy="20" r="1"></circle><circle cx="17" cy="20" r="1"></circle><path d="M3 4h2l2.4 10.5a1 1 0 0 0 1 .8H18a1 1 0 0 0 1-.8L21 8H7"></path></svg></span> WooCommerce</div>
      </div>
    </div>
  </div>

  <section class="pricing-section" aria-labelledby="pricing-heading">
    <div class="section-intro"><div><span class="s-label">Pricing</span><h2 class="s-head" id="pricing-heading">Transparent pricing<br>for every <em>budget</em></h2></div><div class="section-intro-right"><p>Every project is unique, so these are starting prices based on typical scope. We provide a detailed, itemised quote after a free 30-minute consultation.</p></div></div>
    <div class="pricing-grid">
      <div class="price-card reveal"><div class="price-head"><div class="price-badge">For Startups</div><div class="price-name">Starter Website</div><p class="price-desc">A clean, fast, professional website to establish your online presence and build credibility.</p><div class="price-amount">₦350k <sub>starting from</sub></div></div><div class="price-body"><div class="price-feat">Up to 5 custom pages</div><div class="price-feat">Custom WordPress theme</div><div class="price-feat">Mobile-responsive design</div><div class="price-feat">Contact form + Google Maps</div><div class="price-feat">Basic on-page SEO setup</div><div class="price-feat">Google Analytics integration</div><div class="price-feat">30-day post-launch support</div><div class="price-feat dim">E-commerce functionality</div><div class="price-feat dim">Custom admin dashboard</div></div><div class="price-foot"><a href="#contact" class="price-btn outline">Get a Quote →</a></div></div>
      <div class="price-card featured reveal"><div class="price-head"><div class="price-badge">Most Popular</div><div class="price-name">Business Platform</div><p class="price-desc">A full-featured business website with advanced content management and conversion focus.</p><div class="price-amount">₦750k <sub>starting from</sub></div></div><div class="price-body" style="background:rgba(255,255,255,.02)"><div class="price-feat" style="color:rgba(255,255,255,.65)">Up to 15 custom pages</div><div class="price-feat" style="color:rgba(255,255,255,.65)">Custom WordPress theme + ACF</div><div class="price-feat" style="color:rgba(255,255,255,.65)">Advanced content management</div><div class="price-feat" style="color:rgba(255,255,255,.65)">Blog / News CMS</div><div class="price-feat" style="color:rgba(255,255,255,.65)">Full SEO foundation + schema</div><div class="price-feat" style="color:rgba(255,255,255,.65)">Payment gateway integration</div><div class="price-feat" style="color:rgba(255,255,255,.65)">Staff CMS training session</div><div class="price-feat" style="color:rgba(255,255,255,.65)">Performance optimisation</div><div class="price-feat" style="color:rgba(255,255,255,.65)">60-day post-launch support</div></div><div class="price-foot" style="padding-bottom:1.75rem;padding-top:.25rem"><a href="#contact" class="price-btn gold">Start This Project →</a></div></div>
      <div class="price-card reveal"><div class="price-head"><div class="price-badge">For Scale</div><div class="price-name">Custom Application</div><p class="price-desc">A fully bespoke web application or complex platform built on Laravel, scoped to your exact requirements.</p><div class="price-amount">Custom <sub>quoted on scope</sub></div></div><div class="price-body"><div class="price-feat">Unlimited pages & features</div><div class="price-feat">Laravel + custom architecture</div><div class="price-feat">Role-based user system</div><div class="price-feat">Full API development</div><div class="price-feat">Multi-currency payment flows</div><div class="price-feat">Admin panel (Filament)</div><div class="price-feat">Automated testing suite</div><div class="price-feat">CI/CD pipeline setup</div><div class="price-feat">90-day support & SLA</div></div><div class="price-foot"><a href="#contact" class="price-btn solid">Request a Proposal →</a></div></div>
    </div>
  </section>

  <div class="stats-band" role="complementary" aria-label="Company statistics">
    <div class="stat reveal"><div class="stat-num"><span class="counter" data-target="120">0</span><span>+</span></div><div class="stat-label">Projects Delivered</div></div>
    <div class="stat reveal"><div class="stat-num"><span class="counter" data-target="98">0</span><span style="color:var(--gold)">%</span></div><div class="stat-label">Client Satisfaction</div></div>
    <div class="stat reveal"><div class="stat-num"><span class="counter" data-target="12">0</span><span>+</span></div><div class="stat-label">Countries Served</div></div>
    <div class="stat reveal"><div class="stat-num" style="color:var(--gold)">24/7</div><div class="stat-label">Support Available</div></div>
  </div>

  <section class="testimonials" aria-labelledby="testimonials-heading">
    <div class="section-intro"><div><span class="s-label">Client Reviews</span><h2 class="s-head" id="testimonials-heading">What our clients<br><em>say about us</em></h2></div></div>
    <div class="test-grid">
      <div class="test-card reveal"><div class="test-stars" aria-label="5 out of 5 stars">★★★★★</div><p class="test-quote">"i2Medier built our foundation's website from nothing to a platform that is now generating donations from diaspora supporters in the UK and USA."</p><div class="test-author"><div class="test-avatar" aria-hidden="true">N</div><div><div class="test-name">NTF Executive Director</div><div class="test-role">Nnaedozie Thomas Foundation, Nigeria</div></div></div></div>
      <div class="test-card reveal"><div class="test-stars" aria-label="5 out of 5 stars">★★★★★</div><p class="test-quote">"We went from zero online presence to ranking on page one for our target keywords within 90 days of launch."</p><div class="test-author"><div class="test-avatar" aria-hidden="true">M</div><div><div class="test-name">Operations Director</div><div class="test-role">Meto7 Chauffeur Services, UK</div></div></div></div>
      <div class="test-card reveal"><div class="test-stars" aria-label="5 out of 5 stars">★★★★★</div><p class="test-quote">"Working with i2Medier felt like having an in-house development team. They understood the UK healthcare sector and handed over with full documentation."</p><div class="test-author"><div class="test-avatar" aria-hidden="true">J</div><div><div class="test-name">Founder &amp; Director</div><div class="test-role">Jayach Care Caregiver Services, UK</div></div></div></div>
    </div>
  </section>

  <section class="faq-section" id="faq" aria-labelledby="faq-heading">
    <div style="margin-bottom:0"><span class="s-label">FAQ</span><h2 class="s-head" id="faq-heading">Frequently asked <em>questions</em></h2></div>
    <div class="faq-layout">
      <div class="faq-sidebar reveal"><h3>Still have questions?</h3><p>Can't find the answer you're looking for? Send us a message and we'll get back to you within one business day.</p><a href="mailto:letstalk@i2medier.com" class="faq-contact-link">Email Us →</a></div>
      <div class="faq-list reveal">
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq1">How long does it take to build a website with i2Medier?<span class="faq-icon" aria-hidden="true">+</span></button><div class="faq-a" id="faq1">Project timelines vary by scope. A standard WordPress website typically takes 3–5 weeks. Custom Laravel applications range from 6–12 weeks depending on the complexity of features and integrations required.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq2">Do you work with clients outside Nigeria?<span class="faq-icon" aria-hidden="true">+</span></button><div class="faq-a" id="faq2">Yes. We work with clients across Nigeria, the United Kingdom, the United States, Canada, and beyond. Our remote workflow is fully optimised for international projects.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq3">What platforms do you build on?<span class="faq-icon" aria-hidden="true">+</span></button><div class="faq-a" id="faq3">We primarily build on WordPress and Laravel. For simpler landing pages and microsites we also work in plain HTML/CSS/JavaScript, and for larger product companies we can deliver in Next.js or React.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq4">Can you redesign or improve my existing website?<span class="faq-icon" aria-hidden="true">+</span></button><div class="faq-a" id="faq4">Absolutely. We can migrate your existing content, improve performance, modernise the design, and rebuild on a more scalable platform — all without disrupting your live site.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq5">Do you offer ongoing maintenance after launch?<span class="faq-icon" aria-hidden="true">+</span></button><div class="faq-a" id="faq5">Yes. We offer monthly maintenance plans covering software updates, security monitoring, daily backups, uptime monitoring, and priority technical support.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq6">How much does a website cost?<span class="faq-icon" aria-hidden="true">+</span></button><div class="faq-a" id="faq6">Pricing depends on project type, number of pages, custom features, integrations, and timeline. Simple brochure websites start from ₦350,000, while application projects are scoped and quoted individually.</div></div>
      </div>
    </div>
  </section>

  <section class="cta-band" id="contact" aria-labelledby="cta-heading">
    <h2 id="cta-heading">Ready to build something exceptional?</h2>
    <p>Tell us what you're working on and we will get back to you with a free, detailed proposal within 24 hours, with no commitment required.</p>
    <a href="{{ route('site.start', ['services' => 'webdesign', 'source_page' => 'service-web-design', 'source_label' => 'Web Design Service Page']) }}" class="btn-dark">Start Your Project →</a>
  </section>
</div>
@endsection
