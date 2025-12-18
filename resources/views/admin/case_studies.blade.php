@extends('admin.portal')

@section('title', 'Case Studies')
@section('header_title', 'Case Studies Library')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row gap-4 justify-between items-start sm:items-center">
        <p class="text-gray-500">Explore our collection of success stories.</p>
        <div class="flex gap-2">
            <input type="text" placeholder="Search case studies..." class="px-4 py-2 border rounded-lg">
        </div>
    </div>
    <div id="asset-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($caseStudies as $item)
            <div class="asset-card bg-white rounded-xl shadow-sm border border-gray-100 p-6 cursor-pointer group" onclick="handleAssetClick(2)">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-14 h-14 rounded-xl bg-green-100 text-green-600 flex items-center justify-center text-2xl">
                        @if($item->image_path)
                            <img src="{{ asset('storage/' . $item->image_path) }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400 bg-gray-100">
                                <i class="fa-regular fa-image text-3xl"></i>
                            </div>
                        @endif
                    </div>
                    <span class="text-xs bg-amber-100 text-amber-700 px-2 py-1 rounded-full font-medium"><i class="fa-solid fa-lock mr-1"></i>Premium</span>
                </div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">{{ $item->category ?? 'Case Study' }}</p>
                <h3 class="font-bold text-lg leading-tight mb-2 group-hover:text-teal-600 transition">{{ $item->title }}</h3>
                <p class="text-sm text-gray-500 line-clamp-2 mb-4">{{ $item->impact_highlight }}</p>
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <span class="text-xs text-gray-400">Hospitality</span>
                    <span class="text-sm font-semibold text-teal-600 group-hover:translate-x-1 transition-transform inline-flex items-center gap-1">
                        Register to View 
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
<script>
    // Logic modal khusus halaman ini (jika ada tambahan)
    // Logic utama modal sudah ada di layout / partials
</script>
@endpush