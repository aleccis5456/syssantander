<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    @if ($errors->any())
        <div id="alerta"
            class="flex shadow-lg items-center p-8 mb-4 text-base text-red-800 border border-red-300 rounded-lg bg-red-200 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <script>
            setTimeout(function() {
                const alertaSuccess = document.getElementById('alerta');
                if (alertaSuccess) {
                    alertaSuccess.style.transition = 'opacity 0.5s';
                    alertaSuccess.style.opacity = '0';
                    setTimeout(() => alertaSuccess.remove(), 500); // Remueve el elemento después de la transición
                }
            }, 5000); // 5000 milisegundos = 5 segundos
        </script>
    @endif

    <div>
        @if (session('success'))
            <div id="alerta"
                class="flex shadow-lg items-center p-8 mb-4 text-base text-green-800 border border-green-300 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div>
                    <strong>Éxito!</strong> {{ session('success') }}
                </div>
            </div>

            <!-- Script para ocultar la alerta después de 5 segundos -->
            <script>
                setTimeout(function() {
                    const alertaSuccess = document.getElementById('alerta');
                    if (alertaSuccess) {
                        alertaSuccess.style.transition = 'opacity 0.5s';
                        alertaSuccess.style.opacity = '0';
                        setTimeout(() => alertaSuccess.remove(), 500); // Remueve el elemento después de la transición
                    }
                }, 5000); // 5000 milisegundos = 5 segundos
            </script>
        @endif
    </div>


    <div>
        @if (session('warning'))
            <div id="alerta"
                class="flex shadow-lg items-center p-8 mb-4 text-base text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-200 dark:bg-gray-800 dark:text-yellow-400 dark:border-yellow-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div>
                    <strong>Aviso</strong> {{ session('warning') }}
                </div>
            </div>
        @endif

        <script>
            setTimeout(function() {
                const alertaSuccess = document.getElementById('alerta');
                if (alertaSuccess) {
                    alertaSuccess.style.transition = 'opacity 0.5s';
                    alertaSuccess.style.opacity = '0';
                    setTimeout(() => alertaSuccess.remove(), 500); // Remueve el elemento después de la transición
                }
            }, 5000); // 5000 milisegundos = 5 segundos
        </script>
    </div>


    <div>
        @if (session('info'))
            <div id="alerta"
                class="flex shadow-lg items-center p-8 mb-4 text-base text-blue-800 border border-blue-300 rounded-lg bg-blue-200 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div>
                    <strong>Aviso</strong> {{ session('info') }}
                </div>
            </div>
        @endif

        <script>
            setTimeout(function() {
                const alertaSuccess = document.getElementById('alerta');
                if (alertaSuccess) {
                    alertaSuccess.style.transition = 'opacity 0.5s';
                    alertaSuccess.style.opacity = '0';
                    setTimeout(() => alertaSuccess.remove(), 500); // Remueve el elemento después de la transición
                }
            }, 5000); // 5000 milisegundos = 5 segundos
        </script>
    </div>

    <div>
        @if (session('pedido'))
            <div id="alerta" role="alert"
                class="mb-4 relative flex w-full p-3 text-sm text-white bg-blue-600 rounded-md">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                {{ session('pedido') }}
            </div>
        @endif

        <script>
            setTimeout(function() {
                const alertaSuccess = document.getElementById('alerta');
                if (alertaSuccess) {
                    alertaSuccess.style.transition = 'opacity 0.5s';
                    alertaSuccess.style.opacity = '0';
                    setTimeout(() => alertaSuccess.remove(), 500); // Remueve el elemento después de la transición
                }
            }, 5000); // 5000 milisegundos = 5 segundos
        </script>
    </div>




    <div>
        @if (session('error'))
            <div id="alerta"
                class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div>
                    <strong>Aviso</strong> {{ session('error') }}
                </div>
            </div>
        @endif

        <script>
            setTimeout(function() {
                const alertaSuccess = document.getElementById('alerta');
                if (alertaSuccess) {
                    alertaSuccess.style.transition = 'opacity 0.5s';
                    alertaSuccess.style.opacity = '0';
                    setTimeout(() => alertaSuccess.remove(), 500); // Remueve el elemento después de la transición
                }
            }, 5000); // 5000 milisegundos = 5 segundos
        </script>
    </div>



    <div>
        @if (session('ventaConfirmada'))
            <div id="venta" tabindex="-1"
                class="fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
                <div class="relative p-4 w-full max-w-md">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Botón para cerrar -->
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            onclick="closeAlert()">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Cerrar</span>
                        </button>
                        <!-- Contenido -->
                        <div class="p-5 text-center">
                            <svg class="mx-auto mb-4 text-[#fbb321] w-12 h-12 dark:text-green-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>
                            <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-gray-200">
                                ¡Venta confirmada!
                            </h3>
                            <p class="mb-5 text-sm text-gray-600 dark:text-gray-400">
                                La venta se ha realizado con éxito.
                            </p>
                            <div class="flex justify-center gap-4">
                                <a href="{{ route('ticket.print') }}">
                                    <button
                                        class="text-black bg-[#fbb321] hover:bg-[#d08d05] focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                        Imprimir Ticket
                                    </button>
                                </a>                        
                                <a href="{{ route('debug') }}">                                    
                                    <button onclick="closeAlert()"
                                        class="text-white bg-gray-800 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                        Cerrar
                                    </button>
                                </a>                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <script>
                function closeAlert() {
                    const modal = document.getElementById('venta');
                    if (modal) {                                                
                        modal.style.transition = 'opacity 0.5s';
                        modal.style.opacity = '0';
                        setTimeout(() => modal.remove(), 500); // Remueve el elemento después de la transición
                    }
                }                   
            </script>
        @endif
    </div>
</div>
