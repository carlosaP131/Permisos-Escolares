@extends('home')
@section('main')

<body class="page-content">
    <link href="{{ asset('css/administrador.css') }}" rel="stylesheet">
    <div class="container">
        @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
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
                            <!-- ... (filas de la tabla) ... -->
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->password }}</td>
                                <td>{{ $usuario->rol_nombre }}</td>

                                <td>{{ $usuario->carrera_nombre }}</td>
                                <td>
                                    @if ($usuario->status == 'activo')
                                    <form action="{{ route('update-status', ['id' => $usuario->id]) }}" method="post">
                                        @csrf
                                        @method('post')
                                        <button type="submit" class="btn btn-success"
                                            {{ $usuario->name == 'SuperAdmin' || $usuario->id == 1 ? 'disabled' : '' }}>
                                            Activo
                                        </button>
                                    </form>
                                    @else
                                    <form action="{{ route('update-status', ['id' => $usuario->id]) }}" method="post">
                                        @csrf
                                        @method('post')
                                        <button type="submit" class="btn btn-danger"
                                            {{ $usuario->name == 'SuperAdmin' || $usuario->id == 1 ? 'disabled' : '' }}>Inactivo</button>
                                    </form>
                                    @endif
                                </td>


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

                    <!-- Botón para abrir el modal -->
                    <button class="btn btn-success" data-toggle="modal" data-target="#crearUsuarioModal">Crear Nuevo
                        Usuario</button>
                </div>
            </div>
        </div>
    </div>

    @include('administrador/crearUsuario')
    @yield('update')


    <!-- Scripts de Bootstrap y jQuery (es importante que jQuery se cargue antes de Bootstrap) -->
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/usuariosAdmin.js') }}"></script>
    <!-- Agrega aquí tus otros scripts si los tienes -->
</body>
@endsection