<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permiso;
use App\Models\Alumno;

class PermisosController extends Controller
{
public function store(Request $request){

    $permiso =  new permiso();
    $permiso->Motivo = $request->motivo;
    $permiso->Descripcion = $request->descripcion;
    $permiso->Tiempo = $request->tiempo;
    $permiso->save();
    return redirect()->route('genera')->with('success','Permiso creado Exitosamente');

}
public function index(){
    $permiso = permiso::all();
    return view('secretaria.generarpermiso');
}
}
