@extends('public.layouts.nametool')

@section('title', 'WhatsApp Link Generator — Free wa.me Links | i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/whatsapp-link-generator.css')
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
            'name' => 'WhatsApp Link Generator',
            'item' => route('tools.whatsapp-link-generator'),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'SoftwareApplication',
    'name' => 'WhatsApp Link Generator',
    'url' => route('tools.whatsapp-link-generator'),
    'applicationCategory' => 'WebApplication',
    'operatingSystem' => 'Any',
    'offers' => ['@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'NGN'],
    'description' => 'Free WhatsApp link generator. Create a wa.me click-to-chat link with a pre-filled message for your business — no signup required.',
    'provider' => ['@type' => 'Organization', 'name' => 'i2Medier', 'url' => url('/')],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush


@section('body_attrs')
id="whatsapp-link-generator-page"
@endsection

@section('content')
<svg aria-hidden="true" class="ui-icon-sprite">
    <symbol id="icon-refresh" viewBox="0 0 24 24"><path d="M20 11a8 8 0 1 0 2.1 5.4"/><path d="M20 4v7h-7"/></symbol>
    <symbol id="icon-arrow-up-right" viewBox="0 0 24 24"><path d="M7 17 17 7"/><path d="M9 7h8v8"/></symbol>
    <symbol id="icon-arrow-right" viewBox="0 0 24 24"><path d="M5 12h14"/><path d="m13 5 7 7-7 7"/></symbol>
    <symbol id="icon-phone" viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 3a2 2 0 0 1-.6 1.8l-1.3 1.3a16 16 0 0 0 6.4 6.4l1.3-1.3a2 2 0 0 1 1.8-.6l3 .5a2 2 0 0 1 1.7 2z"/></symbol>
    <symbol id="icon-chat" viewBox="0 0 24 24"><path d="M21 14a4 4 0 0 1-4 4H8l-5 3V6a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/></symbol>
    <symbol id="icon-cog" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3.2"/><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1a2 2 0 0 1 0 2.8l-.1.1a2 2 0 0 1-2.8 0l-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 0 1-2 2h-.2a2 2 0 0 1-2-2v-.2a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.9.3l-.1.1a2 2 0 0 1-2.8 0l-.1-.1a2 2 0 0 1 0-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.9 1.7 1.7 0 0 0-1.5-1H3a2 2 0 0 1-2-2v-.2a2 2 0 0 1 2-2h.2a1.7 1.7 0 0 0 1.5-1 1.7 1.7 0 0 0-.3-1.9l-.1-.1a2 2 0 0 1 0-2.8l.1-.1a2 2 0 0 1 2.8 0l.1.1a1.7 1.7 0 0 0 1.9.3h.1a1.7 1.7 0 0 0 1-1.5V3a2 2 0 0 1 2-2h.2a2 2 0 0 1 2 2v.2a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.9-.3l.1-.1a2 2 0 0 1 2.8 0l.1.1a2 2 0 0 1 0 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.9v.1a1.7 1.7 0 0 0 1.5 1H21a2 2 0 0 1 2 2v.2a2 2 0 0 1-2 2h-.2a1.7 1.7 0 0 0-1.4 1z"/></symbol>
    <symbol id="icon-pin" viewBox="0 0 24 24"><path d="m15 5 4 4"/><path d="M9 3 3 9l5 5-3 7 7-3 5 5 6-6-5-5 3-7-7 3-5-5z"/></symbol>
    <symbol id="icon-link" viewBox="0 0 24 24"><path d="M10 13a5 5 0 0 0 7.1 0l2.8-2.8a5 5 0 1 0-7.1-7.1L11.2 4"/><path d="M14 11a5 5 0 0 0-7.1 0L4 13.8a5 5 0 1 0 7.1 7.1l1.7-1.7"/></symbol>
    <symbol id="icon-qr" viewBox="0 0 24 24"><path d="M3 3h7v7H3z"/><path d="M14 3h7v7h-7z"/><path d="M3 14h7v7H3z"/><path d="M5 5h3v3H5z"/><path d="M16 5h3v3h-3z"/><path d="M5 16h3v3H5z"/><path d="M14 14h2v2h-2z"/><path d="M18 14h3v3h-3z"/><path d="M14 18h3v3h-3z"/><path d="M19 19h2v2h-2z"/></symbol>
    <symbol id="icon-code" viewBox="0 0 24 24"><path d="m8 16-4-4 4-4"/><path d="m16 8 4 4-4 4"/><path d="m14 4-4 16"/></symbol>
    <symbol id="icon-eye" viewBox="0 0 24 24"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></symbol>
    <symbol id="icon-copy" viewBox="0 0 24 24"><rect x="9" y="9" width="11" height="11" rx="2"/><rect x="4" y="4" width="11" height="11" rx="2"/></symbol>
    <symbol id="icon-download" viewBox="0 0 24 24"><path d="M12 3v12"/><path d="m7 10 5 5 5-5"/><path d="M5 21h14"/></symbol>
    <symbol id="icon-trash" viewBox="0 0 24 24"><path d="M3 6h18"/><path d="M8 6V4h8v2"/><path d="m19 6-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/></symbol>
    <symbol id="icon-save" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><path d="M17 21v-8H7v8"/><path d="M7 3v5h8"/></symbol>
    <symbol id="icon-whatsapp" viewBox="0 0 24 24"><path d="M20 11.6A8.4 8.4 0 0 1 7.6 19L4 20l1.1-3.5A8.4 8.4 0 1 1 20 11.6z"/><path d="M9.5 8.8c.3-.7.6-.7.9-.7h.7c.2 0 .5.1.6.5l.7 1.7c.1.2 0 .5-.1.7l-.5.6c.6 1 1.5 1.8 2.6 2.4l.6-.5c.2-.1.4-.2.7-.1l1.6.7c.3.1.5.3.5.6v.7c0 .3 0 .6-.7.9-.6.3-1.3.3-2 0-2.8-1.1-5.1-3.3-6.2-6.1-.3-.7-.3-1.4 0-2z"/></symbol>
</svg>

<nav class="is-dark">
    @include('public.partials.logo', ['mode' => 'light', 'class' => 'logo'])
    @include('public.partials.menu')
    <div class="nav-right">
        <button class="nav-btn" id="wa-reset-btn" type="button"><span class="ui-icon"><svg><use href="#icon-refresh"></use></svg></span>Reset</button>
        <button class="nav-btn wa" id="wa-open-nav-btn" type="button">Open in WhatsApp <span class="ui-icon"><svg><use href="#icon-arrow-up-right"></use></svg></span></button>
    </div>
    <button class="public-nav-toggle" type="button" aria-expanded="false" aria-controls="public-side-nav" aria-label="Open navigation">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

<div class="hero">
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-content">
        <div class="hero-eyebrow"><span class="hero-eyebrow-dot"></span>WhatsApp Link Generator</div>
        <h1 class="hero-title">Generate your WhatsApp<br>link in <em>seconds</em></h1>
        <p class="hero-sub">Create custom wa.me links with pre-filled messages, generate QR codes for print, and get embed code for your website, all in one place.</p>
    </div>
</div>

<div class="app-layout" id="wa-generator-app">
    <div class="form-panel">
        <div class="fp-card">
            <div class="fpc-head">
                <div class="fpc-icon"><svg><use href="#icon-phone"></use></svg></div>
                <div>
                    <div class="fpc-title">Phone Number</div>
                    <div class="fpc-sub">Enter the WhatsApp number to link to</div>
                </div>
            </div>
            <div class="fpc-body">
                <label class="fl field-block">Country Code + Number <span class="req">*</span></label>
                <div class="phone-row">
                    <select class="country-select" id="country-code">
                        <option value="234">+234 Nigeria</option>
                        <option value="44">+44 UK</option>
                        <option value="1">+1 USA / Canada</option>
                        <option value="233">+233 Ghana</option>
                        <option value="254">+254 Kenya</option>
                        <option value="27">+27 South Africa</option>
                        <option value="256">+256 Uganda</option>
                        <option value="255">+255 Tanzania</option>
                        <option value="251">+251 Ethiopia</option>
                        <option value="221">+221 Senegal</option>
                        <option value="237">+237 Cameroon</option>
                        <option value="20">+20 Egypt</option>
                        <option value="212">+212 Morocco</option>
                        <option value="225">+225 Ivory Coast</option>
                        <option value="49">+49 Germany</option>
                        <option value="33">+33 France</option>
                        <option value="971">+971 UAE</option>
                        <option value="91">+91 India</option>
                        <option value="65">+65 Singapore</option>
                    </select>
                    <input class="phone-input" type="tel" id="phone-number" placeholder="800 000 0000" maxlength="15">
                </div>
                <div class="field-row">
                    <div class="field">
                        <label class="fl">Display Label (optional)</label>
                        <input class="fi" type="text" id="display-label" placeholder="e.g. Sales Team, Support">
                    </div>
                    <div class="field">
                        <label class="fl">Agent / Name (optional)</label>
                        <input class="fi" type="text" id="agent-name" placeholder="e.g. Chidi, Support Bot">
                    </div>
                </div>
            </div>
        </div>

        <div class="fp-card">
            <div class="fpc-head">
                <div class="fpc-icon"><svg><use href="#icon-chat"></use></svg></div>
                <div>
                    <div class="fpc-title">Pre-filled Message</div>
                    <div class="fpc-sub">The message that opens in chat when someone clicks your link</div>
                </div>
            </div>
            <div class="fpc-body">
                <div class="template-block">
                    <label class="fl field-block">Quick Templates</label>
                    <div class="template-pills">
                        <button class="tpl-pill active" type="button" data-template="general">General Enquiry</button>
                        <button class="tpl-pill" type="button" data-template="quote">Get a Quote</button>
                        <button class="tpl-pill" type="button" data-template="appointment">Book Appointment</button>
                        <button class="tpl-pill" type="button" data-template="support">Customer Support</button>
                        <button class="tpl-pill" type="button" data-template="website">From Website</button>
                        <button class="tpl-pill" type="button" data-template="order">Place Order</button>
                        <button class="tpl-pill" type="button" data-template="none">No Message</button>
                    </div>
                </div>
                <div class="field">
                    <label class="fl">Message Text</label>
                    <textarea class="fi fi-textarea" id="wa-message" rows="4">Hi! I'd like to enquire about your services.</textarea>
                    <div class="char-counter" id="char-count">0 / 4,096 characters</div>
                </div>
            </div>
        </div>

        <div class="fp-card">
            <div class="fpc-head">
                <div class="fpc-icon"><svg><use href="#icon-cog"></use></svg></div>
                <div>
                    <div class="fpc-title">Link Options</div>
                    <div class="fpc-sub">Advanced settings for tracking and behaviour</div>
                </div>
            </div>
            <div class="fpc-body">
                <div class="toggle-row">
                    <div class="tr-left">
                        <div class="tr-label">Open in WhatsApp app (not web)</div>
                        <div class="tr-sub">Use wa.me instead of api.whatsapp.com</div>
                    </div>
                    <button class="toggle-switch on" id="toggle-app" type="button" aria-pressed="true"></button>
                </div>
                <div class="toggle-row">
                    <div class="tr-left">
                        <div class="tr-label">Add UTM tracking parameters</div>
                        <div class="tr-sub">Track clicks from different sources in analytics</div>
                    </div>
                    <button class="toggle-switch" id="toggle-utm" type="button" aria-pressed="false"></button>
                </div>
                <div id="utm-fields" class="utm-fields" hidden>
                    <div class="field-row">
                        <div class="field">
                            <label class="fl">UTM Source</label>
                            <input class="fi" type="text" id="utm-source" placeholder="e.g. website, instagram">
                        </div>
                        <div class="field">
                            <label class="fl">UTM Medium</label>
                            <input class="fi" type="text" id="utm-medium" placeholder="e.g. button, footer, bio">
                        </div>
                    </div>
                    <div class="field-row single">
                        <div class="field">
                            <label class="fl">UTM Campaign</label>
                            <input class="fi" type="text" id="utm-campaign" placeholder="e.g. summer-promo, launch">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fp-card">
            <div class="fpc-head">
                <div class="fpc-icon"><svg><use href="#icon-pin"></use></svg></div>
                <div>
                    <div class="fpc-title">Saved Links</div>
                    <div class="fpc-sub">Click a saved link to load it</div>
                </div>
            </div>
            <div class="fpc-body">
                <div class="saved-list" id="saved-list"></div>
                <button class="save-current-btn" id="save-current-btn" type="button"><span class="ui-icon"><svg><use href="#icon-save"></use></svg></span>Save current link</button>
            </div>
        </div>
    </div>

    <div class="output-panel">
        <div class="op-card">
            <div class="op-tabs" role="tablist">
                <button class="op-tab active" type="button" data-tab="link"><span class="ui-icon"><svg><use href="#icon-link"></use></svg></span>Link</button>
                <button class="op-tab" type="button" data-tab="qr"><span class="ui-icon"><svg><use href="#icon-qr"></use></svg></span>QR Code</button>
                <button class="op-tab" type="button" data-tab="embed"><span class="ui-icon"><svg><use href="#icon-code"></use></svg></span>Embed</button>
                <button class="op-tab" type="button" data-tab="preview"><span class="ui-icon"><svg><use href="#icon-eye"></use></svg></span>Preview</button>
            </div>

            <div class="op-pane active" id="pane-link">
                <div class="pane-label">Generated Link</div>
                <div class="link-display" id="link-display">
                    <span class="ld-base">wa.me/</span><span class="ld-phone" id="ld-phone">234XXXXXXXXXX</span><span class="ld-param" id="ld-param"></span>
                </div>
                <div class="link-url-plain" id="link-url-plain">Fill in your phone number to generate your link</div>
                <div class="out-btn-row">
                    <button class="out-btn copy" id="copy-link-btn" type="button"><span class="ui-icon"><svg><use href="#icon-copy"></use></svg></span><span>Copy Link</span></button>
                    <button class="out-btn open-wa" id="open-wa-btn" type="button">Open WhatsApp <span class="ui-icon"><svg><use href="#icon-arrow-up-right"></use></svg></span></button>
                    <button class="out-btn save-link" id="save-link-btn" type="button"><span class="ui-icon"><svg><use href="#icon-pin"></use></svg></span>Save</button>
                </div>
                <div class="op-divider"></div>
                <div class="variants-wrap">
                    <div class="variants-title">Link Variants</div>
                    <div class="variant-row"><span class="vr-label" id="var-wame">wa.me/...</span><button class="vr-btn" type="button" data-variant="wame">Copy</button></div>
                    <div class="variant-row"><span class="vr-label" id="var-api">api.whatsapp.com/...</span><button class="vr-btn" type="button" data-variant="api">Copy</button></div>
                    <div class="variant-row"><span class="vr-label" id="var-short">wa.link/... (shorten via bit.ly)</span><button class="vr-btn" id="shorten-btn" type="button">Shorten <span class="ui-icon"><svg><use href="#icon-arrow-up-right"></use></svg></span></button></div>
                </div>
            </div>

            <div class="op-pane" id="pane-qr">
                <div class="pane-label">QR Code</div>
                <div class="qr-container" id="qr-container">
                    <img class="qr-img" id="qr-img" alt="QR Code" hidden>
                    <div id="qr-placeholder" class="qr-placeholder">Enter phone number to generate QR code</div>
                    <div class="qr-label" id="qr-label">Scan to open WhatsApp chat</div>
                </div>
                <div class="qr-size-row">
                    <button class="qr-size-btn" type="button" data-size="150">Small</button>
                    <button class="qr-size-btn active" type="button" data-size="200">Medium</button>
                    <button class="qr-size-btn" type="button" data-size="300">Large</button>
                    <button class="qr-size-btn" type="button" data-size="500">Print</button>
                </div>
                <div class="out-btn-row">
                    <button class="out-btn copy" id="download-qr-btn" type="button"><span class="ui-icon"><svg><use href="#icon-download"></use></svg></span>Download PNG</button>
                    <button class="out-btn copy" id="copy-qr-url-btn" type="button"><span class="ui-icon"><svg><use href="#icon-copy"></use></svg></span>Copy Image URL</button>
                </div>
                <div class="qr-note">QR codes can be printed on business cards, flyers, posters, and menus. Anyone who scans it will open a WhatsApp chat with your pre-filled message.</div>
            </div>

            <div class="op-pane" id="pane-embed">
                <div class="pane-label">Embed Style</div>
                <div class="embed-style-grid">
                    <button class="embed-style-card selected" type="button" data-style="float">
                        <div class="esc-preview"><div class="prev-float"><span class="ui-icon"><svg><use href="#icon-whatsapp"></use></svg></span></div></div>
                        <div class="esc-label">Floating</div>
                    </button>
                    <button class="embed-style-card" type="button" data-style="inline">
                        <div class="esc-preview"><div class="prev-inline"><span class="ui-icon"><svg><use href="#icon-whatsapp"></use></svg></span>Chat Now</div></div>
                        <div class="esc-label">Button</div>
                    </button>
                    <button class="embed-style-card" type="button" data-style="banner">
                        <div class="esc-preview"><div class="prev-banner"><div class="prev-banner-dot"><span class="ui-icon"><svg><use href="#icon-whatsapp"></use></svg></span></div><div class="prev-banner-text"><div class="prev-banner-line wide"></div><div class="prev-banner-line short"></div></div></div></div>
                        <div class="esc-label">Banner</div>
                    </button>
                </div>
                <div class="pane-label secondary">HTML Code</div>
                <div class="code-block" id="embed-code-block"><!-- Select a style above --></div>
                <div class="out-btn-row">
                    <button class="out-btn copy" id="copy-embed-btn" type="button"><span class="ui-icon"><svg><use href="#icon-copy"></use></svg></span><span>Copy HTML</span></button>
                </div>
                <div class="embed-note">Paste this code into your website HTML. The floating button appears fixed in the bottom-right corner. The inline button can be placed anywhere in your content.</div>
            </div>

            <div class="op-pane" id="pane-preview">
                <div class="pane-label">WhatsApp Chat Preview</div>
                <div class="phone-mockup">
                    <div class="wa-chat-preview">
                        <div class="wa-chat-header">
                            <div class="wch-avatar"><span class="ui-icon"><svg><use href="#icon-whatsapp"></use></svg></span></div>
                            <div class="wch-info">
                                <div class="wch-name" id="prev-name">Business Name</div>
                                <div class="wch-status">online</div>
                            </div>
                        </div>
                        <div class="wa-chat-body">
                            <div class="wa-bubble">
                                <div class="wa-bubble-text" id="prev-msg">Hi! I'd like to enquire about your services.</div>
                                <div class="wa-bubble-time" id="prev-time">Just now</div>
                            </div>
                        </div>
                        <div class="wa-chat-input">
                            <div class="wci-input">Type a message...</div>
                            <div class="wci-send"><span class="ui-icon"><svg><use href="#icon-arrow-up-right"></use></svg></span></div>
                        </div>
                    </div>
                </div>
                <div class="pane-label secondary">Website Floating Button Preview</div>
                <div class="float-preview">
                    <div class="fp-website-dummy">
                        <div class="fpwd-line wide"></div>
                        <div class="fpwd-line med"></div>
                        <div class="fpwd-line"></div>
                    </div>
                    <button class="fp-float-btn" type="button" id="preview-float-btn"><span class="ui-icon"><svg><use href="#icon-whatsapp"></use></svg></span></button>
                </div>
                <div class="preview-note">This is how the floating WhatsApp button will appear in the bottom-right corner of your website when visitors scroll the page.</div>
            </div>
        </div>
    </div>
</div>

<section class="seo-content" aria-label="About this WhatsApp link generator">
  <div class="seo-content-inner">

    <div class="seo-section">
      <span class="seo-section-eyebrow">ABOUT THIS TOOL</span>
      <h2>About this free WhatsApp link generator</h2>
      <p>This free WhatsApp link generator lets you create a wa.me click-to-chat link in seconds — no coding, no sign-up, no cost. Enter your WhatsApp number, add an optional pre-filled message, and this WhatsApp link generator produces a shareable URL, a downloadable QR code, and embeddable website button code all at once.</p>
      <p>A WhatsApp link (also called a wa.me link or WhatsApp chat link) allows anyone to start a conversation with your WhatsApp number by clicking a URL — without saving your contact first. This WhatsApp link generator also supports UTM tracking so you can measure clicks from different placements in Google Analytics.</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/><line x1="8" y1="12" x2="16" y2="12"/></svg></div>
          <div class="cfc-title">WhatsApp Click-to-Chat Link</div>
          <div class="cfc-desc">Generate a wa.me link that opens a WhatsApp conversation directly. Works on any device — tap the link, WhatsApp opens, the chat begins.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></div>
          <div class="cfc-title">WhatsApp QR Code Generator</div>
          <div class="cfc-desc">Create a WhatsApp QR code for business cards, flyers, packaging, and posters. Download in four sizes including print-quality 500px PNG.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
          <div class="cfc-title">WhatsApp Chat Button</div>
          <div class="cfc-desc">Get embed HTML for a floating WhatsApp chat button or an inline button — add it to any website without a plugin or developer.</div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">HOW TO USE</span>
      <h2>How to generate a WhatsApp link in four steps</h2>
      <p>Using this WhatsApp link generator takes under a minute. Everything runs in your browser — no account needed, nothing is stored on a server.</p>
      <div class="why-list">
        <div class="why-item">
          <div class="why-num">1</div>
          <div class="why-body">
            <div class="why-body-title">Enter your WhatsApp number</div>
            <div class="why-body-desc">Select your country code and type your WhatsApp phone number. The generator formats it to the international E.164 standard required by the wa.me URL format.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">2</div>
          <div class="why-body">
            <div class="why-body-title">Add a pre-filled WhatsApp message</div>
            <div class="why-body-desc">Choose from seven message templates or write your own. The pre-filled text appears in the WhatsApp chat box when someone clicks your link — one tap and it's ready to send.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">3</div>
          <div class="why-body">
            <div class="why-body-title">Configure your WhatsApp link options</div>
            <div class="why-body-desc">Switch between wa.me and api.whatsapp.com link formats, and toggle UTM tracking to add source, medium, and campaign parameters to your WhatsApp link URL.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">4</div>
          <div class="why-body">
            <div class="why-body-title">Copy the link, QR code, or embed code</div>
            <div class="why-body-desc">Copy your generated WhatsApp link, download the WhatsApp QR code at your chosen size, or grab the HTML embed code for a floating or inline WhatsApp button on your website.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">WHAT YOU CAN GENERATE</span>
      <h2>What this WhatsApp link generator creates for you</h2>
      <p>This WhatsApp link generator is more than a basic wa.me URL builder. It creates every format you need — shareable links, scannable QR codes, website chat buttons, and trackable WhatsApp URLs with UTM parameters.</p>
      <div class="checks-feature-grid">
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
          <div class="cfc-title">Pre-filled WhatsApp Message</div>
          <div class="cfc-desc">Encode up to 4,096 characters into your WhatsApp link. Choose from seven templates — general enquiry, quote, booking, support, website referral, order, or blank.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>
          <div class="cfc-title">International Number Format</div>
          <div class="cfc-desc">19 country codes pre-loaded. Your WhatsApp link is built with the correct international dialling format — no manual E.164 formatting required.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg></div>
          <div class="cfc-title">Saved WhatsApp Links</div>
          <div class="cfc-desc">Save multiple WhatsApp links locally — different numbers, departments, or agents. Label each one and reload any saved WhatsApp link instantly.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
          <div class="cfc-title">UTM-Tagged WhatsApp Link</div>
          <div class="cfc-desc">Generate a trackable WhatsApp link with UTM source, medium, and campaign. Monitor WhatsApp link clicks in Google Analytics by placement or campaign.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><path d="M21 2v6h-6"/><path d="M3 12a9 9 0 0 1 15-6.7L21 8"/><path d="M3 22v-6h6"/><path d="M21 12a9 9 0 0 1-15 6.7L3 16"/></svg></div>
          <div class="cfc-title">wa.me or api.whatsapp.com</div>
          <div class="cfc-desc">Toggle between the wa.me link format (opens WhatsApp app) and api.whatsapp.com format (opens in browser). Both generated from the same WhatsApp link generator form.</div>
        </div>
        <div class="check-feature-card">
          <div class="cfc-icon"><svg viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg></div>
          <div class="cfc-title">WhatsApp QR Code Sizes</div>
          <div class="cfc-desc">Generate your WhatsApp QR code at four sizes: Small (150px), Medium (200px), Large (300px), and Print (500px). Download as PNG for any use case.</div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">WHY IT MATTERS</span>
      <h2>Why your business needs a WhatsApp link — not just a phone number</h2>
      <p>Displaying a WhatsApp number and expecting customers to save it and message you manually loses leads. A WhatsApp link generator removes every step between seeing your contact and starting a conversation.</p>
      <div class="why-list">
        <div class="why-item">
          <div class="why-num">1</div>
          <div class="why-body">
            <div class="why-body-title">A WhatsApp link removes the contact-saving step</div>
            <div class="why-body-desc">Your WhatsApp chat link opens a conversation instantly — no saving, no dialling, no copying. Anyone who taps it is one step away from messaging you.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">2</div>
          <div class="why-body">
            <div class="why-body-title">A pre-filled WhatsApp message converts better</div>
            <div class="why-body-desc">A WhatsApp link with a message template tells you what the lead wants before they send anything. Less friction for them, more context for you, better first response.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">3</div>
          <div class="why-body">
            <div class="why-body-title">One WhatsApp link works across every channel</div>
            <div class="why-body-desc">The same wa.me link belongs in your Instagram bio, email footer, Google Business Profile, business card, and website. Generate once, deploy everywhere.</div>
          </div>
        </div>
        <div class="why-item">
          <div class="why-num">4</div>
          <div class="why-body">
            <div class="why-body-title">UTM tracking reveals which WhatsApp links convert</div>
            <div class="why-body-desc">Generate a separate UTM-tagged WhatsApp link for each channel. See in Google Analytics exactly which placements and campaigns actually drive WhatsApp conversations.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">COMMON MISTAKES</span>
      <h2>Why your WhatsApp link is not working — and how to fix it</h2>
      <p>Most broken WhatsApp links come down to one of these issues. Use this WhatsApp link generator to avoid them — all formatting is handled automatically.</p>
      <div class="issues-feature-grid">
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">Missing country code in the WhatsApp link</div>
            <div class="ifi-desc">A wa.me link requires the full international number (e.g. +234 for Nigeria, +44 for UK). A local number without the country code produces a broken WhatsApp link.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot"></div>
          <div>
            <div class="ifi-title">Spaces or dashes in the wa.me URL</div>
            <div class="ifi-desc">WhatsApp link URLs require digits only. Spaces, dashes, or brackets in the number break the wa.me link silently — it opens WhatsApp but to the wrong or no number.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">No message in the WhatsApp chat link</div>
            <div class="ifi-desc">A WhatsApp click-to-chat link without a pre-filled message opens a blank chat. Adding a short opening message significantly increases the conversion from click to conversation.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot warn"></div>
          <div>
            <div class="ifi-title">Linking to a personal WhatsApp number</div>
            <div class="ifi-desc">Using a personal number in your WhatsApp business link mixes customer enquiries with personal messages. Use a dedicated WhatsApp Business number for any public-facing link.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">No UTM parameters on the WhatsApp link</div>
            <div class="ifi-desc">A WhatsApp link without UTM tracking provides no data on where clicks come from. Generate separate UTM-tagged WhatsApp links for each placement to measure performance.</div>
          </div>
        </div>
        <div class="issue-feature-item">
          <div class="ifi-dot info"></div>
          <div>
            <div class="ifi-title">WhatsApp QR code too small to scan</div>
            <div class="ifi-desc">A WhatsApp QR code printed below 2cm × 2cm won't scan on most phones. Use the Print (500px) size from this WhatsApp QR code generator for any physical material.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">WHO USES THIS TOOL</span>
      <h2>Who uses a WhatsApp link generator</h2>
      <p>Anyone who wants customers to reach them on WhatsApp without friction uses a WhatsApp link generator. Here are the most common use cases.</p>
      <div class="who-grid">
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
          <div class="who-title">E-commerce Sellers</div>
          <div class="who-desc">Add a WhatsApp link for business to every product page, order confirmation, and packaging — customers tap to ask about orders, returns, or delivery status.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg></div>
          <div class="who-title">Service Businesses</div>
          <div class="who-desc">Consultants, agencies, and clinics use a WhatsApp link on their website and proposals so leads can message directly without saving a number or filling out a form.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg></div>
          <div class="who-title">Social Media Managers</div>
          <div class="who-desc">Place a WhatsApp link in the Instagram bio, Facebook page button, or TikTok profile link so followers can start a WhatsApp chat without leaving the app.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg></div>
          <div class="who-title">Print & Events Teams</div>
          <div class="who-desc">Generate a WhatsApp QR code for business cards, flyers, event stands, and packaging. Anyone who scans it opens a WhatsApp chat — no URL to type.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></div>
          <div class="who-title">Freelancers</div>
          <div class="who-desc">Share a wa.me link in portfolios, proposals, and email signatures instead of a phone number — clients tap to WhatsApp without saving the contact first.</div>
        </div>
        <div class="who-card">
          <div class="who-icon"><svg viewBox="0 0 24 24"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4 19-7z"/></svg></div>
          <div class="who-title">Marketing Teams</div>
          <div class="who-desc">Create a unique UTM-tagged WhatsApp link for each campaign — website, email, Instagram, and print — to track which channel drives WhatsApp conversations.</div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">AFTER YOU GENERATE</span>
      <h2>Where to use your generated WhatsApp link</h2>
      <p>Once you generate your WhatsApp link, use it across every customer touchpoint. A WhatsApp chat link placed in the right locations can replace contact forms, phone numbers, and live chat widgets.</p>
      <div class="steps-list">
        <div class="step-item">
          <div class="step-num">01</div>
          <div>
            <div class="step-title">Add a WhatsApp button to your website</div>
            <div class="step-desc">Use the Embed tab to copy a floating WhatsApp chat button or an inline button. Paste into your site's HTML — no plugin needed, works on any CMS or page builder.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">02</div>
          <div>
            <div class="step-title">Set it as your Instagram and social bio link</div>
            <div class="step-desc">Replace your bio link with your WhatsApp link URL on Instagram, Facebook, LinkedIn, and TikTok. Followers tap once and open a WhatsApp chat — no app switching, no friction.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">03</div>
          <div>
            <div class="step-title">Print the WhatsApp QR code on marketing materials</div>
            <div class="step-desc">Download your WhatsApp QR code at Print (500px) quality and place it on business cards, flyers, menus, packaging, and event signage for instant offline-to-chat engagement.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">04</div>
          <div>
            <div class="step-title">Add your WhatsApp link to your email signature</div>
            <div class="step-desc">Include a WhatsApp chat link in your email signature so every email you send gives the recipient a direct tap-to-chat option without them saving your number.</div>
          </div>
        </div>
        <div class="step-item">
          <div class="step-num">05</div>
          <div>
            <div class="step-title">Track WhatsApp link clicks with UTM parameters</div>
            <div class="step-desc">Generate a separate UTM-tagged WhatsApp link for each placement. Use Google Analytics to compare which channels — website, email, print, or social — drive the most WhatsApp conversations.</div>
          </div>
        </div>
      </div>
    </div>

    <div class="seo-section">
      <span class="seo-section-eyebrow">COMPARE</span>
      <h2>Free WhatsApp link generator vs a professionally managed WhatsApp setup</h2>
      <p>This free WhatsApp link generator covers the essentials — create a WhatsApp link, generate a WhatsApp QR code, and embed a chat button. A professionally managed setup adds automation, broadcasting, and analytics on top.</p>
      <div class="tools-compare-wrapper">
      <table class="compare-table">
        <thead>
          <tr>
            <th>Feature</th>
            <th>This Tool</th>
            <th>WhatsApp Business App</th>
            <th class="highlight">Managed Setup (i2Medier)</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Click-to-chat link</td><td class="yes">✓</td><td class="partial">Manual</td><td class="yes">✓</td></tr>
          <tr><td>Pre-filled message templates</td><td class="yes">✓</td><td class="no">—</td><td class="yes">✓</td></tr>
          <tr><td>QR code for print</td><td class="yes">✓</td><td class="no">—</td><td class="yes">✓</td></tr>
          <tr><td>UTM tracking support</td><td class="yes">✓</td><td class="no">—</td><td class="yes">✓</td></tr>
          <tr><td>Website embed code</td><td class="yes">✓</td><td class="no">—</td><td class="yes">✓</td></tr>
          <tr><td>Verified business profile</td><td class="no">—</td><td class="yes">✓</td><td class="yes">✓</td></tr>
          <tr><td>Automated greetings & quick replies</td><td class="no">—</td><td class="yes">✓</td><td class="yes">✓</td></tr>
          <tr><td>Broadcast campaigns</td><td class="no">—</td><td class="partial">Limited</td><td class="yes">✓</td></tr>
          <tr><td>Analytics & reporting</td><td class="no">—</td><td class="no">—</td><td class="yes">✓</td></tr>
          <tr><td>Dedicated number management</td><td class="no">—</td><td class="no">—</td><td class="yes">✓</td></tr>
        </tbody>
      </table>
      </div>
    </div>

  </div>
</section>

<section class="service-cta">
  <span class="service-cta-eyebrow">&#9733; READY TO GO FURTHER?</span>
  <h2>Get a <em>professionally managed</em><br>WhatsApp presence</h2>
  <p>A link gets you started. A full WhatsApp Business setup — verified profile, automated replies, broadcast campaigns, and analytics — keeps you competitive.</p>
  <div class="service-pills">
    <span class="service-pill">WhatsApp Marketing</span>
    <span class="service-pill">Chatbot Setup</span>
    <span class="service-pill">Campaign Management</span>
    <span class="service-pill">Analytics Reporting</span>
  </div>
  <div class="cta-buttons">
    <a href="{{ route('site.start') }}" class="cta-btn-primary">Start a Project →</a>
    <a href="{{ route('tools.website-brief-generator') }}" class="cta-btn-secondary">Try Another Tool</a>
  </div>
</section>

<section class="faq-section">
  <div class="faq-inner">
    <div class="faq-header">
      <span class="seo-section-eyebrow">FAQ</span>
      <h2>Frequently asked questions</h2>
      <p>Everything you need to know about WhatsApp links, QR codes, and embedding chat buttons on your website.</p>
    </div>
    <div class="faq-list">
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wlg-f1">
          <span class="faq-q-text">What is a WhatsApp click-to-chat link?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wlg-f1">A wa.me link is a URL that opens a WhatsApp conversation with a specific number when clicked. The person clicking does not need to save your contact first. Add a pre-filled message and the opening line of every chat is already written — all they do is hit send.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wlg-f2">
          <span class="faq-q-text">Do I need WhatsApp Business for this to work?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wlg-f2">No. The link works with both the standard WhatsApp app and WhatsApp Business. Any number active on WhatsApp can receive messages through a click-to-chat link, regardless of which app version you use.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wlg-f3">
          <span class="faq-q-text">Can I track clicks on my WhatsApp link?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wlg-f3">Yes. Enable UTM tracking in the Link Options panel and add your source, medium, and campaign values. The parameters are appended to the URL so you can monitor clicks in Google Analytics or any UTM-aware analytics tool.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wlg-f4">
          <span class="faq-q-text">Does the WhatsApp link expire?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wlg-f4">No. WhatsApp click-to-chat links do not expire. The link stays active as long as the phone number is registered on WhatsApp. You only need a new link if your number changes.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wlg-f5">
          <span class="faq-q-text">How do I add the WhatsApp button to my website?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wlg-f5">Switch to the Embed tab in the output panel. Choose Floating (a fixed bottom-right button), Button (an inline link), or Banner. Copy the HTML and paste it into your site's code, CMS, or page builder — no plugin required.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wlg-f6">
          <span class="faq-q-text">Can I save multiple links for different numbers or campaigns?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wlg-f6">Yes. Use the Save button in the output panel to store the current link in your browser's local storage. You can save multiple links — for different numbers, departments, or UTM campaigns — and reload any of them instantly.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="wlg-f7">
          <span class="faq-q-text">What QR code size should I use for print?</span>
          <span class="faq-arrow">›</span>
        </button>
        <div class="faq-a" id="wlg-f7">Use the Print (500px) option for any physical material. Printed QR codes should be at least 2cm × 2cm to scan reliably on most smartphone cameras. For digital use — websites, emails, or social posts — Medium (200px) is sufficient.</div>
      </div>
    </div>
  </div>
</section>

<div id="toast"></div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-whatsapp-link-generator.js')
@endpush
