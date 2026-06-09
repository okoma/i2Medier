@extends('public.layouts.nametool')

@section('title', 'AI Business Name Generator — Free & Instant | i2Medier')

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
data-honeypot-field="{{ \App\Support\Honeypot::fieldName() }}"
data-honeypot-time-field="{{ \App\Support\Honeypot::timeFieldName() }}"
data-honeypot-started-at="{{ \App\Support\Honeypot::startedAt() }}"
@endsection

@section('content')
<nav class="is-dark">
    @include('public.partials.logo', ['mode' => 'light', 'class' => 'logo'])
    @include('public.partials.menu')
    
    <button class="nav-fav-btn" type="button" onclick="toggleFavPanel()">
        <span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 20s-7-4.35-7-10a4 4 0 0 1 7-2.65A4 4 0 0 1 19 10c0 5.65-7 10-7 10z"/></svg></span>
        <span>Saved Names</span>
        <span class="nav-fav-count" id="fav-count">0</span>
    </button>
    <button class="public-nav-toggle" type="button" aria-expanded="false" aria-controls="public-side-nav" aria-label="Open navigation">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

<div class="hero">
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-bubbles" id="hero-bubbles" aria-hidden="true"></div>
    <div class="hero-content">
        <div class="hero-eyebrow"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3l1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8z"/></svg></span><span>AI-Powered Brand Naming</span></div>
        <h1 class="hero-title">Find the perfect name<br>for your <em>next big idea</em></h1>
        <p class="hero-sub">Describe your business and let AI generate creative, memorable names tailored to your industry, tone, and audience — in seconds.</p>

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
                        <div class="pill active" data-val="Nigeria" data-single>Nigeria</div>
                        <div class="pill" data-val="UK" data-single>UK</div>
                        <div class="pill" data-val="USA" data-single>USA</div>
                        <div class="pill" data-val="Global" data-single>Global</div>
                    </div>
                </div>
            </div>

            <button class="gen-btn" id="gen-btn" type="button" onclick="generateNames()">
                <span class="btn-text"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3l1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8z"/></svg></span><span>Generate Business Names</span></span>
                <div class="btn-spinner"></div>
            </button>
        </div>
    </div>
</div>

<div id="loading-section">
    <span class="loading-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3l1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8z"/></svg></span>
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
            <button class="regen-btn" type="button" onclick="generateNames()"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M20 12a8 8 0 1 1-2.34-5.66"/><path d="M20 4v6h-6"/></svg></span><span>Regenerate</span></button>
        </div>
    </div>
    <div class="names-grid" id="names-grid"></div>
</div>

<div class="fav-panel" id="fav-panel">
    <div class="fav-panel-head">
        <h2 class="fph-title"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 20s-7-4.35-7-10a4 4 0 0 1 7-2.65A4 4 0 0 1 19 10c0 5.65-7 10-7 10z"/></svg></span><span>Saved Names</span></h2>
        <button class="fph-clear" type="button" onclick="clearFavs()">Clear All</button>
    </div>
    <div class="fav-grid" id="fav-grid"></div>
</div>

