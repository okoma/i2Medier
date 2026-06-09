@extends('public.layouts.invoicetool')

@section('title', 'Free Invoice Generator — PDF Invoices in Minutes | i2Medier')

@push('meta')
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
            'name' => 'Free Invoice Generator',
            'item' => route('tools.invoice-generator'),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'Is this invoice generator completely free?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes — completely free with no account, no email signup, and no watermarks. Everything runs in your browser; your data never leaves your device.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'How do I download my invoice as a PDF?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Click the "Print / Save PDF" button. Your browser opens the print dialog — select "Save as PDF" as the destination and click Save. The output is clean, formatted to A4, with no toolbars or browser chrome.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Can I save my invoices and come back to them later?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes. Click "Save Draft" and your invoice is saved to your browser\'s local storage. You can reload it from the Saved Invoices section any time. Note: clearing your browser data will delete saved invoices, so keep PDF copies for permanent records.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'What currencies does the tool support?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'The tool supports Nigerian Naira (₦ NGN), US Dollar ($ USD), British Pound (£ GBP), Euro (€ EUR), Ghanaian Cedi (₵ GHS), Kenyan Shilling (KES), South African Rand (ZAR), CFA Franc (XOF), and Canadian Dollar (CAD).',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'How do I add VAT to my invoice?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'In the Taxes & Discount section on the left panel, enter your tax rate as a percentage. You can also customize the tax label (VAT, GST, WHT). The tax is calculated automatically based on the subtotal minus any discount.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Can I use this for recurring invoices?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes. Save your invoice as a draft, then each billing period load it, update the invoice number and date, adjust any line items, and re-export. This workflow is ideal for retainer clients or subscription-style services.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'Is this invoice legally valid?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Yes. It contains all the required elements for a legally valid business invoice in most countries — invoice number, date, itemized amounts, tax, and payment terms. For country-specific compliance (e.g. UK VAT registration numbers, Nigerian TIN/FIRS, Australian ABN), simply add those details to your sender information or notes field.',
            ],
        ],
        [
            '@type' => 'Question',
            'name' => 'What\'s the difference between an invoice and a proforma invoice?',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'A standard invoice requests payment for work already completed. A proforma invoice is a preliminary bill sent before work begins — essentially a formal quote in invoice format. You can use this tool for both by labelling it accordingly in the notes or title area.',
            ],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('page_css')
    @vite('resources/css/public/pages/invoice-generator.css')
@endpush

@section('body_attrs')
id="invoice-generator-page"
data-print-route="{{ route('tools.invoice-generator.print') }}"
@endsection

@section('content')
<nav class="is-dark">
    @include('public.partials.logo', ['mode' => 'light', 'class' => 'logo'])
    @include('public.partials.menu')
    <div class="nav-right">
        <button class="nav-status draft" id="status-btn" onclick="cycleStatus()"><span class="icon-dot" aria-hidden="true"></span><span>Draft</span></button>
        <button class="nav-btn" onclick="loadSaved()"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 7.5A1.5 1.5 0 0 1 5.5 6H10l2 2h6.5A1.5 1.5 0 0 1 20 9.5v8A1.5 1.5 0 0 1 18.5 19h-13A1.5 1.5 0 0 1 4 17.5z"/><path d="M4 10h16"/></svg></span><span>Load</span></button>
        <button class="nav-btn primary nav-btn--desktop-print" onclick="printInvoice()"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3v11"/><path d="m7 10 5 5 5-5"/><path d="M5 19h14"/></svg></span><span>Print / Save PDF</span></button>
    </div>
    <button class="public-nav-toggle" type="button" aria-expanded="false" aria-controls="public-side-nav" aria-label="Open navigation">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

