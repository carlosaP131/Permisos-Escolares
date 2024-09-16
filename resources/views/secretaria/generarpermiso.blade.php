@extends('home')

@section('main')
    <div class="formulario-permiso container p-5 my-5  text-dark">
        <h2>Generar Permiso</h2>
        <form action="{{ route('crear-permiso') }}" method="POST">
            @csrf
            @error('motivo')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            @error('descripcion')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
          
          
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @else
            @endif



            <div class="mb-3 mt-3">
                <div class="row">
                    <div class="col">
                        <label for="nombre">Centro de salud</label>
                        <input type="text" class="form-control" placeholder="Ingrese el nombre" name="nombre"
                            value="{{ $alumno->nombre }}" readonly>
                    </div>
                    <div class="col">
                        <label for="matricula">Encargado</label>
                        <input type="text" class="form-control" placeholder="Ingrese la Matricula" name="matricula"
                            value="{{ $alumno->matricula }}" readonly>
                    </div>
                </div>
            </div>
            <div class="mb-3 mt-3 ">
                <div class="row">
                    <div class="col">
                        <label for="sel1" class="form-label">ubicación:</label>
                        <select class="form-select " id="carrera" name="carrera" disabled>
                            <option>{{ $alumno->carrera }}</option>

                        </select>
                    </div>
                    <div class="col">
                        
                        <label for="sel1" class="form-label">telefono:</label>
                        <select class="form-select " id="grupo" name="grupo" disabled>
                            <option>{{ $alumno->semestre . $alumno->grupo }}</option>
                        </select>
                        
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="Semestre_anio">nombre antiviperino</label>
                            <input type="text" class="form-control" placeholder="Ingrese el semestre"
                                name="Semestre_anio" value="{{ date('Y') }} " readonly>

                        </div>
                        <div class="col">
                            <label for="sellist1">tipo de antiviperino</label>
                            <select class="form-select" id="Semestre_ciclo" name="ciclo" disabled>
                                <option>A</option>
                                <option>B</option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3 mt-3" id="especialidadContainer" style="display: none;">{{-- Inicia div de la seleccion del grupo esta seccion estara oculta solo
                                                                                             solo se mostrara si en carrera se selecciona Enfermeria Odontologia u Medicina --}}
                    <label for="especialidad" class="form-label">cantidad en stok</label>
                    <select class="form-select" id="especialidad" name="especialidad">

                    </select>
                </div>


                <div class="mb-3 mt-3">
                    <label for="sellist1">fecha de caducidad:</label>
                    <input class="form-control" type="text" id="comment" name="motivo" required/> 

                <label for="comment">Motivo u Observaciones:</label>
                <div class="mb-3 mt-3">{{-- Inicia la seccion de motivo u observaciones --}}

                    <input class="form-control" type="text" id="comment" name="motivo" required/>
                </div>{{-- Termina seccion de motivo u observaciones --}}
                <label for="comment">Descripción:</label>
                <div class="mb-3 mt-3">{{-- Inicia la seccion de Descripción --}}
                    <textarea class="form-control" id="comment" rows="5" name="descripcion" required></textarea>
                </div>{{-- Termina seccion de Descripción --}}
                <div class="d-flex justify-content-between  ">
                    <a href="{{ route('alumno-inicio') }}" class="btn btn-danger mb-2 mt-1">Cancelar</a>
                    <button type="submit" class="btn btn-primary ml-5 mt-2  ">Generar Permiso</button>

                </div>

        </form>
    </div>
@endsection
