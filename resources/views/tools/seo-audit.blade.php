@extends('public.layouts.seotool')

@section('title', 'Free SEO Audit — Check Any Website Instantly | i2Medier')

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
            'name' => 'Free Tools',
            'item' => route('tools.hub'),
        ],
        [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => 'Free SEO Audit',
            'item' => route('tools.seo-audit'),
        ],
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
            'name' => 'Is this SEO audit tool really free?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes — completely free, with no account required, no email signup, and no usage limits. Just enter any URL and get a full audit report instantly.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'How accurate are the results?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Very accurate for the checks it covers. On-page signals are extracted directly from your page\'s HTML source, and performance scores come from Google\'s own PageSpeed Insights API — the same data source Google uses.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'How often should I run an SEO audit?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'For most websites, running an audit monthly is a good baseline. You should also run one after any major site changes, after a Google algorithm update, or if you notice a sudden drop in organic traffic.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Can I audit someone else\'s website?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes. You can audit any publicly accessible webpage — including competitor sites, client sites you\'re evaluating, or pages you\'re researching.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'What does my SEO score mean?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Your overall SEO score is a weighted composite of all checks across six categories. A score of 80+ is excellent, 60–79 needs work, and below 60 signals significant issues to address.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Why can\'t the tool audit my website?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Some websites block automated requests through firewalls, rate limiting, or bot protection (like Cloudflare). If the audit fails, it usually means the site is actively preventing automated access. This doesn\'t mean anything is wrong with your site — it just means the tool can\'t retrieve the HTML.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Does fixing these SEO issues guarantee better rankings?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'No tool can guarantee specific rankings. What fixing audit issues does guarantee is that you\'re removing barriers that prevent Google from crawling, understanding, and ranking your content.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'What is a Core Web Vital and why does it matter?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Core Web Vitals are performance metrics defined by Google that measure real-world user experience: LCP (loading speed), CLS (visual stability), and INP (responsiveness). Google uses these as a ranking signal.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'What is schema markup and do I need it?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Schema markup is code you add to your page that helps Google understand its content. Pages with proper schema can qualify for rich results in Google Search, which increases click-through rates significantly.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'How is this different from Google Search Console?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Google Search Console shows historical performance data. This tool analyses the current state of any page right now, gives you an immediate scored report, and generates AI recommendations. They complement each other.',
            ],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('page_css')
    @vite('resources/css/public/pages/seo-audit.css')
@endpush

@section('body_attrs')
id="seo-audit-page"
data-fetch-html-route="{{ route('tools.seo-audit.fetch-html') }}"
data-psi-route="{{ route('tools.seo-audit.psi') }}"
data-crux-route="{{ route('tools.seo-audit.crux') }}"
data-recommend-route="{{ route('tools.seo-audit.recommend') }}"
data-honeypot-field="{{ \App\Support\Honeypot::fieldName() }}"
data-honeypot-time-field="{{ \App\Support\Honeypot::timeFieldName() }}"
data-honeypot-started-at="{{ \App\Support\Honeypot::startedAt() }}"
@endsection

@section('content')
<nav class="is-dark">
  @include('public.partials.logo', ['mode' => 'light', 'class' => 'logo'])
  @include('public.partials.menu')
  <a href="{{ route('site.home') }}" class="nav-back">← Back to site</a>
  <button class="public-nav-toggle" type="button" aria-expanded="false" aria-controls="public-side-nav" aria-label="Open navigation">
    <span></span>
    <span></span>
    <span></span>
  </button>
</nav>