<div class="app">
    <div class="form-panel" id="form-panel">
        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 20V7l8-3 8 3v13"/><path d="M9 20v-5h6v5"/><path d="M8 10h.01"/><path d="M16 10h.01"/><path d="M8 13h.01"/><path d="M16 13h.01"/></svg></span> From (Sender)</span>
                <span class="fp-section-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span>
            </div>
            <div class="fp-body open">
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Business Name</label><input class="fp-input" id="from-name" value="i2Medier Konceptz" oninput="render()"/></div></div>
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Address</label><input class="fp-input" id="from-address" value="15 Rumuola Road" oninput="render()"/></div></div>
                <div class="fp-row"><div class="fp-field"><label class="fp-label">City / State</label><input class="fp-input" id="from-city" value="Port Harcourt, Rivers State" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Country</label><input class="fp-input" id="from-country" value="Nigeria" oninput="render()"/></div></div>
                <div class="fp-row"><div class="fp-field"><label class="fp-label">Email</label><input class="fp-input" id="from-email" value="letstalk@i2medier.com" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Phone</label><input class="fp-input" id="from-phone" value="+234 805 218 8396" oninput="render()"/></div></div>
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Website</label><input class="fp-input" id="from-website" value="i2medier.com" oninput="render()"/></div></div>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M5 20a7 7 0 0 1 14 0"/></svg></span> Bill To (Client)</span>
                <span class="fp-section-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span>
            </div>
            <div class="fp-body open">
                <div class="fp-row"><div class="fp-field"><label class="fp-label">Client Name</label><input class="fp-input" id="to-name" placeholder="e.g. Chidi Emmanuel" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Company</label><input class="fp-input" id="to-company" placeholder="e.g. Apex Solutions" oninput="render()"/></div></div>
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Address</label><input class="fp-input" id="to-address" placeholder="Street address" oninput="render()"/></div></div>
                <div class="fp-row"><div class="fp-field"><label class="fp-label">City / State</label><input class="fp-input" id="to-city" placeholder="City, State" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Country</label><input class="fp-input" id="to-country" placeholder="Country" oninput="render()"/></div></div>
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Client Email</label><input class="fp-input" id="to-email" placeholder="client@company.com" oninput="render()"/></div></div>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M7 3h7l5 5v13H7z"/><path d="M14 3v5h5"/><path d="M10 13h6"/><path d="M10 17h6"/><path d="M10 9h2"/></svg></span> Invoice Details</span>
                <span class="fp-section-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span>
            </div>
            <div class="fp-body open">
                <div class="fp-row"><div class="fp-field"><label class="fp-label">Invoice Number</label><input class="fp-input" id="inv-number" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Currency</label><select class="fp-input" id="inv-currency" onchange="render()">
  <optgroup label="Major">
    <option value="NGN">₦ NGN — Nigerian Naira</option>
    <option value="USD">$ USD — US Dollar</option>
    <option value="GBP">£ GBP — British Pound</option>
    <option value="EUR">€ EUR — Euro</option>
    <option value="CAD">CA$ CAD — Canadian Dollar</option>
    <option value="AUD">A$ AUD — Australian Dollar</option>
    <option value="CHF">Fr CHF — Swiss Franc</option>
    <option value="JPY">¥ JPY — Japanese Yen</option>
    <option value="INR">₹ INR — Indian Rupee</option>
    <option value="SGD">S$ SGD — Singapore Dollar</option>
    <option value="AED">AED — UAE Dirham</option>
    <option value="SAR">SR SAR — Saudi Riyal</option>
  </optgroup>
  <optgroup label="Africa">
    <option value="GHS">₵ GHS — Ghanaian Cedi</option>
    <option value="KES">KSh KES — Kenyan Shilling</option>
    <option value="ZAR">R ZAR — South African Rand</option>
    <option value="UGX">USh UGX — Ugandan Shilling</option>
    <option value="TZS">TSh TZS — Tanzanian Shilling</option>
    <option value="ZMW">ZK ZMW — Zambian Kwacha</option>
    <option value="ETB">Br ETB — Ethiopian Birr</option>
    <option value="EGP">E£ EGP — Egyptian Pound</option>
    <option value="MAD">MAD — Moroccan Dirham</option>
    <option value="XOF">CFA XOF — West African Franc</option>
    <option value="XAF">FCFA XAF — Central African Franc</option>
    <option value="ZWG">ZiG ZWG — Zimbabwe Gold</option>
  </optgroup>
  <optgroup label="Americas">
    <option value="BRL">R$ BRL — Brazilian Real</option>
    <option value="MXN">MX$ MXN — Mexican Peso</option>
  </optgroup>
