<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Marca;
use App\Models\CategoriaProducto;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        return view('productos.index', [
            'productos' => Producto::all()
        ]);
    }

    public function formAgregar(){
        return view('productos.agregar', [
            'cProductos' => CategoriaProducto::all(),
            'marcas' => Marca::all(),
            'productos' => Producto::all(),
            'proveedores' => Proveedor::all(),
        ]);
    }

    public function store(Request $request){                
        $request->validate([            
            'nombre' => 'required|string',
            'marca' => 'nullable|exists:marcas,id',
            'descripcion' => 'nullable',
            'precio_compra' => 'nullable|numeric',
            'precio' => 'nullable|numeric',
            'stock' => 'nullable|numeric',
            'stock_min' => 'nullable|numeric',
            'categoria_id' => 'nullable|exists:categoria_productos,id',
        ]);

        //try{
            $producto = Producto::create([
                'nombre' => $request->nombre, 	
                'marca_id' => $request->marca ?? null, 	
                'producto_categoria_id' => $request->categoria_id ?? null, 	
                'descripcion' => $request->descripcion ?? null, 	
                'precio' => $request->precio ?? null, 	
                'precio_venta' => null, 	
                'precio_compra' => $request->precio_compra ?? null, 	
                'stock' => $request->stock ?? null, 	
                'stock_minimo' => $request->stock_minimo ?? null
            ]);

            return back()->with('info', 'Producto creado correctamente!');
        // }catch(\Exception $e){
        //     return back()->with('error', 'error al crear el producto');
        // }        
    }
}
