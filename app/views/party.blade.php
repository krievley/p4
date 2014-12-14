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
            <div id='nav'>
                <a href='#' class='rsvp'>RSVP</a>
                <a href='#'>Bringing Something to the Party?</a>
            </div>
            <div>
                Party: {{ $party->first()->name }}<br>
                Date: {{ date('F d, Y', strtotime($party->first()->date)) }}<br>
                Start Time: {{ $party->first()->start_time }}<br>
                End Time: {{ $party->first()->end_time }}<br><br><br>
                Host: {{ $party->first()->host }}<br>
                Theme: {{ $party->first()->theme }}<br>
                Location: {{ $party->first()->location }}<br>
                Attire: {{ $party->first()->attire }}<br>
                Is Alcohol Provided?: {{ $party->first()->alcohol }}<br><br>
            </div>
            <div>
                Items Provided by Host: {{ $party->first()->provided_items }}
            </div>
            <div>
                List of attendees:
                @if($guests->first() != NULL)
                    @foreach($guests as $guest)
                        {{ ucwords($guest->name) }}
                    @endforeach
                @else
                    {{ 'None' }}
                @endif    
            </div>
        </div>
        <div class='rsvp_form pop'>
            <div class='col1'><a id='close' href='#'>Close</a></div>
            <div class='col5'>
                <h3>Submit Your RSVP</h3>
                {{-- RSVP Form ------------------}}
                    {{ Form::open(array('url' => '/party/response', 'method' => 'POST')) }}
                    {{ Form::token() }}
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

