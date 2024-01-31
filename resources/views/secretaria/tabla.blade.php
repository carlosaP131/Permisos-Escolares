@extends('home')
@section('main')
    <!-- Inicio del cuerpo de la página -->

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
                                    <th>Matricula </th>
                                    <th>Nombre </th>
                                    <th>Carrera</th>
                                    <th>Grupo</th>
                                    <th>Tipo</th>
                                    <th>Fecha</th>
                                    <th>Inicio</th>
                                    <th>Fin</th>
                                    <th>Estado</th>
                                    @if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin'))
                                        <th>Eliminar</th>
                                    @endif
                                    @if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin', 'Secretaria'))
                                        <th>Editar</th>
                                    @endif
                                </tr>
                            </thead>
                            <!-- Cuerpo de la tabla con datos dinámicos -->
                            <tbody>
                                @foreach ($permisos as $index => $permiso)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $permiso->matricula }}</td>
                                        <td>{{ $permiso->nombre }}</td>
                                        <td>{{ $permiso->carrera }}</td>                                        <td>{{ $permiso->grupo }}</td>
                                        <td>{{ $permiso->tipo }}</td>
                                        <td>{{ $permiso->tipo === 'Dias' ? $permiso->fechaInicio : $permiso->fechaInicio }}
                                        </td>
                                        <td>{{ $permiso->tipo === 'Dias' ? $permiso->fechaInicio : $permiso->horaInicio }}
                                        </td>
                                        <td>{{ $permiso->tipo === 'Dias' ? $permiso->fechaFin : $permiso->horaFin }}</td>
                                        <td>{{ $permiso->status }}</td>
                                        <!-- Formulario para eliminar un permiso -->
                                        @if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin'))
                                            <td>
                                                <form action="{{ route('permiso-destroy', [$permiso->id]) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                            </td>
                                        @endif
                                        @if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin', 'Secretaria'))
                                            <td>
                                                <form action="{{ route('vista-permiso', [$permiso->id]) }}">
                                                    @csrf
                                                    @method('post')
                                                    <button type="submit" class="btn btn-warning btn-sm"
                                                    {{ ($permiso->status == 'Aceptado' || $permiso->status == 'Rechazado') && auth()->user()->hasAnyRole('Secretaria') ? 'disabled' : '' }}>
                                                    Editar
                                                    </button>
                                                </form>
                                            </td>
                                        @endif


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- Fin de la tabla de datos -->
    </body>
    <!-- Fin del cuerpo de la página -->
@endsection
