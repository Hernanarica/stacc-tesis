<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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
Route::get('/logout', [LogoutController::class, 'index'])->name('logout.index')->middleware('auth');
Route::get('/posts', [UserController::class, 'index'])->name('post.index');

Route::controller(RegisterController::class)->prefix('/registrar')->group(function () {
	Route::get('', [RegisterController::class, 'index'])->name('register.create');
	Route::post('', [RegisterController::class, 'store'])->name('register.store');
});

Route::controller(LoginController::class)->prefix('/login')->group(function () {
	Route::get('', 'index')->name('login.index');
	Route::post('', 'store')->name('login.store');
});

Route::controller(UserController::class)->middleware('auth')->prefix('users')->group(function () {
	Route::patch('/{user}', 'update')->name('user.update');
	Route::delete('/{user}', 'destroy')->name('user.destroy');
});

Route::controller(LocalController::class)->prefix('locals')->group(function () {
	Route::get('', 'index')->name('locals.index');
	Route::get('/{local}', 'show')->name('locals.show');
});

Route::group(['middleware' => ['role:admin|owner']], function () {
	Route::controller(LocalController::class)->prefix('panel')->group(function () {
		Route::get('/registrar-local', 'create')->name('locals.create');
		Route::post('/registrar-local', 'store')->name('locals.store');
		Route::patch('/{id}', 'update')->name('locals.update');
		Route::delete('/{local}', 'destroy')->name('locals.destroy');
	});
});

Route::controller(PostController::class)->middleware('auth')->prefix('posts')->group(function () {
	Route::post('', 'store')->name('post.store');
	Route::patch('/{id}', 'update')->name('post.update');
	Route::delete('/{id}', 'destroy')->name('post.destroy');
});

Route::controller(ContactController::class)->prefix('/contact')->group(function () {
	Route::get('', 'index')->name('contact.index');
});

Route::post('/users', [UserController::class, 'store'])->name('user.store');

Route::post('/agregar-favorito/{id}', [FavoriteController::class, 'store'])->name('favorite.store')->middleware('auth');
Route::get('/mis-favoritos', [FavoriteController::class, 'index'])->name('favorite.index')->middleware('auth');
Route::delete('/eliminar-favorito/{local}', [FavoriteController::class, 'destroy'])->name('favorite.destroy')->middleware('auth');