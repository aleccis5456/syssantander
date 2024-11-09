<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    public $fillable = ['nombre'];

    public function productos(){
        return $this->hasMany(Producto::class, 'producto_categoria_id');
    }
}
