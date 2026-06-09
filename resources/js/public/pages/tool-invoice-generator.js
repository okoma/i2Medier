import { initFaqButtons } from './service-common.js';
initFaqButtons('.faq-q');

let discType = 'flat';
let invoiceStatus = 'draft';
let itemIdCounter = 0;
const items = [];
const statuses = ['draft', 'sent', 'paid'];
const statusLabels = { draft: 'Draft', sent: 'Sent', paid: 'Paid' };
const SYMBOLS = {
    NGN: '₦', USD: '$', GBP: '£', EUR: '€', CAD: 'CA$', AUD: 'A$',
    CHF: 'Fr', JPY: '¥', INR: '₹', SGD: 'S$', AED: 'AED', SAR: 'SR',
    GHS: '₵', KES: 'KSh', ZAR: 'R', UGX: 'USh', TZS: 'TSh', ZMW: 'ZK',
    ETB: 'Br', XOF: 'CFA', XAF: 'FCFA', EGP: 'E£', MAD: 'MAD',
    BRL: 'R$', MXN: 'MX$', ZWG: 'ZiG',
};
const printRoute = document.getElementById('invoice-generator-page')?.dataset.printRoute || '';
const printStorageKey = 'i2medierInvoicePrintPayload';
const DEFAULT_THEME = {
    header: '#0d0d0d',
    accent: '#c8a96e',
    headerMode: 'preset',
    accentMode: 'preset',
};
const invoiceTheme = { ...DEFAULT_THEME };

window.addEventListener('DOMContentLoaded', () => {
    const today = new Date();
    const due = new Date(today);
    due.setDate(due.getDate() + 14);

    setValue('inv-date', fmtDateInput(today));
    setValue('inv-due', fmtDateInput(due));
    setValue('inv-number', generateInvNum());

    addItem('Web Design & Development', 1, 250000);
    addItem('UI/UX Design — 12 Screens', 1, 180000);

    refreshSavedList();
    render();
});

function setValue(id, value) {
    const element = document.getElementById(id);
    if (element) {
        element.value = value;
    }
}

function fmtDateInput(date) {
    return date.toISOString().split('T')[0];
}

function generateInvNum() {
    const year = new Date().getFullYear();
    const existing = getSavedKeys().map((key) => {
        const invoice = loadInvoiceData(key);
        const match = (invoice?.number || '').match(/i2M-\d{4}-(\d+)/);

        return match ? parseInt(match[1], 10) : 0;
    });
    const next = (existing.length > 0 ? Math.max(...existing) : 0) + 1;

    return `i2M-${year}-${String(next).padStart(3, '0')}`;
}

function addItem(desc = '', qty = 1, price = 0) {
    const id = ++itemIdCounter;
    items.push({ id, desc, qty, price });
    renderItemsList();
    render();
}

function removeItem(id) {
    const index = items.findIndex((item) => item.id === id);
    if (index !== -1) {
        items.splice(index, 1);
    }
    renderItemsList();
    render();
}

function updateItem(id, field, value) {
    const item = items.find((entry) => entry.id === id);
    if (!item) {
        return;
    }

    item[field] = field === 'desc' ? value : parseFloat(value) || 0;

    const totalElement = document.getElementById(`item-total-${id}`);
    if (totalElement) {
        totalElement.textContent = fmt(item.qty * item.price);
    }

    render();
}

function renderItemsList() {
    const list = document.getElementById('items-list');
    if (!list) {
        return;
    }

    list.innerHTML = items.map((item) => `
        <div class="item-row" id="item-row-${item.id}">
          <div class="item-row-top">
            <input class="item-desc-input" value="${esc(item.desc)}" placeholder="Service or item description…" oninput="updateItem(${item.id},'desc',this.value)"/>
            <button class="item-del" onclick="removeItem(${item.id})" title="Remove item">✕</button>
          </div>
          <div class="item-row-nums">
            <div class="item-num-field"><div class="item-num-label">Qty</div><input class="item-num-input" type="number" value="${item.qty}" min="0" step="0.5" oninput="updateItem(${item.id},'qty',this.value)"/></div>
            <div class="item-num-field"><div class="item-num-label">Unit Price</div><input class="item-num-input" type="number" value="${item.price}" min="0" oninput="updateItem(${item.id},'price',this.value)"/></div>
            <div class="item-num-field"><div class="item-num-label">Total</div><div class="item-total-display" id="item-total-${item.id}">${fmt(item.qty * item.price)}</div></div>
          </div>
        </div>`).join('');
}

