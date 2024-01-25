<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // Declaración de datos a insertar
        $carreras = [
            ['nombre' => 'All'],
            ['nombre' => 'Partial'],
            ['nombre' => 'Administración Municipal'],
            ['nombre' => 'Administración Pública'],
            ['nombre' => 'Ciencias Empresariales'],
            ['nombre' => 'Enfermería'],
            ['nombre' => 'Informática'],
            ['nombre' => 'Medicina'],
            ['nombre' => 'Nutrición'],
            ['nombre' => 'Odontología'],
        ];

        // Insertar datos en la tabla
        DB::table('carreras')->insert($carreras);
    }
}
