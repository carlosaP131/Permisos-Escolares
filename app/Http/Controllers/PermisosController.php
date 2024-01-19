<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permiso;
use App\Http\Controllers\Auth;
use App\Models\Alumno;



class PermisosController extends Controller
{
    public function index($id){
        $alumno = alumno::find($id);
        return view('secretaria.generarpermiso',['alumno'=>$alumno]);
    }
public function store(Request $request){
    $request->validate(['motivo'=>'required|min:5']);

    $permiso =  new permiso();
    $permiso->motivo = $request->motivo;
    $permiso->descripcion = $request->descripcion;
    $permiso->tipo = $request->tipo;
    $tipoaux = $request->tipo;
    if ($tipoaux == "Dias" ) {
        $permiso->tiempo = $request-> startDate . "-" . $request->endDate;
    }else if($tipoaux == "Horas"){
        $permiso->tiempo = $request-> aditionalDate . $request->aditionaldateini ."-".$request-> aditionaldatefin;
    }
    $permiso->status = "Pendiente";
    $permiso->editado ="jose" /*Auth::user()->name*/;
    $permiso->id_alumno = "1"/*alumno::find($id)*/;
    $permiso->save();
    return redirect()->route('genera-secretaria')->with('success','Permiso creado Exitosamente');

}
public function show(Request $request,$id){
    $request->validate(['motivo'=>'required|min:5']);
    $alumno = alumno::find($id);
    $permiso =  new permiso();
    $permiso->motivo = $request->motivo;
    $permiso->descripcion = $request->descripcion;
    $permiso->tipo = $request->tipo;
    $tipoaux = $request->tipo;
    if ($tipoaux == "Dias" ) {
        $permiso->tiempo = $request-> startDate . "-" . $request->endDate;
    }else if($tipoaux == "Horas"){
        $permiso->tiempo = $request-> aditionalDate . $request->aditionaldateini ."-".$request-> aditionaldatefin;
    }
    $permiso->status = "Pendiente";
    $permiso->editado ="jose" /*Auth::user()->name*/;
    $permiso->id_alumno = "1"/*alumno::find($id)*/;
    $permiso->save();
  return view('secretaria.generarpermiso',['alumno'=>$alumno])->with('success','Permiso creado Exitosamente');
}

}
