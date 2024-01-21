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
        'semestre',
        'carrera',
        'grupo'


    ];

    public $timestamps = false;

}
