
<div id="modalProveedor" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
        <!-- Botón de cierre "X" en la esquina superior derecha -->
        <button type="button" onclick="cleseModalProveedor()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <h2 class="text-xl font-semibold mb-4">Agregar Proveedor</h2>
        <!-- Formulario de edición -->
        <form method="post" action="{{ route('proveedor.store') }}">                       
            @csrf
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Proveedor</label>
            <input type="text" name="nombre" id="nombre"
                   class="mb-5 mt-1 block w-full p-2 border border-gray-300 rounded-md"/>
            <label for="contacto" class="block text-sm font-medium text-gray-700">Contacto del Proveedor</label>
            <input type="number" name="contacto" id="contacto"
                   class="mb-5 mt-1 block w-full p-2 border border-gray-300 rounded-md"/>
            <label for="detalles" class="block text-sm font-medium text-gray-700">Detalles o notas</label>
            <textarea class="w-full h-[100px] border border-gray-300 rounded-lg"  name="detalles" id="detalles" cols="30" rows="10"></textarea>

            <!-- Botones -->
            <button type="submit" class="mt-4 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Guardar
            </button>
            <button onclick="openModalVerProveedores(event)" type="button" class=" border text-sm font-semibold border-gray-800 px-2 py-2 rounded-lg hover:underline">
                Ver Proveedores
            </button>
        </form>
    </div>
</div>

<script>
    function openModalProveedor(event) {
        event.preventDefault();
        document.getElementById('modalProveedor').classList.remove('hidden');
    }
    
    function cleseModalProveedor() {
        document.getElementById('modalProveedor').classList.add('hidden');
    }   
</script>


<div id="modalVerProveedores" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
        <button type="button" onclick="closeModalVerProveedores()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <h2 class="text-xl font-semibold mb-4">Categorías</h2>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            categoria
                        </th>
                        <th scope="col" class="px-6 py-3">
                            accion
                        </th>                           
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $proveedor->nombre }}
                        </th>
                        <td class="px-6 py-4">
                            <div class="flex">                                
                                <div class="flex pl-4">                                             
                                    <a onclick="return confirm('Estas seguro de borrarlo?')" href="{{ route('proveedor.destroy', ['id' => $proveedor->id]) }}">                                                                                    
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                        </svg>
                                    </a>                                      
                                </div>                                    
                            </div>                                                                                                    
                        </td>                            
                    </tr>                       
                    @endforeach                        
                </tbody>
            </table>
        </div>                    
    </div>
</div>



<script>
    function openModalVerProveedores(event) {
        event.preventDefault();
        document.getElementById('modalVerProveedores').classList.remove('hidden');
    }
    
    function closeModalVerProveedores() {
        document.getElementById('modalVerProveedores').classList.add('hidden');
    }   
</script>