document.addEventListener('DOMContentLoaded', () => {
    const progressBar = document.getElementById('readingProgress');
    const article = document.getElementById('article');
    const copyButtons = document.querySelectorAll('[data-copy-url]');
    const shareButtons = document.querySelectorAll('[data-share-platform]');
    const railShareButtons = document.querySelectorAll('[data-share-rail]');
    const shareRail = document.getElementById('shareRail');
    const railCopyButton = document.getElementById('rail-copy-btn');
    const railTooltip = document.getElementById('rail-tooltip');
    const hero = document.querySelector('.blog-hero');
    const shareUrl = window.location.href;
    const shareTitle = document.querySelector('.post-title')?.textContent?.trim() || document.title;
    const shareLinks = {
        twitter: `https://x.com/intent/tweet?url=${encodeURIComponent(shareUrl)}&text=${encodeURIComponent(shareTitle)}`,
        linkedin: `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(shareUrl)}`,
        whatsapp: `https://wa.me/?text=${encodeURIComponent(`${shareTitle} ${shareUrl}`)}`,
        facebook: `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareUrl)}`,
    };

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

    if (shareRail && hero) {
        const toggleShareRail = () => {
            const heroBottom = hero.getBoundingClientRect().bottom;
            shareRail.classList.toggle('visible', heroBottom < window.innerHeight * 0.45);
        };

        toggleShareRail();
        window.addEventListener('scroll', toggleShareRail, { passive: true });
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

    copyButtons.forEach((copyButton) => {
        copyButton.addEventListener('click', (event) => {
            event.preventDefault();
            navigator.clipboard?.writeText(window.location.href);

            const original = copyButton.textContent?.trim() || 'Copy Link';
            copyButton.textContent = 'Copied!';
            copyButton.classList.add('copied');

            window.setTimeout(() => {
                copyButton.textContent = original;
                copyButton.classList.remove('copied');
            }, 1800);
        });
    });

    shareButtons.forEach((shareButton) => {
        shareButton.addEventListener('click', () => {
            const platform = shareButton.getAttribute('data-share-platform');
            const targetUrl = platform ? shareLinks[platform] : null;

            if (targetUrl) {
                window.open(targetUrl, '_blank', 'noopener,noreferrer');
            }
        });
    });

    railShareButtons.forEach((shareButton) => {
        shareButton.addEventListener('click', () => {
            const platform = shareButton.getAttribute('data-share-rail');
            const targetUrl = platform ? shareLinks[platform] : null;

            if (targetUrl) {
                window.open(targetUrl, '_blank', 'noopener,noreferrer');
            }
        });
    });

    if (railCopyButton && railTooltip) {
        railCopyButton.addEventListener('click', async () => {
            await navigator.clipboard?.writeText(shareUrl);
            railTooltip.textContent = 'Copied!';

            window.setTimeout(() => {
                railTooltip.textContent = 'Copy link';
            }, 1800);
        });
    }
});
