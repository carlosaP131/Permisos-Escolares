<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario por defecto
        if (!User::where('email', 'usuario@ejemplo.com')->exists()) {
            User::create([
                'name' => 'oscar',
                'email' => 'usuario@ejemplo.com',
                'password' => bcrypt('contraseña'),
            ])->assignRole('Admin');
        }else{
            dd('El usuario ya existe');
        }
    }
}
