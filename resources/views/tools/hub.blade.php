@extends('public.layouts.app')

@section('title', 'Free Tools for Nigerian Businesses — i2Medier')

@push('meta')
<meta name="description" content="10 free tools to help Nigerian businesses plan, build, and grow their digital presence. SEO audit, cost calculator, invoice generator, name generator and more — no signup required."/>
<link rel="canonical" href="{{ url('/tools') }}"/>
@endpush

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section('content')

{{-- HERO --}}
<header class="th-hero">
    <div class="th-hero-grid" aria-hidden="true"></div>
    <div class="th-hero-inner">
        <div class="th-hero-eyebrow"><span class="th-hero-eyebrow-dot"></span> Free Tools by i2Medier</div>
        <h1>Every tool your business<br>needs to <em>grow online</em></h1>
        <p class="th-hero-sub">Eight free tools — and more on the way — built specifically for Nigerian businesses and entrepreneurs. No account. No credit card. Just open and use.</p>
        <div class="th-hero-badges">
            <div class="th-hb-badge"><span>✓</span> 100% Free</div>
            <div class="th-hb-badge"><span>✓</span> No Signup Required</div>
            <div class="th-hb-badge"><span>✓</span> Works on Mobile</div>
            <div class="th-hb-badge"><span>✓</span> Built in Nigeria</div>
            <div class="th-hb-badge"><span>⚡</span> AI-Powered</div>
        </div>
    </div>
</header>

{{-- COUNT BAND --}}
<div class="th-count-band">
    <div class="th-count-band-inner">
        <div class="th-cb-left">
            <div class="th-cb-stat"><strong>8</strong> tools available now</div>
            <div class="th-cb-sep"></div>
            <div class="th-cb-stat"><strong>3</strong> coming soon</div>
            <div class="th-cb-sep"></div>
            <div class="th-cb-stat"><strong>Free forever</strong> — no hidden fees</div>
            <div class="th-cb-sep"></div>
            <div class="th-cb-stat th-cb-stat--live"><span>●</span> All tools live</div>
        </div>
        <div class="th-cb-right">
            <input class="th-tool-search" type="text" id="tool-search" placeholder="🔍  Search tools…" oninput="thFilterSearch(this.value)" aria-label="Search tools"/>
        </div>
    </div>
</div>

