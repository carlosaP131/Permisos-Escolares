<?php

namespace App\Http\Controllers;

use App\Http\Dtos\PermisosDTO;
use App\Http\Dtos\AlumnosDTO;
use App\Models\Permiso;
use App\Models\Alumno;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function student()
    {
        $alumnos = Alumno::all();
        $alumnosDTO = collect();

        foreach ($alumnos as $alumno) {
            $alumnosDTO->push(new AlumnosDTO($alumno));
        }

        return view('secretaria.alumnos',['alumnos'=>$alumnosDTO]);
    }

    public function permission()
    {
        $permisos = Permiso::all();

        // Crear una colección de PermisoDTO
        $permisosDTO = collect();

        foreach ($permisos as $permiso) {
            $permisosDTO->push(new PermisosDTO($permiso));
        }

        return view('secretaria.tabla', ['permisos' => $permisosDTO]);
    }
}
