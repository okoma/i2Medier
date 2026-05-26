@extends('public.layouts.app')

@section('title', 'Services — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/services.css')
@endpush

@section('content')
<div class="services-page">
  <section class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>
    <span class="hero-tag">Premium Digital Solutions</span>
    <h1>What we <em>build</em><br>for your business</h1>
    <p>From robust web applications to cloud-native infrastructure — i2Medier delivers end-to-end digital solutions that help your business scale with precision.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-primary">Start Your Project →</a>
      <a href="#services" class="btn-outline">Explore Services</a>
    </div>
  </section>

  <section class="services-overview" id="services">
    <div class="section-head">
      <span class="section-label">Services</span>
      <h2 class="section-heading">Eight pillars of our <em>craft</em></h2>
      <p class="section-sub">Every service we offer is engineered for performance, designed for clarity, and built for real-world scale.</p>
    </div>

    <div class="services-grid">
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></div>
        <div class="svc-title">Web Design</div>
        <p class="svc-desc">Custom web applications, client portals, dashboards, and systems built on production-ready frameworks. Fast, secure, and scalable by default.</p>
        <a href="#web-dev" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="2" width="10" height="20" rx="2"></rect><line x1="11" y1="18" x2="13" y2="18"></line></svg></div>
        <div class="svc-title">Mobile Apps</div>
        <p class="svc-desc">Functional, utility-driven mobile applications designed around performance, clarity, and real-world usability — for iOS and Android.</p>
        <a href="#mobile" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div>
        <div class="svc-title">Search Optimization</div>
        <p class="svc-desc">We improve how your platforms are found across search engines, app stores, and modern AI-driven discovery systems.</p>
        <a href="#seo" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20l5.5-15"></path><path d="M14.5 5L20 20"></path><path d="M7 13h10"></path></svg></div>
        <div class="svc-title">UI/UX Design</div>
        <p class="svc-desc">We start with how users think. We design interfaces that reduce friction, feel natural, and guide people through complex workflows.</p>
        <a href="#ux" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M7.5 8.5l2.5 7 2-5 2 5 2.5-7"></path></svg></div>
        <div class="svc-title">WordPress</div>
        <p class="svc-desc">A flexible development platform for content-driven systems and custom functionality that goes far beyond standard themes and plugins.</p>
        <a href="#wordpress" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V5"></path><path d="M20 19V9"></path><path d="M4 19h16"></path><path d="M8 19V11"></path><path d="M12 19V7"></path><path d="M16 19v-5"></path></svg></div>
        <div class="svc-title">Laravel Development</div>
        <p class="svc-desc">Purpose-built Laravel applications, internal systems, APIs, and admin workflows engineered for maintainability, security, and long-term growth.</p>
        <a href="#laravel" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg></div>
        <div class="svc-title">Business Email Setup</div>
        <p class="svc-desc">Professional business email setup with domain-based mailboxes, deliverability hardening, migration support, and team-ready account organization.</p>
        <a href="#business-email" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 17.5a4.5 4.5 0 0 0-1-8.9A6 6 0 0 0 7.2 7.5 4 4 0 0 0 7 15.5h13z"></path></svg></div>
        <div class="svc-title">Cloud Architecture</div>
        <p class="svc-desc">We design cloud environments built for performance, stability, and long-term scalability — so your product grows without limits.</p>
        <a href="#cloud" class="svc-link">Learn more →</a>
      </div>
    </div>
  </section>

  <section class="service-deep" id="web-dev">
    <div class="deep-inner">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></span> Web Design</div>
        <h2 class="deep-title">Applications built to <em>perform</em></h2>
        <p class="deep-lead">We develop modern web applications, client portals, dashboards, and custom internal systems using production-ready frameworks. Every project starts with architecture first — because how you build matters as much as what you build.</p>
        <p class="deep-lead">Whether you need a customer-facing platform or a complex back-office system, we deliver clean, maintainable, and scalable code that your team can own long after launch.</p>
        <div class="stack-pills">
          <span class="stack-pill">Laravel</span>
          <span class="stack-pill">React</span>
          <span class="stack-pill">Next.js</span>
          <span class="stack-pill">Vue.js</span>
          <span class="stack-pill">Node.js</span>
          <span class="stack-pill">REST API</span>
          <span class="stack-pill">MySQL</span>
          <span class="stack-pill">PostgreSQL</span>
        </div>
        <div class="deep-cta-group">
          <a href="{{ route('site.services.web-design') }}" class="deep-cta">Read More →</a>
          <a href="#contact" class="deep-cta">Start a Web Design Project →</a>
        </div>
      </div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="10" width="18" height="10" rx="1"></rect><path d="M7 10V6h10v4"></path><line x1="12" y1="6" x2="12" y2="3"></line></svg></div>
          <div class="feature-text">
            <h4>Architecture-First Approach</h4>
            <p>We plan your system's structure before writing a single line of code — ensuring it's secure, modular, and ready to scale from day one.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="11" width="16" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg></div>
          <div class="feature-text">
            <h4>Security by Default</h4>
            <p>Authentication, role-based access, input validation, and OWASP best practices baked into every project — not added as an afterthought.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><polygon points="13 2 4 14 11 14 9 22 20 9 13 9 13 2"></polygon></svg></div>
          <div class="feature-text">
            <h4>Performance-Optimized</h4>
            <p>Sub-second load times, lazy loading, server-side rendering, caching strategies, and database query optimization are standard on every build.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><line x1="5" y1="20" x2="5" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="19" y1="20" x2="19" y2="13"></line></svg></div>
          <div class="feature-text">
            <h4>Custom Dashboards & Portals</h4>
            <p>We build internal tools, admin panels, client portals, and analytics dashboards with role-based views and real-time data capabilities.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 13a5 5 0 0 0 7.07 0l2.83-2.83a5 5 0 0 0-7.07-7.07L10 6"></path><path d="M14 11a5 5 0 0 0-7.07 0L4.1 13.83a5 5 0 1 0 7.07 7.07L14 18"></path></svg></div>
          <div class="feature-text">
            <h4>Third-Party Integrations</h4>
            <p>Payment gateways, CRMs, ERPs, email providers, SMS services — we connect your platform to the tools your business already depends on.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="service-deep" id="mobile" style="background: var(--off);">
    <div class="deep-inner reverse">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="2" width="10" height="20" rx="2"></rect><line x1="11" y1="18" x2="13" y2="18"></line></svg></span> Mobile Apps</div>
        <h2 class="deep-title">Apps your users <em>keep</em></h2>
        <p class="deep-lead">We build mobile applications that solve real problems for real users. Every decision — from navigation flow to offline capability — is made with usability and adoption in mind. No feature bloat, no unnecessary complexity.</p>
        <p class="deep-lead">We develop cross-platform applications that look and feel native on both iOS and Android, reducing your time-to-market without sacrificing quality.</p>
        <div class="stack-pills">
          <span class="stack-pill">React Native</span>
          <span class="stack-pill">Flutter</span>
          <span class="stack-pill">Expo</span>
          <span class="stack-pill">Firebase</span>
          <span class="stack-pill">Push Notifications</span>
          <span class="stack-pill">App Store Submission</span>
        </div>
        <br>
        <a href="{{ route('site.services.mobile-app-development') }}" class="deep-cta ghost">Read More</a>
        <a href="#contact" class="deep-cta">Start a Mobile Project →</a>
      </div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><circle cx="12" cy="12" r="4"></circle><circle cx="12" cy="12" r="1"></circle></svg></div>
          <div class="feature-text">
            <h4>User-Centered Design</h4>
            <p>We map user journeys and test flows before building, ensuring the app is intuitive from the very first screen to the final interaction.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="3" width="8" height="18" rx="2"></rect><rect x="14" y="6" width="6" height="12" rx="1.5"></rect></svg></div>
          <div class="feature-text">
            <h4>Cross-Platform Development</h4>
            <p>One codebase, two platforms. We build with React Native or Flutter to deliver consistent, high-quality experiences on iOS and Android simultaneously.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15 17H5l1.4-1.4A2 2 0 0 0 7 14.2V11a5 5 0 1 1 10 0v3.2a2 2 0 0 0 .6 1.4L19 17h-4"></path><path d="M10 20a2 2 0 0 0 4 0"></path></svg></div>
          <div class="feature-text">
            <h4>Push Notifications & Engagement</h4>
            <p>Strategically timed, targeted push notifications that re-engage users and drive key actions — without being intrusive.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 8l-9-5-9 5 9 5 9-5z"></path><path d="M3 8v8l9 5 9-5V8"></path></svg></div>
          <div class="feature-text">
            <h4>App Store Launch Support</h4>
            <p>We handle submission, compliance checks, metadata, screenshots, and review management so your app gets approved and stays live.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.5 9A9 9 0 0 1 18.6 5.6L23 10"></path><path d="M20.5 15A9 9 0 0 1 5.4 18.4L1 14"></path></svg></div>
          <div class="feature-text">
            <h4>Post-Launch Maintenance</h4>
            <p>OS updates, performance patches, new feature releases, and bug fixes — we stay engaged beyond launch so your app doesn't stagnate.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="service-deep" id="seo">
    <div class="deep-inner">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span> Search Optimization</div>
        <h2 class="deep-title">Be found by the <em>right</em> people</h2>
        <p class="deep-lead">Search has evolved. It's no longer just Google. AI discovery tools, app stores, and voice search are all competing for your audience's attention. We help your platforms stay visible across all of them.</p>
        <p class="deep-lead">From technical SEO audits to content strategy and schema markup, we build a sustainable search presence that compounds over time — not just a one-time ranking spike.</p>
        <div class="stack-pills">
          <span class="stack-pill">Technical SEO</span>
          <span class="stack-pill">Core Web Vitals</span>
          <span class="stack-pill">Schema Markup</span>
          <span class="stack-pill">Content Strategy</span>
          <span class="stack-pill">App Store Optimization</span>
          <span class="stack-pill">AI Search Visibility</span>
        </div>
        <div class="deep-cta-group">
          <a href="{{ route('site.services.search-optimization') }}" class="deep-cta">Read More →</a>
          <a href="#contact" class="deep-cta">Improve Your Visibility →</a>
        </div>
      </div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14.7 6.3a4 4 0 0 0 3 5.7L10 19.7a2.1 2.1 0 0 1-3-3l7.7-7.7a4 4 0 0 0 0-2.7z"></path><path d="M16 3l5 5"></path></svg></div>
          <div class="feature-text">
            <h4>Technical SEO Audit</h4>
            <p>We crawl your entire platform to identify indexing issues, crawl errors, duplicate content, broken links, and missing metadata that silently hurt your rankings.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><polygon points="13 2 4 14 11 14 9 22 20 9 13 9 13 2"></polygon></svg></div>
          <div class="feature-text">
            <h4>Core Web Vitals Optimization</h4>
            <p>Google ranks fast sites. We optimize LCP, FID, and CLS scores to ensure your platform meets modern performance benchmarks that directly affect rankings.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 3a3 3 0 0 0-3 3v1a4 4 0 0 0-2 3.5A4 4 0 0 0 6 14v1a3 3 0 0 0 3 3h1v3"></path><path d="M15 3a3 3 0 0 1 3 3v1a4 4 0 0 1 2 3.5A4 4 0 0 1 18 14v1a3 3 0 0 1-3 3h-1v3"></path><path d="M9 8h6"></path><path d="M9 12h6"></path></svg></div>
          <div class="feature-text">
            <h4>AI Search Readiness</h4>
            <p>We structure your content and data so AI-powered discovery tools — like ChatGPT, Perplexity, and Google AI Overviews — can find, understand, and surface your business.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="4 14 9 9 13 13 20 6"></polyline><polyline points="20 10 20 6 16 6"></polyline></svg></div>
          <div class="feature-text">
            <h4>Keyword & Content Strategy</h4>
            <p>We research what your audience is actually searching for and build a content plan that targets high-intent keywords with realistic ranking potential.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="2" width="10" height="20" rx="2"></rect><line x1="11" y1="18" x2="13" y2="18"></line></svg></div>
          <div class="feature-text">
            <h4>App Store Optimization (ASO)</h4>
            <p>For mobile products, we optimize your App Store and Google Play listings with the right keywords, visuals, and descriptions to improve organic downloads.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="service-deep" id="ux" style="background: var(--off);">
    <div class="deep-inner reverse">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20h9"></path><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path></svg></span> UI/UX Design</div>
        <h2 class="deep-title">Design that <em>guides</em></h2>
        <p class="deep-lead">We start with how users think, not how clients imagine. Good design is invisible — it guides people through complexity without them noticing the work behind it. Bad design makes users feel lost, even if the product technically works.</p>
        <p class="deep-lead">From wireframes to high-fidelity prototypes, we design systems that are logical, beautiful, and built for handoff to developers.</p>
        <div class="stack-pills">
          <span class="stack-pill">Figma</span>
          <span class="stack-pill">Wireframing</span>
          <span class="stack-pill">Prototyping</span>
          <span class="stack-pill">Design Systems</span>
          <span class="stack-pill">User Testing</span>
          <span class="stack-pill">Accessibility</span>
        </div>
        <div class="deep-cta-group">
          <a href="{{ route('site.services.ui-ux-design') }}" class="deep-cta">Read More →</a>
          <a href="#contact" class="deep-cta">Start a Design Project →</a>
        </div>
      </div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><polygon points="3 6 9 3 15 6 21 3 21 18 15 21 9 18 3 21 3 6"></polygon><line x1="9" y1="3" x2="9" y2="18"></line><line x1="15" y1="6" x2="15" y2="21"></line></svg></div>
          <div class="feature-text">
            <h4>User Journey Mapping</h4>
            <p>We map every interaction a user has with your product from first visit to core task completion — identifying friction points before a single screen is designed.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 21l9-18 9 18"></path><path d="M7 13h10"></path></svg></div>
          <div class="feature-text">
            <h4>Wireframes & Prototypes</h4>
            <p>Low-fidelity wireframes establish structure and flow. High-fidelity prototypes let you test, share, and validate ideas with real users before development begins.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 0-4h-1a2 2 0 0 1 0-4h2a4 4 0 0 0 0-8h-2z"></path><circle cx="7.5" cy="10.5" r="1"></circle><circle cx="10.5" cy="7.5" r="1"></circle><circle cx="15.5" cy="8.5" r="1"></circle></svg></div>
          <div class="feature-text">
            <h4>Design System Creation</h4>
            <p>We build reusable component libraries with defined typography, color, spacing, and interaction patterns — making future development dramatically faster and more consistent.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="5" r="2"></circle><path d="M12 7v5l3 3"></path><path d="M10 11H7"></path><path d="M9 21a5 5 0 1 0 4-8"></path></svg></div>
          <div class="feature-text">
            <h4>Accessibility (WCAG)</h4>
            <p>We design with contrast ratios, keyboard navigation, screen reader support, and WCAG 2.1 compliance in mind — because inclusive design is good design.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 12l3 3 5-5"></path><path d="M20 12v5a2 2 0 0 1-2 2h-3"></path><path d="M4 12v5a2 2 0 0 0 2 2h3"></path><path d="M8 7H6a2 2 0 0 0-2 2v3"></path><path d="M16 7h2a2 2 0 0 1 2 2v3"></path></svg></div>
          <div class="feature-text">
            <h4>Developer Handoff</h4>
            <p>Clean Figma files with proper naming, auto layout, component variants, and annotations — so developers can implement designs without needing a decoder ring.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="service-deep" id="wordpress">
    <div class="deep-inner">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M7.5 8.5l2.5 7 2-5 2 5 2.5-7"></path></svg></span> WordPress</div>
        <h2 class="deep-title">WordPress beyond <em>themes</em></h2>
        <p class="deep-lead">We use WordPress as a flexible development platform — not a theme installer. For content-driven systems, membership platforms, eCommerce stores, and custom business tools, WordPress gives us the foundation; we build the experience on top of it.</p>
        <p class="deep-lead">Custom post types, custom blocks, headless architecture, custom Elementor widgets — we bend WordPress to fit your needs, not the other way around.</p>
        <div class="stack-pills">
          <span class="stack-pill">WordPress</span>
          <span class="stack-pill">WooCommerce</span>
          <span class="stack-pill">Elementor</span>
          <span class="stack-pill">ACF</span>
          <span class="stack-pill">Custom Plugins</span>
          <span class="stack-pill">REST API</span>
          <span class="stack-pill">Headless WP</span>
        </div>
        <div class="deep-cta-group">
          <a href="{{ route('site.services.wordpress-development') }}" class="deep-cta">Read More →</a>
          <a href="#contact" class="deep-cta">Start a WordPress Project →</a>
        </div>
      </div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 3h4v4a2 2 0 1 1 0 4v4h-4a2 2 0 1 1-4 0H2v-4h4a2 2 0 1 0 4 0V7z"></path><path d="M14 15h4v6h-6v-4a2 2 0 1 1 2-2z"></path></svg></div>
          <div class="feature-text">
            <h4>Custom Theme Development</h4>
            <p>We build bespoke WordPress themes from scratch or extend existing ones with custom functionality — no bloated page builders, no unnecessary plugins.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 7V3"></path><path d="M15 7V3"></path><path d="M8 7h8v4a4 4 0 0 1-8 0V7z"></path><line x1="12" y1="15" x2="12" y2="21"></line></svg></div>
          <div class="feature-text">
            <h4>Custom Plugin Development</h4>
            <p>When off-the-shelf plugins don't quite fit, we build custom plugins that do exactly what your business needs — cleanly, securely, and without conflicts.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="20" r="1"></circle><circle cx="17" cy="20" r="1"></circle><path d="M3 4h2l2.4 10.5a1 1 0 0 0 1 .8H18a1 1 0 0 0 1-.8L21 8H7"></path></svg></div>
          <div class="feature-text">
            <h4>WooCommerce Stores</h4>
            <p>Full eCommerce builds with custom product types, payment gateway integrations, inventory management, and streamlined checkout flows.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.2a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.2a1.7 1.7 0 0 0 1.5-1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.8.3H9a1.7 1.7 0 0 0 1-1.5V3a2 2 0 1 1 4 0v.2a1.7 1.7 0 0 0 1 1.5h.1a1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8v.1a1.7 1.7 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.2a1.7 1.7 0 0 0-1.5 1z"></path></svg></div>
          <div class="feature-text">
            <h4>Elementor Custom Widgets</h4>
            <p>We extend Elementor with custom widgets, dynamic templates, and theme builder sections so your team can manage content independently after launch.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><line x1="3" y1="12" x2="21" y2="12"></line><path d="M12 3a15 15 0 0 1 0 18"></path><path d="M12 3a15 15 0 0 0 0 18"></path></svg></div>
          <div class="feature-text">
            <h4>Headless WordPress</h4>
            <p>Use WordPress as a backend CMS while powering the front-end with React or Next.js — combining editorial flexibility with modern frontend performance.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="service-deep" id="laravel" style="background: var(--off);">
    <div class="deep-inner reverse">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V5"></path><path d="M20 19V9"></path><path d="M4 19h16"></path><path d="M8 19V11"></path><path d="M12 19V7"></path><path d="M16 19v-5"></path></svg></span> Laravel Development</div>
        <h2 class="deep-title">Laravel systems built for <em>business logic</em></h2>
        <p class="deep-lead">When the project needs more than a marketing site, Laravel gives us the foundation for serious business software. We build back-office systems, portals, APIs, subscription flows, and operational platforms that stay clean as complexity grows.</p>
        <p class="deep-lead">Our Laravel work focuses on structure first: domain logic, permissions, workflows, reporting, and maintainability. That means your product remains readable, extensible, and stable long after the initial release.</p>
        <div class="stack-pills">
          <span class="stack-pill">Laravel</span>
          <span class="stack-pill">Livewire</span>
          <span class="stack-pill">Filament</span>
          <span class="stack-pill">Queues</span>
          <span class="stack-pill">REST APIs</span>
          <span class="stack-pill">Payments</span>
          <span class="stack-pill">RBAC</span>
        </div>
        <div class="deep-cta-group">
          <a href="{{ route('site.services.laravel-development') }}" class="deep-cta">Read More →</a>
          <a href="#contact" class="deep-cta">Start a Laravel Project →</a>
        </div>
      </div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7h18"></path><path d="M6 3h12v18H6z"></path><path d="M9 11h6"></path><path d="M9 15h4"></path></svg></div>
          <div class="feature-text">
            <h4>Admin Panels & Back Offices</h4>
            <p>We build operational interfaces for teams managing clients, orders, invoices, support, content, and day-to-day internal workflows.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l8 4.5v11L12 22 4 17.5v-11L12 2z"></path><path d="M12 22V11"></path><path d="M20 6.5l-8 4.5-8-4.5"></path></svg></div>
          <div class="feature-text">
            <h4>API & Integration Layers</h4>
            <p>From payment providers to external CRMs, we design Laravel services that exchange data reliably across systems and user touchpoints.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="16" rx="2"></rect><path d="M7 8h10"></path><path d="M7 12h10"></path><path d="M7 16h6"></path></svg></div>
          <div class="feature-text">
            <h4>Workflow Automation</h4>
            <p>Queued jobs, notifications, renewals, provisioning actions, and scheduled processes are structured to reduce manual work and operational risk.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 21V10"></path><path d="M16 21V3"></path><path d="M12 21v-6"></path></svg></div>
          <div class="feature-text">
            <h4>Reporting & Business Visibility</h4>
            <p>We expose the numbers that matter through dashboards, exports, and summaries so owners and teams can actually use the data they collect.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 12l4 4 8-8"></path><circle cx="12" cy="12" r="9"></circle></svg></div>
          <div class="feature-text">
            <h4>Maintainable Codebases</h4>
            <p>We favor conventions, tests where needed, and clear separation of concerns so future changes don’t turn into expensive rewrites.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="service-deep" id="business-email">
    <div class="deep-inner">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg></span> Business Email Setup</div>
        <h2 class="deep-title">Email your brand can <em>stand behind</em></h2>
        <p class="deep-lead">A custom domain email address does more than look professional. It supports trust, team coordination, deliverability, and brand consistency across every client interaction.</p>
        <p class="deep-lead">We set up business email environments properly from the start, including mailbox creation, domain records, device connection, migration support, and authentication records that help your messages land where they should.</p>
        <div class="stack-pills">
          <span class="stack-pill">Google Workspace</span>
          <span class="stack-pill">Microsoft 365</span>
          <span class="stack-pill">IMAP Migration</span>
          <span class="stack-pill">SPF</span>
          <span class="stack-pill">DKIM</span>
          <span class="stack-pill">DMARC</span>
          <span class="stack-pill">Shared Inboxes</span>
        </div>
        <br>
        <a href="{{ route('site.services.business-email-setup') }}" class="deep-cta">Read More →</a>
        <a href="#contact" class="deep-cta ghost">Set Up Business Email</a>
      </div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg></div>
          <div class="feature-text">
            <h4>Professional Mailbox Setup</h4>
            <p>We configure branded addresses like <span style="white-space:nowrap;">hello@yourdomain.com</span> for founders, departments, and customer-facing teams.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16"></path><path d="M6 3h12v18H6z"></path><path d="M9 10h6"></path></svg></div>
          <div class="feature-text">
            <h4>Platform & Device Connection</h4>
            <p>Mailboxes are connected across web, mobile, and desktop clients so your team can work without setup confusion or inconsistent access.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17l10-10"></path><path d="M7 7h10v10"></path></svg></div>
          <div class="feature-text">
            <h4>Email Migration Support</h4>
            <p>We move existing messages, contacts, and folders from legacy providers when needed, minimizing disruption during the switch.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l7 4v6c0 5-3.5 8.5-7 10-3.5-1.5-7-5-7-10V6l7-4z"></path><path d="M9.5 12l2 2 3-4"></path></svg></div>
          <div class="feature-text">
            <h4>Deliverability & Authentication</h4>
            <p>We configure SPF, DKIM, and DMARC records to improve trust, reduce spoofing, and support better inbox placement.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div>
          <div class="feature-text">
            <h4>Team Structure & Shared Access</h4>
            <p>Shared inboxes, aliases, forwarding rules, and role-based account organization keep communication clean as the business grows.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="service-deep" id="cloud" style="background: var(--off);">
    <div class="deep-inner reverse">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 17.5a4.5 4.5 0 0 0-1-8.9A6 6 0 0 0 7.2 7.5 4 4 0 0 0 7 15.5h13z"></path></svg></span> Cloud Architecture</div>
        <h2 class="deep-title">Infrastructure built to <em>scale</em></h2>
        <p class="deep-lead">At i2Medier Konceptz, we design cloud environments built for performance, stability, and long-term scalability. We architect systems that grow with your product — not ones that collapse under the weight of success.</p>
        <p class="deep-lead">Whether you're launching your first server or migrating a legacy system, we build cloud infrastructure that's cost-efficient, observable, and resilient by design.</p>
        <div class="stack-pills">
          <span class="stack-pill">AWS</span>
          <span class="stack-pill">DigitalOcean</span>
          <span class="stack-pill">Docker</span>
          <span class="stack-pill">CI/CD Pipelines</span>
          <span class="stack-pill">Nginx</span>
          <span class="stack-pill">Redis</span>
          <span class="stack-pill">Monitoring</span>
        </div>
        <br>
        <a href="{{ route('site.services.cloud-architecture') }}" class="deep-cta">Read More →</a>
        <a href="#contact" class="deep-cta ghost">Discuss Your Infrastructure</a>
      </div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 10h18"></path><path d="M5 10v8"></path><path d="M10 10v8"></path><path d="M14 10v8"></path><path d="M19 10v8"></path><path d="M2 18h20"></path><path d="M12 3l9 5H3l9-5z"></path></svg></div>
          <div class="feature-text">
            <h4>Cloud Architecture Design</h4>
            <p>We diagram and design your entire cloud infrastructure before provisioning anything — load balancers, compute, storage, networking, and failover paths all planned up front.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19c2-5 6-9 11-11 0 0 2 4-1 7s-7 1-7 1-2 4-3 3z"></path><path d="M14 5l5 5"></path></svg></div>
          <div class="feature-text">
            <h4>CI/CD Pipeline Setup</h4>
            <p>Automated testing, staging deployments, and production releases through GitHub Actions, GitLab CI, or custom pipelines — deploy with confidence, every time.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 8l-9-5-9 5 9 5 9-5z"></path><path d="M3 8v8l9 5 9-5V8"></path></svg></div>
          <div class="feature-text">
            <h4>Containerization & Docker</h4>
            <p>We containerize your application stack with Docker and orchestrate deployments so your environment is consistent from development to production.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20h.01"></path><path d="M8 16a6 6 0 0 1 8 0"></path><path d="M5 12a11 11 0 0 1 14 0"></path><path d="M2 8a16 16 0 0 1 20 0"></path></svg></div>
          <div class="feature-text">
            <h4>Monitoring & Alerting</h4>
            <p>Server uptime, error tracking, response time monitoring, and automated alerting — you know about issues before your users do.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="11" width="16" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg></div>
          <div class="feature-text">
            <h4>Security Hardening</h4>
            <p>SSL/TLS configuration, firewall rules, environment variable management, secret vaults, and DDoS protection — your infrastructure locked down at every layer.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="process">
    <div class="section-head">
      <span class="section-label">How we work</span>
      <h2 class="section-heading">Our <em>process</em></h2>
      <p class="section-sub">Every project follows the same disciplined approach — from discovery to delivery.</p>
    </div>
    <div class="process-steps">
      <div class="process-step">
        <div class="step-num">01</div>
        <div class="step-title">Discovery</div>
        <p class="step-desc">We audit your current situation, understand your goals, and define the exact scope of what needs to be built — before any work begins.</p>
      </div>
      <div class="process-step">
        <div class="step-num">02</div>
        <div class="step-title">Strategy</div>
        <p class="step-desc">Architecture decisions, technology selection, timeline planning, and team assignment. The blueprint is agreed and approved.</p>
      </div>
      <div class="process-step">
        <div class="step-num">03</div>
        <div class="step-title">Design</div>
        <p class="step-desc">Wireframes, prototypes, and visual designs built with your users in mind. You review and approve before development begins.</p>
      </div>
      <div class="process-step">
        <div class="step-num">04</div>
        <div class="step-title">Development</div>
        <p class="step-desc">Agile sprints with regular check-ins, a staging environment for your review, and clean, documented code throughout the build.</p>
      </div>
      <div class="process-step">
        <div class="step-num">05</div>
        <div class="step-title">Launch</div>
        <p class="step-desc">Quality assurance, performance testing, security checks, and a smooth deployment to production with zero-downtime releases.</p>
      </div>
      <div class="process-step">
        <div class="step-num">06</div>
        <div class="step-title">Support</div>
        <p class="step-desc">Post-launch monitoring, priority bug fixes, and ongoing enhancements so your product stays healthy and keeps improving.</p>
      </div>
    </div>
  </section>

  <section class="cta-band" id="contact">
    <h2>Ready to build something great?</h2>
    <p>Tell us about your project and we'll get back to you within 24 hours.</p>
    <a href="mailto:hello@i2medier.com" class="btn-dark">Start Your Project →</a>
  </section>
</div>
@endsection
