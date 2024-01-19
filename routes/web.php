<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/genera', function () {
    return view('secretaria.generarpermiso');
});

Route::get('/menu', function () {
    return view('home');
});

Route::get('/menu', function () {
    return view('menu');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
