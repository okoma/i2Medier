@extends('public.layouts.seotool')

@section('title', 'SEO Audit Tool — i2Medier')

@push('page_meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-seo-audit.js')
@endpush