<div id="input-state">
  <div class="hero">
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-scan" aria-hidden="true"></div>
    <div class="hero-eyebrow"><svg style="width:13px;height:13px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> &nbsp; Free SEO Audit</div>
    <h1>Uncover what's holding<br>your site back from <em>ranking</em></h1>
    <p class="hero-sub">Enter any URL for a comprehensive audit — meta tags, content quality, technical health, Core Web Vitals, social signals, and AI-powered recommendations. All in one report.</p>
    <div class="audit-form">
      <div class="audit-input-wrap">
        <span class="url-prefix">https://</span>
        <input type="text" id="audit-url" placeholder="yourwebsite.com" autocomplete="url" spellcheck="false"/>
        <button class="audit-btn" id="audit-btn" type="button">
          <span class="btn-text">Analyse →</span>
          <div class="btn-spinner"></div>
        </button>
      </div>
      <p class="audit-note">Powered by real HTML analysis, Google PageSpeed Insights, Chrome UX Report, and multi-provider AI &nbsp;·&nbsp; Free, no sign-up required</p>
    </div>
  </div>
</div>

<div id="loading-state" style="padding:3rem 5%">
  <div style="max-width:500px;margin:0 auto;text-align:center">
    <div class="loading-title">Auditing your website…</div>
    <p class="loading-sub">Running <strong>6 diagnostic checks</strong> across your site</p>
    <div class="loading-phases" id="loading-phases">
      <div class="lp-item" id="lp-1"><div class="lp-icon" id="lpi-1"><svg style="width:14px;height:14px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div><span>Fetching page content…</span></div>
      <div class="lp-item" id="lp-2"><div class="lp-icon" id="lpi-2"><svg style="width:14px;height:14px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg></div><span>Analysing meta tags &amp; content…</span></div>
      <div class="lp-item" id="lp-3"><div class="lp-icon" id="lpi-3"><svg style="width:14px;height:14px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg></div><span>Running Google PageSpeed Insights…</span></div>
      <div class="lp-item" id="lp-4"><div class="lp-icon" id="lpi-4"><svg style="width:14px;height:14px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg></div><span>Fetching Chrome UX Report field data…</span></div>
      <div class="lp-item" id="lp-5"><div class="lp-icon" id="lpi-5"><svg style="width:14px;height:14px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg></div><span>Scoring all categories…</span></div>
      <div class="lp-item" id="lp-6"><div class="lp-icon" id="lpi-6"><svg style="width:14px;height:14px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><rect x="9" y="9" width="6" height="6"></rect><path d="M9 2H7a2 2 0 0 0-2 2v2M15 2h2a2 2 0 0 1 2 2v2M9 22H7a2 2 0 0 1-2-2v-2M15 22h2a2 2 0 0 0 2-2v-2M2 9v2M2 13v2M22 9v2M22 13v2"></path></svg></div><span>Generating AI recommendations…</span></div>
    </div>
    <div class="loading-bar"><div class="loading-bar-fill" id="loading-bar-fill"></div></div>
  </div>
</div>

<div id="error-state">
  <div class="error-ico"><svg style="width:2.5rem;height:2.5rem;color:#f59e0b" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg></div>
  <h3 class="error-title">Audit could not complete</h3>
  <p class="error-desc" id="error-msg">We were unable to fetch or analyse that URL. Please check the address is correct and publicly accessible, then try again.</p>
  <button class="btn-retry" id="retry-audit-btn" type="button">Try Again</button>
</div>

