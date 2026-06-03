@extends('public.layouts.invoicetool')

@section('title', 'Invoice Generator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/invoice-generator.css')
@endpush

@section('content')
<nav>
    <a href="{{ route('site.home') }}" class="logo">i2Medi<span>er</span></a>
    <div class="nav-center">
        <span class="nav-tag">Invoice Generator</span>
        <button class="nav-status draft" id="status-btn" onclick="cycleStatus()">● Draft</button>
    </div>
    <div class="nav-right">
        <button class="nav-btn" onclick="loadSaved()">📂 Load</button>
        <button class="nav-btn" onclick="saveInvoice()">💾 Save</button>
        <button class="nav-btn" onclick="newInvoice()">＋ New</button>
        <button class="nav-btn primary" onclick="printInvoice()">⬇ Download PDF</button>
    </div>
</nav>

<div class="app">
    <div class="form-panel" id="form-panel">
        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico">🏢</span> From (Sender)</span>
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
                <span class="fp-section-title"><span class="fst-ico">👤</span> Bill To (Client)</span>
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
                <span class="fp-section-title"><span class="fst-ico">📄</span> Invoice Details</span>
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
                <span class="fp-section-title"><span class="fst-ico">🧾</span> Line Items</span>
                <span class="fp-section-arrow">›</span>
            </div>
            <div class="fp-body open">
                <div class="items-list" id="items-list"></div>
                <button class="add-item-btn" onclick="addItem()">＋ Add Line Item</button>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico">💰</span> Taxes & Discount</span>
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
                <span class="fp-section-title"><span class="fst-ico">🏦</span> Payment Details</span>
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
                <span class="fp-section-title"><span class="fst-ico">📝</span> Notes & Terms</span>
                <span class="fp-section-arrow">›</span>
            </div>
            <div class="fp-body open">
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Notes (visible on invoice)</label><textarea class="fp-textarea" id="inv-notes" placeholder="e.g. Thank you for your business! We look forward to working with you again." oninput="render()">Thank you for your business! We look forward to working with you again.</textarea></div></div>
                <div class="fp-row single"><div class="fp-field"><label class="fp-label">Terms & Conditions</label><textarea class="fp-textarea" id="inv-terms" placeholder="e.g. Payment is due within 14 days..." oninput="render()">Payment is due within 14 days of the invoice date. Please quote the invoice number on all payments. Late payments may incur interest at 2% per month.</textarea></div></div>
            </div>
        </div>

        <div class="fp-section">
            <div class="fp-section-head open" onclick="toggleSection(this)">
                <span class="fp-section-title"><span class="fst-ico">⚙️</span> Save & Actions</span>
                <span class="fp-section-arrow">›</span>
            </div>
            <div class="fp-body open">
                <div class="actions-grid">
                    <button class="action-btn print" onclick="printInvoice()">⬇ Download PDF</button>
                    <button class="action-btn save" onclick="saveInvoice()">💾 Save Draft</button>
                    <button class="action-btn new" onclick="newInvoice()">＋ New Invoice</button>
                    <button class="action-btn clear" onclick="clearForm()">🗑 Clear Form</button>
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
                <div class="inv-footer-thanks">❤️ Thank you for your business</div>
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
