<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Exception;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index(){
        return view('gastos.index', [
            'gastos' => Gasto::all(),
            'fechas' => false
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'monto' => 'required|numeric',
            'desc' => 'required|string'
        ]);

        try{
            $gasto = Gasto::create([
                'monto' => $request->monto,
                'descripcion' => $request->desc,
                'user_id' => null,
            ]);
        }catch(\Exception $e){
            throw new Exception($e->getMessage());
        }     
        
        return back()->with('info', 'El gasto de agrego');
    }

    public function filtrar(Request $request){
        $desde = $request->desde;
        $hasta = $request->hasta;
    
        $gastos = Gasto::where('created_at', '>=', "$desde")
                        ->where('created_at', '<=', "$hasta". ' 23:59:59')
                        ->get();

        //dd($gastos);
        return view('gastos.index', [
            'gastos' => $gastos,
            'desde' => $desde,
            'hasta' => $hasta,
            'fechas' => true
        ]);
    }
}


//->where('created_at', '<=', $hasta.' 23:59:59')                                                        