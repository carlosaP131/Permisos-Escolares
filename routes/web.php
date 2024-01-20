<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermisosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});
/**
 * Rutas principales
 * 1.-Vista home, o login si no ha iniciado sesion
 * 2.-Vista de todos los alumnos en la base de datos
 * 3.-Vista para los permisos que ha generado cada secretaria, para el caso de secretaria
 *      y vista de todos los permisos generados para el usuario administrador
 */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/alumno', [App\Http\Controllers\HomeController::class, 'student'])->name('inicio-alumnos');
Route::get('/permiso', [App\Http\Controllers\HomeController::class, 'permission'])->name('permisos-creados');
/**
 * Rutas para permisos hechos por la secretaria
 * 1.- Muestra un  formulario con los datos precargados del alumno
 * 2.- Crea el permiso y lo guarda en la base de datos
 * 3.-
 */
Route::get('/genera/{id}', [PermisosController::class,'index'])->name('vista-secretaria');
Route::post('/genera',[PermisosController::class,'store'])->name('genera-secretaria');
Route::patch('/generar/{id}',[PermisosController::class,'show'])->name('genera-alumno');

