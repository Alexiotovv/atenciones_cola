<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AtencionesController;
use App\Http\Controllers\PantallasController;
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


Route::get('/',function(){
    return view('login');
})->name('credentials');

Route::get('home/', [HomesController::class, 'index'])->name('home');

//Register and Login user
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


//atenciones
Route::get('/atenciones/edit/{id}', [AtencionesController::class,'edit'])->name('atenciones.edit');
Route::get('/atenciones/index', [AtencionesController::class,'index'])->name('atenciones.index');
Route::get('/atenciones/create', [AtencionesController::class,'create'])->name('atenciones.create');
Route::post('/atenciones/store', [AtencionesController::class,'store'])->name('atenciones.store');
Route::post('/atenciones/update', [AtencionesController::class,'update'])->name('atenciones.update');
Route::get('/atenciones/terminar/{id}', [AtencionesController::class,'terminar'])->name('atenciones.terminar');
Route::get('/atenciones/llamada/{id}', [AtencionesController::class,'llamada'])->name('atenciones.llamada');
Route::get('/atenciones/verificarllamada/', [AtencionesController::class,'verificarllamada'])->name('verificar.llamada');
Route::get('/atenciones/atencion_actual/', [AtencionesController::class,'atencion_actual'])->name('atencion.actual');
Route::get('/pantallas/desactivar_voz/{id}', [AtencionesController::class,'desactivar_voz'])->name('desactivar.voz');
Route::get('/pantallas/activar_voz/{id}', [AtencionesController::class,'activar_voz'])->name('activar.voz');



//Pantallas
Route::post('/pantallas/update', [PantallasController::class,'update'])->name('pantallas.update');
Route::get('/pantallas/index', [PantallasController::class,'index'])->name('pantallas.index');
Route::get('/pantallas/create', [PantallasController::class,'create'])->name('pantallas.create');
Route::post('/pantallas/store', [PantallasController::class,'store'])->name('pantallas.store');
Route::get('/pantallas/destroy/{id}', [PantallasController::class,'destroy'])->name('pantallas.destroy');
Route::get('/pantallas/edit/{id}', [PantallasController::class,'edit'])->name('pantallas.edit');
Route::get('/pantallas/pantalla_main', [PantallasController::class,'pantalla_main'])->name('pantalla.main');
Route::get('/pantallas/estado/{id}/valor/{valor}', [PantallasController::class,'estado'])->name('pantallas.estado');


//Usuarios
Route::get('/users', [UserController::class,'users'])->name('users');
Route::get('/users/edit/{id}', [UserController::class,'edit'])->name('usuario.edit');
Route::get('/users/create', [UserController::class,'create'])->name('usuario.create');
Route::post('/users/update', [UserController::class,'update'])->name('usuario.update');
Route::post('/users/changepassword', [UserController::class,'changepassword'])->name('change.password');

Route::post('/profile', function () { return auth()->user(); });
Route::patch('/change_status/user/{id_user}', [UserController::class,'change_status']);
Route::post('/register', [UserController::class,'register'])->name('register');

