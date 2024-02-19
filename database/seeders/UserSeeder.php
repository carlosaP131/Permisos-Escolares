<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * *
     * @return void
     */
    public function run(): void
    {
        // Crear un usuario por defecto
        try {
            if (!User::where('email', 'superadmin@admin.com')->exists()) {
                User::create([
                    'name' => 'SuperAdmin',
                    'email' => 'superadmin@admin.com',
                    'password' => bcrypt('4dMin@pas5wd'),
                    'status' => 1,
                    'id_carrera' => 10000,
                    'id_rol' => 1,
                ])->assignRole('SuperAdmin'); //rol 1 es de admin
            }
        } catch (\Throwable $th) {
        }
    }
}
