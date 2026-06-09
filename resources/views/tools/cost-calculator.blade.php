@extends('public.layouts.nametool')

@section('title', 'Free Website Cost Calculator — Real-Time Pricing | i2Medier')

@section('body_attrs')
id="website-cost-calculator-page"
data-start-route="{{ route('site.start') }}"
data-print-route="{{ route('tools.cost-calculator.print') }}"
@endsection

@push('page_css')
    @vite('resources/css/public/pages/website-cost-calculator.css')
@endpush

@section('content')
<svg aria-hidden="true" class="ui-icon-sprite">
    <symbol id="icon-refresh" viewBox="0 0 24 24"><path d="M20 11a8 8 0 1 0 2.1 5.4"/><path d="M20 4v7h-7"/></symbol>
    <symbol id="icon-arrow-right" viewBox="0 0 24 24"><path d="M5 12h14"/><path d="m13 5 7 7-7 7"/></symbol>
    <symbol id="icon-download" viewBox="0 0 24 24"><path d="M12 3v12"/><path d="m7 10 5 5 5-5"/><path d="M5 21h14"/></symbol>
    <symbol id="icon-coins" viewBox="0 0 24 24"><ellipse cx="12" cy="6" rx="7" ry="3.5"/><path d="M5 6v6c0 1.9 3.1 3.5 7 3.5s7-1.6 7-3.5V6"/><path d="M5 12v6c0 1.9 3.1 3.5 7 3.5s7-1.6 7-3.5v-6"/></symbol>
    <symbol id="icon-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3a15 15 0 0 1 0 18"/><path d="M12 3a15 15 0 0 0 0 18"/></symbol>
    <symbol id="icon-file" viewBox="0 0 24 24"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/><path d="M14 3v5h5"/><path d="M9 13h6"/><path d="M9 17h6"/></symbol>
    <symbol id="icon-building" viewBox="0 0 24 24"><path d="M4 21V7l8-4 8 4v14"/><path d="M9 21v-4h6v4"/><path d="M8 10h.01"/><path d="M12 10h.01"/><path d="M16 10h.01"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/></symbol>
    <symbol id="icon-cart" viewBox="0 0 24 24"><circle cx="9" cy="20" r="1"/><circle cx="18" cy="20" r="1"/><path d="M3 4h2l2.4 10.2a1 1 0 0 0 1 .8h9.8a1 1 0 0 0 1-.8L21 7H7"/></symbol>
    <symbol id="icon-cog" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3.2"/><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1a2 2 0 0 1 0 2.8l-.1.1a2 2 0 0 1-2.8 0l-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 0 1-2 2h-.2a2 2 0 0 1-2-2v-.2a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.9.3l-.1.1a2 2 0 0 1-2.8 0l-.1-.1a2 2 0 0 1 0-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.9 1.7 1.7 0 0 0-1.5-1H3a2 2 0 0 1-2-2v-.2a2 2 0 0 1 2-2h.2a1.7 1.7 0 0 0 1.5-1 1.7 1.7 0 0 0-.3-1.9l-.1-.1a2 2 0 0 1 0-2.8l.1-.1a2 2 0 0 1 2.8 0l.1.1a1.7 1.7 0 0 0 1.9.3h.1a1.7 1.7 0 0 0 1-1.5V3a2 2 0 0 1 2-2h.2a2 2 0 0 1 2 2v.2a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.9-.3l.1-.1a2 2 0 0 1 2.8 0l.1.1a2 2 0 0 1 0 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.9v.1a1.7 1.7 0 0 0 1.5 1H21a2 2 0 0 1 2 2v.2a2 2 0 0 1-2 2h-.2a1.7 1.7 0 0 0-1.4 1z"/></symbol>
    <symbol id="icon-bullseye" viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="4"/><circle cx="12" cy="12" r="1"/></symbol>
    <symbol id="icon-palette" viewBox="0 0 24 24"><path d="M12 3a9 9 0 0 0 0 18h1.2a2.8 2.8 0 0 0 0-5.6H12a2 2 0 0 1 0-4h5a4 4 0 0 0 4-4 8.4 8.4 0 0 0-9-4.4z"/><path d="M7.5 10h.01"/><path d="M8.5 14h.01"/><path d="M12 8h.01"/><path d="M15.5 10h.01"/></symbol>
    <symbol id="icon-layers" viewBox="0 0 24 24"><path d="m12 3 9 5-9 5-9-5 9-5z"/><path d="m3 12 9 5 9-5"/><path d="m3 16 9 5 9-5"/></symbol>
    <symbol id="icon-mail" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></symbol>
    <symbol id="icon-chat" viewBox="0 0 24 24"><path d="M21 14a4 4 0 0 1-4 4H8l-5 3V6a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/></symbol>
    <symbol id="icon-calendar" viewBox="0 0 24 24"><path d="M8 2v4"/><path d="M16 2v4"/><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M3 10h18"/></symbol>
    <symbol id="icon-cash" viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="12" rx="2"/><circle cx="12" cy="12" r="3"/><path d="M7 10h.01"/><path d="M17 14h.01"/></symbol>
    <symbol id="icon-whatsapp" viewBox="0 0 24 24"><path d="M20 11.5a8 8 0 1 1-14.8 4.2L4 20l4.5-1.2A8 8 0 0 1 20 11.5z"/><path d="M9.3 8.7c.2-.5.5-.5.7-.5h.6c.2 0 .4 0 .5.4l.8 1.9c.1.2.1.4 0 .6l-.4.6c-.1.1-.2.3 0 .5.3.5 1 1.6 2.3 2.2.2.1.4 0 .5-.1l.7-.8c.2-.2.4-.2.6-.1l1.8.9c.2.1.3.2.3.5v.4c-.1.5-.5.9-1 .9-.7 0-2.1-.2-3.8-1.8-2-1.8-2.5-3.4-2.6-4.1 0-.4.2-.9.6-1.1z"/></symbol>
    <symbol id="icon-card" viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/><path d="M6 15h4"/></symbol>
    <symbol id="icon-repeat" viewBox="0 0 24 24"><path d="M17 2l4 4-4 4"/><path d="M3 11V9a3 3 0 0 1 3-3h15"/><path d="m7 22-4-4 4-4"/><path d="M21 13v2a3 3 0 0 1-3 3H3"/></symbol>
    <symbol id="icon-receipt" viewBox="0 0 24 24"><path d="M7 3h10v18l-2-1-2 1-2-1-2 1-2-1-2 1V3z"/><path d="M9 8h6"/><path d="M9 12h6"/><path d="M9 16h4"/></symbol>
    <symbol id="icon-pen" viewBox="0 0 24 24"><path d="m4 20 4.5-1 9.7-9.7a2.1 2.1 0 0 0-3-3L5.5 16 4 20z"/><path d="m13.5 5.5 5 5"/></symbol>
    <symbol id="icon-image" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="8.5" cy="10" r="1.5"/><path d="m21 16-5.5-5.5L8 18"/></symbol>
    <symbol id="icon-key" viewBox="0 0 24 24"><circle cx="7.5" cy="15.5" r="3.5"/><path d="M11 13h10"/><path d="M18 10v6"/><path d="M15 12v3"/></symbol>
    <symbol id="icon-home" viewBox="0 0 24 24"><path d="m3 11 9-7 9 7"/><path d="M5 10v10h14V10"/><path d="M9 20v-6h6v6"/></symbol>
    <symbol id="icon-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m20 20-4.2-4.2"/></symbol>
    <symbol id="icon-bolt" viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></symbol>
    <symbol id="icon-handshake" viewBox="0 0 24 24"><path d="m7 12 3 3a2 2 0 0 0 2.8 0l4.2-4.2a2 2 0 0 1 2.8 0L22 13"/><path d="M2 11 6.2 6.8a2 2 0 0 1 2.8 0l3 3"/><path d="m2 20 5-5"/><path d="m17 17 2 2"/><path d="m14 14 2 2"/><path d="m11 11 2 2"/></symbol>
    <symbol id="icon-map" viewBox="0 0 24 24"><path d="m3 6 6-2 6 2 6-2v14l-6 2-6-2-6 2V6z"/><path d="M9 4v14"/><path d="M15 6v14"/></symbol>
    <symbol id="icon-camera" viewBox="0 0 24 24"><path d="M4 7h4l2-2h4l2 2h4a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2z"/><circle cx="12" cy="13" r="4"/></symbol>
    <symbol id="icon-chart" viewBox="0 0 24 24"><path d="M4 20V10"/><path d="M10 20V4"/><path d="M16 20v-7"/><path d="M22 20V8"/></symbol>
    <symbol id="icon-tools" viewBox="0 0 24 24"><path d="m14.7 6.3 3 3"/><path d="m4 20 7.5-7.5"/><path d="m13 8 3-3a2.5 2.5 0 1 1 3.5 3.5l-3 3"/><path d="M7 7l10 10"/><path d="M4 4l5 5"/></symbol>
    <symbol id="icon-shield" viewBox="0 0 24 24"><path d="M12 3 5 6v5c0 5 3.4 8.6 7 10 3.6-1.4 7-5 7-10V6z"/><path d="m9 12 2 2 4-4"/></symbol>
    <symbol id="icon-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></symbol>
    <symbol id="icon-warning" viewBox="0 0 24 24"><path d="M12 4 3 20h18L12 4z"/><path d="M12 9v5"/><path d="M12 17h.01"/></symbol>
