@extends('admin.portal')

@section('title', 'Industries')
@section('header_title', 'Industries')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="page-hdr">
        <div class="page-hdr-left"><h2>Industries</h2><p>Manage industry categories and segments</p></div>
        <div class="page-hdr-right">
            <a href="{{ route('admin.industries.create')  }}" 
                class="inline-flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-md shadow-teal-600/20 hover:shadow-lg hover:shadow-teal-600/30 hover:-translate-y-0.5"
                >
                <i class="fa-solid fa-plus text-sm"></i> <span>Add Industry</span>
            </a>
        </div>
    </div>
    
    <div class="bg-[var(--surface)] rounded-2xl shadow-xl overflow-hidden border border-[var(--border)]">

        <div class="p-6 border-b border-[var(--border)] bg-[var(--surface)] relative z-20">

            <div class="bg-[var(--surface-2)] rounded-xl p-1.5 mb-6 border border-[var(--border)]">
                <form action="{{ route('admin.industries.index') }}" method="GET" class="relative group">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass text-[var(--text-3)] text-xs"></i>
                    </div>
                    <input type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Search industry name or description..." 
                            class="block w-full pl-10 pr-3 py-2 bg-transparent border-0 text-sm text-[var(--text-1)] placeholder-[var(--text-3)] focus:ring-0 focus:bg-white/50 rounded-lg transition">
                    @if(request('search'))
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2">
                            <a href="{{ route('admin.industries.index') }}" 
                                class="p-2 text-[var(--text-3)] hover:text-red-500 hover:bg-red-50 rounded-lg transition" >
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                        </div>
                    @endif
                </form>
            </div>
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
                    <tr class="bg-[var(--surface-2)] border-b border-[var(--border)] text-xs uppercase tracking-wider text-[var(--text-3)] font-semibold">
                        <th class="px-6 py-4 first:pl-8">Industry Info</th>
                        <th class="px-6 py-4 text-center">Sort Order</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right last:pr-8">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--border)]">
                    @forelse($industries as $item)
                        <tr class="group transition-all duration-200 
                            hover:bg-[var(--surface-2)] 
                            hover:shadow-[0_4px_20px_-2px_rgba(0,0,0,0.1)] 
                            hover:-translate-y-[2px] relative hover:z-20">
                            
                            <td class="px-6 py-5 first:pl-8 max-w-md">
                                <div class="flex items-start gap-4">
                                    <div class="relative h-16 w-24 flex-shrink-0 rounded-xl overflow-hidden border border-[var(--border)] shadow-sm bg-[var(--surface-2)] group-hover:border-teal-200 transition">
                                        @if($item->image_path)
                                            <img src="{{ Storage::url($item->image_path) }}" 
                                                class="h-full w-full object-cover group-hover:scale-110 transition duration-500">
                                        @else
                                            <div class="h-full w-full flex items-center justify-center text-[var(--text-3)] bg-[var(--surface-2)]">
                                                <i class="fa-solid fa-industry text-lg"></i>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div>
                                        <div class="font-bold text-base text-[var(--text-1)] group-hover:text-[var(--primary)] transition-colors line-clamp-1">
                                            {{ $item->title }}
                                            <a href="{{ url('industries/' . $item->slug) }}" target="_blank" class="text-gray-400 hover:text-teal-500 text-xs">
                                                <i class="fa-solid fa-up-right-from-square"></i>
                                            </a>
                                        </div>
                                        <p class="text-sm text-gray-500 mt-1 line-clamp-2 leading-relaxed">
                                            {{ Str::limit($item->description, 80) }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gray-50 text-gray-600 text-sm font-semibold border border-gray-200">
                                    {{ $item->sort_order }}
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wide {{ $item->is_active ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-gray-100 text-gray-500 border border-gray-200' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $item->is_active ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                                    {{ $item->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td class="px-6 py-5 text-right last:pr-8">
                                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all duration-200 transform group-hover:translate-x-0 translate-x-4">
                                    <a href="{{ route('admin.industries.edit', $item) }}" 
                                        class="p-2 bg-white border border-gray-200 rounded-lg text-gray-400 hover:text-blue-600 hover:border-blue-300 hover:shadow-sm transition"
                                        title="Edit">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('admin.industries.destroy', $item) }}" method="POST" 
                                        onsubmit="return confirm('Delete this industry? Associated case studies might lose their category.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 bg-white border border-gray-200 rounded-lg text-gray-400 hover:text-red-600 hover:border-red-300 hover:shadow-sm transition"
                                                title="Delete">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="block group-hover:hidden text-gray-300">
                                    <i class="fa-solid fa-ellipsis text-xl"></i>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center bg-gray-50/50 rounded-2xl p-8 border border-dashed border-gray-200">
                                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mb-4 shadow-sm border border-gray-100">
                                        <i class="fa-solid fa-industry text-2xl text-teal-600/50"></i>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900">No Industries Found</h3>
                                    <p class="text-gray-500 mb-4 mt-1">Start by adding your first industry category.</p>
                                    <a href="{{ route('admin.industries.create') }}" class="text-teal-600 hover:text-teal-700 font-medium">
                                        + Add Industry
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($industries->hasPages())
            <div class="bg-white px-6 py-4 border-t border-gray-100">
                {{ $industries->links('pagination.custom') }}
            </div>
        @endif
    </div>
</div>
@endsection