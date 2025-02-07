<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $fillable = [
        'nombre', 
        'apellido', 	
        'telefono', 
        'doc'
    ];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
    
}
