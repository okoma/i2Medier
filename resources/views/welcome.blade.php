@extends('public.layouts.app')

@section('title', 'i2Medier - Premium Digital Agency in Nigeria')

@push('meta')
<script type="application/ld+json">{!! json_encode([
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => ['Organization', 'LocalBusiness'],
            '@id' => url('/') . '#organization',
            'name' => 'i2Medier',
            'url' => url('/'),
            'description' => 'Premium digital agency delivering web design, WordPress development, Laravel applications, UI/UX design, business email setup, and website maintenance for businesses in Nigeria, the UK, and worldwide.',
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Port Harcourt',
                'addressRegion' => 'Rivers State',
                'addressCountry' => 'NG',
            ],
            'areaServed' => ['Nigeria', 'United Kingdom', 'Canada', 'United States'],
            'email' => 'letstalk@i2medier.com',
            'sameAs' => [
                'https://facebook.com/i2medier',
                'https://twitter.com/i2medier',
                'https://www.linkedin.com/company/i2medier',
                'https://www.instagram.com/i2medier',
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                '@id' => url('/') . '#services',
                'name' => 'Digital Services',
                'url' => route('site.services'),
                'itemListElement' => [
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Web Design and Development',
                            'description' => 'Custom business website design and development for brands that need fast, high-converting digital experiences.',
                            'url' => route('site.services.web-design'),
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'WordPress Development',
                            'description' => 'Custom WordPress website design, development, and implementation for businesses in Nigeria and worldwide.',
                            'url' => route('site.services.wordpress-development'),
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Laravel Development',
                            'description' => 'Custom Laravel web application development for portals, SaaS products, business systems, and APIs.',
                            'url' => route('site.services.laravel-development'),
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Mobile App Development',
                            'description' => 'Native and cross-platform mobile app development for startups and established businesses.',
                            'url' => route('site.services.mobile-app-development'),
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Search Optimization',
                            'description' => 'Technical SEO, on-page optimisation, and search visibility improvements for service businesses and digital products.',
                            'url' => route('site.services.search-optimization'),
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'UI and UX Design',
                            'description' => 'User interface and user experience design for websites, dashboards, SaaS products, and mobile applications.',
                            'url' => route('site.services.ui-ux-design'),
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Business Email Setup',
                            'description' => 'Professional business email setup with domain authentication, inbox deliverability, and team mailbox configuration.',
                            'url' => route('site.services.business-email-setup'),
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'White Label Web Services',
                            'description' => 'White label design and development support for agencies that need a reliable delivery partner.',
                            'url' => route('site.services.white-label'),
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Email Deliverability Services',
                            'description' => 'Email infrastructure audits, DNS alignment, inbox placement guidance, and deliverability troubleshooting.',
                            'url' => route('site.services.email-deliverability'),
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Website Maintenance',
                            'description' => 'Ongoing website care covering updates, backups, uptime monitoring, security checks, and support.',
                            'url' => route('site.services.website-maintenance'),
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'WordPress Maintenance',
                            'description' => 'Ongoing WordPress care plans for updates, security hardening, backups, monitoring, and performance support.',
                            'url' => route('site.services.wordpress-maintenance'),
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Cloud Architecture',
                            'description' => 'Cloud infrastructure planning and implementation for scalable, secure, and resilient digital platforms.',
                            'url' => route('site.services.cloud-architecture'),
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'SaaS Application Development',
                            'description' => 'SaaS product design and development for subscription platforms, internal tools, and software businesses.',
                            'url' => route('site.services.saas-application'),
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Ecommerce Website Development',
                            'description' => 'Custom ecommerce website design and development for online stores that need stronger conversion and operations.',
                            'url' => route('site.services.ecommerce-website'),
                        ],
                    ],
                ],
            ],
        ],
        [
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'How much does a website cost in Nigeria?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Website costs at i2Medier start from ₦150,000 for a basic business site and vary depending on complexity, features, and design requirements. We provide a free, itemised proposal within 24 hours of your enquiry — no vague estimates.'],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'How long does a website take to build?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Most business websites take 2–4 weeks from design sign-off to launch. Complex e-commerce or Laravel web applications take 6–12 weeks depending on the scope.'],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Do you offer website maintenance plans?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. Our monthly website care plans start from ₦35,000 and include updates, daily backups, 24/7 uptime monitoring, security scans, and a monthly written report. No annual lock-in.'],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Can i2Medier help with business email setup?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We configure custom domain email on Google Workspace, Microsoft 365, or Zoho — fully set up with SPF, DKIM, and DMARC records so your emails land in inboxes, not spam folders.'],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Do you work with clients outside Nigeria?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We work with clients in the UK, Canada, the US, and across Africa. All projects are managed remotely with clear communication, shared project tools, and regular video check-ins.'],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'What makes i2Medier different from other digital agencies?',
                    'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We cover the full digital lifecycle — strategy, design, development, email infrastructure, and ongoing maintenance — without subcontracting. You get one team, one point of contact, and consistent quality throughout.'],
                ],
            ],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@push('page_css')
    @vite('resources/css/public/pages/home.css')
@endpush

@push('scripts')
    @vite('resources/js/public/pages/home.js')
@endpush

@section('content')

