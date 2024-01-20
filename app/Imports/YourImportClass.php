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
            'nombre' => $row['nombre'],
            'curp' => $row['curp'],
        ]);
    }
}
