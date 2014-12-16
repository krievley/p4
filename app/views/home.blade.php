<!DOCTYPE html>

<!-- Home Page -->

<html>
    <head>
        <title>Potluck Planner - Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS Pages -->
        {{ HTML::style('css/home.css') }}
        {{ HTML::style('css/normalize.css') }}
    </head>
    <body>
        <div id='header'>
            <div class='container'>
                <div class='h1'>Potluck Planner</div>
                <hr>
                <div class='col3'></div>
                <div class="col5">
                    <div class='login'>
                        {{ Form::open(array('url' => 'auth/login', 'method' => 'POST')) }}
                            {{-- Email address field. -------------------}}
                            {{ Form::label('email', 'Email:') }}
                            {{ Form::email('email') }}

                            {{-- Password field. ------------------------}}
                            {{ Form::label('password', 'Password:') }}
                            {{ Form::password('password') }}

                            {{-- Form submit button. --------------------}}
                            {{ Form::submit('Login', array('class' => 'login_button')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>    
        </div>
        @if(Session::get('flash_message'))
            <div class='flash-message'>{{ Session::get('flash_message') }}</div>
        @endif
        <br><br>
        <div id='main'>  
            <div class='container'>
                <div class='col3'>
                    <div class='content'>
                        <h2>Register Here</h2>
                        <table>
                            {{ Form::open(array('url' => 'auth/register', 'method' => 'POST')) }}
                            <tr>{{-- Email address field. -------------------}}
                                <td>
                                    {{ Form::label('email', 'Email:') }}
                                </td>
                                <td>
                                    {{ Form::email('email') }}<br>
                                    <span class='error'>{{  $errors->first('email') }}</span>
                                </td>
                            </tr>
                            <tr>{{-- Password field. ------------------------}}
                                <td>
                                    {{ Form::label('password', 'Password:') }}
                                </td>
                                <td>
                                    {{ Form::password('password') }}<br>
                                    <span class='error'>{{  $errors->first('password') }}</span> 
                                </td>
                            </tr>
                        </table>
                        <div class='submit'>
                            {{-- Form submit button. --------------------}}
                            {{ Form::submit('Register', array('class' => 'name')) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class ='col5'>
                    <div class='content'>
                        <p>
                            This website is designed to help people plan parties together.
                            A registered user can create a party website and any
                            guests who rsvp can list the items they are bringing
                            to the party. 
                            <br><br>
                            Sign up for free and start planning your parties
                            the right way.
                        </p>
                    </div>
                </div>
            </div>    
        </div>
    </body>
</html>