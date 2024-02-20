<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;

class PeriodosController extends Controller
{
    public function consultarPeriodo()
    {
        // Consulta todos los periodos
        $periodos = Periodo::all();

        // Devuelve la vista con los datos
        return view('administrador.administradorPeriodo', ['periodos' => $periodos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'fecha_inicial' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicial',
        ]);

        Periodo::create([
            'nombre' => $request->input('nombre'),
            'fecha_inicial' => $request->input('fecha_inicial'),
            'fecha_final' => $request->input('fecha_final'),
        ]);

        return redirect()->route('administrador-periodos')->with('success', 'Periodo creado correctamente');
    }


    public function destroy($id)
    {
        $periodo = Periodo::findOrFail($id);
        $periodo->delete();

        return redirect()->route('administrador-periodos')->with('success', 'Periodo eliminado correctamente');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombrePeriodo' => 'required|string',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        ]);

        $periodo = Periodo::findOrFail($id);

        $periodo->update([
            'nombre' => $request->input('nombrePeriodo'),
            'fecha_inicial' => $request->input('fechaInicio'),
            'fecha_final' => $request->input('fechaFin'),
        ]);

        return back()->with('success', 'Periodo actualizado correctamente');
    }
}
