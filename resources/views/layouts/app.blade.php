<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name', 'monologue') }}</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ elixir('css/monologue.css') }}" rel="stylesheet">
    </head>
    
    <body>
        @yield('content')
    </body>
</html>