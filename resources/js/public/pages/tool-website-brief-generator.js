import { initFaqButtons } from './service-common.js';
import { renderWebsiteBriefDocument } from './website-brief-render';
initFaqButtons('.faq-q');

const page = document.getElementById('website-brief-generator-page');

if (page) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const generateRoute = page.dataset.generateRoute || '';
    const printRoute = page.dataset.printRoute || '';
    const startRoute = page.dataset.startRoute || '/start';
    const honeypotField = page.dataset.honeypotField || 'company_website';
    const honeypotTimeField = page.dataset.honeypotTimeField || 'form_started_at';
    const honeypotStartedAt = page.dataset.honeypotStartedAt || '';
    const printStorageKey = 'i2medierWebsiteBriefPrintPayload';
    let currentStep = 1;
    const totalSteps = 6;
    const selectedPages = new Set(['Home', 'About', 'Services', 'Contact']);
    const selectedFeatures = new Set();
    let selectedStyle = '';
    let selectedWebsiteType = '';
    let selectedTimeline = '';
    let selectedBudget = '';
    let latestBrief = null;
    let latestData = null;

    const loadingMessages = [
        'Organising your project information…',
        'Mapping your business goals…',
        'Structuring the site architecture…',
        'Defining feature requirements…',
        'Calculating timeline estimates…',
        'Writing your project brief…',
    ];

    window.addEventListener('DOMContentLoaded', () => {
        document.getElementById('pages-grid')?.addEventListener('click', (event) => {
            const card = event.target.closest('.page-check');
            if (!card) return;

            card.classList.toggle('checked');
            const value = card.dataset.val;
            const checkbox = card.querySelector('.page-check-box');

            if (card.classList.contains('checked')) {
                selectedPages.add(value);
                if (checkbox) checkbox.textContent = '✓';
            } else {
                selectedPages.delete(value);
                if (checkbox) checkbox.textContent = '';
            }
        });

        document.querySelectorAll('.feat-check').forEach((item) => {
            item.addEventListener('click', () => {
                item.classList.toggle('checked');
                const value = item.dataset.val;
                const checkbox = item.querySelector('.feat-cb');

                if (item.classList.contains('checked')) {
                    selectedFeatures.add(value);
                    if (checkbox) checkbox.textContent = '✓';
                } else {
                    selectedFeatures.delete(value);
                    if (checkbox) checkbox.textContent = '';
                }
            });
        });
    });

    function selectOption(gridId, card) {
        document.querySelectorAll(`#${gridId} .option-card`).forEach((item) => item.classList.remove('selected'));
        card.classList.add('selected');

        if (gridId === 'website-type-grid') {
            selectedWebsiteType = card.dataset.val || '';
        }

        document.getElementById('err-website-type')?.classList.remove('show');
    }

    function selectStyle(card) {
        document.querySelectorAll('#style-grid .style-card').forEach((item) => {
            item.classList.remove('selected');
            const check = item.querySelector('.sc-check');
            if (check) check.textContent = '';
        });

        card.classList.add('selected');
        const check = card.querySelector('.sc-check');
        if (check) check.textContent = '✓';
        selectedStyle = card.dataset.val || '';
        document.getElementById('err-style')?.classList.remove('show');
    }

    function selectPrio(groupId, pill) {
        document.querySelectorAll(`#${groupId} .prio-pill`).forEach((item) => item.classList.remove('selected'));
        pill.classList.add('selected');

        if (groupId === 'timeline-group') {
            selectedTimeline = pill.dataset.val || '';
            document.getElementById('err-timeline')?.classList.remove('show');
        }

        if (groupId === 'budget-group') {
            selectedBudget = pill.dataset.val || '';
            document.getElementById('err-budget')?.classList.remove('show');
        }
    }

    function nextStep(from) {
        if (!validateStep(from)) return;
        goToStep(from + 1);
    }

    function prevStep(from) {
        goToStep(from - 1);
    }

    function goToStep(step) {
        document.getElementById(`step-${currentStep}`)?.classList.remove('active');
        currentStep = step;
        document.getElementById(`step-${step}`)?.classList.add('active');
        updateIndicator();
        document.getElementById('form-view')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function updateIndicator() {
        const pct = (currentStep / totalSteps) * 100;
        const fill = document.getElementById('progress-fill');
        if (fill) fill.style.width = pct + '%';

        for (let i = 1; i <= totalSteps; i += 1) {
            const step = document.querySelector(`.si-step[data-step="${i}"]`);
            const num = document.getElementById(`sin-${i}`);
            if (!step || !num) continue;

            step.classList.remove('active', 'done');

            if (i < currentStep) {
                step.classList.add('done');
                num.textContent = '✓';
            } else if (i === currentStep) {
                step.classList.add('active');
                num.textContent = String(i);
            } else {
                num.textContent = String(i);
            }
        }
    }

    function validateStep(step) {
        let valid = true;

        const req = (id, errId) => {
            const el = document.getElementById(id);
            const val = el?.value?.trim() || '';
            if (!val) {
                document.getElementById(errId)?.classList.add('show');
                valid = false;
            } else {
                document.getElementById(errId)?.classList.remove('show');
            }
        };

        if (step === 1) {
            req('biz-name', 'err-biz-name');
            req('biz-industry', 'err-biz-industry');
            req('biz-desc', 'err-biz-desc');
            req('biz-audience', 'err-biz-audience');
        }

        if (step === 2) {
            if (!selectedWebsiteType) {
                document.getElementById('err-website-type')?.classList.add('show');
                valid = false;
            }
            req('primary-goal', 'err-primary-goal');
        }

        if (step === 3) {
            if (selectedPages.size === 0) {
                document.getElementById('err-pages')?.classList.add('show');
                valid = false;
            } else {
                document.getElementById('err-pages')?.classList.remove('show');
            }
        }

        if (step === 4 && !selectedStyle) {
            document.getElementById('err-style')?.classList.add('show');
            valid = false;
        }

        if (step === 6) {
            if (!selectedTimeline) {
                document.getElementById('err-timeline')?.classList.add('show');
                valid = false;
            }
            if (!selectedBudget) {
                document.getElementById('err-budget')?.classList.add('show');
                valid = false;
            }
        }

        return valid;
    }

    function collectData() {
        const value = (id) => (document.getElementById(id)?.value || '').trim();

        return {
            [honeypotField]: '',
            [honeypotTimeField]: honeypotStartedAt,
            bizName: value('biz-name'),
            bizIndustry: value('biz-industry'),
            bizDesc: value('biz-desc'),
            bizAudience: value('biz-audience'),
            bizLocation: value('biz-location'),
            bizCurrentUrl: value('biz-current-url'),
            bizCompetitors: value('biz-competitors'),
            websiteType: selectedWebsiteType,
            primaryGoal: value('primary-goal'),
            successMetrics: value('success-metrics'),
            stakeholders: value('stakeholders'),
            pages: [...selectedPages],
            contentStatus: value('content-status'),
            copywriting: value('copywriting'),
            specialPages: value('special-pages'),
            visualStyle: selectedStyle,
            colors: {
                primary: document.getElementById('color1')?.value || '#0d0d0d',
                accent: document.getElementById('color2')?.value || '#c8a96e',
                bg: document.getElementById('color3')?.value || '#f7f6f2',
            },
            noBrandColors: Boolean(document.getElementById('no-brand-colors')?.checked),
            sitesLove: value('sites-love'),
            sitesAvoid: value('sites-avoid'),
            designNotes: value('design-notes'),
            features: [...selectedFeatures],
            platform: value('platform'),
            domainStatus: value('domain-status'),
            hosting: value('hosting'),
            existingTools: value('existing-tools'),
            seoReq: value('seo-req'),
            timeline: selectedTimeline,
            budget: selectedBudget,
            extraNotes: value('extra-notes'),
        };
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
            throw new Error(data?.message || 'Brief generation failed.');
        }

        return data;
    }

    async function generateBrief() {
        if (!validateStep(6)) return;

        const data = collectData();
        const button = document.getElementById('gen-brief-btn');
        button?.classList.add('loading');
        if (button) button.disabled = true;

        document.getElementById('form-view').style.display = 'none';
        document.getElementById('step-indicator').style.display = 'none';
        document.getElementById('progress-strip').style.display = 'none';
        document.getElementById('loading-view').style.display = 'block';
        document.getElementById('loading-view')?.scrollIntoView({ behavior: 'smooth', block: 'start' });

        let phase = 0;
        const phases = ['lp1', 'lp2', 'lp3', 'lp4', 'lp5', 'lp6'];
        const phaseTimer = window.setInterval(() => {
            if (phase > 0) {
                const prev = document.getElementById(phases[phase - 1]);
                prev?.classList.remove('active');
                prev?.classList.add('done');
                const prevIcon = document.getElementById(`lpi${phase}`);
                if (prevIcon) prevIcon.textContent = '✓';
            }

            if (phase < phases.length) {
                document.getElementById(phases[phase])?.classList.add('active');
                const nextIcon = document.getElementById(`lpi${phase + 1}`);
                if (nextIcon) nextIcon.innerHTML = '<div class="lv-spinner"></div>';
            }

            phase += 1;
            const msg = document.getElementById('lv-msg');
            if (msg) msg.textContent = loadingMessages[Math.min(phase, loadingMessages.length - 1)];
        }, 1500);

        try {
            const response = await postJson(data);
            latestData = data;
            latestBrief = response.brief || {};
            window.clearInterval(phaseTimer);

            phases.forEach((key, index) => {
                document.getElementById(key)?.classList.remove('active');
                document.getElementById(key)?.classList.add('done');
                const icon = document.getElementById(`lpi${index + 1}`);
                if (icon) icon.textContent = '✓';
            });

            window.setTimeout(() => {
                document.getElementById('loading-view').style.display = 'none';
                renderBrief(latestBrief, data);
            }, 600);
        } catch (error) {
            window.clearInterval(phaseTimer);
            document.getElementById('loading-view').style.display = 'none';
            document.getElementById('form-view').style.display = 'block';
            document.getElementById('step-indicator').style.display = 'block';
            document.getElementById('progress-strip').style.display = 'block';
            button?.classList.remove('loading');
            if (button) button.disabled = false;
            toast(error?.message || 'Brief generation failed. Please try again.');
        }
    }

    function renderBrief(brief, data) {
        const refNum = brief.refNumber || `WB-${new Date().getFullYear()}-001`;
        const refDisplay = document.getElementById('brief-ref-display');
        if (refDisplay) refDisplay.textContent = refNum;
        document.getElementById('brief-document').innerHTML = renderWebsiteBriefDocument(brief, data, {
            footerNote: 'This brief is a working document — subject to revision after discovery call',
        });

        document.getElementById('brief-view').style.display = 'block';
        document.getElementById('nav-new-btn').style.display = 'flex';
        document.getElementById('nav-print-btn').style.display = 'flex';
        document.getElementById('nav-start-project-btn').style.display = 'flex';
        document.getElementById('brief-view')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    async function printBrief() {
        if (!latestBrief || !latestData) {
            toast('Generate the brief first before opening the print view.');
            return;
        }

        const buttons = [
            document.getElementById('nav-print-btn'),
            document.querySelector('.ba-btn.print'),
        ].filter(Boolean);

        buttons.forEach((button) => {
            button.disabled = true;
            button.dataset.originalText = button.innerHTML;
            button.innerHTML = 'Opening print view...';
        });

        try {
            window.localStorage.setItem(printStorageKey, JSON.stringify({
                data: latestData,
                brief: latestBrief,
                savedAt: Date.now(),
            }));

            const printWindow = window.open(printRoute, '_blank', 'noopener,noreferrer');
            if (!printWindow) {
                throw new Error('Popup blocked. Please allow popups, then try again.');
            }

            toast('Print view opened. Use Save as PDF in the print dialog.');
        } catch (error) {
            toast(error?.message || 'Could not open the print view. Please try again.');
        } finally {
            buttons.forEach((button) => {
                button.disabled = false;
                if (button.dataset.originalText) {
                    button.innerHTML = button.dataset.originalText;
                }
            });
        }
    }

    function copyBrief() {
        const text = document.getElementById('brief-document')?.innerText || '';
        navigator.clipboard.writeText(text)
            .then(() => toast('Brief copied to clipboard.'))
            .catch(() => toast('Could not copy — try printing to PDF instead.'));
    }

    function startProject() {
        if (!latestBrief || !latestData) {
            toast('Generate the brief first before starting a project.');
            return;
        }

        // Save brief data to localStorage so the print page can generate a PDF
        window.localStorage.setItem(printStorageKey, JSON.stringify({
            data: latestData,
            brief: latestBrief,
            savedAt: Date.now(),
        }));

        // Pass pre-fill data to the onboarding form via sessionStorage
        const briefText = document.getElementById('brief-document')?.innerText?.trim() || '';
        window.sessionStorage.setItem('i2medierBriefHandoff', JSON.stringify({
            version: 1,
            bizName: latestData.bizName || '',
            websiteType: latestData.websiteType || '',
            pages: latestData.pages || [],
            timeline: latestData.timeline || '',
            budget: latestData.budget || '',
            domainStatus: latestData.domainStatus || '',
            hosting: latestData.hosting || '',
            briefText: briefText.slice(0, 4800),
            printRoute,
            savedAt: Date.now(),
        }));

        window.location.href = startRoute;
    }

    function resetAll() {
        if (!window.confirm('Start a new brief? Your current brief will be lost.')) return;
        window.location.reload();
    }

    function toast(message, duration = 3500) {
        const el = document.getElementById('toast');
        if (!el) return;
        el.textContent = message;
        el.style.transform = 'translateY(0)';
        el.style.opacity = '1';
        window.setTimeout(() => {
            el.style.transform = 'translateY(20px)';
            el.style.opacity = '0';
        }, duration);
    }

    Object.assign(window, {
        selectOption,
        selectStyle,
        selectPrio,
        nextStep,
        prevStep,
        generateBrief,
        printBrief,
        copyBrief,
        startProject,
        resetAll,
    });
}
