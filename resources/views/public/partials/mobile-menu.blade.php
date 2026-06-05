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
        <li><a href="{{ route('site.services') }}" class="{{ request()->routeIs('site.services*') ? 'is-active' : '' }}">Services</a></li>
        <li><a href="{{ route('site.who-we-help') }}" class="{{ request()->routeIs('site.who-we-help') || request()->routeIs('site.lawyer') ? 'is-active' : '' }}">Who We Help</a></li>
        <li><a href="{{ route('tools.hub') }}" class="{{ request()->routeIs('tools.*') ? 'is-active' : '' }}">Tools</a></li>
        <li><a href="#">Products <span class="nav-new">New</span></a></li>
        <li><a href="{{ route('portfolio.index') }}" class="{{ request()->routeIs('portfolio.index') || request()->routeIs('portfolio.case-study.*') ? 'is-active' : '' }}">Portfolios</a></li>
        <li><a href="{{ route('site.contact') }}" class="{{ request()->routeIs('site.contact') ? 'is-active' : '' }}">Contact</a></li>
        <li><a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'is-active' : '' }}">Blog</a></li>
    </ul>
    <a href="{{ route('site.start') }}" class="nav-cta public-side-nav-cta">Get Started</a>
</aside>
