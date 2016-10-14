@include('layouts.templates.header')
@include('layouts.templates.footer')
<!DOCTYPE html>
<html lang="{{ env('BLOG_LANGUAGE') }}">
    @yield('headerinclude')
    <body>
        @yield('header')
        @yield('content')
        @yield('footer')
        @stack('scripts')
    </body>
</html>