<!DOCTYPE html>
<!--This is the main template for all user authenticated pages.-->
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ URL::asset('css/default') }}" type="text/css"/>
        <link href="{{ URL::asset('css/normalize') }}" type="text/css"/>
    </head>
    <body>
        @if(Session::get('flash_message'))
            <div class='flash-message'>{{ Session::get('flash_message') }}</div>
        @endif
        @yield('content')
    </body>
</html>