function setDiscType(type) {
    discType = type;
    document.getElementById('disc-flat-btn')?.classList.toggle('active', type === 'flat');
    document.getElementById('disc-pct-btn')?.classList.toggle('active', type === 'percent');
    render();
}

function cycleStatus() {
    const index = statuses.indexOf(invoiceStatus);
    invoiceStatus = statuses[(index + 1) % statuses.length];
    const button = document.getElementById('status-btn');
    if (button) {
        button.innerHTML = `<span class="icon-dot" aria-hidden="true"></span><span>${statusLabels[invoiceStatus]}</span>`;
        button.className = `nav-status ${invoiceStatus}`;
    }
    render();
}

function calcTotals() {
    const subtotal = items.reduce((sum, item) => sum + item.qty * item.price, 0);
    const taxRate = parseFloat(document.getElementById('tax-rate')?.value || '0') || 0;
    const discVal = parseFloat(document.getElementById('disc-value')?.value || '0') || 0;
    const discountAmt = discType === 'percent' ? subtotal * discVal / 100 : discVal;
    const taxable = Math.max(0, subtotal - discountAmt);
    const taxAmt = taxable * taxRate / 100;
    const total = taxable + taxAmt;

    return { subtotal, discountAmt, taxAmt, taxRate, total };
}

function getCurrency() {
    return document.getElementById('inv-currency')?.value || 'NGN';
}

function fmt(value) {
    const symbol = SYMBOLS[getCurrency()] || '₦';

    return symbol + parseFloat(value || 0).toLocaleString('en-NG', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    });
}

