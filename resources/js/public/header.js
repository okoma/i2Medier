document.addEventListener('DOMContentLoaded', function () {
    var homeStyleNav = document.querySelector('.public-nav.is-home');

    if (homeStyleNav) {
        var syncNavState = function () {
            homeStyleNav.classList.toggle('scrolled', window.scrollY > 40);
        };

        syncNavState();

        window.addEventListener('scroll', syncNavState, { passive: true });
    }

    // Mega menu hover-intent (desktop only)
    var megaItems = document.querySelectorAll('.has-mega');
    var timers = {};

    function openPanel(id) {
        var panel = document.getElementById('mega-' + id);
        var item = document.querySelector('.has-mega[data-mega="' + id + '"]');
        var trigger = item && item.querySelector('a');
        if (!panel) return;
        panel.classList.add('is-open');
        if (item) item.classList.add('is-open');
        if (trigger) trigger.setAttribute('aria-expanded', 'true');
    }

    function closePanel(id) {
        var panel = document.getElementById('mega-' + id);
        var item = document.querySelector('.has-mega[data-mega="' + id + '"]');
        var trigger = item && item.querySelector('a');
        if (!panel) return;
        panel.classList.remove('is-open');
        if (item) item.classList.remove('is-open');
        if (trigger) trigger.setAttribute('aria-expanded', 'false');
    }

    function closeAll() {
        megaItems.forEach(function (item) {
            var id = item.getAttribute('data-mega');
            if (id) closePanel(id);
        });
    }

    megaItems.forEach(function (item) {
        var id = item.getAttribute('data-mega');
        if (!id) return;
        var panel = document.getElementById('mega-' + id);

        item.addEventListener('mouseenter', function () {
            clearTimeout(timers[id + '-hide']);
            timers[id + '-show'] = setTimeout(function () { openPanel(id); }, 150);
        });

        item.addEventListener('mouseleave', function () {
            clearTimeout(timers[id + '-show']);
            timers[id + '-hide'] = setTimeout(function () { closePanel(id); }, 200);
        });

        if (panel) {
            panel.addEventListener('mouseenter', function () {
                clearTimeout(timers[id + '-hide']);
            });

            panel.addEventListener('mouseleave', function () {
                timers[id + '-hide'] = setTimeout(function () { closePanel(id); }, 200);
            });

            panel.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', closeAll);
            });
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeAll();
    });

    document.addEventListener('click', function (e) {
        if (!e.target.closest('.has-mega') && !e.target.closest('.mega-panel')) {
            closeAll();
        }
    });


    const body = document.body;
    const toggle = document.querySelector('.public-nav-toggle');
    const drawer = document.querySelector('.public-side-nav');
    const overlay = document.querySelector('.public-nav-overlay');
    const closeButtons = document.querySelectorAll('[data-nav-close]');
    const drawerLinks = document.querySelectorAll('.public-side-nav a');

    if (!toggle || !drawer || !overlay) {
        return;
    }

    const setOpen = function (isOpen) {
        body.classList.toggle('public-nav-open', isOpen);
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        drawer.setAttribute('aria-hidden', isOpen ? 'false' : 'true');
    };

    toggle.addEventListener('click', function () {
        setOpen(toggle.getAttribute('aria-expanded') !== 'true');
    });

    closeButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            setOpen(false);
        });
    });

    drawerLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            setOpen(false);
        });
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            setOpen(false);
        }
    });
});
