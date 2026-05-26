<x-filament-panels::page>
    <style>
        .billing-ui {
        
            --surface-border: #e8e2db;
            --text: #171717;
            --text-soft: #687384;
            --text-faint: #97a0af;
            --orange: #ff5b00;
            --orange-soft: #fff1e8;
            --green: #1f9a59;
            --green-soft: #ebfbf2;
            --yellow: #f59d0b;
            --yellow-soft: #fff5df;
            --red: #ff3b30;
            --red-soft: #ffeceb;
            --purple: #7a49ff;
            --purple-soft: #f1eafe;
            --blue: #2e74ff;
            --blue-soft: #eaf3ff;
            --shadow: 0 18px 40px rgba(26,25,31,.06);
            color: var(--text);
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .billing-ui *,
        .billing-ui *::before,
        .billing-ui *::after { box-sizing: border-box; }
        .billing-ui a, .billing-ui button, .billing-ui input { font: inherit; }
        .billing-ui a { color: inherit; text-decoration: none; }
        .billing-ui button { border: 0; background: none; cursor: pointer; }
        .billing-ui input { border: 0; background: transparent; color: inherit; }
        .billing-ui input:focus { outline: 0; }
        .billing-ui svg { width: 100%; height: 100%; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }

        
        .billing-ui .searchbox,
        .billing-ui .notification-button,
        .billing-ui .account-switcher,
        .billing-ui .stat-card,
        .billing-ui .panel,
        .billing-ui .ghost-button,
        .billing-ui .view-button,
        .billing-ui .icon-button,
        .billing-ui .add-method-button,
        .billing-ui .primary-button {
            border: 1px solid var(--surface-border);
            background: rgba(255,255,255,.94);
            box-shadow: var(--shadow);
        }

        .billing-ui .searchbox,
        .billing-ui .notification-button,
        .billing-ui .account-switcher { min-height: 42px; border-radius: 12px; }
        .billing-ui .searchbox { display: flex; align-items: center; gap: 12px; width: 238px; padding: 0 14px; color: var(--text-faint); }
        .billing-ui .searchbox input { width: 100%; }

        .billing-ui .nav-icon,
        .billing-ui .support-button svg,
        .billing-ui .user-next svg,
        .billing-ui .notification-button svg,
        .billing-ui .office-icon svg,
        .billing-ui .account-switcher > svg,
        .billing-ui .icon-button svg,
        .billing-ui .search-icon svg {
            width: 18px;
            height: 18px;
            flex: 0 0 auto;
        }

        .billing-ui .notification-button { position: relative; display: inline-flex; align-items: center; justify-content: center; width: 42px; color: #485161; }
        .billing-ui .notification-badge { position: absolute; top: -6px; right: -6px; display: grid; place-items: center; min-width: 18px; height: 18px; padding: 0 4px; border-radius: 999px; background: var(--orange); color: #fff; font-size: .68rem; font-weight: 700; }
        .billing-ui .account-switcher { display: inline-flex; align-items: center; gap: 10px; padding: 0 16px; color: #2a3140; font-weight: 500; }
        .billing-ui .office-icon { color: #738091; }
        .billing-ui .account-switcher > svg:last-child { color: #677484; }

        .billing-ui .stats-grid { display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 14px; margin-bottom: 16px; }
        .billing-ui .stat-card { display: flex; align-items: center; gap: 18px; min-height: 114px; padding: 18px 20px; border-radius: 18px; }
        .billing-ui .stat-icon { display: grid; place-items: center; width: 46px; height: 46px; border-radius: 14px; flex: 0 0 auto; }
        .billing-ui .soft-red { background: var(--red-soft); color: var(--red); }
        .billing-ui .soft-green { background: var(--green-soft); color: var(--green); }
        .billing-ui .soft-purple { background: var(--purple-soft); color: var(--purple); }
        .billing-ui .soft-orange { background: var(--orange-soft); color: var(--orange); }
        .billing-ui .soft-blue { background: var(--blue-soft); color: var(--blue); }
        .billing-ui .stat-copy span { display: block; margin-bottom: 8px; color: #445062; }
        .billing-ui .stat-copy strong { display: block; margin-bottom: 8px; font-size: 1.95rem; letter-spacing: -.05em; }
        .billing-ui .stat-copy small { color: var(--text-soft); font-size: .94rem; }

        .billing-ui .main-grid { display: grid; grid-template-columns: minmax(0, 1.7fr) minmax(350px, .78fr); gap: 16px; }
        .billing-ui .left-stack, .billing-ui .right-stack { display: grid; gap: 16px; min-width: 0; }
        .billing-ui .panel { border-radius: 22px; padding: 18px 18px 16px; overflow: hidden; }
        .billing-ui .panel-head { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 12px; }
        .billing-ui .support-card h2, .billing-ui .panel h2 { margin: 0; font-size: 1rem; }
        .billing-ui .ghost-button { min-height: 34px; padding: 0 14px; border-radius: 10px; color: #243142; box-shadow: none; }
        .billing-ui .compact { min-height: 32px; }

        .billing-ui .history-tabs { display: flex; align-items: center; gap: 30px; margin-bottom: 14px; border-bottom: 1px solid rgba(232,226,219,.9); }
        .billing-ui .history-tab { position: relative; padding: 8px 0 14px; color: #556172; }
        .billing-ui .history-tab.is-active { color: var(--orange); }
        .billing-ui .history-tab.is-active::after { content: ""; position: absolute; left: 0; right: 0; bottom: -1px; height: 3px; border-radius: 999px; background: var(--orange); }

        .billing-ui .history-grid { display: grid; grid-template-columns: 115px 100px 100px minmax(160px,1fr) 85px 90px 88px; align-items: center; gap: 16px; }
        .billing-ui .history-head, .billing-ui .mini-head-row { color: #677384; font-size: .92rem; }
        .billing-ui .history-head { padding: 10px 2px; }
        .billing-ui .history-row { padding: 12px 2px; border-top: 1px solid rgba(232,226,219,.75); color: #495667; }
        .billing-ui .history-row:first-of-type { border-top: 0; }
        .billing-ui .invoice-link { color: #1767ff; font-weight: 500; }
        .billing-ui .status-pill { display: inline-flex; align-items: center; justify-content: center; min-height: 24px; padding: 0 8px; border-radius: 7px; font-size: .74rem; font-weight: 600; white-space: nowrap; }
        .billing-ui .pill-green { background: #e7f8ec; color: var(--green); }
        .billing-ui .pill-amber { background: #fff0d8; color: #da8400; }
        .billing-ui .pill-red { background: #ffe8e7; color: var(--red); }
        .billing-ui .history-actions { display: flex; align-items: center; gap: 8px; }
        .billing-ui .view-button { min-height: 30px; padding: 0 14px; border-radius: 8px; color: #212c3c; box-shadow: none; }
        .billing-ui .icon-button { width: 36px; height: 30px; border-radius: 8px; color: #5a6677; box-shadow: none; }
        .billing-ui .panel-footnote { margin: 12px 0 0; color: var(--text-soft); font-size: .93rem; }

        .billing-ui .bottom-left-grid { display: grid; grid-template-columns: 1.15fr .95fr; gap: 16px; }
        .billing-ui .mini-table { margin-top: 14px; }
        .billing-ui .tx-grid { display: grid; grid-template-columns: 78px minmax(140px,1fr) 58px 70px 64px; gap: 10px; align-items: center; }
        .billing-ui .mini-row { padding: 12px 0; border-top: 1px solid rgba(232,226,219,.75); color: #4d5868; font-size: .92rem; }
        .billing-ui .mini-row:first-of-type { border-top: 0; }
        .billing-ui .footer-link { display: inline-block; margin-top: 12px; color: #1767ff; }

        .billing-ui .outstanding-list { display: flex; flex-direction: column; gap: 18px; margin-top: 18px; margin-bottom: 18px; }
        .billing-ui .outstanding-row { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; }
        .billing-ui .outstanding-row p, .billing-ui .outstanding-row small { margin: 8px 0 0; color: var(--text-soft); display: block; }
        .billing-ui .outstanding-meta { text-align: right; }
        .billing-ui .outstanding-meta strong { display: block; margin-bottom: 10px; color: #243142; font-size: 1.25rem; }

        .billing-ui .chart-summary { margin-bottom: 8px; }
        .billing-ui .chart-summary span, .billing-ui .cta-total span { display: block; color: #465262; margin-bottom: 10px; }
        .billing-ui .chart-summary strong { display: block; font-size: 2rem; letter-spacing: -.05em; margin-bottom: 8px; }
        .billing-ui .trend-row { display: flex; align-items: center; gap: 10px; }
        .billing-ui .trend-row small { color: var(--text-soft); }
        .billing-ui .trend-pill { display: inline-flex; align-items: center; min-height: 24px; padding: 0 8px; border-radius: 999px; background: #e8f8ec; color: var(--green); font-size: .78rem; }
        .billing-ui .chart-area { display: grid; grid-template-columns: auto 1fr; gap: 12px; align-items: stretch; margin-top: 18px; }
        .billing-ui .y-axis { display: flex; flex-direction: column; justify-content: space-between; padding: 8px 0 22px; color: #758295; font-size: .82rem; }
        .billing-ui .graph-wrap { position: relative; min-height: 220px; }
        .billing-ui .grid-line { position: absolute; left: 0; right: 0; height: 1px; border-top: 1px dashed rgba(129, 143, 164, .25); }
        .billing-ui .grid-line:nth-child(1) { top: 18px; }
        .billing-ui .grid-line:nth-child(2) { top: 72px; }
        .billing-ui .grid-line:nth-child(3) { top: 126px; }
        .billing-ui .grid-line:nth-child(4) { top: 180px; }
        .billing-ui .chart-svg { position: absolute; inset: 0 0 18px 0; color: var(--blue); }
        .billing-ui .chart-svg .line { fill: none; stroke: currentColor; stroke-width: 2.5; }
        .billing-ui .chart-svg .area { fill: rgba(46,116,255,.12); stroke: none; }
        .billing-ui .chart-svg circle { fill: currentColor; stroke: #fff; stroke-width: 3; }
        .billing-ui .x-axis { position: absolute; left: 0; right: 0; bottom: 0; display: flex; justify-content: space-between; color: #758295; font-size: .82rem; }

        .billing-ui .payment-card-list { display: flex; flex-direction: column; gap: 14px; margin-top: 16px; margin-bottom: 16px; }
        .billing-ui .payment-card-row { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 10px 8px; border: 1px solid rgba(232,226,219,.9); border-radius: 12px; }
        .billing-ui .payment-card-main, .billing-ui .payment-card-actions { display: flex; align-items: center; gap: 12px; }
        .billing-ui .payment-card-main strong { display: block; color: #233041; margin-bottom: 6px; }
        .billing-ui .payment-card-main small { color: var(--text-soft); }
        .billing-ui .card-brand { display: inline-flex; align-items: center; justify-content: center; width: 48px; height: 28px; border-radius: 8px; font-size: .9rem; font-weight: 800; }
        .billing-ui .mastercard { position: relative; width: 42px; background: transparent; }
        .billing-ui .mastercard::before, .billing-ui .mastercard::after { content: ""; position: absolute; top: 4px; width: 18px; height: 18px; border-radius: 50%; }
        .billing-ui .mastercard::before { left: 7px; background: #eb001b; }
        .billing-ui .mastercard::after { left: 17px; background: #f79e1b; opacity: .88; }
        .billing-ui .visa { color: #1a3faf; background: #f4f7ff; }
        .billing-ui .add-method-button { min-height: 40px; padding: 0 14px; border-radius: 10px; color: #2757ff; box-shadow: none; }

        .billing-ui .payment-cta-panel { display: grid; grid-template-columns: 1fr 130px; align-items: end; gap: 14px; }
        .billing-ui .cta-copy p { margin: 12px 0 14px; color: var(--text-soft); line-height: 1.55; }
        .billing-ui .cta-total { margin-bottom: 14px; padding: 12px 14px; border-radius: 12px; background: #f7f7fb; }
        .billing-ui .cta-total strong { display: block; font-size: 2rem; letter-spacing: -.05em; }
        .billing-ui .primary-button { min-height: 42px; padding: 0 16px; border-radius: 10px; background: linear-gradient(180deg, #4177ff 0%, #2757ff 100%); border-color: transparent; color: #fff; box-shadow: none; }
        .billing-ui .cta-art { position: relative; width: 130px; height: 130px; }
        .billing-ui .wallet-back, .billing-ui .wallet-front, .billing-ui .card-one, .billing-ui .card-two { position: absolute; border-radius: 16px; }
        .billing-ui .wallet-back { right: 10px; bottom: 18px; width: 74px; height: 54px; background: #efe6ff; }
        .billing-ui .wallet-front { right: 0; bottom: 28px; width: 86px; height: 60px; background: linear-gradient(180deg, #9b6cff 0%, var(--purple) 100%); }
        .billing-ui .card-one { right: 40px; bottom: 42px; width: 56px; height: 34px; background: #ffffff; transform: rotate(-8deg); }
        .billing-ui .card-two { right: 22px; bottom: 54px; width: 50px; height: 28px; background: #e6daff; transform: rotate(10deg); }

        @media (max-width: 1380px) {
            .billing-ui .stats-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .billing-ui .main-grid, .billing-ui .bottom-left-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 1180px) {
            
            .billing-ui .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .billing-ui .main-grid { grid-template-columns: 1fr; }
            .billing-ui .history-grid, .billing-ui .history-head, .billing-ui .tx-grid, .billing-ui .mini-head-row { grid-template-columns: 1fr; }
            .billing-ui .history-head, .billing-ui .mini-head-row { display: none; }
        }

        @media (max-width: 760px) {
            .billing-ui .stats-grid { grid-template-columns: 1fr; }
            .billing-ui .history-tabs { overflow-x: auto; }
            .billing-ui .payment-cta-panel { grid-template-columns: 1fr; }
            .billing-ui .cta-art { justify-self: start; }
        }
    </style>

    <div class="billing-ui">
        <main>
            <section class="stats-grid" aria-label="Billing summary">
                <article class="stat-card"><div class="stat-icon soft-red"><svg viewBox="0 0 24 24" fill="none"><rect x="4.5" y="6" width="15" height="12" rx="2"></rect><path d="M4.5 10h15"></path><path d="M8 14h3"></path></svg></div><div class="stat-copy"><span>Total Due</span><strong>₦210,000</strong><small>2 invoices</small></div></article>
                <article class="stat-card"><div class="stat-icon soft-green"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="8.5"></circle><path d="m8.5 12 2.2 2.2 4.8-5"></path></svg></div><div class="stat-copy"><span>Paid This Month</span><strong>₦120,000</strong><small>3 invoices</small></div></article>
                <article class="stat-card"><div class="stat-icon soft-purple"><svg viewBox="0 0 24 24" fill="none"><rect x="4.5" y="6" width="15" height="12" rx="2"></rect><path d="M4.5 10h15"></path><path d="M8 14h3"></path></svg></div><div class="stat-copy"><span>Total Paid</span><strong>₦1,250,000</strong><small>All time</small></div></article>
                <article class="stat-card"><div class="stat-icon soft-orange"><svg viewBox="0 0 24 24" fill="none"><rect x="5" y="6.5" width="14" height="12" rx="2"></rect><path d="M8 4.5v4"></path><path d="M16 4.5v4"></path><path d="M5 10h14"></path></svg></div><div class="stat-copy"><span>Upcoming Due</span><strong>₦210,000</strong><small>Next 30 days</small></div></article>
                <article class="stat-card"><div class="stat-icon soft-blue"><svg viewBox="0 0 24 24" fill="none"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"></path><path d="M14 3.5V8h4"></path><path d="M8 12h8"></path><path d="M8 16h6"></path></svg></div><div class="stat-copy"><span>Total Outstanding</span><strong>₦210,000</strong><small>2 invoices</small></div></article>
            </section>

            <section class="main-grid">
                <div class="left-stack">
                    <section class="panel invoice-history-panel">
                        <div class="panel-head"><h2>Invoice History</h2><button type="button" class="ghost-button">View All Invoices</button></div>
                        <div class="history-tabs"><button type="button" class="history-tab is-active">All</button><button type="button" class="history-tab">Paid</button><button type="button" class="history-tab">Unpaid</button><button type="button" class="history-tab">Overdue</button><button type="button" class="history-tab">Cancelled</button></div>
                        <div class="history-table">
                            <div class="history-head history-grid"><span>Invoice #</span><span>Issue Date</span><span>Due Date</span><span>Description</span><span>Amount</span><span>Status</span><span>Actions</span></div>
                            <div class="history-row history-grid"><a href="#" class="invoice-link">INV-2024-0016</a><span>May 5, 2024</span><span>May 20, 2024</span><span>Website Redesign Project</span><span>₦150,000</span><span><b class="status-pill pill-green">Paid</b></span><span class="history-actions"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice INV-2024-0016"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4v10"></path><path d="m8 11 4 4 4-4"></path><path d="M5 19h14"></path></svg></button></span></div>
                            <div class="history-row history-grid"><a href="#" class="invoice-link">INV-2024-0015</a><span>May 1, 2024</span><span>May 15, 2024</span><span>Premium Hosting (May 2024)</span><span>₦90,000</span><span><b class="status-pill pill-green">Paid</b></span><span class="history-actions"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice INV-2024-0015"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4v10"></path><path d="m8 11 4 4 4-4"></path><path d="M5 19h14"></path></svg></button></span></div>
                            <div class="history-row history-grid"><a href="#" class="invoice-link">INV-2024-0014</a><span>Apr 28, 2024</span><span>May 12, 2024</span><span>SSL Certificate (acme.com)</span><span>₦15,000</span><span><b class="status-pill pill-green">Paid</b></span><span class="history-actions"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice INV-2024-0014"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4v10"></path><path d="m8 11 4 4 4-4"></path><path d="M5 19h14"></path></svg></button></span></div>
                            <div class="history-row history-grid"><a href="#" class="invoice-link">INV-2024-0013</a><span>Apr 20, 2024</span><span>May 20, 2024</span><span>E-commerce Development</span><span>₦300,000</span><span><b class="status-pill pill-amber">Unpaid</b></span><span class="history-actions"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice INV-2024-0013"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4v10"></path><path d="m8 11 4 4 4-4"></path><path d="M5 19h14"></path></svg></button></span></div>
                            <div class="history-row history-grid"><a href="#" class="invoice-link">INV-2024-0012</a><span>Apr 18, 2024</span><span>May 3, 2024</span><span>Domain Registration (acme.net)</span><span>₦8,000</span><span><b class="status-pill pill-green">Paid</b></span><span class="history-actions"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice INV-2024-0012"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4v10"></path><path d="m8 11 4 4 4-4"></path><path d="M5 19h14"></path></svg></button></span></div>
                            <div class="history-row history-grid"><a href="#" class="invoice-link">INV-2024-0011</a><span>Apr 15, 2024</span><span>Apr 30, 2024</span><span>Website Maintenance (Apr 2024)</span><span>₦30,000</span><span><b class="status-pill pill-red">Overdue</b></span><span class="history-actions"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice INV-2024-0011"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4v10"></path><path d="m8 11 4 4 4-4"></path><path d="M5 19h14"></path></svg></button></span></div>
                            <div class="history-row history-grid"><a href="#" class="invoice-link">INV-2024-0010</a><span>Apr 10, 2024</span><span>Apr 25, 2024</span><span>SEO Optimization</span><span>₦80,000</span><span><b class="status-pill pill-green">Paid</b></span><span class="history-actions"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="Download invoice INV-2024-0010"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4v10"></path><path d="m8 11 4 4 4-4"></path><path d="M5 19h14"></path></svg></button></span></div>
                        </div>
                        <p class="panel-footnote">Showing 1 to 7 of 16 invoices</p>
                    </section>

                    <section class="bottom-left-grid">
                        <article class="panel recent-transactions-panel">
                            <h2>Recent Transactions</h2>
                            <div class="mini-table tx-table">
                                <div class="mini-head-row tx-grid"><span>Date</span><span>Description</span><span>Type</span><span>Amount</span><span>Status</span></div>
                                <div class="mini-row tx-grid"><span>May 14, 2024</span><span>Payment for <a href="#" class="invoice-link">INV-2024-0015</a></span><span>Payment</span><span>₦90,000</span><span><b class="status-pill pill-green">Success</b></span></div>
                                <div class="mini-row tx-grid"><span>May 5, 2024</span><span>Payment for <a href="#" class="invoice-link">INV-2024-0014</a></span><span>Payment</span><span>₦15,000</span><span><b class="status-pill pill-green">Success</b></span></div>
                                <div class="mini-row tx-grid"><span>Apr 30, 2024</span><span>Payment for <a href="#" class="invoice-link">INV-2024-0012</a></span><span>Payment</span><span>₦8,000</span><span><b class="status-pill pill-green">Success</b></span></div>
                                <div class="mini-row tx-grid"><span>Apr 15, 2024</span><span>Payment for <a href="#" class="invoice-link">INV-2024-0011</a></span><span>Payment</span><span>₦30,000</span><span><b class="status-pill pill-green">Success</b></span></div>
                                <div class="mini-row tx-grid"><span>Apr 10, 2024</span><span>Payment for <a href="#" class="invoice-link">INV-2024-0010</a></span><span>Payment</span><span>₦80,000</span><span><b class="status-pill pill-green">Success</b></span></div>
                            </div>
                            <a href="#" class="footer-link">View All Transactions</a>
                        </article>

                        <article class="panel outstanding-panel">
                            <h2>Outstanding Invoices</h2>
                            <div class="outstanding-list">
                                <div class="outstanding-row"><div><a href="#" class="invoice-link">INV-2024-0013</a><p>E-commerce Development</p><small>Due May 20, 2024</small></div><div class="outstanding-meta"><strong>₦300,000</strong><b class="status-pill pill-amber">Unpaid</b></div></div>
                                <div class="outstanding-row"><div><a href="#" class="invoice-link">INV-2024-0016</a><p>Website Redesign Project</p><small>Due May 20, 2024</small></div><div class="outstanding-meta"><strong>₦150,000</strong><b class="status-pill pill-amber">Unpaid</b></div></div>
                            </div>
                            <button type="button" class="ghost-button compact">View All</button>
                        </article>
                    </section>
                </div>

                <div class="right-stack">
                    <section class="panel chart-panel">
                        <div class="panel-head"><h2>Billing Overview</h2><button type="button" class="ghost-button compact">This Month <span aria-hidden="true">˅</span></button></div>
                        <div class="chart-summary"><span>Total Billed</span><strong>₦120,000</strong><div class="trend-row"><small>vs last month</small><b class="trend-pill">↑ 25%</b></div></div>
                        <div class="chart-area" aria-hidden="true">
                            <div class="y-axis"><span>₦150K</span><span>₦100K</span><span>₦50K</span><span>₦0</span></div>
                            <div class="graph-wrap">
                                <div class="grid-line"></div><div class="grid-line"></div><div class="grid-line"></div><div class="grid-line"></div>
                                <svg class="chart-svg" viewBox="0 0 320 180" preserveAspectRatio="none">
                                    <path class="area" d="M12 150 L45 112 L72 115 L95 98 L118 101 L145 92 L174 65 L198 80 L226 76 L255 48 L286 49 L308 30 L308 180 L12 180 Z"></path>
                                    <path class="line" d="M12 150 L45 112 L72 115 L95 98 L118 101 L145 92 L174 65 L198 80 L226 76 L255 48 L286 49 L308 30"></path>
                                    <circle cx="308" cy="30" r="5"></circle>
                                </svg>
                                <div class="x-axis"><span>May 1</span><span>May 8</span><span>May 15</span><span>May 22</span><span>May 29</span></div>
                            </div>
                        </div>
                    </section>

                    <section class="panel payment-methods-panel">
                        <h2>Payment Methods</h2>
                        <div class="payment-card-list">
                            <div class="payment-card-row"><div class="payment-card-main"><span class="card-brand mastercard"></span><div><strong>•••• •••• •••• 4242</strong><small>Expires 04/27</small></div></div><div class="payment-card-actions"><b class="status-pill pill-green">Primary</b><button type="button" class="icon-button" aria-label="More actions for card ending 4242"><svg viewBox="0 0 24 24" fill="none"><path d="M12 6h.01"></path><path d="M12 12h.01"></path><path d="M12 18h.01"></path></svg></button></div></div>
                            <div class="payment-card-row"><div class="payment-card-main"><span class="card-brand visa">VISA</span><div><strong>•••• •••• •••• 8888</strong><small>Expires 09/28</small></div></div><div class="payment-card-actions"><button type="button" class="icon-button" aria-label="More actions for card ending 8888"><svg viewBox="0 0 24 24" fill="none"><path d="M12 6h.01"></path><path d="M12 12h.01"></path><path d="M12 18h.01"></path></svg></button></div></div>
                        </div>
                        <button type="button" class="add-method-button"><span aria-hidden="true">＋</span> Add Payment Method</button>
                    </section>

                    <section class="panel payment-cta-panel">
                        <div class="cta-copy">
                            <h2>Need to make a payment?</h2>
                            <p>You have 2 invoice(s) with total amount due of ₦210,000.</p>
                            <div class="cta-total"><span>Total Due</span><strong>₦210,000</strong></div>
                            <button type="button" class="primary-button">Make a Payment</button>
                        </div>
                        <div class="cta-art" aria-hidden="true">
                            <div class="wallet-back"></div>
                            <div class="wallet-front"></div>
                            <div class="card-one"></div>
                            <div class="card-two"></div>
                        </div>
                    </section>
                </div>
            </section>
        </main>
    </div>
</x-filament-panels::page>
