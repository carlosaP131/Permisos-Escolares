@extends('home')
@section('main')
    <!-- Inicio del cuerpo de la página -->

    <body class="page-content">

        <!-- Inicio de la tabla de datos -->
        <div class="container">
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
                                    <th>Semestre</th>
                                    <th>Grupo</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <!-- Cuerpo de la tabla con datos dinámicos -->
                            <tbody>
                                @foreach ($permisos as $permiso)
                                    <tr>
                                        <td>{{ $permiso->id }}</td>
                                        <td>{{ $permiso->matricula }}</td>
                                        <td>{{ $permiso->nombre }}</td>
                                        <td>{{ $permiso->carrera }}</td>
                                        <td>{{ $permiso->semestre }}</td>
                                        <td>{{ $permiso->grupo }}</td>
                                        <td>2013/06/20</td> <!-- Nota: Considera usar datos reales aquí -->
                                        <td>{{ $permiso->status }}</td>
                                        <!-- Formulario para eliminar un permiso -->
                                        <td>
                                            <form action="{{ route('permiso-destroy', [$permiso->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm">Eliminar</button>
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
<<<<<<< HEAD


    </body>
=======
        <!-- Fin de la tabla de datos -->

        <!-- Inclusión de scripts -->
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/datatables.min.js') }}"></script>
        <script src="{{ asset('js/pdfmake.min.js') }}"></script>
        <script src="{{ asset('js/vfs_fonts.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>

    </body>
    <!-- Fin del cuerpo de la página -->
>>>>>>> master
@endsection
