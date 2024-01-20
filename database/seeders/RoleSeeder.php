<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Se crean los roles
         */
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Secretaria']);
        $role3 = Role::create(['name' => 'Profesor']);
        /**
         * Se crean los permisos hacia las rutas o vistas y se le asigna
         * los permisos a cada role
         */
        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'inicio-alumnos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'permisos-creados'])->syncRoles([$role1, $role2, $role3]);
        dd('Roles y permisos creados exitosamente.');

    }

}
