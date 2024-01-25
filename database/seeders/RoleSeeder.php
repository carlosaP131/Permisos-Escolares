<?php

namespace Database\Seeders;

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

                Permission::create(['name' => 'alumno-inicio'])->syncRoles([$role1, $role2]);
                Permission::create(['name' => 'alumno-permisos'])->syncRoles([$role1, $role2, $role3]);
                Permission::create(['name' => 'administrador-usuarios'])->syncRoles([$role1]);

                Permission::create(['name' => 'formulario-permiso'])->syncRoles([$role2]);
                Permission::create(['name' => 'crear-permiso'])->syncRoles([$role2]);
                Permission::create(['name' => 'vista-permiso'])->syncRoles([$role2]);
                Permission::create(['name' => 'actualizar-permiso'])->syncRoles([$role2]);
                Permission::create(['name' => 'permiso-destroy'])->syncRoles([$role1]);

                Permission::create(['name' => 'crear-usuario'])->syncRoles([$role1]);
                Permission::create(['name' => 'actualizar-usuario'])->syncRoles([$role1]);
                Permission::create(['name' => 'usuarios-destroy'])->syncRoles([$role1]);

                Permission::create(['name' => 'vista-cargar-excel'])->syncRoles([$role1]);
                Permission::create(['name' => 'poblar-alumnos'])->syncRoles([$role1]);
                Permission::create(['name' => 'borrar-alumnos'])->syncRoles([$role1]);
        }
}
