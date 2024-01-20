@extends('home')
@section('main')

    <body class="page-content">

        <!-- =======  Data-Table  = Start  ========================== -->
        <div class="container">
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="data_table">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre </th>
                                    <th>Grupo</th>
                                    <th>Semestre</th>
                                    <th>Edad</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permisos as $permiso)
                                    <tr>
                                        <td>{{ $permiso->id }}</td>
                                        <td>Pedro</td>
                                        <td>705</td>
                                        <td>Séptimo</td>
                                        <td>19</td>
                                        <td>2013/06/20</td>
                                        <td>{{ $permiso->status }}</td>
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
    <!-- tambien para las tablas -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>

    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    </body>
@endsection
