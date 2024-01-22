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
                                        <td>pendiente</td>
                                        <td>{{ $usuario->carrera_nombre }}</td>
                                        <td>
                                            @if ($usuario->status)
                                                <button type="button" class="btn btn-success" disabled>Activo</button>
                                            @else
                                                <button type="button" class="btn btn-danger">Inactivo</button>
                                            @endif
                                        </td>

                                        <td>
                                            <form action="{{ route('usuarios-destroy', [$usuario->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    @if ($usuario->name === 'admin') disabled @endif>
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
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

        <!-- Modal para crear nuevo usuario -->
        <div class="modal fade" id="crearUsuarioModal" tabindex="-1" role="dialog"
            aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearUsuarioModalLabel">Crear Nuevo Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario para crear nuevo usuario -->
                        <form>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label"><i class="fas fa-user"></i> Nombre</label>
                                <input type="text" name="name" id="name" class="custom-input" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label"><i class="fas fa-envelope"></i> Correo
                                    Electrónico</label>
                                <input type="email" name="email" id="email" class="custom-input" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label"><i class="fas fa-lock"></i> Contraseña</label>
                                <input type="password" name="password" id="password" class="custom-input" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label"><i class="fas fa-lock"></i> Confirmar
                                    Contraseña</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="custom-input" required>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label"><i class="fas fa-user-tag"></i> Rol</label>
                                <select name="role" id="role" class="custom-input" required>
                                    <option value="Secretaria">Secretaria</option>
                                    <option value="Profesor">Profesor</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary"
                                style="background-color: #8B0000; border-color: #8B0000;">
                                <i class="fas fa-save"></i> Guardar
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts de Bootstrap y jQuery (es importante que jQuery se cargue antes de Bootstrap) -->
        <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Agrega aquí tus otros scripts si los tienes -->
    </body>
@endsection
