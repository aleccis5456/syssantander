<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    public $table = 'gastos';

    protected $fillable = [
        'user_id',
        'monto', 	
        'descripcion'
    ];

    public function admin(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
