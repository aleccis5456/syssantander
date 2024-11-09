<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaVenta extends Model
{
    public $fillable = ['nombre'];

    public function ventas(){
        return $this->hasMany(Venta::class, 'venta_categoria_id');
    }
}
