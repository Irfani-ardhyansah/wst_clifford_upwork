@if ($paginator->hasPages())
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 w-full mt-4">

        {{-- BAGIAN KIRI: Info Text (Warna Abu Gelap) --}}
        <div class="text-sm text-[var(--text-2)]">
            Showing
            <span class="font-bold text-[var(--text-1)]">{{ $paginator->firstItem() }}</span>
            to
            <span class="font-bold text-[var(--text-1)]">{{ $paginator->lastItem() }}</span>
            of
            <span class="font-bold text-[var(--text-1)]">{{ $paginator->total() }}</span>
            results
        </div>

        {{-- BAGIAN KANAN: Tombol Navigasi Putih --}}
        <div>
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">

                {{-- Tombol Previous (<) --}}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center rounded-l-md px-3 py-2 text-[var(--text-3)] bg-[var(--surface)] ring-1 ring-inset ring-[var(--border)] cursor-not-allowed">
                        <span class="sr-only">Previous</span>
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center rounded-l-md px-3 py-2 text-[var(--text-2)] bg-[var(--surface)] ring-1 ring-inset ring-[var(--border)] hover:bg-[var(--surface-2)] focus:z-20 focus:outline-offset-0 transition">
                        <span class="sr-only">Previous</span>
                        <i class="fa-solid fa-chevron-left text-xs"></i>
                    </a>
                @endif

                {{-- Element Angka Halaman --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" (...) Separator --}}
                    @if (is_string($element))
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-[var(--text-2)] bg-[var(--surface)] ring-1 ring-inset ring-[var(--border)]">
                            {{ $element }}
                        </span>
                    @endif

                    {{-- Array Link Halaman --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                {{-- Item AKTIF (Warna TEAL Solid) --}}
                                <span aria-current="page" class="relative z-10 inline-flex items-center px-4 py-2 text-sm font-bold text-white bg-[var(--accent)] ring-1 ring-inset ring-[var(--accent)] focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[var(--accent)]">
                                    {{ $page }}
                                </span>
                            @else
                                {{-- Item TIDAK AKTIF (Putih) --}}
                                <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-[var(--text-1)] bg-[var(--surface)] ring-1 ring-inset ring-[var(--border)] hover:bg-[var(--surface-2)] focus:z-20 focus:outline-offset-0 transition">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Tombol Next (>) --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center rounded-r-md px-3 py-2 text-[var(--text-2)] bg-[var(--surface)] ring-1 ring-inset ring-[var(--border)] hover:bg-[var(--surface-2)] focus:z-20 focus:outline-offset-0 transition">
                        <span class="sr-only">Next</span>
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </a>
                @else
                    <span class="relative inline-flex items-center rounded-r-md px-3 py-2 text-[var(--text-3)] bg-[var(--surface)] ring-1 ring-inset ring-[var(--border)] cursor-not-allowed">
                        <span class="sr-only">Next</span>
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                    </span>
                @endif
            </nav>
        </div>
    </div>
@endif