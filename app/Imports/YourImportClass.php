<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Datos;

class YourImportClass implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Datos([
            'matricula' => $row['matricula'],
            'nombre' => $row['nombre'],
            'semestre' => $row['semestre'],
            'carrera' => $row['carrera'],
            'grupo' => $row['grupo'],
        ]);
    }
}
