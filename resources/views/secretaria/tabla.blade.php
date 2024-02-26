@extends('home')
@section('main')
<!-- Inicio del cuerpo de la página -->

<body class="page-content">

    <!-- Inicio de la tabla de datos -->
    <div class="container1">
        @if (session('success'))
        <h6 id="success-message" class="alert alert-success">{{ session('success') }}</h6>
        @endif
        @if (session('danger'))
        <h6 id="danger-message" class="alert alert-danger">{{ session('danger') }}</h6>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
                        <!-- Encabezado de la tabla -->
                        <thead class="table-dark">
                            <tr>
                                <th>Folio</th>
                                <th>Matricula </th>
                                <th>Nombre </th>
                                <th>Carrera</th>
                                <th>Grupo</th>
                                <th>Tipo</th>
                                <th>Fecha</th>
                                <th>Inicio</th>
                                <th>Fin</th>
                                <th>Estado</th>
                                @if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin', 'Secretaria'))
                                <th>Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <!-- Cuerpo de la tabla con datos dinámicos -->
                        <tbody>
                            @foreach ($permisos as $index => $permiso)
                            <tr>
                                <td>{{ $permiso->id }}</td>
                                <td>{{ $permiso->matricula }}</td>
                                <td>{{ $permiso->nombre }}</td>
                                <td>{{ $permiso->carrera }}</td>
                                <td>{{ $permiso->grupo }}</td>
                                <td>{{ $permiso->tipo }}</td>
                                <td>{{ $permiso->tipo === 'Dias' ? $permiso->fechaInicio : $permiso->fechaInicio }}
                                </td>
                                <td>{{ $permiso->tipo === 'Dias' ? $permiso->fechaInicio : $permiso->horaInicio }}
                                </td>
                                <td>{{ $permiso->tipo === 'Dias' ? $permiso->fechaFin : $permiso->horaFin }}</td>
                                <td>{{ $permiso->status }}</td>
                                <!-- Formulario para eliminar un permiso -->
                                @if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin', 'Secretaria'))
                                <td class="align-icons" style="display: flex;">
                                    @if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin'))
                                    <form action="{{ route('permiso-destroy', [$permiso->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                    @endif
                                    @if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin', 'Secretaria'))
                                    <form action="{{ route('vista-permiso', [$permiso->id]) }}">
                                        @csrf
                                        @method('post')
                                        <button type="submit" class="btn btn-warning"
                                            {{ auth()->user()->hasRole('Secretaria') &&($permiso->status == 'Aceptado' || $permiso->status == 'Rechazado')? 'disabled': '' }}>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                    @endif
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
    <script src="{{ asset('js/mensajes.js') }}"></script>
</body>
<!-- Fin del cuerpo de la página -->
@endsection