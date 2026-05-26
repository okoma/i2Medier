<x-filament-panels::page>
    <div class="invoices-ui">
        <style>
            .invoices-ui {
                --surface-border: #e8e2db;
                --text: #171717;
                --text-soft: #687384;
                --text-faint: #97a0af;
                --orange: #ff5b00;
                --green: #1f9a59;
                --green-soft: #ebfbf2;
                --yellow-soft: #fff5df;
                --red: #ff3b30;
                --red-soft: #ffeceb;
                --purple: #7a49ff;
                --purple-soft: #f1eafe;
                --blue: #2e74ff;
                --blue-soft: #eaf3ff;
                --shadow: 0 18px 40px rgba(26, 25, 31, 0.06);
                color: var(--text);
                font-family: "Plus Jakarta Sans", sans-serif;
            }

            .invoices-ui * { box-sizing: border-box; }
            .invoices-ui svg { width: 100%; height: 100%; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; fill: none; }
            .invoices-ui button { border: 0; background: none; cursor: pointer; font: inherit; }
            .invoices-ui .stats-grid { display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 16px; margin-bottom: 16px; }
            .invoices-ui .stat-card,
            .invoices-ui .invoices-panel,
            .invoices-ui .mini-panel,
            .invoices-ui .filter-button,
            .invoices-ui .new-invoice-button,
            .invoices-ui .view-button,
            .invoices-ui .icon-button,
            .invoices-ui .page-button,
            .invoices-ui .history-button { border: 1px solid var(--surface-border); background: rgba(255, 255, 255, 0.94); box-shadow: var(--shadow); }
            .invoices-ui .stat-card { display: flex; align-items: center; gap: 18px; min-height: 124px; padding: 22px; border-radius: 18px; }
            .invoices-ui .stat-icon { display: grid; place-items: center; width: 48px; height: 48px; border-radius: 14px; flex: 0 0 auto; }
            .invoices-ui .soft-blue { background: var(--blue-soft); color: var(--blue); }
            .invoices-ui .soft-green { background: var(--green-soft); color: var(--green); }
            .invoices-ui .soft-yellow { background: var(--yellow-soft); color: #f08a00; }
            .invoices-ui .soft-red { background: var(--red-soft); color: var(--red); }
            .invoices-ui .soft-purple { background: var(--purple-soft); color: var(--purple); }
            .invoices-ui .stat-copy span { display: block; margin-bottom: 8px; color: #445062; }
            .invoices-ui .stat-copy strong { display: block; margin-bottom: 8px; font-size: 2rem; letter-spacing: -.06em; }
            .invoices-ui .stat-copy small,
            .invoices-ui .mini-label,
            .invoices-ui .payment-main p,
            .invoices-ui .payment-meta span,
            .invoices-ui .request-copy p,
            .invoices-ui .invoices-footer p { color: var(--text-soft); }
            .invoices-ui .invoices-panel,
            .invoices-ui .mini-panel { border-radius: 22px; overflow: hidden; }
            .invoices-ui .panel-toolbar { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 22px 0; }
            .invoices-ui .tabs { display: flex; align-items: center; gap: 28px; overflow-x: auto; }
            .invoices-ui .tab { position: relative; padding: 10px 0 18px; color: #536071; white-space: nowrap; }
            .invoices-ui .tab.is-active { color: var(--orange); }
            .invoices-ui .tab.is-active::after { content: ""; position: absolute; left: -6px; right: -6px; bottom: 0; height: 3px; border-radius: 999px; background: var(--orange); }
            .invoices-ui .toolbar-actions { display: flex; align-items: center; gap: 14px; }
            .invoices-ui .filter-button,
            .invoices-ui .new-invoice-button,
            .invoices-ui .view-button,
            .invoices-ui .icon-button,
            .invoices-ui .page-button,
            .invoices-ui .history-button { display: inline-flex; align-items: center; justify-content: center; min-height: 36px; border-radius: 10px; box-shadow: none; }
            .invoices-ui .filter-button,
            .invoices-ui .new-invoice-button { gap: 10px; padding: 0 18px; }
            .invoices-ui .filter-button { color: #475162; }
            .invoices-ui .new-invoice-button,
            .invoices-ui .page-button.is-active { background: linear-gradient(180deg, #ff7b2f 0%, var(--orange) 100%); border-color: transparent; color: #fff; }
            .invoices-ui .button-icon,
            .invoices-ui .balance-icon,
            .invoices-ui .payment-ok { width: 18px; height: 18px; flex: 0 0 auto; }
            .invoices-ui .invoices-table { padding: 8px 22px 0; }
            .invoices-ui .invoice-grid { display: grid; grid-template-columns: 140px minmax(230px, 1.7fr) 140px 140px 120px 110px 160px; align-items: center; gap: 18px; }
            .invoices-ui .invoice-head { padding: 16px 8px; border-top: 1px solid rgba(232, 226, 219, .9); color: #556172; font-size: .94rem; }
            .invoices-ui .invoice-row { padding: 16px 8px; border-top: 1px solid rgba(232, 226, 219, .9); color: #4b5666; }
            .invoices-ui .invoice-link { color: #1767ff; font-weight: 500; }
            .invoices-ui .description-cell,
            .invoices-ui .amount-cell { color: #273445; }
            .invoices-ui .amount-cell { font-weight: 500; }
            .invoices-ui .status-pill { display: inline-flex; align-items: center; justify-content: center; min-height: 28px; padding: 0 10px; border-radius: 8px; font-size: .82rem; font-weight: 600; white-space: nowrap; }
            .invoices-ui .pill-green { background: #e7f8ec; color: var(--green); }
            .invoices-ui .pill-amber { background: #fff0d8; color: #da8400; }
            .invoices-ui .pill-red { background: #ffe8e7; color: var(--red); }
            .invoices-ui .action-cell { display: flex; align-items: center; gap: 10px; }
            .invoices-ui .view-button { min-width: 60px; padding: 0 16px; color: #212c3c; }
            .invoices-ui .icon-button { width: 38px; color: #4c5768; }
            .invoices-ui .invoices-footer { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 22px 16px; }
            .invoices-ui .pagination { display: flex; align-items: center; gap: 10px; }
            .invoices-ui .page-button { min-width: 34px; padding: 0 12px; color: #516071; }
            .invoices-ui .icon-nav { width: 34px; padding: 0; }
            .invoices-ui .bottom-grid { display: grid; grid-template-columns: .86fr 1.55fr 1.15fr; gap: 16px; margin-top: 16px; }
            .invoices-ui .mini-panel { padding: 18px 18px 16px; }
            .invoices-ui .mini-label { margin-top: 10px; display: block; }
            .invoices-ui .balance-row { display: flex; align-items: center; justify-content: space-between; gap: 16px; margin: 10px 0 14px; }
            .invoices-ui .balance-row strong { font-size: 2.05rem; color: var(--red); letter-spacing: -.05em; }
            .invoices-ui .balance-icon { width: 54px; height: 54px; display: grid; place-items: center; border-radius: 12px; background: #ffe8e7; color: var(--red); }
            .invoices-ui .pay-button { min-height: 38px; padding: 0 18px; border: 1px solid #ffc09e; border-radius: 10px; color: var(--orange); font-weight: 600; }
            .invoices-ui .payment-row { display: grid; grid-template-columns: 22px minmax(0,1fr) auto; gap: 14px; align-items: center; margin-top: 20px; margin-bottom: 16px; }
            .invoices-ui .payment-ok { width: 22px; height: 22px; color: var(--green); }
            .invoices-ui .payment-main .invoice-link { display: inline-block; margin-bottom: 8px; }
            .invoices-ui .payment-meta { text-align: right; }
            .invoices-ui .payment-meta strong { display: block; color: var(--green); font-size: 1.5rem; letter-spacing: -.04em; margin-bottom: 8px; }
            .invoices-ui .history-button { min-height: 38px; padding: 0 16px; color: #243142; }
            .invoices-ui .request-panel { display: grid; grid-template-columns: 1fr 96px; align-items: center; gap: 12px; }
            .invoices-ui .request-copy p { margin: 12px 0 18px; line-height: 1.55; }
            .invoices-ui .request-button { min-height: 38px; padding: 0 16px; border: 1px solid #cdd7ff; border-radius: 10px; color: #2757ff; background: #f4f7ff; font-weight: 600; }
            .invoices-ui .request-graphic { width: 96px; height: 116px; color: var(--purple); justify-self: end; }

            @media (max-width: 1380px) {
                .invoices-ui .stats-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
                .invoices-ui .invoice-grid { grid-template-columns: 140px minmax(220px,1.5fr) 130px 130px 120px 100px 150px; }
                .invoices-ui .bottom-grid { grid-template-columns: 1fr; }
            }

            @media (max-width: 1180px) {
                .invoices-ui .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
                .invoices-ui .panel-toolbar { flex-direction: column; align-items: flex-start; }
                .invoices-ui .invoice-grid,
                .invoices-ui .invoice-head { grid-template-columns: 1fr; }
                .invoices-ui .invoice-head { display: none; }
            }

            @media (max-width: 760px) {
                .invoices-ui .stats-grid { grid-template-columns: 1fr; }
                .invoices-ui .toolbar-actions,
                .invoices-ui .invoices-footer,
                .invoices-ui .payment-row,
                .invoices-ui .request-panel { width: 100%; flex-direction: column; align-items: flex-start; }
                .invoices-ui .payment-meta { text-align: left; }
                .invoices-ui .request-graphic { justify-self: start; }
            }
        </style>

        <section class="stats-grid" aria-label="Invoice summary">
            <article class="stat-card"><div class="stat-icon soft-blue"><svg viewBox="0 0 24 24"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"/><path d="M14 3.5V8h4"/><path d="M8 12h6"/><path d="M8 16h8"/></svg></div><div class="stat-copy"><span>Total Invoices</span><strong>16</strong><small>All time</small></div></article>
            <article class="stat-card"><div class="stat-icon soft-green"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5"/><path d="m8.5 12 2.2 2.2 4.8-5"/></svg></div><div class="stat-copy"><span>Paid Invoices</span><strong>10</strong><small>62.5% of total</small></div></article>
            <article class="stat-card"><div class="stat-icon soft-yellow"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12h3.5"/></svg></div><div class="stat-copy"><span>Pending Invoices</span><strong>4</strong><small>25% of total</small></div></article>
            <article class="stat-card"><div class="stat-icon soft-red"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5"/><path d="M12 8v5"/><path d="M12 16h.01"/></svg></div><div class="stat-copy"><span>Overdue Invoices</span><strong>2</strong><small>12.5% of total</small></div></article>
            <article class="stat-card"><div class="stat-icon soft-purple"><svg viewBox="0 0 24 24"><rect x="4.5" y="6" width="15" height="12" rx="2"/><path d="M4.5 10h15"/><path d="M8 14h3"/></svg></div><div class="stat-copy"><span>Total Outstanding</span><strong>₦210,000</strong><small>Amount due</small></div></article>
        </section>

        <section class="invoices-panel">
            <div class="panel-toolbar">
                <div class="tabs" aria-label="Invoice filters">
                    <button type="button" class="tab is-active">All Invoices</button>
                    <button type="button" class="tab">Paid</button>
                    <button type="button" class="tab">Pending</button>
                    <button type="button" class="tab">Overdue</button>
                    <button type="button" class="tab">Cancelled</button>
                </div>
                <div class="toolbar-actions">
                    <button type="button" class="filter-button"><span class="button-icon"><svg viewBox="0 0 24 24"><path d="M4 6h16"/><path d="M7 12h10"/><path d="M10 18h4"/></svg></span><span>Filter</span></button>
                    <button type="button" class="new-invoice-button"><span class="button-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span><span>New Invoice</span></button>
                </div>
            </div>

            <div class="invoices-table">
                <div class="invoice-head invoice-grid"><span>Invoice #</span><span>Description</span><span>Issue Date</span><span>Due Date</span><span>Amount</span><span>Status</span><span>Actions</span></div>
                <article class="invoice-row invoice-grid"><div class="invoice-link">INV-2024-0016</div><div class="description-cell">Website Redesign Project</div><div>May 5, 2024</div><div>May 20, 2024</div><div class="amount-cell">₦150,000</div><div><span class="status-pill pill-green">Paid</span></div><div class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice"><svg viewBox="0 0 24 24"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg></button><button type="button" class="icon-button" aria-label="More invoice actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></div></article>
                <article class="invoice-row invoice-grid"><div class="invoice-link">INV-2024-0015</div><div class="description-cell">Premium Hosting (May 2024)</div><div>May 1, 2024</div><div>May 15, 2024</div><div class="amount-cell">₦90,000</div><div><span class="status-pill pill-green">Paid</span></div><div class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice"><svg viewBox="0 0 24 24"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg></button><button type="button" class="icon-button" aria-label="More invoice actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></div></article>
                <article class="invoice-row invoice-grid"><div class="invoice-link">INV-2024-0014</div><div class="description-cell">SSL Certificate (acme.com)</div><div>Apr 28, 2024</div><div>May 12, 2024</div><div class="amount-cell">₦15,000</div><div><span class="status-pill pill-green">Paid</span></div><div class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice"><svg viewBox="0 0 24 24"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg></button><button type="button" class="icon-button" aria-label="More invoice actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></div></article>
                <article class="invoice-row invoice-grid"><div class="invoice-link">INV-2024-0013</div><div class="description-cell">E-commerce Development</div><div>Apr 20, 2024</div><div>May 20, 2024</div><div class="amount-cell">₦300,000</div><div><span class="status-pill pill-amber">Pending</span></div><div class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice"><svg viewBox="0 0 24 24"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg></button><button type="button" class="icon-button" aria-label="More invoice actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></div></article>
                <article class="invoice-row invoice-grid"><div class="invoice-link">INV-2024-0012</div><div class="description-cell">Domain Registration (acme.net)</div><div>Apr 18, 2024</div><div>May 3, 2024</div><div class="amount-cell">₦8,000</div><div><span class="status-pill pill-green">Paid</span></div><div class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice"><svg viewBox="0 0 24 24"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg></button><button type="button" class="icon-button" aria-label="More invoice actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></div></article>
                <article class="invoice-row invoice-grid"><div class="invoice-link">INV-2024-0011</div><div class="description-cell">Website Maintenance (Apr 2024)</div><div>Apr 15, 2024</div><div>Apr 30, 2024</div><div class="amount-cell">₦30,000</div><div><span class="status-pill pill-red">Overdue</span></div><div class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice"><svg viewBox="0 0 24 24"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg></button><button type="button" class="icon-button" aria-label="More invoice actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></div></article>
                <article class="invoice-row invoice-grid"><div class="invoice-link">INV-2024-0010</div><div class="description-cell">SEO Optimization</div><div>Apr 10, 2024</div><div>Apr 25, 2024</div><div class="amount-cell">₦80,000</div><div><span class="status-pill pill-green">Paid</span></div><div class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice"><svg viewBox="0 0 24 24"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg></button><button type="button" class="icon-button" aria-label="More invoice actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></div></article>
                <article class="invoice-row invoice-grid"><div class="invoice-link">INV-2024-0009</div><div class="description-cell">Business Email (5 Mailboxes)</div><div>Apr 5, 2024</div><div>Apr 20, 2024</div><div class="amount-cell">₦24,000</div><div><span class="status-pill pill-amber">Pending</span></div><div class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice"><svg viewBox="0 0 24 24"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg></button><button type="button" class="icon-button" aria-label="More invoice actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></div></article>
            </div>

            <div class="invoices-footer">
                <p>Showing 1 to 8 of 16 invoices</p>
                <div class="pagination">
                    <button type="button" class="page-button icon-nav" aria-label="Previous page"><svg viewBox="0 0 24 24"><path d="m14 7-5 5 5 5"/></svg></button>
                    <button type="button" class="page-button is-active">1</button>
                    <button type="button" class="page-button">2</button>
                    <button type="button" class="page-button icon-nav" aria-label="Next page"><svg viewBox="0 0 24 24"><path d="m10 7 5 5-5 5"/></svg></button>
                </div>
            </div>
        </section>

        <section class="bottom-grid">
            <article class="mini-panel balance-panel"><h2>Outstanding Balance</h2><span class="mini-label">Total Due</span><div class="balance-row"><strong>₦210,000</strong><div class="balance-icon"><svg viewBox="0 0 24 24"><rect x="4.5" y="6" width="15" height="12" rx="2"/><path d="M4.5 10h15"/><path d="M8 14h3"/></svg></div></div><button type="button" class="pay-button">Make a Payment</button></article>
            <article class="mini-panel payment-panel"><h2>Recent Payment</h2><div class="payment-row"><span class="payment-ok"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/><path d="m8.5 12 2.2 2.2 4.8-5"/></svg></span><div class="payment-main"><a href="#" class="invoice-link">INV-2024-0015</a><p>Premium Hosting (May 2024)</p></div><div class="payment-meta"><strong>₦90,000</strong><span>Paid on May 2, 2024</span></div></div><button type="button" class="history-button">View Payment History</button></article>
            <article class="mini-panel request-panel"><div class="request-copy"><h2>Need an Invoice for Something?</h2><p>If you need an invoice for a new service or custom amount, you can request one.</p><button type="button" class="request-button">Request Invoice</button></div><div class="request-graphic" aria-hidden="true"><svg viewBox="0 0 96 116"><rect x="20" y="8" width="56" height="88" rx="8"/><circle cx="60" cy="34" r="11"/><path d="M60 29v10"/><path d="M55 34h10"/><path d="M30 56h36"/><path d="M30 69h36"/><path d="M30 82h20"/></svg></div></article>
        </section>
    </div>
</x-filament-panels::page>
