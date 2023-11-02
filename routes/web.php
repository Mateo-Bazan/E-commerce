<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController;

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

Route::resource('/', App\Http\Controllers\HomeController::class);

Auth::routes();


Route::resource('home', App\Http\Controllers\HomeController::class);

Route::resource('clientes', App\Http\Controllers\ClienteController::class);
Route::resource('categorias', App\Http\Controllers\CategoriaController::class);
Route::resource('productos', App\Http\Controllers\ProductoController::class);


//Route::get('/', [CarritoController::class, 'home'])->name('home');
Route::get('/cart', [CarritoController::class, 'cart'])->name('cart.index');
Route::post('/add', [CarritoController::class, 'add'])->name('cart.store');
Route::post('/update', [CarritoController::class, 'update'])->name('cart.update');
Route::post('/remove', [CarritoController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CarritoController::class, 'clear'])->name('cart.clear');

