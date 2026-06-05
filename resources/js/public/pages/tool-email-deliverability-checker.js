const page = document.getElementById('email-deliverability-checker-page');

if (page) {
    const generateRoute = page.dataset.generateRoute;
    const liveStartRoute = page.dataset.liveStartRoute;
    const livePollRoute = page.dataset.livePollRoute;
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ?? '';
    const historyStorageKey = 'i2m_deliv_history';
    const loadingMessages = [
        'Querying MX records and DNS configuration…',
        'Checking SPF record syntax and includes…',
        'Verifying DKIM key alignment…',
        'Analysing DMARC policy and reporting…',
        'Cross-referencing major spam blacklists…',
        'Scanning for content spam triggers…',
        'Evaluating domain reputation signals…',
        'Scoring your deliverability profile…',
    ];
    const stepIds = ['step-dns', 'step-spf', 'step-dkim', 'step-dmarc', 'step-blacklist', 'step-content', 'step-reputation'];
    let history = JSON.parse(localStorage.getItem(historyStorageKey) || '[]');
    let currentResult = null;
    let msgInterval = null;
    let stepInterval = null;
    let livePollTimer = null;
    let liveTestId = null;
    let liveTestInput = '';

    const icon = (id) => `<span class="ui-icon"><svg><use href="#${id}"></use></svg></span>`;

    const setupPillGroup = (id) => {
        const el = document.getElementById(id);
        if (!el) return;
        el.addEventListener('click', (event) => {
            const pill = event.target.closest('.pill');
            if (!pill) return;
            el.querySelectorAll('.pill').forEach((node) => node.classList.remove('active'));
            pill.classList.add('active');
        });
    };

    const activeValue = (id) => document.querySelector(`#${id} .pill.active`)?.dataset.val ?? '';

    const looksLikeEmail = (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(String(value).trim());

    const modeConfig = {
        basic: {
            label: 'Email address or domain to check',
            placeholder: 'hello@yourdomain.com  or  yourdomain.com',
            help: 'Use a domain for DNS/authentication checks or an email address for sender-specific context.',
            button: 'Run Deliverability Audit',
            buttonIcon: 'icon-spark',
        },
        live: {
            label: 'Sender email address to test',
            placeholder: 'hello@yourdomain.com',
            help: 'Live inbox tests require a real sender email address so we can compare the delivered message headers against the sender identity.',
            button: 'Start Live Inbox Test',
            buttonIcon: 'icon-mail',
        },
    };

    const toast = (message, duration = 3000) => {
        const el = document.getElementById('toast');
        if (!el) return;
        el.textContent = message;
        el.classList.add('show');
        window.setTimeout(() => el.classList.remove('show'), duration);
    };

    const setButtonLoading = (id, on) => {
        const btn = document.getElementById(id);
        btn?.classList.toggle('loading', on);
        if (btn) btn.disabled = on;
    };

    const syncModeUi = () => {
        const mode = activeValue('audit-mode-group') || 'basic';
        const config = modeConfig[mode] || modeConfig.basic;
        const label = document.getElementById('target-label');
        const input = document.getElementById('email-input');
        const help = document.getElementById('target-help');
        const buttonText = document.getElementById('check-btn-text');

        if (label) {
            label.innerHTML = `${escapeHtml(config.label)} <span class="req">*</span>`;
        }

        if (input) {
            input.placeholder = config.placeholder;
            input.setAttribute('inputmode', mode === 'live' ? 'email' : 'text');
        }

        if (help) {
            help.textContent = config.help;
        }

        if (buttonText) {
            buttonText.innerHTML = `<span class="ui-icon"><svg><use href="#${config.buttonIcon}"></use></svg></span> ${escapeHtml(config.button)}`;
        }

        if (mode !== 'live') {
            liveTestId = null;
            liveTestInput = '';
            clearIntervals();
            hideLiveTestPanel();
        }
    };

    const escapeHtml = (value) => String(value ?? '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');

    const verdictClass = (verdict) => (['excellent', 'good', 'poor', 'critical'].includes(verdict) ? verdict : 'good');

    const saveToHistory = (result) => {
        history.unshift({
            input: result.input,
            score: result.score,
            verdict: result.verdict,
            timestamp: result.timestamp,
        });
        history = history.slice(0, 12);
        localStorage.setItem(historyStorageKey, JSON.stringify(history));
        renderHistoryGrid();
    };

    const renderHistoryGrid = () => {
        const grid = document.getElementById('history-grid');
        if (!grid) return;

        if (history.length === 0) {
            grid.innerHTML = '<div class="h-empty">No checks yet — run your first audit above.</div>';
            return;
        }

        grid.innerHTML = history.map((item, index) => {
            const scoreClass = verdictClass(item.verdict);
            const date = new Date(item.timestamp);
            const dateText = date.toLocaleDateString('en-GB', { day: 'numeric', month: 'short' }) + ' ' + date.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' });
            return `
                <div class="h-item" data-history-index="${index}">
                    <div class="hi-email">${escapeHtml(item.input)}</div>
                    <div class="hi-score-row">
                        <div class="hi-score ${scoreClass}">${escapeHtml(item.score)}/100</div>
                        <span class="si-tag ${scoreClass === 'excellent' ? 'tag-ok' : scoreClass === 'good' ? 'tag-warn' : 'tag-err'}" style="font-size:.58rem">${escapeHtml(item.verdict)}</span>
                        <div class="hi-date">${escapeHtml(dateText)}</div>
                    </div>
                </div>
            `;
        }).join('');
    };

    const spawnParticles = () => {
        const strings = ['SPF', 'DKIM', 'DMARC', 'MX', 'PTR', 'TXT', 'SMTP', 'TLS', 'SSL', 'BIMI', 'ARC', '250 OK', '550 5.1.1', '220 ESMTP'];
        const wrap = document.getElementById('hero-particles');
        if (!wrap) return;

        strings.forEach((text) => {
            const el = document.createElement('div');
            el.className = 'h-particle';
            el.textContent = text;
            el.style.top = `${5 + Math.random() * 85}%`;
            el.style.left = `${2 + Math.random() * 90}%`;
            el.style.animationDuration = `${7 + Math.random() * 9}s`;
            el.style.animationDelay = `-${Math.random() * 7}s`;
            wrap.appendChild(el);
        });
    };

    const clearIntervals = () => {
        if (msgInterval) window.clearInterval(msgInterval);
        if (stepInterval) window.clearInterval(stepInterval);
        if (livePollTimer) window.clearInterval(livePollTimer);
        msgInterval = null;
        stepInterval = null;
        livePollTimer = null;
    };

    const setLoading = (on) => {
        const loadingSection = document.getElementById('loading-section');
        const resultsSection = document.getElementById('results-section');
        setButtonLoading('check-btn', on);
        if (loadingSection) loadingSection.style.display = on ? 'block' : 'none';
        if (on && resultsSection) {
            resultsSection.style.display = 'none';
            ['checks-output', 'recos-output', 'inbox-output', 'results-header'].forEach((id) => {
                const el = document.getElementById(id);
                if (el) el.innerHTML = '';
            });
            stepIds.forEach((id) => {
                const step = document.getElementById(id);
                step?.classList.remove('active', 'done');
                const dot = step?.querySelector('.cs-dot');
                if (dot) dot.textContent = id.replace('step-', '').slice(0, 2).toUpperCase();
            });
            loadingSection?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
        if (!on) clearIntervals();
    };

    const updateLiveTestStatus = (label, copy) => {
        const status = document.getElementById('live-test-status');
        const note = document.getElementById('live-test-copy');
        if (status) status.textContent = label;
        if (note && copy) note.textContent = copy;
    };

    const showLiveTestPanel = (test) => {
        const panel = document.getElementById('live-test-panel');
        if (!panel) return;
        panel.hidden = false;
        document.getElementById('live-test-address').textContent = test.recipient_address;
        document.getElementById('live-test-subject').textContent = test.subject_line;
        updateLiveTestStatus('Waiting', test.instructions || 'Send the message to the generated address and keep this page open while we watch for it.');
    };

    const hideLiveTestPanel = () => {
        const panel = document.getElementById('live-test-panel');
        if (panel) panel.hidden = true;
    };

    const animateSteps = () => {
        let msgIndex = 0;
        let stepIndex = 0;
        const msgEl = document.getElementById('loading-msg');

        msgInterval = window.setInterval(() => {
            if (!msgEl) return;
            msgEl.style.opacity = '0';
            window.setTimeout(() => {
                msgEl.textContent = loadingMessages[msgIndex % loadingMessages.length];
                msgEl.style.opacity = '1';
                msgIndex += 1;
            }, 200);
        }, 1100);

        stepInterval = window.setInterval(() => {
            if (stepIndex > 0 && stepIndex - 1 < stepIds.length) {
                const previous = document.getElementById(stepIds[stepIndex - 1]);
                previous?.classList.remove('active');
                previous?.classList.add('done');
                const dot = previous?.querySelector('.cs-dot');
                if (dot) dot.innerHTML = icon('icon-check');
            }

            if (stepIndex < stepIds.length) {
                document.getElementById(stepIds[stepIndex])?.classList.add('active');
                stepIndex += 1;
            } else {
                clearIntervals();
            }
        }, 900);
    };

    const copyReport = async () => {
        if (!currentResult) return;
        const report = [
            'Email Deliverability Report — i2Medier',
            `Target: ${currentResult.input}`,
            `Score: ${currentResult.score}/100 (${currentResult.verdict})`,
            '',
            `Summary: ${currentResult.summary}`,
            '',
            `Tags: ${(currentResult.tags || []).join(', ')}`,
            '',
            'Stats:',
            `  Checks Passed: ${currentResult.stats?.checks_passed}`,
            `  Checks Failed: ${currentResult.stats?.checks_failed}`,
            `  Warnings: ${currentResult.stats?.checks_warned}`,
            `  Spam Score: ${currentResult.stats?.spam_score}/10`,
            '',
            'Checks:',
            ...(currentResult.checks || []).map((check) => `  [${check.status.toUpperCase()}] ${check.title} — ${check.detail || check.description}`),
            '',
            'Recommendations:',
            ...(currentResult.recommendations || []).map((rec, i) => `  ${i + 1}. [${String(rec.priority).toUpperCase()}] ${rec.title}\n     ${rec.fix || rec.description}`),
            '',
            'Generated by i2Medier Email Deliverability Checker',
        ].join('\n');

        await navigator.clipboard.writeText(report);
        toast('Report copied to clipboard!');
    };

    const renderResults = (result) => {
        const resultsSection = document.getElementById('results-section');
        if (!resultsSection) return;
        resultsSection.style.display = 'block';

        const scoreClass = verdictClass(result.verdict);
        const scoreColour = scoreClass === 'excellent' ? '#16a34a' : scoreClass === 'good' ? '#c8a96e' : scoreClass === 'poor' ? '#d97706' : '#dc2626';
        const scoreDash = 283 - (283 * (Number(result.score) / 100));
        const spamScore = result.stats?.spam_score ?? null;
        const spamClass = spamScore === null ? 'neutral' : Number(spamScore) <= 2 ? 'ok' : Number(spamScore) <= 5 ? 'warn' : 'err';
        const tagsHtml = (result.tags || []).map((tag) => {
            const lower = String(tag).toLowerCase();
            const klass = lower.includes('no ') || lower.includes('fail') || lower.includes('blacklist') ? 'tag-err'
                : lower.includes('warn') || lower.includes('missing') ? 'tag-warn'
                : lower.includes('valid') || lower.includes('pass') || lower.includes('enabled') ? 'tag-ok'
                : 'tag-info';
            return `<span class="si-tag ${klass}">${escapeHtml(tag)}</span>`;
        }).join('');

        document.getElementById('results-header').innerHTML = `
            <div class="score-hero">
                <div class="score-circle-wrap">
                    <svg class="score-svg" viewBox="0 0 100 100">
                        <circle class="score-track" cx="50" cy="50" r="45"></circle>
                        <circle class="score-ring ${scoreClass}" cx="50" cy="50" r="45" style="--target-dash:${scoreDash};stroke-dashoffset:${scoreDash}"></circle>
                    </svg>
                    <div class="score-num">
                        <div class="sn-val" style="color:${scoreColour}">${escapeHtml(result.score)}</div>
                        <div class="sn-label">Score</div>
                    </div>
                </div>
                <div class="score-info">
                    <div class="si-email">${escapeHtml(result.input)}</div>
                    <div class="si-verdict">${escapeHtml(result.summary)}</div>
                    <div class="si-tags">${tagsHtml}</div>
                </div>
                <div class="score-actions">
                    <button class="sa-btn" id="copy-report-btn" type="button">${icon('icon-copy')}Copy Report</button>
                    <button class="sa-btn" id="new-check-btn" type="button">${icon('icon-refresh')}New Check</button>
                </div>
            </div>
            <div class="summary-bar">
                <div class="sb-card"><div class="sb-icon">${icon('icon-check')}</div><div class="sb-val ok">${escapeHtml(result.stats?.checks_passed ?? '—')}</div><div class="sb-key">Checks Passed</div></div>
                <div class="sb-card"><div class="sb-icon">${icon('icon-alert')}</div><div class="sb-val err">${escapeHtml(result.stats?.checks_failed ?? '—')}</div><div class="sb-key">Checks Failed</div></div>
                <div class="sb-card"><div class="sb-icon">${icon('icon-info')}</div><div class="sb-val warn">${escapeHtml(result.stats?.checks_warned ?? '—')}</div><div class="sb-key">Warnings</div></div>
                <div class="sb-card"><div class="sb-icon">${icon('icon-mail')}</div><div class="sb-val ${spamClass}">${escapeHtml(result.stats?.spam_score ?? '—')}/10</div><div class="sb-key">Spam Score</div></div>
            </div>
        `;

        document.getElementById('checks-output').innerHTML = `
            <div class="section-heading">Detailed Checks <span class="sh-line"></span></div>
            <div class="checks-grid">
                ${(result.checks || []).map((check, index) => {
                    const badgeClass = check.status === 'pass' ? 'badge-pass' : check.status === 'warn' ? 'badge-warn' : check.status === 'fail' ? 'badge-fail' : 'badge-info';
                    const cardClass = check.status === 'pass' ? 'status-pass' : check.status === 'warn' ? 'status-warn' : check.status === 'fail' ? 'status-fail' : 'status-info';
                    const iconMap = { DNS: 'icon-globe', SPF: 'icon-shield', DKIM: 'icon-key', DMARC: 'icon-lock', Blacklist: 'icon-ban', Content: 'icon-file', Reputation: 'icon-star', Security: 'icon-lock' };
                    const barClass = check.status === 'pass' ? 'fill-ok' : check.status === 'warn' ? 'fill-warn' : 'fill-err';
                    const barWidth = Math.max(0, Math.min(100, 50 + Number(check.score_impact || 0) * 2));
                    return `
                        <div class="check-card ${cardClass}" style="animation-delay:${(index * 0.05).toFixed(2)}s">
                            <div class="cc-head">
                                <div class="cc-title-wrap">
                                    <span class="cc-icon">${icon(iconMap[check.category] || 'icon-info')}</span>
                                    <div>
                                        <div class="cc-title">${escapeHtml(check.title)}</div>
                                        <div class="cc-meta">${escapeHtml(check.category)}</div>
                                    </div>
                                </div>
                                <span class="cc-badge ${badgeClass}">${check.status === 'pass' ? '✓ Pass' : check.status === 'warn' ? '⚠ Warn' : check.status === 'fail' ? '✗ Fail' : 'ℹ Info'}</span>
                            </div>
                            <div class="cc-desc">${escapeHtml(check.description)}</div>
                            ${check.detail ? `<div class="cc-detail">${escapeHtml(check.detail)}</div>` : ''}
                            ${check.score_impact !== undefined ? `
                            <div class="cc-bar-wrap">
                                <div class="cc-bar-label">
                                    <span>Score Impact</span>
                                    <span style="color:${Number(check.score_impact) >= 0 ? 'var(--ok-dk)' : 'var(--err-dk)'}">${Number(check.score_impact) >= 0 ? '+' : ''}${escapeHtml(check.score_impact)}</span>
                                </div>
                                <div class="cc-bar-track"><div class="cc-bar-fill ${barClass}" style="--target-w:${barWidth}%"></div></div>
                            </div>` : ''}
                        </div>
                    `;
                }).join('')}
            </div>
        `;

        document.getElementById('recos-output').innerHTML = `
            <div class="section-heading">Action Plan <span class="sh-line"></span></div>
            <div class="reco-list">
                ${(result.recommendations || []).map((rec, index) => `
                    <div class="reco-item pri-${escapeHtml(rec.priority)}" style="animation-delay:${(index * 0.06).toFixed(2)}s">
                        <div class="ri-num ${escapeHtml(rec.priority)}">${index + 1}</div>
                        <div class="ri-body">
                            <div class="ri-title">${escapeHtml(rec.title)}</div>
                            <div class="ri-desc">${escapeHtml(rec.description)}</div>
                            ${rec.fix ? `<div class="ri-fix">${escapeHtml(rec.fix)}</div>` : ''}
                        </div>
                        <span class="cc-badge ${rec.priority === 'high' ? 'badge-fail' : rec.priority === 'med' ? 'badge-warn' : 'badge-pass'}" style="flex-shrink:0">${String(rec.priority).toUpperCase()}</span>
                    </div>
                `).join('')}
            </div>
        `;

        const preview = result.inbox_preview || {};
        const placement = preview.likely_placement || 'inbox';
        const placementClass = placement === 'spam' ? 'label-spam' : placement === 'promotions' ? 'label-promo' : 'label-inbox';
        const initials = String(preview.from_name || 'EM').split(' ').map((part) => part[0]).slice(0, 2).join('').toUpperCase();

        const placementLabel = placement === 'inbox' ? 'Inbox' : placement === 'spam' ? '🚨 Spam' : '📣 Promotions';
        const placementTitle = placement === 'spam' ? 'Likely Spam Folder' : placement === 'promotions' ? 'Promotions Tab' : 'Primary Inbox';

        document.getElementById('inbox-output').innerHTML = `
            <div class="section-heading">Inbox Preview <span class="sh-line"></span></div>
            <div class="inbox-preview">
                <div class="ip-header">
                    <div class="ip-dots">
                        <div class="ip-dot" style="background:#ff5f57"></div>
                        <div class="ip-dot" style="background:#febc2e"></div>
                        <div class="ip-dot" style="background:#28c840"></div>
                    </div>
                    <div class="ip-title">Inbox Simulation — ${placementTitle}</div>
                </div>
                <div class="ip-body">
                    <div class="ip-row" style="opacity:.35">
                        <div class="ip-avatar" style="background:#1e293b">SN</div>
                        <div class="ip-content">
                            <div class="ip-from">Support Newsletter <span class="ip-time">2d</span></div>
                            <div class="ip-subject">Your weekly digest is ready</div>
                            <div class="ip-preview-text">Here's what happened this week in your account…</div>
                        </div>
                    </div>
                    <div class="ip-row selected">
                        <div class="ip-avatar">${escapeHtml(initials)}</div>
                        <div class="ip-content">
                            <div class="ip-from">${escapeHtml(preview.from_name || '')} &lt;${escapeHtml(preview.from_address || '')}&gt; <span class="ip-time">Just now</span></div>
                            <div class="ip-subject ${placement === 'spam' ? 'spam-likely' : ''}">${escapeHtml(preview.subject || '')}</div>
                            <div class="ip-preview-text">${escapeHtml(preview.preview_text || '')}</div>
                        </div>
                        <span class="ip-label ${placementClass}">${placementLabel}</span>
                    </div>
                    <div class="ip-row" style="opacity:.35">
                        <div class="ip-avatar" style="background:#3b1f6e;color:#c4b5fd">AM</div>
                        <div class="ip-content">
                            <div class="ip-from">Account Manager <span class="ip-time">3d</span></div>
                            <div class="ip-subject">Follow-up on your recent enquiry</div>
                            <div class="ip-preview-text">I wanted to touch base about the proposal we sent…</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="placement-note"><strong>📍 Placement Prediction:</strong> ${escapeHtml(preview.placement_reason || '')}</div>
        `;

        document.getElementById('copy-report-btn')?.addEventListener('click', copyReport);
        document.getElementById('new-check-btn')?.addEventListener('click', () => {
            document.getElementById('email-input')?.focus();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    };

    const buildPayload = () => ({
        input: document.getElementById('email-input')?.value.trim() ?? '',
        checkType: activeValue('check-type-group') || 'full',
        clientTarget: activeValue('client-group') || 'all',
        esp: activeValue('esp-group') || 'unknown',
        volume: activeValue('volume-group') || 'low',
        sendingDomain: document.getElementById('adv-domain')?.value.trim() ?? '',
        subject: document.getElementById('adv-subject')?.value.trim() ?? '',
    });

    const validateForMode = (payload, mode) => {
        if (!payload.input) {
            toast(mode === 'live' ? 'Please enter the sender email address.' : 'Please enter an email address or domain.');
            document.getElementById('email-input')?.focus();
            return false;
        }

        if (mode === 'live' && !looksLikeEmail(payload.input)) {
            toast('Live inbox tests require a real sender email address.');
            document.getElementById('email-input')?.focus();
            return false;
        }

        return true;
    };

    const runCheck = async () => {
        const payload = buildPayload();

        if (!validateForMode(payload, 'basic')) {
            return;
        }

        setLoading(true);
        animateSteps();

        try {
            const response = await fetch(generateRoute, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(payload),
            });

            const data = await response.json();
            if (!response.ok) {
                throw new Error(data.message || 'Analysis failed.');
            }

            currentResult = { ...data.report, input: payload.input, timestamp: Date.now(), provider: data.provider };
            saveToHistory(currentResult);
            renderResults(currentResult);
            setLoading(false);
            document.getElementById('results-section')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } catch (error) {
            setLoading(false);
            toast(error.message || 'Analysis failed — please try again.');
        }
    };

    const pollLiveTest = () => {
        if (!liveTestId) return;

        livePollTimer = window.setInterval(async () => {
            try {
                const response = await fetch(livePollRoute, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ testId: liveTestId }),
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Could not read the live inbox test.');
                }

                if (data.status !== 'completed') {
                    updateLiveTestStatus('Watching inbox', 'We are still waiting for the test email to arrive in the configured mailbox.');
                    return;
                }

                clearIntervals();
                setButtonLoading('check-btn', false);
                currentResult = { ...data.report, input: liveTestInput, timestamp: Date.now(), provider: data.provider };
                saveToHistory(currentResult);
                renderResults(currentResult);
                updateLiveTestStatus('Received', 'The test email arrived and the live headers were analysed successfully.');
                document.getElementById('results-section')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } catch (error) {
                clearIntervals();
                setButtonLoading('check-btn', false);
                updateLiveTestStatus('Stopped', error.message || 'The live inbox test stopped unexpectedly.');
                toast(error.message || 'The live inbox test failed.');
            }
        }, 5000);
    };

    const startLiveCheck = async () => {
        const payload = buildPayload();

        if (!validateForMode(payload, 'live')) {
            return;
        }

        setButtonLoading('check-btn', true);
        hideLiveTestPanel();
        clearIntervals();

        try {
            const response = await fetch(liveStartRoute, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify(payload),
            });

            const data = await response.json();
            if (!response.ok) {
                throw new Error(data.message || 'Could not start the live inbox test.');
            }

            liveTestId = data.test.id;
            liveTestInput = payload.input;
            showLiveTestPanel(data.test);
            pollLiveTest();
        } catch (error) {
            setButtonLoading('check-btn', false);
            toast(error.message || 'Could not start the live inbox test.');
        }
    };

    setupPillGroup('audit-mode-group');
    setupPillGroup('check-type-group');
    setupPillGroup('client-group');
    setupPillGroup('esp-group');
    setupPillGroup('volume-group');
    syncModeUi();
    renderHistoryGrid();
    spawnParticles();

    document.getElementById('adv-toggle')?.addEventListener('click', () => {
        document.getElementById('adv-toggle')?.classList.toggle('open');
        document.getElementById('adv-section')?.classList.toggle('open');
    });

    document.getElementById('history-toggle')?.addEventListener('click', () => {
        document.getElementById('history-panel')?.classList.toggle('visible');
    });

    document.getElementById('history-clear')?.addEventListener('click', () => {
        if (!window.confirm('Clear all check history?')) return;
        history = [];
        localStorage.setItem(historyStorageKey, '[]');
        renderHistoryGrid();
    });

    document.getElementById('history-grid')?.addEventListener('click', (event) => {
        const item = event.target.closest('[data-history-index]');
        if (!item) return;
        const index = Number(item.getAttribute('data-history-index'));
        const selected = history[index];
        if (!selected) return;
        document.getElementById('email-input').value = selected.input;
        document.getElementById('history-panel')?.classList.remove('visible');
        toast(`Loaded: ${selected.input}`);
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    document.getElementById('audit-mode-group')?.addEventListener('click', (event) => {
        if (!event.target.closest('.pill')) return;
        syncModeUi();
    });

    document.getElementById('check-btn')?.addEventListener('click', () => {
        if ((activeValue('audit-mode-group') || 'basic') === 'live') {
            startLiveCheck();
            return;
        }

        runCheck();
    });
    document.getElementById('copy-live-address')?.addEventListener('click', async () => {
        const value = document.getElementById('live-test-address')?.textContent?.trim();
        if (!value) return;
        await navigator.clipboard.writeText(value);
        toast('Live test address copied.');
    });
    document.getElementById('copy-live-subject')?.addEventListener('click', async () => {
        const value = document.getElementById('live-test-subject')?.textContent?.trim();
        if (!value) return;
        await navigator.clipboard.writeText(value);
        toast('Live test subject copied.');
    });
    document.getElementById('email-input')?.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            event.preventDefault();
            if ((activeValue('audit-mode-group') || 'basic') === 'live') {
                startLiveCheck();
                return;
            }

            runCheck();
        }
    });
}
