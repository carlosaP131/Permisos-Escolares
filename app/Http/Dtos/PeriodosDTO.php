<?php

namespace App\Http\DTOs;

use App\Models\Periodo;

class PeriodoDTO
{
    public ?int $id;
    public string $nombre;
    public string $fecha_inicial;
    public string $fecha_final;

    public function __construct(?int $id, string $nombre, string $fecha_inicial, string $fecha_final)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->fecha_inicial = $fecha_inicial;
        $this->fecha_final = $fecha_final;
    }

    public static function fromTipoPeriodo(Periodo $periodo)
    {
        return new self($periodo->id, $periodo->nombre, $periodo->fecha_inicial, $periodo->fecha_final);
    }

    public static function getByNombre($nombre)
    {
        $periodo = Periodo::where('nombre', $nombre)->first();
        
        if ($periodo) {
            return self::fromTipoPeriodo($periodo);
        }

        return null; // Retorna null si no se encuentra el periodo con ese nombre
    }

    public static function getByID($id)
    {
        $periodo = Periodo::find($id);

        if ($periodo) {
            return self::fromTipoPeriodo($periodo);
        }

        return null; // Retorna null si no se encuentra el periodo con ese ID
    }
}