@extends('layout.app')

@section('contenido')
{{-- @dd(session('carrito')) --}}
    <div class="max-w-sm mx-auto flex items-center justify-center">
        {{-- <x-alertas /> --}}
    </div>    
    {{-- @dd(session('statsVentaCaja'))     --}}
    <div class="flex flexcol">
        <div class="w-1/2">
            <div class="relative overflow-x-auto">
                <p class="text-center p-2 font-semibold text-xl">Productos</p>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>                            
                            <th scope="col" class="px-2 py-1">
                                producto
                            </th>
                            <th scope="col" class="px-2 py-1">
                                precio u
                            </th>
                            <th scope="col" class="px-2 py-1">
                                cantidad
                            </th>
                            <th scope="col" class="px-2 py-1">
                                total
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('carrito') as $indice => $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">                                
                                <td class="px-2 py-3">
                                    {{ Str::limit($item['nombre'], 20) }}
                                </td>
                                <td class="px-2 py-3">
                                    {{ number_format($item['precio'] != 0 ? $item['precio'] : $item['precio'], 0, ',', '.') }}
                                    Gs.
                                </td>
                                <td class="px-2 py-3">
                                    <div>
                                        {{-- @dd(session('carrito')) --}}
                                        @if ($item['producto']['precio'] == $item['precio'])                                            
                                            <div class="pl-2">
                                                <span class="font-bold">
                                                    {{-- <a href="{{ route('carrito.add') }}">+</a> --}}
                                                    <div class="pl-1">
                                                        <form action="{{ route('carrito.add') }}" method="GET">
                                                            <input type="hidden" name="producto_id" value="{{ $item['producto_id'] }}">                                                            
                                                            <input class="cursor-pointer" type="submit" value="+">                                                
                                                            
                                                        </form>
                                                    </div>                                                                                                       

                                                    <span class="border px-1">{{ $item['cantidad'] }}</span>
                                                    <p>
                                                    <a class="cursor-pointer pl-1" href="{{ route('carrito.quitar', ['indice'=>$indice]) }}">-</a>
                                                    </p>
                                                </span>
                                            </div>
                                        @else
                                            Cantidad:
                                            <span class="border px-1">{{ $item['cantidad'] }}</span>
                                        @endif                                        
                                </td>
                                <td class="px-2 py-3">
                                    {{-- {{ number_format($item['precio'] != 0 ? $item['precio'] : $item['precio'], 0, ',', '.') }}
                                    Gs. --}}
                                    @php
                                        $total = $item['precio'] * $item['cantidad']
                                    @endphp
                                    {{ number_format($total, 0, ',', '.' ) }} Gs.
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-1/2 border p-6 rounded-lg shadow-lg bg-white dark:bg-gray-800">
            <p class="text-center p-2 font-semibold text-xl">Datos</p>
            <p class="text-center text-lg font-semibold mb-4 text-gray-900 dark:text-white"></p>            
            <form action="{{ route('venta.crearventa') }}" method="POST">
                @csrf
                <div class="mb-8">
                    <input type="hidden" name="total" value="{{ App\Helpers\helper::stats()['total_pagar'] }}">
                    <label for="cliente"
                        class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Datos para la factura:</label>
                    <div class="flex items-center">
                        <select class="select2 border border-gray-800 rounded-md flex-1 p-2" name="cliente" id="cliente">
                            <option value="">-Selecciona un cliente-</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido }} | Nº:
                                        {{ $cliente->doc }}</option>
                                @endforeach
                        </select>
                        <!-- Botón para agregar cliente -->
                        <button onclick="openModalUser(event)" class="p-2.5 ml-2 bg-gray-800 rounded-lg text-white"
                            type="button">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Método de pago -->
                <div class="mb-8">
                    <label for="metodo_pago" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">
                        Método de pago:
                    </label>
                    <select id="metodo_pago" name="metodo_pago"
                        class="w-full p-2 bg-gray-50 border rounded-lg text-sm dark:bg-gray-700 dark:border-gray-600">
                        <option value="" selected>-Selecciona un método de pago-</option>
                        <option value="tc">Tarjeta de crédito</option>
                        <option value="td">Tarjeta de débito</option>
                        <option value="tf">Transferencia</option>
                        <option value="ef">Efectivo</option>                        
                    </select>
                </div>             

                <div class="mb-8">
                    <label for="tipo_venta" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">
                        Tipo de Venta:
                    </label>
                    <select id="tipo_venta" name="tipo_venta"
                        class="w-full p-2 bg-gray-50 border rounded-lg text-sm dark:bg-gray-700 dark:border-gray-600">
                        <option value="" selected>-Selecciona el tipo de venta-</option>                                      
                        @foreach ($tipoVentas as $tipoVenta)
                            <option value="{{ $tipoVenta->id }}">{{$tipoVenta->nombre}}</option>
                        @endforeach                        
                    </select>
                </div>            

                <div class="flex items-center justify-between mb-4">
                    <span class="text-lg font-semibold text-gray-900 dark:text-white">Total:</span>
                    <span id="total"
                        class="text-lg font-semibold text-gray-900 dark:text-white">{{ number_format(App\Helpers\helper::stats()['total_pagar'], 0, ',', '.') }}
                        Gs.</span>
                </div>
            
                @include('venta.includes.confirmVentaModal')
                <!-- Botones de acción -->
                <div class="flex justify-end space-x-4">
                    <button onclick="openVentaModal(event)" type="button" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                        Confirmar
                    </button>
                </div>                
                
            </form>
        </div>

    </div>

   @include('venta.includes.aggClienteModal')

   <script>
     $(document).ready(function() {
            $('.select2').select2({ // Referencia por ID
                placeholder: "Selecciona un cliente",
                allowClear: true
            });
        });
   </script>
    
@endsection
