<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

class TicketController extends Controller
{

    public function printTicket(Request $request)
    {
        // Obtener los productos de la sesión
        $productos = session('ticket')[0]; // Los productos están en el primer índice
        $venta = session('ticket')[1]; // La venta está en el segundo índice
        $pago = '';

        $formasPago = [
            'ef' => 'Efectivo',
            'tc' => 'Tarj. Cred.',
            'td' => 'Tarj. Deb.',
            'tf' => 'Transferencia'

        ];

        foreach ($formasPago as $index => $formaPago) {
            if ($venta->forma_pago == $index) {
                $pago = $formaPago;
            }
        }

        // Crear conexión con la impresora
        $connector = new FilePrintConnector("/dev/usb/lp1");
        $printer = new Printer($connector);

        // Encabezado del ticket
        $printer->setJustification(Printer::JUSTIFY_CENTER); // Centrar el texto
        $printer->text("Gomeria Casa Santander\n");
        $printer->text("Dirección: Ruta 1 km14 c/batalla del carmen\n");
        $printer->text("Teléfono: 0981 127318\n");
        $printer->text("\n");

        // Fecha y hora
        $printer->text("Fecha: " . date('d/m/Y H:i:s') . "\n");
        $printer->text("Ticket Nro: {$venta->codigo}\n");        
        $printer->text("Forma de Pago: {$pago}\n");
        $printer->text("\n");

        // Detalles de la venta
        $printer->setJustification(Printer::JUSTIFY_LEFT); // Alinear a la izquierda
        $printer->text("================================\n");
        $printer->text(str_pad("Cant.", 6) . str_pad("Producto", 12) . str_pad("Precio", 10, ' ', STR_PAD_LEFT) . "\n");
        $printer->text("================================\n");

        // Iterar productos
        $totalVenta = 0;
        foreach ($productos as $producto) {
            $cantidad = str_pad($producto['cantidad'], 3);
            $nombre = str_pad($producto['nombre'], 20);
            $precio = str_pad(number_format($producto['precio'], -2), 8, ' ', STR_PAD_LEFT);
            $printer->text("$cantidad$nombre$precio\n");
            //         $printer->text(str_pad(number_format($producto['precio'], -2), 10, ' ', STR_PAD_LEFT));
            // Calcular el total de la venta
            $totalVenta += $producto['precio'] * $producto['cantidad'];
        }

        // Total de la venta
        $printer->text("================================\n");
        $printer->text(str_pad("Total:", 22) . str_pad(number_format($totalVenta, -2), 8, ' ', STR_PAD_LEFT) . "\n");
        $printer->text("================================\n");

        // Pie de página
        $printer->setJustification(Printer::JUSTIFY_CENTER); // Centrar el texto
        $printer->text("\n");
        $printer->text("Gracias por su compra!\n");
        $printer->text("Visite nuevamente\n");

        // Cortar el ticket
        $printer->feed(5); // Avanzar papel
        $printer->cut(); // Cortar ticket
        $printer->close(); // Cerrar conexión

        Session::forget('ticket');
        // Redirigir al inicio con un mensaje
        return redirect('/')->with('info', 'Venta completada y ticket impreso');
    }
}
