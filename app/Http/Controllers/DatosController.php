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
        return view('datos');
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


    public function importar(Request $request)
{
    // Verifica si se ha cargado un archivo
    if (!$request->hasFile('documento')) {
        return redirect('/datos')->with('error', 'Por favor, carga un archivo antes de intentar importar.');
    }

    $file = $request->file('documento');

    // Especifica el tipo de archivo (por ejemplo, xlsx)
    $type = 'xlsx';

    try {
        // Intenta importar el archivo
        Excel::import(new YourImportClass, $file, $type);
    } catch (ValidationException $e) {
        // Maneja la excepción de validación y redirige con un mensaje de error personalizado
        return redirect('/datos')->with('error', 'El archivo Excel no cumple con los campos requeridos.');
    }

    // Redirige a la vista "alumno" después de importar si no hay errores de validación
    return redirect('/alumno')->with('success', 'Importación exitosa');
}


 public function borrarAlumnos()
    {
        Datos::truncate();

        return redirect()->route('alumno-inicio')->with('success', '¡Se borraron todos los registros de alumnos!');
    }

}
