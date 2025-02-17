@extends('layout.app')

@section('contenido')

    <div class="relative overflow-x-auto">
        <p class="font-semibold pt-5 pl-1">Buscar Ventas</p>
        <div class="py-4 flex mb-4 ">
            <div class="">
                <form action="{{ route('venta.busqueda') }}" method="get">
                    <div class="flex items-center py-1 px-2">
                        <select name="filtro" id="" class="max-w-auto text-sm font-semibold border-none rounded-lg bg-gray-200 shadow-lg mr-1 ">
                            <option value="" {{ $filtro == null ?  'selected' : ''}}>Filtrar por:</option>  
                            @foreach ($vendedores as $vendedor)
                                <option value="{{ $vendedor->id }}" {{ $filtro == null ?  '' : 'selected'}}>{{$vendedor->name}}</option>
                            @endforeach                                                      
                        </select>
                        <input name="b" value="{{ $b ?? '' }}" type="text" placeholder="producto o cliente"
                            class="w-[180px] bg-gray-100 border border-gray-100 rounded-lg shadow-lg focus:ring-gray-100 focus:border-gray-800">
                        <button
                            class="ml-1 px-2.5 py-2 bg-gray-800 rounded-lg shadow-md focus:ring-gray-100 focus:border-none">
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
            <div class="px-6">
                <form action="{{ route('venta.filtrofechas') }}">
                    <span class="pr-2 font-semibold text-sm">Filtrar desde: </span>
                    <input class="rounded-lg border border-gray-100 shadow-lg bg-gray-100" type="date" name="desde"
                        id="" value="{{ $desde ?? '' }}">
                    <span class="px-2  font-semibold text-sm">Hasta: </span>
                    <input class="rounded-lg border border-gray-100 shadow-lg bg-gray-100" type="date" name="hasta"
                        id="" value="{{ $hasta ?? '' }}">
                    <button
                        class="mx-2 px-3 py-2 border border-gray-800 rounded-lg bg-gray-800 text-white text-sm font-semibold"
                        type="submit">Filtrar</button>
                </form>
            </div>        
        </div>
        <p class="p-2 font-semibold">
            Total ventas: 
            
        </p>
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
                            #{{ $venta->id }}
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
                            {{ $venta->vendedor->name ?? ''}}
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
        <div>
            {{ $ventas->links() }}
        </div>
    </div>


<script>
    // Selecciona el elemento <select>
    const filtroSelect = document.getElementById('filtroSelect');

    // Agrega un evento 'change'
    filtroSelect.addEventListener('change', function() {
        // Envía el formulario automáticamente cuando se cambia la selección
        document.getElementById('filtroForm').submit();
    });
</script>
@endsection
