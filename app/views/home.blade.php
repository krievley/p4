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
                                </td>
                            </tr>
                            <tr>{{-- Password field. ------------------------}}
                                <td>
                                    {{ Form::label('password', 'Password:') }}
                                </td>
                                <td>
                                    {{ Form::password('password') }}<br>
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
                            Cubilia per dictumst porta sagittis molestie vulputate conubia, sapien tellus magna sollicitudin faucibus id vivamus, 
                            ut nisi purus turpis consectetur phasellus. Sagittis porta taciti dictum semper ullamcorper aenean interdum tristique 
                            consequat purus, congue conubia ad blandit aenean consectetur turpis mi felis, et at leo dapibus curabitur risus ligula 
                            ut porttitor. Lorem dui platea pharetra a porta viverra pulvinar tristique, porttitor mauris ut fames enim quisque 
                            hendrerit ultricies tellus, etiam integer aenean vitae tristique potenti inceptos. Proin posuere nostra tellus maecenas 
                            at non cras eros ultrices aenean torquent, pretium duis ante quis aptent nec eleifend venenatis arcu diam, gravida 
                            venenatis aenean molestie hac sed hac tincidunt dui egestas. Laoreet posuere justo fermentum iaculis vitae molestie 
                            egestas, cubilia congue interdum vestibulum facilisis lacus, sociosqu velit habitasse sapien justo litora. Nam molestie 
                            consectetur pellentesque sollicitudin dolor mattis potenti ultricies quisque, nunc fames amet dictum suscipit porttitor 
                            accumsan commodo neque, egestas augue mattis laoreet bibendum nisl interdum libero. Ad primis porttitor quisque 
                            venenatis risus duis vehicula viverra, scelerisque gravida congue dolor pellentesque malesuada maecenas interdum 
                            eleifend, turpis vulputate aliquet felis vitae lectus facilisis. Interdum cursus tellus eleifend faucibus eu pretium 
                            ac varius tempus, morbi tempus aliquam mauris vivamus aenean etiam dapibus fames, semper praesent diam mattis interdum 
                            justo netus arcu.
                        </p>
                    </div>
                </div>
            </div>    
        </div>
    </body>
</html>