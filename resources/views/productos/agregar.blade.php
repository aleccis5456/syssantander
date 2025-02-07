@extends('layout.app')

@section('contenido')


<div class=" relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class=" w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-gray-50  dark:text-white dark:bg-gray-800">
            Todos los productos y servicios
            <br>
            <button onclick="openModalAggProducto(event)" class="text-base h-[35px] border border-gray-800 px-2 py-1 rounded-lg hover:underline">Agregar Producto</button>
            <div class="pt-4">
                <form action="" method="get">
                    <div class="flex items-center">
                        <input type="text" class="bg-gray-100 h-[35px] border border-gray-100 rounded-lg shadow-md focus:ring-gray-100 focus:border-gray-800">
                        <button  class="ml-1 px-2 py-1 bg-gray-800 rounded-lg shadow-md focus:ring-gray-100 focus:border-none">
                            <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Producto</th>
                <th scope="col" class="px-6 py-3">Precio Compra</th>
                <th scope="col" class="px-6 py-3">Precio Venta</th>
                <th scope="col" class="px-6 py-3">Stock</th>
                <th scope="col" class="px-6 py-3">Categoría</th>
                <th scope="col" class="px-6 py-3">Proveedor</th>
                <th scope="col" class="px-6 py-3">Fecha de Adición</th>
                <th scope="col" class="px-6 py-3"><span class="sr-only">Acciones</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$producto->nombre}}
                </th>
                <td class="px-6 py-4">
                    {{ number_format(round($producto->precio_compra, -2), 0, ',', '.') }} Gs.
                </td>
                <td class="px-6 py-4">
                    {{ number_format(round($producto->precio, -2), 0, ',', '.') }} Gs.
                </td>
                <td class="px-6 py-4">
                    {{ $producto->stock }}
                </td>
                <td class="px-6 py-4">
                    {{$producto->categoria->nombre ?? 'sin categoria'}}
                </td>
                <td class="px-6 py-4">
                    {{$producto->proveedor->nombre ?? 'sin proveedor'}}
                </td>
                <td class="px-6 py-4">
                    {{$producto->created_at}}
                </td>
                <td class="px-6 py-4 text-center">
                    <div class="flex">
                        <div class="flex">
                            <a href="#">                                                                                    
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>                                                                                                                          
                            </a>                                        
                        </div>
                        <div class="flex pl-4">                                             
                            <a onclick="return confirm('Estas seguro de borrarlo?')" href="">                                                                                    
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>
                            </a>                                      
                        </div>                                    
                    </div>    
                </td>
            </tr>      
            @endforeach                     
        </tbody>
    </table>
</div>

@include('productos.include.aggProductoModal')

@endsection