<div class="md:px-20 md:py-4 px-3">
    <div class="py-10">
        <h1 class="text-center font-inst font-bold" style="font-size: 30px;">
            Circulares
        </h1>
        <div class="mt-5">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 px-4">
                @foreach ($circulars as $circular)
                    <a target="_blank" href="{{asset("storage/{$circular->file}")}}" class="border border-white p-5 rounded-lg bg-[#b6d7a8]">
                        <p class="font-bold">{{ $circular->title }}</p>
                        <p>
                            {{ $circular->description }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</div>
