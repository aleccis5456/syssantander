<?
namespace App\Helpers;

use Illuminate\Support\Carbon;

class Helper {

    public static function stats(){
        $stats = [
            'conteo' => 0,
            'total_conteo' => 0,
            'total_pagar' => 0,
        ];

        if(session('carrito')){
            $stats['conteo'] = count(session('carrito'));

            $total_conteo = 0;
            $total_pagar = 0;

            foreach(session('carrito') as $item){
                $unidades = $item['cantidad'] ?? 0;
                $precio = $item['precio'] ?? 0;

                $total_conteo += $unidades;
                $total_pagar += $precio * $unidades;
            }

            $stats['total_conteo'] = $total_conteo;
            $stats['total_pagar'] = $total_pagar;

            session(['stats' => $stats]);
        }

        return $stats;
    }

    public static function formatearFecha($fecha){
        return Carbon::parse($fecha)->format('d-m-Y');
    }   
    
    public static function formatearMonto($monto){
        return number_format(round($monto, -2), 0, ',', '.');
    }

}