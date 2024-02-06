<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app-name', 'Permisos Alumnos') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{secure_asset('css/datatables.min.css') }}">

    <!-- Estilos Personalizados -->
    <link rel="stylesheet" href="{{secure_asset('css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Estilos para las vistas de secretaria -->
    <link href="{{secure_asset('css/secretaria.css') }}" rel="stylesheet">
    <script src="{{secure_asset('js/secretaria.js') }}"></script>

    <!-- login -->
    <link href="{{secure_asset('css/estilos.css') }}" rel="stylesheet">

    <!-- Estilos para las vistas de administrador -->
    <link href="{{secure_asset('css/administrador.css') }}">
    <!-- Colores botones -->
    <link href="{{secure_asset('css/botones.css') }}" rel="stylesheet">

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

    <!-- Otros scripts que puedas tener -->

</body>

</html>
