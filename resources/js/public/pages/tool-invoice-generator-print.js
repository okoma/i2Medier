const page = document.getElementById('invoice-generator-print-page');

if (page) {
    window.addEventListener('DOMContentLoaded', () => {
        const shell = document.querySelector('.print-shell');
        const storageKey = shell?.dataset.storageKey || 'i2medierInvoicePrintPayload';
        const documentEl = document.getElementById('invoice-document');
        const emptyState = document.getElementById('print-empty-state');

        let data = null;

        try {
            data = JSON.parse(window.localStorage.getItem(storageKey) || 'null');
        } catch {
            data = null;
        }

        if (!data || !documentEl) {
            if (emptyState) emptyState.hidden = false;
            if (documentEl) documentEl.hidden = true;
            return;
        }

        const totals = calcTotals(data);
        const fromName = data.from?.name || 'i2Medier Konceptz';
        const itemsHtml = (data.items || []).length === 0
            ? '<tr><td colspan="4" style="text-align:center;color:var(--g400);font-style:italic;padding:2rem">No line items added yet.</td></tr>'
            : (data.items || []).map((item) => `
                <tr>
                    <td><div class="inv-item-desc">${escapeHtml(item.desc || '—')}</div></td>
                    <td class="inv-item-num">${escapeHtml(String(item.qty || 0))}</td>
                    <td class="inv-item-price">${fmt(item.price || 0, data.currency)}</td>
                    <td class="inv-item-total">${fmt((item.qty || 0) * (item.price || 0), data.currency)}</td>
                </tr>
            `).join('');

        const fromDetails = [data.from?.address, data.from?.city, data.from?.country, data.from?.email, data.from?.phone, data.from?.website].filter(Boolean).join('<br/>');
        const toAddr = [data.to?.address, data.to?.city, data.to?.country].filter(Boolean).join(', ');
        const poRow = data.po ? `<div class="inv-date-row"><span class="idr-label">PO:</span><span class="idr-val">${escapeHtml(data.po)}</span></div>` : '';
        const paymentHtml = [
            data.bank?.name ? `<div class="inv-payment-row"><span class="ipr-label">Bank:</span><span class="ipr-val">${escapeHtml(data.bank.name)}</span></div>` : '',
            data.bank?.acctName ? `<div class="inv-payment-row"><span class="ipr-label">Account:</span><span class="ipr-val">${escapeHtml(data.bank.acctName)}</span></div>` : '',
            data.bank?.acctNum ? `<div class="inv-payment-row"><span class="ipr-label">Number:</span><span class="ipr-val">${escapeHtml(data.bank.acctNum)}</span></div>` : '',
            data.bank?.sort ? `<div class="inv-payment-row"><span class="ipr-label">Sort/SWIFT:</span><span class="ipr-val">${escapeHtml(data.bank.sort)}</span></div>` : '',
            data.bank?.ref ? `<div class="inv-payment-row"><span class="ipr-label">Reference:</span><span class="ipr-val">${escapeHtml(data.bank.ref)}</span></div>` : '',
        ].filter(Boolean).join('');

        const notesHtml = [
            data.notes ? `<div><div class="inv-payment-title">Notes</div><div class="inv-notes-text">${escapeHtml(data.notes)}</div></div>` : '',
            data.terms ? `<div style="margin-top:${data.notes ? '.85rem' : '0'}"><div class="inv-payment-title">Terms & Conditions</div><div class="inv-notes-text" style="font-size:.72rem;color:var(--g400)">${escapeHtml(data.terms)}</div></div>` : '',
        ].filter(Boolean).join('');

        documentEl.innerHTML = `
            <div class="invoice-paper">
                <div class="inv-header">
                    <div>
                        <div class="inv-from-brand">${escapeBrand(fromName)}</div>
                        <div class="inv-from-details">${fromDetails}</div>
                    </div>
                    <div class="inv-label-block">
                        <div class="inv-label">Invoice</div>
                        <div class="inv-number">#${escapeHtml(data.number || '—')}</div>
                        <div class="inv-dates">
                            <div class="inv-date-row"><span class="idr-label">Date:</span><span class="idr-val">${fmtDate(data.date)}</span></div>
                            <div class="inv-date-row"><span class="idr-label">Due:</span><span class="idr-val">${fmtDate(data.due)}</span></div>
                            ${poRow}
                        </div>
                        <div><span class="inv-status-badge ${escapeHtml(data.status || 'draft')}">${escapeHtml(statusLabel(data.status))}</span></div>
                    </div>
                </div>

                <div class="inv-gold-strip"></div>

                <div class="inv-bill-section">
                    <div class="inv-bill-col">
                        <div class="inv-bill-label">Bill To</div>
                        ${data.to?.name ? `<div class="inv-bill-name">${escapeHtml(data.to.name)}</div>` : ''}
                        ${data.to?.company ? `<div class="inv-bill-company">${escapeHtml(data.to.company)}</div>` : ''}
                        ${toAddr ? `<div class="inv-bill-addr">${escapeHtml(toAddr)}</div>` : ''}
                        ${data.to?.email ? `<div class="inv-bill-addr" style="margin-top:.25rem;color:var(--gold-dk)">${escapeHtml(data.to.email)}</div>` : ''}
                        ${(!data.to?.name && !data.to?.company && !toAddr && !data.to?.email) ? '<div class="inv-bill-addr" style="color:var(--g400);font-style:italic">Client details will appear here</div>' : ''}
                    </div>
                    <div class="inv-bill-col">
                        <div class="inv-bill-label">From</div>
                        <div class="inv-bill-name">${escapeHtml(fromName)}</div>
                        ${[data.from?.address, data.from?.city, data.from?.country].filter(Boolean).join(', ') ? `<div class="inv-bill-addr">${escapeHtml([data.from?.address, data.from?.city, data.from?.country].filter(Boolean).join(', '))}</div>` : ''}
                        ${data.from?.email ? `<div class="inv-bill-addr" style="margin-top:.2rem;color:var(--gold-dk)">${escapeHtml(data.from.email)}</div>` : ''}
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
                        <tbody class="inv-tbody">${itemsHtml}</tbody>
                    </table>
                </div>

                <div class="inv-totals-wrap">
                    <div class="inv-totals">
                        <div class="inv-total-row"><span class="itr-label">Subtotal</span><span class="itr-val">${fmt(totals.subtotal, data.currency)}</span></div>
                        ${totals.discountAmt > 0 ? `<div class="inv-total-row"><span class="itr-label">Discount</span><span class="itr-val itr-discount">− ${fmt(totals.discountAmt, data.currency)}</span></div>` : ''}
                        ${totals.taxAmt > 0 ? `<div class="inv-total-row"><span class="itr-label">${escapeHtml(data.taxLabel || 'Tax')} (${totals.taxRate}%)</span><span class="itr-val">${fmt(totals.taxAmt, data.currency)}</span></div>` : ''}
                        <div class="inv-grand-total"><span class="igt-label">Total Due (${escapeHtml(data.currency || 'NGN')})</span><span class="igt-val">${fmt(totals.total, data.currency)}</span></div>
                    </div>
                </div>

                ${(paymentHtml || notesHtml) ? `
                <div class="inv-bottom">
                    <div>${paymentHtml ? `<div><div class="inv-payment-title">Payment Details</div>${paymentHtml}</div>` : ''}</div>
                    <div>${notesHtml}</div>
                </div>
                ` : ''}

                <div class="inv-footer">
                    <div class="inv-footer-brand">${escapeBrand(fromName)}</div>
                    <div class="inv-footer-thanks"><span>Thank you for your business</span></div>
                    <div class="inv-footer-note">${[data.from?.email, data.from?.website].filter(Boolean).join(' · ')}</div>
                </div>
            </div>
        `;

        window.setTimeout(() => window.print(), 250);
    });
}

