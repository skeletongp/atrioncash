<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\DeudaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StripeController;
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


   /* Clientes Routes */
   Route::resource('clientes', ClienteController::class)->names('clientes');

   /* Deudas Routes */
   Route::resource('deudas', DeudaController::class)->names('deudas');

   /* Cuotas Routes */
   Route::resource('cuotas', CuotaController::class)->names('cuotas');
});
/* Users Routes */
Route::resource('user', UserController::class)->names('user');

Route::middleware(['auth'])->group(function () {
   /* Stripe Routes */
   Route::get('plans', [StripeController::class, 'index'])->name('plans');
   Route::get('plans/card_create', [StripeController::class, 'card_create'])->name('card_create');
   Route::get('/{plan}/suscribe', [StripeController::class, 'suscribe'])->name('suscribe');
   Route::post('/plans/card_save', [StripeController::class, 'card_save'])->name('card_save');
});
