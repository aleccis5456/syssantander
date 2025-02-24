<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function add(Request $request){
        if(session('precioDesc')){
            Session::forget('precioDesc');
        }   

        $carrito = session('carrito', []);        
        $producto = Producto::find($request->query('producto_id'));                    
        $cantidad = (int)$request->query('cantidad');
    
        if(!$producto){
            return back()->with('info', 'No se pudo agregar el producto');
        }
        $contador = 0;

        foreach($carrito as &$item){            
            if($item['producto_id'] == $producto->id and $producto->stock >= $cantidad){                
                $contador++;
                $item['cantidad']++;
            }            
        }        
        // dd($contador, $carrito[0]['cantidad']);
        if($contador == 0){            
            $carrito[] = [
                'producto_id' => $producto->id,
                'nombre' => $producto->nombre,
                'marca' => $producto->marca->nombre ?? 'sin marca',
                'precio' => $producto->precio,
                'producto' => $producto,
                'cantidad' => $cantidad
            ]; 
        }                
        session(['carrito' => $carrito]);
        return back()->with('producto_agregado', 'El producto se agregó a tu carrito.');
    }

    public function quitar($indice){
        if(session('precioDesc')){
            Session::forget('precioDesc');
        }   
        $carrito = session('carrito');        
        if($carrito[$indice]['cantidad'] > 1){
            $carrito[$indice]['cantidad']--;                        
            
        }else{
            unset($carrito[$indice]);                                    
        }    
    
        session(['carrito' => $carrito]);
        return back();        
    }
}
