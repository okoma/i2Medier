@extends('public.layouts.invoicetool')

@section('title', 'Invoice Generator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/invoice-generator.css')
@endpush

@section('content')
<nav>
    <a href="{{ route('site.home') }}" class="logo">i2Medi<span>er</span></a>
    @include('public.partials.menu')
    <div class="nav-right">
        <button class="nav-status draft" id="status-btn" onclick="cycleStatus()"><span class="icon-dot" aria-hidden="true"></span><span>Draft</span></button>
        <button class="nav-btn" onclick="loadSaved()"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 7.5A1.5 1.5 0 0 1 5.5 6H10l2 2h6.5A1.5 1.5 0 0 1 20 9.5v8A1.5 1.5 0 0 1 18.5 19h-13A1.5 1.5 0 0 1 4 17.5z"/><path d="M4 10h16"/></svg></span><span>Load</span></button>
        <button class="nav-btn" onclick="saveInvoice()"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 4h11l3 3v13H5z"/><path d="M8 4v6h8V4"/><path d="M9 19v-5h6v5"/></svg></span><span>Save</span></button>
        <button class="nav-btn" onclick="newInvoice()"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span><span>New</span></button>
        <button class="nav-btn primary" onclick="printInvoice()"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3v11"/><path d="m7 10 5 5 5-5"/><path d="M5 19h14"/></svg></span><span>Download PDF</span></button>
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
                <span class="fp-section-arrow">›</span>
            </div>
            <div class="fp-body open">
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Business Name</label><input class="fp-input" id="from-name" value="i2Medier Konceptz" oninput="render()"/></div></div>
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Address</label><input class="fp-input" id="from-address" value="15 Rumuola Road" oninput="render()"/></div></div>
                <div class="fp-row"><div class="fp-field"><label class="fp-label">City / State</label><input class="fp-input" id="from-city" value="Port Harcourt, Rivers State" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Country</label><input class="fp-input" id="from-country" value="Nigeria" oninput="render()"/></div></div>
                <div class="fp-row"><div class="fp-field"><label class="fp-label">Email</label><input class="fp-input" id="from-email" value="hello@i2medier.com" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Phone</label><input class="fp-input" id="from-phone" value="+234 800 000 0000" oninput="render()"/></div></div>
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Website</label><input class="fp-input" id="from-website" value="i2medier.com" oninput="render()"/></div></div>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M5 20a7 7 0 0 1 14 0"/></svg></span> Bill To (Client)</span>
                <span class="fp-section-arrow">›</span>
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
                <span class="fp-section-arrow">›</span>
            </div>
            <div class="fp-body open">
                <div class="fp-row"><div class="fp-field"><label class="fp-label">Invoice Number</label><input class="fp-input" id="inv-number" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Currency</label><select class="fp-input" id="inv-currency" onchange="render()"><option value="NGN">₦ NGN</option><option value="USD">$ USD</option><option value="GBP">£ GBP</option><option value="EUR">€ EUR</option></select></div></div>
                <div class="fp-row"><div class="fp-field"><label class="fp-label">Invoice Date</label><input class="fp-input" type="date" id="inv-date" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Due Date</label><input class="fp-input" type="date" id="inv-due" oninput="render()"/></div></div>
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Purchase Order / Ref (optional)</label><input class="fp-input" id="inv-po" placeholder="e.g. PO-2024-100" oninput="render()"/></div></div>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M7 3h10v18l-2-1-2 1-2-1-2 1-2-1z"/><path d="M9 8h6"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span> Line Items</span>
                <span class="fp-section-arrow">›</span>
            </div>
            <div class="fp-body open">
                <div class="items-list" id="items-list"></div>
                <button class="add-item-btn" onclick="addItem()"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span><span>Add Line Item</span></button>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 2v20"/><path d="M17 6.5c0-1.93-2.24-3.5-5-3.5S7 4.57 7 6.5 9.24 10 12 10s5 1.57 5 3.5-2.24 3.5-5 3.5-5-1.57-5-3.5"/></svg></span> Taxes & Discount</span>
                <span class="fp-section-arrow">›</span>
            </div>
            <div class="fp-body open">
                <div class="fp-row"><div class="fp-field"><label class="fp-label">Tax Label</label><input class="fp-input" id="tax-label" value="VAT" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Tax Rate (%)</label><input class="fp-input" type="number" id="tax-rate" value="7.5" min="0" max="100" oninput="render()"/></div></div>
                <div class="fp-row">
                    <div class="fp-field">
                        <label class="fp-label">Discount Type</label>
                        <div style="display:flex;gap:.4rem">
                            <button class="disc-type-btn active" id="disc-flat-btn" onclick="setDiscType('flat')">₦ Flat</button>
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
                <span class="fp-section-arrow">›</span>
            </div>
            <div class="fp-body open">
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Bank Name</label><input class="fp-input" id="bank-name" placeholder="e.g. First Bank Nigeria" oninput="render()"/></div></div>
                <div class="fp-row"><div class="fp-field"><label class="fp-label">Account Name</label><input class="fp-input" id="bank-acct-name" placeholder="e.g. i2Medier Konceptz" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Account Number</label><input class="fp-input" id="bank-acct-num" placeholder="0123456789" oninput="render()"/></div></div>
                <div class="fp-row"><div class="fp-field"><label class="fp-label">Sort Code / SWIFT</label><input class="fp-input" id="bank-sort" placeholder="Optional" oninput="render()"/></div><div class="fp-field"><label class="fp-label">Payment Reference</label><input class="fp-input" id="bank-ref" placeholder="Optional" oninput="render()"/></div></div>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 20h4l10-10-4-4L4 16z"/><path d="m12 6 4 4"/><path d="M4 20h16"/></svg></span> Notes & Terms</span>
                <span class="fp-section-arrow">›</span>
            </div>
            <div class="fp-body open">
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Notes (visible on invoice)</label><textarea class="fp-textarea" id="inv-notes" placeholder="e.g. Thank you for your business! We look forward to working with you again." oninput="render()">Thank you for your business! We look forward to working with you again.</textarea></div></div>
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Terms & Conditions</label><textarea class="fp-textarea" id="inv-terms" placeholder="e.g. Payment is due within 14 days..." oninput="render()">Payment is due within 14 days of the invoice date. Please quote the invoice number on all payments. Late payments may incur interest at 2% per month.</textarea></div></div>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 8.5A3.5 3.5 0 1 0 12 15.5 3.5 3.5 0 1 0 12 8.5z"/><path d="M19.4 15a1.7 1.7 0 0 0 .34 1.87l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.7 1.7 0 0 0 15 19.4a1.7 1.7 0 0 0-1 .6 1.7 1.7 0 0 1-2 0 1.7 1.7 0 0 0-1-.6 1.7 1.7 0 0 0-1.87.34l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.7 1.7 0 0 0 4.6 15a1.7 1.7 0 0 0-.6-1 1.7 1.7 0 0 1 0-2 1.7 1.7 0 0 0 .6-1 1.7 1.7 0 0 0-.34-1.87l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.7 1.7 0 0 0 9 4.6a1.7 1.7 0 0 0 1-.6 1.7 1.7 0 0 1 2 0 1.7 1.7 0 0 0 1 .6 1.7 1.7 0 0 0 1.87-.34l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.7 1.7 0 0 0 19.4 9c0 .38.22.74.6 1a1.7 1.7 0 0 1 0 2c-.38.26-.6.62-.6 1z"/></svg></span> Save & Actions</span>
                <span class="fp-section-arrow">›</span>
            </div>
            <div class="fp-body open">
                <div class="actions-grid">
                    <button class="action-btn print" onclick="printInvoice()"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3v11"/><path d="m7 10 5 5 5-5"/><path d="M5 19h14"/></svg></span><span>Download PDF</span></button>
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
                    <div class="inv-from-brand" id="inv-from-brand">i2Medi<span>er</span></div>
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
                <div class="inv-footer-brand" id="inv-footer-brand">i2Medi<span>er</span></div>
                <div class="inv-footer-thanks"><span class="btn-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 20s-7-4.35-7-10a4 4 0 0 1 7-2.65A4 4 0 0 1 19 10c0 5.65-7 10-7 10z"/></svg></span><span>Thank you for your business</span></div>
                <div class="inv-footer-note" id="inv-footer-note">hello@i2medier.com · i2medier.com</div>
            </div>
        </div>
    </div>
</div>

<div class="toast" id="toast"></div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/tool-invoice-generator.js')
@endpush
