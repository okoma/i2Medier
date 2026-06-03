@extends('public.layouts.nametool')

@section('title', 'Domain Name Generator — i2Medier')

@push('page_meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('page_css')
    @vite('resources/css/public/pages/domain-name-generator.css')
@endpush

@section('body_attrs')
id="domain-name-generator-page"
data-generate-route="{{ route('tools.domain-name-generator.generate') }}"
@endsection

@section('content')
<nav>
    <a href="{{ route('site.home') }}" class="logo">i2Medi<span>er</span></a>
    <div class="nav-center">
        <span class="nav-tag">Domain Name Generator</span>
    </div>
    <div class="nav-right">
        <button class="nav-btn" type="button" onclick="toggleFavPanel()">
            ❤ Saved <span class="fav-count-badge" id="fav-count">0</span>
        </button>
    </div>
</nav>

<div class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-domains" id="hero-domains" aria-hidden="true"></div>

    <div class="hero-content">
        <div class="hero-eyebrow">🌐 &nbsp; AI Domain Generator</div>
        <h1 class="hero-title">Find a domain that's<br><em>perfectly yours</em></h1>
        <p class="hero-sub">Describe your business, choose your preferred extensions, and let AI generate short, brandable, available-sounding domain names across .com, .ng, .io and more.</p>

        <div class="hero-url-demo">
            <div class="hud-bar">
                <span class="hud-lock">🔒</span>
                <div class="hud-text">
                    <span class="hud-name" id="hud-name">your</span><span class="hud-tld" id="hud-tld">.com</span><span class="hud-cursor"></span>
                </div>
                <div class="hud-icons"><span>↺</span><span>⋮</span></div>
            </div>
        </div>

        <div class="form-card">
            <div class="fc-section">
                <label class="fc-label" for="biz-desc">What is your business about? <span class="gold-mark">*</span></label>
                <textarea class="fc-textarea" id="biz-desc" placeholder="e.g. A digital agency in Nigeria specialising in web design and branding… or an online food delivery platform for restaurants in Lagos…" rows="3"></textarea>
            </div>

            <div class="fc-row">
                <div class="fc-col">
                    <label class="fc-label" for="keywords">Keywords / name hints (optional)</label>
                    <input class="fc-input" id="keywords" placeholder="e.g. swift, market, link, hub, ng">
                </div>
                <div class="fc-col">
                    <label class="fc-label" for="must-include">Must include word (optional)</label>
                    <input class="fc-input" id="must-include" placeholder="e.g. pay, track, app">
                </div>
            </div>

            <div class="fc-row">
                <div class="fc-col">
                    <label class="fc-label">Preferred TLDs (select any)</label>
                    <div class="pill-group" id="tld-group">
                        <div class="pill tld-com active" data-val=".com">.com</div>
                        <div class="pill tld-co active" data-val=".co">.co</div>
                        <div class="pill tld-io" data-val=".io">.io</div>
                        <div class="pill tld-ng active" data-val=".ng">.ng</div>
                        <div class="pill tld-ng" data-val=".co.ng">.co.ng</div>
                        <div class="pill tld-ng" data-val=".com.ng">.com.ng</div>
                        <div class="pill tld-ai" data-val=".ai">.ai</div>
                        <div class="pill tld-app" data-val=".app">.app</div>
                        <div class="pill tld-tech" data-val=".tech">.tech</div>
                        <div class="pill" data-val=".store">.store</div>
                        <div class="pill" data-val=".online">.online</div>
                        <div class="pill" data-val=".co.uk">.co.uk</div>
                    </div>
                </div>
                <div class="fc-col">
                    <label class="fc-label">Domain name style</label>
                    <div class="pill-group" id="style-group">
                        <div class="pill active" data-val="Any" data-single>Any style</div>
                        <div class="pill" data-val="Brandable" data-single>Brandable</div>
                        <div class="pill" data-val="Keyword-rich" data-single>Keyword-rich</div>
                        <div class="pill" data-val="Short" data-single>Short &amp; snappy</div>
                        <div class="pill" data-val="Creative" data-single>Creative/hack</div>
                    </div>
                    <label class="fc-label fc-sub-label">Max domain length</label>
                    <div class="pill-group" id="length-group">
                        <div class="pill active" data-val="any" data-single>Any</div>
                        <div class="pill" data-val="8" data-single>≤ 8 chars</div>
                        <div class="pill" data-val="12" data-single>≤ 12 chars</div>
                        <div class="pill" data-val="15" data-single>≤ 15 chars</div>
                    </div>
                </div>
            </div>

            <button class="gen-btn" id="gen-btn" type="button" onclick="generateDomains()">
                <span class="btn-text">🌐 Generate Domain Names</span>
                <div class="btn-spinner"></div>
            </button>
        </div>
    </div>
</div>

<div id="loading-section">
    <span class="loading-icon">🔍</span>
    <div class="loading-title">Searching the domain space…</div>
    <div class="loading-msg" id="loading-msg">Scanning combinations…</div>
    <div class="loading-dots"><div class="ld-dot"></div><div class="ld-dot"></div><div class="ld-dot"></div></div>
    <div class="skeleton-grid" id="skeleton-grid"></div>
</div>

<div id="results-section">
    <div class="results-bar">
        <div class="results-info">
            <div class="ri-count"><span class="ri-badge" id="res-count">0</span> domain suggestions</div>
        </div>
        <div class="results-filters">
            <span class="rf-label">Filter:</span>
            <div class="fp active" data-filter="all" onclick="applyFilter('all', this)">All</div>
            <div id="tld-filters"></div>
            <div id="type-filters"></div>
        </div>
        <div class="results-right">
            <select class="sort-select" id="sort-select" onchange="applySort()">
                <option value="score">Sort: Score ↓</option>
                <option value="length">Sort: Shortest first</option>
                <option value="alpha">Sort: A–Z</option>
            </select>
            <button class="regen-btn" type="button" onclick="generateDomains()">↻ Regenerate</button>
        </div>
    </div>
    <div class="domain-grid" id="domain-grid"></div>
</div>

<div class="fav-panel" id="fav-panel">
    <div class="fav-header">
        <h2 class="fav-title">❤ Saved Domains</h2>
        <div class="fav-actions-row">
            <button class="fav-copy-all" type="button" onclick="copyAllFavs()">📋 Copy All</button>
            <button class="fav-clear" type="button" onclick="clearFavs()">Clear All</button>
        </div>
    </div>
    <div class="fav-grid" id="fav-grid"></div>
</div>

<div class="toast" id="toast"></div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-domain-name-generator.js')
@endpush
