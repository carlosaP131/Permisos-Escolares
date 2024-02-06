<?php

namespace App\Http\Dtos;

use App\Models\Carrera;

// CarreraDTO.php
class CarrerasDTO
{
    public $id;
    public $nombre;

    public function __construct(Carrera $carrera)
    {
        $this->id = $carrera->id;
        $this->nombre = $carrera->nombre;
    }
}
