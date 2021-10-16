<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inicio de sesión') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="app">
    <div class="c-wrapper c-fixed-components" style="background-image: url('{{asset('img/fondo-back.jpg')}}');    background-repeat: no-repeat;
        background-size: cover;    background-position: center center;">
        <main class="main">
            @yield('content')
        </main>
    </div>
</div>
</body>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" ></script>
@stack('scripts')
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
</html>