const SYMBOLS = { NGN: '₦', USD: '$', GBP: '£', EUR: '€' };

function calcTotals(data) {
    const subtotal = (data.items || []).reduce((sum, item) => sum + ((item.qty || 0) * (item.price || 0)), 0);
    const taxRate = parseFloat(data.taxRate || '0') || 0;
    const discVal = parseFloat(data.discValue || '0') || 0;
    const discountAmt = data.discType === 'percent' ? subtotal * discVal / 100 : discVal;
    const taxable = Math.max(0, subtotal - discountAmt);
    const taxAmt = taxable * taxRate / 100;
    const total = taxable + taxAmt;

    return { subtotal, discountAmt, taxAmt, taxRate, total };
}

function fmt(value, currency) {
    const symbol = SYMBOLS[currency] || '₦';
    return symbol + parseFloat(value || 0).toLocaleString('en-NG', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

function fmtDate(dateStr) {
    if (!dateStr) return '—';
    try {
        return new Date(dateStr + 'T00:00:00').toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
    } catch {
        return dateStr;
    }
}

function statusLabel(status) {
    return ({ draft: 'Draft', sent: 'Sent', paid: 'Paid' })[status || 'draft'] || 'Draft';
}

function escapeBrand(value) {
    const safe = escapeHtml(value);
    return safe.includes('i2Medier') ? safe.replace('i2Medier', 'i2Medi<span>er</span>') : safe;
}

function escapeHtml(value) {
    return String(value || '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
}
