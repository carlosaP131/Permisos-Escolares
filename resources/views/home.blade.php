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
                           
                        </a>
                        <a href="{{ route('home') }}"><span class="fa fa-user-circle mr-3"></span>
                            @if (Auth::check())
                                {{ Auth::user()->name }}
                            @endif
                        </a>
                    </li>
                    @if (auth()->user()->hasAnyRole('SuperAdmin', 'Admin', 'Secretaria'))
                        <li>
                            <a href="{{ route('alumno-inicio') }}" data-bs-toggle="collapse">
                                <span class="fa fa-home mr-3"></span>centros de salud
                            </a>

                                <li class="w-100">
                                    @can('vista-cargar-excel')
                                        <a href="{{ route('vista-cargar-excel') }}">
                                            <span class="fa fa-file-excel-o mr-3"></span>Cargar centros de salud
                                        </a>
                                    @endcan
                                </li>
                              
                        
                        </li>
                    @endif
                    <li>
                        @can('alumno-permisos')
                            <a href="{{ route('alumno-permisos') }}"><span class="fas fa-file-signature mr-3"></span>Permisos</a>
                        @endcan

                    </li>
                    <li>
                        @can('administrador-usuarios')
                            <a href="{{ route('administrador-usuarios') }}"><span class="fa fa-users mr-3"></span>Usuarios</a>
                        @endcan
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <span class="fa fa-times mr-3"></span>
                            {{ __('Salir') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="get" class="d-none">
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
        <script src="{{secure_asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{('js/jquery-3.6.0.min.js') }}"></script>
       <script src="{{('js/datatables.min.js') }}"></script>
        <script src="{{('js/pdfmake.min.js') }}"></script>
        <script src="{{('js/vfs_fonts.js') }}"></script>
        <script src="{{('js/custom.js') }}"></script>

        <script src="{{('js/popper.js') }}"></script>
        <script src="{{('js/bootstrap.min.js') }}"></script>
        <script src="{{('js/main.js') }}"></script>
    </body>
@endsection
