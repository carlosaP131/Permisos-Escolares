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
                <div class="mb-3" id="optionsContainer">
                    <label for="subject" class="form-label"><i class="fas fa-book"></i> PERIODOS</label>
                    <select name="periodo" id="periodo" class="custom-input">
                        @foreach ($periodos as $periodo)
                            <option value="{{ $periodo->id }}" @if ($periodo->nombre === $nombrePeriodoSeleccionado) selected @endif>
                                {{ $periodo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <div class="data_table">
                        <table id="example" class="table table-striped table-bordered">
                            <!-- Encabezado de la tabla -->
                            <thead class="table-dark">
                                <tr>
                                    <th>Folio</th>
                                    <th>Matricula </th>
                                    <th>Tipo </th>
                                    <th>Fecha</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <!-- Cuerpo de la tabla con datos dinámicos -->
                            <tbody>
                                @foreach ($permisosHistorial as $index => $permiso)
                                    <tr>
                                        <td>{{ $permiso->folio }}</td>
                                        <td>{{ $permiso->matricula }}</td>
                                        <td>{{ $permiso->tipo }}</td>

                                        <td>{{ $permiso->tipo === 'Dias' ? $permiso->fecha_inicio : $permiso->fecha_inicio }}
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-{{ strtolower($permiso->status) }}"
                                                data-toggle="modal" data-target="#modal{{ $index }}">ver</button>

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
                                                            <p><strong>Tipo:</strong> {{ $permiso->tipo }}
                                                            </p>
                                                            <p><strong>Fecha:</strong>
                                                                {{ $permiso->fecha_inicio }}
                                                            </p>
                                                            <p><strong>Inicio:</strong>
                                                                {{ $permiso->tipo === 'Dias' ? $permiso->fecha_inicio : $permiso->hora_inicio }}
                                                            </p>
                                                            <p><strong>Fin:</strong>
                                                                {{ $permiso->tipo === 'Dias' ? $permiso->fecha_fin : $permiso->hora_fin }}
                                                            </p>
                                                            <!-- Otro contenido que desees mostrar en la ventana flotante -->
                                                            <p><strong>Status:</strong> {{ $permiso->status }}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cerrar</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <script src="{{ asset('js/consultaHistorial.js') }}"></script>

@endsection
