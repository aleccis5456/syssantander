<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\CategoriaVenta;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index(){

        return view('venta.index', [
            'clientes' => Cliente::all(),
            'tipoVentas' => CategoriaVenta::all(),
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
    
    public function crearVenta(Request $request){
        $request->validate([
            'cliente' => 'nullable',
            'metodo_pago' => 'required',
            'tipo_venta' => 'required',
        ],[
            'metodo_pago' => 'selecciona un metodo de pago',
            'tipo_venta' => 'selecciona un tipo de venta'
        ]);
        
        $venta = Venta::created([
            'cliente_id' => $request->cliente,
            'vendedor_id' => null,
            'forma de pago' => $request->metodo_pago,
            'venta_categoria_id' => $request->tipo_venta,
            'total' => (int)$request->total,
        ]);

        
    }
}