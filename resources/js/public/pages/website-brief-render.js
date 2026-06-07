function esc(value) {
    return String(value || '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;');
}

function renderTable(rows = []) {
    if (!Array.isArray(rows) || rows.length === 0) {
        return '';
    }

    return `<table class="brief-table">${rows.map((row) => `
        <tr>
            <td>${esc(row.key)}</td>
            <td>${esc(row.value)}</td>
        </tr>
    `).join('')}</table>`;
}

function renderParagraphs(paragraphs = []) {
    return paragraphs
        .filter(Boolean)
        .map((paragraph) => `<p class="bs-body">${esc(paragraph)}</p>`)
        .join('');
}

function renderSections(brief) {
    let html = (brief.sections || []).map((section, index) => `
        <section class="brief-section">
            <span class="bs-number">Section ${section.number || String(index + 1).padStart(2, '0')}</span>
            <h2 class="bs-title">${esc(section.title)}</h2>
            ${renderTable(section.table)}
            ${renderParagraphs(section.paragraphs)}
        </section>
    `).join('');

    if (brief.siteArchitecture) {
        const pagesHtml = (brief.siteArchitecture.pages || []).map((item) => `
            <li><strong>${esc(item.name)}</strong> - ${esc(item.purpose)}</li>
        `).join('');

        html += `
            <section class="brief-section">
                <span class="bs-number">Section ${String(((brief.sections?.length) || 0) + 1).padStart(2, '0')}</span>
                <h2 class="bs-title">Site Architecture</h2>
                <p class="bs-body">${esc(brief.siteArchitecture.description || '')}</p>
                ${pagesHtml ? `<ul class="brief-list">${pagesHtml}</ul>` : ''}
            </section>
        `;
    }

    if (brief.featureRequirements) {
        html += `
            <section class="brief-section">
                <span class="bs-number">Section ${String(((brief.sections?.length) || 0) + 2).padStart(2, '0')}</span>
                <h2 class="bs-title">Feature Requirements</h2>
                <div class="feature-split">
                    <div class="fs-col">
                        <span class="fs-col-head must">Must Have</span>
                        ${(brief.featureRequirements.mustHave || []).map((item) => `<div class="fs-item">${esc(item)}</div>`).join('')}
                    </div>
                    <div class="fs-col">
                        <span class="fs-col-head nice">Nice to Have</span>
                        ${(brief.featureRequirements.niceToHave || []).map((item) => `<div class="fs-item">${esc(item)}</div>`).join('')}
                    </div>
                    <div class="fs-col">
                        <span class="fs-col-head future">Out of Scope</span>
                        ${(brief.featureRequirements.outOfScope || []).map((item) => `<div class="fs-item">${esc(item)}</div>`).join('')}
                    </div>
                </div>
            </section>
        `;
    }

    if (Array.isArray(brief.timeline) && brief.timeline.length > 0) {
        html += `
            <section class="brief-section">
                <span class="bs-number">Section ${String(((brief.sections?.length) || 0) + 3).padStart(2, '0')}</span>
                <h2 class="bs-title">Proposed Timeline & Milestones</h2>
                <div class="brief-timeline">
                    ${brief.timeline.map((item, index) => `
                        <div class="bt-phase">
                            <div class="bt-phase-num">Phase ${index + 1}</div>
                            <div class="bt-phase-name">${esc(item.phase)}</div>
                            <div class="bt-phase-duration">${esc(item.duration)}</div>
                            <div class="bt-phase-detail">${(item.deliverables || []).map((deliverable) => `• ${esc(deliverable)}`).join(' ')}</div>
                        </div>
                    `).join('')}
                </div>
                ${brief.budgetGuidance ? `<p class="bs-body">${esc(brief.budgetGuidance)}</p>` : ''}
            </section>
        `;
    }

    if (Array.isArray(brief.nextSteps) && brief.nextSteps.length > 0) {
        html += `
            <section class="brief-section">
                <span class="bs-number">Section ${String(((brief.sections?.length) || 0) + 4).padStart(2, '0')}</span>
                <h2 class="bs-title">Next Steps & Action Items</h2>
                <div class="brief-next-steps">
                    ${brief.nextSteps.map((step, index) => `
                        <div class="bns-item">
                            <div class="bns-num">${index + 1}</div>
                            <div class="bns-text">${esc(step)}</div>
                        </div>
                    `).join('')}
                </div>
            </section>
        `;
    }

    return html;
}

export function renderWebsiteBriefDocument(brief, data, options = {}) {
    const refNum = brief.refNumber || `WB-${new Date().getFullYear()}-001`;
    const today = new Date().toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' });
    const preparedBy = options.preparedBy || 'i2Medier Konceptz';
    const footerNote = options.footerNote || 'This brief is a working document and may be refined after the discovery call.';

    return `
        <header class="brief-cover">
            <div class="bc-logo">i2Medi<span>er</span></div>
            <span class="bc-label">Website Project Brief</span>
            <div class="bc-title">${esc(data.bizName)}</div>
            <div class="bc-client">${esc(data.websiteType)} - ${esc(data.bizIndustry)}</div>
            <div class="bc-meta">
                <div class="bc-meta-item"><span class="bc-meta-label">Reference</span><span class="bc-meta-val">${esc(refNum)}</span></div>
                <div class="bc-meta-item"><span class="bc-meta-label">Prepared</span><span class="bc-meta-val">${today}</span></div>
                <div class="bc-meta-item"><span class="bc-meta-label">Prepared For</span><span class="bc-meta-val">${esc(data.bizName)}</span></div>
                <div class="bc-meta-item"><span class="bc-meta-label">Prepared By</span><span class="bc-meta-val">${esc(preparedBy)}</span></div>
                <div class="bc-meta-item"><span class="bc-meta-label">Budget</span><span class="bc-meta-val">${esc(data.budget)}</span></div>
                <div class="bc-meta-item"><span class="bc-meta-label">Timeline</span><span class="bc-meta-val">${esc(data.timeline)}</span></div>
            </div>
        </header>

        <div class="brief-body">
            ${brief.executiveSummary ? `
                <section class="brief-summary">
                    <span class="bs-number">Executive Summary</span>
                    <p>${esc(brief.executiveSummary)}</p>
                </section>
            ` : ''}
            ${renderSections(brief)}
        </div>

        <footer class="brief-footer">
            <div class="bf-brand">i2Medi<span>er</span> Konceptz</div>
            <div class="bf-note">${esc(footerNote)}</div>
            <div class="bf-ref">${esc(refNum)} - ${today}</div>
        </footer>
    `;
}
