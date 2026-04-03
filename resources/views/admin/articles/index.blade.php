@extends('admin.portal')

@section('title', 'Manage Articles')
@section('header_title', 'Articles')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="page-hdr">
        <div class="page-hdr-left"><h2>Articles</h2><p>Manage editorial content and insights</p></div>
        <div class="page-hdr-right">
            <a href="{{ route('admin.articles.create')  }}" 
                class="inline-flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-md shadow-teal-600/20 hover:shadow-lg hover:shadow-teal-600/30 hover:-translate-y-0.5"
                >
                <i class="fa-solid fa-plus text-sm"></i> <span>Add Article</span>
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

    <!-- Table -->
    <div class="relative z-10 overflow-x-auto">
        <table class="wst-table">
            <thead>
                <tr>
                    <th style="width:24px;padding-left:12px;"></th>
                    <th>Article Info</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Views</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                    <tr class="row-clickable" onclick="toggleARRow({{ $article->id }}, this)">
                        <td style="padding-left:12px;width:24px;">
                            <i class="fa-solid fa-chevron-right" id="ar-arrow-{{ $article->id }}"
                            style="font-size:9px;color:var(--text-3);transition:transform .2s;"></i>
                        </td>
                        <td class="primary">
                            <div style="display:flex;align-items:center;gap:10px;max-width:300px;">
                                <div style="width:48px;height:32px;flex-shrink:0;border-radius:6px;overflow:hidden;border:1px solid var(--border);background:var(--surface-2);">
                                    @if($article->thumbnail)
                                        <img src="{{ asset('storage/' . $article->thumbnail) }}"
                                            style="width:100%;height:100%;object-fit:cover;"
                                            alt="{{ $article->title }}">
                                    @else
                                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;">
                                            <i class="fa-regular fa-image" style="font-size:12px;color:var(--text-3);opacity:.5;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div style="overflow:hidden;">
                                    <div style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $article->title }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="display:flex;align-items:center;gap:7px;">
                                <span style="font-size:12px;color:var(--text-3);">{{ $article->author->name ?? '-' }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="pill {{ $article->source_type === 'editor' ? 'pill-blue' : 'pill-purple' }}">
                                {{ strtoupper($article->source_type) }}
                            </span>
                        </td>
                        <td style="font-family:var(--font-mono);color:var(--accent);">
                            {{ number_format($article->views_count ?? 0) }}
                        </td>
                        <td>
                            <span class="pill {{ $article->status === 'published' ? 'pill-green' : 'pill-amber' }}">
                                {{ ucfirst($article->status) }}
                            </span>
                        </td>
                        <td>
                            <div style="display:flex;align-items:center;justify-content:flex-start;gap:6px;">
                                <a href="{{ route('admin.articles.edit', $article) }}"
                                class="btn btn-ghost"
                                style="font-size:10px;padding:4px 8px;"
                                onclick="event.stopPropagation()">
                                    <i class="fa-solid fa-pencil" style="font-size:9px;"></i> Edit
                                </a>
                                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                                    onsubmit="return confirm('Delete this article?');"
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

                    <tr class="expand-row" id="ar-exp-{{ $article->id }}">
                        <td colspan="8" id="ar-inner-{{ $article->id }}" style="padding:0;"></td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="8" style="text-align:center;padding:40px 20px;color:var(--text-3);">
                            <i class="fa-solid fa-newspaper" style="font-size:24px;margin-bottom:8px;display:block;color:var(--accent);opacity:.5;"></i>
                            No articles found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

        <!-- Pagination -->
        @if($articles->hasPages())
            <div class="bg-white px-6 py-4 border-t border-gray-100">
                {{ $articles->links() }}
            </div>
        @endif

    </div>
</div>
@endsection