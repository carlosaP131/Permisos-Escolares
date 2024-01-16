<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<form>

Texto a buscar <input id="searchTerm" type="text" onkeyup="doSearch()" />

</form>
<div >
    <table class="table table-hover table-bordered table-dark " id="datos">
    <thead>
      <tr>

        <th>Id</th>
        <th>Nombre</th>
        <th>Carrera</th>
        <th>Grupo</th>
        <th>Semestre</th>
        <th>Generar</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td>1</td>
        <td>John</td>
        <td>Enfermeria</td>
        <td>503 A</td>
        <td>quinto</td>
        <td> <button type="button" class="btn btn-danger">Mostrar Permiso</button></td>
    </tr>
      <tr>
        <td>2</td>
        <td>Mary</td>
        <td>Medicina</td>
        <td>814</td>
        <td>octavo</td>
        <td> <button type="button" class="btn btn-danger">Mostrar Permiso</button></td>
    </tr>
      <tr>
        <td>3</td>
        <td>July</td>
        <td>Informatica</td>
        <td>306</td>
        <td>tercero</td>
        <td> <button type="button" class="btn btn-danger">Mostrar Permiso</button></td>
    </tr>
      </tr>

<tr class='noSearch hide'>

    <td colspan="5"></td>

</tr>

    </tbody>
  </table>
</div>
<script>
function doSearch()

{

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

    const lastTR=tableReg.rows[tableReg.rows.length-1];

    const td=lastTR.querySelector("td");

    lastTR.classList.remove("hide", "red");

    if (searchText == "") {

        lastTR.classList.add("hide");

    } else if (total) {

        td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");

    } else {

        lastTR.classList.add("red");

        td.innerHTML="No se han encontrado coincidencias";

    }

}</script>
</body>
</html>
