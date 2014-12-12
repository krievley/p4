<!DOCTYPE html>
<!-- Party Page -->
<html>
    <head>
        <title>{{ $party->first()->name }}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            Host: {{ $party->first()->host }}<br>
            Party Name: {{ $party->first()->name }}<br>
            Date: {{ date('F d, Y', strtotime($party->first()->date)) }}<br>
            Start Time: {{ $party->first()->start_time }}<br>
            End Time: {{ $party->first()->end_time }}<br>
            Theme: {{ $party->first()->theme }}<br>
            Location: {{ $party->first()->location }}<br>
            Attire: {{ $party->first()->attire }}<br>
            Is Alcohol Provided?: {{ $party->first()->alcohol }}<br><br>
        </div>
        <div>
            Items Provided by Host: {{ $party->first()->provided_items }}
        </div>
    </body>
</html>

