<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permiso;

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
        return view('secretaria.alumnos');
    }

    public function permission()
    {
        //$permiso = permiso::all();
        $permiso = DB::select('obtenerDatosAlumnosPermisos', [1]);
        return view('secretaria.tabla',['permisos'=>$permiso]);
    }
}
