<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use App\Models\PermisosHistorial;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/


    public function consultarPorPeriodo($nombrePeriodo)
    {
        $periodos = Periodo::all();

        if ($nombrePeriodo == 'Todos') {
            // Si $nombrePeriodo es 'Todos', podrías manejar este caso de manera específica o simplemente retornar todos los permisos.
            $permisosEnRango = PermisosHistorial::all();
        } else {
            // Buscar el periodo por nombre en la base de datos
            $periodo = Periodo::where('nombre', $nombrePeriodo)->first();

            if (!$periodo) {
                return response()->json(['error' => 'El periodo no fue encontrado.'], 404);
            }

            $permisosEnRango = PermisosHistorial::whereBetween('fecha_inicio', [$periodo->fecha_inicial, $periodo->fecha_final])
                ->orWhereBetween('fecha_fin', [$periodo->fecha_inicial, $periodo->fecha_final])
                ->get();
        }

        //return response()->json(['permisosEnRango' => $permisosEnRango]);
        return view('administrador.historial', ['periodos' => $periodos, 'permisosHistorial' => $permisosEnRango, 'nombrePeriodoSeleccionado' => $nombrePeriodo]);
    }
}
