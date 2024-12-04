@extends('layouts.app')

@section('content')
    <div class="text-center px-20">
        @php
            use App\Models\Setting;
            $mision = Setting::where('slug', 'mision')->first();
            $vision = Setting::where('slug', 'vision')->first();
            $bandera = Setting::where('slug', 'bandera')->first();
            $escudo = Setting::where('slug', 'escudo')->first();
            $himno = Setting::where('slug', 'himno')->first();
        @endphp
        <div class="mb-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $escudo->value) }}" alt="Escudo" class="max-h-[300px]">
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $bandera->value) }}" alt="Bandera">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-[#b6d7a8] px-5 md:px-20 py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="border border-white p-5 bg-white rounded-lg">
                <h1 class="font-inst font-bold text-center" style="font-size: 35px;">
                    Misión
                </h1>
                <p class="mt-5">
                    {{ $mision->value }}
                </p>
            </div>
            <div class="border border-white p-5 bg-white rounded-lg">
                <h1 class="font-inst font-bold text-center" style="font-size: 35px;">
                    Visión
                </h1>
                <p class="mt-5">
                    {{ $vision->value }}
                </p>
            </div>
        </div>
        <div class="mt-5">
            <div class="border border-white p-5 bg-white rounded-lg">
                <h1 class="font-inst font-bold text-center" style="font-size: 35px;">
                    Himno
                </h1>
                <p class="mt-5 text-center">
                    {{ $himno->value }}
                </p>
            </div>
        </div>
    </div>
    <div class="px-5 md:px-20">
        <h1 class="text-center font-inst font-bold mb-4" style="font-size: 30px;">
            Planta docente
        </h1>
        @livewire('section-teacher')
    </div>
@endsection
