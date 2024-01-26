<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearPermisoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            // Puedes ajustar según tus necesidades
            'tipoPermiso' => 'required|in:Dias,Horas',
            'Fecha_Inicial' => 'required_if:tipoPermiso,Dias',
            'Fecha_Final' => 'required_if:tipoPermiso,Dias',
            'Fecha_Horas' => 'required_if:tipoPermiso,Horas',
            'Hora_Inicial' => 'required_if:tipoPermiso,Horas',
            'Hora_Final' => 'required_if:tipoPermiso,Horas',
            'motivo' => 'required|string|min:5',
            'descripcion' => 'required|string|min:5',
        ];
    }
}
