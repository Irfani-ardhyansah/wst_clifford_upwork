@if ($paginator->hasPages())
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 w-full mt-4">
        
        {{-- BAGIAN KIRI: Info Text (Warna Abu Gelap) --}}
        <div class="text-sm text-gray-700">
            Showing 
            <span class="font-bold text-gray-900">{{ $paginator->firstItem() }}</span> 
            to 
            <span class="font-bold text-gray-900">{{ $paginator->lastItem() }}</span> 
            of 
            <span class="font-bold text-gray-900">{{ $paginator->total() }}</span> 
            results
        </div>

        {{-- BAGIAN KANAN: Tombol Navigasi Putih --}}
        <div>
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                
                {{-- Tombol Previous (<) --}}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center rounded-l-md px-3 py-2 text-gray-300 bg-white ring-1 ring-inset ring-gray-300 cursor-not-allowed">
                        <span class="sr-only">Previous</span>
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center rounded-l-md px-3 py-2 text-gray-500 bg-white ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 transition">
                        <span class="sr-only">Previous</span>
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </a>
                @endif

                {{-- Element Angka Halaman --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" (...) Separator --}}
                    @if (is_string($element))
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 bg-white ring-1 ring-inset ring-gray-300">
                            {{ $element }}
                        </span>
                    @endif

                    {{-- Array Link Halaman --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                {{-- Item AKTIF (Warna TEAL Solid) --}}
                                <span aria-current="page" class="relative z-10 inline-flex items-center px-4 py-2 text-sm font-bold text-white bg-teal-600 ring-1 ring-inset ring-teal-600 focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">
                                    {{ $page }}
                                </span>
                            @else
                                {{-- Item TIDAK AKTIF (Putih) --}}
                                <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 bg-white ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 transition">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Tombol Next (>) --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center rounded-r-md px-3 py-2 text-gray-500 bg-white ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 transition">
                        <span class="sr-only">Next</span>
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </a>
                @else
                    <span class="relative inline-flex items-center rounded-r-md px-3 py-2 text-gray-300 bg-white ring-1 ring-inset ring-gray-300 cursor-not-allowed">
                        <span class="sr-only">Next</span>
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </span>
                @endif
            </nav>
        </div>
    </div>
@endif