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
                        <a>
                            <img src="{{ asset('/imagen/logo1.png') }}" style="margin-left: 30px;">
                        </a>
                        <a href="{{ route('home') }}"><span class="fa fa-user-circle mr-3"></span>
                            @if (Auth::check())
                                {{ Auth::user()->name }}
                            @endif
                        </a>
                    </li>
                    @if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin', 'Secretaria'))
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse">
                                <span class="fa fa-home mr-3"></span>Alumnos
                            </a>

                            <ul class="collapse nav flex-column ml-3" id="submenu1" data-bs-parent="#menu">
                                <li>
                                    @can('alumno-inicio')
                                        <a href="{{ route('alumno-inicio') }}">
                                            <span class="fa fa-graduation-cap mr-3"></span>Alumnos
                                        </a>
                                    @endcan
                                </li>
                                <li class="w-100">
                                    @can('vista-cargar-excel')
                                        <a href="{{ route('vista-cargar-excel') }}">
                                            <span class="fa fa-file-excel-o mr-3"></span>Cargar Alumnos
                                        </a>
                                    @endcan
                                </li>
                                <li>
                                    @can('borrar-alumnos')
                                        @if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin'))
                                            <a href="#" data-toggle="modal" data-target="#borrarAlumnosModal">
                                                <span class="fa fa-trash mr-3"></span> Borrar Alumnos
                                            </a>

                                            <div class="modal fade" id="borrarAlumnosModal" tabindex="-1" role="dialog"
                                                aria-labelledby="borrarAlumnosModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="borrarAlumnosModalLabel">¿Está seguro de
                                                                borrar alumnos?</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Formulario para borrar a todos los alumnos-->
                                                            <form action="{{ route('borrar-alumnos') }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Confirmar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endcan
                                </li>

                                <li>
                                    @can('solicitudes-permiso')
                                        <a href="{{ route('solicitudes-permiso') }}"><span class="fa fa-bell-o mr-3"></span>
                                            Solicitudes</a>
                                    @endcan
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li>
                        @can('alumno-permisos')
                            <a href="{{ route('alumno-permisos') }}"><span
                                    class="fas fa-file-signature mr-3"></span>Permisos</a>
                        @endcan

                    </li>
                    <li>
                        @can('administrador-usuarios')
                            <a href="{{ route('administrador-usuarios') }}"><span class="fa fa-users mr-3"></span>Usuarios</a>
                        @endcan
                    </li>
                    <li>
                        @can('administrador-usuarios')
                            <a href="{{ route('administrador-periodos') }}"><span class="fa fa-clock mr-3"></span>Periodos</a>
                        @endcan
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <span class="fa fa-times mr-3"></span>
                            {{ __('Salir') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>

            <!-- Contenido  -->
            <div id="content" class="p-md-5">
                @yield('main')
            </div>
        </div>
        <!-- Inclusión de scripts -->
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/datatables.min.js') }}"></script>
        <script src="{{ asset('js/pdfmake.min.js') }}"></script>
        <script src="{{ asset('js/vfs_fonts.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>

        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
@endsection
