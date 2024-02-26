<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisosHistorial extends Model
{
    use HasFactory;

    protected $table = 'permisos_historial';

    protected $fillable = [
        'folio',
        'status',
        'motivo',
        'descripcion',
        'tipo',
        'nombre_secretaria',
        'matricula',
        'fecha_inicio',
        'fecha_fin',
        'hora_inicio',
        'hora_fin',
    ];
}