function render() {
    const value = (id) => (document.getElementById(id)?.value || '').trim();
    const currency = getCurrency();
    const flatSymbolEl = document.getElementById('disc-flat-symbol');
    if (flatSymbolEl) flatSymbolEl.textContent = SYMBOLS[currency] || currency;
    const fromName = value('from-name') || 'i2Medier Konceptz';

    document.getElementById('inv-from-brand').textContent = fromName;

    const fromParts = [
        value('from-address'),
        value('from-city'),
        value('from-country'),
        value('from-email'),
        value('from-phone'),
        value('from-website'),
    ].filter(Boolean);
    document.getElementById('inv-from-details').innerHTML = fromParts.join('<br/>');

    document.getElementById('inv-number-display').textContent = '#' + (value('inv-number') || '—');

    const invDate = value('inv-date');
    const invDue = value('inv-due');
    const po = value('inv-po');
    let datesHTML = '';

    if (invDate) datesHTML += `<div class="inv-date-row"><span class="idr-label">Date:</span><span class="idr-val">${fmtDateDisplay(invDate)}</span></div>`;
    if (invDue) datesHTML += `<div class="inv-date-row"><span class="idr-label">Due:</span><span class="idr-val">${fmtDateDisplay(invDue)}</span></div>`;
    if (po) datesHTML += `<div class="inv-date-row"><span class="idr-label">PO:</span><span class="idr-val">${esc(po)}</span></div>`;
    document.getElementById('inv-dates-display').innerHTML = datesHTML;

    const badgeLabels = { draft: 'Draft', sent: 'Sent', paid: 'Paid' };
    document.getElementById('inv-status-badge-display').innerHTML = `<span class="inv-status-badge ${invoiceStatus}">${badgeLabels[invoiceStatus]}</span>`;

    const toName = value('to-name');
    const toCompany = value('to-company');
    const toAddr = value('to-address');
    const toCity = value('to-city');
    const toCountry = value('to-country');
    const toEmail = value('to-email');

    let billHTML = '';
    if (toName) billHTML += `<div class="inv-bill-name">${esc(toName)}</div>`;
    if (toCompany) billHTML += `<div class="inv-bill-company">${esc(toCompany)}</div>`;

    const addrLine = [toAddr, toCity, toCountry].filter(Boolean).join(', ');
    if (addrLine) billHTML += `<div class="inv-bill-addr">${esc(addrLine)}</div>`;
    if (toEmail) billHTML += `<div class="inv-bill-addr" style="margin-top:.25rem;color:var(--gold-dk)">${esc(toEmail)}</div>`;

    document.getElementById('inv-bill-to').innerHTML = billHTML || '<div class="inv-bill-addr" style="color:var(--g400);font-style:italic">Client details will appear here</div>';

    const fromAddr = [value('from-address'), value('from-city'), value('from-country')].filter(Boolean).join(', ');
    document.getElementById('inv-from-mini').innerHTML = `
        ${fromName ? `<div class="inv-bill-name">${esc(fromName)}</div>` : ''}
        ${fromAddr ? `<div class="inv-bill-addr">${esc(fromAddr)}</div>` : ''}
        ${value('from-email') ? `<div class="inv-bill-addr" style="margin-top:.2rem;color:var(--gold-dk)">${esc(value('from-email'))}</div>` : ''}
    `;

    const tbody = document.getElementById('inv-tbody');
    if (items.length === 0) {
        tbody.innerHTML = `<tr><td colspan="4" style="text-align:center;color:var(--g400);font-style:italic;padding:2rem">No line items added yet — use the form on the left to add services.</td></tr>`;
    } else {
        tbody.innerHTML = items.map((item) => `
            <tr>
              <td><div class="inv-item-desc">${esc(item.desc) || '<span style="color:var(--g400);font-style:italic">—</span>'}</div></td>
              <td class="inv-item-num">${item.qty}</td>
              <td class="inv-item-price">${fmt(item.price)}</td>
              <td class="inv-item-total">${fmt(item.qty * item.price)}</td>
            </tr>`).join('');
    }

    const { subtotal, discountAmt, taxAmt, taxRate, total } = calcTotals();
    const taxLabel = value('tax-label') || 'Tax';
    const discVal = parseFloat(value('disc-value')) || 0;
    let totalsHTML = '';

    totalsHTML += `<div class="inv-total-row"><span class="itr-label">Subtotal</span><span class="itr-val">${fmt(subtotal)}</span></div>`;
    if (discountAmt > 0) totalsHTML += `<div class="inv-total-row"><span class="itr-label">Discount${discType === 'percent' ? ` (${discVal}%)` : ''}</span><span class="itr-val itr-discount">− ${fmt(discountAmt)}</span></div>`;
    if (taxRate > 0) totalsHTML += `<div class="inv-total-row"><span class="itr-label">${esc(taxLabel)} (${taxRate}%)</span><span class="itr-val">${fmt(taxAmt)}</span></div>`;
    totalsHTML += `<div class="inv-grand-total"><span class="igt-label">Total Due (${currency})</span><span class="igt-val">${fmt(total)}</span></div>`;
    document.getElementById('inv-totals-display').innerHTML = totalsHTML;

    document.getElementById('form-total-block').innerHTML = `
        <div class="ftb-row"><span class="ftb-label">Subtotal</span><span class="ftb-val">${fmt(subtotal)}</span></div>
        ${discountAmt > 0 ? `<div class="ftb-row"><span class="ftb-label">Discount</span><span class="ftb-val" style="color:#4ade80">− ${fmt(discountAmt)}</span></div>` : ''}
        ${taxRate > 0 ? `<div class="ftb-row"><span class="ftb-label">${esc(taxLabel)} (${taxRate}%)</span><span class="ftb-val">${fmt(taxAmt)}</span></div>` : ''}
        <div class="ftb-row total-row"><span class="ftb-label">Total Due</span><span class="ftb-val">${fmt(total)}</span></div>
    `;

    const bankName = value('bank-name');
    const bankAcctName = value('bank-acct-name');
    const bankAcctNum = value('bank-acct-num');
    const bankSort = value('bank-sort');
    const bankRef = value('bank-ref');
    const notes = value('inv-notes');
    const terms = value('inv-terms');

    const hasPayment = bankName || bankAcctName || bankAcctNum;
    const hasNotesOrTerms = notes || terms;

    if (hasPayment || hasNotesOrTerms) {
        let bottomHTML = '';

        if (hasPayment) {
            bottomHTML += `<div>
                <div class="inv-payment-title">Payment Details</div>
                ${bankName ? `<div class="inv-payment-row"><span class="ipr-label">Bank:</span><span class="ipr-val">${esc(bankName)}</span></div>` : ''}
                ${bankAcctName ? `<div class="inv-payment-row"><span class="ipr-label">Account:</span><span class="ipr-val">${esc(bankAcctName)}</span></div>` : ''}
                ${bankAcctNum ? `<div class="inv-payment-row"><span class="ipr-label">Number:</span><span class="ipr-val">${esc(bankAcctNum)}</span></div>` : ''}
                ${bankSort ? `<div class="inv-payment-row"><span class="ipr-label">Sort/SWIFT:</span><span class="ipr-val">${esc(bankSort)}</span></div>` : ''}
                ${bankRef ? `<div class="inv-payment-row"><span class="ipr-label">Reference:</span><span class="ipr-val">${esc(bankRef)}</span></div>` : ''}
            </div>`;
        } else {
            bottomHTML += '<div></div>';
        }

        let rightCol = '';
        if (notes) rightCol += `<div><div class="inv-payment-title">Notes</div><div class="inv-notes-text">${esc(notes)}</div></div>`;
        if (terms) rightCol += `<div style="margin-top:${notes ? '.85rem' : '0'}"><div class="inv-payment-title">Terms & Conditions</div><div class="inv-notes-text" style="font-size:.72rem;color:var(--g400)">${esc(terms)}</div></div>`;
        bottomHTML += `<div>${rightCol}</div>`;

        document.getElementById('inv-bottom').innerHTML = bottomHTML;
        document.getElementById('inv-bottom').style.display = 'grid';
    } else {
        document.getElementById('inv-bottom').style.display = 'none';
    }

    document.getElementById('inv-footer-brand').textContent = fromName;
    document.getElementById('inv-footer-note').textContent = [value('from-email'), value('from-website')].filter(Boolean).join(' · ');
    applyInvoiceTheme(document.getElementById('invoice-paper'));
}