<div id="results-state">
  <div class="results-header">
    <div class="score-circle-wrap" id="score-circle-wrap">
      <svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg">
        <circle class="score-bg-circle" cx="60" cy="60" r="50"/>
        <circle class="score-fg-circle" id="score-fg" cx="60" cy="60" r="50" style="--full:314.16;--offset:314.16;stroke-dasharray:314.16;stroke-dashoffset:314.16"/>
      </svg>
      <div class="score-inner">
        <div class="score-num" id="score-num">0</div>
        <div class="score-grade" id="score-grade">—</div>
        <div class="score-label">Overall</div>
      </div>
    </div>
    <div class="results-info">
      <div class="results-url">
        <span>Audit for</span>
        <span class="results-url-val" id="results-url-display"></span>
        <span id="results-date" style="color:rgba(255,255,255,.2)"></span>
      </div>
      <div class="results-title" id="results-page-title">Loading…</div>
      <p class="results-summary" id="results-summary"></p>
      <div class="results-meta-tags" id="results-meta-tags"></div>
    </div>
  </div>

  <div class="results-body">
    <div class="main-col">
      <span class="section-subtitle">Audit Scores</span>
      <div class="section-title">Performance by Category</div>
      <div class="scores-grid" id="scores-grid"></div>

      <span class="section-subtitle">Issues Found</span>
      <div class="section-title">Critical Issues & Warnings</div>
      <div class="issues-block">
        <div class="issues-tabs">
          <div class="issue-tab crit active" data-issue-tab="critical">
            <svg style="width:8px;height:8px;fill:#dc2626;stroke:none;flex-shrink:0" viewBox="0 0 8 8" xmlns="http://www.w3.org/2000/svg"><circle cx="4" cy="4" r="4"/></svg>
            Critical <span class="issue-tab-count" id="crit-count">0</span>
          </div>
          <div class="issue-tab warn" data-issue-tab="warnings">
            <svg style="width:8px;height:8px;fill:#f59e0b;stroke:none;flex-shrink:0" viewBox="0 0 8 8" xmlns="http://www.w3.org/2000/svg"><circle cx="4" cy="4" r="4"/></svg>
            Warnings <span class="issue-tab-count" id="warn-count">0</span>
          </div>
          <div class="issue-tab pass" data-issue-tab="passed">
            <svg style="width:14px;height:14px;color:#16a34a;flex-shrink:0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            Passed <span class="issue-tab-count" id="pass-count">0</span>
          </div>
        </div>
        <div class="issues-content">
          <div class="issue-pane active" id="pane-critical"></div>
          <div class="issue-pane" id="pane-warnings"></div>
          <div class="issue-pane" id="pane-passed"></div>
        </div>
      </div>

      <span class="section-subtitle">Full Breakdown</span>
      <div class="section-title">Detailed Check Results</div>
      <div class="checks-block" id="checks-block"></div>

      <span class="section-subtitle">AI Analysis</span>
      <div class="section-title">AI Recommendations</div>
      <div class="ai-block">
        <div class="ai-block-head">
          <div>
            <div class="ai-title">Prioritised Action Plan</div>
          </div>
          <span class="ai-badge" id="ai-provider-badge">Powered by AI</span>
        </div>
        <div id="ai-content">
          <div class="ai-loading"><div class="ai-spinner"></div> Generating recommendations…</div>
        </div>
      </div>
    </div>

    <div class="sidebar">
      <div class="psi-block">
        <div class="psi-title">Lighthouse Scores</div>
        <div class="psi-scores" id="psi-scores-grid">
          <div class="psi-score-item"><div class="psi-score-num" id="psi-perf" style="color:var(--g400)">—</div><div class="psi-score-label">Performance</div></div>
          <div class="psi-score-item"><div class="psi-score-num" id="psi-seo" style="color:var(--g400)">—</div><div class="psi-score-label">SEO</div></div>
          <div class="psi-score-item"><div class="psi-score-num" id="psi-a11y" style="color:var(--g400)">—</div><div class="psi-score-label">Accessibility</div></div>
          <div class="psi-score-item"><div class="psi-score-num" id="psi-bp" style="color:var(--g400)">—</div><div class="psi-score-label">Best Practices</div></div>
        </div>
        <div style="font-size:.68rem;color:var(--g400);text-align:center">Source: Google PageSpeed Insights</div>
      </div>

      <div class="cwv-block">
        <div class="psi-title">Core Web Vitals (Field Data)</div>
        <div id="cwv-list"></div>
      </div>

      <div class="details-block">
        <div class="psi-title">Lab Metrics</div>
        <div id="lab-metrics-list"></div>
      </div>

      <div class="details-block">
        <div class="psi-title">Page Details</div>
        <div id="page-details-list"></div>
      </div>

      <button class="reaudit-btn" id="reaudit-btn" type="button">↻ Re-run Audit</button>
      <button class="new-audit-btn" id="new-audit-btn" type="button">← Audit a Different URL</button>
    </div>
  </div>
