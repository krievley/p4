<!DOCTYPE html>

<!-- Home Page -->

<html>
    <head>
        <title>Potluck Planner - Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS Pages -->
        <link href="{{ URL::asset('css/default') }}" type="text/css"/>
        <link href="{{ URL::asset('css/normalize') }}" type="text/css"/>
    </head>
    <body>
        <div>
            <h2>Register Here</h2>
            {{ Form::open(array('url' => '/home/register', 'method' => 'POST')) }}
                {{-- Email address field. -------------------}}
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email') }}
                
                {{-- Password field. ------------------------}}
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password') }}
                
                {{-- Form submit button. --------------------}}
                {{ Form::submit('Register', array('class' => 'name')) }}
            {{ Form::close() }}
        </div>
        <br><br>
        <div>
            <h2>Login</h2>
            {{ Form::open(array('url' => '/home/login', 'method' => 'POST')) }}
                {{-- Email address field. -------------------}}
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email') }}
                
                {{-- Password field. ------------------------}}
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password') }}
                
                {{-- Form submit button. --------------------}}
                {{ Form::submit('Login', array('class' => 'name')) }}
            {{ Form::close() }}
        </div>
    </body>
</html>