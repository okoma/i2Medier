<x-filament-panels::page>
    <style>
        .projects-ui {
           
            --surface: #ffffff;
            --surface-border: #e8e2db;
            --text: #171717;
            --text-soft: #687384;
            --text-faint: #97a0af;
            --orange: #ff5b00;
            --orange-soft: #fff1e8;
            --orange-mute: #fff5ed;
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
            --shadow: 0 18px 40px rgba(26, 25, 31, 0.06);
            --radius-xl: 22px;
            --radius-lg: 18px;
            --radius-md: 14px;
            --radius-sm: 10px;
            color: var(--text);
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .projects-ui *,
        .projects-ui *::before,
        .projects-ui *::after {
            box-sizing: border-box;
        }

        .projects-ui a,
        .projects-ui button,
        .projects-ui input {
            font: inherit;
        }

        .projects-ui a {
            color: inherit;
            text-decoration: none;
        }

        .projects-ui button {
            border: 0;
            background: none;
            cursor: pointer;
        }

        .projects-ui input {
            border: 0;
            background: transparent;
            color: inherit;
        }

        .projects-ui input:focus {
            outline: 0;
        }

        .projects-ui svg {
            width: 100%;
            height: 100%;
            stroke: currentColor;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

       

        .projects-ui .searchbox,
        .projects-ui .notification-button,
        .projects-ui .account-switcher,
        .projects-ui .projects-panel,
        .projects-ui .stat-card,
        .projects-ui .details-button,
        .projects-ui .more-button,
        .projects-ui .filter-button,
        .projects-ui .new-project-button,
        .projects-ui .page-button {
            border: 1px solid var(--surface-border);
            background: rgba(255, 255, 255, 0.94);
            box-shadow: var(--shadow);
        }

        .projects-ui .searchbox,
        .projects-ui .notification-button,
        .projects-ui .account-switcher {
            min-height: 44px;
            border-radius: 12px;
        }

        .projects-ui .searchbox {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 252px;
            padding: 0 14px;
            color: var(--text-faint);
        }

        .projects-ui .searchbox input {
            width: 100%;
        }

        .projects-ui .support-button svg,
        .projects-ui .user-next svg,
        .projects-ui .notification-button svg,
        .projects-ui .office-icon svg,
        .projects-ui .account-switcher > svg,
        .projects-ui .filter-button svg,
        .projects-ui .new-project-button svg,
        .projects-ui .more-button svg,
        .projects-ui .page-button svg,
        .projects-ui .search-icon svg {
            width: 18px;
            height: 18px;
        }

        .projects-ui .notification-button {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            color: #485161;
        }

        .projects-ui .notification-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            display: grid;
            place-items: center;
            min-width: 18px;
            height: 18px;
            padding: 0 4px;
            border-radius: 999px;
            background: var(--orange);
            color: #fff;
            font-size: 0.68rem;
            font-weight: 700;
        }

        .projects-ui .account-switcher {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 0 16px;
            color: #2a3140;
            font-weight: 500;
        }

        .projects-ui .office-icon {
            color: #738091;
        }

        .projects-ui .account-switcher > svg:last-child {
            color: #677484;
        }

        .projects-ui .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .projects-ui .stat-card {
            display: flex;
            align-items: center;
            gap: 18px;
            min-height: 130px;
            padding: 22px 20px;
            border-radius: 18px;
        }

        .projects-ui .stat-icon,
        .projects-ui .project-icon {
            display: grid;
            place-items: center;
            flex: 0 0 auto;
        }

        .projects-ui .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
        }

        .projects-ui .soft-orange {
            background: var(--orange-soft);
            color: var(--orange);
        }

        .projects-ui .soft-green {
            background: var(--green-soft);
            color: var(--green);
        }

        .projects-ui .soft-blue {
            background: var(--blue-soft);
            color: var(--blue);
        }

        .projects-ui .soft-yellow {
            background: var(--yellow-soft);
            color: #f08a00;
        }

        .projects-ui .soft-red {
            background: var(--red-soft);
            color: var(--red);
        }

        .projects-ui .stat-copy span {
            display: block;
            margin-bottom: 8px;
            color: #445062;
        }

        .projects-ui .stat-copy strong {
            display: block;
            margin-bottom: 8px;
            font-size: 2rem;
            letter-spacing: -0.06em;
        }

        .projects-ui .stat-copy small {
            color: var(--text-soft);
            font-size: 0.95rem;
        }

        .projects-ui .projects-panel {
            border-radius: 22px;
            overflow: hidden;
        }

        .projects-ui .panel-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 18px 22px 0;
        }

        .projects-ui .tabs {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .projects-ui .tab {
            position: relative;
            padding: 10px 0 18px;
            color: #536071;
        }

        .projects-ui .tab.is-active {
            color: var(--orange);
        }

        .projects-ui .tab.is-active::after {
            content: "";
            position: absolute;
            left: -8px;
            right: -8px;
            bottom: 0;
            height: 3px;
            border-radius: 999px;
            background: var(--orange);
        }

        .projects-ui .toolbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .projects-ui .filter-button,
        .projects-ui .new-project-button,
        .projects-ui .details-button,
        .projects-ui .more-button,
        .projects-ui .page-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            border-radius: 10px;
        }

        .projects-ui .filter-button,
        .projects-ui .new-project-button {
            gap: 10px;
            padding: 0 18px;
            box-shadow: none;
        }

        .projects-ui .filter-button {
            color: #475162;
        }

        .projects-ui .new-project-button {
            background: linear-gradient(180deg, #ff7b2f 0%, var(--orange) 100%);
            border-color: transparent;
            color: #fff;
        }

        .projects-ui .projects-table {
            padding: 24px 22px 0;
        }

        .projects-ui .project-grid {
            display: grid;
            grid-template-columns: minmax(280px, 2fr) 140px 220px 140px 140px 170px;
            align-items: center;
            gap: 18px;
        }

        .projects-ui .projects-head {
            padding: 14px 10px 16px;
            border-top: 1px solid rgba(232, 226, 219, 0.9);
            color: #556172;
            font-size: 0.94rem;
        }

        .projects-ui .project-row {
            padding: 18px 10px;
            border-top: 1px solid rgba(232, 226, 219, 0.9);
        }

        .projects-ui .project-main {
            display: flex;
            align-items: center;
            gap: 16px;
            min-width: 0;
        }

        .projects-ui .project-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
        }

        .projects-ui .black-card {
            background: linear-gradient(180deg, #0d1119 0%, #070b13 100%);
            color: #fff;
            font-size: 1.08rem;
            font-weight: 700;
        }

        .projects-ui .soft-lavender {
            background: var(--lavender-soft);
            color: #4b2ff6;
        }

        .projects-ui .soft-green-icon {
            background: var(--green-soft);
            color: var(--green);
        }

        .projects-ui .brand-blue {
            background: linear-gradient(180deg, #204eb1 0%, #173a84 100%);
            color: #fff;
        }

        .projects-ui .soft-orange-icon {
            background: var(--orange-mute);
            color: var(--orange);
        }

        .projects-ui .soft-violet-icon {
            background: var(--violet-soft);
            color: #4a36c6;
        }

        .projects-ui .project-icon svg {
            width: 22px;
            height: 22px;
        }

        .projects-ui .project-main h2 {
            margin: 0 0 8px;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: -0.02em;
        }

        .projects-ui .project-main p,
        .projects-ui .date-cell span,
        .projects-ui .updated-cell span,
        .projects-ui .projects-footer p {
            margin: 0;
            color: var(--text-soft);
        }

        .projects-ui .status-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 28px;
            padding: 0 10px;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .projects-ui .pill-blue {
            background: var(--blue-soft);
            color: var(--blue);
        }

        .projects-ui .pill-amber {
            background: #fff0d8;
            color: #da8400;
        }

        .projects-ui .pill-green {
            background: #e7f8ec;
            color: var(--green);
        }

        .projects-ui .pill-gray {
            background: #f0f2f5;
            color: #566172;
        }

        .projects-ui .progress-cell {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .projects-ui .progress-track {
            width: 144px;
            height: 8px;
            border-radius: 999px;
            background: #edf1f5;
            overflow: hidden;
        }

        .projects-ui .progress-track span {
            display: block;
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, #ff6b12 0%, var(--orange) 100%);
        }

        .projects-ui .progress-0 { width: 0%; }
        .projects-ui .progress-10 { width: 10%; }
        .projects-ui .progress-35 { width: 35%; }
        .projects-ui .progress-60 { width: 60%; }
        .projects-ui .progress-70 { width: 70%; }
        .projects-ui .progress-100 { width: 100%; }

        .projects-ui .progress-green {
            background: linear-gradient(90deg, #28aa61 0%, var(--green) 100%);
        }

        .projects-ui .progress-cell strong,
        .projects-ui .date-cell strong,
        .projects-ui .updated-cell strong {
            font-size: 0.95rem;
            font-weight: 500;
            color: #425062;
        }

        .projects-ui .date-cell span {
            display: block;
            margin-top: 8px;
            color: var(--orange);
            font-weight: 600;
        }

        .projects-ui .date-green span {
            color: var(--green);
        }

        .projects-ui .updated-cell span {
            display: block;
            margin-top: 8px;
        }

        .projects-ui .action-cell {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: flex-start;
        }

        .projects-ui .details-button {
            min-width: 100px;
            padding: 0 14px;
            color: #212c3c;
        }

        .projects-ui .more-button {
            width: 40px;
            color: #4c5768;
        }

        .projects-ui .projects-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 18px 22px 20px;
            border-top: 1px solid rgba(232, 226, 219, 0.9);
        }

        .projects-ui .pagination {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .projects-ui .page-button {
            min-width: 38px;
            padding: 0 12px;
            color: #516071;
            box-shadow: none;
        }

        .projects-ui .page-button.is-active {
            background: linear-gradient(180deg, #ff7b2f 0%, var(--orange) 100%);
            border-color: transparent;
            color: #fff;
        }

        .projects-ui .icon-button {
            width: 38px;
            padding: 0;
        }

        @media (max-width: 1380px) {
            .projects-ui .stats-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .projects-ui .project-grid {
                grid-template-columns: minmax(250px, 2fr) 130px 220px 140px 140px 150px;
            }
        }

        @media (max-width: 1180px) {
      

            .projects-ui .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .projects-ui .panel-toolbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .projects-ui .project-grid,
            .projects-ui .projects-head {
                grid-template-columns: 1fr;
            }

            .projects-ui .projects-head {
                display: none;
            }

            .projects-ui .project-row {
                gap: 12px;
            }

            .projects-ui .progress-cell,
            .projects-ui .action-cell {
                justify-content: flex-start;
            }
        }

        @media (max-width: 760px) {
            .projects-ui .stats-grid {
                grid-template-columns: 1fr;
            }

            .projects-ui .tabs {
                width: 100%;
                overflow-x: auto;
                padding-bottom: 4px;
            }

            .projects-ui .toolbar-actions,
            .projects-ui .projects-footer {
                width: 100%;
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>

    <div class="projects-ui">
        <main>
            <section class="stats-grid" aria-label="Project summary">
                <article class="stat-card">
                    <div class="stat-icon soft-orange">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M3.5 7.5A2.5 2.5 0 0 1 6 5h4l2 2h6a2.5 2.5 0 0 1 2.5 2.5v7A2.5 2.5 0 0 1 18 19H6a2.5 2.5 0 0 1-2.5-2.5Z"></path>
                        </svg>
                    </div>
                    <div class="stat-copy">
                        <span>Total Projects</span>
                        <strong>12</strong>
                        <small>All time</small>
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
                        <span>Completed</span>
                        <strong>6</strong>
                        <small>50% of total</small>
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
                        <span>In Progress</span>
                        <strong>4</strong>
                        <small>33.3% of total</small>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon soft-yellow">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M8 4.5h8"></path>
                            <path d="M8 19.5h8"></path>
                            <path d="m9 4.5 6 7-6 8"></path>
                            <path d="m15 4.5-6 7 6 8"></path>
                        </svg>
                    </div>
                    <div class="stat-copy">
                        <span>On Hold</span>
                        <strong>1</strong>
                        <small>8.3% of total</small>
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
                        <strong>1</strong>
                        <small>8.3% of total</small>
                    </div>
                </article>
            </section>

            <section class="projects-panel">
                <div class="panel-toolbar">
                    <div class="tabs" aria-label="Project filters">
                        <button type="button" class="tab is-active">All Projects</button>
                        <button type="button" class="tab">In Progress</button>
                        <button type="button" class="tab">On Hold</button>
                        <button type="button" class="tab">Completed</button>
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
                        <button type="button" class="new-project-button">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 5v14"></path>
                                <path d="M5 12h14"></path>
                            </svg>
                            <span>New Project</span>
                        </button>
                    </div>
                </div>

                <div class="projects-table">
                    <div class="projects-head project-grid">
                        <span>Project</span>
                        <span>Status</span>
                        <span>Progress</span>
                        <span>Due Date</span>
                        <span>Last Updated</span>
                        <span>Action</span>
                    </div>

                    <article class="project-row project-grid">
                        <div class="project-main">
                            <div class="project-icon black-card">
                                <span>A</span>
                            </div>
                            <div>
                                <h2>Acme Website Redesign</h2>
                                <p>Website Development</p>
                            </div>
                        </div>
                        <div><span class="status-pill pill-blue">In Progress</span></div>
                        <div class="progress-cell">
                            <div class="progress-track"><span class="progress-60"></span></div>
                            <strong>60%</strong>
                        </div>
                        <div class="date-cell">
                            <strong>May 20, 2024</strong>
                            <span>18 days left</span>
                        </div>
                        <div class="updated-cell">
                            <strong>May 2, 2024</strong>
                            <span>by Victor</span>
                        </div>
                        <div class="action-cell">
                            <button type="button" class="details-button">View Details</button>
                            <button type="button" class="more-button" aria-label="More actions for Acme Website Redesign">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>

                    <article class="project-row project-grid">
                        <div class="project-main">
                            <div class="project-icon soft-lavender">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M6 7h12l-1.2 6H8Z"></path>
                                    <path d="M9 18.5a1 1 0 1 0 0 .01"></path>
                                    <path d="M16 18.5a1 1 0 1 0 0 .01"></path>
                                    <path d="M7 7 6 4H4"></path>
                                </svg>
                            </div>
                            <div>
                                <h2>Acme E-commerce Store</h2>
                                <p>E-commerce Development</p>
                            </div>
                        </div>
                        <div><span class="status-pill pill-blue">In Progress</span></div>
                        <div class="progress-cell">
                            <div class="progress-track"><span class="progress-35"></span></div>
                            <strong>35%</strong>
                        </div>
                        <div class="date-cell">
                            <strong>Jun 10, 2024</strong>
                            <span>39 days left</span>
                        </div>
                        <div class="updated-cell">
                            <strong>May 5, 2024</strong>
                            <span>by Victor</span>
                        </div>
                        <div class="action-cell">
                            <button type="button" class="details-button">View Details</button>
                            <button type="button" class="more-button" aria-label="More actions for Acme E-commerce Store">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>

                    <article class="project-row project-grid">
                        <div class="project-main">
                            <div class="project-icon soft-green-icon">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <rect x="8" y="3.5" width="8" height="17" rx="2"></rect>
                                    <path d="M10.5 6.5h3"></path>
                                    <path d="M11.5 17.5h1"></path>
                                </svg>
                            </div>
                            <div>
                                <h2>Acme Mobile App</h2>
                                <p>Mobile App Development</p>
                            </div>
                        </div>
                        <div><span class="status-pill pill-amber">Planning</span></div>
                        <div class="progress-cell">
                            <div class="progress-track"><span class="progress-10"></span></div>
                            <strong>10%</strong>
                        </div>
                        <div class="date-cell">
                            <strong>Jun 30, 2024</strong>
                            <span>59 days left</span>
                        </div>
                        <div class="updated-cell">
                            <strong>Apr 28, 2024</strong>
                            <span>by Victor</span>
                        </div>
                        <div class="action-cell">
                            <button type="button" class="details-button">View Details</button>
                            <button type="button" class="more-button" aria-label="More actions for Acme Mobile App">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>

                    <article class="project-row project-grid">
                        <div class="project-main">
                            <div class="project-icon brand-blue">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="m5 8 4 3"></path>
                                    <path d="m9 11 4 3"></path>
                                    <path d="m13 14 4 3"></path>
                                    <path d="m9 8 4 3"></path>
                                    <path d="m13 11 4 3"></path>
                                </svg>
                            </div>
                            <div>
                                <h2>Acme Branding Project</h2>
                                <p>Branding</p>
                            </div>
                        </div>
                        <div><span class="status-pill pill-green">Completed</span></div>
                        <div class="progress-cell">
                            <div class="progress-track"><span class="progress-100 progress-green"></span></div>
                            <strong>100%</strong>
                        </div>
                        <div class="date-cell date-green">
                            <strong>Apr 15, 2024</strong>
                            <span>Completed</span>
                        </div>
                        <div class="updated-cell">
                            <strong>Apr 15, 2024</strong>
                            <span>by Victor</span>
                        </div>
                        <div class="action-cell">
                            <button type="button" class="details-button">View Details</button>
                            <button type="button" class="more-button" aria-label="More actions for Acme Branding Project">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>

                    <article class="project-row project-grid">
                        <div class="project-main">
                            <div class="project-icon soft-orange-icon">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M4 12.5h8"></path>
                                    <path d="m11 9.5 7-3v12l-7-3Z"></path>
                                    <path d="M8 12.5v3a2 2 0 0 0 3.4 1.4"></path>
                                </svg>
                            </div>
                            <div>
                                <h2>Acme Digital Marketing</h2>
                                <p>Digital Marketing</p>
                            </div>
                        </div>
                        <div><span class="status-pill pill-blue">In Progress</span></div>
                        <div class="progress-cell">
                            <div class="progress-track"><span class="progress-70"></span></div>
                            <strong>70%</strong>
                        </div>
                        <div class="date-cell">
                            <strong>May 25, 2024</strong>
                            <span>23 days left</span>
                        </div>
                        <div class="updated-cell">
                            <strong>May 6, 2024</strong>
                            <span>by Victor</span>
                        </div>
                        <div class="action-cell">
                            <button type="button" class="details-button">View Details</button>
                            <button type="button" class="more-button" aria-label="More actions for Acme Digital Marketing">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>

                    <article class="project-row project-grid">
                        <div class="project-main">
                            <div class="project-icon soft-violet-icon">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 3.5 5 6.5V12c0 4.2 2.7 7.8 7 8.8 4.3-1 7-4.6 7-8.8V6.5Z"></path>
                                    <path d="m9.5 12 1.8 1.8 3.7-4"></path>
                                </svg>
                            </div>
                            <div>
                                <h2>Acme Security Audit</h2>
                                <p>Security</p>
                            </div>
                        </div>
                        <div><span class="status-pill pill-gray">On Hold</span></div>
                        <div class="progress-cell">
                            <div class="progress-track"><span class="progress-0"></span></div>
                            <strong>0%</strong>
                        </div>
                        <div class="date-cell">
                            <strong>TBD</strong>
                            <span>-</span>
                        </div>
                        <div class="updated-cell">
                            <strong>Apr 20, 2024</strong>
                            <span>by Victor</span>
                        </div>
                        <div class="action-cell">
                            <button type="button" class="details-button">View Details</button>
                            <button type="button" class="more-button" aria-label="More actions for Acme Security Audit">
                                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 6h.01"></path>
                                    <path d="M12 12h.01"></path>
                                    <path d="M12 18h.01"></path>
                                </svg>
                            </button>
                        </div>
                    </article>
                </div>

                <div class="projects-footer">
                    <p>Showing 1 to 6 of 12 projects</p>
                    <div class="pagination">
                        <button type="button" class="page-button icon-button" aria-label="Previous page">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="m14 7-5 5 5 5"></path>
                            </svg>
                        </button>
                        <button type="button" class="page-button is-active">1</button>
                        <button type="button" class="page-button">2</button>
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
