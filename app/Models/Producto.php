<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 	
        'codigo',
        'marca_id', 	
        'producto_categoria_id', 	
        'descripcion', 	
        'precio', 	
        'precio_venta', 	
        'precio_compra', 	
        'stock', 	
        'stock_minimo',
        'proveedor_id'
    ];

    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function categoria(){
        return $this->belongsTo(CategoriaProducto::class, 'producto_categoria_id');
    }

    public function detalleVentas()
    {
        return $this->hasMany(DetalleVenta::class);
    }

    public function marca(){
        return $this->belongsTo(Marca::class, 'marca_id');
    }
}
