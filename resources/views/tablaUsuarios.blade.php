@extends('layouts.app')
@section('content')

    <body class="page-content">

        <!-- =======  Data-Table  = Start  ========================== -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="data_table">
                        <!--Tabla de registros de alumnos -->
                        <table id="example" class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nombre </th>
                                    <th>Matricula</th>
                                    <th>Puesto</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Carlos Pérez</td>
                                    <td>12345</td>
                                    <td>Analista de Sistemas</td>
                                    <td>Activo</td>
                                </tr>
                                <tr>
                                    <td>Ana Rodríguez</td>
                                    <td>56789</td>
                                    <td>Gerente de Ventas</td>
                                    <td>Inactivo</td>
                                </tr>
                                <tr>
                                    <td>Juan Gómez</td>
                                    <td>67890</td>
                                    <td>Diseñador Gráfico</td>
                                    <td>Activo</td>
                                </tr>
                                <tr>
                                    <td>Laura Sánchez</td>
                                    <td>54321</td>
                                    <td>Contador</td>
                                    <td>Activo</td>
                                </tr>
                                <tr>
                                    <td>Miguel López</td>
                                    <td>87654</td>
                                    <td>Asistente Administrativo</td>
                                    <td>Inactivo</td>
                                </tr>
                                <tr>
                                    <td>Isabel Martínez</td>
                                    <td>98765</td>
                                    <td>Desarrollador de Software</td>
                                    <td>Activo</td>
                                </tr>
                                <tr>
                                    <td>David García</td>
                                    <td>34567</td>
                                    <td>Analista de Marketing</td>
                                    <td>Inactivo</td>
                                </tr>
                                <tr>
                                    <td>Sofía Hernández</td>
                                    <td>23456</td>
                                    <td>Coordinador de Proyectos</td>
                                    <td>Activo</td>
                                </tr>
                                <tr>
                                    <td>Pablo Ramírez</td>
                                    <td>78901</td>
                                    <td>Recursos Humanos</td>
                                    <td>Inactivo</td>
                                </tr>
                                <tr>
                                    <td>María Castro</td>
                                    <td>43210</td>
                                    <td>Consultor Financiero</td>
                                    <td>Activo</td>
                                </tr>
                                <tr>
                                    <td>Ricardo Silva</td>
                                    <td>21098</td>
                                    <td>Analista de Datos</td>
                                    <td>Activo</td>
                                </tr>
                                <tr>
                                    <td>Elena Vargas</td>
                                    <td>65432</td>
                                    <td>Supervisor de Producción</td>
                                    <td>Inactivo</td>
                                </tr>
                                <tr>
                                    <td>Andrés Reyes</td>
                                    <td>87623</td>
                                    <td>Asesor Legal</td>
                                    <td>Activo</td>
                                </tr>
                                <tr>
                                    <td>Paula Mendoza</td>
                                    <td>54389</td>
                                    <td>Coordinador de Recursos</td>
                                    <td>Activo</td>
                                </tr>
                                <tr>
                                    <td>Fernando Torres</td>
                                    <td>98760</td>
                                    <td>Analista de Compras</td>
                                    <td>Inactivo</td>
                                </tr>
                                <tr>
                                    <td>Carmen González</td>
                                    <td>87601</td>
                                    <td>Desarrollador Web</td>
                                    <td>Activo</td>
                                </tr>
                                <tr>
                                    <td>Javier Díaz</td>
                                    <td>34598</td>
                                    <td>Coordinador de Marketing</td>
                                    <td>Inactivo</td>
                                </tr>
                                <tr>
                                    <td>Adriana Ramírez</td>
                                    <td>65489</td>
                                    <td>Analista de Recursos Humanos</td>
                                    <td>Activo</td>
                                </tr>
                                <tr>
                                    <td>Raul Medina</td>
                                    <td>90876</td>
                                    <td>Ingeniero de Sistemas</td>
                                    <td>Activo</td>
                                </tr>
                                <tr>
                                    <td>Patricia Márquez</td>
                                    <td>56701</td>
                                    <td>Gerente de Proyectos</td>
                                    <td>Inactivo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection
