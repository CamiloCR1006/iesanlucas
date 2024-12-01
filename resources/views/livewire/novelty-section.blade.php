<div>
    <div class="flex flex-wrap p-3 sm:px-20 sm:py-10 gap-x-9 gap-y-9 justify-center">
        {{-- @php
            dd($novelties);
        @endphp --}}
        @foreach ($novelties as $item)
            <div class="xl:max-w-lg w-full bg-white rounded-lg shadow border border-white">
                <a class="w-full flex justify-center">
                    <img class="rounded-t-lg" src="{{ asset("storage/{$item->filepath}") }}" alt="" />
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

{{-- @php
    dd($novelties);
@endphp --}}

    </div>
    <div class="flex flex-col items-center">
        <!-- Help text -->
        <span class="text-sm text-black">
            Página <span class="font-semibold text-gray-900 dark:text-white">{{ $novelties->firstItem() }}</span> de
            <span class="font-semibold text-gray-900 dark:text-white">{{ $novelties->lastPage() }}</span> Páginas
        </span>
        <div class="inline-flex mt-2 xs:mt-0">
            <!-- Buttons -->
            @if ($novelties->onFirstPage())
                <button disabled
                    class="flex items-center justify-center px-3 h-8 text-sm font-medium text-black bg-white rounded-s">
                    <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                    Prev
                </button>
            @else
                <button wire:click="previousPage('{{ $novelties->getPageName() }}')"
                    class="flex items-center justify-center px-3 h-8 text-sm font-medium text-black bg-white rounded-s">
                    <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                    Prev
                </button>
            @endif
            @if ($novelties->hasMorePages())
                <button wire:click="nextPage('{{ $novelties->getPageName() }}')"
                    class="flex items-center justify-center px-3 h-8 text-sm font-medium text-black bg-white border-0 border-s border-gray-700 rounded-e">
                    Next
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </button>
            @else
                <button disabled
                    class="flex items-center justify-center px-3 h-8 text-sm font-medium text-black bg-white border-0 border-s border-gray-700 rounded-e">
                    Next
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </button>
            @endif

        </div>
    </div>
</div>