</select></div></div>
                <div class="fp-row"><div class="fp-field"><label class="fp-label">Invoice Date</label><input class="fp-input" type="date" id="inv-date" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Due Date</label><input class="fp-input" type="date" id="inv-due" oninput="render()"/></div></div>
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Purchase Order / Ref (optional)</label><input class="fp-input" id="inv-po" placeholder="e.g. PO-2024-100" oninput="render()"/></div></div>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M7 3h10v18l-2-1-2 1-2-1-2 1-2-1z"/><path d="M9 8h6"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span> Line Items</span>
                <span class="fp-section-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span>
            </div>
            <div class="fp-body open">
                <div class="items-list" id="items-list"></div>
                <button class="add-item-btn" onclick="addItem()"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span><span>Add Line Item</span></button>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M17 6.5c0-1.93-2.24-3.5-5-3.5S7 4.57 7 6.5 9.24 10 12 10s5 1.57 5 3.5-2.24 3.5-5 3.5-5-1.57-5-3.5"/></svg></span> Taxes & Discount</span>
                <span class="fp-section-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span>
            </div>
            <div class="fp-body open">
                <div class="fp-row"><div class="fp-field"><label class="fp-label">Tax Label</label><input class="fp-input" id="tax-label" value="VAT" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Tax Rate (%)</label><input class="fp-input" type="number" id="tax-rate" value="7.5" min="0" max="100" oninput="render()"/></div></div>
                <div class="fp-row">
                    <div class="fp-field">
                        <label class="fp-label">Discount Type</label>
                        <div style="display:flex;gap:.4rem">
                            <button class="disc-type-btn active" id="disc-flat-btn" onclick="setDiscType('flat')"><span id="disc-flat-symbol">₦</span> Flat</button>
                            <button class="disc-type-btn" id="disc-pct-btn" onclick="setDiscType('percent')">% Percent</button>
                        </div>
                    </div>
                    <div class="fp-field"><label class="fp-label">Discount Value</label><input class="fp-input" type="number" id="disc-value" value="0" min="0" oninput="render()"/></div>
                </div>
                <div class="form-total-block" id="form-total-block"></div>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M3 10 12 4l9 6"/><path d="M5 10v9"/><path d="M19 10v9"/><path d="M9 10v9"/><path d="M15 10v9"/><path d="M3 19h18"/></svg></span> Payment Details</span>
                <span class="fp-section-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span>
            </div>
            <div class="fp-body open">
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Bank Name</label><input class="fp-input" id="bank-name" placeholder="e.g. First Bank Nigeria" oninput="render()"/></div></div>
                <div class="fp-row"><div class="fp-field"><label class="fp-label">Account Name</label><input class="fp-input" id="bank-acct-name" placeholder="e.g. i2Medier Konceptz" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Account Number</label><input class="fp-input" id="bank-acct-num" placeholder="0123456789" oninput="render()"/></div></div>
                <div class="fp-row"><div class="fp-field"><label class="fp-label">Sort Code / SWIFT</label><input class="fp-input" id="bank-sort" placeholder="Optional" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Payment Reference</label><input class="fp-input" id="bank-ref" placeholder="Optional" oninput="render()"/></div></div>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3a9 9 0 1 0 0 18h1.2a2.8 2.8 0 0 0 0-5.6H12a2 2 0 0 1 0-4h2.4A6.6 6.6 0 0 0 21 6.8 3.8 3.8 0 0 0 17.2 3z"></path><circle cx="7.5" cy="10" r=".8" fill="currentColor" stroke="none"></circle><circle cx="9.5" cy="7.5" r=".8" fill="currentColor" stroke="none"></circle><circle cx="13" cy="7" r=".8" fill="currentColor" stroke="none"></circle><circle cx="16" cy="9.5" r=".8" fill="currentColor" stroke="none"></circle></svg></span> Invoice Colors</span>
                <span class="fp-section-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span>
            </div>
            <div class="fp-body open">
                <div class="fp-field" style="margin-bottom:.85rem">
                    <label class="fp-label">Header Background</label>
                    <div class="theme-grid">
                        <button class="theme-chip selected" type="button" data-theme-target="header" data-theme-value="#0d0d0d" onclick="setHeaderTheme('#0d0d0d')"><span class="theme-swatch" style="background:#0d0d0d"></span>Classic Black</button>
                        <button class="theme-chip" type="button" data-theme-target="header" data-theme-value="#111827" onclick="setHeaderTheme('#111827')"><span class="theme-swatch" style="background:#111827"></span>Midnight</button>
                        <button class="theme-chip" type="button" data-theme-target="header" data-theme-value="#1f2937" onclick="setHeaderTheme('#1f2937')"><span class="theme-swatch" style="background:#1f2937"></span>Slate</button>
                        <button class="theme-chip" type="button" data-theme-target="header" data-theme-value="#0f3d3e" onclick="setHeaderTheme('#0f3d3e')"><span class="theme-swatch" style="background:#0f3d3e"></span>Deep Teal</button>
                        <button class="theme-chip" type="button" data-theme-target="header" data-theme-value="#f3f4f6" onclick="setHeaderTheme('#f3f4f6')"><span class="theme-swatch theme-swatch--light" style="background:#f3f4f6"></span>Light</button>
                        <label class="theme-chip theme-chip--custom" id="theme-header-custom">
                            <span class="theme-swatch" id="theme-header-custom-swatch" style="background:#0d0d0d"></span>
                            <span>Custom</span>
                            <input class="theme-picker" id="theme-header-custom-input" type="color" value="#0d0d0d" onchange="setHeaderTheme(this.value, 'custom')">
                        </label>
                    </div>
                </div>
                <div class="fp-field">
                    <label class="fp-label">Accent Color</label>
                    <div class="theme-grid">
                        <button class="theme-chip selected" type="button" data-theme-target="accent" data-theme-value="#c8a96e" onclick="setAccentTheme('#c8a96e')"><span class="theme-swatch" style="background:#c8a96e"></span>Gold</button>
                        <button class="theme-chip" type="button" data-theme-target="accent" data-theme-value="#2563eb" onclick="setAccentTheme('#2563eb')"><span class="theme-swatch" style="background:#2563eb"></span>Blue</button>
                        <button class="theme-chip" type="button" data-theme-target="accent" data-theme-value="#16a34a" onclick="setAccentTheme('#16a34a')"><span class="theme-swatch" style="background:#16a34a"></span>Green</button>
                        <button class="theme-chip" type="button" data-theme-target="accent" data-theme-value="#dc2626" onclick="setAccentTheme('#dc2626')"><span class="theme-swatch" style="background:#dc2626"></span>Red</button>
                        <button class="theme-chip" type="button" data-theme-target="accent" data-theme-value="#7c3aed" onclick="setAccentTheme('#7c3aed')"><span class="theme-swatch" style="background:#7c3aed"></span>Purple</button>
                        <label class="theme-chip theme-chip--custom" id="theme-accent-custom">
                            <span class="theme-swatch" id="theme-accent-custom-swatch" style="background:#c8a96e"></span>
                            <span>Custom</span>
                            <input class="theme-picker" id="theme-accent-custom-input" type="color" value="#c8a96e" onchange="setAccentTheme(this.value, 'custom')">
                        </label>
                    </div>
                </div>
                <div class="theme-note">Header text color is adjusted automatically for readability based on the selected header color.</div>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 20h4l10-10-4-4L4 16z"/><path d="m12 6 4 4"/><path d="M4 20h16"/></svg></span> Notes & Terms</span>
                <span class="fp-section-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span>
            </div>
            <div class="fp-body open">
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Notes (visible on invoice)</label><textarea class="fp-textarea" id="inv-notes" placeholder="e.g. Thank you for your business! We look forward to working with you again." oninput="render()">Thank you for your business! We look forward to working with you again.</textarea></div></div>
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Terms & Conditions</label><textarea class="fp-textarea" id="inv-terms" placeholder="e.g. Payment is due within 14 days..." oninput="render()">Payment is due within 14 days of the invoice date. Please quote the invoice number on all payments. Late payments may incur interest at 2% per month.</textarea></div></div>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 8.5A3.5 3.5 0 1 0 12 15.5 3.5 3.5 0 1 0 12 8.5z"/><path d="M19.4 15a1.7 1.7 0 0 0 .34 1.87l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6 1.7 1.7 0 0 1-2 0 1.7 1.7 0 0 0-1-.6 1.7 1.7 0 0 0-1.87.34l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.7 1.7 0 0 0 4.6 15a1.7 1.7 0 0 0-.6-1 1.7 1.7 0 0 1 0-2 1.7 1.7 0 0 0 .6-1 1.7 1.7 0 0 0-.34-1.87l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.7 1.7 0 0 0 9 4.6a1.7 1.7 0 0 0 1-.6 1.7 1.7 0 0 1 2 0 1.7 1.7 0 0 0 1 .6 1.7 1.7 0 0 0 1.87-.34l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.7 1.7 0 0 0 19.4 9c0 .38.22.74.6 1a1.7 1.7 0 0 1 0 2c-.38.26-.6.62-.6 1z"/></svg></span> Save & Actions</span>
                <span class="fp-section-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span>
            </div>
            <div class="fp-body open">
                <div class="actions-grid">
                    <button class="action-btn print" onclick="printInvoice()"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3v11"/><path d="m7 10 5 5 5-5"/><path d="M5 19h14"/></svg></span><span>Print / Save PDF</span></button>
                    <button class="action-btn save" onclick="saveInvoice()"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 4h11l3 3v13H5z"/><path d="M8 4v6h8V4"/><path d="M9 19v-5h6v5"/></svg></span><span>Save Draft</span></button>
                    <button class="action-btn new" onclick="newInvoice()"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span><span>New Invoice</span></button>
                    <button class="action-btn clear" onclick="clearForm()"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 7h16"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M6 7l1 13h10l1-13"/><path d="M9 7V4h6v3"/></svg></span><span>Clear Form</span></button>
                </div>
                <div id="saved-list-wrap" style="margin-top:.75rem">
                    <div style="font-size:.6rem;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:rgba(255,255,255,.25);margin-bottom:.5rem">Saved Invoices</div>
                    <div class="saved-list" id="saved-list"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="preview-area" id="preview-area">
        <div class="preview-toolbar">
            <div class="pt-left">
                <span class="pt-label">Preview</span>
            </div>
            <div class="pt-right">
                <span class="pt-zoom">Live Preview — updates as you type</span>
            </div>
        </div>

        <div class="invoice-paper" id="invoice-paper">
            <div class="inv-header">
                <div>
                    <div class="inv-from-brand" id="inv-from-brand">Your Business Name</div>
                    <div class="inv-from-details" id="inv-from-details"></div>
                </div>
                <div class="inv-label-block">
                    <div class="inv-label">Invoice</div>
                    <div class="inv-number" id="inv-number-display">#</div>
                    <div class="inv-dates" id="inv-dates-display"></div>
                    <div id="inv-status-badge-display"></div>
                </div>
            </div>
            <div class="inv-gold-strip"></div>

            <div class="inv-bill-section">
                <div class="inv-bill-col">
                    <div class="inv-bill-label">Bill To</div>
                    <div id="inv-bill-to"></div>
                </div>
                <div class="inv-bill-col" id="inv-from-col">
                    <div class="inv-bill-label">From</div>
                    <div id="inv-from-mini"></div>
                </div>
            </div>

            <div class="inv-items">
                <table class="inv-table">
                    <thead class="inv-thead">
                        <tr>
                            <th style="width:50%">Description</th>
                            <th class="right">Qty</th>
                            <th class="right">Unit Price</th>
                            <th class="right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="inv-tbody" id="inv-tbody"></tbody>
                </table>
            </div>

            <div class="inv-totals-wrap">
                <div class="inv-totals" id="inv-totals-display"></div>
            </div>

            <div class="inv-bottom" id="inv-bottom"></div>

            <div class="inv-footer">
                <div class="inv-footer-brand" id="inv-footer-brand">Your Business Name</div>
                <div class="inv-footer-thanks"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 20s-7-4.35-7-10a4 4 0 0 1 7-2.65A4 4 0 0 1 19 10c0 5.65-7 10-7 10z"/></svg></span><span>Thank you for your business</span></div>
                <div class="inv-footer-note" id="inv-footer-note">letstalk@i2medier.com · i2medier.com</div>
            </div>
        </div>

