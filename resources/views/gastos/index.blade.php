@extends('layout.app')

@section('contenido')
    <div class="grid grid-cols-2 gap-4">
        <!-- Formulario y Botón -->
        <div class="border border-gray-100 rounded-lg shadow-lg p-4">
            <p class="text-center p-6 font-semibold text-lg">Agregar Gasto</p>
            <form class="max-w-sm mx-auto" method="POST" action="{{ route('gasto.store') }}">
                @csrf
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monto</label>
                <div class="relative">
                    <input type="number" name="monto"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full ps-5 p-2.5">
                </div>
                <div class="pt-3">
                    <label for="message"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                    <textarea id="message" rows="4" name="desc"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500"></textarea>
                </div>
                <div class="py-4 flex justify-start">
                    <button class="border border-gray-900 bg-gray-800 text-white py-2 px-4 rounded-lg" type="submit">
                        Aceptar
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabla -->
        <div class="border border-gray-100 rounded-lg shadow-lg p-4">
            <p class="p-6 font-semibold text-lg">Lista de gastos</p>

            <!-- formulario de filtrar por fecha -->
            <button onclick="openModalGastos(event)"
                class="ml-6 border border-gray-900 bg-gray-800 py-1 px-2 rounded-lg text-white font-semibold">
                Filtrar
            </button>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Descripcion</th>
                            <th scope="col" class="px-6 py-3">Monto</th>
                            <th scope="col" class="px-6 py-3">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gastos as $gasto)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $gasto->descripcion }}
                                </th>
                                <td class="px-6 py-4">{{ $gasto->monto }}</td>
                                <td class="px-6 py-4">{{ $gasto->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modalGastos" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
        <div class="bg-gray-100 min-h-auto overflow-y-auto rounded-lg relative p-6">
            <form action="" method="get" class="mb-4">
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

                        <button onclick="closeModalGastos()" class="m-2 px-4 py-2 border border-red-800 rounded-lg bg-red-800 text-white text-sm font-semibold">
                            Cerrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    

    <script>
        function openModalGastos(event) {
            event.preventDefault();
            document.getElementById('modalGastos').classList.remove('hidden');
        }

        function closeModalGastos() {
            document.getElementById('modalGastos').classList.add('hidden');
        }
    </script>
@endsection
