<!DOCTYPE html>
<html lang="en">
<head>
    @include('public.partials.head', ['title' => trim($__env->yieldContent('title')) ?: 'i2Medier'])
    @vite('resources/js/public.js')
</head>
<body>
    @include('public.partials.header')

    @yield('content')

    @include('public.partials.footer')

    @include('public.partials.cookie-consent')

    @stack('scripts')
</body>
</html>
