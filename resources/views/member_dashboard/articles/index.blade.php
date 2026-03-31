@extends('admin.portal')

@section('title', 'Articles')
@section('header_title', 'Articles')


@section('content')
<div class="flex-1 flex flex-col min-h-full">
    <div class="content">
        <div class="page-hdr">
            <div class="page-hdr-left">
                <h2>Articles & Insights</h2>
                <p>Editorial content from the WST advisory team</p>
                <p class="text-sm text-gray-500 mt-1">{{ $articles->total() }} articles available</p>
            </div>
            <div class="page-hdr-right" style="flex-wrap:wrap;gap:8px;">
                <form method="GET" class="filter-bar" style="margin-bottom:0;border-radius:9px;overflow:hidden;">
                    <div class="filter-item">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search…" style="min-width:130px;" onkeyup="if(event.key === 'Enter') this.form.submit()">
                    </div>
                    <button type="submit" style="display:none;"></button>
                </form>
            </div>
        </div>

        <div class="resource-grid">
            @forelse($articles as $article)
                <div class="resource-card">
                    <div class="rc-type">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <h3 class="rc-title">{{ $article->title }}</h3>
                    <div class="rc-meta">{{ $article->content ? Str::limit(strip_tags($article->content), 120) : "No description available" }}</div>
                    <div class="rc-footer">
                        <span class="rc-views">{{ $article->category }}</span>
                        <button 
                            class="open-article text-xs font-bold text-teal-600 hover:text-teal-800 flex items-center gap-1 group-hover:gap-2 transition-all uppercase tracking-wide focus:outline-none"
                            data-id="{{ $article->id }}">
                            Read Article 
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center border-2 border-dashed border-gray-100 rounded-xl">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                        <i class="fa-regular fa-folder-open text-3xl text-gray-300"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">No articles found</h3>
                    <p class="text-gray-500 text-sm mt-1 max-w-sm mx-auto">
                        Try adjusting your search terms.
                    </p>
                </div>
            @endforelse
        </div>
        @if($articles->hasPages())
            <div class="flex items-center justify-center border-t border-gray-100 pt-8 pb-4">
                {{ $articles->links('pagination.custom') }} 
            </div>
        @endif
    </div>
        
    <footer class="px-10 py-6 border-t border-gray-100 text-center text-xs text-gray-400 mt-auto">
        &copy; {{ date('Y') }} Water Solutions Tech. All rights reserved.
    </footer>
</div>


{{-- MODAL --}}
<div id="article-modal" class="fixed inset-0 z-[99] hidden">
    
    <!-- backdrop -->
    <div class="fixed inset-0 bg-black/40 backdrop-blur-sm"></div>

    <div class="fixed inset-0 w-screen h-screen flex flex-col bg-[var(--surface)]">

        <!-- close button -->
        <button id="close-article-modal"
            class="fixed top-6 right-6 z-[100] p-3 rounded-full 
                   bg-[var(--surface-2)] backdrop-blur-sm 
                   border border-[var(--border)] 
                   text-[var(--text-3)] 
                   shadow-lg 
                   hover:bg-[var(--surface)] 
                   hover:text-[var(--text-1)] 
                   transition-all duration-200 group">

            <svg class="h-6 w-6 group-hover:rotate-90 transition-transform duration-300"
                 fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- content -->
        <div class="flex-1 overflow-auto w-full h-full 
                    bg-[var(--surface)] 
                    text-[var(--text-2)] 
                    p-10 flex flex-col"
             id="article-modal-content">
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
