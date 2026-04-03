@extends('admin.portal')

@section('title', 'Manage Assets')
@section('header_title', 'Assets & Resources')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="page-hdr">
        <div class="page-hdr-left"><h2>All Resources</h2><p>Manage published content assets across all categories</p></div>
        <div class="page-hdr-right">
            <a href="{{ route('admin.assets.create') }}" 
                class="inline-flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-md shadow-teal-600/20 hover:shadow-lg hover:shadow-teal-600/30 hover:-translate-y-0.5"
                >
                <i class="fa-solid fa-plus text-sm"></i> <span>Add Asset</span>
            </a>
        </div>
    </div>
    
    <div class="bg-[var(--surface)] rounded-2xl shadow-xl overflow-hidden border border-[var(--border)]">
        
        <div class="p-6 border-b border-[var(--border)] bg-[var(--surface)] relative z-20">

            <div class="bg-[var(--surface-2)] rounded-xl p-1.5 border border-[var(--border)]">
                <form action="{{ route('admin.assets.index') }}" method="GET" class="flex flex-col md:flex-row md:items-center w-full gap-2">
                    
                    <div class="relative flex-1 group w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass text-[var(--text-3)] text-xs"></i>
                        </div>
                        <input type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Search asset title..." 
                            class="block w-full pl-10 pr-3 py-2 bg-transparent border-0 text-sm text-[var(--text-1)] placeholder-[var(--text-3)] focus:ring-0 focus:bg-white/50 rounded-lg transition"
                        >
                    </div>

                    <div class="hidden md:block w-px h-6 bg-[var(--border)] mx-1"></div>

                    <div class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">
                        
                        <div class="relative min-w-[160px] group bg-[var(--surface)] md:bg-transparent rounded-lg md:rounded-none border md:border-0 border-[var(--border)]">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fa-solid fa-layer-group text-[var(--text-3)] text-xs"></i>
                            </div>
                            <select name="category" 
                                    onchange="this.form.submit()" 
                                    class="w-full pl-8 pr-8 py-2 bg-transparent border-0 text-sm text-[var(--text-1)] font-medium focus:ring-0 cursor-pointer hover:bg-[var(--surface-2)] transition rounded-lg appearance-none">
                                <option value="">All Categories</option>
                                @foreach($categories as $row)
                                    <option value="{{ $row['value'] }}" {{ request('category') == $row['value'] ? 'selected' : '' }}>
                                        {{ $row['text'] }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none text-[var(--text-3)] group-hover:text-[var(--text-1)] transition">
                                <i class="fa-solid fa-chevron-down text-[10px]"></i>
                            </div>
                        </div>

                        <div class="hidden sm:block w-px h-6 bg-[var(--border)] my-auto"></div>

                        <div class="relative min-w-[160px] group bg-[var(--surface)] md:bg-transparent rounded-lg md:rounded-none border md:border-0 border-[var(--border)]">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <i class="fa-solid fa-building text-[var(--text-3)] text-xs"></i>
                            </div>
                            <select name="industry_id" 
                                    onchange="this.form.submit()" 
                                    class="w-full pl-8 pr-8 py-2 bg-transparent border-0 text-sm text-[var(--text-1)] font-medium focus:ring-0 cursor-pointer hover:bg-[var(--surface-2)] transition rounded-lg appearance-none">
                                <option value="">All Industries</option>
                                @foreach($industries as $industry)
                                    <option value="{{ $industry->id }}" {{ request('industry_id') == $industry->id ? 'selected' : '' }}>
                                        {{ $industry->title }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none text-[var(--text-3)] group-hover:text-[var(--text-1)] transition">
                                <i class="fa-solid fa-chevron-down text-[10px]"></i>
                            </div>
                        </div>
                    </div>

                    @if(request('search') || request('industry_id') || request('category'))
                        <div class="flex items-center justify-center md:justify-start pl-2 md:border-l border-[var(--border)]">
                            <a href="{{ route('admin.assets.index') }}" 
                            class="p-2 text-[var(--text-3)] hover:text-red-500 hover:bg-red-50 rounded-lg transition" 
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
                <p class="text-sm text-[var(--text-3)] mb-4 px-1">
                    Found {{ $assets->total() }} results for "<span class="font-semibold text-[var(--text-1)]">{{ request('search') }}</span>"
                </p>
            @endif
        </div>

        @if(session('success'))
            <div class="px-6 pt-4">
                <div class="p-4 rounded-xl bg-teal-50 border border-teal-100 text-teal-800 flex items-center gap-3 transition-all duration-500">
                    <i class="fa-solid fa-circle-check text-teal-600"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="relative z-10 overflow-x-auto">
            <table class="wst-table">
                <thead>
                    <tr>
                        <th style="width:24px;padding-left:12px;"></th>
                        <th>Asset Info</th>
                        <th>Category</th>
                        <th>Industry</th>
                        <th class="r">Views</th>
                        <th>Status</th>
                        <th class="r">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($assets as $item)
                        @php
                            $catPill = match($item->category) {
                                'Webinar'    => 'pill-purple',
                                'Case Study' => 'pill-blue',
                                default      => 'pill-dim'
                            };
                        @endphp

                        {{-- Main Row --}}
                        <tr class="row-clickable" onclick="toggleARRow({{ $item->id }}, this)">
                            <td style="padding-left:12px;width:24px;">
                                <i class="fa-solid fa-chevron-right" id="ar-arrow-{{ $item->id }}"
                                style="font-size:9px;color:var(--text-3);transition:transform .2s;"></i>
                            </td>
                            <td class="primary">
                                <div style="display:flex;align-items:center;gap:10px;max-width:280px;">
                                    <div style="width:48px;height:32px;flex-shrink:0;border-radius:6px;overflow:hidden;border:1px solid var(--border);background:var(--surface-2);">
                                        @if($item->image_path)
                                            <img src="{{ Storage::url($item->image_path) }}"
                                                style="width:100%;height:100%;object-fit:cover;"
                                                alt="{{ $item->title }}">
                                        @else
                                            <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;">
                                                <i class="fa-regular fa-image" style="font-size:12px;color:var(--text-3);opacity:.5;"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <span style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $item->title }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="pill {{ $catPill }}">{{ $item->category }}</span>
                            </td>
                            <td>{{ $item->industry->title ?? 'Global / All' }}</td>
                            <td class="r" style="font-family:var(--font-mono);color:var(--accent);">
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
                            <td class="r">
                                <div style="display:flex;align-items:center;justify-content:flex-end;gap:6px;">
                                    <a href="{{ route('admin.assets.edit', $item) }}"
                                    class="btn btn-ghost"
                                    style="font-size:10px;padding:4px 8px;"
                                    onclick="event.stopPropagation()">
                                        <i class="fa-solid fa-pencil" style="font-size:9px;"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.assets.destroy', $item) }}" method="POST"
                                        onsubmit="return confirm('Delete this asset?');"
                                        onclick="event.stopPropagation()">
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

                        {{-- Expand Row --}}
                        <tr class="expand-row" id="ar-exp-{{ $item->id }}">
                            <td colspan="7" id="ar-inner-{{ $item->id }}" style="padding:0;"></td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7" style="text-align:center;padding:40px 20px;color:var(--text-3);">
                                <i class="fa-solid fa-folder-plus" style="font-size:24px;margin-bottom:8px;display:block;color:var(--accent);opacity:.5;"></i>
                                No assets found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($assets->hasPages())
            <div class="bg-[var(--surface)] px-6 py-4 border-t border-[var(--border)]">
                {{ $assets->links('pagination.custom') }}
            </div>
        @endif
    </div>
</div>
@endsection