@extends('admin.portal')

@section('title', 'Tools')
@section('header_title', 'Tools')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="page-hdr">
        <div class="page-hdr-left"><h2>Tools & Calculators</h2><p>Interactive water management tools</p></div>
        <div class="page-hdr-right">
            <a href="{{ route('admin.assets.create') }}" 
                class="inline-flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-md shadow-teal-600/20 hover:shadow-lg hover:shadow-teal-600/30 hover:-translate-y-0.5">
                <i class="fa-solid fa-plus text-sm"></i> <span>Add Tool</span>
            </a>
        </div>
    </div>
    
    <div class="bg-[var(--surface)] rounded-2xl shadow-xl overflow-hidden border border-[var(--border)]">
        
        <div class="p-6 border-b border-[var(--border)] bg-[var(--surface)] relative z-20">

            <div class="bg-[var(--surface-2)] rounded-xl p-1.5 border border-[var(--border)]">
                <form action="{{ route('admin.assets.index') }}" method="GET" class="flex flex-col md:flex-row md:items-center w-full">
                    
                    <div class="relative flex-1 group">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass text-[var(--text-3)]"></i>
                        </div>
                        <input type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Search tool title..." 
                            class="block w-full pl-10 pr-3 py-2 bg-transparent border-0 text-sm text-[var(--text-1)] placeholder-[var(--text-3)] focus:ring-0 focus:bg-white/50 rounded-lg transition"
                        >
                    </div>

                    @if(request('search') || request('industry_id'))
                        <div class="flex items-center pl-2 md:border-l border-[var(--border)] ml-2">
                            <a href="{{ route('admin.assets.index') }}" 
                            class="p-2 text-[var(--text-3)] hover:text-red-500 hover:bg-red-50 rounded-lg transition" 
                            title="Clear Search & Filter">
                                <i class="fa-solid fa-xmark text-sm"></i>
                            </a>
                        </div>
                    @endif
                </form>
            </div>

            @if(request('search'))
                <p class="text-sm text-[var(--text-3)] mb-4 px-1">
                    Found {{ $tools->total() }} results for "<span class="font-semibold text-[var(--text-1)]">{{ request('search') }}</span>"
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
            <table class="wst-table">
                <thead>
                    <tr class="bg-[var(--surface-2)] border-b border-[var(--border)] text-xs uppercase tracking-wider text-[var(--text-3)] font-semibold">
                        <th>Tool Info</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[var(--border)]">
                    @forelse($tools as $item)
                        <tr>
                            
                            <td class="primary">
                                <div style="display:flex;align-items:center;gap:10px;max-width:300px;">
                                    <div style="width:48px;height:32px;flex-shrink:0;border-radius:6px;overflow:hidden;border:1px solid var(--border);background:var(--surface-2);">
                                        @if($item->image_path)
                                            <img src="{{ Storage::url($item->image_path) }}" 
                                                style="width:100%;height:100%;object-fit:cover;"
                                                alt="{{ $item->title }}">
                                        @else
                                            <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;">
                                                <i class="fa-regular fa-image text-2xl opacity-50"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <span style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $item->title }}</span>
                                    </div>
                                </div>
                            </td>

                            <td style="font-family:var(--font-mono);color:var(--accent);">
                                {{ number_format($item->views_count ?? 0) }}
                            </td>

                            <td>
                                <div style="display:flex;flex-direction:column;gap:4px;">
                                    <span class="pill {{ $item->is_active ? 'pill-green' : 'pill-amber' }}">
                                        {{ $item->is_active ? 'Published' : 'Draft' }}
                                    </span>
                                    @if($item->is_featured)
                                        <span class="pill pill-yellow">
                                            <i class="fa-solid fa-star" style="font-size:9px;"></i> Featured
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div style="display:flex;align-items:center;justify-content:flex-start;gap:6px;">
                                    <a href="{{ route('admin.assets.edit', $item) }}"
                                    class="btn btn-ghost"
                                    style="font-size:10px;padding:4px 8px;">
                                        <i class="fa-solid fa-pencil" style="font-size:9px;"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.assets.destroy', $item) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this case study? This will delete associated files too.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-ghost"
                                                style="font-size:10px;padding:4px 8px;color:var(--red, #ef4444);">
                                            <i class="fa-solid fa-trash-can" style="font-size:9px;"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center 
                                    bg-[var(--surface-2)] rounded-2xl p-8 
                                    border border-dashed border-[var(--border)]">
                                    <div class="w-20 h-20 bg-[var(--surface)] rounded-full flex items-center justify-center mb-4 shadow-sm border border-[var(--border)]">
                                        <i class="fa-solid fa-folder-plus text-3xl text-teal-600/80"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-[var(--text-1)] mb-2">No Tools Found</h3>
                                    <p class="text-[var(--text-3)] mb-6 max-w-md mx-auto">
                                        @if(request('search'))
                                            We couldn't find any tools matching your search.
                                        @else
                                            Get started by adding your first tool.
                                        @endif
                                    </p>
                                    <a href="{{ route('admin.assets.create') }}" class="inline-flex items-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-6 py-3 rounded-xl font-medium transition shadow-md shadow-teal-600/20 hover:shadow-lg hover:-translate-y-0.5">
                                        <i class="fa-solid fa-plus"></i> Create New Tool
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($tools->hasPages())
            <div class="bg-[var(--surface)] px-6 py-4 border-t border-[var(--border)]">
                {{ $tools->links('pagination.custom') }}
            </div>
        @endif
    </div>
</div>
@endsection