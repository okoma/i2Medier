document.addEventListener('DOMContentLoaded', () => {
    const revealElements = document.querySelectorAll('.blog-archive-page .reveal');

    if (revealElements.length === 0 || !('IntersectionObserver' in window)) {
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            });
        },
        { threshold: 0.1 }
    );

    revealElements.forEach((element) => observer.observe(element));
});
