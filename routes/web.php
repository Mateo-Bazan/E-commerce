<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();


Route::resource('home', App\Http\Controllers\HomeController::class);

Route::resource('clientes', App\Http\Controllers\ClienteController::class);
Route::resource('categorias', App\Http\Controllers\CategoriaController::class);
Route::resource('productos', App\Http\Controllers\ProductoController::class);
