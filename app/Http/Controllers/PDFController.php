<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Venta;
use App\Models\VentaProducto;
use App\Models\Producto;
use App\Models\CategoriaVenta;

class PDFController extends Controller
{
    public function generarPDF(Request $request){  
        $categoria = CategoriaVenta::where('id', $request->categoria_id)->first();        
        $ventas = (object)json_decode($request->ventas, true);
        $productos = (object)json_decode($request->productos, true);
        foreach($productos as $producto){
            dd($producto->producto);
        }
        $pdf = PDF::loadView('reportes.index', [
            'desde' => $request->desde,
            'hasta' => $request->hasta,
            'ventas' => $ventas,
            'productos' => $productos,
            'categoria' => $categoria,
            'vendedor' => $request->vendedor,
        ]);

        return $pdf->stream("reporte.pdf");

        // $pdf = PDF::loadView('report.reportes', $data);    
            
        // return $pdf->download('reporte_ventas.pdf');
    }    
}
