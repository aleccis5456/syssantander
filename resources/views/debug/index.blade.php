<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto de Venta</title>
    @vite('resources/css/app.css') <!-- Asegúrate de tener Tailwind configurado -->
</head>
<body class="bg-gray-100 font-sans">

    <!-- Contenedor principal -->
    <div class="flex h-screen">      

        <!-- Panel derecho: Ventana de venta -->
        <div class="w-1/2 p-4 overflow-y-auto bg-gray-50">
            <h2 class="text-xl font-bold mb-4">Venta Actual</h2>

            <!-- Lista de productos seleccionados -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Productos Seleccionados</h3>
                <ul class="space-y-2">
                    
                        <li class="p-4 bg-white rounded-lg shadow-md flex justify-between items-center">
                            <div>
                                <p class="font-semibold">ejemplo</p>
                                <p class="text-gray-600"></p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input 
                                    type="number" 
                                    value="4" 
                                    min="1" 
                                    class="w-16 px-2 py-1 border rounded"
                                >
                                <button                                     
                                    class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition"
                                >
                                    Eliminar
                                </button>
                            </div>
                        </li>
                    
                </ul>
            </div>

            <!-- Formulario para cliente y forma de pago -->
            <div class="space-y-4">
                <!-- Cliente -->
                <div>
                    <label for="customer" class="block text-sm font-medium text-gray-700">Cliente</label>
                    <select id="customer" class="mt-1 block w-full p-2 border rounded">
                        <option value="">Seleccionar cliente...</option>
                        
                            <option value="">LINA</option>
                        
                    </select>
                </div>

                <!-- Forma de Pago -->
                <div>
                    <label for="payment_method" class="block text-sm font-medium text-gray-700">Forma de Pago</label>
                    <select id="payment_method" class="mt-1 block w-full p-2 border rounded">
                        <option value="cash">Efectivo</option>
                        <option value="card">Tarjeta</option>
                        <option value="transfer">Transferencia</option>
                    </select>
                </div>

                <!-- Total -->
                <div class="flex justify-between items-center">
                    <p class="text-lg font-bold">Total:</p>
                    <p class="text-lg font-bold"></p>
                </div>

                <!-- Botón de Finalizar Venta -->
                <button class="w-full py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                    Finalizar Venta
                </button>
            </div>
        </div>
    </div>

</body>
</html>