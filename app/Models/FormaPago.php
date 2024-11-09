<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    protected $fillable = ['nombre'];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
