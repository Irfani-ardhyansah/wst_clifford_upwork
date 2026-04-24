@extends('admin.portal')

@section('title', 'Case Studies')
@section('header_title', 'Case Studies')

@section('content')
    <div class="flex-1 flex flex-col min-h-full">

        <div class="content">
            <div class="page-hdr">
                <div class="page-hdr-left">
                    <h2>{{ $pageTitle }}</h2>
                    <p>{{ $assets->total() }} resources available</p>
                </div>
                <div class="page-hdr-right" style="flex-wrap:wrap;gap:8px;">
                    <form action="{{ route('member-dashboard.index') }}" method="GET" class="filter-bar" style="margin-bottom:0;border-radius:9px;overflow:hidden;">
                        <div class="filter-item">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search…" style="min-width:130px;" onkeyup="if(event.key === 'Enter') this.form.submit()">
                        </div>
                        <div class="filter-item" style="min-width:130px;">
                            <i class="fa-solid fa-layer-group"></i>
                            <select name="category" onchange="this.form.submit()" style="color:var(--text-3);">
                                <option value="">All Categories</option>
                                @foreach($categories as $row)
                                    <option value="{{ $row['value'] }}" {{ request('category') == $row['value'] ? 'selected' : '' }}>
                                        {{ $row['text'] }}
                                    </option>
                                @endforeach
                            </select>
                            <i class="fa-solid fa-chevron-down" style="color:var(--text-3);font-size:9px;flex-shrink:0;"></i>
                        </div>
                        <div class="filter-item" style="min-width:130px;">
                            <i class="fa-solid fa-building"></i>
                            <select name="industry_id" onchange="this.form.submit()" style="color:var(--text-3);">
                                <option value="">All Industries</option>
                                @foreach($industries as $industry)
                                    <option value="{{ $industry->id }}" {{ request('industry_id') == $industry->id ? 'selected' : '' }}>
                                        {{ $industry->title }}
                                    </option>
                                @endforeach
                            </select>
                            <i class="fa-solid fa-chevron-down" style="color:var(--text-3);font-size:9px;flex-shrink:0;"></i>
                        </div>
                        <button type="submit" style="display:none;"></button>
                    </form>
                </div>
            </div>
            <div class="resource-grid">
                @forelse($assets as $asset)
                    <div class="resource-card">
                        <div class="rc-type">
                            <i class="fa-solid fa-lock" style="font-size:9px;"></i> Premium
                        </div>
                        <h3 class="rc-title">{{ $asset->title }}</h3>
                        <div class="rc-meta">
                            @if(isset($asset->industry_id))
                                {{ $asset->industry->title ?? 'General' }}
                            @else
                                {{ $asset->target_audience ? implode(', ', $asset->target_audience) : 'General' }}
                            @endif
                        </div>
                        <div class="rc-footer">
                            <span class="rc-views">
                                @if(isset($asset->type))
                                    {{ $asset->type === 'white-paper' ? 'White Paper' : 'Article' }}
                                @else
                                    {{ $asset->category ?? 'Resource' }}
                                @endif
                            </span>
                            <button id="openModalBtn" data-id="{{ $asset->id }}" data-type="{{ isset($asset->type) ? 'article' : 'asset' }}" class="rc-cta">View Resource</button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center border-2 border-dashed border-gray-100 rounded-xl">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mb-4">
                            <i class="fa-regular fa-folder-open text-3xl text-gray-300"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">No resources found</h3>
                        <p class="text-gray-500 text-sm mt-1 max-w-sm mx-auto">
                            We couldn't find any assets matching your criteria. Try selecting a different category or clearing your search.
                        </p>
                    </div>
                @endforelse
            </div>

            @if($assets->hasPages())
                <div class="flex items-center justify-center border-t border-gray-100 pt-8 pb-4">
                    {{ $assets->links('pagination.custom') }} 
                </div>
            @endif
        </div>
        
        <footer class="px-10 py-6 border-t border-gray-100 text-center text-xs text-gray-400 mt-auto">
            &copy; {{ date('Y') }} Water Solutions Tech. All rights reserved.
        </footer>
    </div>

    <div id="resourceModal" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        
        <div class="fixed inset-0 bg-white w-screen h-screen flex flex-col">
            <button type="button" id="closeModalBtn"
                    class="fixed top-6 right-6 z-[100] p-3 rounded-full bg-white/80 backdrop-blur-sm border border-gray-200 text-gray-500 shadow-lg hover:bg-gray-100 hover:text-gray-900 transition-all duration-200 group">
                <svg class="h-6 w-6 group-hover:rotate-90 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="flex-1 overflow-auto w-full h-full bg-white" id="modalBody">
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        const $modal = $('#resourceModal');
        const $body = $('body');
        const $modalBody = $('#modalBody');
        
        $(document).on('click', '#closeModalBtn', function(e) {
            e.preventDefault();
            performClose();
        });

        $(document).on('keydown', function(e) {
            if (e.key === "Escape" && !$modal.hasClass('hidden')) {
                performClose();
            }
        });

        $(document).on('click', '#openModalBtn', function (e) {
            e.preventDefault();

            let id = $(this).data('id');
            let type = $(this).data('type') || 'asset';

            $modalBody.html(`
                <div class="flex justify-center items-center h-40">
                    <i class="fa-solid fa-spinner fa-spin text-3xl text-gray-400"></i>
                </div>
            `);

            $modal.removeClass('hidden').hide().fadeIn(200);
            $body.css('overflow', 'hidden');

            // Determine the correct endpoint based on type
            let endpoint = type === 'article' ? `/member-dashboard/${id}/article-content` : `/member-dashboard/${id}/content`;

            $.get(endpoint, function (res) {
                // 1. Bersihkan modal body dulu
                $modalBody.empty();

                // 2. Buat elemen Iframe dinamis
                // Beri style height agar tidak gepeng (misal 80vh atau 600px)
                var $iframe = $('<iframe style="width:100%; height: 100%; border:none; display:block;"></iframe>');
                
                // 3. Masukkan frame kosong ke modal
                $modalBody.append($iframe);

                // 4. Tulis konten HTML (dari controller) ke dalam "dokumen" milik Iframe tersebut
                var doc = $iframe[0].contentWindow.document;
                doc.open();
                doc.write('<!DOCTYPE html>');
                doc.write('<html><head>');
                doc.write('<meta charset="UTF-8">');
                doc.write('<script src="https://cdn.tailwindcss.com"><\/script>');
                doc.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">');
                doc.write('</head><body>');
                doc.write(res.html); // ← aman
                doc.write('</body></html>');
                doc.close();
            });
        });

        function performClose() {
            $modalBody.find('video').each(function() { this.pause(); });

            $modal.fadeOut(200, function() {
                $(this).addClass('hidden');
                
                $(this).css('display', ''); 
                
                $modalBody.empty();
                $body.css('overflow', 'auto');
            });
        }
    });
</script>
@endpush 