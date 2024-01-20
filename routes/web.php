<?php

use App\Http\Controllers\DatosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermisosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| En este archivo, puedes registrar las rutas web para tu aplicación. Estas
| rutas son cargadas por RouteServiceProvider y todas se asignarán al grupo de
| middleware "web". ¡Haz algo grandioso!
|
*/

// Rutas para la autenticación
Auth::routes();

// Ruta principal, muestra la vista de registro de autenticación
Route::get('/', function () {
    return view('auth.login');
});

// Ruta para el inicio, utiliza el controlador HomeController@index y tiene un nombre 'home'
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ruta para la página de inicio de alumnos, utiliza el controlador HomeController@student y tiene un nombre 'alumno-inicio'
Route::get('/alumno', [App\Http\Controllers\HomeController::class, 'student'])->name('alumno-inicio');

// Ruta para la página de permisos de alumnos, utiliza el controlador HomeController@permission y tiene un nombre 'alumno-permisos'
Route::get('/permiso', [App\Http\Controllers\HomeController::class, 'permission'])->name('alumno-permisos');

// Rutas relacionadas con la generación de permisos por la secretaria
Route::get('/genera/{id}', [PermisosController::class,'index'])->name('vista-secretaria');
Route::post('/genera',[PermisosController::class,'store'])->name('genera-secretaria');
Route::patch('/generar/{id}',[PermisosController::class,'show'])->name('genera-alumno');
Route::delete('/permiso/{id}',[PermisosController::class,'destroy'])->name('permiso-destroy');

//Rutas para Importar excel
Route::get('datos', [DatosController::class, 'index']);
Route::post('datos/importar',[DatosController::class, 'importar']);
