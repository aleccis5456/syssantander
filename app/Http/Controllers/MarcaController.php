<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
        ]);

        try{
            $marca = Marca::create([
                'nombre' => $request->nombre
            ]);

            return back()->with('info', 'La marca se agrego correctamente');
        }catch(\Exception $e){
            return back()->whith('error', 'error al agregar la marca');
        }
        
    }
}
