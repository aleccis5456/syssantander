<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Cliente;
use App\Models\CategoriaVenta;
use App\Models\Venta;
use App\Models\VentaProducto;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;
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
        
        DB::beginTransaction();
        try{            
            $venta = Venta::create([
                'cliente_id' => $request->cliente,
                'vendedor_id' => null,
                'servicio_id' => null,
                'forma_pago_id' => null,
                'forma_pago' => $request->metodo_pago,
                'venta_categoria_id' => $request->tipo_venta,
                'total' => (int)$request->total,
            ]);                              

            foreach(session('carrito') as $carrito){
                $ventaProducto = VentaProducto::create([
                    'venta_id' => $venta->id,
                    'producto_id' => $carrito['producto']['id'],
                    'cantidad' => $carrito['cantidad'],
                    'precio_unitario' => $carrito['producto']['precio'],
                    'total' => $venta->total,
                ]);

                $producto = Producto::find($carrito['producto']['id']);

                if(!$producto){
                    return back()->with('error', 'Ocurrio un error, vuelva a intentarlo');
                }                
                $producto->stock = max(0, $producto->stock - $carrito['cantidad']);
                $producto->save();                
            }
            
        }catch(\Exception $e){
            dd('error');
            DB::rollBack();
            //return back()->with('error', 'Ocurrio un error, verifique los campos');
            throw new Exception($e->getMessage());
        }

        DB::commit();
        Session::forget('carrito');
        return redirect('/')->with('info', 'Venta realizada');
    }

    public function ventas(){
        return view('venta.ventas', [
            'productos' => VentaProducto::orderByDesc('id')->get(),                        
            'ventas' => Venta::orderByDesc('id')->get(),
        ]);

    }

    public function busqueda(Request $request){
        $filtro = $request->query('b') ?? '';
        
        $ventas = Venta::join('clientes', 'clientes.id', '=', 'ventas.cliente_id')
                        ->where('clientes.nombre', 'like', "%$filtro%")
                        ->orWhere('clientes.apellido', 'like', "%$filtro%")
                        ->select('ventas.*')->get();
        
        
        return view('venta.ventas',[
            'productos' => VentaProducto::orderByDesc('id')->get(),
            'ventas' => $ventas,
            'b' => $filtro
        ]);
    }
}