<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">

        <title>Customer Support</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/Semantic_latest/semantic.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/Summernote 0.8.9/summernote-lite.css') }}">

        <style type="text/css">
            @yield('_style')
        </style>

        @yield('css')

    </head>
    <body>
        @include('layouts.navs')
        <div class="pusher container" id="content">
            @yield('content')
        </div>
    </body>  

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/Semantic_latest/semantic.min.js') }}"></script>
    <script src="{{ asset('js/utility.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('assets/velocity.min.js') }}"></script>
    <script src="{{ asset('assets/Summernote 0.8.9/summernote-lite.js') }}"></script>

    @yield('js')
</html>