<!DOCTYPE html>
<html lang="en">
<head>
    @include('public.partials.head', ['title' => trim($__env->yieldContent('title')) ?: 'i2Medier'])
</head>
<body>
    @include('public.partials.header')

    @yield('content')

    @include('public.partials.footer')

    @stack('scripts')
</body>
</html>
