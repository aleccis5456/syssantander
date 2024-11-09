<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'cliente_id', 	
        'vendedor_id', 	
        'forma_pago_id', 	
        'servicio_id', 	
        'venta_categoria_id'
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
    
}
