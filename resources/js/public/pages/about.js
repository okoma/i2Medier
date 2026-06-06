const obs = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            const siblings = [...entry.target.parentElement.children].filter((child) => child.classList.contains('reveal'));
            const idx = siblings.indexOf(entry.target);

            entry.target.style.transitionDelay = `${idx * 0.085}s`;
            entry.target.classList.add('visible');
            obs.unobserve(entry.target);
        }
    });
}, { threshold: 0.07 });

document.querySelectorAll('.reveal').forEach((el) => obs.observe(el));

const statObs = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            statObs.unobserve(entry.target);
        }
    });
}, { threshold: 0.3 });

document.querySelectorAll('.stat-item').forEach((el) => statObs.observe(el));

function animateCounter(el) {
    const target = parseInt(el.dataset.target, 10);
    const dur = 1600;
    const step = target / (dur / 16);
    let cur = 0;

    const timer = setInterval(() => {
        cur += step;

        if (cur >= target) {
            cur = target;
            clearInterval(timer);
        }

        el.textContent = Math.floor(cur);
    }, 16);
}

const counterObs = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            animateCounter(entry.target);
            counterObs.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.counter').forEach((el) => counterObs.observe(el));
