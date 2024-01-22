<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Datos;
use Maatwebsite\Excel\Concerns\WithValidation;

class YourImportClass implements ToModel, WithHeadingRow, WithValidation
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


    public function rules(): array
    {
        // Define las reglas de validación para los campos requeridos
        return [
            'matricula' => 'required',
            'nombre' => 'required',
            'semestre' => 'required',
            'carrera' => 'required',
            'grupo' => 'required',
        ];
    }
}
