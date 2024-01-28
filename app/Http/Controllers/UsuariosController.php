<?php

namespace App\Http\Controllers;

use App\Http\Dtos\UsuariosDTO;
use Illuminate\Support\Facades\Auth;
use App\Http\Dtos\RolesDTO;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Contracts\Role;

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
        $user = UsuariosDTO::assignValues($request);
        $user->save();

        return redirect()->route('administrador-usuarios')->with('success', 'Usuario creado exitosamente');
    }

    // Método para actualizar un usuario
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario = self::assignValuesUpdate($request, $usuario);
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

    // Método estático para asignar valores de actualización
    public static function assignValuesUpdate(Request $request, User $user): User
    {
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->input('password') !== '******') {
            $user->password = bcrypt($request->input('password'));
        }

        $user->status = $request->input('status');
        $user->id_carrera = self::assignIdC(RolesDTO::getNameRol($request->input('role')), $request->input('carrera'));
        $user->id_rol = $request->input('role');

        RolesDTO::assignRole($user);
        return $user;
    }

    // Método estático para asignar ID de carrera según el rol
    public static function assignIdC($role, $carrera): int
    {
        if ($role == 'Profesor') {
            return $carrera;
        } elseif ($role == 'Secretaria') {
            return 10001; // Asignar el valor 2 para Secretaria
        } else {
            return 10000; // Asignar el valor 1 para Admin
        }
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