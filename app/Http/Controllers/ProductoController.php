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
            'codigo' => 'nullable|string',
            'marca' => 'nullable|exists:marcas,id',
            'descripcion' => 'nullable',
            'precio_compra' => 'nullable|numeric',
            'precio' => 'nullable|numeric',
            'stock' => 'nullable|numeric',
            'stock_min' => 'nullable|numeric',
            'categoria_id' => 'nullable|exists:categoria_productos,id',
            'proveedor_id' => 'nullable|exists:proveedores,id'
        ]);

        try{
            Producto::create([
                'nombre' => $request->nombre,
                'codigo' => $request->codigo,
                'marca_id' => $request->marca ?? null, 	
                'producto_categoria_id' => $request->categoria_id ?? null, 	
                'descripcion' => $request->descripcion ?? null, 	
                'precio' => $request->precio ?? null, 	
                'precio_venta' => null, 	
                'precio_compra' => $request->precio_compra ?? null, 	
                'stock' => $request->stock ?? null, 	
                'stock_minimo' => $request->stock_minimo ?? null,
                'proveedor_id' => $request->proveedor_id ?? null,
            ]);

            return back()->with('info', 'Producto creado correctamente!');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }        
    }

    public function editForm(String $id){
        $producto = Producto::find($id);
        if(!$producto){
            return back()->with('error', 'Ocurrio un error');
        }
        return view('productos.edit', [
            'producto' => $producto,
            'marcas' => Marca::all(),
            'proveedores' => Proveedor::all(),
            'categorias' => CategoriaProducto::all(),
        ]);
    }

    public function edit(Request $request){        
        $request->validate([
            'nombre' => 'sometimes|string',
            'codigo' => 'sometimes|string',
            'marca' => 'sometimes|string',
            'proveedor' => 'sometimes|string',
            'categoria' => 'sometimes|string',
            'descripcion' => 'sometimes|string',
            'precio_venta' => 'sometimes|string',
            'precio_compra' => 'sometimes|string',
            'stock' => 'sometimes|string'
        ], [
            'nombre' => 'error en el campo nombre',
            'codigo' => 'error en el campo codigo',
            'marca' => 'error en el campo marca',
            'proveedor' => 'error en el campo proveedor',
            'categoria' => 'error en el campo categoria',
            'descripcion' => 'error en el campo descripcion',
            'precio_venta' => 'error en el campo precio venta',
            'precio_compra' => 'error en el campo precio compra',
            'stock' => 'error en el campo stock',
        ]);

        $producto = Producto::find($request->producto_id);        
        if(!$producto){
            return back()->with('error', 'Ocurrio un error');
        }        
        try{
            $producto->update([
                'nombre' => $request->nombre ?? $producto->nombre,
                'codigo' => $request->codigo ?? $producto->codigo,
                'marca_id' => $request->marca ?? $producto->marca_id,
                'proveedor_id' => $request->proveedor ?? $producto->proveedor_id,
                'producto_categoria_id' => $request->categoria ?? $producto->producto_categoria_id,
                'descripcion' => $request->descripcion ?? $producto->descripcion,
                'precio_venta' => $request->precio_venta ?? $producto->precio_venta,
                'stock' => $request->stock ?? $producto->stock,
            ]);
            
        }catch(\Exception $e){
            return back()->with('error', $e);
        }        
        return redirect()->route('producto.index')->with('info', 'producto actualizado');
    }

    public function buscarProducto(Request $request){
        $filtro = $request->query('q');
        $query = Producto::query();

        $query->whereLike('nombre', "%$filtro%");
        
        $productos = $query->get();
        
        return view('productos.agregar', [
            'productos' => $productos,
            'marcas' => Marca::all(),
            'proveedores' => Proveedor::all(),
            'cProductos' => CategoriaProducto::all(),
            'q' => $filtro
        ]);
    }
}
