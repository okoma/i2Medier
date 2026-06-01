@extends('public.layouts.app')

@section('title', 'Website Maintenance Services | i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/website-maintenance.css')
@endpush

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => url('/'),
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Services',
            'item' => route('site.services'),
        ],
        [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => 'Website Maintenance',
            'item' => route('site.services.website-maintenance'),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'What platforms do you maintain?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'We maintain websites and web applications built on WordPress, WooCommerce, Laravel, CodeIgniter, custom PHP, React, Next.js, and static HTML/CSS sites. If it runs on a web server, we can maintain it.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'What happens if my website goes down?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'We monitor your website around the clock with checks every 1 to 5 minutes. If your site goes down, our system alerts us immediately and we begin investigating. Growth and Agency plans include emergency response SLAs.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Do you maintain websites you did not build?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes. We take on maintenance for websites built by other developers or agencies. Before starting, we conduct a technical onboarding audit and resolve any pre-existing critical issues before moving into ongoing care.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'How often are backups taken?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Daily automated backups are included on all care plans. Backups cover both website files and databases, and are stored off-server on a secure remote location.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'What is included in the monthly maintenance report?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Every month you receive a written report covering updates applied, security scan results, uptime and incidents, backup status, performance metrics, and recommendations for the following month.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'How much does website maintenance cost in Nigeria?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Our care plans start from ₦35,000 per month for smaller brochure sites and scale based on platform complexity, traffic, and response requirements.',
            ],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const maintenanceObs = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const siblings = [...entry.target.parentElement.children].filter((child) => child.classList.contains('reveal'));
        const idx = siblings.indexOf(entry.target);
        entry.target.style.transitionDelay = (idx * 0.08) + 's';
        entry.target.classList.add('visible');
        maintenanceObs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.08 });

  document.querySelectorAll('.maintenance-page .reveal').forEach((el) => maintenanceObs.observe(el));

  function animateCounter(el) {
    const target = parseInt(el.dataset.target, 10);
    const step = Math.max(target / (1800 / 16), 0.1);
    let cur = 0;
    const timer = setInterval(() => {
      cur += step;
      if (cur >= target) {
        cur = target;
        clearInterval(timer);
      }
      el.textContent = Math.floor(cur);
    }, 16);
  }

  const counterObs = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        counterObs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  document.querySelectorAll('.maintenance-page .counter').forEach((el) => counterObs.observe(el));

  document.querySelectorAll('.maintenance-page .faq-q').forEach((btn) => {
    btn.addEventListener('click', () => {
      const id = btn.getAttribute('aria-controls');
      const answer = document.getElementById(id);
      const isOpen = btn.getAttribute('aria-expanded') === 'true';

      document.querySelectorAll('.maintenance-page .faq-q').forEach((item) => {
        item.setAttribute('aria-expanded', 'false');
        const target = document.getElementById(item.getAttribute('aria-controls'));
        if (target) {
          target.classList.remove('open');
        }
      });

      if (!isOpen && answer) {
        btn.setAttribute('aria-expanded', 'true');
        answer.classList.add('open');
      }
    });
  });
});
</script>
@endpush