<!-- ══ SEO SUPPORTING CONTENT ══ -->
    <div class="seo-content-wrap">

      <!-- 1. What Is an Invoice Generator? -->
      <div class="seo-sec">
        <span class="seo-eyebrow">ABOUT THIS TOOL</span>
        <h2>About this free invoice generator</h2>
        <p>This free invoice generator lets you create professional, print-ready invoices in minutes — without needing accounting software, a subscription, or design skills. Fill in your business details, add your line items, and get a polished PDF invoice ready to send to your client immediately.</p>
        <p>This free online invoice maker goes further than most. It supports multiple currencies (USD, GBP, EUR, NGN, GHS, and more), automatic tax and discount calculations, bank payment details, custom terms, invoice status tracking (Draft → Sent → Paid), and the ability to save and reload multiple invoices — all running entirely in your browser with no account required.</p>
      </div>

      <!-- 2. How To Use Our Invoice Generator -->
      <div class="seo-sec">
        <span class="seo-eyebrow">HOW TO USE</span>
        <h2>How to use this free invoice generator — step by step</h2>
        <p>Creating your first invoice takes less than two minutes. Here's exactly how:</p>
        <div class="seo-steps">
          <div class="seo-step"><div class="seo-step-num">1</div><div><div class="seo-step-title">Fill in your business details</div><div class="seo-step-desc">In the "From (Sender)" section on the left, enter your business name, address, email, phone, and website. This information appears on every invoice you create and can be saved for reuse.</div></div></div>
          <div class="seo-step"><div class="seo-step-num">2</div><div><div class="seo-step-title">Add your client's details</div><div class="seo-step-desc">Under "Bill To (Client)", enter the client's name, company, address, and email. The invoice preview updates live as you type.</div></div></div>
          <div class="seo-step"><div class="seo-step-num">3</div><div><div class="seo-step-title">Set invoice number, date, and due date</div><div class="seo-step-desc">Invoice numbers are auto-generated but fully editable. Set the invoice date and payment due date — the default is 14 days from today.</div></div></div>
          <div class="seo-step"><div class="seo-step-num">4</div><div><div class="seo-step-title">Add your line items</div><div class="seo-step-desc">Click "+ Add Item" to add services or products. Enter the description, quantity, and unit price. The tool automatically calculates each line total and the running subtotal.</div></div></div>
          <div class="seo-step"><div class="seo-step-num">5</div><div><div class="seo-step-title">Apply tax and discounts (if any)</div><div class="seo-step-desc">Add a VAT or tax rate as a percentage. Apply a flat or percentage discount. The grand total updates instantly in both the form and the invoice preview.</div></div></div>
          <div class="seo-step"><div class="seo-step-num">6</div><div><div class="seo-step-title">Add bank / payment details</div><div class="seo-step-desc">Enter your bank name, account name, account number, and sort code so your client knows exactly how to pay you. A payment reference field lets you specify what to quote.</div></div></div>
          <div class="seo-step"><div class="seo-step-num">7</div><div><div class="seo-step-title">Download as PDF</div><div class="seo-step-desc">Click "Download PDF" in the top-right corner. Your browser prints the invoice as a clean, professional PDF — no headers, no toolbars, just the invoice.</div></div></div>
        </div>
      </div>

      <!-- 3. What Should Be Included in an Invoice? -->
      <div class="seo-sec">
        <span class="seo-eyebrow">WHAT TO INCLUDE</span>
        <h2>What your invoice generator needs — the essentials of a valid invoice</h2>
        <p>A legally valid and professionally credible invoice should always contain these elements. This invoice generator includes a field for every one of them:</p>
        <div class="seo-checklist">
          <div class="seo-check-item"><div class="seo-check-dot"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div><div><strong>Your business name and contact details</strong> — name, address, email, and phone number so the client can reach you.</div></div>
          <div class="seo-check-item"><div class="seo-check-dot"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div><div><strong>The word "Invoice"</strong> — clearly labelled so it's distinguishable from a quote or receipt.</div></div>
          <div class="seo-check-item"><div class="seo-check-dot"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div><div><strong>A unique invoice number</strong> — for your records and your client's accounting system.</div></div>
          <div class="seo-check-item"><div class="seo-check-dot"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div><div><strong>Invoice date and payment due date</strong> — establishes when payment is expected.</div></div>
          <div class="seo-check-item"><div class="seo-check-dot"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div><div><strong>Client's name and address</strong> — the "Bill To" section identifies who owes the payment.</div></div>
          <div class="seo-check-item"><div class="seo-check-dot"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div><div><strong>Line items with descriptions, quantities, and unit prices</strong> — a clear breakdown of exactly what is being charged for.</div></div>
          <div class="seo-check-item"><div class="seo-check-dot"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div><div><strong>Subtotal, tax, discounts, and grand total</strong> — transparent pricing with all adjustments shown separately.</div></div>
          <div class="seo-check-item"><div class="seo-check-dot"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg></div><div><strong>Payment details</strong> — bank account or transfer information so the client can pay without asking.</div></div>
          <div class="seo-check-item"><div class="seo-check-dot warn"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="8" x2="12" y2="13"/><circle cx="12" cy="17" r="0.5" fill="currentColor" stroke="currentColor" stroke-width="1"/></svg></div><div><strong>Payment terms and conditions</strong> — when payment is due, late payment policy, and any other relevant conditions.</div></div>
          <div class="seo-check-item"><div class="seo-check-dot warn"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="8" x2="12" y2="13"/><circle cx="12" cy="17" r="0.5" fill="currentColor" stroke="currentColor" stroke-width="1"/></svg></div><div><strong>Notes or a thank-you message</strong> — optional but recommended; it reinforces professionalism and builds client relationships.</div></div>
        </div>
      </div>

      <!-- 4. Who Can Use This Invoice Generator? -->
      <div class="seo-sec">
        <span class="seo-eyebrow">WHO IT'S FOR</span>
        <h2>Who uses this invoice generator</h2>
        <p>This free invoice generator is built for anyone who needs to bill a client quickly and professionally — no accounting background required.</p>
        <div class="seo-grid">
          <div class="seo-card"><div class="seo-card-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="13" rx="2"/><path d="M1 21h22"/></svg></div><div class="seo-card-title">Freelancers &amp; Consultants</div><div class="seo-card-desc">Designers, developers, writers, photographers, marketers — anyone billing for time or project work. Create a new invoice per project in under two minutes.</div></div>
          <div class="seo-card"><div class="seo-card-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 7h20"/><path d="M3 3h18l1 4H2z"/><path d="M4 11v10h16V11"/><path d="M10 11v10"/><path d="M14 11v10"/></svg></div><div class="seo-card-title">Small Business Owners</div><div class="seo-card-desc">Shops, agencies, studios, and service providers who need to bill clients regularly without investing in expensive accounting software.</div></div>
          <div class="seo-card"><div class="seo-card-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg></div><div class="seo-card-title">Contractors &amp; Tradespeople</div><div class="seo-card-desc">Builders, plumbers, electricians, and other trades who need professional invoices for labour, materials, and call-out fees.</div></div>
          <div class="seo-card"><div class="seo-card-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="13.5" cy="6.5" r=".5" fill="currentColor" stroke="none"/><circle cx="17.5" cy="10.5" r=".5" fill="currentColor" stroke="none"/><circle cx="8.5" cy="7.5" r=".5" fill="currentColor" stroke="none"/><circle cx="6.5" cy="12.5" r=".5" fill="currentColor" stroke="none"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg></div><div class="seo-card-title">Creative Professionals</div><div class="seo-card-desc">Videographers, event planners, stylists, and other creatives who bill project milestones, day rates, or retainers.</div></div>
          <div class="seo-card"><div class="seo-card-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 21h18"/><path d="M5 21V7l8-4 8 4v14"/><path d="M9 21v-4h6v4"/><path d="M9 10h.01"/><path d="M15 10h.01"/><path d="M9 14h.01"/><path d="M15 14h.01"/></svg></div><div class="seo-card-title">Agencies &amp; Studios</div><div class="seo-card-desc">Digital agencies, PR firms, and creative studios that need a quick invoicing tool for ad hoc projects or clients not in their main billing system.</div></div>
          <div class="seo-card"><div class="seo-card-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div><div class="seo-card-title">International Businesses</div><div class="seo-card-desc">With support for NGN ₦, USD $, GBP £, EUR €, GHS ₵, and more, this tool handles multi-currency billing without any setup.</div></div>
        </div>
      </div>

      <!-- 5. Why Professional Invoices Matter -->
      <div class="seo-sec">
        <span class="seo-eyebrow">WHY IT MATTERS</span>
        <h2>Why your business needs a free invoice generator — not just a message</h2>
        <p>A handwritten note or informal message asking for payment might work once with a trusted client. But the moment you start growing your business, using a proper invoice generator becomes essential — not optional. Professional invoices protect you legally, improve cash flow, and signal that you run a serious operation.</p>
        <div class="seo-tips">
          <div class="seo-tip"><div class="seo-tip-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 3v18h18"/><path d="M7 16v-5"/><path d="M11 16V7"/><path d="M15 16v-3"/><path d="M19 16V9"/></svg></div><div><div class="seo-tip-title">They build trust and credibility</div><div class="seo-tip-desc">A well-designed invoice with your business name and consistent numbering signals that you're a serious, organised business. Clients are more likely to pay promptly and return for future work.</div></div></div>
          <div class="seo-tip"><div class="seo-tip-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3v18"/><path d="M3 8l9-5 9 5"/><path d="M3 8l3 7c0 1.66 1.34 3 3 3s3-1.34 3-3L9 8"/><path d="M15 8l3 7c0 1.66 1.34 3 3 3s3-1.34 3-3l-3-7"/><path d="M8 21h8"/></svg></div><div><div class="seo-tip-title">They create a legal paper trail</div><div class="seo-tip-desc">In the event of a payment dispute, a clear invoice with agreed terms, dates, and amounts is your primary evidence. It documents what was promised, delivered, and owed.</div></div></div>
          <div class="seo-tip"><div class="seo-tip-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2z"/></svg></div><div><div class="seo-tip-title">They simplify your accounting</div><div class="seo-tip-desc">Proper invoices make tax time easier. Your records are clear, income is documented, and VAT calculations are already done — whether you file yourself or use an accountant.</div></div></div>
          <div class="seo-tip"><div class="seo-tip-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l3 3"/><path d="M10 2h4"/><path d="M12 2v2"/></svg></div><div><div class="seo-tip-title">They reduce payment delays</div><div class="seo-tip-desc">Invoices with clear due dates, exact bank details, and stated late payment terms get paid faster. Ambiguity is the enemy of timely payment — professional invoices eliminate it.</div></div></div>
        </div>
      </div>

      <!-- 6. Invoice Template for Freelancers -->
      <div class="seo-sec">
        <span class="seo-eyebrow">INVOICE TEMPLATE</span>
        <h2>Invoice template for freelancers and small businesses — works anywhere</h2>
        <p>The invoice template in this free invoice generator is designed for freelancers and small businesses worldwide — whether you are billing in Nigeria, the UK, the US, Canada, or anywhere else. Multi-currency, fully customizable, zero setup.</p>
        <div class="seo-grid">
          <div class="seo-card"><div class="seo-card-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 10 12 4l9 6"/><path d="M5 10v9"/><path d="M19 10v9"/><path d="M9 10v9"/><path d="M15 10v9"/><path d="M3 19h18"/></svg></div><div class="seo-card-title">Bank & Payment Details</div><div class="seo-card-desc">Fields for bank name, account name, account number, sort code, and payment reference — covering domestic transfers, SWIFT/international payments, and mobile money in any country.</div></div>
          <div class="seo-card"><div class="seo-card-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2v20"/><path d="M17 6.5c0-1.93-2.24-3.5-5-3.5S7 4.57 7 6.5 9.24 10 12 10s5 1.57 5 3.5-2.24 3.5-5 3.5-5-1.57-5-3.5"/></svg></div><div class="seo-card-title">Multi-Currency Support</div><div class="seo-card-desc">Switch between ₦ NGN, $ USD, £ GBP, € EUR, ₵ GHS, KES, ZAR, XOF and more — the symbol updates everywhere on the invoice instantly.</div></div>
          <div class="seo-card"><div class="seo-card-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1z"/><path d="M9 8h6"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div><div class="seo-card-title">VAT / Tax Ready</div><div class="seo-card-desc">Set any tax rate for your country — 20% UK VAT, 7.5% Nigerian VAT, 10% Australian GST, or any custom rate — the tool calculates and displays it automatically.</div></div>
          <div class="seo-card"><div class="seo-card-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 4h11l3 3v13H5z"/><path d="M8 4v6h8V4"/><path d="M9 19v-5h6v5"/></svg></div><div class="seo-card-title">Save Multiple Clients</div><div class="seo-card-desc">Save different invoice drafts per client and reload them instantly. Perfect for recurring billing — load, update the date and items, re-export.</div></div>
        </div>
        <p style="margin-top:1rem">The template prints cleanly to A4 with all colours and branding preserved. No watermarks. No third-party "created with" footers. Your invoice, your brand.</p>
      </div>

      <!-- 7. Invoice vs Receipt -->
      <div class="seo-sec">
        <span class="seo-eyebrow">COMPARE</span>
        <h2>Invoice vs receipt — what's the difference?</h2>
        <p>These two documents are often confused, but they serve very different purposes in a business transaction.</p>
        <table class="seo-compare">
          <thead><tr><th>Feature</th><th class="hi">Invoice</th><th>Receipt</th></tr></thead>
          <tbody>
            <tr><td>Purpose</td><td>Requests payment for goods or services</td><td>Confirms payment has been received</td></tr>
            <tr><td>Timing</td><td>Sent before payment</td><td>Issued after payment</td></tr>
            <tr><td>Payment status</td><td>Payment is still outstanding</td><td>Payment is complete</td></tr>
            <tr><td>Contains due date?</td><td class="yes"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg> Yes</td><td class="no"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg> No</td></tr>
            <tr><td>Legal standing</td><td>Proof of obligation to pay</td><td>Proof that payment was made</td></tr>
            <tr><td>Used for</td><td>Chasing payment, accounting, tax records</td><td>Client records, expense claims, refunds</td></tr>
          </tbody>
        </table>
        <p style="margin-top:1rem">Once your client pays, update the status to "Paid" using the status button in the nav bar — then re-export a paid copy for both your records and theirs.</p>
      </div>

      <!-- 8. Tips for Getting Paid Faster -->
      <div class="seo-sec">
        <span class="seo-eyebrow">GET PAID FASTER</span>
        <h2>Tips for getting paid faster — make your invoice generator work harder</h2>
        <p>Creating the invoice is just one step. These habits will shorten the gap between invoice sent and money received, and make every invoice you generate count.</p>
        <div class="seo-tips">
          <div class="seo-tip"><div class="seo-tip-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></div><div><div class="seo-tip-title">Set a short due date</div><div class="seo-tip-desc">Net-14 (14 days) is the standard for freelancers and small businesses globally. Longer terms increase your cash flow risk significantly.</div></div></div>
          <div class="seo-tip"><div class="seo-tip-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 10 12 4l9 6"/><path d="M5 10v9"/><path d="M19 10v9"/><path d="M9 10v9"/><path d="M15 10v9"/><path d="M3 19h18"/></svg></div><div><div class="seo-tip-title">Include complete bank details every time</div><div class="seo-tip-desc">The single biggest cause of payment delays is the client not knowing where to send the money. Fill in your bank name, account name, number, and a reference — remove all friction.</div></div></div>
          <div class="seo-tip"><div class="seo-tip-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 5h18v14H3z"/><path d="m3 5 9 8 9-8"/></svg></div><div><div class="seo-tip-title">Send the invoice immediately after work is done</div><div class="seo-tip-desc">Every day you wait to send the invoice is a day added to your wait for payment. Create it as soon as the deliverable is complete or the service is rendered.</div></div></div>
          <div class="seo-tip"><div class="seo-tip-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg></div><div><div class="seo-tip-title">Follow up without apology</div><div class="seo-tip-desc">Send a polite reminder 2–3 days before the due date and again on the day it's due. Most late payments are due to oversight, not bad faith.</div></div></div>
          <div class="seo-tip"><div class="seo-tip-ico"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div><div><div class="seo-tip-title">State your late payment policy</div><div class="seo-tip-desc">Include a late payment clause in your terms — e.g. "Late payments incur interest at 2% per month." This motivates clients to prioritise your invoice over others with no stated consequences.</div></div></div>
        </div>
      </div>

      <!-- 9. Service CTA -->
      <div class="seo-cta-block">
        <span class="seo-eyebrow"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align:middle;margin-right:.3em"><polyline points="20 6 9 17 4 12"/></svg>Your Invoice Generator — Now Build the Website Around It</span>
        <h2>Need a professional business website<br>or <em>client portal?</em></h2>
        <p>A great invoice is just the start. We build professional websites, client portals, booking systems, and full digital presences for businesses worldwide — fast, branded, and built to grow.</p>
        <div class="seo-cta-pills">
          <span class="seo-cta-pill">Website Design</span>
          <span class="seo-cta-pill">Client Portals</span>
          <span class="seo-cta-pill">SEO &amp; Growth</span>
          <span class="seo-cta-pill">Domain &amp; Hosting</span>
          <span class="seo-cta-pill">Business Setup</span>
        </div>
        <div class="seo-cta-btns">
          <a href="{{ route('site.start', ['services' => 'webdesign', 'addons' => 'wd-forms,wd-whatsapp', 'source_page' => 'tool-invoice-generator', 'source_label' => 'Invoice Generator']) }}" class="seo-cta-btn-p">Start Your Website Project <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="vertical-align:middle;margin-left:.2em"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
          <a href="{{ route('site.services') }}" class="seo-cta-btn-s">View All Services</a>
        </div>
      </div>

      <!-- 10. FAQ -->
      <div class="seo-sec">
        <span class="seo-eyebrow">FAQ</span>
        <h2>Frequently asked questions about this invoice generator</h2>
        <div class="faq-list">
          <div class="faq-item">
            <button class="faq-q" aria-expanded="false" aria-controls="inv-f1"><span class="faq-q-text">Is this invoice generator completely free?</span><span class="faq-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span></button>
            <div class="faq-a" id="inv-f1">Yes — completely free with no account, no email signup, and no watermarks. Everything runs in your browser; your data never leaves your device.</div>
          </div>
          <div class="faq-item">
            <button class="faq-q" aria-expanded="false" aria-controls="inv-f2"><span class="faq-q-text">How do I download my invoice as a PDF?</span><span class="faq-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span></button>
            <div class="faq-a" id="inv-f2">Click the "Print / Save PDF" button. Your browser opens the print dialog — select "Save as PDF" as the destination and click Save. The output is clean, formatted to A4, with no toolbars or browser chrome.</div>
          </div>
          <div class="faq-item">
            <button class="faq-q" aria-expanded="false" aria-controls="inv-f3"><span class="faq-q-text">Can I save my invoices and come back to them later?</span><span class="faq-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span></button>
            <div class="faq-a" id="inv-f3">Yes. Click "Save Draft" and your invoice is saved to your browser's local storage. You can reload it from the Saved Invoices section any time. Note: clearing your browser data will delete saved invoices, so keep PDF copies for permanent records.</div>
          </div>
          <div class="faq-item">
            <button class="faq-q" aria-expanded="false" aria-controls="inv-f4"><span class="faq-q-text">What currencies does the tool support?</span><span class="faq-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span></button>
            <div class="faq-a" id="inv-f4">The tool supports US Dollar ($ USD), British Pound (£ GBP), Euro (€ EUR), Nigerian Naira (₦ NGN), Ghanaian Cedi (₵ GHS), Kenyan Shilling (KES), South African Rand (ZAR), CFA Franc (XOF), and Canadian Dollar (CAD).</div>
          </div>
          <div class="faq-item">
            <button class="faq-q" aria-expanded="false" aria-controls="inv-f5"><span class="faq-q-text">How do I add VAT or tax to my invoice?</span><span class="faq-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span></button>
            <div class="faq-a" id="inv-f5">In the Taxes & Discount section on the left panel, enter your tax rate as a percentage and customize the label (VAT, GST, WHT, or any name). The tax is calculated automatically on the subtotal minus any discount.</div>
          </div>
          <div class="faq-item">
            <button class="faq-q" aria-expanded="false" aria-controls="inv-f6"><span class="faq-q-text">Can I use this for recurring invoices?</span><span class="faq-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span></button>
            <div class="faq-a" id="inv-f6">Yes. Save your invoice as a draft, then each billing period load it, update the invoice number and date, adjust any line items, and re-export. This workflow is ideal for retainer clients or subscription-style services.</div>
          </div>
          <div class="faq-item">
            <button class="faq-q" aria-expanded="false" aria-controls="inv-f7"><span class="faq-q-text">Is this invoice legally valid?</span><span class="faq-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span></button>
            <div class="faq-a" id="inv-f7">Yes. It contains all the required elements for a legally valid business invoice in most countries — invoice number, date, itemized amounts, tax, and payment terms. For country-specific compliance (e.g. UK VAT registration numbers, Nigerian TIN/FIRS, Australian ABN), simply add those details to your sender information or notes field.</div>
          </div>
          <div class="faq-item">
            <button class="faq-q" aria-expanded="false" aria-controls="inv-f8"><span class="faq-q-text">What's the difference between an invoice and a proforma invoice?</span><span class="faq-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg></span></button>
            <div class="faq-a" id="inv-f8">A standard invoice requests payment for work already completed. A proforma invoice is a preliminary bill sent before work begins — essentially a formal quote in invoice format. You can use this tool for both by labelling it accordingly in the notes or title area.</div>
          </div>
        </div>
      </div>

    </div><!-- /seo-content-wrap -->

    </div>
</div>



<div class="toast" id="toast"></div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-invoice-generator.js')
@endpush
