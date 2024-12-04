<div class="pb-10">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
        @foreach ($teachers as $teacher)
            <div class="max-w-sm bg-white border border-white rounded-lg">
                <a>
                    <img class="rounded-t-lg w-full h-[200px]" src="{{ asset("storage/{$teacher->img}") }}" alt="Image" />
                </a>
                <div class="p-5 bg-[#b6d7a8] rounded-b-lg">
                    <a>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-black text-center">{{ $teacher->name }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-black">{{ $teacher->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
