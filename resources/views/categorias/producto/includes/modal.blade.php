 <!-- modal de categorias -->
 <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
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
                    @foreach ($cProductos as $cProducto)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $cProducto->nombre }}
                        </th>
                        <td class="px-6 py-4">
                            <div class="flex">
                                <div class="flex">
                                    <a onclick="openModalEdit(event, '{{ $cProducto->id }}', '{{ $cProducto->nombre }}')" href="#">                                                                                    
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                        </svg>                                                                                                                          
                                    </a>                                        
                                </div>
                                <div class="flex pl-4">                                             
                                    <a onclick="return confirm('Estas seguro de borrarlo?')" href="{{ route('pcategoria.delete', ['id' => $cProducto->id]) }}">                                                                                    
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
        <!-- Botón para cerrar el modal -->
        <button onclick="closeModal()"
            class="mt-4 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Cerrar
        </button>
    </div>
</div>

<div id="modalEdit" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
        <h2 class="text-xl font-semibold mb-4">Editar Categoría</h2>

        <!-- Formulario de edición -->
        <form method="POST" action="">
            @csrf            
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la categoría</label>
            <input type="text" name="nombre" id="nombre" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required/>
            <button type="submit" class="mt-4 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Guardar Cambios
            </button>
            <button type="button" onclick="closeModalEdit()" class="mt-4 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Cancelar
            </button>
        </form>
    </div>
</div>

<script>
    function openModal(event) {
        event.preventDefault();
        document.getElementById('modal').classList.remove('hidden');
    }
    
    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }

    function openModalEdit(event, id, nombre) {        
        event.preventDefault(); 

        const modalEdit = document.getElementById('modalEdit');
        const inputNombre = modalEdit.querySelector('input[name="nombre"]');

        // Usando template literals (backticks) para la interpolación de la URL
        const formAction = `/actualizar/categoria/producto/${id}`;

        // Asigna el nombre al campo de entrada
        inputNombre.value = nombre;

        // Asigna la URL de acción al formulario
        modalEdit.querySelector('form').setAttribute('action', formAction);

        // Muestra el modal
        modalEdit.classList.remove('hidden');
    }

    function closeModalEdit() {
        document.getElementById('modalEdit').classList.add('hidden');
    }

</script>