</div>

<!-- SEO CONTENT WRAPPER -->
<div class="seo-content">
  <div class="seo-content-inner">

    <!-- 1. What Is a Free SEO Audit? -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">ABOUT THIS TOOL</span>
      <h2>About this free SEO audit tool</h2>
      <p>This free SEO audit tool runs an automatic analysis of any web page and reveals how well it is optimised for search engines like Google. It checks the technical, on-page, and performance factors that influence where your site appears in search results — and surfaces the specific issues holding it back.</p>
      <p>Unlike paying an agency thousands of naira (or dollars) for a manual review, this free website SEO audit runs the same core checks instantly and at no cost. You get a scored report covering everything from your title tag and meta description to Core Web Vitals, schema markup, and social media preview data — in under a minute.</p>
      <p>Think of it as your site's health check. It won't replace a deep professional strategy, but it's the essential first step to understanding where you stand and what to fix first.</p>
    </div>

    <!-- 2. How Our SEO Audit Tool Works -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">HOW IT WORKS</span>
      <h2>How Our SEO Audit Tool Works</h2>
      <p>Our tool runs a multi-stage analysis the moment you enter your URL. Here's what happens behind the scenes:</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>
          <div class="cfc-title">Page Fetch</div>
          <div class="cfc-desc">We retrieve your page's HTML source in real time, exactly as a search engine crawler would see it.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></div>
          <div class="cfc-title">Signal Parsing</div>
          <div class="cfc-desc">We extract over 40 SEO signals — titles, headings, meta tags, structured data, links, images, and more — and score each one.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg></div>
          <div class="cfc-title">PageSpeed Insights</div>
          <div class="cfc-desc">We call Google's PageSpeed Insights API to get real Lighthouse performance scores and Core Web Vitals directly from Google.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
          <div class="cfc-title">Score Calculation</div>
          <div class="cfc-desc">Every check is weighted by SEO importance and combined into an overall score from 0–100, plus individual category scores.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><line x1="9" y1="1" x2="9" y2="4"/><line x1="15" y1="1" x2="15" y2="4"/><line x1="9" y1="20" x2="9" y2="23"/><line x1="15" y1="20" x2="15" y2="23"/><line x1="20" y1="9" x2="23" y2="9"/><line x1="20" y1="14" x2="23" y2="14"/><line x1="1" y1="9" x2="4" y2="9"/><line x1="1" y1="14" x2="4" y2="14"/></svg></div>
          <div class="cfc-title">AI Recommendations</div>
          <div class="cfc-desc">Claude AI reviews your audit data and generates a prioritised action plan — specific, actionable, and ranked by impact.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/></svg></div>
          <div class="cfc-title">Full Report</div>
          <div class="cfc-desc">Everything is displayed in a clear dashboard: critical issues, warnings, passed checks, and quick-win recommendations.</div>
        </div>
      </div>
    </div>

    <!-- 3. What This SEO Audit Checks -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">WHAT IT CHECKS</span>
      <h2>What This SEO Audit Checks</h2>
      <p>This tool analyses your page across six core categories. Together they cover the most impactful ranking factors Google considers when deciding where to place your site in search results.</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
          <div class="cfc-title">On-Page SEO</div>
          <div class="cfc-desc">Title tag presence, length, and keyword placement. Meta description quality. H1/H2/H3 heading structure. Canonical tags and duplicate content signals.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></div>
          <div class="cfc-title">Content Quality</div>
          <div class="cfc-desc">Word count, content depth, keyword density, readability, and internal linking structure. Thin or low-quality content is flagged immediately.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg></div>
          <div class="cfc-title">Technical Health</div>
          <div class="cfc-desc">Robots meta tags, viewport settings, charset declarations, HTTPS security, hreflang for multi-language, and structured data / schema markup.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg></div>
          <div class="cfc-title">Performance</div>
          <div class="cfc-desc">Google Lighthouse scores for Performance, SEO, Accessibility, and Best Practices. Core Web Vitals: LCP, FID/INP, CLS, FCP, and TTFB.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg></div>
          <div class="cfc-title">Image Optimisation</div>
          <div class="cfc-desc">Alt text presence and quality for all images. Image file naming. Missing alt attributes that hurt both SEO and accessibility.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4 19-7z"/></svg></div>
          <div class="cfc-title">Social &amp; Open Graph</div>
          <div class="cfc-desc">Open Graph title, description, and image for Facebook/LinkedIn sharing. Twitter Card tags for proper Twitter previews. Social metadata completeness.</div>
        </div>
      </div>
    </div>

    <!-- 4. Why Your Website Needs an SEO Audit -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">WHY IT MATTERS</span>
      <h2>Why Your Website Needs an SEO Audit</h2>
      <p>Most websites have SEO problems they don't know about. A missing meta description here, a broken canonical there, or images without alt text — individually these seem small, but together they can cost you significant ranking positions and organic traffic.</p>
      <div class="why-list">
        <div class="why-item">
          <div class="why-num">1</div>
          <div>
            <div class="why-body-title">You can't fix what you can't see</div>
            <div class="why-body-desc">An audit makes invisible problems visible. Most site owners have no idea their page is missing structured data, has a slow LCP, or uses duplicate title tags — until they check.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">2</div>
          <div>
            <div class="why-body-title">Google's standards keep changing</div>
            <div class="why-body-desc">Core Web Vitals, mobile-first indexing, helpful content updates — what passed in 2022 may be hurting you today. Regular audits keep you current.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">3</div>
          <div>
            <div class="why-body-title">Your competitors are auditing theirs</div>
            <div class="why-body-desc">In competitive niches, technical parity is the baseline. If your competitors have faster pages, better structured data, and tighter on-page optimisation, they will outrank you.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">4</div>
          <div>
            <div class="why-body-title">Better SEO = lower cost per lead</div>
            <div class="why-body-desc">Organic traffic is free. A site that ranks well drives consistent visitors without paying for ads every month. An audit is the first step to that compounding return.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">5</div>
          <div>
            <div class="why-body-title">SEO issues compound over time</div>
            <div class="why-body-desc">Unfixed crawl errors, slow load times, and thin content accumulate. Catching problems early costs far less to fix than addressing years of technical debt at once.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 5. Common SEO Issues This Tool Can Help You Find -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">COMMON ISSUES</span>
      <h2>Common SEO Issues This Tool Can Help You Find</h2>
      <p>These are the most frequent issues our audit uncovers — and some of the easiest wins available once you know where to look.</p>
      <div class="issues-feature-grid">
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">Missing or duplicate title tags</div>
            <div class="ifi-desc">The title tag is the single most important on-page SEO element. Missing, too short, too long, or duplicated across pages all hurt rankings.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">No meta description</div>
            <div class="ifi-desc">Without a meta description, Google writes its own — often poorly. A compelling description improves click-through rate from search results.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">Missing or multiple H1 tags</div>
            <div class="ifi-desc">Every page should have exactly one H1 that clearly signals the topic to search engines. Zero or multiple H1s is a common structural mistake.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Images without alt text</div>
            <div class="ifi-desc">Alt text helps Google understand images and is critical for accessibility. Pages with many untagged images miss ranking opportunities in image search.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">No schema / structured data</div>
            <div class="ifi-desc">Schema markup helps Google display rich results (star ratings, FAQs, events). Pages without it miss out on enhanced SERP features entirely.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Slow Core Web Vitals</div>
            <div class="ifi-desc">LCP above 2.5s, high CLS, or slow FCP directly harm your Google rankings. Performance is now a confirmed ranking signal.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">Missing Open Graph tags</div>
            <div class="ifi-desc">When your pages are shared on social media without OG tags, the preview looks broken or generic. This reduces clicks and brand credibility.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">Thin or low word-count content</div>
            <div class="ifi-desc">Pages with too little content often fail to rank because they don't provide enough value or depth to satisfy search intent for competitive queries.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 6. Who Should Use This SEO Audit Tool? -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">WHO IT'S FOR</span>
      <h2>Who Should Use This SEO Audit Tool?</h2>
      <p>Whether you're a first-time website owner or an experienced marketer, this tool gives you instant, actionable data about any publicly accessible web page.</p>
      <div class="who-grid">
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg></div>
          <div class="who-title">Business Owners</div>
          <div class="who-desc">Check your homepage, key service pages, or product pages to see exactly how they appear to Google — and what's stopping you from ranking higher than competitors.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></div>
          <div class="who-title">Content Creators & Bloggers</div>
          <div class="who-desc">Run an audit on any post before publishing to catch missing meta data, heading errors, and thin content before it goes live.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
          <div class="who-title">Web Developers</div>
          <div class="who-desc">Verify technical SEO on client sites after launch. Check canonical tags, structured data, viewport settings, and performance metrics in one pass.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg></div>
          <div class="who-title">Digital Marketers</div>
          <div class="who-desc">Quickly audit competitor pages, landing pages, or campaign targets to identify gaps, benchmark performance, and prioritise optimisation work.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"/><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"/><path d="M2 7h20"/></svg></div>
          <div class="who-title">E-commerce Store Owners</div>
          <div class="who-desc">Check product and category pages for schema markup, image alt text, page speed, and on-page optimisation — all of which directly impact sales from organic search.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div>
          <div class="who-title">SEO Students & Beginners</div>
          <div class="who-desc">Learn exactly what search engines look for by running audits on real pages. Each check comes with a clear explanation of why it matters.</div>
        </div>
      </div>
    </div>

    <!-- 7. What To Do After Getting Your SEO Audit Result -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">AFTER YOUR AUDIT</span>
      <h2>What To Do After Getting Your SEO Audit Result</h2>
      <p>An audit is only valuable if you act on it. Here's a proven workflow to turn your report into real ranking improvements:</p>
      <div class="steps-list">
        <div class="step-item">
          <div class="step-num">1</div>
          <div>
            <div class="step-title">Fix critical issues first</div>
            <div class="step-desc">Start with anything flagged as Critical — missing title tags, no meta description, blocked robots directives, or missing H1 tags. These have the highest direct impact on crawlability and rankings.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">2</div>
          <div>
            <div class="step-title">Address performance and Core Web Vitals</div>
            <div class="step-desc">If your Lighthouse performance score is below 70 or your LCP is over 2.5 seconds, make page speed your next priority. Compress images, reduce render-blocking scripts, and consider a faster host or CDN.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">3</div>
          <div>
            <div class="step-title">Add structured data / schema</div>
            <div class="step-desc">If your page has no schema markup, add the most relevant type — Article, LocalBusiness, Product, FAQ, etc. This unlocks rich results in Google and can significantly boost click-through rates.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">4</div>
          <div>
            <div class="step-title">Review the AI action plan</div>
            <div class="step-desc">The AI Recommendations section provides a prioritised list of improvements specific to your page. Work through them in order of impact — Critical → High → Medium → Low.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">5</div>
          <div>
            <div class="step-title">Re-audit after making changes</div>
            <div class="step-desc">Once you've made improvements, run the audit again to confirm the issues are resolved and your score has improved. Track your progress over time.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">6</div>
          <div>
            <div class="step-title">Get professional help for complex issues</div>
            <div class="step-desc">If your audit reveals deep technical problems — site architecture issues, crawl budget problems, international SEO, or a history of Google penalties — working with an SEO professional will save time and prevent mistakes.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 8. Free SEO Audit vs Professional SEO Audit -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">COMPARE</span>
      <h2>Free SEO Audit vs Professional SEO Audit</h2>
      <p>Both have their place. Understanding what each delivers helps you decide when a free tool is enough — and when you need expert eyes on your site.</p>
      <div class="tools-compare-wrapper">
      <table class="compare-table">
        <thead>
          <tr>
            <th>What's Covered</th>
            <th class="highlight">This Free Tool</th>
            <th>Professional Audit</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>On-page SEO checks</td>
            <td class="yes">✓ Full</td>
            <td class="yes">✓ Full + deeper analysis</td>
          </tr>
          <tr>
            <td>Core Web Vitals</td>
            <td class="yes">✓ Real data from Google</td>
            <td class="yes">✓ Full lab + field data</td>
          </tr>
          <tr>
            <td>Structured data check</td>
            <td class="yes">✓ Detection &amp; scoring</td>
            <td class="yes">✓ Validation + recommendations</td>
          </tr>
          <tr>
            <td>AI recommendations</td>
            <td class="yes">✓ Included</td>
            <td class="yes">✓ Human expert strategy</td>
          </tr>
          <tr>
            <td>Backlink analysis</td>
            <td class="no">✗ Not included</td>
            <td class="yes">✓ Full backlink profile</td>
          </tr>
          <tr>
            <td>Competitor comparison</td>
            <td class="no">✗ Not included</td>
            <td class="yes">✓ Gap analysis included</td>
          </tr>
          <tr>
            <td>Full site crawl (all pages)</td>
            <td class="partial">One page at a time</td>
            <td class="yes">✓ Entire site</td>
          </tr>
          <tr>
            <td>Keyword research</td>
            <td class="no">✗ Not included</td>
            <td class="yes">✓ Targeted research</td>
          </tr>
          <tr>
            <td>Cost</td>
            <td class="yes">✓ Free, instant</td>
            <td>Paid — varies by scope</td>
          </tr>
        </tbody>
      </table>
      </div>
      <p style="margin-top:1.25rem">Use this free tool to get a clear picture of your current SEO health and fix the obvious issues yourself. When you're ready to go deeper — backlinks, competitor gaps, keyword strategy, and a full site crawl — that's when a professional audit pays for itself.</p>
    </div>

  </div><!-- /seo-content-inner -->
