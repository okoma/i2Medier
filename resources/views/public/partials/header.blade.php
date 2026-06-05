<nav class="public-nav{{ request()->routeIs('site.lawyer') ? ' is-dark' : '' }}{{ request()->routeIs('site.home') ? ' is-home' : '' }}">
    <a href="{{ url('/') }}" class="public-logo">i2Medi<span>er</span></a>
    @include('public.partials.menu')
    <a href="{{ route('site.start') }}" class="nav-cta public-nav-cta">Get Started</a>
    <button class="public-nav-toggle" type="button" aria-expanded="false" aria-controls="public-side-nav" aria-label="Open navigation">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

@include('public.partials.mobile-menu')
