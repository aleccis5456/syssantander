<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoCategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaCategoriaController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\ProductoEnCaja;
use App\Models\Venta;

Route::get('/', [ProductoController::class, 'index'])->name('producto.index');

//carrito
Route::get('/add-carrito', [CarritoController::class, 'add'])->name('carrito.add');
Route::get('/quitar/{indice}', [CarritoController::class, 'quitar'])->name('carrito.quitar');

//producto
Route::get('/agregar/producto', [ProductoController::class, 'formAgregar'])->name('producto.formproducto');
Route::post('/agregar/producto', [ProductoController::class, 'store'])->name('producto.store');
Route::get('/productos', [ProductoController::class, 'index'])->name('producto.index');
Route::get('/producto/{id}/editar', [ProductoController::class, 'editForm'])->name('producto.editform');
Route::post('/editar/producto', [ProductoController::class, 'edit'])->name('producto.edit');
Route::get('/agregar/producto/search', [ProductoController::class, 'buscarProducto'])->name('producto.buscarProducto');
Route::get('/producto/search', [ProductoController::class, 'indexBuscador'])->name('producto.indexBuscador');

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

//venta
Route::get('/venta', [VentaController::class, 'index'])->name('venta.index')->middleware(ProductoEnCaja::class);
Route::post('/venta-agg-cliente', [VentaController::class, 'addCliente'])->name('venta.addcliente');
Route::post('/venta-crear',[VentaController::class, 'crearVenta'])->name('venta.crearventa');


//ventas
Route::get('/ventas', [VentaController::class, 'ventas'])->name('venta.ventas');
Route::get('/ventas/search', [VentaController::class, 'busqueda'])->name('venta.busqueda');
Route::get('/ventas/fechas', [VentaController::class, 'filtroFechas'])->name('venta.filtrofechas');

//debug
Route::get('/debug1', function(){
    Session()->flush();
    return  redirect('/');
});

Route::get('/debug2', function(){
    return view('debug.index');
});

Route::get('/debug3', function(){
    dd(session('carrito'));
});