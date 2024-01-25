<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use Illuminate\Support\Facades\DB;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Puedes ajustar los datos según tus necesidades
        $carreras = [
            ['nombre' => 'All'],
            ['nombre' => 'Administración Municipal'],
            ['nombre' => 'Administración Pública'],
            ['nombre' => 'Ciencias Empresariales'],
            ['nombre' => 'Enfermería'],
            ['nombre' => 'Informática'],
            ['nombre' => 'Medicina'],
            ['nombre' => 'Nutrición'],
            ['nombre' => 'Odontología'],
            

            // Agrega más carreras según sea necesario
        ];

        // Insertar datos en la tabla
        DB::table('carreras')->insert($carreras);
    }
}
