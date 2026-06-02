import { initCounters, initFaqButtons, initReveal } from './service-common';

initReveal('.reveal', 0.08, 0.08);
initCounters('.counter', 0.5, 1800);
initFaqButtons('.faq-q');

document.querySelectorAll('.code-tab').forEach((tab) => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.code-tab').forEach((item) => item.classList.remove('active'));
        document.querySelectorAll('.code-panel').forEach((panel) => panel.classList.remove('active'));

        tab.classList.add('active');

        const panelId = tab.dataset.panel;
        const panel = panelId ? document.getElementById(panelId) : null;

        if (panel) {
            panel.classList.add('active');
        }
    });
});

const processCards = document.querySelectorAll('.ps-card');
const processNavItems = document.querySelectorAll('.pnav-item');

if (processCards.length > 0 && processNavItems.length > 0 && 'IntersectionObserver' in window) {
    const processObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                const id = entry.target.id;

                processNavItems.forEach((item) => {
                    item.classList.toggle('active', item.getAttribute('href') === `#${id}`);
                });
            });
        },
        { threshold: 0.5 }
    );

    processCards.forEach((card) => processObserver.observe(card));
}
