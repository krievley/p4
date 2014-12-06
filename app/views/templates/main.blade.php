<!DOCTYPE html>
<!--This is the main template for all user authenticated pages.-->
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ URL::asset('css/default') }}" type="text/css"/>
        <link href="{{ URL::asset('css/normalize') }}" type="text/css"/>
        <link href="{{ URL::asset('css/jquery-ui') }}" type="text/css"/>
        <link href="{{ URL::asset('css/jquery-ui.min') }}" type="text/css"/>
        <link href="vendor/pickadate/compressed/themes/classic.css" rel="stylesheet">
        <link href="vendor/pickadate/compressed/themes/classic.date.css" rel="stylesheet">
        <script src="{{ URL::asset('js/jquery-ui.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
    </head>
    <body>
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <!-- Include library's JS files -->
        <script src="vendor/pickadate/compressed/picker.js"></script>
        <script src="vendor/pickadate/compressed/picker.date.js"></script>
        @if(Session::get('flash_message'))
            <div class='flash-message'>{{ Session::get('flash_message') }}</div>
        @endif
        @yield('content')
    </body>
</html>
