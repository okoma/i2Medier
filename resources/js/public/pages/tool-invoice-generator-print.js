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
        const symbol = SYMBOLS[data.currency] || '₦';
        const fromName = data.from?.name || 'i2Medier Konceptz';
        const itemsHtml = (data.items || []).length === 0
            ? '<tr><td class="invoice-empty" colspan="4">No line items added.</td></tr>'
            : (data.items || []).map((item) => `
                <tr>
                    <td>${escapeHtml(item.desc || '—')}</td>
                    <td>${escapeHtml(String(item.qty || 0))}</td>
                    <td>${fmt(item.price || 0, data.currency)}</td>
                    <td>${fmt((item.qty || 0) * (item.price || 0), data.currency)}</td>
                </tr>
            `).join('');

        const fromBody = [data.from?.address, data.from?.city, data.from?.country, data.from?.email, data.from?.phone, data.from?.website].filter(Boolean).join('<br>');
        const toBody = [data.to?.company, data.to?.address, data.to?.city, data.to?.country, data.to?.email].filter(Boolean).join('<br>');

        documentEl.innerHTML = `
            <header class="invoice-header">
                <div>
                    <div class="invoice-brand">${escapeHtml(fromName).replace('i2Medier', 'i2Medi<span>er</span>')}</div>
                    <div class="invoice-from">${fromBody}</div>
                </div>
                <div>
                    <div class="invoice-title">Invoice</div>
                    <div class="invoice-meta">
                        <div class="invoice-meta-row"><span class="invoice-meta-label">Number</span><span>${escapeHtml(data.number || '—')}</span></div>
                        <div class="invoice-meta-row"><span class="invoice-meta-label">Date</span><span>${fmtDate(data.date)}</span></div>
                        <div class="invoice-meta-row"><span class="invoice-meta-label">Due</span><span>${fmtDate(data.due)}</span></div>
                        ${data.po ? `<div class="invoice-meta-row"><span class="invoice-meta-label">PO / Ref</span><span>${escapeHtml(data.po)}</span></div>` : ''}
                    </div>
                    <div class="invoice-status invoice-status--${escapeHtml(data.status || 'draft')}">${escapeHtml(statusLabel(data.status))}</div>
                </div>
            </header>

            <section class="invoice-bill-grid">
                <div class="bill-card">
                    <div class="bill-label">Bill To</div>
                    <div class="bill-name">${escapeHtml(data.to?.name || 'Client')}</div>
                    <div class="bill-body">${toBody || 'Client details not provided.'}</div>
                </div>
                <div class="bill-card">
                    <div class="bill-label">From</div>
                    <div class="bill-name">${escapeHtml(fromName)}</div>
                    <div class="bill-body">${fromBody}</div>
                </div>
            </section>

            <table class="invoice-table">
                <thead>
                    <tr>
                        <th style="width:50%">Description</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>${itemsHtml}</tbody>
            </table>

            <section class="invoice-bottom">
                <div>
                    ${(data.bank?.name || data.bank?.acctName || data.bank?.acctNum) ? `
                        <div class="info-block">
                            <div class="info-title">Payment Details</div>
                            <div class="info-copy">${[
                                data.bank?.name ? `Bank: ${data.bank.name}` : '',
                                data.bank?.acctName ? `Account: ${data.bank.acctName}` : '',
                                data.bank?.acctNum ? `Number: ${data.bank.acctNum}` : '',
                                data.bank?.sort ? `Sort / SWIFT: ${data.bank.sort}` : '',
                                data.bank?.ref ? `Reference: ${data.bank.ref}` : '',
                            ].filter(Boolean).join('\n')}</div>
                        </div>
                    ` : ''}
                    ${(data.notes || data.terms) ? `
                        <div class="info-block" style="margin-top: 1rem;">
                            <div class="info-title">Notes & Terms</div>
                            <div class="info-copy">${[data.notes, data.terms].filter(Boolean).map(escapeHtml).join('\n\n')}</div>
                        </div>
                    ` : ''}
                </div>

                <div class="totals-card">
                    <div class="total-row"><span class="total-row__label">Subtotal</span><span>${fmt(totals.subtotal, data.currency)}</span></div>
                    ${totals.discountAmt > 0 ? `<div class="total-row"><span class="total-row__label">Discount</span><span>- ${fmt(totals.discountAmt, data.currency)}</span></div>` : ''}
                    ${totals.taxAmt > 0 ? `<div class="total-row"><span class="total-row__label">${escapeHtml(data.taxLabel || 'Tax')} (${totals.taxRate}%)</span><span>${fmt(totals.taxAmt, data.currency)}</span></div>` : ''}
                    <div class="grand-total"><span>Total Due (${symbol})</span><span>${fmt(totals.total, data.currency)}</span></div>
                </div>
            </section>

            <footer class="invoice-footer">
                Thank you for your business. ${[data.from?.email, data.from?.website].filter(Boolean).join(' · ')}
            </footer>
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

function escapeHtml(value) {
    return String(value || '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
}
