<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MarcaController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/* colocar las rutas que hagan falta */
Route::controller(ProductoController::class)->group(function (){
    Route::get('productos', 'index')->name('productos.index');
    Route::get('productos/show/{producto}', 'show')->name('productos.show');
    Route::get('productos/create','create')->name('productos.create');
    Route::post('productos/store','store')->name('productos.store');
    Route::get('productos/{producto}/edit', 'edit')->name('productos.edit');
    Route::put('productos/{producto}', 'update')->name('productos.update'); //para actualizar usamos el método "put"
    Route::delete('productos/{producto}','destroy')->name('productos.destroy'); //para eliminar usamos el método"destroy"
});

Route::controller(ClienteController::class)->group(function (){
    Route::get('clientes', 'index')->name('clientes.index');
    Route::get('clientes/show/{cliente}', 'show')->name('clientes.show');
    Route::get('clientes/create','create')->name('clientes.create');
    Route::post('clientes/store','store')->name('clientes.store');
    Route::get('clientes/{cliente}/edit', 'edit')->name('clientes.edit');
    Route::put('clientes/{cliente}', 'update')->name('clientes.update'); //para actualizar usamos el método "put"
    Route::delete('clientes/{cliente}','destroy')->name('clientes.destroy'); //para eliminar usamos el método"destroy"
});

Route::controller(ProveedorController::class)->group(function (){
    Route::get('proveedores', 'index')->name('proveedores.index');
    Route::get('proveedores/show/{proveedor}', 'show')->name('proveedores.show');
    Route::get('proveedores/create','create')->name('proveedores.create');
    Route::post('proveedores/store','store')->name('proveedores.store');
    Route::get('proveedores/{proveedor}/edit', 'edit')->name('proveedores.edit');
    Route::put('proveedores/{proveedor}', 'update')->name('proveedores.update'); //para actualizar usamos el método "put"
    Route::delete('proveedores/{proveedor}','destroy')->name('proveedores.destroy'); //para eliminar usamos el método"destroy"
});

Route::controller(MarcaController::class)->group(function (){
    Route::get('marcas', 'index')->name('marcas.index');
    Route::get('marcas/show/{marca}', 'show')->name('marcas.show');
    Route::get('marcas/create','create')->name('marcas.create');
    Route::post('marcas/store','store')->name('marcas.store');
    Route::get('marcas/{marca}/edit', 'edit')->name('marcas.edit');
    Route::put('marcas/{marca}', 'update')->name('marcas.update'); //para actualizar usamos el método "put"
    Route::delete('marcas/{marca}','destroy')->name('marcas.destroy'); //para eliminar usamos el método"destroy"
});





require __DIR__.'/auth.php';

