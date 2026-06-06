@extends('public.layouts.nametool')

@section('title', 'WhatsApp Link Generator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/whatsapp-link-generator.css')
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

<nav>
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

<div id="toast"></div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-whatsapp-link-generator.js')
@endpush
