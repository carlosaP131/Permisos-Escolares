<?php

namespace App\Http\Controllers;

use App\Http\Dtos\PermisosDTO;
use Illuminate\Http\Request;
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
        $alumno = alumno::all();
        return view('secretaria.alumnos',['alumnos'=>$alumno]);
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
