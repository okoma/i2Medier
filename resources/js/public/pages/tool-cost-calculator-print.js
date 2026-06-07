const page = document.getElementById('website-cost-calculator-print-page');

if (page) {
    window.addEventListener('DOMContentLoaded', () => {
        const shell = document.querySelector('.print-shell');
        const storageKey = shell?.dataset.storageKey || 'i2medierCostCalculatorPrintPayload';
        const documentEl = document.getElementById('cost-estimate-document');
        const emptyState = document.getElementById('print-empty-state');

        let payload = null;

        try {
            payload = JSON.parse(window.localStorage.getItem(storageKey) || 'null');
        } catch {
            payload = null;
        }

        if (!payload?.summary || !documentEl) {
            if (emptyState) emptyState.hidden = false;
            if (documentEl) documentEl.hidden = true;
            return;
        }

        const fmt = (value) => `₦${parseFloat(value || 0).toLocaleString('en-NG')}`;
        const monthly = payload.summary.monthlyTotal > 0 ? `${fmt(payload.summary.monthlyTotal)}/mo` : 'No recurring plan selected';
        const rowsHtml = (payload.rows || []).map((row) => `
            <tr>
                <td>${escapeHtml(row.group)}</td>
                <td>${escapeHtml(row.name)}</td>
                <td>${row.price < 0 ? '-' : ''}${fmt(Math.abs(row.price))}</td>
            </tr>
        `).join('');

        documentEl.innerHTML = `
            <header class="estimate-header">
                <div>
                    <div class="estimate-brand">i2Medi<span>er</span></div>
                    <div class="estimate-eyebrow">Website Cost Estimate</div>
                    <div class="estimate-title">${escapeHtml(payload.state.typeName || 'Website Project')}</div>
                    <div class="estimate-subtitle">Prepared from the i2Medier website cost calculator for the Nigerian market. This is a planning estimate to guide discovery and quoting.</div>
                </div>
                <div class="estimate-summary">
                    <div class="sum-label">One-time estimate</div>
                    <div class="sum-total">${fmt(payload.summary.oneTimeTotal)}</div>
                    <div class="sum-recurring">${monthly}</div>
                </div>
            </header>

            <section class="estimate-grid">
                <div class="panel">
                    <h2 class="panel-title">Itemised Estimate</h2>
                    <table class="line-items">
                        <thead>
                            <tr>
                                <th>Section</th>
                                <th>Item</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>${rowsHtml}</tbody>
                    </table>
                </div>

                <div class="panel">
                    <h2 class="panel-title">Project Snapshot</h2>
                    <div class="small-list">
                        <div class="small-item"><div class="small-item__label">Pages</div><div class="small-item__value">${escapeHtml(String(payload.state.pageCount || 0))}</div></div>
                        <div class="small-item"><div class="small-item__label">Design</div><div class="small-item__value">${escapeHtml(payload.state.designName || 'Not selected')}</div></div>
                        <div class="small-item"><div class="small-item__label">Content</div><div class="small-item__value">${escapeHtml(payload.state.contentName || 'Not selected')}</div></div>
                        <div class="small-item"><div class="small-item__label">SEO</div><div class="small-item__value">${escapeHtml(payload.state.seoName || 'Not selected')}</div></div>
                        <div class="small-item"><div class="small-item__label">Platform</div><div class="small-item__value">${escapeHtml(payload.state.platformName || 'Not selected')}</div></div>
                        <div class="small-item"><div class="small-item__label">Timeline</div><div class="small-item__value">${escapeHtml(payload.state.rushName || 'Standard')}</div></div>
                        <div class="small-item"><div class="small-item__label">Monthly support</div><div class="small-item__value">${payload.summary.monthlyTotal > 0 ? monthly : escapeHtml(payload.state.maintenanceName || 'None')}</div></div>
                    </div>
                </div>
            </section>

            <section class="comparison panel">
                <h2 class="panel-title">Provider Comparison</h2>
                <div class="comparison-grid">
                    <div class="comparison-card">
                        <div class="comparison-label">Freelancer</div>
                        <div class="comparison-value">~${fmt(payload.comparison.freelancer)}</div>
                    </div>
                    <div class="comparison-card comparison-card--highlight">
                        <div class="comparison-label">i2Medier</div>
                        <div class="comparison-value">${fmt(payload.comparison.i2medier)}</div>
                    </div>
                    <div class="comparison-card">
                        <div class="comparison-label">Large Agency</div>
                        <div class="comparison-value">~${fmt(payload.comparison.agency)}</div>
                    </div>
                </div>
            </section>

            <footer class="estimate-footer">
                Estimated on ${new Date(payload.generatedAt || Date.now()).toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' })}. Final project scope, schedule, and pricing are confirmed after discovery and technical review.
            </footer>
        `;

        window.setTimeout(() => window.print(), 250);
    });
}

function escapeHtml(value) {
    return String(value || '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
}
