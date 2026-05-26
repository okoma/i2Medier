<x-filament-panels::page>
    <div class="tickets-ui">
        <style>
            .tickets-ui { --surface-border:#e8e2db; --text:#171717; --text-soft:#687384; --orange:#ff5b00; --orange-soft:#fff1e8; --green:#1f9a59; --green-soft:#ebfbf2; --red:#ff3b30; --red-soft:#ffeceb; --purple:#9a5cff; --purple-soft:#f1eafe; --blue:#2e74ff; --blue-soft:#eaf3ff; --gray:#8d96a5; --gray-soft:#eef1f5; --amber-soft:#fff0d8; --low:#3ca36d; --low-soft:#e6f6ec; --shadow:0 18px 40px rgba(26,25,31,.06); color:var(--text); font-family:"Plus Jakarta Sans",sans-serif; }
            .tickets-ui * { box-sizing:border-box; }
            .tickets-ui svg { width:100%; height:100%; stroke:currentColor; stroke-width:1.8; stroke-linecap:round; stroke-linejoin:round; fill:none; }
            .tickets-ui button,.tickets-ui a { font:inherit; color:inherit; text-decoration:none; }
            .tickets-ui button { border:0; background:none; cursor:pointer; }
            .tickets-ui .stats-grid { display:grid; grid-template-columns:repeat(5,minmax(0,1fr)); gap:14px; margin-bottom:16px; }
            .tickets-ui .stat-card,.tickets-ui .panel,.tickets-ui .ghost-button,.tickets-ui .primary-button,.tickets-ui .view-button,.tickets-ui .icon-button,.tickets-ui .support-inline,.tickets-ui .page-button { border:1px solid var(--surface-border); background:rgba(255,255,255,.94); box-shadow:var(--shadow); }
            .tickets-ui .stat-card { display:flex; align-items:center; gap:18px; min-height:124px; padding:20px 22px; border-radius:18px; }
            .tickets-ui .stat-icon,.tickets-ui .topic-icon { display:grid; place-items:center; width:48px; height:48px; border-radius:14px; flex:0 0 auto; }
            .tickets-ui .soft-blue{background:var(--blue-soft);color:var(--blue);} .tickets-ui .soft-green{background:var(--green-soft);color:var(--green);} .tickets-ui .soft-orange{background:var(--orange-soft);color:var(--orange);} .tickets-ui .soft-purple{background:var(--purple-soft);color:var(--purple);} .tickets-ui .soft-red{background:var(--red-soft);color:var(--red);}
            .tickets-ui .stat-copy span { display:block; margin-bottom:8px; color:#445062; }
            .tickets-ui .stat-copy strong { display:block; margin-bottom:8px; font-size:1.95rem; letter-spacing:-.05em; }
            .tickets-ui .stat-copy small,.tickets-ui .help-panel p,.tickets-ui .hours-panel p,.tickets-ui .cta-panel p,.tickets-ui .panel-footer { color:var(--text-soft); }
            .tickets-ui .main-grid { display:grid; grid-template-columns:minmax(0,1.7fr) 280px; gap:16px; }
            .tickets-ui .left-column,.tickets-ui .right-column { display:grid; gap:16px; min-width:0; }
            .tickets-ui .panel { border-radius:22px; overflow:hidden; }
            .tickets-ui .panel-toolbar { display:flex; align-items:center; justify-content:space-between; gap:18px; padding:18px 22px 0; }
            .tickets-ui .filter-tabs { display:flex; align-items:center; gap:34px; overflow-x:auto; }
            .tickets-ui .filter-tab { position:relative; padding:8px 2px 18px; color:#4f5d70; white-space:nowrap; }
            .tickets-ui .filter-tab.is-active { color:var(--orange); }
            .tickets-ui .filter-tab.is-active::after { content:""; position:absolute; left:0; right:0; bottom:0; height:3px; border-radius:999px; background:var(--orange); }
            .tickets-ui .toolbar-actions,.tickets-ui .action-cell,.tickets-ui .pagination { display:flex; align-items:center; gap:12px; }
            .tickets-ui .ghost-button,.tickets-ui .primary-button,.tickets-ui .view-button,.tickets-ui .support-inline { display:inline-flex; align-items:center; justify-content:center; gap:10px; min-height:34px; padding:0 14px; border-radius:10px; box-shadow:none; white-space:nowrap; }
            .tickets-ui .primary-button { background:linear-gradient(180deg,#ff7a2f 0%,var(--orange) 100%); border-color:transparent; color:#fff; }
            .tickets-ui .button-icon,.tickets-ui .meta-cell svg,.tickets-ui .hours-icon { width:18px; height:18px; flex:0 0 auto; }
            .tickets-ui .ticket-table { padding:0 22px; }
            .tickets-ui .ticket-grid { display:grid; grid-template-columns:108px minmax(160px,1fr) 146px 102px 88px 144px 98px; gap:12px; align-items:center; }
            .tickets-ui .ticket-head { padding:18px 0; border-top:1px solid rgba(232,226,219,.85); color:#687384; font-size:.92rem; }
            .tickets-ui .ticket-row { padding:14px 0; border-top:1px solid rgba(232,226,219,.7); color:#495667; }
            .tickets-ui .ticket-link,.tickets-ui .topic-link { color:#1767ff; font-weight:500; }
            .tickets-ui .meta-cell { display:inline-flex; align-items:center; gap:8px; color:#556274; }
            .tickets-ui .status-pill { display:inline-flex; align-items:center; justify-content:center; min-height:24px; padding:0 8px; border-radius:7px; font-size:.74rem; font-weight:600; white-space:nowrap; }
            .tickets-ui .pill-green{background:#e7f8ec;color:var(--green);} .tickets-ui .pill-amber{background:var(--amber-soft);color:#da8400;} .tickets-ui .pill-purple{background:var(--purple-soft);color:var(--purple);} .tickets-ui .pill-red{background:#ffe8e7;color:var(--red);} .tickets-ui .pill-orange{background:#fff0d8;color:#da8400;} .tickets-ui .pill-low{background:var(--low-soft);color:var(--low);} .tickets-ui .pill-gray{background:var(--gray-soft);color:#667085;}
            .tickets-ui .ticket-row small { color:#667387; }
            .tickets-ui .icon-button { display:inline-flex; align-items:center; justify-content:center; width:36px; height:34px; border-radius:10px; color:#556274; box-shadow:none; }
            .tickets-ui .panel-footer { display:flex; align-items:center; justify-content:space-between; gap:16px; padding:14px 22px 18px; font-size:.93rem; }
            .tickets-ui .page-button { display:inline-flex; align-items:center; justify-content:center; width:32px; height:30px; border-radius:8px; color:#445062; box-shadow:none; }
            .tickets-ui .page-button.is-active { background:var(--orange); color:#fff; border-color:transparent; }
            .tickets-ui .topics-panel,.tickets-ui .overview-panel,.tickets-ui .help-panel,.tickets-ui .hours-panel,.tickets-ui .cta-panel { padding:18px 20px; }
            .tickets-ui .topics-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:14px; margin-top:18px; }
            .tickets-ui .topic-card { display:flex; align-items:flex-start; gap:14px; padding:16px; border:1px solid rgba(232,226,219,.8); border-radius:16px; }
            .tickets-ui .topic-card strong { display:block; margin-bottom:10px; color:#273243; }
            .tickets-ui .topic-card p { margin:0 0 14px; color:var(--text-soft); line-height:1.55; font-size:.92rem; }
            .tickets-ui .donut-wrap { display:grid; place-items:center; margin:18px 0; }
            .tickets-ui .donut-chart { position:relative; width:128px; height:128px; border-radius:50%; background:conic-gradient(var(--green) 0 41.7%, #ffb629 41.7% 66.7%, var(--purple) 66.7% 83.4%, #c9ced8 83.4% 100%); }
            .tickets-ui .donut-chart::after { content:""; position:absolute; inset:18px; border-radius:50%; background:#fff; }
            .tickets-ui .donut-center { position:absolute; inset:0; z-index:1; display:grid; place-content:center; text-align:center; }
            .tickets-ui .donut-center strong { font-size:1.9rem; letter-spacing:-.05em; }
            .tickets-ui .donut-center span { color:var(--text-soft); margin-top:4px; }
            .tickets-ui .legend-list { display:grid; gap:10px; }
            .tickets-ui .legend-row { display:grid; grid-template-columns:10px 1fr auto; align-items:center; gap:10px; color:#4a5768; }
            .tickets-ui .legend-bullet { width:10px; height:10px; border-radius:50%; }
            .tickets-ui .bullet-green{background:var(--green);} .tickets-ui .bullet-orange{background:#ffb629;} .tickets-ui .bullet-purple{background:var(--purple);} .tickets-ui .bullet-gray{background:#c9ced8;}
            .tickets-ui .support-inline { color:var(--blue); }
            .tickets-ui .hours-row { display:flex; align-items:center; gap:10px; color:var(--green); font-size:1.6rem; font-weight:800; }
            .tickets-ui .full-width { width:100%; }
            @media (max-width:1450px) { .tickets-ui .stats-grid{grid-template-columns:repeat(3,minmax(0,1fr));} .tickets-ui .topics-grid{grid-template-columns:repeat(2,minmax(0,1fr));} }
            @media (max-width:1180px) { .tickets-ui .main-grid{grid-template-columns:1fr;} .tickets-ui .ticket-grid,.tickets-ui .ticket-head{grid-template-columns:1fr;} .tickets-ui .ticket-head{display:none;} .tickets-ui .panel-toolbar{flex-direction:column;align-items:stretch;} .tickets-ui .toolbar-actions{justify-content:flex-end;} .tickets-ui .topics-grid{grid-template-columns:1fr;} }
            @media (max-width:760px) { .tickets-ui .stats-grid{grid-template-columns:1fr;} .tickets-ui .toolbar-actions{flex-direction:column;} .tickets-ui .ghost-button,.tickets-ui .primary-button,.tickets-ui .support-inline,.tickets-ui .full-width{width:100%;} .tickets-ui .panel-footer{flex-direction:column;align-items:flex-start;} }
        </style>

        <section class="stats-grid" aria-label="Ticket summary">
            <article class="stat-card"><div class="stat-icon soft-blue"><svg viewBox="0 0 24 24"><path d="M8 19.5h8a4.5 4.5 0 1 0 0-9H8a4.5 4.5 0 1 0 0 9Z"/><path d="M9.5 10.5V9a2.5 2.5 0 0 1 5 0v1.5"/><path d="M10 14h4"/></svg></div><div class="stat-copy"><span>Total Tickets</span><strong>12</strong><small>All time</small></div></article>
            <article class="stat-card"><div class="stat-icon soft-green"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/><path d="m8.5 12 2.2 2.2 4.8-5"/></svg></div><div class="stat-copy"><span>Open Tickets</span><strong>5</strong><small>41.7% of total</small></div></article>
            <article class="stat-card"><div class="stat-icon soft-orange"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/><path d="M12 8v4.5l2.5 1.5"/></svg></div><div class="stat-copy"><span>In Progress</span><strong>3</strong><small>25% of total</small></div></article>
            <article class="stat-card"><div class="stat-icon soft-purple"><svg viewBox="0 0 24 24"><path d="M12 3.5 6 6v5c0 4.2 2.5 7 6 9.5 3.5-2.5 6-5.3 6-9.5V6l-6-2.5Z"/><circle cx="12" cy="11" r="2"/></svg></div><div class="stat-copy"><span>Waiting Reply</span><strong>2</strong><small>16.7% of total</small></div></article>
            <article class="stat-card"><div class="stat-icon soft-red"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/><path d="m9 9 6 6"/><path d="m15 9-6 6"/></svg></div><div class="stat-copy"><span>Closed Tickets</span><strong>2</strong><small>16.7% of total</small></div></article>
        </section>

        <section class="main-grid">
            <div class="left-column">
                <section class="panel tickets-panel">
                    <div class="panel-toolbar">
                        <div class="filter-tabs"><button type="button" class="filter-tab is-active">All Tickets</button><button type="button" class="filter-tab">Open</button><button type="button" class="filter-tab">In Progress</button><button type="button" class="filter-tab">Waiting Reply</button><button type="button" class="filter-tab">Closed</button></div>
                        <div class="toolbar-actions"><button type="button" class="ghost-button"><span class="button-icon"><svg viewBox="0 0 24 24"><path d="M4 6h16"/><path d="M7 12h10"/><path d="M10 18h4"/></svg></span><span>Filter</span></button><button type="button" class="primary-button"><span class="button-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span><span>New Ticket</span></button></div>
                    </div>
                    <div class="ticket-table">
                        <div class="ticket-head ticket-grid"><span>Ticket ID</span><span>Subject</span><span>Department</span><span>Status</span><span>Priority</span><span>Last Updated</span><span>Actions</span></div>
                        <div class="ticket-row ticket-grid"><a href="#" class="ticket-link">#TK-2024-0012</a><span>Website is down</span><span class="meta-cell"><svg viewBox="0 0 24 24"><rect x="5" y="6" width="14" height="10" rx="2"/><path d="M9 18h6"/></svg>Technical Support</span><span><b class="status-pill pill-green">Open</b></span><span><b class="status-pill pill-red">High</b></span><span>May 15, 2025<br><small>10:30 AM</small></span><span class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="More actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></span></div>
                        <div class="ticket-row ticket-grid"><a href="#" class="ticket-link">#TK-2024-0011</a><span>cPanel login issue</span><span class="meta-cell"><svg viewBox="0 0 24 24"><rect x="5" y="6" width="14" height="10" rx="2"/><path d="M9 18h6"/></svg>Technical Support</span><span><b class="status-pill pill-amber">In Progress</b></span><span><b class="status-pill pill-orange">Medium</b></span><span>May 15, 2025<br><small>09:10 AM</small></span><span class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="More actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></span></div>
                        <div class="ticket-row ticket-grid"><a href="#" class="ticket-link">#TK-2024-0010</a><span>Email not working</span><span class="meta-cell"><svg viewBox="0 0 24 24"><path d="M4.5 7.5h15v9h-15Z"/><path d="m5.5 8.5 6.5 5 6.5-5"/></svg>Email Support</span><span><b class="status-pill pill-purple">Waiting Reply</b></span><span><b class="status-pill pill-red">High</b></span><span>May 14, 2025<br><small>11:20 AM</small></span><span class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="More actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></span></div>
                        <div class="ticket-row ticket-grid"><a href="#" class="ticket-link">#TK-2024-0009</a><span>SSL certificate renewal</span><span class="meta-cell"><svg viewBox="0 0 24 24"><path d="M12 3.5 6 6v5c0 4.2 2.5 7 6 9.5 3.5-2.5 6-5.3 6-9.5V6l-6-2.5Z"/><path d="m9.2 11.7 1.9 1.9 3.7-4"/></svg>Billing Support</span><span><b class="status-pill pill-green">Open</b></span><span><b class="status-pill pill-low">Low</b></span><span>May 13, 2025<br><small>09:45 AM</small></span><span class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="More actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></span></div>
                        <div class="ticket-row ticket-grid"><a href="#" class="ticket-link">#TK-2024-0008</a><span>Need help with DNS setup</span><span class="meta-cell"><svg viewBox="0 0 24 24"><rect x="5" y="6" width="14" height="10" rx="2"/><path d="M9 18h6"/></svg>Technical Support</span><span><b class="status-pill pill-amber">In Progress</b></span><span><b class="status-pill pill-orange">Medium</b></span><span>May 12, 2025<br><small>03:30 PM</small></span><span class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="More actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></span></div>
                        <div class="ticket-row ticket-grid"><a href="#" class="ticket-link">#TK-2024-0007</a><span>Invoice discrepancy</span><span class="meta-cell"><svg viewBox="0 0 24 24"><path d="M12 3.5 6 6v5c0 4.2 2.5 7 6 9.5 3.5-2.5 6-5.3 6-9.5V6l-6-2.5Z"/><path d="m9.2 11.7 1.9 1.9 3.7-4"/></svg>Billing Support</span><span><b class="status-pill pill-purple">Waiting Reply</b></span><span><b class="status-pill pill-low">Low</b></span><span>May 12, 2025<br><small>10:10 AM</small></span><span class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="More actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></span></div>
                        <div class="ticket-row ticket-grid"><a href="#" class="ticket-link">#TK-2024-0006</a><span>Request for website backup</span><span class="meta-cell"><svg viewBox="0 0 24 24"><rect x="5" y="6" width="14" height="10" rx="2"/><path d="M9 18h6"/></svg>Technical Support</span><span><b class="status-pill pill-gray">Closed</b></span><span><b class="status-pill pill-low">Low</b></span><span>May 10, 2025<br><small>02:40 PM</small></span><span class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="More actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></span></div>
                        <div class="ticket-row ticket-grid"><a href="#" class="ticket-link">#TK-2024-0005</a><span>Hosting upgrade query</span><span class="meta-cell"><svg viewBox="0 0 24 24"><path d="M12 4 5 8l7 4 7-4-7-4Z"/><path d="M5 16l7 4 7-4"/><path d="M5 12l7 4 7-4"/></svg>Sales Support</span><span><b class="status-pill pill-gray">Closed</b></span><span><b class="status-pill pill-orange">Medium</b></span><span>May 9, 2025<br><small>11:05 AM</small></span><span class="action-cell"><button type="button" class="view-button">View</button><button type="button" class="icon-button" aria-label="More actions"><svg viewBox="0 0 24 24"><path d="M12 6h.01"/><path d="M12 12h.01"/><path d="M12 18h.01"/></svg></button></span></div>
                    </div>
                    <div class="panel-footer"><span>Showing 1 to 8 of 12 tickets</span><div class="pagination"><button type="button" class="page-button" aria-label="Previous page"><svg viewBox="0 0 24 24"><path d="m14 7-5 5 5 5"/></svg></button><button type="button" class="page-button is-active">1</button><button type="button" class="page-button">2</button><button type="button" class="page-button" aria-label="Next page"><svg viewBox="0 0 24 24"><path d="m10 7 5 5-5 5"/></svg></button></div></div>
                </section>

                <section class="panel topics-panel">
                    <h2>Popular Help Topics</h2>
                    <div class="topics-grid">
                        <article class="topic-card"><div class="topic-icon soft-blue"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/><path d="M12 8v5"/><path d="m10 11 2 2 3-3"/></svg></div><div><strong>Website Issues</strong><p>Facing issues with your website down or not loading.</p><a href="#" class="topic-link">View Articles <span aria-hidden="true">→</span></a></div></article>
                        <article class="topic-card"><div class="topic-icon soft-blue"><svg viewBox="0 0 24 24"><path d="M4.5 7.5h15v9h-15Z"/><path d="m5.5 8.5 6.5 5 6.5-5"/></svg></div><div><strong>Email Problems</strong><p>Having trouble sending or receiving emails.</p><a href="#" class="topic-link">View Articles <span aria-hidden="true">→</span></a></div></article>
                        <article class="topic-card"><div class="topic-icon soft-green"><svg viewBox="0 0 24 24"><path d="M5 7.5A2.5 2.5 0 0 1 7.5 5h9A2.5 2.5 0 0 1 19 7.5v9a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 5 16.5Z"/><path d="M8 10h8"/><path d="M8 14h5"/></svg></div><div><strong>Billing &amp; Payments</strong><p>Questions about invoices, payments and refunds.</p><a href="#" class="topic-link">View Articles <span aria-hidden="true">→</span></a></div></article>
                        <article class="topic-card"><div class="topic-icon soft-orange"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5"/><path d="M3.5 12h17"/><path d="M12 3.5a13.3 13.3 0 0 1 3.5 8.5A13.3 13.3 0 0 1 12 20.5 13.3 13.3 0 0 1 8.5 12 13.3 13.3 0 0 1 12 3.5Z"/></svg></div><div><strong>Domains &amp; DNS</strong><p>Need help with domain setup or DNS configuration.</p><a href="#" class="topic-link">View Articles <span aria-hidden="true">→</span></a></div></article>
                    </div>
                </section>
            </div>

            <aside class="right-column">
                <section class="panel overview-panel"><h2>Ticket Overview</h2><div class="donut-wrap"><div class="donut-chart" aria-hidden="true"><div class="donut-center"><strong>12</strong><span>Total</span></div></div></div><div class="legend-list"><div class="legend-row"><span class="legend-bullet bullet-green"></span><span>Open</span><strong>5 (41.7%)</strong></div><div class="legend-row"><span class="legend-bullet bullet-orange"></span><span>In Progress</span><strong>3 (25%)</strong></div><div class="legend-row"><span class="legend-bullet bullet-purple"></span><span>Waiting Reply</span><strong>2 (16.7%)</strong></div><div class="legend-row"><span class="legend-bullet bullet-gray"></span><span>Closed</span><strong>2 (16.7%)</strong></div></div></section>
                <section class="panel help-panel"><h2>Need Immediate Help?</h2><p>If you need urgent assistance, our support team is available 24/7.</p><button type="button" class="support-inline"><span class="button-icon"><svg viewBox="0 0 24 24"><path d="M7 10.5a5 5 0 0 1 10 0v1.5a2 2 0 0 1-2 2h-1l-2.2 2.2a1 1 0 0 1-1.7-.7V14H9a2 2 0 0 1-2-2Z"/><path d="M9.5 9.5h.01"/><path d="M14.5 9.5h.01"/></svg></span><span>Live Chat Now</span></button></section>
                <section class="panel hours-panel"><h2>Support Hours</h2><p>Our support team is available round the clock to help you.</p><div class="hours-row"><span class="hours-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/><path d="M12 8v4.5l2.5 1.5"/></svg></span><strong>24/7/365</strong></div></section>
                <section class="panel cta-panel"><h2>Can't find what you need?</h2><p>Our support team is here to help you with any specific issue.</p><button type="button" class="ghost-button full-width"><span class="button-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span><span>Create New Ticket</span></button></section>
            </aside>
        </section>
    </div>
</x-filament-panels::page>
