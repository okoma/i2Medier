<x-filament-panels::page>
    <style>
        .services-ui {
          
            --surface-border: #e8e2db;
            --text: #171717;
            --text-soft: #687384;
            --text-faint: #97a0af;
            --orange: #ff5b00;
            --orange-soft: #fff1e8;
            --green: #1f9a59;
            --green-soft: #ebfbf2;
            --blue: #2e74ff;
            --blue-soft: #e8f1ff;
            --yellow: #f59d0b;
            --yellow-soft: #fff5df;
            --red: #ff3b30;
            --red-soft: #ffeceb;
            --lavender-soft: #f0eaff;
            --violet-soft: #f2efff;
            --gold-soft: #fff5e4;
            --gray-soft: #f2f4f7;
            --shadow: 0 18px 40px rgba(26, 25, 31, 0.06);
            color: var(--text);
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .services-ui *,
        .services-ui *::before,
        .services-ui *::after { box-sizing: border-box; }
        .services-ui a, .services-ui button, .services-ui input { font: inherit; }
        .services-ui a { color: inherit; text-decoration: none; }
        .services-ui button { border: 0; background: none; cursor: pointer; }
        .services-ui input { border: 0; background: transparent; color: inherit; }
        .services-ui input:focus { outline: 0; }
        .services-ui svg { width: 100%; height: 100%; stroke: currentColor; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }

      
        .services-ui .searchbox,
        .services-ui .notification-button,
        .services-ui .account-switcher,
        .services-ui .services-panel,
        .services-ui .stat-card,
        .services-ui .manage-button,
        .services-ui .more-button,
        .services-ui .filter-button,
        .services-ui .new-service-button,
        .services-ui .page-button {
            border: 1px solid var(--surface-border);
            background: rgba(255, 255, 255, 0.94);
            box-shadow: var(--shadow);
        }

        .services-ui .searchbox,
        .services-ui .notification-button,
        .services-ui .account-switcher { min-height: 42px; border-radius: 12px; }
        .services-ui .searchbox { display: flex; align-items: center; gap: 12px; width: 246px; padding: 0 14px; color: var(--text-faint); }
        .services-ui .searchbox input { width: 100%; }

        .services-ui .nav-icon,
        .services-ui .chevron,
        .services-ui .support-button svg,
        .services-ui .user-next svg,
        .services-ui .notification-button svg,
        .services-ui .office-icon svg,
        .services-ui .account-switcher > svg,
        .services-ui .filter-button svg,
        .services-ui .new-service-button svg,
        .services-ui .more-button svg,
        .services-ui .page-button svg,
        .services-ui .search-icon svg {
            width: 18px;
            height: 18px;
            flex: 0 0 auto;
        }

        .services-ui .notification-button { position: relative; display: inline-flex; align-items: center; justify-content: center; width: 42px; color: #485161; }
        .services-ui .notification-badge { position: absolute; top: -6px; right: -6px; display: grid; place-items: center; min-width: 18px; height: 18px; padding: 0 4px; border-radius: 999px; background: var(--orange); color: #fff; font-size: 0.68rem; font-weight: 700; }
        .services-ui .account-switcher { display: inline-flex; align-items: center; gap: 10px; padding: 0 16px; color: #2a3140; font-weight: 500; }
        .services-ui .office-icon { color: #738091; }
        .services-ui .account-switcher > svg:last-child { color: #677484; }

        .services-ui .stats-grid { display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 16px; margin-bottom: 22px; }
        .services-ui .stat-card { display: flex; align-items: center; gap: 18px; min-height: 134px; padding: 22px 22px; border-radius: 18px; }
        .services-ui .stat-icon, .services-ui .service-icon { display: grid; place-items: center; flex: 0 0 auto; }
        .services-ui .stat-icon { width: 48px; height: 48px; border-radius: 14px; }
        .services-ui .soft-orange { background: var(--orange-soft); color: var(--orange); }
        .services-ui .soft-green { background: var(--green-soft); color: var(--green); }
        .services-ui .soft-blue { background: var(--blue-soft); color: var(--blue); }
        .services-ui .soft-yellow { background: var(--yellow-soft); color: #f08a00; }
        .services-ui .soft-red { background: var(--red-soft); color: var(--red); }
        .services-ui .stat-copy span { display: block; margin-bottom: 8px; color: #445062; }
        .services-ui .stat-copy strong { display: block; margin-bottom: 8px; font-size: 2rem; letter-spacing: -0.06em; }
        .services-ui .stat-copy small { color: var(--text-soft); font-size: 0.95rem; }

        .services-ui .services-panel { border-radius: 22px; overflow: hidden; }
        .services-ui .panel-toolbar { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 22px 0; }
        .services-ui .tabs { display: flex; align-items: center; gap: 28px; }
        .services-ui .tab { position: relative; padding: 10px 0 18px; color: #536071; }
        .services-ui .tab.is-active { color: var(--orange); }
        .services-ui .tab.is-active::after { content: ""; position: absolute; left: -6px; right: -6px; bottom: 0; height: 3px; border-radius: 999px; background: var(--orange); }
        .services-ui .toolbar-actions { display: flex; align-items: center; gap: 12px; }

        .services-ui .filter-button,
        .services-ui .new-service-button,
        .services-ui .manage-button,
        .services-ui .more-button,
        .services-ui .page-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 36px;
            border-radius: 10px;
        }

        .services-ui .filter-button,
        .services-ui .new-service-button {
            gap: 10px;
            padding: 0 18px;
            box-shadow: none;
        }

        .services-ui .filter-button { color: #475162; }
        .services-ui .new-service-button { background: linear-gradient(180deg, #ff7b2f 0%, var(--orange) 100%); border-color: transparent; color: #fff; }
        .services-ui .services-table { padding: 20px 22px 0; }
        .services-ui .service-grid { display: grid; grid-template-columns: minmax(280px, 2fr) 130px 120px 160px 110px 120px 142px; align-items: center; gap: 18px; }
        .services-ui .services-head { padding: 16px 10px 16px; border-top: 1px solid rgba(232, 226, 219, 0.9); color: #556172; font-size: 0.94rem; }
        .services-ui .service-row { padding: 16px 10px; border-top: 1px solid rgba(232, 226, 219, 0.9); }
        .services-ui .service-main { display: flex; align-items: center; gap: 16px; min-width: 0; }
        .services-ui .service-icon { width: 40px; height: 40px; border-radius: 12px; }
        .services-ui .service-icon svg { width: 20px; height: 20px; }
        .services-ui .soft-lavender { background: var(--lavender-soft); color: #5a3cf2; }
        .services-ui .soft-blue-icon { background: #ebf3ff; color: #2d78ff; }
        .services-ui .soft-green-icon { background: var(--green-soft); color: var(--green); }
        .services-ui .soft-orange-icon { background: #fff3ea; color: var(--orange); }
        .services-ui .soft-violet-icon { background: var(--violet-soft); color: #7246f5; }
        .services-ui .soft-gold-icon { background: var(--gold-soft); color: #f09a00; }
        .services-ui .soft-gray-icon { background: var(--gray-soft); color: #4f5c6c; }
        .services-ui .soft-red-icon { background: var(--red-soft); color: var(--red); }
        .services-ui .service-main h2 { margin: 0 0 6px; font-size: 0.99rem; font-weight: 600; letter-spacing: -0.02em; }
        .services-ui .service-main p,
        .services-ui .date-cell span,
        .services-ui .services-footer p,
        .services-ui .type-cell,
        .services-ui .cycle-cell,
        .services-ui .amount-cell { margin: 0; color: var(--text-soft); }
        .services-ui .status-pill { display: inline-flex; align-items: center; justify-content: center; min-height: 28px; padding: 0 10px; border-radius: 8px; font-size: 0.82rem; font-weight: 600; white-space: nowrap; }
        .services-ui .pill-green { background: #e7f8ec; color: var(--green); }
        .services-ui .pill-amber { background: #fff0d8; color: #da8400; }
        .services-ui .date-cell strong, .services-ui .amount-cell { font-size: 0.95rem; font-weight: 500; color: #425062; }
        .services-ui .date-cell span { display: block; margin-top: 8px; color: var(--orange); font-weight: 600; }
        .services-ui .action-cell { display: flex; align-items: center; gap: 10px; }
        .services-ui .manage-button { min-width: 80px; padding: 0 14px; color: #212c3c; box-shadow: none; }
        .services-ui .more-button { width: 36px; color: #4c5768; box-shadow: none; }
        .services-ui .services-footer { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 18px 22px 14px; }
        .services-ui .pagination { display: flex; align-items: center; gap: 10px; }
        .services-ui .page-button { min-width: 34px; padding: 0 12px; color: #516071; box-shadow: none; }
        .services-ui .page-button.is-active { background: linear-gradient(180deg, #ff7b2f 0%, var(--orange) 100%); border-color: transparent; color: #fff; }
        .services-ui .icon-button { width: 34px; padding: 0; }

        @media (max-width: 1380px) {
            .services-ui .stats-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .services-ui .service-grid { grid-template-columns: minmax(250px, 2fr) 120px 120px 150px 100px 110px 132px; }
        }

        @media (max-width: 1180px) {
         
            .services-ui .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .services-ui .panel-toolbar { flex-direction: column; align-items: flex-start; }
            .services-ui .service-grid,
            .services-ui .services-head { grid-template-columns: 1fr; }
            .services-ui .services-head { display: none; }
            .services-ui .service-row { gap: 10px; }
        }

        @media (max-width: 760px) {
            .services-ui .stats-grid { grid-template-columns: 1fr; }
            .services-ui .tabs { width: 100%; overflow-x: auto; padding-bottom: 4px; }
            .services-ui .toolbar-actions,
            .services-ui .services-footer { width: 100%; flex-direction: column; align-items: flex-start; }
        }
    </style>

    <div class="services-ui">
        <main>
            <section class="stats-grid" aria-label="Service summary">
                <article class="stat-card">
                    <div class="stat-icon soft-orange">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <ellipse cx="12" cy="6.5" rx="5.5" ry="2.5"></ellipse>
                            <path d="M6.5 6.5v5c0 1.4 2.5 2.5 5.5 2.5s5.5-1.1 5.5-2.5v-5"></path>
                            <path d="M6.5 11.5v5c0 1.4 2.5 2.5 5.5 2.5s5.5-1.1 5.5-2.5v-5"></path>
                        </svg>
                    </div>
                    <div class="stat-copy">
                        <span>Total Services</span>
                        <strong>8</strong>
                        <small>All services</small>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon soft-green">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="12" cy="12" r="8.5"></circle>
                            <path d="m8.5 12 2.2 2.2 4.8-5"></path>
                        </svg>
                    </div>
                    <div class="stat-copy">
                        <span>Active</span>
                        <strong>6</strong>
                        <small>75% of total</small>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon soft-blue">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="12" cy="12" r="8.5"></circle>
                            <path d="M12 7.5V12h3.5"></path>
                        </svg>
                    </div>
                    <div class="stat-copy">
                        <span>Expiring Soon</span>
                        <strong>2</strong>
                        <small>25% of total</small>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon soft-yellow">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="12" cy="12" r="8.5"></circle>
                            <path d="M10 9.5v5"></path>
                            <path d="M14 9.5v5"></path>
                        </svg>
                    </div>
                    <div class="stat-copy">
                        <span>Suspended</span>
                        <strong>0</strong>
                        <small>0% of total</small>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon soft-red">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="12" cy="12" r="8.5"></circle>
                            <path d="m9 9 6 6"></path>
                            <path d="m15 9-6 6"></path>
                        </svg>
                    </div>
                    <div class="stat-copy">
                        <span>Cancelled</span>
                        <strong>0</strong>
                        <small>0% of total</small>
                    </div>
                </article>
            </section>

            <section class="services-panel">
                <div class="panel-toolbar">
                    <div class="tabs" aria-label="Service filters">
                        <button type="button" class="tab is-active">All Services</button>
                        <button type="button" class="tab">Active</button>
                        <button type="button" class="tab">Expiring Soon</button>
                        <button type="button" class="tab">Suspended</button>
                        <button type="button" class="tab">Cancelled</button>
                    </div>

                    <div class="toolbar-actions">
                        <button type="button" class="filter-button">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M4 6h16"></path>
                                <path d="M7 12h10"></path>
                                <path d="M10 18h4"></path>
                            </svg>
                            <span>Filter</span>
                        </button>
                        <button type="button" class="new-service-button">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 5v14"></path>
                                <path d="M5 12h14"></path>
                            </svg>
                            <span>Add New Service</span>
                        </button>
                    </div>
                </div>

                <div class="services-table">
                    <div class="services-head service-grid">
                        <span>Service</span>
                        <span>Type</span>
                        <span>Status</span>
                        <span>Next Due Date</span>
                        <span>Amount</span>
                        <span>Billing Cycle</span>
                        <span>Action</span>
                    </div>

                    <article class="service-row service-grid">
                        <div class="service-main">
                            <div class="service-icon soft-lavender">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <circle cx="12" cy="12" r="7"></circle>
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5a10.7 10.7 0 0 1 3 7 10.7 10.7 0 0 1-3 7 10.7 10.7 0 0 1-3-7 10.7 10.7 0 0 1 3-7Z"></path>
                                </svg>
                            </div>
                            <div>
                                <h2>acme.com</h2>
                                <p>Domain Registration</p>
                            </div>
                        </div>
                        <div class="type-cell">Domain</div>
                        <div><span class="status-pill pill-green">Active</span></div>
                        <div class="date-cell">
                            <strong>May 15, 2025</strong>
                            <span>23 days left</span>
                        </div>
                        <div class="amount-cell">₦8,000</div>
                        <div class="cycle-cell">1 Year</div>
                        <div class="action-cell">
                            <button type="button" class="manage-button">Manage</button>
                            <button type="button" class="more-button" aria-label="More actions for acme.com">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>

                    <article class="service-row service-grid">
                        <div class="service-main">
                            <div class="service-icon soft-blue-icon">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <rect x="4.5" y="5" width="15" height="6" rx="1.5"></rect>
                                    <rect x="4.5" y="13" width="15" height="6" rx="1.5"></rect>
                                    <path d="M8 8h.01"></path>
                                    <path d="M8 16h.01"></path>
                                </svg>
                            </div>
                            <div>
                                <h2>Acme Hosting Plan</h2>
                                <p>Shared Hosting</p>
                            </div>
                        </div>
                        <div class="type-cell">Hosting</div>
                        <div><span class="status-pill pill-green">Active</span></div>
                        <div class="date-cell">
                            <strong>May 20, 2025</strong>
                            <span>28 days left</span>
                        </div>
                        <div class="amount-cell">₦70,000</div>
                        <div class="cycle-cell">1 Year</div>
                        <div class="action-cell">
                            <button type="button" class="manage-button">Manage</button>
                            <button type="button" class="more-button" aria-label="More actions for Acme Hosting Plan">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>

                    <article class="service-row service-grid">
                        <div class="service-main">
                            <div class="service-icon soft-green-icon">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 3.5 5 6.5V12c0 4.2 2.7 7.8 7 8.8 4.3-1 7-4.6 7-8.8V6.5Z"></path>
                                    <path d="m9.5 12 1.8 1.8 3.7-4"></path>
                                </svg>
                            </div>
                            <div>
                                <h2>SSL Certificate (acme.com)</h2>
                                <p>SSL Certificate</p>
                            </div>
                        </div>
                        <div class="type-cell">SSL</div>
                        <div><span class="status-pill pill-green">Active</span></div>
                        <div class="date-cell">
                            <strong>Jun 10, 2025</strong>
                            <span>49 days left</span>
                        </div>
                        <div class="amount-cell">₦15,000</div>
                        <div class="cycle-cell">1 Year</div>
                        <div class="action-cell">
                            <button type="button" class="manage-button">Manage</button>
                            <button type="button" class="more-button" aria-label="More actions for SSL Certificate">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>

                    <article class="service-row service-grid">
                        <div class="service-main">
                            <div class="service-icon soft-orange-icon">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M5 8h14v8H5Z"></path>
                                    <path d="M5 8 12 13l7-5"></path>
                                </svg>
                            </div>
                            <div>
                                <h2>Business Email</h2>
                                <p>5 Mailboxes</p>
                            </div>
                        </div>
                        <div class="type-cell">Email</div>
                        <div><span class="status-pill pill-green">Active</span></div>
                        <div class="date-cell">
                            <strong>May 25, 2025</strong>
                            <span>33 days left</span>
                        </div>
                        <div class="amount-cell">₦24,000</div>
                        <div class="cycle-cell">1 Year</div>
                        <div class="action-cell">
                            <button type="button" class="manage-button">Manage</button>
                            <button type="button" class="more-button" aria-label="More actions for Business Email">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>

                    <article class="service-row service-grid">
                        <div class="service-main">
                            <div class="service-icon soft-violet-icon">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M7 15a4 4 0 1 1 7.8 1H17a2.5 2.5 0 0 0 .2-5 5 5 0 0 0-9.7 1A3.5 3.5 0 0 0 7 19h8a3 3 0 0 0 0-6"></path>
                                    <path d="M12 10v7"></path>
                                    <path d="m9.5 14.5 2.5 2.5 2.5-2.5"></path>
                                </svg>
                            </div>
                            <div>
                                <h2>Daily Backup</h2>
                                <p>Website Backup</p>
                            </div>
                        </div>
                        <div class="type-cell">Add-on</div>
                        <div><span class="status-pill pill-green">Active</span></div>
                        <div class="date-cell">
                            <strong>May 20, 2025</strong>
                            <span>28 days left</span>
                        </div>
                        <div class="amount-cell">₦10,000</div>
                        <div class="cycle-cell">1 Year</div>
                        <div class="action-cell">
                            <button type="button" class="manage-button">Manage</button>
                            <button type="button" class="more-button" aria-label="More actions for Daily Backup">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>

                    <article class="service-row service-grid">
                        <div class="service-main">
                            <div class="service-icon soft-gold-icon">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <circle cx="7" cy="12" r="1.5"></circle>
                                    <circle cx="17" cy="6.5" r="1.5"></circle>
                                    <circle cx="17" cy="17.5" r="1.5"></circle>
                                    <path d="m8.4 11 7.2-3"></path>
                                    <path d="m8.4 13 7.2 3"></path>
                                </svg>
                            </div>
                            <div>
                                <h2>Cloudflare CDN</h2>
                                <p>CDN Service</p>
                            </div>
                        </div>
                        <div class="type-cell">Add-on</div>
                        <div><span class="status-pill pill-green">Active</span></div>
                        <div class="date-cell">
                            <strong>May 20, 2025</strong>
                            <span>28 days left</span>
                        </div>
                        <div class="amount-cell">₦12,000</div>
                        <div class="cycle-cell">1 Year</div>
                        <div class="action-cell">
                            <button type="button" class="manage-button">Manage</button>
                            <button type="button" class="more-button" aria-label="More actions for Cloudflare CDN">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>

                    <article class="service-row service-grid">
                        <div class="service-main">
                            <div class="service-icon soft-gray-icon">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <rect x="7" y="10" width="10" height="8" rx="1.5"></rect>
                                    <path d="M9 10V7.5A3 3 0 0 1 12 4.5a3 3 0 0 1 3 3V10"></path>
                                </svg>
                            </div>
                            <div>
                                <h2>SiteLock Security</h2>
                                <p>Website Security</p>
                            </div>
                        </div>
                        <div class="type-cell">Add-on</div>
                        <div><span class="status-pill pill-amber">Expiring Soon</span></div>
                        <div class="date-cell">
                            <strong>Jun 05, 2025</strong>
                            <span>44 days left</span>
                        </div>
                        <div class="amount-cell">₦18,000</div>
                        <div class="cycle-cell">1 Year</div>
                        <div class="action-cell">
                            <button type="button" class="manage-button">Manage</button>
                            <button type="button" class="more-button" aria-label="More actions for SiteLock Security">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>

                    <article class="service-row service-grid">
                        <div class="service-main">
                            <div class="service-icon soft-red-icon">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <rect x="5" y="6" width="14" height="10" rx="1.5"></rect>
                                    <path d="M8 19h8"></path>
                                    <path d="M12 16v3"></path>
                                </svg>
                            </div>
                            <div>
                                <h2>Website Maintenance</h2>
                                <p>Maintenance Service</p>
                            </div>
                        </div>
                        <div class="type-cell">Service</div>
                        <div><span class="status-pill pill-amber">Expiring Soon</span></div>
                        <div class="date-cell">
                            <strong>Jun 12, 2025</strong>
                            <span>51 days left</span>
                        </div>
                        <div class="amount-cell">₦30,000</div>
                        <div class="cycle-cell">1 Year</div>
                        <div class="action-cell">
                            <button type="button" class="manage-button">Manage</button>
                            <button type="button" class="more-button" aria-label="More actions for Website Maintenance">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>
                </div>

                <div class="services-footer">
                    <p>Showing 1 to 8 of 8 services</p>
                    <div class="pagination">
                        <button type="button" class="page-button icon-button" aria-label="Previous page">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="m14 7-5 5 5 5"></path>
                            </svg>
                        </button>
                        <button type="button" class="page-button is-active">1</button>
                        <button type="button" class="page-button icon-button" aria-label="Next page">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="m10 7 5 5-5 5"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</x-filament-panels::page>
