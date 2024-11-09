<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public $fillable = ['nombre'];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}

