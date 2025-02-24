<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ventas</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Reporte de  {{ $categoria->nombre ?? 'Semana' }}</h1>
    <p>Fecha: {{ App\Helpers\Helper::formatearFecha($desde)}} hasta {{ App\Helpers\Helper::formatearFecha($hasta) }}</p>    

    <table>
        <thead>
            <tr>
                <th>
                    id
                </th>
                <th >
                    Cliente   
                </th>
                <th >
                    Cant.
                </th>
                <th >
                    Producto
                </th>
                <th >
                    Forma de pago
                </th>                
                <th >
                    Total
                </th>
                <th >
                    Fecha
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr >
                    <td>
                        #{{ $venta->codigo }}
                        <p>{{ $venta->categoria->nombre }}</p>
                    </td>
                    <th>
                        {{ $venta->cliente->nombre }} {{ $venta->venta->apellido ?? '' }}
                        <p>{{ $venta->cliente->doc }}</p>
                    </th>
                    <td>
                        @foreach ($productos as $producto)
                            @if ($producto->venta_id == $venta->id)
                                <p>{{ $producto->cantidad }}</p>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($productos as $producto)
                            @if ($producto->venta_id == $venta->id)
                                <p>{{ $producto->productos->nombre }}</p>
                                <p>{{ $venta->descripcion }}</p>
                            @endif
                        @endforeach
                    </td>

                    <td>
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
                    <td>
                        {{ number_format($venta->total, 0, ',', '.') }} Gs.
                    </td>
                    <td>
                        {{ App\Helpers\helper::formatearFecha($venta->created_at) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
