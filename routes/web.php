<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoCategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaCategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductoController::class, 'index'])->name('producto.index');

//carrito
Route::get('/add-carrito', [CarritoController::class, 'add'])->name('carrito.add');

//producto
Route::get('/agregar/producto', [ProductoController::class, 'formAgregar'])->name('producto.formproducto');
Route::post('/agregar/producto', [ProductoController::class, 'store'])->name('producto.store');
Route::get('/productos', [ProductoController::class, 'index'])->name('producto.index');

//categoria productos
Route::get('/agregar/categoria/producto', [ProductoCategoriaController::class, 'formStore'])->name('pcategoria.formstore');
Route::post('/agregar/categoria/producto', [ProductoCategoriaController::class, 'store'])->name('pcategoria.store'); 
Route::put('/actualizar/categoria/producto/{id}', [ProductoCategoriaController::class, 'update'])->name('pcategoria.update');
Route::get('/borrar/categoria/producto/{id}', [ProductoCategoriaController::class, 'delete'])->name('pcategoria.delete');

//categoria ventas
Route::post('/agregar/categoria/venta', [VentaCategoriaController::class, 'store'])->name('ventac.store');
Route::put('/actualizar/categoria/venta/{id}', [VentaCategoriaController::class, 'update'])->name('ventac.update');
Route::get('/borrar/categoria/venta/{id}', [VentaCategoriaController::class, 'delete'])->name('ventac.delete');

//marca
Route::post('/agregar/marca', [MarcaController::class, 'store'])->name('marca.store');

//proveedores
Route::post('/agregar/proveedor', [ProveedorController::class, 'store'])->name('proveedor.store');
Route::get('/borrar/proveedor/{id}', [ProveedorController::class, 'destroy'])->name('proveedor.destroy');