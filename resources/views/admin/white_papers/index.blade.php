@extends('admin.portal')

@section('title', 'White Papers')
@section('header_title', 'White Papers')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="page-hdr">
        <div class="page-hdr-left"><h2>White Papers</h2><p>Manage your white papers and technical documents</p></div>
        <div class="page-hdr-right">
            <a href="{{ route('admin.assets.create') }}" 
                class="inline-flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-md shadow-teal-600/20 hover:shadow-lg hover:shadow-teal-600/30 hover:-translate-y-0.5"
                >
                <i class="fa-solid fa-plus text-sm"></i> <span>Add Project</span>
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
                            placeholder="Search project title..." 
                            class="block w-full pl-10 pr-3 py-2 bg-transparent border-0 text-sm text-gray-900 placeholder-gray-400 focus:ring-0 focus:bg-white/50 rounded-lg transition"
                        >
                    </div>

                    @if(request('search'))
                        <div class="flex items-center pl-2 md:border-l border-gray-200 ml-2">
                            <a href="{{ route('admin.assets.index') }}" 
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
                    Found {{ $whitePapers->total() }} results for "<span class="font-semibold text-gray-800">{{ request('search') }}</span>"
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
                    <tr>
                        <th>Project Info</th>
                        <th>Views</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($whitePapers as $item)
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
                                                <i class="fa-regular fa-image" style="font-size:12px;color:var(--text-3);opacity:.5;"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <span style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $item->title }}</span>
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
                            <td class="r">
                                <div style="display:flex;align-items:center;justify-content:flex-start;gap:6px;">
                                    <a href="{{ route('admin.assets.edit', $item) }}"
                                    class="btn btn-ghost"
                                    style="font-size:10px;padding:4px 8px;">
                                        <i class="fa-solid fa-pencil" style="font-size:9px;"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.assets.destroy', $item) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?');">
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
                            <td colspan="5" style="text-align:center;padding:40px 20px;color:var(--text-3);">
                                <i class="fa-solid fa-folder-plus" style="font-size:24px;margin-bottom:8px;display:block;color:var(--accent);opacity:.5;"></i>
                                No projects found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($whitePapers->hasPages())
            <div class="bg-[var(--surface)] px-6 py-4 border-t border-[var(--border)]">
                {{ $whitePapers->links('pagination.custom') }}
            </div>
        @endif
    </div>
</div>
@endsection