<?php

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
    return view('welcome');
});

Auth::routes();

// genera las rutas a partir del controlador de juego
Route::resource('juegos', App\Http\Controllers\JuegoController::class)->middleware('auth');

// genera las rutas a partir del controlador de tienda
Route::resource('tiendas', App\Http\Controllers\TiendaController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
