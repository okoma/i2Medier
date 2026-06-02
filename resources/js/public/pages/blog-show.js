document.addEventListener('DOMContentLoaded', () => {
    const progressBar = document.getElementById('readingProgress');
    const article = document.getElementById('article');
    const copyButton = document.getElementById('copyArticleLink');

    if (progressBar && article) {
        window.addEventListener(
            'scroll',
            () => {
                const rect = article.getBoundingClientRect();
                const articleHeight = article.offsetHeight;
                const windowHeight = window.innerHeight;
                const scrolled = Math.max(0, -rect.top);
                const total = articleHeight - windowHeight;
                const percent = total > 0 ? Math.min(100, (scrolled / total) * 100) : 0;

                progressBar.style.width = `${percent}%`;
            },
            { passive: true }
        );
    }

    const tocLinks = document.querySelectorAll('.toc-link');
    const headings = document.querySelectorAll('.article-body h2[id]');

    if (tocLinks.length > 0 && headings.length > 0 && 'IntersectionObserver' in window) {
        const headingObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    const id = entry.target.id;

                    tocLinks.forEach((link) => {
                        link.classList.toggle('active', link.getAttribute('href') === `#${id}`);
                    });
                });
            },
            { rootMargin: '-20% 0px -70% 0px', threshold: 0 }
        );

        headings.forEach((heading) => headingObserver.observe(heading));
    }

    tocLinks.forEach((link) => {
        link.addEventListener('click', (event) => {
            const id = link.getAttribute('href')?.slice(1);
            const target = id ? document.getElementById(id) : null;

            if (!target) {
                return;
            }

            event.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    if (copyButton) {
        copyButton.addEventListener('click', (event) => {
            event.preventDefault();
            navigator.clipboard?.writeText(window.location.href);

            const original = copyButton.textContent;
            copyButton.textContent = 'Copied!';

            window.setTimeout(() => {
                copyButton.textContent = original;
            }, 1800);
        });
    }
});
