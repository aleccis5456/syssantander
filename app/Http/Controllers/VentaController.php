<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\CategoriaVenta;
use App\Models\Venta;
use App\Models\VentaProducto;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Carbon;
use PDF;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        return view('venta.index', [
            'clientes' => Cliente::all(),
            'tipoVentas' => CategoriaVenta::all(),
            'vendedores' => User::all(),
        ]);
    }

    public function addCliente(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'nullable|string',
            'ruc_ci' => 'required|string'
        ]);

        try {
            $cliente = Cliente::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'telefono' => null,
                'doc' => $request->ruc_ci
            ]);
        } catch (\Exception $e) {
            return back()->with('error', $e);
        }

        return back()->with('info', 'Cliente Agregado correctamente');
    }

    public function crearVenta(Request $request)
    {
        $request->validate([
            'cliente' => 'nullable',
            'metodo_pago' => 'required',
            'tipo_venta' => 'required',
            'vendedor' => 'nullable',
            'desc' => 'nullable'
        ], [
            'metodo_pago' => 'selecciona un metodo de pago',
            'tipo_venta' => 'selecciona un tipo de venta'
        ]);
        DB::beginTransaction();
        try {
            $venta = Venta::create([
                'codigo' => $this->generateRandomCode(6),
                'cliente_id' => $request->cliente,
                'vendedor_id' => $request->vendedor ?? null,
                'servicio_id' => null,
                'forma_pago_id' => null,
                'forma_pago' => $request->metodo_pago,
                'venta_categoria_id' => $request->tipo_venta,
                'total' => (int)$request->total,
                'descripcion' => $request->desc
            ]);

            foreach (session('carrito') as $carrito) {
                $ventaProducto = VentaProducto::create([
                    'venta_id' => $venta->id,
                    'producto_id' => $carrito['producto']['id'],
                    'cantidad' => $carrito['cantidad'],
                    'precio_unitario' => $carrito['producto']['precio'],
                    'total' => $venta->total,
                ]);

                $producto = Producto::find($carrito['producto']['id']);

                if (!$producto) {
                    return back()->with('error', 'Ocurrio un error, vuelva a intentarlo');
                }
                $producto->stock = max(0, $producto->stock - $carrito['cantidad']);
                $producto->save();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            //return back()->with('error', 'Ocurrio un error, verifique los campos');
            throw new Exception($e->getMessage());
        }

        DB::commit();
        $carrito = session('carrito');
        session(['ticket' => [$carrito, $venta]]);
        Session::forget('carrito');

        return redirect('/')->with('ventaConfirmada', 'Venta realizada');
    }


    private function generateRandomCode($length)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    public function ventas()
    {
        return view('venta.ventas', [
            'productos' => VentaProducto::orderByDesc('id')
                                    ->latest()
                                    ->take(10)
                                    ->get(),
            'ventas' => Venta::orderByDesc('id')
                            ->latest()
                            ->take(10)
                            ->get(),
            'vendedores' => User::all(),
            'filtro' => null,
            'categorias' => CategoriaVenta::all(),
            'categoria_id' => null,
            'pdf' => false
            
        ]);
    }

    public function busqueda(Request $request)
    {        
        //dd($request);
        $flag = $request->query('flag') ?? false;        
        $q = $request->query('b') ?? '';
        $filtro = $request->query('filtro');
        $categoria_id = $request->query('categoria_id');
        $desde = $request->query('desde');
        $hasta = $request->query('hasta');        
        
        // Ventas filtradas por cliente
        $ventasPorCliente = Venta::join('clientes', 'clientes.id', '=', 'ventas.cliente_id')
            ->where('clientes.nombre', 'like', "%$q%")
            ->orWhere('clientes.apellido', 'like', "%$q%")
            ->select('ventas.*');

        // Ventas filtradas por producto
        $ventasPorProducto = VentaProducto::join('productos', 'productos.id', '=', 'venta_producto.producto_id')
            ->where('productos.nombre', 'like', "%$q%")
            ->orWhere('productos.codigo', 'like', "%$q%")
            ->select('venta_producto.venta_id as id');
             
        if($filtro != null or $categoria_id != null){    
            //dd(Venta::where('venta_categoria_id', $categoria_id)->get());
            $ventas = Venta::where('vendedor_id', $filtro)
                        ->where('venta_categoria_id', $categoria_id)                        
                        ->get();                        
        }else{
            $ventas = Venta::whereIn('id', $ventasPorCliente->pluck('id')
                        ->merge($ventasPorProducto->pluck('id')))                        
                        ->get();                        
        }   
        
        if($hasta != null and $desde != null){
            if($filtro != null or $categoria_id != null){
                $ventas = Venta::where('created_at', '>=', $desde)
                            ->where('created_at', '<=', $hasta.' 23:59:59')
                            ->where('vendedor_id', $filtro)
                            ->where('venta_categoria_id', $categoria_id)                            
                            ->get();                            
            
            }elseif($q != null){
                $query = Venta::whereIn('id', $ventasPorCliente
                            ->pluck('id')
                            ->merge($ventasPorProducto->pluck('id')));
                $ventas = $query->where('created_at', '>=', $desde)
                            ->where('created_at', '<=', $hasta.' 23:59:59')
                            ->where('vendedor_id', $filtro)
                            // ->where('venta_categoria_id', $categoria_id)                            
                            ->get();
            }else{
                $ventas = Venta::where('created_at', '>=', $desde)
                            ->where('created_at', '<=', $hasta.' 23:59:59')                                                        
                            ->get();
            }
            
        }                
        // Cargar productos asociados a esas ventas
        $productos = VentaProducto::whereIn('venta_id', $ventas->pluck('id'))->get();
        
        if($flag == true){
            $categoria = CategoriaVenta::where('id', $request->categoria_id)->first();              

            $pdf = PDF::loadView('reportes.index', [            
                'ventas' => $ventas,
                'productos' => $productos,
                'vendedores' => User::all(),
                'b' => $q,
                'filtro' => $filtro,
                'desde' => $desde,
                'hasta' => $hasta,
                'categoria_id' => $categoria_id,
                'categoria' => $categoria,
                'pdf' => true
            ]);

            return $pdf->stream("reporte.pdf");
        }

        return view('venta.ventas', [
            'ventas' => $ventas,
            'productos' => $productos,
            'vendedores' => User::all(),
            'b' => $q,
            'filtro' => $filtro,
            'desde' => $desde,
            'hasta' => $hasta,
            'categoria_id' => $categoria_id,
            'categorias' => CategoriaVenta::all(),
            'pdf' => true
        ]);
    } 
}
