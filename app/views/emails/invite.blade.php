<!DOCTYPE html>
<!-- Invite Message -->
<html>
    <head>
        <title>Invite Message</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>{{ $input['subject'] }}</h1>
        <p>
            {{ $input['message'] }}
        </p>
        <p>
            My party page link:
            <a href='{{'p4.kristin-rievley.me' . $input['website'] }}'>My Party Page</a>
        </p>
    </body>
</html>
