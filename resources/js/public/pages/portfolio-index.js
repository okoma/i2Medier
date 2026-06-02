document.addEventListener('DOMContentLoaded', () => {
    const revealElements = document.querySelectorAll('.reveal');

    if (revealElements.length > 0 && 'IntersectionObserver' in window) {
        const revealObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    const siblings = [...entry.target.parentElement.children].filter((child) =>
                        child.classList.contains('reveal')
                    );
                    const index = siblings.indexOf(entry.target);

                    entry.target.style.transitionDelay = `${index * 0.09}s`;
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                });
            },
            { threshold: 0.1 }
        );

        revealElements.forEach((element) => revealObserver.observe(element));
    }

    function animateCounter(element) {
        const target = Number.parseInt(element.dataset.target ?? '0', 10);

        if (!Number.isFinite(target)) {
            return;
        }

        const duration = 1800;
        const step = target / (duration / 16);
        let current = 0;

        const timer = window.setInterval(() => {
            current += step;

            if (current >= target) {
                current = target;
                window.clearInterval(timer);
            }

            element.textContent = Math.floor(current).toString();
        }, 16);
    }

    const counterElements = document.querySelectorAll('.counter');

    if (counterElements.length > 0 && 'IntersectionObserver' in window) {
        const counterObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                });
            },
            { threshold: 0.5 }
        );

        counterElements.forEach((element) => counterObserver.observe(element));
    }

    const filterButtons = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.port-card');
    const grid = document.getElementById('portGrid');

    if (!grid || filterButtons.length === 0) {
        return;
    }

    filterButtons.forEach((button) => {
        button.addEventListener('click', () => {
            filterButtons.forEach((item) => item.classList.remove('active'));
            button.classList.add('active');

            const filter = button.dataset.filter;
            const existingEmptyState = grid.querySelector('.empty-state');

            if (existingEmptyState) {
                existingEmptyState.remove();
            }

            let visibleCount = 0;

            cards.forEach((card) => {
                const categories = (card.dataset.cats || '').split(',').filter(Boolean);
                const shouldShow = filter === 'all' || categories.includes(filter);

                if (shouldShow) {
                    card.style.display = '';
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';

                    requestAnimationFrame(() => {
                        card.style.transition = 'opacity 0.35s ease, transform 0.35s ease';
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    });

                    visibleCount += 1;
                } else {
                    card.style.display = 'none';
                }
            });

            if (visibleCount === 0) {
                const emptyState = document.createElement('div');
                emptyState.className = 'empty-state';

                const icon = document.createElement('span');
                icon.textContent = '○';

                emptyState.appendChild(icon);
                emptyState.appendChild(document.createTextNode('No projects in this category yet.'));
                grid.appendChild(emptyState);
            }
        });
    });
});
