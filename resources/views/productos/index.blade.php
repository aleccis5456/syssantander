@extends('layout.app')

@section('contenido')
    <div class="bg-gray-200 px-10 pt-12 pb-10">
        <p class="font-semibold pb-4">Lista de servicios y productos</p>
        
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
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
