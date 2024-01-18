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
                        <a href="#"><span class="fa fa-home mr-3"></span>{{ Auth::user()->name }}</a>
                    </li>
                    <li class="active">
                        <a href="#"><span class="fa fa-home mr-3"></span> Inicio</a>
                    </li>
                    <li>
                        <a><span class="fa fa-user mr-3"></span> Permisos</a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-sticky-note mr-3"></span> Historial</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <span class="fa fa-sticky-note mr-3"></span>
                            {{ __('Salir') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>

            <!-- Contenido  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">Contenido</h2>
            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
@endsection
