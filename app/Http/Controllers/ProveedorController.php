<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class ProveedorController extends Controller
{
    public function store(Request $request){             
        $request->validate([
            'nombre' => 'required|string',
            'contacto' => 'nullable|numeric',
            'detalles' => 'nullable|string'
        ]);

        try{
            Proveedor::create([
                'nombre' => $request->nombre,
                'contacto' => $request->contacto ?? null,
                'detalles' => $request->detalles ?? null
            ]);    

            return back()->with('info', 'proveedor creado');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(String $id){
        try{
            Proveedor::destroy($id);

            return back()->with('info', 'proveedor eliminado');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
        
    }
}