<!-- ═══ HERO ═══ -->
<header class="home-hero" aria-label="i2Medier — Digital Agency Nigeria">
  <div class="home-hero-glow" aria-hidden="true"></div>
  <div class="home-hero-grid" aria-hidden="true"></div>

  <div class="hero-left">
    <div class="hero-eyebrow">
      <div class="hero-eyebrow-line"></div>
      <span class="hero-eyebrow-text">Digital Agency — Nigeria & Worldwide</span>
    </div>
    <h1>
      <span class="line"><span>We design,</span></span>
      <span class="line"><span>build & <em>maintain</em></span></span>
      <span class="line"><span>digital products.</span></span>
    </h1>
    <p class="hero-desc">From a blank canvas to a live, performant, secure web product — and everything in between. We are the full-service digital partner for businesses that take their online presence seriously.</p>
    <div class="hero-actions">
      <a href="{{ route('site.start', ['source_page' => 'home-hero', 'source_label' => 'Homepage Hero']) }}" class="btn-primary">Start a Project →</a>
      <a href="{{ route('portfolio.index') }}" class="btn-outline-white">See Our Work</a>
    </div>
    <div class="hero-meta">
      <div class="hero-meta-item">
        <div class="hero-meta-num"><span class="counter" data-target="8">0</span><span>+</span></div>
        <div class="hero-meta-label">Years Active</div>
      </div>
      <div class="hero-meta-div"></div>
      <div class="hero-meta-item">
        <div class="hero-meta-num"><span class="counter" data-target="200">0</span><span style="color:var(--gold)">+</span></div>
        <div class="hero-meta-label">Projects Delivered</div>
      </div>
      <div class="hero-meta-div"></div>
      <div class="hero-meta-item">
        <div class="hero-meta-num"><span style="color:var(--gold)">99.9</span><span>%</span></div>
        <div class="hero-meta-label">Avg Client Uptime</div>
      </div>
      <div class="hero-meta-div"></div>
      <div class="hero-meta-item">
        <div class="hero-meta-num"><span class="counter" data-target="4">0</span><span style="color:var(--gold)"> countries</span></div>
        <div class="hero-meta-label">Clients Served</div>
      </div>
    </div>
  </div>

  <!-- Floating project mosaic -->
  <div class="hero-right" aria-hidden="true">
    <div class="mosaic">

      <!-- Main browser card -->
      <div class="mc-browser">
        <span class="mc-tag"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a15 15 0 0 1 0 18"/><path d="M12 3a15 15 0 0 0 0 18"/></svg>WordPress Site</span>
        <div class="mc-browser-bar">
          <div class="mc-b-dot" style="background:#ff5f57"></div>
          <div class="mc-b-dot" style="background:#febc2e"></div>
          <div class="mc-b-dot" style="background:#28c840"></div>
          <div class="mc-b-addr"></div>
        </div>
        <div class="mc-site-nav">
          <div class="mc-site-logo"></div>
          <div class="mc-site-links"><div class="mc-sl"></div><div class="mc-sl"></div><div class="mc-sl"></div></div>
        </div>
        <div class="mc-site-hero">
          <div class="mc-h1"></div>
          <div class="mc-h2"></div>
          <div class="mc-hbtn"></div>
        </div>
        <div class="mc-content">
          <div class="mc-text m"></div>
          <div class="mc-text"></div>
          <div class="mc-text s"></div>
        </div>
        <div class="mc-cards" style="padding:.5rem .85rem .75rem">
          <div class="mc-card-sm"></div>
          <div class="mc-card-sm"></div>
          <div class="mc-card-sm"></div>
        </div>
      </div>

      <!-- Uptime stat card -->
      <div class="mc-stat">
        <div class="mc-stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 21 6-6"/><path d="m10 7 7-3 3 7-7 3z"/><path d="m14 10 4 4"/><path d="M12 14 8 10"/><path d="M4 21h6"/></svg></div>
        <div class="mc-stat-val">99.98%</div>
        <div class="mc-stat-label">Uptime · Last 30 Days</div>
        <div class="mc-stat-bar"><div class="mc-stat-bar-fill" style="width:99.98%"></div></div>
      </div>

      <!-- Figma design card -->
      <div class="mc-design">
        <div class="mc-design-bar">
          <div class="mc-d-dot" style="background:#ff5f57"></div>
          <div class="mc-d-dot" style="background:#febc2e"></div>
          <div class="mc-d-dot" style="background:#28c840"></div>
          <div style="flex:1;text-align:center;font-size:.5rem;color:rgba(255,255,255,.25);font-family:var(--mono)">UI Design · Figma</div>
        </div>
        <div class="mc-design-canvas">
          <div class="mc-d-frame">
            <div class="mc-d-line"></div>
            <div class="mc-d-line acc"></div>
            <div class="mc-d-line" style="width:35%"></div>
          </div>
          <div class="mc-d-frame">
            <div class="mc-d-line" style="width:70%"></div>
            <div class="mc-d-line" style="width:50%"></div>
          </div>
        </div>
        <div class="mc-d-label">247 components · Design System</div>
      </div>

      <!-- Email card -->
      <div class="mc-email">
        <div class="mc-email-from">ceo@yourbusiness.com</div>
        <div class="mc-email-subject">Proposal accepted <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m5 12 4 4L19 6"/></svg></div>
        <div class="mc-email-preview">Great work on the project — the team is impressed…</div>
        <div class="mc-email-badge"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><circle cx="12" cy="12" r="6"/></svg> Inbox · Not Spam</div>
      </div>

      <!-- Uptime pill -->
      <div class="mc-uptime">
        <div class="mc-uptime-dot"></div>
        <span class="mc-uptime-text">All sites operational &nbsp;</span>
        <span class="mc-uptime-val">↑</span>
      </div>

    </div>
  </div>
</header>



