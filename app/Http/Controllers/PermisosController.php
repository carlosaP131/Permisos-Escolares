<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permiso;
use App\Http\Controllers\Auth;
use App\Models\Alumno;



class PermisosController extends Controller
{

/**
 * Esta función se encarga de mostrar la paguina para generar permisos con
 * los datos solamente del alumno
 */
    public function vista($id){
        $alumno = alumno::find($id);//obtenemos los datos apartir del id del
                                    //alumno traido de la tabla
        return view('secretaria.generarpermiso',['alumno'=>$alumno]);
    }
    /**
     * Esta funcion se encarga de mostrar la paguina para actualizar los datos
     * del permiso
     */
    public function vistaActualizar($idal,$idper){
        $alumno = alumno::find($idal); //obtenemos el id del alumno
        $permiso = permiso::find($idper);//tambien el del permiso esto con el
                                        //fin de poder actualizar sus datos
        return view('secretaria.actualizarpermiso',['alumno'=>$alumno,'permiso'
                                                                  =>$permiso]);
    }
    /**
     * Esta funcion sirve para crear un permio se le inyectan los datos
     */
    public function store(Request $request,$id){
        /**
         * validamos los campos entrantes del formulario
         */
    $request->validate(['motivo'=>'required|min:5']);
    $request->validate(['descripcion'=>'required|min:5']);
    $alumno = alumno::find($id);//buscamos al alumno basandonos en su id
    $permiso =  new permiso();//creamos un nueve permiso
    /**
     * le inyectamos sus datos que vienen del formulario
     */
    $permiso->motivo = $request->motivo;
    $permiso->descripcion = $request->descripcion;
    $permiso->tipo = $request->tipo;
    $tipoaux = $request->tipo;
    /**
     * Este if es para seleccionara que datos tomara pues son dos tipos de
     * permisos y se toman diferentes datos
     */
    if ($tipoaux == "Dias" ) {
        $permiso->tiempo = $request-> startDate . "-" . $request->endDate;
    }else if($tipoaux == "Horas"){
        $permiso->tiempo = $request-> aditionalDate . $request->aditionaldateini
         ."-".$request-> aditionaldatefin;
    }
    $permiso->status = "Pendiente";//el estado siempre sera pendiente
    $permiso->editado ="jose" /*Auth::user()->name*/;
    $permiso->id_alumno = $alumno->id;//le pasamos el id del alumno para la
                                     //conexion con la llave foranea
    $permiso->save();
    return redirect()->route('vista-secretaria',['id'=>$alumno])->with('success',
    'Permiso creado Exitosamente');

    }
     /**
     * Esta funcion se encarga de actualizar los permisos tiene la misma logica que
     *  la funcion store pero con la exepcion de que este carga el permiso
     */
    public function show(Request $request,$idal,$idper){
    $request->validate(['motivo'=>'required|min:5']);
    $alumno = alumno::find($idal);
    $permiso =  permiso::find($idper);
    $permiso->motivo = $request->motivo;
    $permiso->descripcion = $request->descripcion;
    $permiso->tipo = $request->tipo;
    $tipoaux = $request->tipo;
    if ($tipoaux == "Dias" ) {
        $permiso->tiempo = $request-> startDate . "-" . $request->endDate;
    }else if($tipoaux == "Horas"){
        $permiso->tiempo = $request-> aditionalDate . $request->aditionaldateini
         ."-".$request-> aditionaldatefin;
    }
    $permiso->status = "Pendiente";
    $permiso->editado ="jose" /*Auth::user()->name*/;
    $permiso->id_alumno = $alumno->id;
    $permiso->save();
  return redirect()->route('vista-permiso',['idal'=>$alumno,'idper'=>$permiso])->
  with('success','Permiso Actualizado Exitosamente');
    }
    public function destroy($id){
    $permiso = permiso::find($id);
    $permiso->delete();
    return redirect()->route('alumno-permisos')->with('danger','Permiso eliminado
    Exitosamente');
    }

}
