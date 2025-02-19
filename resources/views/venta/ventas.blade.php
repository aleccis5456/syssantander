@extends('layout.app')

@section('contenido')
    <div class="relative overflow-x-auto">
        <p class="font-semibold pt-5 pl-1">Buscar Ventas</p>
        <div class="py-4 flex mb-4">
            <div class="flex">
                <form action="{{ route('venta.busqueda') }}" method="get" class="flex items-center">
                    <div class="flex items-center py-1 px-2">
                        <!-- Selector de filtro -->                                     
                        <button type="button"  onclick="openModalSelect(event)" class="border border-gray-100 px-2 py-2 mr-3 rounded-lg bg-gray-100 shadow-md font-semibold">
                            Filtrar por:
                        </button>
                        @include('venta.includes.selectModal')
                        <!-- Cuadro de búsqueda -->
                        <input name="b" value="{{ $b ?? '' }}" type="text" placeholder="producto o cliente"
                            class="w-[180px] bg-gray-100 border border-gray-100 rounded-lg shadow-lg focus:ring-gray-100 focus:border-gray-800">
        
                        <!-- Botón de búsqueda -->
                        <button class="ml-1 px-2.5 py-2 bg-gray-800 rounded-lg shadow-md focus:ring-gray-100 focus:border-none">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                            </svg>
                        </button>
                    </div>
        
                    <!-- Filtros de fecha -->
                    <div class="flex items-center px-6">
                        <span class="pr-2 font-semibold text-sm">Filtrar desde:</span>
                        <input class="rounded-lg border border-gray-100 shadow-lg bg-gray-100" type="date" name="desde" value="{{ $desde ?? '' }}">
        
                        <span class="px-2 font-semibold text-sm">Hasta:</span>
                        <input class="rounded-lg border border-gray-100 shadow-lg bg-gray-100" type="date" name="hasta" value="{{ $hasta ?? '' }}">
        
                        <!-- Botón de filtro -->
                        <button class="mx-2 px-3 py-2 border border-gray-800 rounded-lg bg-gray-800 text-white text-sm font-semibold"
                            type="submit">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
        
        @if ($filtro != null)
            <p class="p-2 font-semibold">
                Total ventas: {{ count($productos) }}
            </p>
        @endif
        <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
            <thead class="text-xs text-black uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr class="font-bold">
                    <th scope="col" class="px-3 py-3 sr-only">
                        id
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Cliente
                    </th>
                    <th scope="col" class="px-3 py-3 sr-only">
                        Cant.
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Producto
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Forma de pago
                    </th>
                    <th scope="col" class="px-3 py-3">
                        Vendedor
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
                    <tr class="bg-white border-b border-gray-200 font-semibold">
                        <td class="px-auto py-4">
                            #{{ $venta->codigo }}
                            <p>{{ $venta->categoria->nombre }}</p>
                        </td>
                        <th class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white">
                            {{ $venta->cliente->nombre }} {{ $venta->venta->apellido ?? '' }}
                            <p>{{ $venta->cliente->doc }}</p>
                        </th>
                        <td class="px-3 py-4">
                            @foreach ($productos as $producto)
                                @if ($producto->venta_id == $venta->id)
                                    <p>{{ $producto->cantidad }}</p>
                                @endif
                            @endforeach
                        </td>
                        <td class="px-3 py-4">
                            @foreach ($productos as $producto)
                                @if ($producto->venta_id == $venta->id)
                                    <p>{{ $producto->productos->nombre }}</p>
                                    <p class="text-[11px] font-normal">{{ $venta->descripcion }}</p>
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
                            {{ $venta->vendedor->name ?? '' }}
                        </td>
                        <td class="px-3 py-4">
                            {{ number_format($venta->total, 0, ',', '.') }} Gs.
                        </td>
                        <td class="px-3 py-4">
                            {{ App\Helpers\helper::formatearFecha($venta->created_at) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
