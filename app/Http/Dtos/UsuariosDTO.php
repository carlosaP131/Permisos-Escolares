<?php

namespace App\Http\Dtos;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Dtos\RolesDTO;

class UsuariosDTO
{
    public $id;
    public $name;
    public $email;
    public $status;
    public $password;

    public $carrera_nombre;
    public $rol_nombre;

    public function __construct(User $user)
    {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->status = $user->status;
        $this->password = '******';
        $this->carrera_nombre = $user->carrera->nombre; // Accede al nombre de la carrera a través de la relación
        $this->rol_nombre = RolesDTO::getNameRol($user->id_rol);
    }

    public static function assignValues(Request $request, User $user): User
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
}
