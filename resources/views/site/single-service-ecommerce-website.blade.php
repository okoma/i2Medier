@extends('public.layouts.app')

@section('title', 'E-Commerce Website Development Services | i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/ecommerce-website.css')
@endpush

@push('scripts')
<script>
// Scroll reveal
const obs = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      const siblings = [...e.target.parentElement.children].filter(c => c.classList.contains('reveal'));
      const idx = siblings.indexOf(e.target);
      e.target.style.transitionDelay = (idx * 0.08) + 's';
      e.target.classList.add('visible');
      obs.unobserve(e.target);
    }
  });
}, { threshold: 0.08 });
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

// Counters
function animateCounter(el) {
  const target = parseInt(el.dataset.target);
  const step = target / (1800 / 16);
  let cur = 0;
  const t = setInterval(() => {
    cur += step;
    if (cur >= target) { cur = target; clearInterval(t); }
    el.textContent = Math.floor(cur);
  }, 16);
}
const cObs = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { animateCounter(e.target); cObs.unobserve(e.target); } });
}, { threshold: 0.5 });
document.querySelectorAll('.counter').forEach(el => cObs.observe(el));

// FAQ
document.querySelectorAll('.faq-q').forEach(btn => {
  btn.addEventListener('click', () => {
    const id = btn.getAttribute('aria-controls');
    const answer = document.getElementById(id);
    const isOpen = btn.getAttribute('aria-expanded') === 'true';
    document.querySelectorAll('.faq-q').forEach(b => {
      b.setAttribute('aria-expanded', 'false');
      const a = document.getElementById(b.getAttribute('aria-controls'));
      if (a) a.classList.remove('open');
    });
    if (!isOpen) {
      btn.setAttribute('aria-expanded', 'true');
      answer.classList.add('open');
    }
  });
});

// Process nav active state
const psCards = document.querySelectorAll('.ps-card');
const pnavItems = document.querySelectorAll('.pnav-item');
if (psCards.length) {
  const psObs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        const id = e.target.id;
        pnavItems.forEach(n => { n.classList.toggle('active', n.getAttribute('href') === '#' + id); });
      }
    });
  }, { threshold: 0.5 });
  psCards.forEach(c => psObs.observe(c));
}
</script>
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
      <span aria-current="page">E-Commerce Website</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> E-Commerce Website Development</span>
    <h1>Online stores built<br>around the platform<br>that fits you <em>best</em></h1>
    <p class="hero-sub">We design and build premium e-commerce experiences around the right foundation for your business — WooCommerce, Shopify, or a custom Laravel store. Our focus is not just getting products online, but structuring storefronts, checkout flows, and operations so the business can grow after launch.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-white">Discuss Your Store →</a>
      <a href="{{ route('portfolio.index') }}" class="btn-ghost">See Our Work</a>
    </div>
    <div class="hero-pills">
      <span class="hero-pill"><span class="hero-pill-dot"></span> WooCommerce</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Shopify</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Custom Laravel</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Paystack / Stripe</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> SEO-Ready</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Mobile-First</span>
    </div>
  </div>

  <!-- Store mock -->
  <div class="hero-right">
    <div class="store-wrap">
      <div class="float-badge">Store Live · Orders Open</div>
      <div class="store-mock">
        <div class="store-bar">
          <div class="s-dot" style="background:#ff5f57"></div>
          <div class="s-dot" style="background:#febc2e"></div>
          <div class="s-dot" style="background:#28c840"></div>
          <span class="s-url">mystore.com · Secure Checkout</span>
        </div>
        <div class="store-body">
          <div class="s-header">
            <div class="s-brand">PremiumStore</div>
            <div class="s-cart">
              <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" fill="none" stroke-width="2"><circle cx="9" cy="20" r="1"></circle><circle cx="17" cy="20" r="1"></circle><path d="M3 4h2l2.4 10.5a1 1 0 0 0 1 .8H18a1 1 0 0 0 1-.8L21 8H7"></path></svg>
              3 items · ₦47,000
            </div>
          </div>
          <div class="s-products">
            <div class="s-product">
              <div class="s-product-img" style="background:rgba(5,150,105,.08)">👗</div>
              <div class="s-product-info">
                <div class="s-product-name">Premium Dress</div>
                <div class="s-product-price">₦18,500</div>
                <div class="s-product-btn">Add to cart</div>
              </div>
            </div>
            <div class="s-product">
              <div class="s-product-img" style="background:rgba(99,102,241,.08)">👟</div>
              <div class="s-product-info">
                <div class="s-product-name">Sneaker Collection</div>
                <div class="s-product-price">₦32,000</div>
                <div class="s-product-btn">Add to cart</div>
              </div>
            </div>
            <div class="s-product">
              <div class="s-product-img" style="background:rgba(200,169,110,.08)">💼</div>
              <div class="s-product-info">
                <div class="s-product-name">Leather Bag</div>
                <div class="s-product-price">₦45,000</div>
                <div class="s-product-btn">Add to cart</div>
              </div>
            </div>
            <div class="s-product">
              <div class="s-product-img" style="background:rgba(249,115,22,.08)">⌚</div>
              <div class="s-product-info">
                <div class="s-product-name">Luxury Watch</div>
                <div class="s-product-price">₦120,000</div>
                <div class="s-product-btn">Add to cart</div>
              </div>
            </div>
          </div>
          <div class="s-stats">
            <div class="s-stat">
              <div class="s-stat-val green">₦2.1M</div>
              <div class="s-stat-lbl">This Month</div>
            </div>
            <div class="s-stat">
              <div class="s-stat-val">348</div>
              <div class="s-stat-lbl">Orders</div>
            </div>
            <div class="s-stat">
              <div class="s-stat-val green">94%</div>
              <div class="s-stat-lbl">Fulfilled</div>
            </div>
          </div>
          <div class="s-order">
            <div>
              <div class="s-order-info">New Order · Adaeze O. · ₦47,000</div>
              <div class="s-order-id">#ORD-20847 · Paystack · 2 mins ago</div>
            </div>
            <span class="s-order-badge">Paid ✓</span>
          </div>
        </div>
      </div>
      <div class="float-badge2">₦2.1M revenue this month · 348 orders</div>
    </div>
  </div>
