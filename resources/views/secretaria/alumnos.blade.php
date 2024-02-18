@extends('home')
@section('main')
    <!-- Inicio del cuerpo de la página -->
    <style>
        .container-center {
            text-align: center;
        }
    </style>

    <body class="page-content">

        <!-- Inicio de la tabla de datos -->
        <div class="container">
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="data_table">
                        <table id="example" class="table table-striped table-bordered">
                            <!-- Encabezado de la tabla -->
                            <thead class="table-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Matricula</th>
                                    <th>Nombre</th>
                                    <th>Carrera</th>
                                    <th>Grupo</th>
                                    <th>Generar</th>
                                </tr>
                            </thead>
                            <!-- Cuerpo de la tabla con datos dinámicos -->
                            <tbody>
                                @foreach ($alumnos as $alumno)
                                    <tr>
                                        <td>{{ $alumno->id }}</td>
                                        <td>{{ $alumno->matricula }}</td>
                                        <td>{{ $alumno->nombre . ' ' . $alumno->apellido }}</td>
                                        <td>{{ $alumno->carrera }}</td>
                                        <td>{{ $alumno->grupo }}</td>
                                        <td>
                                            <form action="{{ route('formulario-permiso', [$alumno->id]) }}">
                                                <button class="btn btn-warning btn-sm" type="submit">Generar
                                                    Permiso</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin'))
            <div class="container container-center">
                <button class="btn btn-danger" data-toggle="modal" data-target="#crearUsuarioModal">Borrar alumnos</button>

            </div>

            <div class="modal fade" id="crearUsuarioModal" tabindex="-1" role="dialog"
                aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="crearUsuarioModalLabel">¿Esta seguro de borrar alumnos?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulario para borrar a todos los alumnos-->
                            <form action="{{ route('borrar-alumnos') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Confirmar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <!-- Fin de la tabla de datos -->
    </body>
    <!-- Fin del cuerpo de la página -->
@endsection
