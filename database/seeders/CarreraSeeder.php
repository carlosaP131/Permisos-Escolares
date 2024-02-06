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
            ['id'=> 10000,'nombre' => 'All'],
            ['id'=> 10001,'nombre' => 'Partial'],
            ['id'=> 1,'nombre' => 'Administración Municipal'],
            ['id'=> 5,'nombre' => 'Administración Pública'],
            ['id'=> 4,'nombre' => 'Ciencias Empresariales'],
            ['id'=> 3,'nombre' => 'Enfermería'],
            ['id'=> 6,'nombre' => 'Informática'],
            ['id'=> 14,'nombre' => 'Medicina'],
            ['id'=> 7,'nombre' => 'Nutrición'],
            ['id'=> 13,'nombre' => 'Odontología'],
        ];

        // Insertar datos en la tabla
        DB::table('carreras')->insert($carreras);
    }
}