</header>

<!-- STATS BAND -->
<div class="stats-band">
  <div class="stats-grid">
    <div class="stat-item reveal"><div class="stat-num"><span class="counter" data-target="20">0</span><span>+</span></div><div class="stat-lbl">Stores Launched</div></div>
    <div class="stat-item reveal"><div class="stat-num">3–<span>8</span></div><div class="stat-lbl">Week Typical Timeline</div></div>
    <div class="stat-item reveal"><div class="stat-num">from <span>₦600k</span></div><div class="stat-lbl">Starting Price</div></div>
    <div class="stat-item reveal"><div class="stat-num" style="font-size:1.6rem">3 <span>Platforms</span></div><div class="stat-lbl">WooCommerce, Shopify, Laravel</div></div>
  </div>
</div>

<!-- ═══ WHAT WE BUILD ═══ -->
<section class="build-section" aria-labelledby="build-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="build-heading">E-commerce for every<br><em>type of seller</em></h2>
    </div>
    <p>Not every online store is the same. A fashion brand selling high-ticket products has completely different requirements from a business selling hundreds of SKUs or a marketplace connecting multiple vendors. We build for the specific model — not a generic template applied to every client.</p>
  </div>
  <div class="build-grid">

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg></div>
      <h3 class="build-title">Fashion & Lifestyle Stores</h3>
      <p class="build-desc">Visually-led stores for fashion, beauty, and lifestyle brands where product presentation and brand identity drive conversions. Collection pages, lookbooks, size guides, and social proof are designed for premium feel at every touchpoint.</p>
      <div class="build-tags"><span class="build-tag">Product Photography</span><span class="build-tag">Collections</span><span class="build-tag">Lookbooks</span><span class="build-tag">Reviews</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"></rect><path d="M8 21h8M12 17v4"></path></svg></div>
      <h3 class="build-title">Multi-Product Catalogues</h3>
      <p class="build-desc">Stores with large, structured inventories — hundreds or thousands of SKUs across multiple categories. We build with proper category hierarchy, advanced filtering, search, stock management, and bulk import tools so the store stays manageable as it scales.</p>
      <div class="build-tags"><span class="build-tag">Advanced Filters</span><span class="build-tag">Search</span><span class="build-tag">Stock Sync</span><span class="build-tag">Bulk Import</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l8 4.5v9L12 21l-8-4.5v-9L12 2z"></path><path d="M12 21v-9M20 6.5l-8 4.5-8-4.5"></path></svg></div>
      <h3 class="build-title">Digital Products & Downloads</h3>
      <p class="build-desc">Stores selling ebooks, courses, templates, software, or digital assets. We build with secure file delivery, licence key generation, download limit controls, and subscription access gates where needed.</p>
      <div class="build-tags"><span class="build-tag">Secure Downloads</span><span class="build-tag">Licence Keys</span><span class="build-tag">Access Control</span><span class="build-tag">Subscriptions</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div>
      <h3 class="build-title">Multi-Vendor Marketplaces</h3>
      <p class="build-desc">Platforms where multiple sellers list their products. We handle vendor onboarding, individual product management per seller, commission splits, payout management, and the admin oversight needed to keep a marketplace operating cleanly.</p>
      <div class="build-tags"><span class="build-tag">Vendor Onboarding</span><span class="build-tag">Commissions</span><span class="build-tag">Payouts</span><span class="build-tag">Admin Oversight</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20V8l8-4 8 4v12M4 8h16M10 12h4M10 16h4M10 20h4"></path></svg></div>
      <h3 class="build-title">B2B & Wholesale Stores</h3>
      <p class="build-desc">Stores where buyers are businesses — different pricing tiers by account, minimum order quantities, invoice-based payment, bulk ordering tools, and account management for repeat buyers are all part of the B2B commerce experience.</p>
      <div class="build-tags"><span class="build-tag">Tiered Pricing</span><span class="build-tag">MOQs</span><span class="build-tag">Invoice Payment</span><span class="build-tag">Account Mgmt</span></div>
    </div>

    <div class="build-card reveal">
      <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v1M12 20v1M4.2 4.2l.7.7M18.4 18.4l.7.7M3 12h1M20 12h1M4.2 19.8l.7-.7M18.4 5.6l.7-.7"></path><circle cx="12" cy="12" r="5"></circle></svg></div>
      <h3 class="build-title">Subscription & Membership Stores</h3>
      <p class="build-desc">Stores where customers pay recurring fees for product boxes, exclusive access, or ongoing services. We build subscription management, recurring billing, skip/pause/cancel flows, and the member dashboard so the model is self-managing after launch.</p>
      <div class="build-tags"><span class="build-tag">Recurring Billing</span><span class="build-tag">Member Portals</span><span class="build-tag">Pause / Cancel</span><span class="build-tag">Product Boxes</span></div>
    </div>

  </div>
