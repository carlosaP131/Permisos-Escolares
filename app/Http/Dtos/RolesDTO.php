<?php

namespace App\Http\Dtos;

use App\Models\User;
use Spatie\Permission\Models\Role;

class RolesDTO
{
    public $id;
    public $name;

    public function __construct(Role $role)
    {
        $this->id = $role->id;
        $this->name = $role->name;
    }

    public static function getNameRol(int $roleId): string
    {
        $role = Role::findById($roleId);

        return $role->name;
    }


    public function getIdRole($roleName): int
    {
        // Buscar el rol por nombre en la base de datos
        $role = Role::where('name', $roleName)->first();

        // Verificar si se encontró el rol
        if ($role) {
            return $role->id;
        } else {
            return null;
        }
    }

    public static function assignRole(User $user)
    {
        $user->assignRole(self::getNameRol($user->id_rol));
    }
}
