document.addEventListener('DOMContentLoaded', () => {
    const fadeUpElements = document.querySelectorAll('.fade-up');

    if (fadeUpElements.length === 0 || !('IntersectionObserver' in window)) {
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('visible');
            });
        },
        { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
    );

    fadeUpElements.forEach((element) => observer.observe(element));
});
