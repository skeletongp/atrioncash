<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\DeudaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\NotarioController;
use App\Http\Controllers\UserController;
use App\Models\Deuda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Auth Routes */

Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/auth/access', [AuthController::class, 'access'])->name('auth.access');
Route::post('/auth/store', [AuthController::class, 'store'])->name('auth.store');

Route::middleware(['auth', 'suscribed'])->group(function () {

   /* Home Routes */
   Route::get('/', function () {
      return redirect()->route('home');
   })->name('welcome');
   Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
   Route::get('/provincias', [HomeController::class, 'provincias'])->middleware('auth')->name('provincias');


   /* Clientes Routes */
   Route::get('clientes/activos',[ClienteController::class,'activos'])->name('clientes.activos');
   Route::get('clientes/atrasados',[ClienteController::class,'atrasados'])->name('clientes.atrasados');
   Route::get('clientes/historial',[ClienteController::class,'historial'])->name('clientes.historial');
   Route::resource('clientes', ClienteController::class)->names('clientes');

   /* Deudas Routes */
   Route::get('deudas/activos',[DeudaController::class,'activos'])->name('deudas.activos');
   Route::get('deudas/atrasados',[DeudaController::class,'atrasados'])->name('deudas.atrasados');
   Route::get('deudas/historial',[DeudaController::class,'historial'])->name('deudas.historial');
   Route::get('deudas/cotizar',[DeudaController::class,'cotizar'])->name('deudas.cotizar');
   Route::post('deudas/cotizar/store',[DeudaController::class,'cotizar_store'])->name('deudas.cotizar.store');
   Route::resource('deudas', DeudaController::class)->names('deudas');

   /* Cuotas Routes */
   Route::resource('cuotas', CuotaController::class)->names('cuotas');

    /* Notarios Routes */
    Route::resource('notarios', NotarioController::class)->names('notarios');

   /* Contratos Routes */
   Route::get('contratos/{contrato}/contrato_cuota', [ContratoController::class, 'contrato_cuota'])->name('contratos.contrato_cuota');
   Route::resource('contratos', ContratoController::class)->names('contratos');

 
});

/* Plans Routes */
Route::resource('plans', PlanController::class)->names('plans');
Route::get('plans/{plan}/suscribe', [PlanController::class, 'suscribe'])->name('plans.suscribe');

/* Users Routes */
  Route::post('users/{user}/cobrar',[UserController::class,'cobrar'])->name('users.cobrar');
  Route::resource('users', UserController::class)->names('users');
