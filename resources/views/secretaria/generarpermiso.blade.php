@extends('layouts.app')
@section('content')


<body>

    <div class="container p-5 my-5 border bg-dark text-white">
        <h2>Generar Permiso</h2>
        <form action="/action_page.php">
            <div class="mb-3 mt-3">
                <div class="row">
                    <div class="col">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese el nombre" name="nombre">
                    </div>
                    <div class="col">
                        <label for="matricula">Matricula</label>
                        <input type="text" class="form-control" placeholder="Ingrese la Matricula" name="matricula"
                            required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="sel1" class="form-label">Carrera:</label>
                <select class="form-select" id="carrera" name="sellist1">
                    <option>Administracion Publica</option>
                    <option>Administracion Municipal</option>
                    <option>Ciencias Empresariales</option>
                    <option>Enfermeria</option>
                    <option>Informatica</option>
                    <option>Nutricion</option>
                    <option>Medicina</option>
                    <option>Odontologia</option>
                </select>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="Semestre_año">Año</label>
                        <input type="text" class="form-control" placeholder="Ingrese el semestre"
                            name="Semestre_año">
                    </div>
                    <div class="col">
                        <label for="sellist1">Ciclo</label>
                        <select class="form-select" id="Semestre_tipo" name="sellist1">
                            <option>A</option>
                            <option>B</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3 mt-3">
                <label for="sel1" class="form-label">Semestre:</label>
                <select class="form-select" id="grupo" name="sellist1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
            <div class="mb-3 mt-3" id="especialidadContainer" style="display: none;">
                <label for="especialidad" class="form-label">Grupo</label>
                <select class="form-select" id="especialidad" name="sellist2">
                    <!-- Opciones se agregarán dinámicamente -->
                </select>
            </div>
            <div class="col">
                <label for="sellist1">Tipo de Permiso:</label>
                <select class="form-select" id="Dias_horas" name="sellist1" onchange="toggleInputs()">
                    <option>Dias</option>
                    <option>Horas</option>
                </select>
            </div>

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
                                <input type="time" class="form-control" value="10:05 AM" />
                            </div>

                        </div>





                        <div class="col">

                            <label for="horafin">Fin:</label>
                            <div class="cs-form">
                                <input type="time" class="form-control" value="10:05 AM" />
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <div class="mb-3 mt-3">
                <label for="comment">Motivo u Observaciones:</label>
                <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Generar</button>
        </form>
    </div>

</body>

@endsection
