<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\DatosController;

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


/**
 * Rutas para la vista principal en el siguiente orden
 * 1. Muestra la vista principal de la aplicación
 * 2. Muestra a todos los alumnos en la base de datos
 * 3. Muestra los permisos filtrado por roles
 */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/alumno', [App\Http\Controllers\HomeController::class, 'student'])->name('alumno-inicio');
Route::get('/permiso', [App\Http\Controllers\HomeController::class, 'permission'])->name('alumno-permisos');
Route::get('/users', [App\Http\Controllers\UsuariosController::class, 'consultarUsuario'])->name('administrador-usuarios');


/**
 * Rutas para interactuar con permisos enel diguiente orden
 * 1. Muestra un formulario para generar un permiso
 * 2. Ruta para crear el permiso en la base de datos
 * 3. Ruta para mostrar un formulario de edición de un permiso específico
 * 4. Ruta para actualizar la información del permiso en la DB
 * 5. Ruta que elimina el permiso en la base de datos
 */
Route::get('/formulario/{id}', [PermisosController::class, 'formulario'])->name('formulario-permiso');
Route::post('/generar', [PermisosController::class, 'store'])->name('crear-permiso');
Route::get('/formularioUpdate/{idPermiso}', [PermisosController::class, 'edit'])->name('vista-permiso');
Route::patch('/update/{idPermiso}', [PermisosController::class, 'update'])->name('actualizar-permiso');
Route::delete('/permiso/{id}', [PermisosController::class, 'destroy'])->name('permiso-destroy');
Route::delete('/usuarios/{id}', [UsuariosController::class, 'destroy'])->name('usuarios-destroy');

/**
 * rutas para vargar los datos desde un archivo excel
 * 1.- Muestra la vista de con la opcioón de cargar un archivo
 * 2.- Acción del botón importar, accede a la clase importar
 *      que ejecuta la acción de poblar la base y redireccciona a la vista principal de alumnos
 * 3.- Ruta para borrar los datos de alumnos
 */
Route::get('/data', [DatosController::class, 'index'])->name('vista-cargar-excel');
Route::post('/data', [DatosController::class, 'importar'])->name('poblar-alumnos');

Route::get('/borrar-alumnos', [DatosController::class, 'borrarAlumnos'])->name('borrar-alumnos');
