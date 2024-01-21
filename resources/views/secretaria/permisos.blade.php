@extends('home')
@section('main')

<body>
<form>

Texto a buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />

</form>
<div >
    <table class="table table-hover table-bordered table-dark " id="datos">
    <thead>
      <tr>

        <th>Id</th>
        <th>Nombre</th>
        <th>Carrera</th>
        <th>Grupo</th>
        <th>Semestre</th>
        <th>Generar</th>
        <th>Modificar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>1</td>
        <td>John</td>
        <td>Enfermeria</td>
        <td>503 A</td>
        <td>quinto</td>
        <td> <button type="button" class="btn btn-danger">Mostrar Permiso</button></td>
        <td> <button type="button" class="btn btn-danger">Editar Permiso</button></td>
        <td> <button type="button" class="btn btn-danger">Eliminar Permiso</button></td>
    </tr>
      <tr>
        <td>2</td>
        <td>Mary</td>
        <td>Medicina</td>
        <td>814</td>
        <td>octavo</td>
        <td> <button type="button" class="btn btn-danger">Mostrar Permiso</button></td>
        <td> <button type="button" class="btn btn-danger">Editar Permiso</button></td>
        <td> <button type="button" class="btn btn-danger">Eliminar Permiso</button></td>
    </tr>
      <tr>
        <td>3</td>
        <td>July</td>
        <td>Informatica</td>
        <td>306</td>
        <td>tercero</td>
        <td> <button type="button" class="btn btn-danger">Mostrar Permiso</button></td>
        <td> <button type="button" class="btn btn-danger">Editar Permiso</button></td>
        <td> <a href="" class="btn btn-danger">Eliminar Permiso</a></td>
    </tr>
      </tr>

<tr class='noSearch hide'>

    <td colspan="5"></td>

</tr>

    </tbody>
  </table>
</div>

</body>

@endsection