</section>

<!-- ═══ PLATFORM GUIDE ═══ -->
<section aria-labelledby="platform-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Choosing Your Platform</span>
      <h2 class="s-head" id="platform-heading">WooCommerce, Shopify,<br>or <em>custom-built</em>?</h2>
    </div>
    <p>Platform fit is the single most important early decision in an e-commerce project. The wrong choice creates limitations you will be working around for years. We make this recommendation during discovery, based on your catalogue complexity, growth goals, operational needs, and budget — not based on what is easiest for us to build.</p>
  </div>
  <div class="platform-grid">

    <div class="platform-card reveal">
      <div class="platform-head">
        <span class="platform-badge">WordPress-Powered</span>
        <div class="platform-name">WooCommerce</div>
        <div class="platform-desc">The most flexible open-source commerce platform — ideal when content, SEO, and editorial control matter alongside selling.</div>
      </div>
      <div class="platform-body">
        <div class="platform-best">Best For</div>
        <ul class="platform-list">
          <li class="platform-li">Stores where blog content and SEO drive most traffic</li>
          <li class="platform-li">Businesses that want full server control and no monthly platform fees</li>
          <li class="platform-li">Complex product types not supported by hosted platforms</li>
          <li class="platform-li">Multi-currency and multi-language requirements</li>
          <li class="platform-li">Brands already on WordPress wanting to add a store</li>
          <li class="platform-li">Starting from ₦600k for a standard build</li>
        </ul>
      </div>
    </div>

    <div class="platform-card recommended reveal">
      <div class="platform-head">
        <span class="platform-badge">Hosted Platform</span>
        <div class="platform-name">Shopify</div>
        <div class="platform-desc">A fully-managed, reliable commerce platform that handles hosting, security, and updates — so you focus entirely on selling.</div>
      </div>
      <div class="platform-body">
        <div class="platform-best">Best For</div>
        <ul class="platform-list">
          <li class="platform-li">Brands that want fast time-to-market and minimal technical maintenance</li>
          <li class="platform-li">Stores with straightforward catalogues and standard checkout flows</li>
          <li class="platform-li">International selling with built-in multi-currency and localisation</li>
          <li class="platform-li">Social and marketplace selling across Instagram, TikTok, and Amazon</li>
          <li class="platform-li">Teams that want a reliable platform without server management</li>
          <li class="platform-li">Starting from ₦700k for a custom theme build</li>
        </ul>
      </div>
    </div>

    <div class="platform-card reveal">
      <div class="platform-head">
        <span class="platform-badge">Fully Custom</span>
        <div class="platform-name">Custom Laravel</div>
        <div class="platform-desc">A bespoke e-commerce platform built from scratch when standard platforms cannot accommodate your business model or workflows.</div>
      </div>
      <div class="platform-body">
        <div class="platform-best">Best For</div>
        <ul class="platform-list">
          <li class="platform-li">Marketplaces with multiple sellers, commission structures, or escrow</li>
          <li class="platform-li">Stores with complex pricing logic, custom checkout flows, or ERP integrations</li>
          <li class="platform-li">B2B commerce with tiered pricing, credit accounts, and approval workflows</li>
          <li class="platform-li">Subscription boxes or membership-gated commerce models</li>
          <li class="platform-li">When you want to own the entire platform — no recurring SaaS fees</li>
          <li class="platform-li">Starting from ₦1.5M for a full custom build</li>
        </ul>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section aria-labelledby="process-heading">
  <div class="two-col-intro" style="margin-bottom:3rem">
    <div>
      <span class="s-label">How We Work</span>
      <h2 class="s-head" id="process-heading">Our e-commerce <em>delivery process</em></h2>
    </div>
    <p>A premium online store is not a template installation. It is a structured commercial experience — designed to reduce hesitation at every step, present products in a way that earns trust, and handle the operational realities of selling online at volume. Our process reflects that.</p>
  </div>
  <div class="process-layout">
    <div class="process-nav reveal">
      <h3>Five phases.<br>Zero guesswork.</h3>
      <p>Every deliverable is agreed before work begins. You always know what is being built, what it costs, and when it will be ready.</p>
      <ul class="process-nav-list">
        <li><a href="#ps1" class="pnav-item active"><span class="pnav-dot"></span>Discovery & Platform Fit</a></li>
        <li><a href="#ps2" class="pnav-item"><span class="pnav-dot"></span>UX & Design</a></li>
        <li><a href="#ps3" class="pnav-item"><span class="pnav-dot"></span>Build & Configure</a></li>
        <li><a href="#ps4" class="pnav-item"><span class="pnav-dot"></span>Products & Payments</a></li>
        <li><a href="#ps5" class="pnav-item"><span class="pnav-dot"></span>Launch & Handover</a></li>
      </ul>
    </div>
    <div class="process-steps">

      <div class="ps-card reveal" id="ps1">
        <div class="ps-card-head">
          <div class="ps-card-num gold">01</div>
          <div class="ps-card-title">Discovery & Platform Selection</div>
          <span class="ps-card-duration">Week 1</span>
        </div>
        <div class="ps-card-body">
          <p>We begin by understanding your products, your customers, your operations, and your growth goals. From there we map the catalogue structure, required integrations, payment flows, shipping logic, and post-launch operational needs. Platform selection is made based on this analysis — not on what is quickest to configure.</p>
          <p>By the end of discovery you have a written scope document covering the agreed platform, feature list, catalogue structure, integration map, and milestone timeline. Scope changes after sign-off are documented and priced transparently.</p>
          <div class="ps-deliverables"><span class="ps-del">Platform Recommendation</span><span class="ps-del">Scope Document</span><span class="ps-del">Integration Map</span><span class="ps-del">Catalogue Structure</span><span class="ps-del">Milestone Timeline</span></div>
        </div>
      </div>

      <div class="ps-card reveal" id="ps2">
        <div class="ps-card-head">
          <div class="ps-card-num">02</div>
          <div class="ps-card-title">UX Strategy & Store Design</div>
          <span class="ps-card-duration">Week 1–3</span>
        </div>
        <div class="ps-card-body">
          <p>We design every key page of the store in Figma before development begins — homepage, collection pages, product pages, cart, checkout, account pages, and any custom landing pages. For e-commerce in particular, product page design is the highest-leverage work in the entire project: the way a product is presented, trusted, and purchased determines conversion more than any other factor.</p>
          <p>Interactive prototypes let you experience the shopping journey before a line of code is written. Design sign-off gates the build — we do not build what has not been approved.</p>
          <div class="ps-deliverables"><span class="ps-del">Homepage Design</span><span class="ps-del">Product Page</span><span class="ps-del">Collection Pages</span><span class="ps-del">Checkout Flow</span><span class="ps-del">Mobile Layouts</span></div>
        </div>
      </div>

      <div class="ps-card reveal" id="ps3">
        <div class="ps-card-head">
          <div class="ps-card-num">03</div>
          <div class="ps-card-title">Store Build & Configuration</div>
          <span class="ps-card-duration">Week 3–6</span>
        </div>
        <div class="ps-card-body">
          <p>Development follows the approved designs precisely. For WooCommerce, we build a custom theme from scratch — no page-builder templates, no unnecessary plugins. For Shopify, we build a custom theme using the Liquid templating language. For custom Laravel builds, we build the full commerce engine, admin panel, and storefront from the ground up.</p>
          <p>All work is built on a staging environment you have continuous access to. You can review, test, and leave feedback at any stage of the build — there are no surprise reveals on launch day.</p>
          <div class="ps-deliverables"><span class="ps-del">Custom Theme</span><span class="ps-del">Staging Environment</span><span class="ps-del">Navigation Structure</span><span class="ps-del">Page Templates</span><span class="ps-del">Mobile Optimisation</span></div>
        </div>
      </div>

      <div class="ps-card reveal" id="ps4">
        <div class="ps-card-head">
          <div class="ps-card-num">04</div>
          <div class="ps-card-title">Products, Payments & Operations</div>
          <span class="ps-card-duration">Week 5–7</span>
        </div>
        <div class="ps-card-body">
          <p>We configure the payment gateway — Paystack for naira transactions, Stripe for international, or both. Shipping zones, rates, and fulfilment rules are set up according to your logistics model. If you are migrating from an existing store, we handle product data migration cleanly so your catalogue transfers without errors or data loss.</p>
          <p>Email notifications are configured for every transactional event — order confirmation, shipping, delivery, return, and review requests. All operational settings are tested against real transactions in a sandbox before any live payment processing is enabled.</p>
          <div class="ps-deliverables"><span class="ps-del">Paystack / Stripe</span><span class="ps-del">Shipping Logic</span><span class="ps-del">Product Migration</span><span class="ps-del">Email Notifications</span><span class="ps-del">Payment Testing</span></div>
        </div>
      </div>

      <div class="ps-card reveal" id="ps5">
        <div class="ps-card-head">
          <div class="ps-card-num">05</div>
          <div class="ps-card-title">Launch & Post-launch Handover</div>
          <span class="ps-card-duration">Week 7–8</span>
        </div>
        <div class="ps-card-body">
          <p>Before launch, we run a full pre-launch checklist — SSL, redirects, page speed, mobile testing, payment processing, order email flow, and SEO fundamentals. Launch is coordinated to minimise disruption and is monitored closely in the first 48 hours to catch anything that behaves unexpectedly with live traffic.</p>
          <p>On handover you receive full admin access, a store management guide tailored to your platform, and a 60-day post-launch support window covering any issues, adjustments, or minor enhancements identified after going live.</p>
          <div class="ps-deliverables"><span class="ps-del">Pre-launch QA</span><span class="ps-del">Speed Optimisation</span><span class="ps-del">SEO Basics</span><span class="ps-del">Admin Training</span><span class="ps-del">60-Day Support</span></div>
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
      <h2 class="s-head" id="tech-heading">The platforms and tools<br>behind our <em>store builds</em></h2>
    </div>
    <p>Every platform and plugin in our e-commerce stack is chosen for long-term reliability, maintainability, and performance. We do not use bloated page builders, experimental themes, or untested plugin combinations that cause maintenance headaches six months after launch.</p>
  </div>
  <div class="tech-grid-outer reveal">

    <div class="tech-group">
      <div class="tech-group-head">
        <div class="tech-group-head-title">WooCommerce Stack</div>
        <div class="tech-group-head-sub">WordPress-powered stores</div>
      </div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M7.5 8.5l2.5 7 2-5 2 5 2.5-7"></path></svg></div><div class="tech-info"><div class="tech-name">WordPress + WooCommerce</div><div class="tech-sub">Core CMS and commerce engine</div></div><span class="tech-badge tb-core">Core</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 3h4v4a2 2 0 1 1 0 4v4h-4a2 2 0 1 1-4 0H2v-4h4a2 2 0 1 0 4 0V7z"></path></svg></div><div class="tech-info"><div class="tech-name">Custom Theme (No Builders)</div><div class="tech-sub">Hand-coded, performant themes</div></div><span class="tech-badge tb-store">Theme</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 3h16a1 1 0 0 1 1 1v7a9 9 0 0 1-18 0V4a1 1 0 0 1 1-1z"></path></svg></div><div class="tech-info"><div class="tech-name">ACF + Custom Post Types</div><div class="tech-sub">Structured product data management</div></div><span class="tech-badge tb-store">Data</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div><div class="tech-info"><div class="tech-name">Yoast / Rank Math SEO</div><div class="tech-sub">Search optimisation baseline</div></div><span class="tech-badge tb-seo">SEO</span></div>
    </div>

    <div class="tech-group">
      <div class="tech-group-head">
        <div class="tech-group-head-title">Shopify Stack</div>
        <div class="tech-group-head-sub">Hosted commerce platform</div>
      </div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path></svg></div><div class="tech-info"><div class="tech-name">Shopify (Online Store 2.0)</div><div class="tech-sub">Core hosted commerce platform</div></div><span class="tech-badge tb-core">Core</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></div><div class="tech-info"><div class="tech-name">Liquid Theme (Custom Built)</div><div class="tech-sub">Bespoke Shopify theme from scratch</div></div><span class="tech-badge tb-store">Theme</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l8 4.5v9L12 21l-8-4.5v-9L12 2z"></path></svg></div><div class="tech-info"><div class="tech-name">Shopify Metafields</div><div class="tech-sub">Custom product & collection data</div></div><span class="tech-badge tb-store">Data</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18M7 15h4"></path></svg></div><div class="tech-info"><div class="tech-name">Shopify Payments + Apps</div><div class="tech-sub">Native payments & curated app integrations</div></div><span class="tech-badge tb-infra">Payments</span></div>
    </div>

    <div class="tech-group">
      <div class="tech-group-head">
        <div class="tech-group-head-title">Custom Laravel Stack</div>
        <div class="tech-group-head-sub">Fully bespoke stores</div>
      </div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2 4 6v6c0 5 3.4 9.4 8 10 4.6-.6 8-5 8-10V6l-8-4Z"></path></svg></div><div class="tech-info"><div class="tech-name">Laravel 13 + Livewire</div><div class="tech-sub">Full custom commerce engine</div></div><span class="tech-badge tb-core">Core</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="14" rx="2"></rect><path d="M8 20h8M12 18v2"></path></svg></div><div class="tech-info"><div class="tech-name">Filament Admin Panel</div><div class="tech-sub">Order, product, and customer management</div></div><span class="tech-badge tb-store">Admin</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><ellipse cx="12" cy="5" rx="7" ry="3"></ellipse><path d="M5 5v7c0 1.7 3.1 3 7 3s7-1.3 7-3V5M5 12v7c0 1.7 3.1 3 7 3s7-1.3 7-3v-7"></path></svg></div><div class="tech-info"><div class="tech-name">MySQL + Redis</div><div class="tech-sub">Database and caching layer</div></div><span class="tech-badge tb-core">Data</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19c2-3 5-5 8-6l-2-2c1-4 4-7 8-8-1 4-4 7-8 8l2 2c-1 3-3 6-6 8l-2-2-2 2v-4Z"></path></svg></div><div class="tech-info"><div class="tech-name">GitHub Actions CI/CD</div><div class="tech-sub">Zero-downtime deployments</div></div><span class="tech-badge tb-infra">DevOps</span></div>
    </div>

    <div class="tech-group">
      <div class="tech-group-head">
        <div class="tech-group-head-title">Payments & Operations</div>
        <div class="tech-group-head-sub">Across all platforms</div>
      </div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18M7 15h4"></path></svg></div><div class="tech-info"><div class="tech-name">Paystack</div><div class="tech-sub">Nigerian naira card & bank transfer</div></div><span class="tech-badge tb-infra">Payment</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18M7 15h4"></path></svg></div><div class="tech-info"><div class="tech-name">Stripe</div><div class="tech-sub">International cards & subscriptions</div></div><span class="tech-badge tb-infra">Payment</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg></div><div class="tech-info"><div class="tech-name">Transactional Email</div><div class="tech-sub">Order, shipping & marketing flows</div></div><span class="tech-badge tb-store">Email</span></div>
      <div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 8l-9-5-9 5 9 5 9-5z"></path><path d="M3 8v8l9 5 9-5V8"></path></svg></div><div class="tech-info"><div class="tech-name">DHL / GIG / Custom Shipping</div><div class="tech-sub">Shipping rate & fulfilment integrations</div></div><span class="tech-badge tb-store">Logistics</span></div>
    </div>

  </div>
