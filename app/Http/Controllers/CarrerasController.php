<?php

namespace App\Http\Controllers;

use App\Http\Dtos\CarrerasDTO;

use Illuminate\Http\Request;
use App\Models\Carrera;

class CarrerasController extends Controller
{
    
    public function show(){
        $carreras = Carrera::all();
        $carrerasDTO = collect();
        foreach ($carreras as $carrera) {
            // Aplicar condición de filtro
            if ($carrera->id < 10000) {
                $carrerasDTO->push(new CarrerasDTO($carrera));
            }
        }
        return $carrerasDTO;
    }
}
