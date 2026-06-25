@extends('public.layouts.nametool')

@section('title', 'AI Domain Name Generator — Instant Domain Ideas | i2Medier')

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
            'name' => 'AI Domain Name Generator',
            'item' => route('tools.domain-name-generator'),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'SoftwareApplication',
    'name' => 'AI Domain Name Generator',
    'url' => route('tools.domain-name-generator'),
    'applicationCategory' => 'WebApplication',
    'operatingSystem' => 'Any',
    'offers' => ['@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'NGN'],
    'description' => 'Free AI domain name generator. Find available, creative domain name ideas for your business instantly — no signup required.',
    'provider' => ['@type' => 'Organization', 'name' => 'i2Medier', 'url' => url('/')],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush


@push('page_css')
    @vite('resources/css/public/pages/domain-name-generator.css')
@endpush

@section('body_attrs')
id="domain-name-generator-page"
data-generate-route="{{ route('tools.domain-name-generator.generate') }}"
data-honeypot-field="{{ \App\Support\Honeypot::fieldName() }}"
data-honeypot-time-field="{{ \App\Support\Honeypot::timeFieldName() }}"
data-honeypot-started-at="{{ \App\Support\Honeypot::startedAt() }}"
@endsection

@section('content')
<nav class="is-dark">
    @include('public.partials.logo', ['mode' => 'light', 'class' => 'logo'])
    @include('public.partials.menu')
    <span class="nav-tag">Domain Name Generator</span>
    <button class="nav-btn" type="button" onclick="toggleFavPanel()">
        <span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 20s-7-4.35-7-10a4 4 0 0 1 7-2.65A4 4 0 0 1 19 10c0 5.65-7 10-7 10z"/></svg></span>
        <span>Saved</span> <span class="fav-count-badge" id="fav-count">0</span>
    </button>
    <button class="public-nav-toggle" type="button" aria-expanded="false" aria-controls="public-side-nav" aria-label="Open navigation">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

<div class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-domains" id="hero-domains" aria-hidden="true"></div>

    <div class="hero-content">
        <div class="hero-eyebrow"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a15 15 0 0 1 0 18"/><path d="M12 3a15 15 0 0 0 0 18"/></svg></span><span>AI Domain Generator</span></div>
        <h1 class="hero-title">Find a domain that's<br><em>perfectly yours</em></h1>
        <p class="hero-sub">Describe your business, choose your preferred extensions, and let AI generate short, brandable, available-sounding domain names across .com, .ng, .io and more.</p>

        <div class="hero-url-demo">
            <div class="hud-bar">
                <span class="hud-lock ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 0 1 8 0v3"/></svg></span>
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
                <span class="btn-text"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a15 15 0 0 1 0 18"/><path d="M12 3a15 15 0 0 0 0 18"/></svg></span><span>Generate Domain Names</span></span>
                <div class="btn-spinner"></div>
            </button>
        </div>
    </div>
</div>

<div id="loading-section">
    <span class="loading-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.35-4.35"/></svg></span>
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
            <button class="regen-btn" type="button" onclick="generateDomains()"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M20 12a8 8 0 1 1-2.34-5.66"/><path d="M20 4v6h-6"/></svg></span><span>Regenerate</span></button>
        </div>
    </div>
    <div class="domain-grid" id="domain-grid"></div>
</div>

<div class="fav-panel" id="fav-panel">
    <div class="fav-header">
        <h2 class="fav-title"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 20s-7-4.35-7-10a4 4 0 0 1 7-2.65A4 4 0 0 1 19 10c0 5.65-7 10-7 10z"/></svg></span><span>Saved Domains</span></h2>
        <div class="fav-actions-row">
            <button class="fav-copy-all" type="button" onclick="copyAllFavs()"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="9" y="9" width="11" height="11" rx="2"/><path d="M6 15H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1"/></svg></span><span>Copy All</span></button>
            <button class="fav-clear" type="button" onclick="clearFavs()">Clear All</button>
        </div>
    </div>
    <div class="fav-grid" id="fav-grid"></div>
</div>

<div class="seo-content">
  <div class="seo-content-inner">

    <!-- 1. What Is a Domain Name Generator? -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">ABOUT THIS TOOL</span>
      <h2>About this free AI domain name generator</h2>
      <p>This free domain name generator takes your business description, preferred keywords, and target extensions and returns a list of short, brandable, available-sounding domain name ideas — in seconds. Powered by AI, it produces creative options that match your brand and niche.</p>
      <p>Unlike manually guessing names and checking them one by one, this AI domain name generator analyses naming patterns across thousands of real domains — compound words, creative abbreviations, keyword combinations, and TLD pairings — and surfaces options you would never have thought to try on your own.</p>
      <p>Think of it as having a domain strategist and DNS researcher working simultaneously around the clock, completely free. It shortens a process that normally takes hours of frustrating trial and error into a focused, fast creative session where availability is factored in from the start.</p>
    </div>

    <!-- 2. How Our Domain Name Generator Works -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">HOW IT WORKS</span>
      <h2>How Our Domain Name Generator Works</h2>
      <p>The moment you describe your business, the AI begins processing your input across six dimensions before generating a single domain suggestion.</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M9.5 2A2.5 2.5 0 0 1 12 4.5v15a2.5 2.5 0 0 1-4.96-.46 2.5 2.5 0 0 1-2.96-3.08 3 3 0 0 1-.34-5.58 2.5 2.5 0 0 1 1.32-4.24 2.5 2.5 0 0 1 4.44-1.14Z"/><path d="M14.5 2A2.5 2.5 0 0 0 12 4.5v15a2.5 2.5 0 0 0 4.96-.46 2.5 2.5 0 0 0 2.96-3.08 3 3 0 0 0 .34-5.58 2.5 2.5 0 0 0-1.32-4.24 2.5 2.5 0 0 0-4.44-1.14Z"/></svg></div>
          <div class="cfc-title">AI-Powered Naming</div>
          <div class="cfc-desc">The AI reads your business description and identifies the core concept, target audience, and industry signals — building a rich domain brief before generating anything.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg></div>
          <div class="cfc-title">Style Filtering</div>
          <div class="cfc-desc">Choose brandable, keyword-rich, short and snappy, or creative domain hacks. Every suggestion is filtered through your chosen style so results stay relevant to your taste.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>
          <div class="cfc-title">Multi-Extension Support</div>
          <div class="cfc-desc">Generate across .com, .co, .ng, .com.ng, .io, .ai, .app, .tech, .store, .online, and .co.uk simultaneously — so you see every viable option across the extensions that matter to you.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M5 3a2 2 0 0 0-2 2"/><path d="M19 3a2 2 0 0 1 2 2"/><path d="M21 19a2 2 0 0 1-2 2"/><path d="M5 21a2 2 0 0 1-2-2"/><path d="M9 3h1"/><path d="M9 21h1"/><path d="M14 3h1"/><path d="M14 21h1"/><path d="M3 9v1"/><path d="M21 9v1"/><path d="M3 14v1"/><path d="M21 14v1"/></svg></div>
          <div class="cfc-title">Length Control</div>
          <div class="cfc-desc">Set a maximum character limit — 8, 12, 15, or any length. Shorter domains are more memorable, easier to type, and less prone to typos in search bars and conversation.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg></div>
          <div class="cfc-title">Real-Time Scoring</div>
          <div class="cfc-desc">Every generated domain receives a score based on memorability, length, brandability, and extension quality — so you can quickly identify the strongest options without manually evaluating each one.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M21 2v6h-6"/><path d="M3 12a9 9 0 0 1 15-6.7L21 8"/><path d="M3 22v-6h6"/><path d="M21 12a9 9 0 0 1-15 6.7L3 16"/></svg></div>
          <div class="cfc-title">Unlimited Regeneration</div>
          <div class="cfc-desc">Each generation produces a genuinely new batch. Save your favourites across sessions and regenerate as many times as needed until the right domain appears.</div>
        </div>
      </div>
    </div>

    <!-- 3. What Makes a Great Domain Name? -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">WHAT TO LOOK FOR</span>
      <h2>What Makes a Great Domain Name?</h2>
      <p>Not all domains are equal. The best domain names share six qualities that make them easy to own, easy to remember, and easy to build a brand around.</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="6" cy="6" r="3"/><circle cx="6" cy="18" r="3"/><line x1="20" y1="4" x2="8.12" y2="15.88"/><line x1="14.47" y1="14.48" x2="20" y2="20"/><line x1="8.12" y1="8.12" x2="12" y2="12"/></svg></div>
          <div class="cfc-title">Short</div>
          <div class="cfc-desc">Domains under 12 characters are faster to type, easier to recall from memory, and less likely to be misspelled when someone tries to visit your site directly.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
          <div class="cfc-title">Easy to Say and Spell</div>
          <div class="cfc-desc">If you have to spell out your domain every time you mention it in conversation, you are losing referral traffic constantly. A domain that sounds exactly as it reads is a business asset.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg></div>
          <div class="cfc-title">Brandable</div>
          <div class="cfc-desc">A great domain feels distinctive and ownable — not generic. Coined words, tight compounds, and inventive combinations are harder to confuse with competitors and easier to trademark.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></div>
          <div class="cfc-title">No Hyphens or Numbers</div>
          <div class="cfc-desc">Hyphens are forgotten in conversation and reduce perceived credibility. Numbers create confusion ("is it the digit or the word?"). Neither belongs in a professional domain name.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>
          <div class="cfc-title">Right Extension</div>
          <div class="cfc-desc">.com is the global standard. .ng or .com.ng signals a Nigerian-focused business. .io suits tech products. .ai suits AI tools. Match the extension to your audience and ambition.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg></div>
          <div class="cfc-title">Future-Proof</div>
          <div class="cfc-desc">A domain tied too tightly to one product, one city, or one offering becomes a ceiling as you scale. The best domain names grow with your business rather than constraining it.</div>
        </div>
      </div>
    </div>

    <!-- 4. Why Your Domain Name Matters -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">WHY IT MATTERS</span>
      <h2>Why Your Domain Name Matters More Than You Think</h2>
      <p>Most founders pick a domain in five minutes and move on. In reality, your domain name is one of the most permanent decisions you will make for your online presence — and its quality compounds over time.</p>
      <div class="why-list">
        <div class="why-item">
          <div class="why-num">1</div>
          <div>
            <div class="why-body-title">It is your permanent online address</div>
            <div class="why-body-desc">Changing your domain after you have built an audience, earned backlinks, and established brand recognition is expensive and disruptive. Every link pointing to your old domain loses its value. Every customer who bookmarked it is gone. Get it right the first time.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">2</div>
          <div>
            <div class="why-body-title">It shapes your brand's credibility instantly</div>
            <div class="why-body-desc">When someone sees your domain in an email signature, on a business card, or in a search result, they form a judgement about your professionalism in under a second. A sharp, clean domain signals a serious business. A messy one raises doubts before the conversation even starts.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">3</div>
          <div>
            <div class="why-body-title">It determines your email address</div>
            <div class="why-body-desc">Your domain drives every professional email address in your business. A clean domain gives you hello@yourbrand.com. A compromised domain forces ugly workarounds that undermine trust at every touchpoint with clients, investors, and partners.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">4</div>
          <div>
            <div class="why-body-title">It affects branded search performance</div>
            <div class="why-body-desc">When someone searches for your business by name, your domain is one of Google's strongest signals for serving the right result. A domain that closely matches your brand name makes branded search clean and unambiguous. A mismatched domain splits authority and confuses the algorithm.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">5</div>
          <div>
            <div class="why-body-title">It anchors your entire digital presence</div>
            <div class="why-body-desc">Your website, branded email, social media verification, Google Business Profile, and every piece of marketing material you produce will reference this one address. A strong domain creates coherence across all of those touchpoints. A weak one fragments your identity from day one.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 5. Common Domain Naming Mistakes -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">COMMON MISTAKES</span>
      <h2>Common Domain Name Mistakes to Avoid</h2>
      <p>These are the most frequent domain mistakes founders make — and the ones most likely to create real problems after launch.</p>
      <div class="issues-feature-grid">
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">Choosing a domain with hyphens</div>
            <div class="ifi-desc">Hyphens are almost always forgotten when someone types your domain from memory. You end up sending traffic to a competitor who owns the clean version of your name.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">Using numbers in the domain</div>
            <div class="ifi-desc">Numbers create verbal ambiguity — nobody knows whether you mean the digit "4" or the word "four." This confusion costs you direct traffic and makes verbal referrals unreliable.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Skipping the .com when it matters</div>
            <div class="ifi-desc">If your audience is global or professional, not owning the .com of your name is a long-term liability. Customers default to typing .com — and someone else may own it and benefit from your traffic.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Too long or hard to spell</div>
            <div class="ifi-desc">Every extra character is another chance for a typo. Every unusual spelling is a support ticket waiting to happen. If you have to say "it's spelled with two t's" — reconsider the domain.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Infringing on a trademark</div>
            <div class="ifi-desc">Registering a domain that includes a trademarked brand name (even in a different context) can result in a UDRP dispute and forced transfer — often after you have built significant equity on that address.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Not registering matching extensions</div>
            <div class="ifi-desc">If you register yourbrand.com but a competitor registers yourbrand.ng, they can capture your local traffic. Securing the most relevant extensions defensively is cheap insurance.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">Choosing a domain that looks like spam</div>
            <div class="ifi-desc">Domains with random character strings, excessive keywords, or unusual TLDs trigger spam filters in email clients and make recipients less likely to trust links you send them.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">Waiting too long to register</div>
            <div class="ifi-desc">Domain squatters monitor public trademark filings, company registrations, and trending business names. Once a great domain catches attention, it disappears fast. Register before you announce.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 6. Who Should Use This Tool? -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">WHO IT'S FOR</span>
      <h2>Who Should Use This Domain Name Generator?</h2>
      <p>Whether you are launching something new or rebranding an existing business, this tool gives you a fast, focused stream of domain ideas across every extension that matters to you.</p>
      <div class="who-grid">
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg></div>
          <div class="who-title">Startup Founders</div>
          <div class="who-desc">Who need a sharp, available domain before they announce their company, build their product, or start taking investors seriously. The domain search should happen before the logo.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"/><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"/><path d="M2 7h20"/></svg></div>
          <div class="who-title">Small Business Owners</div>
          <div class="who-desc">Setting up their first website and needing a domain that is professional, available, and easy enough for customers to remember and type without help.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
          <div class="who-title">Developers & Agencies</div>
          <div class="who-desc">Checking domain availability for client projects during discovery or proposal phases — quickly surfacing options before presenting naming directions to a client.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></div>
          <div class="who-title">Bloggers & Creators</div>
          <div class="who-desc">Launching a content platform, newsletter, or personal brand and needing a clean domain that is short, memorable, and available across the extensions they care about.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
          <div class="who-title">E-Commerce Sellers</div>
          <div class="who-desc">Building an online store and needing a domain that is clean, searchable, and available for both the store itself and the branded email addresses the business will need.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M21 2v6h-6"/><path d="M3 12a9 9 0 0 1 15-6.7L21 8"/><path d="M3 22v-6h6"/><path d="M21 12a9 9 0 0 1-15 6.7L3 16"/></svg></div>
          <div class="who-title">Rebranding Businesses</div>
          <div class="who-desc">Who have outgrown their existing domain or business name and need to find a new address that reflects their current positioning without losing their digital credibility.</div>
        </div>
      </div>
    </div>

    <!-- 7. What to Do After Finding Your Domain -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">NEXT STEPS</span>
      <h2>What to Do After Finding Your Domain Name</h2>
      <p>A generated domain suggestion is a starting point. Here is the exact workflow to lock it in and build your online presence around it before someone else claims it.</p>
      <div class="steps-list">
        <div class="step-item">
          <div class="step-num">1</div>
          <div>
            <div class="step-title">Register immediately — don't wait</div>
            <div class="step-desc">Domain availability changes hourly. The moment you identify a domain you want, register it. The cost is typically under ₦5,000–₦15,000 per year for a .com.ng or .ng. Waiting to think about it is how you lose it to a squatter.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">2</div>
          <div>
            <div class="step-title">Register matching extensions defensively</div>
            <div class="step-desc">If you register yourbrand.com, also consider securing yourbrand.ng and yourbrand.com.ng if you operate in Nigeria. Defensive registration prevents competitors and squatters from capturing your local traffic.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">3</div>
          <div>
            <div class="step-title">Set up branded email immediately</div>
            <div class="step-desc">Once your domain is registered, set up at least one professional email address (hello@, info@, or yourname@) before you start any business communication. A branded email signals professionalism that a Gmail address never can.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">4</div>
          <div>
            <div class="step-title">Enable auto-renewal</div>
            <div class="step-desc">Forgotten renewals are how established businesses lose their domains to squatters who monitor expiry dates. Enable auto-renewal with your registrar on day one and keep your payment method current.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">5</div>
          <div>
            <div class="step-title">Brief a web designer</div>
            <div class="step-desc">With your domain secured, you have a real address to build around. Now is the right time to brief a designer on your website. The domain you chose will shape naming conventions, URL structure, and the brand identity that wraps around it.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">6</div>
          <div>
            <div class="step-title">Register your business and trademark</div>
            <div class="step-desc">If the domain matches your intended business name, file for CAC registration and consider trademark registration for your brand name. A domain you own but cannot legally protect is always at risk from larger entities in the same space.</div>
          </div>
        </div>
      </div>
    </div>

    <!-- 8. Free Generator vs Domain Consultant -->
    <div class="seo-section">
      <span class="seo-section-eyebrow">COMPARE</span>
      <h2>Free Domain Generator vs Hiring a Domain & Brand Consultant</h2>
      <p>Both have their place. Understanding what each delivers helps you decide when a free tool is enough — and when professional strategy pays for itself.</p>
      <div class="tools-compare-wrapper">
      <table class="compare-table">
        <thead>
          <tr>
            <th>What's Covered</th>
            <th class="highlight">This Free Tool</th>
            <th>Domain Consultant</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>AI-generated domain ideas</td>
            <td class="yes">✓ Unlimited batches</td>
            <td class="yes">✓ Curated shortlist</td>
          </tr>
          <tr>
            <td>Multi-extension search</td>
            <td class="yes">✓ 12 extensions</td>
            <td class="yes">✓ Full registry access</td>
          </tr>
          <tr>
            <td>Domain scoring & ranking</td>
            <td class="yes">✓ Automated scoring</td>
            <td class="yes">✓ Expert evaluation</td>
          </tr>
          <tr>
            <td>Trademark conflict check</td>
            <td class="no">✗ Not included</td>
            <td class="yes">✓ Full clearance search</td>
          </tr>
          <tr>
            <td>Competitor domain analysis</td>
            <td class="no">✗ Not included</td>
            <td class="yes">✓ Full competitive audit</td>
          </tr>
          <tr>
            <td>Brand strategy alignment</td>
            <td class="no">✗ Not included</td>
            <td class="yes">✓ Domain fits brand story</td>
          </tr>
          <tr>
            <td>Premium domain sourcing</td>
            <td class="no">✗ New registrations only</td>
            <td class="yes">✓ Aftermarket & auctions</td>
          </tr>
          <tr>
            <td>Revision rounds</td>
            <td class="yes">✓ Unlimited regenerations</td>
            <td>Defined revision rounds</td>
          </tr>
          <tr>
            <td>Cost</td>
            <td class="yes">✓ Free, instant</td>
            <td>Paid — varies by scope</td>
          </tr>
        </tbody>
      </table>
      </div>
      <p style="margin-top:1.25rem">Use this free tool to generate ideas, score options, and shortlist available domains quickly. When you need trademark clearance, competitive analysis, premium domain acquisition, or full brand-to-domain strategy — that is when professional guidance earns its cost back many times over.</p>
    </div>

  </div><!-- /seo-content-inner -->
</div><!-- /seo-content -->

<section class="service-cta">
  <div class="service-cta-eyebrow">✦ &nbsp; i2Medier Web & Brand Services</div>
  <h2>Found your domain?<br>Now <em>build the website around it.</em></h2>
  <p>i2Medier helps you register your domain, set up professional email, design your website, and launch your full online presence — from a single address to a complete digital brand in one place.</p>
  <div class="service-pills">
    <span class="service-pill">Domain Registration</span>
    <span class="service-pill">Business Email Setup</span>
    <span class="service-pill">Website Design</span>
    <span class="service-pill">Web Hosting</span>
    <span class="service-pill">Logo & Brand Identity</span>
    <span class="service-pill">CAC Business Registration</span>
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
      <h2>Frequently Asked Questions About the Domain Name Generator</h2>
      <p>Everything you need to know about finding, evaluating, and registering the right domain for your business.</p>
    </div>
    <div class="faq-list">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="dng-f1">
          <span class="faq-q-text">What domain extensions does the tool suggest?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="dng-f1">The tool generates names across .com, .co, .ng, .com.ng, .co.ng, .io, .ai, .app, .tech, .store, .online, and .co.uk. You can select exactly which extensions you want before generating so results stay focused on what matters to your market.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="dng-f2">
          <span class="faq-q-text">Does the tool check real-time domain availability?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="dng-f2">The tool generates AI-powered domain name suggestions scored on memorability, length, and brandability. For definitive live availability, click through to a registrar like Namecheap or GoDaddy — domain status can change by the minute and only a live WHOIS query is fully authoritative.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="dng-f3">
          <span class="faq-q-text">What makes a good domain name?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="dng-f3">A strong domain is short (under 12 characters ideally), easy to spell, easy to say aloud, contains no hyphens or numbers, and uses the right extension for your audience. A .com is the global standard; .ng or .com.ng works well for Nigeria-focused businesses; .io suits tech products.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="dng-f4">
          <span class="faq-q-text">Can I search for a domain for an existing business?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="dng-f4">Yes. Enter your existing business name or related keywords and the tool will suggest available variations, creative alternatives, and different TLD options that still represent your brand clearly. You can also use the "must include" field to lock in a specific word.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="dng-f5">
          <span class="faq-q-text">Is .com always the best extension?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="dng-f5">.com is the most trusted and widely recognised extension globally, and it is usually the best choice for businesses with international ambitions. For Nigerian-focused businesses, .com.ng or .ng can be equally strong. .io is popular for tech startups, and .ai is gaining traction for AI-focused products.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="dng-f6">
          <span class="faq-q-text">Should I register multiple domain extensions?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="dng-f6">Yes — defensively registering your brand name across your key extensions (.com, .ng, .com.ng) is smart and inexpensive. It prevents competitors or squatters from capturing your local traffic and ensures brand consistency across every market you serve.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="dng-f7">
          <span class="faq-q-text">How do domain hacks work?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="dng-f7">A domain hack uses the TLD as part of the word — for example, del.icio.us or bit.ly. They create memorable, compact domains when the extension completes a word or phrase. Our tool flags these as "creative/hack" style results so you can explore them alongside conventional options.</div>
      </div>

    </div>
  </div>
</section>

<div class="toast" id="toast"></div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-domain-name-generator.js')
@endpush
