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
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Contraseña</th>
                                <th>Rol</th>
                                <th>Carrera</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Filas de la tabla generadas dinámicamente -->
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <!-- Datos del usuario -->
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->password }}</td>
                                    <td>{{ $usuario->rol_nombre }}</td>
                                    <td>{{ $usuario->carrera_nombre }}</td>

                                    <!-- Botón de estado (activo o inactivo) -->
                                    <td>
                                        @if ($usuario->status == 'activo')
                                            <form action="{{ route('update-status', ['id' => $usuario->id]) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-success"
                                                    {{ $usuario->name == 'SuperAdmin' || $usuario->id == 1 ? 'disabled' : '' }}>
                                                    Activo
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('update-status', ['id' => $usuario->id]) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-danger"
                                                    {{ $usuario->name == 'SuperAdmin' || $usuario->id == 1 ? 'disabled' : '' }}>
                                                    Inactivo
                                                </button>
                                            </form>
                                        @endif
                                    </td>

                                    <!-- Botones de acciones (eliminar y actualizar) -->
                                    <td class="d-flex flex-row">
                                        <form action="{{ route('usuarios-destroy', [$usuario->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                {{ $usuario->name == 'SuperAdmin' || $usuario->id == 1 ? 'disabled' : '' }}>
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>

                                        <form action="{{ route('modal-update', [$usuario->id]) }}" method="GET"
                                            style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-warning"
                                                {{ $usuario->name == 'SuperAdmin' || $usuario->id == 1 ? 'disabled' : '' }}>
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Botón para abrir el modal de creación de usuario -->
                    <button class="btn btn-success" data-toggle="modal" data-target="#crearUsuarioModal">Crear Nuevo Usuario</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclusión del modal de creación de usuario -->
    @include('administrador/crearUsuario')

    <!-- Inclusión de la sección de actualización (si existe) -->
    @yield('update')

    <!-- Scripts de Bootstrap y jQuery (importante que jQuery se cargue antes de Bootstrap) -->
    <script src="{{ asset('js/usuariosAdmin.js') }}"></script>
    <script src="{{ asset('js/mensajes.js') }}"></script>
    <!-- Agrega aquí tus otros scripts si los tienes -->

</body>
@endsection
