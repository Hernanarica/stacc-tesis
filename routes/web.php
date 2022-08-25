<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::controller(LocalController::class)->prefix('/locals')->group(function () {
	Route::get('', [LocalController::class, 'index'])->name('locals.index');
	Route::get('/{id}', [LocalController::class, 'index'])->name('locals.show');
});

Route::controller(RegisterController::class)->prefix('/registrar')->group(function () {
	Route::get('', [RegisterController::class, 'index'])->name('register.create');
	Route::post('', [RegisterController::class, 'store'])->name('register.store');
});

Route::get('/iniciar-sesion', [LoginController::class, 'index'])->name('login.create');
Route::controller(AuthController::class)->prefix('/auth')->group(function () {
	Route::get('/login', [AuthController::class, 'login'])->name('login');
	Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});