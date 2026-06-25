@extends('public.layouts.app')

@section('title', 'About i2Medier — Digital Agency')

@push('meta')
<meta name="description" content="i2Medier is a premium digital agency based in Port Harcourt, Nigeria. We design, build, and maintain world-class digital products for businesses across Africa, the UK, and worldwide."/>
<link rel="canonical" href="{{ url('/about') }}"/>
@endpush
@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'About', 'item' => route('site.about')],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => 'i2Medier',
    'url' => url('/'),
    'logo' => url('/images/logo.png'),
    'description' => 'i2Medier is a premium digital agency based in Port Harcourt, Nigeria. We design, build, and maintain world-class digital products for businesses across Africa, the UK, and worldwide.',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => '18 Emmanuel Close, NTA Mgbuoba',
        'addressLocality' => 'Port Harcourt',
        'addressRegion' => 'Rivers State',
        'addressCountry' => 'NG',
    ],
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'telephone' => '+2348052188396',
        'contactType' => 'customer service',
        'availableLanguage' => 'English',
    ],
    'sameAs' => [
        'https://facebook.com/i2medier',
        'https://twitter.com/i2medier',
        'https://www.instagram.com/i2medier',
        'https://www.linkedin.com/company/i2medier',
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush


@push('page_css')
    @vite('resources/css/public/fonts.css')
    @vite('resources/css/public/pages/about.css')
@endpush

@push('scripts')
    @vite('resources/js/public/pages/about.js')
@endpush

@section('content')
@php
    $aboutIcon = static function (string $name, string $class = ''): string {
        $classAttr = $class !== '' ? ' class="' . e($class) . '"' : '';

        return match ($name) {
            'globe' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M3.5 9h17M3.5 15h17M12 3c2.7 2.5 4.2 5.6 4.2 9S14.7 18.5 12 21c-2.7-2.5-4.2-5.6-4.2-9S9.3 5.5 12 3Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'bank' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 9.5 12 4l9 5.5v1.5H3V9.5ZM5 11v7m4-7v7m4-7v7m4-7v7M3 20h18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'legal' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 4v15M8 7h8M7 19h10M6.5 10 4 14h5l-2.5-4ZM20 14h-5l2.5-4L20 14Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'health' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="5" y="5" width="14" height="14" rx="3" stroke="currentColor" stroke-width="1.8"/><path d="M12 8.2v7.6M8.2 12h7.6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
            'cart' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 6h2l1.6 7.2a1 1 0 0 0 1 .8h7.8a1 1 0 0 0 1-.7L19 8H7.2M10 18.5a1.25 1.25 0 1 1-2.5 0 1.25 1.25 0 0 1 2.5 0Zm7 0a1.25 1.25 0 1 1-2.5 0 1.25 1.25 0 0 1 2.5 0Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'box' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Zm0 0v18m8-13.5-8 4.5-8-4.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'education' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m3 9 9-4 9 4-9 4-9-4Zm3 2.5v4.2c0 .8 2.7 2.3 6 2.3s6-1.5 6-2.3v-4.2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'building' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6 20V6a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14M4 20h16M9 8h2m-2 3h2m-2 3h2m5-4h2m-2 3h2m-2 3h2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
            'star' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m12 4 2.4 4.9 5.4.8-3.9 3.8.9 5.5-4.8-2.6-4.8 2.6.9-5.5-3.9-3.8 5.4-.8L12 4Z" fill="currentColor"/></svg>',
            'trophy' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8 4h8v3a4 4 0 0 1-8 0V4Zm0 1H5v1a3 3 0 0 0 3 3m8-4h3v1a3 3 0 0 1-3 3m-4 2v4m-3 4h6M8 19h8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'bulb' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 17h6M10 20h4M8.7 14.3A5.5 5.5 0 1 1 15.3 14.3c-.7.7-1.1 1.6-1.3 2.7h-4c-.2-1.1-.6-2-1.3-2.7Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'bolt' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M13 3 6 13h5l-1 8 7-10h-5l1-8Z" fill="currentColor"/></svg>',
            'handshake' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 8 6.8 10.2a2 2 0 0 0 2.8 2.8l2.2-2.2m1.2-1.2 1.4-1.4a2.5 2.5 0 0 1 3.5 0L21 10.3l-3.2 3.2a2 2 0 0 1-2.8 0l-1.2-1.2m-2 2 2.7 2.7a2 2 0 0 0 2.8 0l3.2-3.2M3 9.8l2.6-2.6a2.5 2.5 0 0 1 3.5 0l2 2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'linkedin' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 10v7M7 7.2a.75.75 0 1 1 0 1.5.75.75 0 0 1 0-1.5ZM11 17v-4a2 2 0 0 1 4 0v4m-8 0h10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'x' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m5 5 14 14M19 5 5 19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
            'github' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M9 18c-4 1.2-4-2-6-2m12 4v-3.1a2.7 2.7 0 0 0-.8-2.1c2.7-.3 5.6-1.3 5.6-5.9A4.6 4.6 0 0 0 18.6 6 4.2 4.2 0 0 0 18.5 3S17.4 2.7 15 4.3a11.2 11.2 0 0 0-6 0C6.6 2.7 5.5 3 5.5 3A4.2 4.2 0 0 0 5.4 6a4.6 4.6 0 0 0-1.2 2.9c0 4.6 2.9 5.6 5.6 5.9a2.7 2.7 0 0 0-.8 2.1V20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'dribbble' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M8 5.2c3.8 4.3 5.8 8.8 6.9 15.3M4 11.4c4-.6 9.2-.4 15.5 1.2M18.9 7.4c-3.4 1.8-7 2.7-11.4 2.8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>',
            'fork-knife' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 4v6M5 4v6M7 7H5m1 3v10M15 4v7m0 0c1.7 0 3-1.3 3-3V4m-3 7v9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'home' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m4 11 8-6 8 6M7 10.5V19h10v-8.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'play' => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m9 7 8 5-8 5V7Z" fill="currentColor"/><rect x="4" y="4" width="16" height="16" rx="4" stroke="currentColor" stroke-width="1.8"/></svg>',
            default => '<svg' . $classAttr . ' viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/></svg>',
        };
    };

    $teamMembers = $teamMembers ?? collect();
    $teamContent = $teamContent ?? [
        'eyebrow' => 'The People',
        'heading' => 'Small team.<br>Serious craft.',
        'intro' => 'We are deliberately small. A focused team means every client gets senior attention — not a junior handed their project and told to run with it. Every person on the i2Medier team works directly on client projects.',
    ];
@endphp
<div class="about-page">
    <header class="hero">
        <div class="hero-grid-lines" aria-hidden="true"></div>
        <div class="hero-left">
            <div class="hero-eyebrow"><span class="hero-dot"></span> About i2Medier</div>
            <h1 style="animation:fadeUp .9s .1s var(--ease) both">Nigerian craft.<br>Global <em>standards.</em><br>Real results.</h1>
            <p class="hero-sub">We are i2Medier — a premium digital agency born in Port Harcourt, Nigeria and built to help businesses everywhere compete at the highest level through exceptional digital products.</p>
            <div class="hero-actions">
                <a href="{{ route('site.contact') }}" class="btn-gold">Work With Us →</a>
                <a href="{{ route('portfolio.index') }}" class="btn-ghost">See Our Work</a>
            </div>
        </div>
        <div class="hero-right">
            <div class="hero-visual">
                <div class="hv-card hv-card-1">
                    <div class="hvc-pill-val">200+ Projects</div>
                    <div class="hvc-pill-sub">Delivered & live</div>
                </div>
                <div class="hv-center">
                    <div class="hvc-logo">i2Medi<span>er</span></div>
                    <span class="hvc-tag">Digital Agency · Est. 2018</span>
                    <div style="font-size:.78rem;color:rgba(255,255,255,.35);line-height:1.65;margin-bottom:1rem">Design · Development · Strategy · Maintenance</div>
                    <div class="hvc-divider"></div>
                    <div class="hvc-facts">
                        <div class="hvc-fact"><div class="hvc-fact-num"><span class="counter" data-target="8">0</span>+</div><div class="hvc-fact-label">Years Active</div></div>
                        <div class="hvc-fact"><div class="hvc-fact-num"><span class="counter" data-target="120">0</span>+</div><div class="hvc-fact-label">Care Plans</div></div>
                        <div class="hvc-fact"><div class="hvc-fact-num"><span class="counter" data-target="99">0</span>%</div><div class="hvc-fact-label">Retention Rate</div></div>
                        <div class="hvc-fact"><div class="hvc-fact-num"><span style="color:var(--gold)">24hr</span></div><div class="hvc-fact-label">Response SLA</div></div>
                    </div>
                    <div class="hvc-divider"></div>
                    <div class="hv-countries">
                        <span class="hv-country">{!! $aboutIcon('globe', 'hv-country-icon') !!} Nigeria</span>
                        <span class="hv-country">{!! $aboutIcon('globe', 'hv-country-icon') !!} UK</span>
                        <span class="hv-country">{!! $aboutIcon('globe', 'hv-country-icon') !!} USA</span>
                        <span class="hv-country">{!! $aboutIcon('globe', 'hv-country-icon') !!} Canada</span>
                    </div>
                </div>
                <div class="hv-card hv-card-2">
                    <div class="hvc-pill-val">{!! $aboutIcon('star', 'hvc-pill-icon') !!}<span>99% Retention</span></div>
                    <div class="hvc-pill-sub">Across all clients</div>
                </div>
            </div>
        </div>
    </header>

    <div class="stats-band">
        <div class="stats-inner">
            <div class="stat-item reveal">
                <div class="stat-num"><span class="counter" data-target="200">0</span><span>+</span></div>
                <div class="stat-label">Projects Delivered</div>
                <div class="stat-sub">Web, mobile, and digital products shipped across 4 countries</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-num"><span class="counter" data-target="8">0</span><span style="color:var(--gold)">+ yrs</span></div>
                <div class="stat-label">In Business</div>
                <div class="stat-sub">Building and growing since 2018, through every market condition</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-num"><span class="counter" data-target="120">0</span><span>+</span></div>
                <div class="stat-label">Active Care Plans</div>
                <div class="stat-sub">Client sites actively maintained, secured, and monitored every day</div>
            </div>
            <div class="stat-item reveal">
                <div class="stat-num"><span style="color:var(--gold)">99</span><span>%</span></div>
                <div class="stat-label">Client Retention</div>
                <div class="stat-sub">The number we're most proud of — most clients return for their next project</div>
            </div>
        </div>
    </div>

    <section style="padding:96px 5%;background:var(--white)">
        <div style="max-width:1300px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:6rem;align-items:center">
            <div class="reveal">
                <span class="s-eyebrow">Our Story</span>
                <h2 class="s-title">Built from <em>ambition,</em><br>shaped by craft</h2>
                <div class="s-body">
                    <p>i2Medier was founded in 2018 in Port Harcourt, Rivers State, with a single conviction: that <strong>businesses in Nigeria deserve digital products as good as anything built anywhere in the world.</strong> Not adapted templates, not second-tier solutions — genuinely world-class work.</p>
                    <p>We started as a small web design studio, taking on brochure sites and WordPress builds for local businesses. Early on, we made a deliberate choice that still defines us today: <strong>we would do less, but do it better.</strong> No stretched capabilities, no subcontracted surprises — everything in-house, to a standard we'd be proud to put our name on.</p>
                    <p>That discipline compounded. Clients referred us to other clients. Small projects led to larger ones. A brochure site for a Port Harcourt law firm led to a Laravel platform for a Lagos fintech. A WordPress redesign for a Nigerian retailer led to e-commerce work for UK clients. By 2022, we were serving businesses across Nigeria, the UK, the US, and Canada.</p>
                    <p>Today, i2Medier is a full-service digital agency with a focused team, a healthy client base, and an unshakeable commitment to the work being <strong>genuinely excellent</strong> — not just good enough.</p>
                </div>
            </div>
            <div class="reveal" style="position:relative">
                <div class="story-badge">Est. 2018 · Port Harcourt</div>
                <div class="story-visual">
                    <div class="sv-grid-lines" aria-hidden="true"></div>
                    <div class="sv-quote">"We are not here to be the biggest agency. We are here to be the one clients are glad they found."</div>
                    <div class="sv-attr">— <strong>Chidi Emmanuel</strong>, Founder & CEO, i2Medier</div>
                        <div style="margin-top:1.5rem;padding-top:1.25rem;border-top:1px solid rgba(255,255,255,.07)">
                        <div style="font-size:.6rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:rgba(255,255,255,.25);margin-bottom:.75rem">Trusted by businesses in</div>
                        <div style="display:flex;flex-wrap:wrap;gap:.4rem">
                            <span style="font-size:.7rem;font-weight:600;color:rgba(255,255,255,.4);background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);padding:.22rem .6rem;border-radius:3px;display:inline-flex;align-items:center;gap:.35rem">{!! $aboutIcon('bank', 'about-tag-icon') !!} Fintech</span>
                            <span style="font-size:.7rem;font-weight:600;color:rgba(255,255,255,.4);background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);padding:.22rem .6rem;border-radius:3px;display:inline-flex;align-items:center;gap:.35rem">{!! $aboutIcon('legal', 'about-tag-icon') !!} Legal</span>
                            <span style="font-size:.7rem;font-weight:600;color:rgba(255,255,255,.4);background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);padding:.22rem .6rem;border-radius:3px;display:inline-flex;align-items:center;gap:.35rem">{!! $aboutIcon('health', 'about-tag-icon') !!} Healthcare</span>
                            <span style="font-size:.7rem;font-weight:600;color:rgba(255,255,255,.4);background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);padding:.22rem .6rem;border-radius:3px;display:inline-flex;align-items:center;gap:.35rem">{!! $aboutIcon('cart', 'about-tag-icon') !!} E-Commerce</span>
                            <span style="font-size:.7rem;font-weight:600;color:rgba(255,255,255,.4);background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);padding:.22rem .6rem;border-radius:3px;display:inline-flex;align-items:center;gap:.35rem">{!! $aboutIcon('box', 'about-tag-icon') !!} Logistics</span>
                            <span style="font-size:.7rem;font-weight:600;color:rgba(255,255,255,.4);background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);padding:.22rem .6rem;border-radius:3px;display:inline-flex;align-items:center;gap:.35rem">{!! $aboutIcon('education', 'about-tag-icon') !!} Education</span>
                            <span style="font-size:.7rem;font-weight:600;color:rgba(255,255,255,.4);background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.08);padding:.22rem .6rem;border-radius:3px;display:inline-flex;align-items:center;gap:.35rem">{!! $aboutIcon('building', 'about-tag-icon') !!} Professional Services</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="values-section" aria-labelledby="values-heading">
        <div class="values-header reveal">
            <div>
                <span style="font-size:.68rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);display:block;margin-bottom:.65rem">What We Stand For</span>
                <h2 id="values-heading" style="font-family:var(--serif);font-size:clamp(1.9rem,3vw,2.8rem);font-weight:700;color:var(--white);letter-spacing:-.04em;line-height:1.1">Four principles we<br>refuse to compromise</h2>
            </div>
            <p>Our values are not a marketing exercise. They are the actual rules we apply to every decision we make — about which projects to take, how we build, and how we treat the people we work with.</p>
        </div>
        <div class="values-grid">
            <div class="value-card reveal">
                <div class="vc-number">01</div>
                <span class="vc-icon">{!! $aboutIcon('trophy') !!}</span>
                <h3 class="vc-title">Craft over commodity</h3>
                <p class="vc-body">We do not sell templates dressed up as custom work. Every project we take on is built with genuine care — from the first wireframe to the last line of code. We are slower and more expensive than a developer with a website builder. We are also significantly better.</p>
                <div class="vc-rule">→ "If we wouldn't be proud to put our name on it, we don't ship it."</div>
            </div>
            <div class="value-card reveal">
                <div class="vc-number">02</div>
                <span class="vc-icon">{!! $aboutIcon('bulb') !!}</span>
                <h3 class="vc-title">Clarity over cleverness</h3>
                <p class="vc-body">The smartest solution is rarely the most complicated one. We resist the temptation to over-engineer, over-design, or over-explain. A user should never need to think about how to use something we built. If they do, we redesign it.</p>
                <div class="vc-rule">→ "Complexity is easy. Clarity takes real skill."</div>
            </div>
            <div class="value-card reveal">
                <div class="vc-number">03</div>
                <span class="vc-icon">{!! $aboutIcon('bolt') !!}</span>
                <h3 class="vc-title">Proactive over reactive</h3>
                <p class="vc-body">We do not wait for clients to discover problems. We run security scans before attackers find anything. We update dependencies before vulnerabilities become exploits. We tell clients when something should change before it breaks. This is why our maintenance clients almost never call us in a panic.</p>
                <div class="vc-rule">→ "The best emergency is the one that never happens."</div>
            </div>
            <div class="value-card reveal">
                <div class="vc-number">04</div>
                <span class="vc-icon">{!! $aboutIcon('handshake') !!}</span>
                <h3 class="vc-title">Long-term over transactional</h3>
                <p class="vc-body">We do not optimise for the invoice. We optimise for the relationship. When a client comes back for their third project, it means we did the first two well. Our 99% retention rate is not an accident — it is the natural outcome of treating every client like they are the most important one. Because to us, they are.</p>
                <div class="vc-rule">→ "The best clients are the ones who never need to look for another agency."</div>
            </div>
        </div>
    </section>

    <div class="manifesto-band">
        <p class="manifesto-text">"We believe African businesses deserve digital products that don't just function — they <em>impress.</em> Products that compete with the world's best. Products that make clients proud. That is what we build. That is all we build."</p>
        <div class="manifesto-attr">— The i2Medier Manifesto, Port Harcourt, 2018</div>
    </div>

    <section class="team-section" aria-labelledby="team-heading">
        <div class="team-header">
            <div class="reveal">
                <span style="font-size:.68rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);display:block;margin-bottom:.65rem">{{ $teamContent['eyebrow'] }}</span>
                <h2 id="team-heading" style="font-family:var(--serif);font-size:clamp(1.9rem,3vw,2.8rem);font-weight:700;letter-spacing:-.04em;line-height:1.1">{!! $teamContent['heading'] !!}</h2>
            </div>
            <p class="reveal">{{ $teamContent['intro'] }}</p>
        </div>
        <div class="team-grid">
            @foreach ($teamMembers as $member)
                <div class="team-card reveal">
                    <div class="tc-banner {{ $member->bannerClass() }}">
                        @if ($member->photoUrl())
                            <div class="tc-avatar tc-avatar-photo">
                                <img src="{{ $member->photoUrl() }}" alt="{{ $member->name }}">
                            </div>
                        @else
                            <div class="tc-avatar" style="background:{{ $member->avatarGradient() }}">{{ $member->initials }}</div>
                        @endif
                    </div>
                    <div class="tc-body">
                        <div class="tc-name">{{ $member->name }}</div>
                        <div class="tc-role">{{ $member->role }}</div>
                        <p class="tc-bio">{{ $member->bio }}</p>
                        @if ($member->socials() !== [])
                            <div class="tc-socials">
                                @foreach ($member->socials() as $social)
                                    <a href="{{ $social['url'] }}" class="tc-social" title="{{ $social['label'] }}" aria-label="{{ $social['label'] }}" @if ($social['url'] !== '#') target="_blank" rel="noopener noreferrer" @endif>{!! $aboutIcon($social['platform']) !!}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div style="max-width:1300px;margin:2rem auto 0;background:var(--black);border-radius:10px;padding:1.75rem 2rem;display:flex;align-items:center;justify-content:space-between;gap:2rem;flex-wrap:wrap">
            <div>
                <div style="font-family:var(--serif);font-size:1.05rem;font-weight:700;color:var(--white);margin-bottom:.3rem">We're always looking for exceptional people</div>
                <div style="font-size:.82rem;color:rgba(255,255,255,.4);line-height:1.6">If you're a designer, developer, or project manager who cares deeply about craft, we want to hear from you — even if we're not actively hiring.</div>
            </div>
            <a href="mailto:careers@i2medier.com" style="background:var(--gold);color:var(--black);padding:.78rem 1.75rem;border-radius:5px;font-weight:700;font-size:.875rem;text-decoration:none;white-space:nowrap;flex-shrink:0;transition:opacity .2s" onmouseover="this.style.opacity='.88'" onmouseout="this.style.opacity='1'">See Open Roles →</a>
        </div>
    </section>

    <section class="timeline-section" aria-labelledby="timeline-heading">
        <div class="timeline-header reveal">
            <div>
                <span style="font-size:.68rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);display:block;margin-bottom:.65rem">Our Journey</span>
                <h2 id="timeline-heading" style="font-family:var(--serif);font-size:clamp(1.8rem,2.8vw,2.6rem);font-weight:700;letter-spacing:-.04em;line-height:1.1">Eight years of<br>building things that last</h2>
            </div>
            <p>From a one-person studio in Port Harcourt to a team serving clients on three continents — every milestone here was earned through the quality of the work, not through advertising spend.</p>
        </div>

        <div class="timeline-wrap">
            <div class="timeline-entry reveal">
                <div class="te-left">
                    <div class="te-title">Founded in Port Harcourt</div>
                    <p class="te-body">i2Medier launched as a freelance web design practice, taking on small WordPress projects for local businesses in Rivers State.</p>
                    <span class="te-tag milestone">Founding</span>
                </div>
                <div class="te-center"><div class="te-dot gold"></div><div class="te-year">2018</div></div>
                <div class="te-right"></div>
            </div>
            <div class="timeline-entry reveal">
                <div class="te-left"></div>
                <div class="te-center"><div class="te-dot gold"></div><div class="te-year">2019</div></div>
                <div class="te-right">
                    <div class="te-title">First 50 Clients — Studio Established</div>
                    <p class="te-body">Crossed 50 client projects, hired first full-time designer, and formalised as i2Medier Konceptz Ltd. Introduced monthly maintenance plans for the first time.</p>
                    <span class="te-tag growth">Growth</span>
                </div>
            </div>
            <div class="timeline-entry reveal">
                <div class="te-left">
                    <div class="te-title">Through COVID — Remote First</div>
                    <p class="te-body">Navigated the pandemic by going fully remote, accelerating digital adoption among Nigerian SME clients. Project volume actually grew 40% as businesses urgently needed web presence.</p>
                    <span class="te-tag milestone">Resilience</span>
                </div>
                <div class="te-center"><div class="te-dot gold"></div><div class="te-year">2020</div></div>
                <div class="te-right"></div>
            </div>
            <div class="timeline-entry reveal">
                <div class="te-left"></div>
                <div class="te-center"><div class="te-dot gold"></div><div class="te-year">2021</div></div>
                <div class="te-right">
                    <div class="te-title">First International Clients — UK & USA</div>
                    <p class="te-body">Secured first clients in the United Kingdom and United States through diaspora referrals. Proved that the quality of Nigerian digital work could compete on any international stage.</p>
                    <span class="te-tag launch">International</span>
                </div>
            </div>
            <div class="timeline-entry reveal">
                <div class="te-left">
                    <div class="te-title">Laravel Practice Launched</div>
                    <p class="te-body">Formalised a dedicated web application development practice using Laravel, serving fintech, logistics, and SaaS clients. Team grew to six full-time members.</p>
                    <span class="te-tag growth">Expansion</span>
                </div>
                <div class="te-center"><div class="te-dot gold"></div><div class="te-year">2022</div></div>
                <div class="te-right"></div>
            </div>
            <div class="timeline-entry reveal">
                <div class="te-left"></div>
                <div class="te-center"><div class="te-dot gold"></div><div class="te-year">2023</div></div>
                <div class="te-right">
                    <div class="te-title">150+ Projects Delivered</div>
                    <p class="te-body">Reached 150 completed projects. Expanded the maintenance care plan programme to 80+ active clients. Introduced structured design system deliverables for all UI/UX engagements.</p>
                    <span class="te-tag milestone">Milestone</span>
                </div>
            </div>
            <div class="timeline-entry reveal">
                <div class="te-left">
                    <div class="te-title">Digital Tools Suite Launched</div>
                    <p class="te-body">Released public-facing tools including SEO Audit, Business Name Generator, Domain Name Generator, Invoice Generator, Website Brief Generator, and Cost Calculator — serving thousands of Nigerian businesses monthly.</p>
                    <span class="te-tag launch">Launch</span>
                </div>
                <div class="te-center"><div class="te-dot gold"></div><div class="te-year">2024</div></div>
                <div class="te-right"></div>
            </div>
            <div class="timeline-entry reveal">
                <div class="te-left"></div>
                <div class="te-center"><div class="te-dot gold" style="background:var(--gold);box-shadow:0 0 0 4px rgba(200,169,110,.2)"></div><div class="te-year">2025–26</div></div>
                <div class="te-right">
                    <div class="te-title">200+ Projects · 4 Countries · Growing</div>
                    <p class="te-body">Over 200 projects delivered across Nigeria, the UK, the US, and Canada. 120+ active monthly care plans. And the same focus on craft that started it all — still building things we're proud to put our name on.</p>
                    <span class="te-tag milestone">Today</span>
                </div>
            </div>
        </div>
    </section>

    <section class="approach-section" aria-labelledby="approach-heading">
        <div class="approach-header">
            <div class="reveal">
                <span style="font-size:.68rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);display:block;margin-bottom:.65rem">How We Work</span>
                <h2 id="approach-heading" style="font-family:var(--serif);font-size:clamp(1.9rem,3vw,2.8rem);font-weight:700;color:var(--white);letter-spacing:-.04em;line-height:1.1">Rigorous process.<br>Honest communication.<br>No surprises.</h2>
            </div>
            <p class="reveal">Every engagement follows the same disciplined approach — regardless of project size. This consistency is what lets us deliver reliably, at quality, every time.</p>
        </div>
        <div class="approach-grid">
            <div class="approach-card reveal">
                <div class="ac-num">01 — DISCOVER</div>
                <h3 class="ac-title">We ask before we assume</h3>
                <p class="ac-body">Every project starts with discovery — a structured process of asking the right questions before we design or build anything. We document goals, constraints, audience needs, and success criteria. A project brief is produced and signed off before a single pixel or line of code exists.</p>
            </div>
            <div class="approach-card reveal">
                <div class="ac-num">02 — DESIGN</div>
                <h3 class="ac-title">Research informs everything</h3>
                <p class="ac-body">We wireframe before we design. We design before we develop. We solve structural problems in wireframes where changes are free — not in code where changes are expensive. All designs are shared in Figma with view access for clients from day one. Nothing is a surprise.</p>
            </div>
            <div class="approach-card reveal">
                <div class="ac-num">03 — BUILD</div>
                <h3 class="ac-title">Test on staging, ship to live</h3>
                <p class="ac-body">Every change — whether a plugin update or a complete redevelopment — is tested on a staging environment before it touches the live site. We work in weekly sprints with regular progress updates. We never disappear for three weeks and reappear with something unexpected.</p>
            </div>
            <div class="approach-card reveal">
                <div class="ac-num">04 — DELIVER</div>
                <h3 class="ac-title">Handoff is part of the work</h3>
                <p class="ac-body">We don't consider a project finished when we deploy. We conduct a structured handoff session with every client — walking through what was built, how to use it, and what to do if something goes wrong. Documentation is provided. For maintenance clients, monitoring begins before launch day.</p>
            </div>
            <div class="approach-card reveal">
                <div class="ac-num">05 — MAINTAIN</div>
                <h3 class="ac-title">We stay after the party</h3>
                <p class="ac-body">The majority of digital agencies disappear after launch. We don't. Our care plan programme keeps us actively involved in clients' sites every week — running updates, backups, security scans, and performance checks. We are invested in the long-term health of what we build.</p>
            </div>
            <div class="approach-card reveal">
                <div class="ac-num">06 — COMMUNICATE</div>
                <h3 class="ac-title">No jargon. No ghosting.</h3>
                <p class="ac-body">We reply to messages within 24 hours on business days — typically within 4. We explain technical decisions in plain language. We give honest timelines rather than the ones clients want to hear. And when something goes wrong, we tell you before you find out yourself.</p>
            </div>
        </div>
    </section>

    <section class="industries-section" aria-labelledby="industries-heading">
        <div class="industries-header reveal">
            <div>
                <span style="font-size:.68rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);display:block;margin-bottom:.65rem">Industries We Serve</span>
                <h2 id="industries-heading" style="font-family:var(--serif);font-size:clamp(1.8rem,2.8vw,2.6rem);font-weight:700;letter-spacing:-.04em;line-height:1.1">Built for every<br>serious business</h2>
            </div>
            <p>We work across a wide range of industries. Our job is to understand your specific context, constraints, and users — and build digital products that work for your exact situation, not a generic template of it.</p>
        </div>
        <div class="industries-grid">
            <div class="industry-item reveal"><div class="ii-icon">{!! $aboutIcon('bank') !!}</div><div class="ii-name">Fintech & Finance</div><div class="ii-desc">Payment platforms, banking dashboards, financial portals</div></div>
            <div class="industry-item reveal"><div class="ii-icon">{!! $aboutIcon('legal') !!}</div><div class="ii-name">Legal & Professional</div><div class="ii-desc">Law firm sites, client portals, document management</div></div>
            <div class="industry-item reveal"><div class="ii-icon">{!! $aboutIcon('health') !!}</div><div class="ii-name">Healthcare & Medical</div><div class="ii-desc">Clinic websites, appointment booking, patient portals</div></div>
            <div class="industry-item reveal"><div class="ii-icon">{!! $aboutIcon('cart') !!}</div><div class="ii-name">E-Commerce & Retail</div><div class="ii-desc">WooCommerce stores, product catalogues, checkout flows</div></div>
            <div class="industry-item reveal"><div class="ii-icon">{!! $aboutIcon('box') !!}</div><div class="ii-name">Logistics & Transport</div><div class="ii-desc">Tracking platforms, fleet management, delivery dashboards</div></div>
            <div class="industry-item reveal"><div class="ii-icon">{!! $aboutIcon('education') !!}</div><div class="ii-name">Education & Training</div><div class="ii-desc">School sites, LMS platforms, course marketplaces</div></div>
            <div class="industry-item reveal"><div class="ii-icon">{!! $aboutIcon('building') !!}</div><div class="ii-name">Corporate & Enterprise</div><div class="ii-desc">Multi-branch sites, intranets, employee portals</div></div>
            <div class="industry-item reveal"><div class="ii-icon">{!! $aboutIcon('handshake') !!}</div><div class="ii-name">NGO & Non-Profit</div><div class="ii-desc">Charity sites, donation platforms, impact reporting</div></div>
            <div class="industry-item reveal"><div class="ii-icon">{!! $aboutIcon('fork-knife') !!}</div><div class="ii-name">Food & Hospitality</div><div class="ii-desc">Restaurant sites, menu systems, reservation booking</div></div>
            <div class="industry-item reveal"><div class="ii-icon">{!! $aboutIcon('home') !!}</div><div class="ii-name">Real Estate & Property</div><div class="ii-desc">Property listings, agent portals, virtual tours</div></div>
            <div class="industry-item reveal"><div class="ii-icon">{!! $aboutIcon('play') !!}</div><div class="ii-name">Media & Creative</div><div class="ii-desc">Portfolio sites, streaming platforms, agency websites</div></div>
            <div class="industry-item reveal"><div class="ii-icon">{!! $aboutIcon('bolt') !!}</div><div class="ii-name">Energy & Utilities</div><div class="ii-desc">Energy company sites, customer portals, reporting dashboards</div></div>
        </div>
    </section>

    <section class="cta-band" id="contact" aria-labelledby="cta-h">
        <h2 id="cta-h">Ready to build something<br>you'll be proud of?</h2>
        <p>Every great digital product starts with a conversation. Tell us what you're building and we'll tell you exactly how we can help — within 24 hours, no commitment required.</p>
        <div class="cta-actions">
            <a href="{{ route('site.contact') }}" class="btn-dark">Start a Conversation →</a>
            <a href="{{ route('portfolio.index') }}" class="btn-outline-dark">See Our Portfolio</a>
        </div>
    </section>
</div>
@endsection
