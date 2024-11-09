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
                <th scope="col" class="px-6 py-3">
                    producto
                </th>
                <th scope="col" class="px-6 py-3">
                    precio compra
                </th>
                <th scope="col" class="px-6 py-3">
                    precio venta
                </th>
                <th scope="col" class="px-6 py-3">
                    stock
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$producto->nombre}}
                </th>
                <td class="px-6 py-4">
                    {{$producto->categoria->nombre}}
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>      
            @endforeach                     
        </tbody>
    </table>
</div>

@include('productos.include.aggProductoModal')
@endsection