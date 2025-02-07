<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index(){

        return view('venta.index', [
            'clientes' => Cliente::all(),
        ]);
    }

    public function addCliente(Request $request){
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'nullable|string',
            'ruc_ci' => 'required|string'            
        ]);

        try{
            $cliente = Cliente::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'telefono' => null,
                'doc' => $request->ruc_ci
            ]);            
        }catch(\Exception $e){
            return back()->with('error', $e);
        }
        
        return back()->with('info', 'Cliente Agregado correctamente');
    }    
}