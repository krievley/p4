<!DOCTYPE html>
<!--This is the main template for all user authenticated pages.-->
<html>
    <head>
        <title>@yield('title')</title>
        @yield('styles')
    </head>
    <body>
        @yield('content')
    </body>
    @yield('scripts')
</html>