{{-- MAIN --}}
<main class="th-main" id="tools">

    {{-- FILTERS --}}
    <div class="th-filters" role="tablist" aria-label="Filter tools by category">
        <button class="th-filter-btn active" data-filter="all" onclick="thApplyFilter('all',this)" role="tab" aria-selected="true">All <span class="th-filter-count">8</span></button>
        <div class="th-filters-divider" aria-hidden="true"></div>
        <button class="th-filter-btn" data-filter="seo" onclick="thApplyFilter('seo',this)">🔍 SEO &amp; Marketing <span class="th-filter-count">1</span></button>
        <button class="th-filter-btn" data-filter="names" onclick="thApplyFilter('names',this)">✨ Naming &amp; Domains <span class="th-filter-count">2</span></button>
        <button class="th-filter-btn" data-filter="planning" onclick="thApplyFilter('planning',this)">📋 Project Planning <span class="th-filter-count">3</span></button>
        <button class="th-filter-btn" data-filter="finance" onclick="thApplyFilter('finance',this)">💰 Finance &amp; Admin <span class="th-filter-count">1</span></button>
        <button class="th-filter-btn" data-filter="marketing" onclick="thApplyFilter('marketing',this)">💬 Marketing <span class="th-filter-count">1</span></button>
    </div>

    {{-- TOOLS GRID --}}
    <div class="th-tools-grid" id="th-tools-grid" role="list">

        {{-- 01 — SEO Audit --}}
        <a href="{{ route('tools.seo-audit') }}" class="th-tool-card th-cat-seo reveal" data-cat="seo" data-name="seo audit tool" role="listitem">
            <div class="th-tc-ribbon"><span class="th-tc-ribbon-label">AI</span></div>
            <div class="th-tc-icon-wrap" aria-hidden="true">🔍</div>
            <div class="th-tc-cat">SEO &amp; Marketing</div>
            <div class="th-tc-name">SEO Audit Tool</div>
            <p class="th-tc-desc">Enter any URL for a full technical SEO audit. Checks meta tags, heading structure, page speed, Core Web Vitals, Open Graph, schema markup, and more — then uses Claude AI to generate a prioritised action plan.</p>
            <div class="th-tc-footer">
                <span class="th-tc-free-badge">✓ Free</span>
                <span class="th-tc-arrow">Open Tool →</span>
            </div>
        </a>

        {{-- 02 — Business Name Generator --}}
        <a href="{{ route('tools.business-name-generator') }}" class="th-tool-card th-cat-names reveal" data-cat="names" data-name="business name generator" role="listitem">
            <div class="th-tc-ribbon"><span class="th-tc-ribbon-label">AI</span></div>
            <div class="th-tc-icon-wrap" aria-hidden="true">✨</div>
            <div class="th-tc-cat">Naming</div>
            <div class="th-tc-name">Business Name Generator</div>
            <p class="th-tc-desc">Describe your business and get 12 creative, brandable name suggestions with taglines, explanations, domain hints, and personality tags. Filter by style, save favourites, and generate variations with one click.</p>
            <div class="th-tc-footer">
                <span class="th-tc-free-badge">✓ Free</span>
                <span class="th-tc-arrow">Open Tool →</span>
            </div>
        </a>

        {{-- 03 — Domain Name Generator --}}
        <a href="{{ route('tools.domain-name-generator') }}" class="th-tool-card th-cat-domain reveal" data-cat="names" data-name="domain name generator" role="listitem">
            <div class="th-tc-ribbon"><span class="th-tc-ribbon-label">AI</span></div>
            <div class="th-tc-icon-wrap" aria-hidden="true">🌐</div>
            <div class="th-tc-cat">Domains</div>
            <div class="th-tc-name">Domain Name Generator</div>
            <p class="th-tc-desc">Generate 12 available-sounding domain names across .com, .ng, .co.ng, .io, .ai, and more. Includes domain scores, alternative TLDs, type labels, and direct links to check availability on Namecheap and GoDaddy.</p>
            <div class="th-tc-footer">
                <span class="th-tc-free-badge">✓ Free</span>
                <span class="th-tc-arrow">Open Tool →</span>
            </div>
        </a>

        {{-- 04 — Website Brief Generator --}}
        <a href="{{ route('tools.website-brief-generator') }}" class="th-tool-card th-cat-planning reveal" data-cat="planning" data-name="website brief generator" role="listitem">
            <div class="th-tc-ribbon"><span class="th-tc-ribbon-label">AI</span></div>
            <div class="th-tc-icon-wrap" aria-hidden="true">📋</div>
            <div class="th-tc-cat">Project Planning</div>
            <div class="th-tc-name">Website Brief Generator</div>
            <p class="th-tc-desc">Complete a 6-step guided form about your business, goals, pages, design direction, features, and budget. Claude AI writes a comprehensive, professional website brief document you can hand straight to any developer or agency.</p>
            <div class="th-tc-footer">
                <span class="th-tc-free-badge">✓ Free</span>
                <span class="th-tc-arrow">Open Tool →</span>
            </div>
        </a>

        {{-- 05 — Cost Calculator --}}
        <a href="{{ route('tools.cost-calculator') }}" class="th-tool-card th-cat-planning reveal" data-cat="planning" data-name="website cost calculator" role="listitem">
            <div class="th-tc-icon-wrap" aria-hidden="true">🧮</div>
            <div class="th-tc-cat">Project Planning</div>
            <div class="th-tc-name">Website Cost Calculator</div>
            <p class="th-tc-desc">Configure your website project — type, pages, design level, features, content, SEO, platform, and timeline — and get a real-time itemised cost estimate in Naira. Includes a comparison table against freelancers and large agencies.</p>
            <div class="th-tc-footer">
                <span class="th-tc-free-badge">✓ Free</span>
                <span class="th-tc-arrow">Open Tool →</span>
            </div>
        </a>

        {{-- 06 — Invoice Generator --}}
        <a href="{{ route('tools.invoice-generator') }}" class="th-tool-card th-cat-finance reveal" data-cat="finance" data-name="invoice generator" role="listitem">
            <div class="th-tc-icon-wrap" aria-hidden="true">🧾</div>
            <div class="th-tc-cat">Finance &amp; Admin</div>
            <div class="th-tc-name">Invoice Generator</div>
            <p class="th-tc-desc">Create professional invoices with your brand details, client info, line items, tax, discount, and bank details — with a live preview updating in real time. Download as PDF, mark as paid, save multiple invoices, and switch between NGN, USD, GBP, and EUR.</p>
            <div class="th-tc-footer">
                <span class="th-tc-free-badge">✓ Free</span>
                <span class="th-tc-arrow">Open Tool →</span>
            </div>
        </a>

        {{-- 07 — WhatsApp Link Generator --}}
        <a href="{{ route('tools.whatsapp-link-generator') }}" class="th-tool-card th-cat-marketing reveal" data-cat="marketing" data-name="whatsapp link generator" role="listitem">
            <div class="th-tc-icon-wrap" aria-hidden="true">💬</div>
            <div class="th-tc-cat">Marketing</div>
            <div class="th-tc-name">WhatsApp Link Generator</div>
            <p class="th-tc-desc">Generate wa.me links with pre-filled messages, country code picker, 7 message templates, UTM tracking, and a downloadable QR code. Includes HTML embed code for three button styles — floating, inline, and banner — ready to paste into any website.</p>
            <div class="th-tc-footer">
                <span class="th-tc-free-badge">✓ Free</span>
                <span class="th-tc-arrow">Open Tool →</span>
            </div>
        </a>

        {{-- 08 — Onboarding Form --}}
        <a href="{{ route('site.start') }}" class="th-tool-card th-cat-onboarding reveal" data-cat="planning" data-name="project onboarding form" role="listitem">
            <div class="th-tc-icon-wrap" aria-hidden="true">🚀</div>
            <div class="th-tc-cat">Project Onboarding</div>
            <div class="th-tc-name">Project Onboarding Form</div>
            <p class="th-tc-desc">Start your i2Medier project the right way. A clean 5-step form to select your services and add-ons, get a live quote, and submit your project requirements — with a full quote summary updating as you go.</p>
            <div class="th-tc-footer">
                <span class="th-tc-free-badge">✓ Free</span>
                <span class="th-tc-arrow">Open Tool →</span>
            </div>
        </a>

    </div>{{-- /th-tools-grid --}}

    {{-- No results --}}
    <div id="th-no-results" style="display:none;text-align:center;padding:3rem;color:var(--g400)">
        <div style="font-size:2rem;margin-bottom:.75rem">🔍</div>
        <div style="font-family:var(--serif);font-size:1.1rem;color:var(--black);margin-bottom:.4rem">No tools found</div>
        <div style="font-size:.875rem">Try a different search term or clear the filter.</div>
        <button onclick="thClearSearch()" class="th-clear-btn">Clear search</button>
    </div>

    {{-- COMING SOON --}}
    <div class="th-soon-header reveal">
        <h2>Coming Soon</h2>
        <div class="th-soon-line"></div>
        <span class="th-soon-badge">In development</span>
    </div>

    <div class="th-soon-grid">

        <div class="th-soon-card reveal">
            <div class="th-sc-icon-wrap" aria-hidden="true">📱</div>
            <div class="th-sc-name">QR Code Generator</div>
            <p class="th-sc-desc">Generate QR codes for URLs, vCards, Wi-Fi credentials, and WhatsApp links. Customise colours, add a logo centre, and download in SVG or PNG at any resolution.</p>
            <div class="th-sc-footer">
                <span class="th-sc-eta">Q3 2026</span>
                <button class="th-sc-notify" onclick="thNotifySoon('QR Code Generator')">Notify me</button>
            </div>
        </div>

        <div class="th-soon-card reveal">
            <div class="th-sc-icon-wrap" aria-hidden="true">✉️</div>
            <div class="th-sc-name">Email Signature Maker</div>
            <p class="th-sc-desc">Create a branded, professional HTML email signature with your photo, name, role, company, contact links, and social icons. Copy the HTML and paste into Gmail, Outlook, or any email client.</p>
            <div class="th-sc-footer">
                <span class="th-sc-eta">Q3 2026</span>
                <button class="th-sc-notify" onclick="thNotifySoon('Email Signature Maker')">Notify me</button>
            </div>
        </div>

        <div class="th-soon-card reveal">
            <div class="th-sc-icon-wrap" aria-hidden="true">💳</div>
            <div class="th-sc-name">Business Card Maker</div>
            <p class="th-sc-desc">Design a clean, professional digital business card with your details, brand colours, and links. Share as a URL, download as a PNG, or embed as a mini page on your website.</p>
            <div class="th-sc-footer">
                <span class="th-sc-eta">Q4 2026</span>
                <button class="th-sc-notify" onclick="thNotifySoon('Business Card Maker')">Notify me</button>
            </div>
        </div>

    </div>

    {{-- REQUEST A TOOL --}}
    <div class="th-request-section reveal">
        <div class="th-rs-left">
            <span class="th-rs-eyebrow">Missing a tool?</span>
            <div class="th-rs-title">Tell us what you need</div>
            <p class="th-rs-desc">We build tools based on real gaps we see in the Nigerian business market. If there is something you keep wishing existed, we genuinely want to hear about it — the next tool might be yours.</p>
        </div>
        <div class="th-rs-right">
            <a href="{{ route('site.contact') }}?subject=Tool+Request" class="th-rs-btn">Suggest a Tool →</a>
        </div>
    </div>

