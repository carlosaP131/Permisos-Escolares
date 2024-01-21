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
    public function formulario($id)
    {
        $alumno = alumno::find($id); //obtenemos los datos apartir del id del
        //alumno traido de la tabla
        return view('secretaria.generarpermiso', ['alumno' => $alumno]);
    }
    /**
     * Esta funcion se encarga de mostrar la paguina para actualizar los datos
     * del permiso
     */
    public function edit($idPermiso)
    {
        // Buscamos el permiso y cargamos la relación con el alumno
        $permiso = Permiso::with('alumno')->find($idPermiso);

        // Accedemos al alumno relacionado
        $alumno = $permiso->alumno;

        return view('secretaria.actualizarpermiso', ['alumno' => $alumno, 'permiso' => $permiso]);
    }

    /**
     * Esta funcion sirve para crear un permio se le inyectan los datos
     */
    public function store(Request $request)
    {
        /**
         * Validacion de campos del formulario
         */
        $request->validate([
            'motivo' => 'required|min:5',
            'descripcion' => 'required|min:5'
        ]);

        //$alumno = alumno::find($request->matricula); //buscamos al alumno por matrícula
        $alumno = Alumno::where('matricula', $request->matricula)->first();

        $permiso = new Permiso();
        $permiso->status = "Pendiente";
        $permiso->motivo = $request->motivo;
        $permiso->descripcion = $request->descripcion;
        $permiso->tipo = $request->tipo;

        if ($request->tipo == "Dias") {
            $permiso->tiempo = $request->startDate . "-" . $request->endDate;
        } else {
            $permiso->tiempo = $request->aditionalDate . $request->aditionaldateini
                . "-" . $request->aditionaldatefin;
        }

        $permiso->editado = "jose"; /*Auth::user()->name*/

        // No necesitas asignar manualmente el id_alumno
        $alumno->permisos()->save($permiso);

        return redirect()->route('alumno-permisos')->with(
            'success',
            'Permiso creado Exitosamente'
        );
    }
    /**
     * Esta funcion se encarga de actualizar los permisos tiene la misma logica que
     *  la funcion store pero con la exepcion de que este carga el permiso
     */
    public function update(Request $request, $idPermiso)
    {
        /**
         * Validar aquí
         */
        $request->validate(['motivo' => 'required|min:5']);
        /**
         * Búsqueda del permiso y setéo de valores para actualizar
         */
        $permiso = Permiso::with('alumno')->find($idPermiso);

        $permiso->motivo = $request->motivo;
        $permiso->descripcion = $request->descripcion;
        $permiso->tipo = $request->tipo;

        if ($request->tipo == "Dias") {
            $permiso->tiempo = $request->startDate . "-" . $request->endDate;
        } else {
            $permiso->tiempo = $request->aditionalDate . $request->aditionaldateini
                . "-" . $request->aditionaldatefin;
        }
        /*****************************************************************************
         * Revisar quien lo actualizó y guardarlo
         ************************************************************************** */
        $permiso->editado = "jose";

        $permiso->save();

        return redirect()->route('alumno-permisos')->with('success', 'Permiso Actualizado Exitosamente');
    }


    public function destroy($id)
    {
        $permiso = permiso::find($id);
        $permiso->delete();
        return redirect()->route('alumno-permisos')->with('danger', 'Permiso eliminado
    Exitosamente');
    }
}
