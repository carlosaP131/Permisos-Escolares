<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\YourImportClass; // Asegúrate de crear esta clase
use App\Models\Datos;

class DatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('administrador.datos');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    /**
     * Acción del botón importar para que interactue con la bd e inserte los datos
     */
    public function importar(Request $request)
    {
        set_time_limit(300);
        // Verifica si se ha cargado un archivo
        if (!$request->hasFile('documento')) {
            return redirect('/data')->with('error', 'Por favor, carga un archivo antes de intentar importar.');
        }

        $file = $request->file('documento');

        // Especifica el tipo de archivo (por ejemplo, xlsx)
        $type = 'xlsx';

        try {
            // Intenta importar el archivo
            Excel::import(new YourImportClass, $file, $type);
        } catch (\Exception $e) {
            return redirect('/data')->with('error', 'Error durante la importación: ' . $e->getMessage());
        }

        // Redirige a la vista "alumno" después de importar si no hay errores
        return redirect()->route('alumno-inicio')->with('success','Importación exitosa');
    }


 public function borrarAlumnos()
    {
        Datos::truncate();

        return redirect()->route('alumno-inicio')->with('success', '¡Se borraron todos los registros de alumnos!');
    }

}




