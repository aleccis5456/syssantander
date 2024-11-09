<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
        <button type="button" onclick="closeModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <h2 class="text-xl font-semibold mb-4">Agregar Marca</h2>
        <!-- Formulario de edición -->
        <form method="post" action="{{ route('marca.store') }}">                       
            @csrf
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la marca</label>
            <input type="text" name="nombre" id="nombre"
                   class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                   required />

            <!-- Botones -->
            <button type="submit" class="mt-4 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Guardar
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
</script>