</svg>

<nav class="is-dark">
    @include('public.partials.logo', ['mode' => 'light', 'class' => 'logo'])
    @include('public.partials.menu')
    
    <div class="nav-right">
        <button class="nav-btn" type="button" onclick="resetCalc()"><span class="ui-icon"><svg><use href="#icon-refresh"></use></svg></span>Reset</button>
        <button class="nav-btn gold" type="button" onclick="getQuote()">Get Formal Quote <span class="ui-icon"><svg><use href="#icon-arrow-right"></use></svg></span></button>
    </div>
    <button class="public-nav-toggle" type="button" aria-expanded="false" aria-controls="public-side-nav" aria-label="Open navigation">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>
<div class="hero-band">
    <div class="hb-inner">
        <div>
            <div class="hb-eyebrow"><span class="ui-icon"><svg><use href="#icon-coins"></use></svg></span>Instant Estimate</div>
            <h1 class="hb-title">How much will your<br>website <em>actually cost?</em></h1>
            <p class="hb-sub">Configure your project using the options below and get a real-time, itemised cost estimate — no forms, no waiting. Prices reflect i2Medier's standard rates for the Nigerian market.</p>
        </div>
        <div class="hb-total-pill">
            <div class="htp-label">Your Estimate</div>
            <div class="htp-value" id="hero-total">₦0</div>
            <div class="htp-suffix" id="hero-suffix">Select options below</div>
        </div>
    </div>
</div>