function fmtDateDisplay(dateStr) {
    if (!dateStr) {
        return '';
    }

    try {
        return new Date(dateStr + 'T00:00:00').toLocaleDateString('en-GB', {
            day: 'numeric',
            month: 'short',
            year: 'numeric',
        });
    } catch {
        return dateStr;
    }
}

function toggleSection(head) {
    head.classList.toggle('open');
    const body = head.nextElementSibling;
    if (body && body.classList.contains('fp-body')) {
        body.classList.toggle('open');
    }
}

function getInvoiceData() {
    const value = (id) => (document.getElementById(id)?.value || '').trim();

    return {
        number: value('inv-number'),
        date: value('inv-date'),
        due: value('inv-due'),
        po: value('inv-po'),
        currency: getCurrency(),
        status: invoiceStatus,
        from: {
            name: value('from-name'),
            address: value('from-address'),
            city: value('from-city'),
            country: value('from-country'),
            email: value('from-email'),
            phone: value('from-phone'),
            website: value('from-website'),
        },
        to: {
            name: value('to-name'),
            company: value('to-company'),
            address: value('to-address'),
            city: value('to-city'),
            country: value('to-country'),
            email: value('to-email'),
        },
        items: items.map((item) => ({ ...item })),
        discType,
        discValue: value('disc-value'),
        taxRate: value('tax-rate'),
        taxLabel: value('tax-label'),
        bank: {
            name: value('bank-name'),
            acctName: value('bank-acct-name'),
            acctNum: value('bank-acct-num'),
            sort: value('bank-sort'),
            ref: value('bank-ref'),
        },
        theme: { ...invoiceTheme },
        notes: value('inv-notes'),
        terms: value('inv-terms'),
        savedAt: new Date().toISOString(),
    };
}

function saveInvoice() {
    const data = getInvoiceData();
    if (!data.number) {
        toast('Please enter an invoice number first.');
        return;
    }

    const key = 'i2m_inv_' + data.number.replace(/[^a-zA-Z0-9-]/g, '_');
    localStorage.setItem(key, JSON.stringify(data));
    refreshSavedList();
    toast(`Invoice ${data.number} saved`);
}

