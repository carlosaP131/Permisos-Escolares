<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;

class PeriodosController extends Controller
{
    public function index()
    {
        $periodos = Periodo::all();
        return view('periodos.index', compact('periodos'));
    }

    public function create()
    {
        return view('periodos.create');
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

    public function edit($id)
    {
        $periodo = Periodo::findOrFail($id);
        return view('periodos.edit', compact('periodo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'fecha_inicial' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicial',
        ]);

        $periodo = Periodo::findOrFail($id);
        $periodo->update([
            'nombre' => $request->input('nombre'),
            'fecha_inicial' => $request->input('fecha_inicial'),
            'fecha_final' => $request->input('fecha_final'),
        ]);

        return redirect()->route('administrador-periodos')->with('success', 'Periodo actualizado correctamente');
    }

    public function destroy($id)
    {
        $periodo = Periodo::findOrFail($id);
        $periodo->delete();

        return redirect()->route('administrador-periodos')->with('success', 'Periodo eliminado correctamente');
    }
}
