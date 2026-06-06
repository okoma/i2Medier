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
    <p>From premium websites and SaaS platforms to cloud infrastructure and managed digital systems, i2Medier delivers high-trust digital products built for performance, clarity, and scale.</p>
    <div class="hero-btns">
      <a href="{{ route('site.start') }}" class="btn-primary">Start Your Project →</a>
      <a href="#services" class="btn-outline">Explore Services</a>
    </div>
  </section>

  <section class="services-overview" id="services">
    <div class="section-head">
      <span class="section-label">Services</span>
      <h2 class="section-heading">Core services behind our <em>craft</em></h2>
      <p class="section-sub">Every service we offer is structured for premium delivery, long-term maintainability, and real-world business growth.</p>
    </div>

    <div class="services-grid">
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></div>
        <div class="svc-title">Website Design</div>
        <p class="svc-desc">Conversion-focused website design for premium brands that need polished presentation, clear messaging, and a strong digital first impression.</p>
        <a href="#web-dev" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="2" width="10" height="20" rx="2"></rect><line x1="11" y1="18" x2="13" y2="18"></line></svg></div>
        <div class="svc-title">Mobile Apps</div>
        <p class="svc-desc">Production-ready mobile applications for iOS and Android, designed for adoption, performance, and long-term product growth.</p>
        <a href="#mobile" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div>
        <div class="svc-title">Search Optimization</div>
        <p class="svc-desc">Search visibility strategy across technical SEO, content structure, Core Web Vitals, and modern AI-influenced discovery.</p>
        <a href="#seo" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20l5.5-15"></path><path d="M14.5 5L20 20"></path><path d="M7 13h10"></path></svg></div>
        <div class="svc-title">UI/UX Design</div>
        <p class="svc-desc">Research-led interface design that reduces friction, improves usability, and gives complex products a clear, premium user experience.</p>
        <a href="#ux" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M7.5 8.5l2.5 7 2-5 2 5 2.5-7"></path></svg></div>
        <div class="svc-title">WordPress</div>
        <p class="svc-desc">Premium WordPress development for content-driven platforms, marketing sites, and commerce builds that go far beyond generic themes.</p>
        <a href="#wordpress" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="20" r="1"></circle><circle cx="17" cy="20" r="1"></circle><path d="M3 4h2l2.4 10.5a1 1 0 0 0 1 .8H18a1 1 0 0 0 1-.8L21 8H7"></path></svg></div>
        <div class="svc-title">E-Commerce Website</div>
        <p class="svc-desc">Premium online stores built around platform fit, smooth checkout experiences, and the operational systems needed for serious selling.</p>
        <a href="#ecommerce" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V5"></path><path d="M20 19V9"></path><path d="M4 19h16"></path><path d="M8 19V11"></path><path d="M12 19V7"></path><path d="M16 19v-5"></path></svg></div>
        <div class="svc-title">Laravel Development</div>
        <p class="svc-desc">Purpose-built Laravel applications, SaaS platforms, APIs, and operational systems engineered for maintainability, security, and scale.</p>
        <a href="#laravel" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="5" width="16" height="14" rx="2"></rect><path d="M8 9h8"></path><path d="M8 13h5"></path><path d="M16 16h4"></path></svg></div>
        <div class="svc-title">SaaS Application</div>
        <p class="svc-desc">Subscription-ready software products with strong foundations for onboarding, user accounts, admin workflows, and recurring growth.</p>
        <a href="#saas" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 7l9 6 9-6"></path></svg></div>
        <div class="svc-title">Business Email Setup</div>
        <p class="svc-desc">Professional business email setup with secure domain-based mailboxes, migration support, and deliverability hardening for modern teams.</p>
        <a href="#business-email" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="11" width="16" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg></div>
        <div class="svc-title">White Label Services</div>
        <p class="svc-desc">We build and deliver digital work under your agency's brand — NDA protected, no i2Medier footprint, fully invisible to your clients.</p>
        <a href="#white-label" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v5c0 5 3.4 7.9 8 9 4.6-1.1 8-4 8-9V7Z"></path><path d="m9 12 2 2 4-4"></path></svg></div>
        <div class="svc-title">Email Deliverability</div>
        <p class="svc-desc">We fix emails going to spam — SPF, DKIM, DMARC setup, blacklist removal, domain warm-up, cold email infrastructure, and ongoing reputation monitoring.</p>
        <a href="#email-deliverability" class="svc-link">Learn more →</a>
      </div>
      <div class="service-card">
        <div class="svc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 17.5a4.5 4.5 0 0 0-1-8.9A6 6 0 0 0 7.2 7.5 4 4 0 0 0 7 15.5h13z"></path></svg></div>
        <div class="svc-title">Cloud Architecture</div>
        <p class="svc-desc">Managed cloud architecture designed for security, observability, resilience, and the operational demands of serious digital products.</p>
        <a href="#cloud" class="svc-link">Learn more →</a>
      </div>
    </div>
  </section>

  <section class="service-deep" id="web-dev">
    <div class="deep-inner">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></span> Website Design</div>
        <h2 class="deep-title">Websites designed to <em>convert</em></h2>
        <p class="deep-lead">Our website design work is built for businesses that need more than something attractive. We design premium, conversion-focused websites that present your offer clearly, build trust quickly, and support real business growth.</p>
        <p class="deep-lead">From single-page launch websites to richer marketing experiences, every design is shaped around messaging clarity, layout hierarchy, responsiveness, and a polished brand presence.</p>
        <div class="stack-pills">
          <span class="stack-pill">Landing Pages</span>
          <span class="stack-pill">Marketing Websites</span>
          <span class="stack-pill">Responsive Layouts</span>
          <span class="stack-pill">Conversion Copy Flow</span>
          <span class="stack-pill">UI Systems</span>
          <span class="stack-pill">Brand Presentation</span>
          <span class="stack-pill">Interaction Design</span>
          <span class="stack-pill">Design Handoff</span>
        </div>
        <div class="deep-cta-group">
          <a href="{{ route('site.services.web-design') }}" class="deep-cta">Read More →</a>
          <a href="{{ route('site.start', ['services' => 'webdesign', 'source_page' => 'services-overview-webdesign', 'source_label' => 'Services Page']) }}" class="deep-cta">Start a Website Project →</a>
        </div>
      </div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="10" width="18" height="10" rx="1"></rect><path d="M7 10V6h10v4"></path><line x1="12" y1="6" x2="12" y2="3"></line></svg></div>
          <div class="feature-text">
            <h4>Strategic Design Direction</h4>
            <p>We shape the website around what your audience needs to understand, feel, and do — not just what should fit on the page.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="11" width="16" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg></div>
          <div class="feature-text">
            <h4>Responsive by Default</h4>
            <p>Every layout is designed to hold its clarity and impact across desktop, tablet, and mobile without breaking the experience.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><polygon points="13 2 4 14 11 14 9 22 20 9 13 9 13 2"></polygon></svg></div>
          <div class="feature-text">
            <h4>Designed for Conversion</h4>
            <p>We use hierarchy, content flow, CTA placement, and trust-building design patterns to help the site support real business outcomes.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><line x1="5" y1="20" x2="5" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="19" y1="20" x2="19" y2="13"></line></svg></div>
          <div class="feature-text">
            <h4>Premium Brand Presentation</h4>
            <p>The final result feels intentional, credible, and polished enough to support premium positioning in your market.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 13a5 5 0 0 0 7.07 0l2.83-2.83a5 5 0 0 0-7.07-7.07L10 6"></path><path d="M14 11a5 5 0 0 0-7.07 0L4.1 13.83a5 5 0 1 0 7.07 7.07L14 18"></path></svg></div>
          <div class="feature-text">
            <h4>Ready for Development</h4>
            <p>Whether the site is built in WordPress, Laravel, or another stack, the design is created to hand off cleanly into implementation.</p>
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
        <p class="deep-lead">We build mobile applications that solve real problems for real users. Every decision — from navigation flow to performance readiness — is shaped around usability, adoption, and product growth.</p>
        <p class="deep-lead">We develop cross-platform applications that feel polished in production, with the architecture, analytics baseline, and product thinking needed to support real launches.</p>
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
        <a href="{{ route('site.start', ['services' => 'mobileapps', 'source_page' => 'services-overview-mobileapps', 'source_label' => 'Services Page']) }}" class="deep-cta">Start a Mobile Project →</a>
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
          <a href="{{ route('site.start', ['services' => 'seo', 'source_page' => 'services-overview-seo', 'source_label' => 'Services Page']) }}" class="deep-cta">Improve Your Visibility →</a>
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
          <a href="{{ route('site.start', ['services' => 'uiux', 'source_page' => 'services-overview-uiux', 'source_label' => 'Services Page']) }}" class="deep-cta">Start a Design Project →</a>
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
        <p class="deep-lead">We use WordPress as a real development platform, not a shortcut. For content-driven systems, membership products, premium marketing sites, and eCommerce projects, WordPress gives us the foundation; we build the right experience on top of it.</p>
        <p class="deep-lead">Baseline performance, SEO readiness, and editorial usability are part of the expectation. Advanced growth, workflow, and platform enhancements are layered on when the project demands them.</p>
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
          <a href="{{ route('site.start', ['services' => 'wordpress', 'source_page' => 'services-overview-wordpress', 'source_label' => 'Services Page']) }}" class="deep-cta">Start a WordPress Project →</a>
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
        <p class="deep-lead">When the project needs more than a marketing site, Laravel gives us the foundation for serious business software. We build back-office systems, portals, APIs, SaaS products, subscription flows, and operational platforms that stay clean as complexity grows.</p>
        <p class="deep-lead">Our Laravel work focuses on structure first: domain logic, permissions, workflows, reporting, and maintainability. Core operational capability is expected; advanced expansion layers are added where the business model requires them.</p>
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
          <a href="{{ route('site.start', ['services' => 'laravel', 'source_page' => 'services-overview-laravel', 'source_label' => 'Services Page']) }}" class="deep-cta">Start a Laravel Project →</a>
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

  <section class="service-deep" id="ecommerce">
    <div class="deep-inner">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="20" r="1"></circle><circle cx="17" cy="20" r="1"></circle><path d="M3 4h2l2.4 10.5a1 1 0 0 0 1 .8H18a1 1 0 0 0 1-.8L21 8H7"></path></svg></span> E-Commerce Website</div>
        <h2 class="deep-title">Commerce built to <em>sell well</em></h2>
        <p class="deep-lead">When the goal is selling online, platform choice matters. We design and build premium e-commerce experiences around the right foundation for your business, whether that means WooCommerce, Shopify, or a custom Laravel store.</p>
        <p class="deep-lead">Our focus is not just getting products online. We structure storefronts, product presentation, checkout flow, payment integration, and store operations so the business can actually grow after launch.</p>
        <div class="stack-pills">
          <span class="stack-pill">WooCommerce</span>
          <span class="stack-pill">Shopify</span>
          <span class="stack-pill">Custom Laravel</span>
          <span class="stack-pill">Payment Integration</span>
          <span class="stack-pill">Catalog Design</span>
          <span class="stack-pill">Checkout UX</span>
          <span class="stack-pill">Shipping Logic</span>
          <span class="stack-pill">Store Operations</span>
        </div>
        <div class="deep-cta-group">
          <a href="{{ route('site.services.ecommerce-website') }}" class="deep-cta">Read More →</a>
          <a href="{{ route('site.start', ['services' => 'ecommerce', 'source_page' => 'services-overview-ecommerce', 'source_label' => 'Services Page']) }}" class="deep-cta">Start an E-Commerce Project →</a>
        </div>
      </div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20V8l8-4 8 4v12"></path><path d="M4 8h16"></path><path d="M8 12h8"></path></svg></div>
          <div class="feature-text">
            <h4>Platform-Fit Store Planning</h4>
            <p>We recommend the right commerce stack based on catalog complexity, growth goals, operational needs, and how much flexibility the business will need over time.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 6h10"></path><path d="M5 10h14"></path><path d="M7 14h10"></path><path d="M10 18h4"></path></svg></div>
          <div class="feature-text">
            <h4>Conversion-Focused Storefronts</h4>
            <p>Product pages, collection flows, trust cues, and CTA patterns are designed to reduce hesitation and help visitors move confidently toward checkout.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18"></path><path d="M8 15h3"></path></svg></div>
          <div class="feature-text">
            <h4>Payments & Checkout Readiness</h4>
            <p>We connect the right payment flows and streamline checkout so the buying experience feels credible, fast, and aligned with how your customers prefer to pay.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7h18"></path><path d="M7 7v10"></path><path d="M12 7v10"></path><path d="M17 7v10"></path><path d="M5 17h14"></path></svg></div>
          <div class="feature-text">
            <h4>Catalog & Inventory Structure</h4>
            <p>From product variations to categories, filters, and stock behavior, we structure the store so it stays manageable for your team as the catalog expands.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 12h12"></path><path d="M12 6l6 6-6 6"></path></svg></div>
          <div class="feature-text">
            <h4>Growth-Ready Commerce Operations</h4>
            <p>Shipping rules, order handling, customer notifications, and reporting visibility are shaped so the store can support real day-to-day operations after launch.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="service-deep" id="saas" style="background: var(--off);">
    <div class="deep-inner reverse">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="5" width="16" height="14" rx="2"></rect><path d="M8 9h8"></path><path d="M8 13h5"></path><path d="M16 16h4"></path></svg></span> SaaS Application</div>
        <h2 class="deep-title">Software products shaped for <em>recurring growth</em></h2>
        <p class="deep-lead">SaaS products need more than a codebase. They need a strong product foundation for accounts, onboarding, recurring value, and the internal workflows that keep the platform usable as the customer base grows.</p>
        <p class="deep-lead">We build SaaS applications with product structure in mind from the start, so the platform supports real usage, clear operations, and future expansion instead of feeling stitched together later.</p>
        <div class="stack-pills">
          <span class="stack-pill">Laravel</span>
          <span class="stack-pill">Subscriptions</span>
          <span class="stack-pill">User Onboarding</span>
          <span class="stack-pill">Workspaces</span>
          <span class="stack-pill">Roles & Permissions</span>
          <span class="stack-pill">Admin Workflows</span>
          <span class="stack-pill">Analytics</span>
          <span class="stack-pill">APIs</span>
        </div>
        <div class="deep-cta-group">
          <a href="{{ route('site.services.saas-application') }}" class="deep-cta">Read More →</a>
          <a href="{{ route('site.start', ['services' => 'saas', 'source_page' => 'services-overview-saas', 'source_label' => 'Services Page']) }}" class="deep-cta">Start a SaaS Project →</a>
        </div>
      </div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l8 4.5v9L12 21l-8-4.5v-9L12 3z"></path><path d="M12 21v-9"></path><path d="M20 7.5l-8 4.5-8-4.5"></path></svg></div>
          <div class="feature-text">
            <h4>Product Architecture That Holds Up</h4>
            <p>We structure the application around the actual business model, user roles, and product logic so the platform can expand without constant rewrites.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg></div>
          <div class="feature-text">
            <h4>Onboarding Designed for Activation</h4>
            <p>Sign-up, first-run flows, and early product guidance are planned to help new users reach value quickly instead of dropping off after account creation.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="8" cy="8" r="3"></circle><circle cx="16" cy="8" r="3"></circle><path d="M3 20a5 5 0 0 1 10 0"></path><path d="M11 20a5 5 0 0 1 10 0"></path></svg></div>
          <div class="feature-text">
            <h4>Accounts, Teams & Permissions</h4>
            <p>We account for how users, teams, workspaces, and access rules should behave inside the product so administration stays clean as usage grows.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 4h10l2 3v11a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V7l2-3z"></path><path d="M9 12h6"></path><path d="M9 16h4"></path></svg></div>
          <div class="feature-text">
            <h4>Recurring Revenue Foundations</h4>
            <p>Subscription-ready structure, billing-aware workflows, and plan logic are considered early so monetization does not become an afterthought later.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V9"></path><path d="M10 19V5"></path><path d="M16 19v-7"></path><path d="M22 19V3"></path></svg></div>
          <div class="feature-text">
            <h4>Admin Visibility & Product Operations</h4>
            <p>We build the internal visibility needed to support customers, track activity, and manage the product operationally instead of relying on guesswork after launch.</p>
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
        <p class="deep-lead">We set up business email environments properly from the start, including mailbox creation, DNS authentication, migration readiness, and the security baseline required for dependable team communication.</p>
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
        <a href="{{ route('site.start', ['services' => 'email', 'source_page' => 'services-overview-email', 'source_label' => 'Services Page']) }}" class="deep-cta ghost">Set Up Business Email</a>
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

  <section class="service-deep" id="white-label">
    <div class="deep-inner">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="11" width="16" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg></span> White Label Services</div>
        <h2 class="deep-title">Your agency's output, under <em>your brand</em></h2>
        <p class="deep-lead">We build, design, and deliver digital work on behalf of agencies and consultancies — under your name, to your standards, with full NDA protection. Your clients never know we exist. Your team never gets stretched beyond capacity.</p>
        <p class="deep-lead">From a single overflow project to a long-term retainer, we operate as your invisible production partner across every service we offer — web, WordPress, Laravel, mobile, design, SEO, and maintenance.</p>
        <div class="stack-pills">
          <span class="stack-pill">NDA Protected</span>
          <span class="stack-pill">Your Branding Only</span>
          <span class="stack-pill">Web Design</span>
          <span class="stack-pill">WordPress</span>
          <span class="stack-pill">Laravel</span>
          <span class="stack-pill">UI/UX</span>
          <span class="stack-pill">SEO</span>
          <span class="stack-pill">Mobile Apps</span>
        </div>
        <br>
        <a href="{{ route('site.services.white-label') }}" class="deep-cta">Read More →</a>
        <a href="{{ route('site.start', ['services' => 'whitelabel', 'source_page' => 'services-overview-whitelabel', 'source_label' => 'Services Page']) }}" class="deep-cta ghost">Start a White Label Project</a>
      </div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="11" width="16" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg></div>
          <div class="feature-text">
            <h4>NDA on Every Engagement</h4>
            <p>We sign a non-disclosure agreement before any project brief is shared. Client names, project details, and IP are protected from day one — always.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></div>
          <div class="feature-text">
            <h4>Zero i2Medier Footprint</h4>
            <p>No branding, no metadata, no code comments with our name. What we produce is yours completely — indistinguishable from your own team's output.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div>
          <div class="feature-text">
            <h4>7 Service Lines Available</h4>
            <p>Web design, WordPress, Laravel, mobile apps, UI/UX, SEO, and maintenance — all available under your agency's name on any brief.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></div>
          <div class="feature-text">
            <h4>Project, Retainer, or Dedicated Team</h4>
            <p>One-off overflow projects, a monthly hours retainer with priority scheduling, or a named dedicated team embedded in your operations.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></div>
          <div class="feature-text">
            <h4>Fits Your Workflow</h4>
            <p>We adapt to your project management tool, file naming conventions, brief format, and communication cadence — not the other way around.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="service-deep" id="email-deliverability" style="background: var(--off);">
    <div class="deep-inner reverse">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v5c0 5 3.4 7.9 8 9 4.6-1.1 8-4 8-9V7Z"></path><path d="m9 12 2 2 4-4"></path></svg></span> Email Deliverability</div>
        <h2 class="deep-title">Emails that <em>reach the inbox</em></h2>
        <p class="deep-lead">If your emails are landing in spam, your domain is blacklisted, or open rates have dropped without explanation, the problem is deliverability. We diagnose the root cause and fix every layer: DNS authentication, sender reputation, infrastructure, and content signals.</p>
        <p class="deep-lead">From a one-time audit and fix to cold email infrastructure builds and ongoing reputation monitoring, we handle every type of deliverability problem — correctly, and in the right order.</p>
        <div class="stack-pills">
          <span class="stack-pill">SPF · DKIM · DMARC</span>
          <span class="stack-pill">Blacklist Removal</span>
          <span class="stack-pill">Domain Warm-Up</span>
          <span class="stack-pill">Cold Email Infra</span>
          <span class="stack-pill">DMARC Reporting</span>
          <span class="stack-pill">Reputation Monitoring</span>
        </div>
        <br>
        <a href="{{ route('site.services.email-deliverability') }}" class="deep-cta">Read More →</a>
        <a href="{{ route('site.start', ['services' => 'email-deliverability', 'source_page' => 'services-overview-email-deliverability', 'source_label' => 'Services Page']) }}" class="deep-cta ghost">Fix My Deliverability</a>
      </div>
      <div class="feature-list">
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v5c0 5 3.4 7.9 8 9 4.6-1.1 8-4 8-9V7Z"></path><path d="m9 12 2 2 4-4"></path></svg></div>
          <div class="feature-text">
            <h4>SPF, DKIM & DMARC Setup</h4>
            <p>Missing or broken authentication is the most common reason emails go to spam. We configure all three DNS records, test them, and verify enforcement so your domain passes every check.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18"></path><path d="M8 6V4h8v2"></path><path d="M6 6l1 14h10l1-14"></path></svg></div>
          <div class="feature-text">
            <h4>Blacklist Removal</h4>
            <p>We identify every active blacklist listing on your domain or sending IP, file removal requests, and monitor clearance across all major blacklist databases.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></div>
          <div class="feature-text">
            <h4>Cold Email Infrastructure</h4>
            <p>We set up dedicated sending domains with proper authentication and warm-up so cold outreach never damages the reputation of your primary business domain.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-4.2-4.2"></path><path d="M11 8v3l2 2"></path></svg></div>
          <div class="feature-text">
            <h4>Deliverability Audit</h4>
            <p>A full technical inspection of your sending setup: DNS authentication, blacklist status, spam score, inbox placement across major providers, and a written fix plan.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20h.01"></path><path d="M8 16a6 6 0 0 1 8 0"></path><path d="M5 12a11 11 0 0 1 14 0"></path><path d="M2 8a16 16 0 0 1 20 0"></path></svg></div>
          <div class="feature-text">
            <h4>Ongoing Reputation Monitoring</h4>
            <p>Monthly blacklist checks, DMARC report analysis, DNS change alerts, and a health summary so problems are caught and fixed before they affect delivery.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="service-deep" id="cloud" style="background: var(--white);">
    <div class="deep-inner">
      <div class="deep-sticky">
        <div class="deep-badge"><span class="deep-badge-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 17.5a4.5 4.5 0 0 0-1-8.9A6 6 0 0 0 7.2 7.5 4 4 0 0 0 7 15.5h13z"></path></svg></span> Cloud Architecture</div>
        <h2 class="deep-title">Infrastructure built to <em>scale</em></h2>
        <p class="deep-lead">At i2Medier Konceptz, we design cloud environments built for performance, stability, and long-term scalability. We architect systems that grow with your product — not ones that collapse under the weight of success.</p>
        <p class="deep-lead">Whether you're launching your first server or migrating a legacy system, we build cloud infrastructure that's cost-efficient, observable, and resilient by design.</p>
        <p class="deep-lead">Core deployment readiness, monitoring expectations, and operational discipline are part of the baseline. Advanced resilience and automation layers are introduced as the environment grows in complexity.</p>
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
        <a href="{{ route('site.start', ['services' => 'cloud', 'source_page' => 'services-overview-cloud', 'source_label' => 'Services Page']) }}" class="deep-cta ghost">Discuss Your Infrastructure</a>
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
    <a href="{{ route('site.start') }}" class="btn-dark">Start Your Project →</a>
  </section>
</div>
@endsection
