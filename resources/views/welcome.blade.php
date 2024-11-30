<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    </style>
</head>

<body class="overflow-auto scrollbar-none h-screen">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
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
                <div class="w-full header justify-between">
                    <a href="#"
                        class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded text-center flex-1">
                        Inicio
                    </a>
                    <a href="gestion"
                        class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded text-center flex-1">
                        Gestión Académica
                    </a>
                    <a href="conocenos"
                        class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded text-center flex-1">
                        Conócenos
                    </a>
                    <a href="egresados"
                        class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded text-center flex-1">
                        Egresados
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

    <section>

        <div class="flex justify-center p-3 sm:py-20 bg-[#ffff88]">
            <div id="default-carousel" class="relative w-full sm:max-w-[50%]" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    @php
                        $query = \App\Models\Featured::where('active', true);
                        $count = $query->count();
                        $featured = $query->get();
                    @endphp
                    @foreach ($featured as $item)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset("storage/{$item->filepath}") }}"
                                class="absolute block w-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    @endforeach
                    <!-- Item 1 -->

                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    @for ($i = 0; $i < $count; $i++)
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                            aria-label="Slide {{ $i }}"
                            data-carousel-slide-to="{{ $i }}"></button>
                    @endfor
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>


    </section>
    <section>
        <div class="bg-[#ff8080] w-full pt-8">
            <h1 class=" text-center head">
                Novedades
            </h1>
            @php
                $query = \App\Models\Novelty::where('active', true);
                $novelties = $query->get();
            @endphp

            <div class="flex flex-wrap p-3 sm:px-20 sm:py-10 gap-x-9 gap-y-9 justify-center">
                @foreach ($novelties as $item)
                    <div class="xl:max-w-lg w-full bg-white rounded-lg shadow border border-white">
                        <a class="w-full flex justify-center">
                            <img class="rounded-t-lg" src="{{ asset("storage/{$item->filepath}") }}"
                                alt="" />
                        </a>
                        <div class="p-5 bg-white rounded-b-lg">
                            <a>
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $item->title }}
                                </h5>
                            </a>
                            <p class="mb-3 font-normal text-black overflow-auto max-h-32">{{ $item->description }}
                            <p>
                            <p class="text-xs text-gray-400">
                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('F j') }}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
</body>

</html>
