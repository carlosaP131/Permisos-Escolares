<?php

namespace App\Http\Controllers;

use App\Http\Dtos\UsuariosDTO;

use Illuminate\Http\Request;
use App\Models\User;

class UsuariosController extends Controller
{
    //método de consultar usuario
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
    //método para eliminar
    public function destroy($id)
    {
        $usuarios = User::find($id);
        $usuarios->delete();
        return redirect()->route('administrador-usuarios')->with('danger', 'Usuario eliminado
        Exitosamente');
    }

    //Método para crear un usuario
    public function store(Request $request)
    {
        // Crear el usuario en la base de datos
        $user = UsuariosDTO::assignValues($request);
        $user->save();

        return redirect()->route('administrador-usuarios')->with('success', 'Usuario creado exitosamente');
    }
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        // Actualizar los datos del usuario
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'carrera' => $request->input('carrera'),
            'status' => $request->input('status'),
        ];

        // Actualizar la contraseña solo si se proporciona
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        $usuario->save($data);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('administrador-usuarios')->with('success', 'Usuario actualizado exitosamente');
    }


    public function modalUpdate($idUsuario){

        $usuario=User::find($idUsuario);

        $carrerasController = new CarrerasController();
        $carrerasDTO = $carrerasController->show();

        $roleController = new RoleController();
        $rolesDTO = $roleController->findAll();

  return view('administrador.actualizarUsuario',['usuario'=>$usuario,'carreras'=>$carrerasDTO,'roles' => $rolesDTO]);
    }
}
