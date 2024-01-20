<?php

use App\Http\Controllers\DatosController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/alumno', [App\Http\Controllers\HomeController::class, 'student'])->name('alumno-inicio');
Route::get('/permiso', [App\Http\Controllers\HomeController::class, 'permission'])->name('alumno-permisos');



Route::get('/genera/{id}', [PermisosController::class,'index'])->name('vista-secretaria');
Route::post('/genera',[PermisosController::class,'store'])->name('genera-secretaria');
Route::patch('/generar/{id}',[PermisosController::class,'show'])->name('genera-alumno');

Route::get('datos', [DatosController::class, 'index']);
Route::post('datos/importar',[DatosController::class, 'importar']);


