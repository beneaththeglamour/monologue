@include('layouts.templates.header')
@include('layouts.templates.footer')
<!DOCTYPE html>
<html lang="en">
    @yield('headerinclude')
    
    <body>
        @yield('header')

        @yield('content')
        
        @yield('footer')
    </body>
</html>