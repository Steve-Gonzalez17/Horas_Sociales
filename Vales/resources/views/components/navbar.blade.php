<body>


    <!-- <script>
    // Define el tiempo en milisegundos (3 segundos)
    const inactivityTime = 3000;

    let inactivityTimer;

    // Función para redirigir al cierre de sesión
    function logout() {
        window.location.href = "{{ url('/logout') }}";
    }

    // Reinicia el temporizador al detectar actividad
    function resetTimer() {
        clearTimeout(inactivityTimer);
        inactivityTimer = setTimeout(logout, inactivityTime);
    }

    // Detecta eventos de actividad del usuario
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;
    document.onscroll = resetTimer;
    document.onclick = resetTimer;
</script> -->

</body>

<nav class="bg-[#f05454] lg:absolute md:relative w-full z-20 top-0 start-0 border-b dark:border-gray-600">
    <div class="flex items-center justify-between mx-auto p-4">
        <!-- Logo y Reloj (ocultos en modo responsive) -->
        <div class="hidden md:flex items-center space-x-3 disable-on-small">
            <img src="{{ asset('img/cruz-roja-logo.jpeg') }}" class="h-[4rem]" alt="Cruz Roja Logo">
            <div class="clock">
                <span id="hours">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span>
                <span id="ampm">AM</span>
            </div>
        </div>

        <!-- Título "VALES DE COMBUSTIBLE" (visible en todas las pantallas) -->
        <div class="flex items-center justify-center w-full">
            <h2 class="text-black font-bold text-xl text-center">VALES DE COMBUSTIBLE</h2>
            <img src="{{ asset('img/gas-station_icon.png') }}" alt="Gasolinera" class="w-7 h-7 ml-2">
        </div>


        <!-- Botón de menú de hamburguesa (visible solo en pantallas pequeñas) -->
        <button data-collapse-toggle="navbar-sticky" type="button"
            class="md:hidden inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-black rounded-lg hover:bg-[#465f79] focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- Opciones de usuario (ocultas en pantallas pequeñas) -->
        <div class="hidden md:flex items-center">
            @if (!session()->has('user'))
                <!-- Botón de Login -->
                <a href="{{ url('/login') }}"
                    class="text-white bg-[#30475e] hover:bg-[#465f79] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    {{ __('Login') }}
                </a>
            @else
                <!-- Dropdown de usuario -->
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="text-white bg-[#30475e] hover:bg-[#465f79] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    <span>{{ session('user')->username }}</span>
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <div id="dropdown"
                    class="border border-blue-300 bg-[#30475e] hover:bg-[#465f79] z-10 hidden divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-1 text-sm text-white rounded-lg bg-[#30475e] dark:text-gray-200"
                        aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a class="block px-4 py-2 hover:bg-[#465f79] dark:hover:bg-gray-600 dark:hover:text-white"
                                href="{{ url('/logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @endif
        </div>
    </div>

    <!-- Contenido del menú de hamburguesa (visible solo en responsive) -->
    <div id="navbar-sticky" class="hidden md:hidden flex-col items-center">
        <ul
            class="flex flex-col items-center p-4 space-y-4 bg-[#f05454] border-t dark:bg-gray-800 dark:border-gray-700">
            <!-- Logo y Reloj en el menú de hamburguesa -->
            <li class="flex items-center space-x-3">
                <img src="{{ asset('img/cruz-roja-logo.jpeg') }}" class="h-[4rem]" alt="Cruz Roja Logo">
                <div class="clock">
                    <span id="hours2">00</span>:<span id="minutes2">00</span>:<span id="seconds2">00</span>
                    <span id="ampm2">AM</span>
                </div>
            </li>

            <!-- Login o nombre de usuario -->
            <li>
            <div class=" md:flex items-center">
            @if (!session()->has('user'))
                <!-- Botón de Login -->
                <a href="{{ url('/login') }}"
                    class="text-white bg-[#30475e] hover:bg-[#465f79] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    {{ __('Login') }}
                </a>
            @else
                <!-- Dropdown de usuario -->
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown2"
                    class="text-white bg-[#30475e] hover:bg-[#465f79] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    <span>{{ session('user')->username }}, </span>
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <div id="dropdown2"
                    class="border border-blue-300 bg-[#30475e] hover:bg-[#465f79] z-10 hidden divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-1 text-sm text-white rounded-lg bg-[#30475e] dark:text-gray-200"
                        aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a class="block px-4 py-2 hover:bg-[#465f79] dark:hover:bg-gray-600 dark:hover:text-white"
                                href="{{ url('/logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @endif
        </div>
            </li>
        </ul>
    </div>
</nav>