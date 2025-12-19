@extends('admin.portal')

@section('title', 'Case Studies')
@section('header_title', 'Case Studies')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    
    {{-- Main Card Container --}}
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/40 overflow-hidden border border-gray-100">
        
        {{-- Header & Toolbar Section (Digabung agar cohesive) --}}
        <div class="p-6 border-b border-gray-100 bg-white relative z-20">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <div>
                    <h3>Manage your case studies projects and highlights.</h3>
                </div>
                <a href="{{ route('admin.case-studies.create') }}" 
                    class="inline-flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-md shadow-teal-600/20 hover:shadow-lg hover:shadow-teal-600/30 hover:-translate-y-0.5">
                    <i class="fa-solid fa-plus text-sm"></i> <span>Add Project</span>
                </a>
            </div>

            <div class="bg-gray-50 rounded-xl p-1.5 mb-6 border border-gray-100">
                <form action="{{ route('admin.case-studies.index') }}" method="GET" class="flex flex-col md:flex-row md:items-center w-full">
                    
                    <div class="relative flex-1 group">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass text-gray-400 group-focus-within:text-teal-600 transition"></i>
                        </div>
                        <input type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Search project title..." 
                            class="block w-full pl-10 pr-3 py-2 bg-transparent border-0 text-sm text-gray-900 placeholder-gray-400 focus:ring-0 focus:bg-white/50 rounded-lg transition"
                        >
                    </div>

                    <div class="hidden md:block w-px h-6 bg-gray-200 mx-2"></div>

                    <div class="flex items-center md:w-64 border-t md:border-t-0 border-gray-200 pt-2 md:pt-0 mt-2 md:mt-0">
                        <div class="flex items-center px-3 text-gray-500">
                            <i class="fa-solid fa-filter text-sm mr-2"></i>
                            <span class="text-sm font-medium whitespace-nowrap hidden sm:inline">Filter</span>
                        </div>
                        <div class="relative w-full group">
                            <select name="industry_id" 
                                    onchange="this.form.submit()" 
                                    class="w-full pl-2 pr-8 py-2 bg-transparent border-0 text-sm text-gray-700 font-medium focus:ring-0 cursor-pointer hover:bg-gray-100/50 transition rounded-lg appearance-none text-right md:text-left">
                                <option value="">All Industries</option>
                                @foreach($industries as $industry)
                                    <option value="{{ $industry->id }}" {{ request('industry_id') == $industry->id ? 'selected' : '' }}>
                                        {{ $industry->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none text-gray-400 group-hover:text-gray-600 transition">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    @if(request('search') || request('industry_id'))
                        <div class="flex items-center pl-2 md:border-l border-gray-200 ml-2">
                            <a href="{{ route('admin.case-studies.index') }}" 
                            class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition" 
                            title="Clear Search & Filter">
                                <i class="fa-solid fa-xmark text-sm"></i>
                            </a>
                        </div>
                    @endif
                </form>
            </div>

            {{-- Indikator Hasil Pencarian (Opsional, untuk UX lebih jelas) --}}
            @if(request('search'))
                <p class="text-sm text-gray-500 mb-4 px-1">
                    Found {{ $caseStudies->total() }} results for "<span class="font-semibold text-gray-800">{{ request('search') }}</span>"
                </p>
            @endif
        </div>

        @if(session('success'))
            <div class="px-6 pt-4">
                <div class="p-4 rounded-xl bg-teal-50 border border-teal-100 text-teal-800 flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-teal-600"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="relative z-10 overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/80 border-b border-gray-100 text-xs uppercase tracking-wider text-gray-500 font-semibold">
                        <th class="px-6 py-4 first:pl-8">Project Info</th>
                        <th class="px-6 py-4">Industry</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right last:pr-8">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($caseStudies as $item)
                        <tr class="group transition-all duration-200 hover:shadow-[0_4px_20px_-2px_rgba(0,0,0,0.1)] hover:bg-white hover:-translate-y-[2px] relative hover:z-20">
                            
                            <td class="px-6 py-5 first:pl-8">
                                <div class="flex items-center gap-5">
                                    <div class="relative h-16 w-24 flex-shrink-0 rounded-xl overflow-hidden border border-gray-200/80 shadow-sm bg-gray-100">
                                        @if($item->image_path)
                                            <img src="{{ Storage::url($item->image_path) }}" 
                                                 class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                                 alt="{{ $item->title }}">
                                        @else
                                            <div class="h-full w-full flex items-center justify-center text-gray-400 bg-gray-50">
                                                <i class="fa-regular fa-image text-2xl opacity-50"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-bold text-base text-gray-900 group-hover:text-teal-700 transition-colors">
                                            {{ $item->title }}
                                        </div>
                                        <div class="text-sm text-gray-500 mt-1 font-medium">
                                            {{ $item->category ?? 'General' }}
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
                                    <span class="text-gray-400 text-sm">-</span>
                                @endif
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
                                    <a href="{{ route('admin.case-studies.edit', $item) }}" 
                                       class="p-2 bg-white border border-gray-200 rounded-lg text-gray-400 hover:text-blue-600 hover:border-blue-300 hover:shadow-sm hover:bg-blue-50 transition"
                                       title="Edit">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('admin.case-studies.destroy', $item) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 bg-white border border-gray-200 rounded-lg text-gray-400 hover:text-red-600 hover:border-red-300 hover:shadow-sm hover:bg-red-50 transition"
                                                title="Delete">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                                {{-- Fallback jika tidak di-hover (Optional, agar user tahu ada menu) --}}
                                <div class="block group-hover:hidden text-gray-300">
                                    <i class="fa-solid fa-ellipsis text-xl"></i>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center bg-gray-50/50 rounded-2xl p-8 border border-dashed border-gray-200">
                                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mb-4 shadow-sm border border-gray-100">
                                        <i class="fa-solid fa-folder-plus text-3xl text-teal-600/80"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">No Case Studies Yet</h3>
                                    <p class="text-gray-500 mb-6 max-w-md mx-auto">Get started by adding your first project showcase to the portfolio.</p>
                                    <a href="{{ route('admin.case-studies.create') }}" class="inline-flex items-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-6 py-3 rounded-xl font-medium transition shadow-md shadow-teal-600/20 hover:shadow-lg hover:-translate-y-0.5">
                                        <i class="fa-solid fa-plus"></i> Create New Project
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($caseStudies->hasPages())
            <div class="bg-white px-6 py-4 border-t border-gray-100">
                {{ $caseStudies->links() }}
            </div>
        @endif
    </div>
</div>
@endsection