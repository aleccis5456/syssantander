<?php

namespace App\Http\Controllers;

use App\Models\Deudores;
use Illuminate\Http\Request;

class DeudoresController extends Controller
{
    public function index(){
        return view('dedores.index', [
            'deudores' => Deudores::all(),
        ]);
    }
}
