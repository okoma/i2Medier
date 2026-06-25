@extends('public.layouts.nametool')

@section('title', 'Website Brief Generator — Free AI Project Brief | i2Medier')

@push('page_meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('page_meta')
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
            'name' => 'Website Brief Generator',
            'item' => route('tools.website-brief-generator'),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'SoftwareApplication',
    'name' => 'Website Brief Generator',
    'url' => route('tools.website-brief-generator'),
    'applicationCategory' => 'WebApplication',
    'operatingSystem' => 'Any',
    'offers' => ['@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'NGN'],
    'description' => 'Free AI website brief generator. Answer a few questions and get a professional project brief you can send to any web design agency — no signup required.',
    'provider' => ['@type' => 'Organization', 'name' => 'i2Medier', 'url' => url('/')],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush


@push('page_css')
    @vite('resources/css/public/pages/website-brief-generator.css')
@endpush

@section('body_attrs')
id="website-brief-generator-page"
data-generate-route="{{ route('tools.website-brief-generator.generate') }}"
data-print-route="{{ route('tools.website-brief-generator.print') }}"
data-honeypot-field="{{ \App\Support\Honeypot::fieldName() }}"
data-honeypot-time-field="{{ \App\Support\Honeypot::timeFieldName() }}"
data-honeypot-started-at="{{ \App\Support\Honeypot::startedAt() }}"
data-start-route="{{ route('site.start') }}"
@endsection

@section('content')
<svg width="0" height="0" style="position:absolute;visibility:hidden" aria-hidden="true" focusable="false">
    <symbol id="icon-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><path d="M3 12h18"></path><path d="M12 3a15 15 0 0 1 0 18"></path><path d="M12 3a15 15 0 0 0 0 18"></path></symbol>
    <symbol id="icon-refresh" viewBox="0 0 24 24"><path d="M20 12a8 8 0 1 1-2.34-5.66"></path><path d="M20 4v6h-6"></path></symbol>
    <symbol id="icon-file" viewBox="0 0 24 24"><path d="M8 3h6l5 5v13H8z"></path><path d="M14 3v5h5"></path></symbol>
    <symbol id="icon-cart" viewBox="0 0 24 24"><circle cx="9" cy="19" r="1.5"></circle><circle cx="17" cy="19" r="1.5"></circle><path d="M3 5h2l2.2 9h9.8l2-7H7.4"></path></symbol>
    <symbol id="icon-cog" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3.2"></circle><path d="M19.4 15a1 1 0 0 0 .2 1.1l.1.1a2 2 0 0 1-2.8 2.8l-.1-.1a1 1 0 0 0-1.1-.2 1 1 0 0 0-.6.9V20a2 2 0 0 1-4 0v-.2a1 1 0 0 0-.6-.9 1 1 0 0 0-1.1.2l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1 1 0 0 0 .2-1.1 1 1 0 0 0-.9-.6H4a2 2 0 0 1 0-4h.2a1 1 0 0 0 .9-.6 1 1 0 0 0-.2-1.1l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1 1 0 0 0 1.1.2h.1a1 1 0 0 0 .6-.9V4a2 2 0 0 1 4 0v.2a1 1 0 0 0 .6.9 1 1 0 0 0 1.1-.2l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1 1 0 0 0-.2 1.1v.1a1 1 0 0 0 .9.6H20a2 2 0 0 1 0 4h-.2a1 1 0 0 0-.9.6z"></path></symbol>
    <symbol id="icon-palette" viewBox="0 0 24 24"><path d="M12 3a9 9 0 1 0 0 18h1.2a2.8 2.8 0 0 0 0-5.6H12a2 2 0 0 1 0-4h2.4A6.6 6.6 0 0 0 21 6.8 3.8 3.8 0 0 0 17.2 3z"></path><circle cx="7.5" cy="10" r=".8" fill="currentColor" stroke="none"></circle><circle cx="9.5" cy="7.5" r=".8" fill="currentColor" stroke="none"></circle><circle cx="13" cy="7" r=".8" fill="currentColor" stroke="none"></circle><circle cx="16" cy="9.5" r=".8" fill="currentColor" stroke="none"></circle></symbol>
    <symbol id="icon-home" viewBox="0 0 24 24"><path d="M4 10.5 12 4l8 6.5"></path><path d="M6.5 9.5V20h11V9.5"></path></symbol>
    <symbol id="icon-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="3.5"></circle><path d="M5 20a7 7 0 0 1 14 0"></path></symbol>
    <symbol id="icon-mail" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m4 7 8 6 8-6"></path></symbol>
    <symbol id="icon-pen" viewBox="0 0 24 24"><path d="m4 20 4.5-1 9-9-3.5-3.5-9 9z"></path><path d="m13.5 6.5 3.5 3.5"></path></symbol>
    <symbol id="icon-image" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"></rect><circle cx="9" cy="10" r="1.5"></circle><path d="m21 16-5.5-5.5L7 19"></path></symbol>
    <symbol id="icon-users" viewBox="0 0 24 24"><path d="M16 20a4 4 0 0 0-8 0"></path><circle cx="12" cy="9" r="3"></circle><path d="M22 20a4 4 0 0 0-3-3.87"></path><path d="M2 20a4 4 0 0 1 3-3.87"></path></symbol>
    <symbol id="icon-star" viewBox="0 0 24 24"><path d="m12 4 2.5 5 5.5.8-4 3.9.9 5.5-4.9-2.6-4.9 2.6.9-5.5-4-3.9 5.5-.8z"></path></symbol>
    <symbol id="icon-help" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><path d="M9.5 9a2.5 2.5 0 1 1 4.2 1.8c-.9.7-1.7 1.3-1.7 2.7"></path><path d="M12 17h.01"></path></symbol>
    <symbol id="icon-cash" viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="12" rx="2"></rect><circle cx="12" cy="12" r="3"></circle><path d="M7 9h.01M17 15h.01"></path></symbol>
    <symbol id="icon-camera" viewBox="0 0 24 24"><path d="M5 8h3l1.5-2h5L16 8h3a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2z"></path><circle cx="12" cy="13" r="3.5"></circle></symbol>
    <symbol id="icon-calendar" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M16 3v4M8 3v4M3 10h18"></path></symbol>
    <symbol id="icon-briefcase" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="12" rx="2"></rect><path d="M9 7V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2"></path><path d="M3 12h18"></path></symbol>
    <symbol id="icon-lock" viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></symbol>
    <symbol id="icon-key" viewBox="0 0 24 24"><circle cx="8" cy="15" r="4"></circle><path d="M12 15h9"></path><path d="M18 12v6"></path></symbol>
    <symbol id="icon-megaphone" viewBox="0 0 24 24"><path d="M3 11v2a1 1 0 0 0 1 1h2l5 4V6L6 10H4a1 1 0 0 0-1 1z"></path><path d="M11 8c4 0 6-2 10-4v16c-4-2-6-4-10-4"></path></symbol>
    <symbol id="icon-clipboard" viewBox="0 0 24 24"><rect x="6" y="5" width="12" height="16" rx="2"></rect><path d="M9 5.5h6"></path><path d="M9 10h6M9 14h6"></path></symbol>
    <symbol id="icon-chat" viewBox="0 0 24 24"><path d="M5 18l1.2-3.2A7 7 0 1 1 19 15a7 7 0 0 1-7 7 6.8 6.8 0 0 1-3.8-1.2z"></path></symbol>
    <symbol id="icon-target" viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"></circle><circle cx="12" cy="12" r="4"></circle><circle cx="12" cy="12" r="1" fill="currentColor" stroke="none"></circle></symbol>
    <symbol id="icon-card" viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="12" rx="2"></rect><path d="M3 10h18"></path></symbol>
    <symbol id="icon-box" viewBox="0 0 24 24"><path d="M12 3 4 7v10l8 4 8-4V7z"></path><path d="m4 7 8 4 8-4"></path><path d="M12 11v10"></path></symbol>
    <symbol id="icon-chart" viewBox="0 0 24 24"><path d="M4 20V10"></path><path d="M10 20V4"></path><path d="M16 20v-7"></path><path d="M22 20v-4"></path></symbol>
    <symbol id="icon-receipt" viewBox="0 0 24 24"><path d="M6 3h12v18l-2-1.5L14 21l-2-1.5L10 21l-2-1.5L6 21z"></path><path d="M9 8h6M9 12h6M9 16h4"></path></symbol>
    <symbol id="icon-handshake" viewBox="0 0 24 24"><path d="m7 12 3-3a2.5 2.5 0 0 1 3.5 0l.5.5"></path><path d="M2 12l4-4 4 4-4 4z"></path><path d="m22 12-4-4-4 4 4 4z"></path><path d="m10 14 2 2a2 2 0 0 0 2.8 0l3.2-3.2"></path></symbol>
    <symbol id="icon-send" viewBox="0 0 24 24"><path d="M3 11.5 21 4l-7.5 17-2.8-6.7z"></path><path d="M21 4 10.7 14.3"></path></symbol>
    <symbol id="icon-whatsapp" viewBox="0 0 24 24"><path d="M20 11.6A8.4 8.4 0 0 1 7.6 19L4 20l1.1-3.5A8.4 8.4 0 1 1 20 11.6z"></path><path d="M9.5 8.8c.3-.7.6-.7.9-.7h.7c.2 0 .5.1.6.5l.7 1.7c.1.2 0 .5-.1.7l-.5.6c.6 1 1.5 1.8 2.6 2.4l.6-.5c.2-.1.4-.2.7-.1l1.6.7c.3.1.5.3.5.6v.7c0 .3 0 .6-.7.9-.6.3-1.3.3-2 0-2.8-1.1-5.1-3.3-6.2-6.1-.3-.7-.3-1.4 0-2z"></path></symbol>
    <symbol id="icon-map" viewBox="0 0 24 24"><path d="m3 6 6-2 6 2 6-2v14l-6 2-6-2-6 2z"></path><path d="M9 4v14M15 6v14"></path></symbol>
    <symbol id="icon-access" viewBox="0 0 24 24"><circle cx="12" cy="5" r="1.5"></circle><path d="M7 9h10"></path><path d="m12 8 2 5"></path><path d="m12 8-2 5"></path><path d="M10 21l2-8 2 8"></path></symbol>
    <symbol id="icon-rocket" viewBox="0 0 24 24"><path d="M14 4c3 0 6 3 6 6-2 0-4 .8-5.4 2.2L10 17l-3 1 1-3 4.8-4.6A7.6 7.6 0 0 1 14 4z"></path><path d="M8 16 5 19"></path><path d="M15 9h.01"></path></symbol>
    <symbol id="icon-bolt" viewBox="0 0 24 24"><path d="M13 2 5 14h5l-1 8 8-12h-5z"></path></symbol>
    <symbol id="icon-wave" viewBox="0 0 24 24"><path d="M2 14c2.5 0 2.5-4 5-4s2.5 4 5 4 2.5-4 5-4 2.5 4 5 4"></path></symbol>
    <symbol id="icon-analytics" viewBox="0 0 24 24"><path d="M4 19h16"></path><path d="M6 17V9"></path><path d="M12 17V5"></path><path d="M18 17v-4"></path></symbol>
    <symbol id="icon-pencil" viewBox="0 0 24 24"><path d="m4 20 4.5-1 9-9-3.5-3.5-9 9z"></path><path d="m13.5 6.5 3.5 3.5"></path></symbol>
</svg>
<nav class="is-dark">
    @include('public.partials.logo', ['mode' => 'light', 'class' => 'logo'])
    @include('public.partials.menu')
    <div class="nav-right">
        <button class="nav-btn" id="nav-new-btn" type="button" onclick="resetAll()" style="display:none">＋ New Brief</button>
        <button class="nav-btn primary" id="nav-print-btn" type="button" onclick="printBrief()" style="display:none">Print / Save PDF</button>
        <button class="nav-btn gold" id="nav-start-project-btn" type="button" onclick="startProject()" style="display:none">Start this project →</button>
    </div>
    <button class="public-nav-toggle" type="button" aria-expanded="false" aria-controls="public-side-nav" aria-label="Open navigation">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

<div class="progress-strip" id="progress-strip">
    <div class="progress-fill" id="progress-fill" style="width:16.6%"></div>
</div>

<div class="step-indicator" id="step-indicator">
    <div class="step-indicator-inner">
        <div class="si-step active" data-step="1"><div class="si-num" id="sin-1">1</div><span class="si-label">Business</span></div>
        <div class="si-step" data-step="2"><div class="si-num" id="sin-2">2</div><span class="si-label">Goals</span></div>
        <div class="si-step" data-step="3"><div class="si-num" id="sin-3">3</div><span class="si-label">Pages</span></div>
        <div class="si-step" data-step="4"><div class="si-num" id="sin-4">4</div><span class="si-label">Design</span></div>
        <div class="si-step" data-step="5"><div class="si-num" id="sin-5">5</div><span class="si-label">Features</span></div>
        <div class="si-step" data-step="6"><div class="si-num" id="sin-6">6</div><span class="si-label">Tech & Budget</span></div>
    </div>
</div>

<div id="form-view">
    <div class="step-panel active" id="step-1">
        <div class="sp-head">
            <span class="sp-eyebrow">Step 1 of 6</span>
            <h1 class="sp-title">Tell us about your business</h1>
            <p class="sp-desc">This information forms the foundation of your brief — it tells the development team exactly who you are and who you serve.</p>
        </div>
        <div class="field-grid">
            <div class="field">
                <label>Business / Organisation Name <span class="req">*</span></label>
                <input type="text" id="biz-name" placeholder="e.g. Apex Solutions Ltd">
                <span class="field-error" id="err-biz-name">Please enter your business name</span>
            </div>
            <div class="field">
                <label>Industry / Sector <span class="req">*</span></label>
                <select id="biz-industry">
                    <option value="">Select your industry</option>
                    <option>Technology & Software</option>
                    <option>Finance & Fintech</option>
                    <option>Healthcare & Medical</option>
                    <option>Education & Training</option>
                    <option>E-Commerce & Retail</option>
                    <option>Food & Hospitality</option>
                    <option>Real Estate & Property</option>
                    <option>Media & Entertainment</option>
                    <option>Logistics & Transport</option>
                    <option>Professional Services</option>
                    <option>Non-Profit & NGO</option>
                    <option>Fashion & Beauty</option>
                    <option>Agriculture</option>
                    <option>Energy & Utilities</option>
                    <option>Other</option>
                </select>
                <span class="field-error" id="err-biz-industry">Please select your industry</span>
            </div>
        </div>
        <div class="field-grid single">
            <div class="field">
                <label>What does your business do? <span class="req">*</span></label>
                <textarea id="biz-desc" placeholder="Describe your business, what you sell or offer, and what makes you different from competitors. The more detail, the better your brief will be." rows="4"></textarea>
                <span class="field-error" id="err-biz-desc">Please describe your business</span>
            </div>
        </div>
        <div class="field-grid">
            <div class="field">
                <label>Primary Target Audience <span class="req">*</span></label>
                <input type="text" id="biz-audience" placeholder="e.g. Small business owners in Nigeria aged 25–45">
                <span class="field-error" id="err-biz-audience">Please describe your target audience</span>
            </div>
            <div class="field">
                <label>Business Location / Market</label>
                <input type="text" id="biz-location" placeholder="e.g. Lagos, Nigeria · also UK & US">
            </div>
        </div>
        <div class="field-grid">
            <div class="field">
                <label>Current Website (if any)</label>
                <input type="url" id="biz-current-url" placeholder="https://yourcurrentsite.com">
            </div>
            <div class="field">
                <label>Main Competitors (up to 3)</label>
                <input type="text" id="biz-competitors" placeholder="e.g. competitor1.com, competitor2.com">
            </div>
        </div>
        <div class="step-nav">
            <span></span>
            <button class="btn-next" type="button" onclick="nextStep(1)"><span class="btn-text-inner">Continue → Project Goals</span></button>
        </div>
    </div>

    <div class="step-panel" id="step-2">
        <div class="sp-head">
            <span class="sp-eyebrow">Step 2 of 6</span>
            <h1 class="sp-title">What should the website achieve?</h1>
            <p class="sp-desc">Clear goals make the difference between a website that looks good and one that actually works. Select your primary website type and define what success looks like.</p>
        </div>
        <div class="field" style="margin-bottom:1.25rem">
            <label>What type of website do you need? <span class="req">*</span></label>
        </div>
        <div class="option-grid" id="website-type-grid">
            <div class="option-card" data-val="New Website" onclick="selectOption('website-type-grid',this)"><span class="oc-icon ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-globe"></use></svg></span><div class="oc-label">New Website</div><div class="oc-sub">Building from scratch with no existing site</div></div>
            <div class="option-card" data-val="Website Redesign" onclick="selectOption('website-type-grid',this)"><span class="oc-icon ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-refresh"></use></svg></span><div class="oc-label">Redesign</div><div class="oc-sub">Replacing or modernising an existing site</div></div>
            <div class="option-card" data-val="Landing Page" onclick="selectOption('website-type-grid',this)"><span class="oc-icon ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-file"></use></svg></span><div class="oc-label">Landing Page</div><div class="oc-sub">Single focused page for a campaign or product</div></div>
            <div class="option-card" data-val="E-Commerce Store" onclick="selectOption('website-type-grid',this)"><span class="oc-icon ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-cart"></use></svg></span><div class="oc-label">E-Commerce Store</div><div class="oc-sub">Online store with products and checkout</div></div>
            <div class="option-card" data-val="Web Application" onclick="selectOption('website-type-grid',this)"><span class="oc-icon ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-cog"></use></svg></span><div class="oc-label">Web Application</div><div class="oc-sub">Interactive app with user accounts and data</div></div>
            <div class="option-card" data-val="Portfolio / Showcase" onclick="selectOption('website-type-grid',this)"><span class="oc-icon ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-palette"></use></svg></span><div class="oc-label">Portfolio / Showcase</div><div class="oc-sub">Display work, projects, or services</div></div>
        </div>
        <span class="field-error" id="err-website-type">Please select a website type</span>
        <div class="field-grid single" style="margin-top:1.25rem">
            <div class="field">
                <label>Primary goal of this website <span class="req">*</span></label>
                <textarea id="primary-goal" placeholder="e.g. Generate qualified leads from Nigerian SME owners, capture contact details, and book discovery calls with our sales team. Secondary goal is to build brand credibility through case studies and testimonials." rows="3"></textarea>
                <span class="field-error" id="err-primary-goal">Please describe your primary goal</span>
            </div>
        </div>
        <div class="field-grid">
            <div class="field">
                <label>How will you measure success?</label>
                <input type="text" id="success-metrics" placeholder="e.g. 50 enquiries/month, 2% conversion rate">
            </div>
            <div class="field">
                <label>Who else is involved in this decision?</label>
                <input type="text" id="stakeholders" placeholder="e.g. CEO, Marketing Manager, IT team">
            </div>
        </div>
        <div class="step-nav">
            <button class="btn-back" type="button" onclick="prevStep(2)">← Back</button>
            <button class="btn-next" type="button" onclick="nextStep(2)"><span class="btn-text-inner">Continue → Pages & Content</span></button>
        </div>
    </div>

    <div class="step-panel" id="step-3">
        <div class="sp-head">
            <span class="sp-eyebrow">Step 3 of 6</span>
            <h1 class="sp-title">Pages & content structure</h1>
            <p class="sp-desc">Select all the pages your website needs. Don't worry about being exhaustive — we'll discuss specifics in the brief.</p>
        </div>
        <div class="field" style="margin-bottom:.75rem"><label>Select all pages you need <span class="req">*</span></label></div>
        <div class="pages-grid" id="pages-grid">
            <div class="page-check checked" data-val="Home"><div class="page-check-box">✓</div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-home"></use></svg></span>Home</span></div>
            <div class="page-check checked" data-val="About"><div class="page-check-box">✓</div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-user"></use></svg></span>About Us</span></div>
            <div class="page-check checked" data-val="Services"><div class="page-check-box">✓</div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-cog"></use></svg></span>Services</span></div>
            <div class="page-check checked" data-val="Contact"><div class="page-check-box">✓</div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-mail"></use></svg></span>Contact</span></div>
            <div class="page-check" data-val="Blog"><div class="page-check-box"></div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-pen"></use></svg></span>Blog / News</span></div>
            <div class="page-check" data-val="Portfolio"><div class="page-check-box"></div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-image"></use></svg></span>Portfolio</span></div>
            <div class="page-check" data-val="Team"><div class="page-check-box"></div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-users"></use></svg></span>Our Team</span></div>
            <div class="page-check" data-val="Testimonials"><div class="page-check-box"></div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-star"></use></svg></span>Testimonials</span></div>
            <div class="page-check" data-val="FAQ"><div class="page-check-box"></div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-help"></use></svg></span>FAQ</span></div>
            <div class="page-check" data-val="Pricing"><div class="page-check-box"></div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-cash"></use></svg></span>Pricing</span></div>
            <div class="page-check" data-val="Shop"><div class="page-check-box"></div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-cart"></use></svg></span>Shop</span></div>
            <div class="page-check" data-val="Gallery"><div class="page-check-box"></div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-camera"></use></svg></span>Gallery</span></div>
            <div class="page-check" data-val="Events"><div class="page-check-box"></div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-calendar"></use></svg></span>Events</span></div>
            <div class="page-check" data-val="Careers"><div class="page-check-box"></div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-briefcase"></use></svg></span>Careers</span></div>
            <div class="page-check" data-val="Privacy Policy"><div class="page-check-box"></div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-lock"></use></svg></span>Privacy Policy</span></div>
            <div class="page-check" data-val="Login / Dashboard"><div class="page-check-box"></div><span class="page-check-label"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-key"></use></svg></span>Login / Portal</span></div>
        </div>
        <span class="field-error" id="err-pages">Please select at least one page</span>
        <div class="field-grid" style="margin-top:1.25rem">
            <div class="field">
                <label>Content status</label>
                <select id="content-status">
                    <option value="">Select one</option>
                    <option>We have all content ready</option>
                    <option>We have some content — needs editing</option>
                    <option>We need content written from scratch</option>
                    <option>Mixture — some ready, some needed</option>
                </select>
            </div>
            <div class="field">
                <label>Do you need copywriting / content creation?</label>
                <select id="copywriting">
                    <option value="">Select one</option>
                    <option>Yes — full website copywriting needed</option>
                    <option>Yes — some pages only</option>
                    <option>No — we will supply all copy</option>
                    <option>Not sure yet</option>
                </select>
            </div>
        </div>
        <div class="field-grid single">
            <div class="field">
                <label>Any specific pages or sections to highlight?</label>
                <input type="text" id="special-pages" placeholder="e.g. A bespoke case studies section, an interactive pricing calculator, a team map showing locations">
            </div>
        </div>
        <div class="step-nav">
            <button class="btn-back" type="button" onclick="prevStep(3)">← Back</button>
            <button class="btn-next" type="button" onclick="nextStep(3)"><span class="btn-text-inner">Continue → Design Direction</span></button>
        </div>
    </div>

    <div class="step-panel" id="step-4">
        <div class="sp-head">
            <span class="sp-eyebrow">Step 4 of 6</span>
            <h1 class="sp-title">Design direction & brand</h1>
            <p class="sp-desc">Your design preferences help the team create something that fits your brand identity and appeals to your audience from the first visit.</p>
        </div>
        <div class="field" style="margin-bottom:.75rem"><label>Visual style preference <span class="req">*</span></label></div>
        <div class="style-grid" id="style-grid">
            <div class="style-card" data-val="Minimal & Clean" onclick="selectStyle(this)"><div class="sc-preview prev-minimal"><div class="pm-line accent"></div><div class="pm-line"></div><div class="pm-line" style="width:60%"></div><div class="pm-line" style="width:45%"></div></div><div class="sc-check"></div><div class="sc-label">Minimal & Clean</div></div>
            <div class="style-card" data-val="Bold & Dark" onclick="selectStyle(this)"><div class="sc-preview prev-bold"><div class="pb-line gold"></div><div class="pb-line"></div><div class="pb-line" style="width:65%"></div><div class="pb-line" style="width:80%"></div></div><div class="sc-check"></div><div class="sc-label">Bold & Dark</div></div>
            <div class="style-card" data-val="Corporate & Professional" onclick="selectStyle(this)"><div class="sc-preview prev-corporate"><div class="pc-line white"></div><div class="pc-line"></div><div class="pc-line" style="width:70%"></div><div class="pc-line" style="width:55%"></div></div><div class="sc-check"></div><div class="sc-label">Corporate</div></div>
            <div class="style-card" data-val="Creative & Expressive" onclick="selectStyle(this)"><div class="sc-preview prev-creative"><div class="cr-blob"></div></div><div class="sc-check"></div><div class="sc-label">Creative</div></div>
            <div class="style-card" data-val="Elegant & Luxury" onclick="selectStyle(this)"><div class="sc-preview prev-elegant"><div class="pe-line gold"></div><div class="pe-line"></div><div class="pe-line" style="width:75%"></div><div class="pe-line" style="width:50%"></div></div><div class="sc-check"></div><div class="sc-label">Elegant & Luxury</div></div>
            <div class="style-card" data-val="Playful & Friendly" onclick="selectStyle(this)"><div class="sc-preview prev-playful"><div class="pp-dot" style="background:#ff6b9d"></div><div class="pp-dot" style="background:#ffd166"></div><div class="pp-dot" style="background:#06d6a0"></div></div><div class="sc-check"></div><div class="sc-label">Playful</div></div>
            <div class="style-card" data-val="Tech & Modern" onclick="selectStyle(this)"><div class="sc-preview prev-tech"><div class="pt-line code"></div><div class="pt-line dim"></div><div class="pt-line code" style="width:45%"></div><div class="pt-line dim" style="width:80%"></div></div><div class="sc-check"></div><div class="sc-label">Tech & Modern</div></div>
            <div class="style-card" data-val="Warm & Approachable" onclick="selectStyle(this)"><div class="sc-preview" style="background:linear-gradient(135deg,#fef3c7,#fde68a,#f59e0b40);display:flex;align-items:center;justify-content:center"><div style="width:40px;height:40px;border-radius:50%;background:rgba(245,158,11,.4)"></div></div><div class="sc-check"></div><div class="sc-label">Warm</div></div>
        </div>
        <span class="field-error" id="err-style">Please select a visual style</span>

        <div style="margin-top:1.25rem;margin-bottom:1.2rem">
            <label class="field" style="display:block;margin-bottom:.75rem"><span style="font-size:.68rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--g700)">Brand colours (if you have them)</span></label>
            <div class="color-row">
                <div class="color-item">
                    <div class="color-swatch"><div class="color-preview" id="cp1" style="background:#0d0d0d"></div><input type="color" id="color1" value="#0d0d0d" oninput="document.getElementById('cp1').style.background=this.value"></div>
                    <span class="color-label">Primary</span>
                </div>
                <div class="color-item">
                    <div class="color-swatch"><div class="color-preview" id="cp2" style="background:#c8a96e"></div><input type="color" id="color2" value="#c8a96e" oninput="document.getElementById('cp2').style.background=this.value"></div>
                    <span class="color-label">Accent</span>
                </div>
                <div class="color-item">
                    <div class="color-swatch"><div class="color-preview" id="cp3" style="background:#f7f6f2"></div><input type="color" id="color3" value="#f7f6f2" oninput="document.getElementById('cp3').style.background=this.value"></div>
                    <span class="color-label">Background</span>
                </div>
                <div class="field" style="flex:1">
                    <label style="font-size:.62rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--g700)">No brand colours yet</label>
                    <div style="display:flex;align-items:center;gap:.5rem;margin-top:.4rem">
                        <input type="checkbox" id="no-brand-colors" style="width:15px;height:15px;cursor:pointer;accent-color:var(--gold)">
                        <label for="no-brand-colors" style="font-size:.8rem;color:var(--g700);cursor:pointer">We don't have brand colours — the design team can suggest a palette</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="field-grid">
            <div class="field">
                <label>Websites you love (up to 3 URLs)</label>
                <textarea id="sites-love" placeholder="Share URLs of websites whose look, feel, or style you admire — and briefly say what you like about each one." rows="3"></textarea>
            </div>
            <div class="field">
                <label>Websites you dislike / want to avoid</label>
                <textarea id="sites-avoid" placeholder="Share URLs of sites whose style you want to avoid, and explain what puts you off about them." rows="3"></textarea>
            </div>
        </div>
        <div class="field-grid single">
            <div class="field">
                <label>Any other design notes?</label>
                <input type="text" id="design-notes" placeholder="e.g. Must feel premium and trustworthy. We want lots of white space. Avoid stock photography — use illustrations instead.">
            </div>
        </div>
        <div class="step-nav">
            <button class="btn-back" type="button" onclick="prevStep(4)">← Back</button>
            <button class="btn-next" type="button" onclick="nextStep(4)"><span class="btn-text-inner">Continue → Features</span></button>
        </div>
    </div>

    <div class="step-panel" id="step-5">
        <div class="sp-head">
            <span class="sp-eyebrow">Step 5 of 6</span>
            <h1 class="sp-title">Features & functionality</h1>
            <p class="sp-desc">Select every feature your website needs to have. Be thorough — it's easier to scope down later than to discover missing functionality mid-build.</p>
        </div>
        <div class="features-block">
            <div class="features-block-title"><span class="fbt-icon ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-megaphone"></use></svg></span>Lead Generation & Communication</div>
            <div class="features-grid" id="feats-lead">
                <div class="feat-check" data-val="Contact Form"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-clipboard"></use></svg></span><span class="feat-name">Contact Form</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Live Chat"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-chat"></use></svg></span><span class="feat-name">Live Chat</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Newsletter Signup"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-mail"></use></svg></span><span class="feat-name">Newsletter Signup</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Booking / Appointments"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-calendar"></use></svg></span><span class="feat-name">Booking / Appointments</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Quote / Estimate Form"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-cash"></use></svg></span><span class="feat-name">Quote Request Form</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Pop-up / Lead Capture"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-target"></use></svg></span><span class="feat-name">Pop-ups / Lead Capture</span><div class="feat-cb"></div></div>
            </div>
        </div>
        <div class="features-block">
            <div class="features-block-title"><span class="fbt-icon ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-cart"></use></svg></span>Commerce & Payments</div>
            <div class="features-grid">
                <div class="feat-check" data-val="E-Commerce / Shopping Cart"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-cart"></use></svg></span><span class="feat-name">Shopping Cart</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Payment Processing (Paystack/Stripe)"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-card"></use></svg></span><span class="feat-name">Payment Processing</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Product Catalogue"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-box"></use></svg></span><span class="feat-name">Product Catalogue</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Order Management"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-chart"></use></svg></span><span class="feat-name">Order Management</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Subscription / Recurring Billing"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-refresh"></use></svg></span><span class="feat-name">Subscriptions</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Invoice / Receipt Generation"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-receipt"></use></svg></span><span class="feat-name">Invoicing</span><div class="feat-cb"></div></div>
            </div>
        </div>
        <div class="features-block">
            <div class="features-block-title"><span class="fbt-icon ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-lock"></use></svg></span>User Accounts & Content</div>
            <div class="features-grid">
                <div class="feat-check" data-val="User Login / Registration"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-key"></use></svg></span><span class="feat-name">User Login</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Member / Client Portal"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-home"></use></svg></span><span class="feat-name">Client Portal</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Blog / CMS"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-pen"></use></svg></span><span class="feat-name">Blog / CMS</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Photo Gallery / Media Library"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-image"></use></svg></span><span class="feat-name">Media Gallery</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Search Functionality"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-help"></use></svg></span><span class="feat-name">Site Search</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="File Upload / Download"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-file"></use></svg></span><span class="feat-name">File Uploads</span><div class="feat-cb"></div></div>
            </div>
        </div>
        <div class="features-block" style="margin-bottom:0">
            <div class="features-block-title"><span class="fbt-icon ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-cog"></use></svg></span>Integrations & Technical</div>
            <div class="features-grid">
                <div class="feat-check" data-val="Google Analytics / Tracking"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-analytics"></use></svg></span><span class="feat-name">Analytics</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Social Media Integration"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-chat"></use></svg></span><span class="feat-name">Social Media</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="CRM Integration"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-handshake"></use></svg></span><span class="feat-name">CRM Integration</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Email Marketing Integration"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-send"></use></svg></span><span class="feat-name">Email Marketing</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="WhatsApp Chat Button"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-whatsapp"></use></svg></span><span class="feat-name">WhatsApp Button</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Google Maps / Directions"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-map"></use></svg></span><span class="feat-name">Google Maps</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Multi-language Support"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-globe"></use></svg></span><span class="feat-name">Multi-language</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Accessibility (WCAG Compliance)"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-access"></use></svg></span><span class="feat-name">Accessibility</span><div class="feat-cb"></div></div>
                <div class="feat-check" data-val="Custom Admin Dashboard"><span class="feat-ico ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-cog"></use></svg></span><span class="feat-name">Custom Admin</span><div class="feat-cb"></div></div>
            </div>
        </div>
        <div class="step-nav">
            <button class="btn-back" type="button" onclick="prevStep(5)">← Back</button>
            <button class="btn-next" type="button" onclick="nextStep(5)"><span class="btn-text-inner">Continue → Tech & Budget</span></button>
        </div>
    </div>

    <div class="step-panel" id="step-6">
        <div class="sp-head">
            <span class="sp-eyebrow">Step 6 of 6</span>
            <h1 class="sp-title">Technical requirements & budget</h1>
            <p class="sp-desc">The final details the development team needs to scope and price your project accurately. Fill in as much as you know — everything here is a starting point, not a contract.</p>
        </div>
        <div class="field-grid">
            <div class="field">
                <label>Preferred platform</label>
                <select id="platform">
                    <option value="">No preference / recommend for me</option>
                    <option>WordPress</option>
                    <option>WordPress + WooCommerce</option>
                    <option>Laravel (custom PHP)</option>
                    <option>React / Next.js</option>
                    <option>Shopify</option>
                    <option>Custom built</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="field">
                <label>Domain status</label>
                <select id="domain-status">
                    <option value="">Select one</option>
                    <option>We already own the domain</option>
                    <option>We need a new domain purchased</option>
                    <option>Not decided yet</option>
                </select>
            </div>
        </div>
        <div class="field-grid">
            <div class="field">
                <label>Hosting preference</label>
                <select id="hosting">
                    <option value="">No preference / recommend for me</option>
                    <option>We have existing hosting</option>
                    <option>We need hosting recommended</option>
                    <option>We want managed WordPress hosting</option>
                    <option>VPS / Cloud server</option>
                </select>
            </div>
            <div class="field">
                <label>Existing tools / integrations to keep</label>
                <input type="text" id="existing-tools" placeholder="e.g. Mailchimp, HubSpot CRM, Paystack, Zoom">
            </div>
        </div>
        <div class="field-grid single">
            <div class="field">
                <label>SEO requirements</label>
                <select id="seo-req">
                    <option value="">Select one</option>
                    <option>Basic SEO setup only (meta tags, sitemap)</option>
                    <option>Comprehensive on-page SEO</option>
                    <option>Ongoing SEO management needed</option>
                    <option>No SEO work required</option>
                    <option>Not sure — please advise</option>
                </select>
            </div>
        </div>
        <div style="margin-bottom:1.2rem">
            <div class="field" style="margin-bottom:.65rem"><label>Project timeline <span class="req">*</span></label></div>
            <div class="priority-row" id="timeline-group">
                <div class="prio-pill" data-val="ASAP — within 2 weeks" onclick="selectPrio('timeline-group',this)"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-rocket"></use></svg></span> ASAP (2 wks)</div>
                <div class="prio-pill" data-val="1–4 weeks" onclick="selectPrio('timeline-group',this)"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-bolt"></use></svg></span> 1–4 weeks</div>
                <div class="prio-pill" data-val="1–3 months" onclick="selectPrio('timeline-group',this)"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-calendar"></use></svg></span> 1–3 months</div>
                <div class="prio-pill" data-val="3–6 months" onclick="selectPrio('timeline-group',this)"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-calendar"></use></svg></span> 3–6 months</div>
                <div class="prio-pill" data-val="Flexible / not urgent" onclick="selectPrio('timeline-group',this)"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-wave"></use></svg></span> Flexible</div>
            </div>
            <span class="field-error" id="err-timeline">Please select a timeline</span>
        </div>
        <div style="margin-bottom:1.2rem">
            <div class="field" style="margin-bottom:.65rem"><label>Budget range (NGN) <span class="req">*</span></label></div>
            <div class="priority-row" id="budget-group">
                <div class="prio-pill" data-val="Under ₦200,000" onclick="selectPrio('budget-group',this)">Under ₦200k</div>
                <div class="prio-pill" data-val="₦200,000–₦500,000" onclick="selectPrio('budget-group',this)">₦200k–₦500k</div>
                <div class="prio-pill" data-val="₦500,000–₦1,000,000" onclick="selectPrio('budget-group',this)">₦500k–₦1M</div>
                <div class="prio-pill" data-val="₦1,000,000–₦3,000,000" onclick="selectPrio('budget-group',this)">₦1M–₦3M</div>
                <div class="prio-pill" data-val="Above ₦3,000,000" onclick="selectPrio('budget-group',this)">Above ₦3M</div>
                <div class="prio-pill" data-val="Not decided yet" onclick="selectPrio('budget-group',this)">Not sure</div>
            </div>
            <span class="field-error" id="err-budget">Please select a budget range</span>
        </div>
        <div class="field-grid single">
            <div class="field">
                <label>Anything else we should know?</label>
                <textarea id="extra-notes" placeholder="Any constraints, preferences, risks, upcoming deadlines, regulatory requirements, or anything else that would help the team understand this project fully." rows="3"></textarea>
            </div>
        </div>
        <div class="step-nav">
            <button class="btn-back" type="button" onclick="prevStep(6)">← Back</button>
            <button class="btn-next gold" id="gen-brief-btn" type="button" onclick="generateBrief()">
                <span class="btn-text-inner">✦ Generate My Website Brief</span>
                <div class="btn-spinner"></div>
            </button>
        </div>
    </div>
</div>

<div id="loading-view">
    <span class="lv-icon ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-clipboard"></use></svg></span>
    <div class="lv-title">Writing your brief…</div>
    <p class="lv-msg" id="lv-msg">Organising your project information…</p>
    <div class="lv-progress"><div class="lv-progress-fill"></div></div>
    <div class="lv-phases">
        <div class="lv-phase" id="lp1"><div class="lv-phase-icon" id="lpi1"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-chart"></use></svg></span></div> Analysing your business & goals…</div>
        <div class="lv-phase" id="lp2"><div class="lv-phase-icon" id="lpi2"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-map"></use></svg></span></div> Structuring site architecture…</div>
        <div class="lv-phase" id="lp3"><div class="lv-phase-icon" id="lpi3"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-palette"></use></svg></span></div> Defining design direction…</div>
        <div class="lv-phase" id="lp4"><div class="lv-phase-icon" id="lpi4"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-cog"></use></svg></span></div> Scoping features & technical specs…</div>
        <div class="lv-phase" id="lp5"><div class="lv-phase-icon" id="lpi5"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-calendar"></use></svg></span></div> Building timeline & recommendations…</div>
        <div class="lv-phase" id="lp6"><div class="lv-phase-icon" id="lpi6"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-pencil"></use></svg></span></div> Writing your complete brief…</div>
    </div>
</div>

<div id="brief-view">
    <div class="brief-actions-bar">
        <div class="ba-left">
            <span class="ba-label">Website Brief</span>
            <span class="ba-ref" id="brief-ref-display"></span>
        </div>
        <div class="ba-right">
            <button class="ba-btn" type="button" onclick="copyBrief()"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><use href="#icon-clipboard"></use></svg></span> Copy Text</button>
            <button class="ba-btn print" type="button" onclick="printBrief()">Print / Save PDF</button>
            <button class="ba-btn new" type="button" onclick="resetAll()">＋ New Brief</button>
            <button class="ba-btn start" type="button" id="nav-start-btn" onclick="startProject()">Start this project →</button>
        </div>
    </div>

    <div class="brief-document" id="brief-document"></div>
</div>

<div class="seo-content">
  <div class="seo-content-inner">

    <!-- 1. What Is a Website Brief Generator? -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">ABOUT THIS TOOL</span>
      <h2>About this free website brief generator</h2>
      <p>This free website brief generator walks you through a structured set of questions about your business, goals, design preferences, pages, features, and budget — then turns your answers into a complete, professional website brief document ready to hand to a developer or agency.</p>
      <p>Without a brief, web projects stall in misalignment. Developers build what they assume you want. Agencies quote for scope that was never properly defined. Revisions pile up. Budgets blow. This website brief generator eliminates all of that by creating a single, shared document that everyone is working from before the first line of code is written.</p>
      <p>Think of it as the professional equivalent of an architect's drawing package — before a single brick is laid, everyone on the project knows exactly what is being built, why, and to what standard.</p>
    </div>

    <!-- 2. How Our Website Brief Generator Works -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">HOW IT WORKS</span>
      <h2>How Our Website Brief Generator Works</h2>
      <p>The tool guides you through six focused sections, then uses AI — powered by ChatGPT, Claude, Mistral, and Gemini — to structure your answers into a comprehensive, formatted brief document in seconds.</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg></div>
          <div class="cfc-title">Business Foundation</div>
          <div class="cfc-desc">Step 1 captures your business name, industry, description, target audience, market, and competitors — the context every developer needs before touching a single page.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg></div>
          <div class="cfc-title">Goals & Success Metrics</div>
          <div class="cfc-desc">Step 2 defines your website type, primary objective, and how you will measure success — turning vague wishes into clear, buildable targets with defined outcomes.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
          <div class="cfc-title">Pages & Content Scope</div>
          <div class="cfc-desc">Step 3 maps every page your site needs, your content readiness, and any specialist sections — giving the developer a complete sitemap before quoting begins.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="13.5" cy="6.5" r=".5"/><circle cx="17.5" cy="10.5" r=".5"/><circle cx="8.5" cy="7.5" r=".5"/><circle cx="6.5" cy="12.5" r=".5"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg></div>
          <div class="cfc-title">Design Direction</div>
          <div class="cfc-desc">Step 4 captures your visual style preference, brand colours, reference sites you love and hate, and any design constraints — so the designer starts with clarity, not guesswork.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg></div>
          <div class="cfc-title">Features & Functionality</div>
          <div class="cfc-desc">Step 5 maps every feature needed — contact forms, e-commerce, user logins, CRM integrations, WhatsApp buttons, and more — so nothing critical is discovered mid-build.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
          <div class="cfc-title">Tech, Budget & Timeline</div>
          <div class="cfc-desc">Step 6 locks in platform preference, hosting, SEO requirements, budget range, and project timeline — giving the agency exactly what they need to quote accurately and on time.</div>
        </div>
      </div>
    </div>

    <!-- 3. What Makes a Great Website Brief? -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">WHAT MAKES A GOOD BRIEF</span>
      <h2>What Makes a Great Website Brief?</h2>
      <p>A great brief is not just thorough — it is structured, specific, and written in a way that leaves no room for dangerous assumptions. These six qualities separate a brief that gets built correctly from one that creates months of confusion.</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg></div>
          <div class="cfc-title">Clear Primary Goal</div>
          <div class="cfc-desc">Every decision in a web project — layout, content, features, navigation — should flow from one defined primary goal. A brief without a measurable objective has no anchor.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
          <div class="cfc-title">Defined Audience</div>
          <div class="cfc-desc">A brief that says "everyone" has defined no one. The audience section must describe exactly who the site is for — demographics, location, behaviour, and what they need from the visit.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><polygon points="3 6 9 3 15 6 21 3 21 18 15 21 9 18 3 21"/><line x1="9" y1="3" x2="9" y2="18"/><line x1="15" y1="6" x2="15" y2="21"/></svg></div>
          <div class="cfc-title">Full Page Map</div>
          <div class="cfc-desc">Every page that needs to be designed and built should be listed upfront. Pages discovered mid-project expand scope, delay timelines, and create budget friction that damages trust.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg></div>
          <div class="cfc-title">Feature Completeness</div>
          <div class="cfc-desc">Every feature — contact form, payment gateway, booking system, user login — must be named in the brief. Undisclosed features mid-build are the single biggest cause of cost overruns.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
          <div class="cfc-title">Realistic Budget Range</div>
          <div class="cfc-desc">A brief with no budget gives agencies no anchor for their proposals. A clear range prevents wildly mismatched quotes and allows the team to recommend what is achievable within your means.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
          <div class="cfc-title">Honest Timeline</div>
          <div class="cfc-desc">A project deadline communicated upfront allows the agency to plan resource allocation, flag conflicts, and be honest about what is achievable — rather than overpromising to win the work.</div>
        </div>
      </div>
    </div>

    <!-- 4. Why Your Website Brief Matters -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">WHY IT MATTERS</span>
      <h2>Why Your Website Brief Matters More Than You Think</h2>
      <p>Most web projects that go over budget, miss deadlines, or end in frustration share one common root cause: they started without a proper brief. Here is what a brief actually prevents.</p>
      <div class="why-list">
        <div class="why-item">
          <div class="why-num">1</div>
          <div>
            <div class="why-body-title">It prevents scope creep before it starts</div>
            <div class="why-body-desc">Scope creep — the gradual expansion of what was agreed — is the primary killer of web project budgets. A written brief creates a clear boundary between what was scoped and what is a new request, protecting both the client and the agency from costly disputes.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">2</div>
          <div>
            <div class="why-body-title">It gets you accurate quotes from day one</div>
            <div class="why-body-desc">Vague briefs produce vague quotes with hidden assumptions baked in. When the assumptions are wrong, budgets fail. A detailed brief gives every agency and freelancer the same foundation to quote from — making proposals genuinely comparable and financially accurate.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">3</div>
          <div>
            <div class="why-body-title">It forces you to clarify your own thinking</div>
            <div class="why-body-desc">Many clients discover mid-project that they were not as clear on their requirements as they thought. The brief process surfaces those uncertainties before any money is spent — when they are cheap to resolve rather than expensive to unwind from a half-built product.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">4</div>
          <div>
            <div class="why-body-title">It speeds up the entire project</div>
            <div class="why-body-desc">A developer with a complete brief can start building immediately. A developer without one spends weeks in back-and-forth before writing a single line of code. The brief is not a delay — it is the fastest path from idea to launched website.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">5</div>
          <div>
            <div class="why-body-title">It protects you legally and commercially</div>
            <div class="why-body-desc">When a dispute arises over what was agreed — and in web projects they do — a signed brief is your strongest protection. It documents what was requested, what was scoped, and what falls outside the engagement. Without it, every disagreement is a he-said-she-said situation.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 5. Common Website Brief Mistakes -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">COMMON MISTAKES</span>
      <h2>Common Website Brief Mistakes That Derail Projects</h2>
      <p>These are the most frequent brief errors that turn manageable web projects into expensive, stressful disasters.</p>
      <div class="issues-feature-grid">
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">No defined primary goal</div>
            <div class="ifi-desc">Starting a web project with "we just need a website" gives no direction to any decision. Without a defined primary goal, every design and content choice is arbitrary.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">Leaving features out of scope</div>
            <div class="ifi-desc">Mentioning that you "might need a booking system" after the project has started is not briefing — it is scope creep. Every feature must be named upfront to receive a fair quote.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">No budget disclosed</div>
            <div class="ifi-desc">Refusing to share a budget range leads to wildly mismatched proposals. Agencies assume up or down and quote accordingly — usually wrong in a direction that wastes everyone's time.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Vague design direction</div>
            <div class="ifi-desc">"Something modern and professional" describes half the internet. Design references, colour preferences, and examples of sites you love and hate save weeks of misaligned concepts.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Not addressing content readiness</div>
            <div class="ifi-desc">The most common project blocker is content that was assumed to exist but doesn't. A brief must state whether copy, images, and media are ready, in progress, or need to be commissioned.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Multiple decision-makers not named</div>
            <div class="ifi-desc">If approval requires sign-off from a CEO, marketing manager, and IT director — but only one person is on the brief — the project will stall at review stages no one anticipated.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">Unrealistic timeline expectations</div>
            <div class="ifi-desc">A 30-page website with custom integrations cannot be built in two weeks. An honest timeline allows the agency to plan properly and deliver without cutting corners on quality.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">Platform preference left blank</div>
            <div class="ifi-desc">Not specifying a platform preference is fine — but not mentioning existing systems the new site must integrate with leads to costly architectural rework mid-build.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 6. Who Should Use This Tool? -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">WHO IT'S FOR</span>
      <h2>Who Should Use This Website Brief Generator?</h2>
      <p>Anyone commissioning a website build, redesign, or major update will benefit from having a professional brief — regardless of technical knowledge or project size.</p>
      <div class="who-grid">
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg></div>
          <div class="who-title">Business Owners</div>
          <div class="who-desc">Planning a new website or a full redesign and wanting to communicate their vision clearly before approaching any developer or agency for a quote.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg></div>
          <div class="who-title">Startup Founders</div>
          <div class="who-desc">Who need to articulate their product vision to a web agency in writing — without spending days in back-and-forth emails trying to explain what they want.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4 19-7z"/></svg></div>
          <div class="who-title">Marketing Managers</div>
          <div class="who-desc">Briefing internal dev teams or external agencies on a new campaign website, a platform migration, or a major content restructure that needs a clean scope document.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></div>
          <div class="who-title">Freelancers & Consultants</div>
          <div class="who-desc">Creating a scoped brief for a client before quoting — so expectations are aligned upfront, revisions are minimised, and the engagement is protected by a written document.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 1 1.5 4.5c-2.9 0-4.2-.7-4.9-1.7a5.7 5.7 0 0 1-.8-3.8c2.8-.2 4.2.6 4.2.6V6"/></svg></div>
          <div class="who-title">Non-Technical Founders</div>
          <div class="who-desc">Who have a crystal clear vision for their site but struggle to translate it into language a developer can build from — without needing to understand technical jargon.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></div>
          <div class="who-title">NGOs & Institutions</div>
          <div class="who-desc">Who need a properly documented brief to satisfy procurement processes, get board approval for a web project, or issue a formal Request for Proposal (RFP).</div>
        </div>
      </div>
    </div>

    <!-- 7. What to Do After Generating Your Brief -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">NEXT STEPS</span>
      <h2>What to Do After Generating Your Website Brief</h2>
      <p>Your generated brief is a strong starting point. Here is the exact workflow to take it from a document to a signed, scoped, ready-to-build project.</p>
      <div class="steps-list">
        <div class="step-item">
          <div class="step-num">1</div>
          <div>
            <div class="step-title">Review and personalise the brief</div>
            <div class="step-desc">Read through the generated document and add any context the AI could not know — internal politics, hard deadlines, regulatory constraints, or existing vendor relationships that affect the project.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">2</div>
          <div>
            <div class="step-title">Get internal sign-off</div>
            <div class="step-desc">Share the brief with every stakeholder who has approval authority over the final website. Disagreements resolved at the brief stage cost nothing. Disagreements discovered mid-build cost everything.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">3</div>
          <div>
            <div class="step-title">Send to at least three agencies or developers</div>
            <div class="step-desc">A good brief makes proposals genuinely comparable. Send it to multiple vendors so you can evaluate their approach, communication style, and pricing against the same document rather than against different interpretations of what you want.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">4</div>
          <div>
            <div class="step-title">Run a discovery call with your shortlisted agency</div>
            <div class="step-desc">A discovery call with the brief in hand is far more productive than one without it. The agency can ask clarifying questions rather than introductory ones — cutting weeks of pre-proposal back-and-forth.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">5</div>
          <div>
            <div class="step-title">Review proposals against the brief</div>
            <div class="step-desc">Any proposal that does not address every section of your brief has gaps. Flag them explicitly before signing anything. Assumptions in a proposal become disputes in a project.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">6</div>
          <div>
            <div class="step-title">Attach the brief to your contract</div>
            <div class="step-desc">Once you have selected your agency or developer, make the brief a formal attachment to the contract. This transforms it from an informal document into a binding scope reference that protects both parties throughout the engagement.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 8. Free Generator vs Agency Discovery -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">COMPARE</span>
      <h2>Free Brief Generator vs a Paid Agency Discovery Session</h2>
      <p>Both have their place. Understanding what each delivers helps you decide when a free tool is enough — and when investing in a professional discovery session earns its cost back many times over.</p>
      <div class="tools-compare-wrapper">
      <table class="compare-table">
        <thead>
          <tr>
            <th>What's Covered</th>
            <th class="highlight">This Free Tool</th>
            <th>Agency Discovery Session</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Structured brief document</td>
            <td class="yes">✓ AI-generated</td>
            <td class="yes">✓ Workshop-produced</td>
          </tr>
          <tr>
            <td>Business & goal capture</td>
            <td class="yes">✓ Full 6-step form</td>
            <td class="yes">✓ Deep stakeholder interviews</td>
          </tr>
          <tr>
            <td>Page & feature mapping</td>
            <td class="yes">✓ Comprehensive checklist</td>
            <td class="yes">✓ Expert-guided sitemap</td>
          </tr>
          <tr>
            <td>Competitor & market analysis</td>
            <td class="no">✗ Not included</td>
            <td class="yes">✓ Full competitive landscape</td>
          </tr>
          <tr>
            <td>UX strategy & wireframes</td>
            <td class="no">✗ Not included</td>
            <td class="yes">✓ Included in full discovery</td>
          </tr>
          <tr>
            <td>Technical architecture planning</td>
            <td class="no">✗ Not included</td>
            <td class="yes">✓ System design included</td>
          </tr>
          <tr>
            <td>Formal project proposal</td>
            <td class="partial">Brief only — you get quotes</td>
            <td class="yes">✓ Full scoped proposal</td>
          </tr>
          <tr>
            <td>Time to complete</td>
            <td class="yes">✓ 10–15 minutes</td>
            <td>1–5 days</td>
          </tr>
          <tr>
            <td>Cost</td>
            <td class="yes">✓ Free</td>
            <td>Paid — varies by agency</td>
          </tr>
        </tbody>
      </table>
      </div>
      <p style="margin-top:1.25rem">Use this free tool to create a solid brief before approaching any agency. It will make every discovery conversation more productive. For complex projects — custom platforms, large-scale migrations, enterprise integrations — a paid discovery engagement will surface critical decisions that save far more than they cost.</p>
    </div>

  </div><!-- /seo-content-inner -->
</div><!-- /seo-content -->

<section class="service-cta">
  <div class="service-cta-eyebrow">✦ &nbsp; i2Medier Web Design & Development</div>
  <h2>Brief ready?<br>Let's <em>build the website.</em></h2>
  <p>i2Medier takes your brief and turns it into a live website — designed, built, and launched with zero guesswork. From a simple business site to a custom web application, we scope it right from day one.</p>
  <div class="service-pills">
    <span class="service-pill">Website Design</span>
    <span class="service-pill">Custom Web Development</span>
    <span class="service-pill">E-Commerce</span>
    <span class="service-pill">Web Applications</span>
    <span class="service-pill">Website Redesign</span>
    <span class="service-pill">Ongoing Maintenance</span>
  </div>
  <div class="cta-buttons">
    <a href="{{ route('site.start') }}" class="cta-btn-primary">Start Your Web Project →</a>
    <a href="{{ route('site.services') }}" class="cta-btn-secondary">View All Services</a>
  </div>
</section>

<section class="faq-section">
  <div class="faq-inner">
    <div class="faq-header">
      <span class="seo-section-eyebrow">Got Questions?</span>
      <h2>Frequently Asked Questions About the Website Brief Generator</h2>
      <p>Everything you need to know about creating, using, and sharing your AI-generated website brief.</p>
    </div>
    <div class="faq-list">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wbg-f1">
          <span class="faq-q-text">What is a website brief?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wbg-f1">A website brief is a structured document that defines your goals, target audience, required pages, design direction, features, budget, and timeline. It gives developers and agencies everything they need to quote accurately and build correctly — before a single decision is made.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wbg-f2">
          <span class="faq-q-text">How long does it take to complete the form?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wbg-f2">Most users complete all six steps in 10 to 15 minutes. The guided format breaks the process into short, focused sections so you never face a blank page. The more detail you provide, the more precise and useful your generated brief will be.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wbg-f3">
          <span class="faq-q-text">Can I edit the AI-generated brief?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wbg-f3">Yes. The AI produces a structured draft from your inputs. Use the Copy Text button to copy the full brief into any word processor or document tool — Google Docs, Word, Notion — and edit it freely before sharing with an agency or developer.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wbg-f4">
          <span class="faq-q-text">Do I need technical knowledge to complete the form?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wbg-f4">No technical knowledge is required. Every question uses plain language and includes helpful examples. The AI handles all formatting and structure. It is designed specifically for business owners, founders, and non-technical stakeholders.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wbg-f5">
          <span class="faq-q-text">Is my brief saved to a server?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wbg-f5">No. Your brief is generated within your browser session and is not stored on our servers. Download or print it before closing the tab — once the session ends, the data is gone.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wbg-f6">
          <span class="faq-q-text">Can I use this brief to get quotes from multiple agencies?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wbg-f6">Yes — and that is exactly what it is designed for. A consistent brief means every agency quotes against the same scope, making proposals genuinely comparable. Without a brief, each agency interprets your project differently and you cannot make a fair comparison between their proposals.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wbg-f7">
          <span class="faq-q-text">What if I am not sure about some answers?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wbg-f7">Answer with your best current thinking. The brief is a starting point for a conversation, not a legally binding specification. Most agencies expect to refine details during discovery — but having your initial thinking documented saves hours of exploratory back-and-forth before work begins.</div>
      </div>

    </div>
  </div>
</section>

<div id="toast" style="position:fixed;bottom:1.5rem;right:1.5rem;background:var(--black);color:var(--white);padding:.75rem 1.25rem;border-radius:6px;font-size:.82rem;font-weight:500;border-left:3px solid var(--gold);box-shadow:0 8px 24px rgba(0,0,0,.2);transform:translateY(20px);opacity:0;transition:all .3s;z-index:1000;pointer-events:none;max-width:280px"></div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-website-brief-generator.js')
@endpush
