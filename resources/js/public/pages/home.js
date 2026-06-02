const homeNav = document.querySelector('.public-nav.is-home');

if (homeNav) {
    window.addEventListener(
        'scroll',
        () => {
            homeNav.classList.toggle('scrolled', window.scrollY > 40);
        },
        { passive: true }
    );
}

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

                entry.target.style.transitionDelay = `${index * 0.1}s`;
                entry.target.classList.add('visible');
                revealObserver.unobserve(entry.target);
            });
        },
        { threshold: 0.08 }
    );

    revealElements.forEach((element) => revealObserver.observe(element));
}

function animateCounter(element) {
    const target = Number.parseInt(element.dataset.target ?? '0', 10);

    if (!Number.isFinite(target)) {
        return;
    }

    const duration = 1600;
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
        { threshold: 0.6 }
    );

    counterElements.forEach((element) => counterObserver.observe(element));
}
