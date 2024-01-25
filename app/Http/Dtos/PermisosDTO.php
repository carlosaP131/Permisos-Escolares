<?php

namespace App\Http\Dtos;

use App\Models\Permiso;

// Definición de la clase PermisosDTO
class PermisosDTO
{
    // Propiedades de la clase que representan los campos del DTO
    public $id;
    public $status;
    public $motivo;
    public $descripcion;
    public $tipo;
    public $editado;

    // Propiedades adicionales para el modelo Alumno
    public $matricula;
    public $nombre;
    public $carrera;
    public $semestre;
    public $grupo;

    // Nuevos campos para manejar el tiempo según el tipo de permiso
    public $fechaInicio;
    public $fechaFin;
    public $horaInicio;
    public $horaFin;

    // Constructor de la clase que recibe un objeto Permiso como parámetro
    public function __construct(Permiso $permiso)
    {
        // Asignación de valores desde el objeto Permiso al DTO
        $this->id = $permiso->id;
        $this->status = $permiso->status;
        $this->motivo = $permiso->motivo;
        $this->descripcion = $permiso->descripcion;
        $this->tipo = $permiso->tipo;
        $this->editado = $permiso->editado;

        // Acceso a propiedades del modelo relacionado Alumno
        $this->matricula = $permiso->Alumno->matricula;
        $this->nombre = $permiso->Alumno->nombre;
        $this->carrera = $permiso->Alumno->carrera;
        $this->semestre = $permiso->Alumno->semestre;
        $this->grupo = $permiso->Alumno->grupo;

        // Asignación de valores para los nuevos campos de tiempo según el tipo de permiso
        $this->fechaInicio = $permiso->fecha_inicio;
        $this->fechaFin = $permiso->fecha_fin;
        $this->horaInicio = $permiso->hora_inicio;
        $this->horaFin = $permiso->hora_fin;
    }
}
