<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Dtos\RolesDTO;
use App\Models\User;
use PhpParser\Node\Expr\Cast\String_;

class RoleController extends Controller
{
    /**
     * Función para buscar todos los roles en la BD y retornarlos como un array
     */
    public function findAll()
    {
        // Método para mostrar una lista de roles
        $roles = Role::all();

        $rolesDTO = collect();

        foreach ($roles as $role) {
            $rolesDTO->push(new RolesDTO($role));
        }

        return $rolesDTO;
    }

    public static function findRole(User $usuario):String{
        foreach ($usuario->roles as $role) {
            $rol= $role->name;
        }
        return $rol;
    }
}
