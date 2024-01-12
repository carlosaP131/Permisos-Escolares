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
    
<div class="container mt-3">
  <h2>Generar Permiso</h2>
  <form action="/action_page.php">
    <div class="mb-3 mt-3">
      <label for="email">Nombre del Alumno</label>
      <input type="text" class="form-control" id="nombre_alumno" placeholder="Ingrese el nombre del alumno" name="nombre_alumno">
    </div>
    <div class="mb-3">
    <label for="sel1" class="form-label">Carrera:</label>
    <select class="form-select" id="sel1" name="sellist1">
      <option>Administracion Publica</option>
      <option>Administracoon Municipal</option>
      <option>Ciencias Empresariales</option>
      <option>Enfermeria</option>
      <option>Informatica</option>
      <option>Nutricion</option>
      <option>Medicina</option>
      <option>Odontologia</option>
    </select>
    </div>
    <div class="mb-3 mt-3">
    <label for="sel1" class="form-label">Grupo:</label>
    <select class="form-select" id="sel1" name="sellist1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
    </select>
    </div>
    <div class="mb-3">
      <label for="semestre">Semestre</label>
      <input type="text" class="form-control" id="semestre_alumno" placeholder="Ingrese el semestre del alumno" name="semestre">
    </div>
    <div class="row">
    <label for="semestre">Rango de dias</label>
      <div class="col">
       <label for="">del</label> <input type="text" class="form-control" placeholder="" name="email">
      </div>
      <label for="">al</label>
      <div class="col">
        <input type="text" class="form-control" placeholder="" name="pswd">
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
</html>