</div><!-- /seo-content -->

<!-- ══════════════════════════════════════
     9. SERVICE CTA
══════════════════════════════════════ -->
<section class="service-cta">
  <div class="service-cta-eyebrow">&#10003; Expert SEO Help — Done For You</div>
  <h2>Need help fixing your<br><em>SEO issues?</em></h2>
  <p>Our audit shows you what's wrong. We fix it. From technical SEO and on-page optimisation to website design, domain registration, and full digital business setup — i2Medier handles it all.</p>
  <div class="service-pills">
    <span class="service-pill">SEO Optimisation</span>
    <span class="service-pill">Website Design</span>
    <span class="service-pill">Domain & Hosting</span>
    <span class="service-pill">Content Strategy</span>
    <span class="service-pill">Business Setup</span>
    <span class="service-pill">Google My Business</span>
  </div>
  <div class="cta-buttons">
    <a href="{{ route('site.start', ['services' => 'seo', 'addons' => 'seo-audit,seo-analytics', 'source_page' => 'tool-seo-audit', 'source_label' => 'SEO Audit Tool', 'locked' => '1']) }}" class="cta-btn-primary">Fix My SEO Issues →</a>
    <a href="{{ route('site.services') }}" class="cta-btn-secondary">View All Services</a>
  </div>
