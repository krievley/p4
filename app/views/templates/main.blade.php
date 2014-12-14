<!DOCTYPE html>
<!--This is the main template for all user authenticated pages.-->
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{ HTML::style('css/default.css') }}
        {{ HTML::style('css/normalize.css') }}
        {{ HTML::script('js/jquery-ui.js') }}
        {{ HTML::script('js/jquery-ui.min.js') }}
        @yield('styles')
    </head>
    <body>
        <div id='header'>
            <div class='container'>
                <div id='nav'>
                    @yield('navigation')
                </div>
        </div>
        </div>
        @if(Session::get('flash_message'))
            <div class='flash-message'>{{ Session::get('flash_message') }}</div>
        @endif
        <div class='border'></div>
        @yield('content')   
    </body>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    @yield('scripts')
</html>
