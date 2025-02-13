<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VentaProducto extends Model
{
    public $fillable = [
        'venta_id', 	
        'producto_id', 	
        'cantidad', 	
        'precio_unitario',
        'total'
    ];

    protected $table = 'venta_producto';
    
    public function productos(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function venta(){
        return $this->belongsTo(Venta::class, 'venta_id');
    }
}
