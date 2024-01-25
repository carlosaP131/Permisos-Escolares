@extends('layouts.app')

@section('content')

    <body>
        <div class="wrapper d-flex align-items-stretch">
            <!-- Contenido  -->
            <nav id="sidebar">
                <div class="custom-menu">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="#"><span class="fa fa-user-circle mr-3"></span>
                            @if (Auth::check())
                                {{ Auth::user()->name }}
                            @endif
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('alumno-inicio') }}"><span class="fa fa-home mr-3"></span> Alumnos</a>
                    </li>
                    <li>
                        <a href="{{ route('alumno-permisos') }}"><span class="fas fa-file-signature mr-3"></span>
                            Permisos</a>
                    </li>
                    <li>
                        <a href="{{ route('administrador-usuarios') }}"><span class="fa fa-users mr-3"></span> Usuarios</a>
                    </li>
                    <li>

                        <a href="{{ route('vista-cargar-excel') }}"><span class="fa fa-sticky-note mr-3"></span>Cargar
                            Alumnos</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <span class="fa fa-times mr-3"></span>
                            {{ __('Salir') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>

            <!-- Contenido  -->
            <div id="content" class="p-md-5">
                @yield('main')
            </div>

            <!-- Inclusión de scripts -->
            <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
            <script src="{{ asset('js/datatables.min.js') }}"></script>
            <script src="{{ asset('js/pdfmake.min.js') }}"></script>
            <script src="{{ asset('js/vfs_fonts.js') }}"></script>
            <script src="{{ asset('js/custom.js') }}"></script>

            <script src="js/popper.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/main.js"></script>
    </body>
@endsection
