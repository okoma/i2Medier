import { initFaqButtons } from './service-common.js';
initFaqButtons('.faq-q');

const page = document.getElementById('business-name-generator-page');

if (page) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const generateRoute = page.dataset.generateRoute || '';
    const variationsRoute = page.dataset.variationsRoute || '';
    const honeypotField = page.dataset.honeypotField || 'company_website';
    const honeypotTimeField = page.dataset.honeypotTimeField || 'form_started_at';
    const honeypotStartedAt = page.dataset.honeypotStartedAt || '';
    let allNames = [];
    let favorites = JSON.parse(localStorage.getItem('i2m_bng_favs') || '[]');

    const LOADING_MSGS = [
        'Mining creative gold from your brief…',
        'Consulting the brand muses…',
        'Crafting names that resonate…',
        'Checking linguistic rhythm and flow…',
        'Forging your brand identity…',
        'Testing names against the market…',
        'Distilling your essence into words…',
        'Almost there — polishing the gems…',
    ];

    window.addEventListener('DOMContentLoaded', () => {
        setupPillGroups();
        spawnBubbles();
        updateFavCount();
    });

    document.getElementById('biz-desc')?.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault();
            window.generateNames();
        }
    });

    function setupPillGroups() {
        document.getElementById('style-group')?.addEventListener('click', (event) => {
            const pill = event.target.closest('.pill');
            if (!pill) return;
            pill.classList.toggle('active');
        });

        ['length-group', 'market-group'].forEach((groupId) => {
            document.getElementById(groupId)?.addEventListener('click', (event) => {
                const pill = event.target.closest('.pill');
                if (!pill) return;
                document.querySelectorAll(`#${groupId} .pill`).forEach((item) => item.classList.remove('active'));
                pill.classList.add('active');
            });
        });
    }

    function spawnBubbles() {
        const names = ['NexForge', 'Verdanex', 'Apexia', 'Lumora', 'SwiftHive', 'BoldRoot', 'TrustFlow', 'Kalahari', 'IgniteNg', 'Orisun', 'Prowess', 'Stratum', 'Veloria', 'ZenithCo', 'Nexora'];
        const wrap = document.getElementById('hero-bubbles');
        if (!wrap) return;
        names.forEach((name) => {
            const el = document.createElement('div');
            el.className = 'hero-bubble';
            el.textContent = name;
            const size = 18 + Math.random() * 28;
            el.style.cssText = `font-size:${size}px;top:${5 + Math.random() * 85}%;left:${2 + Math.random() * 90}%;animation-duration:${6 + Math.random() * 8}s;animation-delay:-${Math.random() * 6}s;`;
            wrap.appendChild(el);
        });
    }

    async function postJson(url, payload, timeoutMs, label) {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify(payload),
            signal: AbortSignal.timeout(timeoutMs),
        });

        let data = null;
        try {
            data = await response.json();
        } catch {}

        if (!response.ok) {
            const message = data?.message || `${label} failed.`;
            throw new Error(message);
        }

        return data;
    }

    window.generateNames = async function generateNames() {
        const desc = document.getElementById('biz-desc')?.value.trim() || '';
        if (!desc) {
            document.getElementById('biz-desc')?.focus();
            toast('Please describe your business first.');
            return;
        }

        const styles = [...document.querySelectorAll('#style-group .pill.active')].map((pill) => pill.dataset.val);
        const length = document.querySelector('#length-group .pill.active')?.dataset.val || 'any';
        const market = document.querySelector('#market-group .pill.active')?.dataset.val || 'Nigeria';
        const keywords = document.getElementById('keywords')?.value.trim() || '';
        const avoid = document.getElementById('avoid-words')?.value.trim() || '';

        setLoading(true);
        let msgIdx = 0;
        const msgInterval = window.setInterval(() => {
            const loadingMsg = document.getElementById('loading-msg');
            if (loadingMsg) {
                loadingMsg.textContent = LOADING_MSGS[msgIdx % LOADING_MSGS.length];
            }
            msgIdx += 1;
        }, 1800);

        try {
            const data = await postJson(generateRoute, {
                [honeypotField]: '',
                [honeypotTimeField]: honeypotStartedAt,
                description: desc,
                styles,
                length,
                market,
                keywords,
                avoid,
            }, 70000, 'Business name generation');

            allNames = Array.isArray(data.names) ? data.names : [];
            if (allNames.length === 0) {
                throw new Error('No business names were returned.');
            }
            renderResults(allNames);
        } catch (error) {
            allNames = [];
            renderError(error?.message || 'We could not generate names right now. Please try again.');
        } finally {
            window.clearInterval(msgInterval);
            setLoading(false);
        }
    };

    function renderResults(names) {
        const grid = document.getElementById('names-grid');
        const countBadge = document.getElementById('results-count-badge');
        const styleFilters = document.getElementById('style-filters');
        if (!grid || !countBadge || !styleFilters) return;

        countBadge.textContent = String(names.length);
        const styles = [...new Set(names.map((item) => item.style).filter(Boolean))];
        styleFilters.innerHTML = styles.map((style) => `<div class="filter-pill" data-filter="${esc(style)}" onclick="filterResults('${jsEsc(style)}', this)">${esc(style)}</div>`).join('');
        document.querySelector('.filter-pill[data-filter="all"]')?.classList.add('active');
        grid.innerHTML = names.map((name, index) => buildCard(name, index)).join('');
        document.getElementById('results-section').style.display = 'block';
        window.setTimeout(() => document.getElementById('results-section')?.scrollIntoView({ behavior: 'smooth', block: 'start' }), 100);
    }

    function buildCard(name, idx) {
        const isFav = favorites.some((favorite) => favorite.name === name.name);
        const styleClass = 'style-' + String(name.style || 'modern').toLowerCase();
        const delay = idx * 0.06;
        const domains = buildDomains(name.name, name.domain);
        const personality = Array.isArray(name.personality) ? name.personality.slice(0, 3) : [];

        return `<div class="name-card ${isFav ? 'favorited' : ''}" id="card-${idx}" data-style="${esc(name.style || '')}" style="animation-delay:${delay}s">
            <span class="nc-style-badge ${styleClass}">${esc(name.style || 'Creative')}</span>
            <div class="nc-name">${esc(name.name)}</div>
            <div class="nc-tagline">"${esc(name.tagline || '')}"</div>
            ${personality.length > 0 ? `<div class="nc-tags">${personality.map((item) => `<span class="nc-tag">${esc(item)}</span>`).join('')}</div>` : ''}
            <div class="nc-explanation">${esc(name.explanation || '')}</div>
            <div class="nc-domains">${domains}</div>
            <div class="nc-actions">
                <button class="nc-action-btn copy-btn" type="button" onclick="copyName('${jsEsc(name.name)}', this)"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="9" y="9" width="11" height="11" rx="2"/><path d="M6 15H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1"/></svg></span><span>Copy</span></button>
                <button class="nc-action-btn fav-btn ${isFav ? 'active' : ''}" type="button" onclick="toggleFav(${idx}, this)"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 20s-7-4.35-7-10a4 4 0 0 1 7-2.65A4 4 0 0 1 19 10c0 5.65-7 10-7 10z"/></svg></span><span>${isFav ? 'Saved' : 'Save'}</span></button>
                <button class="nc-action-btn vars-btn" type="button" onclick="toggleVariations(${idx}, this, '${jsEsc(name.name)}', '${jsEsc(name.tagline || '')}')"><span class="ui-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M17 3h4v4"/><path d="M21 3l-7 7"/><path d="M7 21H3v-4"/><path d="M3 21l7-7"/></svg></span><span>Variations</span></button>
            </div>
            <div class="nc-variations" id="variations-${idx}">
                <div class="nc-var-label">Name variations</div>
            </div>
        </div>`;
    }

    function buildDomains(name, suggestedDomain) {
        const clean = String(name || '').toLowerCase().replace(/[^a-z0-9]/g, '');
        const domains = [];
        if (suggestedDomain) domains.push(suggestedDomain);
        ['.com', '.co', '.io', '.co.ng', '.ng'].forEach((ext) => {
            const domain = clean + ext;
            if (!domains.includes(domain)) domains.push(domain);
        });

        return domains.slice(0, 4).map((domain) => {
            const firstDot = domain.indexOf('.');
            const base = firstDot === -1 ? domain : domain.slice(0, firstDot);
            const ext = firstDot === -1 ? '' : domain.slice(firstDot);
            const url = `https://www.namecheap.com/domains/registration/results/?domain=${encodeURIComponent(domain)}`;
            return `<a class="nc-domain" href="${url}" target="_blank" rel="noopener" title="Check ${esc(domain)} availability">${esc(base)}<span class="nd-ext">${esc(ext)}</span></a>`;
        }).join('');
    }

    window.filterResults = function filterResults(style, btn) {
        document.querySelectorAll('.filter-pill').forEach((pill) => pill.classList.remove('active'));
        btn?.classList.add('active');
        document.querySelectorAll('.name-card').forEach((card) => {
            const match = style === 'all' || card.dataset.style === style;
            card.classList.toggle('hidden-card', !match);
        });
    };

    window.copyName = function copyName(name, btn) {
        navigator.clipboard.writeText(name).then(() => {
            const label = btn.querySelector('span:last-child');
            const original = label?.textContent || 'Copy';
            if (label) label.textContent = 'Copied';
            btn.classList.add('copied');
            window.setTimeout(() => {
                if (label) label.textContent = original;
                btn.classList.remove('copied');
            }, 2000);
        }).catch(() => toast('Could not copy. Please copy manually.'));
    };

    window.toggleFav = function toggleFav(idx, btn) {
        const name = allNames[idx];
        if (!name) return;
        const existingIndex = favorites.findIndex((favorite) => favorite.name === name.name);
        const card = document.getElementById(`card-${idx}`);

        if (existingIndex !== -1) {
            favorites.splice(existingIndex, 1);
            const label = btn.querySelector('span:last-child');
            if (label) label.textContent = 'Save';
            btn.classList.remove('active');
            card?.classList.remove('favorited');
            toast(`"${name.name}" removed from saved names.`);
        } else {
            favorites.push({ name: name.name, tagline: name.tagline, domain: name.domain, style: name.style });
            const label = btn.querySelector('span:last-child');
            if (label) label.textContent = 'Saved';
            btn.classList.add('active');
            card?.classList.add('favorited');
            toast(`"${name.name}" saved.`);
        }

        localStorage.setItem('i2m_bng_favs', JSON.stringify(favorites));
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
        if (favorites.length === 0) {
            grid.innerHTML = '<div class="fav-empty">No saved names yet — use Save on any name card to keep it here.</div>';
            return;
        }

        grid.innerHTML = favorites.map((favorite, index) => `
            <div class="fav-item">
                <div class="fi-name">${esc(favorite.name)}</div>
                <div class="fi-tagline">"${esc(favorite.tagline || '')}"</div>
                <div class="fi-domain">${esc(favorite.domain || '')}</div>
                <button class="fi-remove" type="button" onclick="removeFav(${index})" title="Remove">✕</button>
            </div>
        `).join('');
    }

    window.removeFav = function removeFav(idx) {
        favorites.splice(idx, 1);
        localStorage.setItem('i2m_bng_favs', JSON.stringify(favorites));
        updateFavCount();
        renderFavGrid();
    };

    window.clearFavs = function clearFavs() {
        if (!window.confirm('Clear all saved names?')) return;
        favorites = [];
        localStorage.setItem('i2m_bng_favs', JSON.stringify(favorites));
        updateFavCount();
        renderFavGrid();
    };

    function updateFavCount() {
        const el = document.getElementById('fav-count');
        if (el) el.textContent = String(favorites.length);
    }

    window.toggleVariations = async function toggleVariations(idx, btn, name, tagline) {
        const container = document.getElementById(`variations-${idx}`);
        if (!container) return;

        if (container.classList.contains('open')) {
            container.classList.remove('open');
            const label = btn.querySelector('span:last-child');
            if (label) label.textContent = 'Variations';
            return;
        }

        container.classList.add('open');
        const buttonLabel = btn.querySelector('span:last-child');
        if (buttonLabel) buttonLabel.textContent = 'Loading...';
        btn.disabled = true;
        container.innerHTML = `<div class="nc-var-label">Name variations</div><div class="var-loading"><div class="var-spinner"></div> Generating variations of "${esc(name)}"…</div>`;

        try {
            const data = await postJson(variationsRoute, {
                [honeypotField]: '',
                [honeypotTimeField]: honeypotStartedAt,
                name,
                tagline,
            }, 50000, 'Name variations');
            const variations = Array.isArray(data.variations) ? data.variations : [];
            container.innerHTML = `<div class="nc-var-label">Variations of "${esc(name)}"</div>` + variations.map((variation) => `
                <div class="nc-var-item" onclick="copyName('${jsEsc(variation.name)}', this)">
                    <div class="nc-var-name">${esc(variation.name)}</div>
                    <div class="nc-var-tagline">"${esc(variation.tagline || '')}"</div>
                </div>
            `).join('');
        } catch (error) {
            container.innerHTML = `<div class="nc-var-label">Variations</div><div class="var-loading" style="color:#dc2626">${esc(error?.message || 'Could not generate variations. Try again.')}</div>`;
        }

        btn.textContent = '✕ Close';
        btn.disabled = false;
    };

    function setLoading(on) {
        const btn = document.getElementById('gen-btn');
        btn?.classList.toggle('loading', on);
        if (btn) btn.disabled = on;
        const loadingSection = document.getElementById('loading-section');
        const resultsSection = document.getElementById('results-section');
        if (loadingSection) loadingSection.style.display = on ? 'block' : 'none';
        if (on) {
            buildSkeletons();
            if (resultsSection) resultsSection.style.display = 'none';
            loadingSection?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function buildSkeletons() {
        const skeletonGrid = document.getElementById('skeleton-grid');
        if (!skeletonGrid) return;
        skeletonGrid.innerHTML = Array(6).fill(0).map(() => `
            <div class="skeleton-card">
                <div class="skel skel-badge"></div>
                <div class="skel skel-name"></div>
                <div class="skel skel-tagline"></div>
                <div class="skel skel-tagline s"></div>
                <div style="margin-top:.85rem">
                    <div class="skel skel-text"></div>
                    <div class="skel skel-text m"></div>
                    <div class="skel skel-text s"></div>
                </div>
            </div>
        `).join('');
    }

    function renderError(message) {
        document.getElementById('results-section').style.display = 'block';
        document.getElementById('names-grid').innerHTML = `
            <div class="empty-state">
                <div class="empty-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M9 10h.01"/><path d="M15 10h.01"/><path d="M9 16c.9-.8 1.9-1.2 3-1.2s2.1.4 3 1.2"/></svg></div>
                <div class="empty-title">Something went wrong</div>
                <div class="empty-desc">${esc(message)}</div>
            </div>
        `;
    }

    function toast(message, duration = 3000) {
        const el = document.getElementById('toast');
        if (!el) return;
        el.textContent = message;
        el.classList.add('show');
        window.setTimeout(() => el.classList.remove('show'), duration);
    }

    function esc(value) {
        return String(value || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function jsEsc(value) {
        return String(value || '').replace(/\\/g, '\\\\').replace(/'/g, "\\'");
    }
}
