<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductoEnCaja
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session('carrito')){
            return redirect('/');
        }
        return $next($request);
    }

    /*
    if(!session('cajero')){
            return redirect('caja/login');
        }
        return $next($request);
    */
}
