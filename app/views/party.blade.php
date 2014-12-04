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
            Host: {{ $user->first()->email }}<br>
            Party Name: {{ $party->first()->name }}<br>
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

