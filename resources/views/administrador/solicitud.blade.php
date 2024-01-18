@extends('layouts.app')
@section('content')
    <form>
        {{-- Input para el filtro de la tabla --}}
        Filtrar <input id="searchTerm" type="text" onkeyup="doSearch()" />
    </form>
    <div>{{--Inicia div de la tabla de datos
             Esta tabla tiene un id que se usara en el js para el fitro
             de datos--}}
        <table class="table table-hover table-bordered table-dark " id="datos">
            <thead>
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
                <tr>
                    <td>3</td>
                    <td>July</td>
                    <td>Informatica</td>
                    <td>306</td>
                    <td>tercero</td>
                    <td> <button type="button" class="btn btn-danger">Espera</button></td>
                </tr>
                </tr>

                <tr class='noSearch hide'>

                    <td colspan="6"></td>

                </tr>

            </tbody>
        </table>
    </div>{{--termina div de la tabla--}}
@endsection
