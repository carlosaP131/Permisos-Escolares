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
            if (!User::where('email', 'usuario@ejemplo.co')->exists()) {
                User::create([
                    'name' => 'oscar',
                    'email' => 'usuario@ejemplo.com',
                    'password' => bcrypt('12121212'),
                    'status' => 1,
                    'id_carrera' => 10000,
                    'id_rol' => 1,
                ])->assignRole('SuperAdmin'); //rol 1 es de admin
            }
        } catch (\Throwable $th) {
        }
    }
}
