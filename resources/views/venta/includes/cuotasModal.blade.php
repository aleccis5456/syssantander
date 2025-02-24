<div id="cuotasModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white w-[420px] rounded-xl shadow-2xl p-6 relative transition-all duration-300">
        <!-- Encabezado -->
        <div class="flex justify-between items-center mb-3">
            <h2 class="text-2xl font-bold text-gray-800">Venta a Cuotas</h2>
            <button onclick="closeCuotasModal()" class="p-1 hover:bg-gray-100 rounded-full">
                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="mb-6">
            <p><strong>Total de la venta: </strong>{{ App\Helpers\Helper::formatearMonto(session('stats')['total_pagar']) }} Gs.</p>
        </div>

        <!-- Formulario -->
        <form class="space-y-4" action="{{ route('venta.cuota') }}" method="GET">
            <!-- Campo 1 - Nombre -->
            <div class="group relative">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pago Inicial</label>
                <div class="relative">
                    <input type="number" name="pago_inicial"
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-500 focus:border-gray-500 hover:border-gray-300 transition-all">                    
                </div>
            </div>

            <!-- Campo 2 - Email -->
            <div class="group relative">
                <label class="block text-sm font-medium text-gray-700 mb-1">Deuda Total</label>
                <div class="relative">
                    <input type="number" name="duda_total"
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-500 focus:border-gray-500 hover:border-gray-300 transition-all">                   
                </div>
            </div>

            <!-- Campo 3 - Monto -->
            <div class="group relative">
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripcion</label>
                <div class="relative">
                    <textarea name="desc" id="" cols="36" rows="3"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-gray-500 focus:border-gray-500 hover:border-gray-300 transition-all">                    
                </textarea>                    
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="mt-8 pt-4 border-t border-gray-100 flex gap-3">
                <button type="button" onclick="closeCuotasModal()" class="flex-1 px-6 py-3 text-gray-600 hover:text-gray-800 font-medium rounded-lg hover:bg-gray-50 transition-colors">
                    Cancelar
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openCuotasModal(event) {
        event.preventDefault();
        document.getElementById('opcionesDeVenta').classList.add('hidden');
        document.getElementById('cuotasModal').classList.remove('hidden');
    }

    function closeCuotasModal() {
        document.getElementById('cuotasModal').classList.add('hidden');
    }
</script>
