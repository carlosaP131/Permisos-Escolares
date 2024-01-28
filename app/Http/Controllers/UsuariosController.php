<?php

namespace App\Http\Controllers;

use App\Http\Dtos\UsuariosDTO;
use Illuminate\Http\Request;
use App\Models\User;
class UsuariosController extends Controller
{
    // Método para consultar usuarios
    public function consultarUsuario()
    {
        $usuarios = User::all();

        $usuariosDTO = collect();

        foreach ($usuarios as $usuario) {
            $usuariosDTO->push(new UsuariosDTO($usuario));
        }

        $carrerasController = new CarrerasController();
        $carrerasDTO = $carrerasController->show();

        $roleController = new RoleController();
        //obtenemos el rol del usuario autenticado
        $rol = $roleController->findRole(auth()->user());

        // Filtrar roles según el rol del usuario logueado
        $rolesDTO = $roleController->findAll()->filter(function ($role) use ($rol) {
            // Mostrar roles distintos de 'SuperAdmin' y 'Admin' si el usuario logueado es 'SuperAdmin'
            // Mostrar roles distintos de 'SuperAdmin' y 'Admin' si el usuario logueado es 'Admin'
            return ($rol === 'SuperAdmin') ? $role->name !== 'SuperAdmin' : $role->name !== 'SuperAdmin' && $role->name !== 'Admin';
        });

        return view('administrador.administradorUsuarios', ['usuarios' => $usuariosDTO, 'carreras' => $carrerasDTO, 'roles' => $rolesDTO]);
    }

    // Método para eliminar un usuario
    public function destroy($id)
    {
        $usuarios = User::find($id);
        $usuarios->delete();
        return redirect()->route('administrador-usuarios')->with('danger', 'Usuario eliminado exitosamente');
    }

    // Método para crear un usuario
    public function store(Request $request)
    {
        // Crear el usuario en la base de datos
        $user = new User();
        $user = UsuariosDTO::assignValues($request, $user);
        $user->save();

        return redirect()->route('administrador-usuarios')->with('success', 'Usuario creado exitosamente');
    }

    // Método para actualizar un usuario
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $rol_previo= RoleController::findRole($usuario);
        $usuario->removeRole($rol_previo); // Revoca el rol anterior para quitarle los permisos
        $usuario = UsuariosDTO::assignValues($request, $usuario);
        $usuario->save();
        // Redireccionar con un mensaje de éxito
        return redirect()->route('administrador-usuarios')->with('success', 'Usuario actualizado exitosamente');
    }

    // Método para mostrar el modal de actualización de usuario
    public function modalUpdate($idUsuario)
    {
        $usuario = User::find($idUsuario);
        $usuario = new UsuariosDTO($usuario);
        $usuario->status=$usuario->status==1 ? 1 : 0;
        $carrerasController = new CarrerasController();
        $carrerasDTO = $carrerasController->show();

        $roleController = new RoleController();
        //obtenemos el rol del usuario autenticado
        $rol = $roleController->findRole(auth()->user());

        // Filtrar roles según el rol del usuario logueado
        $rolesDTO = $roleController->findAll()->filter(function ($role) use ($rol) {
            // Mostrar roles distintos de 'SuperAdmin' y 'Admin' si el usuario logueado es 'SuperAdmin'
            // Mostrar roles distintos de 'SuperAdmin' y 'Admin' si el usuario logueado es 'Admin'
            return ($rol === 'SuperAdmin') ? $role->name !== 'SuperAdmin' : $role->name !== 'SuperAdmin' && $role->name !== 'Admin';
        });


        return view('administrador.actualizarUsuario', ['usuario' => $usuario, 'carreras' => $carrerasDTO, 'roles' => $rolesDTO]);
    }

    public function updateStatus(Request $request, $id){

        $usuario = User::findOrFail($id);

    // Verificar el estado actual del usuario
        if ($usuario->status == 1) {
        // Cambiar el estado a 'inactivo'
            $usuario->status = 0;
         } else {
        // Cambiar el estado a 'activo'
            $usuario->status = 1;
        }

        // Guardar los cambios en la base de datos
        $usuario->save();
        return redirect()->route('administrador-usuarios', ['id' => $usuario->id])->with('success', 'Estatus actualizado exitosamente');

    }
}
