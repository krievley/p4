<!DOCTYPE html>
<!--
This is the main template for all user authenticated pages.
-->
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{ URL::asset('css/default') }}
        {{ URL::asset('css/normalize') }}
    </head>
    <body>
        @yield('content')
    </body>
</html>
