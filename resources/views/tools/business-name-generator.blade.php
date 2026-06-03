@extends('public.layouts.nametool')

@section('title', 'Business Name Generator — i2Medier')

@push('page_meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('page_css')
    @vite('resources/css/public/pages/business-name-generator.css')
@endpush

@section('body_attrs')
id="business-name-generator-page"
data-generate-route="{{ route('tools.business-name-generator.generate') }}"
data-variations-route="{{ route('tools.business-name-generator.variations') }}"
@endsection

@section('content')
<nav>
    <a href="{{ route('site.home') }}" class="logo">i2Medi<span>er</span></a>
    <span class="nav-tag">Business Name Generator</span>
    <div class="nav-right">
        <button class="nav-fav-btn" type="button" onclick="toggleFavPanel()">
            ❤ Saved Names <span class="nav-fav-count" id="fav-count">0</span>
        </button>
    </div>
</nav>

<div class="hero">
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-bubbles" id="hero-bubbles" aria-hidden="true"></div>
    <div class="hero-content">
        <div class="hero-eyebrow">✦ &nbsp; AI-Powered Brand Naming</div>
        <h1 class="hero-title">Find the perfect name<br>for your <em>next big idea</em></h1>
        <p class="hero-sub">Describe your business and let Claude generate creative, memorable names tailored to your industry, tone, and audience — in seconds.</p>

        <div class="form-card">
            <div class="fc-description">
                <label class="fc-label" for="biz-desc">What does your business do? <span class="gold-mark">*</span></label>
                <textarea class="fc-textarea" id="biz-desc" placeholder="e.g. A fintech startup that helps small businesses in Nigeria manage cash flow and send invoices… or a premium skincare brand for women with natural Nigerian ingredients…" rows="3"></textarea>
            </div>

            <div class="fc-row">
                <div class="fc-col">
                    <label class="fc-label" for="keywords">Keywords to inspire (optional)</label>
                    <input class="fc-text-input" id="keywords" placeholder="e.g. swift, grow, trust, nova, apex">
                </div>
                <div class="fc-col">
                    <label class="fc-label" for="avoid-words">Words to avoid (optional)</label>
                    <input class="fc-text-input" id="avoid-words" placeholder="e.g. cheap, fast, mega, ultra">
                </div>
            </div>

            <div class="fc-row">
                <div class="fc-col">
                    <label class="fc-label">Brand style (select one or more)</label>
                    <div class="pill-group" id="style-group">
                        <div class="pill active" data-val="Modern">Modern</div>
                        <div class="pill" data-val="Classic">Classic</div>
                        <div class="pill" data-val="Creative">Creative</div>
                        <div class="pill" data-val="Playful">Playful</div>
                        <div class="pill" data-val="Bold">Bold</div>
                        <div class="pill" data-val="Technical">Technical</div>
                        <div class="pill" data-val="Elegant">Elegant</div>
                        <div class="pill" data-val="Professional">Professional</div>
                    </div>
                </div>

                <div class="fc-col">
                    <label class="fc-label">Name length preference</label>
                    <div class="pill-group" id="length-group">
                        <div class="pill" data-val="single" data-single>Single word</div>
                        <div class="pill active" data-val="any" data-single>Any length</div>
                        <div class="pill" data-val="compound" data-single>Compound</div>
                        <div class="pill" data-val="phrase" data-single>Short phrase</div>
                    </div>
                    <label class="fc-label market-label">Target market</label>
                    <div class="pill-group" id="market-group">
                        <div class="pill active" data-val="Nigeria" data-single>🇳🇬 Nigeria</div>
                        <div class="pill" data-val="UK" data-single>🇬🇧 UK</div>
                        <div class="pill" data-val="USA" data-single>🇺🇸 USA</div>
                        <div class="pill" data-val="Global" data-single>🌍 Global</div>
                    </div>
                </div>
            </div>

            <button class="gen-btn" id="gen-btn" type="button" onclick="generateNames()">
                <span class="btn-text">✦ Generate Business Names</span>
                <div class="btn-spinner"></div>
            </button>
        </div>
    </div>
</div>

<div id="loading-section">
    <span class="loading-icon">✨</span>
    <div class="loading-title">Crafting your brand identity…</div>
    <div class="loading-msg" id="loading-msg">Warming up the creative engine…</div>
    <div class="loading-dots"><div class="ld-dot"></div><div class="ld-dot"></div><div class="ld-dot"></div></div>
    <div class="skeleton-grid" id="skeleton-grid"></div>
</div>

<div id="results-section">
    <div class="results-bar">
        <div class="results-count">
            <span class="rc-badge" id="results-count-badge">0</span>
            names generated
        </div>
        <div class="results-filters">
            <span class="rf-label">Filter:</span>
            <div class="filter-pill active" data-filter="all" onclick="filterResults('all', this)">All</div>
            <div id="style-filters"></div>
        </div>
        <div class="results-actions">
            <button class="regen-btn" type="button" onclick="generateNames()">↻ Regenerate</button>
        </div>
    </div>
    <div class="names-grid" id="names-grid"></div>
</div>

<div class="fav-panel" id="fav-panel">
    <div class="fav-panel-head">
        <h2 class="fph-title">❤ Saved Names</h2>
        <button class="fph-clear" type="button" onclick="clearFavs()">Clear All</button>
    </div>
    <div class="fav-grid" id="fav-grid"></div>
</div>

<div class="toast" id="toast"></div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-business-name-generator.js')
@endpush
