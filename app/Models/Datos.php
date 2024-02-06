<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    use HasFactory;
    protected $table = 'alumnos'; // Cambia 'datos' por 'alumnos'
    protected $fillable = [
        'matricula',
        'nombre',
        'apellido', // Asegúrate de que 'apellido' esté presente en los campos fillable
        'semestre',
        'id_carrera',
        'grupo',
    ];


    public $timestamps = false;

}
