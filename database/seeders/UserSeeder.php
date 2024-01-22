<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 10 usuarios de ejemplo
            User::create([
                'name' => 'admin',
                'email' => 'admin'.'@example.com',
                'password' => Hash::make('contraseña'), // Puedes usar bcrypt('password') también
                'status' => 1, // Ejemplo: activo para usuarios con índice par, inactivo para índice impar
                'id_carrera' => 1, // Asignar carreras aleatorias (ajusta según tus necesidades)
            ]);
    }
}