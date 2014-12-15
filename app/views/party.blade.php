<!DOCTYPE html>
<!-- Party Page -->
<html>
    <head>
        <title>{{ $party->first()->name }}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        {{ HTML::style('css/party.css') }}
        {{ HTML::style('css/normalize.css') }}
        {{ HTML::script('js/party.js') }}
    </head>
    <body>
        <div class='cover'>
            <div class='content'>
                <h1>Party: {{ $party->first()->name }}</h1>
                <div id='nav'>
                    <a href='#' class='rsvp'>RSVP</a>
                </div>
                <div class='col2'>
                    <div id='dateTime'>
                        Date: {{ date('F d, Y', strtotime($party->first()->date)) }}<br>
                        Start Time: {{ $party->first()->start_time }}<br>
                        End Time: {{ $party->first()->end_time }}<br>
                        Location: {{ $party->first()->location }}<br>
                    </div>
                </div>
                <div class='col2'>
                    <div id='misc'>
                        Host: {{ $party->first()->host }}<br>
                        Theme: {{ $party->first()->theme }}<br>
                        Attire: {{ $party->first()->attire }}<br>
                        Is Alcohol Provided?: {{ $party->first()->alcohol }}<br>
                        Items Provided by Host: {{ $party->first()->provided_items }}<br>
                    </div>
                </div>
            </div>
            <div class='content'>
                <div class='col6'>
                    <h1>Guest List</h1>
                    <div class='list'>
                        @if($guests->first() != NULL)
                            <table>
                                <thead>
                                    <th>Name</th>
                                    <th>Attending</th>
                                    <th>Items Providing</th>
                                </thead>
                                @foreach($guests as $guest)
                                    <tr>
                                        <td>{{ ucwords($guest->name) }}</td>
                                        <td>{{ $guest->attending }}</td>
                                        <td>{{ $guest->items }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            {{ 'None' }}
                        @endif 
                    </div>   
                </div>
            </div>
        </div>
        <div class='rsvp_form pop'>
            <div class='col1'><a id='close' href='#'>Close</a></div>
            <div class='col5'>
                <h3>Submit Your RSVP</h3>
                {{-- RSVP Form ------------------}}
                    {{ Form::open(array('url' => '/party/response', 'method' => 'POST')) }}
                    {{ Form::hidden('id', $party->first()->id) }}

                    {{-- Name Field -----------------}}
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name') }}<br>

                    {{-- Email Field ----------------}}
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email') }}<br><br>

                    {{-- Attend Field --------------}}
                    {{ Form::label('attend', 'Will you be attending?') }}
                    {{ Form::select('attend', array('yes' => 'yes', 'no' => 'no')) }}<br><br>
                    
                    {{-- Item Field ----------------}}
                    {{ Form::label('items', 'Items You are Bringing ') }}<small>List items on separate lines.</small><br>
                    {{ Form::textarea('items') }}<br><br>
            </div>
            <div class='col6'>
                {{-- Submit Button -------------}}
                    {{ Form::submit('Submit', array('class' => 'submit')) }}

                {{-- Close Form -----------------}}
                {{ Form::close() }}
            </div>
        </div>
    </body>
</html>

