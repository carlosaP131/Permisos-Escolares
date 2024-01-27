@extends('home')
@section('main')
    <div class="container mt-1">
        <div class="text-center">
            <img src="{{ asset('/imagen/img_inicio/banner_unsis.png') }}" class="d-block mx-auto w-80" alt="Banner">
            <h1 style="color: rgb(134, 40, 40)">Sistema de Permisos UNSIS</h1>
        </div>
    </div>

    <div class="container mt-5 w-50">
        <div id="miCarrusel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/imagen/img_inicio/A.JPG') }}" class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/imagen/img_inicio/B.JPG') }}" class="d-block w-100" alt="Imagen 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/imagen/img_inicio/A.JPG') }}" class="d-block w-100" alt="Imagen 3">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/imagen/img_inicio/C.JPG') }}" class="d-block w-100" alt="Imagen 4">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/imagen/img_inicio/F.JPG') }}" class="d-block w-100" alt="Imagen 5">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/imagen/img_inicio/G.JPG') }}" class="d-block w-100" alt="Imagen 6">
                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Desactivar el tiempo de transición para eliminar el delay
            $('#miCarrusel').carousel({
                interval: 5000
            });
        });
    </script>
@endsection
