@include('layouts.templates.header')
@include('layouts.templates.footer')
<!DOCTYPE html>
<html lang="{{ env('BLOG_LANGUAGE') }}">
    @yield('headerinclude')
    <body>
    	<main>
        @yield('header')
        @yield('content')
        </main>
        
        @yield('footer')
        @stack('scripts')
    </body>
</html>