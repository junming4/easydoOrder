<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css') }}" />
    @yield('styles')
    <script src="{{ asset('home/js/jquery-1.12.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('home/js/common.js') }}" type="text/javascript"></script>
</head>
@yield('contents')
@yield('scripts')
</html>

