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

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="overflow-auto scrollbar-none h-screen">
    {{-- Sección del Header --}}
    <section class="border border-inherit">
        <div class="bg-[#ffffff] px-20 py-4">
            <div class="flex w-full items-center">
                <div class="w-[20%]">
                    <img src="{{ asset('img/icon2.png') }}" alt="Icono" class="w-20 h-20">
                </div>
                <div class="w-[55%]">
                    <div class="flex text-center">
                        <div class="w-[25%]">
                            <a href="#" class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded">
                                Inicio
                            </a>
                        </div>
                        <div class="w-[25%]">
                            <a href="gestion" class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded">Gestión
                                Académica</a>
                        </div>
                        <div class="w-[25%]">
                            <a href="conocenos"
                                class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded">Conocenos</a>
                        </div>
                        <div class="w-[25%]">
                            <a href="egresados"
                                class="focus:bg-[#b6d7a8] hover:bg-[#b6d7a8] px-5 py-3 rounded">Egresados</a>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center w-[25%] space-x-2 ">
                    <a href="admin/login" class="flex hover:bg-[#b6d7a8] px-4 py-2 rounded drop-shadow-2xl">
                        <img class="w-6 h-6" src="{{ asset('img/user.svg') }}" alt="">
                        <span>
                            Iniciar sesión
                        </span>
                    </a>

                </div>
            </div>
        </div>
    </section>
    <section>
        <img src="{{ asset('img/img1.jpg') }}" alt="" class="w-full h-full">
    </section>
    <section>
        <img src="{{ asset('img/img1.jpg') }}" alt="" class="w-full h-full">
    </section>
</body>

</html>
