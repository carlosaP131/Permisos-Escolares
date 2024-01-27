@extends('home')

@section('main')
<link href="{{ asset('css/administrador.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <i class="fas fa-user-plus"></i> Actualizar Usuario
    </div>
    <div class="card-body">

        <form form action="{{ route('actualizar-usuario', ['idUsuario' => $usuario->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label"><i class="fas fa-user"></i> Nombre</label>
                <input type="text" name="name" id="name" class="custom-input" value="{{ $usuario->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-envelope"></i> Correo
                    Electrónico</label>
                <input type="email" name="email" id="email" class="custom-input" value="{{ $usuario->email }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"><i class="fas fa-lock"></i> Contraseña</label>
                <input type="password" name="password" id="password" class="custom-input"
                    value="{{ $usuario->password }}" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label"><i class="fas fa-lock"></i> Confirmar
                    Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    value="{{ $usuario->password }}" class="custom-input" required>
            </div>

            <div class="mb-3">
                        <label for="role" class="form-label"><i class="fas fa-user-tag"></i> Rol</label>
                        <select name="role" id="role" class="custom-input" required
                            onchange="toggleOptionsContainer()">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3" id="optionsContainer" style="display: none;">
                        <label for="subject" class="form-label"><i class="fas fa-book"></i> Carrera</label>
                        <select name="carrera" id="carrera" class="custom-input">
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
            <div class="mb-3">
                <label for="status" class="form-label"><i class="fas fa-info-circle"></i>
                    Estatus</label>
                <input type="text" name="status" id="status" class="custom-input" value="{{ $usuario->status }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary" style="background-color: #8B0000; border-color: #8B0000;">
                <i class="fas fa-save"></i> Actualizar
            </button>
        </form>
    </div>
    @endsection