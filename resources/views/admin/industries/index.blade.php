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

            <div class="bg-[var(--surface-2)] rounded-xl p-1.5 border border-[var(--border)]">
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
        <table class="wst-table">
            <thead>
                <tr>
                    <th>Industry Info</th>
                    <th>Slug</th>
                    <th class="r">Assets</th>
                    <th>Status</th>
                    <th class="r">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($industries as $item)
                    <tr>
                        <td class="primary">
                            <div style="display:flex;align-items:center;gap:10px;max-width:320px;">
                                <div style="width:48px;height:32px;flex-shrink:0;border-radius:6px;overflow:hidden;border:1px solid var(--border);background:var(--surface-2);">
                                    @if($item->image_path)
                                        <img src="{{ Storage::url($item->image_path) }}"
                                            style="width:100%;height:100%;object-fit:cover;"
                                            alt="{{ $item->title }}">
                                    @else
                                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;">
                                            <i class="fa-solid fa-industry" style="font-size:12px;color:var(--text-3);opacity:.5;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div style="overflow:hidden;">
                                    <div style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                        {{ $item->title }}
                                        <a href="{{ url('industries/' . $item->slug) }}" target="_blank"
                                        style="color:var(--text-3);font-size:10px;margin-left:4px;"
                                        onclick="event.stopPropagation()">
                                            <i class="fa-solid fa-up-right-from-square"></i>
                                        </a>
                                    </div>
                                    <div style="font-size:11px;color:var(--text-3);margin-top:2px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                        {{ Str::limit($item->description, 60) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td style="font-family:var(--font-mono);font-size:11px;color:var(--text-3);">
                            {{ $item->slug }}
                        </td>
                        <td class="r" style="font-family:var(--font-mono);color:var(--accent);">
                            {{ number_format($item->assets_count ?? 0) }}
                        </td>
                        <td>
                            <span class="pill {{ $item->is_active ? 'pill-green' : 'pill-dim' }}">
                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="r">
                            <div style="display:flex;align-items:center;justify-content:flex-end;gap:6px;">
                                <a href="{{ route('admin.industries.edit', $item) }}"
                                class="btn btn-ghost"
                                style="font-size:10px;padding:4px 8px;">
                                    <i class="fa-solid fa-pencil" style="font-size:9px;"></i> Edit
                                </a>
                                <form action="{{ route('admin.industries.destroy', $item) }}" method="POST"
                                    onsubmit="return confirm('Delete this industry? Associated assets might lose their category.');">
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
                            <i class="fa-solid fa-industry" style="font-size:24px;margin-bottom:8px;display:block;color:var(--accent);opacity:.5;"></i>
                            No industries found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
        
        @if($industries->hasPages())
            <div class="px-6 py-4 border-t border-[var(--border)] bg-[var(--surface)] flex items-center justify-end">
                {{ $industries->links('pagination.custom') }}
            </div>
        @endif
    </div>
</div>
@endsection