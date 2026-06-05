const page = document.getElementById('website-brief-generator-page');

if (page) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    const generateRoute = page.dataset.generateRoute || '';
    let currentStep = 1;
    const totalSteps = 6;
    const selectedPages = new Set(['Home', 'About', 'Services', 'Contact']);
    const selectedFeatures = new Set();
    let selectedStyle = '';
    let selectedWebsiteType = '';
    let selectedTimeline = '';
    let selectedBudget = '';

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
            window.clearInterval(phaseTimer);

            phases.forEach((key, index) => {
                document.getElementById(key)?.classList.remove('active');
                document.getElementById(key)?.classList.add('done');
                const icon = document.getElementById(`lpi${index + 1}`);
                if (icon) icon.textContent = '✓';
            });

            window.setTimeout(() => {
                document.getElementById('loading-view').style.display = 'none';
                renderBrief(response.brief || {}, data);
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
        const today = new Date().toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' });
        const refDisplay = document.getElementById('brief-ref-display');
        if (refDisplay) refDisplay.textContent = refNum;

        let sectionsHtml = (brief.sections || []).map((section, index) => {
            let tableHtml = '';
            if (Array.isArray(section.table) && section.table.length > 0) {
                tableHtml = `<table class="brief-table">${section.table.map((row) => `<tr><td>${esc(row.key)}</td><td>${esc(row.value)}</td></tr>`).join('')}</table>`;
            }

            const paragraphs = (section.paragraphs || []).map((p) => `<p class="bs-body">${esc(p)}</p>`).join('');

            return `<div class="brief-section" style="animation-delay:${index * 0.06}s">
                <span class="bs-number">Section ${section.number || String(index + 1).padStart(2, '0')}</span>
                <h3 class="bs-title">${esc(section.title)}</h3>
                ${tableHtml}${paragraphs}
            </div>`;
        }).join('');

        if (brief.siteArchitecture) {
            const pagesHtml = (brief.siteArchitecture.pages || []).map((item) => `<li><strong>${esc(item.name)}</strong> — ${esc(item.purpose)}</li>`).join('');
            sectionsHtml += `<div class="brief-section" style="animation-delay:${((brief.sections?.length) || 0) * 0.06 + 0.06}s">
                <span class="bs-number">Section ${String(((brief.sections?.length) || 0) + 1).padStart(2, '0')}</span>
                <h3 class="bs-title">Site Architecture</h3>
                <p class="bs-body">${esc(brief.siteArchitecture.description || '')}</p>
                ${pagesHtml ? `<ul class="brief-list">${pagesHtml}</ul>` : ''}
            </div>`;
        }

        if (brief.featureRequirements) {
            const baseDelay = (((brief.sections?.length) || 0) + 2) * 0.06;
            sectionsHtml += `<div class="brief-section" style="animation-delay:${baseDelay}s">
                <span class="bs-number">Section ${String(((brief.sections?.length) || 0) + 2).padStart(2, '0')}</span>
                <h3 class="bs-title">Feature Requirements</h3>
                <div class="feature-split">
                    <div class="fs-col">
                        <span class="fs-col-head must">Must Have</span>
                        <div class="fs-items">${(brief.featureRequirements.mustHave || []).map((item) => `<div class="fs-item">${esc(item)}</div>`).join('')}</div>
                    </div>
                    <div class="fs-col">
                        <span class="fs-col-head nice">Nice to Have</span>
                        <div class="fs-items">${(brief.featureRequirements.niceToHave || []).map((item) => `<div class="fs-item">${esc(item)}</div>`).join('')}</div>
                    </div>
                    <div class="fs-col">
                        <span class="fs-col-head future">Out of Scope</span>
                        <div class="fs-items">${(brief.featureRequirements.outOfScope || []).map((item) => `<div class="fs-item">${esc(item)}</div>`).join('')}</div>
                    </div>
                </div>
            </div>`;
        }

        if (Array.isArray(brief.timeline) && brief.timeline.length > 0) {
            const baseDelay = (((brief.sections?.length) || 0) + 3) * 0.06;
            const timelineHtml = brief.timeline.map((item, index) => `
                <div class="bt-phase">
                    <div class="bt-phase-num">Phase ${index + 1}</div>
                    <div class="bt-phase-body">
                        <div class="bt-phase-name">${esc(item.phase)} <span style="font-weight:400;color:var(--gold-dk);font-size:.78rem"> · ${esc(item.duration)}</span></div>
                        <div class="bt-phase-detail">${(item.deliverables || []).map((deliverable) => `• ${esc(deliverable)}`).join('  ')}</div>
                    </div>
                </div>`).join('');

            sectionsHtml += `<div class="brief-section" style="animation-delay:${baseDelay}s">
                <span class="bs-number">Section ${String(((brief.sections?.length) || 0) + 3).padStart(2, '0')}</span>
                <h3 class="bs-title">Proposed Timeline & Milestones</h3>
                <div class="brief-timeline">${timelineHtml}</div>
                ${brief.budgetGuidance ? `<p class="bs-body" style="margin-top:.75rem">${esc(brief.budgetGuidance)}</p>` : ''}
            </div>`;
        }

        if (Array.isArray(brief.nextSteps) && brief.nextSteps.length > 0) {
            const baseDelay = (((brief.sections?.length) || 0) + 4) * 0.06;
            sectionsHtml += `<div class="brief-section" style="animation-delay:${baseDelay}s">
                <span class="bs-number">Section ${String(((brief.sections?.length) || 0) + 4).padStart(2, '0')}</span>
                <h3 class="bs-title">Next Steps & Action Items</h3>
                <div class="brief-next-steps">${brief.nextSteps.map((step, index) => `<div class="bns-item"><div class="bns-num">${index + 1}</div><div class="bns-text">${esc(step)}</div></div>`).join('')}</div>
            </div>`;
        }

        document.getElementById('brief-document').innerHTML = `
            <div class="brief-cover">
                <div class="bc-logo">i2Medi<span>er</span></div>
                <span class="bc-label">Website Project Brief</span>
                <div class="bc-title">${esc(data.bizName)}</div>
                <div class="bc-client">${esc(data.websiteType)} — ${esc(data.bizIndustry)}</div>
                <div class="bc-meta">
                    <div class="bc-meta-item"><span class="bc-meta-label">Reference</span><span class="bc-meta-val">${esc(refNum)}</span></div>
                    <div class="bc-meta-item"><span class="bc-meta-label">Prepared</span><span class="bc-meta-val">${today}</span></div>
                    <div class="bc-meta-item"><span class="bc-meta-label">Prepared For</span><span class="bc-meta-val">${esc(data.bizName)}</span></div>
                    <div class="bc-meta-item"><span class="bc-meta-label">Prepared By</span><span class="bc-meta-val">i2Medier Konceptz</span></div>
                    <div class="bc-meta-item"><span class="bc-meta-label">Budget</span><span class="bc-meta-val">${esc(data.budget)}</span></div>
                    <div class="bc-meta-item"><span class="bc-meta-label">Timeline</span><span class="bc-meta-val">${esc(data.timeline)}</span></div>
                </div>
            </div>
            <div class="brief-gold-stripe"></div>
            <div class="brief-body">
                ${brief.executiveSummary ? `<div class="brief-section" style="background:var(--off);border-radius:8px;padding:1.5rem;margin-bottom:2rem;border:1px solid var(--g200)"><span class="bs-number" style="margin-bottom:.3rem">Executive Summary</span><p style="font-size:.95rem;color:var(--g700);line-height:1.9;font-style:italic">${esc(brief.executiveSummary)}</p></div>` : ''}
                ${sectionsHtml}
            </div>
            <div class="brief-footer">
                <div class="bf-brand">i2Medi<span>er</span> Konceptz</div>
                <div class="bf-note">This brief is a working document — subject to revision after discovery call</div>
                <div class="bf-ref">${esc(refNum)} · ${today}</div>
            </div>
        `;

        document.getElementById('brief-view').style.display = 'block';
        document.getElementById('nav-new-btn').style.display = 'flex';
        document.getElementById('nav-print-btn').style.display = 'flex';
        document.getElementById('brief-view')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function printBrief() {
        const bizName = (document.getElementById('biz-name')?.value || 'Website-Brief').trim().replace(/\s+/g, '-');
        const originalTitle = document.title;
        document.title = `Brief-${bizName}`;
        window.print();
        document.title = originalTitle;
    }

    function copyBrief() {
        const text = document.getElementById('brief-document')?.innerText || '';
        navigator.clipboard.writeText(text)
            .then(() => toast('Brief copied to clipboard.'))
            .catch(() => toast('Could not copy — try printing to PDF instead.'));
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

    function esc(value) {
        return String(value || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;');
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
        resetAll,
    });
}
