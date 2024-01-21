@extends('home')
@section('main')
    {{-- Form para generar un permiso --}}
    <div class="container p-5 my-5 border bg-dark text-white">{{-- Inicia el contenedor donde se almacenaran todos los elementos del form --}}
        <h2>Generar Permiso</h2>
        <form action="{{ route('crear-permiso') }}" method="POST">

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            @csrf
            <div class="mb-3 mt-3">{{-- Inicia div para los inputs de nombre y matricula --}}
                <div class="row">
                    <div class="col">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese el nombre" name="nombre"
                            value="{{ $alumno->nombre }}">
                    </div>
                    <div class="col">
                        <label for="matricula">Matricula</label>
                        <input type="text" class="form-control" placeholder="Ingrese la Matricula" name="matricula"
                            value="{{ $alumno->matricula }}">
                    </div>
                </div>
            </div>{{-- Termina div de los inputs nombre y matricula --}}
            <div class="mb-3">{{-- Inicia div del select carrera tiene 8 opciones --}}

                <label for="sel1" class="form-label">Carrera:</label>
                <select class="form-select" id="carrera" name="sellist1">
                    <option>{{$alumno->carrera}}</option>

                </select>
            </div>{{-- Termina div del select carrera --}}
            <div class="mb-3">{{-- Inicia el div de la seccion de seleccion del año y de el ciclo escolar --}}
                <div class="row">
                    <div class="col">
                        <label for="Semestre_año">Año</label>
                        <input type="text" class="form-control" placeholder="Ingrese el semestre" name="Semestre_año" value="{{date('Y')}}">

                    </div>
                    <div class="col">
                        <label for="sellist1">Ciclo</label>
                        <select class="form-select" id="Semestre_tipo" name="sellist1">
                            <option>A</option>
                            <option>B</option>

                        </select>
                    </div>
                </div>
            </div>{{-- Termina select de la seccion de año y ciclo --}}
            <div class="mb-3 mt-3">{{-- Inicia div del select semestre las opciones seran dinamicas dependiendo del ciclo escolar seleccionado --}}
                <label for="sel1" class="form-label">Semestre:</label>
                <select class="form-select" id="grupo" name="sellist1">
                    <option>{{$alumno->grupo}}</option>
                </select>
            </div>{{-- Termina el div del select semestre --}}
            <div class="mb-3 mt-3" id="especialidadContainer" style="display: none;">{{-- Inicia div de la seleccion del grupo esta seccion estara oculta solo
                                                                                             solo se mostrara si en carrera se selecciona Enfermeria Odontologia u Medicina --}}
                <label for="especialidad" class="form-label">Grupo</label>
                <select class="form-select" id="especialidad" name="sellist2">

                </select>
            </div>{{-- Termina el div de la seleccion de grupo --}}


            <div class="mb-3 mt-3">{{-- Inicia div de la seleccion de tipo de permiso --}}
                <label for="sellist1">Tipo de Permiso:</label>
                <select class="form-select" id="Dias_horas" name="tipo" onchange="toggleInputs()">
                    <option>Dias</option>
                    <option>Horas</option>
                </select>
            </div>{{-- Termina div de la seleccion de tipo de permiso --}}
            {{-- Estas secciones estaran ocultas mientras no se seleccione una opcion en Tipo de permiso si se selecciona dias se mostrara la siguiente
                    si no y se selecciona horas se mostrara el siguiente --}}

            <div class="mb-3 pd-1" id="dateRangeInputs" style="display: none;">
                <div class="col">
                    <label for="Rango_Dias">Rango de dias</label>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="Fechini">Inicio:</label>

                        <input type="date" class="form-control" placeholder="" name="startDate">

                    </div>
                    <div class="col">
                        <label for="Fechfin">Fin:</label>

                        <input type="date" class="form-control" placeholder="" name="endDate">
                    </div>
                </div>
            </div>

            <div id="additionalInputs" style="display: none;">
                <label for="additionalLabel">Rango Horas:</label>
                <div class="col">
                    <label for="">Fecha:</label> <input type="date" class="form-control" placeholder=""
                        name="additionalDate">
                </div>

                <div class="mb-3 mt-3">
                    <label for="">Horas:</label>
                    <div class="row">
                        <div class="col">

                            <label for="horaini">Inicio:</label>
                            <div class="cs-form">
                                <input type="time" class="form-control" value="10:05 AM" name="aditionaldateini" />
                            </div>

                        </div>

                        <div class="col">

                            <label for="horafin">Fin:</label>
                            <div class="cs-form">

                                <input type="time" class="form-control" value="10:05 AM" name="aditionaldatefin" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Termina el div de las secciones de rango de dias u horas --}}
            <label for="comment">Motivo u Observaciones:</label>
            <div class="mb-3 mt-3">{{-- Inicia la seccion de motivo u observaciones --}}

                <input class="form-control" type="text" id="comment" name="motivo" />
            </div>{{-- Termina seccion de motivo u observaciones --}}
            <label for="comment">Descripción:</label>
            <div class="mb-3 mt-3">{{-- Inicia la seccion de Descripción --}}
                <textarea class="form-control" id="comment" rows="5" name="descripcion"></textarea>
            </div>{{-- Termina seccion de Descripción --}}

            <div class="d-flex justify-content-between  ">
            <button type="submit" class="btn btn-primary mb-2 mt-1">Generar Permiso</button>
            <a href="{{ route('alumno-inicio') }}" class="btn btn-danger ml-5 mt-2  ">Cancelar</a>
        </div>


        </form>

    </div>
@endsection
