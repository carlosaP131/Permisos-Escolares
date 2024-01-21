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

        //return view('administrador.administradorUsuarios', compact('usuarios'));
        return view('administrador.administradorUsuarios', ['usuarios' => $usuariosDTO]);
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
        // Validación de campos del formulario
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'status' => 'required|boolean',
            'id_carrera' => 'required|exists:carreras,id',
        ]);

        // Crear el usuario en la base de datos
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->status = $request->input('status');
        $user->id_carrera = $request->input('id_carrera');
        $user->save();

        // Puedes agregar más lógica aquí si es necesario

        // Redireccionar a la vista o ruta que desees
        return redirect()->route('administrador-usuarios')->with('success', 'Usuario creado exitosamente');
    }

}

