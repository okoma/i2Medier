document.addEventListener('DOMContentLoaded', () => {
    const revealItems = document.querySelectorAll('.blog-archive-page .reveal');

    if (revealItems.length > 0 && 'IntersectionObserver' in window) {
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

        revealItems.forEach((item) => observer.observe(item));
    }

    const filterButtons = Array.from(document.querySelectorAll('.f-btn'));
    const categoryLinks = Array.from(document.querySelectorAll('.cat-row'));
    const posts = Array.from(document.querySelectorAll('[data-cat][data-search]'));
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    let activeCategory = 'all';

    const applyFilters = () => {
        const searchTerm = (searchInput?.value || '').trim().toLowerCase();

        posts.forEach((post) => {
            const matchesCategory = activeCategory === 'all' || post.dataset.cat === activeCategory;
            const matchesSearch = searchTerm === '' || post.dataset.search.includes(searchTerm);

            post.style.display = matchesCategory && matchesSearch ? '' : 'none';
        });
    };

    const setCategory = (category) => {
        activeCategory = category;

        filterButtons.forEach((button) => {
            button.classList.toggle('active', button.dataset.cat === category);
        });

        categoryLinks.forEach((link) => {
            link.classList.toggle('active', link.dataset.filter === category);
        });

        applyFilters();
    };

    filterButtons.forEach((button) => {
        button.addEventListener('click', () => {
            setCategory(button.dataset.cat || 'all');
        });
    });

    categoryLinks.forEach((link) => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            setCategory(link.dataset.filter || 'all');
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
    }

    if (searchButton) {
        searchButton.addEventListener('click', applyFilters);
    }

    setCategory('all');
});
