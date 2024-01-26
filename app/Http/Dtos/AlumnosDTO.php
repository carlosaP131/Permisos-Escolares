<?php

namespace App\Http\Dtos;

use App\Models\Alumno;

// Definición de la clase PermisosDTO
class AlumnosDTO
{
    // Propiedades de la clase que representan los campos del DTO
    public $id;
    public $matricula;
    public $nombre;
    public $apellido;
    public $semestre;
    public $grupo;

    // Propiedades adicionales para el modelo Alumno
    public $carrera;

    // Constructor de la clase que recibe un objeto Permiso como parámetro
    public function __construct(Alumno $alumno)
    {
        // Asignación de valores desde el objeto Permiso al DTO
        $this->id = $alumno->id;
        $this->matricula = $alumno->matricula;
        $this->nombre = $alumno->nombre;
        $this->apellido = $alumno->apellido;
        $this->semestre = $alumno->semestre;
        $this->grupo = $alumno->grupo;

        // Acceso a propiedades del modelo relacionado Alumno
        $this->carrera = $alumno->Carrera->nombre;
    }
}
