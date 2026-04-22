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

@push('scripts')
    <script>
        // ─── State ────────────────────────────────────────────────────────────────────
        const _arCache   = {};   // cache hasil fetch per id
        let   _arOpen    = null; // id yang sedang terbuka
        const routeAssetDetails = "{{ route('admin.article.details', ['id' => '__ID__']) }}";

        // ─── Toggle ───────────────────────────────────────────────────────────────────
        async function toggleARRow(id, rowEl) {
            const exp   = document.getElementById('ar-exp-'   + id);
            const arrow = document.getElementById('ar-arrow-' + id);
            const inner = document.getElementById('ar-inner-' + id);
            if (!exp) return;

            const isOpen = exp.classList.contains('open');

            // Tutup semua yang terbuka
            document.querySelectorAll('.expand-row.open').forEach(r => r.classList.remove('open'));
            document.querySelectorAll('[id^="ar-arrow-"]').forEach(a => { a.style.transform = ''; });

            if (isOpen) { _arOpen = null; return; }

            // Buka baris ini
            exp.classList.add('open');
            arrow.style.transform = 'rotate(90deg)';
            inner.style.padding   = '0';
            _arOpen = id;

            // Tampilkan skeleton dulu
            inner.innerHTML = buildSkeletonHTML();

            // Fetch data
            await loadViewerLog(id, inner);
        }

        // ─── Fetch ────────────────────────────────────────────────────────────────────
        async function loadViewerLog(id, inner, search = '') {
            // Pakai cache kalau tidak ada search
            if (!search && _arCache[id]) {
                inner.innerHTML = buildViewerLogHTML(_arCache[id], []);
                return;
            }

            inner.innerHTML = buildSkeletonHTML();

            try {
                const base = routeAssetDetails.replace('__ID__', id);
                const url  = base + (search ? `?search=${encodeURIComponent(search)}` : '');

                const res  = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                if (!res.ok) throw new Error('Network error');
                const data = await res.json();

                if (!search) _arCache[id] = data; // simpan cache
                inner.innerHTML = buildViewerLogHTML(data, search);
            } catch (e) {
                inner.innerHTML = buildErrorHTML();
            }
        }

        // ─── Search (debounced) ───────────────────────────────────────────────────────
        let _arSearchTimer = null;
        function onARSearch(id, val) {
            clearTimeout(_arSearchTimer);
            _arSearchTimer = setTimeout(() => {
                const inner = document.getElementById('ar-inner-' + id);
                if (inner) loadViewerLog(id, inner, val);
            }, 350);
        }

        // ─── HTML Builders ────────────────────────────────────────────────────────────
        function buildViewerLogHTML(data, search) {
            // const { asset, logs } = data;
            console.log('data', data);
            const asset = data.data.asset || {};
            const logs = data.data.logs || [];

            const rows = logs.length
                ? logs.map(l => {
                    const initials = l.user.split(' ').map(w => w[0]).slice(0,2).join('').toUpperCase();
                    return `
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px;">
                                <div class="ar-avatar">${initials}</div>
                                <span style="color:var(--text-1);font-weight:500;font-size:13px;">${escHtml(l.user)}</span>
                            </div>
                        </td>
                        <td style="color:var(--text-2);font-size:13px;">${escHtml(l.date)}</td>
                        <td class="r" style="font-family:var(--font-mono);font-size:12px;color:var(--text-3);">${escHtml(l.time)}</td>
                    </tr>`;
                }).join('')
                : `<tr><td colspan="3">
                        <div style="text-align:center;padding:28px 0;color:var(--text-3);font-size:12px;">
                            <i class="fa-regular fa-face-meh" style="font-size:20px;margin-bottom:6px;display:block;opacity:.4;"></i>
                            No viewer logs found
                        </div>
                </td></tr>`;

            return `
            <div style="padding:16px 20px 20px;">
                <!-- Header -->
                <div style="display:flex;align-items:flex-start;justify-content:space-between;flex-wrap:wrap;gap:10px;margin-bottom:14px;">
                    <div>
                        <div style="font-weight:700;color:var(--text-1);font-size:13px;line-height:1.3;">
                            ${escHtml(asset.title)}
                        </div>
                        <div style="font-size:10px;color:var(--text-3);margin-top:3px;font-family:var(--font-mono);">
                            Asset ID: #${asset.id}
                            &nbsp;&bull;&nbsp;
                            Total Views: <strong style="color:var(--accent);">${Number(data.data.views_count).toLocaleString()}</strong>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-scroll" style="border:1px solid var(--border);border-radius:8px;overflow:hidden;">
                    <table class="wst-table" style="margin:0;">
                        <thead>
                            <tr>
                                <th style="font-size:10px;text-transform:uppercase;letter-spacing:.06em;padding:8px 14px;color:var(--text-3);">Viewer</th>
                                <th style="font-size:10px;text-transform:uppercase;letter-spacing:.06em;color:var(--text-3);">Date</th>
                                <th class="r" style="font-size:10px;text-transform:uppercase;letter-spacing:.06em;color:var(--text-3);padding-right:14px;">Time</th>
                            </tr>
                        </thead>
                        <tbody id="ar-vb-${asset.id}">${rows}</tbody>
                    </table>
                </div>
            </div>`;
        }

        function buildSkeletonHTML() {
            const lines = [80, 60, 70, 55, 65];
            const rows = lines.map(w => `
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div class="ar-skel" style="width:30px;height:30px;border-radius:50%;flex-shrink:0;"></div>
                            <div class="ar-skel" style="width:${w}%;height:13px;border-radius:4px;"></div>
                        </div>
                    </td>
                    <td><div class="ar-skel" style="width:90px;height:13px;border-radius:4px;"></div></td>
                    <td class="r"><div class="ar-skel" style="width:44px;height:13px;border-radius:4px;margin-left:auto;"></div></td>
                </tr>`).join('');

            return `
            <div style="padding:16px 20px 20px;">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;">
                    <div>
                        <div class="ar-skel" style="width:240px;height:14px;border-radius:4px;margin-bottom:6px;"></div>
                        <div class="ar-skel" style="width:160px;height:10px;border-radius:4px;"></div>
                    </div>
                    <div class="ar-skel" style="width:190px;height:30px;border-radius:6px;"></div>
                </div>
                <div style="border:1px solid var(--border);border-radius:8px;overflow:hidden;">
                    <table class="wst-table" style="margin:0;"><tbody>${rows}</tbody></table>
                </div>
            </div>`;
        }

        function buildErrorHTML() {
            return `
            <div style="padding:28px 20px;text-align:center;color:var(--text-3);font-size:12px;">
                <i class="fa-solid fa-triangle-exclamation" style="font-size:18px;color:var(--red,#ef4444);margin-bottom:8px;display:block;opacity:.7;"></i>
                Failed to load viewer logs. Please try again.
            </div>`;
        }

        // ─── Helpers ──────────────────────────────────────────────────────────────────
        function escHtml(str) {
            return String(str ?? '')
                .replace(/&/g,'&amp;').replace(/</g,'&lt;')
                .replace(/>/g,'&gt;').replace(/"/g,'&quot;');
        }
    </script>

    <style>
    /* Avatar */
        .ar-avatar {
            width: 30px; height: 30px;
            border-radius: 50%;
            background: var(--accent, #10b981);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            letter-spacing: .02em;
        }

        /* Skeleton shimmer */
        .ar-skel {
            background: linear-gradient(90deg, var(--surface-2, #1e2533) 25%, var(--border, #2a3244) 50%, var(--surface-2, #1e2533) 75%);
            background-size: 200% 100%;
            animation: ar-shimmer 1.4s infinite;
        }
        @keyframes ar-shimmer {
            0%   { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* Expand row transition */
        .expand-row td { transition: padding .15s ease; }
        .expand-row:not(.open) td { padding: 0 !important; }
        .expand-row:not(.open) > td > div { display: none; }
    </style>
@endpush