</section>

<!-- ═══ FEATURES ═══ -->
<section aria-labelledby="features-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">What You Get</span>
      <h2 class="s-head" id="features-heading">Everything included<br>in every <em>store build</em></h2>
    </div>
    <p>These are standard deliverables across all our e-commerce projects — not optional add-ons charged separately. We believe a properly built online store should include everything needed to sell and operate from day one.</p>
  </div>
  <div class="features-grid reveal">
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20V8l8-4 8 4v12M4 8h16M10 12h4M10 16h4"></path></svg></div><div class="feat-body"><h4>Platform-Fit Recommendation</h4><p>We recommend the right commerce stack based on your catalogue, business model, and growth trajectory — not based on what is easiest to configure. The right platform decision saves years of frustration.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 6h10M5 10h14M7 14h10M10 18h4"></path></svg></div><div class="feat-body"><h4>Conversion-Focused Product Pages</h4><p>Product presentation, image layout, trust signals, social proof, urgency cues, and CTA placement are all designed to reduce hesitation and help visitors move confidently toward checkout.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18M8 15h3"></path></svg></div><div class="feat-body"><h4>Payment Gateway Integration</h4><p>Paystack, Stripe, or both — integrated with proper webhook handling, order status synchronisation, and idempotent payment processing so the store handles edge cases without creating ghost orders.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7h18M7 7v10M12 7v10M17 7v10M5 17h14"></path></svg></div><div class="feat-body"><h4>Catalogue & Inventory Structure</h4><p>Product variants, categories, collections, filters, and stock behaviour are configured so the store stays manageable for your team as the catalogue grows — not just during the initial upload.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="2" width="10" height="20" rx="2"></rect><line x1="11" y1="18" x2="13" y2="18"></line></svg></div><div class="feat-body"><h4>Mobile-First Design</h4><p>Every layout is built mobile-first — because most of your customers will see the store on their phone before they ever see it on a desktop. Touch targets, image sizes, and checkout flow are all optimised for mobile.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div><div class="feat-body"><h4>SEO Foundations</h4><p>Clean URLs, proper canonical tags, sitemap generation, structured product data markup, optimised page titles and meta descriptions, and Core Web Vitals attention — all part of the standard build.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 12h12M12 6l6 6-6 6"></path></svg></div><div class="feat-body"><h4>Shipping & Fulfilment Configuration</h4><p>Shipping zones, flat rates, weight-based rates, free shipping thresholds, and logistics provider integrations are set up so orders process cleanly without manual intervention for each sale.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg></div><div class="feat-body"><h4>Transactional Email System</h4><p>Order confirmation, shipping notification, delivery confirmation, abandoned cart recovery, and return request emails — all configured and tested before launch so customers are informed at every stage.</p></div></div>
  </div>
