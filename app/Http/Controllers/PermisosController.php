<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Dtos\AlumnosDTO;
use App\Models\Permiso;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CrearPermisoRequest;
use App\Models\Alumno;
use App\Models\User;


class PermisosController extends Controller
{

    /**
     * Esta función se encarga de mostrar la paguina para generar permisos con
     * los datos solamente del alumno
     */
    public function formulario($id)
    {
        $alumno = alumno::find($id); //obtenemos los datos apartir del id del
        $alumno=new AlumnosDTO($alumno);
        return view('secretaria.generarpermiso', ['alumno' => $alumno]);
    }
    /**
     * Esta funcion se encarga de mostrar la página para actualizar los datos
     * del permiso
     */
    public function edit($idPermiso)
    {
        // Buscamos el permiso y cargamos la relación con el alumno
        $permiso = Permiso::with('alumno')->find($idPermiso);

        // Accedemos al alumno relacionado
        $alumno = $permiso->alumno;
        $alumno=new AlumnosDTO($alumno);
        return view('secretaria.actualizarpermiso', ['alumno' => $alumno, 'permiso' => $permiso]);
    }

    /**
     * Esta funcion sirve para crear un permio se le inyectan los datos
     */
    public function store(CrearPermisoRequest $request)
    {
        // Buscamos al alumno por matrícula
        $alumno = Alumno::where('matricula', $request->matricula)->firstOrFail();

        // Creamos un nuevo permiso
        $permiso = new Permiso([
            'status' => 'Pendiente',
            'motivo' => $request->motivo,
            'descripcion' => $request->descripcion,
            'tipo' => $request->input('tipoPermiso'),
            'id_secretaria' => Auth::id() ,
        ]);

        // Validaciones adicionales dependiendo del tipo de permiso
        if ($request->input('tipoPermiso') == 'Dias') {
            $permiso->fecha_inicio = $request->Fecha_Inicial;
            $permiso->fecha_fin = $request->Fecha_Final;
        } else {
            $permiso->fecha_inicio = $request->Fecha_Horas;
            $permiso->hora_inicio = $request->Hora_Inicial;
            $permiso->hora_fin = $request->Hora_Final;
        }

        // Guardamos el permiso utilizando la relación definida en el modelo Alumno
        $alumno->permisos()->save($permiso);

        return redirect()->route('alumno-permisos')->with('success', 'Permiso creado Exitosamente');
    }


    /**
     * Esta funcion se encarga de actualizar los permisos tiene la misma logica que
     *  la funcion store pero con la exepcion de que este carga el permiso
     */
    public function update(CrearPermisoRequest $request, $idPermiso)
    {
        /**
         * Búsqueda del permiso y seteo de valores para actualizar
         */
        $permiso = Permiso::with('alumno')->find($idPermiso);

        $permiso->motivo = $request->motivo;
        $permiso->descripcion = $request->descripcion;
        $permiso->id_secretaria = Auth::id();
        $permiso->tipo = $request->input('tipoPermiso');

        if ($request->input('tipoPermiso') == 'Dias') {

            // Asignamos valores para permisos por días
            $permiso->fecha_inicio = $request->Fecha_Inicial;
            $permiso->fecha_fin = $request->Fecha_Final;
        } else {

            // Asignamos valores para permisos por horas
            $permiso->fecha_inicio = $request->Fecha_Horas;
            $permiso->hora_inicio = $request->Hora_Inicial;
            $permiso->hora_fin = $request->Hora_Final;
        }
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

    public function updateStatus(CrearPermisoRequest $request, $idPermiso)
    {



        /**
         * Búsqueda del permiso y seteo de valores para actualizar
         */
        $permiso = Permiso::with('alumno')->find($idPermiso);

        $permiso->status = $request->status;


        $permiso->save();

        return redirect()->route('alumno-permisos')->with('success', 'Permiso Actualizado Exitosamente');
    }


    public function aceptarPermiso($id)
    {
        $permiso = Permiso::findOrFail($id);
        $permiso->status = 'Aceptado';
        $permiso->save();

        return redirect()->back()->with('success', 'Permiso aceptado');
    }

    public function rechazarPermiso($id)
    {
        $permiso = Permiso::findOrFail($id);
        $permiso->status = 'Rechazado';
        $permiso->save();

        return redirect()->back()->with('success', 'Permiso rechazado');
    }

}
