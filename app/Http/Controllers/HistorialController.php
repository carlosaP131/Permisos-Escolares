<?php

namespace App\Http\Controllers;

use App\Http\Dtos\PermisosDTO;
use App\Models\Periodo;
use App\Models\Permiso;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function consultarPorPeriodo($nombrePeriodo)
    {
        $periodos = Periodo::all();
        $permisosDTO = collect();

        if ($nombrePeriodo == 'Todos') {
            // Si $nombrePeriodo es 'Todos', podrías manejar este caso de manera específica o simplemente retornar todos los permisos.
            $permisosEnRango = Permiso::all();
        } else {
            // Buscar el periodo por nombre en la base de datos
            $periodo = Periodo::where('nombre', $nombrePeriodo)->first();

            if (!$periodo) {
                return response()->json(['error' => 'El periodo no fue encontrado.'], 404);
            }

            $permisosEnRango = Permiso::whereBetween('fecha_inicio', [$periodo->fecha_inicial, $periodo->fecha_final])
                ->orWhereBetween('fecha_fin', [$periodo->fecha_inicial, $periodo->fecha_final])
                ->get();
        }
        foreach ($permisosEnRango as $permiso) {
            
                $permisosDTO->push(new PermisosDTO($permiso));
            
        }

        //return response()->json(['permisosEnRango' => $permisosEnRango]);
        return view('administrador.historial', ['periodos' => $periodos, 'permisosHistorial' => $permisosDTO, 'nombrePeriodoSeleccionado' => $nombrePeriodo]);
    }
}