function getSavedKeys() {
    return Object.keys(localStorage).filter((key) => key.startsWith('i2m_inv_'));
}

function loadInvoiceData(key) {
    try {
        return JSON.parse(localStorage.getItem(key));
    } catch {
        return null;
    }
}

function loadInvoice(key) {
    const data = loadInvoiceData(key);
    if (!data) {
        toast('Could not load invoice.');
        return;
    }

    applyInvoiceData(data);
    toast(`Invoice ${data.number} loaded`);
}

function applyInvoiceData(data) {
    setValue('inv-number', data.number);
    setValue('inv-date', data.date);
    setValue('inv-due', data.due);
    setValue('inv-po', data.po);
    setValue('inv-currency', data.currency);
    setValue('from-name', data.from?.name);
    setValue('from-address', data.from?.address);
    setValue('from-city', data.from?.city);
    setValue('from-country', data.from?.country);
    setValue('from-email', data.from?.email);
    setValue('from-phone', data.from?.phone);
    setValue('from-website', data.from?.website);
    setValue('to-name', data.to?.name);
    setValue('to-company', data.to?.company);
    setValue('to-address', data.to?.address);
    setValue('to-city', data.to?.city);
    setValue('to-country', data.to?.country);
    setValue('to-email', data.to?.email);
    setValue('tax-rate', data.taxRate);
    setValue('tax-label', data.taxLabel);
    setValue('disc-value', data.discValue);
    setValue('bank-name', data.bank?.name);
    setValue('bank-acct-name', data.bank?.acctName);
    setValue('bank-acct-num', data.bank?.acctNum);
    setValue('bank-sort', data.bank?.sort);
    setValue('bank-ref', data.bank?.ref);
    setValue('inv-notes', data.notes);
    setValue('inv-terms', data.terms);
    setInvoiceTheme(data.theme || DEFAULT_THEME);

    discType = data.discType || 'flat';
    document.getElementById('disc-flat-btn')?.classList.toggle('active', discType === 'flat');
    document.getElementById('disc-pct-btn')?.classList.toggle('active', discType === 'percent');

    invoiceStatus = data.status || 'draft';
    const button = document.getElementById('status-btn');
    if (button) {
        button.innerHTML = `<span class="icon-dot" aria-hidden="true"></span><span>${statusLabels[invoiceStatus]}</span>`;
        button.className = `nav-status ${invoiceStatus}`;
    }

    items.length = 0;
    itemIdCounter = 0;
    (data.items || []).forEach((item) => addItem(item.desc, item.qty, item.price));
    render();
}

function deleteInvoice(key, event) {
    event.stopPropagation();
    localStorage.removeItem(key);
    refreshSavedList();
    toast('Invoice deleted.');
}

function refreshSavedList() {
    const list = document.getElementById('saved-list');
    if (!list) {
        return;
    }

    const keys = getSavedKeys();
    if (keys.length === 0) {
        list.innerHTML = '<div class="no-saved">No saved invoices yet</div>';
        return;
    }

    list.innerHTML = keys.sort().reverse().map((key) => {
        const data = loadInvoiceData(key);
        if (!data) {
            return '';
        }

        const subtotal = (data.items || []).reduce((sum, item) => sum + (item.qty * item.price), 0);
        const disc = data.discType === 'percent' ? subtotal * (parseFloat(data.discValue) || 0) / 100 : parseFloat(data.discValue) || 0;
        const tax = (subtotal - disc) * (parseFloat(data.taxRate) || 0) / 100;
        const total = subtotal - disc + tax;
        const symbol = SYMBOLS[data.currency] || '₦';

        return `<div class="saved-item" onclick="loadInvoice('${key}')">
          <div class="si-info">
            <div class="si-num">${esc(data.number || key)}</div>
            <div class="si-client">${esc(data.to?.name || data.to?.company || 'No client')} · ${symbol}${total.toLocaleString('en-NG', {minimumFractionDigits:0,maximumFractionDigits:0})}</div>
          </div>
          <button class="si-del" onclick="deleteInvoice('${key}',event)" title="Delete">✕</button>
        </div>`;
    }).join('');
}