<div class="main-layout">
    <div class="config-panel">
        <div class="calc-section">
            <div class="cs-head">
                <div class="cs-icon"><svg><use href="#icon-globe"></use></svg></div>
                <div class="cs-info">
                    <div class="cs-title">Website Type</div>
                    <div class="cs-desc">Select the type of website you need — this determines the base price</div>
                </div>
            </div>
            <div class="cs-body">
                <div class="type-grid" id="type-grid">
                    <div class="type-card selected" data-key="type" data-val="brochure" data-price="150000" onclick="selectType(this)">
                        <span class="tc-price">₦150k+</span>
                        <span class="tc-icon"><svg><use href="#icon-file"></use></svg></span>
                        <div class="tc-name">Brochure Site</div>
                        <div class="tc-desc">Simple informational website for a business or individual</div>
                    </div>
                    <div class="type-card" data-key="type" data-val="corporate" data-price="250000" onclick="selectType(this)">
                        <span class="tc-price">₦250k+</span>
                        <span class="tc-icon"><svg><use href="#icon-building"></use></svg></span>
                        <div class="tc-name">Corporate Website</div>
                        <div class="tc-desc">Multi-section site with services, team, case studies & blog</div>
                    </div>
                    <div class="type-card" data-key="type" data-val="ecommerce" data-price="400000" onclick="selectType(this)">
                        <span class="tc-price">₦400k+</span>
                        <span class="tc-icon"><svg><use href="#icon-cart"></use></svg></span>
                        <div class="tc-name">E-Commerce Store</div>
                        <div class="tc-desc">Online shop with products, cart, and checkout</div>
                    </div>
                    <div class="type-card" data-key="type" data-val="webapp" data-price="600000" onclick="selectType(this)">
                        <span class="tc-price">₦600k+</span>
                        <span class="tc-icon"><svg><use href="#icon-cog"></use></svg></span>
                        <div class="tc-name">Web Application</div>
                        <div class="tc-desc">Custom app with user accounts, dashboards, data management</div>
                    </div>
                    <div class="type-card" data-key="type" data-val="landing" data-price="80000" onclick="selectType(this)">
                        <span class="tc-price">₦80k+</span>
                        <span class="tc-icon"><svg><use href="#icon-bullseye"></use></svg></span>
                        <div class="tc-name">Landing Page</div>
                        <div class="tc-desc">Single, conversion-focused page for a campaign or product</div>
                    </div>
                    <div class="type-card" data-key="type" data-val="portfolio" data-price="120000" onclick="selectType(this)">
                        <span class="tc-price">₦120k+</span>
                        <span class="tc-icon"><svg><use href="#icon-palette"></use></svg></span>
                        <div class="tc-name">Portfolio / Showcase</div>
                        <div class="tc-desc">Showcase work, projects, photography, or creative output</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="calc-section">
            <div class="cs-head">
                <div class="cs-icon"><svg><use href="#icon-layers"></use></svg></div>
                <div class="cs-info">
                    <div class="cs-title">Number of Pages</div>
                    <div class="cs-desc">More pages = more content structure, layout, and development time</div>
                </div>
            </div>
            <div class="cs-body">
                <div class="slider-row">
                    <div class="slider-track">
                        <input type="range" id="pages-slider" min="1" max="30" value="5" oninput="onPagesChange(this)">
                        <div class="slider-labels">
                            <span class="slider-label">1</span>
                            <span class="slider-label">10</span>
                            <span class="slider-label">20</span>
                            <span class="slider-label">30+</span>
                        </div>
                    </div>
                    <div class="slider-value" id="pages-value">5</div>
                </div>
                <div class="slider-price-note" id="pages-price-note"><span class="spn-plus">+</span>Included in base price</div>
            </div>
        </div>

        <div class="calc-section">
            <div class="cs-head">
                <div class="cs-icon"><svg><use href="#icon-palette"></use></svg></div>
                <div class="cs-info">
                    <div class="cs-title">Design Level</div>
                    <div class="cs-desc">How much custom visual design work does your project need?</div>
                </div>
            </div>
            <div class="cs-body">
                <div class="design-grid">
                    <div class="design-card selected" data-key="design" data-val="template" data-price="0" onclick="selectDesign(this)">
                        <div class="dc-preview" style="background:#f3f4f6;display:flex;flex-direction:column;gap:4px;padding:10px">
                            <div style="height:3px;background:#d1d5db;border-radius:1px;width:60%"></div>
                            <div style="height:3px;background:#e5e7eb;border-radius:1px"></div>
                            <div style="height:3px;background:#e5e7eb;border-radius:1px;width:80%"></div>
                            <div style="height:8px;background:#9ca3af;border-radius:2px;width:35%;margin-top:2px"></div>
                        </div>
                        <div class="dc-body">
                            <div class="dc-name">Theme-based</div>
                            <div class="dc-sub">Premium theme with brand customisation</div>
                            <div class="dc-price-tag">Included</div>
                        </div>
                    </div>
                    <div class="design-card" data-key="design" data-val="semi" data-price="100000" onclick="selectDesign(this)">
                        <div class="dc-preview" style="background:#0d0d0d;display:flex;flex-direction:column;gap:5px;padding:10px">
                            <div style="height:4px;background:var(--gold);border-radius:1px;width:45%"></div>
                            <div style="height:3px;background:rgba(255,255,255,.15);border-radius:1px"></div>
                            <div style="height:3px;background:rgba(255,255,255,.15);border-radius:1px;width:70%"></div>
                            <div style="height:8px;background:rgba(200,169,110,.5);border-radius:2px;width:38%;margin-top:2px"></div>
                        </div>
                        <div class="dc-body">
                            <div class="dc-name">Semi-custom</div>
                            <div class="dc-sub">Custom design on selected key sections</div>
                            <div class="dc-price-tag">+₦100,000</div>
                        </div>
                    </div>
                    <div class="design-card" data-key="design" data-val="full" data-price="200000" onclick="selectDesign(this)">
                        <div class="dc-preview" style="background:linear-gradient(135deg,#0d0d0d 60%,#1a0800 100%);display:flex;flex-direction:column;gap:4px;padding:10px">
                            <div style="height:5px;background:linear-gradient(to right,var(--gold),var(--gold-lt));border-radius:2px;width:55%"></div>
                            <div style="height:3px;background:rgba(255,255,255,.12);border-radius:1px"></div>
                            <div style="height:3px;background:rgba(255,255,255,.12);border-radius:1px;width:75%"></div>
                            <div style="height:10px;background:var(--gold);border-radius:3px;width:40%;margin-top:3px"></div>
                        </div>
                        <div class="dc-body">
                            <div class="dc-name">Fully Custom</div>
                            <div class="dc-sub">Original Figma design for every screen</div>
                            <div class="dc-price-tag">+₦200,000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="calc-section">
            <div class="cs-head">
                <div class="cs-icon"><svg><use href="#icon-cog"></use></svg></div>
                <div class="cs-info">
                    <div class="cs-title">Features & Functionality</div>
                    <div class="cs-desc">Toggle each feature you need — prices are added to your estimate in real time</div>
                </div>
            </div>
            <div class="cs-body">
                <div class="feat-group">
                    <div class="fg-label"><span class="ui-icon"><svg><use href="#icon-mail"></use></svg></span>Lead Generation & Communication</div>
                    <div class="feat-grid">
                        <div class="feat-toggle" data-key="feat-contact" data-price="15000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-file"></use></svg></span><div class="ft-body"><div class="ft-name">Contact Form</div><div class="ft-price">+₦15,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-livechat" data-price="20000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-chat"></use></svg></span><div class="ft-body"><div class="ft-name">Live Chat</div><div class="ft-price">+₦20,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-newsletter" data-price="25000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-mail"></use></svg></span><div class="ft-body"><div class="ft-name">Newsletter Signup</div><div class="ft-price">+₦25,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-booking" data-price="85000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-calendar"></use></svg></span><div class="ft-body"><div class="ft-name">Booking System</div><div class="ft-price">+₦85,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-quote" data-price="30000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-cash"></use></svg></span><div class="ft-body"><div class="ft-name">Quote Request Form</div><div class="ft-price">+₦30,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-whatsapp" data-price="8000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-whatsapp"></use></svg></span><div class="ft-body"><div class="ft-name">WhatsApp Button</div><div class="ft-price">+₦8,000</div></div><div class="ft-switch"></div></div>
                    </div>
                </div>

                <div class="feat-group">
                    <div class="fg-label"><span class="ui-icon"><svg><use href="#icon-cart"></use></svg></span>Commerce & Payments</div>
                    <div class="feat-grid">
                        <div class="feat-toggle" data-key="feat-woocommerce" data-price="120000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-cart"></use></svg></span><div class="ft-body"><div class="ft-name">WooCommerce Shop</div><div class="ft-price">+₦120,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-payment" data-price="55000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-card"></use></svg></span><div class="ft-body"><div class="ft-name">Payment Gateway</div><div class="ft-price">+₦55,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-subscription" data-price="80000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-repeat"></use></svg></span><div class="ft-body"><div class="ft-name">Subscriptions</div><div class="ft-price">+₦80,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-invoicing" data-price="40000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-receipt"></use></svg></span><div class="ft-body"><div class="ft-name">Invoice Generation</div><div class="ft-price">+₦40,000</div></div><div class="ft-switch"></div></div>
                    </div>
                </div>

                <div class="feat-group">
                    <div class="fg-label"><span class="ui-icon"><svg><use href="#icon-key"></use></svg></span>Content & User Accounts</div>
                    <div class="feat-grid">
                        <div class="feat-toggle" data-key="feat-blog" data-price="35000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-pen"></use></svg></span><div class="ft-body"><div class="ft-name">Blog / CMS</div><div class="ft-price">+₦35,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-gallery" data-price="25000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-image"></use></svg></span><div class="ft-body"><div class="ft-name">Photo Gallery</div><div class="ft-price">+₦25,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-login" data-price="75000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-key"></use></svg></span><div class="ft-body"><div class="ft-name">User Login / Auth</div><div class="ft-price">+₦75,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-portal" data-price="95000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-home"></use></svg></span><div class="ft-body"><div class="ft-name">Client Portal</div><div class="ft-price">+₦95,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-search" data-price="35000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-search"></use></svg></span><div class="ft-body"><div class="ft-name">Site Search</div><div class="ft-price">+₦35,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-events" data-price="45000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-calendar"></use></svg></span><div class="ft-body"><div class="ft-name">Events Calendar</div><div class="ft-price">+₦45,000</div></div><div class="ft-switch"></div></div>
                    </div>
                </div>

                <div class="feat-group" style="margin-bottom:0">
                    <div class="fg-label"><span class="ui-icon"><svg><use href="#icon-bolt"></use></svg></span>Advanced & Integrations</div>
                    <div class="feat-grid">
                        <div class="feat-toggle" data-key="feat-multilang" data-price="55000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-globe"></use></svg></span><div class="ft-body"><div class="ft-name">Multi-language</div><div class="ft-price">+₦55,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-api" data-price="120000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-bolt"></use></svg></span><div class="ft-body"><div class="ft-name">REST API</div><div class="ft-price">+₦120,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-crm" data-price="50000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-handshake"></use></svg></span><div class="ft-body"><div class="ft-name">CRM Integration</div><div class="ft-price">+₦50,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-admin" data-price="85000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-cog"></use></svg></span><div class="ft-body"><div class="ft-name">Custom Admin Panel</div><div class="ft-price">+₦85,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-popup" data-price="25000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-bullseye"></use></svg></span><div class="ft-body"><div class="ft-name">Popups / Lead Capture</div><div class="ft-price">+₦25,000</div></div><div class="ft-switch"></div></div>
                        <div class="feat-toggle" data-key="feat-maps" data-price="10000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-map"></use></svg></span><div class="ft-body"><div class="ft-name">Google Maps</div><div class="ft-price">+₦10,000</div></div><div class="ft-switch"></div></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="calc-section">
            <div class="cs-head">
                <div class="cs-icon"><svg><use href="#icon-pen"></use></svg></div>
                <div class="cs-info">
                    <div class="cs-title">Content & Copywriting</div>
                    <div class="cs-desc">Will you supply all website text, or do you need copywriting?</div>
                </div>
            </div>
            <div class="cs-body">
                <div class="option-row" id="content-group">
                    <div class="option-btn selected" data-key="content" data-val="self" data-price="0" onclick="selectOption('content-group',this)"><div class="ob-label">We supply all content</div><div class="ob-price">Included</div></div>
                    <div class="option-btn" data-key="content" data-val="edit" data-price="40000" onclick="selectOption('content-group',this)"><div class="ob-label">We have drafts — need editing</div><div class="ob-price">+₦40,000</div></div>
                    <div class="option-btn" data-key="content" data-val="write-sm" data-price="75000" onclick="selectOption('content-group',this)"><div class="ob-label">Need full copywriting (up to 5 pages)</div><div class="ob-price">+₦75,000</div></div>
                    <div class="option-btn" data-key="content" data-val="write-lg" data-price="150000" onclick="selectOption('content-group',this)"><div class="ob-label">Need full copywriting (10+ pages)</div><div class="ob-price">+₦150,000</div></div>
                </div>
                <div class="feat-toggle" style="margin-top:.65rem" data-key="feat-photography" data-price="80000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-camera"></use></svg></span><div class="ft-body"><div class="ft-name">Custom Photography / Imagery</div><div class="ft-price">+₦80,000</div></div><div class="ft-switch"></div></div>
            </div>
        </div>

        <div class="calc-section">
            <div class="cs-head">
                <div class="cs-icon"><svg><use href="#icon-search"></use></svg></div>
                <div class="cs-info">
                    <div class="cs-title">SEO & Analytics</div>
                    <div class="cs-desc">Search engine optimisation to help people find your website</div>
                </div>
            </div>
            <div class="cs-body">
                <div class="option-row" id="seo-group">
                    <div class="option-btn selected" data-key="seo" data-val="none" data-price="0" onclick="selectOption('seo-group',this)"><div class="ob-label">No SEO — I'll handle it myself</div><div class="ob-price">Included</div></div>
                    <div class="option-btn" data-key="seo" data-val="basic" data-price="35000" onclick="selectOption('seo-group',this)"><div class="ob-label">Basic SEO setup (meta tags, sitemap, schema)</div><div class="ob-price">+₦35,000</div></div>
                    <div class="option-btn" data-key="seo" data-val="full" data-price="85000" onclick="selectOption('seo-group',this)"><div class="ob-label">Comprehensive on-page SEO</div><div class="ob-price">+₦85,000</div></div>
                    <div class="option-btn" data-key="seo" data-val="ongoing" data-price="65000" onclick="selectOption('seo-group',this)"><div class="ob-label">Ongoing SEO management</div><div class="ob-price">+₦65,000/mo</div></div>
                </div>
                <div class="feat-toggle" style="margin-top:.65rem" data-key="feat-analytics" data-price="15000" onclick="toggleFeat(this)"><span class="ft-ico"><svg><use href="#icon-chart"></use></svg></span><div class="ft-body"><div class="ft-name">Analytics & Conversion Tracking Setup</div><div class="ft-price">+₦15,000</div></div><div class="ft-switch"></div></div>
            </div>
        </div>

        <div class="calc-section">
            <div class="cs-head">
                <div class="cs-icon"><svg><use href="#icon-tools"></use></svg></div>
                <div class="cs-info">
                    <div class="cs-title">Platform & Technology</div>
                    <div class="cs-desc">What technology stack should your website be built on?</div>
                </div>
            </div>
            <div class="cs-body">
                <div class="option-row" id="platform-group">
                    <div class="option-btn selected" data-key="platform" data-val="wordpress" data-price="0" onclick="selectOption('platform-group',this)"><div class="ob-label">WordPress (recommended)</div><div class="ob-price">Included</div></div>
                    <div class="option-btn" data-key="platform" data-val="laravel" data-price="100000" onclick="selectOption('platform-group',this)"><div class="ob-label">Laravel / Custom PHP</div><div class="ob-price">+₦100,000</div></div>
                    <div class="option-btn" data-key="platform" data-val="nextjs" data-price="85000" onclick="selectOption('platform-group',this)"><div class="ob-label">React / Next.js</div><div class="ob-price">+₦85,000</div></div>
                    <div class="option-btn" data-key="platform" data-val="other" data-price="0" onclick="selectOption('platform-group',this)"><div class="ob-label">No preference — recommend for me</div><div class="ob-price">Included</div></div>
                </div>
            </div>
        </div>

        <div class="calc-section">
            <div class="cs-head">
                <div class="cs-icon"><svg><use href="#icon-shield"></use></svg></div>
                <div class="cs-info">
                    <div class="cs-title">Ongoing Maintenance</div>
                    <div class="cs-desc">Monthly care plans keep your site secure, updated, and backed up</div>
                </div>
            </div>
            <div class="cs-body">
                <div class="option-row" id="maintenance-group">
                    <div class="option-btn selected" data-key="maintenance" data-val="none" data-price="0" onclick="selectOption('maintenance-group',this)"><div class="ob-label">No maintenance plan</div><div class="ob-price">₦0/mo</div></div>
                    <div class="option-btn" data-key="maintenance" data-val="basic" data-price="35000" onclick="selectOption('maintenance-group',this)"><div class="ob-label">Basic Care Plan</div><div class="ob-price">₦35,000/mo</div></div>
                    <div class="option-btn" data-key="maintenance" data-val="growth" data-price="75000" onclick="selectOption('maintenance-group',this)"><div class="ob-label">Growth Care Plan</div><div class="ob-price">₦75,000/mo</div></div>
                    <div class="option-btn" data-key="maintenance" data-val="agency" data-price="150000" onclick="selectOption('maintenance-group',this)"><div class="ob-label">Agency / Enterprise Plan</div><div class="ob-price">₦150,000/mo</div></div>
                </div>
            </div>
        </div>

        <div class="calc-section">
            <div class="cs-head">
                <div class="cs-icon"><svg><use href="#icon-clock"></use></svg></div>
                <div class="cs-info">
                    <div class="cs-title">Project Timeline</div>
                    <div class="cs-desc">Rush projects require extra team resources — a premium applies</div>
                </div>
            </div>
            <div class="cs-body">
                <div class="option-row" id="timeline-group">
                    <div class="option-btn selected" data-key="timeline" data-val="standard" data-price="0" data-rush="0" onclick="selectOption('timeline-group',this)"><div class="ob-label">Standard (4–8 weeks)</div><div class="ob-price">No premium</div></div>
                    <div class="option-btn" data-key="timeline" data-val="express" data-price="0" data-rush="25" onclick="selectOption('timeline-group',this)"><div class="ob-label">Express (2–4 weeks)</div><div class="ob-price">+25% rush premium</div></div>
                    <div class="option-btn" data-key="timeline" data-val="rush" data-price="0" data-rush="50" onclick="selectOption('timeline-group',this)"><div class="ob-label">Rush (1–2 weeks)</div><div class="ob-price">+50% rush premium</div></div>
                    <div class="option-btn" data-key="timeline" data-val="flexible" data-price="0" data-rush="-10" onclick="selectOption('timeline-group',this)"><div class="ob-label">Flexible (when available)</div><div class="ob-price">−10% discount</div></div>
                </div>
                <div class="rush-warning" id="rush-warning" style="display:none">
                    <span class="rw-icon"><svg><use href="#icon-warning"></use></svg></span>
                    A rush premium is applied to the total one-time cost to cover additional team resources and overtime required to meet your accelerated deadline.
                </div>
            </div>
        </div>

        <div class="comparison-section">
            <div class="comp-title">How does your estimate compare?</div>
            <div class="comp-sub">Same scope delivered by different providers — updated in real time.</div>
            <div class="comp-table-wrap">
                <table class="comp-table">
                    <thead>
                        <tr>
                            <th>What you get</th>
                            <th>Freelancer</th>
                            <th class="highlight">i2Medier</th>
                            <th>Large Agency</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="feature">Estimated cost</td>
                            <td id="comp-freelancer">—</td>
                            <td class="highlight" id="comp-i2m" style="color:var(--gold-dk);font-weight:800">—</td>
                            <td id="comp-agency">—</td>
                        </tr>
                        <tr>
                            <td class="feature">Custom design</td>
                            <td>Sometimes</td>
                            <td class="highlight">Always</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td class="feature">Project management</td>
                            <td>Self-managed</td>
                            <td class="highlight">Included</td>
                            <td>Included</td>
                        </tr>
                        <tr>
                            <td class="feature">Post-launch support</td>
                            <td>Varies</td>
                            <td class="highlight">30-day guarantee</td>
                            <td>Billed separately</td>
                        </tr>
                        <tr>
                            <td class="feature">Delivery reliability</td>
                            <td>Uncertain</td>
                            <td class="highlight">Milestone-based</td>
                            <td>Contractual</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="cost-panel">
        <div class="cost-card">
            <div class="cost-header">
                <div class="ch-label">Your Estimate</div>
                <div class="ch-total" id="cost-total"><span class="ch-total-gold">₦</span><span id="total-num">0</span></div>
                <div class="ch-subtitle" id="cost-subtitle">One-time cost</div>
                <div class="completion-bar">
                    <div class="cb-fill" id="completion-fill" style="width:10%"></div>
                </div>
                <div class="cb-label"><span id="completion-label">Configuring…</span><span id="completion-pct">10%</span></div>
            </div>

            <div class="breakdown-wrap" id="breakdown-wrap">
                <div class="breakdown-section">
                    <div class="bds-label">One-time Costs</div>
                    <div id="breakdown-onetime"></div>
                </div>
                <div class="cost-divider"></div>
                <div class="breakdown-section">
                    <div class="bds-label">Monthly (Recurring)</div>
                    <div id="breakdown-monthly"></div>
                </div>
            </div>

            <div class="cost-divider"></div>

            <div class="cost-summary">
                <div class="cs-row">
                    <span class="cs-label">Features subtotal</span>
                    <span class="cs-val" id="sum-features">₦0</span>
                </div>
                <div class="cs-row">
                    <span class="cs-label">Rush premium</span>
                    <span class="cs-val" id="sum-rush">—</span>
                </div>
                <div class="cs-row monthly">
                    <span class="cs-label">Monthly recurring</span>
                    <span class="cs-val" id="sum-monthly">₦0/mo</span>
                </div>
                <div class="cs-row total">
                    <span class="cs-label">Total one-time</span>
                    <span class="cs-val" id="sum-total">₦0</span>
                </div>
            </div>

            <div class="cost-actions">
                <button class="ca-btn primary" type="button" onclick="getQuote()">Get a Formal Quote <span class="ui-icon"><svg><use href="#icon-arrow-right"></use></svg></span></button>
                <button class="ca-btn secondary" type="button" onclick="printEstimate()"><span class="ui-icon"><svg><use href="#icon-download"></use></svg></span>Print / Save PDF</button>
            </div>
            <div class="cost-disclaimer">Prices are starting estimates for the Nigerian market. Your final, itemised quote is confirmed after a free discovery call — no commitment required.</div>
        </div>
    </div>
