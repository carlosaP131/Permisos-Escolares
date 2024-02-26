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

        // Verifica solapamiento de fechas con periodos existentes
        if ($this->verificarSolapamiento($request)) {
            return redirect()->route('administrador-periodos')->with('danger', 'Se ha encontrado un periodo existente que comparte fechas con el nuevo periodo.');
        }

        // Verifica periodo activo que incluye la fecha actual
        if ($this->verificarPeriodoActivo()) {

            return redirect()->route('administrador-periodos')->with('danger', 'Ya hay un periodo activo.');
        }

        // Verifica si hay un periodo mayor a la fecha actual
        if ($this->verificarPeriodoMasReciente()) {
            return redirect()->route('administrador-periodos')->with('danger', 'Ya hay un periodo mayor a la fecha actual.');
        }

        // Crea un nuevo periodo
        Periodo::create([
            'nombre' => $request->input('nombre'),
            'fecha_inicial' => $request->input('fecha_inicial'),
            'fecha_final' => $request->input('fecha_final'),
        ]);

        // Redirige a la ruta 'administrador-periodos' con un mensaje de éxito
        return redirect()->route('administrador-periodos')->with('success', 'Periodo creado correctamente');
    }

    // Verifica solapamiento de fechas con periodos existentes
    private function verificarSolapamiento(Request $request)
    {
        return Periodo::where(function ($query) use ($request) {
            $query->whereBetween('fecha_inicial', [$request->input('fecha_inicial'), $request->input('fecha_final')])
                ->orWhereBetween('fecha_final', [$request->input('fecha_inicial'), $request->input('fecha_final')]);
        })->exists();
    }

    // Verifica periodo activo que incluye la fecha actual
    private function verificarPeriodoActivo()
    {
        $fechaActual = now();
        return Periodo::where('fecha_inicial', '<=', $fechaActual)
            ->where('fecha_final', '>=', $fechaActual)
            ->exists();
    }

    // Verifica si hay un periodo mayor a la fecha actual
    private function verificarPeriodoMasReciente()
    {
        $fechaActual = now();
        $periodoMasReciente = Periodo::find(Periodo::max('id'));

        return $periodoMasReciente && $fechaActual < $periodoMasReciente->fecha_inicial;
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

    public function obtenerFechasFiltroUltimoPeriodo()
    {
        
        // Obtener el último periodo registrado
        $ultimoPeriodo = Periodo::whereNotNull('fecha_final')->orderByDesc('fecha_final')->first();
        // Inicializar las fechas de filtro con valores por defecto
        $fechaInicioFiltro = now();
        $fechaFinFiltro = now();
        
        // Verificar si hay un último periodo activo
        if ($ultimoPeriodo && now() >= $ultimoPeriodo->fecha_inicial && now() <= $ultimoPeriodo->fecha_final) {
            
            $fechaInicioFiltro = $ultimoPeriodo->fecha_inicial;
            $fechaFinFiltro = $ultimoPeriodo->fecha_final;
        } elseif ($ultimoPeriodo) {
            
            // Si no hay un periodo activo, filtrar por la fecha de fin del último periodo
            $fechaInicioFiltro = $ultimoPeriodo->fecha_final;
            $fechaFinFiltro = now();
            $numeroPeriodos=Periodo::count();
            
            if ($fechaInicioFiltro > $fechaFinFiltro && $numeroPeriodos > 2) {
                $periodoAnterior = Periodo::skip($numeroPeriodos - 2)->take(1)->first();
                $fechaInicioFiltro = $periodoAnterior->fecha_final;
            }elseif($fechaInicioFiltro > $fechaFinFiltro && $numeroPeriodos == 2){
                $fechaInicioFiltro = now();
                $fechaFinFiltro =  $ultimoPeriodo->fecha_final;
            }
            
        }
        $fechaInicioFiltro = $fechaInicioFiltro instanceof \Carbon\Carbon ? $fechaInicioFiltro : \Carbon\Carbon::parse($fechaInicioFiltro);
        $fechaFinFiltro = $fechaFinFiltro instanceof \Carbon\Carbon ? $fechaFinFiltro : \Carbon\Carbon::parse($fechaFinFiltro);

        return [
            'fechaInicioFiltro' => $fechaInicioFiltro->toDateString(),
            'fechaFinFiltro' => $fechaFinFiltro->toDateString(),
        ];
    }
}
