<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



</head>

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
    <script>
        /*===============fitro de grupo por semestre=============*/
        document.addEventListener('DOMContentLoaded', function() {
            // Manejar el cambio en el primer select
            document.getElementById('Semestre_tipo').addEventListener('change', function() {
                actualizarGrupoSelect();
            });

            // Manejar el cambio en el segundo select (carrera)
            document.getElementById('carrera').addEventListener('change', function() {
                actualizarGrupoSelect();
            });

            // Función para actualizar el segundo select (grupo)
            function actualizarGrupoSelect() {
                // Obtener el valor seleccionado en el primer select
                var semestreTipoValue = document.getElementById('Semestre_tipo').value;
                var selectedCarrera = document.getElementById('carrera').value;
                var carreraValues = {
                    'Administracion Publica': 5,
                    'Administracion Municipal': 1,
                    'Ciencias Empresariales': 4,
                    'Enfermeria': 3,
                    'Informatica': 6,
                    'Nutricion': 7,
                    'Medicina': 14,
                    'Odontologia': 13
                };
                var selectedCarreraValue = carreraValues[selectedCarrera];

                // Limpiar opciones del segundo select
                var grupoSelect = document.getElementById('grupo');
                grupoSelect.innerHTML = '';

                // Determinar rango de números a agregar en el segundo select
                var startNumber = (semestreTipoValue === 'B') ? 2 : 1;
                var endNumber = (semestreTipoValue === 'B') ? 10 : 9;

                // Agregar opciones basadas en el valor del primer select
                for (var i = startNumber; i <= endNumber; i += 2) {
                    var option = document.createElement('option');
                    option.value = i;
                    option.text = i * 100 + selectedCarreraValue;
                    grupoSelect.appendChild(option);
                }
            }

            // Trigger para inicializar el segundo select basado en el valor inicial del primer select
            document.getElementById('Semestre_tipo').dispatchEvent(new Event('change'));
        });

        /*===========filtro de grupo por carrera==================*/
        document.addEventListener('DOMContentLoaded', function() {
            var carreraSelect = document.getElementById('carrera');
            var especialidadContainer = document.getElementById('especialidadContainer');
            var especialidadSelect = document.getElementById('especialidad');

            // Manejar el cambio en el primer select
            carreraSelect.addEventListener('change', function() {
                var carreraValue = carreraSelect.value;

                // Limpiar opciones del segundo select
                especialidadSelect.innerHTML = '';

                // Mostrar o ocultar el segundo select según la opción seleccionada
                if (carreraValue === 'Enfermeria' || carreraValue === 'Medicina' || carreraValue ==
                    'Odontologia') {
                    especialidadContainer.style.display = 'block';
                    // Agregar opciones basadas en la carrera seleccionada
                    if (carreraValue === 'Enfermeria') {
                        agregarOpcionesEspecialidad(['A', 'B', 'C']);
                    } else if (carreraValue === 'Medicina') {
                        agregarOpcionesEspecialidad([' A', ' B', ' C']);
                    } else if (carreraValue === 'Odontologia') {
                        agregarOpcionesEspecialidad([' A', ' B', ' C']);
                    }
                } else {
                    especialidadContainer.style.display = 'none';
                }
            });

            // Función para agregar opciones al segundo select
            function agregarOpcionesEspecialidad(opciones) {
                for (var i = 0; i < opciones.length; i++) {
                    var option = document.createElement('option');
                    option.value = opciones[i];
                    option.text = opciones[i];
                    especialidadSelect.appendChild(option);
                }
            }

            // Trigger para inicializar el estado del formulario
            carreraSelect.dispatchEvent(new Event('change'));
        });
        //Horas dias filtro//
        function toggleInputs() {
            var selectElement = document.getElementById('Dias_horas');
            var dateRangeInputs = document.getElementById('dateRangeInputs');
            var additionalInputs = document.getElementById('additionalInputs');

            if (selectElement.value === 'Dias') {
                dateRangeInputs.style.display = 'block';
                additionalInputs.style.display = 'none';
            } else if (selectElement.value === 'Horas') {
                dateRangeInputs.style.display = 'none';
                additionalInputs.style.display = 'block';
            }
        }
    </script>
</body>

</html>
