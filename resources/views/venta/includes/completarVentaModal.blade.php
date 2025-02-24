<div id="completarVentaModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-gray-100 w-[400px] rounded-lg shadow-lg p-6 relative">
        <div class="">
            <!-- Encabezado -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Aplicar Descuento</h2>
                <button onclick="closeCompletarVentaModal()" class="p-1 hover:bg-gray-100 rounded-full">
                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        
            <form action="{{ route('venta.descuento') }}" method="get" class="space-y-6">
                <!-- Selector de Producto -->
                <div class="group relative">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Seleccionar producto</label>
                    <div class="relative">
                        <select name="producto" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl appearance-none hover:border-blue-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all">
                            <option value="" selected disabled>Elige un producto</option>
                            @foreach (session('carrito') as $indece => $carrito)
                                <option value="{{ $carrito['producto']['id'] }}">{{ $carrito['nombre'] }} | {{ App\Helpers\Helper::formatearMonto($carrito['producto']['precio']) }} Gs.</option>
                            @endforeach
                            <option value="total">Descuento al total</option>
                        </select>
                        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                            </svg>
                        </div>
                    </div>
                </div>
        
                <!-- Campo de Monto -->
                <div class="group relative">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nuevo valor</label>
                    <div class="relative">
                        <input type="number" 
                               name="monto" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl hover:border-blue-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all"
                               placeholder="Ingrese el monto">
                        <div class="absolute inset-y-0 right-3 flex items-center">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
        
                <!-- Botones -->
                <div class="mt-8 pt-4 border-t border-gray-100 flex gap-4">
                    <button type="button" onclick="closeCompletarVentaModal()" class="flex-1 px-6 py-3 text-gray-600 hover:text-gray-800 font-medium rounded-lg hover:bg-gray-50 transition-colors">
                        Cancelar
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors shadow-sm hover:shadow-md">
                        Aplicar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function openCompletarVentaModal(event) {
        event.preventDefault();
        document.getElementById('opcionesDeVenta').classList.add('hidden');
        document.getElementById('completarVentaModal').classList.remove('hidden');
    }

    function closeCompletarVentaModal() {
        document.getElementById('completarVentaModal').classList.add('hidden');
    }
</script>
