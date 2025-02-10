    <div id="modalAggProducto" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">        
        <div class="bg-gray-100 max-h-[600px] overflow-y-auto rounded-lg relative">   
            <div class="text-lg p-4 font-semibold">
                Agrega productos y servicios
            </div>    
            <button type="button" onclick="closeModalAggProducto()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <form class="max-w-lg mx-auto gray-800 px-5 py-3 bg-gray-100 rounded-lg shadow-xl" action=""
                method="POST">
                @csrf
                <div class="mb-5">
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del producto
                        o servicio*</label>
                    <input type="text" id="nombre"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                        name="nombre"  />

                        <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Codigo</label>
                        <input type="text" id="codigo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                            name="codigo"  />
                </div>
                <div class="mb-5">
                    <label for="marcas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Selecciona una Marca
                    </label>
                    <div class="flex">
                        <div class="w-[330px]">
                            <select id="countries" name="marca"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">-Selecciona una opcion-</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ml-5 text-sm">
                            <button onclick="openModal(event)"
                                class="px-2 py-2 border border-gray-800 rounded-lg hover:underline hover:font-semibold">
                                Agregar Marca
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <label for="marcas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Selecciona una proveedor
                    </label>
                    <div class="flex">
                        <div class="w-[330px]">
                            <select id="countries" name="proveedor_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">-Selecciona una opcion-</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ml-5 text-[11px]">
                            <button onclick="openModalProveedor(event)"
                                class="px-2 py-3 border border-gray-800 rounded-lg hover:underline hover:font-semibold">
                                Agregar proveedor
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <label for="descripcion"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                    <input type="text" id="descripcion"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                        name="descripcion"  />
                </div>
                <div class="mb-5">
                    <label for="precio_compra" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio
                        compra</label>
                    <input type="number" id="precio_compra"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                        name="precio_compra"  />
                </div>

                <div class="mb-5">
                    <div class="flex">
                        <div class="w-[330px]">
                            <label for="precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio
                                venta*</label>
                            <input type="number" id="precio"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                                name="precio"  />
                        </div>
                        <div class="ml-5 text-sm pt-9">
                            <a onclick="openModalPrecio(event)" href="#"
                                class="px-2.5 py-2.5 border border-gray-800 rounded-lg hover:underline hover:font-semibold">
                                Calcular precio
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock*</label>
                    <input type="number" id="stock"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                        name="stock"  />
                </div>
                <div class="mb-5">
                    <label for="stock_min" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock
                        minimo</label>
                    <input type="number" id="stock_min"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                        name="stock_min"  />
                </div>

                <div class="mb-5">
                    <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tipo de servicio
                    </label>
                    <select id="countries" name="categoria_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="">-Selecciona una opcion-</option>
                        @foreach ($cProductos as $cProducto)
                            <option value="{{ $cProducto->id }}">{{ $cProducto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Guardar
                </button>                
            </form>
        </div>
    </div>

    <!-- modal para agregar marcas -->
    @include('productos.include.modal')
    <!-- modal para calcular precio -->
    @include('productos.include.calcularPrecioModal')
    <!-- modal para agregar proveedor-->
    @include('productos.include.proveedorModal')
   

    <script>
        function openModalAggProducto(event) {
        event.preventDefault();
        document.getElementById('modalAggProducto').classList.remove('hidden');
        }
        
        function closeModalAggProducto() {
            document.getElementById('modalAggProducto').classList.add('hidden');
        }   
    </script>