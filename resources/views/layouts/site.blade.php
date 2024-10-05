<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fontawesome/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

        <!-- Styles -->
            @yield('style')

    </head>
    <body>
            @include('site.includes.header')

            @yield('content')

            @include('site.includes.footer')

            <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
            <script src="{{asset('assets/js/jquery.js')}}"></script>
                @yield('scripts')
    </body>
</html>