</section>

<!-- ══════════════════════════════════════
     10. FAQ SECTION (with FAQ Schema)
══════════════════════════════════════ -->
<section class="faq-section">
  <div class="faq-inner">
    <div class="faq-header">
      <span class="seo-section-eyebrow">Got Questions?</span>
      <h2>Frequently Asked Questions About SEO Audits</h2>
      <p>Everything you need to know about running your first SEO audit and interpreting your results.</p>
    </div>
    <div class="faq-list">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="seo-f1">
          <span class="faq-q-text">Is this SEO audit tool really free?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="seo-f1">Yes — completely free, with no account required, no email signup, and no usage limits. Just enter any URL and get a full audit report instantly. The tool uses Google's own PageSpeed Insights API and Claude AI to generate your results.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="seo-f2">
          <span class="faq-q-text">How accurate are the results?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="seo-f2">Very accurate for the checks it covers. On-page signals are extracted directly from your page's HTML source, and performance scores come from Google's own PageSpeed Insights API — the same data source Google uses. The AI recommendations are generated by analysing your actual audit data, not generic templates.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="seo-f3">
          <span class="faq-q-text">How often should I run an SEO audit?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="seo-f3">For most websites, running an audit monthly is a good baseline. You should also run one immediately after any major site changes (new theme, plugin updates, content restructures), after a Google algorithm update, or if you notice a sudden drop in organic traffic.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="seo-f4">
          <span class="faq-q-text">Can I audit someone else's website?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="seo-f4">Yes. You can audit any publicly accessible webpage — including competitor sites, client sites you're evaluating, or pages you're researching. The tool only reads publicly available HTML, the same data any search engine crawler would access.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="seo-f5">
          <span class="faq-q-text">What does my SEO score mean?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="seo-f5">Your overall SEO score is a weighted composite of all checks across six categories: On-Page SEO, Content Quality, Technical Health, Performance, Images, and Social. A score of 80+ is excellent, 60–79 needs work, and below 60 signals significant issues to address. The grade (A+ down to F) gives you a quick summary alongside the numeric score.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="seo-f6">
          <span class="faq-q-text">Why can't the tool audit my website?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="seo-f6">Some websites block automated requests through firewalls, rate limiting, or bot protection (like Cloudflare). If the audit fails, it usually means the site is actively preventing automated access. This doesn't mean anything is wrong with your site — it just means the tool can't retrieve the HTML. Try disabling bot protection temporarily, or contact us for a manual review.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="seo-f7">
          <span class="faq-q-text">Does fixing these SEO issues guarantee better rankings?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="seo-f7">No tool or service can guarantee specific rankings — anyone who claims otherwise should be treated with caution. What fixing audit issues does guarantee is that you're removing barriers that prevent Google from crawling, understanding, and ranking your content. Combined with good content and a healthy backlink profile, strong technical SEO gives you the best possible foundation to rank.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="seo-f8">
          <span class="faq-q-text">What is a Core Web Vital and why does it matter?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="seo-f8">Core Web Vitals are a set of performance metrics defined by Google that measure real-world user experience: Largest Contentful Paint (LCP) measures loading speed, Cumulative Layout Shift (CLS) measures visual stability, and Interaction to Next Paint (INP) measures responsiveness. Google uses these as a ranking signal, so poor scores can directly hurt your position in search results.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="seo-f9">
          <span class="faq-q-text">What is schema markup and do I need it?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="seo-f9">Schema markup (also called structured data) is code you add to your page that helps Google understand its content — whether it's a business, an article, a product, a review, an event, or an FAQ. Pages with proper schema can qualify for rich results in Google Search (star ratings, FAQs, price ranges), which increases click-through rates significantly. It's not mandatory, but it's a meaningful competitive advantage.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="seo-f10">
          <span class="faq-q-text">How is this different from Google Search Console?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="seo-f10">Google Search Console shows you historical data about how your site has already performed in search — impressions, clicks, index coverage, and manual actions. This tool does something different: it analyses the current state of any page right now, gives you an immediate scored report, and generates AI recommendations. They complement each other — use this tool to identify and fix issues, then use Search Console to monitor the results over time.</div>
      </div>

    </div>
  </div>
</section>

@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-seo-audit.js')
@endpush
