<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="antialiased">
        <h1>User : {{ $name }}</h1>
        <h1>Token : {{ $token }}</h1>
    </body>
</html>
