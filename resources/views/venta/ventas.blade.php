@extends('layout.app')

@section('contenido')
    <div class="relative overflow-x-auto">
        <p class="font-semibold">Buscar Ventas</p>
        <div class="py-4">
            <form action="{{ route('venta.busqueda') }}" method="get">
                <div class="flex items-center">
                    <input name="b" value="{{ $b ?? '' }}" type="text" placeholder="producto o cliente"
                        class="bg-gray-100 h-[35px] border border-gray-100 rounded-lg shadow-md focus:ring-gray-100 focus:border-gray-800">
                    <button class="ml-1 px-2 py-1 bg-gray-800 rounded-lg shadow-md focus:ring-gray-100 focus:border-none">
                        <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-3 py-3 sr-only">
                        id
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Cliente
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Producto
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Cantidad
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Forma de pago
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Fecha
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-auto py-4">
                            #{{ $venta->id }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $venta->cliente->nombre }} {{ $venta->venta->apellido ?? '' }}
                            <p>{{ $venta->cliente->doc }}</p>
                        </th>

                        <td class="px-3 py-4">
                            @foreach ($productos as $producto)
                                @if ($producto->venta_id == $venta->id)
                                    <p>{{ $producto->productos->nombre }}</p>
                                @endif                                
                            @endforeach
                        </td>
                        <td class="px-3 py-4">
                            @foreach ($productos as $producto)
                                @if ($producto->venta_id == $venta->id)
                                    <p>{{ $producto->cantidad }}</p>
                                @endif                                
                            @endforeach
                        </td>

                        <td class="px-3 py-4">
                            @php
                                $formasPago = [
                                    'ef' => 'Efectivo',
                                    'tc' => 'Tarjeta Cr.',
                                    'td' => 'Tarjeta Deb.',
                                    'tf' => 'Transferencia',
                                ];
                            @endphp

                            @foreach ($formasPago as $index => $formaPago)
                                @if ($index == $venta->forma_pago)
                                    {{ $formaPago }}
                                @endif
                            @endforeach

                        </td>
                        <td class="px-3 py-4">
                            {{ number_format($venta->total, 0, ',', '.') }} Gs.
                        </td>
                        <td class="px-3 py-4">
                            {{ $venta->created_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
