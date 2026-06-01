<nav class="public-nav{{ request()->routeIs('site.lawyer') ? ' is-dark' : '' }}{{ request()->routeIs('site.home') ? ' is-home' : '' }}">
    <a href="{{ url('/') }}" class="public-logo">i2Medi<span>er</span></a>
    <ul>
        <li><a href="{{ route('site.services') }}" class="{{ request()->routeIs('site.services') ? 'is-active' : '' }}">Services</a></li>
        <li><a href="{{ route('site.who-we-help') }}" class="{{ request()->routeIs('site.who-we-help') || request()->routeIs('site.lawyer') ? 'is-active' : '' }}">Who We Help</a></li>
        <li><a href="#">Products <span class="nav-new">New</span></a></li>
        <li><a href="{{ route('portfolio.index') }}" class="{{ request()->routeIs('portfolio.index') || request()->routeIs('portfolio.case-study.*') ? 'is-active' : '' }}">Portfolios</a></li>
        <li><a href="{{ route('site.contact') }}" class="{{ request()->routeIs('site.contact') ? 'is-active' : '' }}">Contact</a></li>
        <li><a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'is-active' : '' }}">Blog</a></li>
    </ul>
    <a href="{{ route('site.start') }}" class="nav-cta public-nav-cta">Get Started</a>
    <button class="public-nav-toggle" type="button" aria-expanded="false" aria-controls="public-side-nav" aria-label="Open navigation">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

<div class="public-nav-overlay" data-nav-close></div>
<aside class="public-side-nav{{ (request()->routeIs('site.lawyer') || request()->routeIs('site.home')) ? ' is-dark' : '' }}" id="public-side-nav" aria-hidden="true">
    <div class="public-side-nav-head">
        <a href="{{ url('/') }}" class="public-logo">i2Medi<span>er</span></a>
        <button class="public-side-nav-close" type="button" aria-label="Close navigation" data-nav-close>
            <span></span>
            <span></span>
        </button>
    </div>
    <ul class="public-side-nav-links">
        <li><a href="{{ route('site.services') }}" class="{{ request()->routeIs('site.services') ? 'is-active' : '' }}">Services</a></li>
        <li><a href="{{ route('site.who-we-help') }}" class="{{ request()->routeIs('site.who-we-help') || request()->routeIs('site.lawyer') ? 'is-active' : '' }}">Who We Help</a></li>
        <li><a href="#">Products <span class="nav-new">New</span></a></li>
        <li><a href="{{ route('portfolio.index') }}" class="{{ request()->routeIs('portfolio.index') || request()->routeIs('portfolio.case-study.*') ? 'is-active' : '' }}">Portfolios</a></li>
        <li><a href="{{ route('site.contact') }}" class="{{ request()->routeIs('site.contact') ? 'is-active' : '' }}">Contact</a></li>
        <li><a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'is-active' : '' }}">Blog</a></li>
    </ul>
    <a href="{{ route('site.start') }}" class="nav-cta public-side-nav-cta">Get Started</a>
</aside>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
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
</script>
@endpush
