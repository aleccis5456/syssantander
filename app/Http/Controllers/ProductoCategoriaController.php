<?php

namespace App\Http\Controllers;

use App\Models\CategoriaVenta;
use App\Models\CategoriaProducto;
use Illuminate\Http\Request;

class ProductoCategoriaController extends Controller
{
    public function formStore(){
        $cProductos = CategoriaProducto::all();
        $cVentas = CategoriaVenta::all();
        return view('categorias.producto.store', [
            'cProductos' => $cProductos,
            'cVentas' => $cVentas,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string'
        ]);
        try{
            $cProducto = CategoriaProducto::create([
                'nombre' => $request->nombre
            ]);

            return back()->with('info', 'Categoria PRODUCTO creada!');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }        
    }

    public function update(Request $request, String $id){
        $request->validate([
            'nombre' => 'sometimes|string'
        ]);

        $cProducto = CategoriaProducto::find($id);
        if(!$cProducto){
            return back()->with('error', 'ha ocurrido un error');
        }

        $cProducto->update($request->all());

        return back()->with('info', 'Correcta actualizacion');
    }

    public function delete(String $id){
        $cProducto = CategoriaProducto::destroy($id);

        if(!$cProducto){
            return back()->with('info', 'ocurrio un error al borrar');
        }
        
        return back()->with('info', 'Se borro correctamente');
    }
}
