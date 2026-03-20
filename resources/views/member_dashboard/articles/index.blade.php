@extends('admin.portal')

@section('title', 'Articles')
@section('header_title', 'Articles')


@section('content')
<div class="flex-1 flex flex-col min-h-full">

    {{-- CONTENT --}}
    <div class="px-6 py-8 md:px-10">

        {{-- HEADER + SEARCH --}}
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4 mb-8">
            <div>
                <h2 class="text-xl font-bold text-gray-900">All Articles</h2>
                <p class="text-sm text-gray-500 mt-1">{{ $articles->total() }} articles available</p>
            </div>

            <form method="GET" class="relative group w-full md:w-72">
                <input type="text" 
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search articles..."
                       class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-gray-400 transition-all shadow-sm">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <i class="fa-solid fa-magnifying-glass text-gray-400 group-focus-within:text-teal-600 transition-colors"></i>
                </div>
            </form>
        </div>

        {{-- GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">

            @forelse($articles as $article)

                <div class="group bg-white rounded-xl border border-gray-100 shadow-[0_2px_8px_rgba(0,0,0,0.04)] hover:shadow-[0_8px_24px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-300 flex flex-col h-full overflow-hidden relative">

                    <div class="p-6 flex-1 flex flex-col">

                        {{-- ICON --}}
                        <div class="mb-4">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-lg bg-teal-50 text-teal-600">
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                        </div>

                        {{-- DATE --}}
                        <div class="mb-2">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                {{ optional($article->published_at)->format('M d, Y') ?? 'Draft' }}
                            </span>
                        </div>

                        {{-- TITLE --}}
                        <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug group-hover:text-teal-700 transition-colors">
                            {{ $article->title }}
                        </h3>

                        {{-- EXCERPT --}}
                        <p class="text-sm text-gray-500 mb-6 line-clamp-3 leading-relaxed">
                            {{ Str::limit(strip_tags($article->content), 120) }}
                        </p>

                        {{-- FOOTER --}}
                        <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">

                            <span class="text-xs text-gray-400 font-medium bg-gray-50 px-2 py-1 rounded">
                                {{ $article->author->name ?? 'Expert' }}
                            </span>

                            <button 
                                class="open-article text-xs font-bold text-teal-600 hover:text-teal-800 flex items-center gap-1 group-hover:gap-2 transition-all uppercase tracking-wide focus:outline-none"
                                data-id="{{ $article->id }}">
                                Read Article 
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>

                        </div>
                    </div>

                </div>

            @empty

                <div class="col-span-full py-16 text-center border-2 border-dashed border-gray-100 rounded-xl">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                        <i class="fa-regular fa-newspaper text-3xl text-gray-300"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">No articles found</h3>
                    <p class="text-gray-500 text-sm mt-1 max-w-sm mx-auto">
                        Try adjusting your search terms.
                    </p>
                </div>

            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if($articles->hasPages())
            <div class="flex items-center justify-center border-t border-gray-100 pt-8 pb-4">
                {{ $articles->links('pagination.custom') }}
            </div>
        @endif

    </div>

</div>


{{-- MODAL --}}
<div id="article-modal" class="fixed inset-0 z-[99] hidden">
    <div class="fixed inset-0 bg-white w-screen h-screen flex flex-col">

        <button id="close-article-modal"
            class="fixed top-6 right-6 z-[100] p-3 rounded-full bg-white/80 backdrop-blur-sm border border-gray-200 text-gray-500 shadow-lg hover:bg-gray-100 hover:text-gray-900 transition-all duration-200 group">
            <svg class="h-6 w-6 group-hover:rotate-90 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="flex-1 overflow-auto w-full h-full bg-white p-10 flex flex-col" id="article-modal-content">
        </div>

    </div>
</div>

@push('scripts')
<script>
$(document).ready(function () {
    $(document).on('click', '.open-article', function () {
        const id = $(this).data('id');

        $.ajax({
            url: `{{ url('/member-dashboard/articles') }}/${id}/content`,
            type: 'GET',
            success: function (response) {
                $('#article-modal-content').html(response);
                $('#article-modal')
                    .removeClass('hidden')
                    .addClass('flex');
            },
            error: function () {
                alert('Failed to load article.');
            }
        });
    });

    $('#close-article-modal').on('click', function () {
        $('#article-modal')
            .addClass('hidden')
            .removeClass('flex');

        $('#article-modal-content').html('');
    });

    $('#article-modal').on('click', function (e) {
        if (e.target === this) {
            $(this).addClass('hidden').removeClass('flex');
            $('#article-modal-content').html('');
        }
    });

    $('input[name="search"]').on('keypress', function (e) {
        if (e.which === 13) {
            e.preventDefault();
            $(this).closest('form').submit();
        }
    });

});
</script>
@endpush

@endsection
