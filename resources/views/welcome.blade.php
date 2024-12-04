@extends('layouts.app')
{{-- @section('header')
    
@endsection --}}

@section('content')
    <section>

        <div class="flex justify-center bg-white">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden md:h-96">
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
                            aria-label="Slide {{ $i }}" data-carousel-slide-to="{{ $i }}"></button>
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>


    </section>
    <section class="pb-10 bg-[#b6d7a8]">
        <div class=" w-full pt-8">
            <h1 class=" text-center head">
                Novedades
            </h1>
            @livewire('novelty-section')

        </div>


    </section>
    {{-- Sección del Formulario --}}
    <section class="bg-[#ffffff]">
        <div class=" w-full pt-8">
            <h1 class=" text-center head">
                Dejanos un mensaje
            </h1>
            @livewire('form-section')

        </div>

    </section>
@endsection


