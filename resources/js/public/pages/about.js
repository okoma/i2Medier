const fadeUpElements = document.querySelectorAll('.fade-up');

if (fadeUpElements.length > 0 && 'IntersectionObserver' in window) {
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
        { threshold: 0.12 }
    );

    fadeUpElements.forEach((element) => observer.observe(element));
}
