<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function addVendedor(Request $request){  
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $request->nombre,
            'apellido' => $request->apellido ?? null,
            'rol' => null,
        ]);

        return back()->with('info', 'Vendedor Agregado');
    }

    public function filtrarVendedor(Request $request){
        dd($request);
    }
}
