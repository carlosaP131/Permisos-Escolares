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
        return view('administrador.administradorUsuarios', ['usuarios' => $usuariosDTO, 'carreras' => $carrerasDTO]);

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
        } else {
            $user->id_carrera = 1;
        }
        $user->save();

        return redirect()->route('administrador-usuarios')->with('success', 'Usuario creado exitosamente');
    }
    public function update(Request $request, $idUsuarios)
{
    /* Validación de datos
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'nullable|min:6|confirmed',
        'role' => 'required',
        'carrera' => 'required_if:role,Profesor', // Solo si el rol es Profesor
        'status' => 'required',
    ]);*/

    // Obtener el usuario existente
    $usuario = User::findOrFail($idUsuarios);

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

    $usuario->update($data);

    // Redireccionar con un mensaje de éxito
    return redirect()->route('administrador-usuarios')->with('success', 'Usuario actualizado exitosamente');
}

}