function newInvoice() {
    if (!confirm('Start a new invoice? Unsaved changes will be lost.')) {
        return;
    }

    items.length = 0;
    itemIdCounter = 0;
    invoiceStatus = 'draft';

    const button = document.getElementById('status-btn');
    if (button) {
        button.innerHTML = '<span class="icon-dot" aria-hidden="true"></span><span>Draft</span>';
        button.className = 'nav-status draft';
    }

    const today = new Date();
    const due = new Date(today);
    due.setDate(due.getDate() + 14);

    setValue('inv-date', fmtDateInput(today));
    setValue('inv-due', fmtDateInput(due));
    setValue('inv-number', generateInvNum());
    setValue('to-name', '');
    setValue('to-company', '');
    setValue('to-address', '');
    setValue('to-city', '');
    setValue('to-country', '');
    setValue('to-email', '');
    setValue('inv-po', '');
    setValue('disc-value', '0');

    addItem('', 1, 0);
    render();
    toast('New invoice created');
}

function clearForm() {
    if (!confirm('Clear all client and item details?')) {
        return;
    }

    ['to-name', 'to-company', 'to-address', 'to-city', 'to-country', 'to-email', 'inv-po'].forEach((id) => setValue(id, ''));
    items.length = 0;
    itemIdCounter = 0;
    addItem('', 1, 0);
    render();
}

function loadSaved() {
    document.getElementById('saved-list-wrap')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
    refreshSavedList();
}

function printInvoice() {
    try {
        localStorage.setItem(printStorageKey, JSON.stringify(getInvoiceData()));
        const printWindow = window.open(printRoute, '_blank', 'noopener,noreferrer');

        if (!printWindow) {
            throw new Error('Popup blocked. Please allow popups, then try again.');
        }
    } catch (error) {
        toast(error?.message || 'Could not open the print view.');
    }
}

function setHeaderTheme(value, mode = 'preset') {
    invoiceTheme.header = normalizeHex(value, DEFAULT_THEME.header);
    invoiceTheme.headerMode = mode;
    syncThemeControls();
    render();
}

function setAccentTheme(value, mode = 'preset') {
    invoiceTheme.accent = normalizeHex(value, DEFAULT_THEME.accent);
    invoiceTheme.accentMode = mode;
    syncThemeControls();
    render();
}

function setInvoiceTheme(theme) {
    invoiceTheme.header = normalizeHex(theme.header, DEFAULT_THEME.header);
    invoiceTheme.accent = normalizeHex(theme.accent, DEFAULT_THEME.accent);
    invoiceTheme.headerMode = theme.headerMode || 'preset';
    invoiceTheme.accentMode = theme.accentMode || 'preset';
    syncThemeControls();
}

function syncThemeControls() {
    document.querySelectorAll('[data-theme-target="header"]').forEach((element) => {
        element.classList.toggle('selected', invoiceTheme.headerMode !== 'custom' && normalizeHex(element.dataset.themeValue, '') === invoiceTheme.header);
    });

    document.querySelectorAll('[data-theme-target="accent"]').forEach((element) => {
        element.classList.toggle('selected', invoiceTheme.accentMode !== 'custom' && normalizeHex(element.dataset.themeValue, '') === invoiceTheme.accent);
    });

    const headerCustom = document.getElementById('theme-header-custom');
    const headerInput = document.getElementById('theme-header-custom-input');
    const headerSwatch = document.getElementById('theme-header-custom-swatch');
    if (headerInput) headerInput.value = invoiceTheme.header;
    if (headerSwatch) headerSwatch.style.background = invoiceTheme.header;
    headerCustom?.classList.toggle('selected', invoiceTheme.headerMode === 'custom');

    const accentCustom = document.getElementById('theme-accent-custom');
    const accentInput = document.getElementById('theme-accent-custom-input');
    const accentSwatch = document.getElementById('theme-accent-custom-swatch');
    if (accentInput) accentInput.value = invoiceTheme.accent;
    if (accentSwatch) accentSwatch.style.background = invoiceTheme.accent;
    accentCustom?.classList.toggle('selected', invoiceTheme.accentMode === 'custom');
}

