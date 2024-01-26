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
        // Filtra los campos vacíos o nulos
        $filteredRow = array_filter($row, function ($value) {
            return $value !== null && $value !== '';
        });

        // Verifica si hay al menos un campo no nulo o vacío
        if (!empty($filteredRow)) {
            return new Datos([
                'matricula' => $row['clave'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellidos'],
                'semestre' => $row['semestre'],
                'id_carrera' => $row['programa'],
                'grupo' => $row['grupo'],
            ]);
        }

        // Si todos los campos son nulos o vacíos, retorna null para indicar que este registro debe ser omitido
        return null;
    }



    public function rules(): array
    {
        return [
            'matricula' => 'nullable',  // Cambiado de 'required' a 'nullable'
            'nombre' => 'nullable',
            'apellido' => 'nullable',
            'semestre' => 'nullable',
            'carrera' => 'nullable',
            'grupo' => 'nullable',
        ];
    }

    public function map($row): array
    {
        return [
            'matricula' => $row['clave'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellidos'],
            'semestre' => $row['semestre'],
            'carrera' => $row['programa'],
            'grupo' => $row['grupo'],
        ];
    }


}
