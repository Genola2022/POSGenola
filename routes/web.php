<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ListaprecioController;
use App\Http\Controllers\ProductoController;
use App\Models\Listaprecio;
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

Route::get('hola', function () {
    return view('welcome');
});

Route::resource('productos',ProductoController::class)->names('productos');
Route::resource('clientes', ClienteController::class)->names('clientes');
Route::resource('listaprecios', ListaprecioController::class)->names('listaprecios');
// Route::get('productos/index',[ProductoController::class,'index'])->name('productos.index');
// Route::get('productos/create',[ProductoController::class,'create'])->name('productos.create');
// Route::post('productos/create',[ProductoController::class, 'store'])->name('productos.store');
// Route::get('productos/edit/{producto}',[ProductoController::class, 'edit'])->name('productos.edit');
// Route::post('productos/edit/{producto}',[ProductoController::class, 'update'])->name('productos.update');
// Route::delete('productos/{producto}',[ProductoController::class,'destroy'])->name('productos.destroy');