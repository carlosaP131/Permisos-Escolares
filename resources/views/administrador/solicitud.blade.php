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
                                    <th>Nombre</th>
                                    <th>Carrera</th>
                                    <th>Grupo</th>
                                    <th>Semestre</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>John</td>
                                    <td>Enfermeria</td>
                                    <td>503 A</td>
                                    <td>quinto</td>
                                    <td> <button type="button" class="btn btn-danger">Espera</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Mary</td>
                                    <td>Medicina</td>
                                    <td>814</td>
                                    <td>octavo</td>
                                    <td> <button type="button" class="btn btn-danger">Espera</button></td>
                                </tr>
                            </tbody>
                            <!-- Cuerpo de la tabla con datos dinámicos -->

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin de la tabla de datos -->
    </body>
    <!-- Fin del cuerpo de la página -->
@endsection
