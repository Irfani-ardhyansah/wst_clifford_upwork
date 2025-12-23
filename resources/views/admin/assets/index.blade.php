@extends('admin.portal')

@section('title', 'Manage Assets')
@section('header_title', 'Assets & Resources')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/40 overflow-hidden border border-gray-100">
        
        <div class="p-6 border-b border-gray-100 bg-white relative z-20">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Manage Content Assets</h3>
                    <p class="text-sm text-gray-500">Case studies, webinars, and downloadables.</p>
                </div>
                <a href="{{ route('admin.assets.create') }}" 
                    class="inline-flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-md shadow-teal-600/20 hover:shadow-lg hover:shadow-teal-600/30 hover:-translate-y-0.5">
                    <i class="fa-solid fa-plus text-sm"></i> <span>Add Asset</span>
                </a>
            </div>

            <div class="bg-gray-50 rounded-xl p-1.5 mb-6 border border-gray-100">
                <form action="{{ route('admin.assets.index') }}" method="GET" class="flex flex-col md:flex-row md:items-center w-full gap-2">
                    
                    <div class="relative flex-1 group w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass text-gray-400 group-focus-within:text-teal-600 transition"></i>
                        </div>
                        <input type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Search asset title..." 
                            class="block w-full pl-10 pr-3 py-2 bg-transparent border-0 text-sm text-gray-900 placeholder-gray-400 focus:ring-0 focus:bg-white/50 rounded-lg transition"
                        >
                    </div>

                    <div class="hidden md:block w-px h-6 bg-gray-200 mx-1"></div>

                    <div class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">
                        
                        <div class="relative min-w-[160px] group bg-white md:bg-transparent rounded-lg md:rounded-none border md:border-0 border-gray-200">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fa-solid fa-layer-group text-gray-400 text-xs"></i>
                            </div>
                            <select name="category" 
                                    onchange="this.form.submit()" 
                                    class="w-full pl-8 pr-8 py-2 bg-transparent border-0 text-sm text-gray-700 font-medium focus:ring-0 cursor-pointer hover:bg-gray-100/50 transition rounded-lg appearance-none">
                                <option value="">All Categories</option>
                                @foreach($categories as $row)
                                    <option value="{{ $row['value'] }}" {{ request('category') == $row['value'] ? 'selected' : '' }}>
                                        {{ $row['text'] }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none text-gray-400 group-hover:text-gray-600 transition">
                                <i class="fa-solid fa-chevron-down text-[10px]"></i>
                            </div>
                        </div>

                        <div class="hidden sm:block w-px h-6 bg-gray-200 my-auto"></div>

                        <div class="relative min-w-[160px] group bg-white md:bg-transparent rounded-lg md:rounded-none border md:border-0 border-gray-200">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fa-solid fa-building text-gray-400 text-xs"></i>
                            </div>
                            <select name="industry_id" 
                                    onchange="this.form.submit()" 
                                    class="w-full pl-8 pr-8 py-2 bg-transparent border-0 text-sm text-gray-700 font-medium focus:ring-0 cursor-pointer hover:bg-gray-100/50 transition rounded-lg appearance-none">
                                <option value="">All Industries</option>
                                @foreach($industries as $industry)
                                    <option value="{{ $industry->id }}" {{ request('industry_id') == $industry->id ? 'selected' : '' }}>
                                        {{ $industry->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none text-gray-400 group-hover:text-gray-600 transition">
                                <i class="fa-solid fa-chevron-down text-[10px]"></i>
                            </div>
                        </div>
                    </div>

                    @if(request('search') || request('industry_id') || request('category'))
                        <div class="flex items-center justify-center md:justify-start pl-2 md:border-l border-gray-200">
                            <a href="{{ route('admin.assets.index') }}" 
                            class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition" 
                            title="Clear All Filters">
                                <i class="fa-solid fa-xmark text-sm"></i>
                            </a>
                        </div>
                    @endif
                </form>
            </div>

            @if(request('category'))
                <div class="mb-4">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-teal-50 text-teal-700 border border-teal-100">
                        Filtering by Category: {{ request('category') }}
                        <a href="{{ request()->fullUrlWithQuery(['category' => null]) }}" class="hover:text-teal-900"><i class="fa-solid fa-times"></i></a>
                    </span>
                </div>
            @endif

            @if(request('search'))
                <p class="text-sm text-gray-500 mb-4 px-1">
                    Found {{ $assets->total() }} results for "<span class="font-semibold text-gray-800">{{ request('search') }}</span>"
                </p>
            @endif
        </div>

        @if(session('success'))
            <div class="px-6 pt-4">
                <div id="flash-message" 
                    class="p-4 rounded-xl bg-teal-50 border border-teal-100 text-teal-800 flex items-center gap-3 transition-all duration-500">
                    <i class="fa-solid fa-circle-check text-teal-600"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="relative z-10 overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/80 border-b border-gray-100 text-xs uppercase tracking-wider text-gray-500 font-semibold">
                        <th class="px-6 py-4 first:pl-8">Asset Info</th>
                        <th class="px-6 py-4">Industry</th>
                        <th class="px-6 py-4 text-center">Sort Order</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right last:pr-8">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($assets as $item)
                        <tr class="group transition-all duration-200 hover:shadow-[0_4px_20px_-2px_rgba(0,0,0,0.1)] hover:bg-white hover:-translate-y-[2px] relative hover:z-20">
                            
                            <td class="px-6 py-5 first:pl-8">
                                <div class="flex items-center gap-5">
                                    <div class="relative h-16 w-24 flex-shrink-0 rounded-xl overflow-hidden border border-gray-200/80 shadow-sm bg-gray-100 group-hover:border-teal-200 transition">
                                        @if($item->image_path)
                                            <img src="{{ Storage::url($item->image_path) }}" 
                                                    class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                                    alt="{{ $item->title }}">
                                            
                                            @if($item->category == 'Webinar' && $item->video_path)
                                                <div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/10 transition">
                                                    <div class="w-6 h-6 rounded-full bg-white/90 flex items-center justify-center shadow-sm">
                                                        <i class="fa-solid fa-play text-[10px] text-teal-600 ml-0.5"></i>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <div class="h-full w-full flex items-center justify-center text-gray-400 bg-gray-50">
                                                <i class="fa-regular fa-image text-2xl opacity-50"></i>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div>
                                        <div class="font-bold text-base text-gray-900 group-hover:text-teal-700 transition-colors line-clamp-1">
                                            {{ $item->title }}
                                        </div>
                                        <div class="flex items-center gap-2 mt-1.5">
                                            @php
                                                $catIcon = match($item->category) {
                                                    'Webinar' => 'fa-video',
                                                    'Case Study' => 'fa-file-lines',
                                                    default => 'fa-layer-group'
                                                };
                                                $catColor = match($item->category) {
                                                    'Webinar' => 'text-purple-600 bg-purple-50 border-purple-100',
                                                    'Case Study' => 'text-blue-600 bg-blue-50 border-blue-100',
                                                    default => 'text-gray-600 bg-gray-50 border-gray-100'
                                                };
                                            @endphp
                                            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wide border {{ $catColor }}">
                                                <i class="fa-solid {{ $catIcon }}"></i> {{ $item->category }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                @if($item->industry)
                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-semibold bg-gray-100 text-gray-600 border border-gray-200">
                                        {{ $item->industry->title }}
                                    </span>
                                @else
                                    <span class="text-gray-400 text-sm italic">Global / All</span>
                                @endif
                            </td>

                            <td class="px-6 py-5 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gray-50 text-gray-600 text-sm font-semibold border border-gray-200 font-mono">
                                    {{ $item->sort_order }}
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex flex-col items-start gap-2">
                                    <span class="inline-flex items-center gap-1.5 pl-2 pr-3 py-0.5 rounded-full text-xs font-bold uppercase tracking-wide {{ $item->is_active ? 'bg-green-50 text-green-700 border border-green-200/60' : 'bg-gray-100 text-gray-500 border border-gray-200' }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $item->is_active ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                                        {{ $item->is_active ? 'Published' : 'Draft' }}
                                    </span>
                                    @if($item->is_featured)
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-[10px] font-black tracking-wider bg-amber-50 text-amber-700 border border-amber-200/60 uppercase">
                                        <i class="fa-solid fa-star text-[9px]"></i> Featured
                                    </span>
                                    @endif
                                </div>
                            </td>

                            <td class="px-6 py-5 text-right last:pr-8">
                                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all duration-200 transform group-hover:translate-x-0 translate-x-4">
                                    <a href="{{ route('admin.assets.edit', $item) }}" 
                                       class="p-2 bg-white border border-gray-200 rounded-lg text-gray-400 hover:text-blue-600 hover:border-blue-300 hover:shadow-sm hover:bg-blue-50 transition"
                                       title="Edit">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('admin.assets.destroy', $item) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this asset? This will delete associated files too.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 bg-white border border-gray-200 rounded-lg text-gray-400 hover:text-red-600 hover:border-red-300 hover:shadow-sm hover:bg-red-50 transition"
                                                title="Delete">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                                {{-- Mobile/Fallback Menu Indicator --}}
                                <div class="block group-hover:hidden text-gray-300">
                                    <i class="fa-solid fa-ellipsis text-xl"></i>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center bg-gray-50/50 rounded-2xl p-8 border border-dashed border-gray-200">
                                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mb-4 shadow-sm border border-gray-100">
                                        <i class="fa-solid fa-folder-plus text-3xl text-teal-600/80"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">No Assets Found</h3>
                                    <p class="text-gray-500 mb-6 max-w-md mx-auto">
                                        @if(request('search'))
                                            We couldn't find any assets matching your search.
                                        @else
                                            Get started by adding your first Case Study, Webinar, or White Paper.
                                        @endif
                                    </p>
                                    <a href="{{ route('admin.assets.create') }}" class="inline-flex items-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-6 py-3 rounded-xl font-medium transition shadow-md shadow-teal-600/20 hover:shadow-lg hover:-translate-y-0.5">
                                        <i class="fa-solid fa-plus"></i> Create New Asset
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($assets->hasPages())
            <div class="bg-white px-6 py-4 border-t border-gray-100">
                {{ $assets->links() }}
            </div>
        @endif
    </div>
</div>
@endsection