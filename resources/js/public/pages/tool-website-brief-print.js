import { renderWebsiteBriefDocument } from './website-brief-render';

const page = document.getElementById('website-brief-print-page');

if (page) {
    window.addEventListener('DOMContentLoaded', () => {
        const shell = document.querySelector('.print-shell');
        const storageKey = shell?.dataset.storageKey || 'i2medierWebsiteBriefPrintPayload';
        const briefDocument = document.getElementById('brief-document');
        const emptyState = document.getElementById('print-empty-state');

        let payload = null;

        try {
            payload = JSON.parse(window.localStorage.getItem(storageKey) || 'null');
        } catch {
            payload = null;
        }

        if (!payload?.brief || !payload?.data || !briefDocument) {
            if (emptyState) emptyState.hidden = false;
            if (briefDocument) briefDocument.hidden = true;
            return;
        }

        briefDocument.innerHTML = renderWebsiteBriefDocument(payload.brief, payload.data);

        window.setTimeout(() => {
            window.print();
        }, 250);
    });
}
