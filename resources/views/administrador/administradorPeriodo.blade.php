@extends('home')

@section('main')

<body class="page-content">

    <!-- Enlace a la hoja de estilo personalizada -->
    <link href="{{ asset('css/administrador.css') }}" rel="stylesheet">

    <!-- Contenedor principal -->
    <div class="container">
        <!-- Muestra mensajes de éxito o peligro si existen en la sesión -->
        @if (session('success'))
        <h6 id="success-message" class="alert alert-success">{{ session('success') }}</h6>
        @endif
        @if (session('danger'))
        <h6 id="danger-message" class="alert alert-danger">{{ session('danger') }}</h6>
        @endif

        <!-- Fila principal -->
        <div class="row">
            <!-- Columna de ancho completo -->
            <div class="col-12">
                <!-- Tabla de datos -->
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
                        <!-- Encabezado de la tabla -->
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nombre del Periodo</th>
                                <th>Fecha-Inicio</th>
                                <th>Fecha-Fin</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Filas de la tabla generadas dinámicamente -->
                            @foreach ($periodos as $periodo)
                            <tr>
                                <!-- Datos del periodo -->
                                <td>{{ $periodo->id }}</td>
                                <td>{{ $periodo->nombre }}</td>
                                <td>{{ $periodo->fecha_inicial }}</td>
                                <td>{{ $periodo->fecha_final }}</td>

                                <!-- Botones de acciones (eliminar y actualizar) -->
                                <td class="d-flex flex-row">
                                    <form action="{{ route('periodo-destroy', [$periodo->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>

                                    <form style="display: inline;">
                                        <button type="button" class="btn btn-warning btn-edit" data-toggle="modal"
                                            data-target="#editarPeriodoModal">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Botón para abrir el modal de creación de periodo -->
                    <button class="btn btn-success" data-toggle="modal" data-target="#crearPeriodoModal">Crear Nuevo
                        Periodo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclusión del modal de creación de usuario -->
    @include('administrador/crearPeriodo')
    <!-- Inclusión del modal de creación de usuario -->
    @include('administrador/actualizarPeriodo')

    <!-- Scripts de Bootstrap y jQuery (importante que jQuery se cargue antes de Bootstrap) -->
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Agrega aquí tus otros scripts si los tienes -->

</body>
@endsection