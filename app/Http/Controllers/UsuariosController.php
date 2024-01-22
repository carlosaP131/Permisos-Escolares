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
        //return view('administrador.administradorUsuarios', compact('usuarios'));
        return view('administrador.administradorUsuarios', ['usuarios' => $usuariosDTO,'carreras'=>$carrerasDTO]);
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
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->input('password'));
    $user->status = $request->input('status');
    $user->id_carrera = $request;

    // Verificar el rol y asignar la carrera si es necesario
    if ($request->input('role') == 'Profesor') {
        $user->id_carrera = $request->input('carrera');
    
    }else{
        $user->id_carrera = 1;
    }
    $user->save();

    return redirect()->route('administrador-usuarios')->with('success', 'Usuario creado exitosamente');
}

}

