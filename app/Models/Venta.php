<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public $fillable = [
        'cliente_id', 	
        'vendedor_id', 	
        'forma_pago_id',
        'forma_pago',
        'servicio_id', 	
        'venta_categoria_id', 	
        'total'
    ];

    protected $table = 'ventas';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(User::class, 'vendedor_id');
    }

    public function formaPago()
    {
        return $this->belongsTo(FormaPago::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaVenta::class, 'venta_categoria_id');
    }

    public function detalleVentas()
    {
        return $this->hasMany(DetalleVenta::class);
    }

    public function ventaProducto(){
        return $this->hasMany(VentaProducto::class);
    }
}
