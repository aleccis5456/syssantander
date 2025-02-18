@extends('layout.app')

@section('contenido')
    <div class="p-8">
        <p class="text-center py-8 font-semibold text-xl">Edición de producto</p>
        <form class="max-w-sm mx-auto" action="{{ route('producto.edit') }}" method="POST">
            @csrf          
            <input type="hidden" name="producto_id" value="{{ $producto->id }}">  
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $producto->nombre }}" />
            </div>

            <div class="mb-5">
                <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código</label>
                <input type="text" id="codigo" name="codigo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $producto->codigo == null ? 'sin código' : $producto->codigo}}" />
            </div>

            <div class="mb-5">
                <label for="marca" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Marca</label>
                <select id="marca" name="marca" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($marcas as $marca)
                        <option value="" selected>-Seleccione una opcion-</option>
                        <option value="{{ $marca->id }}" {{ $producto->marca_id == $marca->id ? 'selected' : '' }}>{{ $marca->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="proveedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Proveedor
                </label>
                <select id="proveedor" name="proveedor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($proveedores as $proveedor)
                        <option value="" selected>-Seleccione una opcion-</option>
                        <option value="{{ $proveedor->id }}" {{ $producto->proveedor_id == $proveedor->id ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Categoria
                </label>
                <select id="categoria" name="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($categorias as $categoria)
                        <option value="" selected>-Seleccione una opcion-</option>
                        <option value="{{ $categoria->id }}" {{ $producto->producto_categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $producto->descripcion ?? 'sin descripción' }}" />
            </div>

            <div class="mb-5">
                <label for="precio_venta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio Venta</label>
                <input type="text" id="precio_venta" name="precio_venta" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $producto->precio ?? 'sin precio' }}" />
            </div>

            <div class="mb-5">
                <label for="precio_compra" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio Compra</label>
                <input type="text" id="precio_compra" name="precio_compra" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $producto->precio_compra ?? 'sin precio de compra' }}" />
            </div>

            <div class="mb-5">
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                <input type="text" id="stock" name="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $producto->stock ?? 'sin stock' }}" />
            </div>

            <div class="pt-5">
                <button type="submit" class="text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
            </div>
        </form>
    </div>
@endsection
