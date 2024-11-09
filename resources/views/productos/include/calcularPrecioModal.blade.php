 <div id="modalPrecio" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-[466px] w-full relative">
            <button type="button" onclick="closeModalEdit()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <h2 class="text-xl font-semibold mb-4">Calcular Precio</h2>

            <div>
                <label for="entero">Calcular con un valor entero</label>
                <div class="flex">
                    <input placeholder="valor a sumar" class="rounded-lg w-[200px]" type="number" id="entero_valor">
                    <input placeholder="precio calculado" class="rounded-lg ml-5 w-[200px]" type="number"
                        id="precio_calculado_entero" readonly>
                </div>
            </div>

            <div class="pt-5">
                <label for="porcentaje">Calcular por porcentaje</label>
                <div class="flex">
                    <input placeholder="porcentaje a sumar" class="rounded-lg w-[200px]" type="number"
                        id="porcentaje_valor">
                    <input placeholder="precio calculado" class="rounded-lg ml-5 w-[200px]" type="number"
                        id="precio_calculado_porcentaje" readonly>
                </div>
            </div>

            <!-- Botón para realizar el cálculo -->
            <button onclick="calcularPrecios()"
            class="mt-5 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Calcular
            </button>            
        </div>
    </div>



    <script>
        function openModalPrecio(event) {
            event.preventDefault();
            document.getElementById('modalPrecio').classList.remove('hidden');
        }

        function closeModalEdit() {
            document.getElementById('modalPrecio').classList.add('hidden');
        }
        
        function openModalPrecio() {
            const precioCompra = parseInt(document.getElementById("precio_compra").value);

            if (!isNaN(precioCompra)) {
                document.getElementById("modalPrecio").classList.remove("hidden");
            } else {
                alert("Por favor, ingresa un precio de compra válido.");
            }
        }
        // Calcula el precio de venta cuando se hace clic en el botón "Calcular"
        function calcularPrecios() {
            const precioCompra = parseInt(document.getElementById("precio_compra").value);
            const valorEntero = parseInt(document.getElementById("entero_valor").value);
            const porcentaje = parseInt(document.getElementById("porcentaje_valor").value);

            // Calcula el precio sumando un valor entero
            if (!isNaN(precioCompra) && !isNaN(valorEntero)) {
                const precioVentaEntero = precioCompra + valorEntero;
                document.getElementById("precio_calculado_entero").value = precioVentaEntero;
            }

            // Calcula el precio aplicando un porcentaje
            if (!isNaN(precioCompra) && !isNaN(porcentaje)) {
                const precioVentaPorcentaje = precioCompra + Math.floor((precioCompra * porcentaje) / 100);
                document.getElementById("precio_calculado_porcentaje").value = precioVentaPorcentaje;
            }
        }
    </script>