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
                                    <th>Semestre</th>
                                    <th>Grupo</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Eliminar</th>
                                    <th>Editar</th>
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
                                        <td>
                                            <a href="{{ route('vista-permiso', [$permiso->id]) }}"
                                                class="btn btn-warning btn-sm">Editar</a>
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
