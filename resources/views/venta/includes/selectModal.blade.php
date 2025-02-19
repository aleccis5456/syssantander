
<div id="selectModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-5 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-bold mb-3">Filtrar por</h2>        
        <div id="select" class="flex flex-col space-y-2">
            <!-- Select para Vendedor -->    
            <select name="filtro" class="max-w-auto text-sm font-semibold border-none rounded-lg bg-gray-200 shadow-lg">
                <option value="">-Vendedor-</option>                            
                    @foreach ($vendedores as $vendedor)
                        <option value="{{ $vendedor->id }}">{{ $vendedor->name }}</option>
                    @endforeach                           
            </select>

            <!-- Select para Categoría -->
            <select name="categoria_id" class="max-w-auto text-sm font-semibold border-none rounded-lg bg-gray-200 shadow-lg">
                <option value="">-Categoría-</option>   
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach                
            </select>
        </div>        
        <!-- Botón para cerrar el modal -->
        <button type="submit" class="mt-4 bg-gray-800 text-white px-4 py-2 rounded-lg">Filtrar</button>
        <button type="button" onclick="closeModalSelect()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded-lg">Cerrar</button>
        
    </div>
</div>
<script>
    function openModalSelect(event) {
    event.preventDefault();
    document.getElementById('selectModal').classList.remove('hidden');
    }
    
    function closeModalSelect() {
        document.getElementById('selectModal').classList.add('hidden');
    }   
</script>