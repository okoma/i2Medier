@extends('public.layouts.app')

@section('title', 'WordPress Web Design & Development Services | i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/wordpress-development.css')
@endpush

@push('scripts')
    @vite('resources/js/public/pages/service-wordpress-development.js')
@endpush

@section('content')
<div class="wp-service-page">
  <header class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-left">
      <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
        <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
        <a href="{{ route('site.services') }}">Services</a><span class="breadcrumb-sep">›</span>
        <span aria-current="page">WordPress Development</span>
      </div>
      <span class="hero-tag"><span class="hero-dot"></span> WordPress Development</span>
      <h1>Custom WordPress<br>websites built to<br><em>perform & rank</em></h1>
      <p class="hero-sub">We build custom WordPress websites from scratch with no page builders and no bloated themes, just clean PHP, fast performance, and an editing experience your team will actually enjoy using.</p>
      <div class="hero-btns">
        <a href="#contact" class="btn-white">Get a Free Quote →</a>
        <a href="{{ route('portfolio.index') }}" class="btn-ghost">See WordPress Projects</a>
      </div>
      <div class="hero-tags-row">
        <span class="hero-badge"><span class="hero-badge-dot"></span> No Page Builders</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> 90+ PageSpeed Score</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> SEO-Ready from Day One</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Full Client Ownership</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> 30-Day Support Included</span>
      </div>
    </div>
    <div class="hero-right">
      <div class="wp-mock-wrap">
        <div class="floating-badge">PageSpeed: 96/100</div>
        <div class="wp-mock">
          <div class="wp-mock-titlebar">
            <div class="wm-dot" style="background:#ff5f57"></div>
            <div class="wm-dot" style="background:#febc2e"></div>
            <div class="wm-dot" style="background:#28c840"></div>
            <div class="wm-url"><span class="wm-lock"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="11" width="14" height="10" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg></span><span class="wm-urltext">yourclient.com/wp-admin</span></div>
          </div>
          <div class="wp-admin-wrap">
            <div class="wp-sidebar">
              <div class="wp-side-item" title="Dashboard"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 11l9-7 9 7"></path><path d="M5 10v10h14V10"></path></svg></div><div class="wp-side-item active" title="Pages"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="3" width="14" height="18" rx="2"></rect><path d="M9 7h6M9 11h6M9 15h4"></path></svg></div><div class="wp-side-item" title="Posts"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 17A2.5 2.5 0 0 0 4 19.5V5a2 2 0 0 1 2-2h14v14"></path></svg></div><div class="wp-side-item" title="Media"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><circle cx="8.5" cy="10" r="1.5"></circle><path d="M21 15l-5-5L5 21"></path></svg></div><div class="wp-side-item" title="WooCommerce"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="20" r="1"></circle><circle cx="18" cy="20" r="1"></circle><path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6H18a2 2 0 0 0 2-1.6L21 8H7"></path></svg></div><div class="wp-side-item" title="Settings"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.2a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.2a1.7 1.7 0 0 0 1.5-1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.8.3h.1a1.7 1.7 0 0 0 1-1.5V3a2 2 0 1 1 4 0v.2a1.7 1.7 0 0 0 1 1.5h.1a1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8v.1a1.7 1.7 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.2a1.7 1.7 0 0 0-1.5 1Z"></path></svg></div><div class="wp-side-item" title="SEO"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-3.5-3.5"></path></svg></div><div class="wp-side-item" title="Users"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg></div>
            </div>
            <div class="wp-content">
              <div class="wp-top-bar"><span>All Pages (12)</span><button class="wp-add-btn">+ Add New</button></div>
              <div class="wp-table">
                <div class="wp-table-head"><span>Title</span><span>Status</span><span>Date</span></div>
                <div class="wp-row"><div class="wp-row-title">Home <span>Edit · View · Duplicate</span></div><span class="wp-status live">Published</span><span class="wp-date">2024-03-15</span></div>
                <div class="wp-row"><div class="wp-row-title">Services <span>Edit · View · Duplicate</span></div><span class="wp-status live">Published</span><span class="wp-date">2024-03-15</span></div>
                <div class="wp-row"><div class="wp-row-title">About Us <span>Edit · View · Duplicate</span></div><span class="wp-status live">Published</span><span class="wp-date">2024-03-14</span></div>
                <div class="wp-row"><div class="wp-row-title">Blog <span>Edit · View · Duplicate</span></div><span class="wp-status live">Published</span><span class="wp-date">2024-03-14</span></div>
                <div class="wp-row"><div class="wp-row-title">Contact <span>Edit · View · Duplicate</span></div><span class="wp-status draft">Draft</span><span class="wp-date">2024-03-13</span></div>
              </div>
            </div>
          </div>
        </div>
        <div class="floating-speed">Load time: 1.2s · 99.9% uptime</div>
      </div>
    </div>
  </header>

  <div class="intro-band">
    <div class="intro-grid">
      <div class="intro-item reveal"><div class="intro-num"><span class="counter" data-target="70">0</span><span>+</span></div><div class="intro-label">WordPress Sites Delivered</div></div>
      <div class="intro-item reveal"><div class="intro-num"><span class="counter" data-target="96">0</span><span style="color:var(--gold)"> avg</span></div><div class="intro-label">PageSpeed Score (Mobile)</div></div>
      <div class="intro-item reveal"><div class="intro-num"><span>from </span><span style="color:var(--gold)">₦350k</span></div><div class="intro-label">Starting Price</div></div>
      <div class="intro-item reveal"><div class="intro-num">3–5<span style="font-size:1.2rem;color:var(--gold)">wks</span></div><div class="intro-label">Typical Delivery Time</div></div>
    </div>
  </div>

  <section class="build-section">
    <div class="build-intro">
      <div><span class="s-label">What We Build</span><h2 class="s-head">WordPress solutions for<br>every <em>type of business</em></h2></div>
      <p class="s-sub">WordPress is not a one-size-fits-all platform, and our builds are not either. From simple company websites to complex membership platforms, we tailor every project to your business goals, your content model, and the people using the site.</p>
    </div>
    <div class="build-grid">
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 21h18"></path><path d="M5 21V7l7-4 7 4v14"></path><path d="M9 21v-6h6v6"></path><path d="M9 10h.01M15 10h.01"></path></svg></div><h3 class="build-title">Corporate & Business Websites</h3><p class="build-desc">Authoritative, conversion-optimised business websites that build trust, communicate your value proposition clearly, and turn visitors into enquiries. Built for companies that take their online presence seriously.</p><div class="build-tags"><span class="build-tag">Custom Theme</span><span class="build-tag">ACF</span><span class="build-tag">Contact Forms</span><span class="build-tag">SEO</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="20" r="1"></circle><circle cx="18" cy="20" r="1"></circle><path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6H18a2 2 0 0 0 2-1.6L21 8H7"></path></svg></div><h3 class="build-title">WooCommerce Stores</h3><p class="build-desc">Custom WooCommerce builds for physical products, digital downloads, subscriptions, and B2B catalogues. Optimised checkout flows, Paystack and Stripe integration, and inventory management — all on a platform you fully own.</p><div class="build-tags"><span class="build-tag">WooCommerce</span><span class="build-tag">Paystack</span><span class="build-tag">Stripe</span><span class="build-tag">Custom Cart</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 17A2.5 2.5 0 0 0 4 19.5V5a2 2 0 0 1 2-2h14v14"></path></svg></div><h3 class="build-title">News & Editorial Platforms</h3><p class="build-desc">High-performance publishing platforms for news outlets, blogs, and content-heavy brands. Designed for editorial workflows, with category architectures that rank well and reading experiences that keep people coming back.</p><div class="build-tags"><span class="build-tag">Custom CPTs</span><span class="build-tag">Editorial CMS</span><span class="build-tag">Ad Slots</span><span class="build-tag">Newsletter</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-6-4.35-6-10a3 3 0 0 1 5-2.24A3 3 0 0 1 16 11c0 5.65-4 10-4 10Z"></path><path d="M12 8v6"></path><path d="M9 11h6"></path></svg></div><h3 class="build-title">Nonprofit & NGO Platforms</h3><p class="build-desc">Purpose-built WordPress platforms for foundations and NGOs — featuring donation flows, program directories, events calendars, and news publishing. Built to inspire trust in local and diaspora audiences alike.</p><div class="build-tags"><span class="build-tag">Donations</span><span class="build-tag">Events</span><span class="build-tag">Programs</span><span class="build-tag">Dual Currency</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 21V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v14"></path><path d="M9 21v-4h6v4"></path><path d="M8 9h.01M12 9h.01M16 9h.01M8 13h.01M12 13h.01M16 13h.01"></path></svg></div><h3 class="build-title">Healthcare & Professional Services</h3><p class="build-desc">Trust-first websites for healthcare providers, legal practices, consultancies, and regulated industries. Designed to communicate professional credibility while making it effortless for patients and clients to make enquiries or book appointments.</p><div class="build-tags"><span class="build-tag">Booking Forms</span><span class="build-tag">Team Profiles</span><span class="build-tag">Service Pages</span><span class="build-tag">Accessibility</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a4 4 0 0 0-4 4v2H7a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-1V7a4 4 0 0 0-4-4Z"></path><path d="M12 14v2"></path></svg></div><h3 class="build-title">Membership & LMS Sites</h3><p class="build-desc">WordPress membership platforms and learning management systems using MemberPress, LearnDash, or custom-built access control. Gated content, subscription billing, user dashboards, and course delivery — all on a platform you control.</p><div class="build-tags"><span class="build-tag">MemberPress</span><span class="build-tag">LearnDash</span><span class="build-tag">User Roles</span><span class="build-tag">Subscriptions</span></div></div>
    </div>
  </section>

  <section>
    <div class="approach-layout">
      <div class="approach-copy reveal">
        <span class="s-label">Our Philosophy</span>
        <h2 class="s-head">Why we never use<br><em>page builders</em></h2>
        <p>The WordPress ecosystem is full of drag-and-drop page builders - Elementor, Divi, WPBakery, Beaver Builder. They promise speed and flexibility. What they actually deliver is bloated HTML output, unnecessary JavaScript bundles, and performance scores that tank the moment Google starts grading your Core Web Vitals.</p>
        <p>We build every WordPress site using a custom PHP theme, hand-written CSS, and vanilla JavaScript. The result is lean, semantic markup with zero dependency on third-party visual editors. Your site does not break when a plugin updates. Your PageSpeed score does not suffer because a widget is loading three external CSS files it does not need.</p>
        <div class="highlight-box"><h4>The real cost of page builders</h4><p>A typical Elementor-built page generates <span class="hb-gold">10–15x more DOM nodes</span> than a custom-coded equivalent. That means slower rendering, poorer Core Web Vitals, lower search rankings, and more frustrated users, especially on mid-range mobile devices over 4G.</p></div>
        <p>Advanced Custom Fields (ACF) gives your team the same content editing power - without any of the visual editor overhead. Every field group we build is tailored to your exact content model, making the admin experience simpler and faster than anything Elementor could offer.</p>
      </div>
      <div class="code-compare reveal">
        <div class="code-block">
          <div class="code-block-head bad">✗ Page Builder Output — 847 lines for one section</div>
          <div class="code-block-body">
            <div class="c-comment">&lt;!-- Elementor generated markup --&gt;</div>
            <div>&lt;<span class="c-tag">div</span> <span class="c-attr">class</span>=<span class="c-val">"elementor-section elementor-top-section</span></div>
            <div><span class="c-val">  elementor-element elementor-element-3f8a2b1</span></div>
            <div><span class="c-val">  elementor-section-boxed elementor-section-height-default</span></div>
            <div><span class="c-val">  elementor-section-height-default e-flex e-con-boxed"</span></div>
            <div><span class="c-attr">  data-id</span>=<span class="c-val">"3f8a2b1"</span> <span class="c-attr">data-element_type</span>=<span class="c-val">"section"</span>&gt;</div>
            <div class="c-bad">  &lt;!-- 12 nested wrapper divs follow... --&gt;</div>
            <div class="c-comment">  &lt;!-- loads 6 CSS files, 3 JS bundles --&gt;</div>
          </div>
        </div>
        <div class="code-block">
          <div class="code-block-head good">✓ i2Medier Custom Theme — 12 clean lines</div>
          <div class="code-block-body">
            <div class="c-comment">&lt;!-- Custom PHP theme — lean &amp; semantic --&gt;</div>
            <div>&lt;<span class="c-tag">section</span> <span class="c-attr">class</span>=<span class="c-val">"services"</span></div>
            <div>  <span class="c-attr">aria-labelledby</span>=<span class="c-val">"services-heading"</span>&gt;</div>
            <div class="c-good">  &lt;?php if( have_rows('services') ): ?&gt;</div>
            <div class="c-good">    &lt;?php while( have_rows('services') ): the_row(); ?&gt;</div>
            <div>      &lt;<span class="c-tag">article</span> <span class="c-attr">class</span>=<span class="c-val">"svc-card"</span>&gt;</div>
            <div>        &lt;<span class="c-tag">h3</span>&gt;&lt;?php the_sub_field(<span class="c-val">'title'</span>); ?&gt;&lt;/<span class="c-tag">h3</span>&gt;</div>
            <div>      &lt;/<span class="c-tag">article</span>&gt;</div>
            <div class="c-good">    &lt;?php endwhile; ?&gt;</div>
            <div class="c-good">  &lt;?php endif; ?&gt;</div>
            <div>&lt;/<span class="c-tag">section</span>&gt;</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="process-section">
    <div class="process-header reveal">
      <div><span class="s-label" style="color:var(--gold)">How We Work</span><h2 class="s-head" style="color:var(--white)">Our WordPress <em>build process</em><br>from start to launch</h2></div>
      <p>Every WordPress project we take on follows the same structured six-phase process. This gives you complete visibility, eliminates surprises, and ensures the site we deliver matches everything agreed at the start, on scope, on time, and on budget.</p>
    </div>
    <div class="process-steps">
      <div class="ps-item reveal"><div class="ps-num">01</div><div class="ps-body"><h3 class="ps-title">Discovery & Brief</h3><p class="ps-desc">We begin every engagement with a structured discovery session, a deep conversation to understand your business objectives, target audience, competitor landscape, and technical requirements. We document everything in a project brief that you sign off on before any design work begins. This single document prevents most scope disagreements later.</p><div class="ps-deliverables"><span class="ps-del">Kickoff Call</span><span class="ps-del">Competitor Analysis</span><span class="ps-del">Project Brief Document</span><span class="ps-del">Signed Scope</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">02</div><div class="ps-body"><h3 class="ps-title">Site Architecture & Wireframes</h3><p class="ps-desc">Before any visual design starts, we map out the full information architecture, every page, content type, and user flow. Low-fidelity wireframes are produced for all key pages and reviewed with you. We make structural decisions about navigation, conversion paths, and content hierarchy in this phase, where changes are inexpensive.</p><div class="ps-deliverables"><span class="ps-del">Sitemap</span><span class="ps-del">Page Wireframes</span><span class="ps-del">Content Type Map</span><span class="ps-del">Navigation Structure</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">03</div><div class="ps-body"><h3 class="ps-title">UI Design in Figma</h3><p class="ps-desc">High-fidelity designs are produced in Figma for all key pages, covering desktop, tablet, and mobile breakpoints. Every design decision, typography, colour, spacing, hover states, and component behaviour, is defined before development begins. Two rounds of revisions are included before sign-off.</p><div class="ps-deliverables"><span class="ps-del">Figma Design Files</span><span class="ps-del">2 Revision Rounds</span><span class="ps-del">Mobile + Desktop</span><span class="ps-del">Design Sign-Off</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">04</div><div class="ps-body"><h3 class="ps-title">Custom Theme Development</h3><p class="ps-desc">With approved designs in hand, we build the custom WordPress theme on a private staging environment. The theme is built from scratch in PHP, with CSS written using a custom design token system and JavaScript kept minimal. ACF field groups are configured for every editable content area, and required plugin integrations are installed and configured.</p><div class="ps-deliverables"><span class="ps-del">Custom PHP Theme</span><span class="ps-del">ACF Field Groups</span><span class="ps-del">Plugin Setup</span><span class="ps-del">Staging Access</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">05</div><div class="ps-body"><h3 class="ps-title">Content, SEO & QA</h3><p class="ps-desc">With the build complete, we populate the site with your content and configure the full SEO foundation: meta titles, descriptions, Open Graph tags, canonical URLs, XML sitemap, robots.txt, schema markup, and Google Search Console setup. Cross-browser and cross-device QA is conducted, and any Lighthouse scores below target are addressed before launch approval.</p><div class="ps-deliverables"><span class="ps-del">Content Entry</span><span class="ps-del">Full SEO Setup</span><span class="ps-del">Lighthouse Audit</span><span class="ps-del">Cross-Browser QA</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">06</div><div class="ps-body"><h3 class="ps-title">Launch, Training & Handover</h3><p class="ps-desc">Launch day is a controlled process: DNS transfer, SSL verification, caching configuration, and a post-launch smoke test before we give you the green light. After launch, we provide CMS training, a written admin guide, all credentials, a full site backup, and a 30-day support window for any issues that surface in the wild.</p><div class="ps-deliverables"><span class="ps-del">Controlled Go-Live</span><span class="ps-del">CMS Training</span><span class="ps-del">Admin Guide</span><span class="ps-del">30-Day Support</span></div></div></div>
    </div>
  </section>

  <section class="tech-section">
    <div class="tech-intro">
      <div><span class="s-label">Technology Stack</span><h2 class="s-head">What we build <em>with</em></h2></div>
      <p>We choose tools based on longevity, performance, and maintainability, not trends. Every technology in our WordPress stack has been battle-tested across dozens of live projects. You will never inherit a dependency on a tool we invented last week.</p>
    </div>
    <div class="tech-table reveal">
      <div class="tech-row"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M12 3a14 14 0 0 0 0 18"></path><path d="M12 3a14 14 0 0 1 0 18"></path><path d="M3 12h18"></path></svg></div><div><div class="tech-name">WordPress 6.x</div><div class="tech-sub">CMS Platform</div></div></div><div class="tech-desc">The world’s most widely used CMS. We use the latest stable releases and build on top of WordPress without compromising the core, ensuring your site benefits from every security and performance update WordPress releases.</div><span class="tech-badge core">Core</span></div>
      <div class="tech-row"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"></path><path d="M14 2v6h6"></path><path d="M9 13h6M9 17h4"></path></svg></div><div><div class="tech-name">PHP 8.2</div><div class="tech-sub">Server Language</div></div></div><div class="tech-desc">All themes are written for PHP 8.2+, the fastest and most secure PHP release available. We never ship code on deprecated PHP versions, which are a leading cause of WordPress security vulnerabilities.</div><span class="tech-badge core">Core</span></div>
      <div class="tech-row"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="2"></rect><path d="M8 9h8M8 13h5"></path></svg></div><div><div class="tech-name">Advanced Custom Fields Pro</div><div class="tech-sub">Content Architecture</div></div></div><div class="tech-desc">ACF Pro is the gold standard for building flexible, maintainable WordPress content models. We use it to create custom field groups, repeater layouts, and relationship fields that give you full editorial control without touching theme code.</div><span class="tech-badge ext">Extension</span></div>
      <div class="tech-row"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16"></path><path d="M7 4h10v16H7z"></path><path d="M9 11h6M9 15h4"></path></svg></div><div><div class="tech-name">Custom CSS / SCSS</div><div class="tech-sub">Styling</div></div></div><div class="tech-desc">Every line of CSS is hand-written using a custom design token system. No Tailwind, no Bootstrap, no external CSS frameworks adding unused kilobytes to your stylesheet.</div><span class="tech-badge core">Core</span></div>
      <div class="tech-row"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m8 17 4 4 4-4"></path><path d="M12 3v18"></path></svg></div><div><div class="tech-name">Vanilla JavaScript</div><div class="tech-sub">Interactions</div></div></div><div class="tech-desc">All front-end interactivity is written in plain JavaScript with no jQuery dependency and no unnecessary frameworks. This keeps the JS bundle minimal and improves interaction performance.</div><span class="tech-badge core">Core</span></div>
      <div class="tech-row"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="20" r="1"></circle><circle cx="18" cy="20" r="1"></circle><path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6H18a2 2 0 0 0 2-1.6L21 8H7"></path></svg></div><div><div class="tech-name">WooCommerce</div><div class="tech-sub">E-Commerce</div></div></div><div class="tech-desc">For e-commerce builds, we use WooCommerce as the commerce layer with a fully custom theme override. Templates are rebuilt from scratch inside our theme instead of relying on generic storefront markup.</div><span class="tech-badge ext">Extension</span></div>
      <div class="tech-row"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-3.5-3.5"></path></svg></div><div><div class="tech-name">Yoast SEO / Rank Math</div><div class="tech-sub">On-Page SEO</div></div></div><div class="tech-desc">Configured on every project for meta management, XML sitemaps, Open Graph, and schema injection. Paired with our custom schema markup for LocalBusiness, Article, Product, and FAQ structured data.</div><span class="tech-badge perf">SEO</span></div>
      <div class="tech-row"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 17.5a4.5 4.5 0 0 0-1-8.9A6 6 0 0 0 7.2 7.5 4 4 0 0 0 7 15.5h13z"></path></svg></div><div><div class="tech-name">Cloudflare + WP Rocket</div><div class="tech-sub">Performance & CDN</div></div></div><div class="tech-desc">Every site is deployed behind Cloudflare for DDoS protection, CDN delivery, and edge caching. WP Rocket handles page caching, critical CSS generation, and asset optimisation to keep mobile PageSpeed scores reliably above 90.</div><span class="tech-badge perf">Performance</span></div>
    </div>
  </section>

  <section>
    <div class="deliv-intro">
      <div><span class="s-label">What You Get</span><h2 class="s-head">Everything included<br>in every <em>WordPress build</em></h2></div>
      <p>These are not optional add-ons. They are standard deliverables on every WordPress project we take on. We believe the foundation should always be complete, regardless of budget.</p>
    </div>
    <div class="deliv-grid reveal">
      <div class="deliv-item"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"></path><path d="M14 2v6h6"></path></svg></div><div class="deliv-body"><h4>Custom PHP Theme</h4><p>Built from scratch with clean semantic HTML, structured data, and accessibility compliance baked in from the start.</p></div></div>
      <div class="deliv-item"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="2"></rect><path d="M8 9h8M8 13h5"></path></svg></div><div class="deliv-body"><h4>ACF Content Management</h4><p>Custom field groups for every editable section so your team can update content without needing developer access or block-editor gymnastics.</p></div></div>
      <div class="deliv-item"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M8 21h8"></path><path d="M12 19v2"></path></svg></div><div class="deliv-body"><h4>Fully Responsive Design</h4><p>Pixel-perfect layouts across all screen sizes, tested on real devices instead of just browser resize tools.</p></div></div>
      <div class="deliv-item"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-3.5-3.5"></path></svg></div><div class="deliv-body"><h4>Complete SEO Foundation</h4><p>Meta tags, canonical URLs, XML sitemap, robots.txt, Open Graph, Twitter Card, JSON-LD schema, and Search Console submission on every page.</p></div></div>
      <div class="deliv-item"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"></path></svg></div><div class="deliv-body"><h4>Performance Optimisation</h4><p>Image compression, lazy loading, CSS and JS minification, server-side caching, and CDN configuration targeting 90+ mobile PageSpeed scores.</p></div></div>
      <div class="deliv-item"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a4 4 0 0 0-4 4v2H7a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-1V7a4 4 0 0 0-4-4Z"></path><path d="M12 14v2"></path></svg></div><div class="deliv-body"><h4>Security Hardening</h4><p>SSL configuration, login protection, file permission hardening, spam filtering, and security headers at both WordPress and server level before launch.</p></div></div>
      <div class="deliv-item"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 3v18h18"></path><path d="m7 14 3-3 3 2 4-5"></path></svg></div><div class="deliv-body"><h4>Analytics & Tracking</h4><p>Google Analytics 4 installed and verified, Search Console linked, and conversion event tracking configured where applicable.</p></div></div>
      <div class="deliv-item"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 17A2.5 2.5 0 0 0 4 19.5V5a2 2 0 0 1 2-2h14v14"></path></svg></div><div class="deliv-body"><h4>Training & Documentation</h4><p>A recorded CMS training session plus a written admin guide covering every content management workflow your team will use.</p></div></div>
      <div class="deliv-item"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 12h8"></path><path d="M12 8v8"></path><path d="M12 21s-7-4.5-7-11a4 4 0 0 1 7-2.6A4 4 0 0 1 19 10c0 6.5-7 11-7 11Z"></path></svg></div><div class="deliv-body"><h4>30-Day Post-Launch Support</h4><p>A support window after launch covering bug fixes, browser-specific issues, content edits, and minor adjustments that surface once real visitors arrive.</p></div></div>
      <div class="deliv-item"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 8l-9-5-9 5 9 5 9-5z"></path><path d="M3 8v8l9 5 9-5V8"></path></svg></div><div class="deliv-body"><h4>Full Ownership on Delivery</h4><p>All source code, design files, database exports, and account credentials are transferred to you in full. You own everything from handover.</p></div></div>
    </div>
  </section>

  <section class="packages-section">
    <div class="packages-intro">
      <div><span class="s-label">Pricing</span><h2 class="s-head">WordPress packages<br>for every <em>scale</em></h2></div>
      <p>These are starting prices based on typical project scope. Every project is quoted individually after a free consultation, and you always receive a detailed, itemised proposal with no hidden line items before any commitment is made.</p>
    </div>
    <div class="pkg-grid">
      <div class="pkg-card reveal"><div class="pkg-head"><div class="pkg-badge">Startups & SMEs</div><div class="pkg-name">Starter</div><p class="pkg-tagline">A fast, professional website to establish your online presence and begin generating enquiries.</p><div class="pkg-price">₦350k <sub>starting from</sub></div></div><div class="pkg-body"><div class="pkg-feat">Up to 6 custom pages</div><div class="pkg-feat">Custom PHP theme</div><div class="pkg-feat">ACF content management</div><div class="pkg-feat">Contact form + Google Maps</div><div class="pkg-feat">Full SEO foundation</div><div class="pkg-feat">Google Analytics 4</div><div class="pkg-feat">Mobile-responsive design</div><div class="pkg-feat">30-day post-launch support</div><div class="pkg-feat no">Blog / News section</div><div class="pkg-feat no">WooCommerce store</div></div><div class="pkg-foot"><a href="#contact" class="pkg-btn outline">Get a Quote →</a></div></div>
      <div class="pkg-card featured reveal"><div class="pkg-head"><div class="pkg-badge">Most Popular</div><div class="pkg-name">Business</div><p class="pkg-tagline">A full business platform with blog, advanced CMS, and conversion-optimised page templates.</p><div class="pkg-price">₦750k <sub>starting from</sub></div></div><div class="pkg-body"><div class="pkg-feat">Up to 15 custom pages</div><div class="pkg-feat">Custom PHP theme + ACF Pro</div><div class="pkg-feat">Blog / News CMS with categories</div><div class="pkg-feat">Custom post types</div><div class="pkg-feat">Full SEO + schema markup</div><div class="pkg-feat">Payment gateway integration</div><div class="pkg-feat">Performance optimisation</div><div class="pkg-feat">CMS training session</div><div class="pkg-feat">60-day post-launch support</div><div class="pkg-feat">Basic e-commerce (up to 20 products)</div></div><div class="pkg-foot"><a href="#contact" class="pkg-btn gold">Start This Project →</a></div></div>
      <div class="pkg-card reveal"><div class="pkg-head"><div class="pkg-badge">Enterprise & Complex</div><div class="pkg-name">Advanced</div><p class="pkg-tagline">Membership sites, large WooCommerce stores, multisite networks, or any complex WordPress build.</p><div class="pkg-price">Custom <sub>quoted on scope</sub></div></div><div class="pkg-body"><div class="pkg-feat">Unlimited pages</div><div class="pkg-feat">Full WooCommerce store build</div><div class="pkg-feat">Membership / LMS functionality</div><div class="pkg-feat">WordPress Multisite</div><div class="pkg-feat">Custom plugin development</div><div class="pkg-feat">REST API integration</div><div class="pkg-feat">Multi-currency payments</div><div class="pkg-feat">Dedicated performance audit</div><div class="pkg-feat">90-day support & SLA</div><div class="pkg-feat">Ongoing retainer available</div></div><div class="pkg-foot"><a href="#contact" class="pkg-btn solid">Request a Proposal →</a></div></div>
    </div>
  </section>

  <section class="results-section">
    <div class="results-intro reveal">
      <div><span class="s-label" style="color:var(--gold)">Proven Results</span><h2 class="s-head" style="color:var(--white)">What our WordPress<br>builds <em>deliver</em></h2></div>
      <p>These are real numbers from live WordPress projects we have delivered. Good websites are not a cost, they are a revenue driver. Here is what the data shows.</p>
    </div>
    <div class="results-grid">
      <div class="result-card reveal"><div class="result-num"><span class="counter" data-target="340">0</span><span>%</span></div><div class="result-label">Increase in organic search visibility within 90 days</div><p class="result-project">Meto7 Chauffeur Services — custom WordPress build with city and service SEO pages targeting London, Manchester, and Birmingham.</p><a href="{{ route('portfolio.show', ['portfolioProject' => 'meto7']) }}" class="result-link">Read Case Study →</a></div>
      <div class="result-card reveal"><div class="result-num"><span class="counter" data-target="280">0</span><span>%</span></div><div class="result-label">Growth in online donation volume within 6 months</div><p class="result-project">Nnaedozie Thomas Foundation — nonprofit WordPress platform with dual-currency Paystack and Stripe donation integration.</p><a href="{{ route('portfolio.show', ['portfolioProject' => 'ntf']) }}" class="result-link">Read Case Study →</a></div>
      <div class="result-card reveal"><div class="result-num">96<span>/100</span></div><div class="result-label">Average Google PageSpeed score (mobile) across WordPress builds</div><p class="result-project">Achieved across recent projects through custom theme architecture, image optimisation, caching, and Cloudflare CDN configuration.</p><a href="{{ route('portfolio.index') }}" class="result-link">See All Projects →</a></div>
    </div>
  </section>

  <section class="compare-section">
    <div class="compare-intro reveal">
      <div><span class="s-label">How We Compare</span><h2 class="s-head">i2Medier vs<br><em>other WordPress options</em></h2></div>
      <p>Not all WordPress development is the same. The difference between a freelancer installing a premium theme and a team building a custom solution is the difference between a digital brochure and a business asset.</p>
    </div>
    <table class="compare-table reveal">
      <thead><tr><th>Feature</th><th>Premium Theme</th><th class="highlight">i2Medier Custom Build</th><th>Page Builder Agency</th></tr></thead>
      <tbody>
        <tr><td class="feature">Custom design (your brand only)</td><td><span class="compare-status partial"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4"></path><path d="M12 17h.01"></path><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"></path></svg>Partial</span> - customised template</td><td class="highlight"><span class="compare-status yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>Full</span> - built only for you</td><td><span class="compare-status partial"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4"></path><path d="M12 17h.01"></path><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"></path></svg>Partial</span> - template with builder</td></tr>
        <tr><td class="feature">No page builder dependency</td><td><span class="compare-status no"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>No</span> - usually Elementor</td><td class="highlight"><span class="compare-status yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>Yes</span> - pure custom code</td><td><span class="compare-status no"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>No</span> - fully builder-dependent</td></tr>
        <tr><td class="feature">PageSpeed score (mobile)</td><td><span class="compare-status partial"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4"></path><path d="M12 17h.01"></path><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"></path></svg>40–65</span> typical</td><td class="highlight"><span class="compare-status yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>90–98</span> target</td><td><span class="compare-status partial"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4"></path><path d="M12 17h.01"></path><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"></path></svg>35–60</span> typical</td></tr>
        <tr><td class="feature">SEO foundation included</td><td><span class="compare-status partial"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4"></path><path d="M12 17h.01"></path><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"></path></svg>Basic</span> - plugin only</td><td class="highlight"><span class="compare-status yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>Full</span> - schema + sitemap + GA4</td><td><span class="compare-status partial"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4"></path><path d="M12 17h.01"></path><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"></path></svg>Basic</span> - plugin only</td></tr>
        <tr><td class="feature">Long-term maintainability</td><td><span class="compare-status partial"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4"></path><path d="M12 17h.01"></path><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"></path></svg>Medium</span> - theme updates can break</td><td class="highlight"><span class="compare-status yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>High</span> - no third-party dependencies</td><td><span class="compare-status no"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>Low</span> - builder version lock-in</td></tr>
        <tr><td class="feature">Full code ownership on delivery</td><td><span class="compare-status partial"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4"></path><path d="M12 17h.01"></path><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"></path></svg>Partial</span> - theme licence required</td><td class="highlight"><span class="compare-status yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>Yes</span> - every file is yours</td><td><span class="compare-status partial"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4"></path><path d="M12 17h.01"></path><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"></path></svg>Partial</span> - builder licence required</td></tr>
        <tr><td class="feature">CMS training & documentation</td><td><span class="compare-status no"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>Rarely</span> included</td><td class="highlight"><span class="compare-status yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>Always</span> included</td><td><span class="compare-status partial"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4"></path><path d="M12 17h.01"></path><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"></path></svg>Sometimes</span> included</td></tr>
        <tr><td class="feature">Post-launch support window</td><td><span class="compare-status no"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>Rarely</span></td><td class="highlight"><span class="compare-status yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>30-90 days</span> standard</td><td><span class="compare-status partial"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4"></path><path d="M12 17h.01"></path><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"></path></svg>Varies</span></td></tr>
      </tbody>
    </table>
  </section>

  <section class="test-section">
    <div class="test-intro"><span class="s-label">Client Reviews</span><h2 class="s-head">What clients say about<br>our <em>WordPress work</em></h2></div>
    <div class="test-grid">
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"The site i2Medier built for us ranked on page one for our core search terms within 90 days. It loads incredibly fast, looks stunning, and our conversion rate from web visitors to booking enquiries went from nearly zero to being our main source of business."</p><div class="test-author"><div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div><div class="test-name">Operations Director</div><div class="test-role">Meto7 Chauffeur Services, UK</div></div></div></div>
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"What impressed me most was that they built everything from scratch. No Elementor, no template, just a site built exactly for us. The admin panel is so clean and intuitive that our team updates content every week without ever needing to call a developer."</p><div class="test-author"><div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div><div class="test-name">Executive Director</div><div class="test-role">Nnaedozie Thomas Foundation</div></div></div></div>
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"I had used other WordPress developers before and always ended up with a slow, bloated site I couldn't manage. i2Medier was completely different. The site they delivered scores 94 on mobile PageSpeed and I genuinely enjoy updating it myself."</p><div class="test-author"><div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div><div class="test-name">Founder & Director</div><div class="test-role">Jayach Care Services, UK</div></div></div></div>
    </div>
  </section>

  <section id="faq">
    <span class="s-label">FAQ</span>
    <h2 class="s-head">WordPress questions,<br><em>answered honestly</em></h2>
    <div class="faq-layout">
      <div class="faq-sidebar reveal"><h3>Still have a question?</h3><p>If you can't find the answer below, email us directly and we'll get back to you within one business day.</p><a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a></div>
      <div class="faq-list reveal">
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f1">Do you use Elementor or other page builders?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12h14"></path></svg></span></button><div class="faq-a" id="f1">No, never. Every website we build runs on a custom PHP theme. That approach gives you faster load times, cleaner markup, and stronger Core Web Vitals performance.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f2">How long does a WordPress website take to build?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12h14"></path></svg></span></button><div class="faq-a" id="f2">A standard WordPress website with 5–10 pages typically takes 3–5 weeks from design approval to launch. Larger sites with WooCommerce or membership systems range from 5–8 weeks.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f3">Will I be able to manage the website myself after launch?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12h14"></path></svg></span></button><div class="faq-a" id="f3">Yes. We use ACF to create tailored editing interfaces, and every project includes a CMS training session and written admin guide.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f4">Can you migrate my existing website to WordPress?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12h14"></path></svg></span></button><div class="faq-a" id="f4">Absolutely. We handle content migration, 301 redirects, QA, and go-live planning so your live site stays up throughout the process.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f5">How much does a WordPress website cost?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12h14"></path></svg></span></button><div class="faq-a" id="f5">Our custom WordPress websites start from ₦350,000 for a simple brochure site. More complex projects are scoped and quoted individually after a free consultation.</div></div>
      </div>
    </div>
  </section>

  <section class="related-section">
    <span class="s-label">Related Services</span>
    <h2 class="s-head">Often paired <em>with this service</em></h2>
    <div class="related-grid">
      <a href="{{ route('site.services.search-optimization') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-3.5-3.5"></path></svg></div><div class="ri-name">SEO Services</div><p class="ri-desc">On-page SEO, keyword research, schema markup, and local search optimisation to rank your new WordPress site.</p></a>
      <a href="{{ route('site.services.ui-ux-design') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16"></path><path d="M7 4h10v16H7z"></path><path d="M9 11h6M9 15h4"></path></svg></div><div class="ri-name">UI/UX Design</div><p class="ri-desc">Full Figma design systems and interactive prototypes before a single line of WordPress code is written.</p></a>
      <a href="{{ route('site.services.cloud-architecture') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"></path></svg></div><div class="ri-name">Performance Optimisation</div><p class="ri-desc">Core Web Vitals audits and remediation for slow existing WordPress sites.</p></a>
      <a href="{{ route('site.services.wordpress-maintenance') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a4 4 0 0 0-4 4v2H7a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-1V7a4 4 0 0 0-4-4Z"></path><path d="M12 14v2"></path></svg></div><div class="ri-name">WordPress Maintenance</div><p class="ri-desc">Monthly updates, daily backups, security monitoring, and priority support to keep your site running perfectly.</p></a>
    </div>
  </section>

  <section class="cta-band" id="contact">
    <h2>Ready to build a WordPress site<br>that actually performs?</h2>
    <p>Tell us about your project and we will send you a free, detailed proposal within 24 hours, with no commitment required.</p>
    <a href="{{ route('site.start', ['services' => 'wordpress', 'source_page' => 'service-wordpress-development', 'source_label' => 'WordPress Development Service Page']) }}" class="btn-dark">Start Your WordPress Project →</a>
  </section>
</div>
@endsection
