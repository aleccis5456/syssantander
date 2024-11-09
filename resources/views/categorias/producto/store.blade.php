@extends('layout.app')

@section('contenido')
    <div class="">
        <div class="">
            <form class="max-w-lg mx-auto border border-gray-800 px-5 py-3 bg-gray-100 rounded-lg shadow-xl"
                action="{{ route('pcategoria.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria del
                        producto</label>
                    <input type="text" id="nombre"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                        name="nombre" required />
                </div>
                <button type="submit"
                    class="mr-6 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Guardar</button>

                <a onclick="openModal(event)" class="py-2 px-4 border border-gray-800 rounded-lg hover:underline"
                    href="">
                    Ver Categorias
                </a>
            </form>
        </div>
        <div class="pt-10">
            <form class="max-w-lg mx-auto border border-gray-800 px-5 py-3 bg-gray-100 rounded-lg shadow-xl" action="{{ route('ventac.store') }}"
                method="POST">
                @csrf
                <div class="mb-5">
                    <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria de
                        venta</label>
                    <input type="text" id="nombre"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                        name="nombre" required />
                </div>
                <button type="submit"
                    class="mr-6 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Guardar</button>
        
                <a onclick="openModalVenta(event)" class="py-2 px-4 border border-gray-800 rounded-lg hover:underline"
                    href="">
                    Ver Categorias
                </a>
            </form>
        </div>
    </div>
    @include('categorias.producto.includes.modal')              

    @include('categorias.venta.modal')
@endsection
