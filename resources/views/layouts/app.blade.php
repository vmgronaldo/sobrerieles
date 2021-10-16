<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Certificados | Lidera EHSQ') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
</head>
<body>
<div id="app">

    @include('layouts.sidebar')

    <div class="c-wrapper c-fixed-components">
        <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
                    data-class="c-sidebar-show">
                <i class="fa fa-bars"></i>
            </button>
            <a class="c-header-brand d-lg-none" href="#">
                <img src="{{asset('images/logo.png')}}" width="20" alt="">
            </a>
            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
                    data-class="c-sidebar-lg-show" responsive="true">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="c-header-nav d-md-down-none">
                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{route('home')}}">Escritorio</a>
                </li>
                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{route('categories.index')}}">Categorías</a>
                </li>
                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{route('trainers.index')}}">Profesores</a>
                </li>
                <li class="c-header-nav-item px-3"><a class="c-header-nav-link"
                                                      href="{{route('courses.index')}}">Cursos</a></li>
                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{route('participants.index')}}">Participantes</a>
                </li>
                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{route('certificates.create')}}">Crear
                        Certificado</a></li>
            </ul>
            <ul class="c-header-nav ml-auto mr-4">
                <li class="c-header-nav-item dropdown d-flex align-items-center">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <div class="c-avatar"><img class="c-avatar-img" src="{{asset('img/icon-lidera.png')}}"
                                                   alt="user@email.com"></div>
                    </a>
                    <ul class="c-header-nav ml-auto mr-4">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </li>
            </ul>
        </header>

        <main class="main">
            <!-- Content Wrapper. Contains page content -->
            @if(session()->has('flash'))
                <div class="container">
                    <div class="alert alert-success">{{session('flash')}}</div>
                </div>
            @endif

            @include('flash::message')
            @yield('content')
        </main>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
@stack('scripts')
</body>
</html>