</div>

<div class="mobile-total-bar" id="mobile-bar">
    <div class="mtb-total">
        <div class="mtb-label">Estimate</div>
        <div class="mtb-value" id="mobile-total">₦0</div>
    </div>
    <button class="mtb-btn" type="button" onclick="getQuote()">Get Quote <span class="ui-icon"><svg><use href="#icon-arrow-right"></use></svg></span></button>
</div>

<section class="seo-content" aria-label="About the Website Cost Calculator">
  <div class="seo-content-inner">

    <div class="seo-section">
      <span class="seo-section-eyebrow">ABOUT THIS TOOL</span>
      <h2>About this free website cost calculator</h2>
      <p>This free website cost calculator gives you an instant, itemised estimate based on your actual project requirements — no forms, no waiting, no vague "contact us for pricing." Configure your project live and watch the total adjust in real time as you select features, design level, and timeline.</p>
      <p>Every price in this website cost calculator reflects i2Medier's current standard rates for the Nigerian market, so the figure you see is the same figure our team would give you in a discovery call. It is not a random range — it is a serious starting point for a real web design budget conversation.</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg></div>
          <div class="cfc-title">Real-Time Pricing</div>
          <div class="cfc-desc">Every selection updates your estimate instantly — no page reload or form submission needed.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1-2-1Z"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 17.5v1.5"/><path d="M12 6V4.5"/></svg></div>
          <div class="cfc-title">Itemised Breakdown</div>
          <div class="cfc-desc">See exactly which features and services contribute to the total, line by line.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
          <div class="cfc-title">Market Comparison</div>
          <div class="cfc-desc">See how your estimate compares to freelancers and large agencies for the same scope.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div>
          <div class="cfc-title">Printable Summary</div>
          <div class="cfc-desc">Save or print your estimate as a PDF to share with stakeholders or finance teams.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg></div>
          <div class="cfc-title">Quote Pathway</div>
          <div class="cfc-desc">Click "Get Quote" at any point to move from estimate to a formal, detailed proposal.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg></div>
          <div class="cfc-title">Rush Premium Calculator</div>
          <div class="cfc-desc">See how timeline choices — express, rush, or flexible — affect the total in real time.</div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">HOW IT WORKS</span>
      <h2>How this website cost calculator works — in six steps</h2>
      <p>This website cost calculator works by assigning real development costs to each option you select. As you configure your project, every choice adds or adjusts the running total so you always know exactly where your web design budget stands.</p>
      <div class="why-list">
        <div class="why-item">
          <div class="why-num">1</div>
          <div class="why-body">
            <div class="why-body-title">Choose your website type</div>
            <div class="why-body-desc">Select from brochure site, corporate website, e-commerce store, web application, landing page, or portfolio. This sets your base price.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">2</div>
          <div class="why-body">
            <div class="why-body-title">Set the number of pages</div>
            <div class="why-body-desc">Use the slider to indicate how many pages your website needs. More pages require more content structure, layout, and development work.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">3</div>
          <div class="why-body">
            <div class="why-body-title">Select your design level</div>
            <div class="why-body-desc">Choose between a premium theme with brand customisation, a semi-custom design on key sections, or a fully original Figma design for every screen.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">4</div>
          <div class="why-body">
            <div class="why-body-title">Toggle the features you need</div>
            <div class="why-body-desc">Pick from contact forms, booking systems, payment gateways, user logins, blog, e-commerce, CRM integrations, and more — each adds its specific cost.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">5</div>
          <div class="why-body">
            <div class="why-body-title">Add content, SEO, and hosting</div>
            <div class="why-body-desc">Select whether you need copywriting, SEO setup, or ongoing maintenance to see the complete picture of what your website investment looks like.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">6</div>
          <div class="why-body">
            <div class="why-body-title">Review and get a formal quote</div>
            <div class="why-body-desc">When you are satisfied with your configuration, click "Get Quote" to receive a detailed, itemised proposal from the i2Medier team.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">WHAT AFFECTS THE COST</span>
      <h2>What this website cost calculator measures — the variables that drive price</h2>
      <p>Website development costs are not arbitrary. Every line in this website cost calculator reflects a real decision that affects how much time and expertise your project requires. Understanding what drives the price helps you make smarter scope decisions.</p>
      <p>The biggest single factor is usually the website type — a landing page and a full web application can be ten times apart in price. After that, design level, features, and whether you need content written are the most significant variables in any website cost estimate.</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>
          <div class="cfc-title">Website Type</div>
          <div class="cfc-desc">The type determines base complexity. A web app requires far more architecture than a brochure site.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="13.5" cy="6.5" r=".5"/><circle cx="17.5" cy="10.5" r=".5"/><circle cx="8.5" cy="7.5" r=".5"/><circle cx="6.5" cy="12.5" r=".5"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg></div>
          <div class="cfc-title">Design Level</div>
          <div class="cfc-desc">Custom Figma designs for every screen cost more than adapting a premium theme with brand colours.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg></div>
          <div class="cfc-title">Features & Integrations</div>
          <div class="cfc-desc">Each feature — booking systems, payment gateways, user portals — adds development and testing time.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></div>
          <div class="cfc-title">Copywriting</div>
          <div class="cfc-desc">Professionally written website copy for 10+ pages is a significant effort and priced accordingly.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></div>
          <div class="cfc-title">SEO Setup</div>
          <div class="cfc-desc">Comprehensive on-page SEO — schema markup, keyword mapping, technical audit — takes specialist time.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><line x1="10" y1="2" x2="14" y2="2"/><line x1="12" y1="14" x2="12" y2="8"/><path d="M4.9 4.9A9.96 9.96 0 0 0 2 12a10 10 0 0 0 10 10 10 10 0 0 0 10-10 10 10 0 0 0-2.9-7.1"/></svg></div>
          <div class="cfc-title">Timeline</div>
          <div class="cfc-desc">Rush timelines require extra team resources and overtime, which is reflected in the rush premium.</div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">WHY IT MATTERS</span>
      <h2>Why you need a website cost calculator before you start building</h2>
      <p>Most project failures in Nigerian web development are not technical — they are budget failures. A client starts with a vague figure in mind, gets into the build, and discovers the real scope costs three times what they expected. Using a website cost calculator before committing to a developer prevents this entirely.</p>
      <p>This website cost calculator gives you an honest, itemised picture before you commit to anything. You can scope down to fit your budget, or confirm that your budget is right for what you need — either way, you go into the project with clarity instead of hope.</p>
      <div class="why-list">
        <div class="why-item">
          <div class="why-num">1</div>
          <div class="why-body">
            <div class="why-body-title">Avoid scope creep surprises</div>
            <div class="why-body-desc">Knowing what each feature costs upfront lets you make intentional decisions about what to include, rather than discovering overruns mid-project.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">2</div>
          <div class="why-body">
            <div class="why-body-title">Build a credible budget proposal</div>
            <div class="why-body-desc">Marketing managers and founders often need to justify website spend to boards or finance teams. A printed, itemised estimate gives that conversation a solid foundation.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">3</div>
          <div class="why-body">
            <div class="why-body-title">Compare providers fairly</div>
            <div class="why-body-desc">When you know the realistic cost of your scope, you can assess quotes from other providers with context — rather than choosing the cheapest without understanding the trade-offs.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">4</div>
          <div class="why-body">
            <div class="why-body-title">Prioritise features strategically</div>
            <div class="why-body-desc">Seeing the cost of each feature individually helps you decide what is essential for launch and what can be added in a later phase when more budget is available.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">COMMON MISTAKES</span>
      <h2>Website budgeting mistakes this cost calculator helps you avoid</h2>
      <p>Even experienced business owners make these mistakes when budgeting for a website. Using a website cost calculator upfront exposes these traps early — before they cost thousands of naira and months of frustration.</p>
      <div class="issues-feature-grid">
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">Budgeting for design only</div>
            <div class="ifi-desc">Many clients budget for visual design and forget development, content, SEO, and hosting — which can easily double the total.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Choosing the cheapest quote</div>
            <div class="ifi-desc">The cheapest quote almost always means missing features, poor code quality, or no post-launch support — creating expensive problems later.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">Underestimating content work</div>
            <div class="ifi-desc">Assuming you can write all the website copy yourself — and then struggling to produce it — is one of the most common causes of project delays.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Forgetting recurring costs</div>
            <div class="ifi-desc">Hosting, domain renewal, SSL certificates, maintenance plans, and SEO management are annual or monthly costs that must be factored into the total.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">Requesting a rush with no budget for it</div>
            <div class="ifi-desc">Wanting a 2-week turnaround without budgeting for the rush premium leads to conflict with the agency and degraded output quality.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">Scoping too large for the budget</div>
            <div class="ifi-desc">Asking for an e-commerce site with user accounts and a REST API on a brochure-site budget forces the developer to cut corners you may not see until it is too late.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">No maintenance plan budgeted</div>
            <div class="ifi-desc">A website without ongoing maintenance becomes a security liability within months — plugin updates, backups, and security patches are not optional on a live site.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Expecting the estimate to be the invoice</div>
            <div class="ifi-desc">An estimate is a planning tool. The formal quote after a discovery call may differ once the exact brief, integrations, and content scope are clearly defined.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">WHO IT'S FOR</span>
      <h2>Who uses this website cost calculator</h2>
      <p>This website cost calculator is designed for decision-makers — people who need a realistic number before they can move forward. Whether you are planning an initial build or scoping an upgrade to an existing site, the website cost calculator gives you the clarity to act.</p>
      <div class="who-grid">
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg></div>
          <div class="who-title">Business Owners</div>
          <div class="who-desc">Planning a new website and needing a reliable ballpark before approaching any agency or developer.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg></div>
          <div class="who-title">Startups</div>
          <div class="who-desc">Comparing what different website types cost before deciding on MVP scope and how to allocate limited runway.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4 19-7z"/></svg></div>
          <div class="who-title">Marketing Managers</div>
          <div class="who-desc">Building a budget proposal for a rebrand or new campaign site and needing credible figures to present to leadership.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><line x1="9" y1="18" x2="15" y2="18"/><line x1="10" y1="22" x2="14" y2="22"/><path d="M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 0 1 8.91 14"/></svg></div>
          <div class="who-title">Entrepreneurs</div>
          <div class="who-desc">Checking what is realistically achievable within their current budget before committing to a development partner.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg></div>
          <div class="who-title">Freelance Developers</div>
          <div class="who-desc">Benchmarking their own project pricing against professional agency rates in the Nigerian market.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>
          <div class="who-title">International Clients</div>
          <div class="who-desc">Understanding Nigerian web development costs and what different project types realistically cost before a consultation.</div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">NEXT STEPS</span>
      <h2>What to do after using this website cost calculator</h2>
      <p>A website cost estimate is the start of the conversation, not the end of it. Here is how to turn your website cost calculator output into a real project with confidence.</p>
      <div class="steps-list">
        <div class="step-item">
          <div class="step-num">1</div>
          <div class="step-body">
            <div class="step-title">Save or print your estimate</div>
            <div class="step-desc">Use the "Print / Save PDF" button to capture your current configuration as a PDF. Share it with your team or finance contact to align on budget before the formal quote stage.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">2</div>
          <div class="step-body">
            <div class="step-title">Review which features are essential vs. nice-to-have</div>
            <div class="step-desc">If the estimate is above your budget, go back and toggle off features that are not critical for launch. A phased approach — core site first, added features later — often makes more financial sense.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">3</div>
          <div class="step-body">
            <div class="step-title">Complete the Website Brief Generator</div>
            <div class="step-desc">Before requesting a formal quote, use our Website Brief Generator to document your goals, audience, content, and design preferences. A clear brief leads to a more accurate proposal.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">4</div>
          <div class="step-body">
            <div class="step-title">Request a formal quote</div>
            <div class="step-desc">Click "Get a Formal Quote" to begin the onboarding process. You will receive a detailed, itemised proposal within two business days — no commitment required.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">5</div>
          <div class="step-body">
            <div class="step-title">Book a free discovery call</div>
            <div class="step-desc">Our team will walk through your requirements, clarify the scope, and answer any questions about timeline, process, or the technologies we recommend for your project.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">6</div>
          <div class="step-body">
            <div class="step-title">Start your project</div>
            <div class="step-desc">Once the proposal is agreed, we kick off with a signed contract and a structured milestone plan — so you always know what is happening and when your website will be ready.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">COMPARE</span>
      <h2>What this website cost calculator gives you vs. a formal web design quote</h2>
      <p>This website cost calculator is a powerful planning tool, but a formal proposal from i2Medier includes significantly more detail. Understanding the difference between a website cost estimate and a formal quote helps you use each at the right stage of your project.</p>
      <table class="compare-table">
        <thead>
          <tr>
            <th>What you get</th>
            <th>Calculator Estimate</th>
            <th class="highlight">Formal Quote</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Pricing detail</td>
            <td>Real-time range</td>
            <td class="yes">Itemised, fixed price</td>
          </tr>
          <tr>
            <td>Based on your brief</td>
            <td class="no">Self-configured</td>
            <td class="yes">Discovery call + brief</td>
          </tr>
          <tr>
            <td>Timeline included</td>
            <td class="no">No</td>
            <td class="yes">Week-by-week milestones</td>
          </tr>
          <tr>
            <td>Technology recommendation</td>
            <td class="partial">General options</td>
            <td class="yes">Stack chosen for your needs</td>
          </tr>
          <tr>
            <td>Scope of work document</td>
            <td class="no">No</td>
            <td class="yes">Full written scope</td>
          </tr>
          <tr>
            <td>Ready to sign</td>
            <td class="no">No</td>
            <td class="yes">Contract-ready proposal</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</section>

