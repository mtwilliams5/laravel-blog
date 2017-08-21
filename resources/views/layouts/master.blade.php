<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ ucwords(config('app.name')) }} :: Blog</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,700,900" rel="stylesheet">
        <script src="https://use.fontawesome.com/1e9efd43b1.js"></script>
        @if (Request::is('admin/*'))
            <link rel="stylesheet" href="{{ URL::to('css/medium-editor.css') }}">
            <link rel="stylesheet" href="{{ URL::to('css/styles.css') }}">
            <link rel="stylesheet" href="{{ URL::to('css/themes/default.css') }}">
        @else
            <link rel="stylesheet" href="{{ URL::to('css/styles.css') }}">
        @endif
    </head>
    <body>
        @include('partials.header')
        <div class="container-fluid">
            @yield('content')
        </div>

    <!-- Scripts -->
    @if (Request::is('admin/*'))
        @include('partials.editor')
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>