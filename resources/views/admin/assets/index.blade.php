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

@push('scripts')
    <script>
        // ─── State ────────────────────────────────────────────────────────────────────
        const _arCache   = {};   // cache hasil fetch per id
        let   _arOpen    = null; // id yang sedang terbuka
        const routeAssetDetails = "{{ route('admin.asset.details', ['id' => '__ID__']) }}";

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