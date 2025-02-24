<div id="completarVentaModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-gray-100 min-h-auto overflow-y-auto rounded-lg relative p-6">
        <form action="{{ route('gasto.filtro') }}" method="get" class="mb-4">
            <div class="flex flex-col gap-4 m-10">
                <div class="flex flex-col">
                    <label class="font-semibold text-sm mb-1" for="desde">Desde:</label>
                    <input id="desde" class="cursor-pointer rounded-lg border border-gray-200 shadow-lg bg-gray-100 p-2"
                        type="date" name="desde" value="{{ $desde ?? '' }}">
                </div>
                <div class="flex flex-col">
                    <label class="font-semibold text-sm mb-1" for="hasta">Hasta:</label>
                    <input id="hasta" class="rounded-lg border border-gray-200 shadow-lg bg-gray-100 p-2"
                        type="date" name="hasta" value="{{ $hasta ?? '' }}">
                </div>
                <div class="flex justify-center">
                    <!-- Botón de filtro -->
                    <button
                        class="m-2 px-4 py-2 border border-gray-800 rounded-lg bg-gray-800 text-white text-sm font-semibold"
                        type="submit">Filtrar
                    </button >                        
                    <button type="button" onclick="closeCompletarVentaModal()" class="m-2 px-4 py-2 border border-red-800 rounded-lg bg-red-800 text-white text-sm font-semibold">
                        Cerrar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function openCompletarVentaModal(event) {
        event.preventDefault();
        document.getElementById('completarVentaModal').classList.remove('hidden');
    }

    function closeCompletarVentaModal() {
        document.getElementById('completarVentaModal').classList.add('hidden');
    }
</script>
