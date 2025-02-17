@extends('layout.app')

@section('contenido')
    <div class="bg-gray-50 border border-gray-100 rounded-lg shadow-lg px-10 pt-12 pb-10">
        <p class="font-semibold pb-4">Lista de servicios y productos</p>            
            <div class="py-4">
                <form action="{{ route('producto.indexBuscador') }}" method="get">
                    <div class="flex items-center">
                        <input type="text" name="q" value="{{ $q ?? '' }}" class="bg-gray-100 h-[35px] border border-gray-100 rounded-lg shadow-md focus:ring-gray-100 focus:border-gray-800">
                        <button  class="ml-1 px-2 py-1 bg-gray-800 rounded-lg shadow-md focus:ring-gray-100 focus:border-none">
                            <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            codigo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            precio
                        </th>
                        <th scope="col" class="pl-20">
                            accion
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)                    
                    <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $producto->codigo }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$producto->nombre}}
                        </th>
                        <td class="px-6 py-4">
                            {{$producto->stock}}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format(round($producto->precio, -2), 0, ',', '.') }} Gs.
                        </td>
                        <td class="px-6 py-4 ">
                            
                            <form action="{{ route('carrito.add') }}" method="get"> 
                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                <input class="rounded-lg w-[70px]" type="number" name="cantidad" value="1">                               
                                <button class="m-4 py-2 px-2 border border-gray-800 rounded-lg hover:font-semibold text-gray-800 hover:underline" type="submit">
                                    Agregar
                                </button>                                                      
                            </form> 

                        </td>
                    </tr>
                    @endforeach                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