<!-- ═══ ABOUT / POSITIONING ═══ -->
<section class="about-band" aria-labelledby="about-heading">
  <div class="about-left reveal">
    <span class="about-label">Who We Are</span>
    <h2 id="about-heading">A digital studio that builds things that work.</h2>
  </div>
  <div class="about-right">
    <p class="about-p reveal">We are <strong>i2Medier</strong> — a premium digital agency based in Nigeria, working with clients across Africa, the UK, and North America. We design and build web products with the same attention to craft, performance, and longevity that the best studios in the world bring to every project.</p>
    <p class="about-p reveal">Our work covers the full lifecycle of a digital product: <strong>strategy and UX research</strong>, <strong>visual design in Figma</strong>, <strong>engineering in WordPress and Laravel</strong>, <strong>email infrastructure setup</strong>, and <strong>ongoing maintenance</strong> once your product is live. You can engage us for a single service or hand us the entire brief — either way, you get a team that treats your business outcomes as the measure of success, not just pixel perfection.</p>
    <div class="about-divider reveal"></div>
    <div class="about-stats reveal">
      <div>
        <div class="about-stat-num"><span class="counter" data-target="200">0</span><span>+</span></div>
        <div class="about-stat-label">Projects Delivered</div>
      </div>
      <div>
        <div class="about-stat-num"><span class="counter" data-target="120">0</span><span>+</span></div>
        <div class="about-stat-label">Active Care Plans</div>
      </div>
      <div>
        <div class="about-stat-num"><span class="counter" data-target="8">0</span><span>+</span></div>
        <div class="about-stat-label">Years in Business</div>
      </div>
      <div>
        <div class="about-stat-num"><span class="counter" data-target="4">0</span></div>
        <div class="about-stat-label">Countries Served</div>
      </div>
    </div>
  </div>
</section>


<!-- ═══ SERVICES ═══ -->
<section class="home-services-section" aria-labelledby="services-heading">
  <div class="home-services-header reveal">
    <div>
      <span class="section-label">What We Do</span>
      <h2 id="services-heading">Everything your digital<br>product needs to <em>thrive</em></h2>
    </div>
    <p class="sh-right">We are deliberately focused — six core services, all delivered to the same standard of precision and craft. No stretched capability, no subcontracted surprises.</p>
  </div>
  <div class="home-services-grid">

    <a href="{{ route('site.services.wordpress-development') }}" class="hsvc-card reveal">
      <div class="hsvc-num">01</div>
      <div class="hsvc-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a15 15 0 0 1 0 18"/><path d="M12 3a15 15 0 0 0 0 18"/></svg></div>
      <div class="hsvc-title">WordPress Development</div>
      <p class="hsvc-desc">Custom WordPress sites built without page builders — fast, secure, and engineered exactly to your brief. From simple brochure sites to complex multi-role portals with WooCommerce.</p>
      <div class="hsvc-tags"><span class="hsvc-tag">Custom Themes</span><span class="hsvc-tag">WooCommerce</span><span class="hsvc-tag">ACF</span><span class="hsvc-tag">Performance</span></div>
      <span class="hsvc-arrow">Learn more <span>→</span></span>
    </a>

    <a href="{{ route('site.services.ui-ux-design') }}" class="hsvc-card reveal">
      <div class="hsvc-num">02</div>
      <div class="hsvc-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 0-4h-1a2 2 0 0 1 0-4h3a4 4 0 0 0 0-8Z"/><circle cx="7.5" cy="10.5" r="1"/><circle cx="9.5" cy="7.5" r="1"/><circle cx="14.5" cy="7.5" r="1"/></svg></div>
      <div class="hsvc-title">UI / UX Design</div>
      <p class="hsvc-desc">Research-grounded Figma designs for web and mobile — wireframes to high-fidelity screens, interactive prototypes, design systems, and developer-ready handoff files.</p>
      <div class="hsvc-tags"><span class="hsvc-tag">Figma</span><span class="hsvc-tag">Design Systems</span><span class="hsvc-tag">Prototyping</span><span class="hsvc-tag">UX Research</span></div>
      <span class="hsvc-arrow">Learn more <span>→</span></span>
    </a>

    <a href="{{ route('site.services.laravel-development') }}" class="hsvc-card reveal">
      <div class="hsvc-num">03</div>
      <div class="hsvc-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 5h14v14H5z"/><path d="M9 8v8"/><path d="M15 8v8"/><path d="M8 12h8"/></svg></div>
      <div class="hsvc-title">Laravel Development</div>
      <p class="hsvc-desc">Custom web applications, APIs, and backend systems built with Laravel. Clean architecture, proper testing, well-documented code, and deployment pipelines your team can maintain.</p>
      <div class="hsvc-tags"><span class="hsvc-tag">Laravel</span><span class="hsvc-tag">REST API</span><span class="hsvc-tag">MySQL</span><span class="hsvc-tag">Queue Jobs</span></div>
      <span class="hsvc-arrow">Learn more <span>→</span></span>
    </a>

    <a href="{{ route('site.services.website-maintenance') }}" class="hsvc-card reveal">
      <div class="hsvc-num">04</div>
      <div class="hsvc-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3 5 6v6c0 5 3.5 7.5 7 9 3.5-1.5 7-4 7-9V6l-7-3Z"/><path d="m9 12 2 2 4-4"/></svg></div>
      <div class="hsvc-title">Website Maintenance</div>
      <p class="hsvc-desc">Monthly care plans for WordPress, Laravel, and custom web apps — updates, daily backups, 24/7 uptime monitoring, security scans, and a written report every month.</p>
      <div class="hsvc-tags"><span class="hsvc-tag">WordPress</span><span class="hsvc-tag">Laravel</span><span class="hsvc-tag">Uptime</span><span class="hsvc-tag">Backups</span></div>
      <span class="hsvc-arrow">Learn more <span>→</span></span>
    </a>

    <a href="{{ route('site.services.business-email-setup') }}" class="hsvc-card reveal">
      <div class="hsvc-num">05</div>
      <div class="hsvc-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg></div>
      <div class="hsvc-title">Business Email Setup</div>
      <p class="hsvc-desc">Custom domain email on Google Workspace, Microsoft 365, or Zoho — fully configured with SPF, DKIM, and DMARC so your emails land in inboxes, not spam folders.</p>
      <div class="hsvc-tags"><span class="hsvc-tag">Google Workspace</span><span class="hsvc-tag">Microsoft 365</span><span class="hsvc-tag">Zoho</span><span class="hsvc-tag">DNS</span></div>
      <span class="hsvc-arrow">Learn more <span>→</span></span>
    </a>

    <a href="{{ route('site.services.search-optimization') }}" class="hsvc-card reveal">
      <div class="hsvc-num">06</div>
      <div class="hsvc-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg></div>
      <div class="hsvc-title">SEO & Performance</div>
      <p class="hsvc-desc">On-page SEO, schema markup, Core Web Vitals optimisation, and page speed improvements that help your site rank higher and load faster — for both search engines and real users.</p>
      <div class="hsvc-tags"><span class="hsvc-tag">On-Page SEO</span><span class="hsvc-tag">Schema</span><span class="hsvc-tag">Core Web Vitals</span><span class="hsvc-tag">Speed</span></div>
      <span class="hsvc-arrow">Learn more <span>→</span></span>
    </a>

  </div>
