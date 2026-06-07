@extends('public.layouts.nametool')

@section('title', 'Email Deliverability Checker — i2Medier')

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

<nav>
    @include('public.partials.logo', ['mode' => 'light', 'class' => 'logo'])
    @include('public.partials.menu')
    <div class="nav-right">
        <span class="nav-tag">Email Deliverability Checker</span>
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

<div class="toast" id="toast"></div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-email-deliverability-checker.js')
@endpush
