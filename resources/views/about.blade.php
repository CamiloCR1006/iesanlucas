@extends('layouts.app')

@section('content')
    <div class="text-center px-20">
        <div class="mb-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="flex justify-center">
                    <img src="{{ asset('img/escudo.png') }}" alt="Escudo" class="max-h-[300px]">
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('img/bandera.png') }}" alt="Bandera">
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
                    La Institución Educativa Departamental San José de la Salle, es una institución de carácter oficial, que
                    ofrece educación en los niveles de preescolar, básica y media académica, con una formación integral y
                    humanística, fundamentada en los principios lasallistas, que propende por la formación de personas
                    autónomas, competentes, solidarias y comprometidas con la construcción de una sociedad justa y
                    equitativa.
                </p>
            </div>
            <div class="border border-white p-5 bg-white rounded-lg">
                <h1 class="font-inst font-bold text-center" style="font-size: 35px;">
                    Visión
                </h1>
                <p class="mt-5">
                    La Institución Educativa Departamental San José de la Salle, es una institución de carácter oficial, que
                    ofrece educación en los niveles de preescolar, básica y media académica, con una formación integral y
                    humanística, fundamentada en los principios lasallistas, que propende por la formación de personas
                    autónomas, competentes, solidarias y comprometidas con la construcción de una sociedad justa y
                    equitativa.
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
