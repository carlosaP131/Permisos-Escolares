
/*filtro de grupo por carrera*/
document.addEventListener('DOMContentLoaded', function () {
    var carreraSelect = document.getElementById('carrera');
    var especialidadContainer = document.getElementById('especialidadContainer');
    var grupSelect = document.getElementById('especialidad');

    // Manejar el cambio en el primer select carrera

    carreraSelect.addEventListener('change', function () {
        var carreraValue = carreraSelect.value;

        // Limpiar opciones del segundo select

        grupSelect.innerHTML = '';


        // Mostrar o ocultar el segundo select según la opción seleccionada
        if ( carreraValue.toUpperCase() === 'ENFERMERIA' || carreraValue.toUpperCase() === 'MEDICINA' || carreraValue.toUpperCase() ==
            'ODONTOLOGIA') {
            especialidadContainer.style.display = 'block';
            // Agregar opciones basadas en la carrera seleccionada
            if (carreraValue.toUpperCase() === 'ENFERMERIA') {
                agregarOpcionesEspecialidad(['A', 'B', 'C']);
            } else if (carreraValue.toUpperCase() === 'MEDICINA') {
                agregarOpcionesEspecialidad([' A', ' B', ' C']);
            } else if (carreraValue.toUpperCase() === 'ODONTOLOGIA') {
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

            grupSelect.appendChild(option);

        }
    }

    // Trigger para inicializar el estado del formulario
    carreraSelect.dispatchEvent(new Event('change'));
});

/*Horas dias filtro*/

document.addEventListener('DOMContentLoaded', function () {
    toggleInputs(); // Llama a la función al cargar la página
});

function toggleInputs() {
    var selectElement = document.getElementById('Dias_horas');
    var dateRangeInputs = document.getElementById('dateRangeInputs');
    var additionalInputs = document.getElementById('additionalInputs');

    // Filtro para ocultar según la selección de días y horas
    if (selectElement.value === 'Dias') {
        dateRangeInputs.style.display = 'block';
        additionalInputs.style.display = 'none';
    } else if (selectElement.value === 'Horas') {
        dateRangeInputs.style.display = 'none';
        additionalInputs.style.display = 'block';
    }
}
/*tablas secretaria*/

function doSearch() {

    const tableReg = document.getElementById('datos');

    const searchText = document.getElementById('searchTerm').value.toLowerCase();

    let total = 0;



    // Recorremos todas las filas con contenido de la tabla

    for (let i = 1; i < tableReg.rows.length; i++) {

        // Si el td tiene la clase "noSearch" no se busca en su cntenido

        if (tableReg.rows[i].classList.contains("noSearch")) {

            continue;

        }



        let found = false;

        const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');

        // Recorremos todas las celdas

        for (let j = 0; j < cellsOfRow.length && !found; j++) {

            const compareWith = cellsOfRow[j].innerHTML.toLowerCase();

            // Buscamos el texto en el contenido de la celda

            if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {

                found = true;

                total++;

            }

        }

        if (found) {

            tableReg.rows[i].style.display = '';

        } else {

            // si no ha encontrado ninguna coincidencia, esconde la

            // fila de la tabla

            tableReg.rows[i].style.display = 'none';

        }

    }



    // mostramos las coincidencias

    const lastTR = tableReg.rows[tableReg.rows.length - 1];

    const td = lastTR.querySelector("td");

    lastTR.classList.remove("hide", "red");

    if (searchText == "") {

        lastTR.classList.add("hide");

    } else if (total) {

        td.innerHTML = "Se ha encontrado " + total + " coincidencia" + ((total > 1) ? "s" : "");

    } else {

        lastTR.classList.add("red");

        td.innerHTML = "No se han encontrado coincidencias";

    }

}
