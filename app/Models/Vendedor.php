<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    public $table = 'users';

    protected $fillable = [
        'name', 	
        'apellido', 	
        'rol'
    ];

    public function ventas(){
        return $this->hasMany(Venta::class);
    }
}