</section>

<!-- ═══ PACKAGES ═══ -->
<section class="pkg-section" aria-labelledby="pkg-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pkg-heading">E-commerce packages<br>by <em>store scale</em></h2>
    </div>
    <p>All e-commerce projects are scoped and quoted individually after a free discovery session. The ranges below reflect typical pricing across store types and platforms — your exact quote will be itemised and transparent before any work begins.</p>
  </div>
  <div class="pkg-grid">

    <div class="pkg-card reveal">
      <div class="pkg-head">
        <div class="pkg-badge">Starter Store</div>
        <div class="pkg-name">Essential</div>
        <p class="pkg-tagline">A clean, well-built online store for brands launching their first e-commerce channel.</p>
        <div class="pkg-price">₦600k <sub>starting from</sub></div>
      </div>
      <div class="pkg-body">
        <div class="pkg-feat">Up to 50 products configured</div>
        <div class="pkg-feat">Custom theme (no page builders)</div>
        <div class="pkg-feat">Single payment gateway</div>
        <div class="pkg-feat">Shipping zone configuration</div>
        <div class="pkg-feat">Mobile-optimised design</div>
        <div class="pkg-feat">SEO foundations</div>
        <div class="pkg-feat">Order email notifications</div>
        <div class="pkg-feat">30-day post-launch support</div>
        <div class="pkg-feat no">Custom checkout flow</div>
        <div class="pkg-feat no">Advanced analytics</div>
      </div>
      <div class="pkg-foot"><a href="#contact" class="pkg-btn outline">Get a Quote →</a></div>
    </div>

    <div class="pkg-card featured reveal">
      <div class="pkg-head">
        <div class="pkg-badge">Most Common Scope</div>
        <div class="pkg-name">Premium</div>
        <p class="pkg-tagline">A fully-featured store with custom checkout, multi-gateway payments, and full operational setup.</p>
        <div class="pkg-price">₦1.2M–3M <sub>based on scope</sub></div>
      </div>
      <div class="pkg-body">
        <div class="pkg-feat">Unlimited products & variants</div>
        <div class="pkg-feat">Custom checkout experience</div>
        <div class="pkg-feat">Paystack + Stripe integration</div>
        <div class="pkg-feat">Advanced filtering & search</div>
        <div class="pkg-feat">Upsells & cross-sells</div>
        <div class="pkg-feat">Abandoned cart recovery</div>
        <div class="pkg-feat">Wishlist & product comparison</div>
        <div class="pkg-feat">Google Analytics 4 integration</div>
        <div class="pkg-feat">Reviews & trust signals</div>
        <div class="pkg-feat">60-day post-launch support</div>
      </div>
      <div class="pkg-foot" style="padding-top:.25rem"><a href="#contact" class="pkg-btn gold">Request a Proposal →</a></div>
    </div>

    <div class="pkg-card reveal">
      <div class="pkg-head">
        <div class="pkg-badge">Custom Build</div>
        <div class="pkg-name">Enterprise</div>
        <p class="pkg-tagline">Marketplaces, B2B platforms, subscription commerce, and fully custom Laravel stores.</p>
        <div class="pkg-price">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="pkg-body">
        <div class="pkg-feat">Multi-vendor marketplace</div>
        <div class="pkg-feat">Commission & payout system</div>
        <div class="pkg-feat">B2B pricing & accounts</div>
        <div class="pkg-feat">Subscription box management</div>
        <div class="pkg-feat">ERP / Inventory integration</div>
        <div class="pkg-feat">Custom fulfilment workflows</div>
        <div class="pkg-feat">Advanced reporting & exports</div>
        <div class="pkg-feat">Load testing & optimisation</div>
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
  <h2 class="s-head" id="test-heading">What clients say about<br>our <em>store builds</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars">★★★★★</div>
      <p class="test-quote">"We had an existing WooCommerce store that was generating revenue but looked terrible and was impossible to manage. i2Medier rebuilt it properly — the conversion rate went up 34% in the first month and our team can now manage products without calling a developer."</p>
      <div class="test-author">
        <div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z"></path><path d="M5 20a7 7 0 0 1 14 0"></path></svg></div>
        <div><div class="test-name">Founder</div><div class="test-role">Fashion E-Commerce Brand</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars">★★★★★</div>
      <p class="test-quote">"The platform fit conversation was the most valuable part. We were about to build on Shopify and they showed us exactly why WooCommerce was the better choice for our content-driven model. That saved us thousands in Shopify app subscriptions every year."</p>
      <div class="test-author">
        <div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z"></path><path d="M5 20a7 7 0 0 1 14 0"></path></svg></div>
        <div><div class="test-name">CEO</div><div class="test-role">Wellness Products Store</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars">★★★★★</div>
      <p class="test-quote">"Our custom Laravel marketplace handles commissions, vendor payouts, and escrow across hundreds of transactions monthly. i2Medier understood the business model from day one and built exactly what we needed — no compromises around a template that wasn't designed for us."</p>
      <div class="test-author">
        <div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Z"></path><path d="M5 20a7 7 0 0 1 14 0"></path></svg></div>
        <div><div class="test-name">Co-Founder</div><div class="test-role">Multi-Vendor Marketplace</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FAQ ═══ -->