</section>


<!-- ═══ NUMBERS ═══ -->
<section class="numbers-band" aria-label="Key statistics">
  <div class="numbers-inner">
    <div class="nb-item reveal">
      <div class="nb-num"><span class="counter" data-target="200">0</span><span>+</span></div>
      <div class="nb-label">Projects Delivered</div>
      <div class="nb-sub">Across web design, development, and digital strategy — for clients in Nigeria, the UK, Canada, and the US.</div>
    </div>
    <div class="nb-item reveal">
      <div class="nb-num"><span class="counter" data-target="99">0</span><span style="color:var(--gold)">%</span></div>
      <div class="nb-label">Client Retention Rate</div>
      <div class="nb-sub">Most of our clients have been with us for multiple projects — a number we are proud of and work to maintain.</div>
    </div>
    <div class="nb-item reveal">
      <div class="nb-num"><span style="color:var(--gold)">from </span><span>₦35k</span></div>
      <div class="nb-label">Maintenance Plans Start</div>
      <div class="nb-sub">Transparent, monthly pricing with no annual lock-in. You pay for exactly what your site needs, nothing more.</div>
    </div>
    <div class="nb-item reveal">
      <div class="nb-num"><span class="counter" data-target="24">0</span><span style="color:var(--gold)">hr</span></div>
      <div class="nb-label">Average Turnaround on Quotes</div>
      <div class="nb-sub">We respond to every project enquiry with a detailed, itemised proposal within 24 hours of your first message.</div>
    </div>
  </div>
</section>


