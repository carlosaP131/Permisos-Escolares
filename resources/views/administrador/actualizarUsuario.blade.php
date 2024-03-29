@extends('home')

@section('main')
<link href="{{ secure_asset('css/administrador.css') }}" rel="stylesheet">

<!-- Card para actualizar usuario -->
<div class="card">
    <div class="card-header bg-white text-dark">
        <i class="fas fa-user-plus">Actualizar Usuario</i>
    </div>
    <div class="card-body">

        <!-- Formulario de actualización de usuario -->
        <form form action="{{ route('actualizar-usuario', ['idUsuario' => $usuario->id]) }}" method="POST" id="myForm">
            @csrf
            <!-- Campo para el nombre del usuario -->
            <div class="mb-3">
                <label for="name" class="form-label"><i class="fas fa-user"></i> Nombre</label>
                <input type="text" name="name" id="name" class="custom-input" value="{{ $usuario->name }}" required>
            </div>

            <!-- Campo para el correo electrónico del usuario -->
            <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-envelope"></i> Correo Electrónico</label>
                <input type="email" name="email" id="email" class="custom-input" value="{{ $usuario->email }}" required>
            </div>

            <!-- Campos para la contraseña y confirmación de contraseña -->
            <div class="mb-3">
                <label for="password" class="form-label"><i class="fas fa-lock"></i> Contraseña</label>
                <input type="password" name="password" id="password" class="custom-input" value="{{ $usuario->password }}" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label"><i class="fas fa-lock"></i> Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" value="{{ $usuario->password }}" class="custom-input" required>
            </div>

            <!-- Campo para seleccionar el rol del usuario -->
            <div class="mb-3">
                <label for="role" class="form-label"><i class="fas fa-user-tag"></i> Rol</label>
                <select name="role" id="role" class="custom-input" required onchange="toggleOptionsContainer()">
                    <!-- Bucle para generar opciones de roles -->
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}" @if ($rol->name === $usuario->rol_nombre) selected @endif>
                            {{ $rol->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Contenedor condicional para la carrera (visible solo si se selecciona un rol específico) -->
            <div class="mb-3" id="optionsContainer" style="display: none;">
                <label for="subject" class="form-label"><i class="fas fa-book"></i> Carrera</label>
                <select name="carrera" id="carrera" class="custom-input">
                    <!-- Bucle para generar opciones de carreras -->
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->id }}" @if ($carrera->nombre === $usuario->carrera_nombre) selected @endif>
                            {{ $carrera->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Campo para seleccionar el estado del usuario (activo o inactivo) -->
            <div class="mb-3">
                <label for="status" class="form-label"><i class="fas fa-info-circle"></i> Estatus</label>
                <select name="status" id="status" class="custom-input" required>
                    <option value="1" @if ($usuario->status === 1) selected @endif>Activo</option>
                    <option value="0" @if ($usuario->status === 0) selected @endif>Inactivo</option>
                </select>
            </div>

            <!-- Botón para enviar el formulario de actualización -->
            <button type="submit" class="btn btn-primary" style="background-color: #8B0000; border-color: #8B0000;">
                <i class="fas fa-save"></i> Actualizar
            </button>

            <!-- Modal de confirmación -->
            <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="modalTitulo" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitulo"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="modalMensaje"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarModal">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Scripts y librerías externas -->
    <script src="{{ secure_asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ secure_asset('js/popper.min.js') }}"></script>
    <script src="{{ secure_asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('js/usuariosAdmin.js') }}"></script>
@endsection
