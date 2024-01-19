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


Route::get('/', function () {
    return view('tabla');
});

Route::get('/tabla', function () {
    return view('tabla');
});
Route::get('/alumnos', function () {
    return view('secretaria.alumnos');
});
Route::get('/permisos', function () {
    return view('secretaria.permisos');
});
/* Route::get('/generar', function () {
    return view('secretaria.generarpermiso');
}); */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/genera/{id}', [PermisosController::class,'index'])->name('vista-secretaria');
Route::post('/genera',[PermisosController::class,'store'])->name('genera-secretaria');
Route::patch('/generar/{id}',[PermisosController::class,'show'])->name('genera-alumno');