<!-- ═══ SELECTED WORK ═══ -->
<section class="work-section" aria-labelledby="work-heading">
  <div class="work-header reveal">
    <div>
      <span class="section-label">Selected Work</span>
      <h2 id="work-heading">Projects we are<br>proud to stand behind</h2>
    </div>
    <p>A handful of the projects from our portfolio that best demonstrate what we mean when we say we build digital products that work. Measurable outcomes, every time.</p>
  </div>
  <div class="work-grid">

    <!-- Project 1: E-Commerce -->
    <div class="work-card reveal">
      <div class="wc-visual" style="background:#f7f6f2">
        <div class="wc-visual-inner">
          <div class="wp-mock">
            <div class="wp-mock-nav">
              <div class="wp-mock-logo"></div>
              <div class="wp-mock-links"><div class="wp-mock-link"></div><div class="wp-mock-link"></div><div class="wp-mock-link"></div></div>
            </div>
            <div class="wp-mock-hero">
              <div class="wp-mock-h1"></div>
              <div class="wp-mock-h2"></div>
              <div class="wp-mock-btn"></div>
            </div>
            <div class="wp-mock-body">
              <div class="wp-mock-line m"></div>
              <div class="wp-mock-line"></div>
              <div class="wp-mock-line s"></div>
            </div>
            <div class="wp-mock-cards" style="padding:.4rem .5rem .6rem">
              <div class="wp-mock-card"></div>
              <div class="wp-mock-card"></div>
              <div class="wp-mock-card"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="wc-content">
        <div>
          <div class="wc-type">WooCommerce · E-Commerce</div>
          <h3 class="wc-title">Kola Market — Full E-Commerce Redesign</h3>
          <p class="wc-desc">Complete WooCommerce rebuild for a Lagos food marketplace — custom theme from scratch, product catalogue migration, Paystack payment integration, and a new UX flow that reduced cart abandonment by over 40%.</p>
        </div>
        <div>
          <div class="wc-meta">
            <div class="wc-metric"><div class="wc-metric-val">+<span>64</span>%</div><div class="wc-metric-label">Conversion Rate</div></div>
            <div class="wc-metric"><div class="wc-metric-val"><span>1.2</span>s</div><div class="wc-metric-label">Page Load Time</div></div>
          </div>
          <div class="wc-tags"><span class="wc-tag">WordPress</span><span class="wc-tag">WooCommerce</span><span class="wc-tag">Paystack</span><span class="wc-tag">Custom Theme</span></div>
          <a href="{{ route('portfolio.index') }}" class="wc-link">View Portfolio <span class="wc-link-arr">→</span></a>
        </div>
      </div>
    </div>

    <!-- Project 2: Laravel App (dark) -->
    <div class="work-card dark reveal">
      <div class="wc-content">
        <div>
          <div class="wc-type">Laravel · Web Application</div>
          <h3 class="wc-title">Rubixx Logistics — Operations Platform</h3>
          <p class="wc-desc">A full-stack Laravel application for a Port Harcourt logistics company — real-time shipment tracking, driver assignment, client portal, invoice generation, and a comprehensive admin dashboard with role-based access for 4 staff levels.</p>
        </div>
        <div>
          <div class="wc-meta">
            <div class="wc-metric"><div class="wc-metric-val">3.<span>8</span>×</div><div class="wc-metric-label">Ops Efficiency Gain</div></div>
            <div class="wc-metric"><div class="wc-metric-val">-<span>58</span>%</div><div class="wc-metric-label">Manual Data Entry</div></div>
          </div>
          <div class="wc-tags"><span class="wc-tag">Laravel</span><span class="wc-tag">MySQL</span><span class="wc-tag">REST API</span><span class="wc-tag">Real-Time</span></div>
          <a href="{{ route('portfolio.index') }}" class="wc-link">View Portfolio <span class="wc-link-arr">→</span></a>
        </div>
      </div>
      <div class="wc-visual" style="background:#0d1117">
        <div class="wc-visual-inner">
          <div class="app-mock">
            <div class="app-mock-nav">
              <div class="app-mock-logo"></div>
              <div class="app-bar"><div class="app-bar-dot"></div><div class="app-bar-dot"></div><div class="app-bar-dot"></div></div>
            </div>
            <div class="app-mock-body">
              <div class="app-mock-side">
                <div class="app-side-item active"></div>
                <div class="app-side-item"></div>
                <div class="app-side-item"></div>
                <div class="app-side-item"></div>
              </div>
              <div class="app-mock-main">
                <div class="app-stat-row">
                  <div class="app-stat"></div>
                  <div class="app-stat"></div>
                  <div class="app-stat"></div>
                </div>
                <div class="app-chart">
                  <div class="app-bar-chart" style="height:45%"></div>
                  <div class="app-bar-chart" style="height:70%"></div>
                  <div class="app-bar-chart" style="height:55%"></div>
                  <div class="app-bar-chart" style="height:85%"></div>
                  <div class="app-bar-chart" style="height:60%"></div>
                  <div class="app-bar-chart" style="height:90%"></div>
                  <div class="app-bar-chart" style="height:75%"></div>
                </div>
                <div class="app-stat-row"><div class="app-stat" style="flex:2"></div><div class="app-stat"></div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Project 3: Maintenance -->
    <div class="work-card reveal">
      <div class="wc-visual" style="background:#0d0d0d">
        <div class="wc-visual-inner">
          <div class="maint-mock">
            <div class="maint-bar">
              <span class="maint-bar-title">i2Medier Care · Live</span>
              <span class="maint-bar-status"><div class="maint-bar-dot"></div>Operational</span>
            </div>
            <div class="maint-body">
              <div class="maint-stat-row">
                <div class="maint-stat"><div class="maint-stat-val">99.9%</div><div class="maint-stat-lab">Uptime</div></div>
                <div class="maint-stat"><div class="maint-stat-val">0</div><div class="maint-stat-lab">Threats</div></div>
                <div class="maint-stat"><div class="maint-stat-val"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m5 12 4 4L19 6"/></svg></div><div class="maint-stat-lab">Backup</div></div>
              </div>
              <div class="maint-bars">
                <div class="maint-b" style="height:70%"></div>
                <div class="maint-b" style="height:85%"></div>
                <div class="maint-b" style="height:60%"></div>
                <div class="maint-b" style="height:90%"></div>
                <div class="maint-b" style="height:75%"></div>
                <div class="maint-b" style="height:95%"></div>
                <div class="maint-b" style="height:80%"></div>
                <div class="maint-b" style="height:88%"></div>
              </div>
              <div class="maint-scan-row">
                <div class="maint-scan-item"><span class="msc-label">SSL Certificate</span><span class="msc-val">Valid <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m5 12 4 4L19 6"/></svg></span></div>
                <div class="maint-scan-item"><span class="msc-label">Core Updates</span><span class="msc-val">Current <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m5 12 4 4L19 6"/></svg></span></div>
                <div class="maint-scan-item"><span class="msc-label">Malware Scan</span><span class="msc-val">Clean <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m5 12 4 4L19 6"/></svg></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="wc-content">
        <div>
          <div class="wc-type">Website Maintenance · 18 Months</div>
          <h3 class="wc-title">Ongoing Web Care — Growth Plan</h3>
          <p class="wc-desc">Eighteen months of zero security incidents, weekly staged updates, daily off-site backups, and a site health score that has never dropped below 94. This is what ongoing care looks like when it is done properly.</p>
        </div>
        <div>
          <div class="wc-meta">
            <div class="wc-metric"><div class="wc-metric-val"><span>0</span></div><div class="wc-metric-label">Security Incidents</div></div>
            <div class="wc-metric"><div class="wc-metric-val">+<span>38</span>%</div><div class="wc-metric-label">Core Web Vitals</div></div>
          </div>
          <div class="wc-tags"><span class="wc-tag">WordPress</span><span class="wc-tag">Care Plan</span><span class="wc-tag">Monitoring</span><span class="wc-tag">Security</span></div>
          <a href="{{ route('portfolio.index') }}" class="wc-link">View Portfolio <span class="wc-link-arr">→</span></a>
        </div>
      </div>
    </div>

  </div>

  <div style="margin-top:2.5rem;text-align:center">
    <a href="{{ route('portfolio.index') }}" class="view-all-link">View All Work →</a>
  </div>
