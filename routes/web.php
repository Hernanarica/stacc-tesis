<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
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

Route::controller(LocalController::class)->prefix('/locales')->group(function () {
	Route::get('', [LocalController::class, 'index'])->name('locals.index');
	Route::get('/{id}', [LocalController::class, 'index'])->name('locals.show');
});

Route::controller(RegisterController::class)->prefix('/registrar')->group(function () {
	Route::get('', [RegisterController::class, 'index'])->name('register.create');
	Route::post('', [RegisterController::class, 'store'])->name('register.store');
});

Route::controller(LoginController::class)->prefix('/login')->group(function () {
	Route::get('', 'index')->name('login.index');
	Route::post('', 'store')->name('login.store');
});
Route::get('/logout', [LogoutController::class, 'index'])->name('logout.index');

Route::controller(PostController::class)->prefix('post')->group(function () {
	Route::get('', 'index')->name('post.index');
	Route::post('', 'store')->name('post.store');
	Route::patch('/{id}', 'update')->name('post.update');
	Route::delete('/{id}', 'destroy')->name('post.destroy');
});