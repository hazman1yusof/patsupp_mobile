<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/Semantic_latest/semantic.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/Summernote 0.8.9/summernote-lite.css') }}">

        @yield('css')

    </head>
    <body>
        @include('layouts.navs')

        <div class="pusher container">
            @yield('content')
        </div>

    </body>  

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/Semantic_latest/semantic.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('assets/Summernote 0.8.9/summernote-lite.js') }}"></script>

    @yield('js')
</html>