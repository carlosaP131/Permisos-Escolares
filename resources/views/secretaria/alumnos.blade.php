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
        <th>Matricula</th>
        <th>Nombre</th>
        <th>Carrera</th>
        <th>Grupo</th>
        <th>Semestre</th>
        <th>Generar</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->id }}</td>
            <td>{{$alumno->matricula}}</td>
            <td>{{$alumno->nombre}}</td>
            <td>{{$alumno->carrera}}</td>
            <td>{{$alumno->grupo}}</td>
            <td>{{$alumno->semestre}}</td>
            <td>
                <form action="{{ route('vista-secretaria', [$alumno->id]) }}" method="GET">
                    @csrf
                    <button class="btn btn-danger btn-sm">Genera Permiso</button>
                </form>
            </td>
        </tr>
    @endforeach

<tr class='noSearch hide'>

    <td colspan="6"></td>

</tr>

    </tbody>
  </table>
</div>

</body>
@endsection
