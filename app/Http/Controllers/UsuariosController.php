<?php

namespace App\Http\Controllers;

use App\Http\Dtos\UsuariosDTO;
use Illuminate\Http\Request;
use App\Models\User;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Consulta y devuelve la información de todos los usuarios, junto con roles y carreras.
     *
     * @return \Illuminate\View\View
     */
    public function consultarUsuario()
    {
        // Consulta todos los usuarios en la base de datos
        $usuarios = User::all();

        // Transforma los usuarios a un formato de transferencia de datos (DTO)
        $usuariosDTO = collect();
        foreach ($usuarios as $usuario) {
            $usuariosDTO->push(new UsuariosDTO($usuario));
        }

        // Obtiene información sobre carreras y roles para su posterior visualización
        $carrerasController = new CarrerasController();
        $carrerasDTO = $carrerasController->show();

        $roleController = new RoleController();
        // Obtiene el rol del usuario autenticado
        $rol = $roleController->findRole(auth()->user());

        // Filtra roles según el rol del usuario logueado
        $rolesDTO = $roleController->findAll()->filter(function ($role) use ($rol) {
            // Muestra roles distintos de 'SuperAdmin' y 'Admin' según el usuario logueado
            return ($rol === 'SuperAdmin') ? $role->name !== 'SuperAdmin' : $role->name !== 'SuperAdmin' && $role->name !== 'Admin';
        });

        // Retorna la vista con la información recolectada
        return view('administrador.administradorUsuarios', ['usuarios' => $usuariosDTO, 'carreras' => $carrerasDTO, 'roles' => $rolesDTO]);
    }

    /**
     * Elimina un usuario de la base de datos y redirige con un mensaje de éxito.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Encuentra y elimina al usuario según su ID
        $usuarios = User::find($id);
        $usuarios->delete();

        // Redirige con un mensaje de éxito
        return redirect()->route('administrador-usuarios')->with('danger', 'Usuario eliminado exitosamente');
    }

    /**
     * Crea un nuevo usuario en la base de datos y redirige con un mensaje de éxito.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Crea un nuevo usuario en la base de datos y lo guarda
        $user = new User();
        $user = UsuariosDTO::assignValues($request, $user);
        $user->save();

        // Redirige con un mensaje de éxito
        return redirect()->route('administrador-usuarios')->with('success', 'Usuario creado exitosamente');
    }

    /**
     * Actualiza la información de un usuario en la base de datos y redirige con un mensaje de éxito.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Encuentra al usuario, revoca su rol anterior, actualiza la información y guarda los cambios
        $usuario = User::findOrFail($id);
        $rol_previo = RoleController::findRole($usuario);
        $usuario->removeRole($rol_previo);
        $usuario = UsuariosDTO::assignValues($request, $usuario);
        $usuario->save();

        // Redirige con un mensaje de éxito
        return redirect()->route('administrador-usuarios')->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Muestra el modal de actualización de usuario con información preexistente.
     *
     * @param  int  $idUsuario
     * @return \Illuminate\View\View
     */
    public function modalUpdate($idUsuario)
    {
        // Obtiene la información del usuario y roles para mostrar en el modal
        $usuario = User::find($idUsuario);
        $usuario = new UsuariosDTO($usuario);
        $usuario->status = $usuario->status == 1 ? 1 : 0;

        $carrerasController = new CarrerasController();
        $carrerasDTO = $carrerasController->show();

        $roleController = new RoleController();
        // Obtiene el rol del usuario autenticado
        $rol = $roleController->findRole(auth()->user());

        // Filtra roles según el rol del usuario logueado
        $rolesDTO = $roleController->findAll()->filter(function ($role) use ($rol) {
            // Muestra roles distintos de 'SuperAdmin' y 'Admin' según el usuario logueado
            return ($rol === 'SuperAdmin') ? $role->name !== 'SuperAdmin' : $role->name !== 'SuperAdmin' && $role->name !== 'Admin';
        });

        // Retorna la vista con la información recolectada
        return view('administrador.actualizarUsuario', ['usuario' => $usuario, 'carreras' => $carrerasDTO, 'roles' => $rolesDTO]);
    }

    /**
     * Actualiza el estado (activo/inactivo) de un usuario y redirige con un mensaje de éxito.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, $id)
    {
        // Encuentra al usuario según su ID
        $usuario = User::findOrFail($id);

        // Verifica y cambia el estado del usuario
        if ($usuario->status == 1) {
            $usuario->status = 0; // Cambia el estado a 'inactivo'
        } else {
            $usuario->status = 1; // Cambia el estado a 'activo'
        }

        // Guarda los cambios en la base de datos
        $usuario->save();

        // Redirige con un mensaje de éxito
        return redirect()->route('administrador-usuarios', ['id' => $usuario->id])->with('success', 'Estatus actualizado exitosamente');
    }
}