function applyInvoiceTheme(element) {
    if (!element) return;

    const headerText = pickReadableTextColor(invoiceTheme.header);
    const headerMuted = rgbaFromHex(headerText, 0.4);
    const headerMutedStrong = rgbaFromHex(headerText, 0.25);
    const headerBadgeBg = rgbaFromHex(headerText, 0.08);
    const headerBadgeText = rgbaFromHex(headerText, 0.7);

    element.style.setProperty('--invoice-header-bg', invoiceTheme.header);
    element.style.setProperty('--invoice-header-text', headerText);
    element.style.setProperty('--invoice-header-muted', headerMuted);
    element.style.setProperty('--invoice-header-muted-strong', headerMutedStrong);
    element.style.setProperty('--invoice-header-badge-bg', headerBadgeBg);
    element.style.setProperty('--invoice-header-badge-text', headerBadgeText);
    element.style.setProperty('--invoice-accent', invoiceTheme.accent);
    element.style.setProperty('--invoice-accent-light', mixHex(invoiceTheme.accent, '#ffffff', 0.45));
    element.style.setProperty('--invoice-accent-dark', mixHex(invoiceTheme.accent, '#000000', 0.22));
}

function normalizeHex(value, fallback) {
    const hex = String(value || '').trim();
    return /^#([0-9a-f]{6})$/i.test(hex) ? hex.toLowerCase() : fallback;
}

function rgbaFromHex(hex, alpha) {
    const { r, g, b } = hexToRgb(hex);
    return `rgba(${r}, ${g}, ${b}, ${alpha})`;
}

function mixHex(base, mix, ratio) {
    const a = hexToRgb(base);
    const b = hexToRgb(mix);
    const blend = (x, y) => Math.round(x + ((y - x) * ratio));
    return rgbToHex(blend(a.r, b.r), blend(a.g, b.g), blend(a.b, b.b));
}

function pickReadableTextColor(background) {
    const whiteContrast = contrastRatio(background, '#ffffff');
    const blackContrast = contrastRatio(background, '#111111');
    return whiteContrast >= blackContrast ? '#ffffff' : '#111111';
}

function contrastRatio(colorA, colorB) {
    const lumA = relativeLuminance(colorA);
    const lumB = relativeLuminance(colorB);
    const lighter = Math.max(lumA, lumB);
    const darker = Math.min(lumA, lumB);
    return (lighter + 0.05) / (darker + 0.05);
}

function relativeLuminance(hex) {
    const { r, g, b } = hexToRgb(hex);
    const channel = (value) => {
        const normalized = value / 255;
        return normalized <= 0.03928 ? normalized / 12.92 : ((normalized + 0.055) / 1.055) ** 2.4;
    };

    return (0.2126 * channel(r)) + (0.7152 * channel(g)) + (0.0722 * channel(b));
}

function hexToRgb(hex) {
    const normalized = normalizeHex(hex, '#000000').slice(1);
    return {
        r: parseInt(normalized.slice(0, 2), 16),
        g: parseInt(normalized.slice(2, 4), 16),
        b: parseInt(normalized.slice(4, 6), 16),
    };
}

function rgbToHex(r, g, b) {
    return `#${[r, g, b].map((value) => value.toString(16).padStart(2, '0')).join('')}`;
}

function toast(message, duration = 3000) {
    const element = document.getElementById('toast');
    if (!element) {
        return;
    }

    element.textContent = message;
    element.classList.add('show');
    setTimeout(() => element.classList.remove('show'), duration);
}

function esc(str) {
    return String(str || '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
}

window.addItem = addItem;
window.removeItem = removeItem;
window.updateItem = updateItem;
window.setDiscType = setDiscType;
window.cycleStatus = cycleStatus;
window.toggleSection = toggleSection;
window.saveInvoice = saveInvoice;
window.loadInvoice = loadInvoice;
window.deleteInvoice = deleteInvoice;
window.refreshSavedList = refreshSavedList;
window.newInvoice = newInvoice;
window.clearForm = clearForm;
window.loadSaved = loadSaved;
window.printInvoice = printInvoice;
window.render = render;
window.setHeaderTheme = setHeaderTheme;
window.setAccentTheme = setAccentTheme;

syncThemeControls();
