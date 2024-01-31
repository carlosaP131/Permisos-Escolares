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
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <!-- Cuerpo de la tabla con datos dinámicos -->
                            <tbody>
                                @foreach ($permisos as $index => $permiso)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
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
                                        <td>
                                            <button class="btn btn-sm btn-{{ strtolower($permiso->status) }}"
                                                data-toggle="modal"
                                                data-target="#modal{{ $index }}">{{ $permiso->status }}</button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal{{ $index }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detalles del
                                                                Permiso</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Motivo:</strong> {{ $permiso->motivo }}</p>
                                                            <p><strong>Descripción:</strong> {{ $permiso->descripcion }}
                                                            </p>
                                                            <!-- Otro contenido que desees mostrar en la ventana flotante -->
                                                            <p><strong>Estado:</strong> {{ $permiso->status }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cerrar</button>

                                                            <!-- Botón "Aceptar" -->
                                                            <form action="{{ route('aceptar-permiso', [$permiso->id]) }}"
                                                                method="POST" style="display: inline;">
                                                                @method('PUT')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-success">Aceptar</button>
                                                            </form>

                                                            <!-- Botón "Rechazar" -->
                                                            <form action="{{ route('rechazar-permiso', [$permiso->id]) }}"
                                                                method="POST" style="display: inline;">
                                                                @method('PUT')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger">Rechazar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- Formulario para eliminar un permiso -->

                                        <td class="d-flex flex-row">

                                            <form action="{{ route('permiso-destroy', [$permiso->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>

                                            <form action="{{ route('vista-permiso', [$permiso->id]) }}" method="GET"
                                                style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
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
        <!-- Fin de la tabla de datos -->
    </body>
    <!-- Fin del cuerpo de la página -->
@endsection
