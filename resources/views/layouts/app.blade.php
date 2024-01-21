<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Para las tablas -->
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Estilos para las vistas de secretaria -->
    <link href="{{ asset('css/secretaria.css') }}" rel="stylesheet">
    <script src="{{ asset('js/secretaria.js') }}"></script>

    <!-- login -->
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

    <!-- Estilos para las vistas de administrador -->
    <link href="{{ asset('css/administrador.css') }}">
    <script src="{{ asset('js/administrador.js') }}"></script>


</head>

<body>
    <div id="app">

        @guest
        @else
            <!-- Section to show views and content -->
            <main class="">
                @yield('content')
            </main>
        @endguest
        <!-- Section to show login-->
        <main class="">
            @yield('login')

        </main>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