<section class="service-cta">
  <div class="service-cta-eyebrow">&#10003; Free Consultation — No Commitment</div>
  <h2>Turn your estimate into a <em>real project</em></h2>
  <p>Your calculator estimate is a starting point. Book a free discovery call and our team will give you a detailed, itemised proposal — no vague ranges, no surprise costs.</p>
  <div class="service-pills">
    <span class="service-pill">Fixed-Price Proposals</span>
    <span class="service-pill">Milestone-Based Delivery</span>
    <span class="service-pill">30-Day Post-Launch Support</span>
    <span class="service-pill">Nigerian Market Rates</span>
    <span class="service-pill">No Commitment Required</span>
  </div>
  <div class="cta-buttons">
    <a href="{{ route('site.start') }}" class="cta-btn-primary">Get Your Formal Quote →</a>
    <a href="{{ route('tools.website-brief-generator') }}" class="cta-btn-secondary">Complete a Website Brief First</a>
  </div>
</section>

<section class="faq-section">
  <div class="faq-inner">
    <div class="faq-header">
      <span class="seo-section-eyebrow">FAQ</span>
      <h2>Frequently asked questions</h2>
      <p>Everything you need to know about the Website Cost Calculator and how pricing works at i2Medier.</p>
    </div>
    <div class="faq-list">
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="cc-f1">
          <span class="faq-q-text">How accurate is the website cost estimate?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="cc-f1">The estimate is based on real project pricing at i2Medier and reflects actual development time and complexity for the Nigerian market. Final costs depend on your specific brief and may vary slightly after a full consultation, but the calculator gives a reliable ballpark figure for planning and budget approval purposes.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="cc-f2">
          <span class="faq-q-text">Does the estimate include VAT or other taxes?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="cc-f2">Prices shown are indicative and do not include VAT unless stated otherwise. Your detailed formal proposal will clearly itemise all applicable charges, taxes, and payment terms before you are asked to commit to anything.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="cc-f3">
          <span class="faq-q-text">Can I get a formal quote after using the calculator?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="cc-f3">Yes. Click "Get a Formal Quote" at the top or bottom of the calculator to begin the project onboarding process. You will receive a detailed, itemised proposal based on your specific requirements within two business days — no commitment is required at that stage.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="cc-f4">
          <span class="faq-q-text">What currencies does the calculator support?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="cc-f4">Estimates are displayed in Nigerian Naira (₦) by default, as the calculator is built around i2Medier's Nigerian market rates. International clients are quoted in GBP, USD, or their preferred currency during the formal proposal and consultation stage.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="cc-f5">
          <span class="faq-q-text">Why does the price change as I select options?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="cc-f5">Each option in the calculator reflects specific development time and resource costs. Features like booking systems, payment gateways, and custom portals each require engineering work beyond the base build. The calculator updates in real time so you can see exactly how each decision affects your total and adjust your scope to match your budget.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="cc-f6">
          <span class="faq-q-text">What is the rush premium and when does it apply?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="cc-f6">A rush premium is applied when you select an accelerated timeline — express (2–4 weeks) adds 25%, and rush (1–2 weeks) adds 50% to the one-time cost. This covers the additional team resources, overtime, and reduced availability for other projects that a tight deadline requires.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="cc-f7">
          <span class="faq-q-text">Do I need a maintenance plan, and what does it include?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="cc-f7">A maintenance plan is not mandatory, but it is strongly recommended for any live website. Without one, your site is vulnerable to security issues, plugin conflicts, and downtime. i2Medier's care plans include plugin updates, daily backups, security monitoring, uptime checks, and a monthly performance report. You can choose the level that fits your needs and budget.</div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-cost-calculator.js')
@endpush
