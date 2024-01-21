<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'motivo',
        'descripcion',
        'tiempo',
        'tipo',
        'editado',
        'id_alumno',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno');
    }
}
