<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FireBull</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html,
        body {
            background: url(imagenes/fondohome.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
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
            color: #FFF
        }

        .links {
            background-color: rgba(0, 0, 0, .7);
        }

        .links>a {
            color: #FFF;
            padding: 0 25px;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .links a:hover {
            color: #FFEB3B;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        #norma {
            font-size: 4vw;
            font-family: fantasy;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                <p><img src="{{asset('imagenes/fire.png')}}" width="100px" height="100px" id="fondohome"> FireBull</p>
                <p id="norma">NOM-154-SCFI-2005</p>
            </div>
            <div class="links">
                <a href="{{url('/')}}">Inicio</a>
                <a href="{{ url('nosotros')}}">Nosotros</a>
                <a href="{{ url('productos') }}">Productos</a>
                <a href="{{url('clientes')}}">Clientes</a>
                <a href="{{url('cursos')}}">Cursos</a>
                <a href="{{url('contacto')}}">Contacto</a>
            </div>
        </div>
    </div>
</body>

</html>