</section>


<!-- ═══ PROCESS ═══ -->
<section class="process-band" aria-labelledby="process-heading">
  <div class="process-header-row reveal">
    <div>
      <span class="section-label">How We Work</span>
      <h2 id="process-heading">A clear process.<br>No surprises.</h2>
    </div>
    <p>Every project follows the same disciplined four-stage process — whether it is a one-week email setup or a six-month product build. You always know where things stand and what comes next.</p>
  </div>
  <div class="process-steps-row">
    <div class="process-step reveal">
      <div class="ps-step-num">01</div>
      <div class="ps-step-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg></div>
      <h3 class="ps-step-title">Discover & Scope</h3>
      <p class="ps-step-desc">We start with a free discovery call to understand your business, goals, and constraints. You receive a detailed, itemised proposal within 24 hours — scope, timeline, and pricing, all in writing.</p>
    </div>
    <div class="process-step reveal">
      <div class="ps-step-num">02</div>
      <div class="ps-step-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 0-4h-1a2 2 0 0 1 0-4h3a4 4 0 0 0 0-8Z"/><circle cx="7.5" cy="10.5" r="1"/><circle cx="9.5" cy="7.5" r="1"/><circle cx="14.5" cy="7.5" r="1"/></svg></div>
      <h3 class="ps-step-title">Design & Plan</h3>
      <p class="ps-step-desc">For design-led projects, we research, wireframe, and design before any code is written. For development-first work, we plan the architecture, set up environments, and establish the project rhythm.</p>
    </div>
    <div class="process-step reveal">
      <div class="ps-step-num">03</div>
      <div class="ps-step-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1 1 0 0 0 .2 1.1l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1 1 0 0 0-1.1-.2 1 1 0 0 0-.6.9V20a2 2 0 1 1-4 0v-.2a1 1 0 0 0-.7-.9 1 1 0 0 0-1 .2l-.2.1a2 2 0 1 1-2.8-2.8l.1-.1a1 1 0 0 0 .2-1.1 1 1 0 0 0-.9-.6H4a2 2 0 1 1 0-4h.2a1 1 0 0 0 .9-.7 1 1 0 0 0-.2-1l-.1-.2a2 2 0 1 1 2.8-2.8l.1.1a1 1 0 0 0 1.1.2H9a1 1 0 0 0 .6-.9V4a2 2 0 1 1 4 0v.2a1 1 0 0 0 .7.9 1 1 0 0 0 1-.2l.2-.1a2 2 0 1 1 2.8 2.8l-.1.1a1 1 0 0 0-.2 1.1V9c0 .4.2.7.6.9H20a2 2 0 1 1 0 4h-.2a1 1 0 0 0-.9.7Z"/></svg></div>
      <h3 class="ps-step-title">Build & Test</h3>
      <p class="ps-step-desc">We build in weekly sprints with regular progress updates. Nothing ships to production without testing — cross-browser, performance, security, and accessibility checks are standard, not optional.</p>
    </div>
    <div class="process-step reveal">
      <div class="ps-step-num">04</div>
      <div class="ps-step-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 19c3-1 5-3 6-6 2-1 4-3 5-5 1.5-2 2-4.5 2-7-2.5 0-5 .5-7 2-2 1-4 3-5 5-3 1-5 3-6 6 2.2.3 4.4-.2 6-1Z"/><path d="M15 9l-6 6"/><path d="M9 19c0 1.7-1.3 3-3 3 .2-1.8.8-3.1 2-4 .4-.3.7-.6 1-1Z"/></svg></div>
      <h3 class="ps-step-title">Launch & Maintain</h3>
      <p class="ps-step-desc">We handle the launch, monitor closely in the first 30 days, and offer ongoing maintenance care plans to keep your product performing at its best long after the build is done.</p>
    </div>
  </div>
</section>


<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <div class="test-header reveal">
    <div>
      <span class="section-label">Client Testimonials</span>
      <h2 id="test-heading">What clients say<br>about working with us</h2>
    </div>
    <p>We measure our success by the outcomes our clients achieve and by the relationships we build along the way. Here is what some of them have to say.</p>
  </div>
  <div class="test-grid">

    <div class="test-card dark-card reveal">
      <div class="test-stars">★★★★★</div>
      <p class="test-quote">"i2Medier built our entire operations platform from scratch — a Laravel app managing 30+ drivers and hundreds of daily deliveries. They delivered on time, within budget, and the codebase is clean enough that our in-house developer can actually maintain it. That last part is rare."</p>
      <div class="test-author">
        <div class="test-avatar">TE</div>
        <div>
          <div class="test-name">Tobilola Eze</div>
          <div class="test-role">CTO, Rubixx Logistics · Lagos</div>
        </div>
      </div>
    </div>

    <div class="test-card reveal">
      <div class="test-stars">★★★★★</div>
      <p class="test-quote">"We had used three other agencies before i2Medier. The difference was immediately obvious — they asked questions the others never thought to ask, they showed us Figma designs before touching the code, and the final site is exactly what we imagined. Our enquiry rate tripled within two months."</p>
      <div class="test-author">
        <div class="test-avatar">SA</div>
        <div>
          <div class="test-name">Samuel Agbor</div>
          <div class="test-role">Director, Agbor & Co. Legal · Port Harcourt</div>
        </div>
      </div>
    </div>

    <div class="test-card reveal">
      <div class="test-stars">★★★★★</div>
      <p class="test-quote">"The maintenance plan is the best money we spend on digital every month. I used to spend half my Mondays dealing with plugin update fallout. Now I open the monthly report, see everything was handled, and get back to running my business. It genuinely feels like we have an in-house tech team."</p>
      <div class="test-author">
        <div class="test-avatar">NC</div>
        <div>
          <div class="test-name">Ngozi Chukwu</div>
          <div class="test-role">Founder, Kola Market · Enugu</div>
        </div>
      </div>
    </div>

  </div>
