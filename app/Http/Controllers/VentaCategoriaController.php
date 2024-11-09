<?php

namespace App\Http\Controllers;

use App\Models\CategoriaVenta;
use Illuminate\Http\Request;

class VentaCategoriaController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string'
        ]);

        try{
            $ventaC = CategoriaVenta::create([
                'nombre' => $request->nombre,
            ]);

            return back()->with('info', 'creado correctamente');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());    
        }                
    }

    public function update(Request $request, String $id){
        $request->validate([
            'nombre' => 'required|string'
        ]);

        $ventaC = CategoriaVenta::find($id);
        if(!$ventaC){
            return back()->with('error', 'hubo un error');
        }

        $ventaC->update($request->all());

        return back()->with('info', 'se actualizo correctamente');
    }

    public function delete(String $id){
        $ventaC = CategoriaVenta::destroy($id);

        if(!$ventaC){
            return back()->with('error', 'hubo un error');
        }
        
        return back()->with('info', 'se borro correctamente');
    }
}
