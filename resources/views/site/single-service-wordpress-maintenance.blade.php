@extends('public.layouts.app')

@section('title', 'WordPress Maintenance Services | i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/wordpress-maintenance.css')
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
            'name' => 'WordPress Maintenance',
            'item' => route('site.services.wordpress-maintenance'),
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
            'name' => 'Do you only maintain WordPress websites?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'This page is focused on WordPress maintenance only. We maintain brochure websites, business websites, blogs, membership sites, WooCommerce stores, and multisite WordPress setups.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'What happens if my website goes down?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'We monitor your WordPress website around the clock with checks every 1 to 5 minutes. If it goes down, our system alerts us immediately and we begin investigating. Growth and Agency plans include emergency response SLAs.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Do you maintain WordPress websites you did not build?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes. We often take over WordPress websites built by freelancers, in-house teams, or agencies. We begin with an onboarding audit, document the stack, and fix any critical issues before ongoing care starts.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'How often are backups taken?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Daily automated backups are included on all WordPress care plans. Backups cover both website files and the WordPress database, and are stored off-server on a secure remote location.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'What is included in the monthly maintenance report?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Every month you receive a written report covering WordPress core, plugin, and theme updates applied, security scan results, uptime and incidents, backup status, performance metrics, and recommendations for the following month.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'How much does WordPress maintenance cost in Nigeria?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Our WordPress maintenance plans start from ₦35,000 per month for smaller brochure websites and scale based on plugin complexity, traffic, WooCommerce usage, and support requirements.',
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
        <span aria-current="page">WordPress Maintenance</span>
      </div>
      <span class="hero-tag"><span class="hero-dot"></span> WordPress Maintenance</span>
      <h1>Your WordPress site,<br>always secure, fast,<br>and <em>fully alive</em></h1>
      <p class="hero-sub">We handle every WordPress core update, plugin update, backup, malware scan, uptime check, and performance review your site needs so you never lose traffic, leads, or sales to a preventable issue.</p>
      <div class="hero-btns">
        <a href="#contact" class="btn-white">Start a Care Plan →</a>
        <a href="#packages" class="btn-ghost">See Pricing</a>
      </div>
      <div class="hero-tags-row">
        <span class="hero-badge"><span class="hero-badge-dot"></span> WordPress & WooCommerce</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> 24/7 Uptime Monitoring</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Daily Off-Site Backups</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Monthly Report</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Emergency Response</span>
      </div>
    </div>

    <div class="hero-right">
      <div class="dash-wrap">
        <div class="floating-badge"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="m8.5 12 2.3 2.3 4.7-4.8"></path></svg> All Systems Operational</div>
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
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="11" width="14" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 1 1 8 0v3"></path></svg></span><span class="scan-label">SSL Valid</span><span class="scan-val ok"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span></div>
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v6c0 5 3.4 7.9 7 9 3.6-1.1 7-4 7-9V6l-7-3Z"></path></svg></span><span class="scan-label">Firewall</span><span class="scan-val ok">On</span></div>
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-4.2-4.2"></path></svg></span><span class="scan-label">Malware</span><span class="scan-val ok">Clean</span></div>
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 12a9 9 0 1 1-2.64-6.36"></path><path d="M21 3v6h-6"></path></svg></span><span class="scan-label">Core</span><span class="scan-val ok">Latest</span></div>
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="1.4"></rect><rect x="13" y="4" width="7" height="7" rx="1.4"></rect><rect x="4" y="13" width="7" height="7" rx="1.4"></rect><rect x="13" y="13" width="7" height="7" rx="1.4"></rect></svg></span><span class="scan-label">Plugins</span><span class="scan-val ok">6/6</span></div>
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><ellipse cx="12" cy="6" rx="6" ry="3"></ellipse><path d="M6 6v12c0 1.7 2.7 3 6 3s6-1.3 6-3V6"></path><path d="M6 12c0 1.7 2.7 3 6 3s6-1.3 6-3"></path></svg></span><span class="scan-label">Backup</span><span class="scan-val ok">Today</span></div>
              <div class="scan-divider"></div>
              <div class="scan-item"><span class="scan-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h6l-1 8 9-12h-6l1-8Z"></path></svg></span><span class="scan-label">CWV Score</span><span class="scan-val warn">B+</span></div>
              <div class="scan-score">
                <div class="scan-score-num">97</div>
                <div class="scan-score-label">Health Score</div>
              </div>
            </div>
          </div>
        </div>
        <div class="floating-speed"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19h16"></path><path d="M7 15V9"></path><path d="M12 15V5"></path><path d="M17 15v-3"></path></svg> Monthly report delivered automatically</div>
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
        <h2 class="s-head" id="build-heading">Care plans for every kind of<br><em>WordPress website</em></h2>
      </div>
      <p class="s-sub">Whether you run a brochure website, a content-heavy business site, a WooCommerce store, or a membership platform on WordPress, we keep it updated, monitored, secured, and stable without you needing to manage the technical side yourself.</p>
    </div>
    <div class="build-grid">
      <div class="build-card reveal">
        <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M8.5 8.5c.8 4.3 2.1 7 3.5 7s2.7-2.7 3.5-7"></path><path d="M9 10c.8 1 1.8 1.5 3 1.5s2.2-.5 3-1.5"></path></svg></div>
        <h3 class="build-title">Core, Theme & Plugin Updates</h3>
        <p class="build-desc">We keep WordPress core, themes, and plugins updated on a safe schedule, test for compatibility issues, and make sure updates do not quietly break forms, layouts, or critical front-end functionality.</p>
        <div class="build-tags"><span class="build-tag">Core Updates</span><span class="build-tag">Plugin Management</span><span class="build-tag">WooCommerce</span><span class="build-tag">Security Scans</span><span class="build-tag">Malware Removal</span></div>
      </div>
      <div class="build-card reveal">
        <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="19" r="1.5"></circle><circle cx="17" cy="19" r="1.5"></circle><path d="M4 5h2l2.2 9h9.8l2-7H7.2"></path></svg></div>
        <h3 class="build-title">WooCommerce Maintenance</h3>
        <p class="build-desc">WooCommerce sites need tighter monitoring because even a small issue affects revenue. We watch checkout flow, payment gateways, shipping plugins, order emails, and product functionality so your store stays sellable every day.</p>
        <div class="build-tags"><span class="build-tag">WooCommerce</span><span class="build-tag">Checkout Monitoring</span><span class="build-tag">Payment Gateways</span><span class="build-tag">Order Flow</span><span class="build-tag">Store Health</span></div>
      </div>
      <div class="build-card reveal">
        <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v6c0 5 3.4 7.9 7 9 3.6-1.1 7-4 7-9V6l-7-3Z"></path></svg></div>
        <h3 class="build-title">Security, Malware & Hardening</h3>
        <p class="build-desc">WordPress is the most targeted CMS on the web. We run scheduled malware scans, block common attack vectors, harden admin access, and respond quickly if your site is hacked, injected, or blacklisted.</p>
        <div class="build-tags"><span class="build-tag">Firewall</span><span class="build-tag">Malware Scan</span><span class="build-tag">Login Hardening</span><span class="build-tag">Blacklist Recovery</span><span class="build-tag">File Integrity</span></div>
      </div>
      <div class="build-card reveal">
        <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><ellipse cx="12" cy="6" rx="6" ry="3"></ellipse><path d="M6 6v12c0 1.7 2.7 3 6 3s6-1.3 6-3V6"></path><path d="M6 12c0 1.7 2.7 3 6 3s6-1.3 6-3"></path></svg></div>
        <h3 class="build-title">Backups & Restore Readiness</h3>
        <p class="build-desc">A backup only matters if it can be restored. We run daily WordPress backups, keep retention history, store them off-site, and test restores so recovery is practical when something goes wrong.</p>
        <div class="build-tags"><span class="build-tag">Daily Backups</span><span class="build-tag">Database Backup</span><span class="build-tag">Off-Site Storage</span><span class="build-tag">Restore Testing</span></div>
      </div>
      <div class="build-card reveal">
        <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h6l-1 8 9-12h-6l1-8Z"></path></svg></div>
        <h3 class="build-title">Speed & Performance Monitoring</h3>
        <p class="build-desc">Slow WordPress sites lose rankings and conversions. We monitor Core Web Vitals, plugin bloat, caching behaviour, image load performance, and hosting bottlenecks so your site stays fast.</p>
        <div class="build-tags"><span class="build-tag">Core Web Vitals</span><span class="build-tag">Caching</span><span class="build-tag">Image Optimisation</span><span class="build-tag">Database Cleanup</span><span class="build-tag">PageSpeed</span></div>
      </div>
      <div class="build-card reveal">
        <div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4"></path><path d="M12 17h.01"></path><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"></path></svg></div>
        <h3 class="build-title">Content Edits & Ongoing Support</h3>
        <p class="build-desc">Most business websites need light ongoing help after launch. Depending on plan, we handle approved text updates, image swaps, banner changes, small layout fixes, and priority technical support.</p>
        <div class="build-tags"><span class="build-tag">Content Updates</span><span class="build-tag">Small Fixes</span><span class="build-tag">Priority Support</span><span class="build-tag">Site Checks</span></div>
      </div>
    </div>
  </section>

  <section aria-labelledby="approach-heading">
    <div class="approach-layout">
      <div class="approach-copy">
        <span class="s-label">Our Philosophy</span>
        <h2 class="s-head" id="approach-heading">Proactive care beats<br><em>reactive panic every time</em></h2>
        <p>Most website problems do not announce themselves. A plugin update silently breaks a page. A PHP version upgrade stops a form from submitting. A database issue slows your whole checkout flow. An expired SSL certificate scares every visitor away with a browser warning.</p>
        <p>Our approach is built around finding and fixing these issues before they surface. We do not wait for you to report a problem. Our monitoring checks your site every few minutes, our security scanner runs weekly, and our update workflow tests WordPress changes on staging before production.</p>
        <div class="highlight-box">
          <h4>Our rule: <span class="hb-gold">test on staging, ship to live</span></h4>
          <p>Every update, whether it is core, plugin, theme, or dependency, is applied to a staging copy of your site first. We verify the site looks and functions correctly before pushing to production.</p>
        </div>
        <p>We maintain a WordPress-specific care rhythm. Core and plugin updates are reviewed weekly, malware and vulnerability scans run on schedule, backups are automated daily, and performance trends are reviewed month after month so the site stays healthy long after launch.</p>
        <div class="platform-pills">
          <span class="pp"><span class="pp-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M8.5 8.5c.8 4.3 2.1 7 3.5 7s2.7-2.7 3.5-7"></path><path d="M9 10c.8 1 1.8 1.5 3 1.5s2.2-.5 3-1.5"></path></svg></span> WordPress</span>
          <span class="pp"><span class="pp-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="19" r="1.5"></circle><circle cx="17" cy="19" r="1.5"></circle><path d="M4 5h2l2.2 9h9.8l2-7H7.2"></path></svg></span> WooCommerce</span>
          <span class="pp"><span class="pp-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="1.4"></rect><rect x="13" y="4" width="7" height="7" rx="1.4"></rect><rect x="4" y="13" width="7" height="7" rx="1.4"></rect><rect x="13" y="13" width="7" height="7" rx="1.4"></rect></svg></span> Plugins</span>
          <span class="pp"><span class="pp-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 0-4h-1a2 2 0 0 1 0-4h4a4 4 0 0 0 0-8Z"></path><circle cx="7.5" cy="10.5" r="1"></circle><circle cx="9.5" cy="7.5" r="1"></circle><circle cx="13.5" cy="7.5" r="1"></circle></svg></span> Themes</span>
          <span class="pp"><span class="pp-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="10" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></span> Membership Sites</span>
          <span class="pp"><span class="pp-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 7h8v8H3z"></path><path d="M13 3h8v8h-8z"></path><path d="M13 13h8v8h-8z"></path></svg></span> Multisite</span>
          <span class="pp"><span class="pp-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="5" width="16" height="14" rx="2"></rect><path d="M4 10h16"></path></svg></span> Brochure Sites</span>
          <span class="pp"><span class="pp-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 7h12l-1 12H7L6 7Z"></path><path d="M9 7a3 3 0 0 1 6 0"></path></svg></span> E-Commerce</span>
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
      <p>No long kickoff project. We onboard your WordPress site, audit what needs immediate attention, and then move into a stable monthly rhythm that keeps everything running smoothly without requiring your day-to-day involvement.</p>
    </div>
    <div class="process-steps">
      <div class="ps-item reveal">
        <div class="ps-num">01</div>
        <div class="ps-body">
          <h3 class="ps-title">Onboarding Audit</h3>
          <p class="ps-desc">We audit your WordPress stack, document plugins and themes, run a security scan, test current uptime and page speed, assess backup health, and identify any pre-existing critical issues before your regular plan begins.</p>
          <div class="ps-deliverables"><span class="ps-del">Technical Stack Audit</span><span class="ps-del">Security Scan</span><span class="ps-del">Speed Baseline</span><span class="ps-del">Backup Assessment</span><span class="ps-del">Audit Report</span></div>
        </div>
      </div>
      <div class="ps-item reveal">
        <div class="ps-num">02</div>
        <div class="ps-body">
          <h3 class="ps-title">Monitoring & Alerting Setup</h3>
          <p class="ps-desc">We configure uptime monitoring, SSL expiry alerts, WordPress security checks, backup automation, and Core Web Vitals tracking so issues are flagged immediately instead of waiting for a client complaint.</p>
          <div class="ps-deliverables"><span class="ps-del">Uptime Monitor Active</span><span class="ps-del">SSL Watch Configured</span><span class="ps-del">Alert Routing Set</span><span class="ps-del">Core Web Vitals Tracking</span></div>
        </div>
      </div>
      <div class="ps-item reveal">
        <div class="ps-num">03</div>
        <div class="ps-body">
          <h3 class="ps-title">Weekly Updates & Security Checks</h3>
          <p class="ps-desc">We apply WordPress core, theme, and plugin updates through staging, run malware scans, verify key site functions, check database health, and document every change that affects the live environment.</p>
          <div class="ps-deliverables"><span class="ps-del">Staged Updates Applied</span><span class="ps-del">Malware Scan</span><span class="ps-del">Function Verification</span><span class="ps-del">Database Cleanup</span><span class="ps-del">Maintenance Log Entry</span></div>
        </div>
      </div>
      <div class="ps-item reveal">
        <div class="ps-num">04</div>
        <div class="ps-body">
          <h3 class="ps-title">Daily Backups & Off-Site Storage</h3>
          <p class="ps-desc">Daily automated backups of your WordPress files and database run overnight and are stored remotely, so even if your hosting provider is compromised, your recovery point is safe and restorable.</p>
          <div class="ps-deliverables"><span class="ps-del">Daily Automated Backup</span><span class="ps-del">Off-Site Storage</span><span class="ps-del">File + Database Backup</span><span class="ps-del">Quarterly Restore Test</span></div>
        </div>
      </div>
      <div class="ps-item reveal">
        <div class="ps-num">05</div>
        <div class="ps-body">
          <h3 class="ps-title">Monthly Report & Performance Review</h3>
          <p class="ps-desc">At the end of every month, you receive a real WordPress maintenance report covering updates, security results, uptime, backup status, performance trends, support activity, and recommendations for the next month.</p>
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
        <div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 12 16 9"></path><path d="M12 12V7"></path></svg></div><div><div class="tech-name">UptimeRobot / Better Uptime</div><div class="tech-sub">24/7 Uptime Monitoring</div></div></div>
        <div class="tech-desc">Checks your site every 1 to 5 minutes from multiple locations and alerts our team the moment downtime is detected, with historical uptime data included in monthly reporting.</div>
        <span class="tech-badge core">Core</span>
      </div>
      <div class="tech-row reveal">
        <div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v6c0 5 3.4 7.9 7 9 3.6-1.1 7-4 7-9V6l-7-3Z"></path></svg></div><div><div class="tech-name">Wordfence / Sucuri</div><div class="tech-sub">WordPress Security</div></div></div>
        <div class="tech-desc">Weekly malware and vulnerability scanning, firewall protection, and file integrity monitoring for high-risk WordPress and WooCommerce environments.</div>
        <span class="tech-badge core">Core</span>
      </div>
      <div class="tech-row reveal">
        <div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><ellipse cx="12" cy="6" rx="6" ry="3"></ellipse><path d="M6 6v12c0 1.7 2.7 3 6 3s6-1.3 6-3V6"></path><path d="M6 12c0 1.7 2.7 3 6 3s6-1.3 6-3"></path></svg></div><div><div class="tech-name">UpdraftPlus / Rclone</div><div class="tech-sub">Backup Management</div></div></div>
        <div class="tech-desc">Automated daily backups with secure remote storage for WordPress files and databases, giving you reliable recovery points whenever a plugin, theme, update, or attack causes trouble.</div>
        <span class="tech-badge core">Core</span>
      </div>
      <div class="tech-row reveal">
        <div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 14h6l-1 8 9-12h-6l1-8Z"></path></svg></div><div><div class="tech-name">Google Search Console + PageSpeed</div><div class="tech-sub">Performance Monitoring</div></div></div>
        <div class="tech-desc">Monthly Core Web Vitals tracking, Lighthouse checks, and visibility monitoring so speed regressions and crawl issues are caught early.</div>
        <span class="tech-badge ext">Performance</span>
      </div>
      <div class="tech-row reveal">
        <div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="11" width="14" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 1 1 8 0v3"></path></svg></div><div><div class="tech-name">SSL Labs / Let's Encrypt</div><div class="tech-sub">SSL Certificate Management</div></div></div>
        <div class="tech-desc">Expiry monitoring, renewal handling, and monthly verification that your certificate setup remains valid, trusted, and secure.</div>
        <span class="tech-badge perf">Auto-Renew</span>
      </div>
      <div class="tech-row reveal">
        <div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 3h6"></path><path d="M10 3v5l-5 9a2 2 0 0 0 1.7 3h10.6A2 2 0 0 0 19 17l-5-9V3"></path><path d="M8.5 14h7"></path></svg></div><div><div class="tech-name">Staging Environments</div><div class="tech-sub">Safe Update Testing</div></div></div>
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
      <p>Our WordPress care plans are not a vague promise to keep an eye on things. Every deliverable is specific, measurable, and documented so you always know what was done and why it matters.</p>
    </div>
    <div class="deliv-grid">
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 12a9 9 0 1 1-2.64-6.36"></path><path d="M21 3v6h-6"></path></svg></div><div class="deliv-body"><h4>Weekly WordPress Updates (Staged)</h4><p>WordPress core, plugin, and theme updates applied weekly after testing on a staging environment.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 12 16 9"></path><path d="M12 12V7"></path></svg></div><div class="deliv-body"><h4>24/7 Uptime Monitoring</h4><p>Automated checks every 1 to 5 minutes with immediate alerts routed to our team if your site becomes unavailable.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><ellipse cx="12" cy="6" rx="6" ry="3"></ellipse><path d="M6 6v12c0 1.7 2.7 3 6 3s6-1.3 6-3V6"></path><path d="M6 12c0 1.7 2.7 3 6 3s6-1.3 6-3"></path></svg></div><div class="deliv-body"><h4>Daily Off-Site WordPress Backups</h4><p>Complete daily backups of WordPress files and database stored remotely, with retention history and restore testing built into the process.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v6c0 5 3.4 7.9 7 9 3.6-1.1 7-4 7-9V6l-7-3Z"></path></svg></div><div class="deliv-body"><h4>Weekly Security Scans</h4><p>Full malware, vulnerability, and file integrity scans, with issues remediated before they turn into a business problem.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19h16"></path><path d="M7 15V9"></path><path d="M12 15V5"></path><path d="M17 15v-3"></path></svg></div><div class="deliv-body"><h4>Monthly Maintenance Report</h4><p>A personalised report covering updates, uptime, speed, backups, security status, and recommendations for next month.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 9v4"></path><path d="M12 17h.01"></path><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"></path></svg></div><div class="deliv-body"><h4>Priority Emergency Response</h4><p>Fast incident response for outages, security incidents, broken forms, and other urgent issues that cannot wait for a normal support queue.</p></div></div>
    </div>
  </section>

  <section class="packages-section" aria-labelledby="packages-heading" id="packages">
    <div class="packages-intro">
      <div>
        <span class="s-label">Care Plan Pricing</span>
        <h2 class="s-head" id="packages-heading">Monthly plans with<br><em>no annual lock-in required</em></h2>
      </div>
      <p>All plans are monthly and cancel anytime. Annual commitments can be discounted, but you do not need to lock in just to get professional WordPress maintenance.</p>
    </div>
    <div class="pkg-grid">
      <div class="pkg-card reveal">
        <div class="pkg-head">
          <span class="pkg-badge">Starter</span>
          <div class="pkg-name">Basic Care</div>
          <div class="pkg-tagline">For brochure websites, portfolios, and smaller WordPress business sites that need reliable updates, backups, and monitoring.</div>
          <div class="pkg-price">₦35,000 <sub>/month</sub></div>
        </div>
        <div class="pkg-body">
          <div class="pkg-feat">1 website</div>
          <div class="pkg-feat">Single WordPress website</div>
          <div class="pkg-feat">Weekly core & plugin updates</div>
          <div class="pkg-feat">Daily backups (14-day retention)</div>
          <div class="pkg-feat">Uptime monitoring (5-min intervals)</div>
          <div class="pkg-feat">Weekly malware scan</div>
          <div class="pkg-feat">SSL monitoring & alert</div>
          <div class="pkg-feat">Monthly maintenance report</div>
          <div class="pkg-feat no">Full staging workflow</div>
          <div class="pkg-feat no">Emergency response SLA</div>
          <div class="pkg-feat no">Included support hours</div>
        </div>
        <div class="pkg-foot"><a href="{{ route('site.start') }}" class="pkg-btn outline">Get Started</a></div>
      </div>
      <div class="pkg-card featured reveal">
        <div class="pkg-head">
          <span class="pkg-badge">Most Popular</span>
          <div class="pkg-name">Growth Care</div>
          <div class="pkg-tagline">For active business websites, WooCommerce stores, and lead-generation WordPress websites that cannot afford downtime or security incidents.</div>
          <div class="pkg-price">₦75,000 <sub>/month</sub></div>
        </div>
        <div class="pkg-body featured-body">
          <div class="pkg-feat featured-feat">1 WordPress or WooCommerce website</div>
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
          <div class="pkg-name">Advanced WordPress Care</div>
          <div class="pkg-tagline">For multisite setups, larger WooCommerce stores, content-heavy websites, and organisations that need a dedicated monthly WordPress technical partner.</div>
          <div class="pkg-price">₦150,000+ <sub>/month</sub></div>
        </div>
        <div class="pkg-body">
          <div class="pkg-feat">Up to 5 WordPress websites / stores</div>
          <div class="pkg-feat">WordPress, WooCommerce, multisite</div>
          <div class="pkg-feat">Daily staged updates</div>
          <div class="pkg-feat">Daily backups (60-day retention)</div>
          <div class="pkg-feat">Uptime monitoring (30-sec intervals)</div>
          <div class="pkg-feat">Daily security scans + cloud WAF</div>
          <div class="pkg-feat">Hosting liaison & technical escalation included</div>
          <div class="pkg-feat">1-hr emergency response (24/7)</div>
          <div class="pkg-feat">5 hours support / WordPress tasks/month</div>
          <div class="pkg-feat">Dedicated Slack or WhatsApp channel</div>
        </div>
        <div class="pkg-foot"><a href="#contact" class="pkg-btn solid">Discuss Your WordPress Estate</a></div>
      </div>
    </div>
  </section>

  <section class="results-section" aria-labelledby="results-heading">
    <div class="results-intro">
      <div>
        <span class="s-label process-label">Real Impact</span>
        <h2 class="s-head process-head" id="results-heading">What changes when your site<br><em>is properly maintained</em></h2>
      </div>
      <p>These are the kinds of outcomes WordPress clients see after moving from unmanaged websites, patchy agency support, or reactive cleanup to a real maintenance workflow.</p>
    </div>
    <div class="results-grid">
      <div class="result-card reveal"><div class="result-num"><span>0</span></div><div class="result-label">Security Incidents in 18 Months</div><p class="result-project">A Lagos WooCommerce store moved to our Growth Care plan after repeated hacks and has recorded zero repeat incidents since onboarding.</p></div>
      <div class="result-card reveal"><div class="result-num">+<span>38</span>%</div><div class="result-label">Improvement in Core Web Vitals</div><p class="result-project">A WordPress legal services website saw its Largest Contentful Paint drop from 5.8 seconds to 1.9 seconds after ongoing maintenance and optimisation.</p></div>
      <div class="result-card reveal"><div class="result-num"><span>4</span>min</div><div class="result-label">Average Incident Response Time</div><p class="result-project">Across logged WordPress incidents on supported plans, our average first response time stayed well inside the agreed SLA and usually before clients noticed.</p></div>
    </div>
  </section>

  <section aria-labelledby="compare-heading">
    <div class="compare-intro">
      <div>
        <span class="s-label">Why i2Medier</span>
        <h2 class="s-head" id="compare-heading">What separates a real care plan<br><em>from a checkbox service</em></h2>
      </div>
      <p>Many providers call plugin auto-updates a maintenance plan. This section shows what real WordPress care looks like when uptime, security, and business continuity actually matter.</p>
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
        <tr><td class="feature">WooCommerce & Store Flow Support</td><td><span class="partial">Only if you spot issues yourself</span></td><td class="highlight"><span class="yes status-yes"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>Checkout, payment, and store flow checks</span></td><td><span class="no">Rarely included</span></td></tr>
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
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
        </div>
        <p class="test-quote">"Before i2Medier, I would find out my site was down when a client called. Now the team usually spots and resolves the issue before I even know there was one. That peace of mind alone is worth the plan."</p>
        <div class="test-author"><div class="test-avatar">SA</div><div><div class="test-name">Samuel Agbor</div><div class="test-role">Director, Agbor & Co. Legal · PH</div></div></div>
      </div>
      <div class="test-card reveal">
        <div class="test-stars" aria-label="5 out of 5 stars">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
        </div>
        <p class="test-quote">"Our Laravel app had gone too long without proper updates. i2Medier onboarded it, found vulnerable dependencies, patched the stack, and gave us a sane staging workflow. The monthly report is genuinely useful."</p>
        <div class="test-author"><div class="test-avatar">TE</div><div><div class="test-name">Tobilola Eze</div><div class="test-role">CTO, Rubixx Logistics · Lagos</div></div></div>
      </div>
      <div class="test-card reveal">
        <div class="test-stars" aria-label="5 out of 5 stars">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3.5 2.6 5.27 5.82.85-4.21 4.1.99 5.79L12 16.74 6.8 19.51l.99-5.79-4.21-4.1 5.82-.85L12 3.5Z"/></svg>
        </div>
        <p class="test-quote">"We were hacked twice before switching. Since moving onto i2Medier's care plan, there have been zero incidents and the site is noticeably faster too. I wish we had done it earlier."</p>
        <div class="test-author"><div class="test-avatar">NC</div><div><div class="test-name">Ngozi Chukwu</div><div class="test-role">Founder, Kola Market · Enugu</div></div></div>
      </div>
    </div>
  </section>

  <section aria-labelledby="faq-heading">
    <span class="s-label">Frequently Asked Questions</span>
    <h2 class="s-head" id="faq-heading">Questions about our<br><em>WordPress maintenance service</em></h2>
    <div class="faq-layout">
      <div class="faq-sidebar">
        <h3>Something we did not cover?</h3>
        <p>Book a free 20-minute audit call. We will review your WordPress site, tell you what it needs, and recommend the right care plan without pressure.</p>
        <a href="mailto:hello@i2medier.com" class="faq-clink">Email Us Directly →</a>
      </div>
      <div class="faq-list" role="list">
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq1">Do you only maintain WordPress websites?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span></button><div class="faq-a" id="faq1">Yes, this page is specifically for WordPress maintenance. We maintain brochure websites, business websites, blogs, membership sites, WooCommerce stores, and multisite WordPress setups.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq2">What happens if my WordPress site goes down?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span></button><div class="faq-a" id="faq2">We monitor your WordPress site every 1 to 5 minutes. If it goes down, our system alerts us immediately and we begin investigating. Growth and Agency plans include emergency response SLAs.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq3">Do you maintain WordPress websites you did not build?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span></button><div class="faq-a" id="faq3">Yes. We frequently take over WordPress sites built by other developers or agencies. We start with an onboarding audit so we know exactly what we are inheriting.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq4">How often are backups taken?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span></button><div class="faq-a" id="faq4">Daily automated backups are included on all WordPress care plans. Files and database are stored off-server so your backup remains safe even if your hosting environment is compromised.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq5">What is included in the monthly maintenance report?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span></button><div class="faq-a" id="faq5">You receive a clear written report covering WordPress core, plugin, and theme updates applied, security results, backup status, uptime, performance, incident activity, and recommendations for the next month.</div></div>
        <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="faq6">How much does WordPress maintenance cost in Nigeria?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></span></button><div class="faq-a" id="faq6">Our WordPress maintenance plans start from ₦35,000 per month for smaller sites and scale upward based on plugin complexity, WooCommerce usage, traffic, and support requirements.</div></div>
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
