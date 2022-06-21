<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


    </head>
    <body>

        {{-- if user is loggedIn --}}

        @if (Auth::check())
            Your name is:{{ Auth::user()->name}}
            <br>
            Your email is:{{ Auth::user()->email}}
        @else
            You are not logged in
        @endif

    </body>
</html>