<!DOCTYPE html>
<html lang="en">
<head>
    @include('public.partials.head', ['title' => trim($__env->yieldContent('title')) ?: 'i2Medier', 'seo' => $seo ?? null])
    @stack('page_css')
</head>
<body>
    @yield('content')
    @include('public.partials.mobile-menu')

    @vite('resources/js/public.js')
    @stack('scripts')
</body>
</html>
