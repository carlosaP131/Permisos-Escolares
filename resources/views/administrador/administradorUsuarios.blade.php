@extends('home')
@section('main')

    <body class="page-content">
        <link href="{{ asset('css/administrador.css') }}" rel="stylesheet">
        <div class="container">
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
                                            @if ($usuario->status)
                                                <button type="button" class="btn btn-success" disabled>Activo</button>
                                            @else
                                                <button type="button" class="btn btn-danger">Inactivo</button>
                                            @endif
                                        </td>

                                        <td class="d-flex flex-row">

                                            <form action="{{ route('usuarios-destroy', [$usuario->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    @if ($usuario->name === 'admin') disabled @endif>
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>

                                            <button class="btn btn-warning" data-toggle="modal"
                                                data-target="#actualizarUsuarioModal">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </button>

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
        @include('administrador/actualizarUsuario')


        <!-- Scripts de Bootstrap y jQuery (es importante que jQuery se cargue antes de Bootstrap) -->
        <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/usuariosAdmin.js') }}"></script>
        <!-- Agrega aquí tus otros scripts si los tienes -->
    </body>
@endsection
