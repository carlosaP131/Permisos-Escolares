<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserta un periodo de ejemplo
        DB::table('periodos')->insert([
            'nombre' => 'Todos',
            'fecha_inicial' =>null,
            'fecha_final' => null,
        ]);

    }
}
