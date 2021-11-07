<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\DeudaController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
   return redirect()->route('home');
})->name('welcome');

Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home');

/* Auth Routes */
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/auth/access', [AuthController::class, 'access'])->name('auth.access');
Route::post('/auth/store', [AuthController::class, 'store'])->name('auth.store');

Route::middleware(['auth'])->group(function () {
   /* Clientes Routes */
   Route::resource('clientes',ClienteController::class)->names('clientes');

    /* Deudas Routes */
    Route::resource('deudas',DeudaController::class)->names('deudas');

     /* Cuotas Routes */
     Route::resource('cuotas',CuotaController::class)->names('cuotas');
});