</section>


<!-- ═══ IN-HOUSE PRODUCTS ═══ -->
<section class="products-section" aria-labelledby="products-heading">
  <div class="products-header reveal">
    <div>
      <span class="section-label">In-House Products</span>
      <h2 id="products-heading">Tools we <em>built</em> ourselves</h2>
    </div>
    <p>Beyond client work, we build and maintain our own digital products — proof that we eat our own cooking.</p>
  </div>
  <div class="prod-grid">

    <div class="prod-card reveal">
      <div class="prod-thumb" style="background:linear-gradient(135deg,#667eea 0%,#764ba2 100%)">
        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="margin-bottom:.5rem"><svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M12 12v4"/><path d="M10 14h4"/></svg></div>
            <div style="font-family:var(--serif);font-size:1.1rem;font-weight:700">Your Career<br>Starts Here</div>
          </div>
        </div>
      </div>
      <div class="prod-body">
        <div class="prod-name">Careerclev — Resume Platform</div>
        <p class="prod-desc">A lightweight career tool that helps users generate professional resumes in minutes.</p>
        <div class="prod-tags">
          <span class="prod-tag">Laravel</span>
          <span class="prod-tag">Livewire</span>
          <span class="prod-tag">TailwindCSS</span>
        </div>
      </div>
    </div>

    <div class="prod-card reveal">
      <div class="prod-thumb" style="background:linear-gradient(135deg,#11998e 0%,#38ef7d 100%)">
        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="margin-bottom:.5rem"><svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s7-5.5 7-11a7 7 0 1 0-14 0c0 5.5 7 11 7 11Z"/><circle cx="12" cy="10" r="2.5"/></svg></div>
            <div style="font-family:var(--serif);font-size:1rem;font-weight:700">Find Nigerian<br>Businesses Near You</div>
          </div>
        </div>
      </div>
      <div class="prod-body">
        <div class="prod-name">Yb Local — Business Listing</div>
        <p class="prod-desc">A production platform that handles real users, real data, and real business interactions across Nigeria.</p>
        <div class="prod-tags">
          <span class="prod-tag">Laravel</span>
          <span class="prod-tag">Filament</span>
          <span class="prod-tag">Livewire</span>
        </div>
      </div>
    </div>

    <div class="prod-card reveal">
      <div class="prod-thumb" style="background:linear-gradient(135deg,#f7971e 0%,#ffd200 100%)">
        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center">
          <div style="text-align:center;color:#1a1a1a;padding:1.5rem">
            <div style="margin-bottom:.5rem"><svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#1a1a1a" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m2 9 10-5 10 5-10 5L2 9Z"/><path d="M6 11.5V16c2.8 2 8.2 2 11 0v-4.5"/><path d="M22 10v6"/></svg></div>
            <div style="font-family:var(--serif);font-size:1rem;font-weight:700">Instantly Calculate<br>Your GPA Online</div>
          </div>
        </div>
      </div>
      <div class="prod-body">
        <div class="prod-name">GPA Calculation Tools</div>
        <p class="prod-desc">A powerful academic utility tool used by students across different grading systems and universities.</p>
        <div class="prod-tags">
          <span class="prod-tag">WordPress</span>
          <span class="prod-tag">Custom Theme</span>
          <span class="prod-tag">JavaScript</span>
        </div>
      </div>
    </div>

  </div>
</section>