</main>

<div id="th-toast"></div>

@endsection

@push('scripts')
<script>
(function () {
    let activeFilter = 'all';
    let searchQuery  = '';

    window.thApplyFilter = function (cat, btn) {
        activeFilter = cat;
        document.querySelectorAll('.th-filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        thRenderCards();
    };

    window.thFilterSearch = function (q) {
        searchQuery = q.toLowerCase().trim();
        thRenderCards();
    };

    window.thClearSearch = function () {
        document.getElementById('tool-search').value = '';
        searchQuery = '';
        thRenderCards();
    };

    function thRenderCards() {
        const cards = document.querySelectorAll('.th-tool-card');
        let visible = 0;
        cards.forEach((card) => {
            const cat   = card.dataset.cat || '';
            const name  = card.dataset.name || '';
            const desc  = card.querySelector('.th-tc-desc')?.textContent.toLowerCase() || '';
            const matchCat    = activeFilter === 'all' || cat === activeFilter;
            const matchSearch = !searchQuery || name.includes(searchQuery) || desc.includes(searchQuery);
            const show = matchCat && matchSearch;
            card.classList.toggle('hidden', !show);
            if (show) { card.style.animationDelay = (visible * 0.06) + 's'; visible++; }
        });
        document.getElementById('th-no-results').style.display = visible === 0 ? 'block' : 'none';
    }

    window.thNotifySoon = function (toolName) {
        thToast('We\'ll let you know when ' + toolName + ' launches ✓');
    };

    function thToast(msg, dur) {
        dur = dur || 3000;
        const el = document.getElementById('th-toast');
        el.textContent = msg;
        el.classList.add('show');
        setTimeout(() => el.classList.remove('show'), dur);
    }

    /* Scroll reveal */
    const revealObs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                const siblings = [...(e.target.parentElement?.children || [])].filter(c => c.classList.contains('reveal'));
                const idx = siblings.indexOf(e.target);
                e.target.style.transitionDelay = (idx * 0.07) + 's';
                e.target.classList.add('in');
                revealObs.unobserve(e.target);
            }
        });
    }, { threshold: 0.07 });
    document.querySelectorAll('.reveal').forEach(el => revealObs.observe(el));
})();
</script>
@endpush
