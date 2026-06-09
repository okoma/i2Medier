@extends('public.layouts.nametool')

@section('title', 'Email Deliverability Checker — Free Inbox Test | i2Medier')

@push('page_meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('page_css')
    @vite('resources/css/public/pages/email-deliverability-checker.css')
@endpush

@section('body_attrs')
id="email-deliverability-checker-page"
data-generate-route="{{ route('tools.email-deliverability-checker.generate') }}"
data-live-start-route="{{ route('tools.email-deliverability-checker.live-test.start') }}"
data-live-poll-route="{{ route('tools.email-deliverability-checker.live-test.poll') }}"
data-honeypot-field="{{ \App\Support\Honeypot::fieldName() }}"
data-honeypot-time-field="{{ \App\Support\Honeypot::timeFieldName() }}"
data-honeypot-started-at="{{ \App\Support\Honeypot::startedAt() }}"
@endsection

@section('content')
<svg aria-hidden="true" class="ui-icon-sprite">
    <symbol id="icon-history" viewBox="0 0 24 24"><path d="M3 12a9 9 0 1 0 3-6.7"/><path d="M3 4v5h5"/><path d="M12 7v5l3 2"/></symbol>
    <symbol id="icon-spark" viewBox="0 0 24 24"><path d="m12 3 1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9z"/></symbol>
    <symbol id="icon-mail" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></symbol>
    <symbol id="icon-chevron" viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></symbol>
    <symbol id="icon-refresh" viewBox="0 0 24 24"><path d="M20 12a8 8 0 1 1-2.34-5.66"/><path d="M20 4v6h-6"/></symbol>
    <symbol id="icon-copy" viewBox="0 0 24 24"><rect x="9" y="9" width="11" height="11" rx="2"/><rect x="4" y="4" width="11" height="11" rx="2"/></symbol>
    <symbol id="icon-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a15 15 0 0 1 0 18"/><path d="M12 3a15 15 0 0 0 0 18"/></symbol>
    <symbol id="icon-shield" viewBox="0 0 24 24"><path d="M12 3 5 6v5c0 5 3.4 8.6 7 10 3.6-1.4 7-5 7-10V6z"/><path d="m9 12 2 2 4-4"/></symbol>
    <symbol id="icon-key" viewBox="0 0 24 24"><circle cx="8" cy="15" r="4"/><path d="M12 15h9"/><path d="M18 12v6"/></symbol>
    <symbol id="icon-ban" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="m7 7 10 10"/></symbol>
    <symbol id="icon-file" viewBox="0 0 24 24"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/><path d="M14 3v5h5"/><path d="M9 13h6"/><path d="M9 17h6"/></symbol>
    <symbol id="icon-star" viewBox="0 0 24 24"><path d="m12 4 2.5 5 5.5.8-4 3.9.9 5.5-4.9-2.6-4.9 2.6.9-5.5-4-3.9 5.5-.8z"/></symbol>
    <symbol id="icon-lock" viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 0 1 8 0v3"/></symbol>
    <symbol id="icon-alert" viewBox="0 0 24 24"><path d="M12 4 3 20h18L12 4z"/><path d="M12 9v5"/><path d="M12 17h.01"/></symbol>
    <symbol id="icon-check" viewBox="0 0 24 24"><path d="m5 13 4 4L19 7"/></symbol>
    <symbol id="icon-info" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 10v5"/><path d="M12 7h.01"/></symbol>
    <symbol id="icon-inbox" viewBox="0 0 24 24"><path d="M4 5h16l2 10H16l-2 3h-4l-2-3H2z"/><path d="M4 5v10"/><path d="M20 5v10"/></symbol>
    <symbol id="icon-chart" viewBox="0 0 24 24"><path d="M4 20V10"/><path d="M10 20V4"/><path d="M16 20v-7"/><path d="M22 20v-4"/></symbol>
</svg>

<nav class="is-dark">
    @include('public.partials.logo', ['mode' => 'light', 'class' => 'logo'])
    @include('public.partials.menu')
    <div class="nav-right">
       
        <button class="nav-badge" id="history-toggle" type="button"><span class="ui-icon"><svg><use href="#icon-history"></use></svg></span>History</button>
    </div>
    <button class="public-nav-toggle" type="button" aria-expanded="false" aria-controls="public-side-nav" aria-label="Open navigation">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

<div class="hero">
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-particles" id="hero-particles" aria-hidden="true"></div>
    <div class="hero-content">
        <div class="hero-eyebrow"><span class="ui-icon"><svg><use href="#icon-spark"></use></svg></span>Real Technical Checks</div>
        <h1 class="hero-title">Check if your emails<br>actually <em>reach the inbox</em></h1>
        <p class="hero-sub">Analyse SPF, DKIM, DMARC, sender reputation, spam triggers, blacklists, and more, then get a clear action plan to improve deliverability.</p>
        <div class="hero-stats">
            <div class="hs-item"><div class="hs-num">12+</div><div class="hs-label">Checks Run</div></div>
            <div class="hs-item"><div class="hs-num">SPF</div><div class="hs-label">DNS Records</div></div>
            <div class="hs-item"><div class="hs-num">DKIM</div><div class="hs-label">Verified</div></div>
            <div class="hs-item"><div class="hs-num">DMARC</div><div class="hs-label">Policy Check</div></div>
        </div>

        <div class="form-card">
            <div class="fc-full">
                <label class="fc-label">Audit Mode</label>
                <div class="pill-group mode-switch" id="audit-mode-group">
                    <button class="pill active" data-val="basic" type="button">Basic Audit</button>
                    <button class="pill" data-val="live" type="button">Live Inbox Test</button>
                </div>
            </div>
            <div class="fc-full">
                <label class="fc-label" id="target-label">Email address or domain to check <span class="req">*</span></label>
                <input class="fc-text-input" id="email-input" placeholder="hello@yourdomain.com  or  yourdomain.com" autocomplete="off" spellcheck="false"/>
                <p class="fc-help" id="target-help">Use a domain for DNS/authentication checks or an email address for sender-specific context.</p>
            </div>

            <div class="fc-row">
                <div class="fc-col">
                    <label class="fc-label">Check type</label>
                    <div class="pill-group" id="check-type-group">
                        <button class="pill active" data-val="full" type="button">Full Audit</button>
                        <button class="pill" data-val="dns" type="button">DNS Only</button>
                        <button class="pill" data-val="content" type="button">Content</button>
                        <button class="pill" data-val="reputation" type="button">Reputation</button>
                    </div>
                </div>
                <div class="fc-col">
                    <label class="fc-label">Email client target</label>
                    <div class="pill-group" id="client-group">
                        <button class="pill active" data-val="all" type="button">All Clients</button>
                        <button class="pill" data-val="gmail" type="button">Gmail</button>
                        <button class="pill" data-val="outlook" type="button">Outlook</button>
                        <button class="pill" data-val="apple" type="button">Apple Mail</button>
                    </div>
                </div>
            </div>

            <div class="adv-toggle" id="adv-toggle" type="button">
                <span class="adv-toggle-label">Advanced options</span>
                <span class="adv-toggle-icon"><span class="ui-icon"><svg><use href="#icon-chevron"></use></svg></span></span>
            </div>
            <div class="adv-section" id="adv-section">
                <div class="fc-row trio">
                    <div class="fc-col">
                        <label class="fc-label">Sending domain (optional)</label>
                        <input class="fc-text-input" id="adv-domain" placeholder="mail.yourdomain.com" autocomplete="off" spellcheck="false"/>
                    </div>
                    <div class="fc-col">
                        <label class="fc-label">ESP / Sending platform</label>
                        <div class="pill-group" id="esp-group">
                            <button class="pill active" data-val="unknown" type="button">Unknown</button>
                            <button class="pill" data-val="mailchimp" type="button">Mailchimp</button>
                            <button class="pill" data-val="sendgrid" type="button">SendGrid</button>
                            <button class="pill" data-val="ses" type="button">Amazon SES</button>
                            <button class="pill" data-val="postmark" type="button">Postmark</button>
                        </div>
                    </div>
                    <div class="fc-col">
                        <label class="fc-label">Email volume</label>
                        <div class="pill-group" id="volume-group">
                            <button class="pill active" data-val="low" type="button">Low (&lt;1k/mo)</button>
                            <button class="pill" data-val="med" type="button">Med (1–50k)</button>
                            <button class="pill" data-val="high" type="button">High (&gt;50k)</button>
                        </div>
                    </div>
                </div>
                <div class="fc-col adv-subject">
                    <label class="fc-label">Email subject line (optional)</label>
                    <input class="fc-text-input" id="adv-subject" placeholder="e.g. Limited time offer — claim your spot today" autocomplete="off" spellcheck="false"/>
                </div>
            </div>

            <button class="check-btn" id="check-btn" type="button">
                <span class="btn-text" id="check-btn-text"><span class="ui-icon"><svg><use href="#icon-spark"></use></svg></span> Run Deliverability Audit</span>
                <span class="btn-spinner" aria-hidden="true"></span>
            </button>

            <div class="live-test-panel" id="live-test-panel" hidden>
                <div class="lt-head">
                    <div>
                        <div class="lt-eyebrow">Live Test Generated</div>
                        <div class="lt-title">Send one real email to this generated test address</div>
                    </div>
                    <span class="lt-status" id="live-test-status">Waiting</span>
                </div>
                <p class="lt-copy" id="live-test-copy">We will watch the inbox and score the real headers as soon as the message arrives.</p>
                <div class="lt-grid">
                    <div class="lt-card">
                        <div class="lt-label">Generated test address</div>
                        <div class="lt-value" id="live-test-address">—</div>
                        <button class="lt-btn" id="copy-live-address" type="button"><span class="ui-icon"><svg><use href="#icon-copy"></use></svg></span>Copy address</button>
                    </div>
                    <div class="lt-card">
                        <div class="lt-label">Suggested subject line</div>
                        <div class="lt-value" id="live-test-subject">—</div>
                        <button class="lt-btn" id="copy-live-subject" type="button"><span class="ui-icon"><svg><use href="#icon-copy"></use></svg></span>Copy subject</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="loading-section">
    <span class="loading-icon ui-icon"><svg><use href="#icon-chart"></use></svg></span>
    <div class="loading-title">Scanning your email setup…</div>
    <div class="loading-msg" id="loading-msg">Initialising checks…</div>
    <div class="loading-dots"><div class="ld-dot"></div><div class="ld-dot"></div><div class="ld-dot"></div></div>
    <div class="check-steps" id="check-steps">
        <div class="cs-step" id="step-dns"><div class="cs-dot">DNS</div><div class="cs-name">DNS Records</div></div>
        <div class="cs-step" id="step-spf"><div class="cs-dot">SPF</div><div class="cs-name">SPF</div></div>
        <div class="cs-step" id="step-dkim"><div class="cs-dot">DKIM</div><div class="cs-name">DKIM</div></div>
        <div class="cs-step" id="step-dmarc"><div class="cs-dot">DM</div><div class="cs-name">DMARC</div></div>
        <div class="cs-step" id="step-blacklist"><div class="cs-dot">BL</div><div class="cs-name">Blacklists</div></div>
        <div class="cs-step" id="step-ptr"><div class="cs-dot">PTR</div><div class="cs-name">PTR</div></div>
        <div class="cs-step" id="step-content"><div class="cs-dot">CT</div><div class="cs-name">Content</div></div>
        <div class="cs-step" id="step-reputation"><div class="cs-dot">RP</div><div class="cs-name">Reputation</div></div>
    </div>
</div>

<div id="results-section">
    <div class="results-header" id="results-header"></div>
    <div class="results-inner">
        <div id="checks-output"></div>
        <div id="recos-output"></div>
        <div id="inbox-output"></div>
    </div>
</div>

<div class="history-panel" id="history-panel">
    <div class="hp-head">
        <div class="hp-title">Recent Checks</div>
        <button class="hp-clear" id="history-clear" type="button">Clear All</button>
    </div>
    <div class="history-grid" id="history-grid"></div>
</div>

<section class="seo-content" aria-label="About the Email Deliverability Checker">
  <div class="seo-content-inner">

    <div class="seo-section">
      <span class="seo-section-eyebrow">ABOUT THIS TOOL</span>
      <h2>About this free email deliverability checker</h2>
      <p>This free email deliverability checker runs eight automated checks against your domain or email address and tells you exactly why your emails may be failing to reach the inbox. It tests DNS routing, SPF, DKIM, DMARC, reverse DNS (PTR), blacklist status, subject line content, and sender reputation — all in one place, in under a minute.</p>
      <p>Unlike generic email testers, this email deliverability checker gives you actionable, plain-English recommendations for each failed check — not just a score. You leave knowing what the problem is, why it matters, and what to fix first.</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg></div>
          <div class="cfc-title">SPF / DKIM / DMARC</div>
          <div class="cfc-desc">Validates all three email authentication standards that inbox providers use to verify sender legitimacy.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg></div>
          <div class="cfc-title">Blacklist Check</div>
          <div class="cfc-desc">Checks resolved sending IPs against Spamhaus ZEN and SpamCop, with adapted handling for provider-managed sending paths.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>
          <div class="cfc-title">DNS & PTR Audit</div>
          <div class="cfc-desc">Inspects MX and A/AAAA records for mail routing, then checks reverse DNS (PTR) for each sending IP with forward-confirmed validation.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
          <div class="cfc-title">Sender Reputation</div>
          <div class="cfc-desc">Derives a composite reputation verdict from your SPF, DKIM, and DMARC results, blacklist status, and sending volume.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg></div>
          <div class="cfc-title">Live Inbox Test</div>
          <div class="cfc-desc">Send a real email to a generated test address and get scored results based on actual received headers.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/></svg></div>
          <div class="cfc-title">Action Plan</div>
          <div class="cfc-desc">Every failed check includes a plain-English explanation and specific steps to fix the problem.</div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">HOW IT WORKS</span>
      <h2>How this email deliverability checker works — step by step</h2>
      <p>This email deliverability checker runs all tests automatically once you submit your domain or email address. No account needed, no configuration required — just enter your details and review your full email deliverability test results.</p>
      <div class="why-list">
        <div class="why-item">
          <div class="why-num">1</div>
          <div class="why-body">
            <div class="why-body-title">Enter your domain or email address</div>
            <div class="why-body-desc">Type your domain (e.g. yourdomain.com) for a full DNS and authentication audit, or an email address for sender-specific context. The checker will extract the domain automatically from an email address.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">2</div>
          <div class="why-body">
            <div class="why-body-title">Choose your audit mode</div>
            <div class="why-body-desc">Select Basic Audit for a comprehensive DNS and authentication scan, or Live Inbox Test to send a real email to a generated test address and score the actual received headers.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">3</div>
          <div class="why-body">
            <div class="why-body-title">Configure optional parameters</div>
            <div class="why-body-desc">Use the advanced options to specify your sending domain, email service provider (this improves DKIM selector detection), sending volume, or a subject line to scan for spam trigger phrases.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">4</div>
          <div class="why-body">
            <div class="why-body-title">Run the deliverability audit</div>
            <div class="why-body-desc">Click "Run Deliverability Audit" — the tool checks SPF, DKIM, DMARC, MX records, blacklists, sender reputation, and content signals simultaneously.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">5</div>
          <div class="why-body">
            <div class="why-body-title">Review your results</div>
            <div class="why-body-desc">Each check shows a pass, warning, or fail status with a plain-English explanation of what was found and why it matters for inbox delivery.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">6</div>
          <div class="why-body">
            <div class="why-body-title">Follow the action plan</div>
            <div class="why-body-desc">Every failed check includes specific DNS records to add or modify, copy-ready configuration snippets, and a priority ranking so you know what to fix first.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">WHAT IT CHECKS</span>
      <h2>What this email deliverability checker tests — seven checks in one audit</h2>
      <p>Email deliverability is not a single setting — it is the combined result of several independent signals that inbox providers evaluate simultaneously. This email deliverability checker runs seven distinct checks across DNS, authentication, blacklists, content, and reputation.</p>
      <p>Most businesses that struggle with deliverability have one or two critical failures buried among otherwise healthy settings. The free email deliverability checker surfaces the exact problems so you can fix what matters without guessing.</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
          <div class="cfc-title">SPF Record</div>
          <div class="cfc-desc">Checks that your SPF record exists, is correctly formatted, and authorises the right sending sources for your domain.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="m21 2-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0 3 3L22 7l-3-3m-3.5 3.5L19 4"/></svg></div>
          <div class="cfc-title">DKIM Signature</div>
          <div class="cfc-desc">Probes 15 common DKIM selectors in DNS, with targeted coverage for Mailchimp, SendGrid, Amazon SES, and Postmark when you specify your ESP.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
          <div class="cfc-title">DMARC Policy</div>
          <div class="cfc-desc">Checks your DMARC record alignment and policy strength — whether it rejects, quarantines, or merely monitors failed messages.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M22 13V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h8"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/><path d="M19 16v6"/><path d="M16 19l3-3 3 3"/></svg></div>
          <div class="cfc-title">MX & DNS Records</div>
          <div class="cfc-desc">Confirms MX routing records are present and valid, checks A/AAAA host records, and auto-detects your mail provider from DNS signals.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></div>
          <div class="cfc-title">PTR / Reverse DNS</div>
          <div class="cfc-desc">Looks up PTR records for resolved sending IPs and verifies forward-confirmed reverse DNS (FCrDNS) — a trust signal required by some strict inbox providers.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></div>
          <div class="cfc-title">Subject Line Analysis</div>
          <div class="cfc-desc">If you provide a subject line, scans it for 8 known spam trigger phrases, consecutive caps, excess punctuation, and currency symbols.</div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">WHY IT MATTERS</span>
      <h2>Why every business needs an email deliverability checker</h2>
      <p>A business email that lands in spam is not just inconvenient — it is invisible. Sales follow-ups, client invoices, onboarding sequences, and transactional messages all fail silently. Running an email deliverability checker before and after any major configuration change is the only reliable way to know your messages are reaching the inbox.</p>
      <p>For email marketers, poor deliverability compounds over time. Inbox providers track engagement rates — if recipients consistently do not open your messages (because they never see them), your sender reputation degrades further, pushing future messages even deeper into spam. Use this free email deliverability checker regularly to catch problems before they become reputation damage.</p>
      <div class="why-list">
        <div class="why-item">
          <div class="why-num">1</div>
          <div class="why-body">
            <div class="why-body-title">Authentication is now a baseline requirement</div>
            <div class="why-body-desc">Since 2024, Google and Yahoo require SPF, DKIM, and DMARC for bulk senders. Domains without proper authentication are routinely rejected or quarantined regardless of content quality.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">2</div>
          <div class="why-body">
            <div class="why-body-title">Blacklisting can happen without warning</div>
            <div class="why-body-desc">A single spam complaint, a compromised account, or an incorrectly configured mail server can get your domain or IP added to a blacklist. The checker catches this before you send another campaign.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">3</div>
          <div class="why-body">
            <div class="why-body-title">Deliverability issues are often invisible</div>
            <div class="why-body-desc">Most senders have no idea their emails are being silently filtered. There are no bounce notifications for spam filtering — the message is simply never seen. Regular deliverability checks are the only way to detect the problem.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">4</div>
          <div class="why-body">
            <div class="why-body-title">DNS fixes are fast when caught early</div>
            <div class="why-body-desc">Adding or correcting an SPF, DKIM, or DMARC record typically takes a few minutes in your DNS provider and propagates within 24–48 hours. Reputation recovery after prolonged deliverability issues can take weeks or months.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">COMMON ISSUES</span>
      <h2>Common failures this email deliverability checker finds</h2>
      <p>After running thousands of email deliverability checks, the same problems appear repeatedly. Here are the most common failures this email deliverability checker surfaces — and what they mean for your inbox placement.</p>
      <div class="issues-feature-grid">
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">No SPF record published</div>
            <div class="ifi-desc">The domain has no SPF record, meaning inbox providers cannot verify whether the sender is authorised — a critical failure that causes widespread filtering.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">DMARC missing or set to "none"</div>
            <div class="ifi-desc">Without a DMARC enforcement policy, spoofed emails from your domain are delivered normally. Inbox providers increasingly require at least a quarantine policy.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">SPF record too permissive</div>
            <div class="ifi-desc">An SPF record ending in "+all" or "?all" authorises anyone to send from your domain, destroying the protection SPF is designed to provide.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">DKIM key not found for selector</div>
            <div class="ifi-desc">The DKIM public key your email platform publishes does not match what is in your DNS — often caused by a domain migration or incorrectly copied record.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">Sending IP listed on Spamhaus or SpamCop</div>
            <div class="ifi-desc">The resolved sending IP appears on Spamhaus ZEN or SpamCop — two widely queried blocklists. A listing here causes immediate filtering regardless of how good your authentication is.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">No PTR record for sending IP</div>
            <div class="ifi-desc">The sending IP has no reverse DNS entry, or the PTR hostname does not forward-resolve back to the same IP. Some strict inbox providers require valid FCrDNS before accepting mail.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">SPF record exceeds DNS lookup limit</div>
            <div class="ifi-desc">SPF allows a maximum of 10 DNS lookups per evaluation. Records that include too many third-party senders cause a PermError, which many providers treat as a hard fail.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Subject line triggers spam filters</div>
            <div class="ifi-desc">Subject lines containing excessive capitalisation, common spam trigger phrases, or misleading urgency language are filtered by content-aware spam engines before reaching the inbox.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">WHO IT'S FOR</span>
      <h2>Who uses this email deliverability checker</h2>
      <p>Email deliverability problems affect every type of sender — from small businesses sending a handful of transactional emails per day to large marketing teams sending hundreds of thousands per month. This free email deliverability checker is built for anyone who needs to confirm their setup is correct before the next send.</p>
      <div class="who-grid">
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg></div>
          <div class="who-title">Business Owners</div>
          <div class="who-desc">Concerned that client emails, proposals, and invoices are landing in spam and wanting a clear technical diagnosis.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"/></svg></div>
          <div class="who-title">Email Marketers</div>
          <div class="who-desc">Checking authentication and reputation before a campaign launch to protect sender scores and maximise open rates.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
          <div class="who-title">IT Administrators</div>
          <div class="who-desc">Setting up or auditing SPF, DKIM, and DMARC for a domain and verifying that the records are correctly configured end-to-end.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg></div>
          <div class="who-title">Agencies</div>
          <div class="who-desc">Auditing client email infrastructure during onboarding to identify and fix DNS issues before they affect client communications.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
          <div class="who-title">Developers</div>
          <div class="who-desc">Configuring transactional email for web applications and verifying that authentication records are correctly published and aligned.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><polyline points="22 17 13.5 8.5 8.5 13.5 2 7"/><polyline points="16 17 22 17 22 11"/></svg></div>
          <div class="who-title">Anyone With Low Open Rates</div>
          <div class="who-desc">Who suspects messages are being silently filtered and needs a technical audit to confirm it and identify the exact cause.</div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">AFTER YOUR AUDIT</span>
      <h2>What to do after running your email deliverability checker</h2>
      <p>Running the email deliverability checker is step one. Here is how to turn the results into lasting improvement in your inbox placement rate.</p>
      <div class="steps-list">
        <div class="step-item">
          <div class="step-num">1</div>
          <div class="step-body">
            <div class="step-title">Fix critical failures first</div>
            <div class="step-desc">Start with any SPF, DKIM, or DMARC failures — these are the highest-impact issues and the ones most likely to cause immediate filtering. The results page includes exact DNS records to add or update.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">2</div>
          <div class="step-body">
            <div class="step-title">Request blacklist removal if listed</div>
            <div class="step-desc">If your domain or IP appears on a blacklist, visit the blacklist's removal request page. Most removals are processed within 24–72 hours once the underlying issue is resolved.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">3</div>
          <div class="step-body">
            <div class="step-title">Re-run the checker after making changes</div>
            <div class="step-desc">DNS changes take 24–48 hours to propagate fully. Once propagation is complete, run the checker again to confirm all issues are resolved before sending any campaigns.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">4</div>
          <div class="step-body">
            <div class="step-title">Set up a monitoring schedule</div>
            <div class="step-desc">Deliverability is not a one-time fix. Domain reputation can change, blacklists update, and new ESP integrations can break existing SPF records. Running a check monthly is good practice.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">5</div>
          <div class="step-body">
            <div class="step-title">Consider a managed email setup</div>
            <div class="step-desc">If your results reveal a complex configuration issue or your deliverability problems persist despite fixes, i2Medier's email setup service will configure, test, and maintain your entire email infrastructure.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">6</div>
          <div class="step-body">
            <div class="step-title">Use the Live Inbox Test for ongoing validation</div>
            <div class="step-desc">Before any major campaign send, switch to Live Inbox Test mode, send a real email to the generated address, and get scored results based on actual received headers — the most accurate test available.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">COMPARE</span>
      <h2>Free email deliverability checker vs. a managed email deliverability service</h2>
      <p>The free email deliverability checker identifies problems and provides instructions to fix them yourself. For businesses that need the configuration handled end-to-end, i2Medier's managed email setup service covers everything from DNS configuration to ESP integration and ongoing monitoring.</p>
      <table class="compare-table">
        <thead>
          <tr>
            <th>Capability</th>
            <th>Free Checker</th>
            <th class="highlight">Managed Setup</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>SPF / DKIM / DMARC audit</td>
            <td class="yes">Yes</td>
            <td class="yes">Yes + configuration</td>
          </tr>
          <tr>
            <td>Blacklist check</td>
            <td class="yes">Yes</td>
            <td class="yes">Yes + removal requests</td>
          </tr>
          <tr>
            <td>DNS records updated for you</td>
            <td class="no">No — DIY</td>
            <td class="yes">Done for you</td>
          </tr>
          <tr>
            <td>ESP integration verified</td>
            <td class="no">No</td>
            <td class="yes">Mailchimp, SES, Postmark, etc.</td>
          </tr>
          <tr>
            <td>Ongoing monitoring</td>
            <td class="no">Manual re-check</td>
            <td class="yes">Automated alerts</td>
          </tr>
          <tr>
            <td>Support if issues recur</td>
            <td class="no">No</td>
            <td class="yes">Dedicated account support</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</section>

<section class="service-cta">
  <div class="service-cta-eyebrow">&#10003; Expert Email Setup — Done For You</div>
  <h2>Stop guessing why your emails <em>land in spam</em></h2>
  <p>If the checker found issues you are not sure how to fix, or you want everything configured correctly from the start, our team handles the full setup — SPF, DKIM, DMARC, blacklist removal, and ESP integration.</p>
  <div class="service-pills">
    <span class="service-pill">SPF / DKIM / DMARC Setup</span>
    <span class="service-pill">Blacklist Removal</span>
    <span class="service-pill">ESP Integration</span>
    <span class="service-pill">Ongoing Monitoring</span>
    <span class="service-pill">No Technical Knowledge Required</span>
  </div>
  <div class="cta-buttons">
    <a href="{{ route('site.start', ['services' => 'emaildeliverability', 'addons' => 'ed-fix,ed-monitoring', 'source_page' => 'tool-email-deliverability', 'source_label' => 'Email Deliverability Checker', 'locked' => '1']) }}" class="cta-btn-primary">Get Your Email Setup Fixed →</a>
    <a href="{{ route('tools.seo-audit') }}" class="cta-btn-secondary">Also Check Your SEO Health</a>
  </div>
</section>

<section class="faq-section">
  <div class="faq-inner">
    <div class="faq-header">
      <span class="seo-section-eyebrow">FAQ</span>
      <h2>Frequently asked questions</h2>
      <p>Common questions about email deliverability, authentication standards, and how the checker works.</p>
    </div>
    <div class="faq-list">
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="edc-f1">
          <span class="faq-q-text">What does the email deliverability checker test?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="edc-f1">The tool checks SPF, DKIM, and DMARC authentication records, MX record configuration, PTR/reverse DNS, blacklist status across major databases, sender reputation signals, and content-level spam triggers — all the factors that determine whether your emails reach the inbox or land in spam.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="edc-f2">
          <span class="faq-q-text">Why are my emails going to spam?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="edc-f2">The most common causes are missing or misconfigured SPF, DKIM, or DMARC records, a blacklisted domain or IP address, low sender reputation from high bounce or complaint rates, or subject lines that trigger content-based spam filters. Run a full audit to identify the exact issue for your domain.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="edc-f3">
          <span class="faq-q-text">What are SPF, DKIM, and DMARC?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="edc-f3">SPF (Sender Policy Framework), DKIM (DomainKeys Identified Mail), and DMARC (Domain-based Message Authentication) are email authentication standards published as DNS records. Together, they let inbox providers verify that emails sent from your domain are legitimate and not spoofed. Since 2024, Google and Yahoo require all three for bulk senders.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="edc-f4">
          <span class="faq-q-text">Is this tool completely free?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="edc-f4">Yes. The email deliverability checker is completely free with no account, registration, or credit card required. You can check as many domains or email addresses as you need. The Live Inbox Test mode is also free and generates a real test address for each session.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="edc-f5">
          <span class="faq-q-text">How do I fix the issues shown in my results?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="edc-f5">Each failed check includes a plain-English explanation of the problem and the specific DNS record or configuration change needed to fix it. Most fixes are made in your domain registrar or DNS provider's control panel. SPF and DMARC changes typically take effect within 24–48 hours of publishing.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="edc-f6">
          <span class="faq-q-text">What is the Live Inbox Test and how does it work?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="edc-f6">The Live Inbox Test generates a unique test email address for your session. You send one real email to that address from your actual email client or sending platform, and the checker reads the received headers to score your authentication, routing, and delivery path — the most accurate way to verify your setup end-to-end.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="edc-f7">
          <span class="faq-q-text">How long does it take for DNS changes to fix deliverability?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="edc-f7">DNS propagation typically takes between 1 and 48 hours, depending on your domain's TTL settings. Once propagation is complete, run the checker again to confirm all issues are resolved. If your domain was blacklisted, you will also need to submit removal requests to each blacklist — most process these within 24–72 hours after the underlying issue is resolved.</div>
      </div>
    </div>
  </div>
</section>

<div class="toast" id="toast"></div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-email-deliverability-checker.js')
@endpush