<div class="seo-content">
  <div class="seo-content-inner">

    <div class="seo-section">
      <span class="seo-section-eyebrow">ABOUT THIS TOOL</span>
      <h2>About this free AI business name generator</h2>
      <p>This free business name generator uses AI — powered by ChatGPT, Claude, Mistral, and Gemini — to produce creative, brandable business name ideas from your description in seconds, with no sign-up required. Describe what your business does, pick a style and target market, and this AI business name generator returns a fresh batch of tailored company name ideas every time you run it.</p>
      <p>Unlike a generic company name generator that returns random word combinations, this business name generator analyses your industry, tone preference, keywords, and audience before generating anything. Every business name idea is specific to your brief — not a recycled list of suggestions that have nothing to do with what you actually do.</p>
      <p>Use it to explore startup name ideas, find a brand name for a new product, generate a trading name for a rebrand, or simply shortlist options before committing to one direction. It is a free business name generator that functions like a professional naming session — on demand, at no cost.</p>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">HOW IT WORKS</span>
      <h2>How this AI business name generator creates name ideas</h2>
      <p>The moment you submit your brief, this business name generator analyses your input across six dimensions before returning a single business name suggestion. Here is what shapes every result.</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg></div>
          <div class="cfc-title">Context-First AI Analysis</div>
          <div class="cfc-desc">The AI reads your business description and identifies the core concept, industry signals, and audience fit — building a naming brief before this business name generator produces anything.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg></div>
          <div class="cfc-title">Brand Style Matching</div>
          <div class="cfc-desc">Your chosen brand personality — modern, classic, creative, playful, bold, technical, or elegant — shapes the vocabulary and tone of every business name idea returned.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M5 3a2 2 0 0 0-2 2"/><path d="M19 3a2 2 0 0 1 2 2"/><path d="M21 19a2 2 0 0 1-2 2"/><path d="M5 21a2 2 0 0 1-2-2"/><path d="M9 3h1"/><path d="M9 21h1"/><path d="M14 3h1"/><path d="M14 21h1"/><path d="M3 9v1"/><path d="M21 9v1"/><path d="M3 14v1"/><path d="M21 14v1"/></svg></div>
          <div class="cfc-title">Name Length Control</div>
          <div class="cfc-desc">Choose single-word business names, compound names, or short phrases. This business name generator optimises every suggestion to match your structural preference exactly.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>
          <div class="cfc-title">Market-Aware Naming</div>
          <div class="cfc-desc">A business name for the Nigerian market carries different cultural weight than one for the UK or a global audience. This AI business name generator accounts for your target market in every batch.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M21 2v6h-6"/><path d="M3 12a9 9 0 0 1 15-6.7L21 8"/><path d="M3 22v-6h6"/><path d="M21 12a9 9 0 0 1-15 6.7L3 16"/></svg></div>
          <div class="cfc-title">Fresh Business Name Ideas Every Run</div>
          <div class="cfc-desc">Each generation produces a genuinely new set of business name ideas — no cached results, no recycled suggestions. Regenerate as many times as you need until something clicks.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><line x1="9" y1="18" x2="15" y2="18"/><line x1="10" y1="22" x2="14" y2="22"/><path d="M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 0 1 8.91 14"/></svg></div>
          <div class="cfc-title">Business Name Variations</div>
          <div class="cfc-desc">Save a business name idea you like and use the variations feature to explore alternative spellings, compound forms, prefixes, and domain-friendly extensions of that specific name.</div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">WHAT MAKES A GOOD NAME</span>
      <h2>What to look for in business name ideas from a generator</h2>
      <p>A business name generator can produce hundreds of ideas — but not all of them are worth building a brand around. When reviewing the business name ideas this tool generates, apply these six criteria before shortlisting.</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/></svg></div>
          <div class="cfc-title">Memorable</div>
          <div class="cfc-desc">The best business names stick after a single hearing. When this business name generator returns a name that is short, rhythmic, and easy to repeat — that is a strong signal.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></div>
          <div class="cfc-title">Unique in Your Industry</div>
          <div class="cfc-desc">A business name that stands alone in your sector is a long-term asset. Generic or purely descriptive company name ideas are harder to trademark and easier to confuse with competitors.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>
          <div class="cfc-title">Domain-Friendly</div>
          <div class="cfc-desc">The best business name ideas have clean, available .com or .com.ng equivalents. Check domain availability for every shortlisted name before committing — unusual spellings hurt discoverability.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21H17"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg></div>
          <div class="cfc-title">Trademarkable</div>
          <div class="cfc-desc">A business name you can legally own is more valuable than one already in use. Coined words and invented terms generated by this AI business name generator are typically the easiest to protect.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
          <div class="cfc-title">Easy to Say and Spell</div>
          <div class="cfc-desc">If customers cannot confidently recommend your business name aloud or search for it without guessing the spelling, every referral that happens in conversation is a lost lead.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg></div>
          <div class="cfc-title">Scalable Beyond the Niche</div>
          <div class="cfc-desc">A business name tied too tightly to one product, city, or niche becomes a ceiling as you grow. The best business name ideas from any generator expand with the brand, not against it.</div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">WHY IT MATTERS</span>
      <h2>Why your business name is your most important brand decision</h2>
      <p>Most founders use a business name generator to get ideas quickly and move on. In reality, the business name you choose is the most permanent brand decision you will make — and it shapes almost everything that follows. Take the time to get it right.</p>
      <div class="why-list">
        <div class="why-item">
          <div class="why-num">1</div>
          <div class="why-body">
            <div class="why-body-title">Your business name is your most permanent brand asset</div>
            <div class="why-body-desc">You can change your logo, website, and tagline. Changing your business name after launch is expensive, disruptive, and risks losing every bit of brand equity you have built. Use this business name generator to explore thoroughly before you commit.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">2</div>
          <div class="why-body">
            <div class="why-body-title">Your business name determines your entire digital identity</div>
            <div class="why-body-desc">Your domain, business email, and social handles all flow from your company name. A strong, available business name makes your digital presence coherent from day one — a compromised name fragments it permanently.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">3</div>
          <div class="why-body">
            <div class="why-body-title">Your business name shapes first impressions before you say a word</div>
            <div class="why-body-desc">When someone reads your business name for the first time, they instantly form a judgement about your quality and professionalism. A strong business name creates curiosity; a weak one creates doubt before the conversation starts.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">4</div>
          <div class="why-body">
            <div class="why-body-title">Your business name affects how Google indexes your brand</div>
            <div class="why-body-desc">A business name with clear brand signals and no confusion with competitors performs better in branded search. Generic company names dilute your search identity and send organic traffic to rivals — a problem a good business name generator helps you avoid from the start.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">5</div>
          <div class="why-body">
            <div class="why-body-title">Your business name affects investor and partner perception</div>
            <div class="why-body-desc">Investors and partners make rapid judgements based on branding. A sharp, confident company name signals that a founder has thought seriously about their market — and that clarity matters in every pitch room and partnership conversation.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">COMMON MISTAKES</span>
      <h2>Business naming mistakes to avoid — even when using a name generator</h2>
      <p>A business name generator surfaces ideas fast — but speed can lead to shortcuts. These are the most common business naming mistakes founders make, and the ones most likely to cost time, money, and momentum after launch.</p>
      <div class="issues-feature-grid">
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">Choosing a generic business name</div>
            <div class="ifi-desc">Names like "Swift Solutions" or "Global Tech" describe what you do but say nothing about who you are. Generic company names are impossible to trademark and invisible in branded search results.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">Not checking trademark availability</div>
            <div class="ifi-desc">Using a business name already registered forces a costly rebrand. Always search the CAC, WIPO, and your target market's trademark registry before committing to any name from a business name generator.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">No domain available for the business name</div>
            <div class="ifi-desc">A great business name idea with no matching .com or .com.ng either costs thousands to acquire or forces you onto an obscure extension. Check domain availability before falling in love with any name.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Numbers or hyphens in the company name</div>
            <div class="ifi-desc">Numbers in business names create confusion in verbal communication and email addresses. Hyphens are forgotten in search and often send your traffic to a competitor's cleaner domain version.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Hard to spell or pronounce business name</div>
            <div class="ifi-desc">If your business name requires a spelling lesson every introduction, you lose every referral that happens by phone, in conversation, or from memory. A business name generator can produce unusual spellings — filter them out.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Business name too narrow to scale</div>
            <div class="ifi-desc">A company name locked to one city, one product, or one niche limits growth. When evaluating business name ideas, think about where you want to be in five years, not just today.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">Following a business naming trend</div>
            <div class="ifi-desc">Dropped vowels, random suffixes, and portmanteau names date quickly. What sounds fresh from a business name generator today can sound generic in three years when hundreds of companies copy the same formula.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">Skipping social media handle checks</div>
            <div class="ifi-desc">Inconsistent handles across Instagram, X, LinkedIn, and TikTok fragment your brand identity. Check every platform for your shortlisted business names before registering anything.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">WHO USES THIS TOOL</span>
      <h2>Who uses this business name generator</h2>
      <p>This free business name generator is used by founders, creatives, and marketers at every stage — from first idea to full rebrand. Here are the most common use cases.</p>
      <div class="who-grid">
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg></div>
          <div class="who-title">Startup Founders</div>
          <div class="who-desc">Use this startup name generator before registering their company, buying a domain, or briefing a designer. The right business name idea at the start saves a costly rebrand later.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"/><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"/><path d="M2 7h20"/></svg></div>
          <div class="who-title">Small Business Owners</div>
          <div class="who-desc">Use a small business name generator to rebrand or expand into a new market — finding a company name that fits their new direction without losing the credibility they have already built.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><circle cx="13.5" cy="6.5" r=".5"/><circle cx="17.5" cy="10.5" r=".5"/><circle cx="8.5" cy="7.5" r=".5"/><circle cx="6.5" cy="12.5" r=".5"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg></div>
          <div class="who-title">Brand Designers & Agencies</div>
          <div class="who-desc">Use this business name generator to present multiple naming directions to clients quickly. Generate several conceptual batches in minutes and curate a professional shortlist to present.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></div>
          <div class="who-title">Freelancers & Consultants</div>
          <div class="who-desc">Use a brand name generator to create a personal business identity — distinct, professional, and easy to build a digital presence around — beyond simply using their own name.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg></div>
          <div class="who-title">E-Commerce Sellers</div>
          <div class="who-desc">Use a company name generator when launching a new product line or online store — finding a commercial business name that is clean, searchable, ownable, and ready for domain registration.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 1 1.5 4.5c-2.9 0-4.2-.7-4.9-1.7a5.7 5.7 0 0 1-.8-3.8c2.8-.2 4.2.6 4.2.6V6"/></svg></div>
          <div class="who-title">Side Project Builders</div>
          <div class="who-desc">Test a business idea with a real name before committing fully. A strong business name generated at the idea stage makes the concept feel credible and worth building before a single product exists.</div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">NEXT STEPS</span>
      <h2>What to do after generating business name ideas</h2>
      <p>A business name generator gives you a shortlist to work from — not a final answer. Here is the exact process to validate and secure a business name before building a brand around it.</p>
      <div class="steps-list">
        <div class="step-item">
          <div class="step-num">1</div>
          <div>
            <div class="step-title">Check domain availability for your shortlisted business names</div>
            <div class="step-desc">Search for .com and .com.ng equivalents of your favourite business name ideas right now. Domain availability changes by the hour — a great company name with no matching domain is half a name.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">2</div>
          <div>
            <div class="step-title">Search trademark databases</div>
            <div class="step-desc">In Nigeria, search the Trademarks Registry at the Federal Ministry of Industry, Trade and Investment. For international markets, check WIPO. Do this for every business name idea on your shortlist before committing.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">3</div>
          <div>
            <div class="step-title">Check social media handles for your business name</div>
            <div class="step-desc">Your business name should be consistently available across Instagram, X (Twitter), Facebook, LinkedIn, and TikTok. Fragmented handles erode brand coherence — check every platform before registering anything.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">4</div>
          <div>
            <div class="step-title">Register your business name officially</div>
            <div class="step-desc">In Nigeria, register through the Corporate Affairs Commission (CAC). In the UK, check Companies House. Register your company name before investing in branding — a name conflict after launch is extremely costly to fix.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">5</div>
          <div>
            <div class="step-title">Secure your domain and branded business email</div>
            <div class="step-desc">Once your business name is confirmed, register the domain immediately — even if your website is months away. Set up a branded email address from day one. A @gmail.com address undermines the professionalism your business name creates.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">6</div>
          <div>
            <div class="step-title">Brief a brand designer on your chosen business name</div>
            <div class="step-desc">With your business name confirmed and protected, you are ready to build the visual identity around it. A logo, colour palette, and typography system all flow from the name — now is the right time to brief a designer.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">COMPARE</span>
      <h2>Free business name generator vs hiring a brand strategist</h2>
      <p>Both have their place. Understanding what a free business name generator delivers versus professional naming strategy helps you decide when this tool is enough — and when investing in a brand strategist pays for itself.</p>
      <div class="tools-compare-wrapper">
      <table class="compare-table">
        <thead>
          <tr>
            <th>What's Covered</th>
            <th class="highlight">This Free Business Name Generator</th>
            <th>Brand Strategist</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>AI-generated business name ideas</td>
            <td class="yes">✓ Unlimited batches</td>
            <td class="yes">✓ Curated shortlist</td>
          </tr>
          <tr>
            <td>Industry & style customisation</td>
            <td class="yes">✓ Full control</td>
            <td class="yes">✓ Deep + stakeholder interviews</td>
          </tr>
          <tr>
            <td>Domain availability check</td>
            <td class="partial">External check needed</td>
            <td class="yes">✓ Included in process</td>
          </tr>
          <tr>
            <td>Trademark screening</td>
            <td class="no">—</td>
            <td class="yes">✓ Full clearance search</td>
          </tr>
          <tr>
            <td>Competitor name analysis</td>
            <td class="no">—</td>
            <td class="yes">✓ Full competitive landscape</td>
          </tr>
          <tr>
            <td>Brand story & positioning</td>
            <td class="no">—</td>
            <td class="yes">✓ Full brand narrative</td>
          </tr>
          <tr>
            <td>Logo & visual identity</td>
            <td class="no">—</td>
            <td class="yes">✓ Included in full packages</td>
          </tr>
          <tr>
            <td>Business name variations</td>
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
      <p style="margin-top:1.25rem">Use this free business name generator to explore naming directions, shortlist your best business name ideas, and validate availability. When you need trademark clearance, competitive positioning, brand story, and a full visual identity — that is when a professional naming strategist pays for itself.</p>
    </div>

  </div><!-- /seo-content-inner -->
