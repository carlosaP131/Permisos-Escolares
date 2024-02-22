<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;

class PeriodosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
        // Consulta todos los periodos y los muestra en una vista

    public function consultarPeriodo()
    {
        // Consulta todos los periodos
        $periodos = Periodo::all();

        // Devuelve la vista con los datos
        return view('administrador.administradorPeriodo', ['periodos' => $periodos]);
    }

    // Almacena un nuevo periodo en la base de datos
    public function store(Request $request)
    {
        // Valida los datos de la solicitud
        $request->validate([
            'nombre' => 'required|string',
            'fecha_inicial' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicial',
        ]);

        // Crea un nuevo periodo con la información de la solicitud
        Periodo::create([
            'nombre' => $request->input('nombre'),
            'fecha_inicial' => $request->input('fecha_inicial'),
            'fecha_final' => $request->input('fecha_final'),
        ]);

        // Redirige a la ruta 'administrador-periodos' con un mensaje de éxito
        return redirect()->route('administrador-periodos')->with('success', 'Periodo creado correctamente');
    }

        // Elimina un periodo específico por su ID

    public function destroy($id)
    {
        // Busca el periodo por su ID
        $periodo = Periodo::findOrFail($id);

        // Elimina el periodo
        $periodo->delete();

        // Redirige a la ruta 'administrador-periodos' con un mensaje de advertencia
        return redirect()->route('administrador-periodos')->with('danger', 'Periodo eliminado correctamente');
    }

    // Actualiza la información de un periodo específico por su ID
    public function update(Request $request, $id)
    {
        // Valida los datos de la solicitud
        $request->validate([
            'nombrePeriodo' => 'required|string',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        ]);

        // Busca el periodo por su ID
        $periodo = Periodo::findOrFail($id);

        // Actualiza la información del periodo con los datos de la solicitud
        $periodo->update([
            'nombre' => $request->input('nombrePeriodo'),
            'fecha_inicial' => $request->input('fechaInicio'),
            'fecha_final' => $request->input('fechaFin'),
        ]);

        // Redirige de vuelta con un mensaje de éxito
        return back()->with('success', 'Periodo actualizado correctamente');
    }

}