<!-- ═══ TECH STRIP ═══ -->
<div class="tech-strip" aria-label="Technologies we work with">
  <div class="tech-strip-head">Technologies &amp; Platforms We Work With</div>
  <div class="tech-strip-grid">
    <div class="tech-pill"><span class="tech-pill-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a15 15 0 0 1 0 18"/><path d="M12 3a15 15 0 0 0 0 18"/></svg></span><span class="tech-pill-name">WordPress</span></div>
    <div class="tech-pill"><span class="tech-pill-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 5h14v14H5z"/><path d="M9 8v8"/><path d="M15 8v8"/><path d="M8 12h8"/></svg></span><span class="tech-pill-name">Laravel</span></div>
    <div class="tech-pill"><span class="tech-pill-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 4h10l4 8-4 8H7l-4-8 4-8Z"/><path d="M9 8h6"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span><span class="tech-pill-name">CodeIgniter</span></div>
    <div class="tech-pill"><span class="tech-pill-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="2.5"/><path d="M12 2.5c2.3 0 4.3 1.1 5.5 2.8"/><path d="M21.5 12c0 2.3-1.1 4.3-2.8 5.5"/><path d="M12 21.5c-2.3 0-4.3-1.1-5.5-2.8"/><path d="M2.5 12c0-2.3 1.1-4.3 2.8-5.5"/><path d="M5.8 5.8 9.4 9.4"/><path d="m14.6 14.6 3.6 3.6"/><path d="m18.2 5.8-3.6 3.6"/><path d="m9.4 14.6-3.6 3.6"/></svg></span><span class="tech-pill-name">React / Next.js</span></div>
    <div class="tech-pill"><span class="tech-pill-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 0-4h-1a2 2 0 0 1 0-4h3a4 4 0 0 0 0-8Z"/><circle cx="7.5" cy="10.5" r="1"/><circle cx="9.5" cy="7.5" r="1"/><circle cx="14.5" cy="7.5" r="1"/></svg></span><span class="tech-pill-name">Figma</span></div>
    <div class="tech-pill"><span class="tech-pill-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="20" r="1.5"/><circle cx="18" cy="20" r="1.5"/><path d="M5 5h2l2.2 9.5a1 1 0 0 0 1 .8h7.8a1 1 0 0 0 1-.8L21 8H8"/></svg></span><span class="tech-pill-name">WooCommerce</span></div>
    <div class="tech-pill"><span class="tech-pill-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg></span><span class="tech-pill-name">Google Workspace</span></div>
    <div class="tech-pill"><span class="tech-pill-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 5h16v14H4z"/><path d="M8 9h8"/><path d="M8 13h8"/><path d="M8 17h5"/></svg></span><span class="tech-pill-name">Microsoft 365</span></div>
    <div class="tech-pill"><span class="tech-pill-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><ellipse cx="12" cy="6" rx="6.5" ry="2.5"/><path d="M5.5 6v6c0 1.4 2.9 2.5 6.5 2.5s6.5-1.1 6.5-2.5V6"/><path d="M5.5 12v6c0 1.4 2.9 2.5 6.5 2.5s6.5-1.1 6.5-2.5v-6"/></svg></span><span class="tech-pill-name">PHP 8+</span></div>
    <div class="tech-pill"><span class="tech-pill-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><ellipse cx="12" cy="5" rx="7" ry="3"/><path d="M5 5v7c0 1.7 3.1 3 7 3s7-1.3 7-3V5"/><path d="M5 12v7c0 1.7 3.1 3 7 3s7-1.3 7-3v-7"/></svg></span><span class="tech-pill-name">MySQL / PostgreSQL</span></div>
    <div class="tech-pill"><span class="tech-pill-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 18h10a4 4 0 1 0-.8-7.9A6 6 0 0 0 5 11a4 4 0 0 0 2 7Z"/></svg></span><span class="tech-pill-name">cPanel / VPS</span></div>
    <div class="tech-pill"><span class="tech-pill-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 19c3-1 5-3 6-6 2-1 4-3 5-5 1.5-2 2-4.5 2-7-2.5 0-5 .5-7 2-2 1-4 3-5 5-3 1-5 3-6 6 2.2.3 4.4-.2 6-1Z"/><path d="M15 9l-6 6"/></svg></span><span class="tech-pill-name">Vercel / Netlify</span></div>
  </div>
</div>


<!-- ═══ FAQ ═══ -->
<section class="faq-section" aria-labelledby="faq-heading">
  <div class="faq-header reveal">
    <span class="section-label">Common Questions</span>
    <h2 id="faq-heading">Everything you need to know<br>before starting a project</h2>
  </div>
  <div class="faq-grid">
    <div class="faq-item reveal">
      <h3 class="faq-q">How much does a website cost in Nigeria?</h3>
      <p class="faq-a">Our websites start from ₦150,000 for a basic business site. The final cost depends on complexity, design requirements, and features. We send a free, itemised proposal within 24 hours — no vague estimates, no hidden fees.</p>
    </div>
    <div class="faq-item reveal">
      <h3 class="faq-q">How long does a website take to build?</h3>
      <p class="faq-a">Most business websites take 2–4 weeks from design sign-off to launch. Complex e-commerce or Laravel applications take 6–12 weeks depending on scope. We give you a clear timeline and stick to it.</p>
    </div>
    <div class="faq-item reveal">
      <h3 class="faq-q">Do you offer website maintenance plans?</h3>
      <p class="faq-a">Yes. Our monthly care plans start from ₦35,000 and cover WordPress or Laravel updates, daily backups, 24/7 uptime monitoring, security scans, and a monthly written report. No annual lock-in required.</p>
    </div>
    <div class="faq-item reveal">
      <h3 class="faq-q">Can you help with business email setup?</h3>
      <p class="faq-a">Absolutely. We configure custom domain email on Google Workspace, Microsoft 365, or Zoho — including SPF, DKIM, and DMARC records so your emails land in inboxes, not spam folders, every time.</p>
    </div>
    <div class="faq-item reveal">
      <h3 class="faq-q">Do you work with clients outside Nigeria?</h3>
      <p class="faq-a">Yes. We work with clients in the UK, Canada, the US, and across Africa. All projects are managed remotely with clear communication, shared project management tools, and regular video check-ins.</p>
    </div>
    <div class="faq-item reveal">
      <h3 class="faq-q">What makes i2Medier different from other agencies?</h3>
      <p class="faq-a">We cover the full digital lifecycle — strategy, design, development, email, and maintenance — without subcontracting. One team, one point of contact, consistent quality from brief to launch and beyond.</p>
    </div>
  </div>
</section>


<!-- ═══ CTA ═══ -->
<section class="home-cta-band" id="contact" aria-labelledby="cta-heading">
  <div class="cta-left reveal">
    <h2 id="cta-heading">Ready to build something<br>worth being proud of?</h2>
    <p>Tell us about your project and we will send you a detailed, honest proposal within 24 hours. No obligation, no sales pressure — just a straight answer about what your project needs and what it will cost.</p>
  </div>
  <div class="cta-right reveal">
    <a href="{{ route('site.start', ['source_page' => 'home-cta', 'source_label' => 'Homepage CTA']) }}" class="btn-cta-dark">Start a Project →</a>
    <a href="{{ route('site.services') }}" class="btn-cta-ghost">Browse All Services</a>
  </div>
</section>

@endsection
