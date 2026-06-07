const page = document.getElementById('website-cost-calculator-page');

if (page) {
    const startRoute = page.dataset.startRoute || '/start';
    const printRoute = page.dataset.printRoute || '';
    const printStorageKey = 'i2medierCostCalculatorPrintPayload';

    const state = {
        type: 150000,
        typeKey: 'brochure',
        typeName: 'Brochure Site',
        pages: 0,
        pageCount: 5,
        design: 0,
        designName: 'Theme-based',
        content: 0,
        contentName: 'We supply all content',
        seo: 0,
        seoName: 'No SEO',
        seoMonthly: false,
        platform: 0,
        platformKey: 'wordpress',
        platformName: 'WordPress (recommended)',
        maintenance: 0,
        maintenanceName: 'No maintenance plan',
        rush: 0,
        rushName: 'Standard (4–8 weeks)',
        features: {},
    };

    const pagePrices = [
        [0, 5, 0, 'Included in base price'],
        [6, 10, 30000, '+₦30,000'],
        [11, 20, 70000, '+₦70,000'],
        [21, 30, 140000, '+₦140,000'],
    ];

    const dotColors = {
        type: '#c8a96e',
        pages: '#a78bfa',
        design: '#60a5fa',
        content: '#34d399',
        seo: '#f472b6',
        platform: '#94a3b8',
        feature: '#fb923c',
        rush: '#f59e0b',
    };

    function buildEstimateRows(rushAmount) {
        const rows = [];

        rows.push({ group: 'Base', name: state.typeName, price: state.type });
        if (state.pages > 0) rows.push({ group: 'Pages', name: `Pages (${state.pageCount})`, price: state.pages });
        if (state.design > 0) rows.push({ group: 'Design', name: `${state.designName} Design`, price: state.design });
        if (state.content > 0) rows.push({ group: 'Content', name: 'Content / Copywriting', price: state.content });
        if (!state.seoMonthly && state.seo > 0) rows.push({ group: 'SEO', name: state.seoName, price: state.seo });
        if (state.platform > 0) rows.push({ group: 'Platform', name: `${state.platformName} Development`, price: state.platform });
        Object.values(state.features).forEach((feature) => rows.push({ group: 'Feature', name: feature.name, price: feature.price }));
        if (rushAmount !== 0) rows.push({ group: 'Timeline', name: `${state.rushName} adjustment`, price: rushAmount });

        return rows;
    }

    function getEstimatePayload() {
        const featuresTotal = Object.values(state.features).reduce((sum, item) => sum + item.price, 0);
        const baseOnetime = state.type + state.pages + state.design + state.content + (state.seoMonthly ? 0 : state.seo) + state.platform + featuresTotal;
        const rushAmount = state.rush !== 0 ? Math.round(baseOnetime * state.rush / 100) : 0;
        const oneTimeTotal = baseOnetime + rushAmount;
        const monthlyTotal = state.maintenance + (state.seoMonthly ? state.seo : 0);

        return {
            state: {
                typeName: state.typeName,
                pageCount: state.pageCount,
                designName: state.designName,
                contentName: state.contentName,
                seoName: state.seoName,
                seoMonthly: state.seoMonthly,
                platformName: state.platformName,
                maintenanceName: state.maintenanceName,
                rushName: state.rushName,
            },
            rows: buildEstimateRows(rushAmount),
            summary: {
                featuresTotal,
                rushAmount,
                oneTimeTotal,
                monthlyTotal,
            },
            comparison: {
                freelancer: Math.round(oneTimeTotal * 0.7),
                i2medier: oneTimeTotal,
                agency: Math.round(oneTimeTotal * 2.2),
            },
            generatedAt: new Date().toISOString(),
        };
    }

    function selectType(card) {
        document.querySelectorAll('#type-grid .type-card').forEach((item) => item.classList.remove('selected'));
        card.classList.add('selected');
        state.type = parseInt(card.dataset.price || '0', 10);
        state.typeKey = card.dataset.val || 'brochure';
        state.typeName = card.querySelector('.tc-name')?.textContent || 'Website';
        recalc();
    }

    function selectDesign(card) {
        document.querySelectorAll('.design-card').forEach((item) => item.classList.remove('selected'));
        card.classList.add('selected');
        state.design = parseInt(card.dataset.price || '0', 10);
        state.designName = card.querySelector('.dc-name')?.textContent || 'Design';
        recalc();
    }

    function selectOption(groupId, button) {
        document.querySelectorAll(`#${groupId} .option-btn`).forEach((item) => item.classList.remove('selected'));
        button.classList.add('selected');

        const key = button.dataset.key;
        const value = button.dataset.val || '';
        const price = parseInt(button.dataset.price || '0', 10);
        const label = button.querySelector('.ob-label')?.textContent || '';

        if (key === 'content') {
            state.content = price;
            state.contentName = label;
        }

        if (key === 'seo') {
            state.seoMonthly = value === 'ongoing';
            state.seo = price;
            state.seoName = label;
        }

        if (key === 'platform') {
            state.platform = price;
            state.platformKey = value;
            state.platformName = label;
        }

        if (key === 'maintenance') {
            state.maintenance = price;
            state.maintenanceName = label;
        }

        if (key === 'timeline') {
            state.rush = parseInt(button.dataset.rush || '0', 10);
            state.rushName = label;
            const warning = document.getElementById('rush-warning');
            if (warning) warning.style.display = state.rush > 0 ? 'flex' : 'none';
        }

        recalc();
    }

    function toggleFeat(el) {
        el.classList.toggle('on');
        const key = el.dataset.key || '';
        const price = parseInt(el.dataset.price || '0', 10);
        const name = el.querySelector('.ft-name')?.textContent || '';

        if (el.classList.contains('on')) {
            state.features[key] = { name, price };
        } else {
            delete state.features[key];
        }

        recalc();
    }

    function onPagesChange(slider) {
        const value = parseInt(slider.value || '1', 10);
        state.pageCount = value;
        const valueEl = document.getElementById('pages-value');
        if (valueEl) valueEl.textContent = String(value);

        const pct = ((value - 1) / 29) * 100;
        slider.style.setProperty('--val', pct + '%');

        const tier = pagePrices.find((row) => value >= row[0] && value <= row[1]);
        state.pages = tier ? tier[2] : 140000;
        const priceNote = document.getElementById('pages-price-note');
        if (priceNote) {
            priceNote.innerHTML = `<span class="spn-plus">${state.pages > 0 ? '+' : ''}</span>${tier ? tier[3] : '+₦140,000+'}`;
        }

        recalc();
    }

    function recalc() {
        const featuresTotal = Object.values(state.features).reduce((sum, item) => sum + item.price, 0);
        const baseOnetime = state.type + state.pages + state.design + state.content + (state.seoMonthly ? 0 : state.seo) + state.platform + featuresTotal;
        const rushAmount = state.rush !== 0 ? Math.round(baseOnetime * state.rush / 100) : 0;
        const oneTimeTotal = baseOnetime + rushAmount;
        const monthlyTotal = state.maintenance + (state.seoMonthly ? state.seo : 0);

        renderBreakdown(oneTimeTotal, monthlyTotal, featuresTotal, rushAmount);
        renderComparison(oneTimeTotal);
        updateCompletion();
        setTotals(oneTimeTotal, monthlyTotal);
    }

    function renderBreakdown(oneTime, monthly, featuresTotal, rushAmount) {
        const oneTimeEl = document.getElementById('breakdown-onetime');
        const monthlyEl = document.getElementById('breakdown-monthly');
        const rows = [];

        rows.push({ color: dotColors.type, name: state.typeName, price: state.type });
        if (state.pages > 0) rows.push({ color: dotColors.pages, name: `Pages (${state.pageCount})`, price: state.pages });
        if (state.design > 0) rows.push({ color: dotColors.design, name: `${state.designName} Design`, price: state.design });
        if (state.content > 0) rows.push({ color: dotColors.content, name: 'Content / Copywriting', price: state.content });
        if (!state.seoMonthly && state.seo > 0) rows.push({ color: dotColors.seo, name: state.seoName, price: state.seo });
        if (state.platform > 0) rows.push({ color: dotColors.platform, name: `${state.platformName} Dev`, price: state.platform });
        Object.values(state.features).forEach((feature) => rows.push({ color: dotColors.feature, name: feature.name, price: feature.price }));
        if (rushAmount !== 0) rows.push({ color: dotColors.rush, name: `${state.rushName} adjustment`, price: rushAmount, isRush: true });

        oneTimeEl.innerHTML = rows.length === 0
            ? '<div style="font-size:.75rem;color:rgba(255,255,255,.2);padding:.4rem 0">Select options on the left</div>'
            : rows.map((row) => `
                <div class="bd-row">
                    <div class="bdr-left"><div class="bdr-dot" style="background:${row.color}"></div><span class="bdr-name">${esc(row.name)}</span></div>
                    <span class="bdr-price ${row.isRush ? 'rush' : row.price === 0 ? 'free' : ''}">${row.price === 0 ? 'Incl.' : (row.isRush && row.price < 0 ? '−' : '+') + fmt(Math.abs(row.price))}</span>
                </div>`).join('');

        const monthlyRows = [];
        if (state.maintenance > 0) monthlyRows.push({ name: state.maintenanceName, price: state.maintenance });
        if (state.seoMonthly && state.seo > 0) monthlyRows.push({ name: 'Ongoing SEO Management', price: state.seo });

        monthlyEl.innerHTML = monthlyRows.length === 0
            ? '<div style="font-size:.75rem;color:rgba(255,255,255,.2);padding:.4rem 0">No monthly costs selected</div>'
            : monthlyRows.map((row) => `
                <div class="bd-row">
                    <div class="bdr-left"><div class="bdr-dot" style="background:var(--warn)"></div><span class="bdr-name">${esc(row.name)}</span></div>
                    <span class="bdr-price" style="color:var(--warn)">${fmt(row.price)}/mo</span>
                </div>`).join('');

        document.getElementById('sum-features').textContent = fmt(featuresTotal);
        document.getElementById('sum-rush').textContent = rushAmount === 0 ? '—' : (rushAmount < 0 ? '−' : '+') + fmt(Math.abs(rushAmount));
        document.getElementById('sum-monthly').textContent = monthly > 0 ? `${fmt(monthly)}/mo` : '—';
        document.getElementById('sum-total').textContent = fmt(oneTime);
        document.getElementById('cost-subtitle').textContent = monthly > 0 ? `One-time + ${fmt(monthly)}/mo` : 'One-time cost';
        document.getElementById('hero-suffix').textContent = monthly > 0 ? `+ ${fmt(monthly)}/mo recurring` : 'One-time estimate';
    }

    function renderComparison(total) {
        const freelancer = Math.round(total * 0.7);
        const agency = Math.round(total * 2.2);
        document.getElementById('comp-freelancer').textContent = `~${fmt(freelancer)}`;
        document.getElementById('comp-i2m').textContent = fmt(total);
        document.getElementById('comp-agency').textContent = `~${fmt(agency)}`;
    }

    function updateCompletion() {
        let filled = 0;
        const total = 6;
        filled += 1;
        if (state.design > 0) filled += 1;
        if (Object.keys(state.features).length > 0) filled += 1;
        if (state.content > 0) filled += 1;
        if (state.seo > 0) filled += 1;
        if (state.platform > 0) filled += 1;

        const pct = Math.round((filled / total) * 100);
        document.getElementById('completion-fill').style.width = pct + '%';
        document.getElementById('completion-pct').textContent = pct + '%';
        document.getElementById('completion-label').textContent = pct === 100
            ? 'Estimate complete'
            : `${total - filled} section${total - filled !== 1 ? 's' : ''} remaining`;
    }

    function setTotals(oneTime, monthly) {
        document.getElementById('total-num').textContent = oneTime.toLocaleString('en-NG');
        document.getElementById('hero-total').textContent = `₦${oneTime.toLocaleString('en-NG')}`;
        document.getElementById('mobile-total').textContent = `₦${oneTime.toLocaleString('en-NG')}`;
        document.getElementById('cost-total').classList.add('animating');
        window.setTimeout(() => document.getElementById('cost-total').classList.remove('animating'), 250);
    }

    function getQuote() {
        const params = new URLSearchParams({
            source_page: 'tool-website-cost-calculator',
            source_label: 'Website Cost Calculator',
            estimate: String(document.getElementById('total-num').textContent || '').replace(/,/g, ''),
        });

        const service = mapPrimaryService();
        if (service) params.set('services', service);

        if (state.typeKey === 'ecommerce') {
            params.set('platform', state.platformKey === 'wordpress' ? 'woocommerce' : state.platformKey);
        }

        window.location.href = `${startRoute}?${params.toString()}`;
    }

    function mapPrimaryService() {
        if (state.typeKey === 'ecommerce') return 'ecommerce';
        if (state.typeKey === 'webapp') return state.platformKey === 'laravel' ? 'laravel' : 'saas';
        return 'webdesign';
    }

    function printEstimate() {
        try {
            window.localStorage.setItem(printStorageKey, JSON.stringify(getEstimatePayload()));
            const printWindow = window.open(printRoute, '_blank', 'noopener,noreferrer');

            if (!printWindow) {
                throw new Error('Popup blocked. Please allow popups, then try again.');
            }
        } catch (error) {
            window.alert(error?.message || 'Could not open the print view.');
        }
    }

    function resetCalc() {
        if (!window.confirm('Reset all selections?')) return;
        window.location.reload();
    }

    function fmt(n) {
        return '₦' + parseInt(n || 0, 10).toLocaleString('en-NG');
    }

    function esc(s) {
        return String(s || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }

    window.addEventListener('DOMContentLoaded', () => {
        const slider = document.getElementById('pages-slider');
        if (slider) {
            slider.style.setProperty('--val', ((5 - 1) / 29 * 100) + '%');
        }
        recalc();
    });

    Object.assign(window, {
        selectType,
        selectDesign,
        selectOption,
        toggleFeat,
        onPagesChange,
        getQuote,
        printEstimate,
        resetCalc,
    });
}