<section aria-labelledby="faq-heading">
  <span class="s-label">FAQ</span>
  <h2 class="s-head" id="faq-heading">E-commerce questions,<br><em>answered plainly</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Still have questions?</h3>
      <p>If your question is not answered below, email us. We will give you a direct answer with no sales pressure and no obligation.</p>
      <a href="mailto:hello@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">Which platform should I choose — WooCommerce, Shopify, or custom?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f1">It depends on your business model. WooCommerce is the right choice when content and SEO drive your traffic, when you want full server control, or when you need complex product types. Shopify is better when you want a reliable hosted platform with minimal technical maintenance and you are focused on selling standard products internationally. Custom Laravel is right when your model has unique requirements — marketplaces, B2B accounts, subscriptions — that standard platforms cannot handle cleanly. We make this recommendation during discovery after understanding your specific situation.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Do you integrate Paystack for Nigerian stores?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f2">Yes — Paystack is our primary payment gateway for naira-denominated stores and we integrate it across WooCommerce, Shopify, and custom Laravel builds. We also integrate Stripe for international payments and Flutterwave when needed. All integrations include proper webhook handling, order status synchronisation, and testing against the payment sandbox before going live. We do not consider a payment integration complete until we have processed a full end-to-end test transaction.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">How long does it take to build an online store?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f3">A standard WooCommerce or Shopify store typically takes 4–6 weeks from design sign-off to launch. Stores with larger catalogues, custom checkout flows, or complex configurations take 6–8 weeks. Custom Laravel e-commerce platforms with unique business logic — marketplaces, B2B systems, subscription commerce — take 10–16 weeks depending on scope. We provide a detailed, milestone-by-milestone timeline during discovery. You will know exactly when each phase starts and ends before any work begins.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Can you migrate products from an existing store?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f4">Yes — product data migration is included where needed. We handle CSV imports, image transfers, variant mapping, category restructuring, and order history migration where the target platform supports it. For large catalogues we build custom migration scripts to ensure data integrity and catch errors before they reach the live store. We also handle redirects from the old store to the new URLs to preserve any search equity your products have built up.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Will the store be manageable by my team after handover?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f5">Yes — that is a core design goal for every store we build. We do not build stores that require a developer to add a product, change a price, or run a sale. On handover you receive a custom store management guide covering the tasks your team will perform most frequently, a walkthrough session, and a 30 to 60-day support window to handle any questions that come up during day-to-day use.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">How much does an e-commerce website cost?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button>
        <div class="faq-a" id="f6">Standard WooCommerce and Shopify stores start from ₦600,000. Full-featured stores with custom checkout, multi-gateway payments, and complete operational setup range from ₦1.2M to ₦3M. Custom Laravel stores — marketplaces, B2B platforms, and subscription commerce — start from ₦1.5M and are quoted based on scope. All projects receive a written, itemised proposal after a free discovery call. You know exactly what you are paying for before any commitment is made.</div>
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
      <div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M7.5 8.5l2.5 7 2-5 2 5 2.5-7"></path></svg></div>
      <div class="ri-name">WordPress Development</div>
      <p class="ri-desc">Custom WooCommerce builds, premium themes, and WordPress platforms built beyond generic templates.</p>
    </a>
    <a href="{{ route('site.services.ui-ux-design') }}" class="related-item">
      <div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 0-4h-1a2 2 0 0 1 0-4h4a4 4 0 0 0 0-8Z"></path><circle cx="7.5" cy="10.5" r="1"></circle><circle cx="9.5" cy="7.5" r="1"></circle></svg></div>
      <div class="ri-name">UI/UX Design</div>
      <p class="ri-desc">Full store design in Figma — every page and checkout flow designed before any code is written.</p>
    </a>
    <a href="{{ route('site.services.search-optimization') }}" class="related-item">
      <div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div>
      <div class="ri-name">Search Optimisation</div>
      <p class="ri-desc">Product and category SEO, technical fixes, and content strategy to drive organic traffic to your store.</p>
    </a>
    <a href="{{ route('site.services.website-maintenance') }}" class="related-item">
      <div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v6c0 5 3.4 7.9 7 9 3.6-1.1 7-4 7-9V6l-7-3Z"></path></svg></div>
      <div class="ri-name">Maintenance & Support</div>
      <p class="ri-desc">Monthly retainer covering updates, security monitoring, and ongoing store improvements post-launch.</p>
    </a>
  </div>
</section>

<!-- CTA -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build your<br>online store?</h2>
  <p>Tell us about your products and business model and we will send a detailed, itemised proposal within 24 hours — no commitment required.</p>
  <a href="mailto:hello@i2medier.com" class="btn-dark">Start Your Store Project →</a>
</section>

@endsection
