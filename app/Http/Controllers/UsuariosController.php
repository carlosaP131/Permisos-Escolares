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

}

