const page = document.getElementById('seo-audit-page');

if (page) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const routeFetchHtml = page.dataset.fetchHtmlRoute;
    const routePsi = page.dataset.psiRoute;
    const routeCrux = page.dataset.cruxRoute;
    const routeRecommend = page.dataset.recommendRoute;
    let currentUrl = '';

    const auditButton = document.getElementById('audit-btn');
    const auditUrlInput = document.getElementById('audit-url');
    const retryAuditButton = document.getElementById('retry-audit-btn');
    const reAuditButton = document.getElementById('reaudit-btn');
    const newAuditButton = document.getElementById('new-audit-btn');
    const issuesTabs = document.querySelector('.issues-tabs');
    const checksBlock = document.getElementById('checks-block');

    auditButton?.addEventListener('click', startAudit);
    auditUrlInput?.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            startAudit();
        }
    });
    retryAuditButton?.addEventListener('click', resetAudit);
    reAuditButton?.addEventListener('click', reAudit);
    newAuditButton?.addEventListener('click', resetAudit);

    issuesTabs?.addEventListener('click', (event) => {
        const tab = event.target.closest('[data-issue-tab]');

        if (!tab) {
            return;
        }

        switchIssueTab(tab.dataset.issueTab, tab);
    });

    checksBlock?.addEventListener('click', (event) => {
        const head = event.target.closest('[data-check-toggle]');

        if (head) {
            toggleChecks(head);
        }
    });

    async function startAudit() {
        let url = auditUrlInput?.value.trim() || '';

        if (!url) {
            auditUrlInput?.focus();
            return;
        }

        if (!/^https?:\/\//i.test(url)) {
            url = 'https://' + url;
        }

        try {
            new URL(url);
        } catch {
            showError('Please enter a valid URL.');
            return;
        }

        currentUrl = url;

        if (auditButton) {
            auditButton.disabled = true;
            auditButton.classList.add('loading');
        }

        runAudit(url);
    }

    async function runAudit(url) {
        showLoading();

        try {
            setPhase(1);
            const html = await fetchHTML(url);
            setPhase(2);
            const signals = parseSignals(html, url);

            setPhase(3);
            let psi = null;
            try { psi = await fetchPSI(url); } catch (e) { console.warn('PSI unavailable:', e.message); }

            setPhase(4);
            let crux = null;
            try { crux = await fetchCrUX(url, psi?.finalUrl); } catch (e) { console.warn('CrUX unavailable:', e.message); }

            setPhase(5);
            const scores = buildScores(signals, psi, crux);
            showResults(signals, psi, crux, scores, url);
            setPhase(6);
            await fetchRecommendations(signals, scores);
        } catch (error) {
            console.error(error);
            showError(error?.message || 'We could not complete the audit. Check the API setup and try again.');
        }
    }

    async function fetchHTML(url) {
        try {
            const response = await fetch(routeFetchHtml, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ url }),
                signal: AbortSignal.timeout(20000),
            });

            if (!response.ok) {
                return '';
            }

            const data = await response.json();
            return data.html || '';
        } catch {
            return '';
        }
    }

    function parseSignals(html, url) {
        const signals = {
            url,
            html: !!html,
            title: null,
            metaDesc: null,
            metaRobots: '',
            canonical: null,
            viewport: false,
            charset: false,
            lang: '',
            h1s: [],
            h2s: [],
            h3s: [],
            h4s: [],
            images: { total: 0, withAlt: 0, withoutAlt: 0 },
            internalLinks: [],
            externalLinks: [],
            schema: { count: 0, types: [] },
            og: {},
            twitter: {},
            wordCount: 0,
            isHTTPS: url.startsWith('https'),
            hreflang: false,
            ampLink: false,
            faviconPresent: false,
        };

        if (!html) {
            return signals;
        }

        const doc = new DOMParser().parseFromString(html, 'text/html');
        const host = new URL(url).hostname;

        signals.title = { content: doc.title?.trim() || '', length: (doc.title?.trim() || '').length };
        signals.charset = !!doc.charset || !!doc.querySelector('[charset]') || !!doc.querySelector('meta[http-equiv="Content-Type"]');
        signals.lang = doc.documentElement.lang?.trim() || '';
        signals.viewport = !!doc.querySelector('meta[name="viewport"]');
        signals.faviconPresent = !!doc.querySelector('link[rel*="icon"]');

        const metaDescription = doc.querySelector('meta[name="description"]');
        signals.metaDesc = metaDescription
            ? { content: metaDescription.content?.trim() || '', length: (metaDescription.content?.trim() || '').length }
            : null;

        const metaRobots = doc.querySelector('meta[name="robots"]');
        signals.metaRobots = metaRobots ? metaRobots.content?.toLowerCase() : '';

        const canonical = doc.querySelector('link[rel="canonical"]');
        signals.canonical = canonical ? canonical.href?.trim() : null;
        signals.hreflang = doc.querySelectorAll('link[rel="alternate"][hreflang]').length > 0;
        signals.ampLink = !!doc.querySelector('link[rel="amphtml"]');

        doc.querySelectorAll('h1').forEach((heading) => signals.h1s.push(heading.textContent?.trim().slice(0, 120)));
        doc.querySelectorAll('h2').forEach((heading) => signals.h2s.push(heading.textContent?.trim().slice(0, 120)));
        doc.querySelectorAll('h3').forEach((heading) => signals.h3s.push(heading.textContent?.trim().slice(0, 80)));
        doc.querySelectorAll('h4').forEach((heading) => signals.h4s.push(heading.textContent?.trim().slice(0, 80)));

        doc.querySelectorAll('img').forEach((image) => {
            signals.images.total++;
            const alt = image.getAttribute('alt');

            if (alt !== null && alt.trim() !== '') {
                signals.images.withAlt++;
                return;
            }

            signals.images.withoutAlt++;
        });

        doc.querySelectorAll('a[href]').forEach((anchor) => {
            const href = anchor.getAttribute('href') || '';

            if (!href || href.startsWith('#') || href.startsWith('javascript')) {
                return;
            }

            try {
                const absoluteUrl = new URL(href, url).href;

                if (new URL(absoluteUrl).hostname === host) {
                    signals.internalLinks.push(absoluteUrl.slice(0, 100));
                } else {
                    signals.externalLinks.push(absoluteUrl.slice(0, 100));
                }
            } catch {}
        });

        doc.querySelectorAll('script[type="application/ld+json"]').forEach((script) => {
            try {
                const data = JSON.parse(script.textContent);
                signals.schema.count++;
                const type = data['@type']
                    || (Array.isArray(data['@graph']) ? data['@graph'].map((item) => item['@type']).join(', ') : '');

                if (type) {
                    signals.schema.types.push(type);
                }
            } catch {}
        });

        doc.querySelectorAll('meta[property^="og:"]').forEach((meta) => {
            const key = meta.getAttribute('property').replace('og:', '');
            signals.og[key] = meta.content?.trim();
        });

        doc.querySelectorAll('meta[name^="twitter:"]').forEach((meta) => {
            const key = meta.getAttribute('name').replace('twitter:', '');
            signals.twitter[key] = meta.content?.trim();
        });

        const body = doc.body?.textContent || '';
        signals.wordCount = body.trim().split(/\s+/).filter(Boolean).length;

        return signals;
    }

    async function fetchPSI(url) {
        const data = await postJson(routePsi, { url }, 50000, 'PageSpeed Insights');
        return data.psi;
    }

    async function fetchCrUX(url, finalUrl) {
        const data = await postJson(routeCrux, { url, finalUrl }, 35000, 'Chrome UX Report');
        return data.crux;
    }

    async function postJson(route, payload, timeout = 20000, label = 'SEO audit') {
        if (!route) {
            throw new Error(`${label} route is missing from the page.`);
        }

        const response = await fetch(route, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
            body: JSON.stringify(payload),
            signal: AbortSignal.timeout(timeout),
        });

        const rawText = await response.text();
        let data = {};

        try {
            data = rawText ? JSON.parse(rawText) : {};
        } catch {}

        if (!response.ok) {
            const details = data.message
                || (rawText ? rawText.replace(/<[^>]+>/g, ' ').replace(/\s+/g, ' ').trim().slice(0, 180) : '');
            throw new Error(details
                ? `${label} failed (${response.status}): ${details}`
                : `${label} failed (${response.status}).`);
        }

        return data;
    }

    function buildScores(signals, psi, crux) {
        const altRatio = signals.images.total > 0 ? signals.images.withAlt / signals.images.total : 1;
        let meta = 0;

        if (signals.title?.content) {
            meta += 18;
        }

        const titleLength = signals.title?.length || 0;
        if (titleLength >= 30 && titleLength <= 65) {
            meta += 14;
        } else if (titleLength > 0) {
            meta += 5;
        }

        if (signals.metaDesc?.content) {
            meta += 18;
        }

        const descriptionLength = signals.metaDesc?.length || 0;
        if (descriptionLength >= 120 && descriptionLength <= 165) {
            meta += 12;
        } else if (descriptionLength > 0) {
            meta += 5;
        }

        if (signals.viewport) meta += 12;
        if (signals.canonical) meta += 10;
        if (signals.lang) meta += 8;
        if (signals.charset) meta += 4;
        if (!signals.metaRobots?.includes('noindex')) meta += 4;

        let content = 0;
        if (signals.h1s.length === 1) content += 25;
        else if (signals.h1s.length > 1) content += 8;
        if (signals.h2s.length > 0) content += 15;
        if (signals.h3s.length > 0) content += 5;
        content += Math.round(altRatio * 20);
        if (signals.wordCount > 800) content += 20;
        else if (signals.wordCount > 300) content += 12;
        else if (signals.wordCount > 100) content += 5;
        if (signals.h2s.length >= 2) content += 5;
        if (signals.images.total > 0) content += 5;
        if (signals.h4s.length > 0) content += 5;

        let technical = 0;
        if (signals.isHTTPS) technical += 30;
        if (psi?.performance !== null && psi?.performance !== undefined) technical += Math.round(psi.performance * 40);
        technical += scoreCrux(crux);

        let onPage = 0;
        if (signals.schema.count > 0) onPage += 22;
        if (signals.internalLinks.length >= 3) onPage += 18;
        else if (signals.internalLinks.length > 0) onPage += 8;
        if (!signals.metaRobots?.includes('noindex')) onPage += 12;
        if (signals.faviconPresent) onPage += 8;
        if (signals.hreflang) onPage += 8;
        if (signals.externalLinks.length > 0) onPage += 7;
        if (signals.ampLink) onPage += 7;

        let social = 0;
        if (signals.og.title) social += 18;
        if (signals.og.description) social += 18;
        if (signals.og.image) social += 20;
        if (signals.twitter.card) social += 15;

        const score = (psi?.performance || 0) * 40
            + (psi?.seo || 0) * 25
            + (psi?.accessibility || 0) * 10
            + (psi?.bestPractices || 0) * 10
            + (scoreCrux(crux) / 100) * 15;
        const performance = Math.round(score * 100);

        const clamp = (value) => Math.min(100, Math.max(0, Math.round(value)));
        const scores = {
            meta: clamp(meta),
            content: clamp(content),
            technical: clamp(technical),
            onPage: clamp(onPage),
            social: clamp(social),
            performance: clamp(performance),
        };
        scores.overall = clamp(
            scores.meta * 0.22
            + scores.content * 0.25
            + scores.technical * 0.20
            + scores.onPage * 0.15
            + scores.social * 0.08
            + scores.performance * 0.10,
        );

        return scores;
    }

    function scoreCrux(crux) {
        if (!crux) {
            return 0;
        }

        let score = 0;
        const lcp = crux.lcp?.percentile;
        const cls = crux.cls?.percentile;
        const inp = crux.inp?.percentile;

        score += lcp <= 2500 ? 25 : lcp <= 4000 ? 12 : 0;
        score += cls <= 0.1 ? 25 : cls <= 0.25 ? 12 : 0;
        score += inp <= 200 ? 20 : inp <= 500 ? 10 : 0;

        return Math.min(70, score);
    }

    function buildIssues(signals, psi, crux) {
        const critical = [];
        const warnings = [];
        const passed = [];

        if (!signals.title?.content) {
            critical.push({ title: 'Missing Page Title', desc: 'The page has no title tag. This is one of the most important on-page SEO elements.', impact: 'high' });
        }
        if (!signals.metaDesc?.content) {
            critical.push({ title: 'Missing Meta Description', desc: 'No meta description was found, which weakens click-through potential from search results.', impact: 'high' });
        }
        if (signals.h1s.length === 0) {
            critical.push({ title: 'No H1 Tag Found', desc: 'The page has no H1 heading, which weakens topical clarity for search engines.', impact: 'high' });
        }
        if (!signals.isHTTPS) {
            critical.push({ title: 'Not Served Over HTTPS', desc: 'The page is not using HTTPS. This hurts trust and can affect rankings.', impact: 'high' });
        }

        if (!signals.canonical) {
            warnings.push({ title: 'No Canonical Tag', desc: 'A canonical URL is not declared. This can create duplicate content issues.', impact: 'medium' });
        }
        if (!signals.viewport) {
            warnings.push({ title: 'Missing Viewport Meta Tag', desc: 'The page is missing a viewport tag, which affects mobile rendering.', impact: 'medium' });
        }
        if (signals.images.withoutAlt > 0) {
            warnings.push({ title: `${signals.images.withoutAlt} image(s) missing alt text`, desc: 'Alt text helps both accessibility and image understanding.', impact: 'medium' });
        }
        if (signals.schema.count === 0) {
            warnings.push({ title: 'No Schema Markup Detected', desc: 'Structured data was not found, which limits rich-result opportunities.', impact: 'medium' });
        }
        if (psi && psi.performance < 0.75) {
            warnings.push({ title: 'Page performance needs improvement', desc: `Lighthouse performance is ${Math.round((psi.performance || 0) * 100)}/100.`, impact: 'medium' });
        }
        if (crux?.lcp?.percentile > 4000) {
            critical.push({ title: 'Poor real-user LCP', desc: `Chrome UX Report shows a 75th percentile LCP of ${formatMilliseconds(crux.lcp.percentile)}.`, impact: 'high' });
        }
        if (crux?.inp?.percentile > 500) {
            critical.push({ title: 'Poor real-user INP', desc: `Chrome UX Report shows a 75th percentile INP of ${formatMilliseconds(crux.inp.percentile)}.`, impact: 'high' });
        }
        if (crux?.cls?.percentile > 0.25) {
            critical.push({ title: 'Poor real-user CLS', desc: `Chrome UX Report shows a 75th percentile CLS of ${formatCls(crux.cls.percentile)}.`, impact: 'high' });
        }

        if (signals.title?.content) {
            passed.push({ title: 'Title tag present', desc: 'A page title is present and can be optimised further if needed.', impact: 'low' });
        }
        if (signals.metaDesc?.content) {
            passed.push({ title: 'Meta description present', desc: 'The page includes a meta description.', impact: 'low' });
        }
        if (signals.isHTTPS) {
            passed.push({ title: 'HTTPS enabled', desc: 'The page is served securely over HTTPS.', impact: 'low' });
        }
        if (signals.schema.count > 0) {
            passed.push({ title: 'Schema markup found', desc: `Detected ${signals.schema.count} schema block(s).`, impact: 'low' });
        }
        if (crux?.lcp?.percentile && crux.lcp.percentile <= 2500) {
            passed.push({ title: 'Good real-user LCP', desc: `CrUX 75th percentile LCP is ${formatMilliseconds(crux.lcp.percentile)}.`, impact: 'low' });
        }
        if (crux?.inp?.percentile && crux.inp.percentile <= 200) {
            passed.push({ title: 'Good real-user INP', desc: `CrUX 75th percentile INP is ${formatMilliseconds(crux.inp.percentile)}.`, impact: 'low' });
        }
        if (crux?.cls?.percentile !== null && crux?.cls?.percentile !== undefined && crux.cls.percentile <= 0.1) {
            passed.push({ title: 'Good real-user CLS', desc: `CrUX 75th percentile CLS is ${formatCls(crux.cls.percentile)}.`, impact: 'low' });
        }

        return { critical, warnings, passed };
    }

    async function fetchRecommendations(signals, scores) {
        try {
            const data = await postJson(routeRecommend, { signals, scores }, 65000, 'AI recommendations');
            renderRecommendations(data.recommendations, data.provider || '');
        } catch (error) {
            renderRecommendationsError(error?.message || 'AI recommendations are unavailable.');
        }
    }

    function renderRecommendations(recommendations, provider) {
        const badge = document.getElementById('ai-provider-badge');
        if (badge) {
            badge.textContent = provider ? `Powered by ${formatProviderName(provider)}` : 'Powered by AI';
        }
        document.getElementById('ai-content').innerHTML = `<div class="rec-list">${recommendations.map((recommendation, index) => `
            <div class="rec-item" style="animation-delay:${index * 0.08}s">
                <div class="rec-top">
                    <span class="rec-priority ${esc(recommendation.priority)}">${esc(recommendation.priority.toUpperCase())}</span>
                    <span class="rec-category">${esc(recommendation.category)}</span>
                </div>
                <div class="rec-title">${esc(recommendation.title)}</div>
                <div class="rec-desc">${esc(recommendation.description)}</div>
                <div class="rec-impact">→ ${esc(recommendation.impact)}</div>
            </div>`).join('')}</div>`;
    }

    function renderRecommendationsError(message) {
        const badge = document.getElementById('ai-provider-badge');
        if (badge) {
            badge.textContent = 'Powered by AI';
        }
        document.getElementById('ai-content').innerHTML = `<div class="issues-empty">${esc(message)}</div>`;
    }

    function formatProviderName(provider) {
        switch ((provider || '').toLowerCase()) {
            case 'anthropic':
                return 'Claude';
            case 'openai':
                return 'OpenAI';
            case 'gemini':
                return 'Gemini';
            case 'mistral':
                return 'Mistral';
            default:
                return 'AI';
        }
    }

    function showResults(signals, psi, crux, scores, url) {
        show('results-state');
        hide('loading-state');

        const issues = buildIssues(signals, psi, crux);
        const circumference = 314.16;
        const offset = circumference * (1 - scores.overall / 100);
        const scoreColor = scores.overall >= 80 ? '#16a34a' : scores.overall >= 60 ? '#c8a96e' : scores.overall >= 40 ? '#f59e0b' : '#dc2626';
        const scoreForeground = document.getElementById('score-fg');
        scoreForeground.style.stroke = scoreColor;
        scoreForeground.style.strokeDashoffset = offset;
        animCount(document.getElementById('score-num'), 0, scores.overall, 900);
        document.getElementById('score-grade').textContent = getGrade(scores.overall);

        document.getElementById('results-url-display').textContent = new URL(url).hostname;
        document.getElementById('results-date').textContent = '— ' + new Date().toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
        document.getElementById('results-page-title').textContent = signals.title?.content || new URL(url).hostname;
        document.getElementById('results-summary').textContent = generateSummary(signals, scores);

        const tags = [];
        tags.push({ label: signals.isHTTPS ? '<svg style="width:10px;height:10px;display:inline-block;vertical-align:middle;margin-right:2px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><rect x="3" y="11" width="18" height="11" rx="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>HTTPS' : '<svg style="width:10px;height:10px;display:inline-block;vertical-align:middle;margin-right:2px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>HTTP', cls: signals.isHTTPS ? 'ok' : 'err' });
        tags.push({ label: `${issues.critical.length} Critical`, cls: issues.critical.length > 0 ? 'err' : 'ok' });
        tags.push({ label: `${issues.warnings.length} Warnings`, cls: issues.warnings.length > 4 ? 'warn' : 'ok' });
        if (psi) tags.push({ label: `Perf: ${Math.round((psi.performance || 0) * 100)}`, cls: psi.performance >= 0.75 ? 'ok' : psi.performance >= 0.5 ? 'warn' : 'err' });
        tags.push({ label: `INP: ${formatMilliseconds(crux?.inp?.percentile)}`, cls: getMetricClass(crux?.inp?.percentile, 200, 500) });
        tags.push({ label: `${signals.schema.count} Schema`, cls: signals.schema.count > 0 ? 'ok' : 'warn' });
        tags.push({ label: `${signals.wordCount} words`, cls: signals.wordCount >= 300 ? 'ok' : 'warn' });
        document.getElementById('results-meta-tags').innerHTML = tags.map((tag) => `<span class="rmt ${tag.cls}">${tag.label}</span>`).join('');

        const categories = [
            { key: 'meta', icon: '<svg style="width:18px;height:18px;color:rgba(255,255,255,.75)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>', name: 'Meta Tags' },
            { key: 'content', icon: '<svg style="width:18px;height:18px;color:rgba(255,255,255,.75)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>', name: 'Content' },
            { key: 'technical', icon: '<svg style="width:18px;height:18px;color:rgba(255,255,255,.75)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>', name: 'Technical' },
            { key: 'onPage', icon: '<svg style="width:18px;height:18px;color:rgba(255,255,255,.75)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>', name: 'On-Page' },
            { key: 'social', icon: '<svg style="width:18px;height:18px;color:rgba(255,255,255,.75)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>', name: 'Social & OG' },
            { key: 'performance', icon: '<svg style="width:18px;height:18px;color:rgba(255,255,255,.75)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>', name: 'Performance' },
        ];
        document.getElementById('scores-grid').innerHTML = categories.map((category, index) => {
            const score = scores[category.key];
            const { badge, barColor } = getScoreStyle(score);

            return `<div class="score-card" style="animation-delay:${index * 0.07}s">
                <div class="sc-top">
                    <div class="sc-icon">${category.icon}</div>
                    <span class="sc-badge ${badge.cls}">${badge.label}</span>
                </div>
                <div class="sc-name">${category.name}</div>
                <div class="sc-score" style="color:${barColor}">${score}</div>
                <div class="sc-bar"><div class="sc-bar-fill" style="--w:${score}%;background:${barColor};width:${score}%"></div></div>
            </div>`;
        }).join('');

        renderIssues(issues);
        renderChecks(signals, psi, crux, scores);
        renderSidebar(signals, psi, crux);
    }

    function renderIssues(issues) {
        document.getElementById('crit-count').textContent = issues.critical.length;
        document.getElementById('warn-count').textContent = issues.warnings.length;
        document.getElementById('pass-count').textContent = issues.passed.length;

        ['critical', 'warnings', 'passed'].forEach((type) => {
            const list = issues[type];
            const pane = document.getElementById('pane-' + type);
            const dotClass = type === 'critical' ? 'crit' : type === 'warnings' ? 'warn' : 'pass';

            pane.innerHTML = list.length === 0
                ? `<div class="issues-empty">${type === 'passed' ? 'No checks passed yet — run an audit first.' : `No ${type} issues found.`}</div>`
                : list.map((item) => `<div class="issue-item"><div class="ii-dot ${dotClass}"></div><div class="ii-body"><div class="ii-title">${esc(item.title)}</div><div class="ii-desc">${esc(item.desc)}</div><span class="ii-impact ${item.impact}">${item.impact} impact</span></div></div>`).join('');
        });
    }

    function renderChecks(signals, psi, crux, scores) {
        const checks = [
            {
                icon: '<svg style="width:16px;height:16px;color:rgba(255,255,255,.75)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>',
                name: 'Meta Tags',
                score: scores.meta,
                items: [
                    { label: 'Title tag', value: signals.title?.length ? `${signals.title.length} chars` : 'Missing', status: signals.title?.content ? 'pass' : 'fail', detail: signals.title?.content ? `"${signals.title.content.slice(0, 80)}"` : 'No title tag found.', fix: signals.title?.content ? null : 'Add a <title> tag in your <head>. Keep it 30–65 characters and include your primary keyword.' },
                    { label: 'Title length', value: signals.title?.length ? `${signals.title.length} chars` : '—', status: !signals.title?.content ? 'info' : (signals.title.length >= 30 && signals.title.length <= 65) ? 'pass' : 'warn', detail: !signals.title?.content ? 'No title to measure.' : (signals.title.length >= 30 && signals.title.length <= 65) ? 'Title length is in the optimal 30–65 character range.' : `Title is ${signals.title.length < 30 ? 'too short' : 'too long'} (${signals.title.length} chars). Worth up to 14 points.`, fix: signals.title?.content && (signals.title.length < 30 || signals.title.length > 65) ? `Rewrite the title to be between 30 and 65 characters (currently ${signals.title.length}).` : null },
                    { label: 'Meta description', value: signals.metaDesc?.length ? `${signals.metaDesc.length} chars` : 'Missing', status: signals.metaDesc?.content ? 'pass' : 'fail', detail: signals.metaDesc?.content ? 'Meta description is present.' : 'No meta description found.', fix: signals.metaDesc?.content ? null : 'Add <meta name="description"> with a 120–160 character summary of the page.' },
                    { label: 'Description length', value: signals.metaDesc?.length ? `${signals.metaDesc.length} chars` : '—', status: !signals.metaDesc?.content ? 'info' : (signals.metaDesc.length >= 120 && signals.metaDesc.length <= 165) ? 'pass' : 'warn', detail: !signals.metaDesc?.content ? 'No description to measure.' : (signals.metaDesc.length >= 120 && signals.metaDesc.length <= 165) ? 'Description length is in the optimal 120–165 character range.' : `Description is ${signals.metaDesc.length < 120 ? 'too short' : 'too long'} (${signals.metaDesc.length} chars). Worth up to 12 points.`, fix: signals.metaDesc?.content && (signals.metaDesc.length < 120 || signals.metaDesc.length > 165) ? `Rewrite the description to be between 120 and 165 characters (currently ${signals.metaDesc.length}).` : null },
                    { label: 'Canonical tag', value: signals.canonical ? 'Present' : 'Missing', status: signals.canonical ? 'pass' : 'warn', detail: signals.canonical ? signals.canonical : 'No canonical URL declared.', fix: signals.canonical ? null : 'Add <link rel="canonical" href="your-url"> to prevent duplicate content issues.' },
                    { label: 'Language attribute', value: signals.lang || 'Missing', status: signals.lang ? 'pass' : 'warn', detail: signals.lang ? `lang="${signals.lang}" declared on the <html> element.` : 'No lang attribute found on <html>. Worth 8 points.', fix: signals.lang ? null : 'Add a lang attribute to your <html> tag, e.g. <html lang="en">.' },
                    { label: 'Indexable', value: signals.metaRobots?.includes('noindex') ? 'Blocked' : 'Yes', status: signals.metaRobots?.includes('noindex') ? 'fail' : 'pass', detail: signals.metaRobots?.includes('noindex') ? `meta robots contains "noindex" — this page is blocked from search engines.` : 'No noindex directive found. Page is indexable.', fix: signals.metaRobots?.includes('noindex') ? 'Remove the noindex directive from your meta robots tag to allow search engines to index this page.' : null },
                ],
            },
            {
                icon: '<svg style="width:16px;height:16px;color:rgba(255,255,255,.75)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>',
                name: 'Content',
                score: scores.content,
                items: [
                    { label: 'H1 headings', value: `${signals.h1s.length}`, status: signals.h1s.length === 1 ? 'pass' : signals.h1s.length > 1 ? 'warn' : 'fail', detail: signals.h1s.length ? signals.h1s.join(' | ') : 'No H1 tag found.', fix: signals.h1s.length === 0 ? 'Add exactly one H1 heading that describes the page\'s main topic.' : signals.h1s.length > 1 ? 'Use only one H1 per page — convert extra H1s to H2 or H3 subheadings.' : null },
                    { label: 'H2 headings', value: `${signals.h2s.length}`, status: signals.h2s.length > 0 ? 'pass' : 'warn', detail: signals.h2s.length > 0 ? 'Subheadings detected.' : 'No H2 headings found.', fix: signals.h2s.length === 0 ? 'Add H2 subheadings to structure your content and help search engines understand the hierarchy.' : null },
                    { label: 'H3 headings', value: `${signals.h3s.length}`, status: signals.h3s.length > 0 ? 'pass' : 'info', detail: signals.h3s.length > 0 ? `${signals.h3s.length} H3 heading(s) found.` : 'No H3 headings found. Worth 5 points.', fix: signals.h3s.length === 0 ? 'Add H3 subheadings under your H2 sections to create a deeper content hierarchy.' : null },
                    { label: 'Word count', value: `${signals.wordCount}`, status: signals.wordCount >= 300 ? 'pass' : 'warn', detail: signals.wordCount >= 300 ? 'Content length is reasonable.' : 'Page may be thin on content.', fix: signals.wordCount < 300 ? 'Expand your content to at least 300 words to establish topical relevance.' : null },
                    { label: 'Image alt text', value: signals.images.total > 0 ? `${signals.images.withAlt}/${signals.images.total}` : 'No images', status: signals.images.total === 0 ? 'info' : signals.images.withoutAlt === 0 ? 'pass' : signals.images.withoutAlt <= 2 ? 'warn' : 'fail', detail: signals.images.total === 0 ? 'No images found on this page.' : `${signals.images.withAlt} of ${signals.images.total} image(s) have alt text. Worth up to 20 points.`, fix: signals.images.total > 0 && signals.images.withoutAlt > 0 ? `Add descriptive alt attributes to the ${signals.images.withoutAlt} image(s) missing them.` : null },
                ],
            },
            {
                icon: '<svg style="width:16px;height:16px;color:rgba(255,255,255,.75)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
                name: 'Technical',
                score: scores.technical,
                items: [
                    { label: 'HTTPS', value: signals.isHTTPS ? 'Enabled' : 'Not secure', status: signals.isHTTPS ? 'pass' : 'fail', detail: signals.isHTTPS ? 'Page is served over HTTPS.' : 'Page is not using HTTPS.', fix: signals.isHTTPS ? null : 'Install an SSL certificate and redirect all HTTP traffic to HTTPS.' },
                    { label: 'Viewport tag', value: signals.viewport ? 'Present' : 'Missing', status: signals.viewport ? 'pass' : 'warn', detail: signals.viewport ? 'Viewport meta tag found.' : 'Missing viewport meta tag.', fix: signals.viewport ? null : 'Add <meta name="viewport" content="width=device-width, initial-scale=1"> inside your <head>.' },
                    { label: 'Charset', value: signals.charset ? 'Present' : 'Missing', status: signals.charset ? 'pass' : 'warn', detail: signals.charset ? 'Charset declaration found.' : 'Missing charset declaration.', fix: signals.charset ? null : 'Add <meta charset="UTF-8"> as the first element inside <head>.' },
                    { label: 'Lighthouse Performance', value: psi ? `${Math.round((psi.performance || 0) * 100)}/100` : '—', status: !psi ? 'info' : psi.performance >= 0.9 ? 'pass' : psi.performance >= 0.5 ? 'warn' : 'fail', detail: !psi ? 'Unavailable — worth up to 40 points of this score.' : `Lighthouse performance score: ${Math.round((psi.performance || 0) * 100)}/100.`, fix: !psi ? 'Lighthouse data requires a publicly accessible URL. Run the audit on a live site to unlock this score.' : psi.performance < 0.5 ? 'Reduce render-blocking resources, optimise images, and improve server response time.' : null },
                    { label: 'Core Web Vitals', value: crux ? 'Available' : '—', status: !crux ? 'info' : 'pass', detail: !crux ? 'Unavailable — worth up to 30 points of this score.' : 'Real-world CrUX field data available for this URL.', fix: !crux ? 'CrUX data requires sufficient real-world traffic. Run the audit on a live URL with regular visitors.' : null },
                ],
            },
            {
                icon: '<svg style="width:16px;height:16px;color:rgba(255,255,255,.75)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>',
                name: 'On-Page',
                score: scores.onPage,
                items: [
                    { label: 'Schema markup', value: signals.schema.count > 0 ? `${signals.schema.count}` : 'None', status: signals.schema.count > 0 ? 'pass' : 'warn', detail: signals.schema.count > 0 ? signals.schema.types.join(', ') : 'No JSON-LD schema detected.', fix: signals.schema.count === 0 ? 'Add JSON-LD structured data (e.g. Organization, WebPage) to improve how search engines display your site.' : null },
                    { label: 'Internal links', value: `${signals.internalLinks.length}`, status: signals.internalLinks.length >= 3 ? 'pass' : 'warn', detail: `${signals.internalLinks.length} internal link(s) detected.`, fix: signals.internalLinks.length < 3 ? 'Add at least 3 internal links to help search engines crawl and discover related content.' : null },
                    { label: 'External links', value: `${signals.externalLinks.length}`, status: signals.externalLinks.length > 0 ? 'pass' : 'info', detail: `${signals.externalLinks.length} external link(s) detected.` },
                    { label: 'Indexable', value: signals.metaRobots?.includes('noindex') ? 'Blocked' : 'Yes', status: signals.metaRobots?.includes('noindex') ? 'fail' : 'pass', detail: signals.metaRobots?.includes('noindex') ? 'Blocked from search engines via noindex. Worth 12 points.' : 'No noindex directive — page is indexable.', fix: signals.metaRobots?.includes('noindex') ? 'Remove the noindex directive to allow search engines to index this page.' : null },
                    { label: 'Favicon', value: signals.faviconPresent ? 'Present' : 'Missing', status: signals.faviconPresent ? 'pass' : 'warn', detail: signals.faviconPresent ? 'Favicon detected.' : 'No favicon found. Worth 8 points.', fix: signals.faviconPresent ? null : 'Add a <link rel="icon" href="/favicon.ico"> tag and upload a favicon to your site root.' },
                    { label: 'Hreflang', value: signals.hreflang ? 'Present' : 'None', status: signals.hreflang ? 'pass' : 'info', detail: signals.hreflang ? 'Hreflang tags found — good for multilingual SEO.' : 'No hreflang tags. Worth 8 points if targeting multiple languages/regions.', fix: signals.hreflang ? null : 'Add <link rel="alternate" hreflang="x"> tags if your site targets multiple languages or regions.' },
                ],
            },
            {
                icon: '<svg style="width:16px;height:16px;color:rgba(255,255,255,.75)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>',
                name: 'Social & OG',
                score: scores.social,
                items: [
                    { label: 'og:title', value: signals.og.title ? 'Present' : 'Missing', status: signals.og.title ? 'pass' : 'warn', detail: signals.og.title || 'No Open Graph title found.', fix: signals.og.title ? null : 'Add <meta property="og:title" content="…"> for better social media sharing previews.' },
                    { label: 'og:image', value: signals.og.image ? 'Present' : 'Missing', status: signals.og.image ? 'pass' : 'warn', detail: signals.og.image || 'No Open Graph image found.', fix: signals.og.image ? null : 'Add <meta property="og:image" content="…"> with a 1200×630px image for rich social previews.' },
                    { label: 'twitter:card', value: signals.twitter.card ? signals.twitter.card : 'Missing', status: signals.twitter.card ? 'pass' : 'warn', detail: signals.twitter.card ? 'Twitter card tag found.' : 'No twitter:card tag found.', fix: signals.twitter.card ? null : 'Add <meta name="twitter:card" content="summary_large_image"> for Twitter preview cards.' },
                ],
            },
        ];

        document.getElementById('checks-block').innerHTML = checks.map((category) => {
            const { barColor } = getScoreStyle(category.score);

            return `<div class="checks-category">
                <div class="checks-cat-head" data-check-toggle>
                    <div class="cch-left">
                        <div class="cch-ico">${category.icon}</div>
                        <span class="cch-name">${category.name}</span>
                    </div>
                    <div class="cch-right">
                        <span class="cch-score-badge" style="background:${barColor}15;color:${barColor}">${category.score}/100</span>
                        <span class="cch-arrow">›</span>
                    </div>
                </div>
                <div class="checks-cat-body">
                    ${category.items.map((item) => `
                        <div class="check-row">
                            <div class="cr-status ${item.status}">${item.status === 'pass' ? '✓' : item.status === 'fail' ? '✗' : item.status === 'warn' ? '!' : 'i'}</div>
                            <div class="cr-body">
                                <div class="cr-label">${esc(item.label)}</div>
                                <div class="cr-detail">${esc(item.detail)}</div>
                                ${item.fix ? `<div class="cr-fix">→ ${esc(item.fix)}</div>` : ''}
                            </div>
                            <div class="cr-value">${esc(item.value || '')}</div>
                        </div>`).join('')}
                </div>
            </div>`;
        }).join('');
    }

    function renderSidebar(signals, psi, crux) {
        const scoreElement = (id, value) => {
            const element = document.getElementById(id);
            element.textContent = value !== null && value !== undefined ? Math.round(value * 100) : '—';
            element.style.color = value === null || value === undefined ? 'var(--g400)' : value >= 0.9 ? 'var(--ok)' : value >= 0.5 ? 'var(--warn)' : 'var(--err)';
        };

        scoreElement('psi-perf', psi?.performance);
        scoreElement('psi-seo', psi?.seo);
        scoreElement('psi-a11y', psi?.accessibility);
        scoreElement('psi-bp', psi?.bestPractices);

        const cwvData = [
            { name: 'Largest Contentful Paint', abbr: 'LCP', value: formatMilliseconds(crux?.lcp?.percentile), cls: getMetricClass(crux?.lcp?.percentile, 2500, 4000) },
            { name: 'Cumulative Layout Shift', abbr: 'CLS', value: formatCls(crux?.cls?.percentile), cls: getMetricClass(crux?.cls?.percentile, 0.1, 0.25) },
            { name: 'Interaction to Next Paint', abbr: 'INP', value: formatMilliseconds(crux?.inp?.percentile), cls: getMetricClass(crux?.inp?.percentile, 200, 500) },
        ];
        document.getElementById('cwv-list').innerHTML = cwvData.map((metric) => `
            <div class="cwv-item">
                <div class="cwv-left"><div class="cwv-name">${metric.name}</div><div class="cwv-desc">${metric.abbr}</div></div>
                <span class="cwv-val ${metric.cls}">${metric.value}</span>
            </div>`).join('');

        const labMetrics = [
            { name: 'First Contentful Paint', abbr: 'FCP', value: psi?.fcp || '—' },
            { name: 'Largest Contentful Paint', abbr: 'LCP', value: psi?.lcp || '—' },
            { name: 'Total Blocking Time', abbr: 'TBT', value: psi?.tbt || '—' },
            { name: 'Cumulative Layout Shift', abbr: 'CLS', value: psi?.cls || '—' },
            { name: 'Speed Index', abbr: 'SI', value: psi?.si || '—' },
        ];
        document.getElementById('lab-metrics-list').innerHTML = labMetrics.map((metric) => `
            <div class="detail-row"><span class="dr-label">${metric.abbr}</span><span class="dr-val">${metric.value}</span></div>
        `).join('');

        document.getElementById('page-details-list').innerHTML = [
            { label: 'Protocol', val: signals.isHTTPS ? 'HTTPS ✓' : 'HTTP ✗' },
            { label: 'H1 Tags', val: signals.h1s.length || 0 },
            { label: 'Images', val: signals.images.total || 0 },
            { label: 'Internal Links', val: signals.internalLinks.length || 0 },
            { label: 'External Links', val: signals.externalLinks.length || 0 },
            { label: 'Schema Scripts', val: signals.schema.count || 0 },
            { label: 'Word Count', val: signals.wordCount ? signals.wordCount.toLocaleString() : '—' },
            { label: 'Hreflang', val: signals.hreflang ? 'Yes' : 'No' },
        ].map((row) => `<div class="detail-row"><span class="dr-label">${row.label}</span><span class="dr-val">${row.val}</span></div>`).join('');
    }

    function switchIssueTab(type, tab) {
        document.querySelectorAll('.issue-tab').forEach((item) => item.classList.remove('active'));
        document.querySelectorAll('.issue-pane').forEach((item) => item.classList.remove('active'));
        tab.classList.add('active');
        document.getElementById('pane-' + type).classList.add('active');
    }

    function toggleChecks(head) {
        head.classList.toggle('open');
        head.nextElementSibling.classList.toggle('open');
    }

    function getScoreStyle(score) {
        if (score >= 80) return { badge: { cls: 'excellent', label: 'Excellent' }, barColor: '#16a34a' };
        if (score >= 60) return { badge: { cls: 'good', label: 'Needs Work' }, barColor: '#c8a96e' };
        return { badge: { cls: 'poor', label: 'Poor' }, barColor: '#dc2626' };
    }

    function getGrade(score) {
        if (score >= 90) return 'A+';
        if (score >= 80) return 'A';
        if (score >= 70) return 'B';
        if (score >= 60) return 'C';
        if (score >= 50) return 'D';
        return 'F';
    }

    function generateSummary(signals, scores) {
        const issues = [];

        if (!signals.title?.content) issues.push('missing title tag');
        if (!signals.metaDesc?.content) issues.push('no meta description');
        if (signals.h1s.length !== 1) issues.push(signals.h1s.length === 0 ? 'no H1 heading' : 'multiple H1 tags');
        if (signals.schema.count === 0) issues.push('no schema markup');
        if (!signals.og.image) issues.push('missing OG image');

        const grade = getGrade(scores.overall);
        if (issues.length === 0) {
            return `This page scores ${scores.overall}/100 overall (grade ${grade}) — a solid foundation with room to grow. Review the recommendations below to improve rankings further.`;
        }

        return `This page scores ${scores.overall}/100 (grade ${grade}). Key issues found: ${issues.slice(0, 3).join(', ')}. Addressing the critical items below will have the most immediate impact on search visibility.`;
    }

    function animCount(element, from, to, duration) {
        const start = performance.now();
        const step = (timestamp) => {
            const progress = Math.min((timestamp - start) / duration, 1);
            element.textContent = Math.round(from + (to - from) * progress);

            if (progress < 1) {
                requestAnimationFrame(step);
            }
        };

        requestAnimationFrame(step);
    }

    function setPhase(phase) {
        for (let i = 1; i <= 6; i += 1) {
            const item = document.getElementById('lp-' + i);
            const icon = document.getElementById('lpi-' + i);

            if (!item) {
                continue;
            }

            item.classList.remove('active', 'done');

            if (i < phase) {
                item.classList.add('done');
                icon.innerHTML = '✓';
            } else if (i === phase) {
                item.classList.add('active');
                icon.innerHTML = '<div class="lp-spinner"></div>';
            }
        }

        document.getElementById('loading-bar-fill').style.width = `${((phase - 1) / 5) * 100}%`;
    }

    function showLoading() {
        hide('input-state');
        hide('error-state');
        hide('results-state');
        show('loading-state');
        setPhase(1);
    }

    function showError(message) {
        hide('input-state');
        hide('loading-state');
        hide('results-state');
        show('error-state');
        document.getElementById('error-msg').textContent = message;

        if (auditButton) {
            auditButton.disabled = false;
            auditButton.classList.remove('loading');
        }
    }

    function resetAudit() {
        hide('loading-state');
        hide('error-state');
        hide('results-state');
        show('input-state');

        if (auditUrlInput) {
            auditUrlInput.value = '';
        }

        if (auditButton) {
            auditButton.disabled = false;
            auditButton.classList.remove('loading');
        }
    }

    function reAudit() {
        if (currentUrl) {
            runAudit(currentUrl);
        }
    }

    function show(id) {
        const element = document.getElementById(id);

        if (element) {
            element.style.display = 'block';
            element.style.animation = 'fadeIn .4s ease both';
        }
    }

    function hide(id) {
        const element = document.getElementById(id);

        if (element) {
            element.style.display = 'none';
        }
    }

    function esc(str) {
        return String(str || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;');
    }

    function formatMilliseconds(value) {
        if (value === null || value === undefined) {
            return '—';
        }

        return value >= 1000 ? `${(value / 1000).toFixed(1)}s` : `${Math.round(value)}ms`;
    }

    function formatCls(value) {
        if (value === null || value === undefined) {
            return '—';
        }

        return Number(value).toFixed(2);
    }

    function getMetricClass(value, goodThreshold, warnThreshold) {
        if (value === null || value === undefined) {
            return 'na';
        }

        if (value <= goodThreshold) {
            return 'good';
        }

        if (value <= warnThreshold) {
            return 'warn';
        }

        return 'err';
    }
}