</div><!-- /seo-content -->

<section class="service-cta">
  <div class="service-cta-eyebrow">✦ &nbsp; i2Medier Brand & Business Services</div>
  <h2>Ready to build the brand<br>around your <em>new name?</em></h2>
  <p>A great name is the foundation. i2Medier helps you register your business, design your visual identity, build your website, set up branded email, and launch your online presence — from name to live brand in one place.</p>
  <div class="service-pills">
    <span class="service-pill">Logo & Brand Identity</span>
    <span class="service-pill">Website Design</span>
    <span class="service-pill">Business Email Setup</span>
    <span class="service-pill">Domain & Hosting</span>
    <span class="service-pill">CAC Business Registration</span>
    <span class="service-pill">Brand Strategy</span>
  </div>
  <div class="cta-buttons">
    <a href="{{ route('site.start') }}" class="cta-btn-primary">Start Your Brand Project →</a>
    <a href="{{ route('site.services') }}" class="cta-btn-secondary">View All Services</a>
  </div>
</section>

<section class="faq-section">
  <div class="faq-inner">
    <div class="faq-header">
      <span class="seo-section-eyebrow">Got Questions?</span>
      <h2>Frequently Asked Questions About the Business Name Generator</h2>
      <p>Everything you need to know about generating, validating, and building a brand around your business name.</p>
    </div>
    <div class="faq-list">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="bng-f1">
          <span class="faq-q-text">How does the business name generator work?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="bng-f1">The tool uses AI — ChatGPT, Claude, Mistral, and Gemini — to generate creative, brandable name ideas based on your business description, industry keywords, preferred naming style, length preference, and target market. Each generation produces a unique batch tailored entirely to your input.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="bng-f2">
          <span class="faq-q-text">Are the generated names trademark safe?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="bng-f2">Generated names are creative suggestions only. Always search trademark databases and company registries in your country before using any name commercially. In Nigeria, check the CAC and the Trademarks Registry. The tool does not perform trademark or availability checks.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="bng-f3">
          <span class="faq-q-text">Can I generate names for any industry?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="bng-f3">Yes. The tool works across any industry including technology, retail, professional services, food and beverage, fashion, healthcare, finance, logistics, and more. The more specific your description, the more relevant and distinctive the results.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="bng-f4">
          <span class="faq-q-text">How many names can I generate?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="bng-f4">You can generate as many rounds as you need and save your favourites across all sessions. Each round delivers a fresh, unique set of ideas — you are never limited to a single batch or forced to repeat the same results.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="bng-f5">
          <span class="faq-q-text">Can I get variations of a name I like?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="bng-f5">Yes. Save any name you like and click the variations button to explore alternative spellings, compound forms, prefixes, suffixes, and domain-friendly extensions of that specific idea.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="bng-f6">
          <span class="faq-q-text">What is the difference between a business name and a brand name?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="bng-f6">Your business name is the legal entity registered with the CAC or Companies House. Your brand name is what customers recognise and connect with emotionally. They are often the same, but not always — some companies operate trading names that differ from their registered legal name.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="bng-f7">
          <span class="faq-q-text">How do I know if a name is available to register in Nigeria?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="bng-f7">Search the Corporate Affairs Commission (CAC) portal at search.cac.gov.ng to check if your chosen business name is already registered. You should also search the Trademarks Registry and check domain and social media handle availability before committing to any name.</div>
      </div>

    </div>
  </div>
</section>

<div class="toast" id="toast"></div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-business-name-generator.js')
@endpush
