<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Definición del modelo Permiso que extiende de la clase base Model
class Permiso extends Model
{
    use HasFactory;

    // Especificación del nombre de la tabla en la base de datos
    protected $table = 'permisos';

    // Especificación de la clave primaria
    protected $primaryKey = 'id';

    // Definición de los campos que pueden ser llenados mediante la función create
    protected $fillable = [
        'status', 'motivo', 'descripcion', 'tiempo', 'tipo', 'editado', 'id_secretaria', 'id_alumno',
    ];

    // Relación con el modelo de Alumno utilizando la función belongsTo
    public function alumno()
    {
        // Retorna la relación de pertenencia a través de la clave foránea 'id_alumno'
        return $this->belongsTo(Alumno::class, 'id_alumno');
    }
    public function usuario()
    {
        // Retorna la relación de pertenencia a través de la clave foránea 'id_alumno'
        return $this->belongsTo(User::class, 'id_secretaria');
    }
}
