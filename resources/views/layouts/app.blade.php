<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Institución Educativa San Lucas</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .head {
            font-family: "Instrument Serif", serif;
            font-size: 48px;
            font-weight: 700;
        }

        .button-enviar {
            font-family: "Instrument Serif", serif;
            font-size: 20px;
        }

        .font-inst {
            font-family: "Instrument Serif", serif;
        }

        .footer {
            font-family: "Instrument Serif", serif;
        }
    </style>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @filamentStyles
    @vite('resources/css/app.css')
    @livewireStyles
    @stack('scripts')
</head>
<header class="w-full">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.pathname == '/') {
                document.getElementById('home').classList.add('bg-[#b6d7a8]');
            }

            if (window.location.pathname == '/management') {
                document.getElementById('gestion').classList.add('bg-[#b6d7a8]');
            }

            if (window.location.pathname == '/about') {
                document.getElementById('about').classList.add('bg-[#b6d7a8]');
            }


        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    {{-- Sección del Header --}}

    <section>
        <div class="bg-[#ffffff] px-3 sm:px-20 py-4">
            <!-- Barra principal -->
            <div class="flex w-full items-center container-head">
                <!-- Icono -->
                <div class="w-[20%]">
                    <img src="{{ asset('img/icon2.png') }}" alt="Icono" class="w-20 h-20">
                </div>

                <!-- Menú colapsable -->
                <div class="w-full header justify-between gap-2">
                    <a href="/" id="home"
                        class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded text-center flex-1">
                        Inicio
                    </a>
                    <a href="management" id="gestion"
                        class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded text-center flex-1">
                        Gestión Académica
                    </a>
                    <a href="about" id="about"
                        class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded text-center flex-1">
                        Conócenos
                    </a>
                    <a href="graduates"
                        class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded text-center flex-1">
                        Egresados
                    </a>

                    <a href="admin/login" class=" px-4 py-2 rounded drop-shadow-2xl">
                        <img class="w-8 h-8" src="{{ asset('img/user.svg') }}" alt="">
                    </a>

                </div>

                <!-- Botón hamburguesa (solo móvil) -->
                <div class="burger-button">
                    <button id="menu-toggle" class="text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menú móvil colapsable -->
            <div id="mobile-menu" class="hidden mt-4">
                <div class="flex flex-col space-y-2">
                    <a href="#" class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded">Inicio</a>
                    <a href="gestion" class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded">Gestión
                        Académica</a>
                    <a href="conocenos" class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded">Conócenos</a>
                    <a href="egresados" class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded">Egresados</a>
                    <a href="admin/login" class="flex hover:bg-[#b6d7a8] px-4 py-2 rounded drop-shadow-2xl space-x-2">
                        <img class="w-6 h-6" src="{{ asset('img/user.svg') }}" alt="">
                        <span>
                            Iniciar sesión
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Alternar visibilidad del menú móvil
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</header>

<body class="w-full overflow-auto scrollbar-none h-screen">
    @yield('content')
    @livewire('notifications')
    @filamentScripts
    @vite('resources/js/app.js')
    @livewireScripts
</body>

<footer class="p-6 bg-[#b6d7a8] ">
    <div class="flex justify-center space-x-2 mb-10">
        <div>
            <a href="https://web.facebook.com/profile.php?id=100063803154658" target="_blank"><img
                    src="{{ asset('img/facebook.svg') }}" alt="Facebook" class="w-6 h-6"></a>
        </div>
        <div>
            <a href="https://wa.me/3148508036" target="_blank"><img src="{{ asset('img/whatsapp.svg') }}" alt="Whatsapp"
                    class="w-6 h-6"></a>
        </div>
        <div>
            <a href="" target="_blank"><img src="{{ asset('img/x.svg') }}" alt="x" class="w-6 h-6"></a>
        </div>
        <div>
            <a href="https://www.youtube.com/@manuelherreramendoza6145" target="_blank"><img
                    src="{{ asset('img/youtube.svg') }}" alt="x" class="w-6 h-6"></a>
        </div>


    </div>
    <div class="md:px-20">
        <hr class="border-black">
        <div class="mt-10">
            <p class="footer font-semibold text-center" style="font-size: 30px;">Institución Educativa San Lucas
            </p>
            <p class="footer text-center" style="font-size: 20px;">Calle 123, #45 Sur de Bolivar</p>
            <div class="flex flex-wrap items-center space-x-1">
                <p class="footer" style="font-size: 15px;">Copyright </p>
                <img src="{{ asset('img/copyright.svg') }}" alt="" class="w-3 h-3">
                <p class="footer">2024</p>
            </div>
        </div>
    </div>

</footer>

</html>
