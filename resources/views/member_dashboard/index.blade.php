@extends('admin.portal')

@section('title', 'Case Studies')
@section('header_title', 'Case Studies')

@section('content')
    <div class="flex-1 flex flex-col min-h-full">
        
        @if(isset($typeFunction) && $typeFunction == 'index')
            <div class="bg-black text-white px-8 py-12 relative overflow-hidden">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20"></div>
                
                <div class="relative z-10 max-w-4xl">
                    <h1 class="text-3xl md:text-4xl font-bold mb-3 tracking-tight">Welcome to the Resource Library</h1>
                    <p class="text-gray-400 text-sm md:text-base max-w-2xl leading-relaxed">
                        Access our premium collection of white papers, case studies, webinars, and industry tools for water management optimization.
                    </p>
                </div>
            </div>
        @endif

        <div class="px-6 py-8 md:px-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">{{ $pageTitle }}</h2>
                    <p class="text-sm text-gray-500 mt-1">{{ $assets->total() }} resources available</p>
                </div>

                <form action="{{ route('member-dashboard.index') }}" method="GET" class="w-full md:w-80">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="relative group">
                        <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search resources..." 
                                class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-lg text-sm text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-black/5 focus:border-gray-400 transition-all shadow-sm">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass text-gray-400 group-focus-within:text-teal-600 transition-colors"></i>
                        </div>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @forelse($assets as $asset)
                    <div class="group bg-white rounded-xl border border-gray-100 shadow-[0_2px_8px_rgba(0,0,0,0.04)] hover:shadow-[0_8px_24px_rgba(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-300 flex flex-col h-full overflow-hidden relative">
                        
                        <div class="absolute top-4 right-4 z-10">
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-[#FFF8E1] text-[#B7791F] text-[10px] font-bold uppercase tracking-wider border border-[#FEEBC8]">
                                <i class="fa-solid fa-lock text-[9px]"></i> Premium
                            </span>
                        </div>

                        <div class="p-6 flex-1 flex flex-col">
                            @php
                                $iconClass = match($asset->category) {
                                    'webinar' => 'fa-video text-red-500 bg-red-50',
                                    'case-study' => 'fa-briefcase text-teal-600 bg-teal-50',
                                    'tool' => 'fa-calculator text-purple-600 bg-purple-50',
                                    default => 'fa-file-lines text-blue-600 bg-blue-50', // White Paper
                                };
                            @endphp

                            <div class="mb-4">
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center text-lg {{ explode(' ', $iconClass)[1] }} {{ explode(' ', $iconClass)[2] }}">
                                    <i class="fa-solid {{ explode(' ', $iconClass)[0] }}"></i>
                                </div>
                            </div>

                            <div class="mb-2">
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $asset->category }}</span>
                            </div>

                            <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug group-hover:text-teal-700 transition-colors">
                                <a href="#" class="focus:outline-none">
                                    {{ $asset->title }}
                                </a>
                            </h3>

                            <p class="text-sm text-gray-500 mb-6 line-clamp-3 leading-relaxed">
                                {{ $asset->description ?? Str::limit(strip_tags($asset->html_content), 120) }}
                            </p>

                            <div class="mt-auto pt-4 border-t border-gray-50 flex items-center justify-between">
                                <span class="text-xs text-gray-400 font-medium bg-gray-50 px-2 py-1 rounded">
                                    {{ $asset->industry->title ?? 'General' }}
                                </span>
                                
                                <!-- <button onclick="openModal('{{ $asset->id }}', '{{ addslashes($asset->title) }}', '{{ $asset->category }}', '{{ $asset->industry->title ?? 'General' }}', '{{ $asset->created_at->format('M d, Y') }}')" -->
                                <button id="openModalBtn" data-id="{{ $asset->id }}"
                                    class="text-xs font-bold text-teal-600 hover:text-teal-800 flex items-center gap-1 group-hover:gap-2 transition-all uppercase tracking-wide focus:outline-none">
                                    View Resource <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <template id="content-{{ $asset->id }}">
                            {!! $asset->html_content !!}
                        </template>
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
                    {{ $assets->links() }} 
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
                    class="fixed top-6 left-6 z-[100] p-3 rounded-full bg-white/80 backdrop-blur-sm border border-gray-200 text-gray-500 shadow-lg hover:bg-gray-100 hover:text-gray-900 transition-all duration-200 group">
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

        $(document).on('click', '#openModalBtn', function(e) {
            let id = $(this).data('id');
            var templateContent = $('#content-' + id).html();

            if (templateContent) {
                var fullContent = `
                    ${templateContent}
                `;
                $modalBody.html(fullContent);
                $modal.removeClass('hidden').hide().fadeIn(200);
                $body.css('overflow', 'hidden');
                setTimeout(function() {
                    $modalPanel.removeClass('opacity-0 translate-y-8');
                    $modalPanel.addClass('opacity-100 translate-y-0');
                }, 20);
            }

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