<!DOCTYPE html>
<html lang="en">
<head>
    @include('public.partials.head', ['title' => trim($__env->yieldContent('title')) ?: 'i2Medier', 'seo' => $seo ?? null])
    @stack('page_meta')
    @vite('resources/css/public/pages/tools.css')
    @stack('page_css')
</head>
<body @yield('body_attrs')>
    @yield('content')
    @include('public.partials.mobile-menu')

    @include('public.partials.footer')

    @include('public.partials.cookie-consent')
    @vite('resources/js/public.js')
    @stack('scripts')
</body>
</html>
