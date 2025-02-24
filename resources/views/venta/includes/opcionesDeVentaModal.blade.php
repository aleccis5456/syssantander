<div id="opcionesDeVenta" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white w-[420px] rounded-xl shadow-2xl p-6 relative transition-all duration-300">
        <!-- Encabezado -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Opciones de Venta</h2>
            <button onclick="closeOpcionesDeVenta()" class="p-1 hover:bg-gray-100 rounded-full">
                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Contenido -->
        <div class="space-y-4">
            <!-- Botón Agregar Descuento -->
            <button onclick="openCompletarVentaModal(event)" class="w-full group flex items-center justify-between px-6 py-4 bg-white border-2 border-gray-200 rounded-xl hover:border-gray-500 hover:bg-gray-50 transition-all duration-200">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-gray-100 rounded-lg group-hover:bg-gray-200 transition">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                        </svg>
                    </div>
                    <div class="text-left">
                        <h3 class="font-semibold text-gray-800 group-hover:text-gray-600">Agregar Descuento</h3>
                        <p class="text-sm text-gray-500">Aplicar monto fijo</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <!-- Botón Vender a Cuotas -->
            <button onclick="openCuotasModal(event)" class="w-full group flex items-center justify-between px-6 py-4 bg-white border-2 border-gray-200 rounded-xl hover:border-purple-500 hover:bg-purple-50 transition-all duration-200">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-purple-100 rounded-lg group-hover:bg-purple-200 transition">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-left">
                        <h3 class="font-semibold text-gray-800 group-hover:text-purple-600">Vender a Cuotas</h3>
                        <p class="text-sm text-gray-500">Dividir el pago en meses</p>
                    </div>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>

        <!-- Footer -->
        <div class="mt-8 pt-4 border-t border-gray-100">
            <button onclick="closeOpcionesDeVenta()" class="w-full px-6 py-3 text-gray-600 hover:text-gray-800 font-medium rounded-lg hover:bg-gray-50 transition-colors">
                Volver a la venta
            </button>
        </div>
    </div>
</div>



<script>
    function openOpcionesDeVenta(event) {
        event.preventDefault();
        document.getElementById('opcionesDeVenta').classList.remove('hidden');
    }

    function closeOpcionesDeVenta() {
        document.getElementById('opcionesDeVenta').classList.add('hidden');
    }
</script>
