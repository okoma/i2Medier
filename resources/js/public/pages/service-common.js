export function initReveal(selector, threshold = 0.1, delayStep = 0.08) {
    const elements = document.querySelectorAll(selector);

    if (elements.length === 0 || !('IntersectionObserver' in window)) {
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                const siblings = entry.target.parentElement
                    ? [...entry.target.parentElement.children].filter((child) =>
                          child.classList.contains('reveal')
                      )
                    : [];
                const index = siblings.indexOf(entry.target);

                entry.target.style.transitionDelay = `${Math.max(index, 0) * delayStep}s`;
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            });
        },
        { threshold }
    );

    elements.forEach((element) => observer.observe(element));
}

export function initCounters(selector, threshold = 0.5, duration = 1800) {
    const elements = document.querySelectorAll(selector);

    if (elements.length === 0 || !('IntersectionObserver' in window)) {
        return;
    }

    function animateCounter(element) {
        const target = Number.parseInt(element.dataset.target ?? '0', 10);

        if (!Number.isFinite(target)) {
            return;
        }

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

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                animateCounter(entry.target);
                observer.unobserve(entry.target);
            });
        },
        { threshold }
    );

    elements.forEach((element) => observer.observe(element));
}

export function initFaqButtons(selector) {
    const buttons = document.querySelectorAll(selector);

    buttons.forEach((button) => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('aria-controls');
            const answer = id ? document.getElementById(id) : null;
            const isOpen = button.getAttribute('aria-expanded') === 'true';

            buttons.forEach((otherButton) => {
                otherButton.setAttribute('aria-expanded', 'false');
                const targetId = otherButton.getAttribute('aria-controls');
                const target = targetId ? document.getElementById(targetId) : null;

                if (target) {
                    target.classList.remove('open');
                }
            });

            if (!isOpen && answer) {
                button.setAttribute('aria-expanded', 'true');
                answer.classList.add('open');
            }
        });
    });
}
