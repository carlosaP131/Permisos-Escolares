<?php

namespace App\Http\Controllers;

use App\Http\Dtos\UsuariosDTO;
use App\Http\Dtos\RolesDTO;
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
        $rolesDTO = $roleController->findAll();

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
        $carrerasController = new CarrerasController();
        $carrerasDTO = $carrerasController->show();

        $roleController = new RoleController();
        $rolesDTO = $roleController->findAll();

        return view('administrador.actualizarUsuario', ['usuario' => $usuario, 'carreras' => $carrerasDTO, 'roles' => $rolesDTO]);
    }
}
