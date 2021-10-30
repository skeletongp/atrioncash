<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
    if(Auth::user()){
        return view('dashboard');
    }
    return view('welcome');
})->name('welcome');

Route::get('/home',[HomeController::class, 'index'])->middleware('auth')->name('home');

/* Auth Routes */
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/auth/access', [AuthController::class, 'access'])->name('auth.access');
Route::post('/auth/store', [AuthController::class, 'store'])->name('auth.store');