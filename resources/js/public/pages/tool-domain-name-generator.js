const page = document.getElementById('domain-name-generator-page');

if (page) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const generateRoute = page.dataset.generateRoute || '';
    const honeypotField = page.dataset.honeypotField || 'company_website';
    const honeypotTimeField = page.dataset.honeypotTimeField || 'form_started_at';
    const honeypotStartedAt = page.dataset.honeypotStartedAt || '';
    let allDomains = [];
    let savedDomains = JSON.parse(localStorage.getItem('i2m_dom_saved') || '[]');
    let currentFilter = 'all';

    const LOADING_MSGS = [
        'Scanning the domain universe…',
        'Testing pronounceability and recall…',
        'Checking linguistic patterns…',
        'Mining short, memorable combinations…',
        'Filtering for brandability…',
        'Aligning with your target market…',
        'Selecting the strongest candidates…',
        'Preparing your shortlist…',
    ];

    window.addEventListener('DOMContentLoaded', () => {
        setupPills();
        spawnBgDomains();
        animateUrlBar();
        updateFavCount();
        renderFavGrid();
    });

    function setupPills() {
        document.getElementById('tld-group')?.addEventListener('click', (event) => {
            const pill = event.target.closest('.pill');
            if (pill) pill.classList.toggle('active');
        });

        ['style-group', 'length-group'].forEach((groupId) => {
            document.getElementById(groupId)?.addEventListener('click', (event) => {
                const pill = event.target.closest('.pill');
                if (!pill) return;
                document.querySelectorAll(`#${groupId} .pill`).forEach((item) => item.classList.remove('active'));
                pill.classList.add('active');
            });
        });
    }

    function spawnBgDomains() {
        const samples = [['nexforge', 'com'], ['verda', 'io'], ['kalahari', 'ng'], ['swifthub', 'co'], ['tradelink', 'app'], ['orisun', 'ng'], ['lumora', 'io'], ['boldroot', 'co'], ['apexia', 'com'], ['trackr', 'co.ng'], ['brandify', 'tech'], ['paysync', 'ai'], ['nexora', 'co'], ['growthng', 'com'], ['zestmarket', 'co']];
        const wrap = document.getElementById('hero-domains');
        if (!wrap) return;
        samples.forEach(([name, tld]) => {
            const el = document.createElement('div');
            el.className = 'hero-domain-pill';
            el.innerHTML = `<span class="hdp-name">${name}</span><span class="hdp-tld">.${tld}</span>`;
            el.style.cssText = `top:${5 + Math.random() * 87}%;left:${2 + Math.random() * 90}%;font-size:${14 + Math.random() * 20}px;animation-duration:${6 + Math.random() * 9}s;animation-delay:-${Math.random() * 7}s`;
            wrap.appendChild(el);
        });
    }

    const demoNames = [['yourbrand', 'com'], ['nexforge', 'ng'], ['swifthub', 'io'], ['verda', 'co'], ['trackr', 'app'], ['apexia', 'com'], ['orisun', 'co.ng'], ['lumora', 'ai']];
    let demoIdx = 0;
    function animateUrlBar() {
        const nameEl = document.getElementById('hud-name');
        const tldEl = document.getElementById('hud-tld');
        if (!nameEl || !tldEl) return;
        nameEl.style.transition = 'opacity .3s';
        tldEl.style.transition = 'opacity .3s';

        window.setInterval(() => {
            nameEl.style.opacity = '0';
            tldEl.style.opacity = '0';
            window.setTimeout(() => {
                const [name, tld] = demoNames[demoIdx % demoNames.length];
                demoIdx += 1;
                nameEl.textContent = name;
                tldEl.textContent = '.' + tld;
                nameEl.style.opacity = '1';
                tldEl.style.opacity = '1';
            }, 300);
        }, 2200);
    }

    async function postJson(payload) {
        const response = await fetch(generateRoute, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify(payload),
            signal: AbortSignal.timeout(70000),
        });

        let data = null;
        try {
            data = await response.json();
        } catch {}

        if (!response.ok) {
            throw new Error(data?.message || 'Domain generation failed.');
        }

        return data;
    }

    window.generateDomains = async function generateDomains() {
        const desc = document.getElementById('biz-desc')?.value.trim() || '';
        if (!desc) {
            document.getElementById('biz-desc')?.focus();
            toast('Please describe your business first.');
            return;
        }

        const selectedTLDs = [...document.querySelectorAll('#tld-group .pill.active')].map((pill) => pill.dataset.val);
        if (selectedTLDs.length === 0) {
            toast('Please select at least one TLD (.com, .ng, etc.)');
            return;
        }

        const style = document.querySelector('#style-group .pill.active')?.dataset.val || 'Any';
        const maxLength = document.querySelector('#length-group .pill.active')?.dataset.val || 'any';
        const keywords = document.getElementById('keywords')?.value.trim() || '';
        const mustInclude = document.getElementById('must-include')?.value.trim() || '';

        setLoading(true);
        let msgIdx = 0;
        const msgTimer = window.setInterval(() => {
            const el = document.getElementById('loading-msg');
            if (el) el.textContent = LOADING_MSGS[msgIdx++ % LOADING_MSGS.length];
        }, 1800);

        try {
            const data = await postJson({
                [honeypotField]: '',
                [honeypotTimeField]: honeypotStartedAt,
                description: desc,
                tlds: selectedTLDs,
                style,
                maxLength,
                keywords,
                mustInclude,
            });

            allDomains = (Array.isArray(data.domains) ? data.domains : []).sort((a, b) => (b.score || 0) - (a.score || 0));
            if (allDomains.length === 0) {
                throw new Error('No domain suggestions were returned.');
            }
            renderResults(allDomains);
        } catch (error) {
            allDomains = [];
            document.getElementById('results-section').style.display = 'block';
            document.getElementById('domain-grid').innerHTML = `<div class="empty-state"><div class="empty-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M9 10h.01"/><path d="M15 10h.01"/><path d="M9 16c.9-.8 1.9-1.2 3-1.2s2.1.4 3 1.2"/></svg></div><div class="empty-title">Something went wrong</div><div class="empty-desc">${esc(error?.message || 'We could not generate domain names right now. Please try again.')}</div></div>`;
        } finally {
            window.clearInterval(msgTimer);
            setLoading(false);
        }
    };

    function renderResults(domains) {
        document.getElementById('res-count').textContent = String(domains.length);
        const tlds = [...new Set(domains.map((domain) => domain.tld).filter(Boolean))];
        const types = [...new Set(domains.map((domain) => domain.type).filter(Boolean))];

        document.getElementById('tld-filters').innerHTML = tlds.map((tld) => `<div class="fp" data-filter="${esc(tld)}" onclick="applyFilter('${jsEsc(tld)}', this)">${esc(tld)}</div>`).join('');
        document.getElementById('type-filters').innerHTML = types.map((type) => `<div class="fp" data-filter="${esc(type)}" onclick="applyFilter('${jsEsc(type)}', this)">${esc(type)}</div>`).join('');
        document.querySelector('.fp[data-filter="all"]')?.classList.add('active');

        document.getElementById('domain-grid').innerHTML = domains.map((domain, index) => buildCard(domain, index)).join('');
        document.getElementById('results-section').style.display = 'block';
        animateScores();
        window.setTimeout(() => document.getElementById('results-section')?.scrollIntoView({ behavior: 'smooth', block: 'start' }), 100);
    }

    function buildCard(domain, idx) {
        const isSaved = savedDomains.some((saved) => saved.full === domain.full);
        const typeClass = 'type-' + String(domain.type || 'brandable').toLowerCase().replace(/[^a-z]/g, '').replace('keywordrich', 'keyword').replace('exactmatch', 'exact');
        const lengthClass = domain.length <= 7 ? 'len-short' : domain.length <= 12 ? 'len-medium' : 'len-long';
        const lengthLabel = domain.length <= 7 ? 'Short' : domain.length <= 12 ? 'Medium' : 'Long';
        const scoreColor = (domain.score || 0) >= 80 ? '#16a34a' : (domain.score || 0) >= 60 ? '#c8a96e' : '#dc2626';
        const circumference = 125.66;
        const offset = circumference * (1 - Math.min(100, domain.score || 0) / 100);
        const altTlds = Array.isArray(domain.altTLDs) ? domain.altTLDs.slice(0, 4) : [];
        const delay = idx * 0.055;

        return `<div class="domain-card ${isSaved ? 'saved' : ''}" id="dc-${idx}" data-tld="${esc(domain.tld || '')}" data-type="${esc(domain.type || '')}" data-score="${domain.score || 0}" data-length="${domain.length || 0}" data-name="${esc(domain.full || '')}" style="animation-delay:${delay}s">
            <div class="dc-score" title="Domain strength: ${domain.score || 0}/100">
                <svg viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg">
                    <circle class="dc-score-bg" cx="22" cy="22" r="20"></circle>
                    <circle class="dc-score-fg" cx="22" cy="22" r="20" stroke="${scoreColor}" stroke-dasharray="${circumference}" stroke-dashoffset="${circumference}" data-offset="${offset}" data-score-fg></circle>
                </svg>
                <div class="dc-score-inner">
                    <div class="dc-score-num">${domain.score || 0}</div>
                    <div class="dc-score-lbl">Score</div>
                </div>
            </div>
            <span class="dc-type ${typeClass}">${esc(domain.type || 'Brandable')}</span>
            <div class="dc-url-bar">
                <span class="dc-url-lock ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 0 1 8 0v3"/></svg></span>
                <div class="dc-url-text"><span class="dc-url-name">${esc(domain.domain || '')}</span><span class="dc-url-tld">${esc(domain.tld || '')}</span></div>
                <span class="dc-url-copy-icon ui-icon" onclick="copyDomain('${jsEsc(domain.full || '')}', event)" title="Copy domain" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="9" y="9" width="11" height="11" rx="2"/><path d="M6 15H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1"/></svg></span>
            </div>
            <div class="dc-meta">
                <span class="dc-length-badge ${lengthClass}">${lengthLabel} · ${domain.length || 0} chars</span>
                ${(domain.tags || []).slice(0, 2).map((tag) => `<span class="dc-meta-item">${esc(tag)}</span>`).join('')}
            </div>
            ${(domain.tags || []).length > 2 ? `<div class="dc-tags">${(domain.tags || []).slice(2).map((tag) => `<span class="dc-tag">${esc(tag)}</span>`).join('')}</div>` : ''}
            <div class="dc-explanation">${esc(domain.explanation || '')}</div>
            ${domain.isHack && domain.hackNote ? `<div class="dc-hack-note"><div class="dc-hack-note-label">Domain Hack</div>${esc(domain.hackNote)}</div>` : ''}
            ${altTlds.length > 0 ? `<div class="dc-alt-tlds"><span class="dc-alt-label">Also:</span>${altTlds.map((tld) => `<span class="dc-tld-pill ${getTLDPillClass(tld)}" onclick="checkDomain('${jsEsc(domain.domain || '')}','${jsEsc(tld)}')">${esc((domain.domain || '') + tld)}</span>`).join('')}</div>` : ''}
            ${buildStrengthBar(domain.score || 0)}
            <div class="dc-actions">
                <button class="dc-btn copy-btn" id="copy-btn-${idx}" type="button" onclick="copyDomain('${jsEsc(domain.full || '')}', event, ${idx})"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="9" y="9" width="11" height="11" rx="2"/><path d="M6 15H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1"/></svg></span><span>Copy</span></button>
                <button class="dc-btn save-btn ${isSaved ? 'saved' : ''}" id="save-btn-${idx}" type="button" onclick="toggleSave(${idx}, this)"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 20s-7-4.35-7-10a4 4 0 0 1 7-2.65A4 4 0 0 1 19 10c0 5.65-7 10-7 10z"/></svg></span><span>${isSaved ? 'Saved' : 'Save'}</span></button>
                <a class="dc-btn reg-btn reg-namecheap" href="https://www.namecheap.com/domains/registration/results/?domain=${encodeURIComponent(domain.full || '')}" target="_blank" rel="noopener">Namecheap ↗</a>
                <a class="dc-btn reg-btn reg-godaddy" href="https://www.godaddy.com/domainsearch/find?domainToCheck=${encodeURIComponent(domain.full || '')}" target="_blank" rel="noopener">GoDaddy ↗</a>
            </div>
        </div>`;
    }

    function buildStrengthBar(score) {
        const bars = 5;
        const filled = Math.round((score / 100) * bars);
        const color = score >= 80 ? '#16a34a' : score >= 60 ? '#c8a96e' : '#dc2626';
        const heights = [8, 11, 14, 17, 20];
        return `<div class="dc-strength"><span class="ds-label">Strength</span><div class="ds-bars">${Array.from({ length: bars }, (_, index) => `<div class="ds-bar" style="height:${heights[index]}px;background:${index < filled ? color : 'var(--g200)'}"></div>`).join('')}</div></div>`;
    }

    function getTLDPillClass(tld) {
        const map = { '.com': 'tld-com-pill', '.co': 'tld-co-pill', '.io': 'tld-io-pill', '.ng': 'tld-ng-pill', '.co.ng': 'tld-ng-pill', '.com.ng': 'tld-ng-pill', '.ai': 'tld-ai-pill', '.app': 'tld-app-pill', '.tech': 'tld-tech-pill' };
        return map[tld] || 'tld-other-pill';
    }

    function animateScores() {
        document.querySelectorAll('[data-score-fg]').forEach((circle) => {
            const offset = parseFloat(circle.dataset.offset);
            window.setTimeout(() => {
                circle.style.strokeDashoffset = offset;
            }, 200);
        });
    }

    window.checkDomain = function checkDomain(name, tld) {
        const full = name + tld;
        window.open(`https://www.namecheap.com/domains/registration/results/?domain=${encodeURIComponent(full)}`, '_blank');
    };

    window.applyFilter = function applyFilter(value, btn) {
        currentFilter = value;
        document.querySelectorAll('.fp').forEach((pill) => pill.classList.remove('active'));
        btn.classList.add('active');
        document.querySelectorAll('.domain-card').forEach((card) => {
            const match = value === 'all' || card.dataset.tld === value || card.dataset.type === value;
            card.classList.toggle('filtered-out', !match);
        });
    };

    window.applySort = function applySort() {
        const sortBy = document.getElementById('sort-select').value;
        const grid = document.getElementById('domain-grid');
        const cards = [...grid.querySelectorAll('.domain-card')];
        cards.sort((a, b) => {
            if (sortBy === 'score') return parseInt(b.dataset.score, 10) - parseInt(a.dataset.score, 10);
            if (sortBy === 'length') return parseInt(a.dataset.length, 10) - parseInt(b.dataset.length, 10);
            if (sortBy === 'alpha') return a.dataset.name.localeCompare(b.dataset.name);
            return 0;
        });
        cards.forEach((card) => grid.appendChild(card));
        animateScores();
    };

    window.copyDomain = function copyDomain(domain, event, idx = null) {
        event?.preventDefault();
        const button = idx === null ? null : document.getElementById(`copy-btn-${idx}`);
        navigator.clipboard.writeText(domain).then(() => {
            if (!button) {
                toast(`Copied ${domain}`);
                return;
            }
            const label = button.querySelector('span:last-child');
            if (label) label.textContent = 'Copied';
            button.classList.add('copied');
            window.setTimeout(() => {
                const resetLabel = button.querySelector('span:last-child');
                if (resetLabel) resetLabel.textContent = 'Copy';
                button.classList.remove('copied');
            }, 2000);
        }).catch(() => toast('Could not copy. Please copy manually.'));
    };

    window.toggleSave = function toggleSave(idx, btn) {
        const domain = allDomains[idx];
        if (!domain) return;
        const existingIndex = savedDomains.findIndex((item) => item.full === domain.full);
        const card = document.getElementById(`dc-${idx}`);

        if (existingIndex !== -1) {
            savedDomains.splice(existingIndex, 1);
            const label = btn.querySelector('span:last-child');
            if (label) label.textContent = 'Save';
            btn.classList.remove('saved');
            card?.classList.remove('saved');
            toast(`"${domain.full}" removed from saved domains.`);
        } else {
            savedDomains.push({ full: domain.full, tld: domain.tld, type: domain.type });
            const label = btn.querySelector('span:last-child');
            if (label) label.textContent = 'Saved';
            btn.classList.add('saved');
            card?.classList.add('saved');
            toast(`"${domain.full}" saved.`);
        }

        localStorage.setItem('i2m_dom_saved', JSON.stringify(savedDomains));
        updateFavCount();
        renderFavGrid();
    };

    window.toggleFavPanel = function toggleFavPanel() {
        const panel = document.getElementById('fav-panel');
        panel?.classList.toggle('visible');
        if (panel?.classList.contains('visible')) {
            renderFavGrid();
            panel.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    };

    function renderFavGrid() {
        const grid = document.getElementById('fav-grid');
        if (!grid) return;
        if (savedDomains.length === 0) {
            grid.innerHTML = '<div class="fav-empty">No saved domains yet — use Save on any domain card to keep it here.</div>';
            return;
        }

        grid.innerHTML = savedDomains.map((domain, index) => `
            <div class="fav-item">
                <div class="fi-domain">${esc((domain.full || '').replace(domain.tld || '', ''))}<span>${esc(domain.tld || '')}</span></div>
                <div class="fi-type">${esc(domain.type || 'Saved')}</div>
                <button class="fi-remove" type="button" onclick="removeFav(${index})" title="Remove">✕</button>
            </div>
        `).join('');
    }

    window.removeFav = function removeFav(idx) {
        savedDomains.splice(idx, 1);
        localStorage.setItem('i2m_dom_saved', JSON.stringify(savedDomains));
        updateFavCount();
        renderFavGrid();
    };

    window.clearFavs = function clearFavs() {
        if (!window.confirm('Clear all saved domains?')) return;
        savedDomains = [];
        localStorage.setItem('i2m_dom_saved', JSON.stringify(savedDomains));
        updateFavCount();
        renderFavGrid();
    };

    window.copyAllFavs = function copyAllFavs() {
        if (savedDomains.length === 0) {
            toast('No saved domains to copy yet.');
            return;
        }
        navigator.clipboard.writeText(savedDomains.map((domain) => domain.full).join('\n')).then(() => {
            toast('Saved domains copied.');
        }).catch(() => toast('Could not copy saved domains.'));
    };

    function updateFavCount() {
        const count = document.getElementById('fav-count');
        if (count) count.textContent = String(savedDomains.length);
    }

    function setLoading(on) {
        const btn = document.getElementById('gen-btn');
        btn?.classList.toggle('loading', on);
        if (btn) btn.disabled = on;
        document.getElementById('loading-section').style.display = on ? 'block' : 'none';
        if (on) {
            buildSkeletons();
            document.getElementById('results-section').style.display = 'none';
            document.getElementById('loading-section')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function buildSkeletons() {
        document.getElementById('skeleton-grid').innerHTML = Array(6).fill(0).map(() => `
            <div class="skeleton-card">
                <div class="skel skel-url"></div>
                <div class="skel skel-badge"></div>
                <div class="skel skel-text"></div>
                <div class="skel skel-text m"></div>
                <div class="skel skel-tags">
                    <div class="skel skel-tag"></div>
                    <div class="skel skel-tag"></div>
                    <div class="skel skel-tag"></div>
                </div>
                <div class="skel skel-text"></div>
                <div class="skel skel-text m"></div>
                <div class="skel skel-text s"></div>
            </div>
        `).join('');
    }

    function toast(message, duration = 3000) {
        const el = document.getElementById('toast');
        if (!el) return;
        el.textContent = message;
        el.classList.add('show');
        window.setTimeout(() => el.classList.remove('show'), duration);
    }

    function esc(value) {
        return String(value || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#39;');
    }

    function jsEsc(value) {
        return String(value || '').replace(/\\/g, '\\\\').replace(/'/g, "\\'");
    }
}
