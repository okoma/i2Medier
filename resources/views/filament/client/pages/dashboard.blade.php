<x-filament-panels::page>
    <div class="dashboard-ui">
        <style>
            .dashboard-ui { --surface-border:#e9e3dc; --text:#171717; --text-soft:#6f6f76; --orange:#ff5b00; --orange-soft:#fff1e8; --green:#1f9a59; --green-soft:#ebfbf2; --blue:#3c7cff; --blue-soft:#e9f1ff; --purple:#7c55ff; --purple-soft:#f0eaff; --yellow:#f2a300; --yellow-soft:#fff7df; --gray-soft:#f3f5f7; --shadow:0 18px 40px rgba(26,25,31,.06); --radius-xl:22px; --radius-sm:10px; color:var(--text); font-family:"Plus Jakarta Sans",sans-serif; }
            .dashboard-ui * { box-sizing:border-box; }
            .dashboard-ui a,.dashboard-ui button { font:inherit; color:inherit; text-decoration:none; }
            .dashboard-ui button { border:0; background:none; cursor:pointer; }
            .dashboard-ui svg { width:100%; height:100%; stroke:currentColor; stroke-width:1.8; stroke-linecap:round; stroke-linejoin:round; fill:none; }
            .dashboard-ui .sr-only { position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }
            .dashboard-ui .stats-grid { display:grid; grid-template-columns:repeat(5,minmax(0,1fr)); gap:14px; margin-bottom:18px; }
            .dashboard-ui .stat-card,.dashboard-ui .panel,.dashboard-ui .ghost-button,.dashboard-ui .primary-button { background:linear-gradient(180deg,rgba(255,255,255,.96) 0%,rgba(255,255,255,.9) 100%); border:1px solid var(--surface-border); border-radius:var(--radius-xl); box-shadow:var(--shadow); }
            .dashboard-ui .stat-card { display:grid; grid-template-columns:auto 1fr; gap:18px 16px; padding:22px 22px 20px; }
            .dashboard-ui .stat-icon,.dashboard-ui .mini-icon,.dashboard-ui .project-icon { display:grid; place-items:center; width:50px; height:50px; border-radius:14px; }
            .dashboard-ui .stat-icon svg,.dashboard-ui .mini-icon svg,.dashboard-ui .project-icon svg,.dashboard-ui .invoice-row button svg,.dashboard-ui .project-meta button svg,.dashboard-ui .primary-button svg { width:22px; height:22px; }
            .dashboard-ui .soft-orange{background:var(--orange-soft);color:var(--orange);} .dashboard-ui .soft-green{background:var(--green-soft);color:var(--green);} .dashboard-ui .soft-yellow{background:var(--yellow-soft);color:var(--yellow);} .dashboard-ui .soft-purple{background:var(--purple-soft);color:var(--purple);} .dashboard-ui .soft-blue{background:var(--blue-soft);color:var(--blue);} .dashboard-ui .gray-soft{background:var(--gray-soft);color:#6d7481;}
            .dashboard-ui .stat-copy span { display:block; margin-bottom:10px; color:#4d5664; }
            .dashboard-ui .stat-copy strong { display:block; font-size:2.15rem; letter-spacing:-.06em; }
            .dashboard-ui .stat-card > a { grid-column:1 / -1; display:inline-flex; align-items:center; gap:8px; color:#24324a; font-weight:500; }
            .dashboard-ui .overview-grid,.dashboard-ui .lower-grid { display:grid; gap:16px; }
            .dashboard-ui .overview-grid { grid-template-columns:minmax(0,1.55fr) minmax(300px,.95fr); margin-bottom:16px; }
            .dashboard-ui .lower-grid { grid-template-columns:minmax(0,1.25fr) minmax(300px,.95fr); }
            .dashboard-ui .aside-stack { display:grid; gap:16px; }
            .dashboard-ui .panel { padding:20px 22px; }
            .dashboard-ui .panel-head { display:flex; align-items:center; justify-content:space-between; gap:16px; margin-bottom:18px; }
            .dashboard-ui .panel h2,.dashboard-ui .help-copy h2 { margin:0; font-size:1rem; letter-spacing:-.03em; }
            .dashboard-ui .ghost-button,.dashboard-ui .primary-button { display:inline-flex; align-items:center; justify-content:center; gap:10px; min-height:38px; padding:0 14px; border-radius:12px; box-shadow:none; white-space:nowrap; }
            .dashboard-ui .primary-button { background:linear-gradient(180deg,#ff7b2f 0%,var(--orange) 100%); border-color:transparent; color:#fff; }
            .dashboard-ui .project-list,.dashboard-ui .renewal-list,.dashboard-ui .ticket-list { display:grid; gap:14px; }
            .dashboard-ui .project-row,.dashboard-ui .renewal-row,.dashboard-ui .ticket-row { display:grid; gap:14px; padding:14px 0; border-top:1px solid rgba(233,227,220,.9); }
            .dashboard-ui .project-row:first-child,.dashboard-ui .renewal-row:first-child,.dashboard-ui .ticket-row:first-child,.dashboard-ui .invoice-row:first-of-type { border-top:0; padding-top:0; }
            .dashboard-ui .project-row { grid-template-columns:minmax(0,1.5fr) minmax(150px,.7fr) minmax(140px,.55fr); align-items:center; }
            .dashboard-ui .project-main,.dashboard-ui .renewal-main { display:flex; align-items:center; gap:14px; min-width:0; }
            .dashboard-ui .black-card { background:#0a0d14; color:#fff; }
            .dashboard-ui .orange-stroke { box-shadow:inset 0 0 0 1px rgba(255,91,0,.26); }
            .dashboard-ui .project-copy h3,.dashboard-ui .renewal-main h3,.dashboard-ui .ticket-row h3,.dashboard-ui .help-copy h2 { margin:0; font-size:1rem; letter-spacing:-.03em; }
            .dashboard-ui .project-copy p,.dashboard-ui .renewal-main p,.dashboard-ui .ticket-row p,.dashboard-ui .help-copy p { margin:6px 0 0; color:var(--text-soft); }
            .dashboard-ui .project-title-row { display:flex; align-items:center; gap:10px; flex-wrap:wrap; }
            .dashboard-ui .status-pill { display:inline-flex; align-items:center; justify-content:center; min-height:28px; padding:0 10px; border-radius:999px; font-size:.76rem; font-weight:700; white-space:nowrap; }
            .dashboard-ui .pill-blue { background:#e9f1ff; color:var(--blue); }
            .dashboard-ui .pill-green { background:#e8f7ed; color:var(--green); }
            .dashboard-ui .pill-gray { background:#edf0f4; color:#667284; }
            .dashboard-ui .pill-soft-amber,.dashboard-ui .pill-amber { background:#fff1dd; color:#da8400; }
            .dashboard-ui .project-progress { display:flex; align-items:center; gap:12px; }
            .dashboard-ui .progress-track { position:relative; flex:1; height:8px; border-radius:999px; background:#f0ece7; overflow:hidden; }
            .dashboard-ui .progress-track span { position:absolute; inset:0 auto 0 0; border-radius:inherit; background:linear-gradient(90deg,#ff8e48 0%,var(--orange) 100%); }
            .dashboard-ui .progress-60 { width:60%; } .dashboard-ui .progress-35 { width:35%; } .dashboard-ui .progress-10 { width:10%; }
            .dashboard-ui .project-progress strong,.dashboard-ui .renewal-meta strong,.dashboard-ui .ticket-row strong { font-size:.94rem; }
            .dashboard-ui .project-meta { display:flex; align-items:center; justify-content:space-between; gap:10px; color:var(--text-soft); }
            .dashboard-ui .project-meta button,.dashboard-ui .invoice-row button { display:inline-flex; align-items:center; justify-content:center; width:34px; height:34px; border-radius:10px; color:#5a6574; background:#fff; border:1px solid rgba(233,227,220,.95); }
            .dashboard-ui .renewal-row { grid-template-columns:minmax(0,1fr) auto; align-items:center; }
            .dashboard-ui .renewal-meta { text-align:right; }
            .dashboard-ui .renewal-meta span { display:block; margin-top:6px; color:var(--text-soft); }
            .dashboard-ui .invoice-table { display:grid; gap:0; }
            .dashboard-ui .invoice-grid { display:grid; grid-template-columns:120px minmax(0,1fr) 100px 110px 110px 42px; align-items:center; gap:12px; }
            .dashboard-ui .invoice-head { padding:0 0 14px; color:#687384; font-size:.92rem; }
            .dashboard-ui .invoice-row { padding:14px 0; border-top:1px solid rgba(233,227,220,.9); }
            .dashboard-ui .ticket-row { grid-template-columns:minmax(0,1fr) auto auto; align-items:center; border-top:1px solid rgba(233,227,220,.9); }
            .dashboard-ui .accent-orange { border-left:4px solid var(--orange); padding-left:14px; } .dashboard-ui .accent-blue { border-left:4px solid var(--blue); padding-left:14px; } .dashboard-ui .accent-green { border-left:4px solid var(--green); padding-left:14px; }
            .dashboard-ui .help-panel { display:grid; gap:18px; }
            .dashboard-ui .help-illustration { position:relative; height:148px; border-radius:18px; background:linear-gradient(180deg,#fff5ee 0%,#fffaf6 100%); overflow:hidden; }
            .dashboard-ui .chat-orbit { position:absolute; border-radius:50%; border:1px dashed rgba(255,91,0,.24); }
            .dashboard-ui .orbit-one { inset:18px 36px 20px 36px; }
            .dashboard-ui .orbit-two { inset:34px 64px 36px 64px; border-color:rgba(60,124,255,.18); }
            .dashboard-ui .chat-bubble { position:absolute; display:grid; grid-template-columns:repeat(3,6px); gap:4px; align-items:center; padding:14px 16px; border-radius:18px; box-shadow:var(--shadow); }
            .dashboard-ui .chat-bubble span { width:6px; height:6px; border-radius:50%; background:currentColor; }
            .dashboard-ui .bubble-dark { top:34px; left:42px; color:#fff; background:#0a0d14; }
            .dashboard-ui .bubble-orange { right:40px; bottom:28px; color:#fff; background:linear-gradient(180deg,#ff8240 0%,var(--orange) 100%); }
            .dashboard-ui .help-copy p { line-height:1.6; }
            @media (max-width:1450px) { .dashboard-ui .stats-grid{grid-template-columns:repeat(3,minmax(0,1fr));} .dashboard-ui .overview-grid,.dashboard-ui .lower-grid{grid-template-columns:1fr;} }
            @media (max-width:1100px) { .dashboard-ui .project-row,.dashboard-ui .invoice-grid,.dashboard-ui .renewal-row,.dashboard-ui .ticket-row{grid-template-columns:1fr;} .dashboard-ui .project-meta,.dashboard-ui .renewal-meta{justify-content:flex-start; text-align:left;} }
            @media (max-width:760px) { .dashboard-ui .stats-grid{grid-template-columns:1fr;} .dashboard-ui .panel-head{flex-direction:column; align-items:flex-start;} .dashboard-ui .ghost-button,.dashboard-ui .primary-button{width:100%;} }
        </style>

        <section class="stats-grid" aria-label="Dashboard summary">
            <article class="stat-card"><div class="stat-icon soft-orange"><svg viewBox="0 0 24 24"><path d="M3.5 7.5A2.5 2.5 0 0 1 6 5h4l2 2h6a2.5 2.5 0 0 1 2.5 2.5v7A2.5 2.5 0 0 1 18 19H6a2.5 2.5 0 0 1-2.5-2.5Z"/></svg></div><div class="stat-copy"><span>Active Projects</span><strong>3</strong></div><a href="#">View projects <span aria-hidden="true">→</span></a></article>
            <article class="stat-card"><div class="stat-icon soft-green"><svg viewBox="0 0 24 24"><path d="M6 3.5h8l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 5 20V5A1.5 1.5 0 0 1 6.5 3.5Z"/><path d="M14 3.5V8h4"/><path d="M8 12h6"/><path d="M8 16h8"/></svg></div><div class="stat-copy"><span>Pending Invoices</span><strong>2</strong></div><a href="#">View invoices <span aria-hidden="true">→</span></a></article>
            <article class="stat-card"><div class="stat-icon soft-yellow"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5"/><path d="M3.5 12h17"/><path d="M12 3.5a13.3 13.3 0 0 1 3.5 8.5A13.3 13.3 0 0 1 12 20.5 13.3 13.3 0 0 1 8.5 12 13.3 13.3 0 0 1 12 3.5Z"/></svg></div><div class="stat-copy"><span>Domains</span><strong>5</strong></div><a href="#">Manage domains <span aria-hidden="true">→</span></a></article>
            <article class="stat-card"><div class="stat-icon soft-purple"><svg viewBox="0 0 24 24"><rect x="4" y="5" width="16" height="5" rx="2"/><rect x="4" y="14" width="16" height="5" rx="2"/><path d="M8 7.5h.01"/><path d="M8 16.5h.01"/></svg></div><div class="stat-copy"><span>Hosting Services</span><strong>2</strong></div><a href="#">Manage hosting <span aria-hidden="true">→</span></a></article>
            <article class="stat-card"><div class="stat-icon soft-blue"><svg viewBox="0 0 24 24"><path d="M7 8.5h10a3.5 3.5 0 1 1 0 7H9l-4 3v-3a3.5 3.5 0 0 1 2-7Z"/><path d="M10 12h4"/></svg></div><div class="stat-copy"><span>Open Tickets</span><strong>1</strong></div><a href="#">View tickets <span aria-hidden="true">→</span></a></article>
        </section>

        <section class="overview-grid">
            <article class="panel projects-panel">
                <div class="panel-head"><h2>Recent Projects</h2><button type="button" class="ghost-button">View all projects</button></div>
                <div class="project-list">
                    <article class="project-row"><div class="project-main"><div class="project-icon black-card orange-stroke"><svg viewBox="0 0 24 24"><path d="M3.5 7.5A2.5 2.5 0 0 1 6 5h4l2 2h6a2.5 2.5 0 0 1 2.5 2.5v7A2.5 2.5 0 0 1 18 19H6a2.5 2.5 0 0 1-2.5-2.5Z"/></svg></div><div class="project-copy"><div class="project-title-row"><h3>Acme Website Redesign</h3><span class="status-pill pill-blue">In Progress</span></div><p>Last updated: May 5, 2024</p></div></div><div class="project-progress"><div class="progress-track"><span class="progress-60"></span></div><strong>60%</strong></div><div class="project-meta"><span>Due: May 20, 2024</span><button type="button" aria-label="Open project"><svg viewBox="0 0 24 24"><path d="m10 7 5 5-5 5"/></svg></button></div></article>
                    <article class="project-row"><div class="project-main"><div class="project-icon black-card orange-stroke"><svg viewBox="0 0 24 24"><path d="M6 7h12l-1.2 6H8Z"/><path d="M9 18.5a1 1 0 1 0 0 .01"/><path d="M16 18.5a1 1 0 1 0 0 .01"/><path d="M7 7 6 4H4"/></svg></div><div class="project-copy"><div class="project-title-row"><h3>Acme E-commerce Store</h3><span class="status-pill pill-green">In Progress</span></div><p>Last updated: May 2, 2024</p></div></div><div class="project-progress"><div class="progress-track"><span class="progress-35"></span></div><strong>35%</strong></div><div class="project-meta"><span>Due: Jun 10, 2024</span><button type="button" aria-label="Open project"><svg viewBox="0 0 24 24"><path d="m10 7 5 5-5 5"/></svg></button></div></article>
                    <article class="project-row"><div class="project-main"><div class="project-icon black-card orange-stroke"><svg viewBox="0 0 24 24"><rect x="8" y="3.5" width="8" height="17" rx="2"/><path d="M10.5 6.5h3"/><path d="M11.5 17.5h1"/></svg></div><div class="project-copy"><div class="project-title-row"><h3>Acme Mobile App</h3><span class="status-pill pill-gray">Planning</span></div><p>Last updated: Apr 28, 2024</p></div></div><div class="project-progress"><div class="progress-track"><span class="progress-10"></span></div><strong>10%</strong></div><div class="project-meta"><span>Due: Jun 30, 2024</span><button type="button" aria-label="Open project"><svg viewBox="0 0 24 24"><path d="m10 7 5 5-5 5"/></svg></button></div></article>
                </div>
            </article>

            <article class="panel renewals-panel">
                <div class="panel-head"><h2>Upcoming Renewals</h2><button type="button" class="ghost-button">View all</button></div>
                <div class="renewal-list">
                    <article class="renewal-row"><div class="renewal-main"><div class="mini-icon gray-soft"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5"/><path d="M3.5 12h17"/><path d="M12 3.5a13.3 13.3 0 0 1 3.5 8.5A13.3 13.3 0 0 1 12 20.5 13.3 13.3 0 0 1 8.5 12 13.3 13.3 0 0 1 12 3.5Z"/></svg></div><div><h3>acme.com</h3><p>Domain</p></div></div><div class="renewal-meta"><strong>May 15, 2024</strong><span>7 days left</span></div></article>
                    <article class="renewal-row"><div class="renewal-main"><div class="mini-icon gray-soft"><svg viewBox="0 0 24 24"><rect x="4" y="5" width="16" height="5" rx="2"/><rect x="4" y="14" width="16" height="5" rx="2"/><path d="M8 7.5h.01"/><path d="M8 16.5h.01"/></svg></div><div><h3>Acme Hosting Plan</h3><p>Hosting</p></div></div><div class="renewal-meta"><strong>May 20, 2024</strong><span>12 days left</span></div></article>
                    <article class="renewal-row"><div class="renewal-main"><div class="mini-icon soft-green"><svg viewBox="0 0 24 24"><path d="M12 3.5 5 6.5V12c0 4.2 2.7 7.8 7 8.8 4.3-1 7-4.6 7-8.8V6.5Z"/><path d="m9.5 12 1.8 1.8 3.7-4"/></svg></div><div><h3>SSL Certificate</h3><p>SSL</p></div></div><div class="renewal-meta"><strong>Jun 10, 2024</strong><span>33 days left</span></div></article>
                </div>
            </article>
        </section>

        <section class="lower-grid">
            <article class="panel invoices-panel">
                <div class="panel-head"><h2>Recent Invoices</h2><button type="button" class="ghost-button">View all invoices</button></div>
                <div class="invoice-table">
                    <div class="invoice-head invoice-grid"><span>Invoice</span><span>Description</span><span>Amount</span><span>Status</span><span>Due Date</span><span class="sr-only">Download</span></div>
                    <div class="invoice-row invoice-grid"><span>INV-2024-004</span><span>Acme Website Redesign</span><span>₦150,000</span><span><b class="status-pill pill-green">Paid</b></span><span>Apr 30, 2024</span><button type="button" aria-label="Download invoice"><svg viewBox="0 0 24 24"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg></button></div>
                    <div class="invoice-row invoice-grid"><span>INV-2024-003</span><span>Acme Hosting Plan</span><span>₦70,000</span><span><b class="status-pill pill-green">Paid</b></span><span>Apr 20, 2024</span><button type="button" aria-label="Download invoice"><svg viewBox="0 0 24 24"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg></button></div>
                    <div class="invoice-row invoice-grid"><span>INV-2024-002</span><span>Acme E-commerce Store</span><span>₦300,000</span><span><b class="status-pill pill-amber">Unpaid</b></span><span>May 20, 2024</span><button type="button" aria-label="Download invoice"><svg viewBox="0 0 24 24"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg></button></div>
                    <div class="invoice-row invoice-grid"><span>INV-2024-001</span><span>Domain Registration</span><span>₦15,000</span><span><b class="status-pill pill-green">Paid</b></span><span>Apr 10, 2024</span><button type="button" aria-label="Download invoice"><svg viewBox="0 0 24 24"><path d="M12 4v10"/><path d="m8 11 4 4 4-4"/><path d="M5 19h14"/></svg></button></div>
                </div>
            </article>

            <div class="aside-stack">
                <article class="panel tickets-panel">
                    <div class="panel-head"><h2>Recent Support Tickets</h2><button type="button" class="ghost-button">View all</button></div>
                    <div class="ticket-list">
                        <article class="ticket-row accent-orange"><div><h3>Website not loading on mobile</h3><p>#TKT-2024-015</p></div><span class="status-pill pill-soft-amber">Open</span><strong>May 6, 2024</strong></article>
                        <article class="ticket-row accent-blue"><div><h3>Email configuration issue</h3><p>#TKT-2024-014</p></div><span class="status-pill pill-blue">In Progress</span><strong>May 4, 2024</strong></article>
                        <article class="ticket-row accent-green"><div><h3>SSL certificate installation</h3><p>#TKT-2024-013</p></div><span class="status-pill pill-green">Resolved</span><strong>May 1, 2024</strong></article>
                    </div>
                </article>

                <article class="panel help-panel">
                    <div class="help-illustration" aria-hidden="true"><div class="chat-orbit orbit-one"></div><div class="chat-orbit orbit-two"></div><div class="chat-bubble bubble-dark"><span></span><span></span><span></span></div><div class="chat-bubble bubble-orange"><span></span><span></span><span></span></div></div>
                    <div class="help-copy"><h2>Need help with something?</h2><p>Our support team is available 24/7 to assist you with any questions.</p></div>
                    <button type="button" class="primary-button"><span>Create New Ticket</span><svg viewBox="0 0 24 24"><path d="M5 12h14"/><path d="m13 7 5 5-5 5"/></svg></button>
                </article>
            </div>
        </section>
    </div>
</x-filament-panels::page>
