@extends('layouts.app') <!--Extiende la plantilla 'layouts.app' -->

@section('login')

    <body class="body-login">
        <!-- Sección de contenido principal -->
        <div class="container"> <!-- Contenedor principal -->
            <div class="row justify-content-center"> <!-- Fila centrada -->
                <div class="col-md-6"> <!-- Columna de ancho medio en dispositivos medianos -->
                    <div class="card"> <!-- Tarjeta Bootstrap -->
                        <div class="card-header text-center"> <!-- Encabezado de la tarjeta -->
                            <h4>
                            logo
                            </h4>
                        </div>

                        <div class="card-body"> <!-- Cuerpo de la tarjeta -->
                            <form method="get" action="{{ route('login.custom') }}">
                                @csrf
                                <!-- Campo para el correo electrónico -->
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">
                                        <i class="fa fa-user-circle" style="color: #800000;"></i> {{ __('Usuario') }}
                                    </label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" placeholder="Ingrese su correo electrónico"
                                            class=" rounded @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <!-- Mensaje de error si hay problemas con el correo -->
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Campo para la contraseña -->
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">
                                        <i class="fas fa-lock" style="color: #800000;"></i> {{ __('Contraseña') }}
                                    </label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" placeholder="Ingrese su contraseña"
                                            class="rounded @error('password') is-invalid @enderror" name="password" required
                                            autocomplete="current-password">

                                        @error('password')
                                            <!-- Mensaje de error si hay problemas con la contraseña -->
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Opción para recordar la sesión -->
                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Recordar usuario') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Botón para enviar el formulario -->
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-success rounded">
                                            <i class="fas fa-sign-in-alt"></i> {{ __('Ingresar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection <!-- Fin de la sección de contenido principal -->
