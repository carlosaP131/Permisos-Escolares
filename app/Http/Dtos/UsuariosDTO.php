<?php

namespace App\Http\Dtos;
use App\Models\User;

class UsuariosDTO
{
    public $id;
    public $name;
    public $email;
    public $status;
    public $password;

    public $carrera_nombre;

    public function __construct(User $user)
    {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->status = $user->status;
        $this->password='******';
        $this->carrera_nombre = $user->carrera->nombre; // Accede al nombre de la carrera a través de la relación
    }
}