@section('content')
<div class="maintenance-page">
  <header class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-left">
      <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
        <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
        <a href="{{ route('site.services') }}">Services</a><span class="breadcrumb-sep">›</span>
        <span aria-current="page">Website Maintenance</span>
      </div>
      <span class="hero-tag"><span class="hero-dot"></span> Website Maintenance</span>
      <h1>Your website, always<br>secure, fast, and<br><em>fully alive</em></h1>
      <p class="hero-sub">We handle every update, backup, security scan, and performance check your website needs so you never lose traffic, revenue, or credibility to a problem that should never have happened.</p>
      <div class="hero-btns">
        <a href="#contact" class="btn-white">Start a Care Plan →</a>
        <a href="#packages" class="btn-ghost">See Pricing</a>
      </div>
      <div class="hero-tags-row">
        <span class="hero-badge"><span class="hero-badge-dot"></span> WordPress & Laravel</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> 24/7 Uptime Monitoring</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Daily Off-Site Backups</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Monthly Report</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Emergency Response</span>
      </div>
    </div>

    <div class="hero-right">
      <div class="dash-wrap">
        <div class="floating-badge">🟢 All Systems Operational</div>
        <div class="dash-mock">
          <div class="dash-topbar">
            <div class="dt-dot red"></div>
            <div class="dt-dot yellow"></div>
            <div class="dt-dot green"></div>
            <span class="dt-title">i2Medier Care Dashboard · May 2026</span>
            <div class="dt-status"><div class="dt-pulse"></div> Live</div>
          </div>
          <div class="dash-body">
            <div class="dash-side">
              <div class="ds-head">Monitor</div>
              <div class="ds-item active"><div class="ds-item-dot dot-green"></div>Overview</div>
              <div class="ds-item"><div class="ds-item-dot"></div>Uptime</div>
              <div class="ds-item"><div class="ds-item-dot"></div>Security</div>
              <div class="ds-item"><div class="ds-item-dot"></div>Backups</div>
              <div class="ds-item"><div class="ds-item-dot"></div>Speed</div>
              <div class="ds-head mt">Reports</div>
              <div class="ds-item"><div class="ds-item-dot"></div>Monthly</div>
              <div class="ds-item"><div class="ds-item-dot"></div>Incidents</div>
              <div class="ds-head mt">Sites</div>
              <div class="ds-item"><div class="ds-item-dot dot-green"></div>All Sites</div>
            </div>

            <div class="dash-main">
              <div class="dm-stat-row">
                <div class="dm-stat">
                  <div class="dm-stat-label">Uptime</div>
                  <div class="dm-stat-val green">99.98<span class="stat-sub">%</span></div>
                  <div class="dm-stat-sub">Last 30 days</div>
                </div>
                <div class="dm-stat">
                  <div class="dm-stat-label">Resp. Time</div>
                  <div class="dm-stat-val gold">312<span class="stat-sub">ms</span></div>
                  <div class="dm-stat-sub">Avg. this month</div>
                </div>
                <div class="dm-stat">
                  <div class="dm-stat-label">Threats</div>
                  <div class="dm-stat-val green">0</div>
                  <div class="dm-stat-sub">Blocked this week</div>
                </div>
              </div>

              <div class="dm-chart-block">
                <div class="dm-chart-head">
                  <span class="dm-chart-title">Response Time · 30 Days</span>
                  <div class="dm-chart-legend">
                    <div class="dm-leg"><div class="dm-leg-dot green"></div>Uptime</div>
                    <div class="dm-leg"><div class="dm-leg-dot gold"></div>Speed</div>
                  </div>
                </div>
                <div class="dm-chart-bars">
                  <div class="dm-bar green-82"></div>
                  <div class="dm-bar green-75"></div>
                  <div class="dm-bar green-88"></div>
                  <div class="dm-bar green-60"></div>
                  <div class="dm-bar green-95"></div>
                  <div class="dm-bar green-78"></div>
                  <div class="dm-bar gold-85"></div>
                  <div class="dm-bar green-70"></div>
                  <div class="dm-bar green-92"></div>
                  <div class="dm-bar green-88"></div>
                  <div class="dm-bar green-65"></div>
                  <div class="dm-bar green-80"></div>
                  <div class="dm-bar green-72"></div>
                  <div class="dm-bar green-90"></div>
                </div>
              </div>

              <div class="dm-sites">
                <div class="dm-sites-head">
                  <span>Website</span><span>Uptime</span><span>Speed</span><span>Status</span>
                </div>
                <div class="dm-site-row">
                  <span class="dm-site-name">apexsolutions.com</span>
                  <span class="dm-site-uptime">99.99%</span>
                  <span class="dm-site-speed">0.8s</span>
                  <span class="dm-site-badge ok">Healthy</span>
                </div>
                <div class="dm-site-row">
                  <span class="dm-site-name">greenpath.ng</span>
                  <span class="dm-site-uptime">100%</span>
                  <span class="dm-site-speed">1.1s</span>
                  <span class="dm-site-badge ok">Healthy</span>
                </div>
                <div class="dm-site-row">
                  <span class="dm-site-name">stratford.co.uk</span>
                  <span class="dm-site-uptime">99.95%</span>
                  <span class="dm-site-speed">1.4s</span>
                  <span class="dm-site-badge warn">Slow</span>
                </div>
              </div>
            </div>

            <div class="dash-scan">
              <div class="scan-head">Security Scan</div>
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 10V7a5 5 0 0 1 10 0v3"/><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M12 14v2"/></svg></span><span class="scan-label">SSL Valid</span><span class="scan-val ok"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg></span></div>
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v5c0 4.5-3 7.5-7 10-4-2.5-7-5.5-7-10V6l7-3Z"/></svg></span><span class="scan-label">Firewall</span><span class="scan-val ok">On</span></div>
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"/><path d="m20 20-4.2-4.2"/></svg></span><span class="scan-label">Malware</span><span class="scan-val ok">Clean</span></div>
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 12a9 9 0 1 1-2.64-6.36"/><path d="M21 3v6h-6"/></svg></span><span class="scan-label">Core</span><span class="scan-val ok">Latest</span></div>
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9.5 3 8 6H4l2 3-1 3 3-1.5L11 12l-1-4 3-2H9.5Z"/><path d="M14 13l1.5-3H19l-2 3 1 3-3-1.5L12 16l2-3Z"/><path d="M9 14l-.8 1.6L6.5 16l1.2 1.1L7.4 19l1.6-.9 1.6.9-.3-1.9 1.2-1.1-1.7-.4L9 14Z"/></svg></span><span class="scan-label">Plugins</span><span class="scan-val ok">6/6</span></div>
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16v10H4z"/><path d="M8 7V5h8v2"/><path d="M8 11h8"/></svg></span><span class="scan-label">Backup</span><span class="scan-val ok">Today</span></div>
              <div class="scan-divider"></div>
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h6l-1 8 9-12h-6l1-8Z"/></svg></span><span class="scan-label">CWV Score</span><span class="scan-val warn">B+</span></div>
              <div class="scan-score">
                <div class="scan-score-num">97</div>
                <div class="scan-score-label">Health Score</div>
              </div>
            </div>
          </div>
        </div>
        <div class="floating-speed">📊 Monthly report delivered automatically</div>
      </div>
    </div>
  </header>

  <div class="intro-band" role="complementary">
    <div class="intro-grid">
      <div class="intro-item reveal">
        <div class="intro-num"><span class="counter" data-target="120">0</span><span>+</span></div>
        <div class="intro-label">Active Care Plans</div>
      </div>
      <div class="intro-item reveal">
        <div class="intro-num"><span class="gold-text">99.9</span><span>%</span></div>
        <div class="intro-label">Avg Client Uptime</div>
      </div>
      <div class="intro-item reveal">
        <div class="intro-num"><span>from </span><span class="gold-text">₦35k</span></div>
        <div class="intro-label">Per Month</div>
      </div>
      <div class="intro-item reveal">
        <div class="intro-num"><span class="counter" data-target="1">0</span><span class="gold-text">hr</span></div>
        <div class="intro-label">Emergency Response SLA</div>
      </div>
    </div>
  </div>

  <section class="build-section" aria-labelledby="build-heading">
    <div class="build-intro">
      <div>
        <span class="s-label">What We Maintain</span>
        <h2 class="s-head" id="build-heading">Care plans for every platform<br><em>and every tech stack</em></h2>
      </div>
      <p class="s-sub">Whether your site runs on WordPress, was built with Laravel, or lives on a custom codebase, we have the technical depth to keep it running at its best securely, quickly, and without you needing to think about it.</p>
    </div>
    <div class="build-grid">
      <div class="build-card reveal">
        <div class="build-ico">🟦</div>
        <h3 class="build-title">WordPress Maintenance</h3>
        <p class="build-desc">We keep WordPress core, themes, and plugins updated on a schedule, run malware and vulnerability scans, manage daily backups, monitor uptime every minute, and fix issues before they impact traffic or leads. WooCommerce stores receive extra care around checkout, payments, and catalogue integrity.</p>
        <div class="build-tags"><span class="build-tag">Core Updates</span><span class="build-tag">Plugin Management</span><span class="build-tag">WooCommerce</span><span class="build-tag">Security Scans</span><span class="build-tag">Malware Removal</span></div>
      </div>
      <div class="build-card reveal">
        <div class="build-ico">🔴</div>
        <h3 class="build-title">Laravel & PHP App Maintenance</h3>
        <p class="build-desc">Custom Laravel, CodeIgniter, and PHP applications need code-aware care, not just plugin updates. We manage Composer dependencies, PHP version compatibility, environment security, queue health, database optimisation, and minor bug fixes within monthly support hours.</p>
        <div class="build-tags"><span class="build-tag">Laravel</span><span class="build-tag">CodeIgniter</span><span class="build-tag">Composer Updates</span><span class="build-tag">PHP Version Mgmt</span><span class="build-tag">Queue Monitoring</span></div>
      </div>
      <div class="build-card reveal">
        <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><ellipse cx="12" cy="12" rx="9" ry="3.8"/><ellipse cx="12" cy="12" rx="9" ry="3.8" transform="rotate(60 12 12)"/><ellipse cx="12" cy="12" rx="9" ry="3.8" transform="rotate(120 12 12)"/><circle cx="12" cy="12" r="1.6" fill="currentColor" stroke="none"/></svg></div>
        <h3 class="build-title">React, Next.js & Modern Frontend</h3>
        <p class="build-desc">JavaScript-heavy applications need dependency management, deployment checks, build monitoring, and Core Web Vitals tracking. We watch for upstream package changes, deprecated APIs, and broken pipelines before they become a production problem.</p>
        <div class="build-tags"><span class="build-tag">Next.js</span><span class="build-tag">React</span><span class="build-tag">Vercel / Netlify</span><span class="build-tag">npm Audits</span><span class="build-tag">CI/CD Health</span></div>
      </div>
      <div class="build-card reveal">
        <div class="build-ico">🛒</div>
        <h3 class="build-title">E-Commerce Store Care</h3>
        <p class="build-desc">E-commerce sites lose money every minute they are down or broken. We provide tighter monitoring for WooCommerce, Shopify custom builds, and checkout-heavy websites, including payment checks, inventory plugin review, and emergency response for critical purchasing issues.</p>
        <div class="build-tags"><span class="build-tag">WooCommerce</span><span class="build-tag">Shopify Themes</span><span class="build-tag">Checkout Monitoring</span><span class="build-tag">Payment Gateways</span></div>
      </div>
      <div class="build-card reveal">
        <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="12" rx="2"/><path d="M8 19h8"/><path d="M10 17v2M14 17v2"/></svg></div>
        <h3 class="build-title">Server & Hosting Management</h3>
        <p class="build-desc">For VPS and dedicated environments, we handle server-level patches, PHP version management, SSL renewals, database health, cron verification, disk checks, and memory monitoring across cPanel, DigitalOcean, AWS, and standard Linux hosting stacks.</p>
        <div class="build-tags"><span class="build-tag">cPanel / WHM</span><span class="build-tag">VPS Management</span><span class="build-tag">SSL Renewals</span><span class="build-tag">Server Patches</span><span class="build-tag">DB Health</span></div>
      </div>
      <div class="build-card reveal">
        <div class="build-ico">🚨</div>
        <h3 class="build-title">Hacked Website Recovery</h3>
        <p class="build-desc">If your website has already been compromised, we handle emergency malware cleanup, spam injection removal, blacklist recovery, post-hack hardening, and the documentation needed to stop it happening again.</p>
        <div class="build-tags"><span class="build-tag">Malware Removal</span><span class="build-tag">Blacklist Removal</span><span class="build-tag">Google Recovery</span><span class="build-tag">Post-Hack Hardening</span></div>
      </div>
    </div>
  </section>

  <section aria-labelledby="approach-heading">
    <div class="approach-layout">
      <div class="approach-copy">
        <span class="s-label">Our Philosophy</span>
        <h2 class="s-head" id="approach-heading">Proactive care beats<br><em>reactive panic every time</em></h2>
        <p>Most website problems do not announce themselves. A plugin update silently breaks a page. A PHP version upgrade stops a form from submitting. A database issue slows your whole checkout flow. An expired SSL certificate scares every visitor away with a browser warning.</p>
        <p>Our approach is built around finding and fixing these issues before they surface. We do not wait for you to report a problem. Our monitoring checks your site every few minutes, our security scanner runs weekly, and our update workflow tests changes on staging before production.</p>
        <div class="highlight-box">
          <h4>Our rule: <span class="hb-gold">test on staging, ship to live</span></h4>
          <p>Every update, whether it is core, plugin, theme, or dependency, is applied to a staging copy of your site first. We verify the site looks and functions correctly before pushing to production.</p>
        </div>
        <p>We also maintain a platform-specific care rhythm. WordPress sites are checked weekly. Laravel applications have Composer dependencies reviewed monthly and queues monitored continuously. React apps are checked for dependency vulnerabilities on every deployment cycle.</p>
        <div class="platform-pills">
          <span class="pp"><span class="pp-ico">🟦</span> WordPress</span>
          <span class="pp"><span class="pp-ico">🔴</span> Laravel</span>
          <span class="pp"><span class="pp-ico">🟠</span> CodeIgniter</span>
          <span class="pp"><span class="pp-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><ellipse cx="12" cy="12" rx="9" ry="3.8"/><ellipse cx="12" cy="12" rx="9" ry="3.8" transform="rotate(60 12 12)"/><ellipse cx="12" cy="12" rx="9" ry="3.8" transform="rotate(120 12 12)"/><circle cx="12" cy="12" r="1.6" fill="currentColor" stroke="none"/></svg></span> Next.js</span>
          <span class="pp"><span class="pp-ico">🟢</span> Node.js</span>
          <span class="pp"><span class="pp-ico">🐘</span> PHP (custom)</span>
          <span class="pp"><span class="pp-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="12" rx="2"/><path d="M8 19h8"/><path d="M10 17v2M14 17v2"/></svg></span> Static HTML</span>
          <span class="pp"><span class="pp-ico">🛒</span> WooCommerce</span>
        </div>
      </div>

      <div>
        <div class="cost-kicker">The Real Cost of Skipping Maintenance</div>
        <div class="cost-block">
          <div class="cost-block-head">
            Common incidents for unmaintained sites
            <span class="ttl">Estimated Cost</span>
          </div>
          <div class="cost-rows">
            <div class="cost-row"><span class="cost-event">Malware infection & cleanup</span><span class="cost-price">₦150,000–₦400,000</span></div>
            <div class="cost-row"><span class="cost-event">Google blacklist removal + recovery</span><span class="cost-price">₦200,000+ & weeks of lost SEO</span></div>
            <div class="cost-row"><span class="cost-event">Data loss from no backups</span><span class="cost-price">₦500,000+ to rebuild</span></div>
            <div class="cost-row"><span class="cost-event">Site down 6 hours (avg e-commerce)</span><span class="cost-price">₦80,000–₦250,000 in lost sales</span></div>
            <div class="cost-row"><span class="cost-event">SSL expiry (browser warning shown)</span><span class="cost-price">100% of visitors turned away</span></div>
            <div class="cost-row"><span class="cost-event">Plugin conflict after unmanaged update</span><span class="cost-price">₦50,000–₦120,000 to fix</span></div>
            <div class="cost-row"><span class="cost-event final">Monthly maintenance care plan</span><span class="cost-price final">from ₦35,000/month</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="process-section" aria-labelledby="process-heading">
    <div class="process-header">
      <div>
        <span class="s-label process-label">How It Works</span>
        <h2 class="s-head process-head" id="process-heading">From onboarding to ongoing<br><em>care every month</em></h2>
      </div>
      <p>No long kickoff project. We onboard your site, audit what needs immediate attention, and then move into a stable monthly rhythm that keeps everything running smoothly without requiring your day-to-day involvement.</p>
    </div>
    <div class="process-steps">
      <div class="ps-item reveal">
        <div class="ps-num">01</div>
        <div class="ps-body">
          <h3 class="ps-title">Onboarding Audit</h3>
          <p class="ps-desc">We document your full technology stack, run a security scan, test current uptime and page speed, assess backup health, and identify any pre-existing critical issues before your regular plan begins.</p>
          <div class="ps-deliverables"><span class="ps-del">Technical Stack Audit</span><span class="ps-del">Security Scan</span><span class="ps-del">Speed Baseline</span><span class="ps-del">Backup Assessment</span><span class="ps-del">Audit Report</span></div>
        </div>
      </div>
      <div class="ps-item reveal">
        <div class="ps-num">02</div>
        <div class="ps-body">
          <h3 class="ps-title">Monitoring & Alerting Setup</h3>
          <p class="ps-desc">We configure uptime monitoring, SSL expiry alerts, server-level resource alerts where needed, and Core Web Vitals tracking so issues are flagged immediately instead of waiting for a client complaint.</p>
          <div class="ps-deliverables"><span class="ps-del">Uptime Monitor Active</span><span class="ps-del">SSL Watch Configured</span><span class="ps-del">Alert Routing Set</span><span class="ps-del">Core Web Vitals Tracking</span></div>
        </div>
      </div>
      <div class="ps-item reveal">
        <div class="ps-num">03</div>
        <div class="ps-body">
          <h3 class="ps-title">Weekly Updates & Security Checks</h3>
          <p class="ps-desc">We apply updates through staging, run malware scans, verify key site functions, check database health, and document every change that affects the live environment.</p>
          <div class="ps-deliverables"><span class="ps-del">Staged Updates Applied</span><span class="ps-del">Malware Scan</span><span class="ps-del">Function Verification</span><span class="ps-del">Database Cleanup</span><span class="ps-del">Maintenance Log Entry</span></div>
        </div>
      </div>
      <div class="ps-item reveal">
        <div class="ps-num">04</div>
        <div class="ps-body">
          <h3 class="ps-title">Daily Backups & Off-Site Storage</h3>
          <p class="ps-desc">Daily automated backups of website files and databases run overnight and are stored remotely, so even if your hosting provider is compromised, your recovery point is safe and restorable.</p>
          <div class="ps-deliverables"><span class="ps-del">Daily Automated Backup</span><span class="ps-del">Off-Site Storage</span><span class="ps-del">File + Database Backup</span><span class="ps-del">Quarterly Restore Test</span></div>
        </div>
      </div>
      <div class="ps-item reveal">
        <div class="ps-num">05</div>
        <div class="ps-body">
          <h3 class="ps-title">Monthly Report & Performance Review</h3>
          <p class="ps-desc">At the end of every month, you receive a real maintenance report covering updates, security results, uptime, backup status, performance trends, support activity, and recommendations for the next month.</p>
          <div class="ps-deliverables"><span class="ps-del">Updates Summary</span><span class="ps-del">Security Report</span><span class="ps-del">Uptime & Incidents</span><span class="ps-del">Core Web Vitals</span><span class="ps-del">Recommendations</span></div>
        </div>
      </div>
    </div>
  </section>

  <section class="tech-section" aria-labelledby="tech-heading">
    <div class="tech-intro">
      <div>
        <span class="s-label">Tools & Stack</span>
        <h2 class="s-head" id="tech-heading">Enterprise-grade tools working<br><em>quietly in the background</em></h2>
      </div>
      <p>We use the same class of monitoring, security, and backup tooling trusted by larger hosting teams and engineering departments, applied to your site in a simpler, more practical way.</p>
    </div>
    <div class="tech-table">
      <div class="tech-row reveal">
        <div class="tech-row-label"><div class="tech-ico-sm">🔭</div><div><div class="tech-name">UptimeRobot / Better Uptime</div><div class="tech-sub">24/7 Uptime Monitoring</div></div></div>
        <div class="tech-desc">Checks your site every 1 to 5 minutes from multiple locations and alerts our team the moment downtime is detected, with historical uptime data included in monthly reporting.</div>
        <span class="tech-badge core">Core</span>
      </div>
      <div class="tech-row reveal">
        <div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v5c0 4.5-3 7.5-7 10-4-2.5-7-5.5-7-10V6l7-3Z"/></svg></div><div><div class="tech-name">Wordfence / Sucuri</div><div class="tech-sub">WordPress Security</div></div></div>
        <div class="tech-desc">Weekly malware and vulnerability scanning, firewall protection, and file integrity monitoring for high-risk WordPress and WooCommerce environments.</div>
        <span class="tech-badge core">Core</span>
      </div>
      <div class="tech-row reveal">
        <div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16v10H4z"/><path d="M8 7V5h8v2"/><path d="M8 11h8"/></svg></div><div><div class="tech-name">UpdraftPlus / Rclone</div><div class="tech-sub">Backup Management</div></div></div>
        <div class="tech-desc">Automated daily backups with secure remote storage for both files and databases, covering WordPress sites as well as Laravel and custom PHP applications.</div>
        <span class="tech-badge core">Core</span>
      </div>
      <div class="tech-row reveal">
        <div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h6l-1 8 9-12h-6l1-8Z"/></svg></div><div><div class="tech-name">Google Search Console + PageSpeed</div><div class="tech-sub">Performance Monitoring</div></div></div>
        <div class="tech-desc">Monthly Core Web Vitals tracking, Lighthouse checks, and visibility monitoring so speed regressions and crawl issues are caught early.</div>
        <span class="tech-badge ext">Performance</span>
      </div>
      <div class="tech-row reveal">
        <div class="tech-row-label"><div class="tech-ico-sm">🔒</div><div><div class="tech-name">SSL Labs / Let's Encrypt</div><div class="tech-sub">SSL Certificate Management</div></div></div>
        <div class="tech-desc">Expiry monitoring, renewal handling, and monthly verification that your certificate setup remains valid, trusted, and secure.</div>
        <span class="tech-badge perf">Auto-Renew</span>
      </div>
      <div class="tech-row reveal">
        <div class="tech-row-label"><div class="tech-ico-sm">🧪</div><div><div class="tech-name">Staging Environments</div><div class="tech-sub">Safe Update Testing</div></div></div>
        <div class="tech-desc">Every update is tested on a staging copy or safe deployment branch before it reaches production, keeping your live site protected from avoidable breakage.</div>
        <span class="tech-badge tool">Safety</span>
      </div>
    </div>
  </section>

  <section aria-labelledby="deliv-heading">
    <div class="deliv-intro">
      <div>
        <span class="s-label">What You Receive</span>
        <h2 class="s-head" id="deliv-heading">Everything done, documented,<br><em>and reported every month</em></h2>
      </div>
      <p>Our care plans are not a vague promise to keep an eye on things. Every deliverable is specific, measurable, and documented so you always know what was done and why it matters.</p>
    </div>
    <div class="deliv-grid">
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 12a9 9 0 1 1-2.64-6.36"/><path d="M21 3v6h-6"/></svg></div><div class="deliv-body"><h4>Weekly Platform Updates (Staged)</h4><p>Core, plugin, theme, and dependency updates applied weekly after testing on a staging environment.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico">🔭</div><div class="deliv-body"><h4>24/7 Uptime Monitoring</h4><p>Automated checks every 1 to 5 minutes with immediate alerts routed to our team if your site becomes unavailable.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16v10H4z"/><path d="M8 7V5h8v2"/><path d="M8 11h8"/></svg></div><div class="deliv-body"><h4>Daily Off-Site Backups</h4><p>Complete daily backups of files and databases stored remotely, with retention history and restore testing built into the process.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l7 3v5c0 4.5-3 7.5-7 10-4-2.5-7-5.5-7-10V6l7-3Z"/></svg></div><div class="deliv-body"><h4>Weekly Security Scans</h4><p>Full malware, vulnerability, and file integrity scans, with issues remediated before they turn into a business problem.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico">📊</div><div class="deliv-body"><h4>Monthly Maintenance Report</h4><p>A personalised report covering updates, uptime, speed, backups, security status, and recommendations for next month.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico">🚨</div><div class="deliv-body"><h4>Priority Emergency Response</h4><p>Fast incident response for outages, security incidents, broken forms, and other urgent issues that cannot wait for a normal support queue.</p></div></div>
    </div>
  </section>

  <section class="packages-section" aria-labelledby="packages-heading" id="packages">
    <div class="packages-intro">
      <div>
        <span class="s-label">Care Plan Pricing</span>
        <h2 class="s-head" id="packages-heading">Monthly plans with<br><em>no annual lock-in required</em></h2>
      </div>
      <p>All plans are monthly and cancel anytime. Annual commitments can be discounted, but you do not need to lock in just to get professional maintenance.</p>
    </div>
    <div class="pkg-grid">
      <div class="pkg-card reveal">
        <div class="pkg-head">
          <span class="pkg-badge">Starter</span>
          <div class="pkg-name">Basic Care</div>
          <div class="pkg-tagline">For brochure websites, portfolios, and smaller WordPress sites that need reliable updates, backups, and monitoring.</div>
          <div class="pkg-price">₦35,000 <sub>/month</sub></div>
        </div>
        <div class="pkg-body">
          <div class="pkg-feat">1 website</div>
          <div class="pkg-feat">WordPress or static site</div>
          <div class="pkg-feat">Weekly core & plugin updates</div>
          <div class="pkg-feat">Daily backups (14-day retention)</div>
          <div class="pkg-feat">Uptime monitoring (5-min intervals)</div>
          <div class="pkg-feat">Weekly malware scan</div>
          <div class="pkg-feat">SSL monitoring & alert</div>
          <div class="pkg-feat">Monthly maintenance report</div>
          <div class="pkg-feat no">Staging environment testing</div>
          <div class="pkg-feat no">Emergency response SLA</div>
          <div class="pkg-feat no">Monthly support hours</div>
        </div>
        <div class="pkg-foot"><a href="{{ route('site.start') }}" class="pkg-btn outline">Get Started</a></div>
      </div>
      <div class="pkg-card featured reveal">
        <div class="pkg-head">
          <span class="pkg-badge">Most Popular</span>
          <div class="pkg-name">Growth Care</div>
          <div class="pkg-tagline">For active business websites, e-commerce stores, and WordPress or Laravel applications that cannot afford downtime or security incidents.</div>
          <div class="pkg-price">₦75,000 <sub>/month</sub></div>
        </div>
        <div class="pkg-body featured-body">
          <div class="pkg-feat featured-feat">1 website (WP, Laravel, or custom)</div>
          <div class="pkg-feat featured-feat">Weekly staged updates (via staging)</div>
          <div class="pkg-feat featured-feat">Daily backups (30-day retention)</div>
          <div class="pkg-feat featured-feat">Uptime monitoring (1-min intervals)</div>
          <div class="pkg-feat featured-feat">Weekly security scan + firewall</div>
          <div class="pkg-feat featured-feat">SSL auto-renew (on managed servers)</div>
          <div class="pkg-feat featured-feat">Core Web Vitals monitoring</div>
          <div class="pkg-feat featured-feat">1-hr emergency response (business hrs)</div>
          <div class="pkg-feat featured-feat">2 hours support / content edits/month</div>
          <div class="pkg-feat featured-feat">Monthly maintenance report</div>
        </div>
        <div class="pkg-foot featured-foot"><a href="#contact" class="pkg-btn gold">Start This Plan →</a></div>
      </div>
      <div class="pkg-card reveal">
        <div class="pkg-head">
          <span class="pkg-badge">Agency / Enterprise</span>
          <div class="pkg-name">Full-Stack Care</div>
          <div class="pkg-tagline">For multi-site portfolios, high-traffic platforms, Laravel applications, and organisations that need a dedicated monthly technical partner.</div>
          <div class="pkg-price">₦150,000+ <sub>/month</sub></div>
        </div>
        <div class="pkg-body">
          <div class="pkg-feat">Up to 5 websites / applications</div>
          <div class="pkg-feat">WordPress, Laravel, Next.js, custom PHP</div>
          <div class="pkg-feat">Daily staged updates (all platforms)</div>
          <div class="pkg-feat">Daily backups (60-day retention)</div>
          <div class="pkg-feat">Uptime monitoring (30-sec intervals)</div>
          <div class="pkg-feat">Daily security scans + cloud WAF</div>
          <div class="pkg-feat">Server/VPS management included</div>
          <div class="pkg-feat">1-hr emergency response (24/7)</div>
          <div class="pkg-feat">5 hours support / dev tasks/month</div>
          <div class="pkg-feat">Dedicated Slack or WhatsApp channel</div>
        </div>
        <div class="pkg-foot"><a href="#contact" class="pkg-btn solid">Discuss Your Portfolio</a></div>
      </div>
    </div>
  </section>

  <section class="results-section" aria-labelledby="results-heading">
    <div class="results-intro">
      <div>
        <span class="s-label process-label">Real Impact</span>
        <h2 class="s-head process-head" id="results-heading">What changes when your site<br><em>is properly maintained</em></h2>
      </div>
      <p>These are the kinds of outcomes clients see after moving from unmanaged websites, patchy agency support, or reactive cleanup to a real maintenance workflow.</p>
    </div>
    <div class="results-grid">
      <div class="result-card reveal"><div class="result-num"><span>0</span></div><div class="result-label">Security Incidents in 18 Months</div><p class="result-project">A Lagos e-commerce brand moved to our Growth Care plan after repeated hacks and has recorded zero repeat incidents since onboarding.</p></div>
      <div class="result-card reveal"><div class="result-num">+<span>38</span>%</div><div class="result-label">Improvement in Core Web Vitals</div><p class="result-project">A legal services website saw its Largest Contentful Paint drop from 5.8 seconds to 1.9 seconds after ongoing maintenance and optimisation.</p></div>
      <div class="result-card reveal"><div class="result-num"><span>4</span>min</div><div class="result-label">Average Incident Response Time</div><p class="result-project">Across logged incidents on supported plans, our average first response time stayed well inside the agreed SLA and usually before clients noticed.</p></div>
    </div>
  </section>

  <section aria-labelledby="compare-heading">
    <div class="compare-intro">
      <div>
        <span class="s-label">Why i2Medier</span>
        <h2 class="s-head" id="compare-heading">What separates a real care plan<br><em>from a checkbox service</em></h2>
      </div>
      <p>Many providers call plugin auto-updates a maintenance plan. This section shows what real care looks like when uptime, security, and business continuity actually matter.</p>
    </div>
    <table class="compare-table" role="table" aria-label="Maintenance provider comparison">
      <thead>
        <tr>
          <th>Maintenance Feature</th>
          <th>DIY / Unmanaged</th>
          <th class="highlight">i2Medier Care Plan</th>
          <th>Generic Plugin Auto-Update</th>
        </tr>
      </thead>
      <tbody>
        <tr><td class="feature">Updates Tested Before Going Live</td><td><span class="no">Never</span></td><td class="highlight"><span class="yes status-yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Always on staging first</span></td><td><span class="no">Applied directly to live site</span></td></tr>
        <tr><td class="feature">Malware & Security Scanning</td><td><span class="no">Only if you remember</span></td><td class="highlight"><span class="yes status-yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Every week, automated</span></td><td><span class="no">Not included</span></td></tr>
        <tr><td class="feature">Off-Site Backups</td><td><span class="partial">Depends on host</span></td><td class="highlight"><span class="yes status-yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Daily, separate remote storage</span></td><td><span class="no">Not standard</span></td></tr>
        <tr><td class="feature">Uptime Monitoring</td><td><span class="no">None</span></td><td class="highlight"><span class="yes status-yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>24/7, 1 to 5 min intervals</span></td><td><span class="no">Not included</span></td></tr>
        <tr><td class="feature">Emergency Response SLA</td><td><span class="no">You are on your own</span></td><td class="highlight"><span class="yes status-yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>1-hr (business hrs)</span></td><td><span class="no">No SLA</span></td></tr>
        <tr><td class="feature">Laravel / Custom App Support</td><td><span class="partial">Only if you know how</span></td><td class="highlight"><span class="yes status-yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Composer, queues, jobs</span></td><td><span class="no">WordPress only</span></td></tr>
        <tr><td class="feature">Monthly Written Report</td><td><span class="no">None</span></td><td class="highlight"><span class="yes status-yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Specific, personalised</span></td><td><span class="partial">Automated generic email</span></td></tr>
        <tr><td class="feature">Core Web Vitals Monitoring</td><td><span class="no">None</span></td><td class="highlight"><span class="yes status-yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Monthly tracking + action</span></td><td><span class="no">Not included</span></td></tr>
      </tbody>
    </table>
  </section>

  <section class="test-section" aria-labelledby="test-heading">
    <div class="test-head">
      <span class="s-label">Client Testimonials</span>
      <h2 class="s-head" id="test-heading">What our care plan clients<br><em>say about the service</em></h2>
    </div>
    <div class="test-grid">
      <div class="test-card reveal">
        <div class="test-stars" aria-label="5 out of 5 stars">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
        </div>
        <p class="test-quote">"Before i2Medier, I would find out my site was down when a client called. Now the team usually spots and resolves the issue before I even know there was one. That peace of mind alone is worth the plan."</p>
        <div class="test-author"><div class="test-avatar">SA</div><div><div class="test-name">Samuel Agbor</div><div class="test-role">Director, Agbor & Co. Legal · PH</div></div></div>
      </div>
      <div class="test-card reveal">
        <div class="test-stars" aria-label="5 out of 5 stars">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
        </div>
        <p class="test-quote">"Our Laravel app had gone too long without proper updates. i2Medier onboarded it, found vulnerable dependencies, patched the stack, and gave us a sane staging workflow. The monthly report is genuinely useful."</p>
        <div class="test-author"><div class="test-avatar">TE</div><div><div class="test-name">Tobilola Eze</div><div class="test-role">CTO, Rubixx Logistics · Lagos</div></div></div>
      </div>
      <div class="test-card reveal">
        <div class="test-stars" aria-label="5 out of 5 stars">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
        </div>
        <p class="test-quote">"We were hacked twice before switching. Since moving onto i2Medier's care plan, there have been zero incidents and the site is noticeably faster too. I wish we had done it earlier."</p>
        <div class="test-author"><div class="test-avatar">NC</div><div><div class="test-name">Ngozi Chukwu</div><div class="test-role">Founder, Kola Market · Enugu</div></div></div>
      </div>
    </div>
  </section>

  <section aria-labelledby="faq-heading">
    <span class="s-label">Frequently Asked Questions</span>
    <h2 class="s-head" id="faq-heading">Questions about our<br><em>website maintenance service</em></h2>
    <div class="faq-layout">
      <div class="faq-sidebar">
        <h3>Something we did not cover?</h3>
        <p>Book a free 20-minute audit call. We will review your site, tell you what it needs, and recommend the right care plan without pressure.</p>
        <a href="mailto:hello@i2medier.com" class="faq-clink">Email Us Directly →</a>
      </div>
      <div class="faq-list" role="list">
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq1">What platforms do you maintain?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span></button><div class="faq-a" id="faq1">We maintain websites and web applications built on WordPress, WooCommerce, Laravel, CodeIgniter, custom PHP, React, Next.js, and static HTML/CSS sites. If it runs on a web server, we can maintain it.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq2">What happens if my website goes down?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span></button><div class="faq-a" id="faq2">We monitor your website every 1 to 5 minutes. If it goes down, our system alerts us immediately and we begin investigating. Growth and Agency plans include emergency response SLAs.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq3">Do you maintain websites you did not build?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span></button><div class="faq-a" id="faq3">Yes. We frequently take over care for websites built by other developers or agencies. We start with an onboarding audit so we know exactly what we are inheriting.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq4">How often are backups taken?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span></button><div class="faq-a" id="faq4">Daily automated backups are included on all care plans. Files and databases are stored off-server so your backup remains safe even if your hosting environment is compromised.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq5">What is included in the monthly maintenance report?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span></button><div class="faq-a" id="faq5">You receive a clear written report covering updates applied, security results, backup status, uptime, performance, incident activity, and recommendations for the next month.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq6">How much does website maintenance cost in Nigeria?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span></button><div class="faq-a" id="faq6">Our care plans start from ₦35,000 per month for smaller sites and scale upward based on complexity, stack, traffic, and support requirements.</div></div>
      </div>
    </div>
  </section>

  <section class="related-section" aria-labelledby="related-heading">
    <span class="s-label">Related Services</span>
    <h2 class="s-head" id="related-heading">Often paired <em>with this service</em></h2>
    <div class="related-grid">
      <a href="{{ route('site.services.wordpress-development') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/><path d="M8 4v16M16 4v16"/></svg></div><div class="ri-name">WordPress Development</div><p class="ri-desc">Custom WordPress builds from scratch and the natural starting point for a long-term maintenance partnership.</p></a>
      <a href="{{ route('site.services.search-optimization') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"/><path d="m20 20-4.2-4.2"/></svg></div><div class="ri-name">SEO Services</div><p class="ri-desc">Core Web Vitals and site health improvements from maintenance work feed directly into your SEO performance.</p></a>
      <a href="{{ route('site.services.ui-ux-design') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16v12H4z"/><path d="M9 10h6M9 14h3"/></svg></div><div class="ri-name">UI/UX Design</div><p class="ri-desc">Redesign or refresh your site, then let us maintain it so it stays fast, secure, and performing at its best.</p></a>
      <a href="{{ route('site.services.business-email-setup') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16v10H4z"/><path d="m4 8 8 6 8-6"/></svg></div><div class="ri-name">Business Email Setup</div><p class="ri-desc">Professional email on Google Workspace or Microsoft 365 is a natural companion to a properly maintained website.</p></a>
    </div>
  </section>

  <section class="cta-band" id="contact" aria-labelledby="cta-h">
    <h2 id="cta-h">Your site is working hard.<br>Make sure it stays that way.</h2>
    <p>Tell us your platform and we will send you a free onboarding audit and care plan recommendation within 24 hours, no commitment required.</p>
    <a href="mailto:hello@i2medier.com" class="btn-dark">Start My Care Plan →</a>
  </section>
</div>
@endsection
