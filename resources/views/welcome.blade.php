<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Verificar Certificados | Lidera EHSQ</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta property="og:title"
              content="Verificar Certificados | Lidera EHSQ">
        <meta property="og:locale" content="es">
        <meta property="og:site_name" content=" Lidera EHSQ">
        <meta property="og:url" content="https://certificados.lideraehsq.com/">
        <meta property="og:type" content="website"/>
        <meta property="og:description"
              content="LINK PARA VISUALIZAR EL CERTIFICADO DE NUESTRA CAPACITACIÓN (Solo debe ingresar con su número de DNI o C.E)">
        <meta property="og:image" content="{{asset('img/portada-certificados.jpg')}}"/>
        <meta property="og:image:width" content="800"/>
        <meta property="og:image:height" content="700"/>
        <link rel="canonical" href="https://certificados.lideraehsq.com/">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
          <!--  @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif-->

            <div class="container text-center justify-content-center">
                <div class="title m-b-md">
                    <img src="{{asset('images/logo-b.png')}}" width="500px" class="m-0" alt="Lidera">
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Verificar Certificado | En línea') }}</div>

                            <div class="card-body">
                                <form class="d-inline" method="GET" action="{{ route('participante.index') }}">
                                    @csrf
                                    <input type="text" placeholder="Ingrese su correo Ej. vmgronaldo@gmail.com" autocomplete="off" class="form-control" name="q">
                                    <button type="submit" class="btn btn-primary mt-3">{{ __('Buscar...') }}</button>.
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
